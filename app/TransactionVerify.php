<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Transaction;

class TransactionVerify extends Model
{
    public function transaction()
    {
    	return $this->hasOne(Transaction::class,'id','transaction_id');
    }

}
