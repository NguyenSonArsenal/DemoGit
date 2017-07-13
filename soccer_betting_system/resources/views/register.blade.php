<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    
    <title>Register</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">

    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet">

    <style type="text/css">
        .h30{
            height: 30px;
        }
    </style>

    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    

</head>
<body>
    <div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                <div class="panel-heading">
                    <div class="panel-title">Register</div>
                    <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#"></a></div>
                </div> 

                <form class="form-horizontal" action='{{url('register')}}' method="POST">
                            
                    {{csrf_field()}}

                    <fieldset>

                        <div id="legend">
                            <legend class=""></legend>
                        </div> 
                        
                        {{-- Don't remove div above --}}

                        <div class="control-group">
                          <!-- Username -->
                            <label class="control-label"  for="username">Username</label>
                            <div class="controls">
                                <input type="text" id="username" name="username" placeholder="Please enter your user name" class="input-xlarge h30">
                                <p class="help-block"></p>
                            </div>
                        </div>
                 
                        <div class="control-group">
                          <!-- E-mail -->
                            <label class="control-label" for="email">E-mail</label>
                            <div class="controls">
                                <input type="text" id="email" name="email" placeholder="Please enter your E-mail" class="input-xlarge h30">
                                <p class="help-block"></p>
                            </div>
                        </div>
                 
                        <div class="control-group">
                          <!-- Password-->
                            <label class="control-label" for="password">Password</label>
                            <div class="controls">
                                <input type="password" id="password" name="password" placeholder="Please enter your password" class="input-xlarge h30">
                                <p class="help-block"></p>
                            </div>
                        </div>
                 
                        <div class="control-group">
                          <!-- Password -->
                            <label class="control-label"  for="password_confirm">Password (Confirm)</label>
                              <div class="controls">
                                <input type="password" id="password_confirm" name="password_confirm" placeholder="Please confirm password" class="input-xlarge">
                                <p class="help-block h30"></p>
                              </div>
                        </div>
                     
                        <div class="control-group">
                          <!-- Button -->
                            <div class="controls">
                                <button class="btn btn-success">Register</button>
                            </div>
                        </div>


                        @include('includes/form_errors')


                    </fieldset>

                </form> 
            
            </div> {{-- end div panel --}}
        
        </div><!--  end div loginbox -->
    
    </div> {{-- end div container --}}



<script type="text/javascript">

</script>



</body>
</html>