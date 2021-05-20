<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product;
use App\Models\event;
use App\Models\image;
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

    public function admin(Request $request){
        $condition = array();
        if($request->filled('sdate')) { $condition[] = ['sdate', '>=', $request->sdate]; session(['sdate' => $request->sdate]); }
        if($request->filled('ldate')) { $condition[] = ['ldate', '<=', $request->ldate]; session(['ldate' => $request->ldate]); }
        $events = event::withTrashed()->where($condition)->paginate(10);
        return view('admin.admin', ['events' => $events]);
    }

    public function admin2(Request $request){
        $condition = array();
        if($request->filled('name')){ $condition[] = ['name', 'like', '%'.$request->name.'%']; session(['name' => $request->name]); }
        if($request->filled('max')){ $condition[] = ['price', '<=', $request->max]; session(['max' => $request->max]); }
        if($request->filled('min')){ $condition[] = ['price', '>=', $request->min]; session(['min' => $request->min]);}
        if($request->filled('order')){
            session(['order' => $request->order]);
            $order = request('order', 'none');
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
        }
        else{
            $products = Product::where($condition)->paginate(7);
        }
        return view('admin.admin2', ['products' => $products]);
    }

    public function admin3($id){
        $product = product::find($id);
        $images  = image::where('product_id', '=', $id)->get();
        return view('admin.admin3', ['product' => $product, 'images' => $images]);
    }
/*
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
    */

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
