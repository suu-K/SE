<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $email = $request->input('email');
        $name = $request->input('name');
        $pw = $request->input('password');
        $phone = $request->input('phone');
        $birth = $request->input('birth');

        user::create([
            'email' => $email,
            'name' => $name,
            'pw' => $pw,
            'phone' => $phone,
            'birth' => $birth
        ]);

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
