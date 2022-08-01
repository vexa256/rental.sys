<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOccupanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('occupancies', function (Blueprint $table) {
            $table->id();
            $table->string('HouseID');
            $table->string('TenantID');
            $table->string('RoomID');
            $table->string('AssignmentID');
            $table->string('counted')->default('false');
            $table->string('LocID')->nullable();
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
        Schema::dropIfExists('occupancies');
    }
}
