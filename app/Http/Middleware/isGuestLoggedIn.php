<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isGuestLoggedIn
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Session()->has('loginID')){
            redirect()->route('guest-page')->with('error','Vui lòng đăng nhập lại!');
        return $next($request);

        }
        return $next($request);
    }
}
