<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\AdsBanner;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class AdsBannerController extends Controller
{
    public function index()
    {
        return view('AdminPanel.AdsBanner.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'banner_image'  => 'required',
        ]);


        if($request->file('banner_image')){
            $image = $request->file('banner_image');
            $image_ext = $image->getClientOriginalExtension();
            $image_name = 'ads'.time().".".$image_ext;
            $url = "Admin/image/";
            $db_path = $url.$image_name;
            $image ->move($url,$image_name);

            $ads_banner = AdsBanner::find(1);
            if($ads_banner->image){
                unlink($ads_banner->image);

                $ads_banner->image = $db_path;
                $ads_banner->save();
            }


            return back()->with('message','Ads Banner Add Successfully');
        }


    }
}
