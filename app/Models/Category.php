<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'category_name',
        'category_slug',
        'category_id'
    ];

    public function parent()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
