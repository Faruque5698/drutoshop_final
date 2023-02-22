<?php

namespace App\Http\Controllers\Api;

use App\Helper\ApiResponse;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;


class AuthController extends Controller
{
    public function login(Request $request){
        $loginData = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($loginData)) {
            return response(['message' => 'Invalid Credentials'],401);
        }



        $accessToken = auth()->user()->createToken('authToken')->accessToken;
        return response()->json([
            "status" => true,
            "message" => "Customer Logged Successfully",
            "user"=>auth()->user(),
            "token" => $accessToken
        ],200);
    }

    public function register(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $accessToken = $user->createToken('authToken')->accessToken;

        return response()->json([
            'status'=>true,
            'message'=>'Registration Successful',
            'user'=>$user,
            'accessToken'=>$accessToken
        ],200);
    }


    public function profile(){
        $user_data = auth()->user();
        if($user_data){
            return response()->json([
                'status'=>true,
                'message'=>'User Data',
                'data'=>$user_data
            ],200);
        }else{
            return  response()->json([
               'message'=>'U dont have access'
            ],401);
        }


    }

    public function logout(Request $request){

        $token = $request->user()->token();

//        revoke this token
        $token->revoke();

        return response()->json([
            'status'=>true,
            'message'=>"User Logged Out Successfully"
        ],200);
    }

    public function  edit(Request $request){

        $user = auth()->user();
        $user->name = $request->username;
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->mobile_no = $request->mobile_no;
        $user->dob = $request->dob;
        $user->gender = $request->gender;
        $user->save();
//        $user->username = $request->username;

//        return $user->role;
        return ApiResponse::success($user);
    }

    public function imageUpdate(Request $request){
        $request->validate(
            [
             'image'=>'required|image'
            ]
        );
        $user= auth()->user();
        if ($user->image){
            unlink($user->image);
        }
        $image =  $request->file('image');
//        return $logo;

        $directory = 'assets/images/profile/';
        $imageName = uniqid().$image->getClientOriginalName();
        $imageUrl = $directory.$imageName;
        Image::make($image)->resize(450,450)->save($imageUrl);
        $user->image = $imageUrl;

        $user->save();

        return ApiResponse::success($user);

    }



    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        $user = auth()->user();
        $user->password = Hash::make($request->password);
        $user->save();

        return ApiResponse::success($user);

    }

    public function deviceToken(Request $request)
    {
        $this->validate($request,[
            "user_id"           => "required|integer",
            "device_token"      => "required|string",
        ]);

        User::where('id', $request->user_id)->update([
            "device_token" => $request->device_token,
        ]);

        return response()->json([
            "status" => 200,
            "message" => "Device token save successfully!",
        ]);
    }



}
