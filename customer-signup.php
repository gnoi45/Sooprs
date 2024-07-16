<?php
session_start();
include_once 'function.php';

$userdata = new DB_con();

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $emailvalidate = filter_var($email, FILTER_VALIDATE_EMAIL);
    $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_NUMBER_INT);

    $password = $_POST['password'];
    $repeatPassword = $_POST['repeatPassword'];

    // Form validation messages 
    if (!$name) {
        $error .= "Name is required. <br>";
    }
    if (!$email) {
        $error .= "Email is required. <br>";
    }
    if (!$emailvalidate) {
        $error .= "Email is invalid. <br>";
    }
    if (!$mobile) {
        $error .= "Mobile is required. <br>";
    }
    if (!preg_match('/^[0-9]{10}$/', $mobile)) {
        $error .= "Mobile is invalid. <br>";
    }
    if ($password !== $repeatPassword) {
        $error .= "Password does not match. <br>";
    }
    if ($error) {
        $error = "<b>There were error(s) in your form!</b> <br>" . $error;
        $input_name = $name;
        $input_email = $email;
        $input_mobile = $mobile;
        $input_password = $password;
        $input_repeatPassword = $repeatPassword;
    } else {
        $table = "customer";
        $checkemail = $userdata->checkemail($email, $table);
        // $checkemailRow = mysqli_fetch_array($checkemail);
        if (!empty($checkemail)) {
            echo "Account already exists!";
        } else {
            $hashpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sqlres = $userdata->customer_registration($name, $email, $mobile, $hashpassword, $table);
            // print_r($sqlres);
            // die();
            if ($sqlres) {
               $login = "customer-login";
                $emailSent = $userdata->sendWelcomeEmail($name,$email,$login);
               
                
                if($emailSent){
                    $_SESSION['join_message'] = "Thanks for registering, your profile is under review. It will be approved soon.";
                    $url = 'index';
                    header('Location: ' . $url); // Use header() function to redirect and prevent XSS attacks
                    exit(); // Always exit after a redirect
                }
                //session variables to keep user logged in
                // $_SESSION['id'] = mysqli_insert_id($userdata->dbh);
                
            } else {
                echo "Something went wrong!";
            }
        }
        
    }
}
?>


<?php

$title = 'Join as Customer | Sooprs ';

$description = "Join as customer at Sooprs";

$keywords = "join as customer,customer-page";

?>



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
        .loader {
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
                <h2 class="fs-4 " style="color: #0068ff;">Sign Up As Customer</h2>
                <!-- <p class=" message_p">
                    <?php
                    if (isset($_SESSION['message']) && $_SESSION['message'] !== '') {
                        echo $_SESSION['message'];
                    }
                    ?>
                </p> -->
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
                                    <?php echo $error ?>
                                </div>
                                <input autocomplete="false" name="hidden" type="text" class="hidden">
                                <!-- <input type="hidden" value="1" name="type"> -->
                                <div class="row">
                                    <div class="form-group mt-1 col-md-12">
                                        <label for="inputname">Name</label> <span class="text-danger">*</span>
                                        <input type="text" class="form-control mt-2 input-bottom-border" id="inputname"
                                            name="name" value="<?php echo isset($input_name) ? $input_name : ''; ?>"
                                            required>
                                    </div>
                                    <div class="form-group mt-1 col-md-12">
                                        <label for="inputemail">Email</label><span class="text-danger">*</span>
                                        <input type="email" class="form-control mt-2 input-bottom-border"
                                            id="inputemail" name="email"
                                            value="<?php echo isset($input_email) ? $input_email : ''; ?>" required>
                                    </div>
                                    <div class="form-group mt-1 col-md-12">
                                        <label for="inputmobile">Mobile</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control mt-2 input-bottom-border"
                                            id="inputmobile" name="mobile" maxlength="10"
                                            value="<?php echo isset($input_mobile) ? $input_mobile : ''; ?>" required>
                                    </div>
                                    


                                    <div class="form-group mt-1 col-md-12">
                                        <label for="inputpassword">Password</label><span class="text-danger">*</span>
                                        <input type="password" class="form-control mt-2 input-bottom-border"
                                            id="inputpassword" name="password"
                                            value="<?php echo isset($input_password) ? $input_password : ''; ?>"
                                            required>
                                    </div>
                                    <div class="form-group mt-1 col-md-12">
                                        <label for="repeatPassword">Confirm Password</label><span
                                            class="text-danger">*</span>
                                        <input type="password" class="form-control mt-2 input-bottom-border"
                                            id="repeatPassword" name="repeatPassword"
                                            value="<?php echo isset($input_repeatPassword) ? $input_repeatPassword : ''; ?>"
                                            required>
                                    </div>

                                    <div class="form-group mt-4 text-center ">

                                        <button type="submit" name="signUp" style="border-radius:0"
                                            class="btn btn-primary col-md-3 col-sm-3">Sign Up</button>
                                    </div>
                                </div>


                            </form>
                            <div class="text-center mt-2 text-secondary">

                            Already have an account ? <a class="fw-medium" style="color: #0068ff;"
                                href="customer-login">Login</a>
                        </div>
                        </div>
                        
                    </div>


                </div>

            </div>

        </div>
    </div>
</section>
<div class="loader-container" id="loader">
    <div class="loader"></div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    
   

    // let inputmob = document.getElementById('inputmobile');

    // inputmob.addEventListener("keydown", function (event) {
    //     // if (!/^[0-9]+$/.test(event.target.value)) {
    //     //     event.preventDefault();
    //     // }

    //     if (event.keyCode >= 48 && event.keyCode <= 57) {
    //         let max_input_length = 10;
    //         let current_input_length = input.value.length;
    //         if (current_input_length >= max_input_length) {
    //             event.preventDefault();
    //         }
    //     }

    // })

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
       
        // Send a POST request to your API endpoint
        fetch('https://sooprs.com/sooprss/api2/public/index.php/customerRegistration', {
            method: 'POST',
            body: form1, // Use FormData directly as the body
        })
        .then(response => response.json())
        .then(data => {

           
            

            if(data.status == 200){
                
                localStorage.setItem('user_email', form1.get('email'));
                console.log("woring here");
                window.location.href = 'https://sooprs.com/sooprss/verify_otp';
            }

             
            toastr.error(data.msg, 'Error');
            hideLoader();

            // // Retrieve user information
            // const storedUser = JSON.parse(localStorage.getItem('sooprs_user'));

            // console.log(storedUser.name); // Output: John Doe
            // console.log(storedUser.email); // Output: john@example.com
        })
        .catch(error => {
            hideLoader();
            console.error('Error:', error);
        });
    })

</script>



<?php include "./footer.php" ?>