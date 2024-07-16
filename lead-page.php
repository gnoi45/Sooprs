<?php
session_start();
include_once 'function.php';
include_once 'env.php';

include('config/dbconn.php');

if (!isset($_SESSION['id']) || $_SESSION['loggedin'] != true) {
    $url = $SITE_URL . '/login-professional';
    header('Location: ' . $url);
    exit();
}

// if ($_SESSION['leadUnlock'] != true) {
//     $url = 'leads';
//     header('Location: ' . $url);
//     exit();
// }

// $site_url = "//{$_SERVER['HTTP_HOST']}/";
// $escaped_url = htmlspecialchars($site_url, ENT_QUOTES, 'UTF-8');
// echo '<a href="' . $escaped_url . '">' . $escaped_url . '</a>';

$lead_data = new DB_con();
$username = $lead_data->getUser($_SESSION['id'], 'join_professionals');
// print_r($username);
//     die();
// if(isset($_SESSION['id'])){
//     $loguser = $lead_data->getUser($_SESSION['id'],'join_professionals');    
// }


if (isset($_GET['id'])) {
    $leadfetch = $lead_data->getleaddetail($_GET['id'], $_SESSION['id']);
    $leadOwner = $lead_data->getLeadOwner($_GET['id']);
    // print_r($leadOwner);
    //     die();
    // $myBidFetch = $lead_data->getMyBid($_GET['id'], $_SESSION['id']);
    

    $leadfetchwithoutProfessional = $lead_data->getleaddetailWithoutProfessional($_GET['id']);
    $leadbidCount = '';
    $allBids = '';
   

    if(isset($leadfetchwithoutProfessional['bidCount'])){
        $leadbidCount = $leadfetchwithoutProfessional['bidCount'];
    }
    if(isset($leadfetchwithoutProfessional['bids'])){
        $allBids = $leadfetchwithoutProfessional['bids'];
    }
   
    // $enquiryfetch = $lead_data->getenquirydetail($_GET['id']);

    // if ($leadfetch == false) {
    //     echo "<script>alert('No record found');</script>";
    // }
    // if ($enquiryfetch == false) {
    //     echo "<script>alert('No record found');</script>";
    // }
}

$title = "Project detail";
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


    <link href="<?php echo $SITE_URL ?>/assets/css/custom.css" rel="stylesheet" />
    <!-- <link href="assets/css/mCustomScrollbar.css" rel="stylesheet" /> -->








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
       
    </style>

    <style>
        .user-pic-round {
            background: url(<?php echo $username['image']; ?>);
            background-size: cover;
            background-position: center;
            width: 30px;
            border-radius: 50%;
            height: 30px;
        }
    </style>

    <style>
        h5 {
            font-size: 0.7em !important;
            color: grey !important;
            font-weight: 600 !important;
            text-align: left !important;
            padding-left: 5px !important;
        }

        #scrollBox {
            position: sticky;
            top: 100px;
            ;
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
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-54VLF42" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->




    <!-- <a href="https://api.whatsapp.com/send?phone=+91-9523558483&amp;text=Hey%20I'm%20interested%20in%20Sooprs%20Services."
        class="whatsapp-icon d-flex align-items-center justify-content-center" rel="nofollow" target="_blank"><i
            class="fa-brands fa-whatsapp mt-1"
            style="color: #ffffff;    font-size: 37px;  margin-left: 2px;margin-right: 0px; margin-bottom: 2px;"></i>
        <span></span></a> -->





    <?php include "header2.php" ?>

    <section class="top-sectop " style="background-color: #e0e0e0;">
        <div class="container">
            <p class="text-capitalize" style=" padding: 30px 0;  color: #758599;">
                <a style="text-decoration:none; color: #758599;" href="/"> <i class="fa-solid fa-house"></i> </a>&nbsp;
                /
                &nbsp; <a class="fs-6" href="<?php echo $SITE_URL ?>/browse-job"
                    style="text-decoration:none; color: #758599;">All Projects</a>&nbsp; /&nbsp;
                <?php echo $leadfetch['project_title'] ?>&nbsp;
            </p>

            <div class="row">
                <div class="col-md-9">
                    
                    <div class="row">
                        <div class="col-md-9">
                            <h3 class='mb-3 text-capitalize'>
                                <?php echo $leadfetch['project_title']; ?>
                            </h3>
                        </div>
                        <div class="col-md-3">
                                <p class="sooprs-budget fw-bold text-end">$
                                    <?php echo $leadfetch['min_budget']; ?> - $
                                    <?php echo $leadfetch['max_budget_amount']; ?> USD
                                </p>
                                <div class='d-flex align-items-center justify-content-end'>
                                    <h5 class="m-0"><i class="fa-solid fa-calendar-days "></i>&nbsp;Created on: &nbsp;</h5>
                                    <p class='text-secondary' style='font-size:10px'>
                                        <?php
                                        $enwdate = new DateTime($leadfetch['leadDate']);
                                        $formatDate = $enwdate->format("d M Y");
                                        echo $formatDate;
                                        ?>
                                    </p>
                                </div>
                                
                        </div>
                    </div>                       
                        
                    
                </div>
                
            </div>
            
            <div class="row justify-content-center">
                
                
                <div class="col-lg-9 col-md-9 col-sm-12 mb-4 ">
                    
                    <div class=" card p-3 mb-4">
                        <div class='card-body '>
                           
                            <div class=" d-flex align-items-center justify-content-between">
                                <p class="fw-bold" style='font-size:24px'>Project Details</p>
                                <?php
                                // Assuming $leadfetch is your PHP variable
                                if (isset($leadfetch['purchased']) && $leadfetch['purchased'] == 1) {
                                    // If $leadfetch['purchased'] is 1, show "Already Bidden" anchor tag
                                    echo '<p class=" fw-bold fst-italic" style="display: inline-block;background-color: white;padding: 2px 10px;color: #23ca02;">Bid Placed</p>';
                                
                                } else {
                                    // If $leadfetch['purchased'] is empty or not set, show "Bid" anchor tag
                                    if ($username['is_buyer'] == 0) {
                                        echo '<a href="#" class="  sooprs-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Bid</a>';
                                    } elseif ($username['is_buyer'] == 1) {
                                        echo '<a href="#" class="  sooprs-btn" data-bs-toggle="modal" data-bs-target="#staticBackdropIs_buyer">Bid</a>';
                                    }
                                }
                                ?>
                            </div>                       
                       
                        
                            <div class="  mt-3">
                            

                            </div>

                            <div class="skill-set">
                                <p>
                                    <?php echo $leadfetch['service_name']; ?>
                                </p>
                            </div>

                            <p class="mt-3">
                                <h5><i class="fa-solid fa-file pe-2"></i>Description</h5>                            
                            </p>
                            <pre ><?php echo $leadfetch['description']; ?></pre>
                            <h5 class="mt-4"><i class="fa-solid fa-calendar-days me-2"></i>Created on:</h5>
                            <p >
                                <?php 
                                $enwdate = new DateTime($leadfetch['leadDate']);
                                $formatDate = $enwdate->format("d M Y");
                                echo $formatDate; 
                                ?>
                            </p>

                            <h5 class="mt-4"><i class="fa-solid fa-coins me-2"></i>Budget:</h5>
                            <p class="sooprs-budget">$
                                <?php echo $leadfetch['min_budget']; ?> - $
                                <?php echo $leadfetch['max_budget_amount']; ?> USD
                            </p>
                            <div class="mt-3">
                                <?php
                                // Assuming $leadfetch is your PHP variable
                                if (isset($leadfetch['purchased']) && $leadfetch['purchased'] == 1) {
                                    // If $leadfetch['purchased'] is 1, show "Already Bidden" anchor tag
                                    echo '<p class=" fw-bold fst-italic" style="    display: inline-block; background-color: white; padding: 2px 22px;color:#23ca02">Bid Placed</p>';
                                } else {
                                    // If $leadfetch['purchased'] is empty or not set, show "Bid" anchor tag
                                    if ($username['is_buyer'] == 0) {
                                        echo '<a href="#" class="  sooprs-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Bid</a>';
                                    } elseif ($username['is_buyer'] == 1) {
                                        echo '<a href="#" class=" sooprs-btn" data-bs-toggle="modal" data-bs-target="#staticBackdropIs_buyer">Bid</a>';
                                    }

                                }
                                ?>

                            </div>

                        </div>                      
                        
                    </div>

                    <div class="row">
                        <div class="col-lg-12 mb-4">
                            <?php 
                            if($allBids){
                            ?>
                            <div class="d-flex align-items-center mb-2">
                                <h4 class="mb-0">Proposals</h4>&nbsp; 
                                <span>
                                    (
                                    <?php 
                                    if($leadbidCount){
                                        echo $leadbidCount;
                                    }                                                                                 
                                    ?>                                    
                                    )
                                </span>
                            </div>
                            <?php 
                            }
                            ?>
                            
                            
                            <?php 
                            if($allBids){
                            
                            
                            foreach ($allBids as $bid){

                            ?>         
                            <div class="card mb-1">
                                <div class="card-body">                               
                                    <div class="row d-flex justify-content-evenly">  
                                        
                                        <div class="col-lg-8 d-flex ">
                                            <?php 
                                            if($bid['proImage'] != null || $bid['proImage'] != ''){
                                            ?>
                                                <img src="<?php echo $bid['proImage'] ?>" style="width: 70px; height: 70px;border-radius:50%"  alt="">
                                            <?php
                                            }else{
                                            ?>
                                            <div>
                                                <p class="proOnBid"><?php echo substr($bid['pro'],0,1) ?></p>
                                            </div>
                                            <?php 
                                            }
                                            
                                            ?>
                                            <div class="ms-3">
                                                <b ><?php echo $bid['pro'] ?></b>
                                                
                                                <p>
                                                    <i class="fa-solid fa-star" style="color: #F2BB16;"></i> 
                                                    <span style="font-size: 12px;">
                                                    <?php 
                                                    // $avgrating = ($bid['avgrating'] != null) ? $bid['avgrating']: 0;
                                                    echo $bid['avgrating'] 
                                                   
                                                    
                                                    ?> Ratings out of 5</span>
                                                </p>

                                                
                                                
                                                
                                                <!-- <p class=" mt-2 mb-2" style="font-size: 14px;color: dimgrey;"><?php echo $bid['description'] ?></p> -->
                                                <p class="mb-2 mt-2" style="font-size: 10px;color: dimgrey;"><?php
                                                    $datetime = new DateTime($bid['created_at']);
                                                    // Format the date in a custom format
                                                    $formatted_date = $datetime->format('d F,Y');
                                                        echo $formatted_date;                                                        
                                                    ?>
                                                </p>
                                            </div>
                                        </div> 
                                        <div class="col-lg-3 text-end order-first order-sm-1">
                                            
                                            <p class="fw-bold"> $ <?php echo $bid['amount'] ?></p>
                                        </div> 
                                            
                                                                                
                                        
                                    </div>   
                                </div>
                            </div>
                            <?php
                            }
                            }else{
                            ?>
                            <p style="text-align: center; margin-top: 20px;font-size: 15px;color: grey;"><span>Be the first one</span><span style="    color: orangered;"> to bid</span></p>
                            <?php 
                            }
                            ?>
                                
                            
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12 mb-4 ">
                    <div class="card " id="scrollBox">
                        <div class="card-body">
                            <div class="settings-heading">
                                <div class="mb-4">
                                    <h4  class='fs-6 fw-bold'>Client Details</h4>
                                    <hr class="mt-1">
                                    <p class="mb-2">
                                    <h4>
                                        <?php echo $leadfetch['name'] ?>
                                    </h4>
                                    </p>
                                    <p>                                       
                                    <img class='rounded-circle' style='width:1rem;' src='https://sooprs.com/assets/image/country.png' alt='flag-image'> &nbsp;<span >India </span>
                                        <!-- &nbsp;<span >
                                        <?php 
                                        if($leadOwner !== null){
                                            echo $leadOwner;
                                        }else{
                                            echo "<img class='rounded-circle' style='width:1rem;' src='https://res.cloudinary.com/dr4iluda9/image/upload/v1706079374/sooprs/flags/in_yqpafx.svg' alt='flag-image'> &nbsp;<span >India </span>";
                                        }
                                         ?></span> -->
                                    </p>
                                </div>
                                <div class="mb-4">
                                    <h4 class='fs-6 fw-bold'>Verification Details</h4>
                                    <hr class="mt-1">
                                    <p class="mb-1" style='font-size:14px'><img class="me-1" src="https://sooprs.com/assets/image/payment.png" alt="paymnet-verified">Payment verified&nbsp;<i class="fa-solid fa-circle-check" style="color: #23ca02;float: inline-end;"></i></p>

                                    <p class="mb-1" style='font-size:14px'><i class="fa-solid fa-address-card" style="    color: #006aff; margin-right: 8px; margin-left: 2px;font-size: 17px;"></i>Identity verified&nbsp;<i class="fa-solid fa-circle-check" style="color: #23ca02;float: inline-end;"></i></p>
                                    <p class="mb-1" style='font-size:14px'><img class="me-1" src="https://sooprs.com/assets/image/email.png" alt="email-verified">Email verified&nbsp;<i class="fa-solid fa-circle-check" style="color: #23ca02;float: inline-end;"></i></p>
                                    <p class="mb-1" style='font-size:14px'><i class="fa-solid fa-phone me-2" style="    color: #006aff;margin-right: 8px; margin-left: 2px;font-size: 17px;"></i>Mobile verified&nbsp;<i class="fa-solid fa-circle-check" style="color: #23ca02;float: inline-end;"></i></p>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                
            </div>
    </section>

    <section class="pb-5">
        <div class="container-fluid">
            <img src="<?php echo $SITE_URL ?>/assets/img/Group471.png" alt="" style="width:-webkit-fill-available">
        </div>
    </section>

    <?php include './footer.php'; ?>
    <!-- JavaScript Bundle with Popper -->

    <!-- Not professional notice modal  -->
    <div class="modal fade" id="staticBackdropIs_buyer" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header p-2">
                    <p class="" style="font-size:25px;"><i
                            class="fa-solid fa-circle-exclamation me-2  text-danger"></i>Alert</p>
                    <button type="button" class="btn-close modal_close_btn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body p-5">

                    <p class=" text-center" style="font-size:20px;"><b>You are not a professional.</b> </p>
                    <p class=" text-secondary text-center"> Switch your account to <b>professional</b> to Bid.</p>

                    <div class="text-center mt-3"><a href="#" class="sooprs-btn" id="switch_acc_btn">Switch Now</a>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">Enter Your Bid</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="myForm">
                        <div class="row">
                            <div class="col">

                                <input type="hidden" name="id" id="user_id" value="<?php echo $username['id'] ?>">

                                <div class="form-group mt-3 col-md-12 col-sm-12">
                                    <label for="form_amount">Amount <small>(in dollars)</small></label>
                                    <input class="form-control" id="amount" name="amount" type="number" step="1"
                                        required>
                                </div>

                                <div class="form-group mt-3 col-md-12 col-sm-12">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" type="text" name="description"
                                        required></textarea>
                                </div>

                                <div class="form-group mt-3 col-lg-12 col-md-12 col-sm-12">

                                    <input class="form-control" type="hidden" id="input_email" name="lead_id"
                                        value="<?php echo $leadfetch['id'] ?>" required>
                                </div>






                                <div class="form-group mt-3 text-center col-md-12 col-sm-12">
                                    <button type="submit" id="update-profile-btn" name="update-profile-btn"
                                        class=" sooprs-btn col-4 mx-auto " style="" >
                                        
                                        <span>Submit</span>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="loader-container" id="loader">
        <div class="loader">
            <img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1705386434/sooprs-svg_bseaya.svg' >

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

        var site__url = "<?php echo $SITE_URL; ?>";
        // Assuming you have a form element with the ID 'myForm'
        const form = document.getElementById('myForm');


        form.addEventListener('submit', (event) => {

            event.preventDefault();
            document.getElementById('update-profile-btn').disabled = true;
            showLoader();
            // Create a new FormData object and append form fields
            const formData = new FormData(form);

            // Make an AJAX request to upload the form data
            const xhr = new XMLHttpRequest();
            xhr.open('POST', site__url + '/api2/public/index.php/add_bid');

            xhr.onload = function () {
                if (xhr.status === 200) {

                    const response = JSON.parse(xhr.responseText);
                    if (response.status == 200) {
                        hideLoader();

                        toastr.success(response.msg, 'Success');
                        $('#staticBackdrop').modal('hide');
                        location.reload(true);
                    } else {
                        hideLoader();

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
        });
    </script>


    <script>
        // Switch now button 
        $("#switch_acc_btn").on("click", function () {
            let switchAccEmail = <?php echo json_encode($username['email']); ?>;

            $.ajax({
                url: site__url + '/api2/public/index.php/switch_account',
                method: "POST",
                data: { switchAccEmail: switchAccEmail },
                success: function (response) {
                    $('#staticBackdropIs_buyer').modal('hide');
                    toastr.success(response.msg, 'Success');
                    location.reload(true);
                }
            });
        });
    </script>

        

</body>

</html>

