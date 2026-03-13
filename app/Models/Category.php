<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class Category extends Model
{
    protected $table = "categorys";
    protected $fillable = ['name'];

    public function Products(){
        return $this->hasMany(Products::class,'category_id');
    }
}
