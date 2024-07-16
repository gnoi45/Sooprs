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


<style>
    .blue-text {
        color: blue;
    }
    .bold-text {
        font-weight: bold;
    }
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

            <div class="col-lg-9 col-md-9 col-sm-12  d-flex">

            <?php

                if ($username['resume'] != null) {
            ?>
               
            

            <?php } ?>

                <div class="card flex-fill">


               
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
                    <!-- <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel"
                            aria-labelledby="home-tab" tabindex="0"> -->
            
                            <div class="" style="padding: 20px; background: white;">
                                <div class="heading">
                                    <p class="fs-5">Add Experience</p>
                                </div>

                                <!-- <div class="alert alert-success" role="alert" style="margin-top: 30px;">
                                    To download Your Resume <a href="<?php echo $username['resume'] ?>" style="color: #0d6efd;">Click Here</a>
                                </div>  -->

                                <div class="  mt-3 mb-3">
                                <form id="myForm">
                                        <div class="row">

                                                <input type="hidden" name="id" id="user_id" value="<?php echo $username['id'] ?>">

                                                <div class="form-group mt-3 col-md-12 col-sm-12">
                                                    <label for="input_name">Organization</label>
                                                    <input class="form-control" id="input_name" type="text" name="organization"
                                                    required>
                                                </div>

                                                <div class="form-group mt-3 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="input_email">From</label>
                                                    <input class="form-control" type="date" id="input_email"
                                                        name="from" required>
                                                </div>

                                                <div class="form-group mt-3 col-lg-6 col-md-6 col-sm-12">
                                                    <label for="input_mobile">To</label>
                                                    <input class="form-control" type="date" id="input_mobile"
                                                        name="to">
                                                   
                                                </div>
                                               

                                                <div class="form-group mt-3 col-md-12 col-sm-12">
                                                    <label for="input_organisation">Designation</label>
                                                    <input class="form-control" type="text" id="input_organisation"
                                                        name="designation" required>
                                                </div>
                                                
                                                

                                                <div class="form-group mt-3 text-center col-md-12 col-sm-12">
                                                    <button type="submit" id="update-profile-btn"  name="update-profile-btn"  class="btn  btn-primary btn-sm  col-4 mx-auto rounded-0" style="">
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
                                    </form>
                                </div>

                            </div>
                        <!-- </div>  -->
                        

                    <!-- </div> -->

                    <div class="container mt-4">
                        <div class="row" id="cardContainer"></div>
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

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Experience</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    <!-- Edit form fields go here -->
                    <div class="row">
                        <div class="mb-3 col-lg-12">
                            <label for="organization" class="form-label">Organization</label>
                            <input type="text" class="form-control" id="organization" name="organization">
                        </div>
                        <div class="mb-3 col-lg-12">
                            <label for="designation" class="form-label">Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="fromDate" class="form-label">From Date</label>
                            <input type="date" class="form-control" id="fromDate" name="fromDate">
                        </div>
                        <div class="mb-3 col-lg-6">
                            <label for="toDate" class="form-label">To Date</label>
                            <input type="date" class="form-control" id="toDate" name="toDate">
                        </div>
                    </div>
                    <input type="hidden" id="expId" name="expId">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
            </div>
        </div>
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


    // Assuming you have a form element with the ID 'myForm'
    const form = document.getElementById('myForm');
    

    form.addEventListener('submit', (event) => {
         
        event.preventDefault();

        // Create a new FormData object and append form fields
        const formData = new FormData(form);

        // Make an AJAX request to upload the form data
        const xhr = new XMLHttpRequest();
        xhr.open('POST', site_url+'/api2/public/index.php/add_exp');

        xhr.onload = function() {
        if (xhr.status === 200) {
            
            const response = JSON.parse(xhr.responseText);
            if(response.status == 200){
                toastr.success(response.msg, 'Success'); 
            }else{
                toastr.error(response.msg, 'Error');
            }
        } else {
            // Request failed
            console.error('Error uploading form:', xhr.status, xhr.statusText);
        }
        };

        xhr.onerror = function() {
            console.error('Network error occurred');
        };

        // Send the FormData object with the XMLHttpRequest
        xhr.send(formData);
    });
    
    function createCard(exp) {
        const card = document.createElement('div');
        card.classList.add('col-md-4', 'mb-4');

        const toDateText = exp.to_date === '0000-00-00' ? 'Till Now' : exp.to_date;

        card.innerHTML = `
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title ${exp.to_date === '0000-00-00' ? 'blue-text' : ''}">${exp.organization}</h5>
                    <p class="card-text ${exp.to_date === '0000-00-00' ? 'bold-text' : ''}">${exp.designation}</p>
                    <p class="card-text">${exp.from_date} - ${toDateText}</p>
                    <a href="#" class="btn btn-link delete-link" style="position: absolute; top: 0;right: 0;"><i class="fa fa-circle-xmark" style="font-size: 20px;    height: fit-content;color:#cc0000;" ></i></a>

                </div>
            </div>
        `;

        // Add event listener for delete link
        const deleteLink = card.querySelector('.delete-link');
        deleteLink.addEventListener('click', function(event) {
            event.preventDefault();
            const expId = exp.id; // Get the experience ID
            deleteExperience(expId);
           
        });

        // Add event listener for edit link
        // const editLink = card.querySelector('.edit-link');
        // editLink.addEventListener('click', function(event) {
        //     event.preventDefault();
        //     // Populate the edit form with exp details
        //     document.getElementById('organization').value = exp.organization;
        //     document.getElementById('designation').value = exp.designation;
        //     document.getElementById('fromDate').value = exp.from_date;
        //     document.getElementById('toDate').value = exp.to_date;
        //     document.getElementById('expId').value = exp.id;


        // });

        return card;
    }

    const deleteExperience = (expId) => {

        const formData = new FormData();
        formData.append('exp_id', expId);
       
        // Make an AJAX request to upload the form data
        const xhr = new XMLHttpRequest();
        xhr.open('POST', site_url+'/api2/public/index.php/delete_exp');

        xhr.onload = function() {
        if (xhr.status === 200) {
            
            const response = JSON.parse(xhr.responseText);
            if(response.status == 200){
                
                toastr.success(response.msg, 'Success'); 
            }else{
                toastr.error(response.msg, 'Error');
            }
        } else {
            // Request failed
            console.error('Error uploading form:', xhr.status, xhr.statusText);
        }
        };

        xhr.onerror = function() {
            console.error('Network error occurred');
        };

        // Send the FormData object with the XMLHttpRequest
        xhr.send(formData);
    }

    window.onload = () => {
        // Create a new FormData object and append form fields
        const formData = new FormData();
        formData.append('user_id', document.getElementById('user_id').value);
       
        // Make an AJAX request to upload the form data
        const xhr = new XMLHttpRequest();
        xhr.open('POST', site_url+'/api2/public/index.php/get_exp');

        xhr.onload = function() {
        if (xhr.status === 200) {
            
            const response = JSON.parse(xhr.responseText);
            if(response.status == 200){
                let data = response.msg;
                const cardContainer = document.getElementById('cardContainer');
                data.forEach(exp => {
                    const card = createCard(exp);
                    cardContainer.appendChild(card);
                });
                // toastr.success(response.msg, 'Success'); 
            }else{
                // toastr.error(response.msg, 'Error');
            }
        } else {
            // Request failed
            console.error('Error uploading form:', xhr.status, xhr.statusText);
        }
        };

        xhr.onerror = function() {
            console.error('Network error occurred');
        };

        // Send the FormData object with the XMLHttpRequest
        xhr.send(formData);
    }

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

