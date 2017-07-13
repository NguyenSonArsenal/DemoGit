@extends('layouts.user')

@section('title', 'History')

<link href="{{ asset('css/user/history.css') }}" rel="stylesheet">

@include('includes/form_lib_bootstrap_toggle')

@if($user = Auth::user())
    @php
        $username = $user->username;
        
        $user_money = $user->money;

        $user_id = $user->id;
        // Count number match user bet
        $count_match_user_bet=0;
        foreach ($user->matches as $match) {
            if($count = $match->home_team_id){
                $count_match_user_bet ++ ;
            } 
        }

    @endphp
@endif

@section('content')




<div class="wrapper">
@php
    $STT = 1;
@endphp
    
    <h2 class="title">Total money : <b>{{$user_money}} $</b></h2>

    <h3>User_id: <b>{{$user_id}}</b> </h3>
    <h3>Number bet: <b>{{$count_match_user_bet}}</b> </h3>

    {{-- {{ dd($user->id)}} --}}

    <div class="content_betting">
        
        @if($count_match_user_bet > 0)

            <table  class="table table-bordered table-hover">
                
                <thead class="thead">
                    <tr class="tr">
                        <td rowspan="2" class="text-center align_middle col-sm-1">STT</td>
                        <td rowspan="2" class="text-center align_middle width30px">Time</td>
                        <td colspan="3" class="text-center align_middle" >Match</td>
                        <td colspan="3" class="text-center align_middle" >Rate_bet</td>
                        <td rowspan="2" colspan="2" class="text-center align_middle">Status</td>
                        <td rowspan="2" colspan="0" class="text-center align_middle">Final</td>
                    </tr>
                    <tr>
                        <th class="text-center">Home_team</th>
                        <th class="text-center">Score</th>
                        <th class="text-center">Away_team</th>
                        <th class="text-center">Home</th>
                        <th class="text-center">Draw</th>
                        <th class="text-center">Away</th>
                    </tr>
                </thead>

                <tbody class="tbody">
                    
                    @if($user)

                        @foreach ($matches as $match)
                            {{-- {{dd($match->id)}} --}}
                            {{-- {{dd($user->bets)}} --}}

                            <tr class="text-center tr">
                                <td>{{$STT++}}</td>
                                <td>{{$match->time_start_match}}</td>
                                <td>{{$match->home_team_id}}</td>

                                <td>
                                    <span>{{$match->home_score}}</span>
                                    <span>-</span>
                                    <span>{{$match->away_score}}</span>
                                </td> {{-- score --}}

                                <td>{{$match->away_team_id}}</td>

                                <!-- When a match in bet -->
                            @if (!$match->home_score)
                                <td class="td">
                                    <div class="bet"> 
                                       <span>{{$match->bet_home}}</span>
                                    </div>
                                    <div class="rate">
                                       <span class="rate_bet">{{$user->bets[$STT-2]->rate_home ? $user->bets[$STT-2]->rate_home : '' }}</span>
                                    </div>
                                </td>
                                <td class="td">
                                    <div class="bet"> 
                                       <span>{{$match->bet_draw}}</span>
                                    </div>
                                    <div class="rate">
                                        <span class="rate_bet">{{$user->bets[$STT-2]->rate_draw ? $user->bets[$STT-2]->rate_draw : ''}}</span>
                                    </div>
                                </td>
                                <td class="td">
                                    <div class="bet"> 
                                       <span>{{$match->bet_away}}</span>
                                    </div>
                                    <div class="rate">
                                       <span class="rate_bet">{{$user->bets[$STT-2]->rate_away ? $user->bets[$STT-2]->rate_away : ''}}</span>
                                    </div>
                                </td>

                                <td>
                                    <a href="" data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" style="height: 22px;"  ><span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </a>
                                </td>

                                    {{-- icon delete  --}}
                                {!! Form::open([ 'method'=>'DELETE' , 'action'=>['Admin\BettingController@destroy', $match->id ] ]) !!}

                                    <div class="form-group">
                                        <td>
                                            <a href="" method='delete' data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" style="height: 22px;"><span class="glyphicon glyphicon-trash"></span></button>
                                            </a>
                                        </td>
                                    </div>

                                {!! Form::close() !!}

                                <td><br>Comming...</br></td>
                                
                            
                            {{-- when a match finish --}}
                            @elseif( $match->home_score) 
                                <td class="td">
                                    <div class="bet"> 
                                       <span>{{$match->bet_home}}</span>
                                    </div>
                                    <div class="rate">
                                       <span class="rate_bet">{{$user->bets[$STT-2]->rate_home ? $user->bets[$STT-2]->rate_home : ''}}</span>
                                    </div>
                                </td>
                                <td class="td">
                                    <div class="bet"> 
                                       <span>{{$match->bet_draw}}</span>
                                    </div>
                                    <div class="rate">
                                        <span class="rate_bet">{{$user->bets[$STT-2]->rate_draw ? $user->bets[$STT-2]->rate_draw : ''}}</span>
                                    </div>
                                </td>
                                <td class="td">
                                    <div class="bet"> 
                                       <span>{{$match->bet_away}}</span>
                                    </div>
                                    <div class="rate">
                                       <span class="rate_bet">{{$user->bets[$STT-2]->rate_away ? $user->bets[$STT-2]->rate_away : ''}}</span>
                                    </div>
                                </td>
                                <td colspan="2"><b>Finish_match</b></td>

                                <td><br>+1000$</br></td>
                            
                            @endif

                            </tr>
                        
                        @endforeach

                    @endif

                </tbody>

            </table>

        @else
            <h2> You has not yet bet </h2> 

        @endif

    </div> {{-- end content betting --}}

</div>

@endsection



<script type="text/javascript">

jQuery(document).ready(function($){

    // $('.betting').on('click', function() {

    //     var rate_home = $('.rate_home').val();
    //     var rate_draw = $('.rate_draw').val();
    //     var rate_away = $('.rate_away').val();

    //     console.log(rate_home);
    //     console.log(rate_draw);
    //     console.log(rate_away);

    //     // var money_bet = parseInt(rate_home) + parseInt(rate_draw) + parseInt(rate_away);  

    //     // if(money_bet)
    //     //     console.log(money_bet);
    //     // else 
    //     //     console.log('Not enter money bet');

    // });

});

</script> 
