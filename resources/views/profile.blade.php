<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REKA - Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f7f6f2] text-reka-text antialiased">
    <div class="min-h-screen bg-[linear-gradient(135deg,_#ffffff_0%,_#f7f6f2_100%)]">
        <div class="mx-auto max-w-7xl px-4 py-8 sm:px-6 lg:px-8 lg:py-12">
            <div class="mb-8 rounded-[28px] border border-reka-border bg-white p-6 shadow-[0_12px_35px_rgba(17,17,17,0.06)]">
                <div class="flex flex-col gap-6 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <p class="text-sm font-semibold uppercase tracking-[0.25em] text-reka-blue">Account settings</p>
                        <h1 class="mt-2 text-3xl font-semibold tracking-tight">Profile</h1>
                        <p class="mt-2 text-sm text-reka-text-muted">Manage your personal information and delivery preferences.</p>
                    </div>
                    <div class="flex items-center gap-4">
                        <div class="flex h-16 w-16 items-center justify-center rounded-full bg-reka-yellow text-2xl font-semibold text-reka-text">AP</div>
                        <div>
                            <p class="font-semibold text-reka-text">Ayu Pratama</p>
                            <p class="text-sm text-reka-text-muted">Premium Member</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid gap-6 xl:grid-cols-[1.2fr_0.8fr]">
                <div class="space-y-6">
                    <section class="rounded-[28px] border border-reka-border bg-white p-6 shadow-[0_10px_30px_rgba(17,17,17,0.05)]">
                        <div class="mb-5 flex items-center justify-between">
                            <h2 class="text-xl font-semibold">Personal Information</h2>
                            <span class="rounded-full bg-reka-blue-light px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-reka-blue">Basic</span>
                        </div>
                        <div class="grid gap-4 md:grid-cols-2">
                            <div>
                                <label class="mb-2 block text-sm font-medium text-reka-text-secondary">Full Name</label>
                                <input type="text" value="Ayu Pratama" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 text-sm outline-none focus:border-reka-blue">
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-reka-text-secondary">Email</label>
                                <input type="email" value="ayu@email.com" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 text-sm outline-none focus:border-reka-blue">
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-reka-text-secondary">Phone Number</label>
                                <input type="tel" value="+62 812 3456 7890" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 text-sm outline-none focus:border-reka-blue">
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-reka-text-secondary">Date of Birth</label>
                                <input type="date" value="1995-04-12" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 text-sm outline-none focus:border-reka-blue">
                            </div>
                        </div>
                    </section>

                    <section class="rounded-[28px] border border-reka-border bg-white p-6 shadow-[0_10px_30px_rgba(17,17,17,0.05)]">
                        <div class="mb-5 flex items-center justify-between">
                            <h2 class="text-xl font-semibold">Shipping Address</h2>
                            <span class="rounded-full bg-reka-yellow/30 px-3 py-1 text-xs font-semibold uppercase tracking-[0.2em] text-reka-text">Primary</span>
                        </div>
                        <div class="grid gap-4 md:grid-cols-2">
                            <div class="md:col-span-2">
                                <label class="mb-2 block text-sm font-medium text-reka-text-secondary">Address</label>
                                <input type="text" value="Jl. Sudirman No. 12" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 text-sm outline-none focus:border-reka-blue">
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-reka-text-secondary">City</label>
                                <input type="text" value="Jakarta Selatan" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 text-sm outline-none focus:border-reka-blue">
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-reka-text-secondary">Postal Code</label>
                                <input type="text" value="12950" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 text-sm outline-none focus:border-reka-blue">
                            </div>
                        </div>
                    </section>
                </div>

                <div class="space-y-6">
                    <section class="rounded-[28px] border border-reka-border bg-white p-6 shadow-[0_10px_30px_rgba(17,17,17,0.05)]">
                        <h2 class="text-xl font-semibold">Change Password</h2>
                        <div class="mt-5 space-y-4">
                            <div>
                                <label class="mb-2 block text-sm font-medium text-reka-text-secondary">Current Password</label>
                                <input type="password" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 text-sm outline-none focus:border-reka-blue">
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-reka-text-secondary">New Password</label>
                                <input type="password" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 text-sm outline-none focus:border-reka-blue">
                            </div>
                            <div>
                                <label class="mb-2 block text-sm font-medium text-reka-text-secondary">Confirm Password</label>
                                <input type="password" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 text-sm outline-none focus:border-reka-blue">
                            </div>
                        </div>
                    </section>

                    <section class="rounded-[28px] border border-reka-border bg-white p-6 shadow-[0_10px_30px_rgba(17,17,17,0.05)]">
                        <h2 class="text-xl font-semibold">Payment Preferences</h2>
                        <div class="mt-5 space-y-3 text-sm text-reka-text-secondary">
                            <label class="flex items-center justify-between rounded-2xl border border-reka-border bg-reka-surface px-4 py-3">
                                <span>Credit Card</span>
                                <input type="radio" name="payment" class="h-4 w-4 accent-reka-blue">
                            </label>
                            <label class="flex items-center justify-between rounded-2xl border border-reka-border bg-reka-surface px-4 py-3">
                                <span>Bank Transfer</span>
                                <input type="radio" name="payment" class="h-4 w-4 accent-reka-blue">
                            </label>
                            <label class="flex items-center justify-between rounded-2xl border border-reka-border bg-reka-surface px-4 py-3">
                                <span>Cash on Delivery</span>
                                <input type="radio" name="payment" class="h-4 w-4 accent-reka-blue" checked>
                            </label>
                        </div>
                    </section>

                    <div class="flex flex-wrap gap-3">
                        <a href="{{ route('dashboard') }}" class="rounded-full bg-reka-blue px-5 py-3 text-sm font-semibold text-white transition hover:bg-reka-blue-dark">Save Changes</a>
                        <a href="{{ route('dashboard') }}" class="rounded-full border border-reka-border px-5 py-3 text-sm font-semibold text-reka-text-secondary transition hover:bg-reka-surface">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
