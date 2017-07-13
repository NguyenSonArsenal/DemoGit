{{-- If the match exits --}}
@if($match_detail)

@extends('layouts.admin')


@include('includes/form_lib_bootstrap_toggle')
@include('includes/form_lib_datePicker')

@section('title', 'Detail match')

@section('content')
  
    <div class="container">
          
        <div class="row">

            <div class="col-sm-6" style="border-right:1px solid #ccc; ">
                
                <div class="row">
                    <h1>Detail match ( {{$match_detail->home_score ? ' finished' : 'upcoming...'}} )</h1>
                </div>
                
                {!! Form::model($match_detail, [ 'method'=>'GET' ]) !!}

                    <div class="form-group" style="margin-top: 50px;">
                        <div class="row">
                             <label class="control-label col-sm-2" for="">Created_at</label>

                            <div class="col-sm-3">
                                <td>{{$match_detail->created_at->diffForHumans()}}</td>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-sm-2" for="">Match</label>
                           
                            <div class="col-sm-4">
                               <a href="">{!! Form::text('home_team_id', null, ['class'=>'form-control' , 'disabled' => 'disabled']) !!}</a> 
                            </div>
                            <label class="control-label col-sm-1" for="">{{$match_detail->home_score}}</label>
                            <label class="control-label col-sm-1" for="">{{$match_detail->away_score}}</label>

                            <div class="col-sm-4">
                               <a href="">{!! Form::text('away_team_id', null, ['class'=>'form-control' , 'disabled' => 'disabled']) !!}</a> 
                            </div>
                        
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-sm-2" for="">Rate_bet</label>
                           
                            <div class="col-sm-2">
                                {!! Form::text('bet_home', null, ['class'=>'form-control' , 'disabled' => 'disabled']) !!}
                            </div>
                            <div class="col-sm-2">
                                 {!! Form::text('bet_draw', null, ['class'=>'form-control' , 'disabled' => 'disabled']) !!}
                            </div>
                            <div class="col-sm-2">
                                 {!! Form::text('bet_away', null, ['class'=>'form-control' , 'disabled' => 'disabled']) !!}
                            </div>
                        
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                             <label class="control-label col-sm-2" for="">People_bet</label>

                             <div class="col-sm-2">
                                {!! Form::text('number_person_bet', $match_detail->bets->count(), ['class'=>'form-control' , 'disabled' => 'disabled']) !!}
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <div class="row">
                             <label class="control-label col-sm-2" for="">Win_money</label>

                             <div class="col-sm-2">
                                {!! Form::text('win_money', null, ['class'=>'form-control' , 'disabled' => 'disabled']) !!}
                            </div>
                        </div>
                    </div> --}}
                    
                    <div class="form-group">
                        <div class="row">
                             <label class="control-label col-sm-2" for="">Match_start</label>

                             <div class="col-sm-4">
                                {!! Form::text('time_start_match', null, ['class'=>'form-control', 'id' => 'dpk_match_start_time' , 'disabled' => 'disabled']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-sm-2" for="">Match_end</label>

                            <div class="col-sm-4">
                                {!! Form::text('time_end_match', null, ['class'=>'form-control' , 'id' => 'dpk_match_end_time' , 'disabled' => 'disabled']) !!}
                            </div>
                        </div>
                    </div>


                {!! Form::close() !!}
            </div>

            <div class="col-sm-4">
                
                <div class="row">
                    <h1 style="margin-left: 16px;">Detail bet</h1>
                </div>

                    {{-- If the match has betted --}}
                    @if($match_detail->bets->count() > 0)

                        @php $users_bet_match = array(); 

                            $tmp = 0;

                            foreach($match_detail->users as $user){
                                $users_bet_match[$tmp] = $user->username;
                                $tmp++;
                            }

                        @endphp


                        <table class="table table-bordered table-hover" style="margin-left: 4px;">
                            <thead>
                                <tr class="text-center">
                                    <td>STT</td>
                                    <td>User</td>
                                    <td>Bet_home<br>($)</td>
                                    <td>Bet_draw<br>($)</td>
                                    <td>Bet_away<br>($)</td>
                                    <td>Final<br>($)</td>
                                </tr>
                            </thead>
                            <tbody>
                                

                                    @php $STT=1; @endphp

                                    @foreach($match_detail->bets as $match)
                                        {{-- {{dd($match_detail)}} --}}
                                        <tr class="text-center">
                                            <td>{{$STT++}}</td>
                                            <td><a href="">{{$users_bet_match[$STT-2]}}</a></td>
                                            <td>{{$match->rate_home}}</td>
                                            <td>{{$match->rate_draw}}</td>
                                            <td>{{$match->rate_away}}</td>
                                            
                                            {{-- if the match finish --}}
                                            @if($match_detail->home_score)
                                                <td>
                                                    @if($match_detail->home_score > $match_detail->away_score)
                                                        
                                                        @php $final[$STT] = $match->rate_home +
                                                        $match->rate_home*$match_detail->bet_home -
                                                        $match->rate_draw - $match->rate_away;
                                                        @endphp

                                                       {{-- {{$final_home_win > 0 ? '+' . $final_home_win : $final_home_win}} --}}
                                                       
                                                       {{$final[$STT]}}

                                                    @elseif($match_detail->home_score == $match_detail->away_score)
 
                                                        @php $final[$STT] = $match->rate_draw + 
                                                        $match->rate_draw*$match_detail->bet_draw -
                                                        $match->rate_home - $match->rate_away;
                                                        @endphp

                                                        {{-- {{$final_draw > 0 ? '+' . $final_draw : $final_draw}} --}}

                                                        {{$final[$STT]}}

                                                    @elseif($match_detail->home_score < $match_detail->away_score)

                                                        @php $final[$STT] = $match->rate_away + 
                                                        $match->rate_away*$match_detail->bet_away -
                                                        $match->rate_draw - $match->rate_home;
                                                        @endphp

                                                      {{--  {{$final_away_win > 0 ? '+' . $final_away_win : $final_away_win}} --}}

                                                      {{$final[$STT]}}

                                                    @endif

                                                </td>
                                            @else
                                                <td>Comming...</td>
                                            @endif 
                                            {{-- end if the match finished --}}
                                        </tr>

                                    @endforeach
                                
                            </tbody>
                        </table>
                        @if($match_detail->home_score)
                            <div class="thongke">
                            <br>
                                <h3 >Number user bet for match: <b>{{$STT-1}}</b></h3 >
                                <h3>Money: <b>
                                    @php $final = array_sum($final); 
                                        if ($final > 0) {
                                            echo 'Lost ' . $final . '$';
                                        } else {
                                            $final = -$final;
                                            echo 'Win ' . $final . '$';
                                        }
                                    @endphp
                                    </b>
                                </h3>

                            </div>
                        @endif
                    @else
                        <h3>The match has not yet bet</h3>
                    @endif
                    {{-- end if the match betted --}}



            </div> {{-- end bet detail --}} 

        </div> {{-- end row detail --}}


    
    </div>  {{-- end container --}}

@endsection

@else

    @include('includes/error404')
    @php return @endphp

@endif {{-- end if match exits --}}

<script type="text/javascript">
jQuery(document).ready(function($){
    jQuery("#dpk_match_start_time").datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        sideBySide:true,
    });
    jQuery("#dpk_match_end_time").datetimepicker({
        format: 'YYYY-MM-DD HH:mm',
        sideBySide:true,
    });
    
});
</script> 