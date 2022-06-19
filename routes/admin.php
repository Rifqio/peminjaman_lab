<?php

use Illuminate\Support\Facades\Route;

Route::prefix('daftar-peminjam')->group(function () {
    Route::get('/', 'daftar_peminjam');
    Route::put('update', 'approve');
    Route::put('tolak', 'disapprove');
    Route::get('cetak/{id}', 'cekPermohonan');
});


