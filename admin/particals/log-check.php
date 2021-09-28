<?php 
    if(!isset($_SESSION['user'])) //IF user session is not set
    {
        $_SESSION['no-login-message'] = "<div class='error text-center'>Hãy đăng nhập để có thể sử dụng chức năng quản lý.</div>";
        header('location:'.SITEURL.'admin/login.php');
    }
?>