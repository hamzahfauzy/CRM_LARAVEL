<?php

namespace App\Http\Controllers\Admin;

use Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $customer = User::where('level','user')->orderby('nama','asc')->get();
        $data["customer"] = $customer;
        $data["i"]=0;
        $data["msg"] = false;
        return view('admin.customer.index')->with($data);
    }

}
