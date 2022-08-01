<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('tenant');
            $table->string('id_type');
            $table->string('Idscan');
            $table->string('Email')->default('NOT APPLICABLE');
            $table->string('Occupation');
            $table->string('Phone');
            $table->bigInteger('Occupants');
            $table->string('Nationality');
            $table->string('Sex');
            $table->string('TenantID');

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
        Schema::dropIfExists('tenants');
    }
}
