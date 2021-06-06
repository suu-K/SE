<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order_list;
use App\Models\order_product;

class OrderProductController extends Controller
{
    public function update(Request $request, $id){
        $orderList = order_product::find($id);

        switch($orderList->state){
            case 0: #결제완료
                $orderList->state = 1;
                break;
            case 1: #배송중
                $orderList->state = 2;
                break;
            case 2: #배송완료
                $orderList->state = 3;
                break;
            case 3: #구매확정
                break;
        }
        $orderList->save();
        return redirect(url()->previous());
    }

    public function confirm(Request $request, $id){
        $orderList = order_product::find($id);

        $orderList->state = 3;
        $orderList->save();
        return redirect(url()->previous());
    }
}
