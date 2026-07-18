

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

const updateBadge = (selector, value) => {
    const badge = document.querySelector(selector);

    if (badge) {
        badge.textContent = value;
    }
};

const refreshCounters = async () => {
    try {
        const [cartResponse, wishlistResponse] = await Promise.all([
            fetch('/cart/count', { headers: { 'X-Requested-With': 'XMLHttpRequest' } }),
            fetch('/wishlist/count', { headers: { 'X-Requested-With': 'XMLHttpRequest' } }),
        ]);

        const cartData = cartResponse.ok ? await cartResponse.json() : null;
        const wishlistData = wishlistResponse.ok ? await wishlistResponse.json() : null;

        updateBadge('#cart-count', cartData?.count ?? 0);
        updateBadge('#wishlist-count', wishlistData?.count ?? 0);
    } catch (error) {
        console.error(error);
    }
};

document.addEventListener('DOMContentLoaded', () => {
    refreshCounters();

    document.querySelectorAll('form[action*="/wishlist"], form[action*="/cart"]').forEach((form) => {
        form.addEventListener('submit', async (event) => {
            const action = form.getAttribute('action') || '';
            const isWishlistAction = action.includes('/wishlist');
            const isCartAction = action.includes('/cart');

            if (!isWishlistAction && !isCartAction) {
                return;
            }

            event.preventDefault();

            try {
                await fetch(form.action, {
                    method: form.getAttribute('method')?.toUpperCase() || 'GET',
                    body: new FormData(form),
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                });
            } catch (error) {
                console.error(error);
            }

            await refreshCounters();
        });
    });
});
