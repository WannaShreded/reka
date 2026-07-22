<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    // ─── DASHBOARD ───────────────────────────────────────────────────────────

    public function dashboard()
    {
        $stats = [
            'total_products' => Product::count(),
            'available_products' => Product::where('status', 'available')->count(),
            'sold_products' => Product::where('status', 'sold')->count(),
            'total_orders' => Order::count(),
            'pending_orders' => Order::whereIn('status', ['pending', 'pending_payment', 'processing'])->count(),
            'completed_orders' => Order::where('status', 'completed')->count(),
        ];

        $recentOrders = Order::with('user')
            ->latest()
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('stats', 'recentOrders'));
    }

    // ─── PRODUCTS ────────────────────────────────────────────────────────────

    public function products(Request $request)
    {
        $query = Product::query()->orderBy('created_at', 'desc');

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('category', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%");
            });
        }

        if ($category = $request->input('category')) {
            $query->where('category', $category);
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $products = $query->paginate(15)->withQueryString();
        $categories = Product::select('category')->distinct()->orderBy('category')->pluck('category')->filter();

        return view('admin.products.index', compact('products', 'categories'));
    }

    public function createProduct()
    {
        $categories = Product::select('category')->distinct()->orderBy('category')->pluck('category')->filter();

        return view('admin.products.create', compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'price' => ['required', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
            'condition' => ['nullable', 'string', 'in:new,like_new,good,fair'],
            'sizes' => ['nullable', 'string', 'in:S,M,L,XL'],
            'status' => ['required', 'string', 'in:available,reserved,sold'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'max:4096'],
        ]);

        $uploadedImages = [];

        if ($request->hasFile('images')) {

            $destination = public_path('images/products');

            if (! File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }

            foreach ($request->file('images') as $file) {

                $filename = time().'_'.Str::uuid().'.'.$file->getClientOriginalExtension();

                $file->move($destination, $filename);

                $uploadedImages[] = 'products/'.$filename;
            }
        }

        $primaryImage = $uploadedImages[0] ?? null;

        $slug = $this->uniqueSlug($data['name']);

        Product::create([
            'slug' => $slug,
            'name' => $data['name'],
            'category' => $data['category'],
            'price' => (int) $data['price'],
            'description' => $data['description'] ?? null,
            'condition' => $data['condition'] ?? null,
            'sizes' => $data['sizes'] ?? null,
            'status' => $data['status'],
            'image' => $primaryImage ?? '',
            'images' => $uploadedImages,
            'stock' => $data['status'] === 'available' ? 1 : 0,
        ]);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product created successfully.');
    }

    public function showProduct(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    public function editProduct(Product $product)
    {
        $categories = Product::select('category')->distinct()->orderBy('category')->pluck('category')->filter();

        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'price' => ['required', 'integer', 'min:0'],
            'description' => ['nullable', 'string'],
            'condition' => ['nullable', 'string', 'in:new,like_new,good,fair'],
            'sizes' => ['nullable', 'string', 'in:S,M,L,XL'],
            'status' => ['required', 'string', 'in:available,reserved,sold'],
            'images' => ['nullable', 'array'],
            'images.*' => ['image', 'max:4096'],
        ]);

        $existingImages = is_array($product->images) ? $product->images : [];

        $uploadedImages = [];

        if ($request->hasFile('images')) {

            foreach ($existingImages as $oldImage) {

                $oldPath = public_path($oldImage);

                if (File::exists($oldPath)) {
                    File::delete($oldPath);
                }
            }

            $destination = public_path('images/products');

            if (! File::exists($destination)) {
                File::makeDirectory($destination, 0755, true);
            }

            foreach ($request->file('images') as $file) {

                $filename = time().'_'.Str::uuid().'.'.$file->getClientOriginalExtension();

                $file->move($destination, $filename);

                $uploadedImages[] = 'products/'.$filename;
            }

            $primaryImage = $uploadedImages[0];

        } else {

            $uploadedImages = $existingImages;
            $primaryImage = $product->image;
        }

        $product->update([
            'name' => $data['name'],
            'category' => $data['category'],
            'price' => (int) $data['price'],
            'description' => $data['description'] ?? null,
            'condition' => $data['condition'] ?? null,
            'sizes' => $data['sizes'] ?? null,
            'status' => $data['status'],
            'image' => $primaryImage ?? '',
            'images' => $uploadedImages,
            'stock' => $data['status'] === 'available' ? 1 : 0,
        ]);

        return redirect()->route('admin.products.show', $product)
            ->with('success', 'Product updated successfully.');
    }

    public function deleteProduct(Product $product)
    {
        $images = is_array($product->images) ? $product->images : [];

        foreach ($images as $image) {

            $path = public_path($image);

            if (File::exists($path)) {
                File::delete($path);
            }
        }

        $product->delete();
        return redirect()->route('admin.products.index', $product)
            ->with('success', 'Product deleted successfully.');
    }

    // ─── ORDERS ──────────────────────────────────────────────────────────────

    public function orders(Request $request)
    {
        $query = Order::with(['user', 'orderItems'])->latest();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('order_number', 'like', "%{$search}%")
                    ->orWhere('customer_name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($status = $request->input('status')) {
            $query->where('status', $status);
        }

        $orders = $query->paginate(15)->withQueryString();

        return view('admin.orders.index', compact('orders'));
    }

    public function showOrder(Order $order)
    {
        $order->load(['user', 'orderItems.product']);

        $allowedTransitions = $this->allowedTransitions($order->status);

        return view('admin.orders.show', compact('order', 'allowedTransitions'));
    }

    public function updateOrderStatus(Request $request, Order $order)
    {
        $allowed = $this->allowedTransitions($order->status);

        $data = $request->validate([
            'status' => ['required', 'string', 'in:'.implode(',', $allowed)],
        ]);

        $order->update(['status' => $data['status']]);

        return redirect()->route('admin.orders.show', $order)
            ->with('success', 'Order status updated to '.ucfirst($data['status']).'.');
    }

    // ─── HELPERS ─────────────────────────────────────────────────────────────

    private function uniqueSlug(string $name): string
    {
        $base = Str::slug($name);
        $slug = $base;
        $i = 1;

        while (Product::where('slug', $slug)->exists()) {
            $slug = $base.'-'.$i++;
        }

        return $slug;
    }

    private function allowedTransitions(string $currentStatus): array
    {
        return match ($currentStatus) {
            'pending', 'pending_payment' => ['processing'],
            'processing' => ['shipped'],
            'shipped' => ['completed'],
            default => [],
        };
    }
}
