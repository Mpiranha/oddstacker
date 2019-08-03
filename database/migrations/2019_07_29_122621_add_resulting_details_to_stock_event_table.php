<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddResultingDetailsToStockEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('stock_events', function (Blueprint $table) {
            $table->integer('ft_teamA_score')->default(0);
            $table->integer('ft_teamB_score')->default(0);
            $table->smallInteger('prediction_status')->default(0)->comment('0 for null, 1 for win, 2 for loss');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stock_events', function (Blueprint $table) {
            $table->dropColumn('ft_teamA_score');
            $table->dropColumn('ft_teamB_score');
            $table->dropColumn('prediction_status');
        });
    }
}
