<?php
include("../config/constants.php");

 if(isset($_POST["display_import"])){
    
    $filename=$_FILES["file_import"]["tmp_name"];    
     if($_FILES["file_import"]["size"] > 0)
      {
        $file = fopen($filename, "r");?>
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
            <tbody ><?php
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
            {
                $STT = $getData[0];
                $tennv = $getData[1];
                $chucvu = $getData[2];
                $mayban = $getData[3];
                $email = $getData[4];
                $sodidong = $getData[5];
                $donvi = $getData[6];
                ?>
                    <tr class="bg-1">
                        <th scope="row" class="text-center" style="max-width:5%"> <?php echo $STT; ?> </th>
                        <td class="text-start" style="min-width:15%;max-width:15%"> <?php echo $tennv; ?> </td>
                        <td style="min-width:10%;max-width:10%"> <?php echo $chucvu; ?> </td>
                        <td style="min-width:10%;max-width:10%;text-align: center;"> <?php echo $mayban; ?> </td>
                        <td style="min-width:20%;max-width:20%"> <?php echo $email; ?> </td>
                        <td style="min-width:12%;max-width:12%;text-align: center"> <?php echo $sodidong; ?> </td>
                        <td style="min-width:12%;max-width:12%"> <?php echo $donvi; ?> </td>
                    </tr>
                <?php
            }?>
            </tbody>
        </table><?php
        fclose($file);  
     }
  }   
 ?>