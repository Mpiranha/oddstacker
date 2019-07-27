<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockWinnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_winners', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position')->unsigned();
            $table->decimal('amount', 17, 2)->default(0.00);
            $table->integer('stock_id')->unsigned();
            $table->foreign('stock_id')->references('id')->on('stocks');
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
        Schema::dropIfExists('stock_winners');
    }
}
