<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Utility\ProxypayUtility;
use App\Order;
use Session;

class ProxypayController extends Controller
{
    public function create_reference($request)
    {
        $order = Order::findOrFail($request->session()->get('order_id'));
        // dd($order->grand_total, $order->code);
        $reference_number = ProxypayUtility::generate_reference_number();

        // $amount = 1153.87; $order_code = '6354745367-266';
        $payment_detalis = ProxypayUtility::create_reference($reference_number, $order->grand_total, $order->code);
        
        if(Session::has('payment_type')){
            if(Session::get('payment_type') == 'cart_payment'){
                $checkoutController = new CheckoutController;
                return $checkoutController->checkout_done(Session::get('order_id'), $payment_detalis);
            }
            elseif (Session::get('payment_type') == 'wallet_payment') {
                $walletController = new WalletController;
                return $walletController->wallet_payment_done(Session::get('payment_data'), $payment_detalis);
            }
            elseif (Session::get('payment_type') == 'customer_package_payment') {
                $customer_package_controller = new CustomerPackageController;
                return $customer_package_controller->purchase_payment_done(Session::get('payment_data'), $payment);
            }
            elseif (Session::get('payment_type') == 'seller_package_payment') {
                $seller_package_controller = new SellerPackageController;
                return $seller_package_controller->purchase_payment_done(Session::get('payment_data'), $payment);
            }
        }
               
    }



}
