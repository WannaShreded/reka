/**
 * Reka Furniture — Homepage JavaScript
 * Handles all interactive behaviors for the e-commerce homepage.
 */

document.addEventListener('DOMContentLoaded', () => {

    /* ════════════════════════════════════════════════
       1. Intersection Observer — Scroll Animations
       ════════════════════════════════════════════════ */
    const animatedElements = document.querySelectorAll('[data-animate]');

    if (animatedElements.length) {
        const animationObserver = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animated');
                        observer.unobserve(entry.target);
                    }
                });
            },
            { threshold: 0.1 }
        );

        animatedElements.forEach((el) => animationObserver.observe(el));
    }

    /* ════════════════════════════════════════════════
       2. Sticky Navbar
       ════════════════════════════════════════════════ */
    const navbar = document.getElementById('navbar');

    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });
    }

    /* ════════════════════════════════════════════════
       3. Mobile Menu Toggle
       ════════════════════════════════════════════════ */
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            const isOpen = !mobileMenu.classList.contains('hidden');
            mobileMenu.classList.toggle('hidden');

            // Toggle hamburger ↔ X icon
            const paths = mobileMenuBtn.querySelectorAll('svg path');
            if (paths.length >= 2) {
                if (isOpen) {
                    // Show hamburger lines
                    paths[0].classList.remove('hidden');
                    paths[1].classList.add('hidden');
                } else {
                    // Show X
                    paths[0].classList.add('hidden');
                    paths[1].classList.remove('hidden');
                }
            }
        });
    }

    /* ════════════════════════════════════════════════
       4. Wishlist Toggle
       ════════════════════════════════════════════════ */
    const wishlistButtons = document.querySelectorAll('.wishlist-btn');

    wishlistButtons.forEach((btn) => {
        btn.addEventListener('click', (e) => {
            const isActive = btn.classList.toggle('active');
            const heartIcon = btn.querySelector('svg');

            if (heartIcon) {
                if (isActive) {
                    heartIcon.setAttribute('fill', 'currentColor');
                    btn.classList.add('text-reka-error');
                } else {
                    heartIcon.setAttribute('fill', 'none');
                    btn.classList.remove('text-reka-error');
                }
            }

            // Bounce animation
            btn.style.transform = 'scale(1.3)';
            setTimeout(() => {
                btn.style.transform = 'scale(1)';
            }, 200);
        });
    });

    /* ════════════════════════════════════════════════
       5. Add to Cart Button Animation
       ════════════════════════════════════════════════ */
    const addToCartButtons = document.querySelectorAll('.add-to-cart-btn');
    const cartCount = document.getElementById('cart-count');

    addToCartButtons.forEach((btn) => {
        btn.addEventListener('click', () => {
            const originalHTML = btn.innerHTML;
            const originalClasses = btn.className;

            // Show success state
            btn.innerHTML = `
                <svg class="w-5 h-5 inline-block mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                Added!
            `;
            btn.classList.add('bg-reka-success');
            btn.classList.remove('bg-reka-blue', 'hover:bg-reka-blue-dark');

            // Increment cart badge
            if (cartCount) {
                const current = parseInt(cartCount.textContent, 10) || 0;
                cartCount.textContent = current + 1;
            }

            // Revert after 2 seconds
            setTimeout(() => {
                btn.innerHTML = originalHTML;
                btn.className = originalClasses;
            }, 2000);
        });
    });

    /* ════════════════════════════════════════════════
       6. Newsletter Form
       ════════════════════════════════════════════════ */
    const newsletterForm = document.getElementById('newsletter-form');

    if (newsletterForm) {
        newsletterForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const container = newsletterForm.closest('div') || newsletterForm.parentElement;
            container.innerHTML = `
                <div class="flex flex-col items-center justify-center py-8 animate-fade-in-up">
                    <svg class="w-16 h-16 text-reka-success mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <h3 class="text-2xl font-semibold text-reka-text mb-2">Thank you for subscribing!</h3>
                    <p class="text-reka-text-secondary">We'll keep you updated with the latest collections and offers.</p>
                </div>
            `;
        });
    }

    /* ════════════════════════════════════════════════
       7. Smooth Scroll for Anchor Links
       ════════════════════════════════════════════════ */
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener('click', (e) => {
            const targetId = anchor.getAttribute('href');
            if (targetId === '#') return;

            const targetEl = document.querySelector(targetId);
            if (targetEl) {
                e.preventDefault();
                targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        });
    });

    /* ════════════════════════════════════════════════
       8. Counter Animation (Stats Numbers)
       ════════════════════════════════════════════════ */
    const statNumbers = document.querySelectorAll('[data-count]');

    if (statNumbers.length) {
        const counterObserver = new IntersectionObserver(
            (entries, observer) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        const el = entry.target;
                        const target = parseInt(el.getAttribute('data-count'), 10);
                        const duration = 2000; // ms
                        const startTime = performance.now();

                        const updateCounter = (currentTime) => {
                            const elapsed = currentTime - startTime;
                            const progress = Math.min(elapsed / duration, 1);

                            // Ease-out cubic for a natural deceleration
                            const eased = 1 - Math.pow(1 - progress, 3);
                            const currentValue = Math.floor(eased * target);

                            el.textContent = currentValue.toLocaleString();

                            if (progress < 1) {
                                requestAnimationFrame(updateCounter);
                            } else {
                                el.textContent = target.toLocaleString();
                            }
                        };

                        requestAnimationFrame(updateCounter);
                        observer.unobserve(el);
                    }
                });
            },
            { threshold: 0.3 }
        );

        statNumbers.forEach((el) => counterObserver.observe(el));
    }
});
