<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Gateway;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function depositInsert(Request $request){
        $request->validate([
           'order_id'=>'required',
           'amount'=>'required',
           'method_code'=>'required',
        ]);

        $deposit = new Deposit();
        $method = Gateway::where('code','=',$request->method_code)->first();
        if (!$method){
            return ApiResponse::not_found();
        }

        $deposit->customer_id = auth()->user()->id;
        $deposit->order_id = $request->order_id;
        $deposit->amount = $request->amount;
        $deposit->trx = ApiResponse::getTrx();
        $deposit->method_code = $request->method_code;
        $deposit->status = 0;
        $deposit->save() ;

        $data = Deposit::where('trx','=',$deposit['trx'])->first();

        $response['trx']=$data['trx'];
        $response['amount']=$data['amount'];
        $response['order_id']=$data['order_id'];

        $response['method_type'] = 'automatic';
        $response['payment_url']= route('deposit-api.confirm',$data['trx']);

        return ApiResponse::success($response);





    }
}
