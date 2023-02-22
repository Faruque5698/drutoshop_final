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

        $this->validate($request, [
            "product_id" => "required|integer",
            "flash_deal" => "required|string",
            "starting_date" => "required",
            "end_date"   => "required",
            "flash_price" => "required",
        ]);

        $product_info = Product::find($request->id);
        $flase_deal_price = ($product_info->price * ((int)$request->flash_deal / 100));

        $check_deal = FlashDeal::where('product_id',$request->id)->first();
        if($check_deal){
            FlashDeal::where('id', $check_deal->id)->update([
                "product_id"     => $request->id,
                "flash_deal"     => $request->flash_deal,
                "starting_date"  => $request->starting_date,
                "end_date"       => $request->end_date,
                "flash_price"    => $flase_deal_price,
                "status"         => $request->status,
            ]);
        }else{
            FlashDeal::create([
                "product_id"     => $request->id,
                "flash_deal"     => $request->flash_deal,
                "starting_date"  => $request->starting_date,
                "end_date"       => $request->end_date,
                "flash_price"    => $flase_deal_price,
                "status"         => $request->status,
            ]);

        }
        return back()->with('message', 'Flash Deal Add Successfully');
    }

    public function edit($id)
    {
        $edit = FlashDeal::find($id);
        return view('AdminPanel.FlashDeal.edit', compact('edit'));
    }

    public function update(Request $request){


        $product_info = Product::find($request->product_id);
        $flase_deal_price = ($product_info->price * ((int)$request->flash_deal / 100));

        FlashDeal::where('id', $request->id)->update([
            "product_id"     => $request->product_id,
            "flash_deal"     => $request->flash_deal,
            "starting_date"  => $request->starting_date,
            "end_date"       => $request->end_date,
            "flash_price"    => $flase_deal_price,
            "status"         => $request->status,
        ]);

        return back()->with('message', 'Flash Deal Update Successfully');
    }




    public function all_flash()
    {
        $flash_daels = FlashDeal::all();
        return view('AdminPanel.FlashDeal.all_flash', compact('flash_daels'));
    }

    public function deal20(){
        $now = date('Y-m-d H:i:s');
        $flash = FlashDeal::where('flash_deal',20)
        ->where('end_date', '>=', $now)
        ->with('product', 'product.productToBrand','product.productToCategory','product.productToSubcategory','product.color_per_size','product.rating')
        ->get();

        return ApiResponse::success($flash);
    }
    public function deal_20(){
        $now = date('Y-m-d H:i:s');
        $flash = FlashDeal::where('flash_deal',20)
        ->where('end_date', '>=', $now)
        ->with('product', 'product.productToBrand','product.productToCategory','product.productToSubcategory','product.color_per_size','product.rating')
        ->get();

        return ApiResponse::success($flash);
    }
    public function deal25(){
        $now = date('Y-m-d H:i:s');
        $flash = FlashDeal::where('flash_deal',25)
        ->where('end_date', '>=', $now)
        ->with('product', 'product.productToBrand','product.productToCategory','product.productToSubcategory','product.color_per_size','product.rating')
        ->get();

        return ApiResponse::success($flash);
    }
    public function deal30(){
        $now = date('Y-m-d H:i:s');
        $flash = FlashDeal::where('flash_deal',30)
        ->where('end_date', '>=', $now)
        ->with('product', 'product.productToBrand','product.productToCategory','product.productToSubcategory','product.color_per_size','product.rating')
        ->with('product')
        ->get();

        return ApiResponse::success($flash);
    }
    public function deal35(){
        $now = date('Y-m-d H:i:s');
        $flash = FlashDeal::where('flash_deal',35)
        ->where('end_date', '>=', $now)
        ->with('product', 'product.productToBrand','product.productToCategory','product.productToSubcategory','product.color_per_size','product.rating')
        ->get();

        return ApiResponse::success($flash);
    }
    public function deal40(){
        $now = date('Y-m-d H:i:s');
        $flash = FlashDeal::where('flash_deal',40)
        ->where('end_date', '>=', $now)
        ->with('product', 'product.productToBrand','product.productToCategory','product.productToSubcategory','product.color_per_size','product.rating')
        ->get();

        return ApiResponse::success($flash);
    }
    public function deal45(){
        $now = date('Y-m-d H:i:s');
        $flash = FlashDeal::where('flash_deal',45)
        ->where('end_date', '>=', $now)
        ->with('product', 'product.productToBrand','product.productToCategory','product.productToSubcategory','product.color_per_size','product.rating')
        ->get();

        return ApiResponse::success($flash);
    }
    public function deal50(){
        $now = date('Y-m-d H:i:s');
        $flash = FlashDeal::where('flash_deal',50)
        ->where('end_date', '>=', $now)
        ->with('product', 'product.productToBrand','product.productToCategory','product.productToSubcategory','product.color_per_size','product.rating')
        ->get();

        return ApiResponse::success($flash);
    }
}
