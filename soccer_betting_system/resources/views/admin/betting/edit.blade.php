@extends('layouts.admin')

<link href="{{ asset('css/admin/betting/create.css') }}" rel="stylesheet">

@include('includes/form_lib_bootstrap_toggle')

@include('includes/form_lib_datePicker')

@section('title', 'Edit betting')


@section('content')
    <h1 class="title_edit">Edit match </h1>
	
{{-- 	{{dd($match)}} --}}

	{!! Form::model($match, [ 'method'=>'PATCH' , 'action'=>['Admin\BettingController@update', $match->id ] ]) !!}

		<div class="form-group">
			<div class="row">
		       	<label class="control-label col-sm-2" for="">Match</label>
	           
	            <div class="col-sm-3">
			      	{!! Form::text('home_team_id', null, ['class'=>'form-control']) !!}
			    </div>
			    <div class="col-sm-3">
			      	 {!! Form::text('away_team_id', null, ['class'=>'form-control']) !!}
			    </div>
            
        	</div>
		</div>

		<div class="form-group">
			<div class="row">
		       	<label class="control-label col-sm-2" for="">Rate_bet</label>
	           
	            <div class="col-sm-3">
			      	{!! Form::text('bet_home', null, ['class'=>'form-control']) !!}
			    </div>
			    <div class="col-sm-3">
			      	 {!! Form::text('bet_draw', null, ['class'=>'form-control']) !!}
			    </div>
			    <div class="col-sm-3">
			      	 {!! Form::text('bet_away', null, ['class'=>'form-control']) !!}
			    </div>
            
        	</div>
		</div>

		<div class="form-group">
			<div class="row">
		       	<label class="control-label col-sm-2 pushRight15px" for="">Match_start_time</label>
	           
	           	<div class='input-group date col-sm-3' id='dpk_match_start_time'>
                	<input type='text' class="form-control" name="time_start_match" value="{{$match->time_start_match}}" id="match_end_time" placeholder="Enter match start time" />
	               <span class="input-group-addon">
	                    <span class="glyphicon glyphicon-calendar"></span>
	                </span>
            	</div>
        	</div>
		</div>

		<div class="form-group">
			<div class="row">
		       	<label class="control-label col-sm-2 pushRight15px" for="">Match_end_time</label>
	           
	           	<div class='input-group date col-sm-3' id='dpk_match_end_time'>
                	<input type='text' class="form-control" name="time_end_match" value="{{$match->time_end_match}}" id="match_end_time" placeholder="Enter match start time" />
	               	<span class="input-group-addon">
	                    <span class="glyphicon glyphicon-calendar"></span>
	                </span>
            	</div>
        	</div>
		</div>

		<div class="form-group">
			<div class="row">
				<label class="control-label col-sm-2" for="">Public on web</label>
				
				<div class="col-sm-3 toggle_div">
					@if($match->active == 1)
						<input id="toggle_input" name="active" type="checkbox" value="{{$match->active}}"  data-toggle="toggle" data-size="small" data-onstyle="success" data-offstyle="danger" checked />
					@else
						<input id="toggle_input" name="active" type="checkbox" value="{{$match->active}}"  data-toggle="toggle" data-size="small" data-onstyle="success" data-offstyle="danger"/>
					@endif
				</div>
			</div>

		</div>

		
        
		<div class="distance">
			
		</div>

        <div class="form-group">
            {!! Form::submit('Update' , ['class' => 'btn btn-primary col-sm-1 col-sm-offset-2']) !!}
        </div>

    {!! Form::close() !!}
    {{-- 
    {!! Form::open([ 'method'=>'DELETE' , 'action'=>['Admin\BettingController@destroy', $match->id ] ]) !!}

        <div class="form-group">
             <button class="btn btn-danger col-sm-1" onclick="return confirm('Are you sure?')">Delete</button> 
           <button class="btn btn-danger col-sm-1" onclick="return confirm('Are you sure?')">Delete</button> 
        </div>

    {!! Form::close() !!} --}}

<div>
    @include('includes/form_errors')
</div>


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


    $('.test').click(function(e) {
    	alert('clicked');
    });

    var checkStatus ;
    
    $('.toggle_div').click(function() {

    	checkStatus = $('#toggle_input').prop('checked') ? '0' : '1';
    	
    	console.log('Active : ' + checkStatus);

    	$('#toggle_input').val(checkStatus);

    });

});

</script> 

