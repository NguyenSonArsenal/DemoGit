<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveChooseTeamAndMoneyUserBetOnBetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bets', function($table) {
             $table->dropColumn('choose_team');
             $table->dropColumn('money_user_bet');
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
            $table->integer('choose_team');
            $table->integer('money_user_bet');
        });
    }
}
