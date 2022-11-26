<?php

namespace App\Http\Controllers;

use App\Models\Address;
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
        return redirect()->back()->with('sucess','Tạo địa chỉ thành công');

    }
}
