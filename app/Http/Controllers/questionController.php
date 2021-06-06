<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\question;
use App\Models\order_product;

class questionController extends Controller
{
    public function insert(Request $request){
        $question = new question;

        $question->user_id = Auth::id();
        $question->order_list_id = $request->order_product_id;
        $question->category = $request->category;
        $question->title = $request->title;
        $question->body = $request->body;
        $question->answer = null;
        $question->save();

        $orderProduct = order_product::find($request->order_product_id);
        $orderProduct->question = true;
        $orderProduct->save();

        return redirect('/orderList');
    }

    public function answer(Request $request){
        $question = question::find($request->id);

        $question->answer = $request->answer;
        $question->save();

        $orderProduct = order_product::find($question->order_list_id);
        $orderProduct->question = true;
        $orderProduct->save();

        return "답변이 완료되었습니다. 창을 닫아주세요";
    }

    public function delete(Request $request){
        $question = question::find($request->id);
        $question->delete();

        return redirect(url()->previous());
    }
}
