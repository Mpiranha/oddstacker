<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leagues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->string('logo', 255)->nullable();
            $table->integer('country_id')->unsigned();
            $table->integer('sport_id')->unsigned();
            $table->foreign('country_id')->references('id')->on( 'countries')->onDelete('cascade');
            $table->foreign( 'sport_id')->references('id')->on( 'sports')->onDelete('cascade');
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
        Schema::dropIfExists('leagues');
    }
}
