<?php
session_start();
include_once 'function.php';

// if (!$_SESSION['id'] || $_SESSION['loggedin'] != true) {
//     $url = 'customer-login';
//     header('Location: ' . $url);
//     exit();
// }
$loggedinUser = new DB_con();
$username = $loggedinUser->getUser($_SESSION['id'], "customer");


$title = 'Sooprs Mobile App Development ';
$description = "Description";
$keywords = "key,words";
?>

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
        padding: 2px 14px;
        text-align: center;
        text-decoration: none;
        transition: all 250ms;
        border: 0;
        font-size: 16px;
        white-space: nowrap;

        user-select: none;
        -webkit-user-select: none;
        touch-action: manipulation;
    }

    .button-33:hover {
        box-shadow: rgba(44, 187, 99, .35) 0 -25px 18px -14px inset, rgba(44, 187, 99, .25) 0 1px 2px, rgba(44, 187, 99, .25) 0 2px 4px, rgba(44, 187, 99, .25) 0 4px 8px, rgba(44, 187, 99, .25) 0 8px 16px, rgba(44, 187, 99, .25) 0 16px 32px;
        transform: scale(1.05) rotate(-1deg);
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



    .category-heading input {
        display: inline;
        width: fit-content;
        font-size: 15px;
        border: 1px solid #d9d9d9;
        /* box-shadow: 0px 0px 8px -3px black; */
        border-radius: 10px;
        padding: 7px 16px;


    }

    .category-heading button:hover {
        background-color: #0068ff;
        box-shadow: 0px 0px 8px -3px black;
        color: white;


    }
</style>


<!-- Card design css    -->
<style>
    .card {
        background: #fff;
        border-radius: 4px;
        box-shadow: 0px 14px 80px rgba(34, 35, 58, 0.5);
        max-width: -webkit-fill-available;
        display: flex;
        flex-direction: row;
        border-radius: 25px !important;
        position: relative;
    }

    .card h2 {
        margin: 0;
        padding: 0 1rem;
    }

    .card .title {
        padding: 1rem;
        text-align: right;
        color: green;
        font-weight: bold;
        font-size: 15px;
        text-transform: capitalize;
    }

    .card .desc {
        padding: 0.5rem 1rem;
        font-size: 14px;
    }

    .card .actions {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        align-items: center;
        padding: 0.5rem 1rem;
    }

    .card svg {
        width: 85px;
        height: 85px;
        margin: 0 auto;
    }

    .img-avatar {
        width: 80px;
        height: 80px;
        position: absolute;
        border-radius: 50%;
        border: 6px solid white;
        background-image: linear-gradient(-60deg, #16a085 0%, #f4d03f 100%);
        top: 15px;
        left: 85px;
    }

    .card-text {
        display: grid;
        grid-template-columns: 1fr 2fr;
    }

    .title-total {
        padding: 1em 1.5em 1em 1.5em;
    }

    .title-total h3,
    .title-total p {
        padding-left: 15px;
    }

    .title-total p {
        font-weight: 500;
        color: grey;
        text-transform: capitalize;
    }

    path {
        fill: white;
    }

    .img-portada {
        width: 100%;
    }

    .portada {
        width: 100%;
        height: 100%;
        border-top-left-radius: 20px;
        border-bottom-left-radius: 20px;
        /* background-image: url("https://m.media-amazon.com/images/S/aplus-media/vc/cab6b08a-dd8f-4534-b845-e33489e91240._CR75,0,300,300_PT0_SX300__.jpg"); */
        background-position-y: inherit;
        background-position-x: center;
        background-size: cover;
    }


    /* button {
        border: none;
        background: none;
        font-size: 24px;
        color: #8bc34a;
        cursor: pointer;
        transition: 0.5s;
    } */

    /* .actions button:hover {
        color: #4CAF50;
        transform: rotate(22deg);
    } */



    .plm-p span {
        font-size: 12px;
        text-transform: uppercase;
        margin-left: 15px;
        color: grey;
        display: inline-block;
        font-weight: 500;
    }

    .profile-image {
        padding: 5px;
        /* background-color: white; */
        border-radius: 10px;
    }

    .profile-image img {
        width: 80px;
        height: 80px;
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
        font-size: 10px;

    }

    form {
        width: -webkit-fill-available;
        display: flex;
        margin-bottom: 0;
    }




    .nav-pills .nav-link.active,
    .nav-pills .show>.nav-link {
        color: darkblue !important;
        background-color: white !important;
    }



    /* SEarch bar  */


    /* Search bar  */

    .image-round-box {
        background: white;
        box-shadow: 0px 4px 6px -4px black;
        border-radius: 50%;
        padding: 7px;
    }
</style>

<style>
    .skill-set span {
        padding: 5px 15px;
        background: #A8E5FF;
        border-radius: 5px;
        color: grey;
    }

    /* .view-prof-btn {
        border-radius: 5px;
        padding: 7px 50px;
        background-color: #D9F2FD;
        color: #00A9F6;
        font-size: 16px;
        border: none;
        font-weight: 500;
    } */
</style>

<style type="text/css">
    .pagination-content {
        width: 60%;
        text-align: justify;
        padding: 20px;
    }

    .pagination {
        padding: 20px;
    }

    .pagination a.active {
        background: #f77404;
        color: white;
    }

    .pagination a {
        text-decoration: none;
        padding: 10px 15px;
        box-shadow: 0px 0px 15px #0000001c;
        background: white;
        margin: 3px;
        color: #1f1e1e;
    }


    #data-message {
        text-align: center;
        padding: 10px 0;
        text-transform: capitalize;
        font-size: 20px;
    }
</style>

<!-- load data on scroll 21-05-23  -->
<style>
    .loader {
        display: inline-block;
        border: 5px dotted lightgray;
        border-radius: 50%;
        border-top: 5px solid gray;
        border-bottom: 5px solid gray;
        width: 30px;
        height: 30px;
        -webkit-animation: spin 1s linear infinite;
        /* Safari */
        animation: spin 1s linear infinite;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    .loader-symbol {
        text-align: center
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<!-- load data on scroll 21-05-23  -->

<?php include "header2.php" ?>

<!-- <section class="about-section-top">

    <div class="container">

        <div class="bread-text">

            <p class="d-none d-md-block">Our Professionals</p>

            <p class="d-lg-none d-md-none" style="    font-size: 50px!important;">Professionals</p>



        </div>



    </div>



</section> -->



<section class="top-sectop" style="   background-color: #F5F5F5;">
    <div class="container">
        <p class="text-capitalize fs-6" style=" padding: 30px 30px;">
            <a style="text-decoration:none; color: #758599;" href="/"> <i class="fa-solid fa-house"></i> </a>&nbsp; /
            &nbsp; <a class="fs-6" href="<?php $escaped_url ?>/all-professionals"
                style="text-decoration:none; color: #758599;">Professionals</a>&nbsp; /&nbsp;
            &nbsp;
        </p>
        <div class="row justify-content-center">

            <div class="col-lg-4 col-md-4 col-sm-12" style="    padding: 0px 25px;">
                <div class="container">
                    <div class="filter-div pb-4 bg-light"
                        style="    border-radius: 10px;    padding: 15px;  box-shadow: 0px 0px 6px -3px black;"
                        id="stickytypeheader">
                        <p style="    padding: 10px 0 0 10px;"> <img src="assets/img/filter-icon.png"><span
                                class="fs-5 fw-semibold"> Filter</span> </p>
                        <hr>
                        <div class="category-heading service-filter-box cat-heading-professionals" style=" 12px;">
                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <p class=" fw-semibold" style="    "> <img src="assets/img/Group-975.png" alt="">
                                    Category
                                </p>
                            </div>
                            <button class="service  mt-3" id="service-all"  data-value="0" >All</button>
                            <button class="service  mt-3" id="" data-value="1">Web Development</button>
                            <button class="service mt-3" data-value="14">Web Designing</button>
                            <button class="service mt-3" data-value="16">Internet of Things</button>                            
                            <button class=" service mt-3" data-value="5">Digital Marketing</button>
                            <button class=" service mt-3" data-value="2">App Development</button>
                            <button class=" service mt-3" data-value="23">Graphic Designing</button>
                            <button class=" service mt-3" data-value="7">SEO</button>
                        </div>
                        <hr>
                        <div class="category-heading" style=" 12px;">
                            <p class="fw-semibold" style="    font-size: 20px;">₹ Price</p>
                            <button class="mt-3">₹ 10000</button>
                            <button class="mt-3">₹ 5000</button>
                            <button class="mt-3">₹ 3000</button>
                            <button class="mt-3">₹ 20000</button>
                        </div>
                        <hr>
                        <div class="category-heading" style=" 12px;">
                            <p class="mb-3 fw-semibold" style="    font-size: 20px; ">
                                Rating
                            </p>
                            <i class=" fs-4 fas fa-thin fa-star" style="color: #619bff;"></i>
                            <i class=" fs-4 fas fa-thin fa-star" style="color: #619bff;"></i>
                            <i class=" fs-4 fas fa-thin fa-star" style="color: #619bff;"></i>
                            <i class=" fs-4 fas fa-thin fa-star" style="color: #619bff;"></i>
                            <i class=" fs-4 fas fa-thin fa-star" style="color: #619bff;"></i>




                        </div>

                    </div>

                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-sm-12 mt-2">


                <div class="">
                    <div class="row justify-content-center">



                        <div class="col-lg-10 col-md-9 col-sm-12   mb-2 search-bar">



                            <input class="form-control" type="text" name="search" id="search" style="height: 2.45rem;">
                            <!-- <button type="button" name="submit" class="submit" id="submit"  onkeyup="fill()" value="Submit"
                                    style="height: 2.45rem; padding: 0 20px; border: none; background: #A8E5FF; border-radius: 10px; color: black; font-size: 14px;">Search</button> -->
                            <div id="display" style=" position: absolute;background: white; width: 271px; "></div>


                        </div>
                        <div class="col-lg-2 col-md-3 col-sm-12 d-flex nav nav-pills mb-3 justify-content-end"
                            id="pills-tab" role="tablist">
                            <div class="d-flex"
                                style="    border: 1px solid #cbcbcb;border-radius: 10px;    padding: 1px;">
                                <div class="nav-item" role="presentation">
                                    <button class="nav-link active" id="pills-professionals-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-professionals" type="button" role="tab"
                                        aria-controls="pills-professionals" aria-selected="true"
                                        style="    padding: 12px 17px;">

                                        <i class="fa-solid fa-bars fs-6"></i>
                                    </button>
                                </div>
                                <div class="nav-item" role="presentation">
                                    <button class="nav-link" id="pills-professionals-grid-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-professionals-grid" type="button" role="tab"
                                        aria-controls="pills-professionals-grid" aria-selected="false"
                                        style="    padding: 12px 17px;">
                                        <i class="fa fa-th fs-6"></i>

                                    </button>
                                </div>
                            </div>
                        </div>




                    </div>


                </div>

                <div class="tab-content" id="pills-tabContent">

                    <div class="tab-pane fade show active ajax-data" id="pills-professionals" role="tabpanel" aria-labelledby="pills-professionals-tab" tabindex="0">
                        <!-- New design lisitng   -->


                        <!-- New design lisitng   -->

                    </div>



                    <div class="tab-pane fade " id="pills-professionals-grid" role="tabpanel" aria-labelledby="pills-professionals-grid-tab" tabindex="0">
                        <div class="row justify-content-center">
                            <div class="col-md-12 col-sm-12">
                                <div class="row" id="pills-professionals-grid-col">

                                    <!-- Grid  -->

                                    <!-- Grid  -->

                                </div>


                            </div>
                        </div>

                    </div>


                </div>
                <div class="text-center pt-4">

                    <button id="load-more" class="btn btn-sm btn-success">Load More</button>
                    <div id="data-message"></div>
                </div>
            </div>



        </div>

    </div>
    </div>
</section>



<?php include "footer.php" ?>

