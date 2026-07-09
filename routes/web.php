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
Route::patch('/cart/{key}', [ShopController::class, 'updateCart'])->name('cart.update');
Route::delete('/cart/{key}', [ShopController::class, 'removeFromCart'])->name('cart.remove');

Route::get('/checkout', [ShopController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [ShopController::class, 'placeOrder'])->name('checkout.place');
Route::get('/orders', [ShopController::class, 'orderHistory'])->name('orders');
Route::get('/orders/{order}', [ShopController::class, 'orderConfirmation'])->name('order-confirmation');

Route::get('/wishlist', [ShopController::class, 'wishlist'])->name('wishlist');
Route::post('/wishlist/add', [ShopController::class, 'addToWishlist'])->name('wishlist.add');
Route::delete('/wishlist/{slug}', [ShopController::class, 'removeFromWishlist'])->name('wishlist.remove');

Route::get('/login', [ShopController::class, 'loginView'])->name('login');
Route::post('/login', [ShopController::class, 'login']);
Route::get('/register', [ShopController::class, 'registerView'])->name('register');
Route::post('/register', [ShopController::class, 'register']);

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/search', function () {
    return view('search');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/admin-dashboard', function () {
    return view('admin-dashboard');
});
