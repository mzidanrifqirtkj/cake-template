<?php

use App\Http\Controllers\Auth\CustomerAuthController;
use App\Http\Controllers\CustomerPagesController;
use Illuminate\Support\Facades\Route;

Route::get('/customer/login', [CustomerAuthController::class, 'login'])->name('customer.login');
Route::post('/customer/login', [CustomerAuthController::class, 'store'])->name('customer.login.store');
Route::get('/customer/logout', [CustomerAuthController::class, 'logoutCustomer'])->name('customer.logout');
Route::get('/customer/register', [CustomerAuthController::class, 'showRegisterForm'])->name('customer.register');
Route::post('/customer/register', [CustomerAuthController::class, 'register']);

Route::middleware('auth:customer')->group(function () {
    Route::get('/customer/profile', [CustomerPagesController::class, 'profile'])->name('customer.profile');

});
?>
