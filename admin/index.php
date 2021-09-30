<?php include("particals/header.php") ?>

    <div class="container">
        <div class="row">
            <span class="text-center fs-2 text fw-bold mt-4 mb-2">Quản lý nhân viên</span>
            <div class="col-12">
                <div class="d-flex m-1">
                    <a href="<?php echo SITEURL; ?>admin/add-nhanvien.php?" class="btn btn-primary btn-info">Thêm</a>
                </div>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <?php 
                    if(isset($_SESSION['login'])){
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }

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
                        <th scope="col">Mã nhân viên</th>
                        <th scope="col">Tên nhân viên</th>
                        <th scope="col">Chức vụ</th>
                        <th scope="col">Máy bàn</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số di động</th>
                        <th scope="col">Đơn vị</th>
                        <th scope="col">Cập nhật</th>
                        <th scope="col">Xóa</th>
                    </tr>
                    <?php
                    $sql = "select manv, tennv, chucvu, mayban, db_nhanvien.email, sodidong, TenDV from db_nhanvien, donvi where db_nhanvien.madv = donvi.MaDV";
                    $result = mysqli_query($conn,$sql);
                    $i = 0;
                    if (mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_assoc($result)){
                            $i++;
                            $manv = $row['manv'];
                            $tennv = $row['tennv'];
                            $chucvu = $row['chucvu'];
                            $mayban = $row['mayban'];
                            $email = $row['email'];
                            $sodidong = $row['sodidong'];
                            $TenDV = $row['TenDV'];
                            ?>
                            <tr>
                                <th scope="row"> <?php echo $i; ?> </th>
                                <td> <?php echo $tennv; ?> </td>
                                <td> <?php echo $chucvu; ?> </td>
                                <td> <?php echo $mayban; ?> </td>
                                <td> <?php echo $email; ?> </td>
                                <td> <?php echo $sodidong; ?> </td>
                                <td> <?php echo $TenDV; ?> </td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-nhanvien.php?id=<?php echo $manv; ?>" class="btn-secondary rounded" style="text-decoration: none">Update</a>
                                </td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/delete-nhanvien.php?id=<?php echo $manv; ?>" class="btn-danger rounded" style="text-decoration: none">Delete</a>
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

<?php include("../particals-front/footer.php") ?>
