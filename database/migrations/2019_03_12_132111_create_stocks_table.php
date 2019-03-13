<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->double('value', 12, 0);
            $table->double('stake', 12, 0);
            $table->string('margin');
            $table->integer('entry')->unsigned()->default(0);
            $table->integer('closes_at');
            $table->string('code');
            $table->integer('category_id')->unisgned()
                ->references('id')->on('stock_categories')->onDelete('cascade');
            $table->double('commission', 4, 2);
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
        Schema::dropIfExists('stocks');
    }
}
