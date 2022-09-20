<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showListUser(){
        $user_list = User::all();
        return view('staff.user-manage.user-list',compact('user_list'));
    }
}
