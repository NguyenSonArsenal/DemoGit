<?php 

//session_start();

namespace controller;
use model\M_Users;

class C_Users 
{
	
	function c_DangKiTK($name, $email, $password)
	{
		$m_users = new M_Users();
		$id_user = $m_users->dangKi($name, $email, $password);

		if ($id_user>0) {
			$_SESSION['success'] = 'Đăng kí thành công';
			header('Location: /');
			if ( isset($_SESSION['error']) ) {
				unset($_SESSION['error']);
			}
		} 
		else {
			$_SESSION['error'] = 'Đăng kí KHÔNG thành công';
			header('Location: dangki.php');
		}	

	}

}