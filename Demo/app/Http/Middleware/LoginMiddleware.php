<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LoginMiddleware
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
        if(Auth::check() && Auth::user()->IsAdministrator()){
            // dd($request->all());
            return $next($request);
        }elseif (Auth::check()) {
            return redirect()
                    ->route('cats.index')
                    ->witherror('you do not have access!');
        }else{
            return redirect()
                    ->route('cats.index')
                    ->witherror('you do not have access!');
        }
    }
}
