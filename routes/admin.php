<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::prefix('daftar-peminjam')->group(function () {
    Route::get('/', 'daftar_peminjam');
    Route::put('update', 'approve');
    Route::put('tolak', 'disapprove');
});


