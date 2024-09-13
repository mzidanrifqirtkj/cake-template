<?php

use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\Auth\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'store'])->name('admin.login.store');
Route::get('/admin/logout', [AdminAuthController::class, 'logoutAdmin'])->name('admin.logout');

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin-panel', [AdminPagesController::class, 'index'])->name('admin.dashboard');
});

?>