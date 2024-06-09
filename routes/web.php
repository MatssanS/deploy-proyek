<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('login');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/menu', [MenuController::class, 'index'])->name('menu');

Route::get('/ulasan', function () {
    return view('ulasan');
});

Route::resource('menus', MenuController::class);

Route::get('/konfirmasi', [TransaksiController::class, 'index'])->name('transaksi');

// Route to cancel transaction
Route::delete('/transactions/{id_transaksi}/cancel', [TransaksiController::class, 'cancel'])->name('transactions.cancel');

// Route to confirm transaction
Route::post('/transactions/{id_transaksi}/confirm', [TransaksiController::class, 'confirm'])->name('transactions.confirm');

// Route to view transaction history
Route::get('/history', [TransaksiController::class, 'history'])->name('transactions.history');

// Route to download transaction history
Route::get('/transactions/download', [TransaksiController::class, 'download'])->name('transactions.download');

Route::get('/ulasan', [UlasanController::class, 'index']);

// Routes for Admin
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');