<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TreeTimelineImage extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tree_id',
        'tree_photo_path',
        'photo_date',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function treeProfile(){
        return $this->belongsTo('App\Models\TreeProfile', 'tree_id');
    }

}
