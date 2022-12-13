<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Omnipay\Omnipay;

class PaymentController extends Controller
{
    private $gateway;

    public function __construct(){
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true);
    }
    function round_up ( $value, $precision ) {
        $pow = pow ( 10, $precision );
        return ( ceil ( $pow * $value ) + ceil ( $pow * $value - ceil ( $pow * $value ) ) ) / $pow;
    }

    public function PayPalPayment(){
        $total = 0;
        foreach(Session::get('cartItems') as $c){
            $total += $c['price'] * $c['quant'];
        }
        $address = Address::find(Session::get('idAddress'));
        $total += $address->feeShip;
        $total = $total * env('VND_TO_USD');
        $total = $this->round_up($total, 2);
        // dd($total);
        try{
            $response = $this->gateway->purchase(array(

                'amount' => $total,
                'currency' => env('PAYPAL_CURRENCY'),
                'returnUrl' => route('success'),
                'cancelUrl' => route('error')
            ))->send();

            if($response->isRedirect()){
                $response->redirect();
            }else{
                return $response->getMessage();
            }
        }catch(\Throwable $th){
            throw $th;
        }
    }

    public function success(Request $request){

        if($request->paymentId && $request->PayerID){
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->PayerID,
                'transactionReference' => $request->paymentId,
            ));

            $response = $transaction->send();

            if($response->isSuccessful()){
                $arr = $response->getData();
                $payment_id = Payment::create([
                    'payment_id_code' => $arr['id'],
                    'paypal_payer_id' => $arr['payer']['payer_info']['payer_id'],
                    'payer_email' => $arr['payer']['payer_info']['email'],
                    'amount' => $arr['transactions'][0]['amount']['total'],
                    'currency' => env('PAYPAL_CURRENCY'),
                    'payment_status' => $arr['state']
                ])->id;
                if($payment_id){
                    $order = Order::create([
                        'customer_id' => Session::get('loginID'),
                        'order_date' => now(),
                        'type_order' => 'Online',
                        'table_id' => null,
                        'address_id' => Session::get('idAddress'),
                        'payment_id' => $payment_id,
                        'status' => '1',
                    ]);
                    foreach(Session::get('cartItems') as $c){
                        OrderDetail::create([
                            'order_id' => $order->id,
                            'menu_id' => $c['id'],
                            'quantity' => $c['quant'],
                        ]);
                    }

                }
                Session::forget('cartItems');
                Session::forget('idAddress');
                return redirect()->route('guest-page')->with('success', 'Đã đặt hàng, theo dõi đơn ở đơn hàng đã đặt.');
            }
            else{
                return $response->getMessage();
            }
        }
        else{
            return "Thanh toán không thành công! Hãy thử lại sau.";
        }
    }
    public function error(){
        return redirect()->route('showMain');
    }

}
