<?php

namespace App\Http\Controllers\Admin;

use Auth;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $category = Category::latest()->get();
        $data["category"] = $category;
        $data["i"]=0;
        $data["msg"] = false;
        return view('admin.category.index')->with($data);
    }

    public function add(){
        return view('admin.category.form');
    }

    public function store(Request $request)
    {
        $category = new Category([
            'nama' => $request->get('nama'),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
        $category->save();
        $data["msg"] = true;
        $data["status"] = 'success';
        $data["message"] = 'Adding "'.$request->get('nama').'" is Successfully.';
        return redirect('/admin/category/data')->with($data);
    }

    public function edit($id){
        $category = Category::find($id);
        $data["category"] = $category;
        return view('admin.category.form-edit')->with($data);
    }
    public function update(Request $request, $id){
        $category = Category::find($id);
        $category->nama = $request->nama;
        $category->updated_at =  date("Y-m-d H:i:s");
        $category->save();
        $data["msg"] = true;
        $data["status"] = 'success';
        $data["message"] = 'Success save to "'.$request->get('nama').'".';
        return redirect('/admin/category/data')->with($data);

    }
    public function delete($id){
        $category = Category::find($id);
        $category->delete();
        $data["msg"] = true;
        $data["status"] = 'info';
        $data["message"] = '"'.$category->nama.'" has been removed.';
        return redirect('admin/category/data')->with($data);
    }
}
