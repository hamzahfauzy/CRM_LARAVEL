<?php

namespace App\Http\Controllers\Admin;

use Auth;
use App\bag;
use App\Product;
use App\Transaction;
use App\TransactionItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $transaction = Transaction::orderby('id','desc')->get();
        $data['transaction'] = $transaction;
        $data["i"]=0;
        return view('admin.transaction')->with($data);
    }
    public function payments()
    {
        $transaction = Transaction::where('status',2)->orderby('id','desc')->get();
        $data['transaction'] = $transaction;
        $data["i"]=0;
        return view('admin.transactionpayments')->with($data);
    }
    public function status($id,$val)
    {
        $total = 0;
        $transaction = Transaction::find($id);
        foreach ($transaction->items as $item) {
            if($val==2){
                $product = "";
                $product = Product::find($item->product->id);
                $product->stok -= $item->jumlah;
                $product->save();
            }
            $total += $item->sub_total;
        }

        $transaction->total = $total;
        $transaction->status = $val;
        $transaction->save();

        return redirect('admin/transaction/data');

    }

}
