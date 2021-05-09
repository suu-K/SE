<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
            if(Auth::id() < 5){
                $admin = true;
            }
        }
        if($admin){
            return $next($request);
        }
        else{
            return redirect('/');
        }
    }
}
