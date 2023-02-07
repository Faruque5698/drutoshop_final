<?php

namespace App\Http\Controllers\AdminPanel;

use App\Models\User;
use App\Services\FCMService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomerNotification;

class CustomerNotificationController extends Controller
{
    public function index()
    {
        return view('AdminPanel.Notification.sendNotificationToCustomer');
    }

    public function store(Request $request){

        $request->validate([
            "title" => "required",
            "body" => "required",
            "image"  => "required",
        ]);

        if($request->has('image')){
            $product_image = $request->file('image');
            $ext = $product_image->getClientOriginalExtension();
            $imageName = time().'-'.'.'.$ext;
            $directory = 'assets/images/product/';
            $imageUrl = $directory.$imageName;
            $product_image ->move($directory,$imageName);


            $notification = CustomerNotification::create([
                "title" => $request->title,
                "body" =>  $request->body,
                "image"  =>  $imageUrl,
            ]);

            //$users = User::all();

            $fcm_token = "c8HlPLSZSNSGSxogNeavog:APA91bHReNMCni23G00CdJi7g6G1c6QnjkhJt1OPzLUsnrbppvWDKpFQryp1m4m2cCBQKlZAeCvPZOKlc-XhvHI5pt5gWCjVe5lLT_qDgNeKTvadiEA9OQyAFbVyFaa6uM2QeTs9MJmX";

            // foreach ($users as $user){
                FCMService::send(
                    $fcm_token,
                    [
                        'title' => $notification->title,
                        'body' => $notification->body,
                        'image' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/640px-Image_created_with_a_mobile_phone.png',
                    ]
                );
            // }

            return back()->with('message', 'Notification Send Successfully');
        }

    }
}
