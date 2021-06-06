<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\product;
use App\Models\event;
use App\Models\image;
use App\Models\order_list;
use App\Models\order_product;
use App\Models\question;
use App\Models\coupon;
use PDO;
use PhpOption\None;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function admin(Request $request, $sort=null){
        $condition = array();
        if($s = $request->filled('sdate')) { $condition[] = ['ldate', '>=', $request->sdate]; session(['sdate' => $request->sdate]); };
        if($l = $request->filled('ldate')) { $condition[]= ['sdate', '<=', $request->ldate]; session(['ldate' => $request->ldate]); };

        if($request->filled('order')){
            switch($request->order){
                case 'asc':
                    $events = event::withTrashed()->where($condition)->orderBy('sdate', 'asc')->paginate(10);
                    break;
                case 'desc':
                    $events = event::withTrashed()->where($condition)->orderBy('sdate', 'desc')->paginate(10);
                    break;
                default:
                    $events = event::withTrashed()->where($condition)->paginate(10);
                    break;
            }
            session(['order' => $request->order]);
        }
        else{
            $events = event::withTrashed()->where($condition)->paginate(10);
        }
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
                    $products = product::withTrashed()->where($condition)->orderBy('price', 'asc')->paginate(7);
                    break;
                case 'desc':
                    $products = product::withTrashed()->where($condition)->orderBy('price', 'desc')->paginate(7);
                    break;
                case 'nameOrder':
                    $products = product::withTrashed()->where($condition)->orderBy('name', 'asc')->paginate(7);
                    break;
                default:
                    $products = Product::withTrashed()->where($condition)->paginate(7);
                    break;
            }
        }
        else{
            $products = Product::withTrashed()->where($condition)->paginate(7);
        }
        return view('admin.admin2', ['products' => $products]);
    }

    public function admin3($id){
        $product = product::find($id);
        $images  = image::where('product_id', '=', $id)->get();
        return view('admin.admin3', ['product' => $product, 'images' => $images]);
    }

    public function eventInsert($sort=null){
        if($sort == null){
            $events = DB::table('events')->paginate(7);
        }
        else{
            $events = DB::table('events')->orderBy('sdate', $sort)->paginate(7);
        }
        return view('admin.eventEnrollment', ['events' => $events]);
    }

    public function productInsert(){
        return view('admin.productEnrollment');
    }

    public function productDetail($id){
        $product = \App\Models\product::find($id);

        return view('admin.productDetail', ['product' => $product]);
    }

    public function admin4(Request $request){
        $condition = array();
        $sales = 0;
        if($request->filled('sdate')) { $condition[] = ['order_products.created_at', '>=', $request->sdate]; session(['sdate' => $request->sdate]); };
        if($request->filled('ldate')) { $condition[] = ['order_products.created_at', '<=', date("Y-m-d", strtotime($request->ldate . " +1 days"))]; session(['ldate' => $request->ldate]); };
        $orderLists = order_product::where($condition)->join('products', 'order_products.product_id', '=', 'products.id')
                                        ->select('order_products.id', 'order_products.product_id', 'order_products.created_at', 'products.name', 'products.category', 'order_products.num', 'order_products.price', 'order_products.state', 'products.sales')->get();

        $statistics = array();
        $category = array();
        $i = 0;
        foreach($orderLists as $orderList){
            foreach($statistics as $statistic){
                if(array_key_exists($orderList->name, $statistics)){
                    $statistics[$orderList->name] = $orderList->num;
                    break;
                }
            }

            if(array_key_exists($orderList->category, $category)){
                $category[$orderList->category] += $orderList->num;
            }
            else{
                $category[$orderList->category] = $orderList->num;
            }

            $statistics[$orderList->name] = $orderList->num;
            $i += 1;
        }
        arsort($category);
        $sales = order_product::where($condition)->sum('price');
        arsort($statistics);

        $orderLists = order_product::where($condition)->join('products', 'order_products.product_id', '=', 'products.id')
        ->select('order_products.id', 'order_products.product_id', 'order_products.created_at', 'products.name', 'products.category', 'order_products.num', 'order_products.price', 'order_products.state', 'products.sales')->paginate(6);;

        return view('admin.admin4', ['orderLists' => $orderLists, 'sales' => $sales,  'category' => $category, 'statistics' => $statistics]);
    }

    public function admin5(Request $request){
        $condition = array();
        if($request->filled('sdate')) { $condition[] = ['order_products.created_at', '>=', $request->sdate]; session(['sdate' => $request->sdate]); };
        if($request->filled('ldate')) { $condition[] = ['order_products.created_at', '<=', date("Y-m-d", strtotime($request->ldate . " +1 days"))]; session(['ldate' => $request->ldate]); };
        $questions = question::where($condition)->join('order_products', 'order_products.id', '=', 'questions.order_list_id')->join('products', 'order_products.product_id', '=', 'products.id')
                        ->select('products.name', 'questions.answer', 'questions.created_at', 'questions.title', 'questions.id')->orderBy('questions.created_at', 'desc')->paginate(7);

        return view('admin.admin5', ['questions' => $questions]);
    }

    public function admin6(Request $request){

        return view('admin.admin6');
    }

    public function admin7(Request $request){
        $coupons = coupon::where('class', '=', 0)->paginate(10);

        return view('admin.admin7', ['coupons' => $coupons]);
    }

    public function admin8(Request $request){
        $coupons = coupon::where('class', '=', 1)->paginate(10);

        return view('admin.admin8', ['coupons' => $coupons]);
    }

    public function admin9(Request $request){
        return view('admin.admin9');
    }

    public function admin10(Request $request){
        return view('admin.admin10');
    }

    public function answer(Request $request, $id){
        $question = question::find($id);
        $order_product = order_product::find($question->order_list_id);
        $product = product::find($order_product->product_id);
        return view('user.answer', ['question' => $question, 'product' => $product]);
    }

    # $event->trashed() 소프트 딜리트 확인 함수
    # $events = event::withTrashed()->get() 소프트 삭제된 것도 포함되게
    # $events = event::onlyTrashed()->get() 소프트 삭제된 것만
    # $evnets->where('id', id)->restore()  복구
    # $event->forceDelete() 완전삭제
}
