<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function insert(Request $request){
        $product = new product;

        $validate = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required'
        ]);



        $path = $request->file('image')->store('image', 'public');

        $product->name = $request->name;
        $product->price = $request->price;
        if($request->sale_price == null){
            $product->sale_price = $request->price;
        }
        else{
            $product->sale_price = $request->sale_price;
        }
        $product->caption = $request->caption;
        $product->num = $request->num;
        $product->category = $request->category;
        $product->image = $path;

        $product->save();

        return redirect('/admin2');
    }

    public function update(Request $request){
        $aff = DB::table('products')->where('id', $request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'caption' => $request->caption,
            'num' => $request->num
        ]);

        return redirect('/admin2');
    }

    public function delete(Request $request){
        $product = Product::find($request->id);
        $product->delete();

        Storage::delete(url("storage/$request->image"));

        return redirect('/admin2');
    }
}
