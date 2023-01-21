<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderProduct extends Model
{
    use HasFactory;

    protected $guared = ['id'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
