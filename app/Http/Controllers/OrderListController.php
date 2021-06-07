<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\order_list;
use App\Models\order_product;
use App\Models\product;
use App\Models\cart;

class OrderListController extends Controller
{
    public function insert(Request $request){


        $orderList = new order_list;
        $orderList->user_id = Auth::id();
        $orderList->state = 0;
        $orderList->destination = $request->destination;
        $orderList->postcode = $request->postcode;
        $orderList->address = $request->address;
        $orderList->detailAddress = $request->detailAddress;
        $orderList->extraAddress = $request->extraAddress;
        $orderList->phone = $request->phone;
        $orderList->price = $request->price;
        $orderList->productNum = 0;
        $orderList->first_product = 'none';
        $orderList->save();

        $carts = cart::where('user_id', '=', Auth::id())->get();
        $cartfirst = cart::where('user_id', '=', Auth::id())->first();
        $productFirst = product::find($cartfirst->product_id);
        $orderList->first_product = $productFirst->name;

        foreach($carts as $cart){
            $orderProduct = new order_product;
            $orderProduct->order_list_id = $orderList->id;
            $orderProduct->product_id = $cart->product_id;
            $orderProduct->num = $cart->num;
            $orderProduct->state = 0;
            $orderProduct->comment = false;
            $orderProduct->question = false;
            $orderProduct->user_id = Auth::id();
            $product = product::find($cart->product_id);
            $orderProduct->price = $cart->num * $product->price;
            $orderList->productNum += 1;
            $orderProduct->save();
            $cart->delete();
            $cartNum = $request->session()->get('cartNum');
            if($cartNum > 1){
                $request->session()->put('cartNum', $cartNum-1);
            }
            else{
                $request->session()->forget('cartNum');
            }
        }
        $orderList->save();

        return redirect('/orderList');
    }

    public function update(Request $request){
        $orderList = order_list::find($request->order_id);

        switch($orderList->state){
            case 0: #결제완료
                $orderList->state = 1;
                break;
            case 1: #배송중
                $orderList->state = 2;
                break;
            case 2: #배송완료
                $orderList->state = 3;
                break;
            case 3: #구매확정
                break;
        }
        $orderList->save();
        return redirect(url()->previous());
    }
}
