<?php

use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\MidtransPaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ShopController::class, 'home'])->name('home');

Route::get('/category', [ShopController::class, 'category'])->name('category');
Route::get('/product/{slug}', [ShopController::class, 'productDetail'])->name('product-detail');
Route::get('/search', [ShopController::class, 'search'])->name('search');
Route::get('/support', [ShopController::class, 'support'])->name('support');

Route::post('/cart/add', [ShopController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/count', [ShopController::class, 'cartCount'])->name('cart.count');
Route::get('/wishlist/count', [ShopController::class, 'wishlistCount'])->name('wishlist.count');

Route::middleware('auth')->group(function () {
    Route::get('/cart', [ShopController::class, 'cart'])->name('cart');
    Route::patch('/cart/{key}', [ShopController::class, 'updateCart'])->name('cart.update');
    Route::delete('/cart/{key}', [ShopController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/wishlist', [ShopController::class, 'wishlist'])->name('wishlist');
    Route::post('/wishlist/add', [ShopController::class, 'addToWishlist'])->name('wishlist.add');
    Route::delete('/wishlist/{slug}', [ShopController::class, 'removeFromWishlist'])->name('wishlist.remove');
    Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin-dashboard', [ShopController::class, 'adminDashboard'])->name('admin-dashboard');
});

Route::get('/checkout', [ShopController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [ShopController::class, 'placeOrder'])->name('checkout.place');

Route::post('/payments/midtrans/webhook', [MidtransPaymentController::class, 'webhook'])->name('payments.midtrans.webhook');

Route::middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/orders', [ShopController::class, 'orderHistory'])->name('orders');
    Route::get('/orders/{order}', [ShopController::class, 'orderConfirmation'])->name('order-confirmation');
    Route::get('/payments/midtrans/finish/{order}', [MidtransPaymentController::class, 'finish'])->name('payments.midtrans.finish');
    Route::get('/payments/midtrans/unfinish/{order}', [MidtransPaymentController::class, 'unfinish'])->name('payments.midtrans.unfinish');
    Route::get('/payments/midtrans/error/{order}', [MidtransPaymentController::class, 'error'])->name('payments.midtrans.error');
    Route::get('/dashboard', [ShopController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/settings', [ShopController::class, 'settings'])->name('settings');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [ShopController::class, 'loginView'])->name('login');
    Route::post('/login', [ShopController::class, 'login']);
    Route::get('/register', [ShopController::class, 'registerView'])->name('register');
    Route::post('/register', [ShopController::class, 'register']);
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

Route::post('/logout', [ShopController::class, 'logout'])->name('logout');
