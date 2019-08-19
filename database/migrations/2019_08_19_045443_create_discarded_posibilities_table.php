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
            $table->unsignedBigInteger('simulation_detail_id');
            $table->unsignedBigInteger('posibility_id');
            $table->timestamps();
        });

        Schema::table('discarded_posibilities', function (Blueprint $table) {
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
        Schema::dropIfExists('discarded_posibilities');
    }
}
