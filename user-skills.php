<?php
// header('Cache-Control: no cache'); //no cache
// session_cache_limiter('private_no_expire'); // works
session_start();
include_once 'function.php';
include_once 'env.php';
include('config/dbconn.php');


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
// $imgerr = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // if (isset($_POST["update-profile-btn"])) {

    //     $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    //     $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    //     $emailvalidate = filter_var($email, FILTER_VALIDATE_EMAIL);
    //     $mobile = filter_input(INPUT_POST, 'mobile', FILTER_SANITIZE_NUMBER_INT);
    //     $organisation = filter_input(INPUT_POST, 'organisation', FILTER_SANITIZE_STRING);
       



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
    //         $table = "join_professionals";
    //         $updateVendorDetails = $loggedinUser->updateDetails($name, $email, $mobile, $organisation, $_SESSION['id'], $table);
    //         if ($updateVendorDetails == 1) {
    //             $url = 'professional-settings';
    //             // echo "<script>alert('Updated Successfully');</script>";
    //             header("Location: ".$url ); // Use header() function to redirect and prevent XSS attacks
    //             exit(); // Always exit after a redirect
    //         } elseif ($updateVendorDetails == 10) {
    //             echo "<script>alert('Some error occured');</script>";
    //         }
    //     }
    // }


    if (isset($_POST['update-password-btn'])) {



        $passwordUpdate = $loggedinUser->updateProfPass($_SESSION['id'], $_POST["newPassword"], $_POST["currentPassword"], "join_professionals");
        // print_r($passwordUpdate);
        // die();

    }

    // if (isset($_POST['image-upload'])) {
        
    //     $target_dir = "assets/files/";
    //     $image_name = basename($_FILES["image"]["name"]);
    //     $image_file = $target_dir . $image_name;
    //     $uploadOk = 1;
    //     $imageFileType = strtolower(pathinfo($image_file, PATHINFO_EXTENSION));

    //     // Check if file is a real image or fake image
    //     $check = getimagesize($_FILES["image"]["tmp_name"]);
    //     if ($check !== false) {
    //         // echo "File is an image - " . $check["mime"] . ".";
    //         $uploadOk = 1;
    //     } else {
    //         $imgerr = 'File is not an image.';

    //         $uploadOk = 0;
    //     }

    //     // Check file size
    //     if ($_FILES["image"]["size"] > 2000000) {
    //         // $imgerr = "Sorry, your file is too large.";

    //         $uploadOk = 0;
    //     }

    //     // Allow only certain file formats
    //     if (
    //         $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    //         && $imageFileType != "gif"
    //     ) {
    //         // $imgerr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

    //         $uploadOk = 0;
    //     }

    //     // Check if $uploadOk is set to 0 by an error
    //     if ($uploadOk == 0) {
    //         // return "upload=0";
    //         // $imgerr = "Sorry, your file was not uploaded.";

    //         // $imgerr .= 'Error:' . $_FILES['image']['error'];
    //         echo "Sorry, your file was not uploaded.";
    //         // If everything is ok, try to upload file
    //     } else {
            
    //         $imageupload = $loggedinUser->updateimage($_SESSION['id'], "join_professionals", $image_name);
            
    //         move_uploaded_file($_FILES["image"]["tmp_name"], $image_file);
            
    //     }
    // }


    // $_SESSION['imgerr'] = $imgerr;



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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css">

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

            <div class="col-lg-9 col-md-9 col-sm-12  d-flex">

            <?php

                if ($username['resume'] != null) {
            ?>
               
            

            <?php } ?>

                <div class="card flex-fill">


               
                   
            
                            <div class="" style="padding: 20px; background: white;">
                                <div class="heading">
                                    <p class="fs-5" >Skills</p>
                                </div>

                                <!-- <div class="alert alert-success" role="alert" style="margin-top: 30px;">
                                    To download Your Resume <a href="<?php echo $username['resume'] ?>" style="color: #0d6efd;">Click Here</a>
                                </div>  -->
                                <!-- ====================== Anurag skills code =================== -->
                                <!-- <div class="  mt-3 mb-3">
                                    <form id="myForm">
                                        <div class="row">
                                            <div class="col">
                                                <input type="hidden" name="id" id="id" value="<?php echo $username['id'] ?>">

                                                <div class="form-group mt-3 col-md-12 col-sm-12">
                                                    <label for="input_name">Add Your Skills</label>
                                                    <?php $array = json_encode($username['skills']); ?>
                                                    <select class="form-control" name="skills[]" id="skills" multiple required>
                                                        
                                                    </select>

                                                </div>

                                                <div class="form-group mt-3 text-center col-md-12 col-sm-12">
                                                    <button type="submit" name="submit"  class="btn  btn-primary btn-sm  col-4 mx-auto rounded-0" style="">
                                                        <div class="loaderr loader--style8" title="7" id="loader">
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
                                                        </div><span>Submit</span>
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div> -->
                                <!-- ====================== Anurag skills code =================== -->
                                <input type="hidden" name="id" id="id" value="<?php echo $username['id'] ?>">
                                <p id="result"></p>
                                <div class="pt-4">


                                <?php
                        
                                        foreach ($username['skillsarray'] as $id) {
                                            $sqll = "SELECT `skill_id`,`skill_name` FROM `sp_skills` WHERE `skill_id` = ?";                   
                                            $stmt = mysqli_prepare($con, $sqll);
                                            mysqli_stmt_bind_param($stmt, "i", $id);
                                            mysqli_stmt_execute($stmt);
                                            $resultt = mysqli_stmt_get_result($stmt);
                                            if ($row2 = mysqli_fetch_assoc($resultt)) {
                                                $skillName = $row2['skill_name'];
                                                // echo $skillName;
                                            
                                    ?>
                                    
                                            <span style="position: relative; margin: 0 20px;">
                                                <button class="btn btn-sm btn-primary mb-3">
                                                    <?php echo $skillName; ?>

                                                </button>
                                                <i class="fa-solid fa-circle-xmark remove-skill text-danger" style="    position: absolute; right: 0;top: -20px;"
                                                    data-prfid="<?php echo $_SESSION['id']; ?>" data-skillid="<?php echo $id; ?>"></i>
                                            </span>

                                    <?php
                                        }else{
                                    ?>
                                    <span>Add your skills here</span>
                                    <?php
                                        }
                                    }
                                    ?>


                                </div>
                                <br>
                                <p class="mt-3 text-primary" data-bs-toggle="modal" data-bs-target="#addSkillModal"
                                    style="cursor:pointer"> + Add skill </p>
                            </div>
                        <!-- </div>  -->
                        

                    <!-- </div> -->



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
<!-- add service Modal -->
<div class="modal fade" id="addSkillModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content no-border-radius" >
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add skill</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>
            <div class="modal-body">

                <form id="addSkillForm" action="" method="post">
                    <!-- Input fields -->
                   <!-- Input fields -->
                   <select class="form-select mb-3" name="skill" id="skills_list">
                        
                        <!-- Dynamic services from api  -->
                    </select>
                    <input type="hidden" name="profid" id="profid" value="<?php echo $username['id'] ?>">

                    <!-- Submit button -->
                    <button class="btn btn-sm btn-primary" type="submit" name="addSkill">Submit</button>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
        
      
        // var modelSelect = document.getElementById('skills');
        // modelSelect.innerHTML = '';
        // let data = ['LARAVEL', 'NODEJS', 'JAVASCRIPT', 'PYTHON'];
        // var selectedValues = <?php echo $username['skills']; ?>
        // if(selectedValues){
        //     data.forEach(item => {
        //         var option = document.createElement('option');
        //         option.value = item;
        //         option.textContent = item;
        //         if (selectedValues.includes(item)) {
        //             option.setAttribute('selected', 'selected');
        //         }                
        //         modelSelect.appendChild(option);
        //     });
        // }

        // $('#skills').chosen();

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



        $(document).ready(function(){

            $.ajax({
                url: site_url+"/api2/public/index.php/sp_skills_all", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: "", // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,        // To send DOMDocument or non processed data file it is set to false
                success: function (data)   // A function to be called if request succeeds
                {   
                    var new_data = JSON.parse(data);
                    // console.log(new_data);
                    if (new_data.status == 200) {
                        // $("#sprs_error").css('display', 'none');
                        $.each(new_data.msg, function (k, v) {
                            let option = $('<option>', {
                                value: v.skill_id,
                                text: v.skill_name
                            });                           
                        
                            $("#skills_list").append(option);
                        });

                        // updateSelectDropdown(new_data.msg);                        
                        // uniqueLi = {};
                        // $("#search_category li").each(function () {
                        //     var thisVal = $(this).text();
                        //     if (!(thisVal in uniqueLi)) {
                        //         uniqueLi[thisVal] = "";
                        //     } else {
                        //         $(this).remove();
                        //     }
                        // })
                        // $('.search_div').css('display', 'block');
                    } else {
                        $("#sprs_error").css('display', '-webkit-inline-box');
                        // alert("This service is not available right now! We are working on it!");
                        return false;
                    }
                    $("#srs_spinner").hide();
                }
            });

        });

        
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


    // const form = document.getElementById('myForm');
    // form.addEventListener('submit', (event) => {         
    //     event.preventDefault();
    //     const formData = new FormData(form);
    //     const xhr = new XMLHttpRequest();
    //     xhr.open('POST', site_url+'/api2/public/index.php/add_skills');
    //     xhr.onload = function() {
    //     if (xhr.status === 200) {
    //         const response = JSON.parse(xhr.responseText);
    //         if(response.status == 200){
    //             toastr.success(response.msg, 'Success'); 
    //         }else{
    //             toastr.error(response.msg, 'Error');
    //         }
    //     } else {
    //         console.error('Error uploading form:', xhr.status, xhr.statusText);
    //     }
    //     };

    //     xhr.onerror = function() {
    //         console.error('Network error occurred');
    //     };

    //     xhr.send(formData);
    // });

</script>

<script>

    // Switch now button 
    $("#switch_acc_btn").on("click", function () {
        let switchAccEmail  = <?php echo json_encode($username['email']); ?>;
    
        $.ajax({
            url: site_url+'/api2/public/index.php/switch_account',
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

<script src="<?php echo $SITE_URL ?>/assets/js/user-skills.js"></script>

