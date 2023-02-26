<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $primaryKey = 'cart_id';
    protected $fillable = [
        'cart_id',
        'product_id',
        'customer_id',
        'person',
        'quantity'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'product_id', 'product_id');
    }
}
