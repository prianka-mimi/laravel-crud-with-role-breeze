<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    public function creatorInfo(){
        return $this->belongsTo('App\Models\User','ban_creator','id');
    }

    public function editorInfo(){
        return $this->belongsTo('App\Models\User','ban_editor','id');
    }
}
