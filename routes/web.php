<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BebasLabController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landingPage.index');
});

Route::controller(DashboardController::class)->middleware(['auth'])->group(function () {
    Route::get('dashboard', 'index')->name('dashboard');
});

//Route Profile
Route::controller(ProfileController::class)->middleware(['auth'])->group(function () {
    Route::get('profile', 'index')->name('profile');
    Route::put('profile', 'update');
});

// Route Peminjaman
Route::controller(PeminjamanController::class)->middleware(['auth', 'role:student'])->prefix('peminjaman')->group(function () {
    Route::get('/', 'index');
    Route::get('create', 'create');
    Route::post('/', 'store');
    Route::get('status', 'status_peminjaman');
});

//Route Bebas Lab
Route::controller(BebasLabController::class)->middleware(['auth', 'role:student'])->prefix('bebas-lab')->group(function (){
    Route::get('/', 'index');
    Route::get('create', 'create');
    Route::post('create', 'store');
    Route::get('status', 'status_surat');
});
require __DIR__ . '/auth.php';
