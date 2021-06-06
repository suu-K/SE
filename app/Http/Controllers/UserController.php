<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\orderList;
use Illuminate\Http\Request;


class UserController extends Controller
{
    public function index(){
        return view('user.login');
    }

    public function index2(){
        return view('user.signup');
    }

    public function login(Request $request){

        $users = user::all();


        $email = $request->email;
        $pw = $request->pw;

        return $users[0]->email;

    }

    public function signup(Request $request){
        $user = new user;
        $email = $request->input('email');
        $name = $request->input('name');
        $password = $request->input('password');
        $phone = $request->input('phone');
        $birth = $request->input('birth');

        $user->email = $email;
        $user->name = $name;
        $user->password = $password;
        $user->phone = $phone;
        $user->birth = $birth;
        $user->save();

        return redirect('/');
    }

    public function idcheck(Request $request){
        $email = $request->input('email');

        $user = user::where('email', '=', $email)->count();
        if($user > 0){
            return response()->json(['result' => true]);
        }
        else{
            return response()->json(['result' => false]);
        }
    }


}
