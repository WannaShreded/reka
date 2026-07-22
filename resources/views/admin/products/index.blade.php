<x-admin-layout title="Products">

    {{-- Header --}}
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-[#1d4f72] mb-1">Catalogue</p>
            <h1 class="text-2xl font-semibold tracking-tight text-[#181818]">Products</h1>
        </div>
        <a href="{{ route('admin.products.create') }}"
            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-[#1d4f72] text-white text-sm font-semibold shadow-[0_8px_20px_rgba(29,79,114,0.25)] hover:bg-[#153b54] hover:shadow-[0_12px_28px_rgba(29,79,114,0.30)] transition-all duration-200">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4" />
            </svg>
            Add Product
        </a>
    </div>

    {{-- Filters --}}
    <form method="GET" action="{{ route('admin.products.index') }}"
        class="mb-5 flex flex-col sm:flex-row gap-3 p-4 rounded-[20px] border border-[#e7e2d8] bg-white shadow-sm">
        <div class="relative flex-1">
            <svg class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-[#9ca3af]" fill="none"
                stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
            </svg>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products…"
                class="w-full pl-10 pr-4 py-2.5 text-sm border border-[#e7e2d8] rounded-full bg-[#f7f5ef] focus:outline-none focus:border-[#1d4f72] focus:ring-1 focus:ring-[#1d4f72] transition-all placeholder:text-[#9ca3af]">
        </div>
        <select name="category"
            class="px-4 py-2.5 text-sm border border-[#e7e2d8] rounded-full bg-[#f7f5ef] focus:outline-none focus:border-[#1d4f72] transition-all text-[#4b5563]">
            <option value="">All Categories</option>
            @foreach ($categories as $cat)
                <option value="{{ $cat }}" {{ request('category') == $cat ? 'selected' : '' }}>
                    {{ $cat }}</option>
            @endforeach
        </select>
        <select name="status"
            class="px-4 py-2.5 text-sm border border-[#e7e2d8] rounded-full bg-[#f7f5ef] focus:outline-none focus:border-[#1d4f72] transition-all text-[#4b5563]">
            <option value="">All Statuses</option>
            <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Available</option>
            <option value="reserved" {{ request('status') == 'reserved' ? 'selected' : '' }}>Reserved</option>
            <option value="sold" {{ request('status') == 'sold' ? 'selected' : '' }}>Sold</option>
        </select>
        <button type="submit"
            class="px-5 py-2.5 text-sm font-semibold rounded-full bg-[#1d4f72] text-white hover:bg-[#153b54] transition-colors">Filter</button>
        @if (request()->hasAny(['search', 'category', 'status']))
            <a href="{{ route('admin.products.index') }}"
                class="px-5 py-2.5 text-sm font-medium rounded-full border border-[#e7e2d8] text-[#4b5563] hover:bg-[#f7f5ef] transition-colors">Clear</a>
        @endif
    </form>

    {{-- Table --}}
    <div
        class="rounded-[28px] border border-[#e7e2d8] bg-white shadow-[0_12px_35px_rgba(17,17,17,0.05)] overflow-hidden">
        @if ($products->isEmpty())
            <div class="py-20 text-center">
                <svg class="mx-auto w-10 h-10 text-[#d1d5db] mb-3" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                </svg>
                <p class="text-sm text-[#9ca3af]">No products found.</p>
                <a href="{{ route('admin.products.create') }}"
                    class="mt-3 inline-block text-sm font-medium text-[#1d4f72] hover:underline">Add your first product
                    →</a>
            </div>
        @else
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="bg-[#f7f6f2] border-b border-[#f0ece3]">
                            <th
                                class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-[#6b7280]">
                                Product</th>
                            <th
                                class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-[#6b7280]">
                                Category</th>
                            <th
                                class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-[#6b7280]">
                                Price</th>
                            <th
                                class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-[#6b7280]">
                                Condition</th>
                            <th
                                class="px-6 py-3.5 text-left text-xs font-semibold uppercase tracking-wider text-[#6b7280]">
                                Status</th>
                            <th
                                class="px-6 py-3.5 text-right text-xs font-semibold uppercase tracking-wider text-[#6b7280]">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-[#f0ece3]">
                        @foreach ($products as $product)
                            @php
                                $statusMap = [
                                    'available' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                                    'reserved' => 'bg-amber-50 text-amber-700 border-amber-200',
                                    'sold' => 'bg-red-50 text-red-600 border-red-200',
                                ];
                                $condMap = [
                                    'new' => 'New',
                                    'like_new' => 'Like New',
                                    'good' => 'Good',
                                    'fair' => 'Fair',
                                ];
                                $imgSrc = $product->image
                                    ? (str_starts_with($product->image, '/') || str_starts_with($product->image, 'http')
                                        ? $product->image
                                        : asset('images/' . ltrim($product->image, '/')))
                                    : asset('images/products/Linen Blouse.jpg');
                                $image = $product->image;

                                if (!$image) {
                                    $image = 'images/products/Linen Blouse.jpg';
                                } elseif (
                                    !str_starts_with($image, 'images/products/') &&
                                    !str_starts_with($image, 'products/')
                                ) {
                                    $image = 'images/products/' . ltrim($image, '/');
                                } elseif (str_starts_with($image, 'products/')) {
                                    $image = 'images/' . $image;
                                }
                            @endphp
                            <tr class="hover:bg-[#fafaf8] transition-colors">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        <div
                                            class="w-12 h-12 rounded-xl overflow-hidden bg-[#f7f5ef] flex-shrink-0 border border-[#e7e2d8]">
                                            <img src="{{ asset($image) }}" alt="{{ $product->name }}"
                                                class="w-full h-full object-cover">
                                        </div>
                                        <div class="min-w-0">
                                            <p class="font-semibold text-[#181818] truncate max-w-[180px]">
                                                {{ $product->name }}</p>
                                            <p class="text-xs text-[#9ca3af]">{{ $product->slug }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-[#4b5563]">{{ $product->category ?? '—' }}</td>
                                <td class="px-6 py-4 font-medium text-[#181818]">Rp
                                    {{ number_format($product->price, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-[#4b5563]">{{ $condMap[$product->condition] ?? '—' }}</td>
                                <td class="px-6 py-4">
                                    <span
                                        class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-semibold border {{ $statusMap[$product->status] ?? 'bg-gray-50 text-gray-500 border-gray-200' }}">
                                        {{ ucfirst($product->status ?? 'available') }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.products.show', $product) }}"
                                            class="p-1.5 rounded-lg text-[#6b7280] hover:text-[#1d4f72] hover:bg-[#eef6fb] transition-colors"
                                            title="View">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>
                                        <a href="{{ route('admin.products.edit', $product) }}"
                                            class="p-1.5 rounded-lg text-[#6b7280] hover:text-[#1d4f72] hover:bg-[#eef6fb] transition-colors"
                                            title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        <form method="POST" action="{{ route('admin.products.destroy', $product) }}"
                                            onsubmit="return confirm('Delete \'{{ addslashes($product->name) }}\'? This cannot be undone.')">
                                            @csrf @method('DELETE')
                                            <button type="submit"
                                                class="p-1.5 rounded-lg text-[#6b7280] hover:text-[#b5474f] hover:bg-red-50 transition-colors"
                                                title="Delete">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if ($products->hasPages())
                <div class="px-6 py-4 border-t border-[#f0ece3] bg-[#f7f6f2]">
                    {{ $products->links() }}
                </div>
            @endif
        @endif
    </div>

    {{-- Result count --}}
    @if ($products->total() > 0)
        <p class="mt-3 text-xs text-[#9ca3af] text-right">
            Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of {{ $products->total() }} products
        </p>
    @endif

</x-admin-layout>
