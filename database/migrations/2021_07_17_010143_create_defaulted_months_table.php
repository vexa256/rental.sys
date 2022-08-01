<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDefaultedMonthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('defaulted_months', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('defaulted_amount')->default(0);
            $table->string('RoomID');
            $table->string('HouseID');
            $table->string('PaymentID');
            $table->string('LocID');
            $table->string('TenantID');
            $table->string('DefaultedYear');
            $table->string('Month');
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
        Schema::dropIfExists('defaulted_months');
    }
}
