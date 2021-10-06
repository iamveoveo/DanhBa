<?php
    use PHPMailer\PHPMailer\PHPMailer; 
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/src/Exception.php'; 
    require '../PHPMailer/src/PHPMailer.php'; 
    require '../PHPMailer/src/SMTP.php';

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
?>