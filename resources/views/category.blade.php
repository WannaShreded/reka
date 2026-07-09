<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Category Page | REKA Furniture</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="page-shell bg-[#f7f7f2] text-reka-text antialiased">
    <header class="sticky top-0 z-40 border-b border-reka-border/80 bg-white/90 backdrop-blur">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-4">
            <a href="/" class="flex items-center gap-2 text-xl font-bold tracking-[0.25em] text-reka-blue uppercase">
                <span class="flex h-8 w-8 items-center justify-center rounded-md bg-reka-yellow text-sm font-black text-reka-text">R</span>
                REKA
            </a>
            <nav class="hidden items-center gap-6 text-sm font-medium text-reka-text-secondary md:flex">
                <a href="/" class="transition hover:text-reka-blue">Home</a>
                <a href="/category" class="transition hover:text-reka-blue">Shop</a>
                <a href="#" class="transition hover:text-reka-blue">Rooms</a>
                <a href="#" class="transition hover:text-reka-blue">Inspiration</a>
            </nav>
            <a href="/category" class="btn-secondary px-4 py-2 text-sm">Browse</a>
        </div>
    </header>

    <main class="page-shell-inner">
        <nav class="text-sm text-reka-text-muted">
            <div class="flex flex-wrap items-center gap-2">
                <a href="/" class="transition hover:text-reka-blue">Home</a>
                <span>/</span>
                <a href="/category" class="transition hover:text-reka-blue">Furniture</a>
                <span>/</span>
                <span class="text-reka-text">Living Room</span>
            </div>
        </nav>

        <div class="mt-4">
            @include('partials.category-toolbar-filters')

            <section class="mt-0">
                <div class="panel-card flex flex-col gap-4 px-5 py-5 md:flex-row md:items-end md:justify-between">
                    <div>
                        <p class="page-kicker">Collection</p>
                        <h1 class="page-heading mt-2">Living Room Furniture</h1>
                        <p class="page-subtitle max-w-2xl">Comfort-driven seating, sculptural tables, and storage crafted to anchor your everyday rituals.</p>
                    </div>
                    <div class="flex flex-wrap items-center gap-3">
                        <span id="product-count" class="text-sm text-reka-text-muted">{{ count($products) }} products</span>
                        <label class="flex items-center gap-2 text-sm text-reka-text-secondary">
                            <span>Sort by</span>
                            <select class="rounded-full border border-reka-border bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-reka-blue/20">
                                <option>Recommended</option>
                                <option>Price: Low to High</option>
                                <option>Price: High to Low</option>
                                <option>Newest</option>
                            </select>
                        </label>
                    </div>
                </div>

                <div class="mt-6 grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
                    @foreach($products as $slug => $product)
                        <article class="section-card group flex h-full flex-col overflow-hidden transition duration-300 hover:-translate-y-1 hover:shadow-xl" data-product-card data-sizes="{{ implode(',', $product['sizes']) }}">
                            <div class="relative">
                                <a href="{{ route('product-detail', ['slug' => $slug]) }}" class="block">
                                    <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="aspect-[4/3] w-full object-cover transition duration-500 group-hover:scale-105">
                                </a>
                                <span class="absolute left-3 top-3 rounded-full bg-reka-blue px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.2em] text-white">{{ $product['badge'] ?? 'New' }}</span>
                                <form action="{{ route('wishlist.add') }}" method="POST" class="absolute right-3 top-3">
                                    @csrf
                                    <input type="hidden" name="product_slug" value="{{ $slug }}">
                                    <button type="submit" class="flex h-10 w-10 items-center justify-center rounded-full bg-white/90 text-reka-text transition hover:bg-white" aria-label="Add to wishlist">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                    </button>
                                </form>
                            </div>
                            <div class="flex flex-1 flex-col p-5">
                                <div class="flex items-center justify-between gap-3">
                                    <div class="flex items-center gap-1 text-reka-yellow">
                                        <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <span class="text-sm font-semibold text-reka-text">{{ $product['rating'] }}</span>
                                    </div>
                                    <span class="text-xs font-medium uppercase tracking-[0.2em] text-reka-text-muted">Free delivery</span>
                                </div>
                                <h3 class="mt-4 text-lg font-semibold text-reka-text"><a href="{{ route('product-detail', ['slug' => $slug]) }}" class="hover:text-reka-blue">{{ $product['name'] }}</a></h3>
                                <p class="mt-2 text-sm leading-6 text-reka-text-muted line-clamp-2">{{ $product['description'] }}</p>
                                <div class="mt-5 flex items-center justify-between pt-3 border-t border-reka-border">
                                    <span class="text-lg font-bold text-reka-text">Rp {{ number_format($product['price'], 0, ',', '.') }}</span>
                                    <a href="{{ route('product-detail', ['slug' => $slug]) }}" class="rounded-full bg-reka-blue px-4 py-2 text-sm font-semibold text-white transition hover:bg-reka-blue-dark">View</a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                <div class="mt-10 flex flex-wrap items-center justify-center gap-2">
                    <a href="#" class="btn-secondary px-4 py-2 text-sm">Previous</a>
                    <a href="#" class="btn-primary px-4 py-2 text-sm">1</a>
                    <a href="#" class="btn-secondary px-4 py-2 text-sm">2</a>
                    <a href="#" class="btn-secondary px-4 py-2 text-sm">3</a>
                    <a href="#" class="btn-secondary px-4 py-2 text-sm">Next</a>
                </div>
            </section>
        </div>
    </main>

    <footer class="mt-12 border-t border-reka-border bg-white/90">
        <div class="mx-auto flex max-w-7xl flex-col gap-2 px-6 py-6 text-sm text-reka-text-muted md:flex-row md:items-center md:justify-between">
            <p>REKA — crafted interiors for modern living.</p>
            <p>Free delivery • Easy returns • 24/7 customer support</p>
        </div>
    </footer>

    <script>
        const menuContainers = Array.from(document.querySelectorAll('[data-filter-menu]'));
        const sizeButtons = Array.from(document.querySelectorAll('[data-size-option]'));
        const activeFilterRow = document.getElementById('active-filter-row');
        const productCards = Array.from(document.querySelectorAll('[data-product-card]'));
        const productCount = document.getElementById('product-count');
        const sizeOrder = ['XS', 'S', 'M', 'L', 'XL'];
        const selectedSizes = new Set();

        const closeAllMenus = () => {
            menuContainers.forEach((menu) => {
                const panel = menu.querySelector('[data-filter-panel]');
                if (panel) {
                    panel.classList.add('hidden');
                }
            });
        };

        const updateSizeFilters = () => {
            sizeButtons.forEach((button) => {
                const value = button.dataset.sizeValue;
                const isSelected = selectedSizes.has(value);

                button.classList.toggle('border-reka-blue', isSelected);
                button.classList.toggle('bg-reka-blue/10', isSelected);
                button.classList.toggle('text-reka-blue', isSelected);
                button.classList.toggle('border-gray-200', !isSelected);
                button.classList.toggle('bg-white', !isSelected);
                button.classList.toggle('text-reka-text-secondary', !isSelected);
                button.setAttribute('aria-pressed', String(isSelected));
            });

            const activeLabels = sizeOrder.filter((size) => selectedSizes.has(size));
            const visibleCards = productCards.filter((card) => {
                if (selectedSizes.size === 0) {
                    return true;
                }

                const sizes = (card.dataset.sizes || '').split(',').filter(Boolean);
                return sizes.some((size) => selectedSizes.has(size));
            });

            productCards.forEach((card) => {
                card.classList.toggle('hidden', !visibleCards.includes(card));
            });

            if (productCount) {
                productCount.textContent = `${visibleCards.length} product${visibleCards.length === 1 ? '' : 's'}`;
            }

            if (activeLabels.length > 0) {
                activeFilterRow?.classList.remove('hidden');
                activeFilterRow?.classList.add('flex');
                activeFilterRow.innerHTML = `
                    ${activeLabels.map((size) => `<span class="rounded-full bg-reka-blue/10 px-2.5 py-1 text-[11px] font-medium text-reka-blue">${size} ×</span>`).join('')}
                    <button type="button" class="ml-auto text-sm font-semibold text-reka-text-secondary hover:text-reka-blue" data-clear-size-filters>Clear All</button>
                `;
            } else {
                activeFilterRow?.classList.add('hidden');
                activeFilterRow?.classList.remove('flex');
                activeFilterRow.innerHTML = '';
            }
        };

        sizeButtons.forEach((button) => {
            button.addEventListener('click', (event) => {
                event.stopPropagation();
                const value = button.dataset.sizeValue;

                if (selectedSizes.has(value)) {
                    selectedSizes.delete(value);
                } else {
                    selectedSizes.add(value);
                }

                updateSizeFilters();
            });
        });

        document.addEventListener('click', (event) => {
            const clearButton = event.target.closest('[data-clear-size-filters]');
            if (clearButton) {
                selectedSizes.clear();
                updateSizeFilters();
                return;
            }

            if (!event.target.closest('[data-filter-menu]')) {
                closeAllMenus();
            }
        });

        menuContainers.forEach((menu) => {
            const toggle = menu.querySelector('[data-filter-toggle]');
            const panel = menu.querySelector('[data-filter-panel]');

            toggle?.addEventListener('click', (event) => {
                event.stopPropagation();

                const isOpen = !panel?.classList.contains('hidden');
                closeAllMenus();

                if (!isOpen) {
                    panel?.classList.remove('hidden');
                }
            });
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape') {
                closeAllMenus();
            }
        });

        updateSizeFilters();
    </script>
</body>
</html>
