<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function add(Request $request){
        $user_id = auth()->user()->id;
        $product_id = $request->product_id;
        $rate = $request->rating;

        $r = Rating::where('user_id','=',$user_id)->where('product_id','=',$product_id)->first();
        if ($r){
            $code = 409;
            $message = "You all ready rate this product";
            return ApiResponse::error($code,$message);
        }

        $rat = new Rating();

        $rat->user_id = $user_id;
        $rat->product_id = $product_id;
        $rat->rating = $rate;
        $rat->save();

        $p = Rating::where('product_id','=',$product_id)->get();
        $sum = Rating::where('product_id','=',$product_id)->sum('rating');

        $c = count($p);
        $rating = $sum/$c;
        $rating2 = (float)$rating;
//        $s = sum($p->rating);
        $product = Product::find($product_id);
        $product->rate = $rating2;
        $product->save();

        return ApiResponse::success($rat);

    }
}
