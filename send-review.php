<?php
session_start();
include_once 'function.php';
include_once 'env.php';
include('config/dbconn.php');


$site_url = "<?php echo $SITE_URL ?>";

if(!isset($_SESSION['id'])){
    $url = $SITE_URL.'/login-professional';
    header('Location: ' . $url);
    exit();
}

$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$parts = explode('/', $urlPath);
$secondLastSegment = isset($parts[count($parts) - 2]) ? $parts[count($parts) - 2] : null;
$lastSegment = isset($parts[count($parts) - 1]) ? pathinfo($parts[count($parts) - 1], PATHINFO_FILENAME) : null;

$lead_data = new DB_con();
$username = $lead_data->getUser($_SESSION['id'], 'join_professionals');



$title = "";
$description = "";
$keywords = "";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="/assets/img/images/sooprs-fav.png" />
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


    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-54VLF42');</script>
    <!-- End Google Tag Manager -->





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
            #user-pic-round {
                background: url(<?php echo $username['image'] == null ? '' : $username['image'] ?>);
                background-size: cover;
                background-position: center;
                width: 30px;
                border-radius: 50%;
                height: 30px;
            }

            <?php
        } else {
            ?>
            #user-pic-round {
                background: url('');
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
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-54VLF42" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->




    <!-- <a href="https://api.whatsapp.com/send?phone=+91-9523558483&amp;text=Hey%20I'm%20interested%20in%20Sooprs%20Services."
        class="whatsapp-icon d-flex align-items-center justify-content-center" rel="nofollow" target="_blank"><i
            class="fa-brands fa-whatsapp mt-1"
            style="color: #ffffff;    font-size: 37px;  margin-left: 2px;margin-right: 0px; margin-bottom: 2px;"></i>
        <span></span></a> -->

       <!-- ================ offcanvas navbar ================== -->
       <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                        
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $SITE_URL ?>/browse-job">Browse Job</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $SITE_URL ?>/post-a-project">Post a Project</a>
                        </li>

                        <?php
                        if (isset($_SESSION['id'])) {
                        ?>

                        <!-- <li class="nav-item dropdown">
                            <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div>
                                <i class="fa-regular fa-bell position-relative"></i>
                                <span class="text-danger position-absolute fw-bold" style="top:2px;font-size:10px;">2</span>
                            </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li> -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex justify-content-start align-items-center" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <div class="user-pic-round me-2" id="user-pic-round">
                                </div>
                                My Account
                            </a>
                            <ul class="dropdown-menu">
                            <?php
                            if ($username['is_buyer'] == 1) {
                            ?>
                                <li><a class="dropdown-item" href="<?php echo $SITE_URL ?>/professional-settings">Settings</a></li>
                                <li><a class="dropdown-item" href="<?php echo $SITE_URL ?>/my-queries">My Enquiries</a></li>                                
                                <li><a class="dropdown-item" href="<?php echo $SITE_URL ?>/my-projects">My Projects</a></li>
                                <?php
                                } else {
                                ?>
                                <li><a class="dropdown-item" href="<?php echo $SITE_URL ?>/professional-settings">Settings</a></li>
                                <li><a class="dropdown-item" href="<?php echo $SITE_URL ?>/my-leads">My Bids</a></li>                                
                                <li><a class="dropdown-item" href="<?php echo $SITE_URL ?>/browse-job">Browse Jobs</a></li>
                                <li><a class="dropdown-item" href="<?php echo $SITE_URL ?>/user-projects">Assigned Projects</a></li>


                                <?php
                                }
                                ?>
                                <li class="nav-item">
                                    <a class="dropdown-item" href="<?php echo $SITE_URL ?>/logout">Logout</a>
                                </li>
                            </ul>
                        </li>
                        <?php
                        } else {
                        ?>

                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo $SITE_URL ?>/login-professional">Login</a>
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


    <nav class="navbar navbar-expand-lg bg-body-tertiary p-0 m-0">
        <div class="container-fluid p-0 m-0">
            <a class="navbar-brand p-0 m-0" href="<?php echo $SITE_URL ?>"><img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1691132151/sooprs/sooprs_logo_blue_side2_flxyxx.png" alt="logo"
                    style="    width: 140px;" /></a>



            <li class="nav-link d-md-none ">
                <a href="<?php echo $SITE_URL ?>/post-a-project" class="signup-btn" style="margin:5px 5px"><strong> Post a Project</strong></a>
            </li>
            
            <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> -->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
                aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav" style="    padding: 0 5px;">
                   

                    <li class="nav-link nav-item ">
                        <a href="<?php echo $SITE_URL ?>/browse-job" style="margin:5px 5px; color: #2474ff;"><strong> Browse Project</strong></a>
                    </li>
                    <li class="nav-link nav-item d-none d-md-block">
                        <a href="<?php echo $SITE_URL ?>/post-a-project" class="signup-btn" style="margin:5px 5px"><strong> Post a Project</strong></a>
                    </li>

                   

                    

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
                            <button class="btn  dropdown-toggle d-flex align-items-center" type="button" id="dropdownMenuButton222" style="    width: 185px;" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                                
                                <div class="user-pic-round me-2" id="user-pic-round"> </div>
                                My Account
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton222" style="top: 42px;">
                                <?php
                                if ($username['is_buyer'] == 1) {
                                    ?>
                                    <a class="dropdown-item" href="<?php echo $SITE_URL ?>/professional-settings">Settings</a>
                                    <a class="dropdown-item" href="<?php echo $SITE_URL ?>/my-queries">My Enquiries</a>
                                    <a class="dropdown-item" href="<?php echo $SITE_URL ?>/my-projects">My Projects</a>

                                    <?php
                                } else {
                                    ?>


                                    <a class="dropdown-item" href="<?php echo $SITE_URL ?>/professional-settings">Settings</a>
                                    <a class="dropdown-item" href="<?php echo $SITE_URL ?>/my-leads">My Bids</a>
                                    <a class="dropdown-item" href="<?php echo $SITE_URL ?>/browse-job">Browse Jobs</a>
                                    <a class="dropdown-item" href="<?php echo $SITE_URL ?>/user-projects">Assigned Projects</a>


                                    <?php
                                }
                                ?>
                                <a class="dropdown-item" href="<?php echo $SITE_URL ?>/logout">Logout</a>

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

    <section class="top-sectop d-flex align-items-center justify-content-center" id="top-sectopId" style="background-color: #e0e0e0;padding:100px 0; height:100vh; ">
        <div class="container">
            
            <div class="row justify-content-center">
               <div class="col-md-8">
                    <div id="elementToRemove">
                    
                        <form class="bg-white p-4">
                            <p class=" text-center text-primary" style=" padding: 20px 0;font-size: 25px;">
                                Write a review
                            </p>
                            <input type="hidden" name="professional_id" id="professional_id" value='<?php echo $lastSegment ?>'>
                            <input type="hidden" name="customer_id" id="customer_id" value='<?php echo $username["id"] ?>'>
                            <input type="hidden" name="lead_id" id="lead_id" value='<?php echo $secondLastSegment ?>'>

                            <p class="text-secondary text-center" style="font-size:13px;">How would you rate your experience with the professional?</p>

                            <h6 class="text-center mt-2 mb-4">
                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_1" data-rating="1"></i>
                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_2" data-rating="2"></i>
                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_3" data-rating="3"></i>
                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_4" data-rating="4"></i>
                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                            </h6>

                            <div class="form-group mb-3">
                                <input type="text" name="user_name" id="user_name" class="form-control" placeholder="Enter your name..." />
                            </div>
                            
                            <div class="form-group mb-3">
                                <textarea name="user_review" id="user_review" class="form-control" placeholder="Type review here..." rows="5"></textarea>
                            </div>

                           
                            
                            
                            <div class="form-group text-center mt-4">
                                <button type="button" class="btn btn-primary btn-sm ps-4 pe-4" id="save_review">Done </button>
                            </div>
                            
                            
                        </form>
                    </div>
                    <div id="elementToShow" class="hidden text-center">
                        <img src="<?php echo $SITE_URL ?>/assets/img/sprs_verified.gif" alt="" style="width:200px">
                        <br>
                        <p style="font-size: 23px;">You review has been saved</p>
                        <br>
                        <div class="text-center"><a href="<?php echo $SITE_URL ?>/my-projects"><i class="fa-solid fa-arrow-left" style="color: #7bb245;"></i>&nbsp; <span style="color: #7bb245;">Go back</span></a></div>
                    </div>
               </div>
            </div>
        </div>
    </section>



    <footer class="bg-primary py-2">
        <div class="container">
            <div class="row pt-5 align-items-center justify-content-center text-center">
                <div class="col-md-3 mt-5 ">
                    <a href="<?php echo $SITE_URL ?>"><img
                            src="<?php echo $SITE_URL ?>/sooprs_site_files/sooprs_logo_white_center (1).png"
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
                        <li><a href="<?php echo $SITE_URL ?>/about-us" class="d-block">About Us</a></li>
                        <li><a href="<?php echo $SITE_URL ?>/contact-us" class="d-block">Contact Us</a></li>
                        <li><a href="<?php echo $SITE_URL ?>/privacy-policy" class="d-block">Privacy Policy</a></li>
                        <li><a href="<?php echo $SITE_URL ?>/terms-and-conditions" class="d-block">Terms of Service</a>
                        </li>
                        <li><a href="<?php echo $SITE_URL ?>/investors" class="d-block">Investors</a></li>
                        <li><a href="<?php echo $SITE_URL ?>/startup" class="d-block">StartUp</a></li>
                        <li><a href="<?php echo $SITE_URL ?>/how-sooprs-work" class="d-block">How Sooprs Work</a></li>
                    </ul>
                </div>




                <div class="col-md-3 mt-4">
                    <h2 class="footer-heading">Latest Tech</h2>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo $SITE_URL ?>/IOT" class="d-block">IOT</a></li>
                        <li><a href="<?php echo $SITE_URL ?>/artificial_intellgience" class="d-block">Artificial
                                Intelligence</a></li>
                        <li><a href="<?php echo $SITE_URL ?>/virtual_reality" class="d-block">Virtual Reality</a></li>
                        <li><a href="<?php echo $SITE_URL ?>/augmented_reality" class="d-block">Augumented Reality</a>
                        </li>
                        <li><a href="<?php echo $SITE_URL ?>/machine_learning" class="d-block">Machine Learning</a></li>
                        <li><a href="<?php echo $SITE_URL ?>/chat_bots" class="d-block">Chat BOTS</a></li>
                        <li><a href="<?php echo $SITE_URL ?>/all-professionals" class="d-block">Hire Professionals</a>
                        </li>
                    </ul>
                </div>



                <div class="col-md-3">
                    <h2 class="footer-heading">Tech Stack</h2>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo $SITE_URL ?>/web-development" class="d-block">Web development</a></li>
                        <li><a href="<?php echo $SITE_URL ?>/mobile-app-development" class="d-block">Mobile App
                                development</a></li>
                        <li><a href="<?php echo $SITE_URL ?>/digital-marketting" class="d-block">Digital Marketing</a>
                        </li>
                        <li><a href="<?php echo $SITE_URL ?>/graphic_designing.php" class="d-block">Graphics Designing</a>
                        </li>
                        <li><a href="<?php echo $SITE_URL ?>/game_development" class="d-block">Game Development</a></li>
                        <li><a href="<?php echo $SITE_URL ?>/uiux_designing" class="d-block">UI/UX Designing</a></li>
                        <li><a href="<?php echo $SITE_URL ?>/applicationdesigning" class="d-block">Application
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
                    <img src="<?php echo $SITE_URL ?>/assets/img/dcm.jpg" alt="" class="img-fluid" height="80px"
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


    var rating_data = 0;

    $(document).on('mouseenter', '.submit_star', function(){

        var rating = $(this).data('rating');

        reset_background();

        for(var count = 1; count <= rating; count++)
        {

            $('#submit_star_'+count).addClass('text-warning');

        }

    });

    function reset_background()
    {
        for(var count = 1; count <= 5; count++)
        {

            $('#submit_star_'+count).addClass('star-light');

            $('#submit_star_'+count).removeClass('text-warning');

        }
    }

    $(document).on('mouseleave', '.submit_star', function(){

        reset_background();

        for(var count = 1; count <= rating_data; count++)
        {

            $('#submit_star_'+count).removeClass('star-light');

            $('#submit_star_'+count).addClass('text-warning');
        }

    });

    $(document).on('click', '.submit_star', function(){

        rating_data = $(this).data('rating');

    });

    $('#save_review').click(function(){

        var user_name = $('#user_name').val();
        var user_review = $('#user_review').val();
        var customer_id = $('#customer_id').val();
        var professional_id = $('#professional_id').val();
        var lead_id = $('#lead_id').val();


        if(user_name == '' || user_review == '')
        {
            alert("Please Fill Both Field");
            return false;
        }
        else
        {
            $.ajax({
                url:site_url+"/api2/public/index.php/submit_review",
                method:"POST",
                data:{rating_data:rating_data, user_name:user_name, user_review:user_review,customer_id:customer_id,professional_id:professional_id,lead_id:lead_id},
                success:function(data)
                {
                    var new_data = JSON.parse(data);
                    console.log(new_data);
                    if(new_data.status == 200){
                        toastr.success(new_data.msg);
                        document.getElementById('elementToRemove').remove();
                        document.getElementById('elementToShow').classList.remove('hidden');
                        document.getElementById('top-sectopId').style.backgroundColor = 'white';
                   }else{
                    toastr.success(new_data.msg);

                   }

                },

            })
        }

    });




   

  </script>

</body>

</html>