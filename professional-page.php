<?php
session_start();

include_once 'function.php';
include_once 'env.php';

include('config/dbconn.php');


$professional_data = new DB_con();

if(isset($_SESSION['id'])){
    // echo $_SESSION['id'];
    $username = $professional_data->fetchProf($_SESSION['id']);

    
}
if (isset($_GET['slug'])) {    
    // PRofessional details
    $singleProfFetch = $professional_data->fetchSingleProf($_GET['slug']);
    
    //Professional reviews
    $singleProfReview = $professional_data->fetchProfReview($_GET['slug']);
    // print_r($singleProfReview);
    // die();
    //Professional portfolios
    $singleProPoretfolios = $professional_data->fetchProfPortfolios($_GET['slug']);
    // print_r($singleProPoretfolios);
    // die();
}








$title = "";
$description = "";
$keywords = "";
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

    <!-- fancy box  -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">

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

        

        .profile-left-box strong {
            font-size: 25px;
        }


        .review-name-letter-pic img {
            width: 50px!important;
            height: 50px;
            border-radius: 50%;
        }
        .review-name-letter-pic {
            width: 50px!important;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 3em;
           
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

        /* .view-prof-btn {
            border-radius: 5px;
            padding: 4px 30px;
            background-color: #D9F2FD;
            color: #00A9F6;
            font-size: 16px;
            border: none;
        } */


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

        


        .owl-stage-outer {
            padding: 20px 0;
        }


        .profile-three-btns img {
            width: 60px;
        }
    </style>



    <script type="text/javascript">
        function handleSelect(elm) {
            window.location = elm.value + ".php";
        }
    </script>

        <style>
            .chart {
  /* width: 500px; */
  display: flex;
  justify-content: space-between;
  flex-direction: column;
  height: 100%;
}

.chart .rate-box {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 15px;
  height: 30px;
  padding: 20px 0;
  padding: 10px;
}
.chart .rate-box > * {
  height: 100%;
  display: flex;
  align-items: center;
  font-weight: 500;
  color: #444;
}
.rate-box .value {
  display: flex;
  align-items: center;
}
.rate-box .value:hover {
  color: #f2bb16;
}
.chart .value {
  font-size: 20px;
  cursor: pointer;
}
.rate-box .progress-bar {
  border-width: 1px;
  position: relative;
  background-color: #cfd8dc91;

  height: 10px;
  /* border-radius: 100px; */
  width: 350px;
}
.rate-box .progress-bar .progress {
  background-color: #f2bb16;
  height: 100%;
  /* border-radius: 100px; */
  transition: 300ms ease-in-out;
  align-self: self-start;
}

.global {
  height: 100%;
  width: 150px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  gap: 8px;
}
.one .fas {
  color: #cfd8dc;
}

.two {
  background: linear-gradient(to right, #f2bb16 0%, transparent 0%);
  -webkit-background-clip: text !important;
  -webkit-text-fill-color: transparent;
  transition: 0.5s ease-in-out all;
}

.global > span {
    font-size: 3.5em;
  font-weight: 500;
}

.rating-icons {
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  width: 100%;
  height: 10%;
}
.rating-icons span {
  position: absolute;
  display: flex;
  font-size: 30px;
  left: 50%;
  transform: translateX(-50%);
  margin-bottom: 5px;
}

.total-reviews {
  font-size: 25px !important;
}



        </style>

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

    <!-- <div style="position: relative;"> -->
  <?php include 'header2.php'; ?>



    <!-- <section class="about-section-top">

        <div class="container">

            <div class="bread-text">

            

                <p class="d-none d-md-block">Professional</p>

                <p class="d-lg-none d-md-none" style="    font-size: 50px!important;">Professional</p>



            </div>



        </div>



    </section> -->











    <section class="top-sectop " style=" background-color: #F5F5F5; padding:100px 0">
        <div class="container">
            <p class="text-capitalize" id="bread_name" style=" padding: 30px 0;  color: #758599;">
                <a style="text-decoration:none; color: #758599;" href="/"> <i class="fa-solid fa-house"></i> </a>&nbsp;
                /
                &nbsp; <a class="fs-6" href="<?php echo $SITE_URL ?>/all-professionals" style="text-decoration:none; color: #758599;">Professionals</a>&nbsp; /&nbsp;
                
            </p>
            <div class="row">
                <div class="col-md-3 col-sm-12"
                    style="      box-shadow: grey 0px 3px 8px -3px;    background: white;border-right: 1px silver solid;">
                    <div class="p-3">

                        <a href="<?php echo $SITE_URL ?>/all-professionals" style="text-decoration:none"><i
                                class=" fas fa-sharp fa-regular fa-arrow-left"></i></a><span
                            class="pb-2 fs-6 fw-semibold ps-2">Profile</span>
                        <hr>

                        <div class="profile-image text-center"
                            style="    padding: 15px;border-radius: 10px;display: flex;justify-content: center;align-items: center;">
                            <div class="image-round-bg" id="profile_img"  style="    width: 140px; height: 140px; background: white;border-radius: 50%;display: flex;justify-content: center;align-items: center;  box-shadow: grey 0px 4px 14px -1px;">

                                <!-- <img  src="" alt="profile pic" style="width: -webkit-fill-available;height: auto;border-radius: 50%;  "> -->
                            </div>
                        </div>
                        <div class="profile-left-box text-center text-capitalize">
                            <strong id="user_name">
                                
                            </strong>
                            <div id="user_services">

                            </div>
                            <!-- <p>
                                <?php 
                                $first = true;
                                foreach($singleProfFetch['services-name'] as $ps){
                                    if (!$first) {
                                        echo ', ';
                                    } else {
                                        $first = false;
                                    }
                                    echo $ps ;
                                }
                                ?>
                            </p> -->
                            <?php 
                            if(isset($singleProfReview['avgrating'])){                            
                            ?>
                            <p style="font-size:13px;">
                                <i class="fa-solid fa-star" style="color: #fbff00;"></i><?php echo $singleProfReview['avgrating']; ?>/5 Rating
                            </p>
                            <?php 
                            }
                            ?>
                            
                            <!-- <div class=" profile-three-btns d-flex justify-content-evenly align-items-center"
                                style="padding:8px">
                                <p> <img src="/assets/img/Group977.png" alt=""> </p>
                                <p><img src="/assets/img/Group979.png" alt=""> </p>
                                <p title="Resume"><a href="<?php echo "/assets/files/" . $singleProfFetch["resume"]; ?>"
                                        target="_blank"><img src="/assets/img/Group980.png" alt=""></a> </p>
                            </div> -->
                        </div>

                        <hr>

                        <div>
                            <strong>Bio</strong>
                            <p id="user__bio">
                                <!-- <?php
                                if ($singleProfFetch['bio'] == null) {
                                    echo "Bio not added";
                                } else {
                                    ?>
                                    <p class="text-justify pb-3 text-capitalize">

                                    <?php
                                    // $string = strip_tags($singleProfFetch['bio']);
                                    // if (strlen($string) > 180) {
                                    //     $string_cut = substr($string, 0, 100);
                                    //     echo $string_cut . "...";
                                    // } else {
                                        echo $singleProfFetch['bio'];
                                    // }
                                }
                                ?> -->
                            </p>
                        </div>

                        <hr>

                        <div>
                            <strong>Contacts</strong>
                            <ul class="ps-0" style="color: #758599;">
                                <li class="mt-2" style="list-style:none;font-size:13px;"> <strong>Email :</strong>
                                    &nbsp;<span class='fw-bold text-dark'>***</span>
                                </li>
                                <li class="mt-2" style="list-style:none;font-size:13px;"> <strong>Phone number :</strong>
                                    &nbsp;<span class='fw-bold text-dark'>***</span>
                                </li>
                                <li class="mt-2" style="list-style:none;font-size:13px;" id="professional_location"> <strong>Location :</strong></li>


                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-sm-12" style="       box-shadow: grey 2px 4px 8px -5px;    padding: 5px 30px 30px 30px;    background: white;">
                    <ul class="nav nav-pills mb-2" id="pills-tab" role="tablist" style="    padding-bottom: 5px;">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active  fs-6 fw-semibold" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Portfolio</button>
                        </li>
                        
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fs-6 fw-semibold" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Services</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fs-6 fw-semibold" id="pills-skills-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-skills" type="button" role="tab" aria-controls="pills-skills"
                                aria-selected="false">Skills</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link fs-6 fw-semibold" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">Reviews</button>
                        </li>

                    </ul>
                    <hr class="mt-0">

                    <div class="tab-content" id="pills-tabContent">

                        <!-- Portfolio tab  -->
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="wrapper-grid">
                                <!-- <h1>Image Grid</h1> -->
                                <div class="container">
                                    <div class="row mt-5 mb-5" id="portfolio_div">
                                        
                                    </div>
                                    <!-- <div class="horizontal">
                                        <img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681119467/sooprs/website-development_mlfhi1.webp"
                                            alt="">
                                    </div> -->
                                    <!-- <div class="vertical"><img
                                            src="https://res.cloudinary.com/dr4iluda9/image/upload/v1683698515/sooprs/game-development_nxzsr5.webp"
                                            alt=""></div>
                                    <div><img
                                            src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681119216/sooprs/hybrid_bhk5en.webp"
                                            alt=""></div>
                                    <div class="big"><img
                                            src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681119949/sooprs/web-design_c01uom.webp"
                                            alt=""></div>
                                    <div><img
                                            src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681120054/sooprs/app-design_gmjwci.webp"
                                            alt=""></div>
                                    <div><img
                                            src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681120138/sooprs/graphic_k04klu.webp"
                                            alt=""></div>
                                    <div><img
                                            src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681120308/sooprs/ui_ans5ev.webp"
                                            alt=""></div> -->
                                </div>

                            </div>

                            <hr>
                            <div class="text-justify">
                                <Strong>About</Strong>
                                <p id="user_about">
                                
                                </p>

                            </div>
                        </div>

                        <!-- Portfolio tab  -->



                        <!-- Reviews tab  -->
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab" tabindex="0">

                            <?php
                            if ($singleProfReview == false) {
                            ?>
                                <div class="row justify-content-center" >
                                    <div class="col-lg-6 col-md-6 col-sm-12 text-center">
                                        <img src='<?php echo $SITE_URL ?>/assets/img/no-review-found.webp' alt='no-review' style="    width: -webkit-fill-available;">
                                        <p class="fs-3 mt-3">No reviews yet!</p>
                                    </div>
                                    
                                                                    
                                </div>
                            <?php
                            } else {
                            ?>
                                <div>
                                    <strong>Reviews</strong>
                                    
                                   
                                    <div class="row">

                                        <div class="col-lg-12" style="    text-align: -webkit-center;">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="chart">
                                                        <?php
                                                            foreach($singleProfReview['ratingCounts'] as $index => $rc){
                                                        ?>
                                                        <div class="rate-box">
                                                            <span class="value"><?php echo $index ?></span>
                                                            <div class="progress-bar">
                                                                <span class="progress"></span>
                                                            </div>
                                                            <span class="count"><?php echo $rc ?></span>
                                                        </div>
                                                        <?php 
                                                        }
                                                        ?>
                                                        <!-- <div class="rate-box">
                                                            <span class="value">4</span>
                                                            <div class="progress-bar"><span class="progress"></span></div>
                                                            <span class="count">0</span>
                                                        </div>
                                                        <div class="rate-box">
                                                            <span class="value">3</span>
                                                            <div class="progress-bar"><span class="progress"></span></div>
                                                            <span class="count">0</span>
                                                        </div>
                                                        <div class="rate-box">
                                                            <span class="value">2</span>
                                                            <div class="progress-bar"><span class="progress"></span></div>
                                                            <span class="count">0</span>
                                                        </div>
                                                        <div class="rate-box">
                                                            <span class="value">1</span>
                                                            <div class="progress-bar"><span class="progress"></span></div>
                                                            <span class="count">0</span>
                                                        </div> -->
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">

                                                    <div class="global">
                                                        <span class="global-value">0.0</span>
                                                        <div class="rating-icons">
                                                        <span class="one"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                                                        <span class="two"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i></span>
                                                        </div>
                                                        <span class="total-reviews">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- <div class="row" style="justify-content: space-around;">
                                                <div class="col-lg-2 col-sm-2">
                                                    <p>5 Stars</p>
                                                </div>
                                                <div class="col-lg-6 col-sm-6">
                                                    <img src="/assets/img/Group981.png" alt="" style="    width: inherit;">
                                                   
                                                </div>
                                                <div class="col-lg-2 col-sm-2">
                                                    <p>
                                                        (0)
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row" style="justify-content: space-around;">
                                                <div class="col-lg-2">
                                                    <p>4 Stars</p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <img src="/assets/img/Group982.png" alt="" style="    width: inherit;">
                                                   
                                                </div>
                                                <div class="col-lg-2">
                                                    <p>(0)</p>
                                                </div>
                                            </div>

                                            <div class="row" style="justify-content: space-around;">
                                                <div class="col-lg-2">
                                                    <p>3 Stars</p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <img src="/assets/img/Group982.png" alt="" style="    width: inherit;">
                                                   
                                                </div>
                                                <div class="col-lg-2">
                                                    <p>(0)</p>
                                                </div>
                                            </div>
                                            <div class="row" style="justify-content: space-around;">
                                                <div class="col-lg-2">
                                                    <p>2 Stars</p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <img src="/assets/img/Group982.png" alt="" style="    width: inherit;">
                                                   
                                                </div>
                                                <div class="col-lg-2">
                                                    <p>(0)</p>
                                                </div>
                                            </div>
                                            <div class="row" style="justify-content: space-around;">
                                                <div class="col-lg-2">
                                                    <p>1 Star</p>
                                                </div>
                                                <div class="col-lg-6">
                                                    <img src="/assets/img/Group982.png" alt="" style="    width: inherit;">
                                                   
                                                </div>
                                                <div class="col-lg-2">
                                                    <p>(0)</p>
                                                </div>
                                            </div> -->
                                        </div>

                                        <div class="col-lg-6">
                                        </div>

                                    </div>
                                </div>

                                <hr>
                                <div style="    height: 350px;overflow-y: scroll;overflow-x: hidden;">
                                    <?php
                                        foreach ($singleProfReview['reviewdata'] as $value) {
                                        ?>
                                            <div class="row" style="padding: 10px;">
                                                <div class="col-md-1 col-sm-1 review-name-letter-pic ms-2 bg-secondary" style="">
                                                    <?php 
                                                    if($value['image'] == null){
                                                        $firstLetterName  = ucfirst(substr($value['name'],0,1));

                                                    ?>
                                                    <?php echo $firstLetterName ?>
                                                    <?php
                                                    }else{
                                                    ?>
                                                        <img src="<?php echo $value['image']; ?>"  alt="">
                                                    <?php

                                                    }
                                                    
                                                    ?>
                                                </div>
                                                <div class="col-md-11 col-sm-11">
                                                    <strong>
                                                        <?php echo $value['name']; ?>
                                                    </strong>
                                                    <p>
                                                        <?php
                                                            if($value['rating'] == 1){
                                                        ?>
                                                            <i class="fa-solid fa-star" style="color: #fbff00;"></i>
                                                        <?php
                                                        }elseif($value['rating'] == 2){
                                                        ?>
                                                            <i class="fa-solid fa-star" style="color: #fbff00;"></i>
                                                            <i class="fa-solid fa-star" style="color: #fbff00;"></i>
                                                        <?php
                                                        }elseif($value['rating'] == 3){
                                                        ?>
                                                            <i class="fa-solid fa-star" style="color: #fbff00;"></i>
                                                            <i class="fa-solid fa-star" style="color: #fbff00;"></i>
                                                            <i class="fa-solid fa-star" style="color: #fbff00;"></i>
                                                        <?php
                                                        }elseif($value['rating'] == 4){
                                                            ?>
                                                                <i class="fa-solid fa-star" style="color: #fbff00;"></i>
                                                                <i class="fa-solid fa-star" style="color: #fbff00;"></i>
                                                                <i class="fa-solid fa-star" style="color: #fbff00;"></i>
                                                                <i class="fa-solid fa-star" style="color: #fbff00;"></i>
                                                            <?php
                                                        }elseif($value['rating'] == 5){
                                                            ?>
                                                                <i class="fa-solid fa-star" style="color: #fbff00;"></i>
                                                                <i class="fa-solid fa-star" style="color: #fbff00;"></i>
                                                                <i class="fa-solid fa-star" style="color: #fbff00;"></i>
                                                                <i class="fa-solid fa-star" style="color: #fbff00;"></i>
                                                                <i class="fa-solid fa-star" style="color: #fbff00;"></i>
                                                            <?php
                                                        }
                                                        ?>
                                    
                                                    </p>
                                                    <p class="text-justify">
                                                        <?php echo $value['review']; ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <hr>
                                        <?php
                                        }
                                    ?>
                                </div>
                            <?php
                            }
                            ?>



                        </div>
                        <!-- Reviews tab  -->                      

                        <!-- Services  -->
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab" tabindex="0">
                            <div id="user_services_tab">

                            </div>
                            <!-- <p>
                                <?php 
                                $is_first = true;
                                foreach($singleProfFetch['services-name'] as $one){
                                  
                                    echo "<button style='    border: none; background-color: #0068ff;    margin-right: 5px; color: white;'>$one</button>" ;
                                }
                                ?>
                            </p> -->
                        </div>
                        <!-- Services  -->
                        <!-- Skills  -->
                        <div class="tab-pane fade" id="pills-skills" role="tabpanel"
                            aria-labelledby="pills-skills-tab" tabindex="0">
                            <div id="skills_box"></div>
                            
                        </div>
                        <!-- Skills  -->
                    </div>

                </div>
            
            </div>
        </div>
    </section>


                <!-- <div class="owl-carousel professional-carousel owl-theme"  id="pills-professionals-grid-col" >


                    

                        <div class="item "style="    height: 300px;width:auto;    box-shadow: 0 10px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,-0.77);">

                            
                            <div class="text-center  bg-light"
                                style="padding: 30px;  border-radius: 10px;  height: 100%;    box-shadow: 0 0px 20px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,-0.77);">


                                <div class="car-profile-image d-flex justify-content-evenly align-items-center">
                                    <div class="image-round-box">

                                        <img src="<?php echo $value["image"]; ?>" alt="">
                                    </div>
                                    <div class="grid-box-text text-capitalize">
                                        <p>
                                        <?php echo $value['name']; ?>
                                        </p>
                                        
                                            <?php echo $value['service']; ?>
                                        
                                        <p>Verified</p>
                                        <p> <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                                class="fa-solid fa-star"></i>
                                        </p>


                                    </div>

                                </div>

                                <p class="mt-3" style=" font-size: 12px; text-align: initial; color: grey;">
                                    <?php
                                    $string = strip_tags($value['listing_about']);
                                    if (strlen($string) > 180) {
                                        $string_cut = substr($string, 0, 100);
                                        echo $string_cut . "...";
                                    } else {
                                        echo $value['listing_about'];
                                    } ?>
                                </p>

                                <a href="<?php echo $value['id']; ?>"><button class="mt-3 view-prof-btn">View</button></a>

                            </div>
                            

                        </div>

                    

                </div> -->




    <section>
        <div class="container-fluid">
            <h3 class="text-center mb-3 mt-3">SIMILAR PROFILE</h3>
            <div id="carousel_outer_box">

                
            </div>

        </div>
    </section>




    <section class="pb-3 pt-3">
        <div class="container-fluid">
            <img src="<?php echo $SITE_URL ?>/assets/img/Group471.png" alt="" style="width:-webkit-fill-available">
        </div>
    </section>





















    <?php include './footer.php'; ?>

    <!-- JavaScript Bundle with Popper -->


    <div class="loader-container" id="loader">
        <div class="loader">
            <img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1705386434/sooprs-svg_bseaya.svg'  style='    position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 110px;'>

        </div>
    </div>



    <!-- modal for each portfolio -->
    <?php
    
    foreach($singleProPoretfolios as $portfolio){

    ?>
        <div class="modal fade" id="exampleModal_<?php echo $portfolio['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fw-medium fs-5" id="exampleModalLabel"><?php echo $portfolio['title']?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="<?php echo $SITE_URL."/assets/portfolio-images/".$portfolio['files']?>" alt="<?php echo $portfolio['title']?>" style="width: -webkit-fill-available;">
                    <div class="mt-4">
                        <?php
                            if($portfolio['description']){
                        ?>
                        <b>Project description :</b>
                        <br>
                        <p>
                        <?php echo $portfolio['description']?>
                        </p>
                        <?php
                            }
                        ?>
                       
                    </div>
                    <div class="mt-4">
                        <?php
                            if($portfolio['link']){
                        ?>
                        <b>Project link :</b>
                        <br>
                        
                        <a class="text-primary" href="<?php echo $portfolio['link'] ?>" target="_blank"><?php echo $portfolio['link'] ?></a>
                        
                        <?php
                            }
                        ?>
                       
                    </div>
                </div>
                
                </div>
            </div>
        </div>

    <?php

    }
    ?>
    



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

    <!-- fancy box  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <!-- Answers select label  -->


    <script>
        $(document).ready(function() {
            showLoader();
            // Laod all professionals through load-more button fro similar profiles carousel
            // Laod all professionals through load-more button
            let offset = 0;
            let limit = 10;
            function pagination_scroll(offset, limit) {
                $.ajax({
                    url: site_url+'/api2/public/index.php/get_professionals_ajax',
                    method: "POST",
                    cache: false,
                    data: { offset: offset, limit: limit },
                    success: function (data) {
                        hideLoader();

                        let decode_data = JSON.parse(data, true);
                        var element2 = document.getElementsByClassName("owl-stage");


                        if (decode_data['status'] == 200) {
                            var htmlContent2 = [];

                            for (var i = 0; i < decode_data['msg'].length; i++) {
                                var item = decode_data['msg'][i];
                                var skills = item['services'];   

                   let avgRating = item['avgrating'] ? "<i class='fa-solid fa-star'></i>"+item['avgrating']+"/5.0 Rating" : "";

                            
                                let user__name = item['data']['name'];
                                let firstLetter = user__name[0].toUpperCase();
                            
                                const colorNameMap = {
                                    A: 'aquamarine',
                                    B: 'blue',
                                    C: 'cadetblue',
                                    D: 'darkgoldenrod',
                                    E: 'bisque',
                                    F: 'firebrick',
                                    G: 'gold',
                                    H: 'hotpink',
                                    I: 'indianred',
                                    J: 'navajowhite',
                                    K: 'khaki',
                                    L: 'lavender',
                                    M: 'magenta',
                                    N: '#0000895e',
                                    O: 'orange',
                                    P: 'palegreen',
                                    Q: 'olivedrab',
                                    R: 'red',
                                    S: 'salmon',
                                    T: 'tan',
                                    U: 'deepskyblue',
                                    V: 'blueviolet',
                                    W: 'rosybrown',                        
                                    Y: 'bisque',
                                    

                                };

                                let colorName = colorNameMap[firstLetter] || '#006aff';
                                let image__url = item['data']['image'];
                                let image_or_letter = image__url ? "<img src='"+ item['data']['image'] + "' alt='' style='width:inherit;height:inherit'>" : "<p class='d-flex justify-content-center align-items-center' style='font-size: 4rem;background-color:"+colorName+";width:inherit;height:inherit;border-radius: 50%;'>" + firstLetter + "</p>";
                            

                                var skillsParagraph = document.createElement('p');
                                // skillsParagraph.style = 'color: grey;';
                                skillsParagraph.className = 'skills__spans';

                                // Iterate over skills and create a <span> for each skill
                                skills.forEach(function(skill) {
                                    var span = document.createElement('span');                        
                                    span.textContent = skill;
                                    skillsParagraph.appendChild(span);
                                });

                                // Assuming the item is a string, you can customize this part based on your response structure
                                

                                itemHtml = "<div class='text-center  bg-light' style=' padding: 15px;    border-radius: 10px; position:relative;   height: 100%;box-shadow: 0px 0px 7px -3px black;'>\
                                            <div class='profile-image ' style='display: flex;flex-direction: column;align-items: center;'>\
                                                <div class='image-round-box'>\
                                                "+image_or_letter+"\
                                                </div>\
                                                <div class='grid-box-text text-capitalize'>\
                                                    <p> "+ item['data']['name'] + "</p>\
                                                    <p> " + item['string_cut'] + "</p>\
                                                    <p>Verified</p>\
                                                    <p style='font-size: 13px;'>"+avgRating+"</p>\
                                                </div>\
                                            </div>\
                                            <p style=' font-size: 12px; text-align: initial; color: grey;'></p>\
                                            <a href='"+ item['data']['slug'] + "' style='position: absolute; right: 10px;bottom: 10px;'>\
                                            <button class='mt-2 view-prof-btn'><i class='fa-solid fa-arrow-right text-primary'></i></button>\
                                            </a>\
                                            </div>";
                                htmlContent2.push(itemHtml);
                            }
                            htmlContent3 = htmlContent2.map( item => `<div class='item' style='margin: 0 10px;height: 300px;width:auto;box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;'>${item}</div>`);
                            // when you use the template literal syntax in JavaScript with the map function, it creates an array of strings. When you concatenate these strings using ${item}, it introduces commas between the elements when you convert the array back to a string. To resolve this, you can use join('') to join the array of strings into a single string without commas. 
                            var carouselHtml = htmlContent3.join('');
                            $('#carousel_outer_box').html('<div id="carousel-section">'+carouselHtml+'</div>');
                            $('#carousel-section').addClass("owl-carousel");
                            $('#carousel-section').owlCarousel({
                                items:4,
                                slideBy: 1,
                                stagePadding: 0,
                                nav: true,
                                dots: false,
                                responsive: {
                                    0: { items: 1 },
                                    600: { items: 3 },
                                    1000: { items: 4 }
                                }
                            });
                            // element2.innerHTML += htmlContent2;
                        } else {
                            // $("#data-message").html("no  more professionals");
                            // $("#load-more").hide();
                        }

                    }
                });
            }

            // Initialize Owl Carousel
            // $('.professional-carousel').owlCarousel({
            //     loop: true,
            //     margin: 10,
            //     nav: true,
            //     responsive: {
            //         0: {
            //             items: 1
            //         },
            //         600: {
            //             items: 2
            //         },
            //         700: {
            //             items: 2
            //         },

            //         1000: {
            //             items: 3
            //         },
            //         1200: {
            //             items: 4
            //         }
            //     }
            // });

            pagination_scroll(offset, limit);
            
            // Laod all professionals through load-more button fro similar profiles carousel
        });


        // Professional details from ajax 
        function user_details() {

            var url = window.location.href;
            var parts = url.split('/');
            var slug = parts[parts.length - 1];
            console.log(slug);
            $.ajax({
                url: site_url+'/api2/public/index.php/get_user_details',
                method: "POST",
                cache: false,
                data: { slug: slug },
                success: function (data) {                   

                    let decode_data = JSON.parse(data, true);
                    

                    if (decode_data['status'] == 200) {
                        
                        var item = decode_data['msg'];
                        var services = item[1];        
                        var skills = item[0]['skills'];        


                        let user__name = item[0]['name'];
                        let firstLetter = user__name[0].toUpperCase();                        
                        const colorNameMap = {
                                A: 'aquamarine',
                                B: 'blue',
                                C: 'cadetblue',
                                D: 'darkgoldenrod',
                                E: 'bisque',
                                F: 'firebrick',
                                G: 'gold',
                                H: 'hotpink',
                                I: 'indianred',
                                J: 'navajowhite',
                                K: 'khaki',
                                L: 'lavender',
                                M: 'magenta',
                                N: '#0000895e',
                                O: 'orange',
                                P: 'palegreen',
                                Q: 'olivedrab',
                                R: 'red',
                                S: 'salmon',
                                T: 'tan',
                                U: 'deepskyblue',
                                V: 'blueviolet',
                                W: 'rosybrown',                        
                                Y: 'bisque',
                                

                            };

                        let colorName = colorNameMap[firstLetter] || '#006aff';
                        let image__url = item[0]['image'];
                        let image_or_letter = image__url ? "<a href='"+ item[0]['image'] + "' class='fancybox' data-fancybox='gallery1' style='    width: -webkit-fill-available;height: -webkit-fill-available;'><img src='"+ item[0]['image'] + "' alt='' style=''></a>" : "<p class='d-flex justify-content-center align-items-center' style='font-size: 4rem;background-color:"+colorName+";width: -webkit-fill-available;height: inherit;border-radius: 50%;' >" + firstLetter + " </p>";
                    
                        // ============== Services ==============
                        if(services){

                            var servicesParagraph = document.createElement('p');                            
                            servicesParagraph.className = 'skills__spans';
    
                            services.forEach(function(skill) {
                                var span = document.createElement('span');                        
                                span.textContent = skill;
                                servicesParagraph.appendChild(span);
                            });
                        }
                        // ============== Services ==============
                        // ============== Skills ==============
                        if(skills && skills != null){

                            var skillsParagraph = document.createElement('p');                            
                            skillsParagraph.className = 'skills__spans';
    
                            skills.forEach(function(skill) {
                                var span = document.createElement('span');                        
                                span.textContent = skill;
                                skillsParagraph.appendChild(span);
                            });
                        }
                        // ============== Skills ==============


                        let myportImages = item[0]['portfolios'];
                        let portfolios_col = '';
                        if(myportImages){
                            myportImages.forEach(function(portfolio){

                                // myportfolioImages = portfolio['files'].replace(/\s/g, '');
                                // let portfolioImagesArr = myportfolioImages.split(',');
                                // portfolioImagesArr.forEach(function(element) {
                                //     let image_path = site_url+"/assets/portfolio-images/"+element;
                                    
                                // });
                                portfolios_col +=
                                '<div class="col-lg-3">\
                                    <div class="text-center">\
                                        <div class=" position-relative">\
                                            <a type="" class="" style="cursor:pointer" data-bs-toggle="modal" data-bs-target="#exampleModal_'+portfolio.id+'">\
                                            <img  src="'+portfolio['images'][0]+'" alt="" style="max-width:150px;"><br>\
                                            </a>\
                                        </div>\
                                        <p style="font-size:13px;" >'+portfolio.title+'</p>\
                                    </div>\
                                </div>';
                            })
                            

                            
                        }
                        
                        
                        
                        // let image_path = site_url."/assets/portfolio-images/".$portfolioImagesArr;

                        // Assuming the item is a string, you can customize this part based on your response structure
                        let profile_img = document.getElementById('profile_img');
                        let user_name = document.getElementById('user_name');
                        let professional_location = document.getElementById('professional_location');

                        let bread_name = document.getElementById('bread_name');
                        let skills_box = document.getElementById('skills_box');
                        let user_services_tab = document.getElementById('user_services_tab');
                        let user__bio = document.getElementById('user__bio');
                        let user_about = document.getElementById('user_about');
                        let portfolio_div = document.getElementById('portfolio_div');

                        // portfolio imgs resume... 


                        profile_img.innerHTML = image_or_letter;
                        // profile_img.style.backgroundColor = colorName;

                        user_name.innerHTML = item[0]['name'];
                        bread_name.innerHTML  += item[0]['name'];    
                        // if(item[0]['country']){

                        //     professional_location.innerHTML  += "<span class='fw-bold text-dark'>&nbsp;"+item[0]['country']+"</span class='fw-medium'>";                        
                        // }                    

                        if(skillsParagraph){

                            skills_box.innerHTML  = skillsParagraph.outerHTML;
                        }else{
                            skills_box.innerHTML  = "<p class='text-secondary' style='font-style: italic;font-size: 13px;'>No skills added!</p>";

                        }
                        if(servicesParagraph){

                            user_services_tab.innerHTML  = servicesParagraph.outerHTML;
                        }else{
                            user_services_tab.innerHTML  = "<p class='text-secondary' style='font-style: italic;font-size: 13px;'>No services added!</p>";

                        }
                        
                        if(item[0]['bio'] == null){
                            user__bio.innerHTML  = "<p class='text-secondary' style='font-style: italic;font-size: 13px;'>No bio added</p>";
                        }else{
                            user__bio.innerHTML  = item[0]['bio'];
                        }
                        

                        if( item[0]['listing_about'] == null){
                            user_about.innerHTML  = "<p class='text-secondary' style='font-style: italic;font-size: 13px;'>No record found</p>";
                        }else{
                            user_about.innerHTML  =  item[0]['listing_about'];
                        }
                        
                        if(portfolios_col){
                            portfolio_div.innerHTML  = portfolios_col;
                        }else{
                            portfolio_div.innerHTML  = "<p class='text-secondary' style='font-style: italic;font-size: 13px;'>No portfolio found</p>";
                        }





                        
                        
                    } else {
                        $("#data-message").html("no more professionals");
                        $("#load-more").hide();
                    }

                }
            });
        }

       user_details(offset, limit);

    </script>




    <script>
       
        // $(document).ready(function () {
                function ans_sel() {
                    $('.course').each(function () {
                        $(this).on('click', function () {

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
    <!-- <script>
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
    </script> -->

        <script>
            let rateBox = Array.from(document.querySelectorAll(".rate-box"));
            let globalValue = document.querySelector(".global-value");
            let two = document.querySelector(".two");
            let totalReviews = document.querySelector(".total-reviews");

            // const reviews = {};
            var reviews = <?php echo json_encode($singleProfReview['ratingCounts']); ?>;
            // myArray.forEach((value, index) => {
            //     reviews[index] = value;
            // });
            // let reviews = {
            // 5: 0,
            // 4: 0,
            // 3: 0,
            // 2: 0,
            // 1: 0,
            // };
            updateValues();

            function updateValues() {
            rateBox.forEach((box) => {
                let valueBox = rateBox[rateBox.indexOf(box)].querySelector(".value");
                let countBox = rateBox[rateBox.indexOf(box)].querySelector(".count");
                let progress = rateBox[rateBox.indexOf(box)].querySelector(".progress");
                countBox.innerHTML = nFormat(reviews[valueBox.innerHTML]);

                let progressValue = Math.round(
                (reviews[valueBox.innerHTML] / getTotal(reviews)) * 100
                );
                progress.style.width = `${progressValue}%`;
            });
            totalReviews.innerHTML = getTotal(reviews);
            finalRating();
            }
            function getTotal(reviews) {
            return Object.values(reviews).reduce((a, b) => a + b);
            }

            document.querySelectorAll(".value").forEach((element) => {
            element.addEventListener("click", () => {
                let target = element.innerHTML;
                reviews[target] += 1;
                updateValues();
            });
            });

            function finalRating() {
            let final = Object.entries(reviews)
                .map((val) => val[0] * val[1])
                .reduce((a, b) => a + b);
            let ratingValue = nFormat(parseFloat(final / getTotal(reviews)).toFixed(1));
            globalValue.innerHTML = ratingValue;
            two.style.background = `linear-gradient(to right, #f2bb16 ${
                (ratingValue / 5) * 100
            }%, transparent 0%)`;
            }

            function nFormat(number) {
            if (number >= 1000 && number < 1000000) {
                return `${number.toString().slice(0, -3)}k`;
            } else if (number >= 1000000 && number < 1000000000) {
                return `${number.toString().slice(0, -6)}m`;
            } else if (number >= 1000000000) {
                return `${number.toString().slice(0, -9)}md`;
            } else if (number === "NaN") {
                return `0.0`;
            } else {
                return number;
            }
            }

        </script>

</body>

</html>