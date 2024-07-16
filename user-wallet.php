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
        background: url(<?php echo $username['image'] == null ? 'assets/img/images/user-placeholder-pic.webp' : $username['image'] ?>);
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

<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    tbody,
    td,
    tfoot,
    th,
    thead,
    tr {
        font-size: 15px;
    }

    table,
    th,
    td {
        border: 1px solid black;

    }



    th,
    td {
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #e7e5e5;
        color: black;
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
                        <!-- <div class="heading">
                                    <p class="fs-5" style="    color: #0071ff;">Add Credits</p>
                                </div> -->

                        <!-- <div class="d-flex  align-items-center ">
                            <strong class="">Wallet Balance &nbsp; </strong>
                            <div class="d-flex  align-items-center">
                                <h3 class="fw-bold text-primary" id="user_credits"><?php echo $username['wallet'] ?>
                                </h3><span class="text-secondary">&nbsp; credits</span>
                            </div>
                        </div> -->

                        <div class="wallet-wrap">
                            <div class="wallet-list">
                                <div class="wallet-item">
                                    <span>
                                        <i class="fa-solid fa-wallet"></i>
                                    </span>
                                    <div class="wallet-info">
                                        <p>Total Credits</p>
                                        <h3>0</h3>
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-primary rounded-1" data-bs-toggle="modal"
                                data-bs-target="#wallet_modal">Add
                                Credits</button>
                        </div>


                        <!-- <div class="  mt-3 mb-3">
                            <form id="myForm">
                                <div class="row justify-content-center">
                                    <div class="col-md-5 col-sm-12">

                                        <input type="hidden" name="id" id="user_id"
                                            value="<?php echo $username['id'] ?>">

                                        <div class="form-group mt-3 col-md-12 col-sm-12">
                                            <div class="position-relative">
                                                <span class="position-absolute"
                                                    style="    top: 5px;left: 10px;font-size: 1.2rem;">$</span>
                                                <input class="form-control ps-5" id="form_amount" type="number"
                                                    placeholder="Enter amount in here" name="amount" min="10" step="10"
                                                    required>
                                            </div>
                                            <p class="text-end text-secondary" style="font-size:.7em" for="form_amount">
                                                (US $1 = 5 Credits)</p>
                                            <span id="credit_value"></span>
                                        </div>

                                        <div class="d-flex justify-content-evenly amount_box">
                                            <p class="amount_p" data-amnt="10"> $10</p>
                                            <p class="amount_p" data-amnt="20">$20</p>
                                            <p class="amount_p" data-amnt="50">$50</p>
                                        </div>

                                        <div class="form-group mt-3 col-lg-12 col-md-12 col-sm-12">

                                            <input class="form-control" type="hidden" id="form_email" name="email"
                                                value="<?php echo $username['email'] ?>">
                                        </div>





                                        <div class="form-group mt-3 text-center col-md-12 col-sm-12">
                                            <button type="submit" id="update-profile-btn" name="update-profile-btn"
                                                class="btn  btn-primary btn-sm  col-3 mx-auto rounded-0" style="">

                                                <span>Recharge</span>
                                            </button>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div> -->

                        <div>

                            <!-- <button id="rzp-button1" class="btn btn-outline-dark btn-lg">checkout</button> -->
                            <div class="row mb-4 justify-content-between">
                                <div class="col-md-6">
                                    <button class="btn transactions_btn active" data-value="2">All</button>
                                    <button class="btn transactions_btn" data-value="1">Credited</button>
                                    <button class="btn transactions_btn" data-value="0">Debited</button>
                                </div>
                                <div class="col-md-3">
                                    <select class="form-control" id="transactions_days_filter">
                                        <option value="" disabled selected>Filter by no. of records</option>
                                        <option value="15">Last 15 transactions</option>
                                        <option value="30">Last 30 transactions</option>
                                        <option value="60">Last 60 transactions</option>
                                    </select>
                                </div>
                            </div>
                            <div style="    overflow-x: scroll;    height: 50vh;">
                                <table>
                                    <thead>

                                        <th>Remark</th>
                                        <th>Transaction Type</th>
                                        <th>Credits</th>
                                        <th>Transaction Date</th>




                                        <th>Closing </th>
                                    </thead>
                                    <tbody id="transactionTableBody">
                                        <!-- Dynamic rows will be added here -->
                                    </tbody>
                                </table>
                            </div>

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
                <form id="upload-form">
                    <input class="" type="file" value="" name="image" id="profile_pic" style="font-size:smaller">
                    <input type="hidden" id="table" value="join_professionals">

                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="upload-pic" class="btn btn-sm btn-primary" name="image-upload">Save
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- add service Modal -->
<div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content no-border-radius">
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

<!-- recharge wallet modal  -->
<!-- Modal -->
<div class="modal fade" id="wallet_modal" tabindex="-1" aria-labelledby="wallet_modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="wallet_modalLabel">Add Credits</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="  mt-3 mb-3">
                    <form id="myForm">
                        <div class="row justify-content-center">
                            <div class="col-md-12 col-sm-12">
                                <input type="hidden" name="id" id="user_id" value="<?php echo $username['id'] ?>">
                                <div class="form-group mt-3 col-md-12 col-sm-12">
                                    <div class="position-relative">
                                        <span class="position-absolute"
                                            style="    top: 5px;left: 10px;font-size: 1.2rem;">$</span>
                                        <input class="form-control ps-5" id="form_amount" type="number"
                                            placeholder="Enter the amount" name="amount" min="10" step="10" required>
                                    </div>
                                    <p class="text-end text-secondary" style="font-size:.7em" for="form_amount">
                                        (US $1 = 5 Credits)</p>
                                    <span id="credit_value"></span>
                                </div>
                                <div class="spacer">Or</div>
                                <div class="d-flex justify-content-evenly amount_box">
                                    <p class="amount_p" data-amnt="10"> $10</p>
                                    <p class="amount_p" data-amnt="20">$20</p>
                                    <p class="amount_p" data-amnt="50">$50</p>
                                </div>
                                <div class="form-group mt-3 col-lg-12 col-md-12 col-sm-12">

                                    <input class="form-control" type="hidden" id="form_email" name="email"
                                        value="<?php echo $username['email'] ?>">
                                </div>
                                <div class="form-group mt-3 text-center col-md-12 col-sm-12">
                                    <button type="submit" id="update-profile-btn" name="update-profile-btn"
                                        class="btn  btn-primary btn-sm  col-3 mx-auto rounded-1" style="">

                                        <span>Add Credits</span>
                                    </button>
                                </div>

                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


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
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>


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
    let amount;

    let form = document.getElementById('myForm');
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        let buyformData = new FormData(form);
        // options.prefill.email = buyformData.get('email');
        amount = buyformData.get('amount');
        let amountInPaise = amount * 100 * 83;

        // Request to create order on the server
        fetch('create_razr_order.php', {
            method: 'POST',
            body: new URLSearchParams('amount=' + amountInPaise)
        })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    throw new Error(data.error);
                }

                let options = {
                    "key": "rzp_live_SwPxj3HuCi6h9s", // Replace with your Razorpay Key ID
                    "amount": amountInPaise,
                    "currency": "INR",
                    "description": "Sooprs",
                    "image": "https://sooprs.com/assets/images/sooprs_logo.png",
                    "order_id": data.order_id, // Use the order ID from server
                    "prefill": {
                        "email": '', // You can fill this from the form data if needed
                        "contact": '+919900000000' // Replace with actual contact
                    },
                    "handler": function (response) {
                        console.log("response.razorpay_order_id ", response.razorpay_order_id);
                        saveData(response.razorpay_payment_id, response.razorpay_order_id);
                    },
                    "modal": {
                        "ondismiss": function () {
                            if (confirm("Are you sure, you want to close the form?")) {
                                console.log("Checkout form closed by the user");
                            } else {
                                console.log("Complete the Payment");
                            }
                        }
                    }
                };

                var rzp1 = new Razorpay(options);
                rzp1.open();
            })
            .catch(error => {
                console.error('Error creating Razorpay order:', error);
                alert('Failed to create order: ' + error.message);
            });
    });

    let saveData = (payment_id, order_id) => {
        const xhr = new XMLHttpRequest();
        let buyformData = new FormData();
        buyformData.append('amount', amount);
        buyformData.append('user_id', document.getElementById('user_id').value);
        buyformData.append('payment_id', payment_id);
        buyformData.append('razr_order_id', order_id);

        xhr.open('POST', site_url + '/api2/public/index.php/update_wallet'); // Replace with your actual backend endpoint
        xhr.onload = function () {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.status == 200) {
                    toastr.success('Payment Successful', 'Success');
                    let user_credits = document.getElementById('user_credits');
                    let sidebar_credits = document.getElementById('sidebar_credits');
                    user_credits.innerHTML = response.msg;
                    sidebar_credits.innerHTML = response.msg;
                } else {
                    toastr.error(response.msg, 'Error');
                }
            } else {
                console.error('Error uploading form:', xhr.status, xhr.statusText);
            }
        };
        xhr.onerror = function () {
            console.error('Network error occurred');
        };
        xhr.send(buyformData);
    };
</script>


<script>

    //   let amount;
    //   var options = 
    //     {
    //         "key": "<?php echo $RAZR_PAY_KEY ?>", // Enter the Key ID generated from the Dashboard

    //         "amount": 100,
    //         "currency": "INR",
    //         "description": "Sooprs",
    //         "image": "https://res.cloudinary.com/dr4iluda9/image/upload/v1691132151/sooprs/sooprs_logo_blue_side2_flxyxx.png",
    //         "prefill":
    //         {
    //         "email": '',
    //         "contact": +919900000000,
    //         },
    //         config: {
    //             display: {
    //                 blocks: {
    //                     utib: 
    //                     { //name for Axis block
    //                         name: "Pay using Axis Bank",
    //                         instruments: 
    //                         [
    //                             {
    //                                 method: "card",
    //                                 issuers: ["UTIB"]
    //                             },
    //                             {
    //                                 method: "netbanking",
    //                                 banks: ["UTIB"]
    //                             },
    //                         ]
    //                     },
    //                     other:
    //                     { //  name for other block
    //                         name: "Other Payment modes",
    //                         instruments: 
    //                         [
    //                             {
    //                                 method: "card",
    //                                 issuers: ["ICIC"]
    //                             },
    //                             {
    //                                 method: 'netbanking',
    //                             }
    //                         ]
    //                     }
    //                 },

    //                 sequence: ["block.utib", "block.other"],
    //                 preferences: {
    //                 show_default_blocks: true // Should Checkout show its default blocks?
    //                 }
    //             }
    //         },
    //         "handler": function (response) {
    //         saveData(response.razorpay_payment_id);
    //         },
    //         "modal": {
    //         "ondismiss": function () {
    //             if (confirm("Are you sure, you want to close the form?")) {
    //             txt = "You pressed OK!";
    //             console.log("Checkout form closed by the user");
    //             } else {
    //             txt = "You pressed Cancel!";
    //             console.log("Complete the Payment")
    //             }
    //             }
    //         }
    //     };

    //     let form = document.getElementById('myForm');
    //     form.addEventListener('submit', (event) =>{

    //       event.preventDefault();

    //         let formData = new FormData(form);


    //         // Set email and contact from form data
    //         options.prefill.email = formData.get('email');

    //         amount = formData.get('amount');
    //         // options.prefill.contact = formData.get('contact');
    //         options.amount = amount*100*83;
    //         var rzp1 = new Razorpay(options);
    //         rzp1.open();

    //     });

    //     let saveData = (payment_id) => {

    //         const xhr = new XMLHttpRequest();

    //         let formData = new FormData();

    //         formData.append('amount', amount);
    //         formData.append('user_id', document.getElementById('user_id').value);
    //         formData.append('payment_id', payment_id);

    //         xhr.open('POST', site_url+'/api2/public/index.php/update_wallet');

    //         xhr.onload = function() {
    //             if (xhr.status === 200) {
    //                 const response = JSON.parse(xhr.responseText);
    //                 if(response.status == 200){

    //                     toastr.success('Payment Successful', 'Success'); 
    //                     let user_credits = document.getElementById('user_credits');
    //                     let sidebar_credits = document.getElementById('sidebar_credits');

    //                     user_credits.innerHTML = response.msg;
    //                     sidebar_credits.innerHTML = response.msg;

    //                 }else{
    //                     toastr.error(response.msg, 'Error');
    //                 }

    //             } else {
    //                 // Request failed
    //                 console.error('Error uploading form:', xhr.status, xhr.statusText);
    //             }
    //         };

    //         xhr.onerror = function() {
    //             console.error('Network error occurred');
    //         };

    //         // Send the FormData object with the XMLHttpRequest
    //         xhr.send(formData);
    //     }


    window.onload = () => {
        const xhr = new XMLHttpRequest();
        let formData = new FormData();
        formData.append('user_id', document.getElementById('user_id').value);
        formData.append('data_value', 2);

        xhr.open('POST', site_url + '/api2/public/index.php/get_transactions');
        xhr.onload = function () {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.status == 200) {

                    data = response.msg;
                    const tableBody = document.getElementById('transactionTableBody');
                    tableBody.innerHTML = '';

                    data.forEach(item => {
                        const row = document.createElement('tr');
                        row.innerHTML = `                    
                        <td>${item.remark}</td>                    
                        <td class="text-center"><span class="${item.transaction_type === '0' ? 'debit' : 'credit'}">${item.transaction_type === '0' ? '<i class="fa-solid fa-arrow-up"></i> Debit' : '<i class="fa-solid fa-arrow-down"></i> Credit'}</span></td>
                        <td>${item.amount}</td>
                        <td>${item.transaction_date}</td>                   
                        <td>${item.closing}</td>
                    `;
                        tableBody.appendChild(row);
                    });

                } else {
                    toastr.error(response.msg, 'Error');
                }

            } else {
                // Request failed
                console.error('Error uploading form:', xhr.status, xhr.statusText);
            }
        };

        xhr.onerror = function () {
            console.error('Network error occurred');
        };

        // Send the FormData object with the XMLHttpRequest
        xhr.send(formData);
    }

    // alll/credited/debited button 
    const transactionsBtns = document.querySelectorAll('.transactions_btn');
    transactionsBtns.forEach(item => {
        item.addEventListener('click', function () {
            const data_value = this.getAttribute('data-value');
            console.log("buttion clicked ", data_value);

            transactionsBtns.forEach(btn => {
                btn.classList.remove('active');
            });
            this.classList.add('active');

            // XHR request 
            const xhrTrans = new XMLHttpRequest();
            let formData = new FormData();
            formData.append('user_id', document.getElementById('user_id').value);
            formData.append('data_value', data_value);

            xhrTrans.open('POST', site_url + '/api2/public/index.php/get_transactions');
            xhrTrans.onload = function () {
                if (xhrTrans.status === 200) {
                    const responseTrans = JSON.parse(xhrTrans.responseText);
                    if (responseTrans.status == 200) {

                        dataTrans = responseTrans.msg;
                        const tableBodyTrans = document.getElementById('transactionTableBody');
                        tableBodyTrans.innerHTML = '';
                        dataTrans.forEach(item => {
                            const row = document.createElement('tr');
                            row.innerHTML = `                    
                            
                            <td>${item.remark}</td>                    
                            <td class="text-center"><span class="${item.transaction_type === '0' ? 'debit' : 'credit'}">${item.transaction_type === '0' ? '<i class="fa-solid fa-arrow-up"></i> Debit' : '<i class="fa-solid fa-arrow-down"></i> Credit'}</span></td>
                            <td>${item.amount}</td>
                            <td>${item.transaction_date}</td>                   
                            <td>${item.closing}</td>
                        `;
                            tableBodyTrans.appendChild(row);
                        });

                    } else {
                        toastr.error(responseTrans.msg, 'Error');
                    }

                } else {
                    // Request failed
                    console.error('Error uploading form:', xhrTrans.status, xhrTrans.statusText);
                }
            };

            xhrTrans.onerror = function () {
                console.error('Network error occurred');
            };

            // Send the FormData object with the XMLHttpRequest
            xhrTrans.send(formData);
        });
    });

    // based on days filter transactions 
    const transactionsSelect = document.getElementById('transactions_days_filter');
    transactionsSelect.addEventListener('change', function () {
        const select_value = this.value;
        console.log("select changed", select_value);

        // XHR request 
        const xhrTransSelect = new XMLHttpRequest();
        let formData = new FormData();
        formData.append('user_id', document.getElementById('user_id').value);
        formData.append('select_value', select_value);

        xhrTransSelect.open('POST', site_url + '/api2/public/index.php/getTransactionsByUserIdAndDays');
        xhrTransSelect.onload = function () {
            if (xhrTransSelect.status === 200) {
                const responseTransSelect = JSON.parse(xhrTransSelect.responseText);
                if (responseTransSelect.status == 200) {

                    dataTransSelect = responseTransSelect.msg;
                    const tableBodyTransSelect = document.getElementById('transactionTableBody');
                    tableBodyTransSelect.innerHTML = '';
                    dataTransSelect.forEach(item => {
                        const rowTransSelect = document.createElement('tr');
                        rowTransSelect.innerHTML = `                    
                        <td>${item.remark}</td>                    
                            <td class="text-center"><span class="${item.transaction_type === '0' ? 'debit' : 'credit'}">${item.transaction_type === '0' ? '<i class="fa-solid fa-arrow-up"></i> Debit' : '<i class="fa-solid fa-arrow-down"></i> Credit'}</span></td>
                            <td>${item.amount}</td>
                            <td>${item.transaction_date}</td>                   
                            <td>${item.closing}</td>
                        `;
                        tableBodyTransSelect.appendChild(rowTransSelect);
                    });

                } else {
                    toastr.error(responseTransSelect.msg, 'Error');
                }

            } else {
                // Request failed
                console.error('Error uploading form:', xhrTransSelect.status, xhrTransSelect.statusText);
            }
        };

        xhrTransSelect.onerror = function () {
            console.error('Network error occurred');
        };

        // Send the FormData object with the XMLHttpRequest
        xhrTransSelect.send(formData);
    });

</script>



<script>




</script>

<script>
    $(document).ready(function () {

        var site__url = "<?php echo $SITE_URL; ?>";


        var auth_user_slug = "<?php echo $username['slug'] ?>";
        var data = new FormData();
        data.append('auth_user_slug', auth_user_slug);
        $.ajax({
            url: site_url + '/api2/public/index.php/wallet_balance',
            method: "POST",
            data: data,
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (response) {
                var parsedResponse = JSON.parse(response);
                console.log(parsedResponse);
                $(".wallet-info h3").html(parsedResponse.msg.wallet);

            }
        });

        // $(document).ready(function () {
        $(".sub-settings ul li").click(function () {
            // Remove active class from all items
            $(".sub-settings ul li").removeClass("active-setting");

            // Add active class to clicked item
            $(this).addClass("active-setting");
        });
        // });

        // Switch now button 
        $("#switch_acc_btn").on("click", function () {
            let switchAccEmail = <?php echo json_encode($username['email']); ?>;

            $.ajax({
                url: site__url + '/api2/public/index.php/switch_account',
                method: "POST",
                data: { switchAccEmail: switchAccEmail },
                success: function (response) {
                    $('#staticBackdropIs_buyer').modal('hide');
                    toastr.success(response.msg, 'Success');
                    window.location.href = 'professional-settings';

                }
            });
        });

    });

</script>


<script>
    // Get all the p elements with class 'amount_p'
    const amountElements = document.querySelectorAll('.amount_p');

    // Add click event listener to each amount element
    amountElements.forEach(amountElement => {
        amountElement.addEventListener('click', () => {
            // Get the value of the data-amnt attribute
            const amountValue = parseInt(amountElement.dataset.amnt, 10);
            // Set the input field value to the value of the data-amnt attribute
            document.getElementById('form_amount').value = amountValue;
        });
    });
</script>

<?php include "./footer.php" ?>