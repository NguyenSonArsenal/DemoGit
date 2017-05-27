<?php 

require_once __DIR__ . '/vendor/autoload.php';

use controller\C_Users;

$c_user = new C_Users();

if(isset($_POST['dangnhap']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = $c_user->c_DangNhap($email, md5($password));
}



?>


<!DOCTYPE html>
<html lang="en">

<head>

    <?php require_once('public/includes/header.php'); ?> 

    <title> Login </title>

</head>

<body>

    <!-- Navigation -->
    <?php require_once('public/includes/navbar.php'); ?>

    <!-- Page Content -->
    <div class="container">

    	<!-- slider -->
    	<div class="row carousel-holder">
    		<div class="col-md-4"></div>
            <div class="col-md-4">
                <?php if (isset($_SESSION['user_error'])): ?>
                    <div class="alert alert-danger"><?php echo $_SESSION['user_error'] ?></div>
                <?php endif ?>
                <div class="panel panel-default">
				  	<div class="panel-heading">Đăng nhập</div>
				  	<div class="panel-body">
				    	<form action="" method="POST">
							<div>
				    			<label>Email</label>
							  	<input type="email" class="form-control" placeholder="Email" name="email" value="<?php //echo $email ?>" 
							  	>
							</div>
							<br>	
							<div>
				    			<label>Mật khẩu</label>
							  	<input type="password" class="form-control" name="password" value="<?php //echo $password ?>">
							</div>
							<br>
							<button type="submit" name ='dangnhap' class="btn btn-success">Đăng nhập
							</button>
				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-4"></div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->

 
    <!-- end Footer -->
    <!-- jQuery -->
    <script src="public/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="public/js/bootstrap.min.js"></script>
    <script src="public/js/my.js"></script>

</body>

</html>
