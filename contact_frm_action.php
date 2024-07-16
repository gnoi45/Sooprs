<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';


$mail = new PHPMailer;


if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $body = $_POST['body'];

    
        $mail->isSMTP(); 
        $mail->SMTPDebug = 0; 
        $mail->Host = 'smtp.gmail.com'; 
        $mail->Port = 587; // typically 587 
        $mail->SMTPSecure = 'tls'; // ssl is depracated
        $mail->SMTPAuth = true;
        $mail->Username = 'smsunnythefunny@gmail.com';
        $mail->Password = 'uwtshdogkishgcvv';
        $mail->setFrom('smsunnythefunny@gmail.com', 'Sooprs');
        $mail->addAddress("sanurag0022@gmail.com","Anurag");
        $mail->Subject = 'Your New Password';
     
        $mail->msgHTML('Your new passwordk is :'); // remove if you do not want to send HTML email
        // $mail->addAttachment('docs/brochure.pdf'); //Attachment, can be skipped
        $sendRes = $mail->send();
}