@extends('layouts.user')

@section('title', 'Soccerbetting')

<link href="{{ asset('css/user/index.css') }}" rel="stylesheet">

@include('includes/form_lib_bootstrap_toggle')

@if($user = Auth::user())
    @php
        $username = $user->username;
        
        $user_money = $user->money;

        $user_id = $user->id;

        // Count number match user bet
        $count_match_user_bet = 0;
        foreach ($user->matches as $match) {
            if($count = $match->home_team_id){
                $count_match_user_bet ++ ;
            } 
        }

    @endphp
@endif

@section('content')


<div class="wrapper">

    <h2 class="title">Total money : <b>{{$user_money}} $</b></h2>

    <h3>User_id: <b>{{$user_id}}</b> </h3>
    <h3>Number bet: <b>{{$count_match_user_bet}}</b> </h3>

    @php $STT=1; @endphp
    
    <div class="content_betting">
        
        <table  class="table table-bordered table-hover">
            
            <thead class="thead">
                <tr class="tr">
                    <td rowspan="2" class="text-center align_middle width10px">STT</td>
                    {{-- <td rowspan="2" class="text-center align_middle width10px">User_bet</td> --}}
                    <td rowspan="2" class="text-center align_middle width30px">Time</td>
                    <td colspan="3" class="text-center align_middle" >Match</td>
                    <td colspan="3" class="text-center align_middle" >Rate_bet</td>
                    <td rowspan="2" colspan="4" class="text-center align_middle">Status</td>
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
            
            @if($matches)

                @foreach ($matches as $match)

                    {{-- if the match is public on web --}}
                    @if($match->active == 1)

                        <tr class="text-center tr">
                            <td class="width10px">{{$STT++}}</td>
                            {{-- <td class="width10px">{{$match->bets->count()}}</td> --}}
                            <td class="width30px">{{$match->time_start_match}}</td>
                            <td><a href="">{{$match->home_team_id}}</a></td>

                            <td>
                                <span>{{$match->home_score}}</span>
                                <span>-</span>
                                <span>{{$match->away_score}}</span>
                            </td> {{-- score --}}

                            <td><a href="">{{$match->away_team_id}}</a></td>
                            

                            <!-- When a match in bet (match has not yet score)  -->
                            {{-- and has not yet bet --}}
                            @if (!$match->home_score )

                                <td colspan="0">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                           <button class="btn btn-secondary" type="button"><span class="left">{{$match->bet_home}}</span></button>
                                        </span>
                                        {{-- <input type="text" class="form-control rate_home" name="rate_home" value="" placeholder="Bet ($)"> --}}
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="button"><i class="fa fa-user" aria-hidden="true"></i></button>
                                        </span>
                                    </div>
                                </td>

                                <td class="inline-flex">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                           <button class="btn btn-secondary" type="button"><span>{{$match->bet_draw}}</span></button>
                                        </span>
                                       {{--  <input type="text" class="form-control rate_draw" name="rate_draw" value="" placeholder="Bet ($)"> --}}
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="button"><i class="fa fa-user" aria-hidden="true"></i></button>
                                        </span>
                                    </div>
                                </td>

                                <td class="inline-flex">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                           <button class="btn btn-secondary" type="button"><span>{{$match->bet_away}}</span></button>
                                        </span>
                                       {{--  <input type="text" class="form-control rate_away" name="rate_away" value="" placeholder="Bet ($)"> --}}
                                        <span class="input-group-btn">
                                            <button class="btn btn-secondary" type="button"><i class="fa fa-user" aria-hidden="true"></i></button>
                                        </span>
                                    </div>
                                </td>

                                <td>
                                    <a class="disabled1"href="{{route('bet.show', $match->id)}}" title="click to join bet" name="bet"> >>Bet</a>
                                </td>

                                <td>
                                    <a href="" data-placement="top" data-toggle="tooltip" title="Edit">
                                        <button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" style="height: 22px;" ><span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                    </a>
                                </td>

                                {{-- icon delete  --}}
                                {!! Form::open([ 'method'=>'DELETE' , 'action'=>['Admin\BettingController@destroy', $match->id ] ]) !!}

                                    <div class="form-group">
                                        <td>
                                            {{-- <a href="#" method='delete' data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" style="height: 22px;"><span class="glyphicon glyphicon-trash"></span></button>
                                            </a> --}}
                                            <a href="#">Delete</a>
                                        </td>
                                    </div>

                                {!! Form::close() !!}

                                          
                            
                            {{-- when a match finish (match has score)--}}
                            @elseif( $match->home_score) 

                                <td colspan="0">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                           <button class="btn btn-secondary btn-not-score" type="button"><span class="left">{{$match->bet_home}}</span></button>
                                        </span>
                                     
                                    </div>
                                </td>

                                <td class="inline-flex">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                           <button class="btn btn-secondary btn-not-score" type="button"><span>{{$match->bet_draw}}</span></button>
                                        </span>
                                       {{--  <input type="text" class="form-control" placeholder="Bet ($)"> --}}
                                        <span class="input-group-btn">
                                           {{--  <button class="btn btn-secondary btn-not-score" type="button"><i class="fa fa-user" aria-hidden="true"></i>100</button> --}}
                                        </span>
                                    </div>
                                </td>

                                <td class="inline-flex">
                                    <div class="input-group">
                                        <span class="input-group-btn">
                                           <button class="btn btn-secondary btn-not-score" type="button"><span>{{$match->bet_away}}</span></button>
                                        </span>
                                        {{-- <input type="text" class="form-control" placeholder="Bet ($)"> --}}
                                        <span class="input-group-btn">
                                            {{-- <button class="btn btn-secondary btn-not-score" type="button"><i class="fa fa-user" aria-hidden="true"></i>100</button> --}}
                                        </span>
                                    </div>
                                    
                                </td>

                                <td colspan="3"><b>Finish_match</b></td>
                            
                            @endif

                            <td><a href="" title="show detail match">Detail</a></td>

                        </tr>

                    @endif
                    {{-- end the match is public on web --}}

                @endforeach

            @endif

            </tbody>

        </table>

    </div> {{-- end content betting --}}

</div>

@endsection



<script type="text/javascript">

jQuery(document).ready(function($){

    $('.disabled').hide();

});

</script> 
