<?php
use Illuminate\Support\Facades\Route;

// Home
Route::get('/', function () {
    return view('layouts.home.pages.index');
});

// Authentication
Route::get('/signin', function () {
    return view('layouts.login.pages.signin');
});

// Admin
Route::get('/admin', function () {
    return view('layouts.admin.pages.admin');
});

// Form
Route::get('/add-catalog', function () {
    return view('layouts.form.pages.add-catalog');
});

Route::get('/delete-catalog', function () {
    return view('layouts.form.pages.delete-catalog');
});

// Cart & Checkout
Route::get('/cart', function () {
    return view('layouts.cart.pages.cart');
});

Route::get('/checkout', function () {
    return view('layouts.checkout.pages.checkout'); // perbaiki 'chackout' jadi 'checkout'
});

// Contact
Route::get('/contact', function () {
    return view('layouts.contact.pages.contact');
});

// Shop & Detail
Route::get('/shop-detail', function () {
    return view('layouts.detail.pages.shop-detail');
});

Route::get('/shop', function () {
    return view('layouts.shop.pages.shop');
});

// Testimonial
Route::get('/testimonial', function () {
    return view('layouts.testimonial.pages.testimonial');
});
?>