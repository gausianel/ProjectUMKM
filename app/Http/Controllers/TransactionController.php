<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Product;
use App\Models\Detail;

class TransactionController extends Controller
{
    public function dashboard()
    {
        $products = Product::all();
        $transactions = Transaction::all();
        $details = Detail::with('product')->get();
        return view('dashboard', compact('products', 'transactions', 'details'));
    }

    public function store(Request $request)
    {
        Transaction::create($request->only(['date', 'total_price']));
        return redirect('/dashboard');
    }

    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        return view('transactions.edit', compact('transaction'));
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);
        $transaction->update($request->only(['date', 'total_price']));
        return redirect('/dashboard');
    }

    public function destroy($id)
    {
        Transaction::findOrFail($id)->delete();
        return redirect('/dashboard');
    }
}
