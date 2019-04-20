<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventPredictionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_predictions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stock_id')->references('id')->on('stocks')->onDelete('cascade');
            $table->integer('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->integer('prediction_id')->references('id')->on('predictions');
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
        Schema::dropIfExists('event_predictions');
    }
}
