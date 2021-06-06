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
use App\Models\comment;
use App\Models\order_list;
use App\Models\order_product;
use App\Models\question;
use App\Models\coupon;

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
        $address = address::where('user_id', '=', Auth::id());
        $comments = comment::where('product_id', '=', $id)->paginate(10);
        $average = null;
        if($comments != null){
            $average = comment::where('product_id', '=', $id)->avg('rating');
        }

        if($address->where('def', '=', 1)->count() > 0){
            $default = $address->where('def', '=', 1)->first();
            $addresses = address::where('user_id', '=', Auth::id())->get();
        }else{
            $default = null;
            $addresses = address::where('user_id', '=', Auth::id())->take(3)->get();
        }

        return view('user.productDetail', ['product' => $product, 'images' => $images, 'addresses' => $addresses, 'default' => $default, 'comments' => $comments, 'average' => $average]);
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
                case 'new':
                    $products = product::withTrashed()->where($condition)->orderBy('created_at', 'desc')->paginate(8);
                    break;
                default:
                    $products = Product::withTrashed()->where($condition)->paginate(8);
                    break;
            }
            session(['order' => $request->order]);
        }
        else{
            $products = Product::withTrashed()->where($condition)->paginate(8);
        }

        return view('user.products', ['products' => $products, 'category' => $category]);
    }

    public function eventSebu(Request $request, $id){
        $event = event::find($id);

        return view('user.eventSebu', ['event' => $event]);
    }

    public function cart(Request $request){
        $carts = user::find(Auth::id())->cart()->join('products', 'cart.product_id', '=', 'products.id')
                                    ->select('cart.id', 'cart.product_id', 'products.name', 'products.price', 'products.sale_price', 'cart.num', 'products.image', 'products.delivery')->get();

        return view('user.cart', ['carts' => $carts]);
    }

    public function address(Request $request){
        $addresses = address::where('user_id', '=', Auth::id())->get();

        return view('user.address', ['addresses' => $addresses]);
    }

    public function payment(Request $request){
        $carts = user::find(Auth::id())->cart()->join('products', 'cart.product_id', '=', 'products.id')
                                    ->select('cart.id', 'cart.product_id', 'products.name', 'products.price', 'products.sale_price', 'cart.num', 'products.delivery')->get();

        $address = address::where('user_id', '=', Auth::id());
        if($address->where('def', '=', 1)->count() > 0){
            $default = $address->where('def', '=', 1)->first();
            $addresses = address::where('user_id', '=', Auth::id())->get();
        }else{
            $default = null;
            $addresses = address::where('user_id', '=', Auth::id())->take(3)->get();
        }

        return view('user.pay', ['carts' => $carts, 'addresses' => $addresses, 'default' => $default]);
    }

    public function payment2(Request $request){
        $carts = product::find($request->product_id);

        $address = address::where('user_id', '=', Auth::id());
        if($address->where('def', '=', 1)->count() > 0){
            $default = $address->where('def', '=', 1)->first();
            $addresses = address::where('user_id', '=', Auth::id())->get();
        }else{
            $default = null;
            $addresses = address::where('user_id', '=', Auth::id())->take(3)->get();
        }

        return view('user.pay', ['carts' => $carts, 'addresses' => $addresses, 'default' => $default]);
    }


    public function orderList(Request $request){
        $orderLists = order_product::where('user_id', '=', Auth::id())->join('products', 'order_products.product_id', '=', 'products.id')
                                        ->select('order_products.id', 'order_products.product_id', 'order_products.question', 'order_products.comment', 'products.name', 'order_products.created_at', 'order_products.price', 'order_products.state')->orderBy('created_at', 'desc')->paginate(10);

        return view('user.orderList', ['orderLists' => $orderLists]);
    }

    public function ordersebu(Request $request, $id){
        $orderProduct = order_product::find($id);
        $orderList = order_list::find($orderProduct->order_list_id);

        return view('user.ordersebu', ['orderProduct' => $orderProduct, 'orderList' => $orderList]);
    }

    public function coupon(){
        #$coupons = coupon::where('user_id', '=', Auth::id())->get();
        $coupons = null;
        return view('user.coupon', ['coupons' => $coupons]);
    }

    public function review(Request $request, $id, $product_id){
        return view('user.review', ['id' => $id, 'product_id' => $product_id]);
    }

    public function question($id){
        return view('user.question', ['id' => $id]);
    }

    public function questionlist(){
        $questions = question::where('user_id', '=', Auth::id())->orderBy('created_at', 'desc')->paginate(10);
        return view('user.questlist', ['questions' => $questions]);
    }

    public function questcontent(Request $request, $id){
        $question = question::find($id);
        $order_product = order_product::find($question->order_list_id);
        $product = product::find($order_product->product_id);
        return view('user.questcontent', ['question' => $question, 'product' => $product]);
    }
}
