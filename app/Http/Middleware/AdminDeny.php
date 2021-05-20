<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminDeny
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
        $admin = false;
        if(Auth::check()){
            if(Auth::id() < 3){
                $admin = true;
            }
        }
        if($admin){
            return redirect(url()->previous());
        }
        else{
            return $next($request);
        }
    }
}
