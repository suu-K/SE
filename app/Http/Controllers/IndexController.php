<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use App\Models\product;

class IndexController extends Controller
{
    public function index(){
        $products = DB::table('products')->get();
        return view('user.index', ['products' => $products]);
    }

    public function productDetail($id){
        $product = DB::table('products')->find($id);

        return view('user.productDetail', ['product' => $product]);
    }

    public function products($category){
        $products = DB::table('products')->where('category', $category)->get();

        return view('user.products', ['products' => $products]);
    }

    public function cart(Request $request){
        $carts = user::find(Auth::id())->cart()->join('products', 'cart.product_id', '=', 'products.id')
                                    ->select('cart.id', 'products.name', 'products.price', 'products.sale_price', 'cart.num')->get();
        /*
        $cart = $request->session()->get('cart');
        $carts = array();
        if($cart != null){
            foreach($cart as $p){
                $product = product::find($p[0]);
                $carts[] = array(
                    'product' => $product,
                    'num' => $p[1],
                    'product_id' => $p[0]
                );
            }
        }
        */
        return view('user.cart', ['carts' => $carts]);
    }

}
