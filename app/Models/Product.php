<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\GalleryProduct;
use App\Models\ColorSizeQty;
use App\Models\StockProduct;
use App\Models\Size;
use App\Models\Color;


class Product extends Model
{
    use HasFactory;


    protected $guarded = ["id"];


    public function productToBrand(){
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }
    public function productToCategory(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function productToSubcategory(){
        return $this->belongsTo(Subcategory::class, 'subcategory_id', 'id');
    }


    public function size_color_qty_product(){
        return $this->hasMany(ColorSizeQty::class);
    }

    public function color_per_size(){
        return $this->hasMany(ColorPerSize::class);
    }

    public function favouriteProduct(){
        return $this->hasMany(FavouriteProduct::class);
    }

    public function product_stock(){
        return $this->hasOne(StockProduct::class);
    }

    public function rating()
    {
        return $this->hasOne(Rating::class,'product_id','id');
    }



    protected $casts = [
        'images' => "json",
    ];
}
