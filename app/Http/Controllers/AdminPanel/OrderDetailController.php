<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\FCMService;

class OrderDetailController extends Controller
{
    // ORDER DETAILS -----GET METHOD

    public function order()
    {

    	$orders = Order::with('order_to_product','order_to_product.product')->orderBy('id','DESC')->get();

    	return view('AdminPanel.Order.order-list', [
    		"orders" => $orders
    	]);
    }

    public function order_panding()
    {


        // fetch data order model
        $orders = Order::where('status', 0)->with('order_to_product','order_to_product.product')->orderBy('id','DESC')->get();

        return view('AdminPanel.Order.pending-order', [
            "orders" => $orders
        ]);
    }

    public function order_cancel()
    {


        // fetch data order model
        $orders = Order::where('status', 3)->with('order_to_product','order_to_product.product')->orderBy('id','DESC')->get();


        return view('AdminPanel.Order.cancel-order', [
            "orders" => $orders
        ]);
    }

    public function order_confirm()
    {


        // fetch data order model
        $orders = Order::where('status', 1)->with('order_to_product','order_to_product.product')->orderBy('id','DESC')->get();

        //return $orders;
        // return view
        return view('AdminPanel.Order.confirma-order', [
            "orders" => $orders
        ]);
    }

      public function order_success()
    {


        // fetch data order model
        $orders = Order::where('status', 2)->with('order_to_product','order_to_product.product')->orderBy('id','DESC')->get();

        return view('AdminPanel.Order.success-order', [
            "orders" => $orders
        ]);
    }


    public function approve($order_id){
    	$order = Order::find($order_id);

        // return $orders;

        if ($order->status == 0) {

                Order::where('id',$order->id)->update([
                    'status' => 1
                ]);


                $user = User::findOrFail($order->user_id );

                FCMService::send(
                    $user->device_token,
                    [
                        'title' => 'Order Accept',
                        'body' => 'Your order approve successfully',
                    ]
                );

        }


        return back()->with('message', 'Order Approve Successfully!');


    }


      //order status success = 2

    public function success($order_id){
    	$order = Order::find($order_id);
            if ($order->status == 1) {
                Order::where('id',$order->id)->update([
                    'status' => 2
                ]);
            }

            $user = User::findOrFail($order->user_id );

            FCMService::send(
                $user->device_token,
                [
                    'title' => 'Success',
                    'body' => 'Your order delivery successfully',
                ]
            );


        return back()->with('message', 'Order Delivery Successfully!');


    }

     //order status  cancel = 3

    public function cancel($order_id){
    	$order = Order::find($order_id);


        if ($order->status == 0) {
            Order::where('id',$order->id)->update([
                'status' => 3
            ]);

            $user = User::findOrFail($order->user_id );

            FCMService::send(
                $user->device_token,
                [
                    'title' => 'Cancel',
                    'body' => 'Your order cancel successfully',
                ]
            );
        }

   		return back()->with('message', 'This Order cancle Successfully!');

    }
}
