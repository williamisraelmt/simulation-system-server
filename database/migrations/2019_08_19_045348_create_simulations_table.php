<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSimulationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('simulations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('service_people');
            $table->integer('max_in_room_customers');
            $table->integer('max_customers');
            $table->unsignedBigInteger('schedule_id');
            $table->timestamps();
        });

        Schema::table('simulations', function (Blueprint $table) {
           $table->foreign('schedule_id')->references('id')->on('schedules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('simulations');
    }
}
