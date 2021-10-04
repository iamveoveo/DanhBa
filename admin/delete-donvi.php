<?php 
    include('../config/constants.php');

    $id = $_GET['id'];
    $sql = "DELETE FROM donvi WHERE madv=$id";

    $res = mysqli_query($conn, $sql);

    if($res==true)
    {
        $_SESSION['delete'] = "<div class='text-success'>Xóa nhân viên thành công.</div>";
        header('location:'.SITEURL.'admin/manager-donvi.php');
    }
    else
    {

        $_SESSION['delete'] = "<div class='text-danger'>Lỗi khi xóa nhân viên.</div>";
        header('location:'.SITEURL.'admin/manager-donvi.php');
    }
?>