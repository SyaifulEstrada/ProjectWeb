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
        Schema::create('order_items', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->nullable();
            $table->unsignedBigInteger('food_id')->nullable();
            $table->bigInteger('quantity');
            $table->decimal('unit_price');
            $table->string('ingredients_name', 255);
            $table->string('customer_name', 255);
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('food_id')->references('food_id')->on('food_items')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('order_items');
    }
};
