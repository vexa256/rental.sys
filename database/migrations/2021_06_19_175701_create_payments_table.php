<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('HouseID');
            $table->string('status')->default('true');
            $table->string('RoomID');
            $table->string('TenantID');
            $table->string('Month');
            $table->string('Year');
            $table->bigInteger('Amount');
            $table->string('desc')->default('Tenant has paid for the given month');

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
        Schema::dropIfExists('payments');
    }
}
