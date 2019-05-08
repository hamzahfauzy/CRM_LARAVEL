<?php

namespace App\Http\Controllers\Customer;

use Auth;
use App\bag;
use App\Product;
use App\Transaction;
use App\TransactionItem;
use App\TransactionVerify;
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
        $transaction = Transaction::where('user_id',Auth::user()->id)->orderby('id','desc')->get();
        $data['transaction'] = $transaction;
        $data["i"]=0;
        return view('customer.mytransaction')->with($data);
    }
    public function add(Request $request)
    {
        $transaction = new Transaction();
        $transaction->user_id = Auth::user()->id;
        $transaction->total = '';
        $transaction->status = 1;
        $transaction->save();

        $total_item = count($request->input('product_id'));
        
        for($i=0;$i<$total_item;$i++){
            $product[$i] = Product::find($request->input('product_id')[$i]);
            $transactionItem[$i] = new TransactionItem();
            $transactionItem[$i]->product_id = $request->input('product_id')[$i];
            $transactionItem[$i]->transaction_id = $transaction->id;
            $transactionItem[$i]->jumlah = $request->input('jumlah')[$i];
            $transactionItem[$i]->sub_total = $product[$i]->harga*$request->input('jumlah')[$i];
            $transactionItem[$i]->save();

            //DELETING
            $bag[$i] = bag::find($request->input('bag_id')[$i]);
            $bag[$i]->delete();
        }
        return redirect('customer/transaction');

    }
    public function verify($id){
        $transaction = Transaction::find($id);   
        $data["transaction"] = $transaction;     
        return view('customer.upload')->with($data);
    }
    public function doverify(Request $request, $id){
        $this->validate($request, [

                'filename' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        if($request->hasfile('filename')){
                $image = $request->file('filename');             
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/bukti/', $id."_".$name);  
        }
        $verify= new TransactionVerify();
        $verify->transaction_id=$id;
        $verify->description = $request->get('description');
        $verify->file_url=$id."_".$name;
        $verify->save();
        return redirect('/customer/transaction');

    }
}
