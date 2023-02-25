<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session ;

class isGuest
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
            $user = User::find(Session()->get('loginID'));

            if($user->id_user_role != 4){
                Session::flush();
                redirect('guest-page')->with('error','Tài khoản không hợp lệ! Vui lòng đăng nhập lại');
                return $next($request);

            }

        }
        return $next($request);
    }
}
