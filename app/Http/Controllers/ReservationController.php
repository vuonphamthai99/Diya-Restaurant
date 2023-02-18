<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class ReservationController extends Controller
{
    //
    public function showReservationList(){
        $reserList = Reservation::all();
        return view('staff.reservation-manage.reservation-list',compact('reserList'));
    }

    public function bookTable(Request $request){
        if(!Session::has('loginID')){
            return redirect()->back()->with('error','Vui lòng đăng nhập để đặt bàn!');
        }

        $dateTime = Carbon::parse($request->date.$request->time);
        $request->validate([
            'time' => 'required',
            'time' => 'required',
            'people' => 'required|numeric',

        ],[
            'reservation_time.required' => 'Vui lòng chọn ngày đặt bàn!',
            'reservation_hour.required' => 'Vui lòng chọn giờ đặt bàn!',
            'people.required' => 'Vui lòng chọn số người!',
            'people.numeric' => 'Số người không hợp lệ'
        ]);
        if($dateTime < now()){
        return redirect()->back()->with('error','Thời gian đặt không hợp lệ');
        }
        Reservation::create([
            'created_at' =>now(),
            'reservation_time' =>$dateTime,
            'people' =>$request->people,
            'customer_id' =>Session::get('loginID'),
            'message' => $request->message,
            'status' => 0,
        ]);
        return redirect()->back()->with('success','Đặt bàn thành công');
    }
    //----------------------------------------------------------------
    //Guest user

    public function GuestReservation(){
        $reservations = Reservation::where('customer_id',Session::get('loginID'))->get();
        return view('customer.reservation.reservation-list',compact('reservations'));
    }
    public function confirmReservation($idReservation){
        $rsv = Reservation::find($idReservation);
        $table = Table::where('capacity','>',$rsv->peole-1)->first();
        $rsv->update([
            'user)confirmed_id' => Session::get('loginID'),
            'table_preserve_id' => $table->id,
            'status' => 1,
        ]);
        return redirect()->back()->with('success','Xác nhận yêu cầu đặt bàn thành công');
    }
    public function cancelReservation($idReservation){
        $rsv = Reservation::find($idReservation);
        $rsv->update([
            'user)confirmed_id' => Session::get('loginID'),

            'status' => 2,
        ]);
        return redirect()->back()->with('success','Xác nhận yêu cầu đặt bàn thành công');
    }
    public function deleteReservation($idReservation){
        try{
            $rsv = Reservation::find($idReservation)->delete();
            return redirect()->back()->with('success','Xóa yêu cầu đặt bàn thành công');

        }catch(QueryException $e)
        {
            return redirect()->back()->with('error','Xóa yêu cầu đặt bàn không thành công');

        }


    }
}
