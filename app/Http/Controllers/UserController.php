<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\User_role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // User Management
    public function showListUser(){
        $user_list = User::all();
        return view('staff.user-manage.user-list',compact('user_list'));
    }
    public function addNewUser(Request $request){
        dd('success');
        exit;
    }
    // ---------------------------------------------------------------------------

    //User Group Management
    public function showListUserRole(){
        $user_role_list = User_role::all();
        return view('staff.user-manage.user-role-list',compact('user_role_list'));
    }



}
