<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\DetailController;

// 🟢 Dashboard
Route::get('/dashboard', [TransactionController::class, 'dashboard']);

// 🟡 Produk Routes
Route::resource('products', ProductController::class);

// 🟡 Transaksi Routes
Route::resource('transactions', TransactionController::class);

// 🟡 Detail Transaksi Routes
Route::resource('details', DetailController::class);
