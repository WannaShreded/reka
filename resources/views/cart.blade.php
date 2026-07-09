<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REKA - Shopping Cart</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f7f6f2] text-reka-text antialiased">
    <header class="border-b border-reka-border bg-white/90 backdrop-blur">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
            <a href="/" class="flex items-center gap-2 text-lg font-semibold tracking-[0.2em] text-reka-blue uppercase">
                <span class="flex h-8 w-8 items-center justify-center rounded-md bg-reka-yellow text-sm font-black text-reka-text">R</span>
                REKA
            </a>
            <a href="/" class="text-sm font-medium text-reka-text-secondary transition hover:text-reka-blue">
                Continue browsing
            </a>
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-4 py-10 sm:px-6 lg:px-8 lg:py-16">
        <div class="mb-8 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-reka-blue">Your bag</p>
                <h1 class="text-3xl font-semibold tracking-tight sm:text-4xl">Shopping Cart</h1>
            </div>
            <p class="text-sm text-reka-text-muted">{{ count($items) }} item{{ count($items) === 1 ? '' : 's' }} ready for checkout</p>
        </div>

        <div class="grid gap-8 lg:grid-cols-[1.6fr_0.8fr]">
            <section class="space-y-4">
                @forelse($items as $key => $item)
                    <article class="flex flex-col gap-5 rounded-[28px] border border-reka-border bg-white p-5 shadow-[0_10px_30px_rgba(17,17,17,0.05)] sm:flex-row sm:items-center">
                        <img src="{{ $item['image'] ?? '' }}" alt="{{ $item['name'] }}" class="h-32 w-full rounded-2xl object-cover sm:h-28 sm:w-28">
                        <div class="flex-1">
                            <div class="flex flex-col gap-3 sm:flex-row sm:items-start sm:justify-between">
                                <div>
                                    <h2 class="text-lg font-semibold">{{ $item['name'] }}</h2>
                                    <p class="mt-1 text-sm text-reka-text-muted">{{ $item['size'] ?? 'Standard' }} · Qty {{ $item['quantity'] }}</p>
                                    <p class="mt-2 text-sm font-medium text-reka-blue">In stock</p>
                                </div>
                                <form action="{{ route('cart.remove', ['key' => $key]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-sm font-medium text-reka-error transition hover:text-rose-700">Remove</button>
                                </form>
                            </div>

                            <div class="mt-5 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                                <form action="{{ route('cart.update', ['key' => $key]) }}" method="POST" class="inline-flex items-center rounded-full border border-reka-border bg-reka-surface p-1">
                                    @csrf
                                    @method('PATCH')
                                    <input type="number" name="quantity" value="{{ $item['quantity'] }}" min="1" class="w-12 bg-transparent px-2 py-1 text-center text-sm font-semibold outline-none">
                                    <button class="h-9 w-9 rounded-full text-lg transition hover:bg-white" type="submit" aria-label="Update quantity">↺</button>
                                </form>
                                <div class="text-lg font-semibold text-reka-text">Rp {{ number_format(($item['price'] ?? 0) * ($item['quantity'] ?? 1), 0, ',', '.') }}</div>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="rounded-[28px] border border-dashed border-reka-border bg-white p-8 text-center text-reka-text-muted">Your cart is empty. Add a piece you love to get started.</div>
                @endforelse
            </section>

            <aside class="rounded-[28px] border border-reka-border bg-white p-6 shadow-[0_10px_30px_rgba(17,17,17,0.05)]">
                <div class="flex items-center justify-between">
                    <h2 class="text-xl font-semibold">Order Summary</h2>
                    <span class="rounded-full bg-reka-blue-light px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-reka-blue">Estimated</span>
                </div>

                <div class="mt-6 space-y-3 text-sm text-reka-text-secondary">
                    <div class="flex items-center justify-between">
                        <span>Subtotal</span>
                        <span class="font-medium text-reka-text">Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex items-center justify-between">
                        <span>Shipping</span>
                        <span class="font-medium text-reka-success">Free</span>
                    </div>
                </div>

                <div class="mt-6 border-t border-reka-border pt-4">
                    <div class="flex items-center justify-between text-lg font-semibold">
                        <span>Total</span>
                        <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <p class="mt-2 text-sm text-reka-text-muted">Delivery within 3–5 business days</p>
                </div>

                <div class="mt-6 space-y-3">
                    <a href="/category" class="flex items-center justify-center rounded-full border border-reka-border px-4 py-3 text-sm font-semibold text-reka-text transition hover:bg-reka-surface">
                        Continue Shopping
                    </a>
                    <a href="/checkout" class="flex items-center justify-center rounded-full bg-reka-blue px-4 py-3 text-sm font-semibold text-white transition hover:bg-reka-blue-dark">
                        Checkout
                    </a>
                </div>
            </aside>
        </div>
    </main>
</body>
</html>
