<?php

use Illuminate\Support\Facades\Route;

Route::prefix('guest')->group(function () {
    Route::get('pengujian-sampel', 'index');
    Route::get('menu-pengujian-sampel', 'menu');
    Route::get('status-pengujian-sampel', 'status');
});
