<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('mobile_no')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->mediumText('address')->nullable();
            $table->string('password')->nullable();
            $table->text('image')->nullable();
            $table->tinyInteger('role')->default(0);
            $table->tinyInteger('isBan')->default(1);
            $table->tinyInteger('is_delete')->default(1);
            $table->tinyInteger('status')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
