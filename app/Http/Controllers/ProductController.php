<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function store(Request $request)
    {
        Product::create($request->only(['product_name', 'price', 'stock', 'category']));
        return redirect('/dashboard');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->only(['product_name', 'price', 'stock', 'category']));
        return redirect('/dashboard');
    }

    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return redirect('/dashboard');
    }
}
