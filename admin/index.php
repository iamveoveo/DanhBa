<?php include("particals/header.php") ?>
    <div class="container">
        <div class="row">
            <div class="col-3" style="background-color: #f6f6f6">
                <ul class="list-unstyled mb-0 py-3 pt-md-1">
                    <li class="mb-1">
                        <button class="btn d-inline-flex align-items-center rounded" data-bs-toggle="collapse" data-bs-target="#components-collapse" aria-expanded="true" aria-current="true">
                            Components
                        </button>
                        <div class="collapse m-1" id="components-collapse">
                            <ul class="list-unstyled fw-normal pb-1 small">
                                <li><a href="" class="d-inline-flex align-items-center rounded">content1</a></li>
                                <li><a href="" class="d-inline-flex align-items-center rounded">content2</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-9">
                <div class="d-flex m-1">
                    <a href="<?php echo SITEURL; ?>admin/add-nhanvien.php?" class="btn btn-primary btn-info">Thêm</a>
                </div>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <table class="table">
                    <tr>
                        <th scope="col">Mã nhân viên</th>
                        <th scope="col">Tên nhân viên</th>
                        <th scope="col">Chức vụ</th>
                        <th scope="col">Máy bàn</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số di động</th>
                        <th scope="col">Đơn vị</th>
                    </tr>
                    <?php
                    $sql = "select tennv, chucvu, mayban, db_nhanvien.email, sodidong, TenDV from db_nhanvien, donvi where db_nhanvien.madv = donvi.MaDV";
                    $result = mysqli_query($conn,$sql);
                    $i = 1;
                    if (mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_assoc($result)){
                            $i++;
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
                                    <a href="<?php echo SITEURL; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-primary rounded" style="text-decoration: none">Change Password</a>
                                </td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/update-admin.php?id=<?php echo $id; ?>" class="btn-secondary rounded" style="text-decoration: none">Update</a>
                                </td>
                                <td>
                                    <a href="<?php echo SITEURL; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger rounded" style="text-decoration: none">Delete</a>
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
