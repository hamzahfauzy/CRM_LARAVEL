<?php

namespace App\Http\Controllers\Customer;

use Auth;
use App\bag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BagController extends Controller
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
        $bag = bag::where('user_id',Auth::user()->id)->orderby('id','desc')->get();
        $data['mybag'] = $bag;
        return view('customer.mybag')->with($data);
    }
    public function add(Request $request, $id)
    {
        $bags = bag::where('product_id',$id)->where('user_id', Auth::user()->id)->first();
        if(!$bags){
            $bag = new bag();
            $bag->user_id = Auth::user()->id;
            $bag->product_id = $id;
            $bag->jumlah = $request->jumlah;
            $bag->save();
            return redirect('customer/bag');
        }else{
            $bags->jumlah += $request->jumlah;
            $bags->save();
            return redirect('customer/bag');
        }
    }
    public function delete($id)
    {
        $bag = bag::find($id);
        $bag->delete();
        return redirect('customer/bag');
    }
    
}
