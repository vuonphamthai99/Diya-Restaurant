<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Table;
use App\Models\Type;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showOrderPage(){
        $tables = Table::all();
        $orders = Order::all();
        $types = Type::all();
        return view('staff.order-manage.order-page',compact('tables', 'orders','types'));
    }
    public function fetchData(Request $request){
        $menus = Menu::where('type_id',$request->idType)->get();
        foreach($menus as $m){
            $m->img = $m->hasImage->name;
        }
        return $menus;
    }

    public function addOrder(Request $request){
    }
}
