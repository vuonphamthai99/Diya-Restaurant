<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class GuestController extends Controller
{
    public function index(){
        $types = Type::all();
        return view("customer.customer-home",compact('types'));
    }

    public function bookTable(Request $request){
        $dateTime = Carbon::parse($request->date);
        Reservation::create([
            'created_at' =>now(),
            'reservation_time' =>$dateTime,
            'reservation_hour' =>$request->time,
            'no_of_people' =>$request->people,
            'customer_name' =>$request->name,
            'customer_email' =>$request->email,
            'customer_phone' =>$request->phone,
            'message' => $request->message,
            'status' => 'Chờ'
        ]);
        return redirect()->back()->with('success','Đặt bàn thành công, hãy chờ nhân viên xác nhận và liên lạc!');
    }
}
