<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimulationDetailLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('simulation_detail_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->time('start_time');
            $table->time('end_time')->nullable();
            $table->unsignedBigInteger('service_phase_id')->nullable();
            $table->unsignedBigInteger('simulation_detail_id');
            $table->unsignedBigInteger('posibility_id')->nullable();
            $table->timestamps();
        });

        Schema::table('simulation_detail_logs', function (Blueprint $table){
            $table->foreign('service_phase_id')->references('id')->on('service_phases');
            $table->foreign('simulation_detail_id')->references('id')->on('simulation_details');
            $table->foreign('posibility_id')->references('id')->on('posibilities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('simulation_detail_logs');
    }
}
