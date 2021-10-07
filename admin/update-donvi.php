<?php include("particals/header.php") ?>

<?php
    $madv = $_GET['id'];

    $sql = "with t(MaDV, TenDV, Email, DiaChi, Website, DienThoai, MaDV_Cha, TenDV_Cha) as
    (select dv.MaDV, dv.TenDV, dv.Email, dv.DiaChi, dv.Website, dv.DienThoai, dv.MaDV_Cha, dv1.TenDV as TenDV_Cha 
     from donvi as dv, donvi as dv1 
     where dv.MaDV_Cha = dv1.MaDV
    UNION
    select MaDV, TenDV, Email, DiaChi, Website, DienThoai, MaDV_Cha, null as TenDV_Cha 
     from donvi 
     where MaDV_Cha is null) 
    select * from t where MaDV = $madv";

    $res = mysqli_query($conn, $sql);

    if($res == TRUE){
        if(mysqli_num_rows($res) == 1){

            $row=mysqli_fetch_assoc($res);

            $madv = $row['MaDV'];
            $tendv = $row['TenDV'];
            $email = $row['Email'];
            $diachi = $row['DiaChi'];
            $website = $row['Website'];
            $dienthoai = $row['DienThoai'];
            $madv_cha = $row['MaDV_Cha'];
            $tendv_cha = $row["TenDV_Cha"];
        }else{
            header('location:'.SITEURL.'admin/manager-nguoidung.php');
        }
    }
?>

<form action="" method="POST" style="width:30%; margin:auto;">
  <div class="form-group">
    <label for="tendv_input">Tên đơn vị</label>
    <input type="text" class="form-control" id="tendv_input" name="tendv" value="<?php echo $tendv; ?>">
  </div>
  <div class="form-group">
    <label for="email_input">Email</label>
    <input type="text" class="form-control" id="email_input" name="email" value="<?php echo $email; ?>">
  </div>
  <div class="form-group">
    <label for="diachi_input">Địa chỉ</label>
    <input type="text" class="form-control" id="diachi_input" name="diachi" value="<?php echo $diachi; ?>">
  </div>
  <div class="form-group">
    <label for="website_input">Website</label>
    <input type="text" class="form-control" id="website_input" name="website" value="<?php echo $website; ?>">
  </div>
  <div class="form-group">
    <label for="dienthoai_input">Điện thoại</label>
    <input type="text" class="form-control" id="dienthoai_input" name="dienthoai" value="<?php echo $dienthoai; ?>">
  </div>
  <div class="form-group">
    <label for="madv_cha_input">Đơn vị cha</label>
    <select class="form-control" id="madv_cha_input" name="madv_cha">
      <?php
        $sql_slc = "select * from donvi";
        $result = mysqli_query($conn, $sql_slc);
        $i=1;

        if(mysqli_num_rows($result) >0){
          while ($row1 = mysqli_fetch_assoc($result)){
            if($madv_cha != null)
            {
                if ($row1['MaDV'] == $madv_cha)
                {
                  echo "<option value=". $row1['MaDV'] ." selected >". $row1['TenDV'] ."</option>";
                }
                else 
                {
                  echo "<option value=". $row1['MaDV'] .">". $row1['TenDV'] ."</option>";
                };
                if ($i==mysqli_num_rows($result))
                {
                  echo '<option value=null>Trống</option>';
                };
              }
            else 
            {
                if ($i==1) 
                {
                  echo '<option value=null selected>Trống</option>';
                  echo "<option value=". $row1['MaDV'] .">". $row1['TenDV'] ."</option>";
                }
                else 
                {
                  echo "<option value=". $row1['MaDV'] .">". $row1['TenDV'] ."</option>";
                };
              };
                $i++;
            }
        }
      ?>
      </select>
  </div>
  <button type="submit" name="submit" class="btn btn-primary mt-3 justify-contents-center m-auto">Submit</button>
</form>

<?php
  if(isset($_POST['submit'])){

    $tendv = $_POST['tendv'];
    $email = $_POST['email'];
    $diachi = $_POST['diachi'];
    $website = $_POST['website'];
    $dienthoai = $_POST['dienthoai'];
    $madv_cha = $_POST['madv_cha'];

    $sql_1 = "update donvi set 
          TenDV = '$tendv',
          Email = '$email',
          DiaChi = '$diachi',
          Website = '$website',
          DienThoai = '$dienthoai',
          MaDV_Cha = $madv_cha 
          where MaDV = $madv ";

    $res_1 = mysqli_query($conn, $sql_1);

    if($res_1 == TRUE){
      $_SESSION['update'] = "<div class='text-success'>Sửa thông tin đơn vị thành công.</div>";
      header('location:'.SITEURL.'admin/manager-donvi.php');
    }else{
      $_SESSION['update'] = "<div class='text-danger'>lỗi khi sửa thông tin đơn vị.</div>";
      header('location:'.SITEURL.'admin/manager-donvi.php');
    }
  }
?>

<?php include("particals/footer.php") ?>