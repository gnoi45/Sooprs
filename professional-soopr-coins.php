<?php
// header('Cache-Control: no cache'); //no cache
// session_cache_limiter('private_no_expire'); // works
session_start();
include_once 'function.php';

if (!isset($_SESSION['id']) || !$_SESSION['id'] || $_SESSION['loggedin'] != true) {
    $url = 'login-professional';
    header('Location: ' . $url);
    exit();
}


$loggedinUser = new DB_con();
$username = $loggedinUser->fetchProf($_SESSION['id']);
// print_r($username);
// die();
$allservices = $loggedinUser->get_all_services();


$error3 = "";
$imgerr = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST["update-profile-btn"])) {

        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $emailvalidate = filter_var($email, FILTER_VALIDATE_EMAIL);
        $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_NUMBER_INT);
        $organisation = filter_input(INPUT_POST, 'organisation', FILTER_SANITIZE_STRING);


        if (!$name) {
            $error3 .= "Name is required. <br>";
        }

        if (!$email) {
            $error3 .= "Email is required. <br>";
        }

        if (!$emailvalidate) {
            $error3 .= "Email is invalid. <br>";
        }

        if (!$mobile) {
            $error3 .= "Mobile is required. <br>";
        }

        if ($error3) {
            $error3 = "<b>There were error(s) in your form!</b> <br>" . $error3;
        } else {



            // if (is_uploaded_file($_FILES["resume"])) {
            //     if ($_FILES['resume']['error'] === UPLOAD_ERR_OK) {
            //         $uploadDir = 'assets/files/';
            //         $allowedTypes = array('pdf');
            //         $filename = basename($_FILES['resume']['name']);
            //         $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

            //         if (!in_array($fileExtension, $allowedTypes)) {
            //             die("Error: File type not allowed.");
            //         }

            //         $newFilename = uniqid('', true) . '.' . $fileExtension;
            //         $targetPath = $uploadDir . $newFilename;

            //         if (!move_uploaded_file($_FILES['resume']['tmp_name'], $targetPath)) {
            //             die("Error: Failed to move uploaded file.");
            //         }

            //     } else {
            //         die("Error: Upload failed with error code " . $_FILES['resume']['error']);
            //     }

            // }
            $table = "join_professionals";
            $updateVendorDetails = $loggedinUser->updateDetails($name, $email, $mobile, $organisation, $_SESSION['id'], $table);
            if ($updateVendorDetails == 1) {
                $url = 'profile';
                // echo "<script>alert('Updated Successfully');</script>";
                header('Location: ' . $url); // Use header() function to redirect and prevent XSS attacks
                exit(); // Always exit after a redirect
            } elseif ($updateVendorDetails == 10) {
                echo "<script>alert('Some error occured');</script>";
            }
        }
    }


    if (isset($_POST['update-password-btn'])) {



        $passwordUpdate = $loggedinUser->updateProfPass($_SESSION['id'], $_POST["newPassword"], $_POST["currentPassword"], "join_professionals");
        // print_r($passwordUpdate);
        // die();

    }

    if (isset($_POST['image-upload'])) {

        $target_dir = "assets/files/";
        $image_name = basename($_FILES["image"]["name"]);
        $image_file = $target_dir . $image_name;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($image_file, PATHINFO_EXTENSION));

        // Check if file is a real image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            // echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $imgerr = 'File is not an image.';

            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 2000000) {
            $imgerr = "Sorry, your file is too large.";

            $uploadOk = 0;
        }

        // Allow only certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            $imgerr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $imgerr = "Sorry, your file was not uploaded.";

            $imgerr .= 'Error:' . $_FILES['image']['error'];
            // echo "Sorry, your file was not uploaded.";
            // If everything is ok, try to upload file
        } else {
            $imageupload = $loggedinUser->updateimage($_SESSION['id'], "customer", $image_name);
            move_uploaded_file($_FILES["image"]["tmp_name"], $image_file);

        }
    }
    // $_SESSION['imgerr'] = $imgerr;


    if (isset($_POST["addService"])) {
        $get_service = $loggedinUser->addProffessionalService($_POST["service"], $_POST["profid"]);

        // print_r($get_service);
        // die();
    }

}


$title = 'Professional profile ';
$description = "Description";
$keywords = "key,words";
?>

<style>
    .fa-pen-to-square {
        color: #000000;
        position: absolute;
        bottom: 0;
        right: 0;
        font-size: x-large;
        background-color: white;
        padding: 5px;
        border-radius: 50%;
        cursor: pointer;
    }

    .default-user-pic {
        position: relative;
        background: url('assets/img/images/user-placeholder-pic.webp');
        background-size: cover;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-position: center;
    }

    #user-picture {
        position: relative;
        background: url(<?php echo $username['image'] ?>);
        background-size: cover;
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-position: center;
    }

    .all-settings-headings {
        margin-top: 20px;
        padding-left: 20px;
    }

    .settings-heading h5 {
        font-size: 0.7em;
        color: grey;
        font-weight: 600;

        text-align: left;
        padding-left: 5px;
    }

    .sub-settings ul li {
        list-style: none;
        color: black;
        cursor: pointer;
        padding-left: 23px;
        width: fit-content;
        font-size: 15px;
    }

    .active-setting {
        color: blue !important;
    }

    /* a {
        color: black !important;
    } */
</style>

<?php include "./header2.php" ?>

<?php echo $_SESSION['id'] ?>

<section class="top-sectop" style="background-color: #e0e0e0;padding: 130px 0 100px 0;">
    <div class="container">

        <div class="row justify-content-center">
            <?php
            if (isset($_SESSION['imgerr']) && $_SESSION['imgerr']) {
                echo '<p class="notification">' . $_SESSION['imgerr'] . '</p>';
                unset($_SESSION['imgerr']);
            }
            ?>
            <div class="col-lg-3 col-md-3 col-sm-12 text-center d-flex">
            <div class="card flex-fill">
                <div class="" style="background: white;padding: 20px 30px;">
                    <div class="text-center mb-3">
                        <p class="fs-5 fw-bold">
                            <?php echo $username['name'] ?>
                        </p>
                        <!-- <p class=" fw-lighter text-secondary" style="font-size:13px">
                            <?php echo $username['service-name'] ?>
                        </p>
                        <p class=" fw-lighter text-secondary" style="font-size:13px">
                            <?php echo $username['email'] ?>
                        </p>
                        <p class=" fw-lighter text-secondary" style="font-size:13px">
                            <?php echo $username['mobile'] ?>
                        </p> -->
                    </div>
                    <div class="d-flex justify-content-center align-items-center">

                        <?php
                        if ($username['image'] == null) {
                            ?>
                            <div class="default-user-pic">
                            <i class="fa-sharp fa-solid fa-pen-to-square" data-bs-toggle="modal"
                        data-bs-target="#exampleModal"></i>
                            </div>
                            <?php
                        } else {
                            ?>
                            <div class="user-picture" id="user-picture">
                            <i class="fa-sharp fa-solid fa-pen-to-square" data-bs-toggle="modal"
                        data-bs-target="#exampleModal"></i>
                            </div>
                            <?php
                        }
                        ?>


                    </div>
                    <!-- <button class="btn btn-sm btn-primary mt-3" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Upload New Photo</button> -->

                    <p class="text-secondary mt-3" style="font-size: 10px;">
                        Maximum upload size is <strong> 2 Mb <i class="fa fa-solid fa-circle-info" title="For better view angle, upload square shaped picture."></i>
                        </strong></p>
                    <div class="all-settings-headings">
                    <div class="settings-heading">
                            <h5><i class="fa-solid fa-user pe-2"></i>Profile Settings</h5>
                            <div class="sub-settings">
                                <ul class="ps-0">
                                <li><a class="" href="professional-settings">Manage Details</a></li>

                                    <li><a class="" href="professional-password-setting">Manage Password</a></li>

                                </ul>
                            </div>


                        </div>
                        <div class="settings-heading">
                            <h5><i class="fa-sharp fa-solid fa-briefcase pe-2"></i>Lead Settings</h5>
                            <div class="sub-settings">
                                <ul class="ps-0">
                                    <li><a href="professional-lead-services">Manage Services</a></li>
                                    <li><a href="#">Manage Locations</a> </li>
                                </ul>
                            </div>

                        </div>
                        <div class="settings-heading">
                            <h5><i class="fa-solid fa-coins pe-2"></i>Wallet & Payment</h5>
                            <div class="sub-settings">
                                <ul class="ps-0">
                                    <li><a class="active-setting" href="professional-soopr-coins">Super Coins</a></li>
                                    <li>Payments</li>
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
            </div>

            <!-- <div class="col-md-3 col-sm-12" style="background:url('assets/img/images/blank-profile-picture.webp');    background-size: contain;background-repeat: no-repeat;">               

            </div> -->

            <div class="col-lg-9 col-md-9 col-sm-12 d-flex">

                <div  class="card flex-fill">

                    <div class="row m-0" style="padding: 20px; background-color: white;">
                        <div class="heading">
                            <p class="fs-5" style="    color: #0071ff;">Wallet</p>
                        </div>
                                <div class="col-md-12">
                                    
                                </div>
                            </div>

                </div>


            </div>




        </div>

    </div>
</section>









<script>
   
    // $(".sub-settings ul li").click(function () {
        
    //     $(".sub-settings ul li").removeClass("active-setting");

        
    //     $(this).addClass("active-setting");
    // });
   

</script>

<?php include "./footer.php" ?>