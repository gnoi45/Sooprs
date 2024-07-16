<?php

session_start();
include_once 'function.php';
include_once 'env.php';



// Load the .env file
loadEnv(__DIR__ . '/.env');
$rzrpKey = $_ENV['RAZR_PAY_KEY'];




if (!isset($_SESSION['id']) || !$_SESSION['id'] || $_SESSION['loggedin'] != true) {
    $url = $SITE_URL.'/login-professional';
    header('Location: ' . $url);
    exit();
}

$urlPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$parts = explode('/', $urlPath);

$secondLastSegment = isset($parts[count($parts) - 2]) ? $parts[count($parts) - 2] : null;
$lastSegment = isset($parts[count($parts) - 1]) ? pathinfo($parts[count($parts) - 1], PATHINFO_FILENAME) : null;

$userCredentials = new DB_con();

$site_url = "//{$_SERVER['HTTP_HOST']}/";
$escaped_url = htmlspecialchars($site_url, ENT_QUOTES, 'UTF-8');

$username = $userCredentials->getUser($_SESSION['id'], 'join_professionals');
// print_r($username['is_buyer']);

$orderDetails = $userCredentials->getOrderDetail($secondLastSegment, $lastSegment);
$lead = $userCredentials->getleaddetail($secondLastSegment,$username['id']);
// print_r($lead);

$getChats = $userCredentials->getChats($lastSegment,$lead['id']);
// print_r($getChats);

$projectAssignedTo = $userCredentials->projectAssignedTo($secondLastSegment,$lastSegment);
$project_requirements = $userCredentials->projectRequirements($secondLastSegment);
$project_milestones = $userCredentials->projectMilestones($secondLastSegment);

// print_r("werty".$project_milestones);






$cut_id = $username['id'];

$title = 'Enquiry Details';
$description = "Description";
$keywords = "key,words";
?>

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

        .dropdown-menu .dropdown-item{
            font-size: 13px;"
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

        #user-pic-round {
            background: url('<?php echo $username['image'] == null ? '/sooprs/assets/img/images/user-placeholder-pic.webp': $username['image']; ?>') !important;
            background-size: cover !important;
            background-position: center !important;
            width: 30px;
            border-radius: 50%;
            height: 30px;
        }
    
    </style>

<style>
        .small-grey-text {
            font-size: 10px;
            color: darkgrey;
            margin: 0 5px;
        }

        .hr-lines {
            position: relative;
            /* max-width: 700px; */
            max-width: 444px;
            margin: 40px auto;
            text-align: center;
        }

        .hr-lines:before {
            content: " ";
            height: 2px;
            width: 90px;
            display: block;
            position: absolute;
            top: 50%;
            left: 0;
            background: darkgray;
        }

        .hr-lines:after {
            content: " ";
            height: 2px;
            width: 90px;
            display: block;
            position: absolute;
            top: 50%;
            right: 0;
            background: darkgray;
        }

        /* vertical status tracker  */



        .box {
            width: -webkit-fill-available;
            max-height: 50px;
            overflow: hidden;
            /* margin-bottom: 20px; */
            transition: max-height 0.5s ease;
            /* Add a smooth transition effect */
        }

        .expanded {
            /* max-height: 200px; */
            max-height: max-content !important;

            /* Set the expanded height */
        }

        @media (max-width: 992px) {
            .box {
                width: -webkit-fill-available;
                max-height: 104px;
                overflow: hidden;
                margin-bottom: 20px;
                transition: max-height 0.5s ease;

            }

            /* .box.expanded .box-content {
                display: block;
            } */
        }

        /* new vertical order status track */



        /* .education-parent {
            height: fit-content;
            position: sticky;
            top: 50px;
        } */

        .col-right-parent {
            height: fit-content;
            position: sticky;
            top: 50px;
        }
        .education__heading h4 {
            font-size: 1.5em;
            margin-block: 0.5rem;
        }

        .education__content {
            position: relative;
            padding: 1rem 1rem 1rem 4rem;
            /* cursor: pointer; */
            transition: background 0.3s ease-in-out;
        }

        .education__content h5 {
            color: rgba(0, 0, 0, 0.9);
            font-size: 1rem;
            margin-block: 0;
        }

        .education__content p {
            color: rgba(0, 0, 0, 0.6);
            font-size: 0.9rem;
            /* margin-block-start: 0.5rem; */
            margin: 0;
            margin-block-end: 0;
        }

        .education__content .year {
            position: absolute;
            content: var(--year);
            width: 2rem;
            aspect-ratio: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1rem;
            color: white;
            border-radius: 50%;
            /* background-color: #333; */
            box-shadow: inset 0 0 0 1px white;
            /* border: 1px solid #333; */
            left: 1rem;
            top: 0.74rem;
        }

        .education__content:hover {
            background-color: rgba(230, 230, 230, 0.48);
            border-radius: 0.25rem;
        }

        .education__content:not(:last-child):before {
            position: absolute;
            content: "";
            width: 3px;
            background-color: #333;
            left: calc(2rem - 2px);
            top: 2.16rem;
            bottom: -1.2rem;
            z-index: 1;
        }

        .education__content button{
            font-size:0.8rem;
        }

        .card{
            
            border: none!important;
        }

        .fa-circle{
            color: #74c0fc!important;
        }

        #milestones_approval{
            display: none;
        }
    </style>
    <?php include "header2.php" ?>


    <section class=" top-sectop mt-5" style="    background-color: #ffffff; ">
        <div class="container">
            <?php 
            if($project_requirements !== false && $username['is_buyer'] == 0){
            ?>
            <p class="text-info" style="font-size:0.8rem;" id="requirements_warning" >Client has submitted project requirements. <span style="cursor:pointer;text-decoration:underline;" onclick="expandBox()">Check now</span></p>
            <?php
            }
            ?>

            <?php 
            if($project_milestones === false){
            ?>
            <p class="text-warning" style="font-size:0.8rem;" id="milestones_approval" >Your approval is pending. <span style="cursor:pointer;text-decoration:underline;" data-bs-toggle="modal" data-bs-target="#milestonesModal" >Check now</span></p>
            <?php
            }
            ?>

            
            <div class="row justify-content-center">
                <div class="col-lg-9 mt-4">
                    
                    <div class="card mb-4" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px!important;">
                        <div class="card-body">
                           
                            <div class="row">
                                <div class="col-lg-1">
                                    <img src="<?php echo $SITE_URL ?>/assets/img/Group-268.png" alt="project-image" style="    width: 4rem;height:4rem;">
                                </div>
                                <div class="col-lg-7" style="    align-self: center;">
                                    <h1 style="font-size: 1.5em;text-transform:capitalize;"><?php echo $lead['project_title'] ?></h1>
                                    <!-- <p><span class="small-grey-text">Seller: ab_de_villiars </span> -->
                                    <span class="small-grey-text"><?php echo $lead['leadDate'] ?></span>

                                    <?php 
                                        if($orderDetails['order_id'] !== null){
                                    ?>
                                        <span class="small-grey-text">Order: <?php echo $orderDetails['order_id'] ?></span>

                                    <?php 
                                    }
                                    ?>
                                
                                </div>
                                <div class="col-lg-4" style="    align-self: center; font-size: 1.4em;    text-align: end;">
                                    <b>$ <?php echo $orderDetails['amount'] ?> </b>                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                    if($lead['project_status'] !== 0){
                        if($project_requirements !== false){
                    ?>
                    <div class="card mb-4" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px!important;">
                        <div class="card-body p-1">
                            <div class="row box" id="myBox">
                                <div class="col-lg-1 d-flex align-items-center ps-4">
                                   
                                    <i class="fa-solid fa-folder-closed" style="color: #74C0FC;font-size: 2em;"></i>
                                </div>
                                <div class="col-lg-8 ps-4" style=" align-self: center;">
                                    <b class="text-primary" style="font-size: 1em;">Project Requirements</b>
                                    <p class="text-secondary" style="font-size:0.8rem">You've filled out the requirements</p>

                                </div>
                                <div class="col-lg-3" style="    align-self: center;text-align: end;">
                                    <b class="text-success border-0 "
                                    onclick="expandBox()"
                                    style="font-size: 13px;    background: #c5ffc563;">Show Requirements&nbsp;<span><i class="fa-solid fa-caret-down" id="reqcaretIcon"></i></span></b>
                                </div>
                                <div class="box-content mt-3">
                                    <div class="text-end">
                                        <!-- <button   class="btn btn-sm btn-primary" > -->
                                        <?php 
                                        if($username['is_buyer'] == 1){
                                        ?>
                                            <i type="button" class="fa-solid fa-pen-to-square" title="Edit your requirements" data-bs-toggle="modal" data-bs-target="#requirementsModal"></i>
                                        <?php 
                                        }
                                        ?>
                                        <!-- </button> -->
                                    </div>
                                    <?php 
                                    if($project_requirements['file']){
                                    ?>
                                    <div class="p-2 mb-3 position-relative " style="    width: fit-content;">                                    
                                        <a class="" href="<?php echo $project_requirements['file']; ?>" target="_blank" style="font-size:0.8rem"> <i class="fa-solid fa-file-lines me-2" style="    font-size: 1.5rem;"></i> View Document </a>
                                        <i class="fa-solid fa-xmark position-absolute text-danger" style="right: -9px;top:0;" id="delete_project_file"></i>
                                    </div>
                                    <?php 
                                    }
                                    ?>
                                    <pre class="text-justify"><?php echo $project_requirements['description']; ?></pre>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <?php
                    }
                        else{
                            echo "<div class='card mb-4' style='box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px!important;'>
                            <div class='card-body p-1'>
                            <div class='row box' id='myBox'>
                                    <div class='col-lg-1 d-flex align-items-center justify-content-center'>
                                    
                                        <i class='fa-solid fa-folder-closed' style='color: #74C0FC;font-size: 2em;'></i>
                                    </div>
                                    <div class='col-lg-8' style=' align-self: center;'>
                                        <b class='text-primary' style='font-size: 1em;'>Project Requirements</b>
                                        <p class='text-danger' style='font-size:0.8rem'>Project requirements not uploaded yet.</p>

                                    </div>
                                    </div>
                            </div>
                            </div>";
                        }
                    }
                    ?>

                    
                    <div class="card mb-4" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px!important;">
                        <div class="card-body">
                            <div class="row" id="message_chat_box" style="height: 300px; overflow: hidden; overflow-y: scroll;">
                            <?php 
                            if($lead['project_status'] != 0){
                            ?> 
                            <div class="col-lg-12 mb-3  " style="    font-size: 0.8rem;">
                                <i>NOTE:</i><br>
                                <i>Discuss with each other and finalize the milestones of the project, so that the "Professional" will create them from his side.</i>
                                <br>
                                <br>
                                <i>For customer:</i> <br>
                                <i>1. Provide project requirements </i>
                            </div>
                            <?php 
                            }
                            ?>
                                <?php
                                if(!empty($getChats)){
                                    foreach($getChats as $key =>$chat){
                                
                                        $isEven = $key % 2 === 0;
                                        // Define styles based on even or odd index
                                        $backgroundStyle = $isEven ? 'box-shadow: rgb(116 192 252) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em;' : 'box-shadow: rgb(178 240 178) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em;';

                                        $user_image = $chat['pro_details']['image'];
                                        $user_image = $user_image ? $user_image : "https://sooprs.com/assets/img/images/user-placeholder-pic.webp";
                                        $justifyEnd = '';
                                        if($chat['pro_details']['id'] == $username['id']){
                                            $justifyEnd = 'justify-content-end';

                                        }
                                
                                ?>
                                
                                    <div class="col-lg-12 mb-3 d-flex align-items-center <?php echo $justifyEnd ?>">
                                        <div class="card" style='width:70%;'>
                                            <div class="card-body p-1" style="<?php echo $backgroundStyle; ?>">
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-2">
                                                        <img src="<?php echo $user_image ?>" alt="user-pic" style="    background-color: white; width: 40px; height: 40px;border-radius: 50%;">
                                                    </div>
                                                    <div class="col-lg-9">
                                                        <b>
                                                        <?php 
                                                        if($chat['cust_id']){
                                                            echo $chat['pro_details']['name'] ;

                                                        }else{
                                                            echo "Customer" ;
                                                        }
                                                        ?>
                                                        </b>
                                                        <p style="font-size: 0.8rem;"><?php echo $chat['message'] ?></p>
                                                       
                                                    </div>
                                                    <div class="col-lg-12 d-flex align-items-end justify-content-end">
                                                        <p class="m-0" style="    font-size: 10px;"><?php echo $chat['created_at'] ?></p>
                                                    </div>
                                                    
                                                </div>
                                                <?php 
                                                    if($chat['file']){
                                                ?>
                                                <div class="row">
                                                    <div class="col-lg-12 d-flex align-items-end justify-content-end">
                                                        <iframe src="<?php echo $SITE_URL ?>/assets/files/<?php echo $chat['file'] ?>" width="100%" height="200px"></iframe>
                                                    </div>
                                                </div>
                                                <?php 
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php                                
                                }
                                }else
                                {
                                ?>
                                <div class="col-lg-12 mb-3 d-flex align-items-center justify-content-center">
                                    <p style="    font-size: 2em;">Start your discussion here...</p>
                                </div>
                                <?php 
                                }
                                ?>


                                

                            </div>
                            <div class="row">
                            <div class="col-lg-12 mb-3" >
                                    <div class="text-center p-2"> <i class="fa-solid fa-arrows-rotate" onClick="reloadPage()" title="Refresh chat" style="cursor:pointer;"></i></div>
                                    <!-- <div class="card">
                                        <div class="card-body "> -->
                                            <div class=" ">
                                            <form class="m-0" id="chatBox" action="" method="post" enctype="multipart/form-data" style="    width: -webkit-fill-available;">
                                                <input type="hidden" name="cust_id" id="cust_id" value="<?php echo $username["id"] ?>" >
                                                <input type="hidden" name="bid_id" id="bid_id" value="<?php echo $lastSegment ?>" >
                                                <input type="hidden" name="lead_id" id="lead_id" value="<?php echo $secondLastSegment ?>" >
                                                

                                                

                                                <?php 
                                                if (isset($_SESSION['id'])) {
                                                    $profIdValue = ($_SESSION['is_buyer'] == 0) ? $lead['customer_id'] : $projectAssignedTo;
                                                ?>
                                                    <input type="hidden" name="prof_id" id="prof_id" value="<?php echo $profIdValue; ?>">
                                                <?php
                                                }
                                                ?>
                                                <input type="hidden" name="user_mile_id" id="user_mile_id" value="<?php echo $profIdValue ;?>" >


                                                <div class="d-flex align-items-center position-relative">
                                                    <textarea class="form-control mb-2"  name="message" id="message" cols="30" rows="2" placeholder="Type your message..." required></textarea>
                                                    <button id="attachFileButton" type="button" style="border: none; background: none;font-size: 1.3rem;position:absolute;right:25;">
                                                        <i class="fa-solid fa-paperclip"></i>
                                                    </button>
                                                </div>
                                                <input type="file" name="file" id="fileInput" class="form-control mb-2 d-none" >
                                                <div id="errorMessage" style="display: none; color: red;">Enter your message...</div>
                                                <div id="fileCount">No file(s) selected</div>
                                                <button type="submit" class="btn  btn-primary ps-4 pe-4" style="float:right;">Send&nbsp;&nbsp;<i class="fa-regular fa-paper-plane" style="color: #ffffff;"></i></button>
                                            </form>
                                            </div>
                                        <!-- </div>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <?php 
                if($lead['project_status'] != 0){
                ?> 

                <div class="col-lg-3">
                    <div class="col-right-parent">
                        <div class='education-parent d-flex justify-content-center'>
                            <div>
                                <div class='education mt-5'>
                                    <div class='education__heading'>
                                        <h4>Project status </h4>
                                    </div>
                                    <div class='education__content'>
                                        <p class="text-success">Project placed</p>
                                        <span class='year'><i class="fa-solid fa-circle-check text-success" ></i></span>
                        
                                    </div>
                                    <div class='education__content'>
                                        <!-- <p>Provide requirements</p> -->
                                        <span class='year'>
                        
                                            <?php
                                            if( $project_requirements !== false){
                                            ?>
                                            <i class="fa-solid fa-circle-check text-success" ></i>
                                            <?php
                                            }else{
                                            ?>
                                            <i class="fa-solid fa-circle" ></i>
                                            <?php
                                            }
                                            ?>
                                        </span>
                                        <?php
                                        if( $username['is_buyer'] == 1){
                                        ?>
                                        <div class='' id="requirementsAdd">
                                            <?php
                                            if( $project_requirements !== false){
                                            ?>
                                            <p class="text-success">Requirements Done</p>
                                            <?php
                                            }else{
                                            ?>
                                            <button style=""  type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#requirementsModal">
                                                Upload Project requirements
                                            </button>
                                            <?php
                                            }
                                            ?>
                        
                                        </div>
                                        <?php
                                        }else{
                                        ?>
                                            <p class="<?php echo ($project_requirements == false) ? "text-danger":"text-success" ?>" ><?php echo ($project_requirements == false) ? "Project Requirements":"Requirements Done" ?></p>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <div class='education__content'>
                                        <!-- <p>Add PMilestones </p> -->
                                        <span class='year'>
                                            <?php
                                            if( $project_milestones == 0){
                                            ?>
                                            <i class="fa-solid fa-circle" ></i>
                                            <?php
                                            }else{
                                            ?>
                                            <i class="fa-solid fa-circle-check text-success" ></i>
                                            <?php
                                            }
                                            ?>
                                        </span>
                        
                                        <div class='' id="milestoneAdd">
                                            <?php                                                
                                                if($project_milestones != 0 ){                                                    
                                            ?>

                                            <button  type="button"  class="btn btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#viewexampleModal" <?php echo ($project_requirements === false) ? 'disabled' : ''; ?> >
                                                View Milestones
                                            </button>

                                            <?php 
                                            }else{ 
                                                if($username['is_buyer'] == 0){                                                   
                                            ?>

                                            <button  type="button" id="add_milestone_button" class="btn btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal" <?php echo ($project_requirements === false) ? 'disabled' : ''; ?> >
                                                Add Milestones
                                            </button>

                                            <?php
                                            }else{                                           
                                           
                                            ?>

                                            <p class="">Milestones pending... </p>
                                            
                                            <?php
                                            }}
                                            ?>
                                        </div>
                        
                                    </div>
                                    <div class='education__content'>
                        
                                        <span class='year'>
                                        <?php
                                            if( $project_milestones == 0){
                                            ?>
                                            <i class="fa-solid fa-circle" ></i>
                                            <?php
                                            }else{
                                            ?>
                                            <i class="fa-solid fa-circle-check text-success" ></i>
                                            <?php
                                            }
                                            ?>
                                        </span>
                                        
                                        
                                        <?php
                                            if( $project_milestones == 0){
                                            ?>
                                            <p>Project in progress</p>
                                            <?php
                                            }else{
                                            ?>
                                            <p class="text-success">Project in progress</p>
                                            <?php
                                            }
                                            ?>
                                        </span>
                                       
                                        <!-- <p class="text-success">Project in progress</p> -->
                                       
                                    </div>
                                    <div class='education__content' id="review_the_project_parent">
                                        <span class='year'><i class="fa-solid fa-circle" ></i></span>

                                        <button class="btn btn-sm btn-primary" id="review_the_project" disabled data-bs-toggle="modal" data-bs-target="#review_the_project_modal">Review the project</button >
                        
                                    </div>
                                    <div class='education__content'>
                                        <p>Project delivered</p>
                                        <span class='year'><i class="fa-solid fa-circle" ></i></span>
                        
                                    </div>
                                </div>
                        
                        
                            </div>
                        </div>
                        <div>
                        <?php
                            if($project_milestones == 1) {
                        ?>
                        <strong >MILESTONES</strong>

                        <?php 
                            }
                        ?>
                        <div class="accordion accordion-flush mt-3" id="accordionFlushExample">
                            <!-- <div class="accordion-item">
                                <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Milestone
                                </button>
                                </h2>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">Placeholder content f</div>
                                </div>
                            </div>
                             -->
                        </div>
                        </div>
                    </div>
                </div>

                <?php
                }
                ?> 
            </div>
        </div>
    </section>


    <img src="<?php echo $SITE_URL ?>/assets/img/Group471.png" alt="" style="width:100%; height:auto;" srcset="">

    <!-- Content body end  -->



    <?php include './footer.php'; ?>

    <!-- JavaScript Bundle with Popper -->


    <div class="modal fade" id="postReviewModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="postReviewModalLabel" aria-hidden="true">
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
                        <input type="hidden" name="customer_id" id="customer_id" value='<?php echo $username["id"] ?>'>
                        <!-- <input type="hidden" name="lead_id" id="lead_id" value='<?php echo $lead["id"] ?>'> -->



                            <div class="form-group mb-3">
                                <input type="hidden" name="user_name" id="user_name" class="form-control" placeholder="Enter Your Name" value='<?php echo $username["name"] ?>' />
                            </div>
                            
                            <div class="form-group mb-3">
                                <textarea name="user_review" id="user_review" class="form-control" placeholder="Type Review Here"></textarea>
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
                                <button type="button" class="btn btn-success btn-sm" id="save_review">Submit</button>
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

    <!-- Milestone modal  -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Milestone</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <div class="card">
                        <div class="card-body">
                        <div class=""><button onclick="addfaqs();" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> </button></div>
                            
                            <form id="addMilestoneForm">
                                <div class="table-responsive">
                                    <table id="faqs" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Milestone name</th>
                                                <th>Amount (US $)</th>
                                                <th>Deadline </th>
                                                <th>Remark </th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" class="form-control milestone_name" placeholder="Name" required></td>
                                                <td><input type="text" placeholder="Amount" class="form-control amount" required></td>
                                                <td class="text-warning mt-10"> <input type="date" id="date" min="" placeholder="Deadline" class="form-control deadline" required></td>
                                                <td class="text-warning mt-10"> <input type="text" placeholder="Remark" class="form-control remark"></td>
                                                <td class="mt-10"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <button id="addMilestone" type="button" class="btn btn-success btn-sm">Save </button>
                            </form>
                        </div>
                    </div>
            </div>
            
            </div>
        </div>
    </div>


    <!-- view milestones  -->
    <?php 
    if($project_milestones !== 0){        
    ?>
    <div class="modal fade" id="viewexampleModal" tabindex="-1" aria-labelledby="viewexampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="viewexampleModalLabel">Milestones</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                        <?php 
                        if($username['is_buyer'] == 0){        
                        ?>
                        <div class=""><button onclick="editfaqs();" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> </button></div>          
                        <?php 
                        }
                        ?>
                            <form >
                                <div class="table-responsive">
                                    <table id="editfaqs" class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Milestone name</th>
                                                <th>Amount (US $)</th>
                                                <th>Deadline </th>
                                                <th>Remark </th>
                                                <?php 
                                                if($username['is_buyer'] == 0){        
                                                ?>
                                                <th>Status</th>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach($project_milestones['allMilestones'] as $pm){
                                            ?>
                                            <tr>
                                                <td><input type="text" class="form-control milestone_name" placeholder="Name" value="<?php echo $pm['milestone_name']; ?>" <?php echo $username['is_buyer'] == 1 ? 'disabled':'' ?> required></td>
                                                <td><input type="text" placeholder="Amount" class="form-control amount" value="<?php echo $pm['milestone_amount']; ?>" <?php echo $username['is_buyer'] == 1 ? 'disabled':'' ?> required></td>
                                                <td class="text-warning mt-10"> <input type="date" id="date" min="" placeholder="Deadline" class="form-control deadline" value="<?php echo $pm['milestone_deadline']; ?>" <?php echo $username['is_buyer'] == 1 ? 'disabled':'' ?> required></td>
                                                <td class="text-warning mt-10"> <input type="text" placeholder="Remark" class="form-control remark" value="<?php echo $pm['remark']; ?>" <?php echo $username['is_buyer'] == 1 ? 'disabled':'' ?>></td>
                                                <?php 
                                                if($username['is_buyer'] == 0){        
                                                ?>
                                                <td class="mt-10"><button class="btn btn-danger btn-sm" <?php echo $username['is_buyer'] == 1 ? 'disabled':'' ?>><i class="fa fa-trash"></i> </button></td>
                                                <?php
                                                }
                                                ?>
                                            </tr>
                                            <?php 
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php 
                                if($username['is_buyer'] == 0){        
                                ?>
                                <button id="editMilestone" type="button" class="btn btn-success btn-sm">Save </button>
                                <?php 
                                }else{
                                    if($project_milestones['is_accepted'] !== true){
                                ?>
                                 <button id="acceptMilestones" type="button" class="btn btn-success btn-sm">Accept </button>
                                 <button id="rejectMilestones" type="button" class="btn btn-danger btn-sm">Reject </button>

                                <?php
                                }}
                                ?>

                            </form>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>
    </div>
    <?php 
    }
    ?>
    <!-- requirements modal  -->
    <div class="modal fade" id="requirementsModal" tabindex="-1" aria-labelledby="requirementsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Project requirements</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">            
                                                  
                <form  id="requirementsForm" style="    width: -webkit-fill-available;" enctype="multipart/form-data">
                    <input type="hidden" name="project_id" id="project_id" value="<?php echo $secondLastSegment ?>">
                    <div class="mb-3">
                        <label for="description" >Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="description" id="description" id="" cols="30" rows="5" required><?php if($project_requirements !== false){ echo $project_requirements['description'];}?></textarea>
                    </div>
                    <!-- <label for="file">Attach file</label> -->
                    <input class="form-control" type="file" value="" name="file" id="file" style="font-size:smaller">
                    
                    <div class="text-end mt-2"><button id="addRequirements" type="button" class="btn btn-success btn-sm">Save </button></div>
                </form>
                        
            </div>
            
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

    <!-- milestones Modal -->
    <div class="modal fade" id="milestonesModal" tabindex="-1" aria-labelledby="milestonesModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h1 class="modal-title fs-5" id="milestonesModalLabel">Modal title</h1> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                            <th class="d-none" >Milestone Id</th>
                            <th>Name</th>
                            <th>Amount </br> (in US $)</th>
                            <th>Deadline</th>
                            <th>Remark</th>                    
                            <!-- Add more headers if needed -->
                            </tr>
                        </thead>
                        <tbody id="responseBody">
                            <!-- Response data will be populated here -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button"  class="btn btn-danger mile_stone_id" data-status="0"  data-id = "">Reject</button>
                    <button type="button"  class="btn btn-success mile_stone_id" data-status="1"  data-id = "">Approve</button>

                </div>
            </div>
        </div>
    </div>

     <!-- milestone payment Modal -->
     <div class="modal fade" id="milestonePaymentModal" data-bs-backdrop="static" tabindex="-1" aria-labelledby="milestonePaymentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h1 class="modal-title fs-5" id="milestonePaymentModalLabel">Modal title</h1> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <div class="text-center"><i class=" fa-solid fa-circle-exclamation text-center text-warning" style="    font-size: 4em;"></i></div>

                    <div class="text-center" id="milestone_pending">
                        
                    </div>  
                    <form id="myForm" style="    width: -webkit-fill-available;">
                        <div class="row justify-content-center">
                            <div class="col-md-6">
                                <input type="hidden" name="id" id="user_id" value="<?php echo $username['id'] ?>">
                                <input type="hidden" name="mid" id="mid" value="">

                                <div class="form-group mt-3 col-md-12 col-sm-12 d-flex align-items-center">
                                    <label for="form_amount">Amount  </label>
                                    <input class="form-control" id="form_amount" type="number" placeholder="Write amount in INR" name="amount"  value=""  required>
                                </div>
                                <div class="form-group mt-3 col-lg-12 col-md-12 col-sm-12">                                    
                                    <input class="form-control" type="hidden" id="form_email" name="email" value="<?php echo $username['email']?>">
                                </div>
                                <div class="form-group mt-3 text-center col-md-12 col-sm-12">
                                    <button type="submit" id="update-profile-btn"  name="update-profile-btn"  class="btn  btn-primary btn-sm  col-4 mx-auto rounded-0" style="">
                                        <span>Pay</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>                  
                </div>
                <!-- <div class="modal-footer">
                    <button type="button"  milestoneidLong="" mid=""     class="btn btn-success btn-sm" >Pay</button>
                    
                </div> -->
            </div>
        </div>
    </div>

    <div class="modal fade" id="completeMilestoneBtnModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="    align-self: end;">
                    <button type="button" class="btn-close" id="btn-close"  aria-label="Close" onclick="closeModal()"></button>

                </div>
                <div class="modal-body">
                <div class="text-center"><i class=" fa-solid fa-circle-exclamation text-center text-warning" style="    font-size: 4em;"></i></div>
                <h1 class="modal-title fs-3 pt-3 pb-3 text-center" id="exampleModalLabel">Are you sure?</h1>

                    <p class="mb-2 text-secondary text-center">Do you want to mark this milestone as completed?</p>
                    <div class="d-flex justify-content-evenly align-items-center p-4">
                        <button class="btn btn-success ps-4 pe-4 pt-1 pb-1" id="alertYes">YES</button>
                        <button class="btn btn-danger  ps-4 pe-4 pt-1 pb-1" id="alertNo">NO</button>
                    </div>

                </div>

            </div>
        </div>
    </div>

    
    <div class="modal fade" id="review_the_project_modal" tabindex="-1" aria-labelledby="review_the_project_modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="    align-self: end;">
                    <button type="button" class="btn-close" id="btn-close"  aria-label="Close" onclick="closeModal()"></button>
                </div>
                <div class="modal-body">
                    <div class="text-center"><i class=" fa-solid fa-circle-exclamation text-center text-warning" style="    font-size: 4em;"></i></div>
                    <h1 class="modal-title fs-3 pt-3 pb-3 text-center" id="review_the_project_modalLabel">Are you sure?</h1>

                    <p class="mb-2 text-secondary text-center">Do you want to mark this project as reviewed?</p>
                    <div class="d-flex justify-content-evenly align-items-center p-4">
                        <button class="btn btn-success ps-4 pe-4 pt-1 pb-1" id="alertYesReviewProject">YES</button>
                        <button class="btn btn-danger  ps-4 pe-4 pt-1 pb-1" id="alertNoReviewProject">NO</button>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Loader  -->
    <div class="loader-container" id="loader">
        <div class="loader">
        <img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1705386434/sooprs-svg_bseaya.svg'  >

        </div>
    </div>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    
    
    

    <script>
        const secretKey = "<?php echo $_ENV['RAZR_PAY_KEY']; ?>";
        showLoader();                

        let amount;
        var options = 
        {
            "key": secretKey, // Enter the Key ID generated from the Dashboard
            "amount": 100,
            "currency": "INR",
            "description": "Techninza",
            "image": "https://res.cloudinary.com/dr4iluda9/image/upload/v1691132151/sooprs/sooprs_logo_blue_side2_flxyxx.png",
            "prefill":
            {
            "email": '',
            "contact": +919900000000,
            },
            config: {
                display: {
                    blocks: {
                        utib: 
                        { //name for Axis block
                            name: "Pay using Axis Bank",
                            instruments: 
                            [
                                {
                                    method: "card",
                                    issuers: ["UTIB"]
                                },
                                {
                                    method: "netbanking",
                                    banks: ["UTIB"]
                                },
                            ]
                        },
                        other:
                        { //  name for other block
                            name: "Other Payment modes",
                            instruments: 
                            [
                                {
                                    method: "card",
                                    issuers: ["ICIC"]
                                },
                                {
                                    method: 'netbanking',
                                }
                            ]
                        }
                    },
                    
                    sequence: ["block.utib", "block.other"],
                    preferences: {
                    show_default_blocks: true // Should Checkout show its default blocks?
                    }
                }
            },
            "handler": function (response) {
            saveData(response.razorpay_payment_id);
            },
            "modal": {
            "ondismiss": function () {
                if (confirm("Are you sure, you want to close the form?")) {
                txt = "You pressed OK!";
                console.log("Checkout form closed by the user");
                } else {
                txt = "You pressed Cancel!";
                console.log("Complete the Payment")
                }
                }
            }
        };


        let pform = document.getElementById('myForm');
        pform.addEventListener('submit', (event) =>{      
            event.preventDefault();
            let formData = new FormData(pform);    

            if(document.getElementById('mid').value == null || document.getElementById('mid').value == ''){
                
                // alert("Wait for the previous phase to complete.");
                toastr.error("Wait for the previous phase to complete.");

            }else{

                // Set email and contact from form data
                options.prefill.email = formData.get('email');
                
                amount = formData.get('amount');
                // mid = formData.get('mid');
        
                // options.prefill.contact = formData.get('contact');
                options.amount = amount*100*83;
                var rzp1 = new Razorpay(options);
                rzp1.open();
            }
            
        });

        let saveData = (payment_id) => {

            const xhr = new XMLHttpRequest();        
            let formData = new FormData();
            formData.append('amount', document.getElementById('form_amount').value);
            formData.append('mid', document.getElementById('mid').value);
            formData.append('user_id', document.getElementById('user_id').value);
            formData.append('payment_id', payment_id);

            

            xhr.open('POST', site_url+'/api2/public/index.php/update_wallet_milestone_payment');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if(response.status == 200){

                        toastr.success('Payment Successful', 'Success'); 
                        // let user_credits = document.getElementById('user_credits');
                        // let sidebar_credits = document.getElementById('sidebar_credits');

                        // user_credits.innerHTML = response.msg;
                        // sidebar_credits.innerHTML = response.msg;
                        location.reload();
                        
                    }else{
                        toastr.error(response.msg, 'Error');
                    }
                    
                } else {
                    // Request failed
                    console.error('Error uploading form:', xhr.status, xhr.statusText);
                }
            };

            xhr.onerror = function() {
                console.error('Network error occurred');
            };

            // Send the FormData object with the XMLHttpRequest
            xhr.send(formData);
        }
    </script>
   

    <script>
       

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
        let form = document.getElementById('chatBox');
        let errorMessage = document.getElementById('errorMessage');
        form.addEventListener('submit', (event) => {
            
            event.preventDefault();
            var message_chat  = document.getElementById('message');
            if(message_chat === ""){
                errorMessage.style.display = 'block';
            }else{
                errorMessage.style.display = 'none';
            }


            showLoader();                

            var form1 = new FormData(form);
            // console.log(form1);
            let myselfName = "<?php echo $username['name'] ?>";
            var message_chat_box  = document.getElementById('message_chat_box');

            var newMessage = document.createElement('div');
            newMessage.className = 'col-lg-12 mb-3';

            let user_image = "<?php echo $username['image'] ?>";
            user_image =user_image ? user_image : "https://sooprs.com/assets/img/images/user-placeholder-pic.webp";
            

            var currentDate = new Date();                
            var year = currentDate.getFullYear();
            var month = currentDate.getMonth() + 1; // Months are zero-indexed, so add 1
            var day = currentDate.getDate();
            var hours = currentDate.getHours();
            var minutes = currentDate.getMinutes();
            var seconds = currentDate.getSeconds();                
            var formattedDateTime = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;

            

            newMessage.innerHTML = `
            <div class="col-lg-12 mb-3 d-flex align-items-center justify-content-end">
                <div class="card " style='width:70%;box-shadow: rgb(178 240 178) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em;'>
                    <div class="card-body p-1" style="">
                        <div class="row justify-content-center">
                            <div class="col-lg-2 col-md-2">
                                <img src="${user_image}" alt="user-pic" style="background-color: white;width: 40px;height: 40px;border-radius: 50%;">
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <b>${myselfName}</b>
                                <p style="font-size: 0.8rem;">${form.elements['message'].value}</p>                                
                            </div>
                            <div class="col-lg-12 d-flex align-items-end justify-content-end">                                    
                                <p class='m-0' style='font-size: 10px;'>${formattedDateTime}</p>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            `;

            message_chat_box.appendChild(newMessage);
            message_chat_box.scrollTop = message_chat_box.scrollHeight;
            form.reset();


            fetch('<?php echo $SITE_URL; ?>/api2/public/index.php/customerProfChat', {
                method: 'POST',
                body: form1, 
            })
            .then(response => response.json())
            .then(data => {
                // var jsonResp = JSON.parse(data);
                if(data.status == 200){   
                    hideLoader();
                    toastr.success(data.msg);
                }
                else {                    
                    hideLoader();
                    toastr.error(data.msg);
                    setTimeout(function(){
                        location.reload();
                    },2000);  
                } 
            })
            .catch(error => {
                hideLoader();
                console.error('Error:', error);
            });
        })
    </script>

    <script>
        // Get the current date
        var currentDate = new Date();
        // Convert the current date to the format "YYYY-MM-DD"
        var currentDateString = currentDate.toISOString().split('T')[0];
        console.log("current date "+currentDateString);
    </script>



    <script>
        function expandBox() {
            var box = document.getElementById('myBox');
            var icon = document.getElementById('reqcaretIcon');
            // Toggle the 'expanded' class on the box
            box.classList.toggle('expanded');
            box.classList.toggle('bg-light');
            icon.classList.toggle('fa-caret-down');
            icon.classList.toggle('fa-caret-up');
            
        }
    </script>


    <script>
        var faqs_row = 0;
        function addfaqs() {
        html = '<tr id="faqs-row' + faqs_row + '">';
            html += '<td><input type="text" class="form-control milestone_name" placeholder="Milestone name" required></td>';
            html += '<td><input type="text" placeholder="Amount" class="form-control amount" required></td>';
            html += '<td class="text-danger mt-10"> <input type="date" id="date" min="" placeholder="Deadline" class="form-control deadline" required></td>';
            html += '<td class="text-danger mt-10"> <input type="text" placeholder="Remark" class="form-control remark"></td>';
            html += '<td class="mt-10"><button class="btn btn-danger btn-sm" onclick="$(\'#faqs-row' + faqs_row + '\').remove();"><i class="fa fa-trash"></i> </button></td>';

            html += '</tr>';

        $('#faqs tbody').append(html);

        faqs_row++;
        }
    </script>

<script>
        var faqs_row_edit = 0;
        function editfaqs() {
        html = '<tr id="faqs-row_edit' + faqs_row_edit + '">';
            html += '<td><input type="text" class="form-control milestone_name" placeholder="Milestone name" ></td>';
            html += '<td><input type="text" placeholder="Amount" class="form-control amount" ></td>';
            html += '<td class="text-danger mt-10"> <input type="date" id="date" min="" placeholder="Deadline" class="form-control deadline" ></td>';
            html += '<td class="text-danger mt-10"> <input type="text" placeholder="Remark" class="form-control remark"></td>';
            html += '<td class="mt-10"><button class="btn btn-danger btn-sm" onclick="$(\'#faqs-row_edit' + faqs_row_edit + '\').remove();"><i class="fa fa-trash"></i> </button></td>';

            html += '</tr>';

        $('#editfaqs tbody').append(html);

        faqs_row_edit++;
        }
    </script>

    <script>

        
        $(document).ready(function() {

            let alertYes = document.getElementById("alertYes");
            let alertNo = document.getElementById("alertNo");

                let usertype = <?php echo $_SESSION['is_buyer'] ?>;
                console.log("user type = "+ usertype);
                var lead_id = $("#lead_id").val();

                // --------------------  Add milestones start ---------------------
                $('#addMilestone').on('click', function() {

                    if(validateAddMilestonesInputs()){

                        showLoader();
                        var formData = [];
                        var totalAmountCheck = 0;
                        $('#faqs tbody tr').each(function() {
                            var milestone_name = $(this).find('.milestone_name').val();
                            var amount = parseFloat($(this).find('.amount').val());
                            totalAmountCheck += amount;
                            var deadline = $(this).find('.deadline').val();
                            var remark = $(this).find('.remark').val();
    
                            var user_id = "<?php echo $_SESSION['id'] ?>";
                            // var bidId = document.getElementById("bid_id").value;
                            var leadId = document.getElementById("lead_id").value;
    
                            formData.push({ milestone_name: milestone_name, amount: amount, deadline: deadline,remark: remark,user_id: user_id,leadId:leadId });
                        });
                        console.log("amount: "+totalAmountCheck);
    
                        if(totalAmountCheck !== <?php echo  $orderDetails['amount'] ?>){
                            console.log("amount not equal");
                            $('#exampleModal').find('.btn-close').click();
                            hideLoader();
                            toastr.error("Milestones amount is not as per the budget", 'Error');
    
                        }else{
    
                            var user_id = "<?php echo $_SESSION['id'] ?>";
                            var leadId = document.getElementById("lead_id").value;
        
        
                            $.ajax({
                                url: site_url+"/api2/public/index.php/add_milestone",
                                method: 'POST',
                                data: { formData: formData,user_id:user_id,leadId:leadId },
                                success: function(response) {
                                    // Handle success response
                                    var new_data = JSON.parse(response);
                                    if(new_data.status == 200){
                                        $('#exampleModal').find('.btn-close').click();
                                        $('#add_milestone_button').attr('data-bs-target', '#viewexampleModal')
                                                                    .text('View milestones')
                                                                    .removeAttr('id');
    
                                        hideLoader();
                                        toastr.success(new_data.msg, 'Success');
                                        location.reload();
                                    }else{
                                        hideLoader();
                                        toastr.error(new_data.msg, 'Error');
                                        location.reload();
    
                                    }                       
        
                                },
                                error: function(xhr, status, error) {
                                    // Handle error
                                }
                            });
                        }
                    }else{
                        toastr.error("Please fill all required fields.");
                    }

                });
                // --------------------  Add milestones end ---------------------

                // edit milestones start
                $('#editMilestone').on('click', function() {
                    showLoader();
                    var formData = [];
                    var totalAmountCheckAtEdit = 0;
                    $('#editfaqs tbody tr').each(function() {
                        var milestone_name = $(this).find('.milestone_name').val();
                        var amount = parseInt($(this).find('.amount').val());
                        totalAmountCheckAtEdit += amount;
                        var deadline = $(this).find('.deadline').val();
                        var remark = $(this).find('.remark').val();

                        var user_id = "<?php echo $_SESSION['id'] ?>";
                        // var bidId = document.getElementById("bid_id").value;
                        var leadId = document.getElementById("lead_id").value;

                        formData.push({ milestone_name: milestone_name, amount: amount, deadline: deadline,remark: remark,user_id: user_id,leadId:leadId });
                    });
                    console.log("amount: "+totalAmountCheckAtEdit);

                    if(totalAmountCheckAtEdit !== <?php echo  $orderDetails['amount'] ?>){
                        console.log("amount not equal");
                        $('#exampleModal').find('.btn-close').click();
                        toastr.error("Milestones amount is not as per the budget", 'Error');

                    }else{

                        var user_id = "<?php echo $_SESSION['id'] ?>";
                        var leadId = document.getElementById("lead_id").value;
    
    
                        $.ajax({
                            url: site_url+"/api2/public/index.php/edit_milestone",
                            method: 'POST',
                            data: { formData: formData,user_id:user_id,leadId:leadId },
                            success: function(response) {
                                // Handle success response
                                var new_data = JSON.parse(response);
                                if(new_data.status == 200){
                                    $('#viewexampleModal').find('.btn-close').click();
                                    $('#edit_milestone_button').prop('disabled',true);
                                    hideLoader();
                                    toastr.success(new_data.msg, 'Success');
                                }else{
                                    hideLoader();
                                    toastr.error(new_data.msg, 'Error');
                                }                       
    
                            },
                            error: function(xhr, status, error) {
                                // Handle error
                            }
                        });
                    }

                });
                // edit milestones end


                // accept or reject milestones start                
                $('#acceptMilestones').click(function() {  
                    showLoader();                    

                    let mile_update = new FormData();
                    mile_update.append('project_id',lead_id);                   

                    $.ajax({
                        url: site_url + "/api2/public/index.php/acceptMilestones",
                        method: 'POST',
                        data: mile_update,
                        processData: false, // important to prevent jQuery from transforming data into a query string
                        contentType: false, // important for letting jQuery not to set contentType
                        success: function(response) {
                            // Handle success response                    
                            var new_data = JSON.parse(response);  
                            if(new_data.status == 200){
                                $('#viewexampleModal').find('.btn-close').click();
                                $("#add_milestone_button").html("Milestones accepted");
                                
                                hideLoader();
                                toastr.success(new_data.msg); 
                                location.reload();
                            }                
                        },
                        error: function(xhr, status, error) {
                            hideLoader();

                            // Handle error
                        }
                    });

                });
                // accept or reject milestones end                



                // remove accept reject button once accepted
                



                // checking if user uplaoded his milestones 
                var cust_id = $("#cust_id").val();
                var authMile = new FormData();
                authMile.append('lead_id', lead_id);
                authMile.append('cust_id', cust_id);
                // console.log(lead_id,cust_id);
                $.ajax({
                    url: site_url+"/api2/public/index.php/auth_user_milestones",
                    method: 'POST',
                    data: authMile,
                    processData: false, // Important: Don't process data (already in FormData)
                    contentType: false, // Important: Don't set content type (will be set by FormDa
                    success: function(response) {
                        // Handle success response
                        var new_data = JSON.parse(response);
                        if(new_data.status == 200){

                            if (new_data.msg === true) {
                                // Disable the button
                                $('#add_milestone_button').prop('disabled', true);
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                    }
                });



                let requirementsForm = document.getElementById('requirementsForm');
                $('#addRequirements').on('click', function() {

                    if (validateInputs()) {

                        showLoader();
                        var formReq = new FormData($("#requirementsForm")[0]); // Using the form directly   
    
                        $.ajax({
                            url: site_url + "/api2/public/index.php/add_requirements",
                            method: 'POST',
                            data: formReq,
                            processData: false, // important to prevent jQuery from transforming data into a query string
                            contentType: false, // important for letting jQuery not to set contentType
                            success: function(response) {
                                // Handle success response
                                var new_data = JSON.parse(response);
                                $('#requirementsModal').find('.btn-close').click();
                                if(new_data.status == 400){
                                    toastr.error(new_data.msg); // Changed `data` to `response`
                                }else{
                                    toastr.success(new_data.msg); // Changed `data` to `response`
                                }
                                setTimeout( function(){
                                    location.reload();
                                },2000);
    
                            },
                            error: function(xhr, status, error) {
                                // Handle error
                            }
                        });
                    }else{
                        toastr.error("Please fill all required fields.");
                    }
                });



            
                var user_mile_id = $("#prof_id").val();
                var formMile = new FormData();
                formMile.append('lead_id', lead_id);
                formMile.append('user_mile_id', user_mile_id);
                $.ajax({
                    url: site_url + "/api2/public/index.php/get_milestones",
                    method: 'POST',
                    data: formMile,
                    processData: false, // important to prevent jQuery from transforming data into a query string
                    contentType: false, // important for letting jQuery not to set contentType
                    success: function(response) {
                        // Handle success response                    
                        var new_data = JSON.parse(response);  
                        if(new_data.status == 200){
                            // console.log(new_data.msg.milestones);
                            // $('.mile_stone_id').data('id',new_data.msg.milestone_id);
                            $('.mile_stone_id').attr('data-id', new_data.msg.milestone_id);
                            var html = '';
                            new_data.msg.milestones.forEach(function(item) {
                                html += '<tr>';
                                html += '<td>' + item.milestone_name + '</td>';
                                html += '<td>' + item.milestone_amount + '</td>';
                                html += '<td>' + item.milestone_deadline + '</td>';
                                html += '<td>';
                                html += item.remark !== null ? item.remark : ''; // Append remark if not null, otherwise append an empty string
                                html += '</td>';
                                html += '</tr>';
                            });
                            $('#responseBody').html(html);
                            $("#milestones_approval").show();
                        }                
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                    }
                });

                

                
                $('.mile_stone_id').click(function() {  
                    showLoader();         
                    // Get the data-id value of the clicked button
                    var dataIdValue = $(this).attr('data-id');  
                    var dataIdStatus = $(this).attr('data-status');    

                    let mile_update = new FormData();
                    mile_update.append('milestone_id',dataIdValue);
                    mile_update.append('milestone_status',dataIdStatus);

                    $.ajax({
                        url: site_url + "/api2/public/index.php/update_milestones_status",
                        method: 'POST',
                        data: mile_update,
                        processData: false, // important to prevent jQuery from transforming data into a query string
                        contentType: false, // important for letting jQuery not to set contentType
                        success: function(response) {
                            // Handle success response                    
                            var new_data = JSON.parse(response);  
                            if(new_data.status == 200){
                                $('#milestonesModal').find('.btn-close').click();
                                $("#add_milestone_button").html("Milestones accepted");
                                hideLoader();
                                toastr.success(new_data.msg); 
                                location.reload();
                            }                
                        },
                        error: function(xhr, status, error) {
                            hideLoader();

                            // Handle error
                        }
                    });

                });



                // final accepted milestone 
                var finalMilestone = new FormData();
                finalMilestone.append('lead_id', lead_id);

                $.ajax({
                    url: site_url + "/api2/public/index.php/get_final_milestones",
                    method: 'POST',
                    data: finalMilestone,
                    processData: false, // important to prevent jQuery from transforming data into a query string
                    contentType: false, // important for letting jQuery not to set contentType
                    success: function(response) {
                        // Handle success response                    
                        var new_data = JSON.parse(response);  
                        if(new_data.status == 200){
                            console.log(new_data.msg);
                            console.log("current date "+currentDateString);

                            // console.log(new_data.msg.milestones);
                            // $('.mile_stone_id').data('id',new_data.msg.milestone_id);
                            $('.mile_stone_id').attr('data-id', new_data.msg.milestone_id);
                            var html = '';
                            new_data.msg.milestones.forEach(function(item) {
                            console.log("deadline date "+item.milestone_deadline);
                                
                                
                                html += '<div class="accordion-item mb-1" datamilestoneid="' + item.milestone_id + '">';
                                html += '<h2 class="accordion-header">';
                                html += '<button class="accordion-button collapsed p-2" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse'+ item.id +'" aria-expanded="false" aria-controls="flush-collapseOne" style="    background: #d3d3d36b;">';
                                html += '<p class="text-capitalize" style="    font-size: 0.9rem;">' + item.milestone_name + (item.payment_status == 0 ? '  (Pending)' : (item.is_completed == 0 ? '  (In-progress)' : '  (Completed)'))+'</p>';
                                html += '</button>';
                                html += '</h2>';
                                html += '<div id="flush-collapse'+ item.id +'" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">';
                                html += '<div class="accordion-body p-0">';

                                html += '<div class="pt-1 mb-1" style="">';
                                html += '<p style="font-size:0.8rem"><span style="font-size:0.7rem">Amount</span> : $' + item.milestone_amount + '</p>';                            
                                html += '</div>';

                                html += '<div class=" mb-1" style="">';
                                html += '<p style="font-size:0.8rem"><span style="font-size:0.7rem">Deadline</span> : ' + item.milestone_deadline + '</p>';                            
                                html += '</div>';

                                html += '<div class="" style="">';
                                html += '<p style="font-size:0.8rem"><span style="font-size:0.7rem">Remark</span> : ' + item.remark + '</p>';                            
                                html += '</div>';

                                // if (usertype == 1 ) {
                                    html += '<div class=" d-flex" >';
                                    if(item.payment_status == 0){
                                        html += '<p class="" style="font-size:0.8rem;width:50%"><span style="font-size:0.7rem">Payment status</span> : </p><button class="bg-success   ps-2 pe-2 text-white border border-0 " style="font-size:0.8rem;width:50%"  data-bs-toggle="modal" data-bs-target="#milestonePaymentModal">Pay</button>';                            
                                    }
                                    else{                                        
                                        html += '<p class="" style="font-size:0.8rem;width:50%"><span style="font-size:0.7rem">Payment status</span> : </p><p class="text-white fw-bold bg-success text-center" style="font-size:0.8rem;    width: -webkit-fill-available;">Completed</p>';
                                    }                                   
                                   
                                    html += '</div>';

                                    // html += '<div class=" d-flex" >';
                                   
                                    // if(item.payment_status == 1){
                                    //     if (item.is_completed == 0 ) {                                                               
                                    //         if(item.milestone_deadline == currentDateString){
                                    //             html += '<p class="" style="font-size:0.8rem;width:50%"><span style="font-size:0.7rem"> Status</span> :</p><button class="bg-success  ps-1 pe-1  text-white border border-0 mark_it_complete_btn" style="font-size:0.7rem;"  data-mtups="'+ item.id+'" >Mark it complete</button>';
                                    //         }else{
                                    //             html += '<p class="" style="font-size:0.8rem;width:50%"><span style="font-size:0.7rem"> Status</span> : In-progress</p>';
                                    //         }
                                    //     }                                        
                                    // }
                                

                                    // html += '</div>';
                                // }
                                
                                

                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                            });
                            $('#accordionFlushExample').html(html);
                        }                
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                    }
                });

            


                var milStonId = $(".accordion-item").attr("datamilestoneid");
                var milestonePaymnetStatus = new FormData();
                // milestonePaymnetStatus.append('milStonId', "milestone_oa6x0_2024-03-28_05-02-42");
                milestonePaymnetStatus.append('lead_id', lead_id);

                $.ajax({
                    url: site_url + "/api2/public/index.php/milestone_payment_status",
                    method: 'POST',
                    data: milestonePaymnetStatus,
                    processData: false, // important to prevent jQuery from transforming data into a query string
                    contentType: false, // important for letting jQuery not to set contentType
                    success: function(response) {
                                        
                        var new_data = JSON.parse(response);  
                        // console.log("pay: "+new_data.msg.amount );
                        if(new_data.status == 200){
                            if(new_data.msg.payment_status == 0){
                                
                                $("#milestonePaymentModal .modal-body #milestone_pending").html("<b>Payment for "+new_data.msg.milestone_name+" is pending.</b> </br><p class='text-secondary' style='font-size:0.8rem'>Please complete the payment to proceed further.</p>");
                                // $("#milestonePaymentModal .modal-footer #milestone_payment_button").attr("milestoneidLong",new_data.msg.milestone_id);
                                $("#milestonePaymentModal .modal-body #mid").val(new_data.msg.id);
                                $("#milestonePaymentModal .modal-body #form_amount").val(new_data.msg.milestone_amount);

                                if(usertype == 1){
                                $("#milestonePaymentModal").modal('show');
                                }

                            }                        
                        }               
                    },
                    error: function(xhr, status, error) {
                        hideLoader();
                        // Handle error
                    }
                });







                


                $('#milestone_payment_button').click(function() {  
                    showLoader();         
                    // Get the data-id value of the clicked button                
                    // var milestoneidLong = $(this).attr('milestoneidLong');  
                    var mid = $(this).attr('mid');
                    let mile_payment = new FormData();
                    mile_payment.append('project_id',lead_id);
                    mile_payment.append('mid',mid);

                    $.ajax({
                        url: site_url + "/api2/public/index.php/milestones_payment",
                        method: 'POST',
                        data: mile_payment,
                        processData: false, // important to prevent jQuery from transforming data into a query string
                        contentType: false, // important for letting jQuery not to set contentType
                        success: function(response) {
                            // Handle success response                    
                            var new_data = JSON.parse(response);  
                            if(new_data.status == 200){
                                $('#milestonePaymentModal').find('.btn-close').click();
                                hideLoader();
                                toastr.success(new_data.msg); 
                                location.reload();
                            }                
                        },
                        error: function(xhr, status, error) {
                            hideLoader();
                            $('#milestonePaymentModal').find('.btn-close').click();
                            toastr.error(new_data.msg); 

                            // Handle error
                        }
                    });

                });




                // milestone complete button for customer 
                           

                var milstnCmplBtn = new FormData();
                milstnCmplBtn.append('milStonId', "milestone_oa6x0_2024-03-28_05-02-42");
                milstnCmplBtn.append('lead_id', lead_id);
                $.ajax({
                    url: site_url + "/api2/public/index.php/milestoneCompleteButton",
                    method: 'POST',
                    data: milstnCmplBtn,
                    processData: false, // important to prevent jQuery from transforming data into a query string
                    contentType: false, // important for letting jQuery not to set contentType
                    success: function(response) {
                                        
                        var new_data = JSON.parse(response);  
                        if(new_data.status == 200){
                            if(new_data.msg.status == 0){
                                
                                
                            }                        
                        }               
                    },
                    error: function(xhr, status, error) {
                        hideLoader();
                        // Handle error
                    }
                });




                 // Assuming '.accordion' is the parent element that exists when the page loads
                $(document).on('click', '.mark_it_complete_btn', function() {
                    var markButton = $(this);
                    // var milestoneId = $(this).closest('.accordion-item').attr('datamilestoneid');
                    var mtups = $(this).data('mtups');
                    // console.log('Data Milestone ID:', milestoneId);
                    console.log('mtups:', mtups);
                    console.log('mtups type:', typeof(mtups));

                    $('#completeMilestoneBtnModal').modal('show');

                    $('#alertYes').one('click', function() {
                        // Run your AJAX request when the "alertYes" button is clicked
                        $.ajax({
                            url: site_url + "/api2/public/index.php/markItCompleted",
                            method: 'POST',
                            data: {
                                datamilestoneid: lead_id,
                                mtups: mtups
                            },
                            success: function(response) {
                                // Handle success response
                                console.log('AJAX request successful');
                                var new_data = JSON.parse(response);  
                                if(new_data.status == 200){
                                    if(new_data.type == 1){
                                        toastr.success(new_data.msg); 
                                        markButton.text("Completed");
                                        $('#completeMilestoneBtnModal').modal('hide');
                                    }
                                    if(new_data.type == 3){
                                        toastr.success(new_data.msg);
                                        markButton.text("Completed");
                                        $('#completeMilestoneBtnModal').modal('hide');
                                    }
                                }
                               
                                // var accordianTarget = $("#flush-collapse"+mtups);
                                // var prevH2 = accordianTarget.prev().find('h2');
                                // var pInH2 = prevH2.find("button p");
                                // pInH2.text("Phase-1 (Completed)");
                               
                                location.reload();
                            },
                            error: function(xhr, status, error) {
                                // Handle error response
                                console.error('AJAX request failed:', error);
                            }
                        });
                    });
                    $("#alertNo").on('click', function(){
                        $('#completeMilestoneBtnModal').modal('hide');
                    });
                });  




                // To enable review the project butotn 
                var reviewButton = new FormData();
                reviewButton.append('lead_id', lead_id);
                $.ajax({
                    url: site_url + "/api2/public/index.php/reviewButtonEnable",
                    method: 'POST',
                    data: reviewButton,
                    processData: false, // important to prevent jQuery from transforming data into a query string
                    contentType: false, // important for letting jQuery not to set contentType
                    success: function(response) {
                                        
                        var new_data = JSON.parse(response);  
                        console.log("reviewButton ="+new_data.msg);
                        if(new_data.status == 200){
                            if(new_data.msg == 1){                                
                                var review_the_project = $("#review_the_project");
                                review_the_project.removeAttr("disabled");
                                
                            }                    
                        }               
                    },
                    error: function(xhr, status, error) {
                        hideLoader();
                        // Handle error
                    }
                });

                // To enable review the project butotn 
                var reviewButton = new FormData();
                reviewButton.append('lead_id', lead_id);
                $.ajax({
                    url: site_url + "/api2/public/index.php/checkProjectStatus",
                    method: 'POST',
                    data: reviewButton,
                    processData: false, // important to prevent jQuery from transforming data into a query string
                    contentType: false, // important for letting jQuery not to set contentType
                    success: function(response) {
                                        
                        var new_data = JSON.parse(response);  
                       
                        if(new_data.status == 200){
                            if(new_data.msg.project_status == 3){
                                var review_the_project_parent = $("#review_the_project_parent");
                                var review_the_project = $("#review_the_project");
                                // Find the <span> element within the parent element
                                var spanElement = review_the_project_parent.find("span");
                                // Find the <i> element within the <span> element
                                var iTagInsideSpan = spanElement.find("i");
                                // Remove and add classes using jQuery methods
                                iTagInsideSpan.removeClass("fa-circle").addClass("fa-circle-check text-success");
                                // Remove the review_the_project element
                                review_the_project.remove();
                                // Append a new paragraph directly using jQuery
                                review_the_project_parent.append("<p class='text-success'>Project reviewed successfully</p>");
                            }
                            console.log("project check status= "+new_data.msg.project_status);                
                        }               
                    },
                    error: function(xhr, status, error) {
                        hideLoader();
                        // Handle error
                    }
                });




                // Project reviewed button 
                $('#alertYesReviewProject').one('click', function() {
                    // Run your AJAX request when the "alertYes" button is clicked
                    $.ajax({
                        url: site_url + "/api2/public/index.php/project_reviewed",
                        method: 'POST',
                        data: {
                            lead_id: lead_id,
                            
                        },
                        success: function(response) {
                            // Handle success response
                            console.log('AJAX request successful');
                            var new_data = JSON.parse(response);  
                            if(new_data.status == 200){
                                toastr.success(new_data.msg);
                            }else{
                                toastr.error(new_data.msg);

                            }
                            
                            // var accordianTarget = $("#flush-collapse"+mtups);
                            // var prevH2 = accordianTarget.prev().find('h2');
                            // var pInH2 = prevH2.find("button p");
                            // pInH2.text("Phase-1 (Completed)");
                            
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            // Handle error response
                            console.error('AJAX request failed:', error);
                        }
                    });
                });
                $("#alertNoReviewProject").on('click', function(){
                    $('#review_the_project_modal').modal('hide');
                });



                // Delete project requirements file
                $('#delete_project_file').on('click', function(){
                    console.log("delete clicked");

                    $.ajax({
                        url: site_url + "/api2/public/index.php/project_file_delete",
                        method: 'POST',
                        data: {
                            lead_id: lead_id,                            
                        },
                        success: function(response) {
                            // Handle success response
                            console.log(' delete AJAX request successful');
                            var new_data = JSON.parse(response);  
                            if(new_data.status == 200){
                                toastr.success(new_data.msg);
                            }else{
                                toastr.error(new_data.msg);

                            }
                            
                            // var accordianTarget = $("#flush-collapse"+mtups);
                            // var prevH2 = accordianTarget.prev().find('h2');
                            // var pInH2 = prevH2.find("button p");
                            // pInH2.text("Phase-1 (Completed)");
                            
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            // Handle error response
                            console.error('AJAX request failed:', error);
                        }
                    });
                })
                

        });
    </script>

    <script>
        let attachFileButton = document.getElementById("attachFileButton");
        let fileInput = document.getElementById("fileInput");
        let fileCount = document.getElementById("fileCount");

        attachFileButton.addEventListener('click', function(){
            fileInput.click();
        });
        fileInput.addEventListener('change', function () {
            let files = fileInput.files;
            if (files.length > 0) {
                fileCount.textContent = files.length + " file(s) selected";
            } else {
                fileCount.textContent = "No files selected";
            }
        });


        function validateInputs() {
            // Get all input fields in the form
            var inputs = $('#requirementsForm input');
            var isValid = true;

            // Check if any input field is empty
            inputs.each(function() {
                if ($(this).val() === '') {
                    isValid = false;
                    return false; // Exit the loop if any field is empty
                }
            });

            return isValid;
        }


        function validateAddMilestonesInputs() {
            // Get all input fields in the form
            var inputs = $('#addMilestoneForm input');
            var isValid = true;

            // Check if any input field is empty
            inputs.each(function() {
                if ($(this).val() === '') {
                    isValid = false;
                    return false; // Exit the loop if any field is empty
                }
            });

            return isValid;
        }

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // Get the div element with the scroll
            var scrollableDiv = document.getElementById('message_chat_box');
            
            // Scroll the div to the bottom
            scrollableDiv.scrollTop = scrollableDiv.scrollHeight;

            hideLoader();
        });
    </script>

</body>

</html>
