<?php include("../config/constants.php");?>
<?php
    if(isset($_POST['submit'])){
        if(is_uploaded_file($_FILES["file_image"]["tmp_name"])){
            $target_dir = "images/";
            $target_file = $target_dir . basename($_FILES["file_image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["file_image"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["file_image"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
                // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["file_image"]["tmp_name"], $target_file)) {
                    $sql2 = "update db_nguoidung set 
                            image_name='$target_file'
                            where email = '$email' ; ";
                    $res2 = mysqli_query($conn, $sql2);
                    if($res2 != TRUE){
                        echo "Cập nhật ảnh thất bại";
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
            
        }

        $name = $_POST['name'];
        $ngaysinh = $_POST['ngaysinh'];
        $gioitinh = $_POST['gioitinh'];
        $sdt = $_POST['sdt'];
        $diachi = $_POST['diachi'];

        $sql1 = "update db_nguoidung set 
                name='$name',
                ngaysinh='$ngaysinh',
                gioitinh='$gioitinh',
                sdt='$sdt',
                diachi='$diachi'
                where email = '$email' ; ";
        $res1 = mysqli_query($conn, $sql1);

        if($res1 == TRUE){  
            echo "thêm ảnh thành công";
        }
    }
?>