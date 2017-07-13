<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Match;
use App\User;
use App\Bet;

class UserController extends Controller
{
    
    function index()
    {

        $matches = Match::all(); //eloquent collections

        $count_match = count($matches);

        $count_user_bet_match = array();

        for($i = 0; $i<$count_match; $i++) {

            $count_user_bet_match[$matches[$i]->id] = $matches[$i]->bets->count();
        
        }
        
        return view('user.index', compact('matches', 'count_user_bet_match'));
    }

    function showDetail($id)
    {
        //dd(111);
        return view('user.detail');
    }


    function historyBetOfUser($id)
    {

        $user = User::findOrFail($id);

        //$user_bet

        $matches = $user->matches;

        //dd($matches);

        return view('user.history', compact('user','matches'));
    }


    function updateAccountUser()
    {
        return view('user.update_account');
    }



}
