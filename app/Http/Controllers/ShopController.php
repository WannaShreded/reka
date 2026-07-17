<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ShopController extends Controller
{
    public function productDetail(string $slug)
    {
        $productModel = Product::where('slug', $slug)->first();
        abort_unless($productModel, 404);

        $product = $productModel->toArray();

        return view('product-detail', [
            'product' => $product,
            'relatedProducts' => Product::where('slug', '!=', $slug)
                ->limit(2)
                ->get()
                ->keyBy('slug')
                ->toArray(),
        ]);
    }

    public function category(Request $request)
    {
        $selectedCategory = $request->query('category');

        $productsQuery = Product::orderBy('name');
        if ($selectedCategory) {
            $productsQuery->where('category', $selectedCategory);
        }

        $products = $productsQuery->paginate(12)->withQueryString();
        $categories = Product::select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('category', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
        ]);
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

        if ($request->user()?->isAdmin()) {
            return redirect()->route('admin-dashboard');
        }

        $productModel = Product::where('slug', $data['product_slug'])->first();
        if (!$productModel) {
            return back()->withErrors(['product' => 'Product not found.']);
        }

        $product = $productModel->toArray();

        if (!in_array($data['size'], $product['sizes'] ?? [], true)) {
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

        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin-dashboard');
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

        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin-dashboard');
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
        if (!Auth::check() || $order->user_id !== Auth::id() || Auth::user()->isAdmin()) {
            abort(403);
        }

        return view('order-confirmation', ['order' => $order]);
    }

    public function orderHistory()
    {
        if (!Auth::check() || Auth::user()->isAdmin()) {
            abort(403);
        }

        $orders = Order::where('user_id', Auth::id())->latest()->get();

        return view('orders', ['orders' => $orders]);
    }

    public function search(Request $request)
    {
        $query = trim((string) $request->input('query', ''));
        $products = Product::orderBy('name')->get()->keyBy('slug')->toArray();

        if ($query !== '') {
            $needle = mb_strtolower($query);
            $products = array_filter($products, function (array $product) use ($needle): bool {
                $haystack = mb_strtolower(implode(' ', [
                    $product['name'] ?? '',
                    $product['description'] ?? '',
                    $product['slug'] ?? '',
                    implode(' ', $product['colors'] ?? []),
                    implode(' ', $product['sizes'] ?? []),
                    $product['category'] ?? '',
                ]));

                return str_contains($haystack, $needle);
            });
        }

        return view('search', [
            'products' => $products,
            'query' => $query,
        ]);
    }

    public function wishlist()
    {
        $wishlistSlugs = Session::get('wishlist', []);
        $wishlist = [];

        if (!empty($wishlistSlugs)) {
            $products = Product::whereIn('slug', array_keys($wishlistSlugs))
                ->get()
                ->keyBy('slug')
                ->toArray();

            foreach (array_keys($wishlistSlugs) as $slug) {
                if (isset($products[$slug])) {
                    $product = $products[$slug];
                    $product['slug'] = $slug;
                    $wishlist[] = $product;
                }
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
            Session::forget('checkout_required');

            if (Auth::user()->isAdmin()) {
                return redirect()->intended(route('admin-dashboard'))->with('success', 'Welcome back!');
            }

            $redirectTo = Session::get('checkout_required') ? '/checkout' : '/cart';
            return redirect()->intended($redirectTo)->with('success', 'Welcome back!');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function registerView()
    {
        return view('register');
    }

    public function dashboard()
    {
        return view('dashboard', ['user' => Auth::user()]);
    }

    public function profile()
    {
        return view('profile', ['user' => Auth::user()]);
    }

    public function settings()
    {
        return view('profile', ['user' => Auth::user()]);
    }

    public function adminDashboard()
    {
        return view('admin-dashboard');
    }

    public function support()
    {
        return view('support');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'You have been logged out.');
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

        if ($user->isAdmin()) {
            return redirect()->route('admin-dashboard')->with('success', 'Account created successfully.');
        }

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
