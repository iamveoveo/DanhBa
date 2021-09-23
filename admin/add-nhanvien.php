<?php include("particals/header.php") ?>

<form>
  <div class="form-group">
    <label for="hoten_input">Họ và tên</label>
    <input type="text" class="form-control" id="hoten_input" placeholder="VD: Nguyễn Văn A">
  </div>
  <div class="form-group">
    <label for="chucvu_input">Chức vụ</label>
    <input type="text" class="form-control" id="chucvu_input" placeholder="VD: Giảng viên">
  </div>
  <div class="form-group">
    <label for="mayban_input">Máy bàn</label>
    <input type="text" class="form-control" id="mayban_input" placeholder="VD: 043x xxxx">
  </div>
  <div class="form-group">
    <label for="email_input">Email</label>
    <input type="email" class="form-control" id="chucvu_input" placeholder="VD: AvanNguyen@abc.com.vn">
  </div>
  <div class="form-group">
    <label for="sodidong_input">Số di động</label>
    <input type="text" class="form-control" id="sodidong_input" placeholder="VD: 033x xxx xxx">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php include("particals/footer.php") ?>