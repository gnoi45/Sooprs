<?php
session_start();
include_once 'function.php';
include_once 'env.php';

$dbConObj = new DB_con();
if (isset($_SESSION['id'])) {
    $username = $dbConObj->getUser($_SESSION['id'], 'join_professionals');
}


// banners 
$banners = $dbConObj->getBanners('banners');



$title = "World's Best Online Freelance Marketplace | Sooprs.com";
$description = "Sooprs is a platform that connects buyer and service provider. We provide web development, digital marketing, mobile app development and many other services.";
$keywords = "web development, mobile app development, digital marketing, android app development, hybrid app development, ios app development, seo, graphic designing.    ";
?>
<?php include "./header2.php" ?>
<?php
$isSessionSet = isset($_SESSION['id']);
echo '<script>';
echo 'function checkSession() {';
echo '  return ' . ($isSessionSet ? 'true' : 'false') . ';';
echo '}';
echo '</script>';
?>

<style>
    .banner-section {
        position: relative;
    }

    .banner-content-box {
        position: absolute;
        top: 0;
        bottom: 0;
        right: 0;
        left: 0;
        display: flex;
        justify-content: center;
        text-align: center;
        padding-left: 0rem;
        align-items: center;
    }

    .banner-content-box p:nth-child(1) {
        color: #5194F5;
    }

    .popular-tags {
        display: inline-block;
        padding-top: 20px;
    }

    .popular-tags button {
        background: transparent;
        color: white;
        border-radius: 10px;
        border: solid blue 2px;
        font-size: x-small;
    }

    .popular-tags button:hover {
        background: blue;
        transition: 0.4s;
    }

    .carousel-caption {
        position: absolute;
        right: 15%;
        left: 15%;
        padding-top: 1.25rem;
        padding-bottom: 1.25rem;
        color: #fff;
        text-align: center;
        top: 300px;
    }



    .profile-img {
        width: inherit;
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
        border-radius: 0px;
    }

    .overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        background: #0000007a;
        right: 0px;
        left: 0px;
        border-radius: 10px;
    }

    .overlay-mobile {
        position: absolute;
        top: 0;
        bottom: 0;
        background: #0000007a;
        right: 0px;
        left: 0px;
        border-radius: 10px;
    }

    .how-sooprs-work-section .card {
        background: #C6EBFB;
        box-shadow: #979797 0px 6px 11px -3px;
        border: none;
        margin: 10px 0;
        -webkit-transition: all 0.2s ease-in;
        -moz-transition: all 0.2s ease-in;
        -ms-transition: all 0.2s ease-in;
        -o-transition: all 0.2s ease-in;
        transition: all 0.2s ease-in;
    }

    .how-sooprs-work-section .card:hover {


        box-shadow: 0px 15px 26px rgba(0, 0, 0, 0.50);

    }

    .how-sooprs-work-section .card-body span {
        width: 67px;
        height: 67px;
        background: rgb(255, 255, 255);
        padding: 0px 25px 0px 25px;
        font-size: 40px;
        border-radius: 100%;
        box-shadow: 0px 2px 7px -2px black;
        font-weight: 600;

    }


    .how-sooprs-work-section .card-body p {
        padding: 1px 15px 0px 15px;
        text-align: center;
        font-weight: 700;
    }

    .how-sooprs-work-section .card-img-top {
        padding: 15px;


    }


    .sooprs-work-row .col-md-4 {
        text-align: -webkit-center;

    }

    .why-choose-us {
        background: linear-gradient(180deg, rgba(221, 207, 207, 0.2) 0%, rgba(0, 0, 0, 0) 100%), #D3E5FF;
        padding: 40px 0 80px 0;
    }

    .why-choose-content p:nth-child(2) {
        color: #022392;
    }

    .why-choose-us h5 {
        font-weight: 700;
        color: blue;
        padding-top: 40px;
        font-size: 27px;
    }

    .why-choose-us h3 {

        font-size: 34px;
    }

    .counter-last-section {
        margin: 25px 0;
        background: black;
    }

    .counter-last-section .row {
        /* background: #84B6FE; */
        text-align: center;
        justify-content: center;
    }

    .counter-box {
        background: black;
        color: white;
        padding: 10px;
        margin: 10px 0;
    }

    .counter-box strong {
        font-size: xxx-large;
        font-weight: 600;
    }

    .counter-box p {
        margin-bottom: 5px;
        font-size: larger;
    }


    .form-group {
        margin: 15px 0;
    }


    .search_div1 ul {
        list-style: none;
        width: 100%;
        overflow: auto;
        padding: 0;
        margin-bottom: 0rem;
        height: 157px;
    }


    /* 
    .owl-prev,
    .owl-next {
        width: 50px;
        height: 50px;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        display: block !important;
        border: 0px solid black;
        border-radius: 50% !important;
        background-color: white !important;
    }

    .owl-prev {
        left: -17px;
    }

    .owl-next {
        right: -17px;
    }

    .owl-prev i,
    .owl-next i {
        transform: scale(1.3, 1.3);
        color: #006aff;
    } */



    /* float b utton  */
    .float_button {
        width: 9rem;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        background-color: #000000;
        border-radius: 30px;
        color: #ffffff;
        /* font-weight: 600; */
        border: none;
        position: relative;
        cursor: pointer;
        transition-duration: .2s;
        box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.116);
        padding-left: 8px;
        transition-duration: .5s;
        transition: opacity 0.3s ease;
        /* Add transition for opacity */
    }

    #scrollButton.show {
        opacity: 1;
        /* When the button has the 'show' class, set opacity to 1 */
    }

    .svgIcon {
        height: 25px;
        transition-duration: 1.5s;
    }

    .bell path {
        fill: rgb(19, 19, 19);
    }

    .float_button:hover {
        background-color: rgb(20 34 255);
        transition-duration: .5s;
    }

    .float_button:active {
        transform: scale(0.97);
        transition-duration: .2s;
    }

    .float_button:hover .svgIcon {
        transform: rotate(250deg);
        transition-duration: 1.5s;
    }


    #scrollButtonContainer {
        display: none;
        /* Initially hide the button */
        position: fixed;
        bottom: 70px;
        left: 50%;
        transform: translateX(-50%);
        padding: 10px 10px;
        color: #ffffff;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        z-index: 999;
        width: 20rem;
        background: #006aff;
    }
</style>

<?php
if (isset($_SESSION['id'])) {
    ?>
    <p id="customer-data-name" data-variable="<?php echo $username['name']; ?>"></p>
    <p id="customer-data-email" data-variable="<?php echo $username['email']; ?>"></p>
    <p id="customer-data-mobile" data-variable="<?php echo $username['mobile']; ?>"></p>
    <p id="customer-data-city" data-variable="<?php echo $username['city']; ?>"></p>
    <?php
}
?>

<section class="top-sectop" style="position:relative">

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

        <!-- <div class="carousel-indicators">

            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>

            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                aria-label="Slide 2"></button>

            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                aria-label="Slide 3"></button>

            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3"
                aria-label="Slide 4"></button>

        </div> -->

        <div class="carousel-inner" style="@media(max-width:768px){height: 600px}">
            <?php
            foreach ($banners as $index => $one) {

                ?>
                <div class="carousel-item <?php if ($index == 0) {
                    echo 'active';
                } ?>">
                    <img src="https://sooprs.com/sooprs_admn/storage/app/public/banners/<?php echo $one ?>"
                        class="w-100 h-100" alt="banner">
                    <!--<img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681120758/sooprs/animation_y3v5nn.webp"-->
                    <!--    class="w-100" alt="banner">-->
                </div>
                <?php
            }
            ?>

            <!-- <div class="carousel-item active">

                <img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681113357/sooprs/banner1_bs8hwn.webp"
                    class="d-none d-md-block w-100" alt="...">

                <img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681120758/sooprs/animation_y3v5nn.webp" class="d-md-none w-100" alt="...">



            </div>

            <div class="carousel-item ">

                <img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681113271/sooprs/banner-2_muq6wi.webp"
                    class="d-none d-md-block w-100" alt="...">

                <img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681120308/sooprs/ui_ans5ev.webp" class="d-md-none w-100" alt="...">

            </div>

            <div class="carousel-item">

                <img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681113358/sooprs/banner-3_v2jg1f.webp"
                    class="d-none d-md-block w-100" alt="...">

                <img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681119467/sooprs/website-development_mlfhi1.webp" class="d-md-none w-100" alt="...">

            </div>

            <div class="carousel-item">

                <img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681113358/sooprs/banner-4_gwfjsd.webp"
                    class="d-none d-md-block w-100" alt="...">

                <img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1683624192/sooprs/video-marketing_kqbi9o.webp" class="d-md-none w-100" alt="...">

            </div> -->

        </div>

        <div class="overlay-banner"></div>

        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"

                data-bs-slide="prev">

                <span class="carousel-control-prev-icon" aria-hidden="true"></span>

                <span class="visually-hidden">Previous</span>

            </button>

            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"

                data-bs-slide="next">

                <span class="carousel-control-next-icon" aria-hidden="true"></span>

                <span class="visually-hidden">Next</span>

            </button> -->

    </div>

    <div class="banner-content-box ">
        <div class="banner-content-box-first-child-div">



            <h1 class="text-white fw-bold drop-in">Find the <span class="text-primary">Top Professionals</span> for you
                with super speed

            </h1>

            <p class="pb-3 drop-in-2" style="color: #d4d4d4;font-size: large;font-weight: 700;">Get the quotes within
                minutes</p>

            <div class="container">

                <div class="row justify-content-center">

                    <!-- <form id="searchForm"> -->

                    <div class="col-md-5 col-sm-12" style="    padding-right: 0;">
                        <div style="position:relative">
                            <input class="form-control services-input" id="myText2" type="text" autocomplete="off"
                                value="" data="" style="    width: -webkit-fill-available;"
                                placeholder="What service are you looking for?">
                            <button class="btn btn-primary btn-hover themeButton">Search</button>


                            <div class="search_div" style="display:none">

                                <ul class="search_category" id="search_category">

                                </ul>

                            </div>

                            <span style="display:none;color:red" id="sprs_error">This service is not available.Try
                                again</span>

                        </div>

                    </div>

                    <!-- <div class="col-md-2 col-sm-12" style="    padding-right: 0;margin-bottom: 10px;">
                            <div style="position:relative">
                                <input class="form-control pin-code-input " type="text" placeholder="Pincode (optional)"
                                    id="myText1" autocomplete="off" value="" style="    width: -webkit-fill-available;">                           

                                <div class="search_div1" style="display:none">
                                    <ul class="search_pincode" id="search_pincode">
                                    </ul>
                                </div>
                            </div>
                        </div> -->



                    <!-- </form> -->

                </div>



            </div>

            <div class="d-fkex text-center popular-tags">

                <p class="text-white" style="    display: inline-block;">Popular:</p>

                <button class="popular-btns" data="2">App Development</button>

                <button class="popular-btns" data="1">Website Development</button>

                <button class="popular-btns" data="5">Digital Marketing</button>



            </div>

        </div>

    </div>






</section>


<!-- <div id="pageContent"></div> -->
<div id="developmentPageContent"></div>
<div id="designing_section"></div>





<!-- How sooprs work  -->
<!-- <div class="container mb-5 mt-5">
    <div class="text-center mb-5">
        <h2>How <span class="text-primary">Sooprs</span> Work</h4>
    </div>
    <div class="row justify-content-center how-sooprs-work-section">
        <div class="col-md-4 col-sm-12 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top"
                    src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681120845/sooprs/work1_nymbby.webp"
                    alt="Project Requirment">
                <div class="card-body">
                    <div class="d-flex">
                        <span>1</span>
                        <p class="card-text">Add Your Project Requirment At No Cost</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top"
                    src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681120845/sooprs/work2_mihedk.webp"
                    alt="Select the best Person or Agency">
                <div class="card-body">
                    <div class="d-flex">
                        <span>2</span>
                        <p class="card-text">Select the best Person or Agency to do your work.</p>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 d-flex justify-content-center">
            <div class="card" style="width: 18rem;">
                <img class="card-img-top"
                    src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681120844/sooprs/work3_n4zhwo.webp"
                    alt="Get Work Completed">
                <div class="card-body">
                    <div class="d-flex">
                        <span>3</span>
                        <p class="card-text">Get Work Completed and focus on your business.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div> -->



<div class="section-box mt-70 mb-40">
    <div class="" style="padding:0 2rem;">
        <div class="text-start">
            <h2 class="section-title mb-10 wow animate__ animate__fadeInUp animated"
                style="visibility: visible; animation-name: fadeInUp;">How <span class="text-primary">Sooprs</span>
                Works</h2>
            <p class="font-lg color-text-paragraph-2 wow animate__ animate__fadeInUp animated"
                style="visibility: visible; animation-name: fadeInUp;">Just via some simple steps, you will get what
                you’r looking for!</p>
        </div>
        <div class="mt-70">
            <div class="row">
                <div class="col-lg-4">
                    <div class="box-step step-1">
                        <h1 class="number-element">1</h1>
                        <h4 class="mb-20">Add Project Requirment<br class="d-none d-lg-block"></h4>
                        <p class="font-lg color-text-paragraph-2">Add Your Project Requirment<br
                                class="d-none d-lg-block">At No Cost</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box-step step-2">
                        <h1 class="number-element">2</h1>
                        <h4 class="mb-20">Select the best Person<br class="d-none d-lg-block"></h4>
                        <p class="font-lg color-text-paragraph-2">Select the best Person or <br
                                class="d-none d-lg-block">Agency to do your work </p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box-step">
                        <h1 class="number-element">3</h1>
                        <h4 class="mb-20">Get Work Completed <br class="d-none d-lg-block"></h4>
                        <p class="font-lg color-text-paragraph-2">Get Work Completed and <br
                                class="d-none d-lg-block">focus on your business</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="mt-50 text-center"><a class="btn btn-default">Get Started</a></div> -->
    </div>
</div>


<!--Let's talk section -->

<section class="letstalk">


    <a href="all-professionals">
        <div class style=" padding:2rem;  max-width:2000px; margin:0 auto;">

            <img src="https://sooprs.com/assets/images/join_sooprs.png"
                style="width:100%;height:auto" alt="hire-now" />

        </div>
    </a>

</section>




<!-- <div id="pageContent2"></div> -->
<div id="latest_tech_section"></div>
<div id="marketing_section"></div>












<!-- Why Choose us -->

<section>
    <div class="mb-5 mt-5">
        <div class="container mb-4">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 d-flex justify-content-center">
                    <h2> <span style="font-size: 2em; font-weight: 700;">Why</span> <br> <span
                            style="    font-size: 50px; color: blue;">Choose Us?</span> </h2>
                </div>

                <div class="col-lg-9 col-md-9 d-flex justify-content-center">
                    <p style="    font-size: 21px; padding: 20px;">
                        "Choose us for freelancing excellence—where collaboration meets
                        expertise. Our community-driven platform transforms projects into
                        unique journeys, delivering personalized solutions with dedication
                        and innovation. Elevate your freelancing experience by joining our
                        committed and talented community."
                    </p>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 bg-primary p-4 ">
                    <div class="p-5 text-light">
                        <img src="https://sooprs.com/assets/images/vector.png"
                            alt="clients-why-choose-us">
                        <p class="mt-3 " data-aos="zoom-in" style="font-size: 2em;">CLIENTS</p>
                        <p class="" data-aos="zoom-in" style="    font-size: 20px;">Freelancing excellence: Where
                            passion meets
                            precision, and professionals thrive in delivering
                            top-tier services.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 bg-dark p-4 ">
                    <div class="p-5 text-light">
                        <img src="https://sooprs.com/assets/images/vectortwo.png"
                            alt="clients-why-choose-us">
                        <p class="mt-3" data-aos="zoom-in" style="font-size: 2em;">PROFESSIONALS</p>
                        <p data-aos="zoom-in" style="    font-size: 20px;">Your vision, our expertise – crafting
                            freelance solutions
                            that exceed expectations.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="pt-3 pb-3">
    <div class="container mb-5">
        <div class="gtco-testimonials">
            <div class="text-start pb-3">
                <h2 class="section-title mb-10 wow animate__ animate__fadeInUp animated"
                    style="visibility: visible; animation-name: fadeInUp;">See Some <span
                        class="text-primary">Words</span> </h2>
                <p class="font-lg color-text-paragraph-2 wow animate__ animate__fadeInUp animated"
                    style="visibility: visible; animation-name: fadeInUp;">Thousands of user feed back to us!
                </p>
            </div>
            <div class="container">
                <div class="owl-carousel owl-theme review-slider">
                    <div class="item">
                        <div class="review-card">
                            <!-- <span class="quotation-icon"><img class="" src="<?php echo $SITE_URL ?>/assets/image/quotation-icon.svg" alt="img"></span> -->
                            <span class="quotation-icon"><i class="fa-solid fa-quote-left"></i></span>
                            <h4>Great Work</h4>
                            <p class="parra">“Sooprs is a great platform for you, I was fresher but have all the skill,
                                but was not getting jobs
                                I joined sooprs and start applying for different projects, some customers liked my
                                skills and trusted my
                                work, now I am doing full time work on sooprs.com”
                            </p>
                            <div class="star-rate">
                                <span>
                                    <i class="fa-solid fa-star filled"></i>
                                    <i class="fa-solid fa-star filled"></i>
                                    <i class="fa-solid fa-star filled"></i>
                                    <i class="fa-solid fa-star filled"></i>
                                    <i class="fa-solid fa-star filled"></i>
                                </span>
                            </div>
                            <div class="review-user">
                                <a href="javascript:void(0);"><img class="client-img"
                                        src="<?php echo $SITE_URL ?>/assets/image/chandan.png" alt="img"></a>
                                <h6 class="px-3"><a href="javascript:void(0);">Rohit</a><span></span>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="review-card">
                            <!-- <span class="quotation-icon"><img src="<?php echo $SITE_URL ?>/assets/image/quotation-icon.svg" alt="img"></span> -->
                            <span class="quotation-icon"><i class="fa-solid fa-quote-left"></i></span>

                            <h4>Seamless Experience</h4>
                            <p class="parra">“I was looking to start my own startup, I have the knowledge of my field,
                                but was lacking in IT skills,
                                but for hiring app development company it was very costly , so I decided to give work on
                                some freelancing
                                website. I will recommend all startups to use sooprs.com”
                            </p>
                            <div class="star-rate">
                                <span>
                                    <i class="fa-solid fa-star filled"></i>
                                    <i class="fa-solid fa-star filled"></i>
                                    <i class="fa-solid fa-star filled"></i>
                                    <i class="fa-solid fa-star filled"></i>
                                    <i class="fa-solid fa-star filled"></i>
                                </span>
                            </div>
                            <div class="review-user">
                                <a href="javascript:void(0);"><img class="client-img"
                                        src="<?php echo $SITE_URL ?>/assets/image/aman.jpg" alt="img"></a>
                                <h6 class="px-3"><a href="javascript:void(0);">Ritu Raj</a><span></span>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="review-card">
                            <!-- <span class="quotation-icon"><img src="<?php echo $SITE_URL ?>/assets/image/quotation-icon.svg" alt="img"></span> -->
                            <span class="quotation-icon"><i class="fa-solid fa-quote-left"></i></span>

                            <h4>Great Work</h4>
                            <p class="parra">“Great Platform, for getting your work done in quality, thanks rahul for
                                your premium work. I give the work through sooprs platform, and get timely
                                delivery and great reporting.”
                            </p>
                            <div class="star-rate">
                                <span>
                                    <i class="fa-solid fa-star filled"></i>
                                    <i class="fa-solid fa-star filled"></i>
                                    <i class="fa-solid fa-star filled"></i>
                                    <i class="fa-solid fa-star filled"></i>
                                    <i class="fa-solid fa-star filled"></i>
                                </span>
                            </div>
                            <div class="review-user">
                                <a href="javascript:void(0);"><img class="client-img"
                                        src="<?php echo $SITE_URL ?>/assets/image/prem.jpg" alt="img"></a>
                                <h6 class="px-3"><a href="javascript:void(0);">Manoj</a><span></span>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="review-card">
                            <!-- <span class="quotation-icon"><img src="<?php echo $SITE_URL ?>/assets/image/quotation-icon.svg" alt="img"></span> -->
                            <span class="quotation-icon"><i class="fa-solid fa-quote-left"></i></span>

                            <h4>Great Work</h4>
                            <p class="parra"> “I have joined sooprs in 2022 from then till now, I don't need to look for
                                any job, Thanks to sooprs
                                I am getting work from the luxury of my home”
                            </p>
                            <div class="star-rate">
                                <span>
                                    <i class="fa-solid fa-star filled"></i>
                                    <i class="fa-solid fa-star filled"></i>
                                    <i class="fa-solid fa-star filled"></i>
                                    <i class="fa-solid fa-star filled"></i>
                                    <i class="fa-solid fa-star filled"></i>
                                </span>
                            </div>
                            <div class="review-user">
                                <a href="javascript:void(0);"><img class="client-img"
                                        src="<?php echo $SITE_URL ?>/assets/image/user-review-pic.jpg" alt="img"></a>
                                <h6 class="px-3"><a href="javascript:void(0);">Sahil</a><span></span>
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section>
    <div class="container-fluid mb-5">
        <a href="https://sooprs.com/join-professional">
            <img data-aos="zoom-in"
                src="https://sooprs.com/assets/images/hire_now.png"
                alt="join-sooprs" style="width: -webkit-fill-available;">
        </a>
    </div>
</section>


<section class="faqs-section mb-5">
    <!-- ************FAQ*************** -->
    <div class="container-fluid">
        <div class="container py-5">
            <div class="row">
                <div class="col-md-4 d-flex align-items-center ">
                    <div class="FAQ col d-flex flex-column justify-content-center align-items-center">
                        <h2 class="" style="letter-spacing: 0.09rem; color: #212529;">Frequently Asked
                            <span style="color: #0053D0;"> Questions</span>
                        </h2>
                        <p style="color: #798389; font-weight: 400; font-size: 19px;">These are the most commonly asked
                            questions about <span style="color: #0053D0;">Sooprs.</span></p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-12 d-flex">
                            <!-- <div class="col-lg-5 d-flex" style="object-fit: cover; height: 300px; width: 400px">
                                <img src="./img/frequently-asked-questions-solution-concept.jpg" alt="">
                            </div> -->
                            <div class="col d-flex flex-column justify-content-center text-align-center faq-box">
                                <div class="accordion-item">
                                    <div class="accordion-header" onclick="toggleAccordion(this)">
                                        <i class="fa fa-plus accordion-icon" aria-hidden="true"></i>&nbsp; What is Sooprs?
                                    </div>
                                    <div class="accordion-content">
                                        <p>Sooprs make it easy for freelancers to find work and for businesses to find qualified
                                            freelancers. Variety: Sooprs offer a wide variety of projects to choose from, so
                                            freelancers can find projects that match their skills and interests.</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" onclick="toggleAccordion(this)"><i
                                            class="fa fa-plus accordion-icon" aria-hidden="true"></i>&nbsp; How do I get started
                                        on
                                        Sooprs as a freelancer?</div>
                                    <div class="accordion-content">
                                        <p>To get started on a Sooprs.com, you will typically need to create a profile and
                                            provide
                                            information about your skills and experience. You may also need to submit a
                                            portfolio of
                                            your work. Once you have created a profile, you can start bidding on projects.</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" onclick="toggleAccordion(this)"><i
                                            class="fa fa-plus accordion-icon" aria-hidden="true"></i>&nbsp; How to earn money
                                        with
                                        Sooprs?</div>
                                    <div class="accordion-content">
                                        <p>Sooprs gives 100% of your earned money to you without any commission. Your money is
                                            yours
                                            when task is approved by your Client. Just learn skills and start earning.</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" onclick="toggleAccordion(this)"><i
                                            class="fa fa-plus accordion-icon" aria-hidden="true"></i>&nbsp; How can I post a
                                        project
                                        in Sooprs?</div>
                                    <div class="accordion-content">
                                        <p>Just Signup as Client and Go to Post a Project given on header of sooprs.com or
                                            either
                                            click this link https://sooprs.com/post-a-project</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" onclick="toggleAccordion(this)"><i
                                            class="fa fa-plus accordion-icon" aria-hidden="true"></i>&nbsp; How to bid on a
                                        project?</div>
                                    <div class="accordion-content">
                                        <p>Just go to Browse Project section given on the header or either click this link
                                            https://sooprs.com/browse-job. Click on the arrow (->) on any project. Here you can
                                            place your bid on project detail page. Enjoy earning!</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" onclick="toggleAccordion(this)"><i
                                            class="fa fa-plus accordion-icon" aria-hidden="true"></i>&nbsp; Is there any fee to
                                        post
                                        a new project?</div>
                                    <div class="accordion-content">
                                        <p>No! You can post your projects free of charge here! Enjoy the hassle-free and
                                            time-saving
                                            project posting.</p>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <div class="accordion-header" onclick="toggleAccordion(this)"><i
                                            class="fa fa-plus accordion-icon" aria-hidden="true"></i>&nbsp; Is there any fee to
                                        place a bid on a project?</div>
                                    <div class="accordion-content">
                                        <p>Yes! We are offering free credits to place your bid. After a threshold limit, you can
                                            recharge your credit wallet.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ************FAQ*************** -->
</section>

<div id="scrollButtonContainer" style="display: none;">
    <div class="d-flex justify-content-between">
        <a href="<?php echo $SITE_URL ?>/all-professionals" class="float_button">
            <!-- <svg class="svgIcon" viewBox="0 0 512 512" height="1em" xmlns="http://www.w3.org/2000/svg"><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zm50.7-186.9L162.4 380.6c-19.4 7.5-38.5-11.6-31-31l55.5-144.3c3.3-8.5 9.9-15.1 18.4-18.4l144.3-55.5c19.4-7.5 38.5 11.6 31 31L325.1 306.7c-3.2 8.5-9.9 15.1-18.4 18.4zM288 256a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"></path></svg> -->
            I want to hire
        </a>
        <a href="<?php echo $SITE_URL ?>/browse-job" class="float_button">

            I want to work
        </a>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Get a reference to the button element
        var $scrollButton = $('#scrollButtonContainer');

        // Show the button when the user has scrolled halfway down the page
        $(window).scroll(function () {
            var scrollHeight = $(document).height();
            var scrollTop = $(window).scrollTop();
            var windowHeight = $(window).height();

            if (scrollTop > scrollHeight / 4) {
                $scrollButton.show("slow");
            } else {
                $scrollButton.hide("slow");
            }
        });
    });


</script>

<script>
    $(document).ready(function () {

        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });
    });



    function toggleAccordion(element) {
        const content = element.nextElementSibling;
        const icon = element.querySelector('.accordion-icon');

        content.classList.toggle('show');
        icon.classList.toggle('rotate');
    }

</script>

<?php include "./footer.php" ?>