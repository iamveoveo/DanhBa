<?php 
    include("../config/constants.php");
    $sql = "select manv, tennv, chucvu, mayban, db_nhanvien.email, sodidong, TenDV from db_nhanvien, donvi where db_nhanvien.madv = donvi.MaDV";
    $res = mysqli_query($conn, $sql);
    $i = 0;
    if(mysqli_num_rows($res) > 0){
        while($row = mysqli_fetch_assoc($res)){
            $search_text = $_POST['search_'];
            if(strpos($row['tennv'], $search_text) !== FALSE){
                if(isset($_POST['searching'])){
                    echo "<div class='suggestion p-1 ps-3' onclick='suggest_click(this)'>".$row['tennv']."</div>";
                }
                if(isset($_POST['search_result'])){
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
                        <td style="min-width:10%;max-width:10%;text-align: center;"> <?php echo $mayban; ?> </td>
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
        } 
    }
?>