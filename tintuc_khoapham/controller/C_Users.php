<?php

namespace controller;
use model\M_Users;

class C_Users 
{
    
    function c_DangKiTK($name, $email, $password)
    {
        session_start();
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

    function c_DangNhap($name, $password)
    {
        session_start();
        $m_users = new M_Users();

        $user = $m_users->dangNhap($name, $password);

        if($user == true)
        {
            $_SESSION['name_user'] = $user[0]['name'];
            $_SESSION['id_user'] = $user[0]['id']; // to comment news

            var_dump($user);
            var_dump($_SESSION['id_user']);

            header('Location: /');
            
            if ( isset($_SESSION['user_error']) ) {
                unset($_SESSION['user_error']);
            }
            if ( isset($_SESSION['chua_dang_nhap']) ) { // delete session to user comment
                unset($_SESSION['chua_dang_nhap']);
            }
        }
        else {
            $_SESSION['user_error'] = 'Đăng nhập KHÔNG thành công';
            header('Location: dangnhap.php');
        }   
    }

    function dangxuat()
    {
        session_start();
        session_destroy();
        $_SESSION = array();
        header('Location: '.$_SERVER['HTTP_REFERER']);

    }

}