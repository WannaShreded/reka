<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Category Page | REKA Clothing</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="page-shell bg-[#f7f7f2] text-reka-text antialiased">
    <header class="sticky top-0 z-40 border-b border-reka-border/80 bg-white/90 backdrop-blur">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
            <a href="/" class="flex items-center gap-2 text-xl font-bold tracking-[0.25em] text-reka-blue uppercase">
                <span class="flex h-8 w-8 items-center justify-center rounded-md bg-reka-yellow text-sm font-black text-reka-text">R</span>
                REKA
            </a>
            <nav class="hidden items-center gap-6 text-sm font-medium text-reka-text-secondary md:flex">
                <a href="/" class="transition hover:text-reka-blue">Home</a>
                <a href="/category" class="transition hover:text-reka-blue">Shop</a>
                <a href="/#featured" class="transition hover:text-reka-blue">Collections</a>
                <a href="/#promotions" class="transition hover:text-reka-blue">Inspiration</a>
            </nav>
            <a href="/category" class="btn-secondary px-4 py-2 text-sm">Browse</a>
        </div>
    </header>

    <main class="page-shell-inner">
        <nav class="text-sm text-reka-text-muted">
            <div class="flex flex-wrap items-center gap-2">
                <a href="/" class="transition hover:text-reka-blue">Home</a>
                <span>/</span>
                <a href="/category" class="transition hover:text-reka-blue">Clothing</a>
                <span>/</span>
                <span class="text-reka-text">Collection</span>
            </div>
        </nav>

        <div class="mt-4">
            @include('shop.partials.category-toolbar-filters')

            <section class="mt-0">
                <div class="surface-card flex flex-col gap-4 px-5 py-5 md:flex-row md:items-end md:justify-between">
                    <div>
                        <p class="page-kicker">Collection</p>
                        <h1 class="page-heading mt-2">Clothing Collection</h1>
                        <p class="page-subtitle max-w-2xl">Everyday apparel designed for comfort, style, and versatile layering.</p>
                    </div>
                    <div class="flex flex-wrap items-center gap-3">
                        <span id="product-count" class="text-sm text-reka-text-muted">{{ $products->total() }} products</span>
                    </div>
                </div>

                <div class="mt-6 grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
                    @foreach($products as $product)
                        <article class="section-card group flex h-full flex-col overflow-hidden transition duration-300 hover:-translate-y-1 hover:shadow-[0_16px_40px_rgba(17,17,17,0.08)]" data-product-card data-sizes="{{ implode(',', $product->sizes) }}">
                            <div class="relative">
                                <a href="{{ route('product-detail', ['slug' => $product->slug]) }}" class="block">
                                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="aspect-[4/3] w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy">
                                </a>
                                <span class="absolute left-3 top-3 rounded-full bg-reka-blue px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.2em] text-white">{{ $product->badge ?? 'New' }}</span>
                                <form action="{{ route('wishlist.add') }}" method="POST" class="absolute right-3 top-3">
                                    @csrf
                                    <input type="hidden" name="product_slug" value="{{ $product->slug }}">
                                    <button type="submit" class="flex h-10 w-10 items-center justify-center rounded-full bg-white/90 text-reka-text transition hover:bg-white" aria-label="Add to wishlist">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                                    </button>
                                </form>
                            </div>
                            <div class="flex flex-1 flex-col p-5">
                                <div class="flex items-center justify-between gap-3">
                                    <div class="flex items-center gap-1 text-reka-yellow">
                                        <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                        <span class="text-sm font-semibold text-reka-text">{{ $product->rating }}</span>
                                    </div>
                                </div>
                                <h3 class="mt-4 text-lg font-semibold text-reka-text"><a href="{{ route('product-detail', ['slug' => $product->slug]) }}" class="hover:text-reka-blue">{{ $product->name }}</a></h3>
                                <p class="mt-2 text-sm leading-6 text-reka-text-muted line-clamp-2">{{ $product->description }}</p>
                                <div class="mt-5 flex items-center justify-between pt-3 border-t border-reka-border">
                                    <div>
                                        <span class="text-lg font-bold text-reka-text">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                        @if((int) $product->stock > 0)
                                            <p class="mt-1 text-xs font-semibold uppercase tracking-[0.2em] text-emerald-600">Tersedia</p>
                                        @else
                                            <p class="mt-1 text-xs font-semibold uppercase tracking-[0.2em] text-rose-600">Barang Habis</p>
                                        @endif
                                    </div>
                                    <a href="{{ route('product-detail', ['slug' => $product->slug]) }}" class="btn-primary px-4 py-2 text-sm">View</a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                @if($products->hasPages())
                    <div class="mt-10 flex flex-wrap items-center justify-center gap-2">
                        @if($products->onFirstPage())
                            <span class="btn-secondary cursor-not-allowed px-4 py-2 text-sm opacity-50">Previous</span>
                        @else
                            <a href="{{ $products->previousPageUrl() }}" class="btn-secondary px-4 py-2 text-sm">Previous</a>
                        @endif

                        @foreach(range(1, $products->lastPage()) as $page)
                            @if($page === $products->currentPage())
                                <span class="btn-primary px-4 py-2 text-sm">{{ $page }}</span>
                            @else
                                <a href="{{ $products->url($page) }}" class="btn-secondary px-4 py-2 text-sm">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if($products->hasMorePages())
                            <a href="{{ $products->nextPageUrl() }}" class="btn-secondary px-4 py-2 text-sm">Next</a>
                        @else
                            <span class="btn-secondary cursor-not-allowed px-4 py-2 text-sm opacity-50">Next</span>
                        @endif
                    </div>
                @endif
            </section>
        </div>
    </main>

    <footer class="mt-12 border-t border-reka-border bg-white/90">
        <div class="mx-auto flex max-w-7xl flex-col gap-2 px-6 py-6 text-sm text-reka-text-muted md:flex-row md:items-center md:justify-between">
            <p>REKA — crafted interiors for modern living.</p>
            <p>Free delivery • Easy returns • 24/7 customer support</p>
        </div>
    </footer>
</body>
</html>
