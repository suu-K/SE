<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;

class CartController extends Controller
{

    public function insert(Request $request){

        $cart = new cart;

        $cart->user_id = Auth::id();
        $cart->product_id = $request->product_id;
        $cart->num = $request->num;

        $cart->save();


        #$request->session()->push('cart', [$request->product_id, $request->num]);
        if($request->session()->has('cartNum')){
            $request->session()->put('cartNum', $request->session()->get('cartNum')+1);
        }
        else{
            $request->session()->put('cartNum', 1);
        }

        return redirect()->back();
    }

    public function update(Request $request){
        $aff = DB::table('carts')->where('id', $request->id)->update([
            'num' => $request->num
        ]);

        return redirect('/admin/cart');
    }

    public function delete(Request $request){
        /*
        $id = $request->product_id;
        $cart = $request->session()->get('cart');
        $newCart = array();
        $cartNum = $request->session()->get('cartNum');

        #삭제 목적인 원소만 제거된 새로운 배열
        foreach($cart as $p){
            if($p[0] == $id) { continue; }
            else{
                $newCart[] = $p;
            }
        }

        $request->session()->put('cart', $newCart);
        */


        $cart = cart::find($request->id);
        $cart->delete();


        $cartNum = $request->session()->get('cartNum');
        if($cartNum > 1){
            $request->session()->put('cartNum', $cartNum-1);
        }
        else{
            $request->session()->forget('cartNum');
        }


        return redirect('/cart');
    }
}
