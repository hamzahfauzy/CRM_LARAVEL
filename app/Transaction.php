<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TransactionItem;
use App\TransactionVerify;
use App\User;
class Transaction extends Model
{
    //

    public function user()
    {
    	return $this->hasOne(User::class, 'id','user_id');
    }
    public function verify()
    {
    	return $this->hasOne(TransactionVerify::class, 'transaction_id','id');
    }
    public function items()
    {
    	return $this->hasMany(TransactionItem::class, 'transaction_id','id');
    }
}
