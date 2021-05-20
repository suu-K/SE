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

        for($i=0;$i<count($request->id);$i++){
            $event = event::find($request->id[$i]);
            $event->title = $request->title[$i];
            $event->body = $request->body[$i];
            $event->sdate = $request->sdate[$i];
            $event->ldate = $request->ldate[$i];
            if($request->filled('image')){
                $path = $request->image[$i]->store('event', 'public');
                $event->image = $path;
            }
            $event->save();
        }

        return redirect('/admin/event');
    }

    public function delete(Request $request){
        $event = event::withTrashed()->find($request->id)->forceDelete();

        Storage::delete(url('storage/$request->image'));

        return redirect('/admin');
    }

    public function softDelete(Request $request){
        $event = event::find($request->id);
        $event->delete();

        return redirect('/admin');
    }

    public function restore(Request $request){
        $event = event::withTrashed()->find($request->id)->restore();

        return redirect('/admin');
    }


    # $event->trashed() 소프트 딜리트 확인 함수
    # $events = event::withTrashed()->get() 소프트 삭제된 것도 포함되게
    # $events = event::onlyTrashed()->get() 소프트 삭제된 것만
    # $evnets->where('id', id)->restore()  복구
    # $event->forceDelete() 완전삭제
}
