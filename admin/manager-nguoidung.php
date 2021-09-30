<?php include("particals/header.php") ?>

<div class="container">
    <div class="row">
        <span class="text-center fs-2 text fw-bold mt-4 mb-2">Quản lý người dùng</span>
        <div class="col-12">
            <div class="d-flex m-1">
                <a href="<?php echo SITEURL; ?>admin/add-nguoidung.php?" class="btn btn-primary btn-info">Thêm</a>
            </div>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <?php 
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                
                if(isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

            ?>
            <table class="table">
                <tr>
                    <th scope="col">Mã người dùng</th>
                    <th scope="col">Tên đăng nhập</th>
                    <th scope="col">Email</th>
                    <th scope="col">Mật khẩu</th>
                    <th scope="col">Cập nhật</th>
                    <th scope="col">Xóa</th>
                </tr>
                <?php
                $sql = "select * from db_nguoidung";
                $result = mysqli_query($conn,$sql);
                $i = 0;
                if (mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_assoc($result)){
                        $i++;
                        $mand = $row['mand'];
                        $tendangnhap = $row['tendangnhap'];
                        $email = $row['email'];
                        $matkhau = $row['matkhau'];
                        ?>
                        <tr>
                            <th scope="row"> <?php echo $i; ?> </th>
                            <td> <?php echo $tendangnhap; ?> </td>
                            <td> <?php echo $email; ?> </td>
                            <td> <?php echo $matkhau; ?> </td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-nguoidung.php?id=<?php echo $mand; ?>" class="btn-secondary rounded" style="text-decoration: none">Update</a>
                            </td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/delete-nguoidung.php?id=<?php echo $mand; ?>" class="btn-danger rounded" style="text-decoration: none">Delete</a>
                            </td>
                        </tr>
                        
                        <?php
                    }
                }
                ?>
            </table>
        </div>
    </div>
</div>

<?php include("particals/footer.php") ?>