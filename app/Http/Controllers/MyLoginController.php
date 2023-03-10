<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Carbon;

class MyLoginController extends Controller
{
    public function showDashboard(){

        if(Session()->has('loginID')){
            $user = User::find(Session()->get('loginID'));
            $order = Order::where('Status',1)->where('finish_date','>',Carbon::now()->subDays(7))->get();
            $sale = 0;
           foreach($order as $od){
            $od->sale = 0;
            foreach($od->hasDetail as $dt){
                $sale+= $dt->ofMenu->price* $dt->quantity;
                $od->sale += $dt->ofMenu->price* $dt->quantity;
            }
           }
           $customer = User::where('id_user_role',4)->get()->count();
           $order_quantity = $order->count();

            return view('staff.dashboard',compact('user','sale','order_quantity','customer','order'));
        }else{
            return redirect()->route('showLogin')->with('fail','Bạn chưa đăng nhập! Hãy đăng nhập để bắt đầu làm việc.');
        }
    }
    public function showLogin(){
        if(Session::has('loginID')){
            return redirect()->route('showDashboard')->with('fail','Bạn đã đăng nhập, hãy đăng xuất để kết thúc phiên làm việc');
        }
        else return view('login');
    }
    public function authCheck(Request $request){
        $request->validate([
            'phone'=>'required|numeric|min:10',
            'password'=>'required|min:7'
        ],[
            'phone.required'=>'SĐT không được để trống',
            'phone.numeric'=>'SĐT chưa đúng định dạng',
            'phone.min'=>'SĐT chưa đúng định dạng',
            'password.required'=>'Mật khẩu không được để trống',
            'password.min'=>'Mật khẩu ít nhất 8 ký tự',
        ]);
        $user = User::where('phone','=',$request->phone)->first();

        if($user){
            if(Hash::check($request->password,$user->password)){
                $request->session()->put('user',$user);
                $request->session()->put('loginID',$user->id);
                $request->session()->put('role',$user->id_user_role);
                $request->session()->put('UserName',$user->name);
                $request->session()->put('UserRole',$user->hasRole->user_role);
                return redirect()->route('showDashboard');
            }else{

                return back()->with('fail','Mật khẩu không đúng! Hãy thử lại');
            }
        }

        else{
            return back()->with('fail','SĐT hoặc mật khẩu không đúng! Hãy thử lại');
        }
    }

    public function logout(){
        if(Session::has('loginID')){
            Session::pull('loginID');
            return redirect()->route('showLogin');
        }
    }
}
