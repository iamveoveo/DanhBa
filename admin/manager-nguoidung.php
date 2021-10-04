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
            <table class="table" style="table-layout: fixed; width: 100%;">
                <tr>
                    <th scope="col">Số thứ tự</th>
                    <th scope="col">Tên</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col">Ngày đăng ký</th>
                    <th scope="col">Cấp bậc người dùng</th>
                    <th scope="col">Trạng thái tài khoản</th>
                    <th scope="col">Sửa</th>
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
                        $userid = $row['userid'];
                        $name = $row['name'];
                        $email = $row['email'];
                        $password = $row['password'];
                        $registration_date = $row['registration_date'];
                        $user_level = $row['user_level'];
                        $STATUS = $row['STATUS'];
                        ?>
                        <tr>
                            <th scope="row"> <?php echo $i; ?> </th>
                            <td> <?php echo $name; ?> </td>
                            <td style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"> <?php echo $email; ?> </td>
                            <td style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis;"> <?php echo $password; ?> </td>
                            <td> <?php echo $registration_date; ?> </td>
                            <td> <?php echo $user_level; ?> </td>
                            <td> <?php echo $STATUS; ?> </td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-nguoidung.php?id=<?php echo $userid; ?>" class="btn-secondary rounded" style="text-decoration: none">Update</a>
                            </td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/delete-nguoidung.php?id=<?php echo $userid; ?>" class="btn-danger rounded" style="text-decoration: none">Delete</a>
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