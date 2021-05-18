<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product;
use App\Models\event;
use PhpOption\None;

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
        $events = event::withTrashed()->paginate(10);
        return view('admin.admin', ['events' => $events]);
    }

    public function admin2(){
        $products = DB::table('products')->paginate(7);
        return view('admin.admin2', ['products' => $products]);
    }

    public function admin2Search(Request $request){
        $name = request('name', '');
        $max = request('max');
        $min = request('min');
        $order = request('order', 'none');

        $condition = array();
        if($request->filled('name')){ $condition[] = ['name', 'like', '%'.$request->name.'%']; }
        if($request->filled('max')){ $condition[] = ['price', '<=', $request->max]; }
        if($request->filled('min')){ $condition[] = ['price', '>=', $request->min]; }
        switch($order){
            case 'asc':
                $products = product::where($condition)->orderBy('price', 'asc')->paginate(7);
                break;
            case 'desc':
                $products = product::where($condition)->orderBy('price', 'desc')->paginate(7);
                break;
            case 'nameOrder':
                $products = product::where($condition)->orderBy('name', 'asc')->paginate(7);
                break;
            default:
                $products = Product::where($condition)->paginate(7);
                break;
        }

        session([
            'name' => $name,
            'max' => $max,
            'min' => $min,
            'order' => $order
        ]);
        return view('admin.admin2', ['products' => $products]);
    }

    public function eventInsert(){
        $events = DB::table('events')->paginate(5);
        return view('admin.eventEnrollment', ['events' => $events]);
    }

    public function productInsert(){
        return view('admin.productEnrollment');
    }

    public function productDetail($id){
        $product = \App\Models\product::find($id);

        return view('admin.productDetail', ['product' => $product]);
    }
}
