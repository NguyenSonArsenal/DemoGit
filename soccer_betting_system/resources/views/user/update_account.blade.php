@extends('layouts.user')

@section('title', 'Update_account')

<link href="{{ asset('css/user/index.css') }}" rel="stylesheet">

@include('includes/form_lib_bootstrap_toggle')

@if($user = Auth::user())
    @php
        // $username = $user->username;
        
        // $user_money = $user->money;

        // $user_id = $user->id;
        // // Count number match user bet
        // $count_match_bet_user=0;
        // foreach ($user->matches as $match) {
        //     if($count = $match->home_team_id){
        //         $count_match_bet_user ++ ;
        //     } 
        // }

    @endphp
@endif

@section('content')


<div class="wrapper">

    
    <h1>Update soon ...</h1>


    {{-- <h2 class="title">Total money : <b>{{$user_money}} $</b></h2>

    <h3>User_id: <b>{{$user_id}}</b> </h3>
    <h3>Number bet: <b>{{$count_match_bet_user}}</b> </h3> --}}

    
    <div class="content_betting">
        
        <table  class="table table-bordered table-hover">
            
            <thead class="thead">
     
            </thead>

            <tbody class="tbody">
            
            </tbody>

        </table>

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
