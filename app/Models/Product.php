<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'desc',
        'price',
        'first_stock',
        'last_stock',
    ];

    public function Cart()
    {
        return $this->hasOne(Cart::class);
    }

    public function Transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
