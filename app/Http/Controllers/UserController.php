<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\User_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
class UserController extends Controller
{
    // User Management
    public function showListUser(){
        $user_list = User::all();
        return view('staff.user-manage.user-list',compact('user_list'));
    }

    public function showAddUser(){
        $user_role_list = User_role::all();
        return view('staff.user-manage.add-user',compact('user_role_list'));
    }
    public function addNewUser(Request $request){
        $request->validate([
            'id_user_role' =>'not_in:0',
            'email' => 'unique:Users|email',
            'phone' => ['required','unique:Users','regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
        ],[
            'user_role_id.not_in' => 'Chưa chọn vai trò cho người dùng',
            'email.unique' => 'Email đã tồn tại',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'phone.regex' => 'Số điện thoại không đúng định dạng',
            'id_user_role.not_in' => 'Bạn chưa chọn vai trò cho người dùng'
        ]);

    if(User::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => Hash::make('User@123'),
        'id_user_role' => $request->id_user_role,
    ])){
        return redirect()->route('showListUser')->with('success','Thêm người dùng thành công');
    }
    else return redirect()->back()->with('error','Thêm người dùng không thành công');
    }
    // ---------------------------------------------------------------------------

    //User Group Management
    public function showListUserRole(){
        $user_role_list = User_role::all();
        return view('staff.user-manage.user-role-list',compact('user_role_list'));
    }

    public function actionHandler($id,$action){
        $success = "";
        $error = "";
        switch($action){
        case('reset-pwd'):
            User::find($id)->update(['password'=> Hash::make('User@123')]);
            $success ='Cập nhật mật khẩu thành công! Mật khẩu mặc định là User@123.';
            break;
        case('lock-user'):
            User::find($id)->update(['status'=> 1]);
            $success ='Khóa người dùng thành công!';
            break;
        case('unlock-user'):
            User::find($id)->update(['status'=> 0]);
            $success ='Mở khóa người dùng thành công!';
            break;
        case('delete-user'):
            User::find($id)->delete();
            $success ='Xóa người dùng thành công!';
            return redirect()->route('showListUser')->with('success','Xóa người dùng thành công!');
        default:
            $error = "Cập nhật người dùng không thành công!";
        }
        if($success != ''){
            return redirect()->route('showListUser')->with('success',$success);
        }else{
            return redirect()->route('showListUser')->with('error',$error);
        }
    }

    public function showUserProfile(){
        // $user = User::find(Session::get('loginID'));
        return view('staff.user-profile');

    }


    public function editUserProfile(Request $request){

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.Session::get('loginID'),
            'phone' => ['required','unique:Users,phone,'.Session::get('loginID'),'regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
            'img' => 'max:10000',

        ],[
            'name.required' => 'Tên người dùng không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã được sử dụng',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.regex' => 'Số điện thoại không đúng định dạng',
            'phone.unique' => 'Số điện thoại không đúng định dạng',
            'img.max' => 'File ảnh quá lớn',
        ]);
        $idAvatar = 1;
        if($request->img != null){
            $file = $request->file('img') ;
            $fileName = $file->hashName() ;
            $destinationPath = public_path().'/images/avatars';
            $file->move($destinationPath,$fileName);
            $filePath = $fileName;
            $idAvatar = Image::create(['name' => $filePath])->id;

        }

        User::find(Session::get('loginID'))->update([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'avatar' => $idAvatar,
            'update_at' => now(),
        ]);
        return redirect()->route('showUserProfile')->with('success','Cập nhật thông tin thành công');
    }


    public function showChangePassword(){
        return view('staff.change-password');
    }

    public function storeChangePassword(Request $request){
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
