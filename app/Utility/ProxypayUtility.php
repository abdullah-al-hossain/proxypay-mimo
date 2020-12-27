<?php

namespace App\Utility;

class ProxypayUtility
{
    public static function generate_reference_number()
    {
        $curl = curl_init();

        $httpHeader = [
            "Authorization: " . "Token " . env('PROXYPAY_TOKEN'),
            "Accept: application/vnd.proxypay.v2+json",
        ];

        
        $opts = [
            CURLOPT_URL             => "https://api.sandbox.proxypay.co.ao/reference_ids",
            CURLOPT_CUSTOMREQUEST   => "POST",
            CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_TIMEOUT         => 30,
            CURLOPT_HTTPHEADER      => $httpHeader
        ];

        curl_setopt_array($curl, $opts);

        $response = curl_exec($curl);
        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        if($httpcode == 200) {
            // dd($response);
        } else {
            dd("Something went wrong!");
        }
        
        curl_close($curl);

        return $response;
    }

    public static function create_reference($reference_number, $amount, $order_code) 
    {
        $reference = [
            "amount"        => $amount,
            "end_datetime"  => "2021-01-21",
            "custom_fields" => [
              "order-code" => $order_code,
              "entity" => env('PROXYPAY_ENTITY'),
              "reference" => $reference_number
            ]
        ];
        
        $data = json_encode($reference);
        
        $curl = curl_init();
        
        $httpHeader = [
            "Authorization: " . "Token " . env('PROXYPAY_TOKEN'),
            "Accept: application/vnd.proxypay.v2+json",
            "Content-Type: application/json",
            "Content-Length: " . strlen($data)
        ];
        
        $opts = [
            CURLOPT_URL             => "https://api.sandbox.proxypay.co.ao/references/".$reference_number,
            CURLOPT_CUSTOMREQUEST   => "PUT",
            CURLOPT_HTTP_VERSION    => CURL_HTTP_VERSION_1_1,
            CURLOPT_RETURNTRANSFER  => true,
            CURLOPT_TIMEOUT         => 30,
            CURLOPT_HTTPHEADER      => $httpHeader,
            CURLOPT_POSTFIELDS      => $data
        ];
        
        curl_setopt_array($curl, $opts);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);

        $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        if($httpcode == 204) {
            return $data;        
        }
        
        dd("http status code:".$httpcode);

    }


}
