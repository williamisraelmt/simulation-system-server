<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePosibilitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posibilities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("description");
            $table->boolean('is_success')->nullable()->default(true);
            $table->boolean('time_exceeding_probability')->nullable()->default(false);
            $table->float('min_interval');
            $table->float('max_interval');
            $table->unsignedBigInteger('service_phase_id');
            $table->unsignedBigInteger('next_service_phase_id');
            $table->timestamps();
        });

        Schema::table('posibilities', function (Blueprint $table) {
            $table->foreign('service_phase_id')->references('id')->on('service_phases');
            $table->foreign('next_service_phase_id')->references('id')->on('service_phases');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posibilities');
    }
}
