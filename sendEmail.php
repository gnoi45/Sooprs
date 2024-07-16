<?php

include_once 'function.php';
$db_object = new DB_con();



use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



if (isset($_POST['name']) && isset($_POST['email'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $services = $_POST['services'];
    $message = $_POST['message'];


    $save_investor_query = $db_object->save_investor_q($name,$email,$phone,$services,$message);
    // print_r($save_investor_query);

    require 'PHPMailer/PHPMailer/src/Exception.php';
    require 'PHPMailer/PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/PHPMailer/src/SMTP.php';



    $mail = new PHPMailer();

    //smtp settings
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;

    // $mail->Username = "contact@sooprs.com";
    // $mail->Password = 'ZGA$CIBL7frr';
    $mail->Username = "sanurag0022@gmail.com";
    $mail->Password = 'cxeuyzejebvevkrk';
    $mail->Port = 587;
    $mail->SMTPSecure = "tls";

    //email settings

    $mail->isHTML(true);
    $mail->setFrom("noreply@gmail.com", "No reply");
    $mail->addAddress($email, $name);
    $mail->Subject = ("Sooprs query");
    $mail->msgHTML("Hello, I am interested in your services.<br> My name: " . $name . ".<br> My email: " . $email . " .<br> I am interested in " . $services . " <br>" . $message . " .<br> Please reply to my query as soon as possible. <br>");

    if ($mail->send()) {
        $status = "success";
        $response = "Email is sent!";
    } else {
        $status = "failed";
        $response = "Something is wrong: <br>" . $mail->ErrorInfo;
    }
    exit(json_encode(array("status" => $status, "response" => $response)));
}



?>