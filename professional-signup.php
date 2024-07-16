<?php
session_start();
include_once 'function.php';
include_once 'env.php';

$userdata = new DB_con();
if (isset($_SESSION['id'], $_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if (isset($_SESSION['professional']) && $_SESSION['professional'] === true) {
        // $loggedinUser = new DB_con();
        $username = $userdata->fetchProf($_SESSION['id']);
    } else {
        // $loggedinUser = new DB_con();
        $username = $userdata->getUser($_SESSION['id'], "customer");
        $cut_id = $username['id'];
    }
} else {
    // Default behavior or error message
    $defaultMessage = "Please log in as a professional or customer.";
}

$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $type = filter_input(INPUT_POST, 'type', FILTER_SANITIZE_STRING);

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

    $emailvalidate = filter_var($email, FILTER_VALIDATE_EMAIL);

    $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_NUMBER_INT);

    $organisation = filter_input(INPUT_POST, 'organisation', FILTER_SANITIZE_STRING);

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
    if ($password !== $repeatPassword) {
        $error .= "Password does not match. <br>";
    }
    if ($error) {
        $error = "<b>There were error(s) in your form!</b> <br>" . $error;

        $input_name = $name;

        $input_email = $email;

        $input_mobile = $mobile;

        $input_organisation = $organisation;

        $input_password = $password;

        $input_repeatPassword = $repeatPassword;

    } else {
        $table = "vendor_users";

        $checkemail = $userdata->checkemail($email, $table);

        // print_r($checkemail) ;

        // exit();



        // $checkemailRow = mysqli_fetch_array($checkemail);

        if (!empty($checkemail)) {

            echo "Account already exists!";

            // $_SESSION['message'] = "Account already exists!";

            // $url = 'professional-signup.php';

            // header('Location: ' . $url); // Use header() function to redirect and prevent XSS attacks

            // exit(); // Always exit after a redirect

        } else {
            $hashpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $sqlres = $userdata->registration($type, $name, $email, $mobile, $organisation, $hashpassword, $table);

            if ($sqlres) {

                $login = "join-professional";
                $emailSent = $userdata->sendWelcomeEmail($name,$email,$login);

                    // echo "Registration successful";                
                    //session variables to keep user logged in
                    // $_SESSION['id'] = mysqli_insert_id($userdata->dbh);
                    // $_SESSION['name'] = $name;                    

                    // $message = 'Registration successful';
                    if($emailSent){
                        $_SESSION['join_message'] = "Thanks for registering, your profile is under review. It will be approved soon.";
                        $url = 'index';
                        header('Location: ' . $url); // Use header() function to redirect and prevent XSS attacks
                        exit(); // Always exit after a redirect
                    }               

            } else {
                echo "Something went wrong!";
            }

        }



    }

















}



?>





<?php



$title = 'About Us ';



$description = "Description";



$keywords = "key,words";



?>







<?php include "./header2.php" ?>







<style>

    .error {

        background-color: pink;

        color: red;

        width: 300px;

        margin: 0 auto;

    }



    .login-section {

        margin: 70px 0;

    }



    .form-box {

        padding: 10px;

        /* background: #e3e8ec; */

        /* border-radius: 10px; */

    }



    .message_p {

        font-size: larger;

        color: white;

        font-weight: 400;

        background: #0c7100;

        display: inline-block;

        padding: 0 5px;

    }

</style>



<section class="login-section">

    <div class="container">

        <div class="row justify-content-center">

            <div class="text-center">

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

            <div class="col-lg-8 col-md-8 col-sm-12">





                <div class="row"

                    style="    padding: 20px;background: linear-gradient(90deg, rgba(156,194,246,1) 0%, rgba(255,255,255,1) 60%);    border-radius: 10px;">







                    <div class="col-lg-5 col-md-5 col-sm-12" style="text-align: center; align-self: center;">

                        <img src="assets/img/images/sooprs-fav.png" alt="" style="width:inherit;">

                    </div>







                    <div class="col-lg-7 col-md-7s col-sm-12">

                        <div class="form-box">

                            <h2 class="fs-4" style="color: #0068ff;">Sign Up</h2>

                            <form action="" method="post" autocomplete="off">

                                <div class="error">

                                    <?php echo $error ?>

                                </div>

                                <input autocomplete="false" name="hidden" type="text" class="hidden">

                                <input type="hidden" value="1" name="type">

                                <div class="row">

                                    <div class="form-group mt-3 col-md-6">

                                        <label for="inputname">Name</label>

                                        <input type="text" class="form-control mt-2" id="inputname" name="name"

                                            value="<?php echo isset($input_name) ? $input_name : ''; ?>">

                                    </div>

                                    <div class="form-group mt-3 col-md-6">

                                        <label for="inputname">Mobile</label>

                                        <input type="number" class="form-control mt-2" id="inputname" name="mobile"

                                            value="<?php echo isset($input_mobile) ? $input_mobile : ''; ?>">

                                    </div>

                                    <div class="form-group mt-3 ">

                                        <label for="inputname">Email</label>

                                        <input type="email" class="form-control mt-2" id="inputname" name="email"

                                            value="<?php echo isset($input_email) ? $input_email : ''; ?>">

                                    </div>



                                    <div class="form-group mt-3 ">

                                        <label for="inputname">Organisation</label>

                                        <input type="text" class="form-control mt-2" id="inputname"

                                            value="<?php echo isset($input_organisation) ? $input_organisation : ''; ?>"

                                            name="organisation">

                                    </div>

                                    <div class="form-group mt-3 col-md-6">

                                        <label for="inputname">Password</label>

                                        <input type="password" class="form-control mt-2" id="inputname" name="password"

                                            value="<?php echo isset($input_password) ? $input_password : ''; ?>">

                                    </div>

                                    <div class="form-group mt-3 col-md-6">

                                        <label for="repeatPassword">Confirm Password</label>

                                        <input type="password" class="form-control mt-2" id="repeatPassword"

                                            name="repeatPassword"

                                            value="<?php echo isset($input_repeatPassword) ? $input_repeatPassword : ''; ?>">

                                    </div>

                                    <div class="form-group mt-3 text-center ">



                                        <button type="submit" name="signUp"

                                            class="btn btn-primary col-md-12 col-sm-12">Sign Up</button>

                                    </div>

                                </div>





                            </form>

                        </div>

                        <div class="text-center mt-3">



                            Already have an account ? <a class="fw-medium" style="color: #0068ff;"

                                href="login">Login</a>

                        </div>

                    </div>





                </div>



            </div>



        </div>

    </div>

</section>















<?php include "./footer.php" ?>