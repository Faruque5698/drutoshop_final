<?php

namespace App\Http\Controllers\AdminPanel;

use App\Helper\ApiResponse;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\FlashDeal;

class FlashDealController extends Controller
{
    public function index($id)
    {
        $product = Product::find($id);
        return view('AdminPanel.FlashDeal.flash_deal', compact('product'));
    }

    public function store(Request $request)
    {
        $product_info = Product::find($request->id);
        $flase_deal_price = ($product_info->price * ((int)$request->flash_deal / 100));


        FlashDeal::create([
            "product_id"  => $request->id,
            "flash_deal"  => $request->flash_deal,
            "end_date"    => $request->end_date,
            "flash_price"  => $flase_deal_price,
            "status"  => $request->status,
        ]);


        return back()->with('message', 'Flash Deal Add Successfully');
    }

    public function all_flash()
    {
        $flash_daels = FlashDeal::all();
        return view('AdminPanel.FlashDeal.all_flash', compact('flash_daels'));
    }

    public function deal20(){
        $flash = FlashDeal::where('flash_deal',20)->get();

        return ApiResponse::success($flash);
    }
    public function deal_20(){
        $flash = FlashDeal::where('flash_deal',20)->get();

        return ApiResponse::success($flash);
    }
    public function deal25(){
        $flash = FlashDeal::where('flash_deal',25)->get();

        return ApiResponse::success($flash);
    }
    public function deal30(){
        $flash = FlashDeal::where('flash_deal',30)->get();

        return ApiResponse::success($flash);
    }
    public function deal35(){
        $flash = FlashDeal::where('flash_deal',35)->get();

        return ApiResponse::success($flash);
    }
    public function deal40(){
        $flash = FlashDeal::where('flash_deal',40)->get();

        return ApiResponse::success($flash);
    }
    public function deal45(){
        $flash = FlashDeal::where('flash_deal',45)->get();

        return ApiResponse::success($flash);
    }
    public function deal50(){
        $flash = FlashDeal::where('flash_deal',50)->get();

        return ApiResponse::success($flash);
    }
}
