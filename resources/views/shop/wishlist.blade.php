<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REKA - Wishlist</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="page-shell min-h-screen bg-[#f7f6f2] text-reka-text antialiased">
    <div class="min-h-screen bg-[linear-gradient(135deg,_#ffffff_0%,_#f7f6f2_100%)]">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 lg:py-12">
            <div class="mb-8 flex flex-col gap-4 rounded-[28px] border border-reka-border bg-white p-6 shadow-[0_12px_35px_rgba(17,17,17,0.06)] sm:flex-row sm:items-end sm:justify-between">
                <div>
                    <p class="text-sm font-semibold uppercase tracking-[0.25em] text-reka-blue">Saved for later</p>
                    <h1 class="mt-2 text-3xl font-semibold tracking-tight">Wishlist</h1>
                    <p class="mt-2 text-sm text-reka-text-muted">Curated pieces you love, ready to bring home.</p>
                </div>
                <div class="rounded-2xl bg-reka-surface px-4 py-3 text-sm text-reka-text-secondary">
                    <p class="font-semibold text-reka-text">{{ count($wishlist) }} saved item{{ count($wishlist) === 1 ? '' : 's' }}</p>
                </div>
            </div>

            <div class="grid gap-6 sm:grid-cols-2 xl:grid-cols-4">
                @forelse($wishlist as $product)
                    <article class="group overflow-hidden rounded-[28px] border border-reka-border bg-white shadow-[0_10px_30px_rgba(17,17,17,0.05)] transition hover:-translate-y-1 hover:shadow-[0_16px_40px_rgba(17,17,17,0.08)]">
                        <a href="{{ route('product-detail', ['slug' => $product['slug']]) }}"><img src="{{ $product['image_url'] }}" alt="{{ $product['name'] }}" class="h-56 w-full object-cover transition duration-500 group-hover:scale-105"></a>
                        <div class="p-5">
                            <h2 class="text-lg font-semibold"><a href="{{ route('product-detail', ['slug' => $product['slug']]) }}" class="hover:text-reka-blue">{{ $product['name'] }}</a></h2>
                            <p class="mt-1 text-lg font-semibold text-reka-blue">Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
                            <div class="mt-2 flex items-center gap-1 text-sm text-reka-text-muted">
                                <span class="text-reka-yellow">★</span> {{ $product['rating'] ?? '4.8' }}
                            </div>
                            <div class="mt-5 flex gap-2">
                                <form action="{{ route('wishlist.remove', ['slug' => $product['slug']]) }}" method="POST" class="flex-1">
                                    @csrf
                                    @method('DELETE')
                                    <button class="w-full rounded-full border border-reka-border px-3 py-2 text-sm font-semibold text-reka-text-secondary transition hover:bg-reka-surface">Remove</button>
                                </form>
                                <a href="{{ route('product-detail', ['slug' => $product['slug']]) }}" class="flex-1 rounded-full bg-reka-blue px-3 py-2 text-center text-sm font-semibold text-white transition hover:bg-reka-blue-dark">View</a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full rounded-[28px] border border-dashed border-reka-border bg-white p-8 text-center text-reka-text-muted">Nothing is saved yet. Browse the collection and save a few favorites.</div>
                @endforelse
            </div>
        </div>
    </div>
</body>
</html>
