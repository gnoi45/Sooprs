<?php
session_start();
include_once "function.php";
include_once 'env.php';



// $_SESSION['loggedin'] = false;

// if (isset($_SESSION['id'])) {
//     $url = 'my-queries';
//     header('Location: ' . $url);
//     exit();
// }


$userCredentials = new DB_con();
$username = null;
if(isset($_SESSION['id']) ){

    $username = $userCredentials->getUser($_SESSION['id'],'customer');
    
    if(empty($username) || $username == ''){
        $username = $userCredentials->getUser($_SESSION['id'],'join_professionals');    
    }
}


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

            $url = 'my-queries';
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
    
    @media screen and (min-width: 490px) {
     
    .half-left {
        width:50%;
        float:left;
    }
    .half-right{
        width:50%;
        float:right;
    
  }
   .sprs-4 {
      width:80% !important;
  }
  .sprs-2 {
      width:20% !important;
  }
}

 @media screen and (max-width: 480px) {
     
    .half-left {
        width:100%;
        float:none;
        
    }
    .half-right{
        width:100%;
        float:none;
       
    
  }
  
  .sprs-4 {
      width:80% !important;
  }
  .sprs-2 {
      width:20% !important;
  }
  
  
}
   


    
       
</style>


<section class=" top-sectop " style="    background-color: #e0e0e0;padding: 80px 0 100px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <!-- <div class="text-center">
                <h2 class="text-secondary">Login as Professional</h2>
            </div> -->

            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="row justify-content-center" style="    padding: 20px;    border-radius: 10px;">

                    <div class="col-lg-6 col-md-6 col-sm-12 d-flex justify-content-center align-items-center">
                        <div class="form-box">
                            <div  id="">
                                <h2 class="fs-4" style="color: #0068ff;">Enter OTP</h2>
                                
                                <form   action="" method="post">
                                    <div id="output-msg" style="    background: limegreen; color: white;text-align: center;"></div>
                                <!-- <p id="last-form-error" class="error-p-tag text-danger" style="display:none">Please fill all details</p> -->

                                <p id="last-form-email-error" class="error-p-tag text-danger" style="display:none">Incorrect OTP</p>
                                <!-- <p id="last-form-email-len-error" class="error-p-tag text-danger" style="display:none">Email too large
                                </p>

                                <p id="last-form-mobile-error" class="error-p-tag text-danger" style="display:none">Enter mobile number
                                </p>

                                <p id="last-form-mobile-len-short-error" class="error-p-tag text-danger" style="display:none">Mobile
                                    number too short</p>
                                <p id="last-form-mobile-len-big-error" class="error-p-tag text-danger" style="display:none">Mobile
                                    number too long</p> -->
                                    <div class="row justify-content-center">
                                        
                                        
                                        <div class="form-group mt-3 ">
                                            <label for="description">Enter OTP</label>                                            
                                            <input class="form-control" name="otp" id="otp" required placeholder = "OTP here">
                                            
                                        </div>
                                       
                                       
                                        
                                        <div class="form-group mt-3 text-center col-lg-4 col-md-4">
                                            <button type="button" name="submit" class="btn btn-primary col-md-12 col-sm-12"
                                                style="border-radius: 0;"  id="otp_verify_email_project">Submit</button>
                                        </div>
                                    </div>
                                </form>
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

<div class="toast" id="myToast" data-bs-autohide="true">
    <!-- <div class="toast-header">
        <strong class="me-auto"><i class="bi-bell-fill"></i>notification</strong>
        <small>1 sec ago</small>
        <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
    </div> -->
    <div class="toast-body">
        <p id="error_message"></p>
    </div>  
</div> 




</script>


<?php include "./footer.php" ?>