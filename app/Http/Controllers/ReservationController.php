<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    //
    public function showReservationList(){
        $reserList = Reservation::all();
        return view('staff.reservation-manage.reservation-list',compact('reserList'));
    }
}
