<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('product_name', 255);
            $table->integer('brand_id')->nullable();
            $table->integer('category_id');
            $table->integer('subcategory_id')->nullable();
            $table->json('size')->nullable();
            $table->json('color')->nullable();
            $table->float('price',10,2);
            $table->float('discount_rate',10,2);
            $table->integer('quantity');
            $table->float('discount_price',10,2);
            $table->text('discription');
            $table->string('image');
            $table->json('images')->nullable();
            $table->string('slug');
            $table->string('sku');
            $table->string('credit');
            $table->float('total_price',10,2);
            $table->tinyInteger('feature_product')->default(0);
            $table->tinyInteger('trand_product')->default(0);
            $table->tinyInteger('exclusive_product')->default(0);
            $table->enum('status',['active','inactive'])->default('active');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
