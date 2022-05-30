<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminController;
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
    return view('welcome');
});

Route::controller(DashboardController::class)->middleware(['auth'])->group(function () {
    Route::get('dashboard', 'index')->name('dashboard');
});

// Route Admin
Route::controller(AdminController::class)->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('daftar-peminjam', 'daftar_peminjam');
    Route::post('daftar-peminjam', 'approve');
});

// Untuk Peminjaman
Route::controller(PeminjamanController::class)->middleware(['auth', 'role:student'])->group(function () {
    Route::get('peminjaman', 'index');
    Route::get('peminjaman/create', 'create');
    Route::post('peminjaman', 'store');
    Route::get('peminjaman/status', 'status_peminjaman');
});


require __DIR__ . '/auth.php';
