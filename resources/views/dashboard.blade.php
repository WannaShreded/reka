<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REKA - Customer Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f7f6f2] text-reka-text antialiased">
    <div class="min-h-screen bg-[linear-gradient(135deg,_#ffffff_0%,_#f7f6f2_100%)]">
        <div class="mx-auto flex max-w-7xl flex-col lg:flex-row">
            <aside class="w-full border-b border-reka-border bg-white/80 p-6 backdrop-blur lg:min-h-screen lg:w-72 lg:border-b-0 lg:border-r">
                <a href="/" class="flex items-center gap-2 text-lg font-semibold uppercase tracking-[0.2em] text-reka-blue">
                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-reka-yellow text-sm font-black text-reka-text">R</span>
                    REKA
                </a>

                <nav class="mt-8 space-y-2">
                    <a href="#" class="flex items-center gap-3 rounded-2xl bg-reka-blue px-4 py-3 text-sm font-semibold text-white">📊 Dashboard</a>
                    <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium text-reka-text-secondary transition hover:bg-reka-surface">🛍️ Orders</a>
                    <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium text-reka-text-secondary transition hover:bg-reka-surface">♡ Wishlist</a>
                    <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium text-reka-text-secondary transition hover:bg-reka-surface">👤 Profile</a>
                    <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium text-reka-text-secondary transition hover:bg-reka-surface">📍 Addresses</a>
                    <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium text-reka-text-secondary transition hover:bg-reka-surface">↩️ Logout</a>
                </nav>
            </aside>

            <main class="flex-1 p-6 sm:p-8 lg:p-10">
                <div class="mb-8 rounded-[28px] border border-reka-border bg-white p-6 shadow-[0_12px_35px_rgba(17,17,17,0.06)]">
                    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.25em] text-reka-blue">Welcome back</p>
                            <h1 class="mt-2 text-3xl font-semibold tracking-tight">Hello, Ayu</h1>
                            <p class="mt-2 text-sm text-reka-text-muted">Your curated furniture wishlist and latest orders are here.</p>
                        </div>
                        <div class="rounded-2xl bg-reka-surface px-4 py-3 text-sm text-reka-text-secondary">
                            <p class="font-semibold text-reka-text">Member since 2024</p>
                            <p>Premium customer</p>
                        </div>
                    </div>
                </div>

                <div class="grid gap-6 xl:grid-cols-[1.3fr_0.7fr]">
                    <div class="space-y-6">
                        <div class="rounded-[28px] border border-reka-border bg-white p-6 shadow-[0_12px_35px_rgba(17,17,17,0.06)]">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-semibold">Recent Orders</h2>
                                <a href="#" class="text-sm font-medium text-reka-blue">View all</a>
                            </div>
                            <div class="mt-5 space-y-3">
                                <div class="flex items-center justify-between rounded-2xl bg-reka-surface px-4 py-3">
                                    <div>
                                        <p class="font-semibold">VIMLE Sofa</p>
                                        <p class="text-sm text-reka-text-muted">Delivered · 2 Jul 2026</p>
                                    </div>
                                    <span class="rounded-full bg-emerald-50 px-3 py-1 text-sm font-semibold text-emerald-700">Completed</span>
                                </div>
                                <div class="flex items-center justify-between rounded-2xl bg-reka-surface px-4 py-3">
                                    <div>
                                        <p class="font-semibold">BJÖRKUDDEN Table</p>
                                        <p class="text-sm text-reka-text-muted">Processing · 5 Jul 2026</p>
                                    </div>
                                    <span class="rounded-full bg-amber-50 px-3 py-1 text-sm font-semibold text-amber-700">In transit</span>
                                </div>
                            </div>
                        </div>

                        <div class="rounded-[28px] border border-reka-border bg-white p-6 shadow-[0_12px_35px_rgba(17,17,17,0.06)]">
                            <div class="flex items-center justify-between">
                                <h2 class="text-xl font-semibold">Wishlist Summary</h2>
                                <a href="#" class="text-sm font-medium text-reka-blue">Open wishlist</a>
                            </div>
                            <div class="mt-5 grid gap-3 sm:grid-cols-2">
                                <div class="rounded-2xl bg-reka-surface p-4">
                                    <p class="text-sm text-reka-text-muted">Saved items</p>
                                    <p class="mt-2 text-2xl font-semibold">8</p>
                                </div>
                                <div class="rounded-2xl bg-reka-surface p-4">
                                    <p class="text-sm text-reka-text-muted">Estimated value</p>
                                    <p class="mt-2 text-2xl font-semibold">Rp 24M</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div class="rounded-[28px] border border-reka-border bg-white p-6 shadow-[0_12px_35px_rgba(17,17,17,0.06)]">
                            <h2 class="text-xl font-semibold">Loyalty Points</h2>
                            <div class="mt-5 rounded-2xl bg-reka-blue p-5 text-white">
                                <p class="text-sm uppercase tracking-[0.2em] text-white/80">Current balance</p>
                                <p class="mt-2 text-4xl font-semibold">3,420</p>
                                <p class="mt-3 text-sm text-white/80">Redeem for exclusive discounts and early access.</p>
                            </div>
                        </div>

                        <div class="rounded-[28px] border border-reka-border bg-white p-6 shadow-[0_12px_35px_rgba(17,17,17,0.06)]">
                            <h2 class="text-xl font-semibold">Account Information</h2>
                            <div class="mt-5 space-y-3 text-sm text-reka-text-secondary">
                                <div class="flex justify-between"><span>Name</span><span class="font-medium text-reka-text">Ayu Pratama</span></div>
                                <div class="flex justify-between"><span>Email</span><span class="font-medium text-reka-text">ayu@email.com</span></div>
                                <div class="flex justify-between"><span>Phone</span><span class="font-medium text-reka-text">+62 812 3456 7890</span></div>
                                <div class="flex justify-between"><span>Address</span><span class="font-medium text-reka-text">Jakarta Selatan</span></div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
