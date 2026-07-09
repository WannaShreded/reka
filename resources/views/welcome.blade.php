<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="REKA - Modern Scandinavian Furniture & Home Decor inspired by IKEA. Functional, sustainable, and beautiful.">

    <title>REKA - Modern Scandinavian Furniture</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-white text-reka-text selection:bg-reka-blue-light selection:text-reka-blue">

    <!-- ─── TOP UTILITY BAR ─── -->
    <div class="hidden lg:flex bg-reka-text text-gray-300 text-xs py-2 px-6 justify-between items-center border-b border-gray-800">
        <div>
            <span>Free delivery on orders over <span class="text-white font-semibold">Rp 2,000,000</span></span>
        </div>
        <div class="flex items-center gap-6">
            <a href="#" class="hover:text-white transition-colors">Help & Support</a>
            <span class="text-gray-600">|</span>
            <a href="#" class="hover:text-white transition-colors">Store Locator</a>
            <span class="text-gray-600">|</span>
            <a href="#" class="hover:text-white transition-colors flex items-center gap-1">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 002 2h2a2.5 2.5 0 002.5-2.5V10a2 2 0 00-2-2h-1a2 2 0 00-2-2v-1a2 2 0 00-2-2 2.5 2.5 0 00-2.5 2.5v.5A2.5 2.5 0 016 6.07M12 21a9 9 0 110-18 9 9 0 010 18z"/></svg>
                ID / EN
            </a>
        </div>
    </div>

    <!-- ─── STICKY NAVIGATION BAR ─── -->
    <header id="navbar" class="sticky top-0 w-full bg-white/90 backdrop-blur-md z-50 border-b border-reka-border">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <!-- Left: Logo -->
            <a href="/" class="text-2xl font-bold text-reka-blue tracking-widest uppercase flex items-center gap-1.5">
                <span class="w-6 h-6 bg-reka-yellow rounded-md flex items-center justify-center text-reka-text text-sm font-black">R</span>
                REKA
            </a>

            <!-- Center: Navigation Links -->
            <nav class="hidden lg:flex items-center gap-8">
                <a href="/category" class="text-sm font-semibold text-reka-text hover:text-reka-blue transition-colors py-1 relative after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-reka-blue hover:after:w-full after:transition-all">Products</a>
                <a href="#featured" class="text-sm font-semibold text-reka-text hover:text-reka-blue transition-colors py-1 relative after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-reka-blue hover:after:w-full after:transition-all">Rooms</a>
                <a href="#promotions" class="text-sm font-semibold text-reka-text hover:text-reka-blue transition-colors py-1 relative after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-reka-blue hover:after:w-full after:transition-all">Inspiration</a>
                <a href="#new-arrivals" class="text-sm font-semibold text-reka-text hover:text-reka-blue transition-colors py-1 relative after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-reka-blue hover:after:w-full after:transition-all">New Arrivals</a>
                <a href="#reviews" class="text-sm font-semibold text-reka-text hover:text-reka-blue transition-colors py-1 relative after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-reka-blue hover:after:w-full after:transition-all">Offers</a>
            </nav>

            <!-- Right: Search & Actions -->
            <div class="flex items-center gap-5">
                <!-- Search Bar (Desktop) -->
                <div class="hidden md:flex items-center relative w-72">
                    <input type="text" placeholder="What are you looking for?" class="w-full pl-10 pr-4 py-2 bg-reka-surface border border-transparent focus:border-reka-blue rounded-full text-sm focus:outline-none transition-all placeholder:text-reka-text-muted">
                    <svg class="w-4 h-4 text-reka-text-secondary absolute left-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>

                <!-- Wishlist Icon -->
                <a href="#" class="relative p-1 text-reka-text hover:text-reka-blue transition-colors" aria-label="Wishlist">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    <span class="absolute -top-1 -right-1 bg-reka-error text-white text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">0</span>
                </a>

                <!-- Cart Icon -->
                <a href="/cart" class="relative p-1 text-reka-text hover:text-reka-blue transition-colors" aria-label="Shopping Cart">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    <span id="cart-count" class="absolute -top-1 -right-1 bg-reka-blue text-white text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">0</span>
                </a>

                <!-- Account Icon -->
                <a href="#" class="p-1 text-reka-text hover:text-reka-blue transition-colors hidden md:block" aria-label="My Account">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </a>

                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="lg:hidden p-1 text-reka-text focus:outline-none" aria-label="Toggle Menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path class="menu-open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        <path class="menu-close hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu (Hidden by default) -->
        <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-reka-border">
            <div class="px-6 py-4 flex flex-col gap-4">
                <a href="#categories" class="text-base font-semibold py-2 border-b border-reka-surface">Products</a>
                <a href="#featured" class="text-base font-semibold py-2 border-b border-reka-surface">Rooms</a>
                <a href="#promotions" class="text-base font-semibold py-2 border-b border-reka-surface">Inspiration</a>
                <a href="#new-arrivals" class="text-base font-semibold py-2 border-b border-reka-surface">New Arrivals</a>
                <a href="#reviews" class="text-base font-semibold py-2 border-b border-reka-surface">Offers</a>
                <div class="pt-2 flex items-center relative">
                    <input type="text" placeholder="What are you looking for?" class="w-full pl-10 pr-4 py-2.5 bg-reka-surface border border-reka-border rounded-lg text-sm focus:outline-none focus:border-reka-blue">
                    <svg class="w-4 h-4 text-reka-text-secondary absolute left-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>
            </div>
        </div>
    </header>

    <!-- ─── HERO BANNER ─── -->
    <section class="relative w-full h-[600px] lg:h-[700px] overflow-hidden bg-reka-text flex items-center">
        <!-- Background Image -->
        <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7?auto=format&fit=crop&w=1920&q=80" alt="Scandinavian living room layout" class="absolute inset-0 w-full h-full object-cover">
        <!-- Gradient Overlay -->
        <div class="absolute inset-0 hero-gradient"></div>

        <!-- Content -->
        <div class="relative z-10 max-w-7xl mx-auto px-6 w-full">
            <div data-animate class="max-w-xl text-white">
                <span class="inline-flex items-center gap-2 text-reka-yellow font-bold text-sm uppercase tracking-widest">
                    <span class="w-8 h-[2px] bg-reka-yellow"></span>
                    New Collection 2026
                </span>
                <h1 class="text-5xl lg:text-7xl font-bold tracking-tight leading-[1.1] mt-4">
                    Make room<br>for life
                </h1>
                <p class="text-lg text-white/80 mt-6 leading-relaxed max-w-md">
                    Scandinavian furniture designed for modern living. Timeless, functional, sustainable, and beautiful.
                </p>
                <div class="flex flex-wrap gap-4 mt-10">
                    <a href="/product/vimle" class="inline-flex items-center gap-2 bg-reka-yellow text-reka-text font-bold px-8 py-4 rounded-lg hover:bg-reka-yellow-dark transition-all duration-300 shadow-md hover:shadow-lg">
                        Shop Now
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                    <a href="#featured" class="inline-flex items-center gap-2 border-2 border-white/60 text-white font-semibold px-8 py-4 rounded-lg hover:bg-white/10 hover:border-white transition-all duration-300">
                        Explore Design
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── POPULAR CATEGORIES ─── -->
    <section id="categories" class="py-24 max-w-7xl mx-auto px-6">
        <div data-animate class="text-center mb-16">
            <div class="w-12 h-1 bg-reka-yellow mx-auto mb-4"></div>
            <h2 class="text-3xl lg:text-4xl font-bold tracking-tight">Shop by Category</h2>
            <p class="text-reka-text-muted mt-3">Find everything you need for every room in your house</p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6">
            <!-- Category 1 -->
            <div data-animate class="group relative rounded-2xl overflow-hidden cursor-pointer h-80 shadow-sm hover:shadow-md transition-shadow duration-300">
                <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=400&q=80" alt="Living room furniture" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-5 text-white">
                    <h3 class="font-bold text-lg">Living Room</h3>
                    <p class="text-white/70 text-xs mt-1">856 Items</p>
                </div>
            </div>

            <!-- Category 2 -->
            <div data-animate class="group relative rounded-2xl overflow-hidden cursor-pointer h-80 shadow-sm hover:shadow-md transition-shadow duration-300 delay-100">
                <img src="https://images.unsplash.com/photo-1616594039964-ae9021a400a0?auto=format&fit=crop&w=400&q=80" alt="Bedroom sets" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-5 text-white">
                    <h3 class="font-bold text-lg">Bedroom</h3>
                    <p class="text-white/70 text-xs mt-1">643 Items</p>
                </div>
            </div>

            <!-- Category 3 -->
            <div data-animate class="group relative rounded-2xl overflow-hidden cursor-pointer h-80 shadow-sm hover:shadow-md transition-shadow duration-300 delay-200">
                <img src="https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?auto=format&fit=crop&w=400&q=80" alt="Kitchen furniture" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-5 text-white">
                    <h3 class="font-bold text-lg">Kitchen</h3>
                    <p class="text-white/70 text-xs mt-1">432 Items</p>
                </div>
            </div>

            <!-- Category 4 -->
            <div data-animate class="group relative rounded-2xl overflow-hidden cursor-pointer h-80 shadow-sm hover:shadow-md transition-shadow duration-300 delay-300">
                <img src="https://images.unsplash.com/photo-1518455027359-f3f8164ba6bd?auto=format&fit=crop&w=400&q=80" alt="Workspace desk" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-5 text-white">
                    <h3 class="font-bold text-lg">Office</h3>
                    <p class="text-white/70 text-xs mt-1">328 Items</p>
                </div>
            </div>

            <!-- Category 5 -->
            <div data-animate class="group relative rounded-2xl overflow-hidden cursor-pointer h-80 shadow-sm hover:shadow-md transition-shadow duration-300 delay-400">
                <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb3?auto=format&fit=crop&w=400&q=80" alt="Outdoor sofa" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-5 text-white">
                    <h3 class="font-bold text-lg">Outdoor</h3>
                    <p class="text-white/70 text-xs mt-1">275 Items</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── FEATURED PRODUCTS ─── -->
    <section id="featured" class="py-24 bg-reka-surface border-y border-reka-border">
        <div class="max-w-7xl mx-auto px-6">
            <div data-animate class="text-center mb-16">
                <div class="w-12 h-1 bg-reka-yellow mx-auto mb-4"></div>
                <h2 class="text-3xl lg:text-4xl font-bold tracking-tight">Featured Products</h2>
                <p class="text-reka-text-muted mt-3">Handpicked functional pieces for your minimalist space</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Product Card 1 -->
                <div data-animate class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group flex flex-col h-full relative">
                    <span class="absolute top-3 left-3 bg-reka-blue text-white text-[10px] font-bold px-3 py-1.5 rounded-full z-10 uppercase tracking-wider">New</span>
                    <a href="/product/vimle" class="relative aspect-square overflow-hidden bg-gray-50 block">
                        <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?auto=format&fit=crop&w=600&q=80" alt="VIMLE 3-seat sofa" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </a>
                    <button class="wishlist-btn absolute top-3 right-3 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-md hover:bg-white transition-all z-10" aria-label="Add to Wishlist">
                        <svg class="w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </button>
                    <div class="p-5 flex flex-col grow">
                        <h3 class="font-bold text-reka-text text-lg hover:text-reka-blue transition-colors">
                            <a href="/product/vimle">VIMLE Sofa</a>
                        </h3>
                        <p class="text-sm text-reka-text-muted mt-1 line-clamp-2">Comfortable 3-seat sofa in Gunnared beige fabric.</p>

                        <!-- Rating -->
                        <div class="flex items-center gap-1 mt-3">
                            <div class="flex text-reka-yellow">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            </div>
                            <span class="text-xs text-reka-text-muted ml-1">4.5 (126)</span>
                        </div>

                        <div class="flex items-center justify-between mt-6 pt-3 border-t border-reka-border">
                            <span class="text-xl font-bold text-reka-text">Rp 8,499,000</span>
                            <button class="add-to-cart-btn inline-flex items-center gap-1.5 bg-reka-blue text-white text-xs font-semibold px-4 py-2.5 rounded-lg hover:bg-reka-blue-dark transition-all" aria-label="Add to Cart">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                Add
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div data-animate class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group flex flex-col h-full relative delay-100">
                    <a href="#" class="relative aspect-square overflow-hidden bg-gray-50 block">
                        <img src="https://images.unsplash.com/photo-1532372320978-9e5f95227d3a?auto=format&fit=crop&w=600&q=80" alt="BJÖRKUDDEN Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </a>
                    <button class="wishlist-btn absolute top-3 right-3 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-md hover:bg-white transition-all z-10" aria-label="Add to Wishlist">
                        <svg class="w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </button>
                    <div class="p-5 flex flex-col grow">
                        <h3 class="font-bold text-reka-text text-lg hover:text-reka-blue transition-colors">
                            <a href="#">BJÖRKUDDEN Table</a>
                        </h3>
                        <p class="text-sm text-reka-text-muted mt-1 line-clamp-2">Solid wood dining table, seats 4 comfortably.</p>

                        <!-- Rating -->
                        <div class="flex items-center gap-1 mt-3">
                            <div class="flex text-reka-yellow">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            </div>
                            <span class="text-xs text-reka-text-muted ml-1">4.0 (89)</span>
                        </div>

                        <div class="flex items-center justify-between mt-6 pt-3 border-t border-reka-border">
                            <span class="text-xl font-bold text-reka-text">Rp 2,199,000</span>
                            <button class="add-to-cart-btn inline-flex items-center gap-1.5 bg-reka-blue text-white text-xs font-semibold px-4 py-2.5 rounded-lg hover:bg-reka-blue-dark transition-all" aria-label="Add to Cart">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                Add
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div data-animate class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group flex flex-col h-full relative delay-200">
                    <span class="absolute top-3 left-3 bg-reka-error text-white text-[10px] font-bold px-3 py-1.5 rounded-full z-10 uppercase tracking-wider">Sale</span>
                    <a href="#" class="relative aspect-square overflow-hidden bg-gray-50 block">
                        <img src="https://images.unsplash.com/photo-1519947486511-46149fa0a254?auto=format&fit=crop&w=600&q=80" alt="STRANDMON Chair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </a>
                    <button class="wishlist-btn absolute top-3 right-3 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-md hover:bg-white transition-all z-10" aria-label="Add to Wishlist">
                        <svg class="w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </button>
                    <div class="p-5 flex flex-col grow">
                        <h3 class="font-bold text-reka-text text-lg hover:text-reka-blue transition-colors">
                            <a href="#">STRANDMON Chair</a>
                        </h3>
                        <p class="text-sm text-reka-text-muted mt-1 line-clamp-2">Classic wing chair with deep, soft velvet cushion.</p>

                        <!-- Rating -->
                        <div class="flex items-center gap-1 mt-3">
                            <div class="flex text-reka-yellow">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            </div>
                            <span class="text-xs text-reka-text-muted ml-1">4.8 (234)</span>
                        </div>

                        <div class="flex items-center justify-between mt-6 pt-3 border-t border-reka-border">
                            <div>
                                <span class="text-xs text-reka-text-muted line-through block leading-none">Rp 4,999,000</span>
                                <span class="text-xl font-bold text-reka-error">Rp 3,999,000</span>
                            </div>
                            <button class="add-to-cart-btn inline-flex items-center gap-1.5 bg-reka-blue text-white text-xs font-semibold px-4 py-2.5 rounded-lg hover:bg-reka-blue-dark transition-all" aria-label="Add to Cart">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                Add
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 4 -->
                <div data-animate class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group flex flex-col h-full relative delay-300">
                    <a href="#" class="relative aspect-square overflow-hidden bg-gray-50 block">
                        <img src="https://images.unsplash.com/photo-1538688525198-9b88f6f53126?auto=format&fit=crop&w=600&q=80" alt="KALLAX Shelf" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </a>
                    <button class="wishlist-btn absolute top-3 right-3 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-md hover:bg-white transition-all z-10" aria-label="Add to Wishlist">
                        <svg class="w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </button>
                    <div class="p-5 flex flex-col grow">
                        <h3 class="font-bold text-reka-text text-lg hover:text-reka-blue transition-colors">
                            <a href="#">KALLAX Shelf</a>
                        </h3>
                        <p class="text-sm text-reka-text-muted mt-1 line-clamp-2">Versatile 4x4 shelving unit, white oak effect.</p>

                        <!-- Rating -->
                        <div class="flex items-center gap-1 mt-3">
                            <div class="flex text-reka-yellow">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            </div>
                            <span class="text-xs text-reka-text-muted ml-1">4.3 (167)</span>
                        </div>

                        <div class="flex items-center justify-between mt-6 pt-3 border-t border-reka-border">
                            <span class="text-xl font-bold text-reka-text">Rp 1,299,000</span>
                            <button class="add-to-cart-btn inline-flex items-center gap-1.5 bg-reka-blue text-white text-xs font-semibold px-4 py-2.5 rounded-lg hover:bg-reka-blue-dark transition-all" aria-label="Add to Cart">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── BEST SELLERS ─── -->
    <section class="py-24 max-w-7xl mx-auto px-6">
        <div data-animate class="text-center mb-16">
            <div class="w-12 h-1 bg-reka-yellow mx-auto mb-4"></div>
            <h2 class="text-3xl lg:text-4xl font-bold tracking-tight">Best Sellers</h2>
            <p class="text-reka-text-muted mt-3">Our most popular designs loved by thousands of homes</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Best Seller 1 -->
            <div data-animate class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group flex flex-col h-full relative">
                <a href="#" class="relative aspect-square overflow-hidden bg-gray-50 block">
                    <img src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&fit=crop&w=600&q=80" alt="MALM Desk" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </a>
                <button class="wishlist-btn absolute top-3 right-3 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-md hover:bg-white transition-all z-10" aria-label="Add to Wishlist">
                    <svg class="w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                </button>
                <div class="p-5 flex flex-col grow">
                    <h3 class="font-bold text-reka-text text-lg hover:text-reka-blue transition-colors">
                        <a href="#">MALM Desk</a>
                    </h3>
                    <p class="text-sm text-reka-text-muted mt-1 line-clamp-2">Minimalist study desk with built-in side drawers.</p>

                    <!-- Rating -->
                    <div class="flex items-center gap-1 mt-3">
                        <div class="flex text-reka-yellow">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        </div>
                        <span class="text-xs text-reka-text-muted ml-1">4.6 (312)</span>
                    </div>

                    <div class="flex items-center justify-between mt-6 pt-3 border-t border-reka-border">
                        <span class="text-xl font-bold text-reka-text">Rp 2,599,000</span>
                        <button class="add-to-cart-btn inline-flex items-center gap-1.5 bg-reka-blue text-white text-xs font-semibold px-4 py-2.5 rounded-lg hover:bg-reka-blue-dark transition-all" aria-label="Add to Cart">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            Add
                        </button>
                    </div>
                </div>
            </div>

            <!-- Best Seller 2 -->
            <div data-animate class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group flex flex-col h-full relative delay-100">
                <span class="absolute top-3 left-3 bg-reka-yellow text-reka-text text-[10px] font-bold px-3 py-1.5 rounded-full z-10 uppercase tracking-wider">Bestseller</span>
                <a href="#" class="relative aspect-square overflow-hidden bg-gray-50 block">
                    <img src="https://images.unsplash.com/photo-1493663284031-b7e3aefcae8e?auto=format&fit=crop&w=600&q=80" alt="POÄNG Armchair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </a>
                <button class="wishlist-btn absolute top-3 right-3 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-md hover:bg-white transition-all z-10" aria-label="Add to Wishlist">
                    <svg class="w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                </button>
                <div class="p-5 flex flex-col grow">
                    <h3 class="font-bold text-reka-text text-lg hover:text-reka-blue transition-colors">
                        <a href="#">POÄNG Armchair</a>
                    </h3>
                    <p class="text-sm text-reka-text-muted mt-1 line-clamp-2">Laminated bent birch frame armchair with comfortable support.</p>

                    <!-- Rating -->
                    <div class="flex items-center gap-1 mt-3">
                        <div class="flex text-reka-yellow">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        </div>
                        <span class="text-xs text-reka-text-muted ml-1">4.7 (456)</span>
                    </div>

                    <div class="flex items-center justify-between mt-6 pt-3 border-t border-reka-border">
                        <span class="text-xl font-bold text-reka-text">Rp 1,799,000</span>
                        <button class="add-to-cart-btn inline-flex items-center gap-1.5 bg-reka-blue text-white text-xs font-semibold px-4 py-2.5 rounded-lg hover:bg-reka-blue-dark transition-all" aria-label="Add to Cart">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            Add
                        </button>
                    </div>
                </div>
            </div>

            <!-- Best Seller 3 -->
            <div data-animate class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group flex flex-col h-full relative delay-200">
                <a href="#" class="relative aspect-square overflow-hidden bg-gray-50 block">
                    <img src="https://images.unsplash.com/photo-1592078615290-033ee584e267?auto=format&fit=crop&w=600&q=80" alt="HEMNES Dresser" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </a>
                <button class="wishlist-btn absolute top-3 right-3 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-md hover:bg-white transition-all z-10" aria-label="Add to Wishlist">
                    <svg class="w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                </button>
                <div class="p-5 flex flex-col grow">
                    <h3 class="font-bold text-reka-text text-lg hover:text-reka-blue transition-colors">
                        <a href="#">HEMNES Dresser</a>
                    </h3>
                    <p class="text-sm text-reka-text-muted mt-1 line-clamp-2">White stain solid pine chest of 8 drawers. Classic style.</p>

                    <!-- Rating -->
                    <div class="flex items-center gap-1 mt-3">
                        <div class="flex text-reka-yellow">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        </div>
                        <span class="text-xs text-reka-text-muted ml-1">4.4 (198)</span>
                    </div>

                    <div class="flex items-center justify-between mt-6 pt-3 border-t border-reka-border">
                        <span class="text-xl font-bold text-reka-text">Rp 4,299,000</span>
                        <button class="add-to-cart-btn inline-flex items-center gap-1.5 bg-reka-blue text-white text-xs font-semibold px-4 py-2.5 rounded-lg hover:bg-reka-blue-dark transition-all" aria-label="Add to Cart">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            Add
                        </button>
                    </div>
                </div>
            </div>

            <!-- Best Seller 4 -->
            <div data-animate class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group flex flex-col h-full relative delay-300">
                <a href="#" class="relative aspect-square overflow-hidden bg-gray-50 block">
                    <img src="https://images.unsplash.com/photo-1550581190-9c1c48d21d6c?auto=format&fit=crop&w=600&q=80" alt="LACK Side Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </a>
                <button class="wishlist-btn absolute top-3 right-3 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-md hover:bg-white transition-all z-10" aria-label="Add to Wishlist">
                    <svg class="w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                </button>
                <div class="p-5 flex flex-col grow">
                    <h3 class="font-bold text-reka-text text-lg hover:text-reka-blue transition-colors">
                        <a href="#">LACK Side Table</a>
                    </h3>
                    <p class="text-sm text-reka-text-muted mt-1 line-clamp-2">Ultra-lightweight side table, easy to assemble and move.</p>

                    <!-- Rating -->
                    <div class="flex items-center gap-1 mt-3">
                        <div class="flex text-reka-yellow">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        </div>
                        <span class="text-xs text-reka-text-muted ml-1">4.2 (543)</span>
                    </div>

                    <div class="flex items-center justify-between mt-6 pt-3 border-t border-reka-border">
                        <span class="text-xl font-bold text-reka-text">Rp 299,000</span>
                        <button class="add-to-cart-btn inline-flex items-center gap-1.5 bg-reka-blue text-white text-xs font-semibold px-4 py-2.5 rounded-lg hover:bg-reka-blue-dark transition-all" aria-label="Add to Cart">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            Add
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── PROMOTIONAL BANNER ─── -->
    <section id="promotions" class="py-20 bg-reka-blue text-white overflow-hidden relative">
        <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Left: Text -->
            <div data-animate>
                <span class="inline-block bg-reka-yellow text-reka-text text-xs font-bold px-4 py-2 rounded-full mb-6 uppercase tracking-wider">Limited Time Offer</span>
                <h2 class="text-4xl lg:text-5xl font-bold tracking-tight leading-tight">Up to 40% Off Living Room Collections</h2>
                <p class="text-white/80 mt-6 text-lg leading-relaxed">
                    Refresh your favorite space with our minimalist Scandinavian sofas, coffee tables, and storage shelves. Free delivery and installation included.
                </p>
                <div class="mt-8 flex flex-wrap gap-4">
                    <a href="/product/vimle" class="inline-flex items-center gap-2 bg-white text-reka-blue font-bold px-8 py-4 rounded-lg hover:bg-gray-100 transition-all duration-300">
                        View Offers
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                    </a>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-3 gap-8 mt-12 pt-8 border-t border-white/20 text-center lg:text-left">
                    <div>
                        <span data-count="2500" class="text-3xl font-extrabold text-white block">0</span>
                        <span class="text-white/60 text-xs mt-1 block uppercase font-medium">Products</span>
                    </div>
                    <div>
                        <span class="text-3xl font-extrabold text-white block">Free</span>
                        <span class="text-white/60 text-xs mt-1 block uppercase font-medium">Delivery</span>
                    </div>
                    <div>
                        <span data-count="365" class="text-3xl font-extrabold text-white block">0</span>
                        <span class="text-white/60 text-xs mt-1 block uppercase font-medium">Day Returns</span>
                    </div>
                </div>
            </div>
            <!-- Right: Image -->
            <div data-animate class="hidden lg:block">
                <img src="https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=800&q=80" alt="IKEA style room setup decoration" class="rounded-2xl shadow-2xl w-full object-cover h-[450px]">
            </div>
        </div>
    </section>

    <!-- ─── NEW ARRIVALS ─── -->
    <section id="new-arrivals" class="py-24 bg-reka-surface border-b border-reka-border">
        <div class="max-w-7xl mx-auto px-6">
            <div data-animate class="text-center mb-16">
                <div class="w-12 h-1 bg-reka-yellow mx-auto mb-4"></div>
                <h2 class="text-3xl lg:text-4xl font-bold tracking-tight">New Arrivals</h2>
                <p class="text-reka-text-muted mt-3">Explore our latest arrivals designed for high-density living spaces</p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Product Card 1 -->
                <div data-animate class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group flex flex-col h-full relative">
                    <span class="absolute top-3 left-3 bg-reka-blue text-white text-[10px] font-bold px-3 py-1.5 rounded-full z-10 uppercase tracking-wider">New</span>
                    <a href="#" class="relative aspect-square overflow-hidden bg-gray-50 block">
                        <img src="https://images.unsplash.com/photo-1600210492486-724fe5c67fb3?auto=format&fit=crop&w=600&q=80" alt="ÄPPLARÖ Outdoor Set" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </a>
                    <button class="wishlist-btn absolute top-3 right-3 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-md hover:bg-white transition-all z-10" aria-label="Add to Wishlist">
                        <svg class="w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </button>
                    <div class="p-5 flex flex-col grow">
                        <h3 class="font-bold text-reka-text text-lg hover:text-reka-blue transition-colors">
                            <a href="#">ÄPPLARÖ Outdoor Set</a>
                        </h3>
                        <p class="text-sm text-reka-text-muted mt-1 line-clamp-2">Durable wooden table and 2 folding chairs, pre-treated stain.</p>

                        <!-- Rating -->
                        <div class="flex items-center gap-1 mt-3">
                            <div class="flex text-reka-yellow">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            </div>
                            <span class="text-xs text-reka-text-muted ml-1">4.1 (45)</span>
                        </div>

                        <div class="flex items-center justify-between mt-6 pt-3 border-t border-reka-border">
                            <span class="text-xl font-bold text-reka-text">Rp 5,799,000</span>
                            <button class="add-to-cart-btn inline-flex items-center gap-1.5 bg-reka-blue text-white text-xs font-semibold px-4 py-2.5 rounded-lg hover:bg-reka-blue-dark transition-all" aria-label="Add to Cart">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                Add
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 2 -->
                <div data-animate class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group flex flex-col h-full relative delay-100">
                    <span class="absolute top-3 left-3 bg-reka-blue text-white text-[10px] font-bold px-3 py-1.5 rounded-full z-10 uppercase tracking-wider">New</span>
                    <a href="#" class="relative aspect-square overflow-hidden bg-gray-50 block">
                        <img src="https://images.unsplash.com/photo-1594026112284-02bb6f3352fe?auto=format&fit=crop&w=600&q=80" alt="STOCKHOLM Coffee Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </a>
                    <button class="wishlist-btn absolute top-3 right-3 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-md hover:bg-white transition-all z-10" aria-label="Add to Wishlist">
                        <svg class="w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </button>
                    <div class="p-5 flex flex-col grow">
                        <h3 class="font-bold text-reka-text text-lg hover:text-reka-blue transition-colors">
                            <a href="#">STOCKHOLM Table</a>
                        </h3>
                        <p class="text-sm text-reka-text-muted mt-1 line-clamp-2">Walnut veneer coffee table with elliptical shapes.</p>

                        <!-- Rating -->
                        <div class="flex items-center gap-1 mt-3">
                            <div class="flex text-reka-yellow">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            </div>
                            <span class="text-xs text-reka-text-muted ml-1">4.9 (12)</span>
                        </div>

                        <div class="flex items-center justify-between mt-6 pt-3 border-t border-reka-border">
                            <span class="text-xl font-bold text-reka-text">Rp 3,499,000</span>
                            <button class="add-to-cart-btn inline-flex items-center gap-1.5 bg-reka-blue text-white text-xs font-semibold px-4 py-2.5 rounded-lg hover:bg-reka-blue-dark transition-all" aria-label="Add to Cart">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                Add
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 3 -->
                <div data-animate class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group flex flex-col h-full relative delay-200">
                    <span class="absolute top-3 left-3 bg-reka-blue text-white text-[10px] font-bold px-3 py-1.5 rounded-full z-10 uppercase tracking-wider">New</span>
                    <a href="#" class="relative aspect-square overflow-hidden bg-gray-50 block">
                        <img src="https://images.unsplash.com/photo-1598300042247-d088f8ab3a91?auto=format&fit=crop&w=600&q=80" alt="BRIMNES TV Unit" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </a>
                    <button class="wishlist-btn absolute top-3 right-3 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-md hover:bg-white transition-all z-10" aria-label="Add to Wishlist">
                        <svg class="w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </button>
                    <div class="p-5 flex flex-col grow">
                        <h3 class="font-bold text-reka-text text-lg hover:text-reka-blue transition-colors">
                            <a href="#">BRIMNES TV Unit</a>
                        </h3>
                        <p class="text-sm text-reka-text-muted mt-1 line-clamp-2">TV cabinet bench with large drawers for storage solutions.</p>

                        <!-- Rating -->
                        <div class="flex items-center gap-1 mt-3">
                            <div class="flex text-reka-yellow">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            </div>
                            <span class="text-xs text-reka-text-muted ml-1">4.3 (67)</span>
                        </div>

                        <div class="flex items-center justify-between mt-6 pt-3 border-t border-reka-border">
                            <span class="text-xl font-bold text-reka-text">Rp 1,899,000</span>
                            <button class="add-to-cart-btn inline-flex items-center gap-1.5 bg-reka-blue text-white text-xs font-semibold px-4 py-2.5 rounded-lg hover:bg-reka-blue-dark transition-all" aria-label="Add to Cart">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                Add
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Product Card 4 -->
                <div data-animate class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition-all duration-300 group flex flex-col h-full relative delay-300">
                    <span class="absolute top-3 left-3 bg-reka-blue text-white text-[10px] font-bold px-3 py-1.5 rounded-full z-10 uppercase tracking-wider">New</span>
                    <a href="#" class="relative aspect-square overflow-hidden bg-gray-50 block">
                        <img src="https://images.unsplash.com/photo-1556228453-efd6c1ff04f6?auto=format&fit=crop&w=600&q=80" alt="NORDEN Dining Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </a>
                    <button class="wishlist-btn absolute top-3 right-3 w-10 h-10 bg-white/90 backdrop-blur-sm rounded-full flex items-center justify-center shadow-md hover:bg-white transition-all z-10" aria-label="Add to Wishlist">
                        <svg class="w-5 h-5 text-gray-400 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </button>
                    <div class="p-5 flex flex-col grow">
                        <h3 class="font-bold text-reka-text text-lg hover:text-reka-blue transition-colors">
                            <a href="#">NORDEN Dining Table</a>
                        </h3>
                        <p class="text-sm text-reka-text-muted mt-1 line-clamp-2">Solid birch extension table. Elegant and sturdy.</p>

                        <!-- Rating -->
                        <div class="flex items-center gap-1 mt-3">
                            <div class="flex text-reka-yellow">
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            </div>
                            <span class="text-xs text-reka-text-muted ml-1">4.5 (23)</span>
                        </div>

                        <div class="flex items-center justify-between mt-6 pt-3 border-t border-reka-border">
                            <span class="text-xl font-bold text-reka-text">Rp 6,299,000</span>
                            <button class="add-to-cart-btn inline-flex items-center gap-1.5 bg-reka-blue text-white text-xs font-semibold px-4 py-2.5 rounded-lg hover:bg-reka-blue-dark transition-all" aria-label="Add to Cart">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                                Add
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── CUSTOMER REVIEWS ─── -->
    <section id="reviews" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div data-animate class="text-center mb-16">
                <div class="w-12 h-1 bg-reka-yellow mx-auto mb-4"></div>
                <h2 class="text-3xl lg:text-4xl font-bold tracking-tight">What Our Customers Say</h2>
                <p class="text-reka-text-muted mt-3">Real reviews from people who upgraded their living spaces</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Review 1 -->
                <div data-animate class="bg-white rounded-2xl p-8 border border-reka-border hover:shadow-lg transition-shadow duration-300">
                    <span class="text-6xl text-reka-blue/15 font-serif leading-none select-none">“</span>
                    <p class="text-reka-text-secondary italic leading-relaxed mt-2">
                        The VIMLE sofa completely transformed our apartment's living room. The fabric feels premium, it's deep enough for lazy Sundays, and the modular system allowed us to fit it perfectly in our corner.
                    </p>
                    <div class="flex text-reka-yellow mt-4">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <div class="flex items-center gap-3 mt-6">
                        <img src="https://i.pravatar.cc/100?img=1" alt="Sarah M. avatar" class="w-10 h-10 rounded-full object-cover">
                        <div>
                            <span class="font-bold text-reka-text text-sm block">Sarah M.</span>
                            <span class="text-reka-text-muted text-xs">Jakarta, Indonesia</span>
                        </div>
                    </div>
                </div>

                <!-- Review 2 -->
                <div data-animate class="bg-white rounded-2xl p-8 border border-reka-border hover:shadow-lg transition-shadow duration-300 delay-100">
                    <span class="text-6xl text-reka-blue/15 font-serif leading-none select-none">“</span>
                    <p class="text-reka-text-secondary italic leading-relaxed mt-2">
                        Outstanding service. The BJÖRKUDDEN dining table is highly durable solid wood. Easy to assemble with the clear manual, and it matches the minimal aesthetic of our kitchen perfectly.
                    </p>
                    <div class="flex text-reka-yellow mt-4">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <div class="flex items-center gap-3 mt-6">
                        <img src="https://i.pravatar.cc/100?img=3" alt="Ahmad R. avatar" class="w-10 h-10 rounded-full object-cover">
                        <div>
                            <span class="font-bold text-reka-text text-sm block">Ahmad R.</span>
                            <span class="text-reka-text-muted text-xs">Bandung, Indonesia</span>
                        </div>
                    </div>
                </div>

                <!-- Review 3 -->
                <div data-animate class="bg-white rounded-2xl p-8 border border-reka-border hover:shadow-lg transition-shadow duration-300 delay-200">
                    <span class="text-6xl text-reka-blue/15 font-serif leading-none select-none">“</span>
                    <p class="text-reka-text-secondary italic leading-relaxed mt-2">
                        Furnished our studio apartment completely via REKA. Quality-to-price ratio is unmatched. The customer support assisted in selecting layout templates that maximize our space.
                    </p>
                    <div class="flex text-reka-yellow mt-4">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <div class="flex items-center gap-3 mt-6">
                        <img src="https://i.pravatar.cc/100?img=5" alt="Lisa W. avatar" class="w-10 h-10 rounded-full object-cover">
                        <div>
                            <span class="font-bold text-reka-text text-sm block">Lisa W.</span>
                            <span class="text-reka-text-muted text-xs">Surabaya, Indonesia</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ─── NEWSLETTER SUBSCRIPTION ─── -->
    <section class="py-20 bg-reka-blue text-white relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
        <div class="absolute bottom-0 left-0 w-64 h-64 bg-white/5 rounded-full translate-y-1/2 -translate-x-1/2 pointer-events-none"></div>

        <div class="max-w-xl mx-auto text-center px-6 relative z-10">
            <div data-animate class="flex flex-col items-center">
                <svg class="w-12 h-12 text-reka-yellow animate-float" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <h2 class="text-3xl font-bold mt-6 tracking-tight">Join the Family</h2>
                <p class="text-white/80 mt-3 max-w-sm">Subscribe to get 10% off your first purchase, design inspiration, and special member sales.</p>

                <form id="newsletter-form" class="mt-8 flex w-full max-w-md bg-white rounded-lg p-1.5 shadow-lg border border-white/20">
                    <input type="email" required placeholder="Enter your email address" class="flex-grow pl-4 pr-2 py-3.5 bg-transparent border-none text-reka-text text-sm placeholder:text-gray-400 focus:outline-none w-full" aria-label="Email Address">
                    <button type="submit" class="bg-reka-blue hover:bg-reka-blue-dark text-white font-bold px-6 py-3.5 rounded-md transition-colors whitespace-nowrap text-sm">
                        Subscribe
                    </button>
                </form>
                <p class="text-white/40 text-[11px] mt-4">We respect your privacy. Unsubscribe at any time.</p>
            </div>
        </div>
    </section>

    <!-- ─── FOOTER ─── -->
    <footer class="bg-reka-text text-white pt-20 pb-8 border-t border-gray-900">
        <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            <!-- Col 1: About & Socials -->
            <div>
                <a href="/" class="text-2xl font-extrabold text-white tracking-wider uppercase flex items-center gap-1.5">
                    <span class="w-6 h-6 bg-reka-yellow rounded-md flex items-center justify-center text-reka-text text-sm font-black">R</span>
                    REKA
                </a>
                <p class="text-gray-400 mt-4 text-sm leading-relaxed max-w-xs">
                    Functional, beautiful, and sustainable Scandinavian-inspired modular furniture designed to maximize modern living spaces.
                </p>
                <div class="flex items-center gap-4 mt-6">
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-reka-blue text-gray-400 hover:text-white flex items-center justify-center transition-all duration-300" aria-label="Facebook">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-reka-blue text-gray-400 hover:text-white flex items-center justify-center transition-all duration-300" aria-label="Instagram">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 rounded-full bg-gray-800 hover:bg-reka-blue text-gray-400 hover:text-white flex items-center justify-center transition-all duration-300" aria-label="Twitter">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Col 2: Shop links -->
            <div>
                <h4 class="font-bold text-base mb-6 uppercase tracking-wider">Shop</h4>
                <ul class="flex flex-col gap-3.5 text-sm text-gray-400">
                    <li><a href="#categories" class="hover:text-white transition-colors">Living Room Collection</a></li>
                    <li><a href="#categories" class="hover:text-white transition-colors">Bedroom Collection</a></li>
                    <li><a href="#categories" class="hover:text-white transition-colors">Kitchen & Dining</a></li>
                    <li><a href="#categories" class="hover:text-white transition-colors">Home Workspace</a></li>
                    <li><a href="#categories" class="hover:text-white transition-colors">Outdoor Furniture</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">All Products</a></li>
                </ul>
            </div>

            <!-- Col 3: Support links -->
            <div>
                <h4 class="font-bold text-base mb-6 uppercase tracking-wider">Customer Support</h4>
                <ul class="flex flex-col gap-3.5 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-white transition-colors">Track Order</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Delivery & Installation</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Returns & Refunds</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Product Guides & Assembly</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">FAQs</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Store Locator</a></li>
                </ul>
            </div>

            <!-- Col 4: Corporate -->
            <div>
                <h4 class="font-bold text-base mb-6 uppercase tracking-wider">REKA Indonesia</h4>
                <ul class="flex flex-col gap-3.5 text-sm text-gray-400">
                    <li><a href="#" class="hover:text-white transition-colors">About Us</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Careers</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Sustainability & Design</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Newsroom</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">REKA Family Member</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Contact Us</a></li>
                </ul>
            </div>
        </div>

        <!-- Divider -->
        <div class="max-w-7xl mx-auto px-6 border-t border-gray-800 mt-16 pt-8 flex flex-col md:flex-row justify-between items-center gap-6">
            <!-- Copyright -->
            <div>
                <span class="text-xs text-gray-500">&copy; 2026 REKA. All rights reserved. Inspiration by IKEA style.</span>
            </div>

            <!-- Payment Badges -->
            <div class="flex flex-wrap gap-2.5">
                <span class="bg-gray-800 text-gray-400 text-[10px] font-bold px-3 py-1.5 rounded border border-gray-700 select-none uppercase tracking-wider">Visa</span>
                <span class="bg-gray-800 text-gray-400 text-[10px] font-bold px-3 py-1.5 rounded border border-gray-700 select-none uppercase tracking-wider">Mastercard</span>
                <span class="bg-gray-800 text-gray-400 text-[10px] font-bold px-3 py-1.5 rounded border border-gray-700 select-none uppercase tracking-wider">BCA</span>
                <span class="bg-gray-800 text-gray-400 text-[10px] font-bold px-3 py-1.5 rounded border border-gray-700 select-none uppercase tracking-wider">Mandiri</span>
                <span class="bg-gray-800 text-gray-400 text-[10px] font-bold px-3 py-1.5 rounded border border-gray-700 select-none uppercase tracking-wider">GoPay</span>
            </div>

            <!-- Legal links -->
            <div class="flex gap-6 text-xs text-gray-500">
                <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="hover:text-white transition-colors">Terms of Service</a>
            </div>
        </div>
    </footer>

</body>
</html>
