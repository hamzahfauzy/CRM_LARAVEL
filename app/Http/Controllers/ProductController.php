<?php

namespace App\Http\Controllers;

use Auth;
use App\Category;
use App\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
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
        $category = Category::orderby('nama','asc')->get();
        $products = Product::orderby('id','desc')->get();
        $data['selected'] = 'all';
        $data['category'] = $category;
        $data['products'] = $products;
        return view('category')->with($data);
    }
    public function category($id)
    {
        $cat = Category::find($id);
        $category = Category::orderby('nama','asc')->get();
        $products = Product::where('category_id',$id)->orderby('id','desc')->get();
        $data['selected'] = $cat->id;
        $data['category'] = $category;
        $data['products'] = $products;
        return view('category')->with($data);
    }
    public function view($id)
    {
        $product = Product::find($id);
        $data['product'] = $product;
        return view('single-product')->with($data);
    }
    
}
