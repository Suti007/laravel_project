<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoly extends Model
{
    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }
}
