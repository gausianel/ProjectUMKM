<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detail;

class DetailController extends Controller
{
    // Menyimpan data baru
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'sub_total' => 'required|numeric|min:0',
        ]);

        // Simpan ke database
        Detail::create($validated);
        return redirect('/dashboard')->with('success', 'Detail berhasil disimpan.');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $detail = Detail::findOrFail($id);
        return view('details.edit', compact('detail'));
    }

    // Mengupdate data detail
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'sub_total' => 'required|numeric|min:0',
        ]);

        $detail = Detail::findOrFail($id);
        $detail->update($validated);
        return redirect('/dashboard')->with('success', 'Detail berhasil diperbarui.');
    }

    // Menghapus data detail
    public function destroy($id)
    {
        Detail::findOrFail($id)->delete();
        return redirect('/dashboard')->with('success', 'Detail berhasil dihapus.');
    }
}
