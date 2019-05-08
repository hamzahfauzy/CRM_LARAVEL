<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
class TransactionItem extends Model
{
    public function product()
    {
    	return $this->hasOne(Product::class, 'id','product_id');
    }

}
