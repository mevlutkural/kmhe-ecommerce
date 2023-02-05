<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $primaryKey = 'review_id';
    protected $fillable = [
        'review_id',
        'rating',
        'content',
        'name',
        'email',
        'phone_number',
        'is_active',
        'product_id'
    ];

    public function product()
    {
        return $this->hasOne(Product::class, 'product_id', 'product_id');
    }
}
