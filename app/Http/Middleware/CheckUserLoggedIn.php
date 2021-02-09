<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->check()){
        //   dd(1);
            return $next($request);
        }else{
            return redirect()->route('login')->with('message','Session Expired');
        }

    }
}