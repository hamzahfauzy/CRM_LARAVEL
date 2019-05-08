<?php

namespace App\Http\Controllers;

use Auth;
use App\Category;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::orderby('id','desc')->take(8)->get();
        $data['products'] = $products;
        return view('home')->with($data);
    }
    
    public function logout() {
      Auth::logout();
      return redirect('/home');
    }

}
