@php($categories = $categories ?? []);@php($selectedCategory = $selectedCategory ?? null)
<div class="sticky top-20 z-30 mb-3">
    <form action="{{ route('category') }}" method="GET" class="flex flex-wrap items-center gap-3 rounded-3xl border border-reka-border bg-white/90 px-4 py-3 shadow-sm">
        <label class="flex items-center gap-3 text-sm text-reka-text-secondary">
            <span class="font-semibold text-reka-text">Category</span>
            <select name="category" class="rounded-full border border-reka-border bg-white px-4 py-2 text-sm text-reka-text focus:outline-none focus:ring-2 focus:ring-reka-blue/20">
                <option value="">All categories</option>
                @foreach($categories as $categoryOption)
                    <option value="{{ $categoryOption }}" @selected($selectedCategory === $categoryOption)>{{ $categoryOption }}</option>
                @endforeach
            </select>
        </label>
        <button type="submit" class="btn-primary rounded-full px-4 py-2 text-sm">Apply</button>
    </form>
</div>
