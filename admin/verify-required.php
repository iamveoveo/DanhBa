<?php include("../config/constants.php");?>

<?php
    if(isset($_GET['email']))
    {
        $email = $_GET['email'];
        
        $sql = "select * from db_nguoidung where email='$email'";
        $res = mysqli_query($conn, $sql);

        if(mysqli_num_rows($res) > 0)
        {
            $row = mysqli_fetch_assoc($res);
            $code = $row['code'];
            
            include("send-verify-mail.php");

            // Mail subject 
            $mail->Subject = 'ACTIVTION EMAIL'; 
            
            // Mail body content 
            $bodyContent = '<h1>CHÚC MỪNG BẠN ĐÃ ĐĂNG KÝ THÀNH CÔNG</h1>'; 
            $bodyContent .= '<p>Để xác thực tài khoản của bạn xin hãy nhấn vào đường dẫn sau <a href="'.SITEURL.'admin/verified-nguoidung.php?email='.$email.'&code='.$code.'"><b>NHẤN VÀO ĐÂY</b></a></p>'; 
            $mail->Body    = $bodyContent; 
            
            // Send email 
            if(!$mail->send()) { 
                echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <title>Quản lý Danh Bạ</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>
    <body style="height:100vh">
        <div class="row w-50 mt-5 h-50 m-auto border rounded border-5 d-flex align-items-center">
            <div class="col-12 text-center fs-3 text fw-normal text-uppercase">
                Hãy kiểm tra email của bạn và làm theo hướng dẫn để xác thực tài khoản của bạn.
            </div>
            <div class="col-12 text-center fs-6 text fw-light"> 
                Nếu bạn không nhận được email từ chúng tôi hãy kiểm tra hộp thư rác hoặc tải lại trang web này để gửi lại email xác thực
            </div>
            <a class="m-auto w-25 btn btn-primary" href="login.php">Đăng nhập</a>
        </div>
    </body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</html>