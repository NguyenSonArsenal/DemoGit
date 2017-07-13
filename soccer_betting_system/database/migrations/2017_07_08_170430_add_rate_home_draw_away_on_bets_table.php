<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRateHomeDrawAwayOnBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bets', function(Blueprint $table){
            $table->float('rate_home')->nullable();
            $table->float('rate_draw')->nullable();
            $table->float('rate_away')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bets', function($table) {
            $table->dropColumn('rate_home');
            $table->dropColumn('rate_draw');
            $table->dropColumn('rate_away');
        });
    }
}
