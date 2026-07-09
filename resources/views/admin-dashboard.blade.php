<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REKA Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f5f7fb] text-slate-800 antialiased">
    <div class="min-h-screen bg-[linear-gradient(135deg,_#ffffff_0%,_#f5f7fb_100%)]">
        <div class="mx-auto flex max-w-7xl flex-col lg:flex-row">
            <aside class="w-full border-b border-slate-200 bg-white/90 p-6 backdrop-blur lg:min-h-screen lg:w-72 lg:border-b-0 lg:border-r">
                <a href="/" class="flex items-center gap-2 text-lg font-semibold uppercase tracking-[0.2em] text-sky-700">
                    <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-amber-400 text-sm font-black text-slate-900">R</span>
                    REKA ADMIN
                </a>

                <nav class="mt-8 space-y-1.5">
                    <a href="#" class="flex items-center gap-3 rounded-2xl bg-sky-700 px-4 py-3 text-sm font-semibold text-white">📊 Dashboard</a>
                    <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100">🛋️ Products</a>
                    <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100">🗂️ Categories</a>
                    <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100">📦 Orders</a>
                    <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100">👥 Customers</a>
                    <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100">📈 Reports</a>
                    <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100">🎟️ Coupons</a>
                    <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100">🧑‍💼 Users</a>
                    <a href="#" class="flex items-center gap-3 rounded-2xl px-4 py-3 text-sm font-medium text-slate-600 transition hover:bg-slate-100">⚙️ Settings</a>
                </nav>
            </aside>

            <main class="flex-1 p-6 sm:p-8 lg:p-10">
                <div class="mb-8 flex flex-col gap-4 rounded-[28px] border border-slate-200 bg-white p-6 shadow-[0_12px_35px_rgba(15,23,42,0.06)] sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.25em] text-sky-700">Store overview</p>
                        <h1 class="mt-2 text-3xl font-semibold tracking-tight">Admin Dashboard</h1>
                    </div>
                    <div class="rounded-2xl bg-slate-100 px-4 py-3 text-sm text-slate-600">
                        <p class="font-semibold text-slate-900">Today</p>
                        <p>09 Jul 2026</p>
                    </div>
                </div>

                <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
                    <div class="rounded-[24px] border border-slate-200 bg-white p-5 shadow-[0_10px_30px_rgba(15,23,42,0.05)]">
                        <p class="text-sm font-medium text-slate-500">Total Revenue</p>
                        <p class="mt-3 text-3xl font-semibold text-slate-900">Rp 184M</p>
                        <p class="mt-2 text-sm text-emerald-600">+12.4% vs last month</p>
                    </div>
                    <div class="rounded-[24px] border border-slate-200 bg-white p-5 shadow-[0_10px_30px_rgba(15,23,42,0.05)]">
                        <p class="text-sm font-medium text-slate-500">Total Orders</p>
                        <p class="mt-3 text-3xl font-semibold text-slate-900">1,284</p>
                        <p class="mt-2 text-sm text-emerald-600">+8.1% this week</p>
                    </div>
                    <div class="rounded-[24px] border border-slate-200 bg-white p-5 shadow-[0_10px_30px_rgba(15,23,42,0.05)]">
                        <p class="text-sm font-medium text-slate-500">Products</p>
                        <p class="mt-3 text-3xl font-semibold text-slate-900">356</p>
                        <p class="mt-2 text-sm text-slate-500">94 active listings</p>
                    </div>
                    <div class="rounded-[24px] border border-slate-200 bg-white p-5 shadow-[0_10px_30px_rgba(15,23,42,0.05)]">
                        <p class="text-sm font-medium text-slate-500">Customers</p>
                        <p class="mt-3 text-3xl font-semibold text-slate-900">8,921</p>
                        <p class="mt-2 text-sm text-slate-500">+146 new this month</p>
                    </div>
                </div>

                <div class="mt-6 grid gap-6 xl:grid-cols-[1.2fr_0.8fr]">
                    <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-[0_10px_30px_rgba(15,23,42,0.05)]">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-semibold">Sales Chart</h2>
                            <span class="rounded-full bg-slate-100 px-3 py-1 text-sm font-medium text-slate-600">Last 6 months</span>
                        </div>
                        <div class="mt-6 h-64 rounded-[24px] bg-[linear-gradient(180deg,_#f8fbff_0%,_#eef5ff_100%)] p-4">
                            <div class="flex h-full items-end justify-between gap-3">
                                <div class="flex-1 rounded-t-2xl bg-sky-600" style="height: 55%"></div>
                                <div class="flex-1 rounded-t-2xl bg-sky-500" style="height: 72%"></div>
                                <div class="flex-1 rounded-t-2xl bg-sky-400" style="height: 68%"></div>
                                <div class="flex-1 rounded-t-2xl bg-sky-300" style="height: 84%"></div>
                                <div class="flex-1 rounded-t-2xl bg-sky-500" style="height: 91%"></div>
                                <div class="flex-1 rounded-t-2xl bg-sky-700" style="height: 78%"></div>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-[0_10px_30px_rgba(15,23,42,0.05)]">
                        <h2 class="text-xl font-semibold">Inventory Status</h2>
                        <div class="mt-5 space-y-4">
                            <div>
                                <div class="mb-2 flex items-center justify-between text-sm">
                                    <span class="font-medium text-slate-600">Low stock items</span>
                                    <span class="font-semibold text-slate-900">24</span>
                                </div>
                                <div class="h-2 rounded-full bg-slate-100">
                                    <div class="h-2 w-[40%] rounded-full bg-amber-400"></div>
                                </div>
                            </div>
                            <div>
                                <div class="mb-2 flex items-center justify-between text-sm">
                                    <span class="font-medium text-slate-600">Out of stock</span>
                                    <span class="font-semibold text-slate-900">8</span>
                                </div>
                                <div class="h-2 rounded-full bg-slate-100">
                                    <div class="h-2 w-[15%] rounded-full bg-rose-500"></div>
                                </div>
                            </div>
                            <div>
                                <div class="mb-2 flex items-center justify-between text-sm">
                                    <span class="font-medium text-slate-600">Healthy stock</span>
                                    <span class="font-semibold text-slate-900">324</span>
                                </div>
                                <div class="h-2 rounded-full bg-slate-100">
                                    <div class="h-2 w-[85%] rounded-full bg-emerald-500"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6 grid gap-6 xl:grid-cols-[1.1fr_0.9fr]">
                    <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-[0_10px_30px_rgba(15,23,42,0.05)]">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-semibold">Recent Orders</h2>
                            <a href="#" class="text-sm font-medium text-sky-700">View all</a>
                        </div>
                        <div class="mt-5 space-y-3">
                            <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-3">
                                <div>
                                    <p class="font-semibold text-slate-900">#ORD-1042</p>
                                    <p class="text-sm text-slate-500">Ayu Pratama · 2 mins ago</p>
                                </div>
                                <span class="rounded-full bg-emerald-100 px-3 py-1 text-sm font-semibold text-emerald-700">Paid</span>
                            </div>
                            <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-3">
                                <div>
                                    <p class="font-semibold text-slate-900">#ORD-1041</p>
                                    <p class="text-sm text-slate-500">Budi Santoso · 14 mins ago</p>
                                </div>
                                <span class="rounded-full bg-amber-100 px-3 py-1 text-sm font-semibold text-amber-700">Pending</span>
                            </div>
                            <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-3">
                                <div>
                                    <p class="font-semibold text-slate-900">#ORD-1040</p>
                                    <p class="text-sm text-slate-500">Lina Wijaya · 35 mins ago</p>
                                </div>
                                <span class="rounded-full bg-sky-100 px-3 py-1 text-sm font-semibold text-sky-700">Shipped</span>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[28px] border border-slate-200 bg-white p-6 shadow-[0_10px_30px_rgba(15,23,42,0.05)]">
                        <div class="flex items-center justify-between">
                            <h2 class="text-xl font-semibold">Top Selling Products</h2>
                            <a href="#" class="text-sm font-medium text-sky-700">Manage</a>
                        </div>
                        <div class="mt-5 space-y-3">
                            <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-3">
                                <div>
                                    <p class="font-semibold text-slate-900">VIMLE Sofa</p>
                                    <p class="text-sm text-slate-500">184 sold</p>
                                </div>
                                <span class="font-semibold text-slate-900">Rp 8.5M</span>
                            </div>
                            <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-3">
                                <div>
                                    <p class="font-semibold text-slate-900">BJÖRKUDDEN Table</p>
                                    <p class="text-sm text-slate-500">96 sold</p>
                                </div>
                                <span class="font-semibold text-slate-900">Rp 9.0M</span>
                            </div>
                            <div class="flex items-center justify-between rounded-2xl bg-slate-50 px-4 py-3">
                                <div>
                                    <p class="font-semibold text-slate-900">Lounge Chair</p>
                                    <p class="text-sm text-slate-500">72 sold</p>
                                </div>
                                <span class="font-semibold text-slate-900">Rp 2.4M</span>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>
