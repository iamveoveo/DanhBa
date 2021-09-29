<?php 
    if(!isset($_SESSION['user']))
    {
        $_SESSION['no-login-message'] = "<div class='text-danger mb-2 text-center'>Hãy đăng nhập để có thể sử dụng chức năng quản lý.</div>";
        header('location:'.SITEURL.'admin/login.php');
    }
?>