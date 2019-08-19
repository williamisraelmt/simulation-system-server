<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimulationServicePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulation_service_people', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('service_cashier');
            $table->boolean('available')->nullable()->default(true);
            $table->unsignedBigInteger('simulation_id');
            $table->timestamps();
        });

        Schema::table('simulation_service_people', function (Blueprint $table){
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
        Schema::dropIfExists('simulation_service_people');
    }
}
