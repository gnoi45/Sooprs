<?php
session_start();
include_once 'function.php';
include 'env.php';
$dbConObj = new DB_con();
// $fetchedResult = $dbConObj->fetchpages();
// print_r($fetchedResult);
// exit();
// Development pages 





if(isset($_SESSION['id']) ){

    $username = $dbConObj->getUser($_SESSION['id'], "customer");
    if(empty($username)){
        $username = $dbConObj->getUser($_SESSION['id'], "join_professionals");
    
    }
}

// print_r($username);
// die();


$title = "Mobile App Development | Web Development | Digital Marketing";

$description = "Sooprs is a platform that connects buyer and service provider. We provide web development, digital marketing, mobile app development and many other services.";

$keywords = "web development, mobile app development, digital marketing, android app development, hybrid app development, ios app development, seo, graphic designing.    ";

?>


<?php include "./header2.php" ?>



<style>
    body {
        font-family: 'Poppins';
    }



    .profile-img {
        width: -webkit-fill-available;
        border-radius: 10px;
    }

    .profile-img-text {
        position: absolute;
        bottom: 20px;
        z-index: 99;
        padding-left: 20px;
    }

    .profile-img-text p {
        color: white;
    }

    .overlay-banner {
        position: absolute;
        top: 0;
        bottom: 0;
        background: #0000007a;
        right: 0;
        left: 0;
        /* border-radius: 0px; */
    }

    .overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        background: #0000007a;
        right: 0px;
        left: 0px;
        /* border-radius: 10px; */
    }

    .overlay-mobile {
        position: absolute;
        top: 0;
        bottom: 0;
        background: #0000007a;
        right: 0px;
        left: 0px;
        /* border-radius: 10px; */
    }


</style>


<section class="" style="    margin-top: 100px; margin-bottom: 100px;">
    <div class="container">
        <div class="section-heading mb-5">
            <h3>All Services</h3>

        </div>
        <div class="row " id="all-services-row">
            <div class="col-lg-3 col-md-3 col-sm-12">
                <div class="service-box position-relative" style="background:url('https://res.cloudinary.com/dr4iluda9/image/upload/v1681124044/sooprs/mobile-app_sxi175.webp');    background-position: center;
                    background-size: cover;
                    width: 250px;
                    height: 250px;">
                    
                    <a href="service/">
                        <div class="profile-img-text ">
                            <p style="font-size:22px;font-weight:500">
                                
                            Development
                            </p>
                        </div>
                        <div class="overlay"></div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<script src="<?php echo $SITE_URL ?>/assets/js/srs_custom.js"></script>

<script src="<?php echo $SITE_URL ?>/assets/js/srs_custom.js"></script>




<?php include "./footer.php" ?>