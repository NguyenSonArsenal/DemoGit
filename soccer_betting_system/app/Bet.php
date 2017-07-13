<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bet extends Model
{

	protected $table='bets';

    protected $fillable = [
        'user_id', 'match_id', 'rate_home', 'rate_draw', 'rate_away', 
    ];

    

}
