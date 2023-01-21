<?php

namespace App\Models;

use App\Events\OrderStatusEvent;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    use HasFactory;



    public function order_to_product(){
    	return $this->hasMany(orderProduct::class, 'order_id','order_id');
    }
    public function order_to_user(){
    	return $this->hasOne(User::class, 'id', 'user_id');
    }

    protected  $dispatchesEvents = [
        'created'=>OrderStatusEvent::class,

    ];
}
