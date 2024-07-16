<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Path to PHPMailer autoload.php file

function send_email($email, $body, $from, $subject) {
    // Instantiate PHPMailer
    $mail = new PHPMailer(true);

    try {
        // SMTP configuration (if using SMTP)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Replace with your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = 'sanurag0022@gmail.com'; // Replace with your SMTP username
        $mail->Password = 'cxeuyzejebvevkrk'; // Replace with your SMTP password
        $mail->SMTPSecure = 'tls'; // Or 'ssl' if required
        $mail->Port = 587; // Replace with your SMTP port

        // Set email content
        $mail->setFrom($from);
        $mail->addAddress("smsunnythefunny@gmail.com");
        $mail->Subject = $subject;
        $mail->isHTML(true);
        $mail->Body = $body;

        // Send the email
        $mail->send();
        return true; // Email sent successfully
    } catch (Exception $e) {
        return false; // Email could not be sent
    }
}

// Usage example
// $email = 'example@example.com'; // Replace with the recipient's email address
// $subject = 'Reset Password Email from Sooprs';
// $body = 'This is Your New Password: <strong>' . $user . '</strong>';

// if (send_email($email, $body, $from, $subject)) {
//     echo 'Email sent successfully.';
// } else {
//     echo 'Email could not be sent.';
// }
?>
