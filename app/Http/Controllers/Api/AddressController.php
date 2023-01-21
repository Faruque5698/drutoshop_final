<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\AddToCart;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function save(Request $request){
        $request->validate([
            'location_name' => 'required',
            'recever_name'=> 'required',
            'recever_phone'=> 'required',
            'recever_address'=> 'required',
            'latitude'=> 'required',
            'longitude'=> 'required',
        ]);

        $address = new Address();
        $address->user_id = auth()->user()->id;
        $address->location_name = $request->location_name;
        $address->recever_name = $request->recever_name;
        $address->recever_phone = $request->recever_phone;
        $address->recever_address = $request->recever_address;
        $address->latitude = $request->latitude;
        $address->longitude = $request->longitude;
        $address->save();

        return ApiResponse::success($address);
    }

    public function all(){
        $address = Address::where('user_id',auth()->user()->id)->get();
        if ($address->isEmpty()){
           return ApiResponse::not_found();
        }
        return ApiResponse::success($address);
    }

    public function remove($id)
    {
        $p = Address::find($id);
        $p->delete();
        $data = [];
        return ApiResponse::success($data);
    }
}
