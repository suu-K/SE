<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(){
        $products = DB::table('products')->get();
        return view('user.index', ['products' => $products]);
    }


}
