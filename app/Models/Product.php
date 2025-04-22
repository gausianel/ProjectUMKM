<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        "product_name",
        "price",
        "stock",
        "category",
    ];

    public function transaction_details()
    {
        return $this->hasMany(Detail::class);
    }
}
