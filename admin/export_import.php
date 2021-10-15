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
                    window.location = \"index.php\"
                    </script>";   
            }
            else {
              echo "<script type=\"text/javascript\">
                    alert(\"CSV File has been successfully Imported.\");
                    window.location = \"index.php\"
                    </script>";
            }
          }
      
           fclose($file);  
     }
  }   
 ?>