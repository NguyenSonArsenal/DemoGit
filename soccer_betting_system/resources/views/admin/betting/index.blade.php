@extends('layouts.admin')


@include('includes/form_lib_bootstrap_toggle')


<style type="text/css">
    #ok_hidden{ 
        opacity: 0.4;
    }

</style>

@section('title', 'All bets')


@section('content')
    
    @if(session()->has('message_created'))
        <div class="alert alert-success">
            {{ session()->get('message_created') }}
        </div>
    @endif

    @if(session()->has('message_not_deleted'))
        <div class="alert alert-danger">
            {{ session()->get('message_not_deleted') }}
        </div>
    @endif

    @if(session()->has('message_deleted'))
        <div class="alert alert-danger">
            {{ session()->get('message_deleted') }}
        </div>
    @endif

    <h1>All Bets</h1>

    <div  style="margin-bottom: 50px;">
        <h4 class="pull-left">Money: <b>{{Auth::user()->money}}$</b></h4>
        <a href="{{route('betting.create')}}" class="pull-right" title="click to create bet">
            <button class="btn btn-primary pull-right">Create_bet</button>    
        </a>
    </div>


	@php
        $STT = 1;
    @endphp


	<table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th rowspan="2" class="text-center" id="align_middle">STT</th>
            	<th rowspan="2" class="text-center" id="align_middle">Bet</th>
            	<th colspan="3" class="text-center">Match</th>
		        <th rowspan="2" class="text-center" id="align_middle">Public on web</th>
                <th rowspan="2" class="text-center" id="align_middle">Time</th>
                <th colspan="3" class="text-center" id="align_middle">Bet</th>
                <th rowspan="2" colspan="4" class="text-center" id="align_middle">Status</th>
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

        <tbody>
        @if($matches)



            @foreach ($matches as $match)
			{{-- 	{{dd($match->bets->count())}} --}}
                <tr class="text-center">
                    <td>{{$STT++}}</td>
                    <td>{{$match->bets->count()}}</td>
                    <td>{{$match->home_team_id}}</td>
                    <td>
                        <span>{{$match->home_score}}</span>
                        <span>-</span>
                        <span>{{$match->away_score}}</span>
                    </td> {{-- score --}}
                    <td>{{$match->away_team_id}}</td>
                    
                    {{-- public on web --}}
                    @if($match->active == 1)
                        <td><input id="toggle_default_off" type="checkbox" data-toggle="toggle" checked disabled data-size="mini" data-onstyle="success" data-offstyle="danger"></td>
                    @else
                        <td><input id="toggle_default_off" type="checkbox" data-toggle="toggle" disabled data-size="mini" data-onstyle="success" data-offstyle="danger"></td>
                    @endif

                    <td>{{$match->time_start_match}}</td>
                    <td>{{$match->bet_home}}</td>
                    <td>{{$match->bet_draw}}</td>
                    <td>{{$match->bet_away}}</td>
                    
                    {{-- if the match has not yet fininsh --}}
                    @if(!$match->home_score && $match->bets->count() == 0 )

                        <td><a href="{{route('betting.edit', $match->id)}}" data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></a></td>
                        
                        {{-- icon delete  --}}
                        {!! Form::open([ 'method'=>'DELETE' , 'action'=>['Admin\BettingController@destroy', $match->id ] ]) !!}
                            <div class="form-group">
                                <td><a href="{{route('betting.destroy', $match->id)}}" method='delete' data-placement="top" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure?')"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></a></td>
                            </div>

                        {!! Form::close() !!}

                    @elseif(!$match->home_score && $match->bets->count() > 0)

                        <td><a href="{{route('betting.edit', $match->id)}}" onclick="return false;"  data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" disabled="disabled" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></a></td>

                        {{-- icon delete  --}}
                         {!! Form::open([ 'method'=>'DELETE' , 'action'=>['Admin\BettingController@destroy', $match->id ] ]) !!}
                            <div class="form-group">
                                <td><a href="{{route('betting.destroy', $match->id)}}" method='delete' data-placement="top" data-toggle="tooltip" title="Delete" onclick="return confirm('Are you sure?')"><button id="ok_hidden"  class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-trash"></span></button></a></td>
                            </div>

                        {!! Form::close() !!}

                    @else
                        <td colspan="2">Finish</td>
                    @endif   
                    

                    @if($match->home_score)
                        <td><a href="{{route('update.score',$match->id)}}" id="ok_hidden" onclick="return false" title="click to update score the match">Score</a></td>
                    @else

                        <td><a href="{{route('update.score',$match->id)}}"  title="click to update score the match">Score</a></td>
                    @endif

                    <td><a href="{{route('betting.detail',$match->id)}}" title="show detail match">Detail</a></td>


                </tr>
            @endforeach
        @endif

        </tbody>

    </table>


    {{-- <div>
        <a href="{{route('betting.create')}}" title="click to create bet">
            <button class="btn btn-primary pull-right">Create_bet</button>    
        </a>
    </div> --}}


@endsection



{{-- <script src="{{asset('js/libs/bootstrap-confirmation.min.js')}}"></script> --}}

