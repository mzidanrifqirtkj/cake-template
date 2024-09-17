<?php

use App\Http\Controllers\MerchantPagesController;
use App\Http\Controllers\Auth\MerchantAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/merchant/login', [MerchantAuthController::class, 'login'])->name('merchant.login');
Route::post('/merchant/login', [MerchantAuthController::class, 'store'])->name('merchant.login.store');

Route::get('/merchant/logout', [MerchantAuthController::class, 'logoutMerchant'])->name('merchant.logout');

Route::middleware('auth:merchant')->group(function () {
    Route::get('/merchant/merchant-panel', [MerchantPagesController::class, 'index'])->name('merchant.dashboard');
});
?>