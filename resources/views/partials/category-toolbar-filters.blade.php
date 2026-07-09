@php
    $activeFilters = ['Men', 'Nike', 'Black'];
@endphp

<div class="sticky top-20 z-30 mb-3">
    <div class="flex flex-wrap items-center gap-2 py-2">
        <div class="relative" data-filter-menu>
            <button type="button" class="flex items-center gap-2 rounded-full border border-gray-200 bg-transparent px-3 py-2 text-sm font-medium text-reka-text-secondary transition hover:border-reka-blue hover:text-reka-blue" data-filter-toggle>
                <span>Category</span>
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="absolute left-0 top-full z-40 mt-2 hidden w-56 rounded-2xl border border-gray-200 bg-white p-3 shadow-lg" data-filter-panel>
                <div class="space-y-1.5 text-sm text-reka-text-secondary">
                    <label class="flex items-center gap-2 rounded-lg px-2 py-1.5 hover:bg-reka-surface/70"><input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue" checked><span>Men</span></label>
                    <label class="flex items-center gap-2 rounded-lg px-2 py-1.5 hover:bg-reka-surface/70"><input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue" checked><span>Women</span></label>
                    <label class="flex items-center gap-2 rounded-lg px-2 py-1.5 hover:bg-reka-surface/70"><input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue"><span>Kids</span></label>
                    <label class="flex items-center gap-2 rounded-lg px-2 py-1.5 hover:bg-reka-surface/70"><input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue"><span>Accessories</span></label>
                </div>
            </div>
        </div>

        <div class="relative" data-filter-menu>
            <button type="button" class="flex items-center gap-2 rounded-full border border-gray-200 bg-transparent px-3 py-2 text-sm font-medium text-reka-text-secondary transition hover:border-reka-blue hover:text-reka-blue" data-filter-toggle>
                <span>Condition</span>
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="absolute left-0 top-full z-40 mt-2 hidden w-56 rounded-2xl border border-gray-200 bg-white p-3 shadow-lg" data-filter-panel>
                <div class="space-y-1.5 text-sm text-reka-text-secondary">
                    <label class="flex items-center gap-2 rounded-lg px-2 py-1.5 hover:bg-reka-surface/70"><input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue" checked><span>Like New</span></label>
                    <label class="flex items-center gap-2 rounded-lg px-2 py-1.5 hover:bg-reka-surface/70"><input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue"><span>Excellent</span></label>
                    <label class="flex items-center gap-2 rounded-lg px-2 py-1.5 hover:bg-reka-surface/70"><input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue"><span>Good</span></label>
                    <label class="flex items-center gap-2 rounded-lg px-2 py-1.5 hover:bg-reka-surface/70"><input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue"><span>Fair</span></label>
                </div>
            </div>
        </div>

        <div class="relative" data-filter-menu>
            <button type="button" class="flex items-center gap-2 rounded-full border border-gray-200 bg-transparent px-3 py-2 text-sm font-medium text-reka-text-secondary transition hover:border-reka-blue hover:text-reka-blue" data-filter-toggle>
                <span>Brand</span>
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="absolute left-0 top-full z-40 mt-2 hidden w-56 rounded-2xl border border-gray-200 bg-white p-3 shadow-lg" data-filter-panel>
                <input type="text" placeholder="Search brand" class="mb-2 h-9 w-full rounded-[10px] border border-gray-200 bg-reka-surface px-3 text-sm text-reka-text placeholder:text-reka-text-muted focus:border-reka-blue focus:outline-none">
                <div class="space-y-1.5 text-sm text-reka-text-secondary">
                    <label class="flex items-center gap-2 rounded-lg px-2 py-1.5 hover:bg-reka-surface/70"><input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue"><span>Nike</span></label>
                    <label class="flex items-center gap-2 rounded-lg px-2 py-1.5 hover:bg-reka-surface/70"><input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue"><span>Adidas</span></label>
                    <label class="flex items-center gap-2 rounded-lg px-2 py-1.5 hover:bg-reka-surface/70"><input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue"><span>Uniqlo</span></label>
                    <label class="flex items-center gap-2 rounded-lg px-2 py-1.5 hover:bg-reka-surface/70"><input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue"><span>H&M</span></label>
                </div>
            </div>
        </div>

        <div class="relative" data-filter-menu>
            <button type="button" class="flex items-center gap-2 rounded-full border border-gray-200 bg-transparent px-3 py-2 text-sm font-medium text-reka-text-secondary transition hover:border-reka-blue hover:text-reka-blue" data-filter-toggle>
                <span>Size</span>
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="absolute left-0 top-full z-40 mt-2 hidden w-52 rounded-2xl border border-gray-200 bg-white p-3 shadow-lg" data-filter-panel>
                <div class="flex flex-wrap gap-2" data-size-options>
                    <button type="button" class="rounded-full border border-gray-200 bg-white px-2.5 py-1 text-xs font-medium text-reka-text-secondary transition hover:border-reka-blue hover:text-reka-blue" data-size-option data-size-value="XS" aria-pressed="false">XS</button>
                    <button type="button" class="rounded-full border border-gray-200 bg-white px-2.5 py-1 text-xs font-medium text-reka-text-secondary transition hover:border-reka-blue hover:text-reka-blue" data-size-option data-size-value="S" aria-pressed="false">S</button>
                    <button type="button" class="rounded-full border border-gray-200 bg-white px-2.5 py-1 text-xs font-medium text-reka-text-secondary transition hover:border-reka-blue hover:text-reka-blue" data-size-option data-size-value="M" aria-pressed="false">M</button>
                    <button type="button" class="rounded-full border border-gray-200 bg-white px-2.5 py-1 text-xs font-medium text-reka-text-secondary transition hover:border-reka-blue hover:text-reka-blue" data-size-option data-size-value="L" aria-pressed="false">L</button>
                    <button type="button" class="rounded-full border border-gray-200 bg-white px-2.5 py-1 text-xs font-medium text-reka-text-secondary transition hover:border-reka-blue hover:text-reka-blue" data-size-option data-size-value="XL" aria-pressed="false">XL</button>
                </div>
            </div>
        </div>

        <div class="relative" data-filter-menu>
            <button type="button" class="flex items-center gap-2 rounded-full border border-gray-200 bg-transparent px-3 py-2 text-sm font-medium text-reka-text-secondary transition hover:border-reka-blue hover:text-reka-blue" data-filter-toggle>
                <span>Color</span>
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="absolute left-0 top-full z-40 mt-2 hidden w-44 rounded-2xl border border-gray-200 bg-white p-3 shadow-lg" data-filter-panel>
                <div class="flex flex-wrap gap-2">
                    <button type="button" class="h-6 w-6 rounded-full border-2 border-reka-blue bg-[#111111]" aria-label="Black"></button>
                    <button type="button" class="h-6 w-6 rounded-full border border-gray-200 bg-[#d9c7a8]" aria-label="Beige"></button>
                    <button type="button" class="h-6 w-6 rounded-full border border-gray-200 bg-[#f4f4f0]" aria-label="Cream"></button>
                    <button type="button" class="h-6 w-6 rounded-full border border-gray-200 bg-[#c9d6e3]" aria-label="Blue"></button>
                    <button type="button" class="h-6 w-6 rounded-full border border-gray-200 bg-[#e5b6c3]" aria-label="Pink"></button>
                </div>
            </div>
        </div>

        <div class="relative" data-filter-menu>
            <button type="button" class="flex items-center gap-2 rounded-full border border-gray-200 bg-transparent px-3 py-2 text-sm font-medium text-reka-text-secondary transition hover:border-reka-blue hover:text-reka-blue" data-filter-toggle>
                <span>Price</span>
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="absolute left-0 top-full z-40 mt-2 hidden w-64 rounded-2xl border border-gray-200 bg-white p-3 shadow-lg" data-filter-panel>
                <div class="grid grid-cols-2 gap-2">
                    <label class="text-xs text-reka-text-secondary"><span class="mb-1 block text-[11px] font-semibold uppercase tracking-[0.2em] text-reka-text-muted">Min</span><input type="number" value="100000" class="h-8 w-full rounded-[8px] border border-gray-200 bg-reka-surface px-2 text-sm text-reka-text focus:border-reka-blue focus:outline-none"></label>
                    <label class="text-xs text-reka-text-secondary"><span class="mb-1 block text-[11px] font-semibold uppercase tracking-[0.2em] text-reka-text-muted">Max</span><input type="number" value="500000" class="h-8 w-full rounded-[8px] border border-gray-200 bg-reka-surface px-2 text-sm text-reka-text focus:border-reka-blue focus:outline-none"></label>
                </div>
                <input type="range" min="100000" max="1000000" value="500000" class="mt-2 h-2 w-full cursor-pointer accent-reka-blue">
            </div>
        </div>

        <div class="relative" data-filter-menu>
            <button type="button" class="flex items-center gap-2 rounded-full border border-gray-200 bg-transparent px-3 py-2 text-sm font-medium text-reka-text-secondary transition hover:border-reka-blue hover:text-reka-blue" data-filter-toggle>
                <span>Sort</span>
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            </button>
            <div class="absolute left-0 top-full z-40 mt-2 hidden w-48 rounded-2xl border border-gray-200 bg-white p-3 shadow-lg" data-filter-panel>
                <div class="space-y-1.5 text-sm text-reka-text-secondary">
                    <button type="button" class="block w-full rounded-lg px-2 py-1.5 text-left hover:bg-reka-surface/70">Recommended</button>
                    <button type="button" class="block w-full rounded-lg px-2 py-1.5 text-left hover:bg-reka-surface/70">Price: Low to High</button>
                    <button type="button" class="block w-full rounded-lg px-2 py-1.5 text-left hover:bg-reka-surface/70">Price: High to Low</button>
                    <button type="button" class="block w-full rounded-lg px-2 py-1.5 text-left hover:bg-reka-surface/70">Newest</button>
                </div>
            </div>
        </div>
    </div>

    <div id="active-filter-row" class="mt-2 hidden flex-wrap items-center gap-2"></div>
</div>
