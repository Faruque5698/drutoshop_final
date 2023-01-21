<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){
        $category = Category::with('subcategroy')->where('status','=','active')->get();
//        $cat = ['category'=>$category];
        return ApiResponse::success($category);
    }
    public function subcatProduct($id){
        $products = Product::with('productToCategory','productToSubcategory','productToBrand')->where('subcategory_id','=',$id)->where('status','=','active')->get();
        return ApiResponse::success($products);
    }
    public function brand(){
        $brands = Brand::where('status','=','active')->get();
        return ApiResponse::success($brands);

    }

    public function brandProduct($id){
        $product = Product::with('productToCategory','productToSubcategory','productToBrand')->where('brand_id','=',$id)->where('status','=','active')->get();
        return ApiResponse::success($product);

    }

}
