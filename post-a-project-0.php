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
$username = '';
// $username = null;
if(isset($_SESSION['id']) ){

    // $username = $userCredentials->getUser($_SESSION['id'],'customer');
    
    // if(empty($username) || $username == ''){
        $username = $userCredentials->getUser($_SESSION['id'],'join_professionals');    
    // }
}

// Country code and country name 
// Get the user's IP address
$userIP = $_SERVER['REMOTE_ADDR'];

// Output the user's IP address

// $ip = '52.25.109.230';
// echo "User's IP Address: " . $ip;
// Use JSON encoded string and converts 
// it into a PHP variable 
$ipdat = @json_decode(file_get_contents( 
    "http://www.geoplugin.net/json.gp?ip=" . $ip)); 
   
$userCountryCode = $ipdat->geoplugin_countryCode ;
// echo 'Country Name: ' . $ipdat->geoplugin_countryName . "\n"; 
// echo 'Country Code: ' . $ipdat->geoplugin_countryCode . "\n"; 

// echo 'City Name: ' . $ipdat->geoplugin_city . "\n"; 
// echo 'Continent Name: ' . $ipdat->geoplugin_continentName . "\n"; 
// echo 'Latitude: ' . $ipdat->geoplugin_latitude . "\n"; 
// echo 'Longitude: ' . $ipdat->geoplugin_longitude . "\n"; 
// echo 'Currency Symbol: ' . $ipdat->geoplugin_currencySymbol . "\n"; 
// echo 'Currency Code: ' . $ipdat->geoplugin_currencyCode . "\n"; 
// echo 'Timezone: ' . $ipdat->geoplugin_timezone; 



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

    label {
        color: black;
        font-size: 13px;
        font-weight: 700;
    }
    .form-box {
        padding: 30px;
        background: white;
        border-left: 1px solid lightgrey;

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


<section class=" top-sectop " style="    background-color: #e0e0e0;padding: 20px 0 100px 0;">
    <div class="container">
        <div class="row justify-content-center" style="    padding: 20px;    border-radius: 10px;">
            <div class="col-md-2 bg-white d-none d-md-block" style='    border-top-left-radius: inherit;border-bottom-left-radius: inherit;'>
                <div class='d-flex align-items-center justify-content-center' style='    top: 50%;position: relative; bottom: 50%; transform: translate(0, -50%);'>
                    <div class='text-center' style='    justify-content: center;display: flex; flex-direction: column;align-items: center;'>
                        <img style='    width: 10vw; display: block;' src="https://res.cloudinary.com/dr4iluda9/image/upload/v1706082199/sooprs/post-a-project-leftpanel_a2h5zw.png" alt="post-a-project">
                        <strong style='    font-size: 1vw;'>Add Project Details</strong>
                        <p class='text-secondary ' style='    font-size: 0.8vw;'>Add details like Category,Title, contact details,Budget etc</p>
                    </div>
                </div>
                
            </div>
            <!-- <div class="col-lg-1 col-md-1 col-sm-12 d-flex justify-content-center align-items-center"
                style="max-width: 1px;margin: 0;background: #969696; padding: 0px 0 0 2px;">

            </div> -->
            <div class="col-lg-7 col-md-7 col-sm-12 d-flex justify-content-center align-items-center" style='    padding-left: 0px;padding-right: 0px;'>
                <div class="form-box" style='    border-top-right-radius: 10px;    border-bottom-right-radius: 10px;'>
                    <div  id="">
                        <h1 class="fs-5 fw-bold" >Post a Project</h1>
                        
                        <form  id="postProjectForm" action="" method="post">
                            <div id="output-msg" style="    background: limegreen; color: white;text-align: center;"></div>    
                            <div class="row justify-content-center">
                                
                                <div class='col-md-12'>
                                    <div class='row'>
                                        <div class="col-md-3" style='align-self: center;'>
                                            <label for="category">Category <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group ">
                                                <select class="form-select" name="category" id="services_category" required>
                                                    <!-- Dynamic services from api  -->
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class='col-md-12'>
                                    <div class='row'>
                                        <div class="col-md-3" style='align-self: center;'>
                                            <label for="description">Project Title <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group mt-3 ">
                                                <input class="form-control" name="project_title" id="title" required placeholder = "Write project title">
                                                <p style="font-size: 11px;  color: blue;">(Don't add phone or email in description.)*</p>
                                                <p id="last-form-title-empty-error" class="error-p-tag text-danger" style="display:none">This field is required.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='row'>
                                        <div class="col-md-3" style='align-self: center;'>
                                            <label for="description">Description</label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group mt-3 ">
                                                <textarea class="form-control" spellcheck="true" name="description" id="description" cols="30" rows="5" ></textarea>
                                                <p style="    font-size: 11px;  color: blue;">(Don't add phone or email in description. Max length 1000 characters)*</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-md-12'>
                                    <div class='row'>
                                        <div class="col-md-3" style='align-self: center;'>
                                            <label for="country">Country</label> <span class="text-danger">*</span>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group mt-3 ">
                                                <select class="form-control countries-list mt-2" id="country" name="country" onchange="updateCountryCode()" >
                                    
                                                    <option value="AF" <?php if($userCountryCode === 'AF' ) echo 'selected' ?>>Afghanistan</option>
                                                    <option value="AL" <?php if($userCountryCode === 'AL' ) echo 'selected' ?>>Albania</option>
                                                    <option value="DZ" <?php if($userCountryCode === 'DZ' ) echo 'selected' ?>>Algeria</option>
                                                    <option value="AD" <?php if($userCountryCode === 'AD' ) echo 'selected' ?>>Andorra</option>
                                                    <option value="AO" <?php if($userCountryCode === 'AO' ) echo 'selected' ?>>Angola</option>
                                                    <option value="AG" <?php if($userCountryCode === 'AG' ) echo 'selected' ?>>Antigua and Barbuda</option>
                                                    <option value="AR" <?php if($userCountryCode === 'AR' ) echo 'selected' ?>>Argentina</option>
                                                    <option value="AM" <?php if($userCountryCode === 'AM' ) echo 'selected' ?>>Armenia</option>
                                                    <option value="AW" <?php if($userCountryCode === 'AW' ) echo 'selected' ?>>Aruba</option>
                                                    <option value="AS" <?php if($userCountryCode === 'AS' ) echo 'selected' ?>>American Samoa</option>
                                                    <option value="AU" <?php if($userCountryCode === 'AU' ) echo 'selected' ?>>Australia</option>
                                                    <option value="AT" <?php if($userCountryCode === 'AT' ) echo 'selected' ?>>Austria</option>
                                                    <option value="AZ" <?php if($userCountryCode === 'AZ' ) echo 'selected' ?>>Azerbaijan</option>
                                                    <option value="BS" <?php if($userCountryCode === 'BS' ) echo 'selected' ?>>Bahamas</option>
                                                    <option value="BD" <?php if($userCountryCode === 'BD' ) echo 'selected' ?>>Bangladesh</option>
                                                    <option value="BB" <?php if($userCountryCode === 'BB' ) echo 'selected' ?>>Barbados</option>
                                                    <option value="BI" <?php if($userCountryCode === 'BI' ) echo 'selected' ?>>Burundi</option>
                                                    <option value="BE" <?php if($userCountryCode === 'BE' ) echo 'selected' ?>>Belgium</option>
                                                    <option value="BJ" <?php if($userCountryCode === 'BJ' ) echo 'selected' ?>>Benin</option>
                                                    <option value="BM" <?php if($userCountryCode === 'BM' ) echo 'selected' ?>>Bermuda</option>
                                                    <option value="BT" <?php if($userCountryCode === 'BT' ) echo 'selected' ?>>Bhutan</option>
                                                    <option value="BA" <?php if($userCountryCode === 'BA' ) echo 'selected' ?>>Bosnia and Herzegovina</option>
                                                    <option value="BZ" <?php if($userCountryCode === 'BZ' ) echo 'selected' ?>>Belize</option>
                                                    <option value="BY" <?php if($userCountryCode === 'BY' ) echo 'selected' ?>>Belarus</option>
                                                    <option value="BO" <?php if($userCountryCode === 'BO' ) echo 'selected' ?>>Bolivia</option>
                                                    <option value="BW" <?php if($userCountryCode === 'BW' ) echo 'selected' ?>>Botswana</option>
                                                    <option value="BR" <?php if($userCountryCode === 'BR' ) echo 'selected' ?>>Brazil</option>
                                                    <option value="BH" <?php if($userCountryCode === 'BH' ) echo 'selected' ?>>Bahrain</option>
                                                    <option value="BN" <?php if($userCountryCode === 'BN' ) echo 'selected' ?>>Brunei</option>
                                                    <option value="BG" <?php if($userCountryCode === 'BG' ) echo 'selected' ?>>Bulgaria</option>
                                                    <option value="BF" <?php if($userCountryCode === 'BF' ) echo 'selected' ?>>Burkina Faso</option>
                                                    <option value="CF" <?php if($userCountryCode === 'CF' ) echo 'selected' ?>>Central African Republic</option>
                                                    <option value="KH" <?php if($userCountryCode === 'KH' ) echo 'selected' ?>>Cambodia</option>
                                                    <option value="CA" <?php if($userCountryCode === 'CA' ) echo 'selected' ?>>Canada</option>
                                                    <option value="KY" <?php if($userCountryCode === 'KY' ) echo 'selected' ?>>Cayman Islands</option>
                                                    <option value="CG" <?php if($userCountryCode === 'CG' ) echo 'selected' ?>>Congo</option>
                                                    <option value="TD" <?php if($userCountryCode === 'TD' ) echo 'selected' ?>>Chad</option>
                                                    <option value="CL" <?php if($userCountryCode === 'CL' ) echo 'selected' ?>>Chile</option>
                                                    <option value="CN" <?php if($userCountryCode === 'CN' ) echo 'selected' ?>>China</option>
                                                    <option value="CI" <?php if($userCountryCode === 'CI' ) echo 'selected' ?>>Cote d'Ivoire</option>
                                                    <option value="CM" <?php if($userCountryCode === 'CM' ) echo 'selected' ?>>Cameroon</option>
                                                    <option value="CD" <?php if($userCountryCode === 'CD' ) echo 'selected' ?>>DR Congo</option>
                                                    <option value="CK" <?php if($userCountryCode === 'CK' ) echo 'selected' ?>>Cook Islands</option>
                                                    <option value="CO" <?php if($userCountryCode === 'CO' ) echo 'selected' ?>>Colombia</option>
                                                    <option value="KM" <?php if($userCountryCode === 'KM' ) echo 'selected' ?>>Comoros</option>
                                                    <option value="CV" <?php if($userCountryCode === 'CV' ) echo 'selected' ?>>Cape Verde</option>
                                                    <option value="CR" <?php if($userCountryCode === 'CR' ) echo 'selected' ?>>Costa Rica</option>
                                                    <option value="HR" <?php if($userCountryCode === 'HR' ) echo 'selected' ?>>Croatia</option>
                                                    <option value="CU" <?php if($userCountryCode === 'CU' ) echo 'selected' ?>>Cuba</option>
                                                    <option value="CY" <?php if($userCountryCode === 'CY' ) echo 'selected' ?>>Cyprus</option>
                                                    <option value="CZ" <?php if($userCountryCode === 'CZ' ) echo 'selected' ?>>Czech Republic</option>
                                                    <option value="DK" <?php if($userCountryCode === 'DK' ) echo 'selected' ?>>Denmark</option>
                                                    <option value="DJ" <?php if($userCountryCode === 'DJ' ) echo 'selected' ?>>Djibouti</option>
                                                    <option value="DM" <?php if($userCountryCode === 'DM' ) echo 'selected' ?>>Dominica</option>
                                                    <option value="DO" <?php if($userCountryCode === 'DO' ) echo 'selected' ?>>Dominican Republic</option>
                                                    <option value="EC" <?php if($userCountryCode === 'EC' ) echo 'selected' ?>>Ecuador</option>
                                                    <option value="EG" <?php if($userCountryCode === 'EG' ) echo 'selected' ?>>Egypt</option>
                                                    <option value="ER" <?php if($userCountryCode === 'ER' ) echo 'selected' ?>>Eritrea</option>
                                                    <option value="SV" <?php if($userCountryCode === 'SV' ) echo 'selected' ?>>El Salvador</option>
                                                    <option value="ES" <?php if($userCountryCode === 'ES' ) echo 'selected' ?>>Spain</option>
                                                    <option value="EE" <?php if($userCountryCode === 'EE' ) echo 'selected' ?>>Estonia</option>
                                                    <option value="ET" <?php if($userCountryCode === 'ET' ) echo 'selected' ?>>Ethiopia</option>
                                                    <option value="FJ" <?php if($userCountryCode === 'FJ' ) echo 'selected' ?>>Fiji</option>
                                                    <option value="FI" <?php if($userCountryCode === 'FI' ) echo 'selected' ?>>Finland</option>
                                                    <option value="FR" <?php if($userCountryCode === 'FR' ) echo 'selected' ?>>France</option>
                                                    <option value="FM" <?php if($userCountryCode === 'FM' ) echo 'selected' ?>>Micronesia</option>
                                                    <option value="GA" <?php if($userCountryCode === 'GA' ) echo 'selected' ?>>Gabon</option>
                                                    <option value="GM" <?php if($userCountryCode === 'GM' ) echo 'selected' ?>>Gambia</option>
                                                    <option value="GB" <?php if($userCountryCode === 'GB' ) echo 'selected' ?>>Great Britain</option>
                                                    <option value="GW" <?php if($userCountryCode === 'GW' ) echo 'selected' ?>>Guinea-Bissau</option>
                                                    <option value="GE" <?php if($userCountryCode === 'GE' ) echo 'selected' ?>>Georgia</option>
                                                    <option value="GQ" <?php if($userCountryCode === 'GQ' ) echo 'selected' ?>>Equatorial Guinea</option>
                                                    <option value="DE" <?php if($userCountryCode === 'DE' ) echo 'selected' ?>>Germany</option>
                                                    <option value="GH" <?php if($userCountryCode === 'GH' ) echo 'selected' ?>>Ghana</option>
                                                    <option value="GR" <?php if($userCountryCode === 'GR' ) echo 'selected' ?>>Greece</option>
                                                    <option value="GD" <?php if($userCountryCode === 'GD' ) echo 'selected' ?>>Grenada</option>
                                                    <option value="GT" <?php if($userCountryCode === 'GT' ) echo 'selected' ?>>Guatemala</option>
                                                    <option value="GN" <?php if($userCountryCode === 'GN' ) echo 'selected' ?>>Guinea</option>
                                                    <option value="GU" <?php if($userCountryCode === 'GU' ) echo 'selected' ?>>Guam</option>
                                                    <option value="GY" <?php if($userCountryCode === 'GY' ) echo 'selected' ?>>Guyana</option>
                                                    <option value="HT" <?php if($userCountryCode === 'HT' ) echo 'selected' ?>>Haiti</option>
                                                    <option value="HK" <?php if($userCountryCode === 'HK' ) echo 'selected' ?>>Hong Kong</option>
                                                    <option value="HN" <?php if($userCountryCode === 'HN' ) echo 'selected' ?>>Honduras</option>
                                                    <option value="HU" <?php if($userCountryCode === 'HU' ) echo 'selected' ?>>Hungary</option>
                                                    <option value="ID" <?php if($userCountryCode === 'ID' ) echo 'selected' ?>>Indonesia</option>
                                                    <option value="IN" <?php if($userCountryCode === 'IN' ) echo 'selected' ?> selected>India</option>
                                                    <option value="IR" <?php if($userCountryCode === 'IR' ) echo 'selected' ?>>Iran</option>
                                                    <option value="IE" <?php if($userCountryCode === 'IE' ) echo 'selected' ?>>Ireland</option>
                                                    <option value="IQ" <?php if($userCountryCode === 'IQ' ) echo 'selected' ?>>Iraq</option>
                                                    <option value="IS" <?php if($userCountryCode === 'IS' ) echo 'selected' ?>>Iceland</option>
                                                    <option value="IL" <?php if($userCountryCode === 'IL' ) echo 'selected' ?>>Israel</option>
                                                    <option value="VG" <?php if($userCountryCode === 'VG' ) echo 'selected' ?>>Virgin Islands</option>
                                                    <option value="IT" <?php if($userCountryCode === 'IT' ) echo 'selected' ?>>Italy</option>
                                                    <option value="VI" <?php if($userCountryCode === 'VI' ) echo 'selected' ?>>British Virgin Islands</option>
                                                    <option value="JM" <?php if($userCountryCode === 'JM' ) echo 'selected' ?>>Jamaica</option>
                                                    <option value="JO" <?php if($userCountryCode === 'JO' ) echo 'selected' ?>>Jordan</option>
                                                    <option value="JP" <?php if($userCountryCode === 'JP' ) echo 'selected' ?>>Japan</option>
                                                    <option value="KZ" <?php if($userCountryCode === 'KZ' ) echo 'selected' ?>>Kazakhstan</option>
                                                    <option value="KE" <?php if($userCountryCode === 'KE' ) echo 'selected' ?>>Kenya</option>
                                                    <option value="KG" <?php if($userCountryCode === 'KG' ) echo 'selected' ?>>Kyrgyzstan</option>
                                                    <option value="KI" <?php if($userCountryCode === 'KI' ) echo 'selected' ?>>Kiribati</option>
                                                    <option value="KR" <?php if($userCountryCode === 'KR' ) echo 'selected' ?>>South Korea</option>
                                                    <option value="XK" <?php if($userCountryCode === 'XK' ) echo 'selected' ?>>Kosovo</option>
                                                    <option value="SA" <?php if($userCountryCode === 'SA' ) echo 'selected' ?>>Saudi Arabia</option>
                                                    <option value="KW" <?php if($userCountryCode === 'KW' ) echo 'selected' ?>>Kuwait</option>
                                                    <option value="LA" <?php if($userCountryCode === 'LA' ) echo 'selected' ?>>Laos</option>
                                                    <option value="LV" <?php if($userCountryCode === 'LV' ) echo 'selected' ?>>Latvia</option>
                                                    <option value="LY" <?php if($userCountryCode === 'LY' ) echo 'selected' ?>>Libya</option>
                                                    <option value="LR" <?php if($userCountryCode === 'LR' ) echo 'selected' ?>>Liberia</option>
                                                    <option value="LC" <?php if($userCountryCode === 'LC' ) echo 'selected' ?>>Saint Lucia</option>
                                                    <option value="LS" <?php if($userCountryCode === 'LS' ) echo 'selected' ?>>Lesotho</option>
                                                    <option value="LB" <?php if($userCountryCode === 'LB' ) echo 'selected' ?>>Lebanon</option>
                                                    <option value="LI" <?php if($userCountryCode === 'LI' ) echo 'selected' ?>>Liechtenstein</option>
                                                    <option value="LT" <?php if($userCountryCode === 'LT' ) echo 'selected' ?>>Lithuania</option>
                                                    <option value="LU" <?php if($userCountryCode === 'LU' ) echo 'selected' ?>>Luxembourg</option>
                                                    <option value="MG" <?php if($userCountryCode === 'MG' ) echo 'selected' ?>>Madagascar</option>
                                                    <option value="MA" <?php if($userCountryCode === 'MA' ) echo 'selected' ?>>Morocco</option>
                                                    <option value="MY" <?php if($userCountryCode === 'MY' ) echo 'selected' ?>>Malaysia</option>
                                                    <option value="MW" <?php if($userCountryCode === 'MW' ) echo 'selected' ?>>Malawi</option>
                                                    <option value="MD" <?php if($userCountryCode === 'MD' ) echo 'selected' ?>>Moldova</option>
                                                    <option value="MV" <?php if($userCountryCode === 'MV' ) echo 'selected' ?>>Maldives</option>
                                                    <option value="MX" <?php if($userCountryCode === 'MX' ) echo 'selected' ?>>Mexico</option>
                                                    <option value="MN" <?php if($userCountryCode === 'MN' ) echo 'selected' ?>>Mongolia</option>
                                                    <option value="MH" <?php if($userCountryCode === 'MH' ) echo 'selected' ?>>Marshall Islands</option>
                                                    <option value="MK" <?php if($userCountryCode === 'MK' ) echo 'selected' ?>>Macedonia</option>
                                                    <option value="ML" <?php if($userCountryCode === 'ML' ) echo 'selected' ?>>Mali</option>
                                                    <option value="MT" <?php if($userCountryCode === 'MT' ) echo 'selected' ?>>Malta</option>
                                                    <option value="ME" <?php if($userCountryCode === 'ME' ) echo 'selected' ?>>Montenegro</option>
                                                    <option value="MC" <?php if($userCountryCode === 'MC' ) echo 'selected' ?>>Monaco</option>
                                                    <option value="MZ" <?php if($userCountryCode === 'MZ' ) echo 'selected' ?>>Mozambique</option>
                                                    <option value="MU" <?php if($userCountryCode === 'MU' ) echo 'selected' ?>>Mauritius</option>
                                                    <option value="MR" <?php if($userCountryCode === 'MR' ) echo 'selected' ?>>Mauritania</option>
                                                    <option value="MM" <?php if($userCountryCode === 'MM' ) echo 'selected' ?>>Myanmar</option>
                                                    <option value="NA" <?php if($userCountryCode === 'NA' ) echo 'selected' ?>>Namibia</option>
                                                    <option value="NI" <?php if($userCountryCode === 'NI' ) echo 'selected' ?>>Nicaragua</option>
                                                    <option value="NL" <?php if($userCountryCode === 'NL' ) echo 'selected' ?>>Netherlands</option>
                                                    <option value="NP" <?php if($userCountryCode === 'NP' ) echo 'selected' ?>>Nepal</option>
                                                    <option value="NG" <?php if($userCountryCode === 'NG' ) echo 'selected' ?>>Nigeria</option>
                                                    <option value="NE" <?php if($userCountryCode === 'NE' ) echo 'selected' ?>>Niger</option>
                                                    <option value="NO" <?php if($userCountryCode === 'NO' ) echo 'selected' ?>>Norway</option>
                                                    <option value="NR" <?php if($userCountryCode === 'NR' ) echo 'selected' ?>>Nauru</option>
                                                    <option value="NZ" <?php if($userCountryCode === 'NZ' ) echo 'selected' ?>>New Zealand</option>
                                                    <option value="OM" <?php if($userCountryCode === 'OM' ) echo 'selected' ?>>Oman</option>
                                                    <option value="PK" <?php if($userCountryCode === 'PK' ) echo 'selected' ?>>Pakistan</option>
                                                    <option value="PA" <?php if($userCountryCode === 'PA' ) echo 'selected' ?>>Panama</option>
                                                    <option value="PY" <?php if($userCountryCode === 'PY' ) echo 'selected' ?>>Paraguay</option>
                                                    <option value="PE" <?php if($userCountryCode === 'PE' ) echo 'selected' ?>>Peru</option>
                                                    <option value="PH" <?php if($userCountryCode === 'PH' ) echo 'selected' ?>>Philippines</option>
                                                    <option value="PS" <?php if($userCountryCode === 'PS' ) echo 'selected' ?>>Palestine</option>
                                                    <option value="PW" <?php if($userCountryCode === 'PW' ) echo 'selected' ?>>Palau</option>
                                                    <option value="PG" <?php if($userCountryCode === 'PG' ) echo 'selected' ?>>Papua New Guinea</option>
                                                    <option value="PL" <?php if($userCountryCode === 'PL' ) echo 'selected' ?>>Poland</option>
                                                    <option value="PT" <?php if($userCountryCode === 'PT' ) echo 'selected' ?>>Portugal</option>
                                                    <option value="KP" <?php if($userCountryCode === 'KP' ) echo 'selected' ?>>North Korea</option>
                                                    <option value="PR" <?php if($userCountryCode === 'PR' ) echo 'selected' ?>>Puerto Rico</option>
                                                    <option value="QA" <?php if($userCountryCode === 'QA' ) echo 'selected' ?>>Qatar</option>
                                                    <option value="RO" <?php if($userCountryCode === 'RO' ) echo 'selected' ?>>Romania</option>
                                                    <option value="ZA" <?php if($userCountryCode === 'ZA' ) echo 'selected' ?>>South Africa</option>
                                                    <option value="RU" <?php if($userCountryCode === 'RU' ) echo 'selected' ?>>Russia</option>
                                                    <option value="RW" <?php if($userCountryCode === 'RW' ) echo 'selected' ?>>Rwanda</option>
                                                    <option value="WS" <?php if($userCountryCode === 'WS' ) echo 'selected' ?>>Samoa</option>
                                                    <option value="SN" <?php if($userCountryCode === 'SN' ) echo 'selected' ?>>Senegal</option>
                                                    <option value="SC" <?php if($userCountryCode === 'SC' ) echo 'selected' ?>>Seychelles</option>
                                                    <option value="SG" <?php if($userCountryCode === 'SG' ) echo 'selected' ?>>Singapore</option>
                                                    <option value="KN" <?php if($userCountryCode === 'KN' ) echo 'selected' ?>>Saint Kitts and Nevis</option>
                                                    <option value="SL" <?php if($userCountryCode === 'SL' ) echo 'selected' ?>>Sierra Leone</option>
                                                    <option value="SI" <?php if($userCountryCode === 'SI' ) echo 'selected' ?>>Slovenia</option>
                                                    <option value="SM" <?php if($userCountryCode === 'SM' ) echo 'selected' ?>>San Marino</option>
                                                    <option value="SB" <?php if($userCountryCode === 'SB' ) echo 'selected' ?>>Solomon Islands</option>
                                                    <option value="SO" <?php if($userCountryCode === 'SO' ) echo 'selected' ?>>Somalia</option>
                                                    <option value="RS" <?php if($userCountryCode === 'RS' ) echo 'selected' ?>>Serbia</option>
                                                    <option value="LK" <?php if($userCountryCode === 'LK' ) echo 'selected' ?>>Sri Lanka</option>
                                                    <option value="SS" <?php if($userCountryCode === 'SS' ) echo 'selected' ?>>South Sudan</option>
                                                    <option value="ST" <?php if($userCountryCode === 'ST' ) echo 'selected' ?>>Sao Tome and Principe</option>
                                                    <option value="SD" <?php if($userCountryCode === 'SD' ) echo 'selected' ?>>Sudan</option>
                                                    <option value="SE" <?php if($userCountryCode === 'SE' ) echo 'selected' ?>>Sweden</option>
                                                    <option value="SR" <?php if($userCountryCode === 'SR' ) echo 'selected' ?>>Suriname</option>
                                                    <option value="SK" <?php if($userCountryCode === 'SK' ) echo 'selected' ?>>Slovakia</option>
                                                    <option value="SE" <?php if($userCountryCode === 'SE' ) echo 'selected' ?>>Sweden</option>
                                                    <option value="SY" <?php if($userCountryCode === 'SY' ) echo 'selected' ?>>Syria</option>
                                                    <option value="TZ" <?php if($userCountryCode === 'TZ' ) echo 'selected' ?>>Tanzania</option>
                                                    <option value="TO" <?php if($userCountryCode === 'TO' ) echo 'selected' ?>>Tonga</option>
                                                    <option value="TH" <?php if($userCountryCode === 'TH' ) echo 'selected' ?>>Thailand</option>
                                                    <option value="TJ" <?php if($userCountryCode === 'TJ' ) echo 'selected' ?>>Tajikistan</option>
                                                    <option value="TM" <?php if($userCountryCode === 'TM' ) echo 'selected' ?>>Turkmenistan</option>
                                                    <option value="TL" <?php if($userCountryCode === 'TL' ) echo 'selected' ?>>Timor-Leste</option>
                                                    <option value="TG" <?php if($userCountryCode === 'TG' ) echo 'selected' ?>>Togo</option>
                                                    <option value="TW" <?php if($userCountryCode === 'TW' ) echo 'selected' ?>>Chinese Taipei</option>
                                                    <option value="TT" <?php if($userCountryCode === 'TT' ) echo 'selected' ?>>Trinidad and Tobago</option>
                                                    <option value="TN" <?php if($userCountryCode === 'TN' ) echo 'selected' ?>>Tunisia</option>
                                                    <option value="TR" <?php if($userCountryCode === 'TR' ) echo 'selected' ?>>Turkey</option>
                                                    <option value="TV" <?php if($userCountryCode === 'TV' ) echo 'selected' ?>>Tuvalu</option>
                                                    <option value="AE" <?php if($userCountryCode === 'AE' ) echo 'selected' ?>>United Arab Emirates</option>
                                                    <option value="UG" <?php if($userCountryCode === 'UG' ) echo 'selected' ?>>Uganda</option>
                                                    <option value="UA" <?php if($userCountryCode === 'UA' ) echo 'selected' ?>>Ukraine</option>
                                                    <option value="UY" <?php if($userCountryCode === 'UY' ) echo 'selected' ?>>Uruguay</option>
                                                    <option value="US" <?php if($userCountryCode === 'US' ) echo 'selected' ?>>United States</option>
                                                    <option value="UZ" <?php if($userCountryCode === 'UZ' ) echo 'selected' ?>>Uzbekistan</option>
                                                    <option value="VU" <?php if($userCountryCode === 'VU' ) echo 'selected' ?>>Vanuatu</option>
                                                    <option value="VE" <?php if($userCountryCode === 'VE' ) echo 'selected' ?>>Venezuela</option>
                                                    <option value="VN" <?php if($userCountryCode === 'VN' ) echo 'selected' ?>>Vietnam</option>
                                                    <option value="VC" <?php if($userCountryCode === 'VC' ) echo 'selected' ?>>Saint Vincent and the Grenadines
                                                    </option>
                                                    <option value="YE" <?php if($userCountryCode === 'YE' ) echo 'selected' ?>>Yemen</option>
                                                    <option value="ZM" <?php if($userCountryCode === 'ZM' ) echo 'selected' ?>>Zambia</option>
                                                    <option value="ZA" <?php if($userCountryCode === 'ZA' ) echo 'selected' ?>>Zanzibar</option>
                                                    <option value="ZW" <?php if($userCountryCode === 'ZW' ) echo 'selected' ?>>Zimbabwe</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Country list  -->
                                
                                
                                 <div class='col-md-12'>
                                    <div class='row'>
                                        <div class="col-md-3" style='align-self: center;'>
                                            <label for="country">Mobile</label> <span class="text-danger">*</span>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group mt-3">
                                            <div class='d-flex'>
                                                <input class="form-control mt-2" style="width:70px;" type="text" id="countryCode" readonly  value="+91" name="countryCode">
                                                <input class="form-control mt-2"  type="number" id="mobile_no"   value="" name="mobile">
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class='col-md-12'>
                                    <div class='row'>
                                        <div class="col-md-3" style='align-self: center;'>
                                            <label for="mobile_no">Mobile <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group mt-3">
                                                <input type="text" class="form-control mt-2" id="mobile_no" placeholder="Enter your mobile number" name="mobile" value= "<?php echo $username == null ? '' : $username['mobile']; ?>"
                                                    required <?php echo $username == null ? '' : "disabled" ?>>
                                                <p id="last-form-mobile-error" class="error-p-tag text-danger" style="display:none">This field is required.</p>
                                                <p id="last-form-mobile-len-short-error" class="error-p-tag text-danger" style="display:none">Mobile
                                                    number too short</p>
                                                <p id="last-form-mobile-len-big-error" class="error-p-tag text-danger" style="display:none">Mobile
                                                    number too long</p>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                    
                                <div class='col-md-12'>
                                    <div class='row'>
                                        <div class="col-md-3" style='align-self: center;'>
                                            <label for="email_address">Email <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group mt-3 ">
                                                <input type="text" class="form-control mt-2" placeholder="Enter your email id" id="email_address" name="email" value= "<?php echo $username == null ? '' : $username['email']; ?>"
                                                    required <?php echo $username == null ? '' : 'disabled' ?> >
                                                <p id="last-form-email-error" class="error-p-tag text-danger" style="display:none">Please fill valid email</p>
                                                <p id="last-form-email-empty-error" class="error-p-tag text-danger" style="display:none">This field is required.</p>
                                                <p id="last-form-email-len-error" class="error-p-tag text-danger" style="display:none">Email too large</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div class='col-md-12'>
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <div class='row'>
                                                <div class="col-md-6" style='align-self: center;'>
                                                    <label for="max_budget_amount">Min Budget </small> <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mt-3 ">
                                                        <input type="number" class="form-control  mt-2" id="min_budget_amount" name="min_budget_amount"
                                                            value="" required placeholder = "in USD ($)">
                                                        <p id="last-form-min-empty-error" class="error-p-tag text-danger" style="display:none">This field is required.</p>
                                                        <p id="last-form-min-greater-error" class="error-p-tag text-danger" style="display:none">Min. budget should be less than Max. budget</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class='col-md-6'>
                                            <div class='row'>
                                                <div class="col-md-6" style='align-self: center;'>
                                                    <label for="max_budget_amount">Max Budget <span class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mt-3 ">
                                                        <input type="number" class="form-control  mt-2" id="max_budget_amount" name="max_budget_amount" value="" required placeholder = "in USD ($) ">
                                                        <p id="last-form-max-empty-error" class="error-p-tag text-danger" style="display:none">This field is required.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group mt-3 text-center col-lg-4 col-md-4">
                                    <button type="button" name="submit" class="sooprs-btn"
                                         id="submit_project_details">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>                           
                </div>
            </div>
           

            <!-- <div class="col-lg-3 col-md-3 col-sm-12 d-flex justify-content-center align-items-center mt-3">

                <a class="fw-medium btn btn-lg btn-primary text-white"
                    style="color: #0068ff;text-decoration:none" href="login">Login as
                    Professional</a>
            </div> -->
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

<div class="loader-container" id="loader">
<div class="loader">
  <img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1705386434/sooprs-svg_bseaya.svg'  style='    position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 110px;'>

</div>
</div>

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


    
    $(document).ready(function() {
        $('#services_category').select2();
    });

    

    // $('#submit_project_details').click(function () {
    //     event.preventDefault();
    //     showLoader();
    // });

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