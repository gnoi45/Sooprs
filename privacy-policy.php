<?php

session_start();
include_once 'function.php';
include_once 'env.php';
include('config/dbconn.php');

$userCredentials = new DB_con();

if (isset($_SESSION['id'])) {
    $username = $userCredentials->getUser($_SESSION['id'], 'join_professionals');
}

$title = 'Privacy Policy | Sooprs.com';
$description = "Description";
$keywords = "key,words";
?>
<?php include "header2.php" ?>

<style>
    /* .about-section-top {
        height: 80vh;
        display: flex;
        background-repeat: no-repeat;
        align-items: center;
        justify-content: center;
    } */

    /* .bread-text p{
                text-align: center;
                font-size: 100px;
                color: white;
            } */

    .bread-text p {
        position: relative;
        color: #ffffff;
        font-size: 3rem;

        text-align: center;
    }

    /* .about-section-top {
        position: relative;
        height: 50vh;
        background-color: black;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    } */

    .about-section-top::before {
        content: "";
        background-image: url('https://res.cloudinary.com/dr4iluda9/image/upload/v1709884899/privacy-policy_ietw6k.webp');
        background-repeat: no-repeat;
        background-size: cover;
        position: absolute;
        top: 0px;
        right: 0px;
        bottom: 0px;
        left: 0px;
        opacity: 0.4;
    }

    .margin25 {
        margin: 25px 0;
    }
</style>

<!-- Top banner  -->
<section class="about-section-top">
    <div class="container">
        <div class="bread-text">
            <p class="d-none d-md-block">Privacy Policy</p>
            <p class="d-lg-none d-md-none" style="    font-size: 2rem!important;">Privacy Policy </p>

        </div>
    </div>
</section>


<section class="margin25">
    <div class="container">
        <div class="first-contentbox">
            <h3>Privacy Policy </h3>
            <p style="text-align: justify;">This Privacy Policy relates to the collection, use and disclosure of
                personal
                data, including special or sensitive personal data, by Sooprs. “Snooprs”, “we“, or “our“ personal data
                is
                information relating to an individual (“you“ or “your“) as more fully defined herein below.
                Sooprs is committed to protecting your privacy and ensuring that you have a secured experience
                on our website and while using our products and services (collectively, “Products“). This policy
                covers the Sooprs website and all the subdomains under Sooprs.com . Please refer to the
                following link to read our terms of service Terms of service. This policy outlines, its subsidiaries
                and affiliated companies handling practices and how we collect and use the information you provide
                in the course of your use or access of our systems through online interfaces (e.g. website, mobile
                applications etc.) (collectively “Company Systems“). In this Privacy Policy, “Personal Data” means
                any information that can be used to individually identify a person and may include, but is not
                limited to, name, email address, postal or other physical addresses, title, and other personally
                identifiable information. By using our services or products, it will be deemed that you have read,
                understood and agreed to be bound by this policy detailed hereunder We will be the processor of the
                Personal Data that is provided, collected and/or processed pursuant to this policy, except where
                otherwise expressly stated.</p>
        </div>
    </div>
</section>

<section class="margin25">
    <div class="container">
        <div class="second-contentbox">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <h3>Data Security</h3>
                    <p style="text-align: justify;">The information that you provide, subject to disclosure in
                        accordance with this policy, shall be maintained in a safe and secure manner. Your information
                        shall be protected, to a commercially reasonable extent, against unauthorized access, use, or
                        disclosure. Our databases and information are stored on secure servers with appropriate
                        firewalls. Further, we use vulnerability scanning and scanning to PCI standards annually and our
                        Company Systems are subject to regular Malware Scanning. Additionally, we use SSL certificate to
                        encrypt all the data being transferred. As a user of the Company Systems, you have the
                        responsibility to ensure data security. You must not disclose to any person the authentication
                        parameters that are assigned to you including Your username or password for your use of the
                        Company Systems. You acknowledge that you will be solely responsible for all acts committed by
                        use of your username /other authentication parameters. Given the nature of internet
                        transactions, Sooprs does not take any responsibility for the transmission of information
                        collected from you or are generated by your use of the Company Systems or the services. Any
                        transmission of such information over the internet is done at your sole risk. Sooprs does not
                        take any responsibility for you or any third party circumventing the privacy settings or
                        security measures contained on the Company Systems. Notwithstanding anything to the contrary,
                        while Sooprs will use all reasonable efforts to ensure that any information collected from you
                        or are generated by your use of the Company Systems or the services is safe and secure, it
                        offers no representations or warranties that the security measures are adequate, safe, fool
                        proof or impenetrable.</p>
                </div>
                <div class="col-md-3 col-sm-12">
                    <img src="assets/img/images/data.png" alt="Data Security" style="    width: -webkit-fill-available;">
                </div>
            </div>

        </div>
    </div>
</section>




<section class="margin25">
    <div class="container">
        <div class="second-contentbox">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <h3>Contact Us</h3>
                    <p style="text-align: justify;">If you have any questions about our policy or related dealings with
                        us or would like further information about our services and practices, you can contact us at
                        contact@Sooprs.com. For security concerns, please reach out to us at contact@Sooprs .com. This
                        policy must be read in conjunction with the other agreements you may enter into with Sooprs and
                        the ToS as published by Sooprs on Sooprs' website. By accepting the policy, you expressly
                        consent to Sooprs' use and disclosure of your personal information in accordance with this
                        policy.</p>
                </div>
                <div class="col-md-3 col-sm-12">
                    <!--<img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1709884493/contactusvector_dr50ik_pcnxfp.jpg" alt="about our policy" style="    width: -webkit-fill-available;">-->
                </div>
            </div>

        </div>
    </div>
</section>




<section class="margin25">
    <div class="container">
        <div class="second-contentbox">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <h3>Age Restrictions</h3>
                    <p class="" style="text-align: justify;">You explicitly agree you are 18 years of age or older,
                        unless represented by a parent or legal guardian. If you are not of the requisite age you must
                        not provide any information to Sooprs directly or by way of usage of the Company Systems. If
                        Sooprs determines that it is in possession of any information belonging to an individual below
                        18 years of age which is submitted, collected or generated in breach of the terms of this
                        Policy, it will delete the same without any notice to the individual to whom such information
                        belongs to.</p>
                </div>
                <div class="col-md-3 col-sm-12">
                    <!--<img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1709884656/age-restriction_xh9qrd_dzddpm.webp" alt="Age Restrictions" style="    width: -webkit-fill-available;">-->
                </div>
            </div>

        </div>
    </div>
</section>






<?php include "footer.php" ?>