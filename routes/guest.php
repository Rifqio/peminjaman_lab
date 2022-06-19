<?php

use Illuminate\Support\Facades\Route;

Route::prefix('guest')->group(function () {
    Route::get('pengujian-sampel', 'index');
});
