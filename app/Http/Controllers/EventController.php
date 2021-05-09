<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index(){
        $events = DB::table('events')->get();
        return view('admin.event', ['events' => $events]);
    }

    public function insert(Request $request){
        $aff = DB::table('events')->insert([
            'title' => $request->title,
            'body' => $request->body,
            'sdate' => $request->sdate,
            'ldate' => $request->ldate,
            'image' => $request->image,
        ]);

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

        return redirect('/event');
    }
}
