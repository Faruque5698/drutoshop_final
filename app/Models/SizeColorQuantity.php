<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Color;
use App\Models\Size;

class SizeColorQuantity extends Model
{
    use HasFactory;
    protected $fillable = ['size_id','color_id','size_color_quantity'];


     public function product_color(){
        return $this->hasMany(Color::class);
    }
     public function product_size(){
        return $this->hasMany(Size::class);
    }
}
