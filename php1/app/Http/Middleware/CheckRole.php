<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(Auth::user()->role != $role) {
            return redirect()->back()->with('message', 'Bạn không có quyền hạn để thực hiện hành động');
        }
        return $next($request);
    }
}
