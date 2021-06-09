<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\coupon;

class couponController extends Controller
{
    /public function insert(Request $request){
        $coupon = new coupon;

        $validate = $request->validate([
            'title' => 'required',
            'body' => 'required',
        ]);
        $image = $request->image;
        $path = $image->store('event', 'public');
        $event->image = $path;
        $event->title = $request->title;
        $event->body = $request->body;
        $event->sdate = $request->sdate;
        $event->ldate = $request->ldate;

        $event->save();

        return redirect('/admin/event');
    }

    public function update(Request $request){
        $event = event::find($request->id);
        $event->title = $request->title;
        $event->body = $request->body;
        $event->sdate = $request->sdate;
        $event->ldate = $request->ldate;

        if($request->has('image')){
            Storage::disk('public')->delete($event->image);
            $image = $request->image;
            $path = $image->store('event', 'public');
            $event->image = $path;
        }

        $event->save();

        return redirect(url()->previous());
    }
}
