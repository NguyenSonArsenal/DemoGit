@extends('layouts.admin')

<link href="{{ asset('css/admin/betting/create.css') }}" rel="stylesheet">

@include('includes/form_lib_datePicker')


@section('title', 'Create betting')


@section('content')


    <h1>Create bet</h1>

    <form class="form form-horizontal" action="{{route('betting.store')}}" method="POST">
        @if(count($errors))
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <br/>
                <ul>
                    {{-- @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach --}}
                </ul>
            </div>
        @endif

        {{ csrf_field() }}

        <div class="form-group">
            <label class="control-label col-sm-2" for="">Match</label>

            <div class="col-sm-3 {{ $errors->has('home_team_id') ? 'has-error' : '' }}">
                <input type="text" class="form-control" name="home_team_id" id="team_home" placeholder="Enter team home">
                <span class="text-danger">{{ $errors->first('home_team_id') }}</span>
            </div>
          
            <div class="col-sm-3 {{ $errors->has('away_team_id') ? 'has-error' : '' }}">
                <input type="text" class="form-control" name="away_team_id" id="team_away" placeholder="Enter team away">
                <span class="text-danger">{{ $errors->first('away_team_id') }}</span>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="">Rate_bet</label>

            <div class="col-sm-3 {{ $errors->has('bet_home') ? 'has-error' : '' }}">
                <input type="text" class="form-control" name="bet_home" id="bet_home_win" placeholder="Enter money bet home win">
                <span class="text-danger">{{ $errors->first('bet_home') }}</span>
            </div>

            <div class="col-sm-3 {{ $errors->has('bet_draw') ? 'has-error' : '' }}">
                <input type="text" class="form-control" name="bet_draw" placeholder="Enter money bet draw team">
                <span class="text-danger">{{ $errors->first('bet_draw') }}</span>
            </div>

            <div class="col-sm-3 {{ $errors->has('bet_away') ? 'has-error' : '' }}">
                <input type="datetime" class="form-control" name="bet_away" placeholder="Enter money bet away win">
                <span class="text-danger">{{ $errors->first('bet_away') }}</span>
            </div>
          
        </div>


        <div class="form-group">
            <label class="control-label col-sm-2 pushRight15px" for="">Match_start_time</label>

            <div class="input-group date col-sm-3 {{ $errors->has('time_start_match') ? 'has-error' : '' }}" id='dpk_match_start_time'>
                <input type='text' class="form-control" name="time_start_match" id="match_end_time" placeholder="Enter match start time" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>
            <div class="show_error text-danger" style="margin-left: 188px;">
                {{ $errors->first('time_start_match') }}
            </div>
        </div>


        <div class="form-group">
            <label class="control-label col-sm-2 pushRight15px" for="">Match_end_time</label>

            <div class="input-group date col-sm-3 {{ $errors->has('time_end_match') ? 'has-error' : '' }}" id='dpk_match_end_time'>
                <input type='text' class="form-control" name="time_end_match" id="match_end_time" placeholder="Enter match end time" />
                <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
            </div>

            <div class="show_error text-danger" style="margin-left: 188px;">
                {{ $errors->first('time_end_match') }}
            </div>
        </div>
    
        <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-2">
                <button type="submit" class="btn btn-default btn-primary">Create</button>
            </div>
        </div>

       {{-- @include('includes/form_errors') --}}

   </form>


@endsection

    
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