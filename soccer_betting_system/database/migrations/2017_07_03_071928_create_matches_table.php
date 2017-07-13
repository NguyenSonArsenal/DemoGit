<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->string('home_team_id');
            $table->string('away_team_id');
            $table->integer('bet_id')->nullable()->default('0')->change();
            $table->integer('team_id')->nullable()->default('0')->change();
            $table->integer('bet_home');
            $table->integer('bet_draw');
            $table->integer('bet_away');
            $table->timestamp('time_start_match')->change();
            $table->timestamp('time_end_match')->change();
            //$table->timestamp('time_start_bet')->nullable(); // dropped
            $table->timestamp('time_end_bet')->change();
            $table->integer('home_score')->nullable()->default('')->change();
            $table->integer('away_score')->nullable()->default('')->change();   
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
        Schema::dropIfExists('matches');
    }
}
