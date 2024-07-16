<?php
session_start();
include_once 'function.php';
include_once 'env.php';


if (!$_SESSION['id'] || $_SESSION['loggedin'] != true) {
    $url = 'customer-login';
    header('Location: ' . $url);
    exit();
}


$loggedinUser = new DB_con();
$username = $loggedinUser->getUser($_SESSION['id'], "join_professionals");
$cut_id = $username['id'];

// print_r($username);
// die();

$error3 = "";
$imgerr = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // if (isset($_POST["update-profile-btn"])) {

    //     $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    //     $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    //     $emailvalidate = filter_var($email, FILTER_VALIDATE_EMAIL);
    //     $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_NUMBER_INT);


    //     if (!$name) {
    //         $error3 .= "Name is required. <br>";
    //     }

    //     if (!$email) {
    //         $error3 .= "Email is required. <br>";
    //     }

    //     if (!$emailvalidate) {
    //         $error3 .= "Email is invalid. <br>";
    //     }

    //     if (!$mobile) {
    //         $error3 .= "Mobile is required. <br>";
    //     }

    //     if ($error3) {
    //         $error3 = "<b>There were error(s) in your form!</b> <br>" . $error3;
    //     } else {



    //         // if (is_uploaded_file($_FILES["resume"])) {
    //         //     if ($_FILES['resume']['error'] === UPLOAD_ERR_OK) {
    //         //         $uploadDir = 'assets/files/';
    //         //         $allowedTypes = array('pdf');
    //         //         $filename = basename($_FILES['resume']['name']);
    //         //         $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

    //         //         if (!in_array($fileExtension, $allowedTypes)) {
    //         //             die("Error: File type not allowed.");
    //         //         }

    //         //         $newFilename = uniqid('', true) . '.' . $fileExtension;
    //         //         $targetPath = $uploadDir . $newFilename;

    //         //         if (!move_uploaded_file($_FILES['resume']['tmp_name'], $targetPath)) {
    //         //             die("Error: Failed to move uploaded file.");
    //         //         }

    //         //     } else {
    //         //         die("Error: Upload failed with error code " . $_FILES['resume']['error']);
    //         //     }

    //         // }
    //         $table = "customer";
    //         $updateVendorDetails = $loggedinUser->updateCustomerDetails($name, $email, $mobile, $_SESSION['id'], $table);
    //         if ($updateVendorDetails == 1) {
    //             $url = 'customer-settings';
    //             // echo "<script>alert('Updated Successfully');</script>";
    //             header('Location: ' . $url); // Use header() function to redirect and prevent XSS attacks
    //             exit(); // Always exit after a redirect
    //         } else{
    //             echo "<script>alert('Some error occured');</script>";
    //         }
    //     }
    // }


    if (isset($_POST['update-password-btn'])) {



        $passwordUpdate = $loggedinUser->updateCustPass($_SESSION['id'], $_POST["newPassword"], $_POST["currentPassword"], "join_professionals");
        // print_r($passwordUpdate);
        // die();

    }

    // if (isset($_POST['image-upload'])) {

    //     $target_dir = "assets/files/";
    //     $image_name = basename($_FILES["image"]["name"]);
    //     $image_file = $target_dir . $image_name;
    //     $uploadOk = 1;
    //     $imageFileType = strtolower(pathinfo($image_file, PATHINFO_EXTENSION));

        
    //     $check = getimagesize($_FILES["image"]["tmp_name"]);
    //     if ($check !== false) {
            
    //         $uploadOk = 1;
    //     } else {
    //         $imgerr = 'File is not an image.';

    //         $uploadOk = 0;
    //     }

        
    //     if ($_FILES["image"]["size"] > 2000000) {
    //         $imgerr = "Sorry, your file is too large.";

    //         $uploadOk = 0;
    //     }

        
    //     if (
    //         $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    //         && $imageFileType != "gif"
    //     ) {
    //         $imgerr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

    //         $uploadOk = 0;
    //     }

        
    //     if ($uploadOk == 0) {
    //         $imgerr = "Sorry, your file was not uploaded.";

    //         $imgerr .= 'Error:' . $_FILES['image']['error'];
            
    //     } else {
    //         $imageupload = $loggedinUser->updateimage($_SESSION['id'], "customer", $image_name);
    //         move_uploaded_file($_FILES["image"]["tmp_name"], $image_file);

    //     }
    // }
    $_SESSION['imgerr'] = $imgerr;

}


$title = 'Customer profile ';
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

    .nav-pills button {
        width: auto;
        border-radius: 0 !important;
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
            <div class="col-lg-3 col-md-3 col-sm-12 text-center mb-2">
            <?php include "./user_sidebar.php" ?>


            </div>

            <!-- <div class="col-md-3 col-sm-12" style="background:url('assets/img/images/blank-profile-picture.webp');    background-size: contain;background-repeat: no-repeat;">               

            </div> -->

            <div class="col-lg-9 col-md-9 col-sm-12  mb-2">

                <div>



                    <!-- <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane"
                                aria-selected="true">Basic Details</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                data-bs-target="#profile-tab-pane" type="button" role="tab"
                                aria-controls="profile-tab-pane" aria-selected="false">Change Password</button>
                        </li>

                    </ul> -->
                    <!-- <div class="tab-content" id="myTabContent"> -->
                    <!-- <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0"> -->

                    <div class="" style="padding: 20px; background: white;">
                        <div class="heading">
                            <p class="fs-4" style="    color: #0071ff;">Edit your profile</p>
                        </div>

                        <div class="  mt-3 mb-3">
                            <form>
                                <div class="row">

                                    <div class="col">


                                        <input type="hidden" name="id" value="<?php echo $username['id'] ?>" id="id">

                                        <div class="form-group mt-3 col-md-12 col-sm-12">
                                            <label for="input_name">Name</label>
                                            <input class="form-control" id="input_name" type="text" name="name"
                                                value="<?php echo $username['name'] ?>">
                                        </div>

                                        <div class="form-group mt-3 col-lg-12 col-md-12 col-sm-12">
                                            <label for="input_email">Email</label>
                                            <input class="form-control" type="email" id="input_email" name="email"
                                                value="<?php echo $username['email'] ?>">
                                        </div>

                                        <div class="form-group mt-3 col-lg-12 col-md-12 col-sm-12">
                                            <label for="input_mobile">Mobile</label>
                                            <input class="form-control" type="text" id="input_mobile" name="mobile"
                                                value="<?php echo $username['mobile'] ?>">
                                        </div>

                                        <div class="form-group mt-3 text-center col-md-12 col-sm-12">
                                            <button type="button" id="update-profile-btn" name="update-profile-btn"
                                                class="btn  btn-primary text-white btn-sm  mx-auto rounded-0"
                                                style="">
                                                <div class="loader loader--style8" title="7" id="loader">
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
                                        <span>Update profile</span>
                                            </button>
                                        </div>


                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- </div> -->
                    <!-- <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                            tabindex="0">
                            <div class="row m-0" style="padding: 20px; background-color: white;">
                                <div class="col-md-12">
                                    <form id="update-profile" action="" method="post" enctype="multipart/form-data"
                                        onSubmit="return validatePassword()">
                                        <div class="validation-message text-center">
                                            <?php if (isset($message)) {
                                                echo $message;
                                            } ?>
                                        </div>
                                        <div class="row">

                                            <input type="hidden" name="id" value="<?php echo $username['id'] ?>">
                                            <div class="form-group mt-3 col-md-12 col-sm-12">
                                                <label for="input_newpass">Current Password</label>
                                                <input class="form-control" id="input_newpass" type="password"
                                                    name="currentPassword">
                                            </div>

                                            <div class="form-group mt-3 col-md-12 col-sm-12">
                                                <label for="input_confirmpass">New Password</label>
                                                <input class="form-control" id="input_confirmpass" type="password"
                                                    name="newPassword">
                                            </div>

                                            <div class="form-group mt-3 col-md-12 col-sm-12">
                                                <label for="input_confirmpass">Confirm Password</label>
                                                <input class="form-control" id="input_confirmpass" type="password"
                                                    name="confirmPassword">
                                            </div>


                                            <div class="form-group mt-3 text-center col-md-12 col-sm-12">
                                                <button type="submit" id="update-password-btn"
                                                    name="update-password-btn"
                                                    class="btn  btn-primary text-white btn-sm  col-3 mx-auto "
                                                    style=""><span>Change
                                                        password</span>
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> -->

                    <!-- </div> -->



                </div>



            </div>

            <!-- <div class="container"> -->


            <!-- </div> -->




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

<!-- 
<p class="mb-0">Whenever you need to, be sure to logout <a href="logout"> using this link.</a></p> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Profile Picture</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">
                <p class="mb-2">A picture helps people to recognise you and lets you know when you’re signed in to your
                    account</p>
                <form id="upload-form" >
                    <input class="" type="file" value="" name="image" id="profile_pic" style="font-size:smaller">
                    <input type="hidden" id="table" value="customer">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="upload-pic" class="btn btn-sm btn-primary" name="image-upload">Save </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<script>
    $(document).ready(function () {

        // update general details
        $("#update-profile-btn").click(function () {

            $('#loader').css('display', 'inline-block');

            var id = $("#id").val();
            var name = $("#input_name").val();
            var email = $("#input_email").val();
            var mobile = $("#input_mobile").val();

            if (id == '' || name == '' || email == '' || mobile == '') {
                alert("Please fill all fields.");
                return false;
            }

            $.ajax({
                type: "POST",
                url: "<?php echo $SITE_URL ?>/api2/public/index.php/update_profile_professional",
                data: {
                    id: id,
                    name: name,
                    email: email,
                    mobile: mobile
                },
                cache: false,
                success: function (data) {
                    $('#loader').css('display', 'none');

                    $('#error_message').text('Profile updated successfully!');

                    $('.toast').toast('show');
                    console.log(data);
                },
                error: function (xhr, status, error) {
                    console.error(xhr);
                }
            });
        });


        

    });
</script>

<?php include "./footer.php" ?>
