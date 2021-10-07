<?php include("particals/header.php") ?>

<?php
    $manv = $_GET['id'];
    
    $sql = "select manv, tennv, chucvu, mayban, db_nhanvien.email, sodidong, donvi.MaDV from db_nhanvien, donvi where db_nhanvien.madv = donvi.MaDV and manv = $manv";
    $res=mysqli_query($conn, $sql);

    if($res==true)
            {
                $count = mysqli_num_rows($res);
                if($count==1)
                {
                    $row=mysqli_fetch_assoc($res);

                    $hoten = $row['tennv'];
                    $chucvu = $row['chucvu'];
                    $mayban = $row['mayban'];
                    $email = $row['email'];
                    $sodidong = $row['sodidong'];
                    $MaDV = $row['MaDV'];
                }
                else
                {
                    header('location:'.SITEURL.'admin/index.php');
                }
            }
?>

<form action="" method="POST" style="width:30%; margin:auto;">
  <div class="form-group">
    <label for="hoten_input">Họ và tên</label>
    <input type="text" class="form-control" id="hoten_input" name="hoten" value="<?php echo $hoten; ?>">
  </div>
  <div class="form-group">
    <label for="chucvu_input">Chức vụ</label>
    <input type="text" class="form-control" id="chucvu_input" name="chucvu" value="<?php echo $chucvu; ?>">
  </div>
  <div class="form-group">
    <label for="mayban_input">Máy bàn</label>
    <input type="text" class="form-control" id="mayban_input" name="mayban" value="<?php echo $mayban; ?>">
  </div>
  <div class="form-group">
    <label for="email_input">Email</label>
    <input type="email" class="form-control" id="email_input" name="email" value="<?php echo $email; ?>">
  </div>
  <div class="form-group">
    <label for="sodidong_input">Số di động</label>
    <input type="text" class="form-control" id="sodidong_input" name="sodidong" value="<?php echo $sodidong; ?>">
  </div>
  <div class="form-group">
    <label for="madonvi_input">Tên đơn vị</label>
    <select class="form-control" id="madonvi_input" name="madonvi">
      <?php
        $sql_slc = "select * from donvi";
        $result = mysqli_query($conn, $sql_slc);

        if(mysqli_num_rows($result) >0){
          while ($row1 = mysqli_fetch_assoc($result)){
            if ($row1['MaDV'] == $MaDV){echo "<option value=". $row1['MaDV'] ." selected >". $row1['TenDV'] ."</option>";}
            else {echo "<option value=". $row1['MaDV'] .">". $row1['TenDV'] ."</option>";}
          }
        }
      ?>
      </select>
  </div>
  <button type="submit" name="submit" class="btn btn-primary mt-3 justify-contents-center m-auto">Submit</button>
</form>

<?php
  if (isset($_POST["submit"])){

    $hoten = $_POST['hoten'];
    $chucvu = $_POST['chucvu'];
    $mayban = $_POST['mayban'];
    $email = $_POST['email'];
    $sodidong = $_POST['sodidong'];
    $MaDV = $_POST['madonvi'];

    $sql_update = "UPDATE db_nhanvien SET
                  tennv='$hoten',
                  chucvu='$chucvu',
                  mayban='$mayban',
                  email='$email',
                  sodidong='$sodidong',
                  MaDV='$MaDV' where manv='$manv' ";
    
    $res1 = mysqli_query($conn, $sql_update);

    if($res==true)
      {
          $_SESSION['update'] = "<div class='text-success'>Sửa thông tin nhân viên thành công.</div>";
          header('location:'.SITEURL.'admin/index.php');
      }
      else
      {
          $_SESSION['update'] = "<div class='text-danger'>lỗi khi sửa thông tin nhân viên.</div>";
          header('location:'.SITEURL.'admin/index.php');
      }
  }
?>

<?php include("particals/footer.php") ?>