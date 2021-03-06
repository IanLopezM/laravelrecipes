<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    function user() {
        return $this->belongsTo('App\Models\User');
    }

    function recipe() {
        return $this->belongsTo('App\Models\Recipe');
    }
}
