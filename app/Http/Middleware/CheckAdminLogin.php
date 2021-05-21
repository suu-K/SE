<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\cart;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check()){
            if(Auth::id() < 3){
                return redirect('/admin');
            }
            else{
                $cart = cart::where('user_id', '=', Auth::id())->count();
                if($cart > 0){
                    $request->session()->put('cartNum', $cart);
                }
            }

        }

        return $next($request);
    }
}
