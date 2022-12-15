<?php

namespace App\Http\Middleware;

use App\Models\Table;
use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class checkReservation
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
        $time = Carbon::now()->subHour(1);
        $tables = Table::all();
        foreach ($tables as $tb){
            foreach ($tb->hasReservation as $tbReservation){

                if( $tbReservation->reservation_time >=$time && $tbReservation->reservation_time > $time && $tb->status == 0 && $tbReservation->status == 1){
                        $tb->update([
                            'status' => 3,
                        ]);
                        Session::put('notification','Có đơn đặt bàn ở bàn '.$tb->code);
                }elseif( $tb->status == 3){
                    $tb->update([
                        'status' => 0,
                    ]);
                }
            }
        }
        return $next($request);
    }
}
