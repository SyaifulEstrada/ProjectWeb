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
        Schema::create('reservation_payments', function (Blueprint $table) {
            $table->id('id_invoice');
            $table->string('payment_date');
            $table->decimal('payment_amount');
            $table->unsignedBigInteger('customer_id');
            $table->integer('no_of_guest');
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
        Schema::dropIfExists('reservation_payments');
    }
};
