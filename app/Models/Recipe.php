<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    function category() {
        return $this->belongsTo('App\Models\Category');
    }

    function comments() {
        return $this->hasMany('App\Models\Comment');
    }

    function ingredients() {
        return $this->hasMany('App\Models\Ingredient');
    }

    function steps() {
        return $this->hasMany('App\Models\Step');
    }

    function user() {
        return $this->belongsTo('App\Models\User');
    }
}
