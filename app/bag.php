<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class bag extends Model
{
    public function product()
    {
    	return $this->hasOne(Product::class, 'id', 'product_id');
    }

}
