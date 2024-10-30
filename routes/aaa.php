// Budaya Pengguna
Route::get('/culture', [CultureController::class, 'index'])->name('admin.culture.index');
Route::get('/culture/{slug}', [CultureController::class, 'show'])->name('app.culture.detail');
Route::middleware('auth')->post('/culture/{slug}/like', [CultureController::class, 'like'])->name('culture.like');
Route::middleware('auth')->post('/culture/{slug}/history', [CultureController::class, 'history'])->name('culture.history');

// Komentar UMKM
Route::post('/culture/{slug}/comments', [CultureController::class, 'storeComment'])->name('culture.comments.store');