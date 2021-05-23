<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\user;
use App\Models\image;
use App\Models\event;
use App\Models\product;
use App\Models\address;

class IndexController extends Controller
{
    public function index(){
        $newProducts = product::orderBy('created_at', 'desc')->paginate(4);
        $bestProducts = product::all()->take(8);
        $events = event::where([['sdate', '<=', date('Y-m-d 23:59:59')], ['ldate', '>=', date('Y-m-d 00:00:00')]])->orderBy('sdate', 'asc')->get();
        return view('user.index', ['newProducts' => $newProducts, 'bestProducts' => $bestProducts, 'events' => $events]);
    }

    public function productDetail($id){
        $product = product::find($id);
        $images = image::where('product_id', '=', $id)->get();
        $addresses = address::where('user_id', '=', Auth::id())->get();

        return view('user.productDetail', ['product' => $product, 'images' => $images, 'addresses' => $addresses]);
    }

    public function products(Request $request, $category=null){
        $condition = array();
        if($category == null) { $category = $request->category; }

        $condition[] = ['category', '=', $category]; $request->session()->put('category', $category);

        if($request->filled('name')){ $condition[] = ['name', 'like', '%'.$request->name.'%']; session(['name' => $request->name]);}
        if($request->filled('max')){ $condition[] = ['price', '<=', $request->max]; session(['max' => $request->max]);}
        if($request->filled('min')){ $condition[] = ['price', '>=', $request->min]; session(['min'=> $request->min]);}
        if($request->filled('order')){
            switch($request->order){
                case 'asc':
                    $products = product::withTrashed()->where($condition)->orderBy('price', 'asc')->paginate(8);
                    break;
                case 'desc':
                    $products = product::withTrashed()->where($condition)->orderBy('price', 'desc')->paginate(8);
                    break;
                case 'nameOrder':
                    $products = product::withTrashed()->where($condition)->orderBy('name', 'asc')->paginate(8);
                    break;
                default:
                    $products = Product::withTrashed()->where($condition)->paginate(8);
                    break;
            }
        }
        else{
            $products = Product::withTrashed()->where($condition)->paginate(8);
        }

        return view('user.products', ['products' => $products, 'category' => $category]);
    }

    public function cart(Request $request){
        $carts = user::find(Auth::id())->cart()->join('products', 'cart.product_id', '=', 'products.id')
                                    ->select('cart.id', 'cart.product_id', 'products.name', 'products.price', 'products.sale_price', 'cart.num', 'products.image')->get();
        return view('user.cart', ['carts' => $carts]);
    }

    public function address(Request $request){
        $addresses = address::where('user_id', '=', Auth::id())->get();

        return view('user.address', ['addresses' => $addresses]);
    }
}
