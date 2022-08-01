<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_assignments', function (Blueprint $table) {
            $table->id();
            $table->string('RoomID');
            $table->string('TenantID');
            $table->string('locID');
            $table->string('HouseID');
            $table->string('AssignID');
            $table->string('RoomNo')->nullable()->unique();

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
        Schema::dropIfExists('property_assignments');
    }
}
