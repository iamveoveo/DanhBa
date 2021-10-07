<?php include("particals/header.php") ?>

<form action="" method="POST" style="width:30%; margin:auto;">
  <div class="form-group">
    <label for="hoten_input">Tên đăng nhập</label>
    <input type="text" class="form-control" id="hoten_input" name="tendangnhap">
  </div>
  <div class="form-group">
    <label for="email_input">Email</label>
    <input type="email" class="form-control" id="email_input" name="email">
  </div>
  <div class="form-group">
    <label for="matkhau_input">Mật khẩu</label>
    <input type="password" class="form-control" id="matkhau_input" name="matkhau">
  </div>
  <button type="submit" name="submit" class="btn btn-primary mt-3 justify-contents-center m-auto">Submit</button>
</form>

<?php
  if(isset($_POST['submit'])){
    
    $tendangnhap = $_POST['tendangnhap'];
    $email = $_POST['email'];
    $matkhau = md5($_POST['matkhau']);

    $sql = "insert into db_nguoidung set 
            tendangnhap='$tendangnhap',
            email='$email',
            matkhau='$matkhau' ";
    
    $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

    if($res==TRUE)
        {
            $_SESSION['add'] = "<div class='text-success'>Thêm người dùng thành công.</div>";
            header("location:".SITEURL.'admin/manager-nguoidung.php');
        }
    else
        {
            $_SESSION['add'] = "<div class='text-danger'>Lỗi khi thêm người dùng.</div>";
            header("location:".SITEURL.'admin/manager-nguoidung.php');
        }
  }
?>

<?php include("particals/footer.php") ?>  