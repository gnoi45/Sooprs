<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Path to PHPMailer autoload.php file
include_once "env.php";

// define('HOST', 'localhost');
// define('USERNAME', 'root');
// define('PASSWORD', 'Sandy@3105');
// define('DATABASE', 'sooprs');

define('HOST', 'localhost');
define('USERNAME', 'shopndto_sooprs_secure');
define('PASSWORD', 'x1.@EX)2BQ!7');
define('DATABASE', 'shopndto_sooprsdev');

class DB_con
{
    public $dbh;
    public $id;
    public $name;

    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    // use PHPMailer\PHPMailer\Exception;



    // function sendmail($email, $reset_token)
    // {

    //     require('PHPMailer-master/src/PHPMailer.php');
    //     require('PHPMailer-master/src/Exception.php');
    //     require('PHPMailer-master/src/SMTP.php');

    //     $mail = new PHPMailer(true);

    //     try {
    //         $mail->isSMTP();
    //         $mail->Host = 'smtp.gmail.com';
    //         $mail->SMTPAuth = true;
    //         $mail->Username = "sanurag0022@gmail.com";
    //         $mail->Password = 'cxeuyzejebvevkrk';
    //         // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    //         $mail->SMTPSecure = "tsl";
    //         $mail->Port = 587;

    //         $mail->setFrom("noreply@gmail.com", "No reply");
    //         $mail->addAddress($email, $name);

    //         $mail->isHTML(true);
    //         $mail->Subject = 'Password Reset link form Aatmaninfo';
    //         $mail->Body = "we got a request form you to reset Password! <br>Click the link bellow: <br>
    //         <a href='https://shopninja.in/sooprs/updatePassword.php?email=$email&reset_token=$reset_token'>reset password</a>";

    //         $mail->send();
    //         return true;
    //     } catch (Exception $e) {
    //         return false;
    //     }
    // }



    function __construct()
    {
        $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        $this->dbh = $con;


        // Check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }


    }






    // for username availblty
    public function usernameavailblty($uname)
    {
        $result = mysqli_query($this->dbh, "SELECT Username FROM tblusers WHERE Username='$uname'");
        return $result;

    }



    public function checkemail($email, $table)
    {
        $res = mysqli_query($this->dbh, "SELECT email FROM $table WHERE email='$email'");
        $fetch = mysqli_fetch_assoc($res);
        if($fetch){
            return true;
        }
        return false;
    }


    public function getUserType($email)
    {


        $sql = "SELECT * FROM `join_professionals` WHERE `email` = '$email'";

        $result = mysqli_query($this->dbh, $sql);


        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                $results = $row['is_buyer'];

            }
            return $results;

        } else {
            return false;
        }
    }
    public function getUserIdGoogle($email)
    {


        $sql = "SELECT * FROM `join_professionals` WHERE `email` = '$email'";

        $result = mysqli_query($this->dbh, $sql);


        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                $results = $row['id'];

            }
            return $results;

        } else {
            return false;
        }
    }




    // Function for registration
    public function registration($type, $name, $email, $mobile, $organisation, $password, $table)
    {
        $ret = mysqli_query($this->dbh, "INSERT INTO $table(type,name,email,mobile,organisation,password) values('$type','$name','$email', '$mobile','$organisation','$password')");
        return $ret;
    }


    public function profes_registration($name, $email, $mobile, $organisation, $service,$password, $table)
    {
        $nameStr = str_replace(" ","",$name);
        $slug = "@".$nameStr.date("ymdhis");
        $ret = mysqli_query($this->dbh, "INSERT INTO $table(name,slug,email,mobile,organisation,services,password) values('$name','$slug','$email', '$mobile','$organisation','$service','$password')");
        return $ret;
    }


    public function customer_registration($name, $email, $mobile, $password, $table)
    {

        $ret = mysqli_query($this->dbh, "INSERT INTO $table(name,email,mobile,password) values('$name','$email','$mobile','$password')");
        // $this->send_welcome_email();
        
        return $ret;
    }


    public function sendWelcomeEmail($name,$email,$login)
    {   
        
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
        $mail->setFrom("smsunnythefunny@gmail.com");
        $mail->addAddress($email);
        $mail->Subject = "Welcome email";
        $mail->isHTML(true);
        $mail->Body = '<!DOCTYPE html>
        <html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
        <head>
        <title></title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
        
    </head>
        <style>
            * {
            box-sizing: border-box;
            }
        
            body {
            margin: 0;
            padding: 0;
            }
        
            a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: inherit !important;
            }
        
            #MessageViewBody a {
            color: inherit;
            text-decoration: none;
            }
        
            p {
            line-height: inherit
            }
        
            .desktop_hide,
            .desktop_hide table {
            mso-hide: all;
            display: none;
            max-height: 0px;
            overflow: hidden;
            }
        
            .image_block img+div {
            display: none;
            }
        
            @media (max-width:620px) {
        
            .desktop_hide table.icons-inner,
            .social_block.desktop_hide .social-table {
                display: inline-block !important;
            }
        
            .icons-inner {
                text-align: center;
            }
        
            .icons-inner td {
                margin: 0 auto;
            }
        
            .image_block img.fullWidth {
                max-width: 100% !important;
            }
        
            .mobile_hide {
                display: none;
            }
        
            .row-content {
                width: 100% !important;
            }
        
            .stack .column {
                width: 100%;
                display: block;
            }
        
            .mobile_hide {
                min-height: 0;
                max-height: 0;
                max-width: 0;
                overflow: hidden;
                font-size: 0px;
            }
        
            .desktop_hide,
            .desktop_hide table {
                display: table !important;
                max-height: none !important;
            }
            }

            .login-btn{
            background-color: #005eff;
            color: white;
            padding: 7px 30px;
            border: none;
            font-size: 18px;
            }
        </style>
        </head>
        
        <body style="background-color: #f9f9f9; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
        <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation"
            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f9f9f9; background-image:url("images/Header_image_Back_to_School_2.png"); background-position: top center; background-size: auto; background-repeat: no-repeat;"
            width="100%">
            <tbody>
            <tr>
                <td>
                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1"
                    role="presentation" style="" >
                    <tbody>
                    <tr>
                        <td>
                        <table align="center" border="0" cellpadding="0" cellspacing="0"
                            class="row-content stack" role="presentation"
                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-radius: 0; color: #000; width: 600px; margin: 0 auto;"
                            width="600">
                            <tbody>
                            <tr>
                                <td class="column column-1"
                                style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 30px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                width="100%">
                                <table border="0" cellpadding="0" cellspacing="0"
                                    class="image_block block-1" role="presentation"
                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                    width="100%">
                                    <tr>
                                    <td class="pad" style="padding-bottom:20px;width:100%;">
                                        <div align="center" class="alignment"
                                        style="line-height:10px"><img alt=""
                                            src="https://res.cloudinary.com/dr4iluda9/image/upload/v1691132151/sooprs/sooprs_logo_blue_side2_flxyxx.png"
                                            style="display: block; height: auto; border: 0; max-width: 200px; width: 100%;"
                                            title="" width="314" /></div>
                                    </td>
                                    </tr>
                                </table>
                                
                                
                                <table border="0" cellpadding="0" cellspacing="0"
                                    class="heading_block block-4" role="presentation"
                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                    width="100%">
                                    <tr>
                                    <td class="pad" style="text-align:center;width:100%;">
                                        <h3
                                        style="margin: 0; color: #000000; direction: ltr; font-family: Arial, sans-serif; font-weight: 700; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;">
                                        <span class="tinyMce-placeholder">Hi '.$name.', welcome to Sooprs!</span></h3>
                                    </td>
                                    </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0"
                                    class="paragraph_block block-5" role="presentation"
                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                    width="100%">
                                    <tr>
                                    <td class="pad"
                                        style="padding-left:10px;padding-right:15px;padding-top:15px;">
                                        <div
                                        style="color:#12275a;direction:ltr;font-family: Arial, sans-serif;font-size:18px;font-weight:400;letter-spacing:0px;line-height:120%;text-align:center;mso-line-height-alt:21.599999999999998px;    text-align: -webkit-center;">
                                        <p style="margin: 0;">Congratulations! You have successfully registered on Sooprs. We are thrilled to welcome you to our community.</p>
                                        
                                        </div>
                                    </td>
                                    </tr>
                                </table>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <table border="0" cellpadding="0" cellspacing="0" class="image_block block-1"
                role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                <tr>
                <td class="pad" style="padding-bottom:20px;width:100%;">
                    <div align="center" class="alignment" style="line-height:10px;margin-top: 20px;"><img
                        alt=""
                        src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681113358/sooprs/banner-4_gwfjsd.webp"
                        style="display: block; height: auto; border: 0; max-width: 300px; width: 100%;"
                        title="" width="314" /></div>
                </td>
                </tr>
            </table>
                <table border="0" cellpadding="0" cellspacing="0" class="image_block block-1"
                role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                <tr>
                <td class="pad" style="padding-bottom:20px;width:100%;">
                    <div align="center" class="alignment" style="line-height:10px;margin-top: 20px;"><a href="https://shopninja.in/sooprs/'.$login.'">
                        <img
                            alt="" src="https://res.cloudinary.com/dr4iluda9/image/upload/v1694423476/sooprs/login-btn_ex1sc3.png"
                            style="display: block; height: auto; border: 0; max-width: 80px; width: 100%;"
                            title="" width="314" />
                    </a></div>
                </td>
                </tr>
            </table>
                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2"
                    role="presentation"
                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-position: center top;"
                    width="100%">
                    <tbody>
                    <tr>
                        <td>
                        <table align="center" border="0" cellpadding="0" cellspacing="0"
                            class="row-content stack" role="presentation"
                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff7fb; color: #000; width: 600px; margin: 0 auto;"
                            width="600">
                            <tbody>
                            <tr>
                                <td class="column column-1"
                                style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; background-color: #fcfcfc; padding-bottom: 25px; padding-left: 25px; padding-right: 25px; padding-top: 45px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                width="100%">
                                <table border="0" cellpadding="10" cellspacing="0"
                                    class="social_block block-1" role="presentation"
                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                    width="100%">
                                    <tr>
                                    <td class="pad">
                                        <div align="center" class="alignment">
                                        <table border="0" cellpadding="0" cellspacing="0"
                                            class="social-table" role="presentation"
                                            style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; "
                                            width="184px">
                                            <tr style="text-align: center;">
                                                <td style="padding:0 7px 0 7px;"><a href="https://www.facebook.com/sooprs"
                                                    target="_blank"><img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1694432283/sooprs/fb_1_zn4iiw.png" alt="" style="max-width: 22px;"></a></td>
                                                <td style="padding:0 7px 0 7px;"><a href="https://twitter.com/Sooprs2"
                                                    target="_blank"><img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1694432283/sooprs/twitter_1_codkhz.png" alt="" style="max-width: 22px;"></a></td>
                                                <td style="padding:0 7px 0 7px;"><a href="https://www.youtube.com/channel/UCIRnMCgDcVLHW2n3Chd_INw"
                                                    target="_blank"><img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1694432855/sooprs/youtube_1_ou8jdp.png" alt="" style="max-width: 22px;"></a></td>
                                                <td style="padding:0 7px 0 7px;"><a href="https://www.instagram.com/sooprsofficial/"
                                                    target="_blank"><img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1694432284/sooprs/instagram_1_heqseg.png" alt="" style="max-width: 22px;"></a></td>
                                            </tr>
                                        </table>
                                        </div>
                                    </td>
                                    </tr>
                                </table>
                                
                                <table border="0" cellpadding="10" cellspacing="0"
                                    class="paragraph_block block-2" role="presentation"
                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                    width="100%">
                                    <tr>
                                    <td class="pad">
                                        <div
                                        style="color:#66787f;font-family: Arial, sans-serif;font-size:14px;line-height:120%;text-align:center;mso-line-height-alt:16.8px;">
                                        <p style="margin: 0; word-break: break-word;">© 2023 sooprs.com | All rights reserved</p>
                                        </div>
                                    </td>
                                    </tr>
                                </table>
                                <!-- <table border="0" cellpadding="10" cellspacing="0"
                                    class="paragraph_block block-3" role="presentation"
                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                    width="100%">
                                    <tr>
                                    <td class="pad">
                                        <div
                                        style="color:#66787f;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:14px;line-height:120%;text-align:center;mso-line-height-alt:16.8px;">
                                        <p style="margin: 0; word-break: break-word;"><a
                                            href=" http://www.example.com"
                                            rel="noopener"
                                            style="text-decoration: underline; color: #0068a5;"
                                            target="_blank">Contact Us</a> | <a
                                            href=" http://www.example.com"
                                            rel="noopener"
                                            style="text-decoration: underline; color: #0068a5;"
                                            target="_blank">Unsubscribe</a></p>
                                        </div>
                                    </td>
                                    </tr>
                                </table> -->
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
                
                </td>
            </tr>
            </tbody>
        </table><!-- End -->


        
        </body>
        
        </html>';

        // Send the email
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false; // Email could not be sent
    }
        
    }

    // Lead purchase mail 
    public function lead_purchase_mail($email)
    {           
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
        $mail->setFrom("smsunnythefunny@gmail.com");
        $mail->addAddress($email);
        $mail->Subject = "Welcome email";
        $mail->isHTML(true);
        $mail->Body = '<!DOCTYPE html>

        <html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
        
        <head>
          <title></title>
          <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
          <meta content="width=device-width, initial-scale=1.0" name="viewport" />
          <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
            integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        </head>
        <style>
          * {
            box-sizing: border-box;
          }
        
          body {
            margin: 0;
            padding: 0;
          }
        
          a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: inherit !important;
          }
        
          #MessageViewBody a {
            color: inherit;
            text-decoration: none;
          }
        
          p {
            line-height: inherit
          }
        
          .desktop_hide,
          .desktop_hide table {
            mso-hide: all;
            display: none;
            max-height: 0px;
            overflow: hidden;
          }
        
          .image_block img+div {
            display: none;
          }
        
          @media (max-width:620px) {
        
            .desktop_hide table.icons-inner,
            .social_block.desktop_hide .social-table {
              display: inline-block !important;
            }
        
            .icons-inner {
              text-align: center;
            }
        
            .icons-inner td {
              margin: 0 auto;
            }
        
            .image_block img.fullWidth {
              max-width: 100% !important;
            }
        
            .mobile_hide {
              display: none;
            }
        
            .row-content {
              width: 100% !important;
            }
        
            .stack .column {
              width: 100%;
              display: block;
            }
        
            .mobile_hide {
              min-height: 0;
              max-height: 0;
              max-width: 0;
              overflow: hidden;
              font-size: 0px;
            }
        
            .desktop_hide,
            .desktop_hide table {
              display: table !important;
              max-height: none !important;
            }
          }
        
          .login-btn {
            background-color: #005eff;
            color: white;
            padding: 7px 30px;
            border: none;
            font-size: 18px;
          }
        </style>
        </head>
        
        <body style="background-color: #f9f9f9; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
        
          <div>
        
            <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation"
              style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f9f9f9; background-position: top center; background-size: auto;
              background-repeat: no-repeat;" width="100%">
              <tbody>
                <tr>
                  <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1" role="presentation"
                      style="">
                      <tbody>
                        <tr>
                          <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack"
                              role="presentation"
                              style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-radius: 0; color: #000; width: 600px; margin: 0 auto;"
                              width="600">
                              <tbody>
                                <tr>
                                  <td class="column column-1"
                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 30px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                    width="100%">
                                    <table border="0" cellpadding="0" cellspacing="0" class="image_block block-1"
                                      role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                      <tr>
                                        <td class="pad" style="padding-bottom:20px;width:100%;">
                                          <div align="center" class="alignment" style="line-height:10px"><img
                                              alt="Bee School logo"
                                              src="https://res.cloudinary.com/dr4iluda9/image/upload/v1691132151/sooprs/sooprs_logo_blue_side2_flxyxx.png"
                                              style="display: block; height: auto; border: 0; max-width: 200px; width: 100%;"
                                              title="Bee School logo" width="314" /></div>
                                        </td>
                                      </tr>
                                    </table>
        
        
                                    <table border="0" cellpadding="0" cellspacing="0" class="heading_block block-4"
                                      role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                      <tr>
                                        <td class="pad" style="text-align:center;width:100%;">
                                          <!-- <h3
                                            style="margin: 0; color: #000000; direction: ltr; font-family: Arial, sans-serif; font-weight: 700; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;">
                                            <span class="tinyMce-placeholder">Hi Sandeep, welcome to Sooprs!</span>
                                          </h3> -->
                                        </td>
                                      </tr>
                                    </table>
                                    <table border="0" cellpadding="0" cellspacing="0" class="paragraph_block block-5"
                                      role="presentation"
                                      style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                      <tr>
                                        <td class="pad" style="padding-left:10px;padding-right:15px;">
                                          <div style="color:#12275a;direction:ltr;font-family: Arial, sans-serif;font-size:18px;font-weight:400;letter-spacing:0px;line-height:120%;text-align:center;mso-line-height-alt:21.599999999999998px;    text-align: -webkit-center;">
                                            <h1>THANK YOU </h1> <h3><i>So Much</i></h3> 
                                            <p style="margin: 0;">We appriciate your most recent purchase and hope you</p> <br>
                                            <b>ENJOY YOUR NEW PROJECT</b>
        
                                          </div>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" class="image_block block-1"
                      role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                      <tr>
                        <td class="pad" style="padding-bottom:20px;width:100%;">
                          <div align="center" class="alignment" style="line-height:10px;margin-top: 20px;"><img
                              alt="Bee School logo"
                              src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681113358/sooprs/banner-4_gwfjsd.webp"
                              style="display: block; height: auto; border: 0; max-width: 300px; width: 100%;"
                              title="Bee School logo" width="314" /></div>
                        </td>
                      </tr>
                    </table>
                    <table border="0" cellpadding="0" cellspacing="0" class="image_block block-1"
                      role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                      <tr>
                        <td class="pad" style="padding-bottom:20px;width:100%;">
                          <div align="center" class="alignment" style="line-height:10px;margin-top: 20px;"><a href="https://shopninja.in/sooprs/leads">
                            <img
                                alt="Bee School logo"
                                src="https://res.cloudinary.com/dr4iluda9/image/upload/v1694429570/sooprs/explore-more_qtopgy.png"
                                style="display: block; height: auto; border: 0; max-width: 95px; width: 100%;"
                                title="Bee School logo" width="314" />
                          </a>
                        </div>
                        </td>
                      </tr>
                    </table>
                    
                    <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2" role="presentation"
                      style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-position: center top;" width="100%">
                      <tbody>
                        <tr>
                          <td>
                            <table align="center" border="0" cellpadding="0" cellspacing="0" class="row-content stack"
                              role="presentation"
                              style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff7fb; color: #000; width: 600px; margin: 0 auto;"
                              width="600">
                              <tbody>
                                <tr>
                                  <td class="column column-1"
                                    style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; background-color: #fcfcfc; padding-bottom: 25px; padding-left: 25px; padding-right: 25px; padding-top: 45px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                    width="100%">
                                    <table border="0" cellpadding="10" cellspacing="0" class="social_block block-1"
                                      role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                                      <tr>
                                        <td class="pad">
                                          <div align="center" class="alignment">
                                            <table border="0" cellpadding="0" cellspacing="0" class="social-table"
                                              role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; "
                                              width="184px">
                                            <tr style="text-align: center;">
                                                <td style="padding:0 7px 0 7px;"><a href="https://www.facebook.com/sooprs"
                                                    target="_blank"><img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1694432283/sooprs/fb_1_zn4iiw.png" alt="" style="max-width: 22px;"></a></td>
                                                <td style="padding:0 7px 0 7px;"><a href="https://twitter.com/Sooprs2"
                                                    target="_blank"><img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1694432283/sooprs/twitter_1_codkhz.png" alt="" style="max-width: 22px;"></a></td>
                                                <td style="padding:0 7px 0 7px;"><a href="https://www.youtube.com/channel/UCIRnMCgDcVLHW2n3Chd_INw"
                                                    target="_blank"><img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1694432855/sooprs/youtube_1_ou8jdp.png" alt="" style="max-width: 22px;"></a></td>
                                                <td style="padding:0 7px 0 7px;"><a href="https://www.instagram.com/sooprsofficial/"
                                                    target="_blank"><img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1694432284/sooprs/instagram_1_heqseg.png" alt="" style="max-width: 22px;"></a></td>
                                            </tr>
                                            </table>
                                          </div>
                                        </td>
                                      </tr>
                                    </table>
        
                                    <table border="0" cellpadding="10" cellspacing="0" class="paragraph_block block-2"
                                      role="presentation"
                                      style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;" width="100%">
                                      <tr>
                                        <td class="pad">
                                          <div
                                            style="color:#66787f;font-family: Arial, sans-serif;font-size:14px;line-height:120%;text-align:center;mso-line-height-alt:16.8px;">
                                            <p style="margin: 0; word-break: break-word;">© 2023 sooprs.com | All rights reserved 
                                              
                                            </p>
                                          </div>
                                        </td>
                                      </tr>
                                    </table>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
        
                  </td>
                </tr>
              </tbody>
            </table><!-- End -->
          </div>
        
        
          <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js"
            integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        </body>
        
        </html>';

        // Send the email
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false; // Email could not be sent
    }
        
    }


    // Function for signin
    public function signin($email, $password, $table)
    {

        $sql = "Select * from $table where email='$email'";
        $result = mysqli_query($this->dbh, $sql);
        $row = mysqli_fetch_assoc($result);
        // $num = mysqli_num_rows($result);
        if (mysqli_num_rows($result) == 1) {

            if (password_verify($password, $row['password'])) {
                $this->id = $row['id'];

                if($row['is_verified'] == 1){
                  
                    if($row['is_buyer'] == 1){
                        return 4;

                    }else{
                        return 5;
                    }

                }else{
                  return 2;
                }
                

                

                // user logged in
            } else {

                return 10; // password not matched
            }

        } else {
            return 100;

            // no user found
        }
    }



    public function idUser()
    {
        return $this->id;
    }

    

    public function nameUser()
    {
        return $this->name;
    }




// now written ij js file 
    public function fetchPages()
    {
        $resultsByCategory = []; // Initialize an array to hold results by category
        
        // Categories 
        $catSql = "SELECT * FROM page_categories LIMIT 3";
        $catResult = mysqli_query($this->dbh, $catSql);
        if ($catResult) { // Check if query was successful
            while ($catRow = mysqli_fetch_assoc($catResult)) {
                

                $categoryId = $catRow['id']; // Extract the category ID
                
                // Pages 
                $sql = "SELECT * FROM sr_pages WHERE service_category = $categoryId";
                $result = mysqli_query($this->dbh, $sql);
    
                if ($result) { // Check if query was successful
                    $pages = []; // Initialize an array for pages in the current category
                    
                    while ($row = mysqli_fetch_assoc($result)) {
                        $pages[] = $row;
                    }
                    
                    $catRow['pages'] = $pages; // Append pages to the current category
                    $resultsByCategory[] = $catRow; // Append the category to the results array
                } else {
                    return false; // Return false if page query fails
                }
            }
            
            mysqli_free_result($catResult); // Free the category result set
            
            if (!empty($resultsByCategory)) {
                return $resultsByCategory;
            } else {
                return false; // Return false if no pages were found
            }
        } else {
            return false; // Return false if category query fails
        }
    }
// now written ij js file 







    public function fetchSinglePage($slug)
    {
        // $slug = mysqli_real_escape_string($this->dbh, $slug);
        
        $sql = "SELECT * FROM sr_pages WHERE slug = '$slug' ";
        $result = mysqli_query($this->dbh, $sql);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) == 1) {

            return $row;

        } else {
            return false;
        }

    }

    

    public function professionals()
    {
        $sql = "Select * from join_professionals order by id desc";
        $result = mysqli_query($this->dbh, $sql);



        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $results[] = $row;

            }
            return $results;

        } else {
            return false;
        }

    }


    // single enquiry detail from id
    public function singleEnquiry($id, $table)
    {
        $sql = "Select * from $table where lead_id=$id";
        $result = mysqli_query($this->dbh, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $results[] = $row;
            }
            return $results;
        } else {
            return false;
        }
    }




    public function get_count($table)
    {
        $sql = "SELECT COUNT(*) FROM $table";
        $result = mysqli_query($this->dbh, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $results[] = $row;

            }
            return $results;

        } else {
            return false;
        }

    }


    public function fetchSingleProf($slug)
    {
        if (!empty($slug)) {
            $sql = "SELECT id,name,email,mobile,bio,listing_about,organisation,resume,image,portfolio_images,status,services FROM join_professionals WHERE slug = '".$slug."' ";
            $result = mysqli_query($this->dbh, $sql);
            $row = mysqli_fetch_assoc($result);
            // return $row;

            if (mysqli_num_rows($result) == 1) {
                $myServices = $row['services'];                
                $cleanedStr = str_replace(' ', '', $myServices); // Remove spaces
                $servicesArray = explode(",", $cleanedStr);                

                $servicenamearr = [];
                foreach ($servicesArray as $oneServ) {
                    $sqll = "SELECT id,service_name FROM sr_services_new WHERE id = ?";
                    // use prepared statements to prevent SQL injection
                    $stmt = mysqli_prepare($this->dbh, $sqll);
                    mysqli_stmt_bind_param($stmt, "i", $oneServ);
                    mysqli_stmt_execute($stmt);
                    $resultt = mysqli_stmt_get_result($stmt);
                    if ($row2 = mysqli_fetch_assoc($resultt)) {
                        // $servicenamearr[] = $row2['service_name'];
                        $servicenamearr[] = $row2['service_name'];
                    }
                }



                

                

                // return $servicenamearr;
                // $get_service_sql = "SELECT join_professionals.service, sr_services.service_name FROM join_professionals join sr_services on join_professionals.service = sr_services.id where join_professionals.service =" . $row['service'] . "";
                // $ser_result = mysqli_query($this->dbh, $get_service_sql);
                // $ser_row = mysqli_fetch_assoc($ser_result);
                // if(mysqli_num_rows($ser_result) == 1){
                // $row['services-names'] = $servicenamearr;
                // }
                $row['services-name'] = $servicenamearr;
               

                return $row;
            } else {
                return false;
            }
        }
    }


    public function fetchSProfSlug($slug)
    {
        if (!empty($slug)) {
            $sql = "SELECT id,name,email FROM join_professionals WHERE slug = '".$slug."' ";
            $result = mysqli_query($this->dbh, $sql);
            $row = mysqli_fetch_assoc($result);
            // return $row;

            if (mysqli_num_rows($result) == 1) {
                return $row;
            } else {
                return false;
            }
        }
    }
    

    public function fetchProf($id)
    {
        if (!empty($id)) {
            $sql = "SELECT * FROM join_professionals WHERE id = '".$id."' ";
            $result = mysqli_query($this->dbh, $sql);
            $row = mysqli_fetch_assoc($result);
            // return $row;

            if (mysqli_num_rows($result) == 1) {
                $myServices = $row['services'];                
                $cleanedStr = str_replace(' ', '', $myServices); // Remove spaces
                $servicesArray = explode(",", $cleanedStr);

                $mySkills = $row['skills'];                
                $cleanedStrSkill = str_replace(' ', '', $mySkills); // Remove spaces
                $skillsArray = explode(",", $cleanedStrSkill);

                $row['servicesarray'] = $servicesArray;    
                $row['skillsarray'] = $skillsArray;              


                // $servicenamearr = [];
                // foreach ($servicesArray as $oneServ) {              
                //     $sqll = "SELECT id,service_name FROM sr_services WHERE id = ?";                   
                //     $stmt = mysqli_prepare($this->dbh, $sqll);
                //     mysqli_stmt_bind_param($stmt, "i", $oneServ);
                //     mysqli_stmt_execute($stmt);

                //     $resultt = mysqli_stmt_get_result($stmt);
                //     if ($row2 = mysqli_fetch_assoc($resultt)) {                        
                //         $servicenamearr[] = $row2['service_name'];
                //     }
                // }
                

                return $row;
            } else {
                return false;
            }
        }
    }

// function to fetch data for both customer and professional from single function
    

    public function getprofserv($service)
    {
        // $slug = mysqli_real_escape_string($this->dbh, $slug);

        $sql = "SELECT * FROM join_professionals WHERE service = '" . $service . "'";
        $result = mysqli_query($this->dbh, $sql);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) == 1) {

            return $row;

        } else {
            return false;
        }

    }


    public function fetchProfReview($id)
    {
        // $slug = mysqli_real_escape_string($this->dbh, $slug);

        $sql = "SELECT id FROM join_professionals WHERE slug = '".$id."' ";
        $result = mysqli_query($this->dbh, $sql);
        
        
        while($row = mysqli_fetch_assoc($result)){
        
            $sql2 = "SELECT professional_reviews.professional_id,professional_reviews.customer_id,professional_reviews.name,professional_reviews.review,professional_reviews.rating,professional_reviews.created_at,professional_reviews.updated_at,professional_reviews.lead_id,professional_reviews.image FROM professional_reviews JOIN join_professionals ON professional_reviews.professional_id = join_professionals.id  WHERE professional_reviews.professional_id = '".$row['id']."'";
            $result2 = mysqli_query($this->dbh, $sql2);
            if($result2){
                // $row2 = mysqli_fetch_assoc($result2);        
                if (mysqli_num_rows($result2) > 0) {
                    $reviewdata = [];
                    $ratingCounts = array(
                        5 => 0,
                        4 => 0,
                        3 => 0,
                        2 => 0,
                        1 => 0,
                    );
                    $totalRatings = 0;
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $starsRating = $row2['rating'];
                        $ratingCounts[$starsRating]++;
                        $totalRatings += $starsRating;                        

                        $reviewdata[] = $row2;        

                    }

                    $avgrating = number_format(round(($totalRatings/mysqli_num_rows($result2)),1),1);
                    return ['reviewdata'=>$reviewdata,'ratingCounts'=>$ratingCounts,'avgrating'=>$avgrating];        
                } else {
                    return false;
                }
            }
        }

    }



    // Professional portfolios 
    public function fetchProfPortfolios($slug)
    {                
            $sql2 = "SELECT * FROM professional_portfolios WHERE professional_slug = '".$slug."'";
            if($sql2){
                $result2 = mysqli_query($this->dbh, $sql2);
                // $row2 = mysqli_fetch_assoc($result2);        
        
                if (mysqli_num_rows($result2) > 0) {        
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        $results2[] = $row2;        
                    }
                    return $results2;        
                } else {
                    return false;
                }
            }
    }


    public function getUser($id, $table)
    {
        if($table == "join_professionals"){
            $sql = "select id,name, email, mobile, image,is_buyer, slug, city from $table where id='".$id."'";
        }
        $result = mysqli_query($this->dbh, $sql);
        $rows = mysqli_fetch_assoc($result);

        // if (mysqli_num_rows($result) == 1) {
        //     $image_url_present = $rows['image'];
        //     if($image_url_present == '' || $image_url_present == null){
        //         $firstAlpha = ucfirst($rows['name'][0]);
        //         $rows['first__letter'] = $firstAlpha;
        //         return $rows;
        //     }
            return $rows;
        // }
    }

    public function is_buyer($id)
    {
       
        $sql = "select id,name, email, mobile, image,is_buyer, slug from join_professionals where id='".$id."'";
        
        $result = mysqli_query($this->dbh, $sql);
        $rows = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) == 1) {
            $is_buyer = $rows['is_buyer'];
            
            return $is_buyer;
        }
    }

    public function getProfessional($id, $table)
    {
        $sql = "select id,name, email, mobile, organisation, service from $table where id='$id'";
        $result = mysqli_query($this->dbh, $sql);
        $rows = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) == 1) {
            return $rows;
        }



    }



    public function updateDetails($name, $email, $mobile, $organisation, $id, $table)
    {

        $sql = "update '".$table."' set name='".$name."', email='".$email."', mobile='".$mobile."', organisation='".$organisation."' where id='".$id."'";
        $result = mysqli_query($this->dbh, $sql);

        if ($result) {
            return 1;
        } else {

            return 10;
        }
    }


    public function updateCustomerDetails($name, $email, $mobile, $id, $table)
{
        $sql = "UPDATE $table SET name=?, email=?, mobile=? WHERE id=?";
        
        $stmt = mysqli_prepare($this->dbh, $sql);

        mysqli_stmt_bind_param($stmt, "sssi", $name, $email, $mobile, $id);
        mysqli_stmt_execute($stmt);
        
        $affectedRows = mysqli_stmt_affected_rows($stmt);

        if ($affectedRows > 0) {
            return 1; // Success
        } else {
            return mysqli_error($this->dbh); // Error handling, return specific error message or code
        }
    }


    public function updateimage($id, $table, $image_name)
    {

        $sql = "update $table set image='$image_name' where id=$id";
        $result = mysqli_query($this->dbh, $sql);

        if ($result) {
            return 1;
        } else {

            return 10;
        }
    }



    public function save_investor_q($name, $email, $phone, $services, $message)
    {
        $ret = mysqli_query($this->dbh, "INSERT INTO investor_queries(name,email,phone,service,message) values('$name','$email', '$phone','$services','$message')");
        return $ret;
    }


    public function get_all_leads($table)
    {
        $sql = "SELECT * FROM $table";
        $result = mysqli_query($this->dbh, $sql);

        $numrows = mysqli_num_rows($result);


        $records = array();
        if ($numrows > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $records[] = $row;

                foreach ($records as $one) {
                    $rowSql = "SELECT service_name FROM sr_services_new WHERE id = {$one['category']}";
                    $rowResult = mysqli_query($this->dbh, $rowSql);
                    $rowsnumrows = mysqli_num_rows($rowResult);
                    if ($rowsnumrows > 0) {
                        while ($onerow = mysqli_fetch_assoc($rowResult)) {
                            // return $onerow;
                            $one['serviceName'] = $onerow['service_name'];
                            //    return $one;
                        }
                    }
                }

            }

            return $records;
        } else {
            return 0;
        }

    }


    // all services
    public function get_all_services()
    {
        $sql = "Select id,service_name, cat_id, status from sr_services_new where status=1 and cat_id != 0";
        $result = mysqli_query($this->dbh, $sql);



        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $services[] = $row;

            }
            return $services;

        } else {
            return false;
        }

    }


    public function get_service_content($slug)
    {
        $sql = "Select id,service_name,service_bg_img,banner_strip,service_desc,meta_title,meta_keywords, meta_description from sr_services_new where service_slug= '$slug'";
        $result = mysqli_query($this->dbh, $sql);

        if (mysqli_num_rows($result) > 0) {
           $row = mysqli_fetch_assoc($result);
            return $row;                       

        } else {
            return false;
        }

    }

 // all services
    public function get_all_services_new()
    {
        $sql = "Select id,service_name,service_slug, cat_id, status from sr_services_new where status=1";
        $result = mysqli_query($this->dbh, $sql);



        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $services[] = $row;

            }
            return $services;

        } else {
            return false;
        }

    }

    public function get_bell_jobs($id)
    {

        $sqlForCustomer = "SELECT `id`,`name`,`is_buyer` FROM `join_professionals` WHERE `id` = ".$id."";
        $resultFromId = mysqli_query($this->dbh, $sqlForCustomer);
        if (mysqli_num_rows($resultFromId) > 0) {
            $getRowUser = mysqli_fetch_assoc($resultFromId);
            // if($getRowUser['is_buyer'] == 1){
  
            //     $sql = "SELECT * FROM `lead` WHERE `customer_id` = ".$id."";
            //     $result = mysqli_query($this->dbh, $sql);
    
            //     if (mysqli_num_rows($result) > 0) {
            //         $results = [];
                    
            //         while ($get_row = mysqli_fetch_assoc($result)) {

            //             $get_num_my_leads = "SELECT * FROM my_leads WHERE lead_id = ".$get_row['id']." AND status != 0";
            //             $resultMyLeads = mysqli_query($this->dbh, $get_num_my_leads);
            //             if(mysqli_num_rows($resultMyLeads) > 0){
            //                 $getRowMyLeads = mysqli_fetch_assoc($resultMyLeads);
            //                 $get_row['professional_id'] = $getRowMyLeads['professional_id'];
            //                 $get_row['is_seen'] = $getRowMyLeads['is_seen'];
            //             }
                        
            //             $results[] = $get_row;
            //         }
                        
            //         return $results;
            //     } else {
            //         return 2; //no record
            //     }
            // }
            $sql = "SELECT * FROM `notifications` WHERE `user_id` = ".$id." AND `seen` = 0 ORDER BY `created_at` DESC";
            $result = mysqli_query($this->dbh, $sql);
            if (mysqli_num_rows($result) > 0) {
                $results = [];                    
                while ($get_row = mysqli_fetch_assoc($result)) {
                    $get_row['notiDate'] = date("d-F-Y",strtotime($get_row['created_at']));
                    $results[] = $get_row;
                    
                }
                return $results;
            }

        }else{
            return 1;
        }
      
        // return $_SESSION['id'];
        
    }


    public function get_all_skills()
    {
        $sql = "Select * from sr_services_new where status=1 ";
        $result = mysqli_query($this->dbh, $sql);



        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $services[] = $row;

            }
            return $services;

        } else {
            return false;
        }

    }



    public function getleaddetail($leadid,$professionalID)
    {
        $sql = "SELECT lead.id as id, customer_id, name, email, mobile, city,min_budget, max_budget_amount,project_title,project_status,lead.created_at as leadDate, sr_services_new.service_name,sr_services_new.id as service_id, description FROM lead JOIN sr_services_new ON lead.category = sr_services_new.id WHERE lead.id = '".$leadid. "' ORDER BY lead.id DESC";
        $result = mysqli_query($this->dbh, $sql);
        $row = mysqli_fetch_assoc($result);
        
        if (mysqli_num_rows($result) == 1) {

            $sql_bid = "SELECT * FROM my_leads WHERE professional_id = $professionalID AND lead_id = $leadid ";
            $result_bid = mysqli_query($this->dbh, $sql_bid);

            if (mysqli_num_rows($result_bid) > 0) {
                $bids = array();
                while($result_bid_row = mysqli_fetch_assoc($result_bid)){
                    $pro_biddder = "SELECT name FROM join_professionals WHERE id = '".$result_bid_row['professional_id']."'";
                    $result_bidder = mysqli_query($this->dbh, $pro_biddder);
                    $pro_row = mysqli_fetch_assoc($result_bidder);                   

                    $result_bid_row['pro'] = $pro_row['name']; 
                    $bids[] = $result_bid_row;                   

                }

                $row['bidCount'] = mysqli_num_rows($result_bid);
                $row['purchased'] = 1;
                $row['bids'] = $bids;

                $custSql = "SELECT customer_id FROM lead WHERE id = $leadid ";
                $resultCust = mysqli_query($this->dbh, $custSql);
                $rowCust = mysqli_fetch_assoc($resultCust);                
                $ProfSql = "SELECT `image` FROM `join_professionals` WHERE `id` = '".$rowCust['customer_id']."'";
                $resultProfSql = mysqli_query($this->dbh, $ProfSql);
                $rowresultProfSql = mysqli_fetch_assoc($resultProfSql);  
                $row['customer_image'] = $rowresultProfSql['image'];

                $enwdate = new DateTime($row['leadDate']);
                $formatDate = $enwdate->format("d M Y");
                $row['createdDate'] = $formatDate; 
        
                return $row;
            }
            
            
            $enwdate = new DateTime($row['leadDate']);
            $formatDate = $enwdate->format("d M Y");
            $row['createdDate'] = $formatDate; 
            
            return $row;
        } else {
            return false;
        }
    }


    public function getLeadOwner($leadId){
        $results = ""; // Initialize the results array
    
        $sql = "SELECT `id`,`customer_id` FROM `lead` WHERE `id` = $leadId ";
        $result = mysqli_query($this->dbh, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $sql2 = "SELECT `country` FROM `join_professionals` WHERE `id` = '".$row['customer_id']."'";
                $result2 = mysqli_query($this->dbh, $sql2);
                if (mysqli_num_rows($result2) > 0) {
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                       
                        $results = $row2['country'];
                    }
                } else {                    
                    $results = "";
                }
            }
            return $results;
        } else {
            return false;
        }
    }
    

   

    public function getOrderDetail($leadid,$bidId)
    {         

        $sql_bid = "SELECT * FROM my_leads WHERE lead_id = $leadid AND id = $bidId";
        $result_bid = mysqli_query($this->dbh, $sql_bid);

        if (mysqli_num_rows($result_bid) > 0) {
            
            while($result_bid_row = mysqli_fetch_assoc($result_bid)){
                return $result_bid_row;
            }
        }else{
            return false;
        } 
       
    }

    public function getMyBid($leadid,$professionalID)
    {
               

            $sql_bid = "SELECT * FROM my_leads WHERE professional_id = $professionalID AND lead_id = $leadid ";
            $result_bid = mysqli_query($this->dbh, $sql_bid);

            if ( mysqli_num_rows($result_bid) > 0) {
                // $bids = array();
                // while($result_bid_row = mysqli_fetch_assoc($result_bid)){
                //     $pro_biddder = "SELECT name FROM join_professionals WHERE id = '".$result_bid_row['professional_id']."'";
                //     $result_bidder = mysqli_query($this->dbh, $pro_biddder);
                //     $pro_row = mysqli_fetch_assoc($result_bidder);                   

                //     $result_bid_row['pro'] = $pro_row['name']; 
                //     $bids[] = $result_bid_row;                   

                // }
                // $row['bidCount'] = mysqli_num_rows($result_bid);
                // $row['purchased'] = 1;
                // $row['bids'] = $bids;
                $row = mysqli_fetch_assoc($result_bid);

                return $row;
            }
            
            

            
            return 0;
        
    }

    public function getChats($lastSegment,$lead_id)
    {
        $sql_bid = "SELECT * FROM cust_prof_chats WHERE lead_id = $lead_id AND bid_id = $lastSegment ";
        $result_bid = mysqli_query($this->dbh, $sql_bid);

        if ( mysqli_num_rows($result_bid) > 0) {
            $chatsArr = array();
            while($result_bid_row = mysqli_fetch_assoc($result_bid)){
                $pro_biddder = "SELECT id,name,image,slug FROM join_professionals WHERE id = '".$result_bid_row['cust_id']."'";
                $result_bidder = mysqli_query($this->dbh, $pro_biddder);
                
                                   

                while($pro_row = mysqli_fetch_assoc($result_bidder)){

                    $result_bid_row['pro_details'] = $pro_row; 
                }
                
                $chatsArr[] = $result_bid_row;                   
            }
            // $row['bidCount'] = mysqli_num_rows($result_bid);
            // $row['purchased'] = 1;
            // $row['bids'] = $bids;
            // $row = mysqli_fetch_assoc($result_bid);

            return $chatsArr;
        }
        
        

        
        return 0;
    }

    public function projectAssignedTo($secondLastSegment,$lastSegment)
    {
        $sql_bid = "SELECT * FROM my_leads WHERE lead_id = $secondLastSegment AND id = $lastSegment";
        $result_bid = mysqli_query($this->dbh, $sql_bid);

        if ( mysqli_num_rows($result_bid) > 0) {
            
            $result_bid = mysqli_fetch_assoc($result_bid);
           

            return $result_bid['professional_id'];
        }
        
        

        
        return 0;
    }

    public function projectRequirements($secondLastSegment)
    {
        $sql_bid = "SELECT * FROM project_requirements WHERE project_id = $secondLastSegment";
        $result_bid = mysqli_query($this->dbh, $sql_bid);

        if ( mysqli_num_rows($result_bid) > 0) {
            
            $result_bid_arr = mysqli_fetch_assoc($result_bid);
            $result_bid_arr['description'] = stripslashes($result_bid_arr['description']);

            return $result_bid_arr;
        }
        return false;
    }


    public function projectMilestones($secondLastSegment)
    {
        $sql_bid = "SELECT * FROM milestones WHERE project_id = $secondLastSegment";
        $result_bid = mysqli_query($this->dbh, $sql_bid);

        if ( mysqli_num_rows($result_bid) > 0) {            
            
            $allMilestones = array();
            while($result_bid_arr = mysqli_fetch_assoc($result_bid)){
                $allMilestones[] = $result_bid_arr;
            }
            $results['allMilestones'] = $allMilestones;
            $results['is_accepted'] =true;

            return $results;
        }
        return 0;
    }

    public function getleaddetailWithoutProfessional($leadid)
    {
        $sql = "SELECT lead.id as id, customer_id, name, email, mobile, city,min_budget, max_budget_amount,project_title, sr_services_new.service_name,sr_services_new.id as service_id,lead.created_at as leadDate, description FROM lead JOIN sr_services_new ON lead.category = sr_services_new.id WHERE lead.id = '".$leadid. "' ORDER BY lead.id DESC";
        $result = mysqli_query($this->dbh, $sql);
        $row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) == 1) {

            $sql_bid = "SELECT * FROM my_leads WHERE lead_id = $leadid ";
            $result_bid = mysqli_query($this->dbh, $sql_bid);

            if (mysqli_num_rows($result_bid) > 0) {
                $bids = array();
                while($result_bid_row = mysqli_fetch_assoc($result_bid)){
                    $pro_biddder = "SELECT name,id,image FROM join_professionals WHERE id = '".$result_bid_row['professional_id']."'";
                    $result_bidder = mysqli_query($this->dbh, $pro_biddder);
                    $pro_row = mysqli_fetch_assoc($result_bidder);
                    
                    if((strlen($result_bid_row['description'] > 150))){
                        $cutDesc = substr($result_bid_row['description'],0,140);
                        $result_bid_row['description'] = $cutDesc;          
                    }
                    // rating of bidder 
                    $sql2 = "SELECT rating FROM professional_reviews  WHERE professional_id = '".$pro_row['id']."'";
                    $result2 = mysqli_query($this->dbh, $sql2);

                    if($result2){
                        // $row2 = mysqli_fetch_assoc($result2);        
                        if (mysqli_num_rows($result2) > 0) {     
                            $totalRatings = 0;
                            while ($row2 = mysqli_fetch_assoc($result2)) {
                                $starsRating = $row2['rating'];
                                // $ratingCounts[$starsRating]++;
                                $totalRatings += $starsRating;        
                            } 
                            $avgrating = number_format(round(($totalRatings/mysqli_num_rows($result2)),1),1);

                            $result_bid_row['avgrating'] = $avgrating;
                            
                        }else{
                            $result_bid_row['avgrating'] = 0;
    
                        }
                    }
                    // rating of bidder 
                    $result_bid_row['pro'] = $pro_row['name']; 

                    // if($pro_row['image'] != null || $pro_row['image'] != '' ){
                        $result_bid_row['proImage'] = $pro_row['image']; 
                    // }else{
                    //     $result_bid_row['proImage'] = substr($pro_row['name'],0,1);                        
                    // }

                    $bids[] = $result_bid_row;
                }

                $enwdate = new DateTime($row['leadDate']);
                $formatDate = $enwdate->format("d M Y");
                $row['createdDate'] = $formatDate; 

                $row['bidCount'] = mysqli_num_rows($result_bid);
                $row['purchased'] = 1;
                $row['bids'] = $bids;

                return $row;
            }
                $enwdate = new DateTime($row['leadDate']);
                $formatDate = $enwdate->format("d M Y");
                $row['createdDate'] = $formatDate; 
            
            return $row;
        } else {
            return false;
        }
    }
    



    public function getPrCredits($prId, $table)
    {
        $sql = "SELECT * FROM $table WHERE professional_id = $prId ";
        $result = mysqli_query($this->dbh, $sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) == 1) {
            return $row;
        } else {
            return false;
        }
    }

    public function getLeadCredits($leadId, $table)
    {
        $sql = "SELECT credits FROM $table WHERE id = $leadId ";
        $result = mysqli_query($this->dbh, $sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) == 1) {
            return $row;
        } else {
            return false;
        }
    }


    public function getenquirydetail($leadid)
    {


        $sql = "SELECT * FROM `customer_query` WHERE `lead_id` = $leadid ";
        $result = mysqli_query($this->dbh, $sql);


        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                $results[] = $row;

            }
            return $results;

        } else {
            return false;
        }
    }


    // public function cutCredits($professionalId)
    // {
    //     $sql = "SELECT * FROM credits WHERE professional_id = $professionalId ";
    //     $result = mysqli_query($this->dbh, $sql);
    //     if (mysqli_num_rows($result) == 1) {
    //         $row = mysqli_fetch_assoc($result);
    //         $credits = $row["credits"];
    //         $newcredits = $credits - 20;
    //         $sql2 = "update credits set credits=$newcredits where professional_id=$professionalId";
    //         $result2 = mysqli_query($this->dbh, $sql2);
    //         $rows2 = mysqli_fetch_assoc($result2);
    //         return $rows2;
    //     } else {
    //         return false;
    //     }
    // }



    public function updateCustPass($id, $newpass, $currentpass, $table)
    {

        $sql = "SELECT * FROM $table WHERE id= ?";
        $statement = $this->dbh->prepare($sql);
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();
        $row = $result->fetch_assoc();

        if (!empty($row)) {
            $hashedPassword = $row["password"];
            $password = PASSWORD_HASH($_POST["newPassword"], PASSWORD_DEFAULT);
            if (password_verify($_POST["currentPassword"], $hashedPassword)) {
                $sql = "UPDATE $table set password=? WHERE id=?";
                $statement = $this->dbh->prepare($sql);
                $statement->bind_param("si", $password, $id);
                $statement->execute();
                $message = "Password Changed";
                return $message;
            } else
                $message = "Current Password is not correct";
            return $message;

        }

    }

    public function updateProfPass($id, $newpass, $currentpass, $table)
    {

        $sql = "SELECT * FROM $table WHERE id= ?";
        $statement = $this->dbh->prepare($sql);
        $statement->bind_param("i", $id);
        $statement->execute();
        $result = $statement->get_result();
        $row = $result->fetch_assoc();

        if (!empty($row)) {
            $hashedPassword = $row["password"];
            $password = PASSWORD_HASH($_POST["newPassword"], PASSWORD_DEFAULT);
            if (password_verify($_POST["currentPassword"], $hashedPassword)) {
                $sql = "UPDATE $table set password=? WHERE id=?";
                $statement = $this->dbh->prepare($sql);
                $statement->bind_param("si", $password, $id);
                $statement->execute();
                $message = "Password Changed";
                return $message;
            } else
                $message = "Current Password is not correct";
            return $message;

        }

    }


    // public function custForgotPass($email)
    // {

    //     $sql = "SELECT * FROM customer WHERE email = ".$email."";
    //     $result = mysqli_query($this->dbh, $sql);

    //     if ($result) {

    //         if ($row = $result->fetch_assoc()) {

    //             $reset_token = bin2hex(random_bytes(16));
    //             date_default_timezone_set("Asia/kolkata");
    //             $date = date("Y-m-d");

    //             $sql = "UPDATE customer SET resettoken =".$reset_token.", resettokenexp = ".$date." WHERE email = ".$email."";

    //             if (($result === TRUE) && sendmail($email, $reset_token) === TRUE) {
    //                 return "
    //                             <script>
    //                                 alert("Password reset link send to mail.");
    //                                 window.location.href="index.php"    
    //                             </script>";
    //             } else {
    //                 return "
    //                             <script>
    //                                 alert("Something got Wrong");
    //                                 window.location.href="forgotPassword.php"
    //                             </script>";
    //             }

    //         } else {
    //             return "
    //                     <script>
    //                         alert("Email Address Not Found");
    //                         window.location.href="forgotPassword.php"
    //                     </script>";
    //         }

    //     } else {
    //         return "
    //                 <script>
    //                     alert("Server Down");
    //                     window.location.href="forgotPassword.php"
    //                 </script>";
    //     }


    // }


    // Ad service in professional
    public function addProffessionalService($service, $id)
    {
        $sql = "SELECT services FROM `join_professionals` WHERE id = " . $id . " ";
        $result = mysqli_query($this->dbh, $sql);
        if (mysqli_num_rows($result) > 0) {

            while ($row = mysqli_fetch_assoc($result)) {
                $service_name = $row["services"];
                // return $service;
                if ($service_name == "") {
                    $serArr = array(
                        $service
                    );
                    $jsonValue = json_encode($serArr);
                    // $jsonValueWithBraces = "{" . $jsonValue . "}";
                    $sql = "update join_professionals set services=".$jsonValue." where id=".$id."";
                    $result = mysqli_query($this->dbh, $sql);
                    if ($result) {
                        return "Inserted";
                    } else {
                        return 10;
                    }
                } else {
                    $arrayData = json_decode($service_name, true);
                    if (!in_array($service, $arrayData)) {
                        $arrayData[] = $service;
                        $jsonData = json_encode($arrayData);
                        $sql = "update join_professionals set services=".$jsonData." where id=".$id."";
                        $result = mysqli_query($this->dbh, $sql);
                        if ($result) {
                            return "Inserted new value";
                        } else {
                            return 10;
                        }
                    } else {
                        return "Duplicate value. Not added.\n";
                    }
                }
            }
        } else {
            return 90;
        }
    }


    public function getBanners()
    {
        $sql = "Select * from banners";
        $result = mysqli_query($this->dbh, $sql);



        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $results[] = $row['image'];

            }
            return $results;

        } else {
            return false;
        }

    }
    


    
}

?>