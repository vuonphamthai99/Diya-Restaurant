<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Type;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    //Xem danh sách loại món
    public function showListType(){
        $types = Type::all();
        return view('staff.menu-manage.type-menu-list',compact('types'));
    }
    //Xem form thêm loại món
    public function showDetailMenuType(){
        return view('staff.menu-manage.detail-type-menu',);
    }
    //Sửa loại món
    public function showEditMenuType($idType){
        $type = Type::find($idType);
        return view('staff.menu-manage.detail-type-menu',compact('type'));
    }
    //Cập nhật món
    public function storeType(Request $request){
        if($request->idType){
            $request->validate([
                'name' => 'unique:types,name,'.$request->idType,
            ],[
                'name.unique' =>  'Loại món đã được tạo',
            ]);
            Type::where('id',$request->idType)->update([
                'name' => $request->name,
                'description' => $request->description
            ]);
        return redirect()->route('showListType')->with('success','Sửa loại món ăn thành công!');

        }
        $request->validate([
            'name' => 'unique:types',
        ],[
            'name.unique' =>  'Loại món đã được tạo',
        ]);

        Type::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return redirect()->route('showListType')->with('success','Thêm loại món ăn thành công!');
    }


    // ----------------------------------------------------------------

    // Xem danh sách các món
    public function showListMenu(){
        $all_menu = Menu::all();
        return view('staff.menu-manage.menu-list',compact('all_menu'));
    }
}
