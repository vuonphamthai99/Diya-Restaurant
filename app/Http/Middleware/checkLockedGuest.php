<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class checkLockedGuest
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
        if(Session()->has('loginID')){
            $user =  User::find(Session()->get('loginID'));
            if($user->status == 1){
                Session::flush();
                return redirect()->back()->with('error','Tài khoản đã bị khóa! Vui lòng liên hệ nhân viên');
            }

        }
        return $next($request);
    }
}
