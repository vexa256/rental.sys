<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('LocID');
            $table->bigInteger('Price_Monthly');
            $table->bigInteger('TenantCapacity');
            $table->bigInteger('OccupiedCapacity');
            $table->bigInteger('AvailableCapacity');
            $table->text('desc');
            $table->string('House');
            $table->string('HouseID');
            $table->string('RoomID');
            $table->string('status')->default('true');
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
        Schema::dropIfExists('houses');
    }
}
