<?php

use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\MerchantAuthController;
use App\Http\Controllers\CustomerPagesController;
use App\Http\Controllers\MerchantPagesController;
use Illuminate\Support\Facades\Route;

// Memanggil rute untuk merchant
require __DIR__ . '/merchant.php';

// Memanggil rute untuk admin
require __DIR__ . '/admin.php';

// Home
Route::get('/', function () {
    return view('layouts.customer.home.pages.index');
})->name('customer.dashboard');

// Authentication
Route::get('/signin', function () {
    return view('layouts.customer.auth.login.pages.signin');
})->name('signin');

// Merchant
Route::get('/merchant', function () {
    return view('layouts.merchant.panel.pages.admin');
});

// Form
Route::get('/add-catalog', function () {
    return view('layouts.merchant.form.pages.add-catalog');
});

Route::get('/delete-catalog', function () {
    return view('layouts.merchant.form.pages.delete-catalog');
});

// Cart & Checkout
Route::get('/cart', function () {
    return view('layouts.customer.cart.pages.cart');
});

// Contact
Route::get('/contact', function () {
    return view('layouts.customer.contact.pages.contact');
});

// Shop & Detail
Route::get('/shop-detail', function () {
    return view('layouts.customer.detail.pages.shop-detail');
});

Route::get('/shop', function () {
    return view('layouts.customer.shop.pages.shop');
});

// Testimonial
Route::get('/testimonial', function () {
    return view('layouts.customer.testimonial.pages.testimonial');
});
// signup
Route::get('/signup', function () {
    return view('layouts.customer.auth.register.pages.signup');
});

Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'store'])->name('admin.login.store');

Route::get('/customer/login', [CustomerAuthController::class, 'login'])->name('customer.login');
Route::post('/customer/login', [CustomerAuthController::class, 'store'])->name('customer.login.store');

Route::get('/merchant/login', [MerchantAuthController::class, 'login'])->name('merchant.login');
Route::post('/merchant/login', [MerchantAuthController::class, 'store'])->name('merchant.login.store');

Route::get('/admin/logout', [AdminAuthController::class, 'logoutAdmin'])->name('admin.logout');
Route::get('/customer/logout', [CustomerAuthController::class, 'logoutCustomer'])->name('customer.logout');
Route::get('/merchant/logout', [MerchantAuthController::class, 'logoutMerchant'])->name('merchant.logout');

Route::middleware('auth:customer')->group(function () {
    Route::get('/checkout', [CustomerPagesController::class, 'index'])->name('customer.checkout');
});

Route::middleware('auth:merchant')->group(function () {
    Route::get('/merchant-panel', [MerchantPagesController::class, 'index'])->name('merchant.dashboard');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin-panel', [AdminPagesController::class, 'index'])->name('admin.dashboard');
});
