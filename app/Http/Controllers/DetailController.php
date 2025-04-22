<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;

class DetailController extends Controller
{
    public function store(Request $request)
    {
        Detail::create($request->only(['transaction_id', 'product_id', 'quantity', 'sub_total']));
        return redirect('/dashboard');
    }

    public function edit($id)
    {
        $detail = Detail::findOrFail($id);
        return view('details.edit', compact('detail'));
    }

    public function update(Request $request, $id)
    {
        $detail = Detail::findOrFail($id);
        $detail->update($request->only(['transaction_id', 'product_id', 'quantity', 'sub_total']));
        return redirect('/dashboard');
    }

    public function destroy($id)
    {
        Detail::findOrFail($id)->delete();
        return redirect('/dashboard');
    }
}
