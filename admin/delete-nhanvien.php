<?php 
    include('../config/constants.php');

    $id = $_GET['id'];
    $sql = "DELETE FROM db_nhanvien WHERE manv=$id";

    $res = mysqli_query($conn, $sql);

    if($res==true)
    {
        $_SESSION['delete'] = "<div class='success'>Xóa nhân viên thành công.</div>";
        header('location:'.SITEURL.'admin/index.php');
    }
    else
    {

        $_SESSION['delete'] = "<div class='error'>Lỗi khi xóa nhân viên.</div>";
        header('location:'.SITEURL.'admin/index.php');
    }
?>