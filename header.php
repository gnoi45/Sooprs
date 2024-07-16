<?php


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="assets/img/images/sooprs-fav.png" />
    <title>
        <?php echo $title; ?>
    </title>
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">


    <!--  google font   -->


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


    <!-- Jquery  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous" />

    <!-- data tables  -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">

    <!-- owlCarousel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <!-- Select2 cdn  -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <link href="assets/css/custom.css" rel="stylesheet" />







    <!-- Google tag (gtag.js) - Google Analytics -->
    <meta name="google-site-verification" content="MhU9sH2D2AdSTsz2t_u8dBkBMFQx3GpcOTwyIFDplvM" />

    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-0F4DKXHRDL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-0F4DKXHRDL');
</script>
<!-- Google tag (gtag.js) -->







    <!-- Hotjar Tracking Code for https://www.sooprs.com/ -->
    <script>
        (function (h, o, t, j, a, r) {
            h.hj = h.hj || function () { (h.hj.q = h.hj.q || []).push(arguments) };
            h._hjSettings = { hjid: 3450657, hjsv: 6 };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script'); r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>








    <!-- Meta Pixel Code -->
    <script>
        !function (f, b, e, v, n, t, s) {
            if (f.fbq) return; n = f.fbq = function () {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n; n.push = n; n.loaded = !0; n.version = '2.0';
            n.queue = []; t = b.createElement(e); t.async = !0;
            t.src = v; s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1605366129939325');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=1605366129939325&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->






    <style>
        a {
            text-decoration: none;
        }

        .whatsapp-icon {
            font-size: 53px;
            position: fixed;
            right: 15px;
            bottom: 15px;
            z-index: 996;
            border-radius: 50%;
            color: white;
            background: rgb(9, 219, 2);
            width: 50px;
            height: 50px;
            text-decoration: none;
        }

        .whatsapp-icon:hover {
            color: black;
        }

        label {
            color: #8e8e8e;
            font-size: 13px;
            font-weight: 700;
        }

        .hidden {
            display: none;
        }

        .form-control:focus {
            color: var(--bs-body-color) !important;
            background-color: var(--bs-body-bg) !important;
            border-color: #74adff !important;
            outline: 0 !important;
            box-shadow: none !important;
        }
    </style>




    <!-- CSS only -->

    <style>
        .bg-primary {
            --bs-bg-opacity: 1;
            background-color: #0053ce !important;
        }


        footer span {
            color: #fff !important;

        }

        footer .footer-heading {
            font-size: 18px;
            color: #fff;

        }

        footer p {
            color: #94b6e7 !important;
            line-height: 2;
        }

        footer .list-unstyled li a {
            line-height: 2.5rem;
            color: #f8f9fa82;
            text-decoration: none;
        }

        footer .list-unstyled li a:hover {
            color: #fff;
        }




        footer hr:not([size]) {
            color: #fff !important;
        }

        footer .container {
            background: #0053ce;
        }


        footer li {
            color: white;
            list-style-type: none;
            text-decoration: none;
        }

        footer i {
            font-size: 15px;
            padding-top: 8px;
        }



        .dot {
            height: 35px;
            width: 35px;
            background-color: #2679f5;
            border-radius: 50%;
            display: inline-block;
            text-align: center;
            margin-top: 25px;

        }

        .dot2 {
            height: 35px;
            width: 35px;
            background-color: #2679f5;
            border-radius: 50%;
            display: inline-block;
            text-align: center;
            margin-top: 20px;

        }


        .dot2:hover {
            background-color: #1839df;

        }






        .signup-btn {
            margin: 5px 5px;
            text-decoration: none;

        }





        /* @media only screen and (min-width: 991px) {
            .hide-number-on-large {
                display: none;
            }
        } */
    </style>



    <style>
        .join-modal {
            display: none;

            position: fixed;
            text-align: center;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }

        .join-close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .join-close:hover,
        .join-close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .join-modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            /* 15% from the top and centered */
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            /* Could be more or less, depending on screen size */
        }
    </style>


    <style>
        #auto-popup {
            display: none;

            position: fixed;
            text-align: center;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0, 0, 0);
            background-color: rgba(0, 0, 0, 0.4);
        }
    </style>

    <script type="text/javascript">
        function handleSelect(elm) {
            window.location = elm.value;
        }
    </script>

    <!-- CSS End -->
</head>

<body>


    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=G-0F4DKXHRDL" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->



    <!-- <a href="https://api.whatsapp.com/send?phone=+91-8588850954&amp;text=Hey%20I'm%20interested%20in%20Sooprs%20Services." class="whatsapp-icon d-flex align-items-center justify-content-center" rel="nofollow" target="_blank"><img src="assets/img/images/whatsapp-icon(2).png" alt=""><span></span></a> -->
    <a href="https://api.whatsapp.com/send?phone=+91-9523558483&amp;text=Hey%20I'm%20interested%20in%20Sooprs%20Services."
        class="whatsapp-icon d-flex align-items-center justify-content-center" rel="nofollow" target="_blank"><i
            class="fa-brands fa-whatsapp mt-1"
            style="color: #ffffff;    font-size: 37px;  margin-left: 2px;margin-right: 0px; margin-bottom: 2px;"></i>
        <span></span></a>
    <!-- <div class="whatapp-float"><a href="https://wa.me/+919523558483" target="_blank"></a></div> -->

    <!-- <div style="position: relative;"> -->
    <nav class="navbar navbar-expand-lg navbar-light p-0" id="myNavbar"
        style="box-shadow: rgba(0, 0, 0, 0.15) 0px 2px 8px;    background-color: white;">
        <div class="container-fluid">
            <a class="navbar-brand p-0" href="https://sooprs.com/" style="">
                <img src="/sooprs_site_files/sooprs_logo_blue_side2.png" alt="logo" style="    width: 150px;" />
            </a>

            <div>
                <!-- <a href="tel:+91-8588850954" class="startup hide-number-on-large" style="text-decoration: none;"><i
                        class="fa fa-solid fa-phone"></i><span
                        style="    color: #717171;font-size: 15px;padding: 0px 8px; font-weight: 600;">+91-8588850954</span>
                </a> -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"
                    style="    width: 30px;height: 30px;padding: 0;">
                    <span class="navbar-toggler-icon" style="    width: 1em;height: 1em;"></span>
                </button>
            </div>

            <div class="collapse navbar-collapse  justify-content-end" id="navbarSupportedContent">
                <a href="tel:+91-9523558483" class="startup  " style="text-decoration: none;">
                    <i class="fa fa-solid fa-phone header-fa-phn"></i>
                    <span class="header-phone-text" style=" ">+91-9523558483</span>
                </a>

                <!-- <ul class="navbar-nav me-end mb-2 mb-lg-0 text-center">
                    <li class="nav-item dropdown dropdown-mega position-static">
                        <a class="nav-link dropdown-toggle" href="sooprs_site_files/#" data-bs-toggle="dropdown"
                            data-bs-auto-close="outside" style="font-family: Poppins, sans-serif;"
                            aria-expanded="false">
                            Services
                        </a>
                        <div class="dropdown-menu shadow service">
                            <div class="mega-content px-4">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-12 col-md-3 py-4">
                                            <h5 class="mb-4">Development 1.0</h5>
                                            <div class="list-group">
                                                <span class="mb-2" style="display: flex; flex-direction: row;">
                                                    <img src="./sooprs_site_files/webDev.png" width="40px" height="40px"
                                                        style="margin-right: 10px;" />
                                                    <a class="ml-5" href="web.php" style="text-align: center;">Web
                                                        Development</a>
                                                </span>
                                                <span class="mb-2" style="display: flex; flex-direction: row;">
                                                    <img src="./sooprs_site_files/apk.png" width="40px" height="40px"
                                                        style="margin-right: 10px;" />
                                                    <a class="ml-5" href="android-app.php">Android App Development</a>
                                                </span>
                                                <span class="mb-2"
                                                    style="display: flex; flex-direction: row; text-align: center;">
                                                    <img src="./sooprs_site_files/app.png" width="40px" height="40px"
                                                        style="margin-right: 10px;" />
                                                    <a class="ml-5" href="Hybrid-Development.php">Hybrid App
                                                        Development</a>
                                                </span>
                                                <span class="mb-2" style="display: flex; flex-direction: row;">
                                                    <img src="./sooprs_site_files/apple.png" width="40px" height="40px"
                                                        style="margin-right: 10px;" />
                                                    <a class="ml-5" href="apple-app.php">Iphone Devlopment</a>
                                                </span>
                                                <span class="mb-2" style="display: flex; flex-direction: row;">
                                                    <img src="./sooprs_site_files/game.png" width="40px" height="40px"
                                                        style="margin-right: 10px;" />
                                                    <a class="ml-5" href="Game-Devlopment.php">Game Devlopment</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 col-md-3 py-4">
                                            <h5>Development 2.0</h5>
                                            <div class="list-group mt-3">
                                                <span class="mb-2" style="display: flex; flex-direction: row;">
                                                    <img src="./sooprs_site_files/iot.png" width="40px" height="40px"
                                                        style="margin-right: 10px;" />
                                                    <a class="ml-5" href="Internet-Things.php">Internets Of Things</a>
                                                </span>
                                                <span class="mb-2" style="display: flex; flex-direction: row;">
                                                    <img src="./sooprs_site_files/ai.png" width="40px" height="40px"
                                                        style="margin-right: 10px;" />
                                                    <a class="ml-5" href="Artifical-Intelligence.php">Artifical
                                                        Intelligence</a>
                                                </span>
                                                <span class="mb-2" style="display: flex; flex-direction: row;">
                                                    <img src="./sooprs_site_files/ml.png" width="40px" height="40px"
                                                        style="margin-right: 10px;" />
                                                    <a class="ml-5" href="Machine-Learning.php">Machine Learning</a>
                                                </span>
                                                <span class="mb-2" style="display: flex; flex-direction: row;">
                                                    <img src="./sooprs_site_files/ar.png" width="40px" height="40px"
                                                        style="margin-right: 10px;" />
                                                    <a class="ml-5" href="Augmented-Reality.php">Agumented Reality</a>
                                                </span>
                                                <span class="mb-2" style="display: flex; flex-direction: row;">
                                                    <img src="./sooprs_site_files/vr.png" width="40px" height="40px"
                                                        style="margin-right: 10px;" />
                                                    <a class="ml-5" href="Virtual-Reality.php">Virtual Reality</a>
                                                </span>
                                                <span class="mb-2" style="display: flex; flex-direction: row;">
                                                    <img src="./sooprs_site_files/data.png" width="40px" height="40px"
                                                        style="margin-right: 10px;" />
                                                    <a class="ml-5" href="Data-Analytics.php">Data Analytics</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 col-md-3 py-4">
                                            <h5>Digital Marketing</h5>
                                            <div class="list-group mt-3">
                                                <span class="mb-2" style="display: flex; flex-direction: row;">
                                                    <img src="./sooprs_site_files/seo.png" width="40px" height="40px"
                                                        style="margin-right: 10px;" />
                                                    <a class="ml-5" href="SEO&SMO.php">SEO &amp; SMO</a>
                                                </span>
                                                <span class="mb-2" style="display: flex; flex-direction: row;">
                                                    <img src="./sooprs_site_files/copywriting.png" width="40px"
                                                        height="40px" style="margin-right: 10px;" />
                                                    <a class="ml-5" href="Content-Writing.php">Content Writing</a>
                                                </span>
                                                <span class="mb-2" style="display: flex; flex-direction: row;">
                                                    <img src="./sooprs_site_files/webdesign.png" width="40px"
                                                        height="40px" style="margin-right: 10px;" />
                                                    <a class="ml-5" href="Graphic-Design.php">Graphic Designing</a>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4 col-md-3 py-4">
                                            <h5>Cloud Services</h5>
                                            <div class="list-group mt-3">
                                                <span class="mb-2" style="display: flex; flex-direction: row;">
                                                    <img src="./sooprs_site_files/web.png" width="40px" height="40px"
                                                        style="margin-right: 10px;" />
                                                    <a class="ml-5" href="Hosting-Service.php">Hosting Service</a>
                                                </span>
                                                <span class="mb-2" style="display: flex; flex-direction: row;">
                                                    <img src="./sooprs_site_files/sms.png" width="40px" height="40px"
                                                        style="margin-right: 10px;" />
                                                    <a class="ml-5" href="Buy-SMS.php">Buy SMS</a>
                                                </span>
                                                <span class="mb-2" style="display: flex; flex-direction: row;">
                                                    <img src="./sooprs_site_files/cloud.png" width="40px" height="40px"
                                                        style="margin-right: 10px;" />
                                                    <a class="ml-5" href="Cloud-Security.php">Cloud Securtiy</a>
                                                </span>
                                                <span class="mb-2" style="display: flex; flex-direction: row;">
                                                    <img src="./sooprs_site_files/secured.png" width="40px"
                                                        height="40px" style="margin-right: 10px;" />
                                                    <a class="ml-5" href="Platform-Security.php">Platform Security</a>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul> -->


                <!-- <a href="logout" class="logout-btn" style="margin:5px 5px">Logout</a>  -->


                <?php
                if (isset($_SESSION['id'])) {
                    ?>
                    <select name="" id="" onchange="javascript:handleSelect(this)" placeholder="My account">
                        <!-- <option value="">My account</option> -->
                        <option value=""><a href="" class="" style="margin:5px 5px">
                                <?php echo $username['name'] ?>
                            </a></option>
                        <?php
                        if (isset($_SESSION['type']) == "customer") {
                            ?>
                            <option value="customer-profile"><a href="customer-profile" class="" style="margin:5px 5px">
                                    Profile</a></option>
                            <option value="my-queries"><a href="my-queries" class="" style="margin:5px 5px"> My Enquiries</a>
                            </option>

                            <option value="all-professionals"><a href="all-professionals" class="" style="margin:5px 5px"> All
                                    Professionals</a></option>

                            </option>
                            <?php
                        } else {
                            ?>
                            <option value="profile"><a href="profile" class="" style="margin:5px 5px"> Profile</a></option>
                            <option value="leads"><a href="leads" class="" style="margin:5px 5px"> All leads</a></option>
                            <option value="vendor-wallet">
                                <a href="vendor-wallet" class="" style="margin:5px 5px"> My wallet</a>
                            </option>

                            <?php
                        }
                        ?>
                        <option value="logout"><a href="logout" class="logout-btn" style="margin:5px 5px">Logout</a>
                        </option>
                    </select>



                    <?php
                } else {
                    ?>
                    <a href="customer-login"
                        class="login-btn text-secondary fw-medium text-decoration-none border border-primary px-2"
                        style="margin:5px 5px">Login</a>
                    <a href="join-professional" class="signup-btn" style="margin:5px 5px"><strong> Join as
                            Professional</strong></a>
                    <?php
                }
                ?>


                <!-- <ul class="nav navbar-nav navbar-right">
                   
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Action</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>
                </ul> -->


                <!-- <a href="login" class="login-btn text-secondary fw-medium text-decoration-none border border-primary px-2" style="margin:5px 5px">Login</a>
                <a href="professional-signup" class="signup-btn" style="margin:5px 5px">Join as Professional</a> -->


                <!-- <a href="tel:+91-8588850954" class="startup" style="text-decoration: none;"><i
                        class="fa fa-solid fa-phone"></i><span style="    color: #717171;
                                font-size: 15px;
                                padding: 0px 8px;
                                font-weight: 600;">+91-8588850954</span> </a> -->
                <!-- <a href="startup" class="startup-btn" style="margin:5px 5px">Startup</a> -->
                <!-- <a href="investors" class="investors-btn" style="margin:5px 5px">Investors</a> -->



            </div>
        </div>
    </nav>