<?php

namespace App\Providers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view): void {
            $wishlistCount = count(array_filter((array) Session::get('wishlist', []), static fn ($value) => (bool) $value));

            if (Auth::check()) {
                $cartItems = Cart::where('user_id', Auth::id())->value('items') ?? [];
            } else {
                $cartItems = Session::get('guest_cart', []);
            }

            $view->with([
                'wishlistCount' => $wishlistCount,
                'cartCount' => count($cartItems),
            ]);
        });
    }
}
