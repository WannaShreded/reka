<x-admin-layout title="Edit Product">

    {{-- Header --}}
    <div class="mb-6 flex items-center gap-3">
        <a href="{{ route('admin.products.show', $product) }}"
            class="p-2 rounded-xl text-[#6b7280] hover:text-[#1d4f72] hover:bg-[#eef6fb] transition-colors">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
        </a>
        <div>
            <p class="text-xs font-semibold uppercase tracking-[0.25em] text-[#1d4f72] mb-0.5">Products → Edit</p>
            <h1 class="text-2xl font-semibold tracking-tight text-[#181818]">{{ $product->name }}</h1>
        </div>
    </div>

    <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data">
        @csrf @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Left column --}}
            <div class="lg:col-span-2 space-y-5">

                <div class="rounded-[24px] border border-[#e7e2d8] bg-white p-6 shadow-sm">
                    <h2 class="text-sm font-semibold text-[#181818] mb-4">Basic Information</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="name"
                                class="block text-xs font-semibold uppercase tracking-wider text-[#6b7280] mb-1.5">Product
                                Name <span class="text-red-500">*</span></label>
                            <input type="text" name="name" id="name"
                                value="{{ old('name', $product->name) }}" required
                                class="w-full px-4 py-3 text-sm border border-[#e7e2d8] rounded-xl bg-[#f7f5ef] focus:outline-none focus:border-[#1d4f72] focus:ring-1 focus:ring-[#1d4f72] transition-all">
                            @error('name')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="category"
                                    class="block text-xs font-semibold uppercase tracking-wider text-[#6b7280] mb-1.5">Category
                                    <span class="text-red-500">*</span></label>
                                <input type="text" name="category" id="category"
                                    value="{{ old('category', $product->category) }}" required list="category-list"
                                    class="w-full px-4 py-3 text-sm border border-[#e7e2d8] rounded-xl bg-[#f7f5ef] focus:outline-none focus:border-[#1d4f72] focus:ring-1 focus:ring-[#1d4f72] transition-all">
                                <datalist id="category-list">
                                    @foreach ($categories as $cat)
                                        <option value="{{ $cat }}">
                                    @endforeach
                                </datalist>
                                @error('category')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="price"
                                    class="block text-xs font-semibold uppercase tracking-wider text-[#6b7280] mb-1.5">Price
                                    (Rp) <span class="text-red-500">*</span></label>
                                <input type="number" name="price" id="price"
                                    value="{{ old('price', $product->price) }}" required min="0"
                                    class="w-full px-4 py-3 text-sm border border-[#e7e2d8] rounded-xl bg-[#f7f5ef] focus:outline-none focus:border-[#1d4f72] focus:ring-1 focus:ring-[#1d4f72] transition-all">
                                @error('price')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label for="description"
                                class="block text-xs font-semibold uppercase tracking-wider text-[#6b7280] mb-1.5">Description</label>
                            <textarea name="description" id="description" rows="5"
                                class="w-full px-4 py-3 text-sm border border-[#e7e2d8] rounded-xl bg-[#f7f5ef] focus:outline-none focus:border-[#1d4f72] focus:ring-1 focus:ring-[#1d4f72] transition-all resize-none">{{ old('description', $product->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Images --}}
                <div class="rounded-[24px] border border-[#e7e2d8] bg-white p-6 shadow-sm">
                    <h2 class="text-sm font-semibold text-[#181818] mb-1">Images</h2>
                    <p class="text-xs text-[#9ca3af] mb-4">Upload new images to replace all existing ones. Leave empty
                        to keep current images.</p>

                    {{-- Existing images --}}
                    @php
                        $existingImages = $product->images;

                        if (is_string($existingImages)) {
                            $decoded = json_decode($existingImages, true);

                            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                                $existingImages = $decoded;
                            } else {
                                $existingImages = [$existingImages];
                            }
                        }

                        $existingImages = is_array($existingImages) ? $existingImages : [];

                        if (empty($existingImages) && !empty($product->image)) {
                            $existingImages = [$product->image];
                        }
                    @endphp
                    @if (!empty($existingImages))
                        <div class="mb-4">
                            <p class="text-xs font-medium text-[#6b7280] mb-2">Current images:</p>
                            <div class="grid grid-cols-3 sm:grid-cols-5 gap-3">
                                @foreach ($existingImages as $i => $img)
                                    @php
                                        $imgSrc =
                                            str_starts_with($img, '/') || str_starts_with($img, 'http')
                                                ? $img
                                                : asset('images/' . ltrim($img, '/'));
                                    @endphp
                                    <div
                                        class="relative aspect-square rounded-xl overflow-hidden border border-[#e7e2d8] bg-[#f7f5ef]">
                                        <img src="{{ $imgSrc }}" alt="Product image {{ $i + 1 }}"
                                            class="w-full h-full object-cover">
                                        @if ($i === 0)
                                            <span
                                                class="absolute top-1 left-1 bg-[#1d4f72] text-white text-[10px] font-bold px-1.5 py-0.5 rounded-md">Main</span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <label for="images"
                        class="flex flex-col items-center justify-center w-full h-28 border-2 border-dashed border-[#d1d5db] rounded-2xl cursor-pointer hover:border-[#1d4f72] hover:bg-[#f0f8ff] transition-all group">
                        <svg class="w-7 h-7 text-[#9ca3af] group-hover:text-[#1d4f72] mb-1 transition-colors"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <p class="text-xs font-medium text-[#6b7280] group-hover:text-[#1d4f72] transition-colors">
                            Replace images</p>
                        <input type="file" name="images[]" id="images" multiple accept="image/*" class="hidden"
                            onchange="previewNew(this)">
                    </label>

                    <div id="new-preview" class="mt-3 grid grid-cols-3 sm:grid-cols-5 gap-3 hidden"></div>
                </div>
            </div>

            {{-- Right column --}}
            <div class="space-y-5">
                <div class="rounded-[24px] border border-[#e7e2d8] bg-white p-6 shadow-sm">
                    <h2 class="text-sm font-semibold text-[#181818] mb-4">Listing Details</h2>
                    <div class="space-y-4">
                        <div>
                            <label for="condition"
                                class="block text-xs font-semibold uppercase tracking-wider text-[#6b7280] mb-1.5">Condition</label>
                            <select name="condition" id="condition"
                                class="w-full px-4 py-3 text-sm border border-[#e7e2d8] rounded-xl bg-[#f7f5ef] focus:outline-none focus:border-[#1d4f72] transition-all text-[#4b5563]">
                                <option value="">— Select —</option>
                                <option value="new"
                                    {{ old('condition', $product->condition) == 'new' ? 'selected' : '' }}>New
                                </option>
                                <option value="like_new"
                                    {{ old('condition', $product->condition) == 'like_new' ? 'selected' : '' }}>Like
                                    New</option>
                                <option value="good"
                                    {{ old('condition', $product->condition) == 'good' ? 'selected' : '' }}>Good
                                </option>
                                <option value="fair"
                                    {{ old('condition', $product->condition) == 'fair' ? 'selected' : '' }}>Fair
                                </option>
                            </select>
                        </div>

                        <div>
                            <label for="sizes"
                                class="block text-xs font-semibold uppercase tracking-wider text-[#6b7280] mb-1.5">Size</label>
                            @php
                                $currentSize = old(
                                    'sizes',
                                    is_array($product->sizes ?? null)
                                        ? $product->sizes[0] ?? ''
                                        : $product->sizes ?? '',
                                );
                            @endphp
                            <select name="sizes" id="sizes"
                                class="w-full px-4 py-3 text-sm border border-[#e7e2d8] rounded-xl bg-[#f7f5ef] focus:outline-none focus:border-[#1d4f72] transition-all text-[#4b5563]">
                                <option value="">— Select —</option>
                                <option value="S" {{ $currentSize == 'S' ? 'selected' : '' }}>S</option>
                                <option value="M" {{ $currentSize == 'M' ? 'selected' : '' }}>M</option>
                                <option value="L" {{ $currentSize == 'L' ? 'selected' : '' }}>L</option>
                                <option value="XL" {{ $currentSize == 'XL' ? 'selected' : '' }}>XL</option>
                            </select>
                            @error('sizes')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="status"
                                class="block text-xs font-semibold uppercase tracking-wider text-[#6b7280] mb-1.5">Status
                                <span class="text-red-500">*</span></label>
                            <select name="status" id="status" required
                                class="w-full px-4 py-3 text-sm border border-[#e7e2d8] rounded-xl bg-[#f7f5ef] focus:outline-none focus:border-[#1d4f72] transition-all text-[#4b5563]">
                                <option value="available"
                                    {{ old('status', $product->status) == 'available' ? 'selected' : '' }}>Available
                                </option>
                                <option value="reserved"
                                    {{ old('status', $product->status) == 'reserved' ? 'selected' : '' }}>Reserved
                                </option>
                                <option value="sold"
                                    {{ old('status', $product->status) == 'sold' ? 'selected' : '' }}>Sold
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="rounded-[24px] border border-[#e7e2d8] bg-white p-6 shadow-sm space-y-3">
                    <button type="submit"
                        class="w-full py-3 rounded-xl bg-[#1d4f72] text-white text-sm font-semibold shadow-[0_8px_20px_rgba(29,79,114,0.25)] hover:bg-[#153b54] transition-all duration-200">
                        Save Changes
                    </button>
                    <a href="{{ route('admin.products.show', $product) }}"
                        class="block w-full py-3 rounded-xl text-center text-sm font-medium text-[#4b5563] border border-[#e7e2d8] hover:bg-[#f7f5ef] transition-colors">
                        Cancel
                    </a>

                </div>

                {{-- Slug --}}
                <div class="rounded-[20px] border border-[#e7e2d8] bg-[#f7f6f2] px-5 py-4">
                    <p class="text-xs font-semibold text-[#6b7280] uppercase tracking-wider mb-1">Slug</p>
                    <p class="text-sm text-[#4b5563] font-mono break-all">{{ $product->slug }}</p>
                </div>
            </div>
        </div>
    </form>

    <form method="POST" action="{{ route('admin.products.destroy', $product) }}"
        onsubmit="return confirm('Delete \'{{ addslashes($product->name) }}\'?')">
        @csrf @method('DELETE')
        <button type="submit"
            class="w-full py-2.5 rounded-xl text-sm font-medium text-[#b5474f] border border-red-200 hover:bg-red-50 transition-colors">
            Delete Product
        </button>
    </form>

    <script>
        function previewNew(input) {
            const preview = document.getElementById('new-preview');
            preview.innerHTML = '';
            if (!input.files || !input.files.length) {
                preview.classList.add('hidden');
                return;
            }
            preview.classList.remove('hidden');
            [...input.files].forEach((file, i) => {
                const reader = new FileReader();
                reader.onload = e => {
                    const div = document.createElement('div');
                    div.className =
                        'relative aspect-square rounded-xl overflow-hidden border-2 border-[#1d4f72] bg-[#f7f5ef]';
                    div.innerHTML =
                        `<img src="${e.target.result}" class="w-full h-full object-cover">
                    ${i === 0 ? '<span class="absolute top-1 left-1 bg-[#1d4f72] text-white text-[10px] font-bold px-1.5 py-0.5 rounded-md">New Main</span>' : ''}`;
                    preview.appendChild(div);
                };
                reader.readAsDataURL(file);
            });
        }
    </script>

</x-admin-layout>
