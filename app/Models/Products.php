<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Products extends Model
{
    use SoftDeletes,HasFactory;
    
    protected $table = "products";
    protected $fillable = ['name','image','price','description','status' ,'category_id'];
    
    function Category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
