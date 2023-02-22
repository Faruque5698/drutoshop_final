<?php

namespace App\Http\Controllers\Api;

use App\Models\Order;
use App\Models\Product;
use App\Models\AddToCart;
use App\Helper\ApiResponse;
use App\Models\ColorSizeQty;
use App\Models\orderProduct;
use App\Models\StockProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\FCMService;

class OrderController extends Controller
{
    public function cash_on_delivary(Request $request){
        $request->validate([
           'address'=>'required',
           'city'=>'required',
        ]);


        $order_id = 'ord-'.rand(1000,99999);


        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->order_id = $order_id;
        $order->address = $request->address;
        $order->city = $request->city;
        $order->payment_type = $request->payment_type;
        $order->isPaid = 0;
        $order->save();



        $carts = AddToCart::where('user_id','=',auth()->user()->id)->get();

        foreach ($carts as $cart){
            $order_product = new orderProduct();
            $order_product->order_id = $order->order_id;
            $order_product->product_id = $cart->product_id;
            $order_product->quantity = $cart->product_quantity;
            $order_product->total_price = $cart->product_total_price;
            $order_product->size = $cart->size;
            $order_product->color_code = $cart->color_code;
            $order_product->save() ;

//            All product Stock Manage
            $product = StockProduct::where('product_id','=',$cart->product_id)->first();
            $product->last_qty= $product->last_qty - $order_product->quantity;
            $product->sale_qty = $product->sale_qty + $order_product->quantity;
            $product->save();
//              Product Color size Stock Manage
            $pro_size_color = ColorSizeQty::where('product_id','=',$cart->product_id)->where('color_code','=', $cart->color_code)->where('size_name','=', $cart->size)->first();

            $pro_size_color->size_color_qty =  $pro_size_color->size_color_qty -  $cart->product_quantity;
            $pro_size_color->save();

//            return $pro_size_color;


            $cart->delete();


        }


        FCMService::send(
            auth()->user()->device_token,
            [
                'title' => 'Order Accept',
                'body' => 'Your order successfully',
            ]
        );

        $orders = Order::where('user_id','=',auth()->user()->id)->with('order_to_product', 'order_to_product.product')->get();
        return ApiResponse::success($orders);
    }


    public function order_all(Request $request){
       $orders = Order::where('user_id','=',auth()->user()->id)->with('order_to_product','order_to_product.product')->get();

        if ($orders->isEmpty()){
            $data = [];
            return ApiResponse::success($data);
        }else{
            return ApiResponse::success($orders);

        }
    }

    public function history(){
        $user_id = auth()->user()->id;
        $history = Order::where('user_id','=',$user_id)->with('order_to_product','order_to_product.product')->get();

        return ApiResponse::success($history);
    }

    public function pending(){
        $user_id = auth()->user()->id;
        $history = Order::where('user_id','=',$user_id)->where('status','=',0)->with('order_to_product','order_to_product.product')->get();
        if ($history -> isEmpty()){
                $data = [];
                return ApiResponse::success($data);
        }
        return ApiResponse::success($history);
    }

    public function confirm(){
        $user_id = auth()->user()->id;
        $history = Order::where('user_id','=',$user_id)->where('status','=',1)->with('order_to_product','order_to_product.product')->get();
        if ($history -> isEmpty()){
            $data = [];
            return ApiResponse::success($data);
        }
        return ApiResponse::success($history);
    }
    public function cancel(){
        $user_id = auth()->user()->id;
        $history = Order::where('user_id','=',$user_id)->where('status','=',3)->with('order_to_product','order_to_product.product')->get();
        if ($history -> isEmpty()){
            $data = [];
            return ApiResponse::success($data);
        }
        return ApiResponse::success($history);
    }
    public function success(){
        $user_id = auth()->user()->id;
        $history = Order::where('user_id','=',$user_id)->where('status','=',2)->with('order_to_product','order_to_product.product')->get();
        if ($history -> isEmpty()){
                $data = [];
                return ApiResponse::success($data);
        }
        return ApiResponse::success($history);
    }



}
