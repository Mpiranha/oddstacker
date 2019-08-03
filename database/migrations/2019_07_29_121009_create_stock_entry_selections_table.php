<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStockEntrySelectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_entry_selections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('stock_id')->unisgned()
                ->references('id')->on('stocks')->onDelete('cascade');
            $table->integer('entry_id')->unisgned()
                ->references('id')->on('stock_entries')->onDelete('cascade');
            $table->integer('stock_event_id')->unisgned()
                ->references('id')->on('stock_events')->onDelete('cascade');
            $table->decimal('odd', 4, 2)->default(0.00);
            $table->boolean('tie_breaker')->default(false);
            $table->boolean('won')->default(false);
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
        Schema::dropIfExists('stock_entry_selections');
    }
}
