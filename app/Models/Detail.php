<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    use HasFactory;

    protected $fillable = ['transaction_id', 'product_id', 'quantity', 'sub_total'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s'
    ];

    // ✅ Tambahkan relasi ke Produk
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    // ✅ Tambahkan relasi ke Transaksi
    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_id');
    }
}
