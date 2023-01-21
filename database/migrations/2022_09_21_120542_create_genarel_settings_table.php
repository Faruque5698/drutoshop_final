<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenarelSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genarel_settings', function (Blueprint $table) {
            $table->id();
            $table->string('website_name')->nullable();
            $table->string('company_email')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('fax_no')->nullable();
            $table->string('footer_text')->nullable();
            $table->string('address')->nullable();
            $table->string('fav_icon')->nullable();
            $table->string('logo')->nullable();
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
        Schema::dropIfExists('genarel_settings');
    }
}
