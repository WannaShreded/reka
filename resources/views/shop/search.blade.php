<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REKA - Search Results</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f7f6f2] text-reka-text antialiased">
    <div class="min-h-screen bg-[linear-gradient(135deg,_#ffffff_0%,_#f7f6f2_100%)]">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 lg:py-12">
            <div class="surface-card p-6">
                <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                    <div class="flex-1">
                        <p class="text-sm font-semibold uppercase tracking-[0.25em] text-reka-blue">Find your fit</p>
                        <h1 class="mt-2 text-3xl font-semibold tracking-tight">Search Results</h1>
                        <p class="mt-2 text-sm text-reka-text-muted">Showing {{ count($products) }} results for “{{ $query ?? '' }}”</p>
                    </div>
                    <form action="{{ route('search') }}" method="GET" class="flex w-full max-w-xl items-center rounded-full border border-reka-border bg-reka-surface px-4 py-3 shadow-sm">
                        <svg class="mr-3 h-5 w-5 text-reka-text-muted" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        <input type="text" name="query" value="{{ $query ?? '' }}" class="w-full bg-transparent text-sm outline-none" />
                    </form>
                </div>
            </div>

            <div class="mt-8 grid gap-8 lg:grid-cols-[240px_minmax(0,1fr)]">
                <aside class="section-card p-5 lg:sticky lg:top-6 lg:h-fit">
                    <h2 class="text-lg font-semibold">Filters</h2>
                    <div class="mt-5 space-y-5 text-sm">
                        <div>
                            <p class="mb-2 font-semibold text-reka-text">Category</p>
                            <div class="space-y-2 text-reka-text-secondary">
                                <label class="flex items-center gap-2"><input type="checkbox" class="h-4 w-4 rounded border-reka-border text-reka-blue" /> Shirts</label>
                                <label class="flex items-center gap-2"><input type="checkbox" class="h-4 w-4 rounded border-reka-border text-reka-blue" /> Jackets</label>
                                <label class="flex items-center gap-2"><input type="checkbox" class="h-4 w-4 rounded border-reka-border text-reka-blue" /> Accessories</label>
                            </div>
                        </div>
                        <div>
                            <p class="mb-2 font-semibold text-reka-text">Price</p>
                            <div class="space-y-2 text-reka-text-secondary">
                                <label class="flex items-center gap-2"><input type="radio" name="price" class="h-4 w-4 border-reka-border text-reka-blue" /> Under Rp 3M</label>
                                <label class="flex items-center gap-2"><input type="radio" name="price" class="h-4 w-4 border-reka-border text-reka-blue" /> Rp 3M – 8M</label>
                                <label class="flex items-center gap-2"><input type="radio" name="price" class="h-4 w-4 border-reka-border text-reka-blue" /> Above Rp 8M</label>
                            </div>
                        </div>
                        <div>
                            <p class="mb-2 font-semibold text-reka-text">Material</p>
                            <div class="space-y-2 text-reka-text-secondary">
                                <label class="flex items-center gap-2"><input type="checkbox" class="h-4 w-4 rounded border-reka-border text-reka-blue" /> Cotton</label>
                                <label class="flex items-center gap-2"><input type="checkbox" class="h-4 w-4 rounded border-reka-border text-reka-blue" /> Polyester</label>
                                <label class="flex items-center gap-2"><input type="checkbox" class="h-4 w-4 rounded border-reka-border text-reka-blue" /> Wool</label>
                            </div>
                        </div>
                    </div>
                </aside>

                <section>
                    <div class="mb-5 flex flex-col gap-3 rounded-[24px] border border-reka-border bg-white p-4 shadow-[0_10px_30px_rgba(17,17,17,0.05)] sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm font-semibold text-reka-blue">{{ count($products) }} products</p>
                            <p class="text-sm text-reka-text-muted">Browse functional pieces for every corner.</p>
                        </div>
                        <div class="flex items-center gap-3">
                            <label class="text-sm text-reka-text-secondary">Sort by</label>
                            <select class="rounded-full border border-reka-border bg-reka-surface px-3 py-2 text-sm outline-none">
                                <option>Featured</option>
                                <option>Price: Low to High</option>
                                <option>Price: High to Low</option>
                                <option>Newest</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-3">
                        @forelse($products as $slug => $product)
                            <article class="group overflow-hidden rounded-[28px] border border-reka-border bg-white shadow-[0_10px_30px_rgba(17,17,17,0.05)] transition hover:-translate-y-1 hover:shadow-[0_16px_40px_rgba(17,17,17,0.08)]">
                                <a href="{{ route('product-detail', ['slug' => $slug]) }}"><img src="{{ $product['image_url'] }}" alt="{{ $product['name'] }}" class="h-52 w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy"></a>
                                <div class="p-5">
                                    <h3 class="text-lg font-semibold"><a href="{{ route('product-detail', ['slug' => $slug]) }}" class="hover:text-reka-blue">{{ $product['name'] }}</a></h3>
                                    <p class="mt-1 text-sm text-reka-text-muted">{{ $product['description'] }}</p>
                                    <div class="mt-3 flex items-center justify-between">
                                        <div>
                                            <p class="text-base font-semibold text-reka-blue">Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
                                            @if(($product['is_available'] ?? false))
                                                <p class="mt-1 text-xs font-semibold uppercase tracking-[0.2em] text-emerald-600">Tersedia</p>
                                            @else
                                                <p class="mt-1 text-xs font-semibold uppercase tracking-[0.2em] text-rose-600">Barang Habis</p>
                                            @endif
                                        </div>
                                        <span class="text-sm text-reka-text-muted">★ {{ $product['rating'] }}</span>
                                    </div>
                                </div>
                            </article>
                        @empty
                            <div class="col-span-full empty-state">No products matched your search. Try a different term.</div>
                        @endforelse
                    </div>

                    <div class="mt-8 flex flex-wrap items-center justify-center gap-2">
                        <a href="{{ route('category') }}" class="rounded-full border border-reka-border px-3 py-2 text-sm font-medium text-reka-text-secondary transition hover:bg-reka-surface">Previous</a>
                        <a href="{{ route('category') }}" class="rounded-full bg-reka-blue px-3 py-2 text-sm font-semibold text-white">1</a>
                        <a href="{{ route('category') }}" class="rounded-full border border-reka-border px-3 py-2 text-sm font-medium text-reka-text-secondary transition hover:bg-reka-surface">2</a>
                        <a href="{{ route('category') }}" class="rounded-full border border-reka-border px-3 py-2 text-sm font-medium text-reka-text-secondary transition hover:bg-reka-surface">3</a>
                        <a href="{{ route('category') }}" class="rounded-full border border-reka-border px-3 py-2 text-sm font-medium text-reka-text-secondary transition hover:bg-reka-surface">Next</a>
                    </div>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
