<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePushersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pushers', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable();
            $table->text('app_id')->nullable();
            $table->text('secret')->nullable();
            $table->text('key')->nullable();
            $table->text('cluster')->nullable();
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
        Schema::dropIfExists('pushers');
    }
}
