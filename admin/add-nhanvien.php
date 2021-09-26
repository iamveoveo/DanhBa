<?php include("particals/header.php") ?>

<form action="" method="POST" style="width:30%; margin:auto;">
  <div class="form-group">
    <label for="hoten_input">Họ và tên</label>
    <input type="text" class="form-control" id="hoten_input" name="hoten" placeholder="VD: Nguyễn Văn A">
  </div>
  <div class="form-group">
    <label for="chucvu_input">Chức vụ</label>
    <input type="text" class="form-control" id="chucvu_input" name="chucvu" placeholder="VD: Giảng viên">
  </div>
  <div class="form-group">
    <label for="mayban_input">Máy bàn</label>
    <input type="text" class="form-control" id="mayban_input" name="mayban" placeholder="VD: 043x xxxx">
  </div>
  <div class="form-group">
    <label for="email_input">Email</label>
    <input type="email" class="form-control" id="email_input" name="email" placeholder="VD: AvanNguyen@abc.com.vn">
  </div>
  <div class="form-group">
    <label for="sodidong_input">Số di động</label>
    <input type="text" class="form-control" id="sodidong_input" name="sodidong" placeholder="VD: 033x xxx xxx">
  </div>
  <button type="submit" class="btn btn-primary mt-3 justify-contents-center m-auto">Submit</button>
</form>

<?php include("particals/footer.php") ?>

<?php
  if(isset($_POST['submit'])){
    
    $hoten = $_POST['hoten'];
    $chucvu = $_POST['chucvu'];
    $mayban = $_POST['mayban'];
    $email = $_POST['email'];
    $sodidong = $_POST['sodidong'];

    $sql = "insert into db_nhanvien set 
            hoten='$hoten'
            chucvu='$chucvu'
            mayban='$mayban'
            email='$mayban'
            sodidong='$sodidong'  ";
    
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    if($res==TRUE)
        {
            $_SESSION['add'] = "<div class='success'>Admin Added Successfully.</div>";
            header("location:".SITEURL.'admin/index.php');
        }
    else
        {
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
            header("location:".SITEURL.'admin/add-admin.php');
        }
  }
?>