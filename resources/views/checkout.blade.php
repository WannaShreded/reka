<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REKA - Checkout</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f7f6f2] text-reka-text antialiased">
    <header class="border-b border-reka-border bg-white/90 backdrop-blur">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 sm:px-6 lg:px-8">
            <a href="/" class="flex items-center gap-2 text-lg font-semibold uppercase tracking-[0.2em] text-reka-blue">
                <span class="flex h-8 w-8 items-center justify-center rounded-md bg-reka-yellow text-sm font-black text-reka-text">R</span>
                REKA
            </a>
            <a href="/cart" class="text-sm font-medium text-reka-text-secondary transition hover:text-reka-blue">
                Back to cart
            </a>
        </div>
    </header>

    <main class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 lg:py-12">
        <div class="mb-8">
            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-reka-blue">Complete your order</p>
            <h1 class="mt-2 text-3xl font-semibold tracking-tight sm:text-4xl">Checkout</h1>
        </div>

        <form method="POST" action="{{ route('checkout.place') }}" class="grid gap-8 lg:grid-cols-[1.35fr_0.8fr]">
            @csrf
            <section class="space-y-6">
                <div class="rounded-[28px] border border-reka-border bg-white p-6 shadow-[0_10px_30px_rgba(17,17,17,0.05)]">
                    <div class="mb-5 flex items-center gap-3">
                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-reka-blue text-sm font-semibold text-white">1</div>
                        <div>
                            <h2 class="text-xl font-semibold">Shipping Information</h2>
                            <p class="text-sm text-reka-text-muted">Where should we deliver your furniture?</p>
                        </div>
                    </div>

                    <div class="grid gap-4 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-sm font-medium text-reka-text-secondary">Full Name</label>
                            <input name="customer_name" type="text" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 outline-none transition focus:border-reka-blue" placeholder="Ayu Pratama" required>
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-reka-text-secondary">Phone Number</label>
                            <input name="phone" type="text" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 outline-none transition focus:border-reka-blue" placeholder="+62 812 3456 7890">
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-reka-text-secondary">Email</label>
                            <input name="email" type="email" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 outline-none transition focus:border-reka-blue" placeholder="you@example.com" required>
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-reka-text-secondary">Address</label>
                            <input name="address" type="text" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 outline-none transition focus:border-reka-blue" placeholder="Jl. Sudirman No. 12" required>
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-reka-text-secondary">Province</label>
                            <input type="text" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 outline-none transition focus:border-reka-blue" placeholder="DKI Jakarta">
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-reka-text-secondary">City</label>
                            <input type="text" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 outline-none transition focus:border-reka-blue" placeholder="Jakarta Selatan">
                        </div>
                        <div>
                            <label class="mb-2 block text-sm font-medium text-reka-text-secondary">Postal Code</label>
                            <input type="text" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 outline-none transition focus:border-reka-blue" placeholder="12950">
                        </div>
                    </div>
                </div>

                <div class="rounded-[28px] border border-reka-border bg-white p-6 shadow-[0_10px_30px_rgba(17,17,17,0.05)]">
                    <div class="mb-5 flex items-center gap-3">
                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-reka-yellow text-sm font-semibold text-reka-text">2</div>
                        <div>
                            <h2 class="text-xl font-semibold">Shipping Method</h2>
                            <p class="text-sm text-reka-text-muted">Choose how your order arrives.</p>
                        </div>
                    </div>

                    <div class="grid gap-3 md:grid-cols-2">
                        <label class="flex cursor-pointer items-start gap-3 rounded-2xl border border-reka-border bg-reka-surface p-4 transition hover:border-reka-blue">
                            <input type="radio" name="shipping_method" value="standard" class="mt-1" checked>
                            <div>
                                <p class="font-semibold">Standard Delivery</p>
                                <p class="text-sm text-reka-text-muted">3–5 business days · Free</p>
                            </div>
                        </label>
                        <label class="flex cursor-pointer items-start gap-3 rounded-2xl border border-reka-border bg-reka-surface p-4 transition hover:border-reka-blue">
                            <input type="radio" name="shipping_method" value="express" class="mt-1">
                            <div>
                                <p class="font-semibold">Express Delivery</p>
                                <p class="text-sm text-reka-text-muted">1–2 business days · Rp 250,000</p>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="rounded-[28px] border border-reka-border bg-white p-6 shadow-[0_10px_30px_rgba(17,17,17,0.05)]">
                    <div class="mb-5 flex items-center gap-3">
                        <div class="flex h-9 w-9 items-center justify-center rounded-full bg-reka-blue-light text-sm font-semibold text-reka-blue">3</div>
                        <div>
                            <h2 class="text-xl font-semibold">Payment Method</h2>
                            <p class="text-sm text-reka-text-muted">Select your preferred payment option.</p>
                        </div>
                    </div>

                    <div class="grid gap-3 md:grid-cols-2">
                        <label class="flex cursor-pointer items-center gap-3 rounded-2xl border border-reka-border bg-reka-surface p-4 transition hover:border-reka-blue">
                            <input type="radio" name="payment_method" value="credit_card" class="accent-reka-blue" checked>
                            <span class="font-semibold">Credit Card</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-3 rounded-2xl border border-reka-border bg-reka-surface p-4 transition hover:border-reka-blue">
                            <input type="radio" name="payment_method" value="bank_transfer" class="accent-reka-blue">
                            <span class="font-semibold">Bank Transfer</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-3 rounded-2xl border border-reka-border bg-reka-surface p-4 transition hover:border-reka-blue">
                            <input type="radio" name="payment_method" value="e_wallet" class="accent-reka-blue">
                            <span class="font-semibold">E-Wallet</span>
                        </label>
                        <label class="flex cursor-pointer items-center gap-3 rounded-2xl border border-reka-border bg-reka-surface p-4 transition hover:border-reka-blue">
                            <input type="radio" name="payment_method" value="cod" class="accent-reka-blue">
                            <span class="font-semibold">Cash on Delivery</span>
                        </label>
                    </div>
                </div>
            </section>

            <aside class="rounded-[28px] border border-reka-border bg-white p-6 shadow-[0_10px_30px_rgba(17,17,17,0.05)] lg:sticky lg:top-24 lg:h-fit">
                <h2 class="text-xl font-semibold">Order Summary</h2>
                <div class="mt-6 space-y-3 text-sm text-reka-text-secondary">
                    @foreach($items as $item)
                        <div class="flex items-center justify-between">
                            <span>{{ $item['name'] }} × {{ $item['quantity'] }}</span>
                            <span class="font-medium text-reka-text">Rp {{ number_format(($item['price'] ?? 0) * ($item['quantity'] ?? 1), 0, ',', '.') }}</span>
                        </div>
                    @endforeach
                    <div class="flex items-center justify-between">
                        <span>Shipping Cost</span>
                        <span class="font-medium text-reka-success">{{ $shippingCost > 0 ? 'Rp ' . number_format($shippingCost, 0, ',', '.') : 'Free' }}</span>
                    </div>
                </div>

                <div class="mt-6 border-t border-reka-border pt-4">
                    <div class="flex items-center justify-between text-lg font-semibold">
                        <span>Total Price</span>
                        <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                    </div>
                    <p class="mt-2 text-sm text-reka-text-muted">Secure checkout with instant confirmation</p>
                </div>

                <button type="submit" class="mt-6 w-full rounded-full bg-reka-blue px-5 py-4 text-base font-semibold text-white transition hover:bg-reka-blue-dark">
                    Place Order
                </button>
            </aside>
        </form>
    </main>
</body>
</html>
