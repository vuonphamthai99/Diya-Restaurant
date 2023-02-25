<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class GuestController extends Controller
{
    public function index(){
        $types = Type::all();
        return view("customer.customer-home",compact('types'));
    }



    public function registerGuest(Request $request){
        $request->validate([
            'email' => 'unique:Users|email',
            'phone' => ['required','unique:Users','regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
            'password' => 'min:8|confirmed'
        ],[
            'email.unique' => 'Email đã tồn tại',
            'phone.unique' => 'Số điện thoại đã được dùng',
            'phone.regex' => 'Số điện thoại không đúng định dạng',
            'password.min' => 'Mật khẩu có ít nhất 8 ký tự',
            'password.confirmed' => 'Xác nhận mật khẩu không đúng',
        ]);

    if(User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => Hash::make( $request->password),
        'id_user_role' => 4,
    ])){
        return redirect()->route('guest-page')->with([
            'success'=>'Đăng ký thành công! Vui lòng đăng nhập lại',
            'registerSuccess' => 'Đăng ký thành công! Vui lòng đăng nhập lại'
        ]);
    }
    else return redirect()->route('guest-page')->with([
        'error'=>'Đăng ký không thành công!',
        'RegisterError' => 'Đăng ký không thành công!'
    ]);
    }

    public function loginGuest(Request $request){

        $request->validate([
            'phone'=>['required','regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
            'password'=>'required|min:8'
        ],[
            'phone.required'=>'SĐT không được để trống',
            'phone.regex'=>'SĐT chưa đúng định dạng',
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

                return redirect()->route('guest-page')->with('success','Đăng nhập thành công!');
            }else{
                return back()->with('error','Mật khẩu không đúng! Hãy thử lại');
            }
        }

        else{
            return back()->with('error','SĐT hoặc mật khẩu không đúng! Hãy thử lại');
        }
    }

    public function logoutGuest(){
        Session::flush();
        return redirect()->route('guest-page');
    }


    // Account Management
    public function showAccountInfo(){
        $customer = User::find(Session::get('loginID'));
        return view('customer.account.account-info',compact('customer'));
    }
    public function editAccount(Request $request){
        $request->validate([
            'phone' => ['regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/','unique:users,phone,'.Session::get('loginID')],
            'email' => 'email',
        ],[
            'phone.regex' => 'Số điện thoại không đúng định dạng',
            'phone.unique' => 'Số điện thoại đã được dùng',
            'email.email' => 'Email không đúng định dạng'
        ]);
        User::find(Session::get('loginID'))->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email
        ]);
        return redirect()->back()->with('success','Cập nhật tài khoản thành công!');
    }

    public function changePassword(){

        return view('customer.account.change-password',);
    }
    public function saveChangePassword(Request $request){
        $request->validate([
            'current_password' => ['required','min:8',function($attribute, $value, $fail){
                 $user = User::find(Session::get('loginID'));
                if (!Hash::check($value, $user->password)) {
                    $fail('Mật khẩu cũ không đúng');
                }
            }],
            'new_password' => 'required|string|min:8|confirmed|different:current_password',

        ],[
            'current_password.min' =>'Mật khẩu có ít nhất 8 ký tự',
            'new_password.min' =>'Mật khẩu có ít nhất 8 ký tự',
            'new_password.confirmed' =>'Xác nhận mật khẩu không đúng',
            'new_password.different' =>'Mật khẩu mới không được trùng với mật khẩu cũ'
        ]

    );
        User::find(Session::get('loginID'))->update(['password' => Hash::make($request->new_password)]);

        return redirect()->back()->with("success","Đổi mật khẩu thành công!");

    }

}
