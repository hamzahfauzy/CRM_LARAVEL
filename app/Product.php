<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\ProductImage;
class Product extends Model
{
    //

    public function category()
    {
    	return $this->hasOne(Category::class,'id','category_id');
    }

    public function images()
    {
    	return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }
    public function image()
    {
    	return $this->hasOne(ProductImage::class, 'product_id', 'id');
    }
}
