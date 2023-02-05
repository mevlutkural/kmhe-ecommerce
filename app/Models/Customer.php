<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'name_surname',
        'email',
        'phone_number',
        'email_verified_at',
        'password'
    ];
}
