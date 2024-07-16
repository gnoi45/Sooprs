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

    #user-picture {
        position: relative;
        background: url(<?php echo $username['image'] == null? 'assets/img/images/user-placeholder-pic.webp' : $username['image'] ?>);
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
            <?php include "./user_sidebar.php" ?>
            </div>

            <!-- <div class="col-md-3 col-sm-12" style="background:url('assets/img/images/blank-profile-picture.webp');    background-size: contain;background-repeat: no-repeat;">               

            </div> -->

            <div class="col-lg-9 col-md-9 col-sm-12 d-flex">

                <div  class="card flex-fill">

                    <div class="row m-0" style="padding: 20px; background-color: white;">
                        <div class="heading">
                            <p class="fs-5" >Edit your password</p>
                        </div>
                                <div class="col-md-12">
                                    <form id="update-profile" action="" method="post" enctype="multipart/form-data"
                                        onSubmit="return validatePassword()">
                                        <div class="validation-message text-center">
                                            <?php if (isset($message)) {
                                                echo $message;
                                            } ?>
                                        </div>
                                        <div class="row">

                                            <input type="hidden" name="id" id="id" value="<?php echo $username['id'] ?>">
                                            <input type="hidden" name="table_name" value="join_professionals" id="table_name">

                                            <div class="form-group mt-3 col-md-12 col-sm-12">
                                                <label for="input_currentpass">Current Password</label>
                                                <input class="form-control" id="input_currentpass" type="password"
                                                    name="currentPassword">
                                            </div>

                                            <div class="form-group mt-3 col-md-12 col-sm-12">
                                                <label for="input_newpass">New Password</label>
                                                <input class="form-control" id="input_newpass" type="password"
                                                    name="newPassword">
                                            </div>

                                            <div class="form-group mt-3 col-md-12 col-sm-12">
                                                <label for="input_confirmnewpass">Confirm Password</label>
                                                <input class="form-control" id="input_confirmnewpass" type="password"
                                                    name="confirmPassword">
                                            </div>


                                            <div class="form-group mt-3 text-center col-md-12 col-sm-12">
                                                <button type="button" id="update-password-btn" name="update-password-btn" class="btn  btn-primary btn-sm  col-4 mx-auto rounded-0 " style="">
                                                    
                                                <span>Change password</span>
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
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


<!-- image upload Modal -->
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
                    <input type="hidden" id="table" value="join_professionals">
                   
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="upload-pic" class="btn btn-sm btn-primary" name="image-upload">Save </button>
                    </div>
                </form>
            </div>

        </div>
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
    $(document).ready(function () {

        // update general details
        $("#update-password-btn").click(function () {

            showLoader();
            var id = $("#id").val();
            var table_name = $("#table_name").val();
            var currentpass = $("#input_currentpass").val();
            var newpass = $("#input_newpass").val();
            var confirmnewpass = $("#input_confirmnewpass").val();

            if (id == '' || currentpass == '' || newpass == '' || confirmnewpass == '') {
                hideLoader();
                $('#error_message').text("Fill all fields");
                $('.toast').toast('show');
                return false;
            }

            $.ajax({
                type: "POST",
                url: "<?php echo $SITE_URL ?>/api2/public/index.php/update-password",
                data: {
                    id: id,
                    table_name: table_name,
                    currentpass: currentpass,
                    newpass: newpass,
                    confirmnewpass: confirmnewpass
                },
                cache: false,
                success: function (data) {
                    var new_data = JSON.parse(data);
                    if (new_data.status == 200) {
                        hideLoader();
                        $('#error_message').text(new_data.msg);
                        $('.toast').toast('show');
                        $('#update-profile').trigger('reset');
                    }else{
                        hideLoader();
                        $('#error_message').text(new_data.msg);
                        $('.toast').toast('show');

                    }

                    

                },
                error: function (xhr, status, error) {
                    hideLoader();
                }
            });
        });


        

    });
</script>
<script>
    var site__url = "<?php echo $SITE_URL; ?>";

    // Switch now button 
    $("#switch_acc_btn").on("click", function () {
        let switchAccEmail  = <?php echo json_encode($username['email']); ?>;
    
        $.ajax({
            url: site__url+'/api2/public/index.php/switch_account',
            method: "POST",
            data: { switchAccEmail: switchAccEmail },
            success: function (response) {
                $('#staticBackdropIs_buyer').modal('hide');
                toastr.success(response.msg, 'Success');
                window.location.href = 'professional-settings';

            }
        });
    });
    </script>

<?php include "./footer.php" ?>