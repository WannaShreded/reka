<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Admin' }} — REKA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen antialiased" style="background:#f7f6f2; color:#181818; font-family:'Inter',ui-sans-serif,system-ui,sans-serif;">

{{-- ── MOBILE TOP BAR ───────────────────────────────────────────────────── --}}
<div class="lg:hidden flex items-center justify-between px-5 py-4 bg-white border-b border-[#e7e2d8] sticky top-0 z-50 shadow-sm">
    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 text-base font-bold uppercase tracking-[0.2em] text-[#1d4f72]">
        <span class="w-8 h-8 bg-[#f3d04b] rounded-lg flex items-center justify-center text-sm font-black text-[#181818]">R</span>
        REKA
    </a>
    <button id="mob-menu-btn" aria-label="Open menu" class="p-2 rounded-xl hover:bg-[#f7f5ef] transition-colors">
        <svg class="w-5 h-5 text-[#4b5563]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>
</div>

<div class="flex min-h-screen">
    {{-- ── SIDEBAR ─────────────────────────────────────────────────────────── --}}
    <aside id="sidebar"
        class="fixed inset-y-0 left-0 z-40 w-64 bg-white border-r border-[#e7e2d8] shadow-[4px_0_24px_rgba(17,17,17,0.04)] flex flex-col
               -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-out">

        {{-- Logo --}}
        <div class="px-6 pt-7 pb-6 border-b border-[#f0ece3]">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 text-base font-bold uppercase tracking-[0.2em] text-[#1d4f72]">
                <span class="w-9 h-9 bg-[#f3d04b] rounded-xl flex items-center justify-center text-sm font-black text-[#181818]">R</span>
                REKA Admin
            </a>
            <p class="mt-1.5 text-xs text-[#9ca3af] pl-0.5">Management Dashboard</p>
        </div>

        {{-- Nav --}}
        <nav class="flex-1 px-4 py-5 space-y-1 overflow-y-auto">
            @php
                $navItems = [
                    ['route' => 'admin.dashboard',      'label' => 'Dashboard',  'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6'],
                    ['route' => 'admin.products.index', 'label' => 'Products',   'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
                    ['route' => 'admin.orders.index',   'label' => 'Orders',     'icon' => 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
                ];
            @endphp

            @foreach ($navItems as $item)
                @php $active = request()->routeIs(rtrim($item['route'], '.index') . '*'); @endphp
                <a href="{{ route($item['route']) }}"
                   class="flex items-center gap-3 px-4 py-2.5 rounded-2xl text-sm font-medium transition-all duration-200
                          {{ $active ? 'bg-[#1d4f72] text-white shadow-[0_8px_20px_rgba(29,79,114,0.25)]' : 'text-[#4b5563] hover:bg-[#f7f5ef] hover:text-[#1d4f72]' }}">
                    <svg class="w-4.5 h-4.5 flex-shrink-0 {{ $active ? 'text-white' : 'text-[#9ca3af]' }}" style="width:18px;height:18px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/>
                    </svg>
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        {{-- Footer --}}
        <div class="px-4 pb-6 pt-3 border-t border-[#f0ece3]">
            <div class="flex items-center gap-3 px-4 py-3 rounded-2xl bg-[#f7f5ef] mb-3">
                <div class="w-8 h-8 bg-[#1d4f72] rounded-full flex items-center justify-center text-white text-xs font-bold flex-shrink-0">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                </div>
                <div class="min-w-0">
                    <p class="text-sm font-semibold text-[#181818] truncate">{{ Auth::user()->name ?? 'Admin' }}</p>
                    <p class="text-xs text-[#9ca3af]">Administrator</p>
                </div>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('home') }}" class="flex-1 flex items-center justify-center gap-1.5 px-3 py-2 rounded-xl text-xs font-medium text-[#4b5563] hover:bg-[#f7f5ef] transition-colors">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                    Shop
                </a>
                <form method="POST" action="{{ route('logout') }}" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-1.5 px-3 py-2 rounded-xl text-xs font-medium text-[#b5474f] hover:bg-red-50 transition-colors">
                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- Overlay for mobile --}}
    <div id="sidebar-overlay" class="fixed inset-0 z-30 bg-black/30 backdrop-blur-sm hidden lg:hidden" aria-hidden="true"></div>

    {{-- ── MAIN CONTENT ────────────────────────────────────────────────────── --}}
    <div class="flex-1 lg:ml-64 flex flex-col min-h-screen">
        {{-- Flash messages --}}
        @if(session('success'))
        <div id="flash-msg" class="mx-6 mt-5 flex items-center gap-3 px-5 py-3.5 rounded-2xl bg-emerald-50 border border-emerald-200 text-sm font-medium text-emerald-700 shadow-sm">
            <svg class="w-4 h-4 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"/></svg>
            {{ session('success') }}
            <button onclick="document.getElementById('flash-msg').remove()" class="ml-auto text-emerald-400 hover:text-emerald-600">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
        @endif

        @if($errors->any())
        <div class="mx-6 mt-5 flex items-start gap-3 px-5 py-3.5 rounded-2xl bg-red-50 border border-red-200 text-sm text-red-700 shadow-sm">
            <svg class="w-4 h-4 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <ul class="list-none space-y-0.5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <main class="flex-1 px-5 sm:px-8 py-8">
            {{ $slot }}
        </main>
    </div>
</div>

<script>
    // Mobile sidebar toggle
    const btn = document.getElementById('mob-menu-btn');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    if (btn && sidebar && overlay) {
        btn.addEventListener('click', () => {
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        });
        overlay.addEventListener('click', () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        });
    }

    // Auto-dismiss flash after 4s
    setTimeout(() => {
        const flash = document.getElementById('flash-msg');
        if (flash) flash.style.transition = 'opacity 0.4s';
        if (flash) { flash.style.opacity = '0'; setTimeout(() => flash?.remove(), 400); }
    }, 4000);
</script>
</body>
</html>
