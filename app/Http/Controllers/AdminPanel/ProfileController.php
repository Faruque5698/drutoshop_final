<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Hash;
use Auth;

class ProfileController extends Controller
{
    public function profile()
    {

    	$profile = User::with('user')->find(auth()->user()->id);

    	return view('AdminPanel.Profile.index', compact("profile"));
    }





    public function profileUpdate(Request $request)
    {

 
	    if ($request->file('image')) {
	     	$file = $request->file('image');
	     	$filename= date('YmdHi')."-".$file->getClientOriginalName();
	     	$directory = 'Admin/image/Profile/';
	     	$imageUrl = $directory.$filename;
	        $file->move($directory,$filename);

	           $user = User::find($request->id);
			   $user->name = $request->name;
			   $user->password = isset($request->password) ? Hash::make($request->password) : $user->password;
			   $user->image = $imageUrl;
			   $user->save();
			   $user->user()->updateOrCreate(['user_id'=> Auth::user()->id],[
				    "address_name" => $request->address_name,
			   		"address" => $request->address,
			   		"zipcode" => $request->zipcode,
			   		"city" => $request->city,
				]);


	    }else{
		   $user = User::find($request->id);
		   $user->name = $request->name;
		   $user->password = isset($request->password) ? Hash::make($request->password) : $user->password;
		   $user->save();
		   $user->user()->updateOrCreate(['user_id'=> Auth::user()->id],[
			    "address_name" => $request->address_name,
		   		"address" => $request->address,
		   		"zipcode" => $request->zipcode,
		   		"city" => $request->city,
			]);


	    }


	    return back()->with('message', 'Profile Update Successfully');

	   

    }
}
