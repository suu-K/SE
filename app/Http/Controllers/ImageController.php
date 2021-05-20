<?php

namespace App\Http\Controllers;

use App\Models\image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function insert(Request $request){
        $image = new image;

        $path = $request->file('image')->store('image', 'public');

        $image->product_id = $request->product_id;
        $image->name = $request->name;
        $image->path = $request->path;

        $image->save();

        return redirect('/');
    }

    public function update(Request $request){
        $image = image::find($request->id);

        Storage::delete($request->image);

        $path = $request->file('image')->store('image', 'public');

        $image->product_id = $request->product_id;
        $image->name = $request->name;
        $image->path = $request->path;

        $image->save();

        return redirect('/admin/image');
    }

    public function delete(Request $request){
        $image = image::find($request->id);
        $image->delete();

        Storage::delete($request->image);

        return redirect('/admin');
    }
}
