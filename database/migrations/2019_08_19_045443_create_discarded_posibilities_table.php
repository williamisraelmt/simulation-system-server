<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiscardedPosibilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('discarded_posibilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('simulation_detail_id');
            $table->timestamps();
        });

        Schema::table('discarded_posibilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreign('simulation_detail_id')->references('id')->on('simulation_details');
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
        Schema::dropIfExists('discarded_posibilities');
    }
}
