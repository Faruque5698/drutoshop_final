<?php

namespace App\Http\Controllers\AdminPanel;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminResetPassNotification;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AdminResetPass;
use Carbon\Carbon;
use Hash;

class AdminForgetPassController extends Controller
{
    // Forget Password email Methode

    public function forgetEmail()
    {
    	return view("AdminPanel.Forget.index");
    }

    // Send Email 

    public function getEmail(Request $request)
    {

    	// Validation email

    	$request->validate([
    		"email" => "required|email",
    	]);


    	// Check this email is registered or un registerd

    	$user = User::where('email', $request->email)->first();

    	if (!$user) {
    		return back()->with('message', 'Please valid email address or register new account!');
	    	
    	}else{
    		$password_rest = AdminResetPass::where('user_id',$user->id)->delete();

	    	$reset_password = AdminResetPass::create([
	    		"user_id" => $user->id,
	    		"token"   => rand(0, 99999),
	    		"created_at" => Carbon::now(),
	    	]);

	    	Notification::send($user, new AdminResetPassNotification($reset_password));

	    	return view('AdminPanel.Forget.otp');
    	}

    }

    // check valid otp

    public function checkOTP(Request $request)
    {

    	$match_token = AdminResetPass::where('token',$request->token)->first();

    	if (!$match_token) {
    		return back()->with('message', 'Please Valid OTP Here!!!');
    	}else{
    		return view('AdminPanel.Forget.change-password', compact('match_token'));
    	}


    }

    public function changePass(Request $request)
    {

    	$request->validate([
    		 'password' => 'required|string|min:8|confirmed',
    	]);


    	User::where('id',$request->id)->update([
 			'password'   => Hash::make($request->password),
 			"updated_at" => Carbon::now(),
    	]);

    	return redirect()->route('login')->with('message', 'Password Change Successfully!!!');
    }


}
