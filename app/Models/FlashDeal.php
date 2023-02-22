<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FlashDeal extends Model
{
    use HasFactory;

    protected $guarded = ["id"];

    protected $casts = [
         'end_date' => 'datetime',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id', 'id');
    }
}
