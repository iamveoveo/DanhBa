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
  <div class="form-group">
    <label for="madonvi_input">Tên đơn vị</label>
    <select class="form-control" id="madonvi_input" name="madonvi">
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

<?php include("particals/footer.php") ?>  