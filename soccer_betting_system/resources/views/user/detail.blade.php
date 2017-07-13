@extends('layouts.admin')


@include('includes/form_lib_bootstrap_toggle')
@include('includes/form_lib_datePicker')

@section('title', 'Detail match')


@section('content')

    
   {{--  {{dd($match_detail)}}; --}}
    
    
    
    <div class="container">
        
        <div class="row">
            <div class="col-sm-6" style="border-right:1px solid #ccc; ">
                
                <div class="row">
                    <h1>Detail match</h1>
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
                               <a href="">{!! Form::text('home_team_id', null, ['class'=>'form-control']) !!}</a> 
                            </div>
                            <label class="control-label col-sm-1" for="">0</label>
                            <label class="control-label col-sm-1" for="">0</label>
                            {{-- <div class="col-sm-1" style="width: 34px">
                                {!! Form::text('home_score', null, ['class'=>'form-control']) !!}
                            </div> --}}
                         {{--    <div class="col-sm-1">
                                {!! Form::text('away_score', null, ['class'=>'form-control']) !!}
                            </div> --}}

                            <div class="col-sm-4">
                               <a href="">{!! Form::text('away_team_id', null, ['class'=>'form-control']) !!}</a> 
                            </div>
                        
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-sm-2" for="">Rate_bet</label>
                           
                            <div class="col-sm-2">
                                {!! Form::text('bet_home', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="col-sm-2">
                                 {!! Form::text('bet_draw', null, ['class'=>'form-control']) !!}
                            </div>
                            <div class="col-sm-2">
                                 {!! Form::text('bet_away', null, ['class'=>'form-control']) !!}
                            </div>
                        
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                             <label class="control-label col-sm-2" for="">People_bet</label>

                             <div class="col-sm-2">
                                {!! Form::text('number_person_bet', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                             <label class="control-label col-sm-2" for="">Win_money</label>

                             <div class="col-sm-2">
                                {!! Form::text('win_money', null, ['class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="row">
                             <label class="control-label col-sm-2" for="">Match_start</label>

                             <div class="col-sm-4">
                                {!! Form::text('time_start_match', null, ['class'=>'form-control', 'id' => 'dpk_match_start_time']) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="control-label col-sm-2" for="">Match_end</label>

                            <div class="col-sm-4">
                                {!! Form::text('time_end_match', null, ['class'=>'form-control' , 'id' => 'dpk_match_end_time']) !!}
                            </div>
                        </div>
                    </div>


                {!! Form::close() !!}
            </div>

            <div class="col-sm-4">
                
                <div class="row">
                    <h1 style="margin-left: 16px;">Detail bet</h1>
                </div>

                <table class="table table-bordered table-hover" style="margin-left: 4px;">
                    <thead>
                        <tr class="text-center">
                            <td>STT</td>
                            <td>User</td>
                            <td>Home</td>
                            <td>Draw</td>
                            <td>Away</td>
                            <td>Final</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center">
                            <td>1</td>
                            <td><a href="">Mr.A</a></td>
                            <td>1000</td>
                            <td></td>
                            <td></td>
                            <td>+20000</td>
                        </tr>
                        <tr class="text-center">
                            <td>2</td>
                            <td><a href="">Mr.B</a></td>
                            <td>1000</td>
                            <td>1000</td>
                            <td></td>
                            <td>+10000</td>
                        </tr>
                        <tr class="text-center">
                            <td>3</td>
                            <td><a href="">Mr.C</a></td>
                            <td>1000</td>
                            <td>1000</td>
                            <td>1000</td>
                            <td>-1000</td>
                        </tr>
                        <tr class="text-center">
                            <td>4</td>
                            <td><a href="">Mr.D</a></td>
                            <td></td>
                            <td></td>
                            <td>1000</td>
                            <td>+20000</td>
                        </tr>
                    </tbody>
                </table>

            </div> {{-- end bet detail --}} 

        </div> {{-- end row detail --}}
    
    </div>  {{-- end container --}}


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