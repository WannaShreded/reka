<div class="flex h-full flex-col">
    <div class="flex-1 overflow-y-auto pr-1">
        <div class="mb-3">
            <h2 class="text-sm font-semibold text-reka-text">Filters</h2>
            <p class="mt-1 text-xs text-reka-text-muted">Refine your search quickly.</p>
        </div>

        <div class="space-y-2">
            <details class="group overflow-hidden rounded-[10px] border border-gray-200 bg-white" data-filter-group open>
                <summary class="flex cursor-pointer list-none items-center justify-between px-3 py-2.5 text-sm font-medium text-reka-text">
                    <span>Category</span>
                    <svg class="h-4 w-4 text-reka-text-muted transition group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </summary>
                <div class="border-t border-gray-100 px-3 pb-3 pt-2">
                    <div class="space-y-1.5 text-sm text-reka-text-secondary">
                        <label class="flex items-center gap-2 rounded-lg px-2 py-1 hover:bg-reka-surface/70">
                            <input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue" checked>
                            <span>Men</span>
                        </label>
                        <label class="flex items-center gap-2 rounded-lg px-2 py-1 hover:bg-reka-surface/70">
                            <input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue" checked>
                            <span>Women</span>
                        </label>
                        <label class="flex items-center gap-2 rounded-lg px-2 py-1 hover:bg-reka-surface/70">
                            <input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue">
                            <span>Kids</span>
                        </label>
                        <label class="flex items-center gap-2 rounded-lg px-2 py-1 hover:bg-reka-surface/70">
                            <input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue">
                            <span>Accessories</span>
                        </label>
                    </div>
                </div>
            </details>

            <details class="group overflow-hidden rounded-[10px] border border-gray-200 bg-white" data-filter-group>
                <summary class="flex cursor-pointer list-none items-center justify-between px-3 py-2.5 text-sm font-medium text-reka-text">
                    <span>Condition</span>
                    <svg class="h-4 w-4 text-reka-text-muted transition group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </summary>
                <div class="border-t border-gray-100 px-3 pb-3 pt-2">
                    <div class="space-y-1.5 text-sm text-reka-text-secondary">
                        <label class="flex items-center gap-2 rounded-lg px-2 py-1 hover:bg-reka-surface/70">
                            <input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue" checked>
                            <span>Like New</span>
                        </label>
                        <label class="flex items-center gap-2 rounded-lg px-2 py-1 hover:bg-reka-surface/70">
                            <input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue">
                            <span>Excellent</span>
                        </label>
                        <label class="flex items-center gap-2 rounded-lg px-2 py-1 hover:bg-reka-surface/70">
                            <input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue">
                            <span>Good</span>
                        </label>
                        <label class="flex items-center gap-2 rounded-lg px-2 py-1 hover:bg-reka-surface/70">
                            <input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue">
                            <span>Fair</span>
                        </label>
                    </div>
                </div>
            </details>

            <details class="group overflow-hidden rounded-[10px] border border-gray-200 bg-white" data-filter-group>
                <summary class="flex cursor-pointer list-none items-center justify-between px-3 py-2.5 text-sm font-medium text-reka-text">
                    <span>Size</span>
                    <svg class="h-4 w-4 text-reka-text-muted transition group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </summary>
                <div class="border-t border-gray-100 px-3 pb-3 pt-2">
                    <div class="flex flex-wrap gap-2">
                        <button type="button" class="rounded-full border border-gray-200 bg-white px-2.5 py-1 text-xs font-medium text-reka-text-secondary transition hover:border-reka-blue hover:text-reka-blue">XS</button>
                        <button type="button" class="rounded-full border border-gray-200 bg-white px-2.5 py-1 text-xs font-medium text-reka-text-secondary transition hover:border-reka-blue hover:text-reka-blue">S</button>
                        <button type="button" class="rounded-full border border-reka-blue bg-reka-blue/10 px-2.5 py-1 text-xs font-medium text-reka-blue">M</button>
                        <button type="button" class="rounded-full border border-gray-200 bg-white px-2.5 py-1 text-xs font-medium text-reka-text-secondary transition hover:border-reka-blue hover:text-reka-blue">L</button>
                        <button type="button" class="rounded-full border border-gray-200 bg-white px-2.5 py-1 text-xs font-medium text-reka-text-secondary transition hover:border-reka-blue hover:text-reka-blue">XL</button>
                    </div>
                </div>
            </details>

            <details class="group overflow-hidden rounded-[10px] border border-gray-200 bg-white" data-filter-group>
                <summary class="flex cursor-pointer list-none items-center justify-between px-3 py-2.5 text-sm font-medium text-reka-text">
                    <span>Brand</span>
                    <svg class="h-4 w-4 text-reka-text-muted transition group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </summary>
                <div class="border-t border-gray-100 px-3 pb-3 pt-2">
                    <input list="brand-options" type="text" placeholder="Search brand" class="h-9 w-full rounded-[10px] border border-gray-200 bg-reka-surface px-3 text-sm text-reka-text placeholder:text-reka-text-muted focus:border-reka-blue focus:outline-none">
                    <datalist id="brand-options">
                        <option value="Nike"></option>
                        <option value="Adidas"></option>
                        <option value="Uniqlo"></option>
                        <option value="H&M"></option>
                        <option value="Zara"></option>
                    </datalist>
                </div>
            </details>

            <details class="group overflow-hidden rounded-[10px] border border-gray-200 bg-white" data-filter-group>
                <summary class="flex cursor-pointer list-none items-center justify-between px-3 py-2.5 text-sm font-medium text-reka-text">
                    <span>Price</span>
                    <svg class="h-4 w-4 text-reka-text-muted transition group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </summary>
                <div class="border-t border-gray-100 px-3 pb-3 pt-2">
                    <div class="grid grid-cols-2 gap-2">
                        <label class="text-xs text-reka-text-secondary">
                            <span class="mb-1 block text-[11px] font-semibold uppercase tracking-[0.2em] text-reka-text-muted">Min</span>
                            <input type="number" value="100000" class="h-8 w-full rounded-[8px] border border-gray-200 bg-reka-surface px-2 text-sm text-reka-text focus:border-reka-blue focus:outline-none">
                        </label>
                        <label class="text-xs text-reka-text-secondary">
                            <span class="mb-1 block text-[11px] font-semibold uppercase tracking-[0.2em] text-reka-text-muted">Max</span>
                            <input type="number" value="500000" class="h-8 w-full rounded-[8px] border border-gray-200 bg-reka-surface px-2 text-sm text-reka-text focus:border-reka-blue focus:outline-none">
                        </label>
                    </div>
                    <input type="range" min="100000" max="1000000" value="500000" class="mt-2 h-2 w-full cursor-pointer accent-reka-blue">
                </div>
            </details>

            <details class="group overflow-hidden rounded-[10px] border border-gray-200 bg-white" data-filter-group>
                <summary class="flex cursor-pointer list-none items-center justify-between px-3 py-2.5 text-sm font-medium text-reka-text">
                    <span>Color</span>
                    <svg class="h-4 w-4 text-reka-text-muted transition group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </summary>
                <div class="border-t border-gray-100 px-3 pb-3 pt-2">
                    <div class="flex flex-wrap gap-2">
                        <button type="button" class="h-6 w-6 rounded-full border-2 border-reka-blue bg-[#111111]" aria-label="Black"></button>
                        <button type="button" class="h-6 w-6 rounded-full border border-gray-200 bg-[#d9c7a8]" aria-label="Beige"></button>
                        <button type="button" class="h-6 w-6 rounded-full border border-gray-200 bg-[#f4f4f0]" aria-label="Cream"></button>
                        <button type="button" class="h-6 w-6 rounded-full border border-gray-200 bg-[#c9d6e3]" aria-label="Blue"></button>
                        <button type="button" class="h-6 w-6 rounded-full border border-gray-200 bg-[#e5b6c3]" aria-label="Pink"></button>
                    </div>
                </div>
            </details>

            <details class="group overflow-hidden rounded-[10px] border border-gray-200 bg-white" data-filter-group>
                <summary class="flex cursor-pointer list-none items-center justify-between px-3 py-2.5 text-sm font-medium text-reka-text">
                    <span>Availability</span>
                    <svg class="h-4 w-4 text-reka-text-muted transition group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </summary>
                <div class="border-t border-gray-100 px-3 pb-3 pt-2">
                    <div class="space-y-1.5 text-sm text-reka-text-secondary">
                        <label class="flex items-center gap-2 rounded-lg px-2 py-1 hover:bg-reka-surface/70">
                            <input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue" checked>
                            <span>Ready Stock</span>
                        </label>
                        <label class="flex items-center gap-2 rounded-lg px-2 py-1 hover:bg-reka-surface/70">
                            <input type="checkbox" class="h-3.5 w-3.5 rounded-[4px] border border-gray-300 accent-reka-blue">
                            <span>Sold Out</span>
                        </label>
                    </div>
                </div>
            </details>

            <details class="group overflow-hidden rounded-[10px] border border-gray-200 bg-white" data-filter-group>
                <summary class="flex cursor-pointer list-none items-center justify-between px-3 py-2.5 text-sm font-medium text-reka-text">
                    <span>Seller Rating</span>
                    <svg class="h-4 w-4 text-reka-text-muted transition group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </summary>
                <div class="border-t border-gray-100 px-3 pb-3 pt-2">
                    <div class="space-y-1.5 text-sm text-reka-text-secondary">
                        <label class="flex items-center gap-2 rounded-lg px-2 py-1 hover:bg-reka-surface/70">
                            <span class="text-reka-yellow">★★★★★</span>
                        </label>
                        <label class="flex items-center gap-2 rounded-lg px-2 py-1 hover:bg-reka-surface/70">
                            <span class="text-reka-yellow">★★★★☆</span>
                        </label>
                        <label class="flex items-center gap-2 rounded-lg px-2 py-1 hover:bg-reka-surface/70">
                            <span class="text-reka-yellow">★★★☆☆</span>
                        </label>
                    </div>
                </div>
            </details>
        </div>
    </div>

    <div class="sticky bottom-0 border-t border-gray-100 bg-white pt-3">
        <div class="flex flex-col gap-2">
            <button type="button" class="btn-primary w-full justify-center rounded-full px-4 py-2 text-sm">Apply Filters</button>
            <button type="button" class="btn-secondary w-full justify-center rounded-full px-4 py-2 text-sm">Reset Filters</button>
        </div>
    </div>
</div>
