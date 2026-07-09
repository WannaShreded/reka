<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REKA - Support</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f7f6f2] text-reka-text antialiased">
    <div class="min-h-screen bg-[linear-gradient(135deg,_#ffffff_0%,_#f7f6f2_100%)]">
        <div class="mx-auto max-w-6xl px-4 py-12 sm:px-6 lg:px-8">
            <div class="rounded-[32px] border border-reka-border bg-white p-8 shadow-[0_16px_40px_rgba(17,17,17,0.06)]">
                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-reka-blue">Support center</p>
                <h1 class="mt-3 text-3xl font-semibold tracking-tight">We’re here to help</h1>
                <p class="mt-3 max-w-2xl text-sm text-reka-text-muted">Reach our team for order help, delivery updates, or furniture care advice.</p>

                <div class="mt-8 grid gap-6 md:grid-cols-2 xl:grid-cols-3">
                    <div class="rounded-[24px] border border-reka-border bg-reka-surface p-5">
                        <h2 class="text-lg font-semibold">Order support</h2>
                        <p class="mt-2 text-sm text-reka-text-muted">Track your order, update delivery details, and request returns.</p>
                    </div>
                    <div class="rounded-[24px] border border-reka-border bg-reka-surface p-5">
                        <h2 class="text-lg font-semibold">Product care</h2>
                        <p class="mt-2 text-sm text-reka-text-muted">Get care instructions, warranties, and assembly tips for your furniture.</p>
                    </div>
                    <div class="rounded-[24px] border border-reka-border bg-reka-surface p-5">
                        <h2 class="text-lg font-semibold">Contact us</h2>
                        <p class="mt-2 text-sm text-reka-text-muted">Email support@reka.example or call +62 821 2345 6789.</p>
                    </div>
                </div>

                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('home') }}" class="rounded-full bg-reka-blue px-5 py-3 text-sm font-semibold text-white transition hover:bg-reka-blue-dark">Back to home</a>
                    <a href="{{ route('category') }}" class="rounded-full border border-reka-border px-5 py-3 text-sm font-semibold text-reka-text-secondary transition hover:bg-reka-surface">Shop products</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
