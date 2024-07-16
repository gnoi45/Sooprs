<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



require 'PHPMailer/PHPMailer/src/Exception.php';
require 'PHPMailer/PHPMailer/src/PHPMailer.php';
require 'PHPMailer/PHPMailer/src/SMTP.php';

$mail = new PHPMailer();

//smtp settings
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "smsunnythefunny@gmail.com";
$mail->Password = 'uwtshdogkishgcvv';
$mail->Port = 465;
$mail->SMTPSecure = "ssl";

//email settings
$mail->isHTML(true);
$mail->setFrom("noreply@gmail.com", "No reply");
$mail->addAddress("sandeep.meh28@gmail.com", "Sandeep");
$mail->Subject = ("Sooprs query");
$mail->msgHTML("Hello, I am interested in your services.<br> My name: " . $name . ".<br> My email: " . $email . " .<br>My mobile number:" . $mobile);

$mail->send();


// Send the email
if ($mail->send()) {
    // If the email was sent successfully, send a success response to the AJAX request
    $response = array('success' => true);
} else {
    // If the email could not be sent, send an error response to the AJAX request
    $response = array('success' => false);
}

// Send the JSON-encoded response back to the AJAX request
// echo json_encode($response);





?>