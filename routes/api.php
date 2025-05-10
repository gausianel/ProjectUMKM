<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Detail;

// ===================== PRODUCT ROUTES ===================== //

// GET semua produk
Route::get('/products', function () {
    return Product::all();
});

// POST tambah produk
Route::post('/products', function (Request $request) {
    $product = Product::create($request->only(['product_name', 'price', 'stock', 'category']));
    return response()->json($product, 201);
});

// PUT update produk
Route::put('/products/{id}', function (Request $request, $id) {
    $product = Product::findOrFail($id);
    $product->update($request->only(['product_name', 'price', 'stock', 'category']));
    return response()->json($product);
});

// DELETE produk
Route::delete('/products/{id}', function ($id) {
    Product::destroy($id);
    return response()->json(null, 204);
});

// ===================== TRANSACTION ROUTES ===================== //

// GET semua transaksi
Route::get('/transactions', function () {
    return Transaction::all();
});

// POST tambah transaksi
Route::post('/transactions', function (Request $request) {
    $transaction = Transaction::create($request->only(['date', 'total_price']));
    return response()->json($transaction, 201);
});

// DELETE transaksi
Route::delete('/transactions/{id}', function ($id) {
    Transaction::destroy($id);
    return response()->json(null, 204);
});

// GET semua detail transaksi
Route::get('/details', function () {
    return Detail::all();
});

// GET detail transaksi berdasarkan ID transaksi
Route::get('/transactions/{id}/details', function ($id) {
    return Detail::where('transaction_id', $id)->get();
});

// POST tambah detail transaksi
Route::post('/transactions/{id}/details', function (Request $request, $id) {
    $detail = Detail::create(array_merge(
        $request->only(['product_id', 'quantity', 'subtotal']),
        ['transaction_id' => $id]
    ));
    return response()->json($detail, 201);
});
