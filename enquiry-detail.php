<?php

session_start();
include_once 'function.php';
include_once 'env.php';


if (!isset ($_SESSION['id']) || !$_SESSION['id'] || $_SESSION['loggedin'] != true) {
    $url = $SITE_URL . '/login-professional';
    header('Location: ' . $url);
    exit();
}

$site_url = "//{$_SERVER['HTTP_HOST']}/";
$escaped_url = htmlspecialchars($site_url, ENT_QUOTES, 'UTF-8');

$userCredentials = new DB_con();
$username = $userCredentials->getUser($_SESSION['id'], 'join_professionals');
$singleEnquiry = $userCredentials->singleEnquiry($_GET['id'], 'customer_query');
$lead = $userCredentials->getleaddetail($_GET['id'], $username['id']);



$cut_id = $username['id'];
$title = 'Enquiries ';
$description = "Description";
$keywords = "key,words";
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="<?php echo $SITE_URL ?>/assets/img/images/sooprs-fav.png" />
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

    <link href="<?php echo $SITE_URL ?>/assets/css/custom.css" rel="stylesheet" />



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

    <style>
        /* CSS */
        .button-33 {
            background-color: #006aff;
            border-radius: 100px;
            box-shadow: rgba(44, 187, 99, .2) 0 -25px 18px -14px inset, rgba(44, 187, 99, .15) 0 1px 2px, rgba(44, 187, 99, .15) 0 2px 4px, rgba(44, 187, 99, .15) 0 4px 8px, rgba(44, 187, 99, .15) 0 8px 16px, rgba(44, 187, 99, .15) 0 16px 32px;
            color: white;
            cursor: pointer;
            display: inline-block;
            font-family: CerebriSans-Regular, -apple-system, system-ui, Roboto, sans-serif;
            padding: 7px 20px;
            text-align: center;
            text-decoration: none;
            transition: all 250ms;
            border: 0;
            font-size: 16px;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
        }

        .button-33:hover {
            box-shadow: rgba(44, 187, 99, .35) 0 -25px 18px -14px inset, rgba(44, 187, 99, .25) 0 1px 2px, rgba(44, 187, 99, .25) 0 2px 4px, rgba(44, 187, 99, .25) 0 4px 8px, rgba(44, 187, 99, .25) 0 8px 16px, rgba(44, 187, 99, .25) 0 16px 32px;
            transform: scale(1.05) rotate(-1deg);
        }


        .owl-nav {
            text-align: center;


        }

        .owl-nav>button>span {

            font-size: xxx-large;

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

            background-image: url(https://res.cloudinary.com/dr4iluda9/image/upload/v1681121398/sooprs/about-us-breadcrumb_iprzjc.webp);

            background-repeat: no-repeat;

            background-size: cover;

            position: absolute;

            top: 0px;

            right: 0px;

            bottom: 0px;

            left: 0px;

            opacity: 0.4;

        }

        .about-section-top {

            height: 30vh;

            display: flex;

            background-repeat: no-repeat;

            align-items: center;

            justify-content: center;

        }

        .bread-text p {

            position: relative;

            color: #ffffff;

            font-size: 100px;



            text-align: center;

        }
    </style>

    <!-- Portfolio image grid  -->
    <style>
        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #0b00ff !important;
            background-color: #eaf2ff !important;
        }



        .wrapper-grid {
            width: 100%;
            padding-bottom: 9px;
        }



        .container-grid>div {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2em;
            color: #ffeead;
        }

        .container-grid>div>img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* border: 1px solid black */
        }

        /* Grid */
        .container-grid {
            display: grid;
            grid-gap: 5px;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            grid-auto-rows: 125px;
            grid-auto-flow: dense;
            /* Fill all spaces with fitted images */
        }

        .horizontal {
            grid-column: span 2;
        }

        .vertical {
            grid-row: span 2;
        }

        .big {
            grid-column: span 2;
            grid-row: span 2;
        }

        /* Media Queries */

        @media screen and (min-width: 1024px) {
            .wrapper-grid {
                width: auto;
                margin: 0 auto;
            }
        }


        /* .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #006fff;
            background-color: transparent;
        } */

        .profile-image img {
            width: 140px;
            height: 140px;
            border-radius: 50%;
        }

        .profile-left-box strong {
            font-size: 25px;
        }


        .review-name-letter-pic img {
            width: 50px;
            height: 50px;
        }
    </style>



    <style>
        .plm-p span {
            font-size: 12px;
            text-transform: uppercase;
            margin-left: 15px;
            color: grey;
            display: inline-block;
            font-weight: 500;
        }

        .profile-image {
            padding: 15px;
            /* background-color: white; */
            border-radius: 10px;
        }

        .car-profile-image img {
            width: 90px !important;
            height: 90px;
            border-radius: 50%;
        }

        .view-prof-btn {
            border-radius: 5px;
            padding: 4px 30px;
            background-color: #D9F2FD;
            color: #00A9F6;
            font-size: 16px;
            border: none;
        }


        .grid-box-text p:nth-child(1) {
            font-weight: 700;
            font-size: 17px;
        }

        .grid-box-text p:nth-child(2) {
            font-size: 13px;
            color: grey;
        }

        .grid-box-text p:nth-child(3) {
            font-size: 13px;
            color: #006aff;
            font-weight: 500;
        }


        .fa-star {
            color: #F2BB16 !important;

        }

        form {
            display: inline-block !important;
        }








        /* SEarch bar  */


        /* Search bar  */

        .image-round-box {
            background: white;
            box-shadow: 0px 4px 6px -4px black;
            border-radius: 50%;
            padding: 7px;
        }


        .owl-stage-outer {
            padding: 20px 0;
        }


        .profile-three-btns img {
            width: 60px;
        }

        .skill-set p {
            padding: 5px 15px;
            /* background: black; */
            border-radius: 5px;
            /* color: white; */
            font-size: 14px;
            display: inline-block;
            /* display: table; */
            /* display: table-caption; */

            text-align: center;
            margin: 5px 0;
        }

        .pcb {
            border: 1px solid #cfcfcf;
        }

        .contact-btn {
            text-decoration: none;
            font-size: 12px;
            border: 1px solid blue;
            padding: 1px 5px;
        }

        .service-title {
            font-size: 13px;
            color: grey;
        }
    </style>

    <style>
        .navbar-nav .nav-link {
            color: #606060;
        }

        .dropend .dropdown-toggle {
            color: black;
            /* margin-left: 1em; */
        }

        .dropdown-item:hover {
            background-color: #dedede;
            color: black;
        }

        .dropdown-menu .dropdown-item {
            font-size: 13px;
            "

        }

        .dropdown .dropdown-menu {
            display: none;
        }



        .dropdown:hover>.dropdown-menu,
        .dropend:hover>.dropdown-menu {
            display: block;
            margin-top: 0.125em;
            margin-left: 0.025em;

        }

        @media screen and (min-width: 769px) {
            .dropend:hover>.dropdown-menu {
                position: absolute;
                top: 0;
                left: 100%;
            }

            .dropend .dropdown-toggle {
                /* margin-left: 0.5em; */
            }
        }

        select {
            word-wrap: normal;
            padding: 6px 0;
            border: none;
        }

        /* .user-pic-round {
            background: url('<?php echo $username['image']; ?>');
            background-size: cover;
            background-position: center;
            width: 30px;
            border-radius: 50%;
            height: 30px;
        } */

        #user-picture {
            position: relative;
            background: url(<?php echo $username['image'] == null ? 'assets/img/images/user-placeholder-pic.webp' : $username['image'] ?>);
            background-size: cover;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background-position: center;
        }


        #alertBeforeReward {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            z-index: 1000;
            /* width: 25em; */
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
    <!-- <a href="https://api.whatsapp.com/send?phone=+91-8588850954&amp;text=Hey%20I'm%20interested%20in%20Sooprs%20Services." class="whatsapp-icon d-flex align-items-center justify-content-center" rel="nofollow" target="_blank"><img src="assets/img/images/whatsapp-icon(2).png" alt=""><span></span></a> -->
    <!-- <a href="https://api.whatsapp.com/send?phone=+91-9523558483&amp;text=Hey%20I'm%20interested%20in%20Sooprs%20Services."
        class="whatsapp-icon d-flex align-items-center justify-content-center" rel="nofollow" target="_blank"><i
            class="fa-brands fa-whatsapp mt-1"
            style="color: #ffffff;    font-size: 37px;  margin-left: 2px;margin-right: 0px; margin-bottom: 2px;"></i>
        <span></span></a> -->
    <!-- <div class="whatapp-float"><a href="https://wa.me/+919523558483" target="_blank"></a></div> -->

    <?php include "header2.php" ?>




    <!-- Content body start  -->
    <section class="top-sectop" style="    background-color: #e0e0e0;    padding: 50px 0;">
        <div class="container">
            <p class="text-capitalize fs-6" style=" padding: 30px 30px;">
                <a style="text-decoration:none; color: #758599;" href="/"> <i class="fa-solid fa-house"></i>
                </a>&nbsp;&nbsp; <a class="fs-6" href="<?php echo $SITE_URL ?>/my-queries"
                    style="text-decoration:none; color: #758599;">My Enquiries / </a>&nbsp;
                </a><a class="fs-6" href="#" style="text-decoration:none; color: #758599;">Enquiry Details</a>&nbsp;

            </p>
            <div class="row  justify-content-center">
                <div class="col-lg-10 col-sm-12">
                    <div class="content-box">
                        <nav>
                            <div class=" nav nav-tabs justify-content-center" id="nav-tab" role="tablist"
                                style="background-color: #d8e8fff0;">
                                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">My Enquiry</button>
                                <button class="nav-link  " id="home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                                    type="button" role="tab" aria-controls="nav-home" aria-selected="true">Interested
                                    Professionals</button>


                            </div>
                        </nav>
                        <div class="tab-content p-4 bg-white" id="nav-tabContent" style=" ">
                            <div class="tab-pane fade " id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                                tabindex="0">


                                <div id="cards-container">
                                    <!-- <p>No professionals interested yet!</p> -->
                                </div>


                            </div>
                            <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab" tabindex="0">

                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title fw-bold text-capitalize" >
                                            <?php echo $lead['project_title'] ?>                                            
                                        </h5>
                                        <p class="mb-2" style="    font-size: 0.7rem;"> <i>Posted on: </i><?php echo $lead['createdDate'] ?></p>
                                        
                                        <div class="skill-set ">
                                            <p class="mb-4">
                                                <?php echo $lead['service_name'] ?>
                                            </p>
                                        </div>
                                        <div class="">
                                            <p class="card-text" style="margin-bottom:10px;  ">Budget: 
                                                <b>$ <?php echo $lead['min_budget'] ?> - $ <?php echo $lead['max_budget_amount'] ?></b>
                                            </p>
                                        </div>
                                        

                                        <pre class="card-text mt-5" style="margin-bottom:10px;"><?php echo $lead['description'] ?></pre>

                                        

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-3 text-center mt-5">


                    <?php
                    if ($lead['project_status'] == 2) {
                        ?>
                        <button type="button" class="btn btn-primary btn-sm rounded-0" data-bs-toggle="modal"
                            data-bs-target="#postReviewModal">
                            Post Review
                        </button>
                        <?php
                    }
                    ?>
                </div>
            </div>
    </section>
    <img src="<?php echo $SITE_URL ?>/assets/img/Group471.png" alt="" style="width:100%; height:auto;" srcset="">

    <!-- Content body end  -->
    <div class="loader-container" id="loader">
        <div class="loader">
            <img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1705386434/sooprs-svg_bseaya.svg'>

        </div>
    </div>


    <?php include './footer.php'; ?>

    <!-- JavaScript Bundle with Popper -->

    <!-- alert before reward modal  -->
    <div class="" id="alertBeforeReward" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="    align-self: end;">
                    <button type="button" class="btn-close" id="btn-close" aria-label="Close"
                        onclick="closeModal()"></button>

                </div>
                <div class="modal-body">
                    <div class="text-center"><i class=" fa-solid fa-circle-exclamation text-center text-warning"
                            style="    font-size: 4em;"></i></div>
                    <h1 class="modal-title fs-3 pt-3 pb-3 text-center" id="exampleModalLabel">Are you sure?</h1>

                    <p class="mb-2 text-secondary">Do you want to assign the project to the professional?</p>
                    <div class="d-flex justify-content-evenly align-items-center p-4">
                        <button class="btn btn-success ps-4 pe-4 pt-1 pb-1" id="alertYes">YES</button>
                        <button class="btn btn-danger  ps-4 pe-4 pt-1 pb-1" id="alertNo">NO</button>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="postReviewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="postReviewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h1 class="modal-title fs-5" id="postReviewModalLabel">Modal title</h1> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="bg-white p-4" style="    width: -webkit-fill-available;">
                        <p class="text-capitalize text-center" style=" color: #758599;font-size: 25px;">
                            Write a review
                        </p>
                        <input type="hidden" name="professional_id" id="professional_id" value='2'>
                        <input type="hidden" name="customer_id" id="customer_id" value='<?php echo $username["id"] ?> '>
                        <input type="hidden" name="lead_id" id="lead_id" value='<?php echo $lead["id"] ?>'>



                        <div class="form-group mb-3">
                            <input type="hidden" name="user_name" id="user_name" class="form-control"
                                placeholder="Enter Your Name" value='<?php echo $username["name"] ?>' />
                        </div>

                        <div class="form-group mb-3">
                            <textarea name="user_review" id="user_review" class="form-control"
                                placeholder="Type Review Here"></textarea>
                        </div>

                        <p class="text-secondary">Overall, how satisfied were you with my work?</p>

                        <h4 class="text-center mt-2 mb-4">
                            <i class="fas fa-star star-light submit_starr mr-1" id="submit_starr_1" data-rating="1"></i>
                            <i class="fas fa-star star-light submit_starr mr-1" id="submit_starr_2" data-rating="2"></i>
                            <i class="fas fa-star star-light submit_starr mr-1" id="submit_starr_3" data-rating="3"></i>
                            <i class="fas fa-star star-light submit_starr mr-1" id="submit_starr_4" data-rating="4"></i>
                            <i class="fas fa-star star-light submit_starr mr-1" id="submit_starr_5" data-rating="5"></i>
                        </h4>


                        <div class="form-group text-center mt-4">
                            <button type="button" class="btn btn-success btn-sm" id="save_review">Submit
                                <div class="loader-container" id="loader">
                                    <div class="loader">
                                        <img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1705386434/sooprs-svg_bseaya.svg'
                                            style='    position: absolute;
                                            top: 50%;
                                            left: 50%;
                                            transform: translate(-50%, -50%);
                                            width: 110px;'>

                                    </div>
                                </div>
                            </button>
                        </div>


                    </form>
                </div>
                <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div> -->
            </div>
        </div>
    </div>

    <!-- success_div -->
    <div class="row justify-content-center">
        <div class="col-md-5" style="    position: absolute; top: 30%;">
            <div class="pl-5 mt-3 bg-white" id="success_div" style="display:none">
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
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
        </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="<?php echo $SITE_URL ?>/assets/js/srs_custom.js"></script>

    <!-- data tables  -->
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        toastr.options = {
            "positionClass": "toast-top-right",
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    </script>


    <script>


        let lead_id = '<?php echo $lead['id']; ?>';
        let alertModal = document.getElementById("alertBeforeReward");
        let alertYes = document.getElementById("alertYes");
        let alertNo = document.getElementById("alertNo");

        let get_professionals = () => {
            const formData = new FormData();
            formData.append('lead_id', lead_id);

            // Make an AJAX request to upload the form data
            const xhr = new XMLHttpRequest();
            xhr.open('POST', site_url + '/api2/public/index.php/query_detail');

            xhr.onload = function () {
                if (xhr.status === 200) {

                    const response = JSON.parse(xhr.responseText);
                    if (response.status == 200) {
                        console.log(response);

                        data = response.msg;
                        let cardsContainer = document.getElementById('cards-container'); // Assuming you have a container element
                        let row = document.createElement('div');
                        row.classList.add('row');

                        data.forEach(item => {
                            console.log("is-cut"+item.is_cutDesc);

                            let card = document.createElement('div');
                            card.classList.add('col-md-4', 'mb-4');

                            card.innerHTML = `
                                <div class="card" style=" ">
                                <div class="card-body">
                                    <h5 class="card-title text-secondary fw-bold" style="position: absolute;top: 5px;right: 5px;font-size:13px;">$${item.amount}</h5>
                                    <h5 class="card-title mt-2 text-secondary text-capitalize" style="font-size:15px;display: inline-block;"><strong>${item.professional_name}</strong></h5>
                                    <p class="card-text" style="font-size:12px;">${item.cutDesc}</p>
                                    ${item.is_cutDesc === true ? "<i style='font-size:0.6rem;color:blue;cursor:pointer' id='toggleButton_"+item.id+"'>see more...</i><p id='content_"+item.id+"' style='display: none; font-size: 0.8rem; '>"+item.cutDesc2+"</p>" : ""}                          
                                    <br>
                                    <i style="font-size:0.6rem;" >${item.createdDate}</i>
                                    <div style="display: flex;justify-content: space-between;align-items: center;bottom: 5px;width: -webkit-fill-available;right: 6px;left: 6px;">
                                        <a href="<?php echo $SITE_URL ?>/professional/${item.professional_id}" target="_blank" title="View Profile" style="color:blue;font-size:18px; text-decoration:none;"><i class="fa-regular fa-circle-user"></i></a>
                                        <a href="<?php echo $SITE_URL ?>/project-detail/${item.lead_id}/${item.id}" target="_blank"><span>&nbsp;<i class='fa-regular fa-message text-primary' title='Discuss here'></i></span></a>
                                        ${item.status == 1 ? `<button class='btn btn-success btn-sm' disabled >Rewarded</button>` : `<button class='sooprs-btn btn-reward ' id='professional_${item.id}' style="" >Reward</button>`}
                                    </div>
                                </div>
                                </div>
                            `;

                            cardsContainer.appendChild(card);

                            // Add event listener to the reward button
                            card.querySelector('.btn-reward').addEventListener('click', () => {
                                // Handle reward button click here
                                alertModal.style.display = 'block';

                                alertYes.addEventListener('click', function () {
                                    alertModal.style.display = 'none';
                                    reward(item.id);
                                    showLoader();
                                });

                                alertNo.addEventListener('click', function () {
                                    alertModal.style.display = 'none';

                                });

                            });
                            row.appendChild(card);

                            // const toggleButton = document.getElementById('toggleButton_'+item.id);
                            // const content = document.getElementById('content_'+item.id);

                            document.addEventListener('click', function(event) {
                                if (event.target && event.target.id === 'toggleButton_'+item.id) {
                                    const content = document.querySelector('#content_'+item.id);
                                    if (content.style.display === 'none') {
                                        content.style.display = 'block';
                                    } else {
                                        content.style.display = 'none';
                                    }
                                }
                            });

                        });
                        cardsContainer.appendChild(row);
                        // toastr.success(response.msg, 'Success'); 
                    } else {
                        data = response.msg;
                        let cardsContainer = document.getElementById('cards-container'); // Assuming you have a container element


                        // data.forEach(item => {


                        let cardd = document.createElement('div');
                        cardd.classList.add('mb-4');

                        cardd.innerHTML = `<h5 class="card-title text-secondary fw-bold" style="font-size:16px;">${data}</h5> `;

                        cardsContainer.appendChild(cardd);




                        // });


                        toastr.error(response.msg, 'Error');
                    }
                } else {
                    // Request failed
                    console.error('Error uploading form:', xhr.status, xhr.statusText);
                }
            };

            xhr.onerror = function () {
                console.error('Network error occurred');
            };

            // Send the FormData object with the XMLHttpRequest
            xhr.send(formData);
        }

        window.onload = () => {
            get_professionals();
        }



        // document.getElementById('profile-tab').addEventListener('click', (event) => {
        //     event.preventDefault();
        //     const formData = new FormData();
        //     formData.append('lead_id', lead_id);

        //     // Make an AJAX request to upload the form data
        //     const xhr = new XMLHttpRequest();
        //     xhr.open('POST', 'https://sooprs.com/sooprss/api2/public/index.php/lead_detail');

        //     xhr.onload = function() {
        //     if (xhr.status === 200) {

        //         const response = JSON.parse(xhr.responseText);
        //         if(response.status == 200){

        //             data = response.msg;
        //             let cardsContainer = document.getElementById('cards-container'); // Assuming you have a container element
        //             cardsContainer.innerHTML = '';
        //             let row = document.createElement('div');
        //             row.classList.add('row');

        //             data.forEach(item => {


        //                 let card = document.createElement('div');
        //                 card.classList.add('col-md-4', 'mb-4');

        //                 card.innerHTML = `
        //                     <div class="card">
        //                     <div class="card-body">
        //                         <h5 class="card-title" style="color:blue;">Bid: ${item.service_name}</h5>
        //                         <p class="card-text" style="margin-bottom:10px;">Budget: <b>$${item.max_budget_amount}</b></p>
        //                         <p class="card-text" style="margin-bottom:10px;">${item.description}</p>

        //                     </div>
        //                     </div>
        //                 `;



        //                 cardsContainer.appendChild(card);



        //             });
        //             cardsContainer.appendChild(row);
        //             // toastr.success(response.msg, 'Success'); 
        //         }else{
        //             toastr.error(response.msg, 'Error');
        //         }
        //     } else {
        //         // Request failed
        //         console.error('Error uploading form:', xhr.status, xhr.statusText);
        //     }
        //     };

        //     xhr.onerror = function() {
        //         console.error('Network error occurred');
        //     };

        //     // Send the FormData object with the XMLHttpRequest
        //     xhr.send(formData);
        // });


        // document.getElementById('home-tab').addEventListener('click', (event) => {
        //     event.preventDefault();
        //     const formData = new FormData();
        //     formData.append('lead_id', lead_id);

        //     // Make an AJAX request to upload the form data
        //     const xhr = new XMLHttpRequest();
        //     xhr.open('POST', 'https://sooprs.com/sooprss/api2/public/index.php/lead_detail');

        //     xhr.onload = function() {
        //     if (xhr.status === 200) {

        //         const response = JSON.parse(xhr.responseText);
        //         if(response.status == 200){

        //             data = response.msg;
        //             let cardsContainer = document.getElementById('cards-container'); // Assuming you have a container element
        //             cardsContainer.innerHTML = '';
        //             let row = document.createElement('div');
        //             row.classList.add('row');

        //             data.forEach(item => {


        //                 let card = document.createElement('div');
        //                 card.classList.add('col-md-4', 'mb-4');

        //                 card.innerHTML = `
        //                     <div class="card">
        //                     <div class="card-body">
        //                         <h5 class="card-title" style="color:blue;">Bid: ${item.service_name}</h5>
        //                         <p class="card-text" style="margin-bottom:10px;">Budget: <b>$${item.max_budget_amount}</b></p>
        //                         <p class="card-text" style="margin-bottom:10px;">${item.description}</p>

        //                     </div>
        //                     </div>
        //                 `;



        //                 cardsContainer.appendChild(card);



        //             });
        //             cardsContainer.appendChild(row);
        //             // toastr.success(response.msg, 'Success'); 
        //         }else{
        //             toastr.error(response.msg, 'Error');
        //         }
        //     } else {
        //         // Request failed
        //         console.error('Error uploading form:', xhr.status, xhr.statusText);
        //     }
        //     };

        //     xhr.onerror = function() {
        //         console.error('Network error occurred');
        //     };

        //     // Send the FormData object with the XMLHttpRequest
        //     xhr.send(formData);
        // });


        const reward = (id) => {

            const formData = new FormData();
            formData.append('lead_id', id);
            // Make an AJAX request to upload the form data
            const xhr = new XMLHttpRequest();
            xhr.open('POST', site_url + '/api2/public/index.php/reward_project');
            xhr.onload = function () {
                hideLoader();
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.status == 200) {
                        var reward_button = document.getElementById("professional_"+id);
                        reward_button.textContent = 'Rewarded';

                        reward_button.classList.add('bg-success');
                        reward_button.classList.remove('btn-reward');
                        reward_button.setAttribute('disabled','disabled');

                        data = response.msg;
                        toastr.success(response.msg, 'Success');
                    } else {
                        toastr.error(response.msg, 'Error');
                    }
                } else {
                    // Request failed
                    console.error('Error uploading form:', xhr.status, xhr.statusText);
                }
            };

            xhr.onerror = function () {
                console.error('Network error occurred');
            };

            // Send the FormData object with the XMLHttpRequest
            xhr.send(formData);
        }

    </script>

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
        $('.review-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        })
    </script>

    <!-- professional page  -->
    <script>
        $('.professional-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                700: {
                    items: 2
                },

                1000: {
                    items: 3
                },
                1200: {
                    items: 4
                }
            }
        })
    </script>

    <script>


        // ============ post/save review ============
        var rating_data = 0;
        $(document).on('mouseenter', '.submit_starr', function () {

            var rating = $(this).data('rating');

            reset_background();

            for (var count = 1; count <= rating; count++) {

                $('#submit_starr_' + count).addClass('text-warning');

            }

        });

        function reset_background() {
            for (var count = 1; count <= 5; count++) {

                $('#submit_starr_' + count).addClass('star-light');

                $('#submit_starr_' + count).removeClass('text-warning');

            }
        }

        $(document).on('mouseleave', '.submit_starr', function () {

            reset_background();

            for (var count = 1; count <= rating_data; count++) {

                $('#submit_starr_' + count).removeClass('star-light');

                $('#submit_starr_' + count).addClass('text-warning');
            }

        });

        $(document).on('click', '.submit_starr', function () {

            rating_data = $(this).data('rating');

        });

        $('#save_review').click(function () {

            var user_name = $('#user_name').val();
            var user_review = $('#user_review').val();
            var customer_id = $('#customer_id').val();
            var professional_id = $('#professional_id').val();
            var lead_id = $('#lead_id').val();


            if (user_name == '' || user_review == '') {
                alert("Please Fill Both Field");
                return false;
            }
            else {
                $.ajax({
                    url: site_url + "/api2/public/index.php/submit_review",
                    method: "POST",
                    data: { rating_data: rating_data, user_name: user_name, user_review: user_review, customer_id: customer_id, professional_id: professional_id, lead_id: lead_id },
                    success: function (data) {
                        var parsed_data = JSON.parse(data);

                        $('#postReviewModal').modal('hide');

                        if (parsed_data.status == 400) {
                            alert(parsed_data.msg);

                        } else {

                            $("#success_div").css('display', 'block');
                            setTimeout(function () {
                                window.location.reload();
                            }, 3000);

                        }


                    }
                })
            }

        });

    </script>


    <script>
        function closeModal() {
            const myModal = document.getElementById('alertBeforeReward');
            myModal.style.display = 'none';
        }
    </script>


</body>

</html>