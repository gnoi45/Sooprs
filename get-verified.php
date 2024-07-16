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
    .about-us-section {
        padding: 50px 0;
    }

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

    /* get verified css  */


    .why-choose-sec {
        /* background: #FDF6F1; */
        background: #d9e3ed;
        padding: 80px 0 56px;
    }

    .about-us-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .about-us-header h2 {
        /* font-size: 2.5rem; */
        font-weight: 650;
        margin-bottom: 10px;
    }



    .about-us-header p {
        max-width: 800px;
        margin: auto;
    }


    .about-us-header {
        text-align: center;
        margin-bottom: 40px;
    }

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



    .why-choose-card p {
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        margin-bottom: 0;
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


    @media (max-width: 992px) {
        .parra {
            /* font-size: 18px; */
            /* color: #0077ff; */
        }
    }

    /* *****How to Get Verified******* */




    .section-title {
        font-size: 1.5rem;
        font-weight: 500;
        margin-top: 1rem;
    }

    .fingerprint {
        width: 50px;
        height: 70px;
        /* margin-bottom: 0rem; */
        object-fit: contain;
    }

    .list {
        font-size: 1rem;
        margin-bottom: 0.2rem;
    }

    @media (min-width: 576px) {
        .fingerprint {
            width: 70px;
            /* margin-top: 20px; */
        }

        .section-title {
            font-size: 1.5rem;
        }

        .list {
            font-size: 1.1rem;
        }
    }

    @media (min-width: 768px) {
        .fingerprint {
            width: 100px;
            /* margin-top: 20px; */

        }

        .section-title {
            font-size: 1.6rem;
        }

        .list {
            font-size: 1rem;
        }
    }

    /* FAQ start  */
    /* ***** FAQ *********** */
    .accordion-item {
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 10px;
        overflow: hidden;
        background: white;
        padding: 10px;

    }

    .accordion-header {
        color: #000;
        font-weight: 600;
        cursor: pointer;
        text-align: left;
        transition: background-color 0.3s ease;
        font-weight: 650;
    }

    .accordion-header:hover {
        background-color: #f8f8f8;
    }

    .accordion-content {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.5s ease, padding 0.5s ease;
        padding: 0 15px;
        background-color: white;
    }

    .accordion-content p {
        margin: 0;
        font-size: 0.9rem;
    }

    .accordion-content.show {
        max-height: 200px;
        padding: 15px;
    }

    .accordion-icon {
        transition: transform 0.5s ease;
        font-size: 16px;
    }

    .accordion-icon.rotate {
        transform: rotate(45deg);
        color: red !important;
    }

    @media (max-width: 992px) {
        .accordion-header {
            font-size: 1em;
        }
    }

    @media (max-width: 768px) {
        .accordion-header {
            font-size: 1em;
        }
    }

    .accordion-content {
        padding: 0 10px;
    }

    .accordion-content.show {
        padding: 10px;
    }

    .poster {
        object-fit: cover;
        width: 100%;
        margin: 30px 0;
        padding: 0;
    }

    .faq-box {
        background: url("https://sooprs.com/assets/image/faq-bg.png");
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        padding: 20px;
    }

    .f-asked {
        font-weight: 700;
        font-size: 36px;
    }


    .round-add-btn {
        border-radius: 10%;
        width: 100px;
        height: 65px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px #878787 solid;
        border-style: dashed;
        overflow: hidden;
    }

    .front-image-col,
    .back-image-col {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
</style>

<script>
    // var site_url = "https://sooprs.com/";
    //  function backAfterLogin(){
    //     console.log("backAfterLogin running");
    //     localStorage.setItem('getVerifiedAfterLogin',site_url+'/get-verified');
    //     window.location.href = site_url+'/login-professional';
    // }
</script>

<section class="about-section-top">
    <div class="container">
        <div class="bread-text">
            <p class="d-none d-md-block">Get Verified</p>
            <p class="d-lg-none d-md-none" style="    font-size: 2rem!important;">Get Verified</p>
        </div>
    </div>
</section>

<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 d-flex justify-content-center align-items-center my-4">
                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <img style="height: 60px; width: 60px; margin-top: 0px"
                            src="<?php echo $SITE_URL ?>/assets/img/checkmark-icon-removebg-preview.png" alt="">
                        <h1 class="mx-1" style="margin: 0;">Get Verified on <span
                                style="font-size: 30px;color:#006aff">Sooprs.com</span></h1>
                    </div>

                    <p class="text-start my-4" style="">
                        Welcome to <span>Sooprs.com, </b></span>your trusted freelancer marketplace. We are committed to
                        providing a secure and reliable platform for both freelancers and clients. Our verification
                        process is
                        designed to enhance trust and transparency, making it easier for you to connect with the right
                        people.
                        Here’s how getting verified on Sooprs.com can benefit you.
                    </p>
                    <?php if (isset($_SESSION["id"])) { ?>
                        <button class="btn btn-primary custom px-5 py-2 openModalButton" data-bs-toggle="modal"
                            data-bs-target="#getVerifiedModal">Get Verified</button>

                    <?php } else { ?>
                        <button class="btn btn-primary custom px-5 py-2" onclick="backAfterLogin()">Get Verified</button>
                    <?php } ?>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-center my-4">
                <img class="img-fluid" style="max-height: 500px;"
                    src="<?php echo $SITE_URL ?>/assets/img/get-verified-vector.jpg" alt="">
            </div>
        </div>
    </div>
</div>

<section class="why-choose-sec py-4">
    <div class="container servicecontainer ">
        <div class="about-us-header d-flex flex-column justify-content-center align-items-center">
            <h2>Why Get <span style="color:#006aff">Verified ?</span></h2>
            <p class="parra text-secondary" style="">We prioritize your
                satisfaction through personalized solutions and a commitment to
                excellence.</p>
        </div>
        <div class="row">
            <div class="col-lg-4 ">
                <div class="why-choose-card d-flex flex-column justify-content-center align-items-center">
                    <div class="card-icon">
                        <img style="height: 25px; width: 25px; object-fit: cover;"
                            src="<?php echo $SITE_URL ?>/assets/image/commitment.png" alt="img">
                    </div>
                    <h4>1. Build Trust and Credibility</h4>
                    <p class="parra">A verified badge next to your name signals to potential clients that you are a
                        trustworthy and credible freelancer. It assures them that your identity has been confirmed
                        by Sooprs.com, which can increase your chances of landing projects.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="why-choose-card">
                    <div class="card-icon d-flex justify-content-center ">
                        <img style="height: 25px; width: 25px; object-fit: cover;"
                            src="<?php echo $SITE_URL ?>/assets/image/career_9673596.png" alt="img">
                    </div>
                    <h4>2. Stand Out from the Crowd</h4>
                    <p class="parra"> In a competitive marketplace, a verified badge helps you stand out. Clients
                        often prefer to work with verified freelancers as it gives them an added layer of security
                        and confidence in the freelancer’s profile.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="why-choose-card">
                    <div class="card-icon d-flex justify-content-center ">
                        <img style="height: 25px; width: 25px; object-fit: cover;"
                            src="<?php echo $SITE_URL ?>/assets/image/experience.png" alt="img">
                    </div>
                    <h4>3. Enhanced Profile Visibility</h4>
                    <p class="parra"> Verified profiles are given priority in search results and recommendations.
                        This means your profile will be more visible to potential clients, increasing your
                        opportunities for engagement and project offers.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="why-choose-card">
                    <div class="card-icon">
                        <img style="height: 25px; width: 25px; object-fit: cover;"
                            src="<?php echo $SITE_URL ?>/assets/image/trust.png" alt="img">
                    </div>
                    <h4>4. Higher Trust Scores</h4>
                    <p class="parra">Verification contributes to a higher trust score on our platform. This not only
                        boosts your reputation but also may lead to better ratings and reviews from clients, further
                        enhancing your profile’s attractiveness.
                    </p>
                </div>
            </div>
            <div class="col-lg-4 ">
                <div class="why-choose-card">
                    <div class="card-icon d-flex justify-content-center">
                        <!-- <img src="<?php echo $SITE_URL ?>/assets/image/why-choose-icon-04.svg" alt="img"> -->
                        <img style="height: 25px; width: 25px; object-fit: cover;"
                            src="<?php echo $SITE_URL ?>/assets/image/fast.png" alt="img">

                    </div>
                    <h4>5. Access to Premium Opportunities</h4>
                    <p class="parra">Many clients specifically seek out verified freelancers for their projects. By
                        getting verified, you unlock access to premium job listings and opportunities that might not
                        be available to non-verified users.
                    </p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="why-choose-card">
                    <div class="card-icon d-flex justify-content-center">
                        <!-- <img src="<?php echo $SITE_URL ?>/assets/image/why-choose-icon-05.svg" alt="img"> -->
                        <img style="height: 25px; width: 25px; object-fit: cover;"
                            src="<?php echo $SITE_URL ?>/assets/image/secure-payment.png" alt="img">

                    </div>
                    <h4>6. Secure Transactions</h4>
                    <p class="parra">Verification helps in ensuring that transactions are secure and reliable. Both
                        freelancers and clients feel more secure in dealing with verified users, leading to smoother
                        and more successful project completions.
                    </p>
                </div>
            </div>
            <!-- <div class="col-lg-4 ">
                    <div class="why-choose-card">
                        <div class="card-icon d-flex justify-content-center">
                            <img style="height: 25px; width: 25px; object-fit: cover;" src="<?php echo $SITE_URL ?>/assets/image/dedicated.png"
                                alt="img">
                        </div>
                        <h4>7. Community Trust</h4>
                        <p class="parra"> Join a community of professionals who value trust and security. Being verified
                            places you in a network of like-minded individuals and businesses who prioritize
                            professionalism and integrity.
                        </p>
                    </div>
                </div> -->
        </div>
    </div>
</section>

<!-- ********Get Verify************ -->
<div class="container my-5">
    <div class="row text-center">
        <h2 class="mb-1">How to Get <span style="color:#006aff">Verified ?</span></h2>
        <p class="text-center text-secondary m-0">Getting verified on Sooprs.com is a simple and straightforward process
        </p>
    </div>
    <div class="row d-flex justify-content-center my-4">
        <div class="col-md-4 px-2 text-center">
            <img class="fingerprint" src="<?php echo $SITE_URL ?>/assets/img/unlock_16176852.png" alt="">
            <h4 class="section-title text-">What is required?</h4>
            <p class="list text-"><b> To apply you must have an up to date profile and be: </b></p>
            <div class="d-flex align-items-center justify-content-center">
                <ul class="list-unstyled text-start">
                    <li class="list"> <span><i class="fa-regular fa-circle-check"></i></span> Log In to Your Account
                    </li>
                    <li class="list"> <span><i class="fa-regular fa-circle-check"></i></span> Submit Your Documents</li>
                    <li class="list"> <span><i class="fa-regular fa-circle-check"></i></span> Verification Review</li>
                    <li class="list"> <span><i class="fa-regular fa-circle-check"></i></span> Get Your Verified Badge
                    </li>
                    <!-- <img src="<?php echo $SITE_URL ?>/assets/img/checkmark-icon-removebg-preview.png" alt=""> -->
                </ul>
            </div>
        </div>
        <div class="col-md-4 px-2 text-center">
            <img class="fingerprint" src="<?php echo $SITE_URL ?>/assets/img/recovery_10279517.png" alt="">
            <h4 class="section-title">How long does it take?</h4>
            <p class="list" style="">After applying, our agents will <br>
                begin reviewing your application. <br> This process is usually complete <br> within 1 to 2 business
                days.</p>
        </div>
        <div class="col-md-3 px-2 text-center">
            <img class="fingerprint" src="<?php echo $SITE_URL ?>/assets/img/workflow_12450707.png" alt="">
            <h4 class="section-title">What is the process?</h4>
            <p class="list" style="">Once your application is reviewed, an agent will schedule a video interview. If
                successful, your blue Verified badge will be
                activated.</p>
        </div>
    </div>
</div>

<!-- ******FAQ******** -->

<div class="container-fluid" style="background: #d9e3ed;">
    <section class="faqs-section">
        <div class="container-fluid">
            <div class="container py-5">
                <div class="row">
                    <div class="col-md-4 d-flex align-items-center">
                        <div class="FAQ col d-flex flex-column justify-content-center align-items-center">
                            <h2 class="f-asked" style="letter-spacing: 0.09rem; color: #212529;">Frequently Asked
                                <span style="color: #0053D0;">Questions</span>
                            </h2>
                            <p style="color: #798389; font-weight: 400; font-size: 19px;">These are the most commonly
                                asked questions about <span style="color: #0053D0;">Sooprs.</span></p>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-12 d-flex">
                                <div class="col d-flex flex-column justify-content-center text-align-center faq-box">
                                    <div class="accordion-item">
                                        <div class="accordion-header" onclick="toggleAccordion(this)">
                                            <i class="fa fa-plus accordion-icon" aria-hidden="true"></i>&nbsp; Is
                                            there a cost for verification?
                                        </div>
                                        <div class="accordion-content">
                                            <p>No, the verification process is completely free of charge.</p>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <div class="accordion-header" onclick="toggleAccordion(this)">
                                            <i class="fa fa-plus accordion-icon" aria-hidden="true"></i>&nbsp; How
                                            long does verification take?
                                        </div>
                                        <div class="accordion-content">
                                            <p>Verification typically takes between 1-3 business days. However, this
                                                can vary depending on the volume of requests and the accuracy of the
                                                submitted documents.</p>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <div class="accordion-header" onclick="toggleAccordion(this)">
                                            <i class="fa fa-plus accordion-icon" aria-hidden="true"></i>&nbsp;What
                                            if my verification is denied?
                                        </div>
                                        <div class="accordion-content">
                                            <p>If your verification is denied, we will provide specific reasons and
                                                guidance on what needs to be corrected. You can resubmit your
                                                documents for review after addressing the issues.</p>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <div class="accordion-header" onclick="toggleAccordion(this)">
                                            <i class="fa fa-plus accordion-icon" aria-hidden="true"></i>&nbsp; Is my
                                            information secure?
                                        </div>
                                        <div class="accordion-content">
                                            <p>: Absolutely. We take privacy and data security very seriously. All
                                                information submitted for verification is encrypted and securely
                                                stored, and it is used solely for the purpose of verification.</p>
                                        </div>
                                    </div>
                                    <!-- <div class="accordion-item">
                                            <div class="accordion-header" onclick="toggleAccordion(this)">
                                                <i class="fa fa-plus accordion-icon" aria-hidden="true"></i>&nbsp; How
                                                to bid on a project?
                                            </div>
                                            <div class="accordion-content">
                                                <p>Just go to Browse Project section given on the header or either click
                                                    this link
                                                    https://sooprs.com/browse-job. Click on the arrow (->) on any
                                                    project.
                                                    Here you can
                                                    place your bid on project detail page. Enjoy earning!</p>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div class="accordion-header" onclick="toggleAccordion(this)">
                                                <i class="fa fa-plus accordion-icon" aria-hidden="true"></i>&nbsp; Is
                                                there any fee to post a new project?
                                            </div>
                                            <div class="accordion-content">
                                                <p>No! You can post your projects free of charge here! Enjoy the
                                                    hassle-free
                                                    and
                                                    time-saving
                                                    project posting.</p>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <div class="accordion-header" onclick="toggleAccordion(this)">
                                                <i class="fa fa-plus accordion-icon" aria-hidden="true"></i>&nbsp; Is
                                                there any fee to place a bid on a project?
                                            </div>
                                            <div class="accordion-content">
                                                <p>Yes! We are offering free credits to place your bid. After a
                                                    threshold
                                                    limit, you can
                                                    recharge your credit wallet.</p>
                                            </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</>


<!-- get verified modal  -->
<div class="modal fade" id="getVerifiedModal" tabindex="-1" aria-labelledby="getVerifiedModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 " id="getVerifiedModalLabel">Get Verified</h1>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="get-verified-modal">
                    <input type="hidden" name="professional_id" id="id" value="
                    <?php
                    if (isset($_SESSION['id'])) {
                        echo $username['slug'];
                    } ?>">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="">
                                <label for="verifiedFormName">Enter your name</label>
                                <input class="form-control  " style="border: 1px solid #CDCDCD;" type="text"
                                    placeholder="Name" name="name" id="verifiedFormName" required>
                            </div>
                        </div>

                        

                        <div class="col-md-12 mb-3">
                        <label for="verifiedFormName" class="">Upload images of the document you are providing</label>
                        <label style="font-size:12px">e.g. Aadhar, PAN, etc.</label>

                            <div class="row mt-3">
                                <div class="col-md-6 front-image-col">
                                    <!-- <input type="file" id="gig_image" class="form-control" name="file" placeholder="Upload image..."> -->
                                    <label for="addFileBtn">Front image</label>
                                    <div class="addFileBtn round-add-btn" id="addFileBtn">
                                        <i class="fa-solid fa-arrow-up-from-bracket" style="color: #0d6efd;"></i>
                                        <input type="file" id="imageInput1" style="display: none;" name="front_image">
                                        <img id="imagePreview" src="#" alt="Selected Image"
                                            style="display: none; max-width: 100%;">
                                    </div>
                                </div>
                                <div class="col-md-6 back-image-col">
                                    <!-- <input type="file" id="gig_image" class="form-control" name="file" placeholder="Upload image..."> -->
                                    <label for="addFileBtn2">Back image</label>

                                    <div class="addFileBtn round-add-btn" id="addFileBtn2">
                                        <i class="fa-solid fa-arrow-up-from-bracket" style="color: #0d6efd;"></i>
                                        <input type="file" id="imageInput2" style="display: none;" name="back_image">
                                        <img id="imagePreview2" src="#" alt="Selected Image"
                                            style="display: none; max-width: 100%;">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <div class="">
                                <label for="verifiedFormName">Enter the document number you provided above</label>

                                <input class="form-control  " style="border: 1px solid #CDCDCD;" type="text"
                                    placeholder="ID number" name="id_number" required>
                            </div>
                        </div>

                    </div>
                    <div class=" text-start">
                        <button type="submit" class=" btn btn-primary contact-submit">Submit</button>
                    </div>
                </form>
            </div>
            <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
        </div>
    </div>
</div>

<!-- check kyc modal  -->
<div class="modal fade" id="getKYCModal" tabindex="-1" aria-labelledby="getKYCModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 " id="getKYCModalLabel">KYC Verification</h1>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>You have already shared KYC details</p>
            </div>
            <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
        </div>
    </div>
</div>

<script>
    function toggleAccordion(element) {
        const accordionContent = element.nextElementSibling;
        const accordionIcon = element.querySelector('.accordion-icon');

        if (accordionContent.classList.contains('show')) {
            accordionContent.classList.remove('show');
            accordionIcon.classList.remove('rotate');
        } else {
            document.querySelectorAll('.accordion-content').forEach(content => content.classList.remove('show'));
            document.querySelectorAll('.accordion-icon').forEach(icon => icon.classList.remove('rotate'));

            accordionContent.classList.add('show');
            accordionIcon.classList.add('rotate');
        }
    }


    function backAfterLogin() {
        console.log("backAfterLogin running");
        localStorage.setItem('getVerifiedAfterLogin', site_url + '/get-verified');
        window.location.href = site_url + '/login-professional';
    }
</script>


<script>


    function openFileInput() {
        const fileInput = document.getElementById('imageInput1');
        fileInput.click();
    }
    function openFileInput2() {
        const fileInput2 = document.getElementById('imageInput2');
        fileInput2.click();
    }
    document.querySelector('#addFileBtn').addEventListener('click', openFileInput);
    document.querySelector('#addFileBtn2').addEventListener('click', openFileInput2);

    document.getElementById('imageInput1').addEventListener('change', function () {
        const fileInput = this;
        const imagePreview = document.getElementById('imagePreview');
        const iTag = addFileBtn.querySelector('i');

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const imagePreview = document.createElement('img');
                imagePreview.src = e.target.result;
                imagePreview.alt = 'Selected Image';
                imagePreview.style.maxWidth = '100%';

                // Empty the addFileBtn div
                if (iTag) {
                    addFileBtn.removeChild(iTag);
                }

                addFileBtn.appendChild(imagePreview); // Append the image element
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    });

    document.getElementById('imageInput2').addEventListener('change', function () {
        const fileInput2 = this;
        const imagePreview2 = document.getElementById('imagePreview2');
        const iTag2 = addFileBtn2.querySelector('i');

        if (fileInput2.files && fileInput2.files[0]) {
            const reader2 = new FileReader();

            reader2.onload = function (e) {
                const imagePreview2 = document.createElement('img');
                imagePreview2.src = e.target.result;
                imagePreview2.alt = 'Selected Image';
                imagePreview2.style.maxWidth = '100%';

                // Empty the addFileBtn div
                if (iTag2) {
                    addFileBtn2.removeChild(iTag2);
                }

                addFileBtn2.appendChild(imagePreview2); // Append the image element
            };

            reader2.readAsDataURL(fileInput2.files[0]);
        }
    });





    $(document).ready(function () {
        // let form = $('#get-verified-modal');
        // When the form is submitted
        $('#get-verified-modal').submit(function (e) {
            e.preventDefault(); // Prevent the default form submission
            console.log("form submit");
            // Serialize form data
            var formdata = new FormData(this);

            // Send AJAX request to save_data.php
            $.ajax({
                type: 'POST',
                url: '<?php echo $SITE_URL; ?>/api2/public/index.php/get_verified',
                data: formdata,
                processData: false, // Prevent jQuery from processing the data
                contentType: false,
                success: function (response) {
                    let decode_data = JSON.parse(response, true);
                    if (decode_data.status == 200) {

                        toastr.success(decode_data.msg);
                        $('#get-verified-modal')[0].reset();
                        $('#getVerifiedModal').modal('hide');
                    } else {
                        toastr.error(decode_data.msg);

                    }
                },
                error: function (xhr, status, error) {
                    console.log(xhr);
                }
            });
        });


        var authForm = new FormData();
        var user_id = "<?php
                        if (isset($_SESSION['id'])) {
                            echo $username['slug'];
                        }?>";
        if (user_id) {
            authForm.append('user_slug', user_id);
            $.ajax({
                type: 'POST',
                url: '<?php echo $SITE_URL; ?>/api2/public/index.php/check_get_verified',
                data: authForm,
                processData: false, // Prevent jQuery from processing the data
                contentType: false,
                success: function (response) {
                    let decode_data = JSON.parse(response, true);
                    if (decode_data.status == 200) {
                        if (decode_data.kyc == 1) {
                            $('.openModalButton').attr('data-bs-target', '#getKYCModal');
                            toastr.success("You have already shared KYC details");
                        }
                        // $('#getVerifiedModal').modal('hide');
                    } else {
                        toastr.error(decode_data.msg);

                    }
                },
                error: function (xhr, status, error) {
                    console.log(xhr);
                }
            });
        }

    });

</script>
<?php include "footer.php" ?>