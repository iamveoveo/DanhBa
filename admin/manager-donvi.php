<?php include("particals/header.php") ?>

<div class="container">
    <div class="row">
        <span class="text-center fs-2 text fw-bold mt-4 mb-2">Quản lý đơn vị</span>
        <div class="col-12">
            <div class="d-flex m-1">
                <a href="<?php echo SITEURL; ?>admin/add-donvi.php?" class="btn btn-primary btn-info">Thêm</a>
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
                    <th scope="col">Số thứ tự</th>
                    <th scope="col">Tên đơn vị</th>
                    <th scope="col">Email</th>
                    <th scope="col">Địa chỉ</th>
                    <th scope="col">Website</th>
                    <th scope="col">Điện thoại</th>
                    <th scope="col">Đơn vị cha</th>
                    <th scope="col">Cập nhật</th>
                    <th scope="col">Xóa</th>
                </tr>
                <?php
                $sql = "select dv.MaDV, dv.TenDV, dv.Email, dv.DiaChi, dv.Website, dv.DienThoai, dv.MaDV_Cha, dv1.TenDV as TenDV_Cha from donvi as dv, donvi as dv1 where dv.MaDV_Cha = dv1.MaDV
                UNION
                select MaDV, TenDV, Email, DiaChi, Website, DienThoai, MaDV_Cha, null as TenDV_Cha from donvi where MaDV_Cha is null";

                $result = mysqli_query($conn,$sql);
                $i = 0;
                if (mysqli_num_rows($result) > 0)
                {
                    while($row = mysqli_fetch_assoc($result)){
                        $i++;
                        $madv = $row['MaDV'];
                        $tendv = $row['TenDV'];
                        $email = $row['Email'];
                        $diachi = $row['DiaChi'];
                        $website = $row['Website'];
                        $dienthoai = $row['DienThoai'];
                        $madv_cha = $row['MaDV_Cha'];
                        $tendv_cha = $row["TenDV_Cha"];

                        ?>
                        <tr>
                            <th scope="row"> <?php echo $i; ?> </th>
                            <td> <?php echo $tendv; ?> </td>
                            <td> <?php echo $email; ?> </td>
                            <td> <?php echo $diachi; ?> </td>
                            <td> <?php echo $website; ?> </td>
                            <td> <?php echo $dienthoai; ?> </td>
                            <td> <?php echo $tendv_cha; ?> </td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/update-donvi.php?id=<?php echo $madv; ?>" class="btn-secondary rounded" style="text-decoration: none">Update</a>
                            </td>
                            <td>
                                <a href="<?php echo SITEURL; ?>admin/delete-donvi.php?id=<?php echo $madv; ?>" class="btn-danger rounded" style="text-decoration: none">Delete</a>
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