<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicePhasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_phases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('phase_id');
            $table->timestamps();
        });

        Schema::table('posibility_recommendations', function (Blueprint $table){
            $table->foreign('service_id')->references('id')->on('services');
            $table->foreign('phase_id')->references('id')->on('phases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_phases');
    }
}
