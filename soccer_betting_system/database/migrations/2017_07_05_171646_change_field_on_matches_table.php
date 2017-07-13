<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFieldOnMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('matches', function ($table) {
            $table->integer('bet_id')->nullable()->default('0')->change();
            $table->integer('team_id')->nullable()->default('0')->change();
            //$table->timestamp('time_start_match')->change();
            //$table->timestamp('time_end_match')->change();
            //$table->timestamp('time_end_bet')->change();
            $table->integer('home_score')->nullable()->change();
            $table->integer('away_score')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
    }
}
