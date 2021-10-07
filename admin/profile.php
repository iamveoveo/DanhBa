<?php include("particals/header.php"); ?>

<?php
    $email = $_SESSION['user'];

    $sql = "select * from db_nguoidung where email = '$email'";
    $res = mysqli_query($conn, $sql);

    if(mysqli_num_rows($res) == 1){
        $row = mysqli_fetch_assoc($res);
    }
?>

<style>
    .form-control:focus {
        box-shadow: none;
        border-color: #BA68C8
    }

    .profile-button {
        background: rgb(99, 39, 120);
        box-shadow: none;
        border: none
    }

    .profile-button:hover {
        background: #682773
    }

    .profile-button:focus {
        background: #682773;
        box-shadow: none
    }

    .profile-button:active {
        background: #682773;
        box-shadow: none
    }

    .back:hover {
        color: #682773;
        cursor: pointer
    }

    .labels {
        font-size: 11px
    }

    .add-experience:hover {
        background: #BA68C8;
        color: #fff;
        cursor: pointer;
        border: solid 1px #BA68C8
    }
</style>
<form action="">
    <div class="container rounded bg-white mt-5 mb-5 pe-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
                    <span class="font-weight-bold"><?php echo $row['name']; ?></span>
                    <span class="text-black-50"><?php echo $row['email']; ?></span>
                </div>
            </div>
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-right">THÔNG TIN CÁ NHÂN</h4>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Họ và tên</label><input type="text" class="form-control" placeholder="Họ và tên" value="<?php echo $row['name']; ?>" name="name" disabled></div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6"><label class="labels">Ngày sinh</label><input type="date" class="form-control" name="ngaysinh" min="1940-01-01" value="<?php echo $row['ngaysinh']; ?>" disabled></div>
                        <div class="col-md-6">
                            <label class="labels">Giới tính</label>
                            <select name="gioitinh" class="form-select" disabled>
                                <option value=null<?php echo $row['gioitinh']==null?' selected="selected"':'' ?>></option>
                                <option value="Nam"<?php echo $row['gioitinh']=='Nam'?' selected="selected"':'' ?>>Nam</option>
                                <option value="Nữ"<?php echo $row['gioitinh']=='Nữ'?' selected="selected"':'' ?>>Nữ</option>
                                <option value="Khác"<?php echo $row['gioitinh']=='Khác'?' selected="selected"':'' ?>>Khác</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12"><label class="labels">Số điện thoại</label><input type="text" class="form-control" placeholder="Số điện thoại" name="sdt" value="<?php echo $row['sdt']; ?>" disabled></div>
                        <div class="col-md-12"><label class="labels">Địa chỉ</label><input type="text" class="form-control" placeholder="Địa chỉ" name="diachi" value="<?php echo $row['diachi']; ?>" disabled></div>
                    </div>
                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button" name="edit">Chỉnh sửa</button></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-3 py-5">
                    <div class="d-flex justify-content-between align-items-center experience"><span>Edit Experience</span><span class="border px-3 p-1 add-experience"><i class="fa fa-plus"></i>&nbsp;Experience</span></div><br>
                    <div class="col-md-12"><label class="labels">Experience in Designing</label>
                    br
                    CHƯA HOÀN THIỆN
                    <!-- <input type="text" class="form-control" placeholder="experience" value=""></div> <br> -->
                    <div class="col-md-12"><label class="labels">Additional Details</label><!-- <input type="text" class="form-control" placeholder="additional details" value=""> --></div>
                </div>
            </div>
        </div>
    </div>
</form>

<?php include("particals/footer.php"); ?>