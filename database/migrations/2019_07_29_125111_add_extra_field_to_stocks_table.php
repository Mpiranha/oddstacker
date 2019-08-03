<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraFieldToStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stocks', function (Blueprint $table) {
            $table->boolean('full_entry')->default(false);
            $table->boolean('resulting_done')->default(false);
            $table->smallInteger('status')->default(0)
                ->comment('0 for stock not active, 1 for for active, 2 for canceled, 3 for concluded');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stocks', function (Blueprint $table) {
            $table->dropColumn('resulting_done');
            $table->dropColumn('full_entry');
            $table->dropColumn('status');
        });
    }
}
