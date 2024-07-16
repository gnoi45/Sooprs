<?php
session_start();
include_once 'function.php';
include('config/dbconn.php');




if (isset($_SESSION['id'],$_SESSION['professional']) && $_SESSION['loggedin'] === true && $_SESSION['professional'] === true) {
    $loggedinUser = new DB_con();
    $username = $loggedinUser->fetchSingleProf($_SESSION['id']);

} else {
    $loggedinUser = new DB_con();
    $username = $loggedinUser->getUser($_SESSION['id'], "customer");
    $cut_id = $username['id'];
}




$site_url = "//{$_SERVER['HTTP_HOST']}/";

$escaped_url = htmlspecialchars($site_url, ENT_QUOTES, 'UTF-8');

$userdata = new DB_con();


if (isset($_GET['slug'])) {

    $singlePageFetch = $userdata->fetchSinglePage($_GET['slug']);
    // print_r($singlePageFetch);

}


if (isset($_GET['service'])) {
    if ($_GET['service'] == "law") {
        $pagetitle = "Need help finding a lawyer?";
        $paragraph = "You can find the best lawyers on Sooprs. Start your search and get free quotes now! </br></br>
                        First time looking for a lawyer and not sure where to start? Provide us with some information regarding your specific requirements and we'll send you a list of lawyers to review. There's no pressure to hire,
                        so you can compare profiles and ask for more information before you make your decision.</br></br>
                        Best of all - it's completely free!";
    }
    if ($_GET['service'] == "accounting") {
        $pagetitle = "Need help finding an accountant?";
        $paragraph = "You can find the best accountants on Sooprs. Start your search and get free quotes now! </br></br>
        First time looking for an accountant and not sure where to start? Provide us with some information regarding your specific requirements and we'll send you a list of accountants to review. There's no pressure to hire,
        so you can compare profiles and ask for more information before you make your decision.</br></br>
        Best of all - it's completely free!";

    }
    if ($_GET['service'] == "diet") {
        $pagetitle = "Need help finding a diet planner?";
        $paragraph = "You can find the best diet planners on Sooprs. Start your search and get free quotes now! </br></br>
        First time looking for a diet planner and not sure where to start? Provide us with some information regarding your specific requirements and we'll send you a list of diet planners to review. There's no pressure to hire,
        so you can compare profiles and ask for more information before you make your decision.</br></br>
        Best of all - it's completely free!";

    }
    if ($_GET['service'] == "gym") {
        $pagetitle = "Need help finding a gym trainer?";
        $paragraph = "You can find the best gym trainers on Sooprs. Start your search and get free quotes now! </br></br>
        First time looking for a gym trainer and not sure where to start? Provide us with some information regarding your specific requirements and we'll send you a list of gym trainers to review. There's no pressure to hire,
        so you can compare profiles and ask for more information before you make your decision.</br></br>
        Best of all - it's completely free!";

    }
    if ($_GET['service'] == "event") {
        $pagetitle = "Need help finding an event planner?";
        $paragraph = "You can find the best event planners on Sooprs. Start your search and get free quotes now! </br></br>
        First time looking for an event planner and not sure where to start? Provide us with some information regarding your specific requirements and we'll send you a list of event planners to review. There's no pressure to hire,
        so you can compare profiles and ask for more information before you make your decision.</br></br>
        Best of all - it's completely free!";

    }
    if ($_GET['service'] == "consultant") {
        $pagetitle = "Need help finding a consultant?";
        $paragraph = "You can find the best event consultants on Sooprs. Start your search and get free quotes now! </br></br>
        First time looking for a consultant and not sure where to start? Provide us with some information regarding your specific requirements and we'll send you a list of consultants to review. There's no pressure to hire,
        so you can compare profiles and ask for more information before you make your decision.</br></br>
        Best of all - it's completely free!";

    }
    if ($_GET['service'] == "packers") {
        $pagetitle = "Need help finding  packers?";
        $paragraph = "You can find the best packers on Sooprs. Start your search and get free quotes now! </br></br>
        First time looking for a packer and not sure where to start? Provide us with some information regarding your specific requirements and we'll send you a list of packers to review. There's no pressure to hire,
        so you can compare profiles and ask for more information before you make your decision.</br></br>
        Best of all - it's completely free!";

    }

}


$title = $pagetitle;

$description = $pagetitle;

$keywords = $pagetitle;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="../assets/img/images/sooprs-fav.png" />
    <title>
        <?php echo $title; ?>
    </title>
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">


    <!--  google font   -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />


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

    <link href="../assets/css/custom.css" rel="stylesheet" />



    <!-- Google tag (gtag.js) - Google Analytics -->
    <meta name="google-site-verification" content="MhU9sH2D2AdSTsz2t_u8dBkBMFQx3GpcOTwyIFDplvM" />

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-3EN0VFWM68">
    </script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'G-3EN0VFWM68');
    </script>


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

    <style>
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
            color: #3084ff;
            font-size: 13px;
        }

        .hidden {
            display: none;
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


        /* media queries  */
        @media only screen and (max-width: 991px) {
            .hide-number-on-smaller {
                display: none;
            }
        }

        @media only screen and (min-width: 991px) {
            .hide-number-on-large {
                display: none;
            }
        }




        .signup-btn {
            margin: 5px 5px;
            text-decoration: none;
            /* background: #006aff; */
            color: white;
            font-weight: 500;
            padding: 0 5px;
        }
    </style>

    <!-- CSS End -->
</head>

<body>


    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-54VLF42" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->




    <!-- <a href="https://api.whatsapp.com/send?phone=+91-9523558483&amp;text=Hey%20I'm%20interested%20in%20Sooprs%20Services."
        class="whatsapp-icon d-flex align-items-center justify-content-center" rel="nofollow" target="_blank"><i
            class="fa-brands fa-whatsapp mt-1"
            style="color: #ffffff;    font-size: 37px;  margin-left: 2px;margin-right: 0px; margin-bottom: 2px;"></i>
        <span></span></a> -->





    <nav class="navbar navbar-expand-lg bg-body-tertiary p-0 m-0">
        <div class="container-fluid p-0 m-0">
            <a class="navbar-brand p-0 m-0" href="/"><img src="/sooprs_site_files/sooprs_logo_blue_side2.png" alt="logo"
                    style="    width: 140px;" /></a>

            <a class="nav-link active" aria-current="page" href="tel:+91-9523558483"><i class="fa-solid fa-phone"
                    style="color: #2474ff;"></i>
                <span class="header-phone-text" style=" ">+91-9523558483</span></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav" style="    padding: 0 5px;">
                    <div class="dropdown ">
                        <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton222"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Services
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton222">
                            <!-- <a class="dropdown-item" href="#">Action</a> -->
                            <div class="dropdown dropend">
                                <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts"
                                    style="    font-size: 14px;" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">Development</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                    <a class="dropdown-item" href="web-development">Web Development</a>
                                    <a class="dropdown-item" href="mobile-app-development">Mobile Development</a>
                                    <a class="dropdown-item" href="game-development">Game Development</a>
                                    <a class="dropdown-item" href="mobile-app-development">Hybrid App Development</a>
                                    <a class="dropdown-item" href="software-development">Software Development</a>

                                    <!-- <div class="dropdown-divider"></div>
                                    <div class="dropdown dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts"
                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Custom</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                            <a class="dropdown-item" href="#">Fullscreen</a>
                                            <a class="dropdown-item" href="#">Empty</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Magic</a>
                                        </div>
                                    </div> -->
                                </div>
                            </div>

                            <div class="dropdown dropend">
                                <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts"
                                    style="    font-size: 14px;" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">Designing</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                    <a class="dropdown-item" href="web-designing">Web Designing</a>
                                    <a class="dropdown-item" href="application-designing">App Designing</a>
                                    <a class="dropdown-item" href="graphic-designing">Graphic Designing</a>
                                    <a class="dropdown-item" href="uiux-designing">UI/UX Designing</a>
                                    <a class="dropdown-item" href="animation-designing">Animation Designing</a>

                                </div>
                            </div>

                            <div class="dropdown dropend">
                                <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts"
                                    style="    font-size: 14px;" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">Latest Tech</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                    <a class="dropdown-item" href="internet-of-things">Internet Of Things</a>
                                    <a class="dropdown-item" href="artificial-intelligence">Artificial Intelligence</a>
                                    <a class="dropdown-item" href="machine-learning">Machine Learning</a>
                                    <a class="dropdown-item" href="augmented-reality">Augmented Reality</a>
                                    <a class="dropdown-item" href="virtual-reality">Virtual Reality</a>
                                    <!-- <div class="dropdown-divider"></div>
                                    <div class="dropdown dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts"
                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Custom</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                            <a class="dropdown-item" href="#">Fullscreen</a>
                                            <a class="dropdown-item" href="#">Empty</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Magic</a>
                                        </div>
                                    </div> -->
                                </div>
                            </div>

                            <div class="dropdown dropend">
                                <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts"
                                    style="    font-size: 14px;" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">Marketing</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                    <a class="dropdown-item" href="digital-marketing">Digital Marketing</a>
                                    <a class="dropdown-item" href="search-engine-marketing">Search Engine Marketing</a>
                                    <a class="dropdown-item" href="content-marketing">Content Marketing</a>

                                    <a class="dropdown-item" href="social-media-marketing">Social Media Marketing</a>
                                    <a class="dropdown-item" href="video-marketing">Video Marketing</a>


                                    <!-- <div class="dropdown-divider"></div>
                                    <div class="dropdown dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts"
                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Custom</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                            <a class="dropdown-item" href="#">Fullscreen</a>
                                            <a class="dropdown-item" href="#">Empty</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Magic</a>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="dropdown dropend">
                                <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts"
                                    style="    font-size: 14px;" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">Law</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                    <a class="dropdown-item" href="common-page?service=law">Environment Law</a>
                                    <a class="dropdown-item" href="common-page?service=law">Corporate Law</a>
                                    <a class="dropdown-item" href="common-page?service=law">Media Law</a>

                                    <a class="dropdown-item" href="common-page?service=law">Property Law</a>
                                    <a class="dropdown-item" href="common-page?service=law">Divorce</a>


                                    <!-- <div class="dropdown-divider"></div>
                                    <div class="dropdown dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts"
                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Custom</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                            <a class="dropdown-item" href="#">Fullscreen</a>
                                            <a class="dropdown-item" href="#">Empty</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Magic</a>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="dropdown dropend">
                                <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts"
                                    style="    font-size: 14px;" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">Accounting</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                    <a class="dropdown-item" href="common-page?service=accounting">Company
                                        Registration</a>
                                    <a class="dropdown-item" href="common-page?service=accounting">GST</a>
                                    <a class="dropdown-item" href="common-page?service=accounting">Auditing</a>

                                    <a class="dropdown-item" href="common-page?service=accounting">ITR</a>
                                    <a class="dropdown-item" href="common-page?service=accounting">Trademark</a>


                                    <!-- <div class="dropdown-divider"></div>
                                    <div class="dropdown dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts"
                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Custom</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                            <a class="dropdown-item" href="#">Fullscreen</a>
                                            <a class="dropdown-item" href="#">Empty</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Magic</a>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="dropdown dropend">
                                <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts"
                                    style="    font-size: 14px;" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">Miscellaneous</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                    <a class="dropdown-item" href="common-page?service=diet">Diet</a>
                                    <a class="dropdown-item" href="common-page?service=event">Event</a>
                                    <a class="dropdown-item" href="common-page?service=consultant">Consultation</a>

                                    <a class="dropdown-item" href="common-page?service=packers">Packers</a>
                                    <a class="dropdown-item" href="common-page?service=gym">Gym</a>


                                    <!-- <div class="dropdown-divider"></div>
                                    <div class="dropdown dropend">
                                        <a class="dropdown-item dropdown-toggle" href="#" id="dropdown-layouts"
                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">Custom</a>
                                        <div class="dropdown-menu" aria-labelledby="dropdown-layouts">
                                            <a class="dropdown-item" href="#">Fullscreen</a>
                                            <a class="dropdown-item" href="#">Empty</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Magic</a>
                                        </div>
                                    </div> -->
                                </div>
                            </div>
                            <!-- <a class="dropdown-item" href="#">Something else here</a> -->
                        </div>
                    </div>


                    <?php
                    if (isset($_SESSION['id'])) {
                        ?>


                        <div class="dropdown ">
                            <button class="btn  dropdown-toggle d-flex align-items-center" type="button"
                                id="dropdownMenuButton222" style="    width: 185px;" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">

                                <?php
                                if ($username['image'] == null) {
                                    ?>
                                    <div class=" me-2"
                                        style="background:url('assets/img/images/user-placeholder-pic.webp');width: 30px;border-radius: 50%;height: 30px;background-size: cover;">
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="user-pic-round me-2">
                                    </div>
                                    <?php
                                }
                                ?>


                                My Account
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton222">
                                <?php
                                if (isset($_SESSION['type']) == "customer") {
                                    ?>
                                    <a class="dropdown-item" href="customer-settings">Settings</a>
                                    <a class="dropdown-item" href="my-queries">My Enquiries</a>

                                    <?php
                                } else {
                                    ?>


                                    <a class="dropdown-item" href="professional-settings">Settings</a>
                                    <a class="dropdown-item" href="leads">All Leads</a>
                                    <!-- <a class="dropdown-item" href="vendor-wallet">Credits</a> -->


                                    <?php
                                }
                                ?>
                                <a class="dropdown-item" href="logout">Logout</a>

                            </div>
                        </div>

                        <?php
                    } else {
                        ?>


                        <li class="nav-link nav-item">
                            <a href="customer-login"
                                class="login-btn text-secondary fw-medium text-decoration-none border border-primary px-2"
                                style="margin:5px 5px">Login</a>
                        </li>
                        <li class="nav-link nav-item">
                            <a href="join-professional" class="signup-btn" style="margin:5px 5px"><strong> Join as
                                    Professional</strong></a>
                        </li>


                        <?php
                    }
                    ?>








                </ul>
            </div>
        </div>
    </nav>

    <style>
        body {

            margin: 0;

            padding: 0;



            /* font-family: 'Sahitya', serif; */

        }



        .about-us-section {

            padding: 50px 0;

        }









        .right-text-col>div>h1 {

            color: #000000;



        }



        .right-text-col-knowmore>p {

            font-weight: 500;

        }



        .right-text-col>div>p {

            font-family: 'Poppins';

            /* font-style: normal; */

            /* font-weight: 500; */

            font-size: 15px;

            text-align: justify;

            /* line-height: 144.5%; */

            /* letter-spacing: 0.1em; */

            color: #000000;

            margin-top: 10px;

        }



        .reviews-count-text {

            text-decoration: underline;

            text-decoration-color: blue;

            margin-top: 100px;

        }



        .heading-by h2 {

            color: #0d6efd;

            font-weight: 800;

        }



        .about-section-top {

            /* height: 90vh; */

            display: flex;

            background-repeat: no-repeat;

            align-items: center;

            justify-content: center;

        }



        /* .bread-text p{

                    text-align: center;

                    font-size: 100px;

                    color: white;

                } */



        .bread-text p {

            position: relative;

            color: #ffffff;

            font-size: 40px;

            font-weight: bold;

            text-align: center;

        }



        .about-section-top {

            position: relative;

            height: 50vh;

            background-color: black;

            width: 100%;

            display: flex;

            align-items: center;

            justify-content: center;

        }



        .about-section-top::before {

            content: "";

            background-image: url('../assets/img/images/web-dev.png');

            background-repeat: no-repeat;

            background-size: cover;

            position: absolute;

            top: 0px;

            right: 0px;

            bottom: 0px;

            left: 0px;

            opacity: 0.4;

        }



        .contact-ul li {

            list-style: none;

            margin: 15px 0;

        }



        .contact-ul li img {

            padding-right: 25px;

        }



        .contact-ul li span {

            font-weight: 600;

        }



        .contact-form-div {

            padding: 30px;

            background: #F2F2F2;

        }



        .contact-form-div h2 {

            text-align: initial;

        }



        .form-group {

            margin: 25px 0;

        }



        .form-control {



            padding: 15px;



        }



        .search_div1 {

            display: flex;

            align-items: center;

            justify-content: center;

            flex-direction: column;

            background-color: rgb(255, 255, 255);

            /* border: 1px solid rgb(238, 238, 238); */

            width: 100%;

            align-self: center;

            position: absolute;

            border-radius: 5px;

            top: 48px;

            z-index: 999;

        }



        .search_div1 ul {



            height: 200px;

            overflow: auto;

        }
    </style>



    <!-- Top banner  -->

    <section class="about-section-top">

        <div class="container">

            <div class="row justify-content-center">

                <div class="col-md-6">

                    <div class="bread-text">




                        <p>
                            <?php echo $pagetitle; ?>
                        </p>

                        <div class="input-group mb-3">

                            <input class="form-control services-input" id="myText2" type="hidden" autocomplete="off"
                                value="<?php echo $pagetitle ?>" data="<?php echo $pagetitle ?>"
                                style="    width: -webkit-fill-available;"
                                placeholder="What service are you looking for?">

                            <input type="text" class="form-control" placeholder="Enter your pincode or town"
                                aria-label="Enter your pincode or town" aria-describedby="button-addon2"
                                style="border-radius: 0;padding:10px;" id="myText1" autocomplete="off" value="">



                            <div class="search_div1" style="display:none">



                                <div id="srs_spinner1"
                                    style="display: flex; flex-direction: column; width: 200px; height: 200px; align-self: center; align-items: center; justify-content: center;">

                                    <div class="spinner-grow text-primary" role="status"><span
                                            class="sr-only">Loading...</span>

                                    </div>Loading...

                                </div>



                                <ul class="search_pincode" id="search_pincode">







                                </ul>

                            </div>

                            <button class="btn btn-primary btn-outline-secondary text-white themeButton" type="button"
                                id="button-addon2"
                                style="border-radius: 0; padding:10px;   width: 114px;">Search</button>

                        </div>





                    </div>

                </div>

            </div>



        </div>

    </section>



    <section class="about-us-section">

        <div class="container">

            <div class="row">



                <div class="col-md-7 col-sm-12 right-text-col" style="align-items: center;display: grid;">

                    <?php echo $paragraph ?>

                    <!-- <div>

                                <h3 class="fw-bold">What is Web Development Service ?</h3 class="fw-bold">

                                <p>Nowadays, if you have a business, you must be present online, but transforming business to

                                    online is not an easy task... Some faces lot of challenges in this , we at sooprs helps

                                    businesses to go through this process smoothly.

                                </p>

                            </div> -->

                    <!-- <div>

                                <h3 class="fw-bold">Technology</h3 class="fw-bold">

                                <p>For Web Development, we have all options available starting from basic html, css

                                    informational website to high tech React JS based super fast website. In E-commerce from

                                    wordpress to custom website options are also there.

                                </p>

                            </div> -->

                    <!-- <div>

                                <h3 class="fw-bold">How Sooprs can help you</h3 class="fw-bold">

                                <p>Sooprs offers multiple vendors and will provide you with the best rates on any website you

                                    need. Plus, we offer a variety of services which means you can rely on us for anything. In

                                    addition to our broad range of products, we use cutting-edge technology to make it easier

                                    than ever before.

                                </p>

                            </div> -->







                </div>

                <div class=" text-center col-md-5 col-sm-12 left-img-col">

                    <div class="contact-form-div">

                        <img src="../assets/img/images/web-dev-right.png" alt=""
                            style="    width: -webkit-fill-available;    height: 200px;">

                    </div>

                </div>

            </div>

        </div>

    </section>
    <footer class="bg-primary py-2">
        <div class="container">
            <div class="row pt-5 align-items-center justify-content-center text-center">
                <div class="col-md-3 mt-5 ">
                    <a href="https://sooprs.com/"><img
                            src="<?php $escaped_url ?>/sooprs_site_files/sooprs_logo_white_center (1).png"
                            width="100"></a>
                    <h6 class="text-white  fw-normal"></h6>
                    <p>
                        WeWork , Vi-John Tower 393, Phase III, Udyog Vihar, Gurugram, Haryana 122016
                    </p>
                    <br />
                    <li><i class="fa-solid fa-phone p-1 pb-3"></i>&nbsp; (+91) 95-23-55-84-83</li>
                    <li><i class="fa-solid fa-envelope p-1"></i>&nbsp; contact@sooprs.com </li>
                    <a href="https://www.instagram.com/sooprsofficial/" target="_blank"><span
                            class="dot m-2 mt-3 pb-3 mb-3"><i class="fa-brands fa-instagram mt-1"></i></span></a>
                    <a href="https://twitter.com/Sooprs2" target="_blank"><span class="dot m-2 mt-3 pb-3 mb-3"><i
                                class="fa-brands fa-twitter mt-1"></i></span></a>
                    <a href="https://www.facebook.com/sooprs" target="_blank"><span class="dot m-2 mt-3 pb-3 mb-3"><i
                                class="fa fa-brands fa-facebook mt-1"></i></span></a>
                    <a href="https://www.youtube.com/channel/UCIRnMCgDcVLHW2n3Chd_INw" target="_blank"><span
                            class="dot m-2 mt-3 pb-3 mb-3"><i class="fa-brands fa-youtube mt-1"></i></span></a>
                </div>

                <!--<div class="col-md-3 mt-4">-->
                <!--  <h2 class="footer-heading">Address</h2>-->
                <!--  <p>-->
                <!--    WeWork , Vi-John Tower 393, Phase III, Udyog Vihar, Gurugram, Haryana 122016-->
                <!--  </p>-->
                <!-- <li><i class="fa-solid fa-phone p-1 pb-3"></i>&nbsp; (+91)8178924823</li>-->
                <!--<li><i class="fa-solid fa-envelope p-1"></i>&nbsp; info@techninza.in </li> -->
                <!--  <a href="https://www.instagram.com/sooprsofficial/" target="_blank"><span class="dot m-2 mt-3 pb-3 mb-3"><i-->
                <!--    class="fa-brands fa-instagram mt-1"></i></span></a>-->
                <!--  <a href="https://twitter.com/Sooprs2" target="_blank"><span class="dot m-2 mt-3 pb-3 mb-3"><i-->
                <!--        class="fa-brands fa-twitter mt-1"></i></span></a>-->
                <!--  <a href="https://www.facebook.com/sooprs" target="_blank"><span-->
                <!--      class="dot m-2 mt-3 pb-3 mb-3"><i class="fa fa-brands fa-facebook mt-1"></i></span></a>-->
                <!--  <a href="https://www.youtube.com/channel/UCIRnMCgDcVLHW2n3Chd_INw" target="_blank"><span class="dot m-2 mt-3 pb-3 mb-3"><i-->
                <!--        class="fa-brands fa-youtube mt-1"></i></span></a>-->
                <!--    <h2 class="footer-heading">Useful Links</h2>-->
                <!--    <ul class="list-unstyled">-->
                <!--      <li><a href="#" class="d-block">Blog</a></li>-->
                <!--      <li><a href="how-sooprs-works.php" class="d-block">How Sooprs Works</a></li>-->
                <!--      <li><a href="Data-Analytics.php" class="d-block"></a></li>-->
                <!--<li><a href="#" class="d-block"></a></li>-->
                <!--<li><a href="#" class="d-block"></a></li>-->
                <!--<li><a href="#" class="d-block"></a></li>-->
                <!-- <div class="icon2 text-left">-->
                <!--    <span class="dot2 p-1  m-1"><i class="fab fa-twitter twitter"></i></span>-->
                <!--    <span class="dot2 p-1 m-1"><i class="fab fa-youtube youtube"></i></span>-->
                <!--    <span class="dot2 p-1 m-1"><i class="fab fa-facebook facebook"></i></span> -->
                <!--    </ul>-->
                <!--</div>-->


                <div class="col-md-3 mt-4">
                    <h2 class="footer-heading">Useful Links</h2>
                    <ul class="list-unstyled">
                        <li><a href="<?php $escaped_url ?>/about-us" class="d-block">About Us</a></li>
                        <li><a href="<?php $escaped_url ?>/contact-us" class="d-block">Contact Us</a></li>
                        <li><a href="<?php $escaped_url ?>/privacy-policy" class="d-block">Privacy Policy</a></li>
                        <li><a href="<?php $escaped_url ?>/terms-and-conditions" class="d-block">Terms of Service</a>
                        </li>
                        <!-- <li><a href="<?php $escaped_url ?>/investors" class="d-block">Investors</a></li>
                        <li><a href="<?php $escaped_url ?>/startup" class="d-block">StartUp</a></li> -->
                        <li><a href="<?php $escaped_url ?>/how-sooprs-work" class="d-block">How Sooprs Work</a></li>
                    </ul>
                </div>




                <div class="col-md-3 mt-4">
                    <h2 class="footer-heading">Latest Tech</h2>
                    <ul class="list-unstyled">
                        <li><a href="<?php $escaped_url ?>/IOT" class="d-block">IOT</a></li>
                        <li><a href="<?php $escaped_url ?>/artificial_intellgience" class="d-block">Artificial
                                Intelligence</a></li>
                        <li><a href="<?php $escaped_url ?>/virtual_reality" class="d-block">Virtual Reality</a></li>
                        <li><a href="<?php $escaped_url ?>/augmented_reality" class="d-block">Augumented Reality</a>
                        </li>
                        <li><a href="<?php $escaped_url ?>/machine_learning" class="d-block">Machine Learning</a></li>
                        <li><a href="<?php $escaped_url ?>/chat_bots" class="d-block">Chat BOTS</a></li>
                        <li><a href="<?php $escaped_url ?>/all-professionals" class="d-block">Hire Professionals</a>
                        </li>
                    </ul>
                </div>



                <div class="col-md-3">
                    <h2 class="footer-heading">Tech Stack</h2>
                    <ul class="list-unstyled">
                        <li><a href="<?php $escaped_url ?>/web-development" class="d-block">Web development</a></li>
                        <li><a href="<?php $escaped_url ?>/mobile-app-development" class="d-block">Mobile App
                                development</a></li>
                        <li><a href="<?php $escaped_url ?>/digital-marketting" class="d-block">Digital Marketing</a>
                        </li>
                        <li><a href="<?php $escaped_url ?>/graphic_designing.php" class="d-block">Graphics Designing</a>
                        </li>
                        <li><a href="<?php $escaped_url ?>/game_development" class="d-block">Game Development</a></li>
                        <li><a href="<?php $escaped_url ?>/uiux_designing" class="d-block">UI/UX Designing</a></li>
                        <li><a href="<?php $escaped_url ?>/applicationdesigning" class="d-block">Application
                                Designing</a></li>

                    </ul>
                </div>

            </div>


            <div class="row mt-5  align-items-center justify-content-right ">
                <hr>
                <div class="col-md-4 col-xs-12  col-sm-12  mb-md-0 mb-2 text-center">

                    <p class="copyright mb-0 text-white">
                    <p class="copyright mb-0 text-white">Made With <i class="fa fa-heart"
                            style="color:#e00015!important"></i>&nbsp;
                        India</p>

                </div>
                <div
                    class="col-md-4 col-xs-12 col-sm-12   p-0 g-0 d-flex align-items-center py-3  justify-content-center ">
                    <img src="<?php $escaped_url ?>/assets/img/dcm.jpg" alt="" class="img-fluid" height="80px"
                        width="80px">
                </div>
                <div
                    class="col-md-4 col-xs-12 col-sm-12   p-0 g-0 d-flex align-items-center py-3   justify-content-center ">
                    <p class="copyright mb-0 text-white"> Sooprs.com. © 2023. All Rights Reserved </p>

                </div>
            </div>
        </div>


    </footer>
    <!-- JavaScript Bundle with Popper -->

    <!-- second model -->

    <div class="modal fade" id="email_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body pl-5 mt-3" id="email_modal_body">
                    <div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <h5 class="modal-title "
                        style="color:#212529;font-size:1.6rem;margin-bottom:20px;line-height: 1.7rem;padding-top: 1em;text-align: center;font-weight: 600;font-family: Poppins,sans-serif;">
                        Please fill your contact details</h5>
                    <p id="last-form-error" class="text-danger" style="display:none">Please fill complete details</p>
                    <p id="last-form-email-error" class="text-danger" style="display:none">Please fill valid email
                        address</p>
                    <div class="row">
                        <div class="col">
                            <div class="card-body">
                                <div class="form-group">
                                    <input class="form-control input_text" id="your_name" type="text"
                                        placeholder="Your Name">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input class="form-control input_text" id="email_address" type="text"
                                        placeholder="Email address"
                                        pattern="/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/"
                                        required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input class="form-control input_text" id="mobile_no" type="text"
                                        placeholder="Mobile No." pattern="[1-9]{1}[0-9]{9}" maxlength="10"
                                        minlength="10">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input class="form-control input_text" id="city_name" type="text"
                                        placeholder="city">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input class="form-control input_text" id="native_lang" type="text"
                                        placeholder="Your native language">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-lg bg-white text-grey" id="back_contact_button" data-wow-delay="0.7s"><small>Back</small></button> -->
                            <button type="button" class="btn btn-lg bg-primary  text-white default text-info"
                                id="submit_contact_details" style="padding: .5rem 1.3rem;"
                                data-wow-delay="0.7s"><small>Post Your
                                    Query</small></button>
                        </div>
                    </div>
                </div>
                <!--success section-->
                <div class="modal-body pl-5 mt-3" id="success_div" style="display:none">
                    <div class="row" style="text-align: center;">
                        <div class="col-md-12">
                            <img src="../assets/img/sprs_verified.gif" style="width:150px">
                        </div>
                        <div class="col-md-12">
                            <p style="font-size: 22px;font-weight: 500;">Thanks for your query. Sooprs Expert will
                                respond you shortly!</p>
                        </div>
                    </div>
                </div>
                <!--success section end-->

            </div>
        </div>
    </div>





    <!-- Question modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">


                <div class="modal-body" id="question_div">

                </div>
                <!--<div class="modal-footer">-->

                <!--</div>-->
            </div>
        </div>
    </div>



    <!-- login  modal  -->
    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Login modal
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
        </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="../assets/js/srs_custom.js"></script>

    <!-- data tables  -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>


    <!-- Answers select label  -->

    <script>
        // function ans_sel(){
        //   let courses = Array.from(document.getElementsByClassName('course'));
        // console.log(courses);
        // courses.forEach(course =>{
        //      course.addEventListener('click', (e) =>{
        //         e.preventDefault();
        //         console.log(course);
        //      })
        // })
        // }


        // $(document).ready(function () {
        function ans_sel() {
            $('.course').each(function () {
                // console.log(this);
                $(this).on('click', function () {

                    // console.log("course");
                    $(this).find('.circle').addClass("selected");
                    $('.question_sec .active').addClass("selected");

                });
            })
        }
  // });
    </script>





    <script>
        // select the element to hide
        const $elementToHide = $('.search_div1');

        // add event listener to the document
        $(document).click(function (event) {
            // if the clicked element is not the element to hide or one of its descendants
            if (!$elementToHide.is(event.target) && $elementToHide.has(event.target).length === 0) {
                // hide the element
                $elementToHide.hide();
            }
        });


        // select the element to hide
        const $elementToHide2 = $('.search_div');

        // add event listener to the document
        $(document).click(function (event) {
            // if the clicked element is not the element to hide or one of its descendants
            if (!$elementToHide2.is(event.target) && $elementToHide2.has(event.target).length === 0) {
                // hide the element
                $elementToHide2.hide();
            }
        });





    </script>

</body>

</html>