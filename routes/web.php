<?php

use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/category', [ShopController::class, 'category'])->name('category');
Route::get('/product/{slug}', [ShopController::class, 'productDetail'])->name('product-detail');

Route::get('/cart', [ShopController::class, 'cart'])->name('cart');
Route::post('/cart/add', [ShopController::class, 'addToCart'])->name('cart.add');
Route::get('/checkout', [ShopController::class, 'checkout'])->name('checkout');
Route::get('/wishlist', [ShopController::class, 'wishlist'])->name('wishlist');
Route::get('/search', [ShopController::class, 'search'])->name('search');
Route::get('/support', [ShopController::class, 'support'])->name('support');

Route::middleware('auth')->group(function () {
    Route::patch('/cart/{key}', [ShopController::class, 'updateCart'])->name('cart.update');
    Route::delete('/cart/{key}', [ShopController::class, 'removeFromCart'])->name('cart.remove');

    Route::post('/wishlist/add', [ShopController::class, 'addToWishlist'])->name('wishlist.add');
    Route::delete('/wishlist/{slug}', [ShopController::class, 'removeFromWishlist'])->name('wishlist.remove');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin-dashboard', [ShopController::class, 'adminDashboard'])->name('admin-dashboard');
});

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::post('/checkout', [ShopController::class, 'placeOrder'])->name('checkout.place');
    Route::get('/orders', [ShopController::class, 'orderHistory'])->name('orders');
    Route::get('/orders/{order}', [ShopController::class, 'orderConfirmation'])->name('order-confirmation');
    Route::get('/dashboard', [ShopController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ShopController::class, 'profile'])->name('profile');
    Route::get('/settings', [ShopController::class, 'settings'])->name('settings');
});

Route::get('/login', [ShopController::class, 'loginView'])->name('login');
Route::post('/login', [ShopController::class, 'login']);
Route::get('/register', [ShopController::class, 'registerView'])->name('register');
Route::post('/register', [ShopController::class, 'register']);
Route::post('/logout', [ShopController::class, 'logout'])->name('logout');
