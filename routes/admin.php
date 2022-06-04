<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::controller(AdminController::class)->group(function () {
    Route::get('/', 'daftar_peminjam');
    Route::put('update', 'approve');
    Route::put('tolak', 'disapprove');
});


