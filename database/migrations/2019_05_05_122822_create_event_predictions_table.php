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
            $table->integer('event_id')->unsigned();
            $table->integer('prediction_id')->unsigned();
            $table->enum('rating', ['undefined', 'unlikely', 'fifty', 'likely'])->default('undefined');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('prediction_id')->references('id')->on('predictions')->onDelete('cascade');
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
