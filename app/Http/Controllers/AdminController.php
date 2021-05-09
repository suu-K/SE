<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $products = DB::table('products')->get();
        return view('admin.index', ['products' => $products]);
    }

    public function admin(){
        $products = DB::table('products')->get();
        return view('admin.admin');
    }

    public function event(){
        $products = DB::table('products')->get();
        return view('admin.event', ['products' => $products]);
    }

    public function product(){
        return view('admin.enrollment');
    }

    public function productInsert(){
        return view('admin.enrollment');
    }


}
