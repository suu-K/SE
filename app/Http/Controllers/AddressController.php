<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use app\Models\address;

class AddressController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function insert(Request $request){
        $address = new address;

        $address->user_id = $request->user_id;
        $address->zip_code = $request->zip_code;
        $address->address = $request->address;
        $address->detailed_address = $request->detailed_address;

        $address->save();

        return redirect('/');
    }

    public function update(Request $request){
        $aff = DB::table('address')->where('id', $request->id)->update([
            'zip_code' => $request->zip_code,
            'address' => $request->address,
            'detailed_address' => $request->detailed_address,
        ]);

        return redirect('/admin/address');
    }

    public function delete(Request $request){
        $address = address::find($request->id);
        $address->delete();

        return redirect('/admin');
    }
}
