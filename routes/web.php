<?php
use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\Auth\MerchantAuthController;
use App\Http\Controllers\CustomerPagesController;
use Illuminate\Support\Facades\Route;

// Memanggil rute untuk merchant
require __DIR__ . '/web/merchant.php';

// Memanggil rute untuk admin
require __DIR__ . '/web/admin.php';

// Memanggil rute untuk customer
require __DIR__ . '/web/customer.php';

// Home
Route::get('/', function () {
    return view('layouts.customer.home.pages.index');
})->name('customer.dashboard');

// Authentication
Route::get('/signin', function () {
    return view('layouts.customer.auth.login.pages.signin');
})->name('signin');

// // Merchant
// Route::get('/merchant', function () {
//     return view('layouts.merchant.panel.pages.admin');
// });

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

?>