<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AdminResetPass;
Use App\Models\User;
Use Notification;
use Carbon\Carbon;
use App\Notifications\AdminResetPassNotification;
use Hash;

class UserPasswordResetController extends Controller
{
     // Rest Password Method

    public function resetPassword(Request $request)
    {
       // Validation email

        $request->validate([
            "email" => "required|email",
        ]);


        // Check this email is registered or un registerd

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return  response()->json([
               'message'=>'U dont have registerd'
            ],422);
            
        }else{
            $password_rest = AdminResetPass::where('user_id',$user->id)->delete();

            $reset_password = AdminResetPass::create([
                "user_id" => $user->id,
                "token"   => rand(0, 99999),
                "created_at" => Carbon::now(),
            ]);

            Notification::send($user, new AdminResetPassNotification($reset_password));


            return  response()->json([
               'message'=>'Password reset token send your email'
            ],200);
        }

    }

     //Check Reset Password Token

    public function resetToken(Request $request)
    {
    	$reset_token = AdminResetPass::where('token', $request->token)->first();
    
    	
    	return ApiResponse::success($reset_token);
    }

    public function changePassword(Request $request){

    	$request->validate([
    		 'password' => 'required|string|min:8|confirmed',
    	]);

   
         $users = User::findOrFail($request->user_id);
    	 $users->password = Hash::make($request->password);
    	 $users->save();

    	 return ApiResponse::success($users);
    	 

    }

}
