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
        id	client_id	service_phase_id	done	start_time	end_time
        Schema::create('simulation_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('client_id');
            $table->phase_id('client_id');
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
        Schema::dropIfExists('simulation_details');
    }
}
