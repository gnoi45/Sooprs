<?php
session_start();
include_once 'function.php';
include_once 'env.php';

include('config/dbconn.php');

$userCredentials = new DB_con();

$username = $userCredentials->getUser($_SESSION['id'], 'join_professionals');

if (!$_SESSION['id'] || $_SESSION['loggedin'] != true) {
    $url = 'login-professional';
    header('Location: ' . $url);
    exit();
}

if (isset($_POST['view_lead_btn'])) {
    // Perform some code here
    $lead_mail = $userCredentials->lead_purchase_mail($username['email']);
    $lead_id = $_POST['lead_id'];    
    $redirectURL = "lead/".$lead_id;

    // Redirect to another page
    header('Location: '.$redirectURL);
    exit(); // Always exit after a redirect to prevent further code execution
}




// if (isset($_POST['view_lead_btn'])) {
//     // Professional total credits
//     $pr_cr = $userCredentials->getPrCredits($_SESSION['id'], 'credits');
//     $totalCredits = $pr_cr['credits'];

//     // Lead credits
//     $lead_id = $_POST['lead_id'];
//     $lead = $userCredentials->getLeadCredits($lead_id, 'lead');
//     $lead_cr = $lead['credits'];

//     // Deduct credit from professional credits
//     $pr_cr_update = $totalCredits - $lead_cr;

//     // update professional credits in "credits" table
//     $sql = "UPDATE credits SET credits = '".$pr_cr_update."' WHERE id = '".$_SESSION['id']."'";
    
//     if ($sql) {
//         $_SESSION['leadUnlock'] = true;
//         $url = 'lead-page';
//         header('Location: ' . $url);
//         exit();
        
//     } else {
//         return " some error occured";
//     }



   

// }


$title = 'Leads ';
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

    .category-heading button {
        display: inline;
        width: fit-content;
        font-size: 15px;
        border: 1px solid #d9d9d9;
        /* box-shadow: 0px 0px 8px -3px black; */
        border-radius: 10px;
        padding: 7px 16px;
        color: darkblue;


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
        background-color: #0078ff;
        color: #ffffff;
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


<?php include "./header2.php" ?>

<!-- <section class="about-section-top">

    <div class="container">

        <div class="bread-text">

            <p class="d-none d-md-block">Our Professionals</p>

            <p class="d-lg-none d-md-none" style="    font-size: 50px!important;">Professionals</p>



        </div>



    </div>



</section> -->



<section class="top-sectop " style="    background-color: #F5F5F5;top:45px;">
    <div class="container">
        <p class="text-capitalize fs-6" style=" padding: 30px 30px;">
            <a style="text-decoration:none; color: #758599;" href="/"> <i class="fa-solid fa-house"></i> </a>&nbsp; /
            &nbsp; <a class="fs-6" href="#" style="text-decoration:none; color: #758599;">Leads</a>&nbsp;
        </p>
        <div class="row justify-content-center">

            <div class="col-lg-5 col-md-4 col-sm-12" style="    padding: 0px 25px;">
                <div class="container">
                    <div class="filter-div pb-4 bg-light d-none d-md-block" style="    border-radius: 10px;    padding: 15px;  box-shadow: 0px 0px 6px -3px black;" id="stickytypeheader">
                        <p style="    padding: 10px 0 0 10px;"> <img src="assets/img/filter-icon.png"><span class="fs-5 fw-semibold"> Filter</span> </p>
                        <hr>
                        <div class="category-heading cat-heading-leads" style=" 12px;">
                            
                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <p class=" fw-semibold" style="    "> <img src="assets/img/Group-975.png" alt="">
                                    Category
                                </p>
                                <?php
                                if (isset($_GET['service'])) {
                                    echo "<a href='all-professionals'><p  style='text-decoration:underline'>Clear filter</p></a>";
                                }
                                ?>
                            </div>
                            <button class="service  mt-3" id="service-all" data-value="0">All</button>
                            <button class="service  mt-3" id="" data-value="1">Web Development</button>
                            <button class="service mt-3" data-value="14">Web Designing</button>
                            <button class="service mt-3" data-value="16">Internet of Things</button>
                            <button class=" service mt-3" data-value="5">Digital Marketing</button>
                            <button class=" service mt-3" data-value="2">App Development</button>
                            <button class=" service mt-3" data-value="23">Graphic Designing</button>
                            <button class=" service mt-3" data-value="7">SEO</button>

                        </div>
                        <hr>


                    </div>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-header">
                            
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                        <div class="filter-div pb-4 bg-light " style="    border-radius: 10px;    padding: 15px;  box-shadow: 0px 0px 6px -3px black;" id="stickytypeheader">
                        <p style="    padding: 10px 0 0 10px;"> <img src="assets/img/filter-icon.png"><span class="fs-5 fw-semibold"> Filter</span> </p>
                        <hr>
                        <div class="category-heading cat-heading-leads" style=" 12px;">
                            
                            <div class="mb-3 d-flex justify-content-between align-items-center">
                                <p class=" fw-semibold" style="    "> <img src="assets/img/Group-975.png" alt="">
                                    Category
                                </p>
                                <?php
                                if (isset($_GET['service'])) {
                                    echo "<a href='leads'><p  style='text-decoration:underline'>Clear filter</p></a>";
                                }
                                ?>
                            </div>
                            <button class="service  mt-3" id="service-all-mob" data-value="0">All</button>
                            <button class="service  mt-3" id="" data-value="1">Web Development</button>
                            <button class="service mt-3" data-value="14">Web Designing</button>
                            <button class="service mt-3" data-value="16">Internet of Things</button>
                            <button class=" service mt-3" data-value="5">Digital Marketing</button>
                            <button class=" service mt-3" data-value="2">App Development</button>
                            <button class=" service mt-3" data-value="23">Graphic Designing</button>
                            <button class=" service mt-3" data-value="7">SEO</button>

                        </div>
                        <hr>


                    </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12 ">

                <p id="professional-data-id" data-variable="<?php echo $_SESSION['id']; ?>"></p>
                <button class="btn btn-primary btn-sm ps-3 pe-3 mb-3	text-white d-sm-block d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                            Filter
                            </button>
                <div class="" id="leads-data">

                    <!-- New design lisitng   -->



                    <!-- New design lisitng   -->

                </div>

                <div class="text-center pt-4 mb-4">

                    <button id="load-more-leads" class="btn btn-sm btn-dark">Load More</button>
                    <div id="data-message"></div>
                </div>
            </div>

        </div>

    </div>
    </div>
</section>
<div class="loader-container" id="loader">
    <div class="loader1"></div>
</div>
<script>
    document.getElementById("service-all").addEventListener("click", function() {
            location.reload(); // Reload the page
        });
     document.getElementById("service-all-mob").addEventListener("click", function() {
        location.reload(); // Reload the page
    });
</script>



<?php include "footer.php" ?>
<script src="<?php echo $SITE_URL ?>/assets/js/leads.js"></script>
