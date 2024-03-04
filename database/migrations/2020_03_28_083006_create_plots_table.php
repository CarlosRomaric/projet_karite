<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plots', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedFloat('total_area');
            $table->string('gps_track')->nullable();
            $table->uuid('farmer_id');
            $table->foreign('farmer_id')->references('id')->on('farmers');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('latitude2')->nullable();
            $table->string('longitude2')->nullable();
            $table->string('date_track')->nullable();
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
        Schema::dropIfExists('plots');
    }
}
