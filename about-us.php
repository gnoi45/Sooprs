<?php

session_start();
include_once 'function.php';
include_once 'env.php';
include ('config/dbconn.php');

$userCredentials = new DB_con();

if (isset($_SESSION['id'])) {
    $username = $userCredentials->getUser($_SESSION['id'], 'join_professionals');
}
$title = 'About Us ';
$description = "Description";
$keywords = "key,words";
?>
<?php include "header2.php" ?>
<style>
    .bread-text p {
        position: relative;
        color: #ffffff;
        font-size: 3rem;
        text-align: center;
    }

    .about-section-top::before {
        content: "";
        background-image: url(https://res.cloudinary.com/dr4iluda9/image/upload/v1704696132/aboutus_wmg2dx.jpg);
        background-repeat: no-repeat;
        background-size: cover;
        position: absolute;
        background-position-y: bottom;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        opacity: 0.4;
    }



    /* *****************About section************************** */
    /* ol li a{
    font-size: 12px;
    font-weight: 500;
    } */

    .homeAbout {
        font-size: 12px;
        font-weight: 500;
    }

    .greater-than {
        font-size: 12px;
        font-weight: 500;
    }

    /* *********why-choose-sec section********************** */

    .why-choose-sec {
        /* background: #FDF6F1; */
        background: #d9e3ed;
        padding: 80px 0 56px;
    }

    /* @media (min-width: 992px) {
        .servicecontainer, .servicecontainer-lg, .servicecontainer-md, .servicecontainer-sm {
            max-width: 960px;
        }
    }

    @media (min-width: 768px) {
        .servicecontainer, .servicecontainer-md, .servicecontainer-sm {
            max-width: 720px;
        }
    }
    @media (min-width: 576px) {
        .servicecontainer, .servicecontainer-sm {
            max-width: 540px;
        }
    } */
    .about-us-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .about-us-header h2 {
        font-size: 28px;
        margin-bottom: 10px;
    }

    h2 {
        font-size: 32px;
        font-weight: 700;
    }

    .about-us-header p {
        max-width: 490px;
        margin: auto;
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    .about-us-header {
        text-align: center;
        margin-bottom: 40px;
    }

    /* row {
    --bs-gutter-x: 1.5rem;
    --bs-gutter-y: 0;
    display: flex;
    flex-wrap: wrap;
    margin-top: calc(-1* var(--bs-gutter-y));
    margin-right: calc(-.5* var(--bs-gutter-x));
    margin-left: calc(-.5* var(--bs-gutter-x));
} */

    @media (min-width: 992px) {
        .col-lg-4 {
            flex: 0 0 auto;
            width: 33.33333333%;
        }
    }

    .why-choose-card {
        background: #fff;
        box-shadow: 0px 4px 9px -1px rgba(19, 16, 34, 0.03),
            0px 4.4px 20px -1px rgba(19, 16, 34, 0.05);
        border-radius: 10px;
        padding: 24px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        margin-bottom: 24px;
        transition: 0.5s all;
    }

    .card-icon {
        width: 63px;
        height: 71px;
        border-radius: 64% 36% 26% 74% / 66% 75% 25% 34%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #d9e3ed;
        margin: 0 auto 15px;
    }

    img,
    svg {
        vertical-align: middle;
    }

    .why-choose-card h4 {
        font-size: 18px;
        margin-bottom: 15px;
    }

    @media (max-width: 992px) {
        .why-choose-card h4 {
            font-size: 28px;
        }
    }

    h4 {
        font-size: 20px;
        font-weight: 600;
    }

    .why-choose-card p {
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        margin-bottom: 0;
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    .why-choose-card {
        background: #fff;
        box-shadow: 0px 4px 9px -1px rgba(19, 16, 34, 0.03),
            0px 4.4px 20px -1px rgba(19, 16, 34, 0.05);
        border-radius: 10px;
        padding: 24px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        margin-bottom: 24px;
        transition: 0.5s all;
    }

    /* *********************************** */
    @media (max-width: 580px) {
        #display {
            display: none;
        }
    }

    .about-us-head h6 {
        color: #0077ff;
        /* color: #F7660E; */
        margin-bottom: 5px;
        font-size: 16px;
        font-weight: 600;
        font-family: "Inter", sans-serif;
    }

    .about-us-head h2 {
        font-size: 28px;
        max-width: 500px;
        font-family: "Inter", sans-serif;
    }

    p {
        display: block;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        unicode-bidi: isolate;
        font-family: "Inter", sans-serif;
        font-size: 16px;
    }

    @media (max-width: 992px) {
        .parra {
            font-size: 18px;
            /* color: #0077ff; */
        }
    }

    .item h4 {
        /* width: 200px;
    height: 100px; */
        /* background-color: #ff6900; */
    }

    .client-img {}

    .quotation-icon {
        width: 15px;
        height: 12px;
        display: block;
        /* width: 100%; */
    }

    .quotation {
        width: 15px;
        height: 12px;
        color: #0077ff;
    }

    /* slider css  */
    .container-fluid {
        /* background-color: #FDF6F1;    */
        /* background-color: #d9e3ed; */
    }

    .review-card {
        background: #fff;
        border-radius: 10px;
        padding: 24px;
    }

    .owl-carousel .quotation-icon img {
        width: auto;
    }

    .owl-carousel .owl-item img {
        display: block;
        /* width: 100%; */
    }

    .review-card h4 {
        font-size: 20px;
        margin: 24px 0 15px;
    }

    .review-card p {
        margin-bottom: 15px;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
    }

    .star-rate span {
        font-size: 14px;
        color: #4f4f4f;
        display: inline-flex;
        align-items: center;
        font-weight: 600;
    }

    .star-rate span i.filled {
        color: rgba(255, 185, 6, 1);
        /* color: #0077FF; */
    }

    .star-rate span i {
        color: #9b9b9b;
        margin-right: 5px;
    }

    .fa-star:before {
        content: "\f005";
    }

    .review-user {
        display: flex;
        align-items: center;
        padding-top: 24px;
        margin-top: 24px;
        border-top: 1px dashed #b4b4b4;
    }

    .owl-carousel .review-user img {
        width: 50px !important;
        height: 50px;
        border-radius: 50%;
        margin-right: 15px;
        object-fit: cover;
    }

    .review-user h6 {
        margin-bottom: 0;
        font-size: 16px;
    }

    .review-user h6 span {
        display: block;
        font-size: 14px;
        color: #4f4f4f;
        margin-top: 3px;
    }

    .owl-carousel.review-slider .owl-nav {
        display: flex;
        justify-content: center;
        margin-top: 40px;
    }

    .owl-carousel .owl-dots.disabled,
    .owl-carousel .owl-nav.disabled {
        display: block !important;
    }

    /* *********** */
    .review-user h6 {
        margin-bottom: 0;
        font-size: 16px;
    }

    h6 {
        font-size: 16px;
        font-weight: 600;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        color: #1d1d1d;
    }

    a {
        color: #1d1d1d;
        text-decoration: none;
        transition: ease all 0.5s;
        -webkit-transition: ease all 0.5s;
        -ms-transition: ease all 0.5s;
    }

    .review-user h6 span {
        display: block;
        font-size: 14px;
        color: #4f4f4f;
        margin-top: 3px;
    }

    .owl-carousel.review-slider .owl-nav button {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px solid #cdcdcd;
        border-radius: 50%;
        margin-right: 10px;
        color: rgba(29, 29, 29, 1);
        transition: 0.5s all;
    }

    .review-slider:hover {
        /* color: #7a749a; */
    }

    .owl-carousel .owl-nav button.owl-prev:hover {
        background-color: #0077ff;
    }

    .owl-carousel .owl-nav button.owl-next:hover {
        background-color: #0077ff;
    }

    /* ****************hero css ********** */

    .start-seller-sec {
        background-color: #d9e3ed;
        padding: 40px 0;
        height: 540px;
        margin: 10px 0 10px 0;
    }

    /* @media (min-width: 1400px) {

        .heroContainer,
        .heroContainer-lg,
        .heroContainer-md,
        .heroContainer-sm,
        .heroContainer-xl,
        .heroContainer-xxl {
            max-width: 1320px;
        }
    }

    @media (min-width: 1200px) {

        .heroContainer,
        .heroContainer-lg,
        .heroContainer-md,
        .heroContainer-sm,
        .heroContainer-xl {
            max-width: 1140px;
        }
    }

    @media (min-width: 992px) {

        .heroContainer,
        .heroContainer-lg,
        .heroContainer-md,
        .heroContainer-sm {
            max-width: 960px;
        }
    }

    @media (min-width: 768px) {

        .heroContainer,
        .heroContainer-md,
        .heroContainer-sm {
            max-width: 720px;
        }
    }

    @media (min-width: 576px) {

        .heroContainer,
        .heroContainer-sm {
         
        }
    } */

    .heroContainer,
    .heroContainer-fluid,
    .heroContainer-lg,
    .heroContainer-md,
    .heroContainer-sm,
    .heroContainer-xl,
    .heroContainer-xxl {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        width: 100%;
        padding-right: calc(var(--bs-gutter-x) * 0.5);
        padding-left: calc(var(--bs-gutter-x) * 0.5);
        margin-right: auto;
        margin-left: auto;
    }

    .seller-inner-img img {
        border-radius: 10px;
        width: 100%;
        height: 400px;
        object-fit: cover;
    }

    .img-fluid {
        max-width: 100%;
        height: auto;
    }

    .d-flex {
        display: flex !important;
    }

    @media (min-width: 992px) {
        .col-lg-6 {
            flex: 0 0 auto;
            width: 50%;
        }
    }

    /* .row>* {
    flex-shrink: 0;
    width: 100%;
    max-width: 100%;
    padding-right: calc(var(--bs-gutter-x)* .5);
    padding-left: calc(var(--bs-gutter-x)* .5);
    margin-top: var(--bs-gutter-y);
} */

    .seller-info-content {
        background: #fff;
        box-shadow: 0px 4.4px 12px -1px rgba(222, 222, 222, 0.36);
        border-radius: 10px;
        padding: 40px;
        display: flex;
        align-items: center;
        flex-direction: column;
        justify-content: center;
        margin: auto 0 auto -100px;
        height: 390px;
    }

    .w-100 {
        width: 100% !important;
        /* height: 380px; */
        display: flex;
        justify-content: start;
        align-items: start;
    }

    /* user agent stylesheet */
    div {
        display: block;
        unicode-bidi: isolate;
    }

    .row {
        --bs-gutter-x: 1.5rem;
        --bs-gutter-y: 0;
        display: flex;
        flex-wrap: wrap;
        margin-top: calc(-1 * var(--bs-gutter-y));
        margin-right: calc(-0.5 * var(--bs-gutter-x));
        margin-left: calc(-0.5 * var(--bs-gutter-x));
    }

    .seller-info-content h3 {
        font-size: 16px;
        /* margin-bottom: 15px; */
    }

    h3 {
        font-size: 24px;
        font-weight: 600;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        color: #1d1d1d;
    }

    @media (min-width: 1200px) {

        .h3,
        h3 {
            font-size: 1.75rem;
        }
    }

    .h3,
    h3 {
        font-size: calc(1.3rem + 0.6vw);
    }

    .h1,
    .h2,
    .h3,
    .h4,
    .h5,
    .h6,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin-top: 0;
        margin-bottom: 0.5rem;
        font-weight: 500;
        line-height: 1.2;
        color: var(--bs-heading-color);
    }

    /* user agent stylesheet */
    h3 {
        display: block;
        font-size: 1.17em;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-weight: bold;
        unicode-bidi: isolate;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        color: #1d1d1d;
    }

    @media (min-width: 1200px) {

        .h3,
        h3 {
            font-size: 8px;
        }
    }

    .seller-info-content p {
        margin-bottom: 15px;
    }

    /* .seller-info{
    margin: 0;
} */
    @media (max-width: 992px) {
        .seller-info {
            /* margin-top: 100px; */
        }
    }

    @media (max-width: 768px) {
        .seller-info {
            /* margin-top: 100px; */
        }
    }

    @media (max-width: 576px) {
        .seller-info {
            /* margin-top: 100px; */
        }
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    *,
    ::after,
    ::before {
        box-sizing: border-box;
    }

    /* user agent stylesheet */
    p {
        display: block;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        unicode-bidi: isolate;
    }

    .seller-info-content p {
        margin-bottom: 15px;
    }

    .seller-para {
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
    }

    p {
        margin-top: 0;
        margin-bottom: 1rem;
    }

    .w-100 {
        width: 100% !important;
    }

    .d-flex {
        display: flex !important;
    }

    .sllers-list {
        display: flex;
        /* align-items: center; */
        /* flex-direction: column; */
        /* align-items: self-start; */
        /* flex-shrink: 0; */
        /* margin-right: 15px; */
    }

    .sllers-list ul li {
        font-size: 11px;
    }

    dl,
    ol,
    ul {
        margin-top: 0;
        /* margin-bottom: 1rem; */
    }

    ol,
    ul {
        padding-left: 2rem;
    }

    *,
    ::after,
    ::before {
        box-sizing: border-box;
    }

    ul {
        display: block;
        list-style-type: disc;
        margin-block-start: 1em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        padding-inline-start: 40px;
        unicode-bidi: isolate;
    }

    ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    /* user agent stylesheet */
    ul {
        list-style-type: disc;
    }

    .btn-primary {
        /* background: #3203b4; */
        /* border-radius: 10px; */
        border: 1px solid #d9e3ed;
        -webkit-transition: all 0.7s;
        -moz-transition: all 0.7s;
        -o-transition: all 0.7s;
        transition: all 0.7s;
        padding: 8px 22px;
        color: #fff;
        font-weight: 500;
        font-size: 13px;
        display: inline-flex;
        align-items: start;
        justify-content: start;
    }

    .bi-shield-check {
        color: #3203b4;
        /* font-size: 15px; */
    }

    li {
        list-style: none;
        display: flex;
        justify-content: start;
        align-items: start;
    }

    .w-auto {
        width: auto !important;
    }

    .w-100 {
        width: 100% !important;
    }

    .seller-small-img img {
        border-radius: 10px;
        width: 100%;
        height: 500px;
        object-fit: cover;
    }

    .img-fluid {
        /* max-width: 100%; */
        height: auto;
    }

    img,
    svg {
        vertical-align: middle;
    }

    .seller-inner-img img {
        border-radius: 10px;
        width: 100%;
        height: 460px;
        object-fit: cover;
    }

    .seller-info-content.w-100 {
        /* margin: 0; */
        width: 100% !important;
        height: 440px;
    }

    @media (max-width: 992px) {
        .seller-info-content {
            /* margin-top: 10px; */
            /* display: flex !important;
    justify-content: center;
    align-items: center;
    text-align: center; */
            margin-left: 10px;
            /* width: 100% !important; */
        }
    }

    @media (max-width: 992px) {
        .seller-inner-img img {
            width: 100% !important;
            object-fit: cover;
        }
    }

    @media (max-width: 768px) {
        .seller-info-content {
            /* display: flex !important;
    justify-content: center;
    align-items: center;
    text-align: center; */
            /* margin-left: 10px; */
        }
    }

    @media (max-width: 576px) {
        .seller-info-content {
            /* margin-top: 10px; */
            /* display: flex !important;
    justify-content: center;
    align-items: center; */
            font-size: 22px;
            line-height: 2;
        }
    }

    @media (max-width: 576px) {
        .seller-small-img {
            display: none;
        }
    }

    .vission-parra {
        font-size: 12px;
        font-family: "Inter", sans-serif;
        font-weight: 400;
        line-height: 16px;
        letter-spacing: 0.01rem;
        margin: 0;
    }

    @media (max-width: 992px) {
        .seller-info-content h3 {
            font-size: 22px;
            padding-bottom: 2rem;
        }
    }

    @media (max-width: 992px) {
        .vission-parra {
            margin: 16px 0 16px 0;
            font-size: 16px;
            letter-spacing: 0.06rem;
            line-height: 1.5;
        }
    }

    @media (max-width: 992px) {
        .seller-info-content h3 {}
    }

    .check {
        font-size: 15px;
        margin: 6px;

    }

    @media (max-width: 992px) {
        .check {
            font-size: 17px;
        }
    }

    .mission_vision_section {}
</style>

<section class="about-section-top">
    <div class="container">
        <div class="bread-text">
            <p class="d-none d-md-block">About Us</p>
            <p class="d-lg-none d-md-none" style="    font-size: 2rem!important;">About Us</p>
        </div>
    </div>
</section>


<!-- *************About Section**************** -->
<div class="container my-5">
    <div class="row align-items-center">
        <div class="col-lg-6">
            <div class="row ">
                <div class="col-sm-6">
                    <div class="about-inner-img d-flex justify-content-center ">
                        <img src="<?php echo $SITE_URL ?>/assets/image/ai-5.webp" class="img-fluid rounded" alt="img">
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="row gap-3 h-100">
                        <div class="col-sm-12">
                            <div class="about-inner-img mb-1" id="display">
                                <img src="<?php echo $SITE_URL ?>/assets/image/man-using-tablet.webp"
                                    class="img-fluid rounded" alt="img">
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="about-inner-img h-100" id="display">
                                <img src="<?php echo $SITE_URL ?>/assets/image/programing-cloud.webp"
                                    class="img-fluid rounded h-100" alt="img" style="-webkit-fill-available">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="about-us-info">
                <div class="about-us-head my-5">
                    <h6>About Us</h6>
                    <h2>We Provide Best solutions For Your Business</h2>
                    <p class="parra">Sooprs is an online platform, with a mission of helping people or businesses to
                        transform
                        digitally. We have seen many issues in this field, as a lot of businesses want to transform
                        themselves digitally but due to lack of relevant knowledge are not able to do so. Some got
                        cheated or not able to understand how all of this works. We at Sooprs have only one mission
                        in our mind to help our clients in their digital transformation journey. We first try to
                        understand the needs of our clients, we suggest that they once go through a round of
                        counselling where they can speak with our experts who have years of experience in their
                        respective fields. Based on their discussion we suggest to them what is best for their
                        business and based on that also give them the idea of how much budget will be needed for the
                        project. And according to their budget we assign them experts, who will develop their
                        product or service.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- *******************************2nd section**************************** -->
<section class="why-choose-sec py-4">
    <div class="container servicecontainer ">
        <div class="about-us-header d-flex flex-column justify-content-center align-items-center">
            <h2>Why Choose <span class="text-primary">Us</span></h2>
            <p class="parra">We prioritize your satisfaction through personalized solutions and a commitment to
                excellence.</p>
        </div>
        <div class="row">
            <div class="col-lg-4  mb-3 ">
                <div class="why-choose-card h-100">
                    <div class="card-icon">
                        <img style="height: 25px; width: 25px; object-fit: cover;"
                            src="<?php echo $SITE_URL ?>/assets/image/commitment.png" alt="img">
                    </div>
                    <h4>Service Commitment</h4>
                    <p class="parra"> We deliver top-tier solutions, ensuring satisfaction through reliability,
                        transparency, and a dedication to exceeding expectations.
                    </p>
                </div>
            </div>
            <div class="col-lg-4  mb-3 ">
                <div class="why-choose-card h-100">
                    <div class="card-icon d-flex justify-content-center ">
                        <img style="height: 25px; width: 25px; object-fit: cover;"
                            src="<?php echo $SITE_URL ?>/assets/image/experience.png" alt="img">
                    </div>
                    <h4>Fabulous Experience</h4>
                    <p class="parra"> Our intuitive interface offers an effortless journey, from browsing
                        services to booking and beyond.
                    </p>
                </div>
            </div>
            <div class="col-lg-4  mb-3 ">
                <div class="why-choose-card h-100">
                    <div class="card-icon">
                        <img style="height: 25px; width: 25px; object-fit: cover;"
                            src="<?php echo $SITE_URL ?>/assets/image/security.png" alt="img">
                    </div>
                    <h4>Data Secure</h4>
                    <p class="parra"> We employ robust encryption, stringent access controls, and ongoing
                        monitoring to safeguard your information.
                    </p>
                </div>
            </div>
            <div class="col-lg-4  mb-3 ">
                <div class="why-choose-card h-100">
                    <div class="card-icon d-flex justify-content-center">
                        <!-- <img src="<?php echo $SITE_URL ?>/assets/image/why-choose-icon-04.svg" alt="img"> -->
                        <img style="height: 25px; width: 25px; object-fit: cover;"
                            src="<?php echo $SITE_URL ?>/assets/image/fast.png" alt="img">

                    </div>
                    <h4>Fast Service</h4>
                    <p class="parra"> We prioritize speed without compromising quality, ensuring your
                        needs are met promptly and effectively
                    </p>
                </div>
            </div>
            <div class="col-lg-4 mb-3 ">
                <div class="why-choose-card h-100">
                    <div class="card-icon d-flex justify-content-center">
                        <!-- <img src="<?php echo $SITE_URL ?>/assets/image/why-choose-icon-05.svg" alt="img"> -->
                        <img style="height: 25px; width: 25px; object-fit: cover;"
                            src="<?php echo $SITE_URL ?>/assets/image/secure-payment.png" alt="img">

                    </div>
                    <h4>Secure Payment</h4>
                    <p class="parra"> Enjoy peace of mind with encrypted transactions, trusted gateways,
                        and a commitment to safeguarding your information.
                    </p>
                </div>
            </div>
            <div class="col-lg-4  mb-3 ">
                <div class="why-choose-card h-100">
                    <div class="card-icon d-flex justify-content-center">
                        <!-- <img src="<?php echo $SITE_URL ?>/assets/image/why-choose-icon-06.svg" alt="img"> -->
                        <img style="height: 25px; width: 25px; object-fit: cover;"
                            src="<?php echo $SITE_URL ?>/assets/image/dedicated.png" alt="img">
                    </div>
                    <h4>Dedicated Support</h4>
                    <p class="parra"> Our 24/7 customer service team is here to assist you every step of the way.
                        Experience personalized assistance for a seamless journey
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- carousel 3rd -->
<div class="container-fluid bg-white pt-5">
    <div class="container">
        <div class="text-start pb-3">
            <h2 class="section-title mb-10 wow animate__ animate__fadeInUp animated"
                style="visibility: visible; animation-name: fadeInUp;">See Some <span class="text-primary">Words</span>
            </h2>
            <p class="font-lg color-text-paragraph-2 wow animate__ animate__fadeInUp animated"
                style="visibility: visible; animation-name: fadeInUp;">Thousands of user feed back to us!
            </p>
        </div>
        <div class="owl-carousel owl-theme review-slider">
            <div class="item">
                <div class="review-card">
                    <!-- <span class="quotation-icon"><img class="" src="<?php echo $SITE_URL ?>/assets/image/quotation-icon.svg" alt="img"></span> -->
                    <span class="quotation-icon"><i class="fa-solid fa-quote-left"></i></span>
                    <h4>Great Work</h4>
                    <p class="parra">“Sooprs is a great platform for you, I was fresher but have all the skill, but was
                        not getting jobs
                        I joined sooprs and start applying for different projects, some customers liked my skills and
                        trusted my
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
                    <p class="parra">“I was looking to start my own startup, I have the knowledge of my field, but was
                        lacking in IT skills,
                        but for hiring app development company it was very costly , so I decided to give work on some
                        freelancing
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
                    <p class="parra">“Great Platform, for getting your work done in quality, thanks rahul for your
                        premium work. I give the work through sooprs platform, and get timely
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
                    <p class="parra"> “I have joined sooprs in 2022 from then till now, I don't need to look for any
                        job, Thanks to sooprs
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
<!-- **********Hero section 4th************* -->
<!-- <div class="container-fluid" style="background-color: red;"> -->
<div class="container my-5">
    <div class="row align-items-center">

        <div class="col-lg-6 ">
            <div class="about-us-info">
                <div class="about-us-head my-5">
                    <h2>Vission</h2>
                    <p class="parra">At SOOPRS, we connect professionals and clients in a digital ecosystem that values
                        innovation and excellence. Our platform aims to be the top destination for freelance work,
                        fostering a global community where talent meets opportunity.
                    </p>
                </div>
                <div class="about-us-head my-5">
                    <h2>Mission</h2>
                    <p class="parra">At SOOPRS, we empower professionals globally with a digital space where talent
                        meets opportunity. We're revolutionizing the freelance experience, fostering a community focused
                        on inclusivity, innovation, and growth.
                    </p>
                    <div class="">
                        <div class="">
                            <li class="check">
                                <span class="me-3"><i class="fa-regular fa-circle-check"></i></span>Set your prices
                            </li>
                            <li class="check"><span class="me-3"><i
                                        class="fa-regular fa-circle-check"></i></span>Flexible
                                schedule</li>
                            <li class="check text-start"><span class="me-3"><i
                                        class="fa-regular fa-circle-check"></i></span>Build
                                your
                                reputation</li>
                            <li class="check"><span class="me-3"><i
                                        class="fa-regular fa-circle-check"></i></span>Provide 24/7
                                support</li>
                        </div>
                        <a href="<?php echo $SITE_URL ?>/post-a-project" class="btn btn-primary w-auto my-2">Post a
                            Project</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 ">
            <div class="row ">
                <div class="col-sm-12">
                    <div class="about-inner-img d-flex justify-content-center mission_vision_section"
                        style="background:url('<?php echo $SITE_URL ?>/assets/image/971.webp');background-size: cover;background-position: center;background-repeat: no-repeat;height: 500px;width: -webkit-fill-available;    border-radius: 10px;">
                        <!-- <img src="<?php echo $SITE_URL ?>/assets/image/971.jpg" class="img-fluid rounded" alt="img"> -->
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

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

</script>
<?php include "footer.php" ?>