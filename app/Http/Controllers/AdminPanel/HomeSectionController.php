<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;
use Image;

class HomeSectionController extends Controller
{
    public function home(){

        $home = Home::find(1);

        return view('AdminPanel.Home.Home',[
            'home'=>$home
        ]);
    }

    public function update_home(Request $request){
        $request->validate([
            'title1'=>'required',
            'title2'=>'required',
            'description'=>'required',
            'footer'=>'required',
        ]);


        $home = Home::find(1);
        $home_image = $request->file('image');


        if ($home == null){

            if ($home_image){
                $home = new Home();

//                $home_image = $request->file('image');
                $imageName = $home_image->getClientOriginalName();
                $directory = 'assets/images/homes/';
                $imageUrl = $directory . $imageName;
                Image::make($home_image)->resize(512, 512)->save($imageUrl);

                $home->id = 1;
                $home->title_1 = $request->title1;
                $home->title_2 = $request->title2;
                $home->description = $request->description;
                $home->image = $imageUrl;
                $home->footer = $request->footer;
                $home->save();
            }else{
                $home = new Home();
                $home->id = 1;
                $home->title_1 = $request->title1;
                $home->title_2 = $request->title2;
                $home->description = $request->description;
//                $homes->image = $imageUrl;
                $home->footer = $request->footer;
                $home->save();
            }


        }else{
            if ($home_image){
                unlink($home->image);
//                $home_image = $request->file('image');
                $imageName = date('mdYHis') . uniqid() . $home_image->getClientOriginalName();
                $directory = 'assets/images/homes/';
                $imageUrl = $directory . $imageName;
                Image::make($home_image)->resize(512, 512)->save($imageUrl);

//                $home->id = 1;
                $home->title_1 = $request->title1;
                $home->title_2 = $request->title2;
                $home->description = $request->description;
                $home->image = $imageUrl;
                $home->footer = $request->footer;
                $home->save();

            }else{
                $home->title_1 = $request->title1;
                $home->title_2 = $request->title2;
                $home->description = $request->description;
//                $homes->image = $imageUrl;
                $home->footer = $request->footer;
                $home->save();
            }
        }

        return redirect()->route('admin.homes')->with('message','Home Updated Successfully');

    }
}
