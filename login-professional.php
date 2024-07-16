<?php
session_start();
include_once "function.php";
include_once 'env.php';
include_once 'config.php';


$_SESSION['loggedin'] = false;

if (isset($_SESSION['id'])) {
    if ($_SESSION['is_buyer'] == 0) {
        $url = $SITE_URL . '/browse-job';
        header('Location: ' . $url);
        exit();
    } else {

        $url = $SITE_URL . '/my-queries';
        header('Location: ' . $url);
        exit();
    }
}


$userCredentials = new DB_con();
$error = "";

// google login code start 
$login_button = '';

//This $_GET["code"] variable value received after user has login into their Google Account redirct to PHP script then this variable value has been received
if (isset($_GET["code"])) {

    //It will Attempt to exchange a code for an valid authentication token.
    $token = $client->fetchAccessTokenWithAuthCode($_GET["code"]);
    //This condition will check there is any error occur during geting authentication token. If there is no any error occur then it will execute if block of code/
    if (!isset($token['error'])) {
        //Set the access token used for requests

        //Store "access_token" value in $_SESSION variable for future use.
        //Create Object of Google Service OAuth 2 class
        $google_service = new Google_Service_Oauth2($client);
        //Get user profile data from google
        $data = $google_service->userinfo->get();
        //   print_r($data['email']);


        $signinRes = $userCredentials->checkemail($data['email'], 'join_professionals');
        if ($signinRes == 1) {
            $client->setAccessToken($token['access_token']);

            $userType = $userCredentials->getUserType($data['email']);
            if ($userType == 1) {
                $_SESSION['loggedin'] = true;
                $_SESSION['customer'] = true;
                $_SESSION['type'] = 'customer';
                $_SESSION['access_token'] = $token['access_token'];

                $_SESSION['id'] = $userCredentials->getUserIdGoogle($data['email']);
                $_SESSION['is_buyer'] = $userType;
                setcookie("auth_user_id", "", time() - 3600);
                setcookie('user_logged_in', true, 0, "/");
                setcookie('auth_user_id', $_SESSION['id'], 0, "/");

                echo '<script>
                   // Function to get a cookie by name
                        function getCookie(name) {
                            let cookieArr = document.cookie.split(";");
                            for (let i = 0; i < cookieArr.length; i++) {
                                let cookiePair = cookieArr[i].split("=");
                                if (name === cookiePair[0].trim()) {
                                    return decodeURIComponent(cookiePair[1]);
                                }
                            }
                            return null;
                        }

                        // Function to delete a cookie
                        function deleteCookie(name, path = "/") {
                            document.cookie = name + "=; Expires=Thu, 01 Jan 1970 00:00:01 GMT; Path=" + path;
                        }

                        var redirectUrl = localStorage.getItem("redirectAfterLogin");
                        if (redirectUrl) {
                            localStorage.removeItem("redirectAfterLogin"); // Clear the stored URL
                            window.location.href = redirectUrl; // Redirect to the stored URL
                        } else {
                            var redirectAfterLoginOnPostSteps2 = getCookie("redirectAfterLoginOnPostSteps2");
                            if (redirectAfterLoginOnPostSteps2) {
                                deleteCookie("redirectAfterLoginOnPostSteps2"); // Clear the stored URL
                                window.location.href = redirectAfterLoginOnPostSteps2; // Redirect to the stored URL
                            } else {
                                window.location.href = "' . $SITE_URL . '/my-queries";
                                console.log("wertyui ", window.location.href);
                            }
                        }
                </script>';

                $url = $SITE_URL . '/my-queries';
                header('Location: ' . $url);
                exit();
            } else {
                $_SESSION['loggedin'] = true;
                $_SESSION['professional'] = true;
                $_SESSION['type'] = 'professional';
                $_SESSION['access_token'] = $token['access_token'];

                $_SESSION['id'] = $userCredentials->getUserIdGoogle($data['email']);
                $_SESSION['is_buyer'] = $userType;
                setcookie("auth_user_id", "", time() - 3600);

                // Set a cookie that expires in 10 years
                setcookie('user_logged_in', true, 0, "/");
                setcookie('auth_user_id', $_SESSION['id']);

                echo '<script>
                    var redirectUrl = localStorage.getItem("redirectAfterLogin");
                    if (redirectUrl) {
                        localStorage.removeItem("redirectAfterLogin"); // Clear the stored URL
                        window.location.href = redirectUrl; // Redirect to the stored URL
                    } else {
                        // Default redirect if no URL is stored
                        window.location.href = "' . $SITE_URL . '/browse-job";
                        console.log("wertyui ",window.location.href);
                    }
                </script>';
                // $url = $SITE_URL.'/browse-job';
                // header('Location: ' . $url);
                // exit();
            }
        } else {
            echo "<script>document.addEventListener('DOMContentLoaded', function() {
            toastr.error('User not found');
        });</script>";
        }

    }
}

//This is for check user has login into system by using Google account, if User not login into system then it will execute if block of code and make code for display Login link for Login using Google account.
if (!isset($_SESSION['access_token'])) {
    //Create a URL to obtain user authorization
    $login_button = '<a href="' . $client->createAuthUrl() . '"><button class="gsi-material-button">
  <div class="gsi-material-button-state"></div>
  <div class="gsi-material-button-content-wrapper">
    <div class="gsi-material-button-icon">
      <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" xmlns:xlink="http://www.w3.org/1999/xlink" style="display: block;">
        <path fill="#EA4335" d="M24 9.5c3.54 0 6.71 1.22 9.21 3.6l6.85-6.85C35.9 2.38 30.47 0 24 0 14.62 0 6.51 5.38 2.56 13.22l7.98 6.19C12.43 13.72 17.74 9.5 24 9.5z"></path>
        <path fill="#4285F4" d="M46.98 24.55c0-1.57-.15-3.09-.38-4.55H24v9.02h12.94c-.58 2.96-2.26 5.48-4.78 7.18l7.73 6c4.51-4.18 7.09-10.36 7.09-17.65z"></path>
        <path fill="#FBBC05" d="M10.53 28.59c-.48-1.45-.76-2.99-.76-4.59s.27-3.14.76-4.59l-7.98-6.19C.92 16.46 0 20.12 0 24c0 3.88.92 7.54 2.56 10.78l7.97-6.19z"></path>
        <path fill="#34A853" d="M24 48c6.48 0 11.93-2.13 15.89-5.81l-7.73-6c-2.15 1.45-4.92 2.3-8.16 2.3-6.26 0-11.57-4.22-13.47-9.91l-7.98 6.19C6.51 42.62 14.62 48 24 48z"></path>
        <path fill="none" d="M0 0h48v48H0z"></path>
      </svg>
    </div>
    <span class="gsi-material-button-contents">Sign in with Google</span>
    <span style="display: none;">Sign in with Google</span>
  </div>
</button></a>';
}

// google login code end 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);

    if (!$email) {
        $error .= "Email is required <br>";
    }
    if (!$password) {
        $error .= "Password is required <br>";
    }
    if ($error) {
        $error = "<b>There were error(s) in your form!</b><br>" . $error;
    } else {
        $table = "join_professionals";
        $signinRes = $userCredentials->signin($email, $password, $table);

        if ($signinRes == 5) {


            $_SESSION['loggedin'] = true;
            $_SESSION['professional'] = true;
            $_SESSION['type'] = 'professional';
            $_SESSION['id'] = $userCredentials->idUser();
            $_SESSION['is_buyer'] = $userCredentials->is_buyer($_SESSION['id']);
            setcookie("auth_user_id", "", time() - 3600);

            // Set a cookie that expires in 10 years
            setcookie('user_logged_in', true, 0, "/");
            setcookie('auth_user_id', $_SESSION['id']);

            $url = $SITE_URL . '/browse-job';
            header('Location: ' . $url);
            exit();
        }

        if ($signinRes == 4) {


            $_SESSION['loggedin'] = true;
            $_SESSION['customer'] = true;
            $_SESSION['type'] = 'customer';

            $_SESSION['id'] = $userCredentials->idUser();
            $_SESSION['is_buyer'] = $userCredentials->is_buyer($_SESSION['id']);
            setcookie("auth_user_id", "", time() - 3600);

            // Set a cookie that expires in 10 years
            setcookie('user_logged_in', true, 0, "/");
            setcookie('auth_user_id', $_SESSION['id']);
            echo '<script>
                   // Function to get a cookie by name
                        function getCookie(name) {
                            let cookieArr = document.cookie.split(";");
                            for (let i = 0; i < cookieArr.length; i++) {
                                let cookiePair = cookieArr[i].split("=");
                                if (name === cookiePair[0].trim()) {
                                    return decodeURIComponent(cookiePair[1]);
                                }
                            }
                            return null;
                        }

                        // Function to delete a cookie
                        function deleteCookie(name, path = "/") {
                            document.cookie = name + "=; Expires=Thu, 01 Jan 1970 00:00:01 GMT; Path=" + path;
                        }

                        var redirectUrl = localStorage.getItem("redirectAfterLogin");
                        if (redirectUrl) {
                            localStorage.removeItem("redirectAfterLogin"); // Clear the stored URL
                            window.location.href = redirectUrl; // Redirect to the stored URL
                        } else {
                            var redirectAfterLoginOnPostSteps2 = getCookie("redirectAfterLoginOnPostSteps2");
                            if (redirectAfterLoginOnPostSteps2) {
                                deleteCookie("redirectAfterLoginOnPostSteps2"); // Clear the stored URL
                                window.location.href = redirectAfterLoginOnPostSteps2; // Redirect to the stored URL
                            } else {
                                window.location.href = "' . $SITE_URL . '/my-queries";
                                console.log("wertyui ", window.location.href);
                            }
                        }
                </script>';

            // $url = $SITE_URL.'/my-queries';
            // header('Location: ' . $url);
            // exit();
        }

        // if ($signinRes == 2) {

        //     $url = '/verify_otp';
        //     header('Location: ' . $url);
        //     exit();
        // } 



        if ($signinRes == 10) {
            $input_email = $email;
            $input_pass = $password;
            $error = "Invalid password. Please try again.";
        }
        if ($signinRes == 100) {
            $input_email = $email;
            $input_pass = $password;
            $error = "Invalid email . Please try again.";
        }
    }


}


$title = 'Professional Login ';
$description = "Description";
$keywords = "key,words";
?>
<?php include "./header2.php" ?>

<style>
    .form-box {
        padding: 30px;
        /* border: 1px solid #cbcbcb; */
        background-color: white;
        box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
    }

    .error {
        color: red;
        width: fit-content;

        font-size: 14px;
    }




    #target {
        /* background: #0099cc; */
        width: auto;
        height: 300px;
        height: auto;
        padding: 5px;
        display: none;
    }

    .Hide {
        display: none;
    }


    /* Loader  */
    .loaderr {
        /* margin: 0 0 2em;
        height: 100px; */
        width: 20%;
        text-align: center;
        /* padding: 1em;
        margin: 0 auto 1em; */
        display: none;
        /* vertical-align: top; */
    }


    .loaderr svg rect {
        /* x: 0;
            y: 10; */
        width: 4px;
        height: 10px;
        fill: rgb(255 255 255) !important;
        opacity: 0.2;
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
        left: -17%;
        width: 150px;
        height: 150px;
        animation-delay: 0s;
        bottom: -44px;
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
</style>

<section class=" top-sectop " style="padding: 50px 0 100px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <!-- <div class="text-center">
                <h2 class="text-secondary">Login as Professional</h2>
            </div> -->

            <div class="col-lg-10 col-md-10 col-sm-12">


                <div class="row justify-content-center" style="border-radius: 10px;">



                    <div class="col-lg-3 col-md-3 col-sm-12 "
                        style="background:url('https://sooprs.com/assets/images/sooprs_login_back.png');background-position: center;background-size: cover;display: flex;align-items: center;justify-content: center;padding: 0px;position: relative;">



                        <!-- <div class=" join-prof-left-col">
                            
                            <img src="assets/img/images/sooprs-white-logo.png" alt="" style="max-width: 8rem;">
                            <div>
                                <ul class="circles">
                                    <li></li>
                                    <li></li>
                                    <li></li>
                                    <li></li>

                                </ul>
                            </div>
                            
                        </div> -->
                    </div>



                    <div class="col-lg-5 col-md-5 col-sm-12">
                        <div class="form-box login_page">
                            <h2 class="fs-4 text-center" >Welcome Back!</h2>
                            <p class="text-secondary text-center" style="font-size:13px">Login to access your account.</p>

                            <?php if (isset($error)) { ?>
                                <p style="color: red;font-size:13px"><?php echo $error; ?></p>
                            <?php } ?>
                            <form action="" method="post">


                                <div class="row justify-content-center">
                                    <div class=" mt-3 ">
                                        <label for="inputemail">Email</label>
                                        <input type="text" class="form-control mt-2" id="inputemail" name="email"
                                            value="<?php echo isset($input_email) ? $input_email : ''; ?>" required>
                                    </div>


                                    <div class=" mt-3 ">
                                        <label for="inputpass">Password</label>
                                        <input type="password" class="form-control mt-2" id="inputpass" name="password"
                                            required>
                                        <span toggle="#inputpass"
                                            class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                    </div>
                                    <div class=" mt-3 text-center col-lg-12 col-md-12">

                                        <button type="submit" name="submit" class="login-page-login-btn col-md-12 col-sm-12"
                                            id="professional-login">Login</button>
                                    </div>
                                </div>
                            </form>

                            <div>
                                <p class="toggle mt-2 link-underline-primary text-end text-secondary forgot-password-text"
                                    style="cursor:pointer">Lost your password?</p>
                            </div>
                            <div id="target">
                                <div class="row">
                                    <div id="successPopup"
                                        style="display: none;    background-color: limegreen;text-align: center;color: white;">
                                        Email sent successfully!</div>
                                    <form action="#" method="post">
                                        <input type="hidden" name="type" value="1" id="login-type">
                                        <div class=" col-lg-12 col-md-12 col-sm-12">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" name="email" class="form-control" id="email"
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 text-center mt-2">
                                            <button type="button" name="send-link"
                                                class="btn btn-sm btn-primary text-nowrap" id="forgot-btn"
                                                style="font-size: 11px;">Get new password on your
                                                email</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="spacer">Or</div>

                            <?php
                            if ($login_button == '') {
                                echo '<h3><a href="logout.php">Logout</h3></div>';
                            } else {
                                echo '<div class="mt-3" align="center">' . $login_button . '</div>';
                            }
                            ?>


                            

                            <div class="text-center mt-3 text-secondary" style='font-size: 12px;'>

                                Don't have an account yet ? <a class="fw-medium"
                                    style="color: #0068ff;text-decoration:none"
                                    href="<?php echo $SITE_URL ?>/join-professional">Sign Up</a>
                            </div>
                        </div>



                    </div>

                </div>


            </div>



        </div>

    </div>
    </div>
</section>

<div class="loader-container" id="loader">
    <div class="loader">
        <img src='https://sooprs.com/assets/images/sooprs_white_logo.webp' style='    position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 110px;'>

    </div>
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
    $('.Show').click(function () {
        $('#target').show(200);
        $('.Show').hide(0);
        $('.Hide').show(0);
    });
    $('.Hide').click(function () {
        $('#target').hide(500);
        $('.Show').show(0);
        $('.Hide').hide(0);
    });
    $('.toggle').click(function () {
        $('#target').toggle('slow');
    });


    $(document).ready(function () {
        let input = $("#email");
        let button = $("#forgot-btn");

        if (input.val() === "") {
            button.prop('disabled', true);
        }

        input.on('input', function () {
            if (input.val() === "") {
                button.prop('disabled', true);
            }
            else {
                button.prop('disabled', false);
            }
        });
    })

</script>




<?php include "./footer.php" ?>