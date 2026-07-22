<x-admin-layout title="{{ $product->name }}">

    {{-- Header --}}
    <div class="mb-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div class="flex items-center gap-3">
            <a href="{{ route('admin.products.index') }}"
                class="p-2 rounded-xl text-[#6b7280] hover:text-[#1d4f72] hover:bg-[#eef6fb] transition-colors">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
            </a>
            <div>
                <p class="text-xs font-semibold uppercase tracking-[0.25em] text-[#1d4f72] mb-0.5">Products</p>
                <h1 class="text-2xl font-semibold tracking-tight text-[#181818]">{{ $product->name }}</h1>
            </div>
        </div>
        <div class="flex gap-2">
            <a href="{{ route('admin.products.edit', $product) }}"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full bg-[#1d4f72] text-white text-sm font-semibold shadow-[0_8px_20px_rgba(29,79,114,0.20)] hover:bg-[#153b54] transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
                Edit
            </a>
            <a href="{{ route('product-detail', $product->slug) }}" target="_blank"
                class="inline-flex items-center gap-2 px-5 py-2.5 rounded-full border border-[#e7e2d8] text-[#4b5563] text-sm font-medium hover:bg-[#f7f5ef] hover:border-[#1d4f72] hover:text-[#1d4f72] transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
                View on Shop
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Images --}}
        <div class="lg:col-span-2">
            @php
                $images = $product->images ?? [];
                if (empty($images) && $product->image) {
                    $images = [$product->image];
                }
            @endphp
            @if (!empty($images))
                <div
                    class="rounded-[28px] border border-[#e7e2d8] bg-white shadow-[0_12px_35px_rgba(17,17,17,0.05)] overflow-hidden mb-6">
                    {{-- Main image --}}
                    @php
                        // Pastikan $images selalu array
                        if (is_string($images)) {
                            $decoded = json_decode($images, true);

                            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                                $images = $decoded;
                            } else {
                                $images = [$images];
                            }
                        }

                        $images = is_array($images) ? $images : [];

                        // Ambil gambar utama
                        $mainImg = $images[0] ?? $product->image;

                        if ($mainImg) {
                            if (str_starts_with($mainImg, '/') || str_starts_with($mainImg, 'http')) {
                                $mainSrc = $mainImg;
                            } else {
                                $mainSrc = asset('images/' . ltrim($mainImg, '/'));
                            }
                        } else {
                            $mainSrc = asset('images/products/default-product.jpg');
                        }
                    @endphp
                    <div class="aspect-[4/3] bg-[#f7f5ef]">
                        <img src="{{ $mainSrc }}" alt="{{ $product->name }}" class="w-full h-full object-cover"
                            id="main-img">
                    </div>
                    {{-- Thumbnails --}}
                    @if (count($images) > 1)
                        <div class="p-4 flex gap-3 overflow-x-auto">
                            @foreach ($images as $i => $img)
                                @php $src = str_starts_with($img, '/') || str_starts_with($img, 'http') ? $img : asset('images/' . ltrim($img, '/')); @endphp
                                <button type="button"
                                    onclick="document.getElementById('main-img').src='{{ $src }}'"
                                    class="flex-shrink-0 w-16 h-16 rounded-xl overflow-hidden border-2 {{ $i === 0 ? 'border-[#1d4f72]' : 'border-[#e7e2d8]' }} hover:border-[#1d4f72] transition-colors">
                                    <img src="{{ $src }}" alt="Image {{ $i + 1 }}"
                                        class="w-full h-full object-cover">
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>
            @endif

            {{-- Description --}}
            @if ($product->description)
                <div class="rounded-[24px] border border-[#e7e2d8] bg-white p-6 shadow-sm">
                    <h2 class="text-sm font-semibold text-[#181818] mb-3">Description</h2>
                    <p class="text-sm text-[#4b5563] leading-relaxed whitespace-pre-line">{{ $product->description }}
                    </p>
                </div>
            @endif
        </div>

        {{-- Details sidebar --}}
        <div class="space-y-5">

            {{-- Status & details --}}
            <div class="rounded-[24px] border border-[#e7e2d8] bg-white p-6 shadow-sm">
                @php
                    $statusColors = [
                        'available' => 'bg-emerald-50 text-emerald-700 border-emerald-200',
                        'reserved' => 'bg-amber-50 text-amber-700 border-amber-200',
                        'sold' => 'bg-red-50 text-red-600 border-red-200',
                    ];
                    $condLabels = ['new' => 'New', 'like_new' => 'Like New', 'good' => 'Good', 'fair' => 'Fair'];
                @endphp
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-sm font-semibold text-[#181818]">Details</h2>
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold border {{ $statusColors[$product->status ?? 'available'] ?? 'bg-gray-50 text-gray-500 border-gray-200' }}">
                        {{ ucfirst($product->status ?? 'available') }}
                    </span>
                </div>

                <dl class="space-y-3 text-sm">
                    <div class="flex justify-between">
                        <dt class="text-[#9ca3af]">Price</dt>
                        <dd class="font-semibold text-[#181818]">Rp {{ number_format($product->price, 0, ',', '.') }}
                        </dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-[#9ca3af]">Category</dt>
                        <dd class="text-[#4b5563]">{{ $product->category ?? '—' }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-[#9ca3af]">Condition</dt>
                        <dd class="text-[#4b5563]">{{ $condLabels[$product->condition] ?? '—' }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-[#9ca3af]">Slug</dt>
                        <dd class="text-[#4b5563] font-mono text-xs">{{ $product->slug }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-[#9ca3af]">Listed</dt>
                        <dd class="text-[#4b5563]">{{ $product->created_at->format('d M Y') }}</dd>
                    </div>
                    <div class="flex justify-between">
                        <dt class="text-[#9ca3af]">Updated</dt>
                        <dd class="text-[#4b5563]">{{ $product->updated_at->format('d M Y') }}</dd>
                    </div>
                </dl>
            </div>

            {{-- Actions --}}
            <div class="rounded-[24px] border border-[#e7e2d8] bg-white p-6 shadow-sm space-y-3">
                <a href="{{ route('admin.products.edit', $product) }}"
                    class="block w-full py-3 rounded-xl text-center text-sm font-semibold bg-[#1d4f72] text-white shadow-[0_8px_20px_rgba(29,79,114,0.20)] hover:bg-[#153b54] transition-all">
                    Edit Product
                </a>
                <form method="POST" action="{{ route('admin.products.destroy', $product) }}"
                    onsubmit="return confirm('Delete \'{{ addslashes($product->name) }}\'? This cannot be undone.')">
                    @csrf @method('DELETE')
                    <button type="submit"
                        class="w-full py-2.5 rounded-xl text-sm font-medium text-[#b5474f] border border-red-200 hover:bg-red-50 transition-colors">
                        Delete Product
                    </button>
                </form>
            </div>
        </div>
    </div>

</x-admin-layout>
