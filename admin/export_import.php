<?php include("../config/constants.php") ?>
<?php
    if(isset($_POST["export"])){

        header('Content-Encoding: UTF-8');
        header('Content-Type: text/csv; charset=utf-8');  
        header('Content-Disposition: attachment; filename=export.csv');  
        $output = fopen("php://output", "w");  
        fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));
        fputcsv($output, array("STT", "TenNV", "ChucVu", "MayBan", "Email", "SoDiDong", "DonVi")); 

        $sql = "select manv, tennv, chucvu, mayban, db_nhanvien.email, sodidong, TenDV from db_nhanvien, donvi where db_nhanvien.madv = donvi.MaDV";
        $result = mysqli_query($conn,$sql);
        $i = 0;
        if (mysqli_num_rows($result) > 0)
        {
            while($row = mysqli_fetch_assoc($result)){ 
                $i++;
                $new_row = array($i, $row['tennv'], $row['chucvu'], $row['mayban'], $row['email'], $row['sodidong'], $row['TenDV'], );
                fputcsv($output, $new_row); 
            }
        }  
        fclose($output);  
    }  
?>
<?php
 if(isset($_POST["import"])){
    
    $filename=$_FILES["file_import"]["tmp_name"];    
     if($_FILES["file_import"]["size"] > 0)
      {
        $file = fopen($filename, "r");
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
          {
            $sql1 = "select * from donvi where TenDV='$getData[6]'";
            $res1 = mysqli_query($conn, $sql1);
            $row = [];
            if(mysqli_num_rows($res1)>0){
              $row = mysqli_fetch_assoc($res1);
            }
            $sql2 = "select email from db_nhanvien where email = '$getData[4]'";
            $res2 = mysqli_query($conn, $sql2);
            if(mysqli_num_rows($res2) == 0){
              $sql = "INSERT into db_nhanvien set
                    tennv = '".$getData[1]."',
                    chucvu = '".$getData[2]."',
                    mayban = '".$getData[3]."',
                    email = '".$getData[4]."',
                    sodidong = '".$getData[5]."',
                    madv = '".$row['MaDV']."'
                    ";
              $result = mysqli_query($conn, $sql);
              if(!isset($result))
              {
                echo "<script type=\"text/javascript\">
                      alert(\"Invalid File:Please Upload CSV File.\");
                      </script>";   
              }
              else {}
            }
            else {}
          }
        fclose($file);  
        ?>
        <table>
          <thead>
              <tr class="table100-head bg-4">
                  <th scope="col" class="text-center" style="min-width:5%;max-width:5%">STT</th>
                  <th scope="col" class="text-start" style="min-width:15%;max-width:15%">Tên nhân viên</th>
                  <th scope="col" style="min-width:10%;max-width:10%">Chức vụ</th>
                  <th scope="col" style="min-width:10%;max-width:10%;text-align: center;">Máy bàn</th>
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
              ?>
              </tbody>
          </table>
        <?php 
      }
  }  
 ?>