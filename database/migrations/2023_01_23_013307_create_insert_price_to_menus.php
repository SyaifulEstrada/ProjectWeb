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
          CREATE TRIGGER price_store AFTER INSERT ON food_items FOR EACH ROW
          BEGIN
            INSERT INTO menus VALUES (menu_id, new.price, new.food_id, new.created_at, new.updated_at);
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
      DB::unprepared('DROP TRIGGER "price_store"');
    }
};
