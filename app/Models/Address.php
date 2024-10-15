<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_of',
        'division',
        'district',
        'home_address',
        'created_at',
        'updated_at',
    ];
}
