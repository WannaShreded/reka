<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>REKA - Profile</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-[#f7f6f2] text-reka-text antialiased">
    <main class="mx-auto max-w-5xl px-4 py-8 sm:px-6 lg:py-12">
        <div class="mb-8 flex flex-col gap-4 rounded-[28px] border border-reka-border bg-white p-6 shadow-[0_12px_35px_rgba(17,17,17,0.06)] sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-sm font-semibold uppercase tracking-[0.25em] text-reka-blue">Account settings</p>
                <h1 class="mt-2 text-3xl font-semibold tracking-tight">My Profile</h1>
                <p class="mt-2 text-sm text-reka-text-muted">Save your contact and default delivery information for faster checkout.</p>
                <a href="{{ route('orders') }}" class="mt-4 inline-flex items-center gap-2 rounded-full bg-reka-blue px-5 py-3 text-sm font-semibold text-white transition hover:bg-reka-blue-dark">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                    </svg>
                    My Orders
                </a>
            </div>
            <a href="{{ route('dashboard') }}" class="rounded-full border border-reka-border px-5 py-3 text-sm font-semibold text-reka-text-secondary transition hover:bg-reka-surface">Back to shop</a>
        </div>

        @if (session('status') === 'profile-updated')
            <div class="mb-6 rounded-2xl border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">Your profile has been updated.</div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
            @csrf
            @method('PATCH')

            <section class="rounded-[28px] border border-reka-border bg-white p-6 shadow-[0_10px_30px_rgba(17,17,17,0.05)]">
                <h2 class="text-xl font-semibold">Personal Information</h2>
                <div class="mt-5 grid gap-4 md:grid-cols-2">
                    @foreach ([
                        'name' => ['Full Name', 'text'],
                        'email' => ['Email', 'email'],
                        'phone' => ['Phone Number', 'tel'],
                        'date_of_birth' => ['Date of Birth', 'date'],
                    ] as $field => [$label, $type])
                        <div>
                            <label for="{{ $field }}" class="mb-2 block text-sm font-medium text-reka-text-secondary">{{ $label }}</label>
                            <input id="{{ $field }}" name="{{ $field }}" type="{{ $type }}" value="{{ old($field, $field === 'date_of_birth' && $user->date_of_birth ? $user->date_of_birth->format('Y-m-d') : $user->$field) }}" @if (in_array($field, ['name', 'email'])) required @endif class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 text-sm outline-none transition focus:border-reka-blue focus:bg-white">
                            @error($field)<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                    @endforeach
                </div>
            </section>

            <section class="rounded-[28px] border border-reka-border bg-white p-6 shadow-[0_10px_30px_rgba(17,17,17,0.05)]">
                <h2 class="text-xl font-semibold">Default Shipping Address</h2>
                <p class="mt-1 text-sm text-reka-text-muted">This information can be used when placing an order.</p>
                <div class="mt-5 grid gap-4 md:grid-cols-2">
                    <div class="md:col-span-2">
                        <label for="address_line_1" class="mb-2 block text-sm font-medium text-reka-text-secondary">Address</label>
                        <input id="address_line_1" name="address_line_1" type="text" value="{{ old('address_line_1', $user->address_line_1) }}" autocomplete="street-address" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 text-sm outline-none transition focus:border-reka-blue focus:bg-white">
                        @error('address_line_1')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div class="md:col-span-2">
                        <label for="address_line_2" class="mb-2 block text-sm font-medium text-reka-text-secondary">Address Details <span class="font-normal text-reka-text-muted">(optional)</span></label>
                        <input id="address_line_2" name="address_line_2" type="text" value="{{ old('address_line_2', $user->address_line_2) }}" autocomplete="address-line2" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 text-sm outline-none transition focus:border-reka-blue focus:bg-white">
                        @error('address_line_2')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    @foreach ([
                        'city' => ['City / Regency', 'address-level2'],
                        'province' => ['Province', 'address-level1'],
                        'postal_code' => ['Postal Code', 'postal-code'],
                        'country' => ['Country', 'country-name'],
                    ] as $field => [$label, $autocomplete])
                        <div>
                            <label for="{{ $field }}" class="mb-2 block text-sm font-medium text-reka-text-secondary">{{ $label }}</label>
                            <input id="{{ $field }}" name="{{ $field }}" type="text" value="{{ old($field, $user->$field) }}" autocomplete="{{ $autocomplete }}" class="w-full rounded-2xl border border-reka-border bg-reka-surface px-4 py-3 text-sm outline-none transition focus:border-reka-blue focus:bg-white">
                            @error($field)<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                        </div>
                    @endforeach
                </div>
            </section>

            <div class="flex flex-wrap gap-3">
                <button type="submit" class="rounded-full bg-reka-blue px-5 py-3 text-sm font-semibold text-white transition hover:bg-reka-blue-dark">Save Profile</button>
                <a href="{{ route('dashboard') }}" class="rounded-full border border-reka-border px-5 py-3 text-sm font-semibold text-reka-text-secondary transition hover:bg-reka-surface">Cancel</a>
            </div>
        </form>
    </main>
</body>
</html>
