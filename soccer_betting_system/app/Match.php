<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{

	protected $table='matches';

    protected $fillable = [
        'home_team_id', 'away_team_id', 'bet_home', 'bet_draw','bet_away','time_start_match', 'time_end_match', 'home_score','away_score', 'active'
    ];


    //Many to many with users table
    public function users()
    {
        return $this->belongstoMany('App\User','bets');
    }

    public function bets()
    {
        return $this->hasMany('App\Bet');
    }


    public function countUserBet($id)
    {
    	return Match::find($id)->bets()->count;
    }

}
