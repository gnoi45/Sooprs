<?php
session_start();
include_once 'function.php';
include_once 'env.php';
include ('config/dbconn.php');

$userCredentials = new DB_con();

if (isset($_SESSION['id'])) {
    $username = $userCredentials->getUser($_SESSION['id'], 'join_professionals');
}

$title = 'Sooprs Contact Us ';

$description = "Description";

$keywords = "key,words";

?>
<?php include "header2.php" ?>


<style>
    body {
        margin: 0;
        padding: 0;
        /* font-family: 'Sahitya', serif; */
    }

    .about-us-section {
        /* padding: 50px 0; */
    }

    .contact-right-text-col>div>h1 {
        color: #000000;
    }

    .right-text-col-knowmore>p {
        font-weight: 500;
    }

    .contact-right-text-col>div>p {

        font-family: 'Poppins';

        font-style: normal;

        font-weight: 500;

        font-size: 16px;

        text-align: justify;

        line-height: 144.5%;

        letter-spacing: 0.1em;

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


    /* 
    .bread-text p {

        position: relative;

        color: #ffffff;

        font-size: 3rem;


    } */



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

        background-image: url('https://res.cloudinary.com/dr4iluda9/image/upload/v1704696923/copntactus_e0sy10.jpg');

        background-repeat: no-repeat;

        background-size: cover;

        background-position-y: center;
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

        padding-right: 20px;

    }



    .contact-ul li span {

        font-weight: 600;

    }



    .contact-form-div {

        padding: 30px;

        /* background: #d4d4d4; */

    }



    .contact-form-div h2 {

        text-align: initial;

    }



    .form-group {

        margin: 25px 0;

    }





    .contact-submit:hover {

        background: blue;

        color: white;

        border: none;

    }

    /* new design css  */
    .contact-bottom {
        padding: 80px 0 56px;
        background: #FDF6F1;
    }

    .contact-grid.con-info {
        border: 1px solid #CDCDCD;
        box-shadow: none;
        text-align: left;
    }

    .contact-grid {
        background: #FFF;
        box-shadow: 0px 4px 9px -1px rgba(19, 16, 34, 0.03), 0px 4.4px 20px -1px rgba(19, 16, 34, 0.05);
        border-radius: 10px;
        padding: 24px;
        margin-bottom: 24px;
        text-align: center;
    }

    .w-100 {
        width: 100% !important;
    }

    .contact-grid.con-info .contact-content {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
    }

    .contact-grid.con-info .contact-icon {
        margin: 0 15px 0 0;
    }

    .contact-grid.con-info .contact-icon span {
        border: 1px solid #006aff;
        background: #fff;
    }

    .contact-icon span {
        width: 60px;
        height: 60px;
        border-radius: 50px;
        background: #FDF6F1;
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        justify-content: center;
        -webkit-justify-content: center;
        -ms-flex-pack: center;
        margin: auto;
        -webkit-transition: 0.4s;
        -moz-transition: 0.4s;
        -o-transition: 0.4s;
        transition: 0.4s;
    }

    .contact-icon span img {
        -webkit-transition: 0.4s;
        -moz-transition: 0.4s;
        -o-transition: 0.4s;
        transition: 0.4s;
    }

    .contact-details p {
        margin-bottom: 0;
    }
</style>

<!-- Top banner  -->

<section class="about-section-top">
    <div class="container">
        <div class="bread-text">
            <p class="d-none d-md-block">Contact Us</p>
            <p class="d-lg-none d-md-none" style="    font-size: 2rem!important;">Contact Us</p>
        </div>
    </div>
</section>

<!-- new design start -->
<div class="contact-bottom bg-white">
    <div class="container">
        <div class="row justify-content-evenly">

            <div class="col-xl-4 col-lg-6 d-flex">
                <div class="contact-grid con-info w-100">
                    <div class="contact-content">
                        <div class="contact-icon">
                            <span>
                                <i class="fa-regular fa-envelope" style="color: #006aff;font-size: 25px;"></i>
                            </span>
                        </div>
                        <div class="contact-details">
                            <p><a href="mailto:contact@sooprs.com">support@sooprs.com</a></p>
                            <!-- <p><a href="javascript:void(0);">dreamgigsinfo@example.com</a></p> -->
                        </div>
                    </div>
                </div>
            </div>


            <!-- <div class="col-xl-4 col-lg-6 d-flex">
                <div class="contact-grid con-info w-100">
                    <div class="contact-content">
                        <div class="contact-icon">
                            <span>
                                <i class="fa-solid fa-headset" style="color: #006aff;font-size: 25px;"></i>
                            </span>
                        </div>
                        <div class="contact-details">
                            <p>+1 81649 48103</p>
                            <p>+1 78301 71940</p>
                        </div>
                    </div>
                </div>
            </div> -->


            <div class="col-xl-4 col-lg-6 d-flex">
                <div class="contact-grid con-info w-100">
                    <div class="contact-content">
                        <div class="contact-icon">
                            <span>
                                <i class="fa-regular fa-map" style="color: #006aff;font-size: 25px;"></i>
                            </span>
                        </div>
                        <div class="contact-details contact-details-address">
                            <p>BlueOne Square, Udyog Vihar Phase 4 Rd, Gurugram, Haryana 122016</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- new design end  -->

<div class="about-us-section">

    <div class="container">

        <div class="row">



            <div class="col-md-6 col-sm-12 contact-right-text-col">

                <img src="https://sooprs.com/assets/image/contactus_image.jpeg"
                    alt="contact-image" style="    width: -webkit-fill-available;">

            </div>

            <div class=" text-center col-md-6 col-sm-12 left-img-col">

                <div class="contact-form-div">

                    <h3 class="text-start fw-bold mb-2">Get in Touch</h3>
                    <p class="text-start mb-4 fw-bold text-secondary">How can help I you? Please write down your query
                    </p>


                    <form id="myForm" action="" method="post">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div class="">
                                    <input class="form-control  " style="border: 1px solid #CDCDCD;" type="text"
                                        placeholder="Name" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="">
                                    <input class="form-control  " style="border: 1px solid #CDCDCD;" type="email"
                                        placeholder="Email" name="email" required>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <input class="form-control  " style="border: 1px solid #CDCDCD;" type="number"
                                        placeholder="Phone " name="phone" required>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="">
                                    <textarea class="form-control" style="border: 1px solid #CDCDCD;" name="message"
                                        id="message" rows="5" placeholder="Message"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class=" text-start">

                            <button type="submit" class=" btn btn-primary contact-submit">Send Message</button>



                        </div>



                    </form>

                </div>

            </div>

        </div>

    </div>

</div>


<!-- Auto pop-up div  -->
<div id="auto-popup">
    <img src="assets/img/sprs_verified.gif" style="    max-width: 100px;">
</div>

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

<script>
    let form = document.getElementById('myForm');
    // When the form is submitted
    $('#myForm').submit(function (e) {
        e.preventDefault(); // Prevent the default form submission
        console.log("form submit");
        // Serialize form data
        var formdata = new FormData(form);

        // Send AJAX request to save_data.php
        $.ajax({
            type: 'POST',
            url: '<?php echo $SITE_URL; ?>/api2/public/index.php/contactUsQuery',
            data: formdata,
            processData: false, // Prevent jQuery from processing the data
            contentType: false,
            success: function (response) {
                let decode_data = JSON.parse(response, true);
                if (decode_data.status == 200) {

                    toastr.success("We will contact you shortly");
                    $('#myForm')[0].reset(); 
                } else {
                    toastr.error(decode_data.msg);

                }
            },
            error: function (xhr, status, error) {
                console.log(xhr);
            }
        });
    });
</script>



<?php include "footer.php" ?>