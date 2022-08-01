<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defaulters', function (Blueprint $table) {
            $table->id();
            $table->string('defaultersID');
            $table->string('HouseID');
            $table->string('RoomID');
            $table->string('LocID');
            $table->string('TenantID');
            $table->date('default_date');
            $table->string('Year');
            $table->string('Month');
            $table->bigInteger('Amount');

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
        Schema::dropIfExists('defaulters');
    }
}
