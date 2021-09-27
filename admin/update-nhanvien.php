<?php include("particals/header.php") ?>

<?php
    $manv = $_GET['id'];
    
    $sql = "select manv, tennv, chucvu, mayban, db_nhanvien.email, sodidong, MaDV from db_nhanvien, donvi where db_nhanvien.madv = donvi.MaDV and manv = $manv";
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
    <input type="text" class="form-control" id="hoten_input" name="hoten" placeholder="VD: Nguyễn Văn A", value="<?php echo $hoten; ?>">
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
  <div class="form-group">
    <label for="madonvi_input">Mã đơn vị</label>
    <input type="text" class="form-control" id="madonvi_input" name="madonvi" placeholder="7">
  </div>
  <button type="submit" name="submit" class="btn btn-primary mt-3 justify-contents-center m-auto">Submit</button>
</form>

<?php include("particals/footer.php") ?>