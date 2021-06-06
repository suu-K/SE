<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\comment;
use App\Models\order_product;

class CommentController extends Controller
{
    public function insert(Request $request, $id){
        $comment = new comment;

        $comment->user_id = Auth::id();
        $comment->product_id = $request->product_id;
        $comment->speed = $request->speed;
        $comment->recommend = $request->recommend;
        $comment->rating = $request->rating;
        $comment->evaluation = $request->evaluation;
        $comment->save();
        $orderProduct = order_product::find($id);
        $orderProduct->comment = true;
        $orderProduct->save();
        return "상품평 등록이 완료되었습니다. 창을 닫아주세요";
    }

    public function update(Request $request){
        $comment = comment::find($request->id);

        $comment->recommend = $request->recommend;
        $comment->rating = $request->rating;
        $comment->evaluation = $request->evaluation;
        $comment->save();

        return redirect(url()->previous());
    }

    public function delete(Request $request){
        $comment = comment::find($request->id);
        $comment->delete();

        return redirect(url()->previous());
    }
}
