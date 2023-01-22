<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    protected $primaryKey = 'slider_id';
    protected $fillable = [
        'slider_id',
        'title',
        'big_title',
        'image_url',
        'is_active'
    ];
}
