<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AddressController extends Controller
{
    public function showAddress(){
        $addresses = Address::all();

        // dd(Session::get('loginID'));
        return view('customer.address',compact('addresses'));
    }
    public function storeAddress(Request $request){
        // dd($request);
        $addresses = Address::where('user_id',Session::get('loginID'))->get();
        if($addresses->count()>=5){
            return redirect()->back()->with('error','Tối đa 5 địa chỉ!');
        };
        $request->validate([
                'name' => "required",
                'phone' => ['required','regex:/^(0?)(3[2-9]|5[6|8|9]|7[0|6-9]|8[0-6|8|9]|9[0-4|6-9])[0-9]{7}$/'],
                'feeShip' =>"required",
                'address' =>"required",
        ],[
            'phone.regex' => 'Số điện thoại không đúng định dạng',
            'feeShip.required' => 'Vui lòng chọn kiểm tra địa chỉ để xác nhận thông tin'
        ]);
        $fullAddress = $request->houseNumber." ". $request->address.", ".$request->suburb.", ".$request->district;
        Address::create([
            'address' => $fullAddress,
            'name' => $request->name,
            'feeShip' => $request->feeShip,
            'distance' => $request->distance,
            'phone' => $request->phone,
            'user_id' => Session::get('loginID'),
        ]);
        return redirect()->back()->with('success','Tạo địa chỉ thành công');

    }

    public function deleteAddress($idAddress){

       try{
        Address::find($idAddress)->delete();
        return redirect()->back()->with('success','Xóa địa chỉ thành công');

       }catch(QueryException $e){
        return redirect()->back()->with('error','Địa chỉ đang có đơn hàng xử lý,Vui lòng hoàn tất để xóa!');

       }

    }
}
