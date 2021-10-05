<?php include("../config/constants.php");?>

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
        <div class="row w-50 py-5 h-50 m-auto border rounded border-5 d-flex align-items-center">
            <div class="col-12 text-center fs-3 text fw-normal text-uppercase">
                Hãy kiểm tra email của bạn và làm theo hướng dẫn để xác thực tài khoản của bạn
            </div>
            <a class="m-auto w-25 btn btn-primary" href="login.php">Đăng nhập</a>
        </div>
    </body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</html>
<?php 

    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/src/Exception.php'; 
    require '../PHPMailer/src/PHPMailer.php'; 
    require '../PHPMailer/src/SMTP.php';

    $email = $_GET['email'];
    $mail = new PHPMailer; 

    $mail->isSMTP();                      // Set mailer to use SMTP 
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->Host = 'smtp.gmail.com';       // Specify main and backup SMTP servers 
    $mail->SMTPAuth = true;               // Enable SMTP authentication 
    $mail->Username = 'vinhveoveo21@gmail.com';   // SMTP username 
    $mail->Password = 'vinhvinhveo123';   // SMTP password 
    $mail->SMTPSecure = 'tls';            // Enable TLS encryption, `ssl` also accepted 
    $mail->Port = 587;                    // TCP port to connect to 
    $mail->CharSet = 'UTF-8';
    
    // Sender info 
    $mail->setFrom('vinhveoveo21@gmail.com', 'local'); 
    $mail->addReplyTo('vinhveoveo21@gmail.com', 'local'); 
    
    // Add a recipient 
    $mail->addAddress($email); 
    
    //$mail->addCC('cc@example.com'); 
    //$mail->addBCC('bcc@example.com'); 
    
    // Set email format to HTML 
    $mail->isHTML(true); 
    
    // Mail subject 
    $mail->Subject = 'ACTIVTION EMAIL'; 
    
    // Mail body content 
    $bodyContent = '<h1>CHÚC MỪNG BẠN ĐÃ ĐĂNG KÝ THÀNH CÔNG</h1>'; 
    $bodyContent .= '<p>Để xác thực tài khoản của bạn xin hãy nhấn vào đường dẫn sau <a href="'.SITEURL.'admin/index.php?email='.$email.'"><b>NHẤN VÀO ĐÂY</b></a></p>'; 
    $mail->Body    = $bodyContent; 
    
    // Send email 
    if(!$mail->send()) { 
        echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo; 
    }
    ob_end_flush();
?>