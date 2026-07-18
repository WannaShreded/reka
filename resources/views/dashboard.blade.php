{{--
    The authenticated dashboard deliberately reuses the storefront homepage.
    Keeping the homepage as the single source of truth preserves its SEO markup,
    Vite assets, styling, and JavaScript interactions without duplicating them.
--}}
@include('shop.home')
