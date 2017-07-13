<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table='users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    // Many to many with matches table
    public function matches()
    {
        return $this->belongstoMany('App\Match','bets');
    }

    public function bets()
    {
        return $this->hasMany('App\Bet');
    }


    // function updateMoneyUserAfterBet()
    // {
    //     $user = new User();
    
    //     $user_money = $user->money;

    //     return $user_money;

    // }




}
