<?php

use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\Auth\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'store'])->name('admin.login.store');
Route::get('/admin/logout', [AdminAuthController::class, 'logoutAdmin'])->name('admin.logout');

Route::get('/admin/add-merchant', [AdminAuthController::class, 'showMerchantRegisterForm'])->name('admin.add-merchant');
Route::post('/admin/add-merchant', [AdminAuthController::class, 'addMerchant']);

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/admin-panel', [AdminPagesController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/add-seminar-event', [AdminPagesController::class, 'addSeminar'])->name('admin.add-seminar-event');
    Route::get('/admin/digimikro-daftar', [AdminPagesController::class, 'digimikroDaftar'])->name('admin.digimikro-daftar');
    Route::get('/admin/event', [AdminPagesController::class, 'event'])->name('admin.event');
    Route::get('/admin/seminar-event', [AdminPagesController::class, 'seminarEvent'])->name('admin.seminar-event');
    // Route::get('/admin/add-merchant', [AdminPagesController::class, 'addMerchant'])->name('admin.add-merchant');
});

?>