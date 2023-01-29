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
     DB::unprepared('
      CREATE TRIGGER insert_into_orders AFTER INSERT ON reservations FOR EACH ROW
      BEGIN
      INSERT INTO orders VALUES (order_id, new.customer_id, user_id, new.created_at, new.updated_at);
      END
     ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      DB::unprepared('DROP TRIGGER "insert_into_orders"');
    }
};
