<?php
session_start();
include_once 'function.php';

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

    

    // if (isset($_POST['update-password-btn'])) {
    //     $passwordUpdate = $loggedinUser->updateCustPass($_SESSION['id'], $_POST["newPassword"], $_POST["currentPassword"], "customer");     

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
        border-radius:0!important;
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
                <!-- <div style="background: white;padding: 20px 30px;    height: 100%;">
                    <div class="text-center mb-3">
                        <p class="fs-5 fw-bold">
                            <?php echo $username['name'] ?>
                        </p>
                        
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
                                <i class="fa-sharp fa-solid fa-pen-to-square" title="Chnage photo" data-bs-toggle="modal"   data-bs-target="#exampleModal"></i>
                            </div>
                            <?php
                        }
                        ?>


                    </div>
                   
                    <p class="text-secondary mt-3" style="font-size: 10px;">
                        Maximum upload size is <strong> 2 Mb <i class="fa fa-solid fa-circle-info" title="For better view angle, upload square shaped picture."></i>
                        </strong></p>

                    <div class="all-settings-headings">
                        <div class="settings-heading">
                            <h5><i class="fa-solid fa-user pe-2"></i>Profile Settings</h5>
                            <div class="sub-settings">
                            <ul class="ps-0">
                                <li><a class="" href="customer-settings">Manage Details</a></li>

                                    <li><a class="active-setting" href="customer-password-setting">Manage Password</a></li>

                                </ul>
                            </div>


                        </div>
                       

                    </div>

                </div> -->

                <?php include "./user_sidebar.php" ?>


            </div>

            <!-- <div class="col-md-3 col-sm-12" style="background:url('assets/img/images/blank-profile-picture.webp');    background-size: contain;background-repeat: no-repeat;">               

            </div> -->

            <div class="col-lg-9 col-md-9 col-sm-12 mb-2">

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
                            aria-labelledby="home-tab" tabindex="0">

                            <div class="" style="padding: 20px; background: white;">
                                <div class="heading">
                                    <p class="fs-4" style="    color: #0071ff;">Edit your profile</p>
                                </div>

                                <div class="  mt-3 mb-3">
                                    <form id="update-profile" action="" method="post" enctype="multipart/form-data">
                                        <div class="row">

                                            <div class="col">


                                                <input type="hidden" name="id" value="<?php echo $username['id'] ?>">
                                                <div class="form-group mt-3 col-md-12 col-sm-12">
                                                    <label for="input_name">Name</label>
                                                    <input class="form-control" id="input_name" type="text" name="name"
                                                        value="<?php echo $username['name'] ?>">
                                                </div>

                                                <div class="form-group mt-3 col-lg-12 col-md-12 col-sm-12">
                                                    <label for="input_email">Email</label>
                                                    <input class="form-control" type="email" id="input_email"
                                                        name="email" value="<?php echo $username['email'] ?>">
                                                </div>

                                                <div class="form-group mt-3 col-lg-12 col-md-12 col-sm-12">
                                                    <label for="input_mobile">Mobile</label>
                                                    <input class="form-control" type="text" id="input_mobile"
                                                        name="mobile" value="<?php echo $username['mobile'] ?>">
                                                </div>


                                               
                                                <div class="form-group mt-3 text-center col-md-12 col-sm-12">
                                                    <button type="submit" id="update-profile-btn"
                                                        name="update-profile-btn"
                                                        class="btn  btn-primary text-white btn-sm  col-3 mx-auto "
                                                        style=""><span>Update
                                                            profile</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div> -->
                        <!-- extras  -->
                                                <!-- <div class=" mt-1 col-md-6">
                                                    <label for="image">Upload your image <span class="text-danger">*</span></label>
                                                    <input type="file" class="form-control mt-2 input-bottom-border-choose " id="image"
                                                        name="image" >
                                                </div>

                                                <div class="form-group mt-1 col-md-6">
                                                    <label for="resume">Upload your resume (pdf only) <span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" class="form-control mt-2 input-bottom-border-choose" id="resume"
                                                        name="resume" >
                                                </div> -->

                        <!-- <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                            tabindex="0"> -->
                            <div class="row m-0" style="padding: 20px; background-color: white;">
                                <div class="heading">
                                    <p class="fs-5" style="    color: #0071ff;">Edit your password</p>
                                </div>
                                <div class="col-md-12">
                                    <form id="update-profile" action=""  >
                                        <div class="validation-message text-center">
                                            <?php if (isset($message)) {
                                                echo $message;
                                            } ?>
                                        </div>
                                        <div class="row">

                                            <input type="hidden" name="id" value="<?php echo $username['id'] ?>" id="user_id">
                                            <input type="hidden" name="table_name" value="customer" id="table_name">

                                            <div class="form-group mt-3 col-md-12 col-sm-12">
                                                <label for="input_newpass">Current Password</label>
                                                <input class="form-control" id="input_currentpass" type="password"
                                                    name="currentPassword">
                                            </div>

                                            <div class="form-group mt-3 col-md-12 col-sm-12">
                                                <label for="input_confirmpass">New Password</label>
                                                <input class="form-control" id="input_newpass" type="password"
                                                    name="newPassword">
                                            </div>

                                            <div class="form-group mt-3 col-md-12 col-sm-12">
                                                <label for="input_confirmpass">Confirm Password</label>
                                                <input class="form-control" id="input_confirmnewpass" type="password"
                                                    name="confirmPassword">
                                            </div>


                                            <div class="form-group mt-3 text-center col-md-12 col-sm-12">
                                                <button type="button" id="update-password-btn"
                                                    name="update-password-btn"
                                                    class="btn  btn-primary text-white btn-sm   mx-auto rounded-0"
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
                                                    <span>Change Password</span>
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        <!-- </div> -->

                    <!-- </div> -->



                </div>



            </div>

            <!-- <div class="container"> -->


            <!-- </div> -->




        </div>



        
    </div>
</section>


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
                <form id="upload-form">
                    <input class="" type="file" value="" name="image" style="font-size:smaller">
                   
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary" name="image-upload">Save </button>
                    </div>
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


<script>
    $(document).ready(function () {

        

        // upload pic 
        $('#upload-form').on('submit', function(e) {
            e.preventDefault();
            // Create a new FormData object to capture the form data, including the file
            var formData = new FormData($('#upload-form')[0]);
            var id = $("#user_id").val();
            formData.append('id', id);
            formData.append('table', 'join_professionals');

            // Send the AJAX request
            $.ajax({
                url: 'https://localhost/sooprs/api2/public/index.php/upload_picture', // Replace with the URL of your server-side PHP script that handles the file upload
                type: 'POST',
                data: formData,
                processData: false, // Prevent jQuery from automatically processing the data
                contentType: false, // Prevent jQuery from setting the content type
                success: function(response) {
                    
                    let json_data = JSON.parse(response, true);                   
                    var imageUrl = json_data.msg.image;                                      

                    // Set the CSS styles to the element using jQuery
                    $('#user-picture').css({
                        'position': 'relative',
                        'background': 'url(' + imageUrl + ')',
                        'background-size': 'cover',
                        'width': '100px',
                        'height': '100px',
                        'border-radius': '50%',
                        'background-position': 'center'
                    });

                    $('#exampleModal').modal('hide');

                    $('#error_message').text('Profile picture updated successfully!');

                    $('.toast').toast('show');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    // Handle the error, if any
                    console.log('Error:', textStatus, errorThrown);
                }
            });
        });
        

    });
</script>

<script>
    $(document).ready(function () {

        // update general details
        $("#update-password-btn").click(function () {

            $('#loader').css('display', 'inline-block');

            var id = $("#user_id").val();
            var table_name = $("#table_name").val();

            var currentpass = $("#input_currentpass").val();
            var newpass = $("#input_newpass").val();
            var confirmnewpass = $("#input_confirmnewpass").val();

            if (currentpass == '' || newpass == '' || confirmnewpass == '') {
                alert("Please fill all fields.");
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
                    $('#loader').css('display', 'none');

                    $('#error_message').text('Password updated successfully!');

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