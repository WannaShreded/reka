<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REKA - Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f7f6f2] text-reka-text antialiased">
    <div class="min-h-screen bg-[radial-gradient(circle_at_top_left,_rgba(251,217,20,0.16),_transparent_30%),linear-gradient(135deg,_#ffffff_0%,_#f7f6f2_100%)]">
        <div class="mx-auto flex min-h-screen max-w-7xl flex-col lg:flex-row">
            <div class="flex flex-1 items-center justify-center px-6 py-12 sm:px-8 lg:px-12">
                <div class="w-full max-w-md rounded-[32px] border border-reka-border bg-white/80 p-8 shadow-[0_20px_60px_rgba(17,17,17,0.08)] backdrop-blur">
                    <a href="/" class="mb-8 flex items-center gap-2 text-lg font-semibold uppercase tracking-[0.2em] text-reka-blue">
                        <span class="flex h-9 w-9 items-center justify-center rounded-xl bg-reka-yellow text-sm font-black text-reka-text">R</span>
                        REKA
                    </a>

                    <div class="mb-8">
                        <p class="text-sm font-semibold uppercase tracking-[0.25em] text-reka-blue">Welcome back</p>
                        <h1 class="mt-2 text-3xl font-semibold tracking-tight">Sign in to continue</h1>
                        <p class="mt-2 text-sm text-reka-text-muted">Access your account and continue your REKA style journey.</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-4">
                        @csrf
                        <div>
                            <label for="email" class="mb-2 block text-sm font-medium text-reka-text-secondary">Email</label>
                            <input id="email" name="email" type="email" placeholder="you@example.com" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 text-sm outline-none transition focus:border-reka-blue focus:bg-white" required>
                        </div>

                        <div>
                            <label for="password" class="mb-2 block text-sm font-medium text-reka-text-secondary">Password</label>
                            <input id="password" name="password" type="password" placeholder="••••••••" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 text-sm outline-none transition focus:border-reka-blue focus:bg-white" required>
                        </div>

                        <div class="flex items-center justify-between text-sm">
                            <label class="flex items-center gap-2 text-reka-text-secondary">
                                <input type="checkbox" name="remember" value="1" class="h-4 w-4 rounded border-reka-border text-reka-blue focus:ring-reka-blue">
                                Remember me
                            </label>
                            <a href="{{ route('password.request') }}" class="font-medium text-reka-blue transition hover:text-reka-blue-dark">Forgot password?</a>
                        </div>

                        <button type="submit" class="w-full rounded-full bg-reka-blue px-4 py-3 text-sm font-semibold text-white transition hover:bg-reka-blue-dark">
                            Login
                        </button>
                    </form>

                    <p class="mt-6 text-center text-sm text-reka-text-muted">
                        New here?
                        <a href="/register" class="ml-1 font-semibold text-reka-blue transition hover:text-reka-blue-dark">Create an account</a>
                    </p>
                </div>
            </div>

            <div class="flex flex-1 items-center justify-center px-6 pb-10 pt-2 sm:px-8 lg:px-12 lg:py-12">
                <div class="w-full max-w-lg rounded-[32px] border border-reka-border bg-white/70 p-6 shadow-[0_20px_60px_rgba(17,17,17,0.06)]">
                    <div class="rounded-[28px] bg-reka-surface p-6">
                        <img src="https://images.unsplash.com/photo-1505693416388-ac5ce068fe85?auto=format&fit=crop&w=900&q=80" alt="Model wearing curated apparel" class="h-[420px] w-full rounded-[24px] object-cover">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
