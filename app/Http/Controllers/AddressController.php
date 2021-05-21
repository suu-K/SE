<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\address;

class AddressController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function insert(Request $request){
        $address = new address;

        $address->user_id = Auth::id();
        $address->destination = $request->destination;
        $address->postcode = $request->postcode;
        $address->address = $request->address;
        $address->detailAddress = $request->detailAddress;
        $address->extraAddress = $request->extraAddress;
        $address->phone = $request->phone;

        $address->save();

        return redirect('/address');
    }

    public function update(Request $request){
        $address = address::find($request->id);

        $address->destination = $request->destination;
        $address->postcode = $request->postcode;
        $address->address = $request->address;
        $address->detailAddress = $request->detailAddress;
        $address->extraAddress = $request->extraAddress;
        $address->phone = $request->phone;
        $address->save();

        return redirect('/address');
    }

    public function delete(Request $request){
        $address = address::find($request->id);
        $address->delete();

        return redirect('/address');
    }
}
