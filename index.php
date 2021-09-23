<?php include("particals-front/header.php") ?>
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
                            echo "<tr>";
                                echo '<th scope="row">' . $i . '</th>';
                                echo '<td>' . $row['tennv'] . '</td>';
                                echo '<td>' . $row['chucvu'] . '</td>';
                                echo '<td>' . $row['mayban'] . '</td>';
                                echo '<td>' . $row['email'] . '</td>';
                                echo '<td>' . $row['sodidong'] . '</td>';
                                echo '<td>' . $row['TenDV'] . '</td>';
                            echo "</tr>";
                            $i++;
                        }
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
<?php include("particals-front/footer.php") ?>