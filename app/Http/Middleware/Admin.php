<?php

namespace App\Http\Middleware;

use Closure;
//libreria auth
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class Admin
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
        if(!Auth::user()->admin)
        {
            Session::flash('info','You do no have permissions');

            return redirect()->back();
        }

        return $next($request);
    }
}
