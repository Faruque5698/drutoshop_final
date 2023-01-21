<?php

namespace App\Helper;

class ApiResponse
{
    public function success($data){
        return response()->json([
            'code'=>200,
            'status'=>true,
            'message'=>'successful',
            'data'=>$data
        ],200);
    }

    public function error($code,$message){
        return response()->json([
           'code'=>$code,
           'status'=>false,
           'error'=>$message
        ],$code);
    }

    public function validation($message){
        return response()->json([
           'code'=>422,
           'status'=>false,
            'error'=>$message
        ],422);
    }

    public function not_found(){

        return response()->json([
            'code'=>404,
            'status'=>false,
            'error'=>'data not found'
        ],404);
    }

    public function login($data, $accessToken){
        return response()->json([
           'code'=>200,
           'status'=>true,
            'data'=>$data,
            'token'=>$accessToken

        ],200);
    }

    public function login_credintial_check($message){
        return response()->json([
            'code'=>401,
            'status'=>false,
            'error'=>$message

        ],401);
    }

    public function create($data){
        return response()->json([
           'code'=>200,
           'status'=>true,
           'message'=>'data saved',
           'data'=>$data
        ],200);
    }

//    public function credintial_error(){
//
//    }

public function dataExsits(){
        return response()->json([
            'code'=>409,
            'status'=>true,
            'message'=>'data all ready exists',

        ],409);
}
    function getTrx($length = 12)
    {
        $characters = 'ABCDEFGHJKMNOPQRSTUVWXYZ123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function api_method_payment($method_code){
        if($method_code == 101){
            $code = 'paypal';
        }elseif($method_code == 102){
            $code = 'PerfectMoney';
        }elseif($method_code == 103){
            $code = 'Stripe';
        }elseif($method_code == 104){
            $code = 'Skrill';
        }elseif($method_code == 105){
            $code = 'PayTM';
        }elseif($method_code == 106){
            $code = 'Payeer';
        }elseif($method_code == 107){
            $code = 'PayStack';
        }elseif($method_code == 108){
            $code = 'VoguePay';
        }elseif($method_code == 109){
            $code = 'flutterwave';
        }elseif($method_code == 110){
            $code = 'RozarPay';
        }elseif($method_code == 111){
            $code= 'stripeJs';
        }elseif($method_code == 112){
            $code = 'instamojo';
        }
        elseif($method_code == 501){
            $code = 'Blockchain';
        }elseif($method_code == 502){
            $code = 'Block.io';
        }elseif($method_code == 503){
            $code = 'CoinPayment';
        }elseif($method_code == 504){
            $code = 'CoinPaymentALL';
        }elseif($method_code == 505){
            $code = 'Coingate';
        }elseif($method_code == 506){
            $code = 'CoinBaseCommerce';
        }

        return $code;
    }

    function notify($user, $type, $shortcodes = null)
    {

        send_email($user, $type, $shortcodes);
        send_sms($user, $type, $shortcodes);
    }


    public function setEnv($key, $value)
    {
        file_put_contents(app()->environmentFilePath(), str_replace(
            $key . '=' . env($value),
            $key . '=' . $value,
            file_get_contents(app()->environmentFilePath())
        ));
    }

}
