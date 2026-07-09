<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="REKA - VIMLE 3-Seat Sofa. Comfortable, functional, and modular Scandinavian sofa.">
    
    <title>REKA - VIMLE 3-Seat Sofa</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    
    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="page-shell font-sans antialiased bg-white text-reka-text selection:bg-reka-blue-light selection:text-reka-blue">

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

    <!-- ─── NAVIGATION BAR ─── -->
    <header id="navbar" class="w-full bg-white border-b border-reka-border sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <!-- Left: Logo -->
            <a href="/" class="text-2xl font-bold text-reka-blue tracking-widest uppercase flex items-center gap-1.5">
                <span class="w-6 h-6 bg-reka-yellow rounded-md flex items-center justify-center text-reka-text text-sm font-black">R</span>
                REKA
            </a>

            <!-- Center: Navigation Links -->
            <nav class="hidden lg:flex items-center gap-8">
                <a href="/#categories" class="text-sm font-semibold text-reka-text hover:text-reka-blue transition-colors">Products</a>
                <a href="/#featured" class="text-sm font-semibold text-reka-text hover:text-reka-blue transition-colors">Rooms</a>
                <a href="/#promotions" class="text-sm font-semibold text-reka-text hover:text-reka-blue transition-colors">Inspiration</a>
                <a href="/#new-arrivals" class="text-sm font-semibold text-reka-text hover:text-reka-blue transition-colors">New Arrivals</a>
                <a href="/#reviews" class="text-sm font-semibold text-reka-text hover:text-reka-blue transition-colors">Offers</a>
            </nav>

            <!-- Right: Actions -->
            <div class="flex items-center gap-5">
                <div class="hidden md:flex items-center relative w-72">
                    <input type="text" placeholder="What are you looking for?" class="w-full pl-10 pr-4 py-2 bg-reka-surface border border-transparent focus:border-reka-blue rounded-full text-sm focus:outline-none transition-all placeholder:text-reka-text-muted">
                    <svg class="w-4 h-4 text-reka-text-secondary absolute left-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                </div>

                <a href="#" class="relative p-1 text-reka-text hover:text-reka-blue transition-colors" aria-label="Wishlist">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    <span class="absolute -top-1 -right-1 bg-reka-error text-white text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">0</span>
                </a>

                <a href="#" class="relative p-1 text-reka-text hover:text-reka-blue transition-colors" aria-label="Shopping Cart">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                    <span id="cart-count" class="absolute -top-1 -right-1 bg-reka-blue text-white text-[10px] font-bold rounded-full w-4 h-4 flex items-center justify-center">0</span>
                </a>

                <a href="#" class="p-1 text-reka-text hover:text-reka-blue transition-colors hidden md:block" aria-label="My Account">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                </a>
            </div>
        </div>
    </header>

    <!-- ─── BREADCRUMBS ─── -->
    <div class="bg-reka-surface border-b border-reka-border py-4">
        <div class="max-w-7xl mx-auto px-6 text-sm text-reka-text-secondary flex items-center gap-2.5">
            <a href="/" class="hover:text-reka-blue transition-colors">Home</a>
            <svg class="w-3.5 h-3.5 text-reka-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <a href="/category" class="hover:text-reka-blue transition-colors">Category</a>
            <svg class="w-3.5 h-3.5 text-reka-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            <span class="text-reka-text font-semibold">{{ $product['name'] }}</span>
        </div>
    </div>

    <!-- ─── PRODUCT PRESENTATION (Main Detail) ─── -->
    <main class="page-shell-inner max-w-7xl mx-auto px-6 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
            
            <!-- LEFT COLUMN: Image & Gallery (7 cols) -->
            <div class="lg:col-span-7 flex flex-col gap-6">
                <!-- Large Product Image -->
                <div class="panel-card overflow-hidden aspect-square flex items-center justify-center p-8 group relative">
                    <img id="main-product-image" src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="w-full h-full object-contain transition-transform duration-500 group-hover:scale-105">
                    
                    <!-- Zoom Overlay Indicator -->
                    <span class="absolute bottom-4 right-4 bg-white/80 backdrop-blur-sm px-3.5 py-1.5 rounded-full text-xs font-semibold shadow-sm border border-reka-border text-reka-text pointer-events-none flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v6m3-3H7"/></svg>
                        Hover to Zoom
                    </span>
                </div>

                <!-- Thumbnail Gallery -->
                <div class="grid grid-cols-4 gap-4">
                    @foreach($product['images'] as $index => $image)
                        <button onclick="changeImage('{{ $image }}', this)" class="thumbnail-btn bg-reka-surface rounded-xl overflow-hidden aspect-square border-2 {{ $index === 0 ? 'border-reka-blue' : 'border-transparent hover:border-reka-border' }} p-2 focus:outline-none transition-all">
                            <img src="{{ $image }}" alt="{{ $product['name'] }} thumbnail" class="w-full h-full object-cover">
                        </button>
                    @endforeach
                </div>
            </div>

            <!-- RIGHT COLUMN: Purchase Details & Form (5 cols) -->
            <div class="lg:col-span-5 flex flex-col">
                <!-- Eyebrow & Stock Status -->
                <div class="flex items-center justify-between">
                    <span class="text-xs uppercase tracking-widest text-reka-blue font-bold">Modular Sofa Series</span>
                    <span class="inline-flex items-center gap-1.5 text-xs font-bold text-reka-success bg-green-50 px-3 py-1.5 rounded-full">
                        <span class="w-2 h-2 rounded-full bg-reka-success animate-pulse"></span>
                        In Stock (Only {{ $product['stock'] }} left!)
                    </span>
                </div>

                <!-- Product Name -->
                <h1 class="text-4xl font-extrabold text-reka-text mt-4">{{ $product['name'] }}</h1>
                <p class="text-lg text-reka-text-secondary mt-1">{{ $product['description'] }}</p>

                <!-- Rating -->
                <div class="flex items-center gap-2 mt-4">
                    <div class="flex text-reka-yellow">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    </div>
                    <a href="#reviews-anchor" class="text-sm font-semibold text-reka-blue hover:underline">4.5 (126 reviews)</a>
                </div>

                <!-- Price -->
                <div class="mt-6 border-b border-reka-border pb-6">
                    <span class="text-3xl font-extrabold text-reka-text">Rp {{ number_format($product['price'], 0, ',', '.') }}</span>
                    <p class="text-xs text-reka-text-muted mt-1">Includes local tax. Standard assembly fee of Rp 150,000 applicable at checkout.</p>
                </div>

                <!-- Description -->
                <div class="mt-6">
                    <p class="text-sm text-reka-text-secondary leading-relaxed">
                        {{ $product['description'] }}
                    </p>
                </div>

                <!-- Available Colors -->
                <div class="mt-8">
                    <span class="text-xs uppercase tracking-wider font-bold text-reka-text">Available Colors</span>
                    <div class="flex gap-3 mt-3">
                        @foreach($product['colors'] as $index => $color)
                            <button class="w-8 h-8 rounded-full border {{ $index === 0 ? 'border-2 border-reka-blue' : 'border-reka-border' }} hover:scale-105 transition-all" aria-label="{{ $color }}" title="{{ $color }}"></button>
                        @endforeach
                    </div>
                </div>

                <!-- Key Specs Grid -->
                <div class="grid grid-cols-2 gap-4 mt-8 bg-reka-surface rounded-xl p-4 border border-reka-border">
                    <div>
                        <span class="text-[10px] uppercase font-bold text-reka-text-muted block">Dimensions</span>
                        <span class="text-sm font-semibold text-reka-text">241 x 98 x 83 cm</span>
                    </div>
                    <div>
                        <span class="text-[10px] uppercase font-bold text-reka-text-muted block">Cover Material</span>
                        <span class="text-sm font-semibold text-reka-text">100% Polyester</span>
                    </div>
                </div>

                <form action="{{ route('cart.add') }}" method="POST" class="mt-8 space-y-4">
                    @csrf
                    <input type="hidden" name="product_slug" value="{{ $product['slug'] }}">
                    <div class="flex items-center gap-3">
                        <label class="text-sm font-semibold text-reka-text-secondary">Size</label>
                        <select name="size" class="rounded-full border border-reka-border bg-white px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-reka-blue/20" required>
                            <option value="">Choose size</option>
                            @foreach($product['sizes'] as $size)
                                <option value="{{ $size }}">{{ $size }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex gap-4">
                        <div class="flex items-center border border-reka-border rounded-lg bg-white overflow-hidden shadow-sm shrink-0">
                            <button type="button" onclick="updateQty(-1)" class="px-3.5 py-3 hover:bg-reka-surface active:bg-gray-100 font-bold transition-colors focus:outline-none" aria-label="Decrease quantity">−</button>
                            <span id="product-qty" class="px-5 py-3 font-semibold text-sm min-w-[50px] text-center select-none">1</span>
                            <button type="button" onclick="updateQty(1)" class="px-3.5 py-3 hover:bg-reka-surface active:bg-gray-100 font-bold transition-colors focus:outline-none" aria-label="Increase quantity">+</button>
                        </div>
                        <input type="hidden" name="quantity" id="quantity-input" value="1">
                        <button type="submit" class="add-to-cart-btn flex-grow inline-flex items-center justify-center gap-2 btn-primary px-6 py-4 rounded-lg shadow-md hover:shadow-lg focus:outline-none">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/></svg>
                            Add to Cart
                        </button>
                    </div>
                </form>
                <form action="{{ route('wishlist.add') }}" method="POST" class="mt-3">
                    @csrf
                    <input type="hidden" name="product_slug" value="{{ $product['slug'] }}">
                    <button type="submit" class="wishlist-btn border border-reka-border w-14 h-14 rounded-lg flex items-center justify-center bg-white hover:bg-reka-surface transition-all shrink-0 shadow-sm hover:scale-105 active:scale-95" aria-label="Add to Wishlist">
                        <svg class="w-6 h-6 text-gray-500 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </button>
                </form>

                <a href="{{ route('checkout') }}" class="mt-3.5 block w-full bg-reka-yellow text-reka-text font-bold px-6 py-4 rounded-full hover:bg-reka-yellow-dark transition-all shadow-sm focus:outline-none text-center">
                    Buy It Now
                </a>

                <!-- Small Trust indicators -->
                <div class="mt-6 flex flex-col gap-2.5 text-xs text-reka-text-secondary border-t border-reka-border pt-6">
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-reka-blue shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                        365-day return policy — return items open or unopened
                    </span>
                    <span class="flex items-center gap-2">
                        <svg class="w-4 h-4 text-reka-blue shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
                        10-year warranty included on sofa frame structural integrity
                    </span>
                </div>
            </div>

        </div>

        <!-- ─── DETAIL SPECIFICATIONS ACCORDION (Below Column) ─── -->
        <section class="mt-20 border-t border-reka-border pt-16">
            <h2 class="text-2xl font-bold tracking-tight mb-8">Product Specifications</h2>
            
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
                <!-- Left: Text Summary (4 cols) -->
                <div class="lg:col-span-4">
                    <h3 class="font-bold text-lg text-reka-text">Material & Care Instructions</h3>
                    <p class="text-sm text-reka-text-secondary mt-3 leading-relaxed">
                        To keep this sofa looking fresh and clean, wipe clean regularly with a damp cloth or soft sponge. Dry clean instructions apply for fabric cover removal.
                    </p>
                </div>

                <!-- Right: Detailed Spec Table (8 cols) -->
                <div class="lg:col-span-8 overflow-hidden section-card rounded-xl">
                    <table class="w-full text-left text-sm border-collapse">
                        <tbody>
                            <tr class="border-b border-reka-border">
                                <td class="px-5 py-4 bg-reka-surface font-semibold text-reka-text w-1/3">Width</td>
                                <td class="px-5 py-4 text-reka-text-secondary">241 cm</td>
                            </tr>
                            <tr class="border-b border-reka-border">
                                <td class="px-5 py-4 bg-reka-surface font-semibold text-reka-text">Depth</td>
                                <td class="px-5 py-4 text-reka-text-secondary">98 cm</td>
                            </tr>
                            <tr class="border-b border-reka-border">
                                <td class="px-5 py-4 bg-reka-surface font-semibold text-reka-text">Height</td>
                                <td class="px-5 py-4 text-reka-text-secondary">83 cm</td>
                            </tr>
                            <tr class="border-b border-reka-border">
                                <td class="px-5 py-4 bg-reka-surface font-semibold text-reka-text">Seat depth</td>
                                <td class="px-5 py-4 text-reka-text-secondary">60 cm</td>
                            </tr>
                            <tr class="border-b border-reka-border">
                                <td class="px-5 py-4 bg-reka-surface font-semibold text-reka-text">Materials</td>
                                <td class="px-5 py-4 text-reka-text-secondary">
                                    Frame: Solid wood, plywood, particleboard, fiberboard, polyurethane foam.<br>
                                    Cushion: Polyurethane foam, polyester wadding.
                                </td>
                            </tr>
                            <tr>
                                <td class="px-5 py-4 bg-reka-surface font-semibold text-reka-text">Assembly</td>
                                <td class="px-5 py-4 text-reka-text-secondary">Requires manual assembly. Assembly instructions guide booklet enclosed.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- ─── CUSTOMER REVIEWS SECTION ─── -->
        <section id="reviews-anchor" class="mt-20 border-t border-reka-border pt-16">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
                <div>
                    <h2 class="text-2xl font-bold tracking-tight">Customer Reviews</h2>
                    <p class="text-sm text-reka-text-muted mt-1">Based on 126 verified ratings from customers</p>
                </div>
                <!-- Review Summary Statistics -->
                <div class="flex items-center gap-4 bg-reka-surface p-4 rounded-xl border border-reka-border shrink-0">
                    <span class="text-4xl font-black text-reka-text">4.5</span>
                    <div>
                        <div class="flex text-reka-yellow">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                            <svg class="w-4 h-4 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                        </div>
                        <span class="text-xs text-reka-text-muted mt-0.5 block">126 Reviews</span>
                    </div>
                </div>
            </div>

            <!-- Review Items Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Review Item 1 -->
                <div class="border border-reka-border rounded-2xl p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start gap-4">
                            <div>
                                <span class="font-bold text-reka-text text-sm">Very comfortable sofa!</span>
                                <div class="flex text-reka-yellow mt-1">
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                </div>
                            </div>
                            <span class="text-xs text-reka-text-muted">June 12, 2026</span>
                        </div>
                        <p class="text-sm text-reka-text-secondary mt-3 leading-relaxed">
                            The sofa is highly cozy. Delivered and installed perfectly by the REKA family crew. The color perfectly fits our minimalist beige room layout.
                        </p>
                    </div>
                    <div class="flex items-center gap-2 mt-4 pt-3 border-t border-reka-surface">
                        <span class="text-xs font-semibold text-reka-text">Sarah M.</span>
                        <span class="text-xs text-reka-text-muted">Verified Buyer</span>
                    </div>
                </div>

                <!-- Review Item 2 -->
                <div class="border border-reka-border rounded-2xl p-6 flex flex-col justify-between">
                    <div>
                        <div class="flex justify-between items-start gap-4">
                            <div>
                                <span class="font-bold text-reka-text text-sm">Perfect modular system</span>
                                <div class="flex text-reka-yellow mt-1">
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    <svg class="w-3.5 h-3.5 fill-current text-gray-300" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                </div>
                            </div>
                            <span class="text-xs text-reka-text-muted">May 28, 2026</span>
                        </div>
                        <p class="text-sm text-reka-text-secondary mt-3 leading-relaxed">
                            It can be easily split into single seat units if needed, making it highly modular. Quality fabric and extremely soft cushions.
                        </p>
                    </div>
                    <div class="flex items-center gap-2 mt-4 pt-3 border-t border-reka-surface">
                        <span class="text-xs font-semibold text-reka-text">Michael K.</span>
                        <span class="text-xs text-reka-text-muted">Verified Buyer</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- ─── RELATED PRODUCTS GRID ─── -->
        <section class="mt-24 border-t border-reka-border pt-16">
            <div class="flex items-center justify-between mb-12">
                <div>
                    <h2 class="text-2xl font-bold tracking-tight">Complete the Look</h2>
                    <p class="text-sm text-reka-text-muted mt-1">Products often purchased together with this sofa</p>
                </div>
                <a href="#" class="text-sm font-semibold text-reka-blue hover:underline flex items-center gap-1.5">
                    View All Matching
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                </a>
            </div>

            <!-- Related Product Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Card 1 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg border border-reka-border transition-all duration-300 group flex flex-col h-full relative">
                    <a href="#" class="relative aspect-square overflow-hidden bg-gray-50 block">
                        <img src="https://images.unsplash.com/photo-1532372320978-9e5f95227d3a?auto=format&fit=crop&w=400&q=80" alt="BJÖRKUDDEN Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </a>
                    <div class="p-5 flex flex-col grow">
                        <h3 class="font-bold text-reka-text text-base hover:text-reka-blue transition-colors">
                            <a href="#">BJÖRKUDDEN Table</a>
                        </h3>
                        <span class="text-xs text-reka-text-muted mt-0.5">Dining Table</span>
                        <span class="text-base font-extrabold text-reka-text mt-3 block">Rp 2,199,000</span>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg border border-reka-border transition-all duration-300 group flex flex-col h-full relative">
                    <a href="#" class="relative aspect-square overflow-hidden bg-gray-50 block">
                        <img src="https://images.unsplash.com/photo-1519947486511-46149fa0a254?auto=format&fit=crop&w=400&q=80" alt="STRANDMON Chair" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </a>
                    <div class="p-5 flex flex-col grow">
                        <h3 class="font-bold text-reka-text text-base hover:text-reka-blue transition-colors">
                            <a href="#">STRANDMON Chair</a>
                        </h3>
                        <span class="text-xs text-reka-text-muted mt-0.5">Wing Chair</span>
                        <span class="text-base font-extrabold text-reka-text mt-3 block">Rp 3,999,000</span>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg border border-reka-border transition-all duration-300 group flex flex-col h-full relative">
                    <a href="#" class="relative aspect-square overflow-hidden bg-gray-50 block">
                        <img src="https://images.unsplash.com/photo-1538688525198-9b88f6f53126?auto=format&fit=crop&w=400&q=80" alt="KALLAX Shelf" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </a>
                    <div class="p-5 flex flex-col grow">
                        <h3 class="font-bold text-reka-text text-base hover:text-reka-blue transition-colors">
                            <a href="#">KALLAX Shelf</a>
                        </h3>
                        <span class="text-xs text-reka-text-muted mt-0.5">Shelving Unit</span>
                        <span class="text-base font-extrabold text-reka-text mt-3 block">Rp 1,299,000</span>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-lg border border-reka-border transition-all duration-300 group flex flex-col h-full relative">
                    <a href="#" class="relative aspect-square overflow-hidden bg-gray-50 block">
                        <img src="https://images.unsplash.com/photo-1550581190-9c1c48d21d6c?auto=format&fit=crop&w=400&q=80" alt="LACK Side Table" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </a>
                    <div class="p-5 flex flex-col grow">
                        <h3 class="font-bold text-reka-text text-base hover:text-reka-blue transition-colors">
                            <a href="#">LACK Side Table</a>
                        </h3>
                        <span class="text-xs text-reka-text-muted mt-0.5">Side Table</span>
                        <span class="text-base font-extrabold text-reka-text mt-3 block">Rp 299,000</span>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- ─── FOOTER ─── -->
    <footer class="bg-reka-text text-white pt-20 pb-8 border-t border-gray-900 mt-20">
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
                    <li><a href="/#categories" class="hover:text-white transition-colors">Living Room Collection</a></li>
                    <li><a href="/#categories" class="hover:text-white transition-colors">Bedroom Collection</a></li>
                    <li><a href="/#categories" class="hover:text-white transition-colors">Kitchen & Dining</a></li>
                    <li><a href="/#categories" class="hover:text-white transition-colors">Home Workspace</a></li>
                    <li><a href="/#categories" class="hover:text-white transition-colors">Outdoor Furniture</a></li>
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

    <!-- Interactive Scripts for Details Page -->
    <script>
        // Gallery switcher
        function changeImage(src, btn) {
            document.getElementById('main-product-image').src = src;
            // Remove active border from all thumbs
            document.querySelectorAll('.thumbnail-btn').forEach(b => {
                b.classList.remove('border-reka-blue');
                b.classList.add('border-transparent');
            });
            // Add active border to this thumb
            btn.classList.remove('border-transparent');
            btn.classList.add('border-reka-blue');
        }

        // Qty counter
        function updateQty(delta) {
            const label = document.getElementById('product-qty');
            let current = parseInt(label.textContent, 10) || 1;
            current += delta;
            if (current < 1) current = 1;
            label.textContent = current;
        }
    </script>
</body>
</html>
