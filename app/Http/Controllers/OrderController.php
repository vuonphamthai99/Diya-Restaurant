<?php

namespace App\Http\Controllers;

use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Table;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class OrderController extends Controller
{
    public function showOrderPage(){
        $tables = Table::all();
        $orders = Order::all();
        $types = Type::all();
        return view('staff.order-manage.order-page',compact('tables', 'orders','types'));
    }
    public function fetchMenuData(Request $request){
        $menus = MenuItem::where('type_id',$request->idType)->get();
        foreach($menus as $m){
            $m->img = $m->hasImage->name;
        }
        return $menus;
    }

    public function addOrder(Request $request){
        $menu = MenuItem::find($request->idMenu);
        if($request->Status == 0 || $request->Status == 3){
            Table::where('id',$request->idTable)
            ->update([
                'Status' => 2,
            ]);
            $order_id = Order::create([
                'order_date' => now(),
                'type_order' => 'Tại chỗ',
                'table_id' => $request->idTable,
                'status' => 0,
                'processed_by' => Session::get('loginID')
            ]);
            OrderDetail::create([
                'order_id' => $order_id->id,
                'menu_id' => $request->idMenu,
                'no_of_serving' => $request->quant,
                'order_time' => now()
            ]);
            return $menu;
        };
        $order_id = Order::where([
            ['table_id','=',$request->idTable],
            ['status', '=' , 0]
        ])->first();
        OrderDetail::create([
            'order_id' => $order_id->id,
            'menu_id' => $request->idMenu,
            'no_of_serving' => $request->quant,
            'order_time' => now()

        ]);
        return $menu;
    }

    public function getOrderDetailsByTable(Request $request){
        $Order = Order::where([
            ['table_id','=',$request->idTable],
            ['status', '=' , 0]
        ])->first();
        $Details = $Order->hasDetail;
        foreach($Details as $key=>$dt){
            $dt->menuName = $dt->ofMenu->name;
            $dt->menuPrice = $dt->ofMenu->price;
        }
        return $Details;
    }

    public function checkout(Request $request){
        Table::where('id','=',$request->idTable)
        ->update([
            'status' => 0
        ]);
        $Order = Order::where([
            ['table_id','=',$request->idTable],
            ['status', '=' , 0]
        ])->update([
            'status' => 1,
            'finish_date' => now()
        ]);

    }


    public function showOrderHistory(){
        $orders = Order::where('status','=',1)->get();

        foreach($orders as $od){
            foreach($od->hasDetail as $dt){
                $od->total += $dt->ofMenu->price;
            }
        }
        return view('staff.order-manage.order-history',compact('orders'));
    }
}
