<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Helper\ApiResponse;

class BannerController extends Controller
{
    public function banner()
    {
    	$banners = Banner::all();


    	$banner_arr = [];

    	foreach ($banners as $banner) {
    		 $banner_arr[] = $banner->photo;
    	}

    	return ApiResponse::success($banner_arr);
    }
}
