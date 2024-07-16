<?php
// header('Cache-Control: no cache'); //no cache
// session_cache_limiter('private_no_expire'); // works
session_start();
include_once 'function.php';
include_once 'env.php';


if (!isset($_SESSION['id']) || !$_SESSION['id'] || $_SESSION['loggedin'] != true) {
    $url = 'login-professional';
    header('Location: ' . $url);
    exit();
}


$loggedinUser = new DB_con();
$username = $loggedinUser->fetchProf($_SESSION['id']);
$singleProPoretfolios = $loggedinUser->fetchProfPortfolios($username['slug']);
// print_r($singleProPoretfolios);
// die();
$allservices = $loggedinUser->get_all_services();


$error3 = "";
// $imgerr = '';
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
            // $imgerr = "Sorry, your file is too large.";

            $uploadOk = 0;
        }

        // Allow only certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            // $imgerr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            // return "upload=0";
            // $imgerr = "Sorry, your file was not uploaded.";

            // $imgerr .= 'Error:' . $_FILES['image']['error'];
            echo "Sorry, your file was not uploaded.";
            // If everything is ok, try to upload file
        } else {
            
            $imageupload = $loggedinUser->updateimage($_SESSION['id'], "join_professionals", $image_name);
            
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
        background: url(<?php echo $username['image'] == null ? 'assets/img/images/user-placeholder-pic.webp' : $username['image']  ?>);
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

            <div class="col-lg-9 col-md-9 col-sm-12  ">

                <div class="card flex-fill">
                  

                            <div class="" style="padding: 20px; background: white;">
                                <div class="heading">
                                    <p class="fs-5" >Manage your portfolio</p>
                                </div>

                                <div class="  mt-3 mb-3">
                                    <form id="upload-images" action="" method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col">

                                                <input type="hidden" name="id" id="id" value="<?php echo $username['id'] ?>">

                                                <div class="form-group mt-3 col-md-12 col-sm-12">
                                                    <label for="input_title">Title <span class='text-danger'>*</span></label>
                                                    <input class="form-control" id="input_title" type="text" name="title" multiple required>
                                                </div>

                                                <div class="form-group mt-3 col-md-12 col-sm-12">
                                                    <label for="portfolio_description">Description</label>
                                                    <textarea class="form-control" name="description" id="portfolio_description" cols="30" rows="5" ></textarea>
                                                </div>

                                                <div class="form-group mt-3 col-md-12 col-sm-12">
                                                    <label for="input_name">Images <span class='text-danger'>*</span></label>
                                                    <input class="form-control" id="files" type="file" name="files[]" multiple required>
                                                </div>   
                                                
                                                <div class="form-group mt-3 col-md-12 col-sm-12">
                                                    <label for="input_link">Link</label>
                                                    <textarea name="link" id="input_link"  class="form-control" cols="30" rows="3" placeholder="Enter Portfolio link"></textarea>
                                                </div>   

                                                <div class="form-group mt-3 text-center col-md-12 col-sm-12">
                                                    <button type="button" id="upload-images-btn"  name="upload-images-btn"   class="btn  btn-primary btn-sm  col-4 mx-auto rounded-0" style="">Update portfolio
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="text-success fw-medium" id="output">
                                    
                                </div>
                                <div class="row mt-5 mb-5">
                                    <?php 
                                    if($singleProPoretfolios){
                                    foreach($singleProPoretfolios as $one){

                                    $myportImages = $one['files'];
                                    // $cleanedStrPort = str_replace(' ', '', $myportImages); 
                                    $portImagesArray = explode(",", $myportImages);

                                    $image_path = $SITE_URL."/assets/portfolio-images/".$portImagesArray[0];

                                    ?>
                                    <div class="col-lg-3">
                                        <div class="row">
                                            <div class="col-lg-11">
                                                <div class="text-center">
                                                    <div class="">
                                                        <a href="<?php echo $one['link'] == null? '#' : $one['link']; ?> ">
                                                        <img loading="lazy"  src='<?php echo $image_path; ?>' alt="" style="max-width:150px;"><br>
                                                        </a>
                                                        
                                                    </div>
                                                    <b ><?php echo $one['title']; ?></b>
                                                </div>
                                            </div>
                                            <div class="col-lg-1">
                                                <i class="fa-solid fa-circle-xmark remove-portfolio" data-id="<?php echo $one['id']; ?>" style=" font-size: 20px;    height: fit-content;color:#cc0000;"></i>
                                                    
                                            </div>

                                        </div>

                                    </div>
                                    <?php
                                    }
                                    }
                                    ?>
                                </div>
                            </div>
                      


                </div>

                


            </div>




        </div>

    </div>
</section>





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
<!-- add service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content no-border-radius" >
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add Lead</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">

                <form id="addServForm" action="" method="post">
                    <!-- Input fields -->
                    <select class="form-select" name="service" id="service">
                        <option value="1">Web Development</option>
                        <option value="2">App Development</option>
                        <option value="5">Digital Marketing </option>


                        <!-- Add more options as needed -->
                    </select>
                    <input type="hidden" name="profid" id="profid" value="<?php echo $username['id'] ?>">

                    <!-- Submit button -->
                    <button class="btn btn-sm btn-primary" type="submit" name="addService">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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
    // $(document).ready(function () {
    $(".sub-settings ul li").click(function () {
        // Remove active class from all items
        $(".sub-settings ul li").removeClass("active-setting");

        // Add active class to clicked item
        $(this).addClass("active-setting");
    });
    // });

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
<script src="<?php echo $SITE_URL ?>/assets/js/manage-portfolio.js"></script>
