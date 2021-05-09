<?php

namespace App\Http\Controllers;

use App\Models\event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    public function insert(Request $request){
        $event = new event;

        $path = $request->file('image')->store('event', 'public');

        $event->title = $request->title;
        $event->body = $request->body;
        $event->sdate = $request->sdate;
        $event->ldate = $request->ldate;
        $event->image = $path;

        $event->save();

        return redirect('/');
    }

    public function update(Request $request){
        $aff = DB::table('products')->where('id', $request->id)->update([
            'title' => $request->title,
            'body' => $request->body,
            'sdate' => $request->sdate,
            'ldate' => $request->ldate,
            'image' => $request->image
        ]);

        return redirect('/admin/event');
    }

    public function delete(Request $request){
        $product = event::find($request->id);
        $product->delete();

        Storage::delete($request->image);

        return redirect('/admin');
    }
}
