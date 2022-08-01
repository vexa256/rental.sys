<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_rooms', function (Blueprint $table) {
            $table->id();

            $table->string('RoomID');
            $table->string('SetupName');
            $table->bigInteger('Rooms');
            $table->bigInteger('BathRooms');
            $table->bigInteger('Kitchen');
            $table->bigInteger('DiningRoom');
            $table->bigInteger('Store');
            $table->bigInteger('ExtraRooms');

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
        Schema::dropIfExists('house_rooms');
    }
}
