

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Path to PHPMailer autoload.php file

// function send_email() {
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
        $mail->setFrom("smsunnythefunny@gmail.com");
        $mail->addAddress('sandeepmehandia2@gmail.com');
        $mail->Subject = "Welcome email";
        $mail->isHTML(true);
        $mail->Body = '<!DOCTYPE html>

        <html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
        
        <head>
          <title></title>
          <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
          <meta content="width=device-width, initial-scale=1.0" name="viewport" />
          <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                                          style="line-height:10px"><img alt="Bee School logo"
                                            src="https://res.cloudinary.com/dr4iluda9/image/upload/v1691132151/sooprs/sooprs_logo_blue_side2_flxyxx.png"
                                            style="display: block; height: auto; border: 0; max-width: 200px; width: 100%;"
                                            title="Bee School logo" width="314" /></div>
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
                                          style="margin: 0; color: #000000; direction: ltr; font-family: "Poppins", "sans-serif" !important; font-weight: 700; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;">
                                          <span class="tinyMce-placeholder">Hi , welcome to Sooprs!</span></h3>
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
                                          style="color:#12275a;direction:ltr;font-family: "Poppins", "sans-serif" !important;font-size:18px;font-weight:400;letter-spacing:0px;line-height:120%;text-align:center;mso-line-height-alt:21.599999999999998px;    text-align: -webkit-center;">
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
                  <table border="0" cellpadding="10" cellspacing="0"
                  class="paragraph_block block-2" role="presentation"
                  style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                  width="100%">
                  <tr>
                    <td class="pad">
                      <div
                        style="color:#66787f;font-family: "Poppins", "sans-serif" !important;font-size:14px;line-height:120%;text-align:center;mso-line-height-alt:16.8px;">
                        <button class="login-btn">Login</button>
                      </div>
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
                                              <td style="padding:0 7px 0 7px;"><a
                                                  href="https://www.facebook.com"
                                                  target="_blank"><i class="fa-brands fa-facebook" style="color: #005eff;"></i></a></td>
                                              <td style="padding:0 7px 0 7px;"><a
                                                  href="https://www.twitter.com"
                                                  target="_blank"><i class="fa-brands fa-twitter" style="color: #005eff;"></i></a></td>
                                              <td style="padding:0 7px 0 7px;"><a
                                                  href="https://www.linkedin.com"
                                                  target="_blank"><i class="fa-brands fa-linkedin-in" style="color: #005eff;"></i></a></td>
                                              <td style="padding:0 7px 0 7px;"><a
                                                  href="https://www.instagram.com"
                                                  target="_blank"><i class="fa-brands fa-instagram" style="color: #005eff;"></i></a></td>
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
                                          style="color:#66787f;font-family: "Poppins", "sans-serif" !important;font-size:14px;line-height:120%;text-align:center;mso-line-height-alt:16.8px;">
                                          <p style="margin: 0; word-break: break-word;">© 2023 Sooprs | All rights reserved |
                                            <a style="text-decoration: none;" href="https://sooprs.com">https://sooprs.com</a> </p>
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
  
  
          <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/js/all.min.js" integrity="sha512-uKQ39gEGiyUJl4AI6L+ekBdGKpGw4xJ55+xyJG7YFlJokPNYegn9KwQ3P8A7aFQAUtUsAQHep+d/lrGqrbPIDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        </body>
        
        </html>';

        // Send the email
        $mail->send();
        return true; // Email sent successfully
    } catch (Exception $e) {
        return false; // Email could not be sent
    }
// }


?>
