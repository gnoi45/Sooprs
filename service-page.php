<?php
session_start();
include_once 'function.php';
include_once 'env.php';
include('config/dbconn.php');



$loggedinUser = new DB_con();
// if (isset($_SESSION['id'],$_SESSION['professional']) && $_SESSION['loggedin'] === true && $_SESSION['professional'] === true) {
//     $loggedinUser = new DB_con();
    
//     $username = $loggedinUser->getUser($_SESSION['id'],'join_professionals');
// } 
// if (isset($_SESSION['id'],$_SESSION['customer']) && $_SESSION['loggedin'] === true && $_SESSION['customer'] === true) {
//     $loggedinUser = new DB_con();
//     $username = $loggedinUser->getUser($_SESSION['id'], "customer");
//     $cut_id = $username['id'];
// }

if(isset($_SESSION['id']) ){

    // $username = $loggedinUser->getUser($_SESSION['id'],'customer');
   
    // if(empty($username) || $username == ''){
        $username = $loggedinUser->getUser($_SESSION['id'],'join_professionals');    
    // }
}


$isSessionSet = isset($_SESSION['id']);
echo '<script>';
echo 'function checkSession() {';
echo '  return ' . ($isSessionSet ? 'true' : 'false') . ';';
echo '}';
echo '</script>';

if (isset($_GET['slug'])) {
    $singlePageFetch = $loggedinUser->fetchSinglePage($_GET['slug']);
}

?>

<?php

$title = $singlePageFetch['meta_title'];

$description = $singlePageFetch['meta_description'];

$keywords = $singlePageFetch['meta_keywords'];

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
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />


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

    <link href="<?php echo $SITE_URL ?>/assets/css/custom.css" rel="stylesheet" />



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

        .image-round-box{
            width:100px;
            /* height:auto; */
           margin:auto;
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
            
            color: white;
            font-weight: 500;
            padding: 0 5px;
        }

        <?php 
         if (isset($_SESSION['id'])) {

        ?>
        #user-pic-round {
            background: url(<?php echo $username['image']; ?>);
            background-size: cover;
            background-position: center;
            width: 30px;
            border-radius: 50%;
            height: 30px;
        }
<?php
         }else{
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

    <!-- CSS End -->
</head>

<body>
    <!-- <a href="https://api.whatsapp.com/send?phone=+91-8588850954&amp;text=Hey%20I'm%20interested%20in%20Sooprs%20Services." class="whatsapp-icon d-flex align-items-center justify-content-center" rel="nofollow" target="_blank"><img src="assets/img/images/whatsapp-icon(2).png" alt=""><span></span></a> -->
    <a href="https://api.whatsapp.com/send?phone=+91-9523558483&amp;text=Hey%20I'm%20interested%20in%20Sooprs%20Services."
        class="whatsapp-icon d-flex align-items-center justify-content-center" rel="nofollow" target="_blank"><i
            class="fa-brands fa-whatsapp mt-1" style="color: #ffffff;    font-size: 37px;
            margin-left: 2px;
            margin-right: 0px;
            margin-bottom: 2px;"></i>
        <span></span></a>
    <!-- <div class="whatapp-float"><a href="https://wa.me/+919523558483" target="_blank"></a></div> -->

    <!-- <div style="position: relative;"> -->
    
    <?php include "./header2.php" ?>

    <style>
        body {

            margin: 0;

            padding: 0;



            /* font-family: 'Sahitya', serif; */

        }



        .about-us-section {

            padding: 50px 0;

        }









        .right-text-col>div>h1 {

            color: #000000;



        }



        .right-text-col-knowmore>p {

            font-weight: 500;

        }



        .right-text-col>div>p {

            font-family: 'Poppins';

            /* font-style: normal; */

            /* font-weight: 500; */

            font-size: 15px;

            text-align: justify;

            /* line-height: 144.5%; */

            /* letter-spacing: 0.1em; */

            color: #000000;

            margin-top: 10px;

        }



        .reviews-count-text {

            text-decoration: underline;

            text-decoration-color: blue;

            margin-top: 100px;

        }



        .heading-by h2 {

            color: #0d6efd;

            font-weight: 800;

        }



        .about-section-top {

            /* height: 90vh; */

            display: flex;

            background-repeat: no-repeat;

            align-items: center;

            justify-content: center;

        }



        /* .bread-text p{

                    text-align: center;

                    font-size: 100px;

                    color: white;

                } */



        .bread-text p {

            position: relative;

            color: #ffffff;

            font-size: 40px;

            font-weight: bold;

            text-align: center;

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

            background-image: url(<?php echo $singlePageFetch['banner_image'] ?>);

            background-repeat: no-repeat;

            background-size: cover;

            position: absolute;

            top: 0px;

            right: 0px;

            bottom: 0px;

            left: 0px;

            opacity: 0.4;

        }



        .contact-ul li {

            list-style: none;

            margin: 15px 0;

        }



        .contact-ul li img {

            padding-right: 25px;

        }



        .contact-ul li span {

            font-weight: 600;

        }



        .contact-form-div {

            padding: 30px;

            background: #F2F2F2;

        }



        .contact-form-div h2 {

            text-align: initial;

        }



        .form-group {

            margin: 25px 0;

        }



        .form-control {



            padding: 15px;



        }



        .search_div1 {

            display: flex;

            align-items: center;

            justify-content: center;

            flex-direction: column;

            background-color: rgb(255, 255, 255);

            /* border: 1px solid rgb(238, 238, 238); */

            width: 100%;

            align-self: center;

            position: absolute;

            border-radius: 5px;

            top: 48px;

            z-index: 999;

        }



        .search_div1 ul {



            height: 200px;

            overflow: auto;

        }
    </style>



    <!-- Top banner  -->

    <section class="about-section-top">

        <div class="container">

            

            <div class="row justify-content-center">

                <div class="col-md-6">

                    <div class="bread-text">




                        <p>
                            <?php echo $singlePageFetch['heading'] ?>
                        </p>
                        <p class="hidden" data-id="<?php echo $singlePageFetch['service_id'] ?>" id="category_id"></p>

                       

                        <!-- <div class="row justify-content-center mt-5">                
                    <div class="col-md-3 text-center">
                        <button class="ps-3 pe-3 enquireHere" type="button" id="" style="border-radius: 0;padding: 2px 10px;background-color: #006aff;border:none;color:white;    width: -webkit-fill-available;    position: relative;z-index:999">Enquiry Here</button>
                    </div>
                </div> -->



                    </div>

                </div>

            </div>



        </div>

    </section>



    <section class="about-us-section">

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-12 col-sm-12">
                    <div class="row" id="pills-professionals-grid-col">

                        <!-- Grid  -->

                        <!-- Grid  -->

                    </div>


                </div>
            </div>

            <div class="row justify-content-center" style="margin-top:60px;">



                <div class="col-md-7 col-sm-12 right-text-col" style="align-items: center;display: grid;">

                    <?php echo htmlspecialchars_decode($singlePageFetch['content']) ?>

                    

                </div>

                <div class=" text-center col-md-5 col-sm-12 left-img-col">

                    <div class="contact-form-div">

                        <img src="<?php echo $singlePageFetch['content_image'] ?>" alt=""
                            style="    width: -webkit-fill-available;">

                    </div>

                </div>

                <div class="row justify-content-center mt-5">                
                    <div class="col-md-3 text-center">
                        <a href = "<?php echo $SITE_URL ?>/post-a-project" class="ps-3 pe-3" id="" style="border-radius: 0;padding: 2px 10px;background-color: #006aff;border:none;color:white;    width: -webkit-fill-available;">Enquiry Here</a>
                    </div>
                </div>
            </div>
        </div>

    </section>

<!--footer-->
<?php include "./footer.php" ?>
<!-- JavaScript Bundle with Popper -->

    <!-- second model -->

    <div class="modal fade" id="email_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body pl-5 mt-3" id="email_modal_body">
                    <div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <h5 class="modal-title "
                        style="color:#212529;font-size:1.6rem;margin-bottom:20px;line-height: 1.7rem;padding-top: 1em;text-align: center;font-weight: 600;font-family: Poppins,sans-serif;">
                        Please fill your contact details</h5>
                    <p id="last-form-error" class="text-danger" style="display:none">Please fill complete details</p>
                    <p id="last-form-email-error" class="text-danger" style="display:none">Please fill valid email
                        address</p>
                    <div class="row">
                        <div class="col">
                            <div class="card-body">
                                <div class="form-group">
                                    <input class="form-control input_text" id="your_name" type="text"
                                        placeholder="Your Name">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input class="form-control input_text" id="email_address" type="text"
                                        placeholder="Email address"
                                        pattern="/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/"
                                        required>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input class="form-control input_text" id="mobile_no" type="text"
                                        placeholder="Mobile No." pattern="[1-9]{1}[0-9]{9}" maxlength="10"
                                        minlength="10">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input class="form-control input_text" id="city_name" type="text"
                                        placeholder="city">
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <input class="form-control input_text" id="native_lang" type="text"
                                        placeholder="Your native language">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-lg bg-white text-grey" id="back_contact_button" data-wow-delay="0.7s"><small>Back</small></button> -->
                            <button type="button" class="btn btn-lg bg-primary  text-white default text-info"
                                id="submit_contact_details" style="padding: .5rem 1.3rem;"
                                data-wow-delay="0.7s"><small>Post Your
                                    Query</small></button>
                        </div>
                    </div>
                </div>
                <!--success section-->
                <div class="modal-body pl-5 mt-3" id="success_div" style="display:none">
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
                <!--success section end-->

            </div>
        </div>
    </div>





    <!-- Question modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">


                <div class="modal-body" id="question_div">

                </div>
                <!--<div class="modal-footer">-->

                <!--</div>-->
            </div>
        </div>
    </div>



    <!-- login  modal  -->
    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Login modal
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Enquiry model  -->
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
            </div>
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
        // select the element to hide
        const $elementToHide = $('.search_div1');

        // add event listener to the document
        $(document).click(function (event) {
            // if the clicked element is not the element to hide or one of its descendants
            if (!$elementToHide.is(event.target) && $elementToHide.has(event.target).length === 0) {
                // hide the element
                $elementToHide.hide();
            }
        });


        // select the element to hide
        const $elementToHide2 = $('.search_div');

        // add event listener to the document
        $(document).click(function (event) {
            // if the clicked element is not the element to hide or one of its descendants
            if (!$elementToHide2.is(event.target) && $elementToHide2.has(event.target).length === 0) {
                // hide the element
                $elementToHide2.hide();
            }
        });





    </script>


<script>

$(document).ready(function() {
    $.ajax({
        url: site_url+"/api2/public/index.php/filter_service_ajax",
        method: "POST",
        data: { dataValue:  1},
        success: function (data) {
            
            let decode_data = JSON.parse(data, true);
            
            
            var element2 = document.getElementById("pills-professionals-grid-col");
            var htmlContent2 = "";


            element2.innerHTML = "";

            if (decode_data['status'] == 200) {
                for (var i = 0; i < 9; i++) {
                    var item = decode_data['msg'][i];
                                
                    var skills = item[3];                  
                  
                    let user__name = item[0]['name'];
                   let firstLetter = user__name[0].toUpperCase();
                   
                   const colorNameMap = {
                        A: 'aquamarine',
                        B: 'blue',
                        C: 'cadetblue',
                        D: 'darkgoldenrod',
                        E: 'bisque',
                        F: 'firebrick',
                        G: 'gold',
                        H: 'hotpink',
                        I: 'indianred',
                        J: 'navajowhite',
                        K: 'khaki',
                        L: 'lavender',
                        M: 'magenta',
                        N: '#0000895e',
                        O: 'orange',
                        P: 'palegreen',
                        Q: 'olivedrab',
                        R: 'red',
                        S: 'salmon',
                        T: 'tan',
                        U: 'deepskyblue',
                        V: 'blueviolet',
                        W: 'rosybrown',                        
                        Y: 'bisque',
                        

                    };

                    let colorName = colorNameMap[firstLetter] || '#006aff';
                    let image__url = item[0]['image'];
                   let image_or_letter = image__url ? "<img src='"+ item[0]['image'] + "' alt='' style=''>" : "<p style='font-size: 4rem;' class=''>" + firstLetter + " </p>";
                  

                   var skillsParagraph = document.createElement('p');
                    // skillsParagraph.style = 'color: grey;';
                    skillsParagraph.className = 'skills__spans';

                    // Iterate over skills and create a <span> for each skill
                    skills.forEach(function(skill) {
                        var span = document.createElement('span');                        
                        span.textContent = skill;
                        skillsParagraph.appendChild(span);
                    });


                    htmlContent2 += "<div class='col-md-4 col-sm-12 mt-3  '>\
                                        <div class='text-center  bg-light' style=' padding: 15px;    border-radius: 10px; position:relative;   height: 100%;box-shadow: 0px 0px 7px -3px black;'>\
                                            <div class='profile-image ' style='display: flex;flex-direction: column;align-items: center;'>\
                                                <div class='image-round-box' style='background-color: "+colorName+";'>\
                                                "+image_or_letter+"\
                                                </div>\
                                                <div class='grid-box-text text-capitalize'>\
                                                    <p> "+ item[0]['name'] + "</p>\
                                                    <p> " + item[2] + "</p>\
                                                    <p>Verified</p>\
                                                    <p> <i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i> </p>\
                                                </div>\
                                            </div>\
                                            <p style=' font-size: 12px; text-align: initial; color: grey;'></p>\
                                            <a href='professional/"+ item[0]['slug'] + "' style='position: absolute; right: 10px;bottom: 10px;'>\
                                            <button class='mt-2 view-prof-btn'>View</button>\
                                            </a>\
                                        </div>\
                                    </div>";
                }
                
                element2.innerHTML += htmlContent2;
            } else {
                $("#data-message").html("no  more professionals");
                
            }
        }
    });
});

</script>

</body>

</html>