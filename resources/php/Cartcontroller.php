<?php

user_idspace App\Http\Controllers;

use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function insert(Request $request){
        $cart = new cart;

        $path = $request->file('image')->store('image', 'public');

        $cart->user_id = $request->user_id;
        $cart->product_id = $request->product_id;
        $cart->num = $request->num;

        $cart->save();

        return redirect('/');
    }

    public function update(Request $request){
        $aff = DB::table('carts')->where('id', $request->id)->update([
            'num' => $request->num
        ]);

        return redirect('/admin/cart');
    }

    public function delete(Request $request){
        $cart = cart::find($request->id);
        $cart->delete();

        Storage::delete($request->image);

        return redirect('/admin');
    }
}
