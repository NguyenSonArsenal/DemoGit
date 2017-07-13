
{{-- @php
$user = Auth::user();
@endphp --}}

@if($user = Auth::user())
@endif


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Login &amp; Signup forms in panel - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container">   

        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2"> 

            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Sign In</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
                </div>     

                <div style="padding-top:30px" class="panel-body" >

                    <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                        
                    <form action="{{route('post_login')}}" method="POST" id="loginform" class="form-horizontal" role="form">
                        
                        {{csrf_field()}}


                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="login-username" type="email" class="form-control" name="email" value="{{isset($user) ? $user->email : ''}}" placeholder="Enter your email">                                        
                        </div>
                            
                        <div style="margin-bottom: 25px" class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="login-password" type="password" class="form-control" name="password" value="" placeholder="Enter your password">
                        </div>
                                
                            
                        <div class="input-group">
                            <div class="checkbox">
                                <label>
                                  <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                </label>
                            </div>
                        </div>


                        <div style="margin-top:10px" class="form-group">
                            <!-- Button -->

                            <div class="col-sm-12 controls">
                                <button name="btn_login" id="btn-login" href="#" class="btn btn-success col-sm-2">Login  </button>
                                <button name="btn_login_facebook" id="btn-fblogin" href="#" class="btn btn-primary col-sm-4 col-sm-push-1">Login with Facebook</button>

                                <button name="btn_login_gmail" id="btn-fblogin" href="#" class="btn btn-primary col-sm-push-2 col-sm-4 ">Login with Gmail</button>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 control">
                                <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                    Don't have an account! 
                                <a href="{{url('register')}}" onClick="$('#loginbox').hide(); $('#signupbox').show()">
                                    Sign Up Here
                                </a>
                                </div>
                            </div>
                        </div>  

                         @include('includes/form_errors')

                    </form>     

                </div>  

            </div> 

        </div> {{-- end div loginbox --}} 
        
    </div>{{-- end div container --}} 


    
    
<script type="text/javascript">

</script>
</body>
</html>