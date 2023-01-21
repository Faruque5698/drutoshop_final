<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class AddToCart extends Model
{
    use HasFactory;

    public function products()
    {
    	return $this->belongsTo(Product::class, 'product_id','id');
    }
}
