<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    use HasFactory;
    public function SubCategory(){
        return $this->belongsTo(SubCategory::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }
}
