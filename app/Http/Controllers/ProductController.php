<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\image;
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
        $product->save();

        $images = $request->images;
        $first = true;
        foreach($images as $image){
            $ima = new image;
            $path = $image->store('image', 'public');
            $ima->product_id = $product->id;
            $ima->url = $path;
            if($first){
                $product->image = $path;
                $product->save();
                $first=false;
            }
            $ima->save();
        }

        return redirect('/admin2');
    }

    public function update(Request $request){
        $product = product::find($request->id)->update([
            'name' => $request->name,
            'price' => $request->price,
            'sale_price' => $request->sale_price,
            'caption' => $request->caption,
            'num' => $request->num
        ]);
        if($request->image != null){
            $images = image::where('product_id', '=', $request->id)->get();
            foreach($images as $image){
                Storage::delete(url("storage/$image->url"));
                $image->delete();
            }

            $newImages = $request->file('image');

            foreach($newImages as $image){
                $ima = new image;
                $path = $image->store('image', 'public');
                $ima->imageable_id = $product->id;
                $ima->imageable_type = 'product';
                $ima->url = $path;
                $image->save();
            }
        }

        return redirect("/admin3/$request->id");
    }

    public function delete(Request $request){
        $product = Product::find($request->id);
        $images = image::where('product_id', '=', $request->id)->get();
        foreach($images as $image){
            Storage::disk('public')->delete($image->url);
            $image->delete();
        }

        $product->forceDelete();
        return redirect(url()->previous());
    }

    public function softDelete(Request $request){
        $product = product::find($request->id);
        $product->delete();

        return redirect(url()->previous());
    }

    public function restore(Request $request){
        $product = product::withTrashed()->find($request->id)->restore();

        return redirect(url()->previous());
    }

}
