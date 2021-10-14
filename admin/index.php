<?php include("particals/header.php") ?>

<div class="container">
    <div class="row">
        <span class="text-center fs-2 text fw-bold mt-3">Quản lý nhân viên</span>
        <div class="col-12 flex-row d-flex justify-content-between">
            <div style="position: relative;height: 100px;width: 504px;">
                <div id="cover">
                    <form method="get" action="">
                        <div class="tb">
                        <div class="td"><input type="text" placeholder="Search"></div>
                        <div class="td" id="s-cover">
                            <button type="submit">
                            <div id="s-circle"></div>
                            <span></span>
                            </button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="m-auto">
                <a href="<?php echo SITEURL; ?>admin/add-nhanvien.php?" class="btn btn-primary btn-info p-2">Thêm nhân viên</a>
            </div>
        </div>
        <div class="col-12">
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
            <div class="table100">
                <table>
                    <thead>
                        <tr class="table100-head bg-4">
                            <th scope="col" class="text-center" style="min-width:5%;max-width:5%">STT</th>
                            <th scope="col" class="text-start" style="min-width:15%;max-width:15%">Tên nhân viên</th>
                            <th scope="col" style="min-width:10%;max-width:10%">Chức vụ</th>
                            <th scope="col" style="min-width:9%;max-width:9%;text-align: center;">Máy bàn</th>
                            <th scope="col" style="min-width:20%;max-width:20%">Email</th>
                            <th scope="col" style="min-width:12%;max-width:12%;text-align: center">Số di động</th>
                            <th scope="col" style="min-width:12%;max-width:12%">Đơn vị</th>
                            <th scope="col" class="text-center">Cập nhật</th>
                            <th scope="col" class="text-center">Xóa</th>
                        </tr>
                    </thead>
                    <tbody >
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
                        <tr class="bg-1">
                            <th scope="row" class="text-center" style="max-width:5%"> <?php echo $i; ?> </th>
                            <td class="text-start" style="min-width:15%;max-width:15%"> <?php echo $tennv; ?> </td>
                            <td style="min-width:10%;max-width:10%"> <?php echo $chucvu; ?> </td>
                            <td style="min-width:9%;max-width:9%;text-align: center;"> <?php echo $mayban; ?> </td>
                            <td style="min-width:20%;max-width:20%"> <?php echo $email; ?> </td>
                            <td style="min-width:12%;max-width:12%;text-align: center"> <?php echo $sodidong; ?> </td>
                            <td style="min-width:12%;max-width:12%"> <?php echo $TenDV; ?> </td>
                            <td class="text-center">
                                <a href="<?php echo SITEURL; ?>admin/update-nhanvien.php?id=<?php echo $manv; ?>"
                                    class="btn-secondary rounded" style="text-decoration: none">Update</a>
                            </td>
                            <td class="text-center">
                                <a href="<?php echo SITEURL; ?>admin/delete-nhanvien.php?id=<?php echo $manv; ?>"
                                    class="btn-danger rounded" style="text-decoration: none">Delete</a>
                            </td>
                        </tr>
                    <?php
                            }
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include("../particals-front/footer.php") ?>