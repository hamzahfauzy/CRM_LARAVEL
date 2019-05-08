<?php

namespace App\Http\Controllers\Admin;

use Auth;

use App\Category;
use App\Product;
use App\ProductImage;
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
        $this->middleware('admin');
        date_default_timezone_set("Asia/Jakarta");
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = Product::latest()->get();
        $data["product"] = $product;
        $data["i"]=0;
        $data["msg"] = false;
        return view('admin.product.index')->with($data);
    }

    public function add(){
        $category = Category::orderby('nama','asc')->get();   
        $data["category"] = $category;     
        return view('admin.product.form')->with($data);
    }
    public function store(Request $request)
    {
        $product = new Product();
        $product->nama = $request->get('nama');
        $product->harga = $request->get('harga');
        $product->stok = $request->get('stok');
        $product->category_id = $request->get('category');
        $product->created_at = date("Y-m-d H:i:s");
        $product->updated_at = date("Y-m-d H:i:s");
        $product->save();
        $data["msg"] = true;
        $data["status"] = 'success';
        $data["message"] = 'Adding "'.$request->get('nama').'" is Successfully.';
        return redirect('/admin/product/data')->with($data);
    }

    public function upload($id){
        $category = Category::orderby('nama','asc')->get();   
        $data["id_product"] = $id;     
        return view('admin.product.upload')->with($data);
    }
    public function uploading(Request $request, $id){
        $this->validate($request, [

                'filename' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
        if($request->hasfile('filename')){
                $image = $request->file('filename');             
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
        }
        $productImage= new ProductImage();
        $productImage->product_id=$id;
        $productImage->file_url=$name;
        $productImage->created_at = date("Y-m-d H:i:s");
        $productImage->updated_at = date("Y-m-d H:i:s");
        $productImage->save();
        $data["msg"] = true;
        $data["status"] = 'success';
        $data["message"] = 'Success upload '.$name.'.';
        return redirect('/admin/product/data')->with($data);

    }

    public function edit($id){
        $category = Category::orderby('nama','asc')->get();   
        $product = Product::find($id);
        $data["category"] = $category;     
        $data["product"] = $product;
        return view('admin.product.form-edit')->with($data);
    }
    public function update(Request $request, $id){
        $product = Product::find($id);
        $product->nama = $request->nama;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->updated_at =  date("Y-m-d H:i:s");
        $product->save();
        $data["msg"] = true;
        $data["status"] = 'success';
        $data["message"] = 'Success save to "'.$request->get('nama').'".';
        return redirect('/admin/product/data')->with($data);
    }
    public function delete($id){
        $product = Product::find($id);
        $product->delete();
        $data["msg"] = true;
        $data["status"] = 'info';
        $data["message"] = '"'.$product->nama.'" has been removed.';
        return redirect('admin/product/data')->with($data);
    }
}
