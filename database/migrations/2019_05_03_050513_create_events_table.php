<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('teamA_id')->unsigned();
            $table->integer('teamB_id')->unsigned();
            $table->integer('league_id')->unsigned();
            $table->timestamp('event_schedule')->nullable();
            $table->foreign('teamA_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('teamB_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('league_id')->references('id')->on('leagues')->onDelete('cascade');
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
        Schema::dropIfExists('events');
    }
}
