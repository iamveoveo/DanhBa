<?php include("particals/header.php") ?>

<form action="" method="POST" style="width:30%; margin:auto;">
  <div class="form-group">
    <label for="tendv_input">Tên đơn vị</label>
    <input type="text" class="form-control" id="tendv_input" name="tendv" placeholder="VD: Khoa CNTT">
  </div>
  <div class="form-group">
    <label for="email_input">Email</label>
    <input type="text" class="form-control" id="email_input" name="email" placeholder="VD: Khoa@gmail.com">
  </div>
  <div class="form-group">
    <label for="diachi_input">Địa chỉ</label>
    <input type="text" class="form-control" id="diachi_input" name="diachi" placeholder="VD: Nhà C1, Trường ĐHTL">
  </div>
  <div class="form-group">
    <label for="website_input">Website</label>
    <input type="text" class="form-control" id="website_input" name="website" placeholder="VD:cse.tlu.edu.vn">
  </div>
  <div class="form-group">
    <label for="dienthoai_input">Điện thoại</label>
    <input type="text" class="form-control" id="dienthoai_input" name="dienthoai" placeholder="02433555599">
  </div>
  <div class="form-group">
    <label for="madv_cha_input">Đơn vị cha</label>
    <select class="form-control" id="madv_cha_input" name="madv_cha">
      <option value=null>Trống</option>
      <?php
        $sql = "select * from donvi";
        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) >0){
          while ($row = mysqli_fetch_assoc($result)){
            echo "<option value=". $row['MaDV'] .">". $row['TenDV'] ."</option>";
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

    $sql_1 = "insert into donvi set 
          TenDV = '$tendv',
          Email = '$email',
          DiaChi = '$diachi',
          Website = '$website',
          DienThoai = '$dienthoai',
          MaDV_Cha = $madv_cha ";

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