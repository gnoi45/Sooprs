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

// Country code and country name 
// Get the user's IP address
$userIP = $_SERVER['REMOTE_ADDR'];

// Output the user's IP address

// $ip = '52.25.109.230';
// echo "User's IP Address: " . $ip;
// Use JSON encoded string and converts 
// it into a PHP variable 
$ipdat = @json_decode(
    file_get_contents(
        "http://www.geoplugin.net/json.gp?ip=" . $userIP
    )
);

$userCountryCode = $ipdat->geoplugin_countryCode;
// echo 'Country Name: ' . $ipdat->geoplugin_countryName . "\n"; 
// echo 'Country Code: ' . $ipdat->geoplugin_countryCode . "\n"; 

// echo 'City Name: ' . $ipdat->geoplugin_city . "\n"; 
// echo 'Continent Name: ' . $ipdat->geoplugin_continentName . "\n"; 
// echo 'Latitude: ' . $ipdat->geoplugin_latitude . "\n"; 
// echo 'Longitude: ' . $ipdat->geoplugin_longitude . "\n"; 
// echo 'Currency Symbol: ' . $ipdat->geoplugin_currencySymbol . "\n"; 
// echo 'Currency Code: ' . $ipdat->geoplugin_currencyCode . "\n"; 
// echo 'Timezone: ' . $ipdat->geoplugin_timezone; 






$error = "";

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {   
//     $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
//     $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
//     $input_services = $_POST["services"]; 
//     $service = implode(", ", $input_services) ;
//     $emailvalidate = filter_var($email, FILTER_VALIDATE_EMAIL);
//     $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_NUMBER_INT);
//     $organisation = filter_input(INPUT_POST, 'organisation', FILTER_SANITIZE_STRING);

//     $password = $_POST['password'];
//     $repeatPassword = $_POST['repeatPassword'];

//     if (!$name) {
//         $error .= "Name is required. <br>";
//     }
//     if (!$emailvalidate) {
//         $error .= "Email is invalid. <br>";
//     }
//     if (!$mobile) {
//         $error .= "Mobile is required. <br>";
//     }
//     if (!preg_match('/^[0-9]{10}$/', $mobile)) {
//         $error .= "Mobile is invalid. <br>";
//     }
//     if (!$service) {
//         $error .= "Service is required. <br>";
//     }
//     if ($password !== $repeatPassword) {
//         $error .= "Password does not match. <br>";
//     }
//     if ($error) {
//         $error = "<b>There were error(s) in your form!</b> <br>" . $error;
//         $input_name = $name;
//         $input_email = $email;
//         $input_mobile = $mobile;
//         $input_service = $service;
//         $input_organisation = $organisation;
//         $input_password = $password;
//         $input_repeatPassword = $repeatPassword;
//     } else {
//         $target_dir = "assets/files/";
//         $image_name = basename($_FILES["image"]["name"]);
//         $image_file = $target_dir . $image_name;
//         $uploadOk = 1;
//         $imageFileType = strtolower(pathinfo($image_file, PATHINFO_EXTENSION));

//         $check = getimagesize($_FILES["image"]["tmp_name"]);
//         if ($check !== false) {
//             $uploadOk = 1;
//         } else {
//             echo "File is not an image.";
//             $uploadOk = 0;
//         }

//         if ($_FILES["image"]["size"] > 5000000) {
//             echo "Sorry, your file is too large.";
//             $uploadOk = 0;
//         }

//         if (
//             $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
//             && $imageFileType != "gif"
//         ) {
//             echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//             $uploadOk = 0;
//         }


//         if ($uploadOk == 0) {
//             echo "Sorry, your file was not uploaded.";

//         } else {
//             if (move_uploaded_file($_FILES["image"]["tmp_name"], $image_file)) {

//                 if ($_FILES['resume']['error'] === UPLOAD_ERR_OK) {
//                     $uploadDir = 'assets/files/';
//                     $allowedTypes = array('pdf');
//                     $filename = basename($_FILES['resume']['name']);
//                     $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

//                     if (!in_array($fileExtension, $allowedTypes)) {
//                         die("Error: File type not allowed.");
//                     }

//                     $newFilename = uniqid('', true) . '.' . $fileExtension;
//                     $targetPath = $uploadDir . $newFilename;

//                     if (!move_uploaded_file($_FILES['resume']['tmp_name'], $targetPath)) {
//                         die("Error: Failed to move uploaded file.");
//                     }


//                     $table = "join_professionals";
//                     $checkemail = $userdata->checkemail($email, $table);


//                     if (!empty($checkemail)) {
//                         echo "Account already exists!";
//                     } else {
//                         $hashpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

//                         $sqlres = $userdata->profes_registration($name, $email, $mobile, $organisation, $service,$hashpassword, $table);

//                         if ($sqlres) {
//                             $login = "login-professional";
//                             $emailSent = $userdata->sendWelcomeEmail($name,$email,$login);

//                             if($emailSent){
//                                 $_SESSION['join_message'] = "Thanks for registering, your profile is under review. It will be approved soon.";                               
//                                 $url = '/sooprss/';
//                                 header('Location: ' . $url);
//                                 exit(); 
//                             }    
//                         } else {
//                             echo "Something went wrong!";
//                         }
//                     }
//                     echo "The file " . basename($_FILES["resume"]["name"]) . " has been uploaded.";
//                 } else {
//                     die("Error: Upload failed with error code " . $_FILES['resume']['error']);
//                 }

//             } else {
//                 echo "Sorry, there was an error uploading your file.";
//             }
//         }

//     }

// }

?>
<?php
$title = 'Join as Professional | Sooprs.com ';
$description = "Join as professional at Sooprs.com";
$keywords = "Join as professional at Sooprs.com, Professional registration page";
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
        height: 100%;
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
        
    } */

    /* .input-bottom-border-choose {
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



    .select2-container--default .select2-selection--multiple {

        border: 1px solid #e0e0e0 !important;

        padding-bottom: 10px;

    }
</style>


<style>
    .switch {
        display: inline-block;
        height: 22px;
        position: relative;
        width: 50px;
        display: block;
    }

    .switch input {
        display: none;
    }

    .slider {
        background-color: #ccc;
        bottom: 0;
        cursor: pointer;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
        transition: .4s;
    }

    .slider:before {
        background-color: #fff;
        bottom: 4px;
        content: "";
        height: 15px;
        left: 4px;
        position: absolute;
        transition: .4s;
        width: 15px;
    }

    input:checked+.slider {
        background-color: #0d6efd;
    }

    input:checked+.slider:before {
        transform: translateX(26px);
    }

    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    p.msg {
        border: 1px solid red;
        font-size: 12px;
        color: red;
        padding: 3px;
    }
</style>

<section class="top-sectop" style="    background-color: #e0e0e0;padding: 70px 0 100px 0;">
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
            <div class="col-lg-10 col-md-10 col-sm-12">


                <div class="row justify-content-center" style="     border-radius: 10px;">



                    <div class="col-lg-3 col-md-3 col-sm-12 " style="background:url('https://sooprs.com/assets/images/sooprs_login_back.png');background-position: center;
    background-size: cover;display: flex;align-items: center;justify-content: center;padding: 0px;position: relative;">


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



                    <div class="col-lg-8 col-md-8 col-sm-12">

                        <div class="form-box">
                            <h2 class="fs-4 text-center fw-bold">Sign Up! </h2>
                            <p class='text-center text-secondary' style='    font-size: 12px;'>Join as a client seeking
                                excellence or as <br> a professional delivering expertise.</p>

                            <form action="" id="myForm" method="post" autocomplete="off" enctype="multipart/form-data">
                                <div class="error">
                                    <?php echo $error ?>
                                </div>
                                <input autocomplete="false" name="hidden" type="text" class="hidden">

                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <label class="clickable-box" style="width: -webkit-fill-available;"
                                            onclick="handleBoxClick(this)">
                                            <!-- Radio button -->
                                            <div class="d-flex justify-content-between align-items-center">
                                                <img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1705057735/client-icon_cnuzax.png"
                                                    alt="">
                                                <span class="radio-button">
                                                    <input type="radio" id="myRadioButtonclient" name="is_buyer"
                                                        value='1'>
                                                </span>
                                            </div>

                                            <!-- You can customize the content of your box here -->
                                            <span class='text-dark'>
                                                <h3 class='fw-bold' style='font-size: 20px;'>Join as Client</h3>
                                                <p>Elevate your business</p>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <label class="clickable-box" style="width: -webkit-fill-available;"
                                            onclick="handleBoxClick(this)">
                                            <!-- Radio button -->
                                            <div class="d-flex justify-content-between align-items-center">
                                                <img src="https://res.cloudinary.com/dr4iluda9/image/upload/v1705057735/prof-icon_ekz3x2.png"
                                                    alt="">
                                                <span class="radio-button">
                                                    <input type="radio" id="myRadioButtonprof" name="is_buyer"
                                                        value='0'>
                                                </span>
                                            </div>

                                            <!-- You can customize the content of your box here -->
                                            <span class='text-dark'>
                                                <h3 class='fw-bold' style='font-size: 20px;'>Join as Professional</h3>
                                                <p>Showcase your expertise</p>
                                            </span>
                                        </label>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class=" ">
                                            <label for="inputname">Name</label> <span class="text-danger">*</span>
                                            <input type="text" class="form-control mt-2 input-bottom-border"
                                                id="inputname" name="name"
                                                value="<?php echo isset($input_name) ? $input_name : ''; ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class=" ">
                                            <label for="inputemail">Email</label><span class="text-danger">*</span>
                                            <input type="email" class="form-control mt-2 input-bottom-border"
                                                id="inputemail" name="email"
                                                value="<?php echo isset($input_email) ? $input_email : ''; ?>" required>
                                        </div>
                                    </div>

                                    <!-- <div class=" mt-1">
                                        <label for="inputmobile">Mobile</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control mt-2 input-bottom-border"
                                            id="inputmobile" name="mobile" maxlength="10"
                                            value="<?php echo isset($input_mobile) ? $input_mobile : ''; ?>" required>
                                    </div> -->

                                    <div class=" col-md-6 mt-3">
                                        <label for="country">Country</label> <span class="text-danger">*</span>
                                        <select class="form-select countries-list mt-2" id="country" name="country"
                                            onchange="updateCountryCode()">

                                            <option value="AF" <?php if ($userCountryCode === 'AF')
                                                echo 'selected' ?>>
                                                    Afghanistan</option>
                                                <option value="AL" <?php if ($userCountryCode === 'AL')
                                                echo 'selected' ?>>
                                                    Albania</option>
                                                <option value="DZ" <?php if ($userCountryCode === 'DZ')
                                                echo 'selected' ?>>
                                                    Algeria</option>
                                                <option value="AD" <?php if ($userCountryCode === 'AD')
                                                echo 'selected' ?>>
                                                    Andorra</option>
                                                <option value="AO" <?php if ($userCountryCode === 'AO')
                                                echo 'selected' ?>>
                                                    Angola</option>
                                                <option value="AG" <?php if ($userCountryCode === 'AG')
                                                echo 'selected' ?>>
                                                    Antigua and Barbuda</option>
                                                <option value="AR" <?php if ($userCountryCode === 'AR')
                                                echo 'selected' ?>>
                                                    Argentina</option>
                                                <option value="AM" <?php if ($userCountryCode === 'AM')
                                                echo 'selected' ?>>
                                                    Armenia</option>
                                                <option value="AW" <?php if ($userCountryCode === 'AW')
                                                echo 'selected' ?>>
                                                    Aruba</option>
                                                <option value="AS" <?php if ($userCountryCode === 'AS')
                                                echo 'selected' ?>>
                                                    American Samoa</option>
                                                <option value="AU" <?php if ($userCountryCode === 'AU')
                                                echo 'selected' ?>>
                                                    Australia</option>
                                                <option value="AT" <?php if ($userCountryCode === 'AT')
                                                echo 'selected' ?>>
                                                    Austria</option>
                                                <option value="AZ" <?php if ($userCountryCode === 'AZ')
                                                echo 'selected' ?>>
                                                    Azerbaijan</option>
                                                <option value="BS" <?php if ($userCountryCode === 'BS')
                                                echo 'selected' ?>>
                                                    Bahamas</option>
                                                <option value="BD" <?php if ($userCountryCode === 'BD')
                                                echo 'selected' ?>>
                                                    Bangladesh</option>
                                                <option value="BB" <?php if ($userCountryCode === 'BB')
                                                echo 'selected' ?>>
                                                    Barbados</option>
                                                <option value="BI" <?php if ($userCountryCode === 'BI')
                                                echo 'selected' ?>>
                                                    Burundi</option>
                                                <option value="BE" <?php if ($userCountryCode === 'BE')
                                                echo 'selected' ?>>
                                                    Belgium</option>
                                                <option value="BJ" <?php if ($userCountryCode === 'BJ')
                                                echo 'selected' ?>>
                                                    Benin</option>
                                                <option value="BM" <?php if ($userCountryCode === 'BM')
                                                echo 'selected' ?>>
                                                    Bermuda</option>
                                                <option value="BT" <?php if ($userCountryCode === 'BT')
                                                echo 'selected' ?>>
                                                    Bhutan</option>
                                                <option value="BA" <?php if ($userCountryCode === 'BA')
                                                echo 'selected' ?>>
                                                    Bosnia and Herzegovina</option>
                                                <option value="BZ" <?php if ($userCountryCode === 'BZ')
                                                echo 'selected' ?>>
                                                    Belize</option>
                                                <option value="BY" <?php if ($userCountryCode === 'BY')
                                                echo 'selected' ?>>
                                                    Belarus</option>
                                                <option value="BO" <?php if ($userCountryCode === 'BO')
                                                echo 'selected' ?>>
                                                    Bolivia</option>
                                                <option value="BW" <?php if ($userCountryCode === 'BW')
                                                echo 'selected' ?>>
                                                    Botswana</option>
                                                <option value="BR" <?php if ($userCountryCode === 'BR')
                                                echo 'selected' ?>>
                                                    Brazil</option>
                                                <option value="BH" <?php if ($userCountryCode === 'BH')
                                                echo 'selected' ?>>
                                                    Bahrain</option>
                                                <option value="BN" <?php if ($userCountryCode === 'BN')
                                                echo 'selected' ?>>
                                                    Brunei</option>
                                                <option value="BG" <?php if ($userCountryCode === 'BG')
                                                echo 'selected' ?>>
                                                    Bulgaria</option>
                                                <option value="BF" <?php if ($userCountryCode === 'BF')
                                                echo 'selected' ?>>
                                                    Burkina Faso</option>
                                                <option value="CF" <?php if ($userCountryCode === 'CF')
                                                echo 'selected' ?>>
                                                    Central African Republic</option>
                                                <option value="KH" <?php if ($userCountryCode === 'KH')
                                                echo 'selected' ?>>
                                                    Cambodia</option>
                                                <option value="CA" <?php if ($userCountryCode === 'CA')
                                                echo 'selected' ?>>
                                                    Canada</option>
                                                <option value="KY" <?php if ($userCountryCode === 'KY')
                                                echo 'selected' ?>>
                                                    Cayman Islands</option>
                                                <option value="CG" <?php if ($userCountryCode === 'CG')
                                                echo 'selected' ?>>
                                                    Congo</option>
                                                <option value="TD" <?php if ($userCountryCode === 'TD')
                                                echo 'selected' ?>>
                                                    Chad</option>
                                                <option value="CL" <?php if ($userCountryCode === 'CL')
                                                echo 'selected' ?>>
                                                    Chile</option>
                                                <option value="CN" <?php if ($userCountryCode === 'CN')
                                                echo 'selected' ?>>
                                                    China</option>
                                                <option value="CI" <?php if ($userCountryCode === 'CI')
                                                echo 'selected' ?>>
                                                    Cote d'Ivoire</option>
                                                <option value="CM" <?php if ($userCountryCode === 'CM')
                                                echo 'selected' ?>>
                                                    Cameroon</option>
                                                <option value="CD" <?php if ($userCountryCode === 'CD')
                                                echo 'selected' ?>>DR
                                                    Congo</option>
                                                <option value="CK" <?php if ($userCountryCode === 'CK')
                                                echo 'selected' ?>>
                                                    Cook Islands</option>
                                                <option value="CO" <?php if ($userCountryCode === 'CO')
                                                echo 'selected' ?>>
                                                    Colombia</option>
                                                <option value="KM" <?php if ($userCountryCode === 'KM')
                                                echo 'selected' ?>>
                                                    Comoros</option>
                                                <option value="CV" <?php if ($userCountryCode === 'CV')
                                                echo 'selected' ?>>
                                                    Cape Verde</option>
                                                <option value="CR" <?php if ($userCountryCode === 'CR')
                                                echo 'selected' ?>>
                                                    Costa Rica</option>
                                                <option value="HR" <?php if ($userCountryCode === 'HR')
                                                echo 'selected' ?>>
                                                    Croatia</option>
                                                <option value="CU" <?php if ($userCountryCode === 'CU')
                                                echo 'selected' ?>>
                                                    Cuba</option>
                                                <option value="CY" <?php if ($userCountryCode === 'CY')
                                                echo 'selected' ?>>
                                                    Cyprus</option>
                                                <option value="CZ" <?php if ($userCountryCode === 'CZ')
                                                echo 'selected' ?>>
                                                    Czech Republic</option>
                                                <option value="DK" <?php if ($userCountryCode === 'DK')
                                                echo 'selected' ?>>
                                                    Denmark</option>
                                                <option value="DJ" <?php if ($userCountryCode === 'DJ')
                                                echo 'selected' ?>>
                                                    Djibouti</option>
                                                <option value="DM" <?php if ($userCountryCode === 'DM')
                                                echo 'selected' ?>>
                                                    Dominica</option>
                                                <option value="DO" <?php if ($userCountryCode === 'DO')
                                                echo 'selected' ?>>
                                                    Dominican Republic</option>
                                                <option value="EC" <?php if ($userCountryCode === 'EC')
                                                echo 'selected' ?>>
                                                    Ecuador</option>
                                                <option value="EG" <?php if ($userCountryCode === 'EG')
                                                echo 'selected' ?>>
                                                    Egypt</option>
                                                <option value="ER" <?php if ($userCountryCode === 'ER')
                                                echo 'selected' ?>>
                                                    Eritrea</option>
                                                <option value="SV" <?php if ($userCountryCode === 'SV')
                                                echo 'selected' ?>>El
                                                    Salvador</option>
                                                <option value="ES" <?php if ($userCountryCode === 'ES')
                                                echo 'selected' ?>>
                                                    Spain</option>
                                                <option value="EE" <?php if ($userCountryCode === 'EE')
                                                echo 'selected' ?>>
                                                    Estonia</option>
                                                <option value="ET" <?php if ($userCountryCode === 'ET')
                                                echo 'selected' ?>>
                                                    Ethiopia</option>
                                                <option value="FJ" <?php if ($userCountryCode === 'FJ')
                                                echo 'selected' ?>>
                                                    Fiji</option>
                                                <option value="FI" <?php if ($userCountryCode === 'FI')
                                                echo 'selected' ?>>
                                                    Finland</option>
                                                <option value="FR" <?php if ($userCountryCode === 'FR')
                                                echo 'selected' ?>>
                                                    France</option>
                                                <option value="FM" <?php if ($userCountryCode === 'FM')
                                                echo 'selected' ?>>
                                                    Micronesia</option>
                                                <option value="GA" <?php if ($userCountryCode === 'GA')
                                                echo 'selected' ?>>
                                                    Gabon</option>
                                                <option value="GM" <?php if ($userCountryCode === 'GM')
                                                echo 'selected' ?>>
                                                    Gambia</option>
                                                <option value="GB" <?php if ($userCountryCode === 'GB')
                                                echo 'selected' ?>>
                                                    Great Britain</option>
                                                <option value="GW" <?php if ($userCountryCode === 'GW')
                                                echo 'selected' ?>>
                                                    Guinea-Bissau</option>
                                                <option value="GE" <?php if ($userCountryCode === 'GE')
                                                echo 'selected' ?>>
                                                    Georgia</option>
                                                <option value="GQ" <?php if ($userCountryCode === 'GQ')
                                                echo 'selected' ?>>
                                                    Equatorial Guinea</option>
                                                <option value="DE" <?php if ($userCountryCode === 'DE')
                                                echo 'selected' ?>>
                                                    Germany</option>
                                                <option value="GH" <?php if ($userCountryCode === 'GH')
                                                echo 'selected' ?>>
                                                    Ghana</option>
                                                <option value="GR" <?php if ($userCountryCode === 'GR')
                                                echo 'selected' ?>>
                                                    Greece</option>
                                                <option value="GD" <?php if ($userCountryCode === 'GD')
                                                echo 'selected' ?>>
                                                    Grenada</option>
                                                <option value="GT" <?php if ($userCountryCode === 'GT')
                                                echo 'selected' ?>>
                                                    Guatemala</option>
                                                <option value="GN" <?php if ($userCountryCode === 'GN')
                                                echo 'selected' ?>>
                                                    Guinea</option>
                                                <option value="GU" <?php if ($userCountryCode === 'GU')
                                                echo 'selected' ?>>
                                                    Guam</option>
                                                <option value="GY" <?php if ($userCountryCode === 'GY')
                                                echo 'selected' ?>>
                                                    Guyana</option>
                                                <option value="HT" <?php if ($userCountryCode === 'HT')
                                                echo 'selected' ?>>
                                                    Haiti</option>
                                                <option value="HK" <?php if ($userCountryCode === 'HK')
                                                echo 'selected' ?>>
                                                    Hong Kong</option>
                                                <option value="HN" <?php if ($userCountryCode === 'HN')
                                                echo 'selected' ?>>
                                                    Honduras</option>
                                                <option value="HU" <?php if ($userCountryCode === 'HU')
                                                echo 'selected' ?>>
                                                    Hungary</option>
                                                <option value="ID" <?php if ($userCountryCode === 'ID')
                                                echo 'selected' ?>>
                                                    Indonesia</option>
                                                <option value="IN" <?php if ($userCountryCode === 'IN')
                                                echo 'selected' ?>
                                                    selected>India</option>
                                                <option value="IR" <?php if ($userCountryCode === 'IR')
                                                echo 'selected' ?>>
                                                    Iran</option>
                                                <option value="IE" <?php if ($userCountryCode === 'IE')
                                                echo 'selected' ?>>
                                                    Ireland</option>
                                                <option value="IQ" <?php if ($userCountryCode === 'IQ')
                                                echo 'selected' ?>>
                                                    Iraq</option>
                                                <option value="IS" <?php if ($userCountryCode === 'IS')
                                                echo 'selected' ?>>
                                                    Iceland</option>
                                                <option value="IL" <?php if ($userCountryCode === 'IL')
                                                echo 'selected' ?>>
                                                    Israel</option>
                                                <option value="VG" <?php if ($userCountryCode === 'VG')
                                                echo 'selected' ?>>
                                                    Virgin Islands</option>
                                                <option value="IT" <?php if ($userCountryCode === 'IT')
                                                echo 'selected' ?>>
                                                    Italy</option>
                                                <option value="VI" <?php if ($userCountryCode === 'VI')
                                                echo 'selected' ?>>
                                                    British Virgin Islands</option>
                                                <option value="JM" <?php if ($userCountryCode === 'JM')
                                                echo 'selected' ?>>
                                                    Jamaica</option>
                                                <option value="JO" <?php if ($userCountryCode === 'JO')
                                                echo 'selected' ?>>
                                                    Jordan</option>
                                                <option value="JP" <?php if ($userCountryCode === 'JP')
                                                echo 'selected' ?>>
                                                    Japan</option>
                                                <option value="KZ" <?php if ($userCountryCode === 'KZ')
                                                echo 'selected' ?>>
                                                    Kazakhstan</option>
                                                <option value="KE" <?php if ($userCountryCode === 'KE')
                                                echo 'selected' ?>>
                                                    Kenya</option>
                                                <option value="KG" <?php if ($userCountryCode === 'KG')
                                                echo 'selected' ?>>
                                                    Kyrgyzstan</option>
                                                <option value="KI" <?php if ($userCountryCode === 'KI')
                                                echo 'selected' ?>>
                                                    Kiribati</option>
                                                <option value="KR" <?php if ($userCountryCode === 'KR')
                                                echo 'selected' ?>>
                                                    South Korea</option>
                                                <option value="XK" <?php if ($userCountryCode === 'XK')
                                                echo 'selected' ?>>
                                                    Kosovo</option>
                                                <option value="SA" <?php if ($userCountryCode === 'SA')
                                                echo 'selected' ?>>
                                                    Saudi Arabia</option>
                                                <option value="KW" <?php if ($userCountryCode === 'KW')
                                                echo 'selected' ?>>
                                                    Kuwait</option>
                                                <option value="LA" <?php if ($userCountryCode === 'LA')
                                                echo 'selected' ?>>
                                                    Laos</option>
                                                <option value="LV" <?php if ($userCountryCode === 'LV')
                                                echo 'selected' ?>>
                                                    Latvia</option>
                                                <option value="LY" <?php if ($userCountryCode === 'LY')
                                                echo 'selected' ?>>
                                                    Libya</option>
                                                <option value="LR" <?php if ($userCountryCode === 'LR')
                                                echo 'selected' ?>>
                                                    Liberia</option>
                                                <option value="LC" <?php if ($userCountryCode === 'LC')
                                                echo 'selected' ?>>
                                                    Saint Lucia</option>
                                                <option value="LS" <?php if ($userCountryCode === 'LS')
                                                echo 'selected' ?>>
                                                    Lesotho</option>
                                                <option value="LB" <?php if ($userCountryCode === 'LB')
                                                echo 'selected' ?>>
                                                    Lebanon</option>
                                                <option value="LI" <?php if ($userCountryCode === 'LI')
                                                echo 'selected' ?>>
                                                    Liechtenstein</option>
                                                <option value="LT" <?php if ($userCountryCode === 'LT')
                                                echo 'selected' ?>>
                                                    Lithuania</option>
                                                <option value="LU" <?php if ($userCountryCode === 'LU')
                                                echo 'selected' ?>>
                                                    Luxembourg</option>
                                                <option value="MG" <?php if ($userCountryCode === 'MG')
                                                echo 'selected' ?>>
                                                    Madagascar</option>
                                                <option value="MA" <?php if ($userCountryCode === 'MA')
                                                echo 'selected' ?>>
                                                    Morocco</option>
                                                <option value="MY" <?php if ($userCountryCode === 'MY')
                                                echo 'selected' ?>>
                                                    Malaysia</option>
                                                <option value="MW" <?php if ($userCountryCode === 'MW')
                                                echo 'selected' ?>>
                                                    Malawi</option>
                                                <option value="MD" <?php if ($userCountryCode === 'MD')
                                                echo 'selected' ?>>
                                                    Moldova</option>
                                                <option value="MV" <?php if ($userCountryCode === 'MV')
                                                echo 'selected' ?>>
                                                    Maldives</option>
                                                <option value="MX" <?php if ($userCountryCode === 'MX')
                                                echo 'selected' ?>>
                                                    Mexico</option>
                                                <option value="MN" <?php if ($userCountryCode === 'MN')
                                                echo 'selected' ?>>
                                                    Mongolia</option>
                                                <option value="MH" <?php if ($userCountryCode === 'MH')
                                                echo 'selected' ?>>
                                                    Marshall Islands</option>
                                                <option value="MK" <?php if ($userCountryCode === 'MK')
                                                echo 'selected' ?>>
                                                    Macedonia</option>
                                                <option value="ML" <?php if ($userCountryCode === 'ML')
                                                echo 'selected' ?>>
                                                    Mali</option>
                                                <option value="MT" <?php if ($userCountryCode === 'MT')
                                                echo 'selected' ?>>
                                                    Malta</option>
                                                <option value="ME" <?php if ($userCountryCode === 'ME')
                                                echo 'selected' ?>>
                                                    Montenegro</option>
                                                <option value="MC" <?php if ($userCountryCode === 'MC')
                                                echo 'selected' ?>>
                                                    Monaco</option>
                                                <option value="MZ" <?php if ($userCountryCode === 'MZ')
                                                echo 'selected' ?>>
                                                    Mozambique</option>
                                                <option value="MU" <?php if ($userCountryCode === 'MU')
                                                echo 'selected' ?>>
                                                    Mauritius</option>
                                                <option value="MR" <?php if ($userCountryCode === 'MR')
                                                echo 'selected' ?>>
                                                    Mauritania</option>
                                                <option value="MM" <?php if ($userCountryCode === 'MM')
                                                echo 'selected' ?>>
                                                    Myanmar</option>
                                                <option value="NA" <?php if ($userCountryCode === 'NA')
                                                echo 'selected' ?>>
                                                    Namibia</option>
                                                <option value="NI" <?php if ($userCountryCode === 'NI')
                                                echo 'selected' ?>>
                                                    Nicaragua</option>
                                                <option value="NL" <?php if ($userCountryCode === 'NL')
                                                echo 'selected' ?>>
                                                    Netherlands</option>
                                                <option value="NP" <?php if ($userCountryCode === 'NP')
                                                echo 'selected' ?>>
                                                    Nepal</option>
                                                <option value="NG" <?php if ($userCountryCode === 'NG')
                                                echo 'selected' ?>>
                                                    Nigeria</option>
                                                <option value="NE" <?php if ($userCountryCode === 'NE')
                                                echo 'selected' ?>>
                                                    Niger</option>
                                                <option value="NO" <?php if ($userCountryCode === 'NO')
                                                echo 'selected' ?>>
                                                    Norway</option>
                                                <option value="NR" <?php if ($userCountryCode === 'NR')
                                                echo 'selected' ?>>
                                                    Nauru</option>
                                                <option value="NZ" <?php if ($userCountryCode === 'NZ')
                                                echo 'selected' ?>>New
                                                    Zealand</option>
                                                <option value="OM" <?php if ($userCountryCode === 'OM')
                                                echo 'selected' ?>>
                                                    Oman</option>
                                                <option value="PK" <?php if ($userCountryCode === 'PK')
                                                echo 'selected' ?>>
                                                    Pakistan</option>
                                                <option value="PA" <?php if ($userCountryCode === 'PA')
                                                echo 'selected' ?>>
                                                    Panama</option>
                                                <option value="PY" <?php if ($userCountryCode === 'PY')
                                                echo 'selected' ?>>
                                                    Paraguay</option>
                                                <option value="PE" <?php if ($userCountryCode === 'PE')
                                                echo 'selected' ?>>
                                                    Peru</option>
                                                <option value="PH" <?php if ($userCountryCode === 'PH')
                                                echo 'selected' ?>>
                                                    Philippines</option>
                                                <option value="PS" <?php if ($userCountryCode === 'PS')
                                                echo 'selected' ?>>
                                                    Palestine</option>
                                                <option value="PW" <?php if ($userCountryCode === 'PW')
                                                echo 'selected' ?>>
                                                    Palau</option>
                                                <option value="PG" <?php if ($userCountryCode === 'PG')
                                                echo 'selected' ?>>
                                                    Papua New Guinea</option>
                                                <option value="PL" <?php if ($userCountryCode === 'PL')
                                                echo 'selected' ?>>
                                                    Poland</option>
                                                <option value="PT" <?php if ($userCountryCode === 'PT')
                                                echo 'selected' ?>>
                                                    Portugal</option>
                                                <option value="KP" <?php if ($userCountryCode === 'KP')
                                                echo 'selected' ?>>
                                                    North Korea</option>
                                                <option value="PR" <?php if ($userCountryCode === 'PR')
                                                echo 'selected' ?>>
                                                    Puerto Rico</option>
                                                <option value="QA" <?php if ($userCountryCode === 'QA')
                                                echo 'selected' ?>>
                                                    Qatar</option>
                                                <option value="RO" <?php if ($userCountryCode === 'RO')
                                                echo 'selected' ?>>
                                                    Romania</option>
                                                <option value="ZA" <?php if ($userCountryCode === 'ZA')
                                                echo 'selected' ?>>
                                                    South Africa</option>
                                                <option value="RU" <?php if ($userCountryCode === 'RU')
                                                echo 'selected' ?>>
                                                    Russia</option>
                                                <option value="RW" <?php if ($userCountryCode === 'RW')
                                                echo 'selected' ?>>
                                                    Rwanda</option>
                                                <option value="WS" <?php if ($userCountryCode === 'WS')
                                                echo 'selected' ?>>
                                                    Samoa</option>
                                                <option value="SN" <?php if ($userCountryCode === 'SN')
                                                echo 'selected' ?>>
                                                    Senegal</option>
                                                <option value="SC" <?php if ($userCountryCode === 'SC')
                                                echo 'selected' ?>>
                                                    Seychelles</option>
                                                <option value="SG" <?php if ($userCountryCode === 'SG')
                                                echo 'selected' ?>>
                                                    Singapore</option>
                                                <option value="KN" <?php if ($userCountryCode === 'KN')
                                                echo 'selected' ?>>
                                                    Saint Kitts and Nevis</option>
                                                <option value="SL" <?php if ($userCountryCode === 'SL')
                                                echo 'selected' ?>>
                                                    Sierra Leone</option>
                                                <option value="SI" <?php if ($userCountryCode === 'SI')
                                                echo 'selected' ?>>
                                                    Slovenia</option>
                                                <option value="SM" <?php if ($userCountryCode === 'SM')
                                                echo 'selected' ?>>San
                                                    Marino</option>
                                                <option value="SB" <?php if ($userCountryCode === 'SB')
                                                echo 'selected' ?>>
                                                    Solomon Islands</option>
                                                <option value="SO" <?php if ($userCountryCode === 'SO')
                                                echo 'selected' ?>>
                                                    Somalia</option>
                                                <option value="RS" <?php if ($userCountryCode === 'RS')
                                                echo 'selected' ?>>
                                                    Serbia</option>
                                                <option value="LK" <?php if ($userCountryCode === 'LK')
                                                echo 'selected' ?>>Sri
                                                    Lanka</option>
                                                <option value="SS" <?php if ($userCountryCode === 'SS')
                                                echo 'selected' ?>>
                                                    South Sudan</option>
                                                <option value="ST" <?php if ($userCountryCode === 'ST')
                                                echo 'selected' ?>>Sao
                                                    Tome and Principe</option>
                                                <option value="SD" <?php if ($userCountryCode === 'SD')
                                                echo 'selected' ?>>
                                                    Sudan</option>
                                                <option value="SE" <?php if ($userCountryCode === 'SE')
                                                echo 'selected' ?>>
                                                    Sweden</option>
                                                <option value="SR" <?php if ($userCountryCode === 'SR')
                                                echo 'selected' ?>>
                                                    Suriname</option>
                                                <option value="SK" <?php if ($userCountryCode === 'SK')
                                                echo 'selected' ?>>
                                                    Slovakia</option>
                                                <option value="SE" <?php if ($userCountryCode === 'SE')
                                                echo 'selected' ?>>
                                                    Sweden</option>
                                                <option value="SY" <?php if ($userCountryCode === 'SY')
                                                echo 'selected' ?>>
                                                    Syria</option>
                                                <option value="TZ" <?php if ($userCountryCode === 'TZ')
                                                echo 'selected' ?>>
                                                    Tanzania</option>
                                                <option value="TO" <?php if ($userCountryCode === 'TO')
                                                echo 'selected' ?>>
                                                    Tonga</option>
                                                <option value="TH" <?php if ($userCountryCode === 'TH')
                                                echo 'selected' ?>>
                                                    Thailand</option>
                                                <option value="TJ" <?php if ($userCountryCode === 'TJ')
                                                echo 'selected' ?>>
                                                    Tajikistan</option>
                                                <option value="TM" <?php if ($userCountryCode === 'TM')
                                                echo 'selected' ?>>
                                                    Turkmenistan</option>
                                                <option value="TL" <?php if ($userCountryCode === 'TL')
                                                echo 'selected' ?>>
                                                    Timor-Leste</option>
                                                <option value="TG" <?php if ($userCountryCode === 'TG')
                                                echo 'selected' ?>>
                                                    Togo</option>
                                                <option value="TW" <?php if ($userCountryCode === 'TW')
                                                echo 'selected' ?>>
                                                    Chinese Taipei</option>
                                                <option value="TT" <?php if ($userCountryCode === 'TT')
                                                echo 'selected' ?>>
                                                    Trinidad and Tobago</option>
                                                <option value="TN" <?php if ($userCountryCode === 'TN')
                                                echo 'selected' ?>>
                                                    Tunisia</option>
                                                <option value="TR" <?php if ($userCountryCode === 'TR')
                                                echo 'selected' ?>>
                                                    Turkey</option>
                                                <option value="TV" <?php if ($userCountryCode === 'TV')
                                                echo 'selected' ?>>
                                                    Tuvalu</option>
                                                <option value="AE" <?php if ($userCountryCode === 'AE')
                                                echo 'selected' ?>>
                                                    United Arab Emirates</option>
                                                <option value="UG" <?php if ($userCountryCode === 'UG')
                                                echo 'selected' ?>>
                                                    Uganda</option>
                                                <option value="UA" <?php if ($userCountryCode === 'UA')
                                                echo 'selected' ?>>
                                                    Ukraine</option>
                                                <option value="UY" <?php if ($userCountryCode === 'UY')
                                                echo 'selected' ?>>
                                                    Uruguay</option>
                                                <option value="US" <?php if ($userCountryCode === 'US')
                                                echo 'selected' ?>>
                                                    United States</option>
                                                <option value="UZ" <?php if ($userCountryCode === 'UZ')
                                                echo 'selected' ?>>
                                                    Uzbekistan</option>
                                                <option value="VU" <?php if ($userCountryCode === 'VU')
                                                echo 'selected' ?>>
                                                    Vanuatu</option>
                                                <option value="VE" <?php if ($userCountryCode === 'VE')
                                                echo 'selected' ?>>
                                                    Venezuela</option>
                                                <option value="VN" <?php if ($userCountryCode === 'VN')
                                                echo 'selected' ?>>
                                                    Vietnam</option>
                                                <option value="VC" <?php if ($userCountryCode === 'VC')
                                                echo 'selected' ?>>
                                                    Saint Vincent and the Grenadines
                                                </option>
                                                <option value="YE" <?php if ($userCountryCode === 'YE')
                                                echo 'selected' ?>>
                                                    Yemen</option>
                                                <option value="ZM" <?php if ($userCountryCode === 'ZM')
                                                echo 'selected' ?>>
                                                    Zambia</option>
                                                <option value="ZA" <?php if ($userCountryCode === 'ZA')
                                                echo 'selected' ?>>
                                                    Zanzibar</option>
                                                <option value="ZW" <?php if ($userCountryCode === 'ZW')
                                                echo 'selected' ?>>
                                                    Zimbabwe</option>
                                            </select>
                                    </div>
                                    <div class=" col-md-6 mt-3">
                                        <label for="country">Mobile</label> <span class="text-danger">*</span>
                                        <div class='d-flex'>
                                            <input class="form-control mt-2 me-1" style="padding:5px;width:70px;" type="text"
                                                id="countryCode" readonly value="+91" name="countryCode">
                                            <input class="form-control mt-2" style="padding:5px;" type="number"
                                                id="phone" value="" name="mobile">
                                        </div>
                                    </div>




                                        <!-- <div class=" mt-1 col-md-6">
                                        <label for="inputorganisation">Organisation</label>
                                        <input type="text" class="form-control mt-2 input-bottom-border"
                                                id="inputorganisation"
                                                value="<?php echo isset($input_organisation) ? $input_organisation : ''; ?>"
                                                name="organisation" >
                                        </div>


                                        <div class=" mt-1 col-md-12" id="appliedselectdiv">
                                            <label for="services">Select service<span class="text-danger">*</span></label>
                                            <select class="form-control js-example-basic-multiple" name="services[]" id="select2services" style="    border-radius: 0; border-top: none;border-left: none;border-right: none;border-bottom: 2px solid #c9c9c9;    width: -webkit-fill-available;color: #8e8e8e;font-weight: 700;    font-size: 13px;    padding: 20px 0;" multiple    required>
                                                <option value="">Select Service </option>
                                                <option value="1">Web Development </option>
                                                <option value="2">App Development </option>
                                                <option value="5">Digital Marketting</option>
                                                <option value="16">Internet of Things </option>
                                                <option value="other">Other </option>
                                            </select>

                                        

                                        
                                        </div> -->



                                    <div class="col-md-6 mt-3">
                                        <div class=" ">
                                            <label for="inputpassword">Password</label><span class="text-danger">*</span>
                                            <input type="password" class="form-control mt-2 input-bottom-border"
                                                id="inputpassword" name="password"
                                                value="<?php echo isset($input_password) ? $input_password : ''; ?>"
                                                required>
                                            <span toggle="#inputpassword"
                                                class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class=" ">
                                            <label for="repeatPassword">Confirm Password</label><span
                                                class="text-danger">*</span>
                                            <input type="password" class="form-control mt-2 input-bottom-border"
                                                id="repeatPassword" name="repeatPassword"
                                                value="<?php echo isset($input_repeatPassword) ? $input_repeatPassword : ''; ?>"
                                                required>
                                            <span toggle="#repeatPassword"
                                                class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                        </div>
                                    </div>


                                    <div class=" mt-3">



                                        <!-- <label class="switch" for="buyer">
                                        <input type="checkbox" id="buyer" class="toggle-input" name="is_buyer" value="1">
                                            <div class="slider round"></div>
                                        </label>
                                        <span style="font-size:12px;">Click me if you are a client, hiring for a project.</span><br> -->



                                        <p class="msg" id="msg" style="display:none"></p>

                                        <div class=" mt-4 text-center ">

                                            <button type="submit" name="signUp"  class="btn btn-sm btn-primary pt-2 pb-2 col-md-12 col-sm-12 w-100">Sign Up</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="text-center mt-2 text-secondary" style="font-size: 12px;">

                                Already have an account ? <a class="fw-medium" style="color: #0068ff;"
                                    href="login-professional">Login</a>
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
        <img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1705386434/sooprs-svg_bseaya.svg' style='    position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 110px;'>

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
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
    // });


    // const checkbox = document.getElementById('buyer');
    // checkbox.addEventListener('change', function() {
    //     if (this.checked) {
    //     console.log('Checkbox is checked');
    //     console.log('Checkbox is unchecked');
    //     // Perform actions when checkbox is unchecked
    //     }
    // });


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
        fetch('<?php echo $SITE_URL; ?>/api2/public/index.php/customerRegistration', {
            method: 'POST',
            body: form1, // Use FormData directly as the body
        })
            .then(response => response.json())
            .then(data => {

                $("p#msg").text('');
                $("p#msg").hide();


                if (data.status == 200) {

                    localStorage.setItem('user_email', form1.get('email'));

                    window.location.href = '<?php echo $SITE_URL; ?>/verify_otp';
                }
                else {
                    $("p#msg").show();
                    $("p#msg").text(data.msg);
                    hideLoader();
                    return false;
                }




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

<script>
    function handleBoxClick(box) {

        const boxes = document.querySelectorAll('.clickable-box');

        // Remove the 'box-clicked' class from all boxes
        boxes.forEach(b => b.classList.remove('box-clicked'));

        // Add the 'box-clicked' class to the clicked box
        box.classList.add('box-clicked');
    }

</script>

<script>
    function updateCountryCode() {
        const countrySelect = document.getElementById("country");
        const countryCodeInput = document.getElementById("countryCode");

        // Define country codes here as needed
        const countryCodes = {
            "AF": "+93",
            "AL": "+355",
            "DZ": "+213",
            "AD": "+376",
            "AO": "+244",
            "AG": "+1-268",
            "AR": "+54",
            "AM": "+374",
            "AW": "+297",
            "AS": "+1-684",
            "AU": "+61",
            "AT": "+43",
            "AZ": "+994",
            "BS": "+1-242",
            "BD": "+880",
            "BB": "+1-246",
            "BI": "+257",
            "BE": "+32",
            "BJ": "+229",
            "BM": "+1-441",
            "BT": "+975",
            "BA": "+387",
            "BZ": "+501",
            "BY": "+375",
            "BO": "+591",
            "BW": "+267",
            "BR": "+55",
            "BH": "+973",
            "BN": "+673",
            "BG": "+359",
            "BF": "+226",
            "CF": "+236",
            "KH": "+855",
            "CA": "+1",
            "KY": "+1-345",
            "CG": "+242",
            "TD": "+235",
            "CL": "+56",
            "CN": "+86",
            "CI": "+225",
            "CM": "+237",
            "CD": "+243",
            "CK": "+682",
            "CO": "+57",
            "KM": "+269",
            "CV": "+238",
            "CR": "+506",
            "HR": "+385",
            "CU": "+53",
            "CY": "+357",
            "CZ": "+420",
            "DK": "+45",
            "DJ": "+253",
            "DM": "+1 767",
            "DO": "+1 809",
            "EC": "+593",
            "EG": "+20",
            "ER": "+291",
            "SV": "+503",
            "ES": "+34",
            "EE": "+372",
            "ET": "+251",
            "FJ": "+679",
            "FI": "+358",
            "FR": "+33",
            "FM": "+691",
            "GA": "+241",
            "GM": "+220",
            "GB": "+44",
            "GW": "+245",
            "GE": "+995",
            "GQ": "+240",
            "DE": "+49",
            "GH": "+233",
            "GR": "+30",
            "GD": "+1 473",
            "GT": "+502",
            "GN": "+224",
            "GU": "+1 671",
            "GY": "+592",
            "HT": "+509",
            "HK": "+852",
            "HN": "+504",
            "HU": "+36",
            "ID": "+62",
            "IN": "+91",
            "IR": "+98",
            "IE": "+353",
            "IQ": "+964",
            "IS": "+354",
            "IL": "+972",
            "VG": "+00 1",
            "IT": "+39",
            "VI": "+1 284",
            "JM": "+1 876",
            "JO": "+962",
            "JP": "+81",
            "KZ": "+7 6",
            "KE": "+254",
            "KG": "+996",
            "KI": "+686",
            "KR": "+82",
            "XK": "+383",
            "SA": "+966",
            "KW": "+965",
            "LA": "+856",
            "LV": "+371",
            "LY": "+218",
            "LR": "+231",
            "LC": "+1 758",
            "LS": "+266",
            "LB": "+961",
            "LI": "+423",
            "LT": "+370",
            "LU": "+352",
            "MG": "+261",
            "MA": "+212",
            "MY": "+60",
            "MW": "+265",
            "MD": "+373",
            "MV": "+960",
            "MX": "+52",
            "MN": "+976",
            "MH": "+692",
            "MK": "+389",
            "ML": "+223",
            "MT": "+356",
            "ME": "+382",
            "MC": "+377",
            "MZ": "+258",
            "MU": "+230",
            "MR": "+222",
            "MM": "+95",
            "NA": "+264",
            "NI": "+505",
            "NL": "+31",
            "NP": "+977",
            "NG": "+234",
            "NE": "+227",
            "NO": "+47",
            "NR": "+674",
            "NZ": "+64",
            "OM": "+968",
            "PK": "+92",
            "PA": "+507",
            "PY": "+595",
            "PE": "+51",
            "PH": "+63",
            "PS": "+970",
            "PW": "+680",
            "PG": "+675",
            "PL": "+48",
            "PT": "+351",
            "KP": "+850",
            "PR": "+1 787",
            "QA": "+974",
            "RO": "+40",
            "ZA": "+27",
            "RU": "+7",
            "RW": "+250",
            "WS": "+685",
            "SN": "+221",
            "SC": "+248",
            "SG": "+65",
            "KN": "+1 869",
            "SL": "+232",
            "SI": "+386",
            "SM": "+378",
            "SB": "+677",
            "SO": "+252",
            "RS": "+381",
            "LK": "+94",
            "SS": "+211",
            "ST": "+239",
            "SD": "+249",
            "CH": "+41",
            "SR": "+597",
            "SK": "+421",
            "SE": "+46",
            "SZ": "+268",
            "SY": "+963",
            "TZ": "+255",
            "TO": "+676",
            "TH": "+66",
            "TJ": "+992",
            "TM": "+993",
            "TL": "+670",
            "TG": "+228",
            "TW": "+886",
            "TT": "+1 868",
            "TN": "+216",
            "TR": "+90",
            "TV": "+688",
            "AE": "+971",
            "UG": "+256",
            "UA": "+380",
            "UY": "+598",
            "US": "+1",
            "UZ": "+998",
            "VU": "+678",
            "VE": "+58",
            "VN": "+84",
            "VC": "+1 784",
            "YE": "+967",
            "ZM": "+260",
            "ZA": "+255 24",
            "ZW": "+263"
        };

        const selectedCountry = countrySelect.value;
        if (selectedCountry in countryCodes) {
            countryCodeInput.value = countryCodes[selectedCountry];
        } else {
            countryCodeInput.value = "";
        }
    }

    updateCountryCode();
</script>



<?php include "./footer.php" ?>