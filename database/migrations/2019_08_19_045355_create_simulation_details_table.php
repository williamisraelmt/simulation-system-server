<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimulationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulation_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('client');
            $table->boolean('done')->nullable()->default(false);
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->unsignedBigInteger('service_phase_id')->nullable();
            $table->unsignedBigInteger('simulation_service_people_id')->nullable();
            $table->unsignedBigInteger('simulation_id');
            $table->timestamps();
        });

        Schema::table('simulation_details', function (Blueprint $table){
            $table->foreign('service_phase_id')->references('id')->on('service_phases');
            $table->foreign('simulation_service_people_id')->references('id')->on('simulation_service_people');
            $table->foreign('simulation_id')->references('id')->on('simulations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('simulation_details');
    }
}
