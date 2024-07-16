<?php session_start(); ?>
<?php include "./header2.php" ?>



<style>
    .error {
        background-color: transparent;
        color: red;
        width: auto;
        margin: 0 auto;
    }

    

    .form-box {
        padding: 25px;
        background: #ffffff;
        /* border-radius: 10px; */
        border: 1px solid #e0e0e0;
    }

    .message_p {
        font-size: larger;
        color: white;
        font-weight: 400;
        background: #0c7100;
        display: inline-block;
        padding: 0 5px;
    }



    /* css atest */
    .circles {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .circles li {
        position: absolute;
        display: block;
        list-style: none;
        width: 20px;
        height: 20px;
        background: rgba(255, 255, 255, 0.2);
        /* animation: animate 25s linear infinite;
        bottom: -150px; */


    }

    .circles li:nth-child(1) {
        /* left: 25%;
        width: 80px;
        height: 80px;
        animation-delay: 0s; */


        left: 65%;
        width: 200px;
        height: 200px;
        animation-delay: 0s;
        top: -35px;
        border-radius: 50%;
    }


    .circles li:nth-child(2) {
        /* left: 10%;
        width: 20px;
        height: 20px;
        animation-delay: 2s;
        animation-duration: 12s; */

        left: 16%;
        width: 100px;
        height: 100px;
        animation-delay: 2s;
        animation-duration: 12s;
        top: 28%;
        border-radius: 50%;
    }

    .circles li:nth-child(3) {
        /* left: 70%;
        width: 20px;
        height: 20px;
        animation-delay: 4s; */

        right: 13%;
        width: 100px;
        height: 100px;
        animation-delay: 4s;
        bottom: 24%;
        border-radius: 50%;
    }

    .circles li:nth-child(4) {
        /* left: 40%;
        width: 60px;
        height: 60px;
        animation-delay: 0s;
        animation-duration: 18s; */


        left: -12%;
        width: 200px;
        height: 200px;
        animation-delay: 0s;
        bottom: -35px;
        border-radius: 50%;
    }

    .circles li:nth-child(5) {
        left: 65%;
        width: 20px;
        height: 20px;
        animation-delay: 0s;
    }

    .circles li:nth-child(6) {
        left: 75%;
        width: 110px;
        height: 110px;
        animation-delay: 3s;
    }

    .circles li:nth-child(7) {
        left: 35%;
        width: 150px;
        height: 150px;
        animation-delay: 7s;
    }

    .circles li:nth-child(8) {
        left: 50%;
        width: 25px;
        height: 25px;
        animation-delay: 15s;
        animation-duration: 45s;
    }

    .circles li:nth-child(9) {
        left: 20%;
        width: 15px;
        height: 15px;
        animation-delay: 2s;
        animation-duration: 35s;
    }

    .circles li:nth-child(10) {
        left: 85%;
        width: 150px;
        height: 150px;
        animation-delay: 0s;
        animation-duration: 11s;
    }

    @keyframes animate {

        0% {
            transform: translateY(0) rotate(0deg);
            opacity: 1;
            border-radius: 0;
        }

        100% {
            transform: translateY(-1000px) rotate(720deg);
            opacity: 0;
            border-radius: 50%;
        }

    }



    /* .input-bottom-border {
        border-radius: 0;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: 2px solid #c9c9c9;
       

    }

    .input-bottom-border-choose {
        border-radius: 0;
        border-top: none;
        border-left: none;
        border-right: none;
        border-bottom: 2px solid #c9c9c9;
       
        height: 25px;
        padding-top: 0px;

    } */




    .hide_me {
        display: none;
    }

    input[type="radio"] {
        display: initial;
    }
</style>

<style>
         .loader-container {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.8);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }
        .loader1 {
            margin-top:50%;
            margin-bottom: 50%;
            border: 6px solid #000;
            border-radius: 50%;
            border-top: 6px solid #3498db;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        
    </style>

<section class="top-sectop" style="    background-color: #e0e0e0;padding: 130px 0 100px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="text-center">
                <h2 class="fs-4 " style="color: #0068ff;">Verify Your OTP</h2>

            </div>

            <!-- <div class="text-center">
                <h2 class="text-secondary">Sign-Up as Professional</h2>
            </div> -->
            <!-- <div class="col-lg-6 col-md-6 col-sm-12" style="background:url(assets/img/images/prof-signup.webp)">
                
            </div> -->
            <div class="col-lg-10 col-md-10 col-sm-12">


                <div class="row justify-content-center" style="    padding: 20px;   border-radius: 10px;">



                    <!-- <div class="col-lg-3 col-md-3 col-sm-12 "
                        style="display: flex;align-items: center;justify-content: center;padding: 0px;position: relative;">



                        <div class=" join-prof-left-col">
                          
                            <img src="assets/img/images/sooprs-white-logo.png" alt="" style="max-width: 8rem;">
                            <div>
                                <ul class="circles">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>

                                </ul>
                            </div>
                            
                        </div>
                    </div> -->



                    <div class="col-lg-8 col-md-8 col-sm-12">
                        <div class="form-box">

                            <form action="" id="myForm" method="post" autocomplete="off" enctype="multipart/form-data">
                                <div class="error">
                                    <!-- <?php echo $error ?> -->
                                </div>
                                <input autocomplete="false" name="hidden" type="text" class="hidden">
                                <!-- <input type="hidden" value="1" name="type"> -->
                                <div class="row">
                                    <div class="form-group mt-1 col-md-12" style="text-align:center">
                                        <span style="color: #0068ff;" id="myEmail"></span>   
                                    </div>
                                    <div class="text-center text-secondary mt-2">
                                        <p style="font-size:13px">(Check your email for verification code*)</p>
                                    </div>
                                    <div class="form-group mt-1 col-md-12">
                                        <label for="otp">OTP</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control mt-2 input-bottom-border"
                                            id="otp" name="otp" placeholder="Enter your code here"
                                             required>
                                    </div>
                                    
                                    <div class="form-group mt-4 text-center ">

                                        <button type="submit" name="signUp" style="border-radius:0"
                                            class="btn btn-primary col-md-3 col-sm-3">Verify OTP</button>
                                    </div>
                                </div>


                            </form>
                            <div class="text-center mt-2 text-secondary">

                             <a class="fw-medium" id="resendOtp" style="color: #0068ff;cursor:pointer;"
                                >Resend OTP</a>
                        </div>
                        </div>
                        
                    </div>


                </div>

            </div>

        </div>
    </div>
</section>
<div class="loader-container" id="loader">
    <div class="loader1"></div>
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

    var email = localStorage.getItem('user_email');
    document.getElementById('myEmail').innerHTML = email;

    
    function showLoader() {
        document.getElementById('loader').style.display = 'flex';
    }

    function hideLoader() {
        document.getElementById('loader').style.display = 'none';
    }

    let form = document.getElementById('myForm');
   
    form.addEventListener('submit', (event) => {
        
        event.preventDefault();
        showLoader();
        var form1 = new FormData(form);
        
        form1.append('email', email);
        // Send a POST request to your API endpoint
        fetch('<?php echo $SITE_URL ?>/api2/public/index.php/verifyOtp', {
            method: 'POST',
            body: form1, // Use FormData directly as the body
        })
        .then(response => response.json())
        .then(data => {

           
           

            if(data.status == 200){
                
               
                window.location.href = '<?php echo $SITE_URL ?>/login-professional';
            }
            toastr.error(data.msg, 'Message');
            hideLoader();
            
        })
        .catch(error => {
            hideLoader();
        });
    })

</script>

<script>
    $("#resendOtp").on("click", function () {
        var resendOtpEmail = localStorage.getItem('user_email');
        showLoader();

    
        $.ajax({
            url: site_url+'/api2/public/index.php/resendOtp',
            method: "POST",
            data: { email: resendOtpEmail },
            success: function (response) {

                var new_data = JSON.parse(response);

                $('#staticBackdropIs_buyer').modal('hide');

                if(new_data.status == 200){               
               
                    toastr.success(new_data.msg, 'Message');
                    location.reload();
                }
                toastr.error(new_data.msg, 'Message');
                location.reload();

            }
        });
    });
</script>


<?php include "./footer.php" ?>