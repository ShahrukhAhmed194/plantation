<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreeProfile extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'address_id',
        'status',
        'details',
        'latitude',
        'longitude',
        'uuid',
        'planting_date',
        'planting_time',
        'created_by',
        'updated_by',
    ];

    public function treeAddress(){
        return $this->belongsTo('App\Models\Address', 'address_id');
    }
}