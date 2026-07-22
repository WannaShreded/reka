<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="REKA - Premium clothing for everyday life. Modern, effortless style built for comfort and wearability.">

    <title>Category Page | REKA Clothing</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-white text-reka-text selection:bg-reka-blue-light selection:text-reka-blue">

    <!-- ─── STICKY NAVIGATION BAR ─── -->
    <header id="navbar" class="premium-nav sticky top-0 w-full z-50">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between sm:px-6 lg:px-8">
            <!-- Left: Logo -->
            <a href="/"
                class="text-2xl font-bold text-reka-blue tracking-widest uppercase flex items-center gap-1.5">
                <span
                    class="w-6 h-6 bg-reka-yellow rounded-md flex items-center justify-center text-reka-text text-sm font-black">R</span>
                REKA
            </a>

            <!-- Center: Navigation Links -->
            <nav class="hidden lg:flex items-center gap-8">
                <a href="/category"
                    class="py-1 text-sm font-medium text-reka-blue transition-colors hover:text-reka-blue">Products</a>
                <a href="/#featured"
                    class="py-1 text-sm font-medium text-reka-text-secondary transition-colors hover:text-reka-blue">Featured</a>
                <a href="/#promotions"
                    class="py-1 text-sm font-medium text-reka-text-secondary transition-colors hover:text-reka-blue">Offers</a>
                <a href="/#reviews"
                    class="py-1 text-sm font-medium text-reka-text-secondary transition-colors hover:text-reka-blue">Review</a>
                <a href="/about"
                    class="py-1 text-sm font-medium text-reka-text-secondary transition-colors hover:text-reka-blue">About
                    Us</a>
            </nav>

            <!-- Right: Search & Actions -->
            <div class="flex items-center gap-5">
                <!-- Search Bar (Desktop) -->
                <form action="{{ route('search') }}" method="GET" class="hidden md:flex items-center relative w-72">
                    <input type="text" name="query" placeholder="What are you looking for?"
                        class="w-full pl-10 pr-4 py-2.5 bg-[color:rgba(247,245,239,0.7)] border border-[color:rgba(231,226,216,0.8)] focus:border-reka-blue rounded-full text-sm focus:outline-none transition-all placeholder:text-reka-text-muted shadow-sm">
                    <svg class="w-4 h-4 text-reka-text-secondary absolute left-3.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </form>

                <!-- Wishlist Icon -->
                <a href="{{ Auth::check() ? route('wishlist') : route('login') }}"
                    class="relative p-1 text-reka-text hover:text-reka-blue transition-colors" aria-label="Wishlist">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    <span id="wishlist-count"
                        class="absolute -top-1 -right-1 bg-reka-error text-white text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">{{ $wishlistCount ?? 0 }}</span>
                </a>

                <!-- Cart Icon -->
                <a href="{{ Auth::check() ? route('cart') : route('login') }}"
                    class="relative p-1 text-reka-text hover:text-reka-blue transition-colors"
                    aria-label="Shopping Cart">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                    </svg>
                    <span id="cart-count"
                        class="absolute -top-1 -right-1 bg-reka-blue text-white text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">{{ $cartCount ?? 0 }}</span>
                </a>

                <!-- Account Icon -->
                <a href="{{ Auth::check() ? route('profile.edit') : route('login') }}"
                    class="p-1 text-reka-text hover:text-reka-blue transition-colors hidden md:block"
                    aria-label="My Account">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                </a>

                @auth
                    <form method="POST" action="{{ route('logout') }}" class="hidden md:block">
                        @csrf
                        <button type="submit" class="p-1 text-reka-text hover:text-reka-blue transition-colors"
                            aria-label="Log out">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6A2.25 2.25 0 005.25 5.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m-3-3h8.25m0 0l-3-3m3 3l-3 3" />
                            </svg>
                        </button>
                    </form>
                @endauth

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="lg:hidden p-1 text-reka-text focus:outline-none"
                    aria-label="Toggle Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path class="menu-open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path class="menu-close hidden" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu (Hidden by default) -->
        <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-reka-border">
            <div class="px-6 py-4 flex flex-col gap-4">
                <a href="{{ route('category') }}"
                    class="text-base font-semibold py-2 border-b border-reka-surface">Products</a>
                <a href="/#featured" class="text-base font-semibold py-2 border-b border-reka-surface">Featured</a>
                <a href="/#promotions" class="text-base font-semibold py-2 border-b border-reka-surface">Offers</a>
                <a href="/#reviews" class="text-base font-semibold py-2 border-b border-reka-surface">Reviews</a>
                <a href="/about" class="text-base font-semibold py-2 border-b border-reka-surface">About Us</a>
                <form action="{{ route('search') }}" method="GET" class="pt-2 flex items-center relative">
                    <input type="text" name="query" placeholder="What are you looking for?"
                        class="w-full pl-10 pr-4 py-2.5 bg-reka-surface border border-reka-border rounded-lg text-sm focus:outline-none focus:border-reka-blue">
                    <svg class="w-4 h-4 text-reka-text-secondary absolute left-3.5" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </form>
            </div>
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
                        <p class="page-subtitle max-w-2xl">Everyday apparel designed for comfort, style, and versatile
                            layering.</p>
                    </div>
                    <div class="flex flex-wrap items-center gap-3">
                        <span id="product-count" class="text-sm text-reka-text-muted">{{ $products->total() }}
                            products</span>
                    </div>
                </div>

                <div class="mt-6 grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
                    @foreach ($products as $product)
                        <article class="product-card group flex h-full flex-col overflow-hidden" data-product-card
                            data-sizes="{{ $product->sizes }}">
                            <div class="relative">
                                <a href="{{ route('product-detail', ['slug' => $product->slug]) }}" class="block">
                                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}"
                                        class="aspect-[4/3] w-full object-cover transition duration-500 group-hover:scale-105"
                                        loading="lazy">
                                </a>
                                <span
                                    class="absolute left-3 top-3 rounded-full bg-reka-blue px-3 py-1 text-[10px] font-semibold uppercase tracking-[0.2em] text-white">{{ $product->badge ?? 'New' }}</span>
                                <form action="{{ route('wishlist.add') }}" method="POST"
                                    class="absolute right-3 top-3">
                                    @csrf
                                    <input type="hidden" name="product_slug" value="{{ $product->slug }}">
                                    <button type="submit"
                                        class="flex h-10 w-10 items-center justify-center rounded-full bg-white/90 text-reka-text transition hover:bg-white"
                                        aria-label="Add to wishlist">
                                        <svg class="h-5 w-5" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <div class="flex flex-1 flex-col p-5">
                                <div class="flex items-center justify-between gap-3">
                                    <div class="flex items-center gap-1 text-reka-yellow">
                                        <svg class="h-4 w-4 fill-current" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        <span
                                            class="text-sm font-semibold text-reka-text">{{ $product->rating }}</span>
                                    </div>
                                </div>
                                <h3 class="mt-4 text-lg font-semibold text-reka-text"><a
                                        href="{{ route('product-detail', ['slug' => $product->slug]) }}"
                                        class="hover:text-reka-blue">{{ $product->name }}</a></h3>
                                <p class="mt-2 text-sm leading-6 text-reka-text-muted line-clamp-2">
                                    {{ $product->description }}</p>
                                <div class="mt-5 flex items-center justify-between pt-3 border-t border-reka-border">
                                    <div>
                                        <span class="text-lg font-bold text-reka-text">Rp
                                            {{ number_format($product->price, 0, ',', '.') }}</span>
                                        @if ($product->status === 'available')
                                            <p
                                                class="mt-1 text-xs font-semibold uppercase tracking-[0.2em] text-emerald-600">
                                                Tersedia
                                            </p>
                                        @else
                                            <p
                                                class="mt-1 text-xs font-semibold uppercase tracking-[0.2em] text-rose-600">
                                                Barang Habis
                                            </p>
                                        @endif
                                    </div>
                                    <a href="{{ route('product-detail', ['slug' => $product->slug]) }}"
                                        class="btn-primary px-4 py-2 text-sm">View</a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>

                @if ($products->hasPages())
                    <div class="mt-10 flex flex-wrap items-center justify-center gap-2">
                        @if ($products->onFirstPage())
                            <span class="btn-secondary cursor-not-allowed px-4 py-2 text-sm opacity-50">Previous</span>
                        @else
                            <a href="{{ $products->previousPageUrl() }}"
                                class="btn-secondary px-4 py-2 text-sm">Previous</a>
                        @endif

                        @foreach (range(1, $products->lastPage()) as $page)
                            @if ($page === $products->currentPage())
                                <span class="btn-primary px-4 py-2 text-sm">{{ $page }}</span>
                            @else
                                <a href="{{ $products->url($page) }}"
                                    class="btn-secondary px-4 py-2 text-sm">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($products->hasMorePages())
                            <a href="{{ $products->nextPageUrl() }}" class="btn-secondary px-4 py-2 text-sm">Next</a>
                        @else
                            <span class="btn-secondary cursor-not-allowed px-4 py-2 text-sm opacity-50">Next</span>
                        @endif
                    </div>
                @endif
            </section>
        </div>
    </main>

    <!-- ─── FOOTER ─── -->
    <footer class="bg-reka-text text-white pt-20 pb-8 border-t border-gray-900">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            <!-- Col 1: About & Socials -->
            <div>
                <a href="/"
                    class="text-2xl font-extrabold text-white tracking-wider uppercase flex items-center gap-1.5">
                    <span
                        class="w-6 h-6 bg-reka-yellow rounded-md flex items-center justify-center text-reka-text text-sm font-black">R</span>
                    REKA
                </a>
                <p class="text-gray-400 mt-4 text-sm leading-relaxed max-w-xs">
                    Functional, beautiful, and sustainably made apparel designed to elevate everyday dressing.
                </p>
                <div class="flex items-center gap-4 mt-6">
                    <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer"
                        class="w-10 h-10 rounded-full bg-gray-800 hover:bg-reka-blue text-gray-400 hover:text-white flex items-center justify-center transition-all duration-300"
                        aria-label="Facebook">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z" />
                        </svg>
                    </a>
                    <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer"
                        class="w-10 h-10 rounded-full bg-gray-800 hover:bg-reka-blue text-gray-400 hover:text-white flex items-center justify-center transition-all duration-300"
                        aria-label="Instagram">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg>
                    </a>
                    <a href="https://www.twitter.com" target="_blank" rel="noopener noreferrer"
                        class="w-10 h-10 rounded-full bg-gray-800 hover:bg-reka-blue text-gray-400 hover:text-white flex items-center justify-center transition-all duration-300"
                        aria-label="Twitter">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                        </svg>
                    </a>
                </div>
            </div>

            <!-- Col 2: Shop links -->
            <div>
                <h4 class="font-bold text-base mb-6 uppercase tracking-wider">Shop</h4>
                <ul class="flex flex-col gap-3.5 text-sm text-gray-400">
                    <li><a href="/#categories" class="hover:text-white transition-colors">Women&apos;s Essentials</a>
                    </li>
                    <li><a href="/#categories" class="hover:text-white transition-colors">Men&apos;s Outerwear</a>
                    </li>
                    <li><a href="/#categories" class="hover:text-white transition-colors">Basics & Layers</a></li>
                    <li><a href="/#categories" class="hover:text-white transition-colors">Accessories</a></li>
                    <li><a href="/#categories" class="hover:text-white transition-colors">Lifestyle Pieces</a></li>
                    <li><a href="{{ route('category') }}" class="hover:text-white transition-colors">All Products</a>
                    </li>
                </ul>
            </div>

            <!-- Col 3: Support links -->
            <div>
                <h4 class="font-bold text-base mb-6 uppercase tracking-wider">Customer Support</h4>
                <ul class="flex flex-col gap-3.5 text-sm text-gray-400">
                    <li><a href="{{ Auth::check() ? route('orders') : route('login') }}"
                            class="hover:text-white transition-colors">Track Order</a></li>
                    <li><a href="{{ route('support') }}" class="hover:text-white transition-colors">Delivery &
                            Installation</a></li>
                    <li><a href="{{ route('support') }}" class="hover:text-white transition-colors">Returns &
                            Refunds</a></li>
                    <li><a href="{{ route('support') }}" class="hover:text-white transition-colors">Product Guides &
                            Assembly</a>
                    </li>
                    <li><a href="{{ route('support') }}" class="hover:text-white transition-colors">FAQs</a></li>
                    <li><a href="{{ route('support') }}" class="hover:text-white transition-colors">Store Locator</a>
                    </li>
                </ul>
            </div>

            <!-- Col 4: Corporate -->
            <div>
                <h4 class="font-bold text-base mb-6 uppercase tracking-wider">REKA Indonesia</h4>
                <ul class="flex flex-col gap-3.5 text-sm text-gray-400">
                    <li><a href="{{ route('support') }}" class="hover:text-white transition-colors">About Us</a></li>
                    <li><a href="{{ route('support') }}" class="hover:text-white transition-colors">Careers</a></li>
                    <li><a href="{{ route('support') }}" class="hover:text-white transition-colors">Sustainability &
                            Design</a></li>
                    <li><a href="{{ route('support') }}" class="hover:text-white transition-colors">Newsroom</a></li>
                    <li><a href="{{ route('support') }}" class="hover:text-white transition-colors">REKA Family
                            Member</a></li>
                    <li><a href="{{ route('support') }}" class="hover:text-white transition-colors">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Divider -->
        <div
            class="max-w-7xl mx-auto px-6 border-t border-gray-800 mt-16 pt-8 flex flex-col md:flex-row justify-between items-center gap-6">
            <!-- Copyright -->
            <div>
                <span class="text-xs text-gray-500">&copy; {{ date('Y') }} REKA. All rights reserved.</span>
            </div>

            <!-- Payment Badges -->
            <div class="flex flex-wrap gap-2.5">
                <span
                    class="bg-gray-800 text-gray-400 text-[10px] font-bold px-3 py-1.5 rounded border border-gray-700 select-none uppercase tracking-wider">Visa</span>
                <span
                    class="bg-gray-800 text-gray-400 text-[10px] font-bold px-3 py-1.5 rounded border border-gray-700 select-none uppercase tracking-wider">Mastercard</span>
                <span
                    class="bg-gray-800 text-gray-400 text-[10px] font-bold px-3 py-1.5 rounded border border-gray-700 select-none uppercase tracking-wider">BCA</span>
                <span
                    class="bg-gray-800 text-gray-400 text-[10px] font-bold px-3 py-1.5 rounded border border-gray-700 select-none uppercase tracking-wider">Mandiri</span>
                <span
                    class="bg-gray-800 text-gray-400 text-[10px] font-bold px-3 py-1.5 rounded border border-gray-700 select-none uppercase tracking-wider">GoPay</span>
            </div>

            <!-- Legal links -->
            <div class="flex gap-6 text-xs text-gray-500">
                <a href="{{ route('support') }}" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="{{ route('support') }}" class="hover:text-white transition-colors">Terms of Service</a>
            </div>
        </div>
    </footer>

</body>

</html>
