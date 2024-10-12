//ADMIN WISATA
    Route::get('/adminwisata', [AdminWisataController::class, 'index'])->name('admin.adminwisata.index');
    Route::post('/adminwisata', [AdminWisataController::class, 'store'])->name('adminwisata.store');
    Route::get('/adminwisata/{id}', [AdminWisataController::class, 'detail'])->name('adminwisata.detail');
    Route::put('/adminwisata/{id}', [AdminWisataController::class, 'update'])->name('adminwisata.update');
    Route::delete('/adminwisata/{id}', [AdminWisataController::class, 'destroy'])->name('adminwisata.destroy');