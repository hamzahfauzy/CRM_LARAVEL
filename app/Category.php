<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
    protected $fillable = ['id','nama','created_at','updated_at'];
   
    public function product()
    {
    	return $this->hasMany(Product::class, 'category_id', 'id');
    }

}
