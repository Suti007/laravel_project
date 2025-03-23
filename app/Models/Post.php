<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function categolies()
    {
        return $this->belongsToMany(Categoly::class);
    }
    use HasFactory;
    public function cartItems()
    {
        return $this->hasMany(Cart::class);
    }
    protected $fillable=['name','image','qty','price','category','description'];
}
