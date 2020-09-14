<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AccCheck
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

        if (Auth::check()){
            if (Auth::user()->account_status != 1)
            {
                return $next($request);
            }else{
                Auth::guard('web')->logout();
                return redirect(route('login'))->with('ac_ac_error','Your account is not active');
            }
        }


    }
}
