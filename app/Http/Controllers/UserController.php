<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
class UserController extends Controller
{
    // User Management
    public function showListUser(){
        $user_list = User::all();
        return view('staff.user-manage.user-list',compact('user_list'));
    }
    public function addNewUser(Request $request){

        $validator =  Validator::make($request->all(),[
            'user_role_id' =>'|numeric|not_in:0',
            'name' => 'required',
            'email' => 'required|unique:Users|email',
            'phone' => 'required|unique:Users|numeric|min:10',
        ]);
        if($validator->fails()){
            return redirect()->back()->with('fail','Thêm người dùng không thành công');
        }
    if(User::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'phone' => $request['phone'],
        'password' => Hash::make('User@123'),
        'user_role_id' => $request['user_role_id'],
        'id_user_add' => Session::get('loginID'),
    ])){
        return redirect()->back()->with('success','Thêm người dùng thành công');
    }
    else return redirect()->back()->with('fail','Thêm người dùng không thành công');
    }
    // ---------------------------------------------------------------------------

    //User Group Management
    public function showListUserRole(){
        $user_role_list = User_role::all();
        return view('staff.user-manage.user-role-list',compact('user_role_list'));
    }



}
