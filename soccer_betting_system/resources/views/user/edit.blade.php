@extends('layouts.user')

@section('title', 'Betting match')

<link href="{{ asset('css/user/betting.css') }}" rel="stylesheet">

@include('includes/form_lib_bootstrap_toggle')
@include('includes/form_lib_datePicker')


@if($user = Auth::user())
    @php
        $user_id = $user->id;
        $user_money = $user->money;
    @endphp
@endif



@section('content')

    {{-- {{dd($user_id)}} --}}
   {{--  {{dd($match_detail)}}; --}}
    
  {{--   {{dd($match)}} --}}
    
    <div class="wrapper">

            <div class="content_betting">

                <h2 class="title">Total money : <b>{{$user_money}} $</b></h2>

                <h1>User_id: {{$user_id}}</h1>
                

                <div class="row">
                    
                    {!! Form::model($match, [ 'method'=>'GET' ]) !!}
                    

                       <div class="form-group mgtop50">
                            <div class="row">
                                 <label class="control-label col-sm-2" for="">Match_start</label>

                                 <div class="col-sm-3">
                                    {!! Form::text('time_start_match', null, ['class'=>'form-control', 'disabled' => 'disabled' , 'id' => 'dpk_match_start_time']) !!}
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label class="control-label col-sm-2" for="">Match</label>
                               
                                <div class="col-sm-3">
                                   <a href="">{!! Form::text('home_team_id', null, ['class'=>'form-control' , 'disabled' => 'disabled']) !!}</a> 
                                </div>
                                <label class="control-label col-sm-1" for="">vs</label>
                                {{-- <label class="control-label col-sm-1" for=""></label> --}}

                                <div class="col-sm-3">
                                   <a href="">{!! Form::text('away_team_id', null, ['class'=>'form-control' , 'disabled' => 'disabled']) !!}</a> 
                                </div>
                            
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <label class="control-label col-sm-2" for="">Rate_bet</label>
                               
                                <div class="col-sm-1">
                                    {!! Form::text('bet_home', null, ['class'=>'form-control' , 'disabled' => 'disabled']) !!}
                                </div>
                                <div class="col-sm-1">
                                     {!! Form::text('bet_draw', null, ['class'=>'form-control' , 'disabled' => 'disabled']) !!}
                                </div>
                                <div class="col-sm-1">
                                     {!! Form::text('bet_away', null, ['class'=>'form-control' , 'disabled' => 'disabled']) !!}
                                </div>
                            
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                 <label class="control-label col-sm-2" for="">People_beting</label>

                                 <div class="col-sm-1">
                                    {!! Form::text('number_person_bet', 100, ['class'=>'form-control' , 'disabled' => 'disabled']) !!}
                                </div>
                            </div>
                        </div>
                    
                        <hr class="hr_top">

                        <marquee width="80%" class="control-label title_bet">Join bet by enter your money you want to bet for your team</marquee>

                        <hr class="hr_bottom">

                    {!! Form::close() !!}


                    {{-- form for user bet --}}

                    {!! Form::model($match, [ 'method'=>'POST', 'action'=>['User\UserBettingController@store'] , 'class'=>'form-inline' ]) !!}

                        @php $count=0; @endphp
                        
                        @if($match) 
                            
                            @foreach($user->bets as $user_bet)
                                
                                @if($user_bet->match_id == $match->id)
                                    
                                    <label for="" class="col-sm-2">Betting</label>
                                
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="rate_home" value="{{$user_bet->rate_home}}" id="text" placeholder="bet_home_win ($)">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="rate_draw" id="text" value="{{$user_bet->rate_draw}}" placeholder="bet_draw_team ($)">
                                    </div>

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="rate_away" id="text" value="{{$user_bet->rate_away}}" placeholder="bet_away_win ($)">
                                    </div>

                                    <div class="form-group hidden">
                                        <input type="text" name="match_id" value="{{$match->id}}">
                                        <input type="text" name="user_id" value="{{$user_id}}">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Bet</button>
                                @endif

                                @php break; @endphp

                            @endforeach

                        @endif

                    
                    {!! Form::close() !!}

                    {{-- </form> --}}

                </div> {{-- end row --}}

                
            </div> {{-- end content_betting --}}
        
        
    
    </div>  {{-- end wrapper --}}


@endsection

<script type="text/javascript">
jQuery(document).ready(function($){
    // jQuery("#dpk_match_start_time").datetimepicker({
    //     format: 'YYYY-MM-DD HH:mm',
    //     sideBySide:true,
    // });
    // jQuery("#dpk_match_end_time").datetimepicker({
    //     format: 'YYYY-MM-DD HH:mm',
    //     sideBySide:true,
    // });
    
});
</script> 