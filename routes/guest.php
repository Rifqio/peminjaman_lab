<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\UjiSampelController;
use Illuminate\Support\Facades\Route;

Route::prefix('guest')->controller(GuestController::class)->group(function () {
    Route::get('pengujian-sampel', 'index');
    Route::get('menu-pengujian-sampel', 'menu');
    Route::get('status-pengujian-sampel', 'status');
});

Route::controller(UjiSampelController::class)->group(function () {
    Route::post('upload-bukti', 'bukti_pembayaran')->name('upload-bukti');
});
