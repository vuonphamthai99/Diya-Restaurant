<?php

namespace App\Http\Controllers;

use App\Models\Image;
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
    //Xem form thêm loại món
    public function showDetailMenu(){
        $types = Type::all();
        return view('staff.menu-manage.detail-menu',compact('types'));
    }
    //Sửa món
    public function showEditMenu($idMenu){
        $menu = Menu::find($idMenu);
        $types = Type::all();
        return view('staff.menu-manage.detail-menu',compact('menu','types'));
    }
    public function storeMenu(Request $request){
        if($request->idMenu){
            $request->validate([
                'name' => 'unique:menu,name,'.$request->idMenu,
                'price' => 'required',
                'type' => 'required',
                'ingredients' => 'required',
            ],[
                'name.unique' =>  'Món ăn đã được tạo',
                'name.required' =>  'Tên cho món ăn không được để trống',
                'price.required' => 'Giá cho món ăn không được để trống',
                'type.required' =>  'Chưa chọn danh mục',
                'ingredients.required' => 'Mô tả thành phần không được để trống',
            ]);
            if($request->img != null){
                $file = $request->file('img') ;
                $fileName = $file->hashName() ;
                $destinationPath = public_path().'/images/menu';
                $file->move($destinationPath,$fileName);
                $filePath = asset('images/menu/'.$fileName);
                $idImg = Image::create(['name' => $filePath])->id;
                Menu::where('id',$request->idMenu)->update([
                    'image_id' => $idImg,

                ]);

            }
            Menu::where('id',$request->idMenu)->update([
                'name' => $request->name,
                'price' => $request->price,
                'type_id' => $request->type,
                'ingredients'=> $request->ingredients,
                'status' => $request->status
            ]);
        return redirect()->route('showListMenu')->with('success','Sửa loại món ăn thành công!');

        }
        $validate = $request->validate([
            'name' => 'unique:types|required',
            'price' => 'required',
            'type' => 'required',
            'ingredients' => 'required',
            'img' => 'required',
        ],[
            'name.unique' =>  'Món ăn đã được tạo',
            'name.required' =>  'Tên cho món ăn không được để trống',
            'price.required' => 'Giá cho món ăn không được để trống',
            'type.required' =>  'Chưa chọn danh mục',
            'ingredients.required' => 'Mô tả thành phần không được để trống',
            'img.required' => 'Hình ảnh món ăn không được để trống'
        ]);

        if($request->img != null){
            $file = $request->file('img') ;
            $fileName = $file->hashName() ;
            $destinationPath = public_path().'/images/menu';
            $file->move($destinationPath,$fileName);
            $filePath = asset('images/menu/'.$fileName);
            $idImg = Image::create(['name' => $filePath])->id;
        }
        Menu::create([
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
