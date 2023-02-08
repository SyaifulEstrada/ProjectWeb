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
        Schema::create('food_items', function (Blueprint $table) {
            $table->id('food_id');
            $table->string('name');
            $table->unsignedBigInteger('id_invoice');
            $table->foreign('id_invoice')->references('id_invoice')->on('payments')->onDelete('cascade')->onUpdate('cascade');
            $table->string('image')->nullable();
            $table->string('ingredients_name', 255);
            $table->integer('quantity');
            $table->bigInteger('price');
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
        Schema::dropIfExists('food_items');
    }
};
