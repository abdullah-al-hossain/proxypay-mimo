<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\BusinessSetting;
use App\Seller;
use App\CustomerPackage;
use App\SellerPackage;
use Session;
use Redirect;

class IyzicoController extends Controller
{
    public function index(Request $request){

    }

    public static function pay(){
        $options = new \Iyzipay\Options();
        $options->setApiKey("sandbox-1GcasNxaRSuHuxbK1aD67VSSpS2xPE9o");
        $options->setSecretKey("sandbox-j7X6sWA2B8qhN6wwyYGbxYYf5JCliceu");
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");

        $request = new \Iyzipay\Request\CreatePayWithIyzicoInitializeRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId('123456789');
        $request->setPrice("1");
        $request->setPaidPrice("1.2");
        $request->setCurrency(\Iyzipay\Model\Currency::TL);
        $request->setBasketId("B67832");
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $request->setCallbackUrl(route('iyzico.callback'));

        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId("BY789");
        $buyer->setName("John");
        $buyer->setSurname("Doe");
        $buyer->setEmail("email@email.com");
        $buyer->setIdentityNumber("74300864791");
        $buyer->setRegistrationAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $buyer->setCity("Istanbul");
        $buyer->setCountry("Turkey");
        $request->setBuyer($buyer);

        $shippingAddress = new \Iyzipay\Model\Address();
        $shippingAddress->setContactName("Jane Doe");
        $shippingAddress->setCity("Istanbul");
        $shippingAddress->setCountry("Turkey");
        $shippingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $request->setShippingAddress($shippingAddress);

        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName("Jane Doe");
        $billingAddress->setCity("Istanbul");
        $billingAddress->setCountry("Turkey");
        $billingAddress->setAddress("Nidakule Göztepe, Merdivenköy Mah. Bora Sok. No:1");
        $request->setBillingAddress($billingAddress);

        $basketItems = array();
        $firstBasketItem = new \Iyzipay\Model\BasketItem();
        $firstBasketItem->setId(rand(1000,9999));
        $firstBasketItem->setName("Cart Payment");
        $firstBasketItem->setCategory1("Accessories");
        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
        $firstBasketItem->setPrice("1");
        $basketItems[0] = $firstBasketItem;

        $request->setBasketItems($basketItems);

        # make request
        $payWithIyzicoInitialize = \Iyzipay\Model\PayWithIyzicoInitialize::create($request, $options);

        # print result
        return Redirect::to($payWithIyzicoInitialize->getPayWithIyzicoPageUrl());
    }

    public function callback(Request $req){
        $options = new \Iyzipay\Options();
        $options->setApiKey("sandbox-1GcasNxaRSuHuxbK1aD67VSSpS2xPE9o");
        $options->setSecretKey("sandbox-j7X6sWA2B8qhN6wwyYGbxYYf5JCliceu");
        $options->setBaseUrl("https://sandbox-api.iyzipay.com");

        $request = new \Iyzipay\Request\RetrievePayWithIyzicoRequest();
        $request->setLocale(\Iyzipay\Model\Locale::TR);
        $request->setConversationId('123456789');
        $request->setToken($req->token);
        # make request
        $payWithIyzico = \Iyzipay\Model\PayWithIyzico::retrieve($request, $options);

        dd($payWithIyzico);
    }
}
