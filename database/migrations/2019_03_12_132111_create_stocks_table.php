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
            $table->decimal('amount', 17, 2);
            $table->decimal('value', 17, 2);
            $table->decimal('commission', 17, 2);
            $table->decimal('stake', 17, 2);
            $table->integer('entry')->unsigned()->default(0);
            $table->string('code');
            $table->dateTime('schedule_date')->nullable();
            $table->integer('stock_type')->unisgned()
                ->references('id')->on('stock_types')->onDelete('cascade');
            $table->enum('expand', ['expand', 'end', 'duplicate'])->default('end');
            $table->integer('expand_by')->unsigned()->default(0);
            $table->integer('expand_multiple')->unsigned()->default(0);
            $table->integer('category_id')->unisgned()
                ->references('id')->on('stock_categories')->onDelete('cascade');
            $table->integer('no_winners')->unsigned()->default(1);
            $table->boolean('is_show')->default(false);
            $table->boolean('bonus')->default(false);
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
