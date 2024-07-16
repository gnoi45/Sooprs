<?php
require_once('../../PHPMailer/class.phpmailer.php');
$to = 'vny.009@gmail.com';
$from = 'care@shopninja.in';
$body = '<h2>This is message</h2>';
$title = 'This is demo title';

$mail                = new PHPMailer();
$body                = '';
// $mail->IsSMTP(); // telling the class to use SMTP
// $mail->Host          = "smtp.zoho.in";
// $mail->SMTPAuth      = true;                  // enable SMTP authentication
// //$mail->Host          = "mail.yourdomain.com"; // sets the SMTP server
// $mail->Port          = 587;                    // set the SMTP port for the GMAIL server
// $mail->Username      = "admin@earnezy.in"; // SMTP account username
// $mail->Password      = "G0t@@1004";        // SMTP account password
// $mail->SMTPSecure = 'tls';
$mail->SetFrom($from, $subject);
$mail->AddReplyTo($from, $subject);

$mail->Subject       =require_once('../../PHPMailer/class.phpmailer.php');
$mail                = new PHPMailer();
$body                = '';
// $mail->IsSMTP(); // telling the class to use SMTP
// $mail->Host          = "smtp.zoho.in";
// $mail->SMTPAuth      = true;                  // enable SMTP authentication
// //$mail->Host          = "mail.yourdomain.com"; // sets the SMTP server
// $mail->Port          = 587;                    // set the SMTP port for the GMAIL server
// $mail->Username      = "admin@earnezy.in"; // SMTP account username
// $mail->Password      = "G0t@@1004";        // SMTP account password
// $mail->SMTPSecure = 'tls';
$mail->SetFrom($from, $subject);
$mail->AddReplyTo($from, $subject);

$mail->Subject       = $title;
$mail->AddAddress($to, $subject);


  $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
  $mail->IsHTML(true);
  $mail->Body=$body;
  //$mail->MsgHTML($body);

  if(!$mail->Send()) {
      error_log("email not sent".$mail->ErrorInfo);
    echo "email not sent".$mail->ErrorInfo;
  } else {
      error_log("email sent");
    echo 'sent';
  };
  
  ?>