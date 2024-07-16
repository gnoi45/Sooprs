<?php
session_start();
include_once "function.php";
$_SESSION['loggedin'] = false;

if (isset($_SESSION['id'])) {
    $url = 'my-queries';
    header('Location: ' . $url);
    exit();
}


$userCredentials = new DB_con();
$error2 = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // echo '<script>document.getElementById("submitButton").disabled = true;</script>';

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = trim($_POST['password']);
    //Check if input Field are empty
    if (!$email) {
        $error2 .= "Email is required <br>";
    }
    if (!$password) {
        $error2 .= "Password is required <br>";
    }
    if ($error2) {
        $error2 = "<b>There were error(s) in your form!</b><br>" . $error2;
    } else {
        $table = "customer";
        $signinRes = $userCredentials->signin($email, $password, $table);

        if ($signinRes == 1) {
            // $login = true;              
            // session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['customer'] = true;

            $_SESSION['id'] = $userCredentials->idUser();
            // $_SESSION['name'] = $userCredentials->nameUser();

            $_SESSION['type'] = 'customer';

            $url = '/sooprss';
            header('Location: ' . $url); // Use header() function to redirect and prevent XSS attacks
            exit(); // Always exit after a redirect
        } 
        if ($signinRes == 10) {
            $input_email = $email;
            $input_pass = $password;
            $error2 = "Invalid password. Please try again.";
        }
        if($signinRes == 100){
            $input_email = $email;
            $input_pass = $password;
            $error2 = "Invalid email . Please try again.";
        }
    }




    if (isset($_POST['send-link']) && $_POST['email']) {
        $custForgotPass = $userCredentials->custForgotPass($_POST['email']);
        print_r($custForgotPass );
        die();

    }
}


$title = 'Customer Login ';
$description = "Description";
$keywords = "key,words";
?>

<?php include "./header2.php" ?>

<style>
    .form-box {
        padding: 30px;
        background: white;
        border: 1px solid #cbcbcb;
        /* box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; */
    }

    .error {
        /* background-color: pink; */
        color: red;
        width: 300px;
        /* margin: 0 auto; */
    }

    .devicer {
        width: 8em;
        display: block;
        height: 1px;
        background-color: #aeaeae;
        margin: 5px auto 0;
    }

    #target {
        /* background: #0099cc; */
        width: auto;
        height: 300px;
        height: 125px;
        padding: 5px;
        display: none;
    }

    .Hide {
        display: none;
    }


    
       
</style>


<section class=" top-sectop " style="    background-color: #e0e0e0;padding: 130px 0 100px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <!-- <div class="text-center">
                <h2 class="text-secondary">Login as Professional</h2>
            </div> -->

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row justify-content-center" style="    padding: 20px;    border-radius: 10px;">

                    <div class="col-lg-5 col-md-5 col-sm-12 d-flex justify-content-center align-items-center">
                        <div class="form-box">
                            <div  id="loginForm">
                                <h2 class="fs-4" style="color: #0068ff;">Login as Customer</h2>
                                <?php if (isset($error2)) { ?>
                                    <p style="color: red;font-size:13px"><?php echo $error2; ?></p>
                                <?php } ?>
                                <form  id="loginForm" action="" method="post">
                                
                                    <div class="row justify-content-center">
                                        <div class="form-group mt-3 ">
                                            <label for="inputemail">Email</label>
                                            <input type="text" class="form-control mt-2" id="inputemail" name="email"
                                                value="<?php echo isset($input_email) ? $input_email : ''; ?>" required>
                                        </div>
                                        <div class="form-group mt-3 ">
                                            <label for="inputpass">Password</label>
                                            <input type="password" class="form-control mt-2" id="inputpass" name="password"
                                                required>
                                        </div>
                                        <div class="form-group mt-3 text-center col-lg-4 col-md-4">
                                            <button type="submit" name="submit" class="btn btn-primary col-md-12 col-sm-12"
                                                style="border-radius: 0;" onclick="disableSubmit()"
                                                id="submitButton">Login</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            

                            <p class="toggle mt-2 link-underline-primary text-center text-secondary"
                                style="cursor:pointer">
                                <span class="login-text">Lost your password?</span>
                                <span class="toggle-text" style="display: none;color: rgb(255 255 255);background-color: rgb(13, 110, 253);padding: 2px 5px;font-size: 15px;">Login here</span>
                            </p>
                            <div id="target">
                                <div class="row">
                                    <div id="successPopup" style="display: none;    background-color: limegreen;text-align: center;color: white;">Email sent successfully!</div>
                                    <form action="#" method="post">
                                        <input type="hidden" name="type" value="0" id="login-type">
                                        <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                            <label for="exampleInputEmail1">Email address</label>
                                            <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter your email...">
                                            
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 text-center mt-2" >
                                            <button type="button" name="send-link" class="btn btn-sm btn-primary text-nowrap" id="forgot-btn" style="font-size: 11px;border-radius:0px">Get new password 

                                                <div class="loader loader--style8" title="7" id="mail-sent-loader">
                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                        width="24px" height="30px" viewBox="0 0 24 30" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                                                        <rect x="0" y="10" width="4" height="10" fill="#333" opacity="0.2">
                                                            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0s" dur="0.6s" repeatCount="indefinite" />
                                                            <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
                                                            <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0s" dur="0.6s" repeatCount="indefinite" />
                                                        </rect>
                                                        <rect x="8" y="10" width="4" height="10" fill="#333"  opacity="0.2">
                                                            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
                                                            <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
                                                            <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.15s" dur="0.6s" repeatCount="indefinite" />
                                                        </rect>
                                                        <rect x="16" y="10" width="4" height="10" fill="#333"  opacity="0.2">
                                                            <animate attributeName="opacity" attributeType="XML" values="0.2; 1; .2" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
                                                            <animate attributeName="height" attributeType="XML" values="10; 20; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
                                                            <animate attributeName="y" attributeType="XML" values="10; 5; 10" begin="0.3s" dur="0.6s" repeatCount="indefinite" />
                                                        </rect>
                                                    </svg>
                                                </div>

                                            </button>
                                            
                                        </div>
                                    </form>
                                </div>

                            </div>


                            <div class="text-center mt-3">
                                <div class=" row d-flex justify-content-center">
                                    
                                        <p class="text-secondary pe-2"> Don't have an account yet ? </p>
                                    <br>
                                   
                                        <a class="fw-medium" style="color: #0068ff;text-decoration:none;font-size:14px" href="customer-signup">Sign Up</a>

                                </div>

                                <br>
                                <div class="d-flex align-items-center justify-content-center">
                                    <div class="devicer"></div>
                                    <!-- <hr class="m-0"> -->
                                    <p>OR</p>
                                    <!-- <hr class="m-0"> -->
                                    <div class="devicer"></div>
                                </div>

                                <br>
                                <div class="d-flex justify-content-center">
                                    <p class="text-secondary pe-2" style="font-size:14px">
                                        Are you a professional?

                                    </p>
                                    <a class="fw-medium" style="color: #0068ff;text-decoration:none;font-size:14px"
                                        href="login-professional">Login as Professional</a>
                                </div>

                            </div>
                        </div>


                        <div>

                        </div>



                    </div>

                    <!-- <div class="col-lg-1 col-md-1 col-sm-12 d-flex justify-content-center align-items-center"
                        style="max-width: 1px;margin: 0;background: #969696; padding: 0px 0 0 2px;">

                    </div> -->

                    <!-- <div class="col-lg-3 col-md-3 col-sm-12 d-flex justify-content-center align-items-center mt-3">

                        <a class="fw-medium btn btn-lg btn-primary text-white"
                            style="color: #0068ff;text-decoration:none" href="login-professional">Login as
                            Professional</a>
                    </div> -->
                </div>


            </div>



        </div>

    </div>
    </div>
</section>




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
        $('#loginForm').toggle('slow');
        
        $('.login-text').toggle();
        $('.toggle-text').toggle();
    });


    // Disable reset button initially 
    $(document).ready(function(){
        let input = $("#email");
        let button = $("#forgot-btn");

        if(input.val() === ""){
            button.prop('disabled', true);
        }

        input.on('input', function(){
            if(input.val() === ""){
                button.prop('disabled', true);
            }
            else{
            button.prop('disabled', false);
            }
        });
    })


</script>


<?php include "./footer.php" ?>