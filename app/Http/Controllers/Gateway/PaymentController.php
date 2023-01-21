<?php

namespace App\Http\Controllers\Gateway;

use App\Currency;
use App\ExpressPayment;
use App\GeneralSetting;
use App\Helper\ApiResponse;
use App\Invoice;
use App\Models\Deposit;
//use App\Trx;
use App\Models\Trx;
use App\Wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\GatewayCurrency;
//use App\Deposit;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;
use App\Gateway;


class PaymentController extends Controller
{
    public function deposit()
    {
        $gatewayCurrency = GatewayCurrency::whereHas('method', function ($gate) {
            $gate->where('status', 1);
        })->with('method')->orderBy('method_code')->get();
        $page_title = 'Deposit';
        $currency = Currency::whereStatus(1)->get();

        return view(activeTemplate().'payment.deposit', compact('gatewayCurrency', 'page_title','currency'));
    }

    public function depositInsert(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|numeric|min:1',
            'method_code' => 'required',
            'currency' => 'required',
            'currency_id' => 'required', // from currency
        ],[
            'currency_id.required' => 'Select a wallet to deposit'
        ]);
        $gate = GatewayCurrency::where('method_code', $request->method_code)->where('currency', $request->currency)->first();
        if (!$gate) {
            return back()->with('danger', 'Invalid Gateway');
        }

        $walletCurrency = Currency::where('id', $request->currency_id)->where('status',1)->firstOrFail();

        if ($gate->min_amount <= $request->amount && $gate->max_amount >= $request->amount) {
            $charge = formatter_money($gate->fixed_charge + ($request->amount * $gate->percent_charge / 100));
            $final_amo = formatter_money($request->amount + $charge);
            $destinationWalletAmount = $request->amount * $gate->rate * $walletCurrency->rate;
            $depo['currency_id'] = $walletCurrency->id;
            $depo['wallet_amount'] = formatter_money($destinationWalletAmount);

            $depo['user_id'] = Auth::id();
            $depo['method_code'] = $gate->method_code;
            $depo['method_currency'] = strtoupper($gate->currency);
            $depo['amount'] = $request->amount;
            $depo['charge'] = $charge;
            $depo['gate_rate'] = $gate->rate;
            $depo['cur_rate'] = $walletCurrency->rate;
            $depo['final_amo'] = formatter_money($final_amo);

            $depo['btc_amo'] = 0;
            $depo['btc_wallet'] = "";
            $depo['trx'] = getTrx();
            $depo['try'] = 0;
            $depo['status'] = 0;
            $ddd = Deposit::create($depo);

            Session::put('Track', $depo['trx']);

            if($ddd->method_code > 999){
                return redirect()->route('user.manualDeposit.preview');
            }
            return redirect()->route('user.deposit.preview');
        } else {
            $notify[] = ['error', 'Please Follow Deposit Limit'];
            return back()->withNotify($notify);
        }
    }

    public function depositPreview()
    {
        $track = Session::get('Track');
        $data = Deposit::with('gateway','currency')->where('status', 0)->where('trx', $track)->first();
        if (!$data) {
            return redirect()->route('user.deposit');
        }
        if($data->method_code > 999){
            return redirect()->route('user.manualDeposit.preview');
        }

        $page_title = "Payment Preview";
        return view(activeTemplate().'payment.preview', compact('data', 'page_title'));
    }

    public function  manualDepositPreview(){
        $track = Session::get('Track');
        $data = Deposit::with('gateway','currency')->where('status', 0)->where('trx', $track)->first();
        if (!$data) {
            return redirect()->route('user.deposit');
        }

        $page_title = "Payment Preview";
        return view(activeTemplate().'manual_payment.manualPreview', compact('data', 'page_title'));
    }

    public function manualDepositConfirm()
    {
        $track = Session::get('Track');


        $data = Deposit::with('gateway','currency')->where('status', 0)->where('trx', $track)->first();
        if (!$data) {
            return redirect()->route('user.deposit');
        }
        if ($data->status != 0) {
            return redirect()->route('user.deposit');
        }

        if($data->method_code > 999){
            $method = $data->gateway_currency();

            $page_title = $method->name;
            return view(activeTemplate().'manual_payment.manual_confirm', compact('data', 'method','page_title'));

        }
        abort(404);
    }

    public function manualDepositUpdate(Request $request)
    {
        $track = Session::get('Track');
        $data = Deposit::with('gateway','currency')->where('status', 0)->where('trx', $track)->first();
        if (!$data) {
            return redirect()->route('user.deposit');
        }
        if ($data->status != 0) {
            return redirect()->route('user.deposit');
        }


        $params = json_decode($data->gateway_currency()->parameter);
        if (!empty($params)) {
            foreach ($params as $param) {
                $validation_rule['ud.' . str_slug($param)] = 'required';
                $validation_msg['ud.*.required'] =  $param . ' is required';
            }
            $request->validate($validation_rule, $validation_msg);
        }


        if ($request->hasFile('verify_image')) {
            try {
                $filename = upload_image($request->verify_image, config('constants.deposit.verify.path'));
                $data['verify_image'] = $filename;
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Could not upload your verification image'];
                return back()->withNotify($notify)->withInput();
            }
        }
        $data->detail =$request->ud;
        $data->status = 2; // pending
        $data->update();

        notify($data->user, $type = 'DEPOSIT_PENDING', [
            'trx' => $data->trx,
            'amount' => formatter_money($data->wallet_amount) . ' '.$data->method_currency,
            'method' => $data->gateway_currency()->name,
            'charge' => formatter_money($data->charge) . ' '.$data->method_currency,
        ]);
        $notify[] = ['success', 'You have deposit request has been taken.'];
        return redirect()->route('user.deposit')->withNotify($notify);


    }



    public function depositConfirm()
    {
        $track = Session::get('Track');
        $deposit = Deposit::with('gateway','express_payment','invoice_payment')->where('trx', $track)->orderBy('id', 'DESC')->first();

        if (is_null($deposit)) {
            $notify[] = ['error', 'Invalid Deposit Request'];
            return redirect()->route('user.deposit')->withNotify($notify);
        }
        if ($deposit->status != 0) {
            if($deposit->invoice_id != 0){
                return redirect()->route('invoice.initiate.error')->with('error', 'Opps! Invalid Deposit Request!');
            }
            if($deposit->api_id != 0){
                return redirect()->route('express.error')->with('error', 'Opps! Something Wrong!!');
            }
            $notify[] = ['error', 'Invalid Deposit Request'];
            return redirect()->route('user.deposit')->withNotify($notify);
        }

        $xx = 'g' . $deposit->method_code;

        $new =  __NAMESPACE__ . '\\' . $xx . '\\ProcessController';

        $data =  $new::process($deposit);

        $data =  json_decode($data);





        if (isset($data->error)) {
            if($deposit->invoice_id != 0){
                return redirect()->route('invoice.initiate.error')->with('error', $data->message);
            }
            if($deposit->api_id != 0){
                return redirect()->route('express.error')->with('error', $data->message);
            }

            $notify[] = ['error', $data->message];
            return redirect()->route('user.deposit')->withNotify($notify);
        }
        if (isset($data->redirect)) {
            return redirect($data->redirect_url);
        }


        $getArr['data'] = $data;
        $getArr['page_title'] = '';
        $getArr['deposit'] = $deposit;

        return view(activeTemplate().$data->view, $getArr);
    }





    public function apiDepositConfirm($track)
    {
        $deposit = Deposit::where('trx', $track)->orderBy('id', 'DESC')->first();


        if (is_null($deposit)) {
            return response(['errors' => 'Invalid Deposit Request']);
        }


        $xx = 'g' . $deposit->method_code;
        $new =  __NAMESPACE__ . '\\' . $xx . '\\ProcessController';
        $data =  $new::processApi($deposit);
        $data =  json_decode($data);

//        if (isset($data->error)) {
//            if($deposit->invoice_id != 0){
//                return response(['errors' => $data->message]);
//            }
//            if($deposit->api_id != 0){
//                return response(['errors' => $data->message]);
//            }
//            return response(['errors' => $data->message]);
//        }

        if (isset($data->redirect)) {
                $response['result'] = true;
                $response['url']= $data->redirect_url;
            return response($response);
        }
        $getArr['method'] = ApiResponse::api_method_payment($deposit->method_code);
        $getArr['data'] = $data;
        $getArr['deposit'] = $deposit;

        return ApiResponse::success($getArr);
    }


    public static  function userDataUpdate($data)
    {
        if ($data->status == 0) {
            $data['status'] = 1;
            $data->update();





                    Trx::create([
                        'user_id' => auth()->user()->id,
                        'amount' => $data->amount,
                        'trx_type' => '+',
                        'remark' => 'Payment Received By  '.ApiResponse::api_method_payment( $data->method_code),
                        'title' => 'Payment Received By ' . ApiResponse::api_method_payment( $data->method_code),
                        'trx' => $data->trx
                    ]);

//                    sendIPNResponse($data->trx);

//                    notify(
//                        auth()->user()->id, $type = 'api_payment', [
//                        'amount' => $data->amount,
////                        'gateway_currency' => $data->gateway_currency()->symbol,
//                        'gateway_name' =>  ApiResponse::api_method_payment( $data->method_code),
//                        'trx' =>  $data->trx,
//                    ]);







//                notify($user->user, $type = 'payment', [
//                    'amount' => formatter_money($data->wallet_amount),
//                    'currency' => $user->currency->code,
//                    'gateway_currency' => $data->gateway_currency()->symbol,
//                    'gateway_name' =>  $data->gateway_currency()->name,
//                    'new_balance' =>  formatter_money($user->amount),
//                    'transaction_id' =>  $data->trx,
//                ]);


            }



//        }
    }
}
