<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\MenuItem;
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
                'name' => 'required|unique:types,name,'.$request->idType,
            ],[
                'name.unique' =>  'Loại món đã được tạo',
                'name.required' =>  'Loại món không được để trống',
            ]);
            Type::where('id',$request->idType)->update([
                'name' => $request->name,
                'description' => $request->description
            ]);
        return redirect()->route('showListType')->with('success','Sửa loại món ăn thành công!');

        }
        $request->validate([
            'name' => 'unique:types||required',

        ],[
            'name.unique' =>  'Loại món đã được tạo',
            'name.required' =>  'Loại món không được để trống',
        ]);

        Type::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        return redirect()->route('showListType')->with('success','Thêm loại món ăn thành công!');
    }
    public function deleteType($idType){
        Type::find($idType)->delete();
        return redirect()->back()->with('success','Xóa loại món ăn thành công');
    }

    // ----------------------------------------------------------------

    // Xem danh sách các món
    public function showListMenu(){
        $all_menu = MenuItem::all();
        return view('staff.menu-manage.menu-list',compact('all_menu'));
    }
    //Xem form thêm loại món
    public function showDetailMenu(){
        $types = Type::all();
        return view('staff.menu-manage.detail-menu',compact('types'));
    }
    //Sửa món
    public function showEditMenu($idMenu){
        $menu = MenuItem::find($idMenu);
        $types = Type::all();
        return view('staff.menu-manage.detail-menu',compact('menu','types'));
    }

    public function deleteMenu($idMenu){
        MenuItem::find($idMenu)->delete();
        return redirect()->back()->with('success','Xóa món ăn thành công');
    }
    public function storeMenu(Request $request){
        if($request->idMenu){
            $request->validate([
                'name' => 'unique:Menu_Items,name,'.$request->idMenu,
                'price' => 'required|numeric',
                'type' => 'required',
            ],[
                'name.unique' =>  'Món ăn đã được tạo',
                'name.required' =>  'Tên cho món ăn không được để trống',
                'price.required' => 'Giá cho món ăn không được để trống',
                'price.numeric' => 'Giá cho món ăn phải là số',
                'type.required' =>  'Chưa chọn danh mục',
            ]);
            if($request->img != null){
                $file = $request->file('img') ;
                $fileName = $file->hashName() ;
                $destinationPath = public_path().'/images/menu';
                $file->move($destinationPath,$fileName);
                $filePath = $fileName;
                $idImg = Image::create(['name' => $filePath])->id;
                MenuItem::where('id',$request->idMenu)->update([
                    'image_id' => $idImg,

                ]);

            }
            MenuItem::where('id',$request->idMenu)->update([
                'name' => $request->name,
                'price' => $request->price,
                'type_id' => $request->type,
                'ingredients'=> $request->ingredients,
                'status' => $request->status
            ]);
        return redirect()->route('showListMenu')->with('success','Sửa món ăn thành công!');

        }
        $validate = $request->validate([
            'name' => 'unique:types|required',
            'price' => 'required|numeric',
            'type' => 'required',
            'img' => 'required',
        ],[
            'name.unique' =>  'Món ăn đã được tạo',
            'name.required' =>  'Tên cho món ăn không được để trống',
            'price.numeric' => 'Giá cho món ăn phải là số',
            'price.required' => 'Giá cho món ăn không được để trống',
            'type.required' =>  'Chưa chọn danh mục',
            'img.required' => 'Hình ảnh món ăn không được để trống'
        ]);

        if($request->img != null){
            $file = $request->file('img') ;
            $fileName = $file->hashName() ;
            $destinationPath = public_path().'/images/menu';
            $file->move($destinationPath,$fileName);
            $filePath =$fileName;
            $idImg = Image::create(['name' => $filePath])->id;
        }
        MenuItem::create([
                'name' => $request->name,
                'price' => $request->price,
                'type_id' => $request->type,
                'image_id' => $idImg,
                'ingredients'=> $request->ingredients,
                'status' => $request->status
        ]);
        return redirect()->route('showListMenu')->with('success','Thêm món ăn thành công!');
    }
}
