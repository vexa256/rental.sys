<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_schedules', function (Blueprint $table) {
            $table->id();

            for ($m = 1; $m <= 12; ++$m) {
                $a = date('M', mktime(0, 0, 0, $m, 1));
                $table->string($a)->default('unused');
            }

            $table->string('PaymentID');
            $table->string('PaidForMarked')->default('false');
            $table->string('PricePerMonth');
            $table->string('HouseID');
            $table->string('status')->default('true');
            $table->string('RoomID');
            $table->string('LocID');
            $table->string('TenantID');
            $table->bigInteger('defaulted_amount')->default(0);
            $table->string('Payment_Year');
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
        Schema::dropIfExists('payment_schedules');
    }
}
