<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiftRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'tree_id',
        'address_id',
        'status',
        'receiver_name',
        'receiver_phone',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function senderInfo(){
        return $this->belongsTo('App\Models\User', 'sender_id');
    }

    public function receiverAddress(){
        return $this->belongsTo('App\Models\Address', 'address_id');
    }

    public function assignedTree(){
        return $this->belongsTo('App\Models\TreeProfile', 'tree_id');
    }
}
