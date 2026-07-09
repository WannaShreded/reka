<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    private array $products = [
        'vimle' => [
            'slug' => 'vimle',
            'name' => 'VIMLE Sofa',
            'price' => 8499000,
            'image' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=1000&q=80',
            'images' => [
                'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=1000&q=80',
                'https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?auto=format&fit=crop&w=1000&q=80',
                'https://images.unsplash.com/photo-1550581190-9c1c48d21d6c?auto=format&fit=crop&w=1000&q=80',
                'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?auto=format&fit=crop&w=1000&q=80',
            ],
            'sizes' => ['S', 'M', 'L'],
            'colors' => ['Beige', 'Grey', 'Blue'],
            'stock' => 5,
            'rating' => '4.8',
            'description' => 'A modular, comfort-first sofa designed to fit contemporary homes.',
        ],
        'bjorlkudden' => [
            'slug' => 'bjorlkudden',
            'name' => 'BJÖRKUDDEN Table',
            'price' => 8999000,
            'image' => 'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=900&q=80',
            'images' => [
                'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=900&q=80',
                'https://images.unsplash.com/photo-1513694203232-719a280e022f?auto=format&fit=crop&w=900&q=80',
            ],
            'sizes' => ['S', 'M', 'L', 'XL'],
            'colors' => ['Oak', 'Walnut'],
            'stock' => 3,
            'rating' => '4.6',
            'description' => 'Solid wood dining table with a clean, sculptural silhouette.',
        ],
    ];

    public function productDetail(string $slug)
    {
        abort_unless(isset($this->products[$slug]), 404);

        $product = $this->products[$slug];
        $product['slug'] = $slug;

        return view('product-detail', [
            'product' => $product,
            'relatedProducts' => array_slice($this->products, 0, 2, true),
        ]);
    }

    public function category()
    {
        return view('category', ['products' => $this->products]);
    }

    public function cart()
    {
        $cart = $this->getCart();
        $items = $cart['items'] ?? [];

        return view('cart', [
            'items' => $items,
            'subtotal' => $this->calculateSubtotal($items),
            'shippingCost' => 0,
            'total' => $this->calculateSubtotal($items),
        ]);
    }

    public function addToCart(Request $request)
    {
        $data = $request->validate([
            'product_slug' => ['required', 'string'],
            'quantity' => ['required', 'integer', 'min:1'],
            'size' => ['required', 'string'],
            'color' => ['nullable', 'string'],
        ]);

        $product = $this->products[$data['product_slug']] ?? null;
        if (!$product) {
            return back()->withErrors(['product' => 'Product not found.']);
        }

        if (!in_array($data['size'], $product['sizes'], true)) {
            return back()->withErrors(['size' => 'The selected size is unavailable.']);
        }

        if ($product['stock'] < $data['quantity']) {
            return back()->withErrors(['stock' => 'Not enough stock available.']);
        }

        $cart = $this->getCart();
        $items = $cart['items'] ?? [];
        $key = $data['product_slug'] . ':' . $data['size'] . ':' . ($data['color'] ?? '');

        if (isset($items[$key])) {
            $items[$key]['quantity'] += $data['quantity'];
        } else {
            $items[$key] = [
                'product_slug' => $data['product_slug'],
                'name' => $product['name'],
                'price' => $product['price'],
                'size' => $data['size'],
                'color' => $data['color'] ?? null,
                'quantity' => $data['quantity'],
                'image' => $product['image'],
            ];
        }

        $this->persistCart($items);

        return redirect()->back()->with('success', 'Added to cart successfully.');
    }

    public function updateCart(Request $request, string $key)
    {
        $data = $request->validate([
            'quantity' => ['required', 'integer', 'min:1'],
        ]);

        $cart = $this->getCart();
        $items = $cart['items'] ?? [];

        if (isset($items[$key])) {
            $items[$key]['quantity'] = $data['quantity'];
            $this->persistCart($items);
        }

        return redirect()->back()->with('success', 'Cart updated.');
    }

    public function removeFromCart(string $key)
    {
        $cart = $this->getCart();
        $items = $cart['items'] ?? [];
        unset($items[$key]);
        $this->persistCart($items);

        return redirect()->back()->with('success', 'Item removed from cart.');
    }

    public function checkout()
    {
        if (!Auth::check()) {
            Session::put('checkout_required', true);
            return redirect()->route('login')->with('checkout_required', true);
        }

        $cart = $this->getCart();
        $items = $cart['items'] ?? [];
        if (empty($items)) {
            return redirect()->route('cart')->withErrors(['cart' => 'Your cart is empty.']);
        }

        return view('checkout', [
            'items' => $items,
            'subtotal' => $this->calculateSubtotal($items),
            'shippingCost' => 0,
            'total' => $this->calculateSubtotal($items),
        ]);
    }

    public function placeOrder(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $data = $request->validate([
            'customer_name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['nullable', 'string'],
            'address' => ['required', 'string'],
            'shipping_method' => ['required', 'string'],
            'payment_method' => ['required', 'string'],
        ]);

        $cart = $this->getCart();
        $items = $cart['items'] ?? [];
        if (empty($items)) {
            return redirect()->route('cart')->withErrors(['cart' => 'Your cart is empty.']);
        }

        $subtotal = $this->calculateSubtotal($items);
        $shippingCost = $data['shipping_method'] === 'express' ? 250000 : 0;
        $total = $subtotal + $shippingCost;

        $order = Order::create([
            'user_id' => Auth::id(),
            'order_number' => 'RKA-' . now()->format('Ymd') . '-' . str_pad((string) Order::count() + 1, 4, '0', STR_PAD_LEFT),
            'status' => 'pending',
            'customer_name' => $data['customer_name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'address' => $data['address'],
            'shipping_method' => $data['shipping_method'],
            'payment_method' => $data['payment_method'],
            'items' => $items,
            'subtotal' => $subtotal,
            'shipping_cost' => $shippingCost,
            'total' => $total,
        ]);

        $this->persistCart([]);

        return redirect()->route('order-confirmation', ['order' => $order->id])->with('success', 'Checkout complete.');
    }

    public function orderConfirmation(Order $order)
    {
        if (!Auth::check() || $order->user_id !== Auth::id()) {
            abort(403);
        }

        return view('order-confirmation', ['order' => $order]);
    }

    public function orderHistory()
    {
        $orders = Auth::check() ? Order::where('user_id', Auth::id())->latest()->get() : collect();

        return view('orders', ['orders' => $orders]);
    }

    public function wishlist()
    {
        $wishlistSlugs = Session::get('wishlist', []);
        $wishlist = [];

        foreach (array_keys($wishlistSlugs) as $slug) {
            if (isset($this->products[$slug])) {
                $product = $this->products[$slug];
                $product['slug'] = $slug;
                $wishlist[] = $product;
            }
        }

        return view('wishlist', ['wishlist' => $wishlist]);
    }

    public function addToWishlist(Request $request)
    {
        $data = $request->validate([
            'product_slug' => ['required', 'string'],
        ]);

        $wishlist = Session::get('wishlist', []);
        $wishlist[$data['product_slug']] = true;
        Session::put('wishlist', $wishlist);

        return redirect()->back()->with('success', 'Added to wishlist.');
    }

    public function removeFromWishlist(string $slug)
    {
        $wishlist = Session::get('wishlist', []);
        unset($wishlist[$slug]);
        Session::put('wishlist', $wishlist);

        return redirect()->back()->with('success', 'Removed from wishlist.');
    }

    public function loginView()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($data)) {
            $request->session()->regenerate();
            $this->mergeGuestCart();
            $redirectTo = Session::get('checkout_required') ? '/checkout' : '/cart';
            Session::forget('checkout_required');
            return redirect()->intended($redirectTo)->with('success', 'Welcome back!');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function registerView()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        $user = \App\Models\User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);
        $this->mergeGuestCart();

        return redirect('/cart')->with('success', 'Account created successfully.');
    }

    private function getCart(): array
    {
        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())->first();
            if ($cart) {
                return ['items' => $cart->items ?? []];
            }
        }

        return ['items' => Session::get('guest_cart', [])];
    }

    private function persistCart(array $items): void
    {
        if (Auth::check()) {
            $cart = Cart::firstOrNew(['user_id' => Auth::id()]);
            $cart->items = $items;
            $cart->save();
            return;
        }

        Session::put('guest_cart', $items);
    }

    private function mergeGuestCart(): void
    {
        $guestCart = Session::get('guest_cart', []);
        if (empty($guestCart)) {
            return;
        }

        $cart = Cart::firstOrNew(['user_id' => Auth::id()]);
        $cart->items = array_merge($cart->items ?? [], $guestCart);
        $cart->save();
        Session::forget('guest_cart');
    }

    private function calculateSubtotal(array $items): int
    {
        $subtotal = 0;
        foreach ($items as $item) {
            $subtotal += ($item['price'] ?? 0) * ($item['quantity'] ?? 0);
        }

        return $subtotal;
    }
}
