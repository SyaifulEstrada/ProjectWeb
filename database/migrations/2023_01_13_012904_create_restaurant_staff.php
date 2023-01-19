<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_staff', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('name');
            $table->string('gender');
            $table->string('email');
            $table->string('password');
            $table->string('phone');
            $table->string('address');
            $table->unsignedBigInteger('menu_id')->nullable();
            $table->foreign('menu_id')->references('menu_id')->on('menus')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('restaurant_staff');
    }
};
