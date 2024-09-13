Route::get('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'store'])->name('admin.login.store');
