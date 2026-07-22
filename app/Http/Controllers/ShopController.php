<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Services\MidtransService;
use Database\Seeders\ProductSeeder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class ShopController extends Controller
{
    public function home()
    {
        $this->ensureProductsAvailable();

        return view('shop.home', [
            'featuredProducts' => Schema::hasTable('products')
                ? Product::query()
                    ->orderByRaw('CASE WHEN stock > 0 THEN 0 ELSE 1 END')
                    ->orderBy('name')
                    ->limit(4)
                    ->get()
                    ->map(fn (Product $product) => $this->presentProduct($product))
                : collect(),
        ]);
    }

    public function productDetail(string $slug)
    {
        $this->ensureProductsAvailable();

        $productModel = Product::where('slug', $slug)->first();
        abort_unless($productModel, 404);

        $product = $this->presentProduct($productModel);

        return view('shop.product-detail', [
            'product' => $product,
            'relatedProducts' => Product::where('slug', '!=', $slug)
                ->limit(2)
                ->get()
                ->map(fn (Product $product) => $this->presentProduct($product))
                ->keyBy('slug'),
        ]);
    }

    public function category(Request $request)
    {
        $this->ensureProductsAvailable();

        $selectedCategory = $request->query('category');

        $productsQuery = Product::query()
            ->orderByRaw('CASE WHEN stock > 0 THEN 0 ELSE 1 END')
            ->orderBy('name');
        if ($selectedCategory) {
            $productsQuery->where('category', $selectedCategory);
        }

        $products = $productsQuery->paginate(12)->withQueryString();
        $categories = Product::select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        return view('shop.category', [
            'products' => $products,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
        ]);
    }

    public function cart()
    {
        $cart = $this->getCart();
        $items = $cart['items'] ?? [];

        $items = $this->presentCartItems($items);
        $subtotal = $this->calculateSubtotal($items);

        return view('shop.cart', [
            'items' => $items,
            'subtotal' => $subtotal,
            'shippingCost' => 0,
            'total' => $subtotal,
        ]);
    }

    public function addToCart(Request $request)
    {
        $this->ensureProductsAvailable();

        $data = $request->validate([
            'product_slug' => ['required', 'string'],
            'quantity' => ['required', 'integer', 'min:1', 'max:1'],
            'size' => ['required', 'string'],
            'color' => ['nullable', 'string'],
        ]);

        if ($request->user()?->isAdmin()) {
            return redirect()->route('admin-dashboard');
        }

        $productModel = Product::where('slug', $data['product_slug'])->first();
        if (! $productModel) {
            return back()->withErrors(['product' => 'Product not found.']);
        }

        $product = $productModel->toArray();

        if ($data['size'] !== $product['sizes']) {
            return back()->withErrors(['size' => 'The selected size is unavailable.']);
        }

        if ($product['stock'] < $data['quantity'] || ($product['status'] ?? 'available') !== 'available') {
            return back()->withErrors(['stock' => 'Product is no longer available.']);
        }

        $cart = $this->getCart();
        $items = $cart['items'] ?? [];
        $key = $data['product_slug'].':'.$data['size'].':'.($data['color'] ?? '');

        $existingKeys = array_keys($items);
        if ($existingKeys !== []) {
            $matchingKey = collect($existingKeys)->first(fn ($existingKey) => str_starts_with($existingKey, $data['product_slug'].':'));
            if ($matchingKey !== null) {
                unset($items[$matchingKey]);
            }
        }

        if (isset($items[$key])) {
            $items[$key]['quantity'] = 1;
        } else {
            $items[$key] = [
                'product_slug' => $data['product_slug'],
                'name' => $product['name'],
                'price' => $product['price'],
                'size' => $data['size'],
                'color' => $data['color'] ?? null,
                'quantity' => 1,
                'image' => $product['image'],
                'image_url' => $this->imageUrl($product['image']),
            ];
        }

        $this->persistCart($items);

        return redirect()->back()->with('success', 'Added to cart successfully.');
    }

    public function buyNow(Request $request)
    {
        $this->ensureProductsAvailable();

        $data = $request->validate([
            'product_slug' => ['required', 'string'],
            'quantity' => ['required', 'integer', 'min:1', 'max:1'],
            'size' => ['required', 'string'],
            'color' => ['nullable', 'string'],
        ]);

        if ($request->user()?->isAdmin()) {
            return redirect()->route('admin-dashboard');
        }

        $productModel = Product::where('slug', $data['product_slug'])->first();
        if (! $productModel) {
            return back()->withErrors(['product' => 'Product not found.']);
        }

        $product = $productModel->toArray();

        if ($data['size'] !== $product['sizes']) {
            return back()->withErrors(['size' => 'The selected size is unavailable.']);
        }

        if ($product['stock'] < $data['quantity'] || ($product['status'] ?? 'available') !== 'available') {
            return back()->withErrors(['stock' => 'Product is no longer available.']);
        }

        $key = $data['product_slug'].':'.$data['size'].':'.($data['color'] ?? '');
        $buyNowItem = [
            $key => [
                'product_slug' => $data['product_slug'],
                'name' => $product['name'],
                'price' => $product['price'],
                'size' => $data['size'],
                'color' => $data['color'] ?? null,
                'quantity' => 1,
                'image' => $product['image'],
                'image_url' => $this->imageUrl($product['image']),
            ],
        ];

        Session::put('buy_now_items', $buyNowItem);
        Session::put('checkout_mode', 'buy_now');

        return redirect()->route('checkout');
    }

    public function updateCart(Request $request, string $key)
    {
        $data = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:1'],
        ]);

        $cart = $this->getCart();
        $items = $cart['items'] ?? [];

        if (isset($items[$key])) {
            $items[$key]['quantity'] = 1;
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

    public function checkout(Request $request)
    {
        if ($request->has('mode')) {
            Session::put('checkout_mode', $request->query('mode'));
        }

        if (! Auth::check()) {
            Session::put('checkout_required', true);

            return redirect()->route('login')->with('checkout_required', true);
        }

        if (Auth::user()->isAdmin()) {
            return redirect()->route('admin-dashboard');
        }

        $mode = Session::get('checkout_mode', 'cart');

        if ($mode === 'buy_now') {
            $items = Session::get('buy_now_items', []);
        } else {
            $cart = $this->getCart();
            $items = $cart['items'] ?? [];
        }

        if (empty($items)) {
            return redirect()->route('cart')->withErrors(['cart' => 'Your checkout session is empty.']);
        }

        $items = $this->presentCartItems($items);
        $user = Auth::user();
        $subtotal = $this->calculateSubtotal($items);

        return view('shop.checkout', [
            'items' => $items,
            'subtotal' => $subtotal,
            'shippingCost' => 0,
            'total' => $subtotal,
            'user' => $user,
            'shippingAddress' => $this->defaultShippingAddress($user),
        ]);
    }

    public function placeOrder(Request $request, MidtransService $midtrans)
    {
        if (! Auth::check()) {
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
            'shipping_method' => ['required', 'string', Rule::in(['standard', 'express'])],
            'payment_method' => ['required', 'string', Rule::in(['credit_card', 'bank_transfer', 'e_wallet', 'cod'])],
        ]);

        $mode = Session::get('checkout_mode', 'cart');

        if ($mode === 'buy_now') {
            $items = Session::get('buy_now_items', []);
        } else {
            $cart = $this->getCart();
            $items = $cart['items'] ?? [];
        }

        if (empty($items)) {
            return redirect()->route('cart')->withErrors(['cart' => 'Your checkout session is empty.']);
        }

        try {
            $order = DB::transaction(function () use ($data, $items) {
                $validatedItems = $this->validateCartStock($items);
                $orderItemsSnapshot = $this->orderItemsSnapshot($validatedItems);
                $subtotal = $this->calculateSubtotal($orderItemsSnapshot);
                $shippingCost = $data['shipping_method'] === 'express' ? 250000 : 0;
                $total = $subtotal + $shippingCost;

                $order = Order::create([
                    'user_id' => Auth::id(),
                    'order_number' => $this->generateOrderNumber(),
                    'status' => 'pending',
                    'customer_name' => $data['customer_name'],
                    'email' => $data['email'],
                    'phone' => $data['phone'] ?? null,
                    'address' => $data['address'],
                    'shipping_method' => $data['shipping_method'],
                    'payment_method' => $data['payment_method'],
                    'items' => $orderItemsSnapshot,
                    'subtotal' => $subtotal,
                    'shipping_cost' => $shippingCost,
                    'total' => $total,
                ]);

                foreach ($validatedItems as $item) {
                    $product = $item['product_model'];
                    $quantity = (int) $item['quantity'];

                    $order->orderItems()->create([
                        'product_id' => $product->id,
                        'product_slug' => $product->slug,
                        'product_name' => $product->name,
                        'size' => $item['size'] ?? null,
                        'color' => $item['color'] ?? null,
                        'quantity' => $quantity,
                        'unit_price' => (int) $product->price,
                        'line_total' => (int) $product->price * $quantity,
                        'image' => $product->image,
                    ]);

                    $product->update(['status' => 'reserved']);
                }

                return $order;
            });
        } catch (\RuntimeException $exception) {
            return redirect()->route('cart')->withErrors(['cart' => $exception->getMessage()]);
        }

        if ($mode === 'buy_now') {
            Session::forget('buy_now_items');
            Session::forget('checkout_mode');
        } else {
            $this->persistCart([]);
        }

        try {
            $snap = $midtrans->createSnapTransaction($order->load('orderItems'));

            $order->update([
                'payment_status' => 'pending',
                'status' => 'pending_payment',
                'midtrans_order_id' => $order->order_number,
                'midtrans_transaction_id' => $snap['transaction_id'] ?? null,
                'snap_token' => $snap['token'] ?? null,
                'snap_redirect_url' => $snap['redirect_url'] ?? null,
            ]);

            return redirect()->away($snap['redirect_url']);
        } catch (\Throwable $exception) {

            Log::error('Midtrans snap transaction failed', [
                'order_id' => $order->id,
                'message' => $exception->getMessage(),
                'trace' => $exception->getTraceAsString(),
            ]);

            $midtrans->applyOrderStatus($order, 'failed', 'payment_failed');

            return redirect()
                ->route('order-confirmation', ['order' => $order->id])
                ->withErrors(['payment' => 'Order was created, but Midtrans payment could not be started. Please contact support.']);
        }
    }

    public function orderConfirmation(Order $order)
    {
        if (! Auth::check() || $order->user_id !== Auth::id() || Auth::user()->isAdmin()) {
            abort(403);
        }

        return view('shop.order-confirmation', ['order' => $order->load('orderItems')]);
    }

    public function orderHistory()
    {
        if (! Auth::check() || Auth::user()->isAdmin()) {
            abort(403);
        }

        $orders = Order::where('user_id', Auth::id())->with('orderItems')->latest()->get();

        return view('shop.orders', ['orders' => $orders]);
    }

    public function search(Request $request)
    {
        $this->ensureProductsAvailable();

        $query = trim((string) $request->input('query', ''));
        $products = Product::query()
            ->orderByRaw('CASE WHEN stock > 0 THEN 0 ELSE 1 END')
            ->orderBy('name')
            ->get();

        if ($query !== '') {
            $needle = mb_strtolower($query);
            $products = $products->filter(function (Product $product) use ($needle): bool {
                $haystack = mb_strtolower(implode(' ', [
                    $product->name,
                    $product->description,
                    $product->slug,
                    implode(' ', $product->colors ?? []),
                    implode(' ', $product->sizes ?? []),
                    $product->category,
                ]));

                return str_contains($haystack, $needle);
            });
        }

        $products = $products
            ->map(fn (Product $product) => $this->presentProduct($product))
            ->keyBy('slug');

        return view('shop.search', [
            'products' => $products,
            'query' => $query,
        ]);
    }

    public function wishlist()
    {
        $this->ensureProductsAvailable();

        $wishlistSlugs = $this->getWishlist();
        $wishlist = [];

        if (! empty($wishlistSlugs)) {
            $products = Product::whereIn('slug', array_keys($wishlistSlugs))
                ->get()
                ->keyBy('slug');

            foreach (array_keys($wishlistSlugs) as $slug) {
                if (isset($products[$slug])) {
                    $wishlist[] = $this->presentProduct($products[$slug]);
                }
            }
        }

        return view('shop.wishlist', ['wishlist' => $wishlist]);
    }

    public function addToWishlist(Request $request)
    {
        $data = $request->validate([
            'product_slug' => ['required', 'string'],
        ]);

        $wishlist = $this->getWishlist();
        $wishlist[$data['product_slug']] = true;
        Session::put('wishlist', $wishlist);

        return redirect()->back()->with('success', 'Added to wishlist.');
    }

    public function removeFromWishlist(string $slug)
    {
        $wishlist = $this->getWishlist();
        unset($wishlist[$slug]);
        Session::put('wishlist', $wishlist);

        return redirect()->back()->with('success', 'Removed from wishlist.');
    }

    public function cartCount(): JsonResponse
    {
        return response()->json(['count' => count($this->getCart()['items'] ?? [])]);
    }

    public function wishlistCount(): JsonResponse
    {
        return response()->json(['count' => count($this->getWishlist())]);
    }

    public function loginView()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($data, $request->boolean('remember'))) {
            $request->session()->regenerate();
            $this->mergeGuestCart();
            $checkoutRequired = Session::pull('checkout_required', false);

            if (Auth::user()->isAdmin()) {
                return redirect()->intended(route('admin-dashboard'))->with('success', 'Welcome back!');
            }

            $redirectTo = $checkoutRequired ? route('checkout') : route('dashboard');

            return redirect()->intended($redirectTo)->with('success', 'Welcome back!');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function registerView()
    {
        return view('auth.register');
    }

    public function dashboard()
    {
        return view('dashboard', ['user' => Auth::user()]);
    }

    public function profile()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function settings()
    {
        return view('profile.edit', ['user' => Auth::user()]);
    }

    public function adminDashboard()
    {
        return view('admin.dashboard');
    }

    public function support()
    {
        return view('shop.support');
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
            'phone' => ['required', 'string', 'max:30', 'regex:/^\+?[0-9\s\-\(\)]+$/'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        $user = User::create([
            'name' => trim($data['name']),
            'email' => trim($data['email']),
            'phone' => trim($data['phone']),
            'password' => Hash::make($data['password']),
        ]);

        Auth::login($user);
        $this->mergeGuestCart();
        $checkoutRequired = Session::pull('checkout_required', false);

        if ($user->isAdmin()) {
            return redirect()->route('admin-dashboard')->with('success', 'Account created successfully.');
        }

        $redirectTo = $checkoutRequired ? route('checkout') : route('dashboard');

        return redirect()->intended($redirectTo)->with('success', 'Account created successfully.');
    }

    public function about()
    {
        return view('shop.about');
    }

    private function ensureProductsAvailable(): void
    {
        if (! Schema::hasTable('products')) {
            return;
        }

        if (Product::query()->exists()) {
            return;
        }

        $seeder = new ProductSeeder;
        $seeder->run();
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

    private function getWishlist(): array
    {
        return array_filter((array) Session::get('wishlist', []), static fn ($value) => (bool) $value);
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

    private function orderItemsSnapshot(array $items): array
    {
        return array_map(function (array $item): array {
            unset($item['product_model']);

            return $item;
        }, $items);
    }

    private function validateCartStock(array $items): array
    {
        $validatedItems = [];

        foreach ($items as $item) {
            $slug = $item['product_slug'] ?? null;
            $quantity = (int) ($item['quantity'] ?? 0);

            if (! $slug || $quantity < 1) {
                throw new \RuntimeException('Your cart contains an invalid item.');
            }

            $product = Product::where('slug', $slug)->lockForUpdate()->first();

            if (! $product) {
                throw new \RuntimeException(($item['name'] ?? 'One item').' is no longer available.');
            }

            if ($product->stock < $quantity) {
                throw new \RuntimeException($product->name.' only has '.$product->stock.' item(s) left in stock.');
            }

            $validatedItems[] = [
                'product_slug' => $product->slug,
                'name' => $product->name,
                'price' => (int) $product->price,
                'size' => $item['size'] ?? null,
                'color' => $item['color'] ?? null,
                'quantity' => $quantity,
                'image' => $product->image,
                'image_url' => $this->imageUrl($product->image),
                'product_model' => $product,
            ];
        }

        return $validatedItems;
    }

    private function generateOrderNumber(): string
    {
        return 'RKA-'.now()->format('Ymd').'-'.str_pad((string) (Order::lockForUpdate()->count() + 1), 4, '0', STR_PAD_LEFT);
    }

    private function presentProduct(Product $product): array
    {
        $data = $product->toArray();
        $images = $product->images ?? [];

        if (! is_array($images)) {
            $images = json_decode((string) $images, true) ?: [];
        }

        if (empty($images) && ! empty($data['image'])) {
            $images = [$data['image']];
        }

        $data['images'] = $images;
        $data['image_url'] = $this->imageUrl($data['image'] ?? null);
        $data['image_urls'] = array_map(fn (?string $image) => $this->imageUrl($image), $images);
        $data['is_available'] = ($data['status'] ?? 'available') === 'available' && (int) ($data['stock'] ?? 0) > 0;
        $data['availability_label'] = $data['is_available'] ? 'Tersedia' : 'Barang Habis';

        return $data;
    }

    private function presentCartItems(array $items): array
    {
        foreach ($items as $key => $item) {
            $product = Product::where('slug', $item['product_slug'] ?? null)->first();
            $stock = $product?->stock ?? 0;

            $items[$key]['stock'] = $stock;
            $isAvailable = ($product?->status ?? 'available') === 'available' && (int) $stock > 0;
            $items[$key]['is_available'] = $isAvailable;
            $items[$key]['availability_label'] = $isAvailable ? 'Tersedia' : 'Barang Habis';
            $items[$key]['image_url'] = $item['image_url'] ?? $this->imageUrl($item['image'] ?? null);
        }

        return $items;
    }

    private function imageUrl(?string $image): string
    {
        if (! $image) {
            return asset('images/products/Linen Blouse.jpg');
        }

        if (str_starts_with($image, 'http://') || str_starts_with($image, 'https://') || str_starts_with($image, '/')) {
            return $image;
        }

        return asset('images/'.ltrim($image, '/'));
    }

    private function defaultShippingAddress($user): string
    {
        return collect([
            $user->address_line_1 ?? null,
            $user->address_line_2 ?? null,
            $user->city ?? null,
            $user->province ?? null,
            $user->postal_code ?? null,
            $user->country ?? null,
        ])->filter()->implode(', ');
    }
}
