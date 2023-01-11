<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $primaryKey = 'brand_id';

    protected $fillable = [
        'brand_id',
        'name',
        'image_url',
        'alt',
        'is_active',
        'sequence'
    ];
}
