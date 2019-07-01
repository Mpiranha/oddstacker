<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('n/a');
            $table->decimal('odd', 4, 2)->default(2.00);
            $table->integer('boxes')->unsigned()->default(0);
            $table->integer('tie_breaker')->default(5);
            $table->integer('tie_breaker_one')->default(2);
            $table->integer('tie_breaker_two')->default(3);
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
        Schema::dropIfExists('stock_categories');
    }
}
