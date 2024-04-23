<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('identifier')->unique()->nullable();
            $table->string('fullname');
            $table->string('picture');
            $table->string('born_date', 100)->nullable();
            $table->string('born_place', 100)->nullable();
            $table->string('locality')->nullable();
            $table->string('activity')->nullable();
            $table->string('phone', 25);
            $table->string('sexe', 10)->nullable();
            $table->uuid('agribusiness_id')->nullable();
            $table->foreign('agribusiness_id')->references('id')->on('agribusinesses');
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
        Schema::dropIfExists('farmers');
    }
}
