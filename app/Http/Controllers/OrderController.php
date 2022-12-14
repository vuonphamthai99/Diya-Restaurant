<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Table;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function showOrderPage(){
        $tables = Table::all();
        // dd($tables);
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
                'quantity' => $request->quant,
            ]);
            return $menu;
        };
        $order = Order::where([
            ['table_id','=',$request->idTable],
            ['status', '=' , 0]
        ])->first();
        foreach($order->hasDetail as $dt){

            if($request->idMenu == $dt->menu_id){

                $dt->update([
                    'quantity' =>$dt->quantity +$request->quant,
                ]);
                 return $menu;

            }

        }
        OrderDetail::create([
            'order_id' => $order->id,
            'menu_id' => $request->idMenu,
            'quantity' => $request->quant,

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
        ])->first();
        $Order->update([
            'status' => 1,
            'finish_date' => now()
        ]);
        $this->printOrder($Order->id);
    }


    public function showOrderHistory(){
        $orders = Order::where('status','=',1)->where('type_order','=','Tại chỗ')->get();

        foreach($orders as $od){
            foreach($od->hasDetail as $dt){
                $od->total += $dt->ofMenu->price;
            }
        }
        return view('staff.order-manage.order-history',compact('orders'));
    }

    public function getOrderDetailsById($idOrder){
        $order = Order::find($idOrder);
        return view('staff.order-manage.order-details',compact('order'));
    }


    public function deleteDetail($idDetail){
        OrderDetail::find($idDetail)->delete();
    }
    //----------------------------------------------------------------
    // online order management

    public function showOrderOnlineList(){
        $orders = Order::where('type_order', 'Online')->get();
        foreach($orders as $od){
            foreach($od->hasDetail as $dt){
                $od->total += $dt->ofMenu->price;
            }
        }
        return view('staff.order-manage.online-order-manage',compact('orders'));
    }
    public function confirmOrder($idOrder){
        Order::find($idOrder)->update([
            'status' => 1,
            'processed_by'  => Session::get('loginID')
        ]);
        return redirect()->back()->with('success','Xác nhận đơn hàng thành công!');
    }
    public function confirmCancelOrder($idOrder){
        Order::find($idOrder)->update([
            'status' => 4,
            'processed_by'  => Session::get('loginID')
        ]);
        return redirect()->back()->with('success','Xác nhận hủy đơn hàng thành công!');
    }
    public function deleteOrder($idOrder){
        Order::find($idOrder)->delete();
        return redirect()->back()->with('success','Xóa đơn hàng thành công!');
    }
    //----------------------------------------------------------------
    // Guest Order Management
    public function storeCartData(Request $request){
        if(!Session::has('loginID')){
            abort(404);
        }
        // $cartItems =$request->cartItem;
            // dd($request);
         Session::put('cartItems', $request->cartItem);
        // return $cartItems;
    }

    public function fetchCartData(Request $request){
        // if(!Session::has('loginID')){
        //     abort(404);
        // }
        if (Session::has('cartItems')){
            return Session::get('cartItems');
        }
        return ;
    }
    public function guestCheckout(){
        $addresses = Address::where('user_id',Session::get('loginID'))->get();

        return view('customer.checkout',compact('addresses'));
    }

    public function GuestCheckoutPayment(Request $request){
        // dd($request);
        if(!Session::has('cartItems')){
            return redirect()->route('guest-page')->with('error','Vui lòng chọn món ăn!');
        }

        $request->validate([
            'address' => 'required',
            'paymentMethod' => 'required',
        ],[
            'address.required' => 'Vui lòng chọn địa chỉ hoặc thêm địa chỉ mới!',
            'paymentMethod.required' => 'Vui lòng chọn phương thức thanh toán!'
        ]);
        if($request->paymentMethod == 1){
            $order = Order::create([
                'customer_id' => Session::get('loginID'),
                'order_date' => now(),
                'type_order' => 'Online',
                'table_id' => null,
                'address_id' => $request->address,
                'status' => '0',

            ]);
            foreach(Session::get('cartItems') as $c){
                OrderDetail::create([
                    'order_id' => $order->id,
                    'menu_id' => $c['id'],
                    'quantity' => $c['quant'],
                ]);
            }
            Session::forget('cartItems');
            return redirect()->route('guest-page')->with('success', 'Đã đặt hàng, theo dõi đơn ở đơn hàng đã đặt.');
        }
        Session::put('idAddress',$request->address);
        return redirect()->route('paypalPayment');
    }
    public function cancelOrder($idOrder){
        Order::find($idOrder)->update([
            'status' => '2'
        ]);
        return redirect()->back()->with('success','Đã gửi yêu cầu hủy đơn!');
    }
    public function confirmReceiveOrder($idOrder){
        Order::find($idOrder)->update([
            'status' => '3'
        ]);
        return redirect()->back()->with('success','Đã xác nhận, Cảm ơn quý khách đã đặt hàng!');
    }



    public function showOrderList(){
        $orders = Order::orderByDesc('order_date')->get();
        return view('customer.order-list',compact('orders'));
    }

    public function showOrderDetails($idOrder){
        $order = Order::find($idOrder);
        return view('customer.order-details',compact('order'));
    }

    public function printOrder($idOrder){
        $Order = Order::find($idOrder);
        $pdf = Pdf::loadView('bill-template.bill',array('Order' =>$Order));
        return $pdf->download('bill_of_'.$Order->id.'.pdf');
    }
}
