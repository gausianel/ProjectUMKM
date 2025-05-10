<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\Detail;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $transactions = Transaction::all();
        $details = Detail::all();

        return view('dashboard', compact('products', 'transactions', 'details'));
    }
}

