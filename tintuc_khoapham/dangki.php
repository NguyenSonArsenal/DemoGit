<?php 
session_start();

require_once __DIR__ . '/vendor/autoload.php';

use controller\C_Users;

$c_user = new C_Users();

if(isset($_POST['submit']))
{
	$name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$passwordAgain = $_POST['passwordAgain'];

	if ($password == $passwordAgain) {
		$c_user->c_DangKiTK($name, $email, $password);
	}
}



?>



<!DOCTYPE html>
<html lang="en">

<head>

    <?php require_once('public/includes/header.php'); ?> 

    <title> Sign in </title>

</head>

<body>

    <!-- Navigation -->
    <?php require_once('public/includes/navbar.php'); ?>

    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
				  	<div class="panel-heading">Đăng ký tài khoản</div>
				  	<div class="panel-body">
				    	<form action="#" method="POST">
				    		<div>
				    			<label>Họ tên</label>
							  	<input type="text" class="form-control" placeholder="name" name="name" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="email" name="email" aria-describedby="basic-addon1"
							  	>
							</div>
							<br>	
							<div>
				    			<label>Nhập mật khẩu</label>
							  	<input type="password" class="form-control" name="password" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control" name="passwordAgain" aria-describedby="basic-addon1">
							</div>
							<br>
							<button type="button" name="submit" class="btn btn-success">Đăng ký
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->


    <!-- jQuery -->
    <script src="public/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/my.js"></script>

</body>

</html>
