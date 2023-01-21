<?php

namespace App\Http\Controllers\AdminPanel;

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
}
