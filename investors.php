<?php include 'sentMail.php';?>



<?php 

    $title = 'Sooprs Investors page';

    $description = "Description";

    $keywords = "key,words";

?>

<?php include "header2.php" ?>



<style>

body {

    margin: 0;

    padding: 0;

    font-family: 'Poppins';

}







.section-first {

    background: #F1F1F2;

    padding: 36px;

}







.yellow-bg {

    width: -webkit-fill-available;

}



.border_tilt {

    position: absolute;

    top: 70px;

    left: 70px;

}



.owl-item .item {

    display: flex;

    justify-content: center;

}



.footer-text h3 {

    font-family: "Poppins";

    font-style: normal;

    font-weight: 600;

    color: #686868;

}



.footer-text p {

    font-family: "Poppins", sans-serif;



    font-style: normal;

    /* font-weight: 700; */

    /* font-size: 36px; */

    /* line-height: 54px; */



    /* color: #569BFF; */

}



input,

textarea,

select {

    background: rgba(255, 255, 255, 0.52) !important;

}



::placeholder,

label {

    color: rgb(148, 148, 148) !important;

}



.submit-btn-hover {

    border: none;

    color: white;

    width: 120px;

    background: black;

}



.submit-btn-hover:hover {



    /* width: 200px; */

}



.form-control {

    display: block;

    width: 100%;

    padding: 0.375rem 0.75rem;

    font-size: 1rem;

    font-weight: 400;

    line-height: 1.5;

    color: var(--bs-body-color);

    background-color: var(--bs-body-bg);

    background-clip: padding-box;

    border: var(--bs-border-width) solid #b9b9ba;

    -webkit-appearance: none;

    -moz-appearance: none;

    appearance: none;

    /* border-radius: 0.375rem; */

    transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;

}



/* .border_tilt {

    

        width: 300px;

        height: 300px;



        display: flex;

        justify-content: center;

        align-items: center;

        position: relative;

        

        }



        .border_tilt:before {

        content: "";

        border: 4px solid #00f2fe;

        width: 100%;

        height: 100%;

        position: absolute;

        top: 0;

        left: 0;

        transform: rotate(10deg);



        box-shadow: 0 4px 5px 0 rgba(0,0,0,0.14), 0 1px 10px 0 rgba(0,0,0,0.12), 0 2px 4px -1px rgba(0,0,0,0.3);

        }  */





.profile-img {

    width: 115px;

}



.profile-img-text p {

    margin-bottom: 0;

}



.profile-img-text p:nth-child(1) {

    font-weight: 500;

}



.profile-img-text p:nth-child(2) {

    font-weight: 400;

    font-size: small;

}



.profile-img-text p:nth-child(3) {

    font-weight: 200;

    font-size: smaller;

}



.top-investors-section {

    padding-top: 50px;

    background: #d4d4d4;

}



.form-section {

    padding: 50px 0;

}







.support-and-sales p {

    color: #727272;

    font-weight: bold;

    font-size: large;

}



.support-mail {

    color: #727272;

    font-weight: bold;

    font-size: large;

    text-decoration: underline;

}



.horizontal-line {

    height: 3px;

    width: -webkit-fill-available;

    background: linear-gradient(0deg, rgb(0 0 0 / 59%) 0%, rgba(0, 12, 255, 0) 107.95%);

}



.sent-notification {

    text-align: center;

    color: #0dab0d;

    font-size: larger;

    font-weight: 600;

}



#submit_btn:hover {

    background: #0068ff;

    border: none;

    color: white;

}

</style>



<section class="top-investors-section">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <h1 class="text-center mb-5">Startup Investors List</h1>

                <div class="row text-center mb-4">

                    <div class="col ">

                        <img class="profile-img" src="assets/img/images/profile-pic.png" alt="">

                        <div class="profile-img-text">

                            <p>Ronika Mehra</p>

                            <p>Managing Partner</p>

                            <p>Two Point O</p>

                        </div>

                    </div>

                    <div class="col ">

                        <img class="profile-img" src="assets/img/images/man-pic.png" alt="">

                        <div class="profile-img-text">

                            <p>Rohan Mishra</p>

                            <p>Managing Partner</p>

                            <p>Five Capital</p>

                        </div>

                    </div>

                    <div class="col ">

                        <img class="profile-img" src="assets/img/images/girl2.png" alt="">

                        <div class="profile-img-text">

                            <p>Priyanka Chopra</p>

                            <p>Managing Partner</p>

                            <p>Chopra & Sons</p>

                        </div>

                    </div>

                    <div class="col ">

                        <img class="profile-img" src="assets/img/images/boy2.png" alt="">

                        <div class="profile-img-text">

                            <p>Sanjay Kumar</p>

                            <p>Managing Partner</p>

                            <p>Acer India</p>

                        </div>

                    </div>

                    <div class="col ">

                        <img class="profile-img" src="assets/img/images/girl3.png" alt="">

                        <div class="profile-img-text">

                            <p>Moni Mehra</p>

                            <p>Managing Partner</p>

                            <p>Monika Jewellers</p>

                        </div>

                    </div>



                </div>

                <div class="row text-center mb-4">

                    <div class="col ">

                        <img class="profile-img" src="assets/img/images/boy3.png" alt="">

                        <div class="profile-img-text">

                            <p>Rishab Kundra</p>

                            <p>Managing Partner</p>

                            <p>Kundra Tiles</p>

                        </div>

                    </div>

                    <div class="col ">

                        <img class="profile-img" src="assets/img/images/girl4.png" alt="">

                        <div class="profile-img-text">

                            <p>Sweety Khanna</p>

                            <p>Managing Partner</p>

                            <p>Patanjali</p>

                        </div>

                    </div>

                    <div class="col ">

                        <img class="profile-img" src="assets/img/images/boy4.png" alt="">

                        <div class="profile-img-text">

                            <p>Ronit Roy</p>

                            <p>Managing Partner</p>

                            <p>Abbys Company</p>

                        </div>

                    </div>

                    <div class="col ">

                        <img class="profile-img" src="assets/img/images/girl5.png" alt="">

                        <div class="profile-img-text">

                            <p>Monika Mishra</p>

                            <p>Managing Partner</p>

                            <p>Qwerty Keypad</p>

                        </div>

                    </div>

                    <div class="col ">

                        <img class="profile-img" src="assets/img/images/boy5.png" alt="">

                        <div class="profile-img-text">

                            <p>Anup yadav</p>

                            <p>Managing Partner</p>

                            <p>Nitro Company</p>

                        </div>

                    </div>



                </div>

                <div class="row text-center mb-4 justify-content-center">

                    <div class="col-md-2 col">

                        <img class="profile-img" src="assets/img/images/girl6.png" alt="">

                        <div class="profile-img-text">

                            <p>Nisha Yadav</p>

                            <p>Managing Partner</p>

                            <p>Fastrack</p>

                        </div>

                    </div>

                    <div class="col-md-2 col">

                        <img class="profile-img" src="assets/img/images/boy2.png" alt="">

                        <div class="profile-img-text">

                            <p>Malik Rawat</p>

                            <p>Managing Partner</p>

                            <p>Rico Company</p>

                        </div>

                    </div>

                    <div class="col-md-2 col">

                        <img class="profile-img" src="assets/img/images/girl7.png" alt="">

                        <div class="profile-img-text">

                            <p>Neha Malik</p>

                            <p>Managing Partner</p>

                            <p>Aeerto Company</p>

                        </div>

                    </div>





                </div>

            </div>

        </div>

    </div>

</section>







<section class="form-section">

    <div class="container">

        <div class="row" style="justify-content: center; --bs-gutter-x: 0 !important">

            <div class="col-md-6 col-sm-12" style="    padding: 0px 50px 0 50px;">

                <div class="" style="padding-top: 30px">

                    <div class=" row ">

                        <div class="col-md-3 col-sm-12">

                            <img src="assets/img/images/location-logo.png" alt="" style="width: 100px; height: auto" />

                        </div>

                        <div class="col-md-9 col-sm-12 d-flex">

                            <h2 style=" display: flex;align-items: center;font-size: 50px;font-weight: bold;">

                                Location</h2>



                        </div>





                    </div>

                    <div class="footer-text">

                        <h3 class="mt-2">

                            Corporate

                            Headquarters

                            India office

                        </h3>

                        <p>

                            WeWork , Vi-John Tower 393, Phase III, Udyog Vihar, Gurugram, Haryana 122016

                        </p>

                        <h3 class="mt-3">Australia office</h3>

                        <p>104 Yating Avenue schofields, Sydney, Australia</p>

                    </div>

                </div>

                <br />

                <div class="horizontal-line"></div>

                <!-- <img src="assets/img/Rectangle-366.png" alt=""> -->

                <div class="row">

                    <div class="col-md-6 col-sm-6 text-center support-and-sales" style="padding: 24px 0 8px 0">

                        <h5>SUPPORT</h5>

                        <p>837-591-0558</p>

                    </div>

                    <div class="col-md-6 col-sm-6 text-center support-and-sales" style="padding: 24px 0 8px 0">

                        <h5>SALES</h5>

                        <p>817-892-4823</p>

                    </div>

                </div>

                <div class="horizontal-line"></div>







                <div class="text-center" style="padding: 24px 0 8px 0">

                    <h5>SEND AN EMAIL</h5>

                    <p class="support-mail">contact@sooprs.com</p>

                </div>

            </div>



            <div class="col-md-6 col-sm-12">



                <h3 class="text-center" style="padding: 30px 0 10px 0; text-align: center;    font-weight: 700;">

                    Join as Investor

                </h3>

                <p class="text-center mb-3">

                    Contact us to request a quote or to schedule a consultation with our team.

                </p>

                <div style="

                  background: #d4d4d4;

                 

                  

                  padding: 30px;max-width: 770px;

                ">

                    <form action="#" method="post" id="myForm">

                        <div class="row">

                            <div class="mb-3 col-md-6">

                                <label for="exampleFormControlInput1" class="form-label">Full Name</label>

                                <input type="text" class="form-control" id="name" name="name" placeholder="Your Name"

                                    required />

                            </div>

                            <div class="mb-3 col-md-6">

                                <label for="exampleFormControlInput1" class="form-label">Phone Number</label>

                                <input type="text" class="form-control" id="phone" placeholder="Phone Number"

                                    name="phone" />

                            </div>

                            <div class="mb-3 col-md-6">

                                <label for="exampleFormControlInput1" class="form-label"> Email address</label>

                                <input type="email" class="form-control" id="email" placeholder="Your Email address"

                                    name="email" required />

                            </div>

                            <div class="mb-3 col-md-6" style="display: inline-grid">

                                <label for="exampleFormControlInput1" class="form-label">Services</label>

                                <select name="services" id="services" class="form-control" required>

                                    <option value="web-development">Web Developement</option>

                                    <option value="app-development">Mobile App Developement</option>

                                    <option value="digital-marketting">Digital Marketting</option>

                                </select>

                            </div>

                            <div class="mb-3 col-md-12">

                                <!-- <label for="exampleFormControlInput1" class="form-label">Email address</label> -->

                                <textarea id="message" class="form-control" name="message" placeholder="Your Message"

                                    rows="7" cols="50" style="width: -webkit-fill-available"></textarea>

                            </div>

                            <div class="col-md-3 col-sm-3">

                                <button type="button" name="submit_btn" id="submit_btn"

                                    class=" btn-dark submit-btn-hover">

                                    SUBMIT

                                </button>

                            </div>









                        </div>

                    </form>

                </div>

                <div class="mt-3" id="srs_spinner"

                    style="display: none;  flex-direction: column;  align-self: center; align-items: center; justify-content: center;">

                    <div class="spinner-grow text-primary" role="status"><span class="sr-only">Loading...</span>

                    </div>Sending your mail...

                </div>

                <p class="sent-notification"></p>

            </div>

        </div>

    </div>

</section>



<script type="text/javascript">

$("#submit_btn").click(function(e) {



    $("#srs_spinner").css('display', 'flex');

    $("#myForm").css('pointer-events', 'none');





    e.preventDefault();

    var name = $("#name");

    var email = $("#email");

    var phone = $("#phone");

    var services = $("#services");

    var message = $("#message");



    if (isNotEmpty(name) && isNotEmpty(email) && isNotEmpty(phone) && isNotEmpty(services)) {

        $.ajax({

            url: 'sendEmail.php',

            method: 'POST',

            dataType: 'json',

            data: {

                name: name.val(),

                email: email.val(),

                phone: phone.val(),

                services: services.val(),

                message: message.val()

            },

            success: function(response) {

                $('#myForm')[0].reset();

                $("#srs_spinner").css('display', 'none');

                $("#myForm").css('pointer-events', 'all');

                $('.sent-notification').text("Message Sent Successfully.");

            }

        });

    } else {

        alert("Please provide all the details!");

        $("#srs_spinner").css('display', 'none');

        $("#myForm").css('pointer-events', 'all');

        return false;

    }

});



function isNotEmpty(caller) {

    if (caller.val() == "") {

        caller.css('border', '1px solid red');

        return false;

    } else

        caller.css('border', '');



    return true;

}

</script>



<?php include "footer.php" ?>