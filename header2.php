<?php 

include 'env.php'; 
include_once 'function.php';

$dbConn = new DB_con();
if(isset($_SESSION['id'])){

    $notifications = $dbConn->get_bell_jobs($_SESSION['id']);
    // print_r($notifications);
    $notificationCount = '';
    $color = '';
    $bellDot = 'd-none';
    $fatext = 'regular';

    if($notifications != null){
        $notificationCount = count($notifications);       
        $color = 'text-primary';
        $fatext = 'solid';
        $bellDot = '';


    }
}

// $title = '';
// $description = '';
// $keywords = '';

?>
<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="<?php echo $SITE_URL; ?>/assets/img/images/sooprs-fav.png" />
    <title>
        <?php echo $title; ?>
    </title>
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="keywords" content="<?php echo $keywords; ?>">

    <link rel="canonical" href="https://sooprs.com/">
    <!--  google font   -->


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


    <!-- Jquery  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

    <!-- animate.css  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- AOS animation  -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Select2 cdn  -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


    <link href="<?php echo $SITE_URL ?>/assets/css/custom.css" rel="stylesheet" />
    <!-- <link href="assets/css/mCustomScrollbar.css" rel="stylesheet" /> -->


    <!-- toastr alert -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" integrity="sha512-hvNR0F/e2J7zPPfLC9auFe3/SE0yG4aJCOd/qxew74NN7eyiSKjr7xJJMu1Jy2wf7FXITpWS1E/RY8yzuXN7VA==" crossorigin="anonymous" referrerpolicy="no-referrer" />



    <!-- tinymce  -->
    <!-- <script src="<?php echo $SITE_URL ?>/assets/tinymce/js/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#input_gig_description',
            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            toolbar_mode: 'floating',
        });
    </script> -->
    <!-- Google tag (gtag.js) - Google Analytics -->
    <meta name="google-site-verification" content="MhU9sH2D2AdSTsz2t_u8dBkBMFQx3GpcOTwyIFDplvM" />

    <!-- Google tag (gtag.js) -->
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
            /* color: #0d6efd; */
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

        #loading {
            display: none;
            width: 50px;
            height: 50px;
            border: 5px solid rgba(255, 255, 255, .3);
            border-radius: 50%;
            border-top-color: #0d6efd;
            animation: spin 1s ease-in-out infinite;
            -webkit-animation: spin 1s ease-in-out infinite;
            position: absolute;
            top: 50%;
            bottom: 50%;
            left: 50%;
            right: 50%;
        }

        @keyframes spin {
            to {
                -webkit-transform: rotate(360deg);
            }
        }

        @-webkit-keyframes spin {
            to {
                -webkit-transform: rotate(360deg);
            }
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


    <style>
        <?php
        if (isset($_SESSION['id'])) {

            ?>
            .user-pic-round {
                background: url(<?php echo $username['image'] == null ? "$SITE_URL/assets/img/images/user-placeholder-pic.webp" : $username['image'] ?>);
                background-size: cover;
                background-position: center;
                width: 30px;
                border-radius: 50%;
                height: 30px;
            }

            <?php
        } else {
            ?>
            .user-pic-round {
                background: url($SITE_URL"/assets/img/images/user-placeholder-pic.webp");
                background-size: cover;
                background-position: center;
                width: 30px;
                border-radius: 50%;
                height: 30px;
            }

            <?php
        }
        ?>





    </style>

    <!-- <script type="text/javascript">
        function handleSelect(elm) {
            window.location = elm.value;
        }
    </script> -->

    <!-- CSS End -->
</head>

<body>


    <!-- Google Tag Manager (noscript) -->
    <!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-54VLF42" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript> -->
    <!-- End Google Tag Manager (noscript) -->


    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=G-0F4DKXHRDL"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
       
    



    

    <!-- ================  desktop navbar ================  -->
    <!-- <?php include "./pre-header-alert.php" ?> -->
    <nav class="navbar navbar-expand-lg bg-white p-0 m-0">
        
        <div class="container-fluid p-0 m-0">
            <a class="navbar-brand p-0 m-0" href="<?php echo $SITE_URL ?>"><img src="https://sooprs.com/assets/images/sooprs_logo.png" alt="logo"
                    style="    width: 140px;" /></a>



            <!-- <li class="nav-link d-md-none ">
                <a href="<?php echo $SITE_URL ?>/post-a-project" class="signup-btn" style="margin:5px 5px"><strong> Post a Project</strong></a>
            </li> -->
            
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <button class="navbar-toggler"  type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" id="toggleButton" ></span>
                <!-- <span class="navbar-toggler-icon" id="toggleButton" onclick="toggleClass('toggleButton', 'navbar-toggler-icon', 'btn-close')"></span> -->

            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav" style="    padding: 0 5px;">
                   

                    <?php
                    if(isset($_SESSION['id']) ){
                    ?>
                    <li class="dropdown mt-2 ">
                    <button  class="position-relative" data-toggle="dropdown"  style="border: none;background: transparent;"><i class="fa-<?php echo $fatext ?> <?php echo $color ?> fa-bell position-relative"></i></button>
                    <span class="position-absolute bell_dot <?php echo $bellDot ?>"></span>
                    <ul class="dropdown-menu p-2 notification-drop large-2" style="">
                    <li style="font-size:13px;background: #ffffff!important;    color: darkgrey;">Notifications</li>
                    <?php 
                    if($notifications != null){
                        foreach($notifications as $noti){
                        ?>
                        <li>     
                            <?php 
                            if($noti['notification_type'] == 3){
                            ?>
                            <p  onclick="handleIsseenClick(event,<?php echo $noti['id'] ?>,<?php echo $noti['notification_type'] ?>,<?php echo $_SESSION['is_buyer'] ?>,<?php echo $noti['lead_id'] ?>,<?php echo $noti['bid_id'] ?>)" class="notificationAnchor ">
                                <span class=""><?php echo $noti['msg'] ?></span><p style="  font-size: 9px;text-align:end"><?php echo $noti['notiDate'] ?></p>
                            </p>  
                            <?php 
                            }else{
                            ?>
                            <p  onclick="handleIsseenClick(event,<?php echo $noti['id'] ?>,<?php echo $noti['notification_type'] ?>,<?php echo $_SESSION['is_buyer'] ?>)" class="notificationAnchor">
                                <span class=""><?php echo $noti['msg'] ?></span><p style=" font-size: 9px;text-align:end"><?php echo $noti['notiDate'] ?></p>
                            </p> 
                            <?php
                            }
                            ?>
                                                
                        </li>
                          
                        <?php 
                        }
                    }else{
                    ?>
                        <!-- <div class="d-flex justify-content-center align-items-center"> -->
                            <!-- <div class=""> -->
                                
                                <p style="font-size:13px;  color: darkgrey; text-align:center;   position: absolute;top: 50%; left: 50%; transform: translate(-50%, -50%);"><img style="    width: 40px;" src="https://res.cloudinary.com/dr4iluda9/image/upload/v1703770050/modern-flat-design-concept-no-notification-empty-notification-popup-design_637684-87_sno64n.webp" alt=""> <br> No new notification</p>
                            <!-- </div> -->
                        <!-- </div> -->
                    <?php
                    }

                    ?>                        
                    </ul>
                    </li>
                    <?php 
                    }

                    ?>


                    <?php
                    if(isset($_SESSION['type']) && $_SESSION['type'] == 'professional'){
                    ?>
                    <li class="nav-link nav-item ">
                        <a href="<?php echo $SITE_URL ?>/browse-job" style="margin:5px 5px; color: #2474ff;"><strong> Browse Project</strong></a>
                    </li>
                   
                    <?php 
                    }
                    ?>


                    

                    <?php
                    if(isset($_SESSION['type']) && $_SESSION['type'] == 'customer'){
                    ?>
                    <!--<li class="nav-link nav-item d-none d-md-block">-->
                    <!--    <a href="<?php echo $SITE_URL ?>/browse-gigs" class="signup-btn" style="margin:5px 5px"><strong>Browse Gigs</strong></a>-->
                    <!--</li>-->
                    <li class="nav-link nav-item d-none d-md-block">
                        <a href="<?php echo $SITE_URL ?>/post-a-project" class="signup-btn" style="margin:5px 5px"><strong> Post a Project</strong></a>
                    </li>
                    
                    <?php 
                    }
                    ?>


                   <?php
                    if(!isset($_SESSION['id'])){
                    ?>
                    <!--<li class="nav-link nav-item d-none d-md-block">-->
                    <!--    <a href="<?php echo $SITE_URL ?>/browse-gigs" class="signup-btn" style="margin:5px 5px"><strong>Browse Gigs</strong></a>-->
                    <!--</li>-->
                    <li class="nav-link nav-item ">
                        <a href="<?php echo $SITE_URL ?>/browse-job" style="margin:5px 5px; color: #2474ff;"><strong> Browse Project</strong></a>
                    </li>
                    <li class="nav-link nav-item d-none d-md-block">
                        <a href="<?php echo $SITE_URL ?>/post-a-project" class="signup-btn" style="margin:5px 5px"><strong> Post a Project</strong></a>
                    </li>
                    <?php 
                    }
                    ?>

                    

                    <?php
                    if (isset($_SESSION['id'])) {
                        ?>

                        <!-- <div class="dropdown d-flex justify-content-center align-items-center">
                            <button class="btn   d-flex align-items-center" type="button" id="dropdownMenuBell" style="    width: 30px;" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a>
                                <i class="fa-regular fa-bell position-relative"></i>
                                <span class="text-danger position-absolute fw-bold" style="top:2px;font-size:10px;">2</span>
                            </a>

                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuBell" style="top: 42px;width:300px" id="jobs_bell">
                                    

                            </div>
                        </div> -->


                        <div class="dropdown ">
                            <button class="btn  dropdown-toggle d-flex align-items-center" type="button" id="dropdownMenuButton222" style="  " data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                                
                                <div class="user-pic-round me-2" id="user-pic-round"> </div>
                                <!-- My Account -->
                            </button>
                            <div class="dropdown-menu rounded-0" aria-labelledby="dropdownMenuButton222" style="top: 42px;width: 250px;right: 0px!important;    left: auto;">
                                

                                <?php
                                if ($username['is_buyer'] == 1) {
                                    ?>
                                    <div class="row" style="margin: 5px;">
                                        <div class="col-lg-4 col-md-4" style="text-align: -webkit-center;">
                                            <div class="user-pic-round me-2" id="user-pic-round" style="width: 50px; height: 50px;"> </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8" style="   text-align: justify;    align-self: center;">
                                        <?php 
                                            if($username['name'] != null){
                                        ?>
                                            <p style="font-size:13px;"><?php echo $username['name'] ?></p>
                                        <?php
                                            }
                                        ?>
                                            
                                        </div>
                                    </div>

                                <hr style="margin: 10px 17px;">
                                    <a class="dropdown-item" href="<?php echo $SITE_URL ?>/professional-settings" ><i class="fa-solid fa-gear"></i>&nbsp;&nbsp;Settings</a>
                                    <a class="dropdown-item" href="<?php echo $SITE_URL ?>/my-queries"><i class="fa-regular fa-rectangle-list"></i>  &nbsp;&nbsp;My Enquiries</a>
                                    <a class="dropdown-item" href="<?php echo $SITE_URL ?>/my-projects"><i class="fa fa-regular fa-folder-closed"></i>  &nbsp;&nbsp;My Projects</a>

                                    <?php
                                } else {
                                    ?>

                                        <div class="row user-menu-first-box" style="margin: 5px;">
                                            <div class="col-lg-4 col-md-4" style="text-align: -webkit-center;">
                                                <div class="user-pic-round me-2" id="user-pic-round" style="width: 50px; height: 50px;"> </div>
                                            </div>
                                            <div class="col-lg-8 col-md-8" style="    text-align: justify;    align-self: center;">
                                            <?php 
                                                if($username['name'] != null){
                                            ?>
                                                <p style="font-size:13px;"><?php echo $username['name'] ?></p>
                                            <?php
                                                }
                                            ?>
                                            </div>
                                        </div>
                                        <div class="user_type_box">
                                        <p class="text-capitalize"><?php echo $_SESSION['type'] ?></p>
                                    </div>
                                        <hr style="margin: 10px 17px;">
                                        <a class="dropdown-item" href="<?php echo $SITE_URL ?>/professional-settings" ><i class="fa-solid fa-gear"></i>&nbsp;&nbsp;Settings</a>
                                    
                                        <a class="dropdown-item" href="<?php echo $SITE_URL ?>/my-leads"><i class="fa-solid fa-coins"></i>  &nbsp;&nbsp;My Bids</a>
                                        <a class="dropdown-item" href="<?php echo $SITE_URL ?>/browse-job"><i class="fa fa-regular fa-folder"></i>  &nbsp;&nbsp;Browse Jobs</a>
                                        <a class="dropdown-item" href="<?php echo $SITE_URL ?>/user-projects"><i class="fa fa-regular fa-folder-closed"></i>  &nbsp;&nbsp;Assigned Projects</a>
                                        <a class="dropdown-item" href="<?php echo $SITE_URL ?>/create-gig" ><i class="fa-solid fa-business-time"></i> &nbsp;&nbsp;Create gig</a>
                                        <!-- <a class="dropdown-item" href="<?php echo $SITE_URL ?>/my-gigs" ><i class="fa-solid fa-briefcase"></i> &nbsp;&nbsp;My gigs</a> -->

                                    <?php
                                }
                                ?>
                                <hr>
                                <a class="dropdown-item text-danger" href="<?php echo $SITE_URL ?>/logout"><i class="fa-solid fa-arrow-right-from-bracket"></i>  &nbsp;&nbsp;Logout</a>

                            </div>
                        </div>

                        <?php
                    } else {
                        ?>


                        <li class="nav-link nav-item">
                            <a href="<?php echo $SITE_URL ?>/login-professional"
                                class="login-btn text-secondary fw-medium text-decoration-none border border-primary px-2"
                                style="margin:5px 5px">Login</a>
                        </li>
                       
                        <?php
                    }
                    ?>








                </ul>
            </div>
        </div>
    </nav>

    <!-- ================ offcanvas navbar ================== -->
    <nav class="navbar bg-body-tertiary fixed-top off-canvas-nav-bar p-0" style="    z-index: 9999;">
        <div class="container-fluid">
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header justify-content-end">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                <a class="navbar-brand p-0 m-0" href="<?php echo $SITE_URL ?>"><img src="https://sooprs.com/assets/images/sooprs_white_logo.webp" alt="logo"
                    style="    width: 180px;" /></a>
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 ps-4 pt-4">
                        
                        <?php
                        if(isset($_SESSION['id']) ){
                        ?>
                        <li class="dropdown mt-2 mb-2">
                            <button  class="position-relative" data-toggle="dropdown"  style="border: none;background: transparent;font-size: 18px;"><i class="fa-<?php echo $fatext ?> <?php echo $color ?> fa-bell position-relative me-2"></i>&nbsp;Notifications</button>
                            <span class="position-absolute bell_dot <?php echo $bellDot ?>"></span>
                            <ul class="dropdown-menu p-2 notification-drop large-2" style="">
                                <li style="font-size:13px;background: #ffffff!important;    color: darkgrey;    font-size: 18px;">Notifications</li>
                                <?php 
                                if($notifications != null){
                                    foreach($notifications as $noti){
                                    ?>
                                    <li>     
                                        <?php 
                                        if($noti['notification_type'] == 3){
                                        ?>
                                        <p  onclick="handleIsseenClick(event,<?php echo $noti['id'] ?>,<?php echo $noti['notification_type'] ?>,<?php echo $_SESSION['is_buyer'] ?>,<?php echo $noti['lead_id'] ?>,<?php echo $noti['bid_id'] ?>)" class="notificationAnchor">
                                            <span class=""><?php echo $noti['msg'] ?></span>
                                        </p>  
                                        <?php 
                                        }else{
                                        ?>
                                        <p  onclick="handleIsseenClick(event,<?php echo $noti['id'] ?>,<?php echo $noti['notification_type'] ?>,<?php echo $_SESSION['is_buyer'] ?>)" class="notificationAnchor">
                                            <span class=""><?php echo $noti['msg'] ?></span>
                                        </p> 
                                        <?php
                                        }
                                        ?>
                                                            
                                    </li>
                                    
                                    <?php 
                                    }
                                }else{
                                ?>
                                <p style="font-size:13px;  color: darkgrey; text-align:center;   position: absolute;top: 50%; left: 50%; transform: translate(-50%, -50%);"><img style="    width: 40px;" src="https://res.cloudinary.com/dr4iluda9/image/upload/v1703770050/modern-flat-design-concept-no-notification-empty-notification-popup-design_637684-87_sno64n.webp" alt=""> <br>No new notification</p>
                                <?php
                                }
                                ?>                        
                            </ul>
                        </li>
                        <?php 
                        }

                        ?>



                        <?php
                        if(isset($_SESSION['type']) && $_SESSION['type'] == 'professional'){
                        ?>
                        <li class="nav-item mb-2">
                            <a class="nav-link text-dark ps-2" href="<?php echo $SITE_URL ?>/browse-job" style="    font-size: 18px;"><i class="fa fa-regular fa-folder"></i>&nbsp;&nbsp;Browse Job</a>
                        </li>
                        <?php 
                        }
                        ?>

                        
                        <?php
                        if(isset($_SESSION['type']) && $_SESSION['type'] == 'customer'){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link text-dark ps-2" href="<?php echo $SITE_URL ?>/post-a-project" style="    font-size: 18px;"><i class="fa fa-regular fa-folder"></i>&nbsp;Post a Project</a>
                        </li>
                        <?php 
                        }
                        ?>

                        <?php
                        if(!isset($_SESSION['id'])){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link mb-2 text-dark" href="<?php echo $SITE_URL ?>/browse-job" style="    font-size: 18px;">Browse Job</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  text-dark " href="<?php echo $SITE_URL ?>/post-a-project" style="    font-size: 18px;">Post a Project</a>
                        </li>
                        <?php 
                        }
                        ?>

                        <?php
                        if (isset($_SESSION['id'])) {
                        ?>

                        
                        <li class="nav-item dropdown ">
                            <a class="nav-link dropdown-toggle d-flex justify-content-start align-items-center text-dark" style="    font-size: 18px;" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <div class="user-pic-round me-2" id="user-pic-round">
                                </div>
                                My Account
                            </a>
                            <ul class="dropdown-menu">
                            <?php
                            if ($username['is_buyer'] == 1) {
                            ?>
                                <li><a class="dropdown-item" href="<?php echo $SITE_URL ?>/professional-settings"><i class="fa-solid fa-gear"></i> &nbsp;Settings</a></li>
                                <li><a class="dropdown-item" href="<?php echo $SITE_URL ?>/my-queries"><i class="fa-regular fa-rectangle-list"></i> &nbsp;My Enquiries</a></li>                                
                                <li><a class="dropdown-item" href="<?php echo $SITE_URL ?>/my-projects"><i class="fa fa-regular fa-folder"></i> My Projects</a></li>
                                <?php
                                } else {
                                ?>
                                <li><a class="dropdown-item" href="<?php echo $SITE_URL ?>/professional-settings"><i class="fa-solid fa-gear"></i> &nbsp;Settings</a></li>
                                <li><a class="dropdown-item" href="<?php echo $SITE_URL ?>/my-leads"><i class=" fa-solid fa-coins"></i> &nbsp;My Bids</a></li>                                
                                <li><a class="dropdown-item" href="<?php echo $SITE_URL ?>/browse-job"><i class="fa fa-regular fa-folder"></i> &nbsp;Browse Jobs</a></li>
                                <li><a class="dropdown-item" href="<?php echo $SITE_URL ?>/user-projects"> <i class="fa fa-regular fa-folder-closed"></i> &nbsp;Assigned Projects</a></li>


                                <?php
                                }
                                ?>
                                <li class="nav-item">
                                    <a class="dropdown-item" href="<?php echo $SITE_URL ?>/logout"><i class="fa-solid fa-arrow-right-from-bracket"></i> &nbsp;Logout</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                        } else {
                        ?>

                        <li class="nav-item mb-2">
                            <a class="nav-link text-dark" href="<?php echo $SITE_URL ?>/login-professional" style="    font-size: 18px;">Login</a>
                        </li>
                        <?php
                        }
                        ?>
                    </ul>
                    <!-- <form class="d-flex mt-3" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                    </form> -->
                </div>
            </div>
        </div>
    </nav>
    <!-- ================ offcanvas navbar ================== -->