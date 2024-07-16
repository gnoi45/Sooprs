<?php
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

$title = 'Professional profile ';
$description = "Description";
$keywords = "key,words";
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css">

<style>
    .active-setting {
        color: blue !important;
    }

    label {
        color: black !important;
        font-size: 16px !important;
        margin-bottom: 5px;

    }

    .left_side_p {
        color: grey;
        font-size: 12px;
        margin-bottom: 10px;
    }

    .form-check-label {
        /* color:grey!important; */
        font-size: 13px !important;
        font-weight: 100 !important;
    }

    input::placeholder,
    textarea::placeholder,
    select.placeholder-shown {
        font-weight: bold;
        opacity: 0.5;
        font-size: 13px;
        /* color: red; */
    }

    .choices__input::placeholder {
        font-weight: bold;
        opacity: 1;
        font-size: 13px;
        /* color: red; */
    }

    .choices__inner {
        display: inline-block;
        vertical-align: top;
        width: 100%;
        background-color: #f9f9f9;
        padding: 5.5px 7.5px 2.75px;
        border: 1px solid #ddd;
        border-radius: 5.5px;
        font-size: 14px;
        min-height: 44px;
        overflow: hidden;
    }


    .form-control {

        border: 1px solid darkgrey !important;
    }


    .choices {
        position: relative;
        overflow: hidden;
        margin-bottom: 5px;
        font-size: 16px;
    }


    .round-add-btn {
        border-radius: 10%;
        width: 100px;
        height: 65px;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 1px #878787 solid;
        border-style: dashed;
        overflow: hidden;
    }

    input,
    textarea,
    select {
        font-size: 13px !important;
    }


    #input_gig_price {
        padding: 10px 10px 10px 30px !important;
    }

    .form-control {

        padding: 0.5rem .75rem !important;

    }

    #success_msg_gif {
        text-align: -webkit-center;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }


    #gig_type_content {
        display: none;
    }
</style>


<?php include "./header2.php" ?>


<section class="top-sectop" style="background-color: #e0e0e0;padding: 30px 0 100px 0;">
    <div class="container">
        <h1 class="text-center mb-3" id="create_gig_heading" style="    font-weight: 600; opacity: 0.8;">Create Your
            <span style="color:#0d6efd">Gig</span>
        </h1>
        <div class="row justify-content-center">

            <div class="col-lg-10 col-md-10 col-sm-12 ">


                <div class="card flex-fill">

                    <div class="card-body">
                        <form id="professional_gig_create" enctype="multipart/form-data">
                            <p class="text-danger " style="font-size: 13px;;">Please fill all required<span
                                    class="text-danger fs-6">*</span> fields.</p>
                            <div class="row">
                                <div class="col">

                                    <input type="hidden" name="professional_id" id="id"
                                        value="<?php echo $username['slug'] ?>">

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class=" row form-group mt-3 col-md-12 col-sm-12">
                                                <div class="col-md-4">
                                                    <label for="input_gig_title"> Title <span
                                                            class="text-danger fs-6">*</span></label>
                                                    <p class="left_side_p">Your title is the most important place to
                                                        write keywords that buyers would likely use while searching for
                                                        services like yours</p>
                                                </div>
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" style="font-size:13px;"
                                                        name="gig_title" id="input_gig_title" maxlength="100"
                                                        oninput="updateCharacterCount()" required
                                                        placeholder="Enter your gig title...">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <p class="text-end left_side_p mt-2">e.g. I will do website
                                                            development for the client.</p>
                                                        <p class="text-end left_side_p mt-2" style=""><span
                                                                id="characterCount">0</span> / 100 max</p>
                                                    </div>
                                                    <p id="characterLimitMessage" class="text-danger "
                                                        style="font-size:13px;"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class=" row form-group mt-3 col-md-12 col-sm-12">
                                                <div class="col-md-4">
                                                    <label for="input_gig_category">Category <span
                                                            class="text-danger fs-6">*</span></label>
                                                    <p class="left_side_p">Choose the most suitable category and
                                                        sub-category for your gig</p>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-6 mb-3">
                                                            <!-- <label for="gig_main_category">Category</label> -->
                                                            <select name="gig_main_category" id="gig_main_category"
                                                                class="form-control" required>
                                                                <option value="" disabled selected>Select category
                                                                </option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <!-- <label for="gig_sub_category">Sub-category</label> -->
                                                            <select name="gig_sub_category" id="gig_sub_category"
                                                                class="form-control" required>
                                                                <option value="" disabled selected>Select sub-category
                                                                </option>
                                                            </select>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-12">
                                        <div class=" row form-group mt-3 col-md-12 col-sm-12">
                                            <div class="col-md-4">
                                                <label for="input_gig_service">Service type</label>
                                            </div>
                                            <div class="col-md-8">                                               
                                                <select name="gig_service_type" id="input_gig_service" class="form-control" required>
                                                    <option value="" disabled selected>Select service</option>
                                                    <option value="1">Wordpress</option>
                                                    <option value="2">Shopify</option>

                                                </select>                                                                                            
                                            </div>
                                        </div>
                                    </div> -->

                                        <div class=" row form-group mt-3 col-md-12 col-sm-12">
                                            <div class="col-md-4">
                                                <label for="input_gig_technologies">Technologies <span
                                                        class="text-danger fs-6">*</span></label>
                                            </div>
                                            <div class="col-md-8">
                                                <select name="gig_technologies[]" id="input_gig_technologies"
                                                    class="form-control" multiple required>
                                                    <option value="" disabled>Select technologies</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class=" row form-group mt-3 col-md-12 col-sm-12">
                                            <div class="col-md-4">
                                                <label for="input_gig_price">Price of your gig <span
                                                        class="text-danger fs-6">*</span></label>
                                            </div>
                                            <div class="col-md-8 position-relative">
                                                <input type="number" class="form-control" id="input_gig_price"
                                                    name="gig_price" placeholder="Enter your gig price..." required>
                                                <span class=" position-absolute"
                                                    style="    top: 8px; left: 22px;">$</span>
                                            </div>
                                        </div>

                                        <div class=" row form-group mt-3 col-md-12 col-sm-12">
                                            <div class="col-md-4">
                                                <label for="input_gig_description">Description of your gig <span
                                                        class="text-danger fs-6">*</span></label>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea class="form-control" name="gig_desc"
                                                    id="input_gig_description" placeholder="Write gig description"
                                                    rows="15" required></textarea>
                                            </div>
                                        </div>

                                        <div class=" row form-group mt-3 col-md-12 col-sm-12">
                                            <div class="col-md-4">
                                                <label for="gig_search_tags">Search tags</label>
                                                <p class="left_side_p">Tag your gig with words that are relevant to the
                                                    services you offer</p>
                                            </div>
                                            <div class="col-md-8">
                                                <p class="mb-2">Write some positive keywords...</p>
                                                <input type="text" id="gig_search_tags" class="form-control"
                                                    name="gig_tags[]" placeholder="Enter search tags...">
                                                <p class="mt-0s" style="color:grey;font-size:14px;">5 tags maximum.</p>
                                            </div>
                                        </div>

                                        <div class=" row form-group mt-3 col-md-12 col-sm-12">
                                            <div class="col-md-4">
                                                <label for="gig_image">Gig image <span
                                                        class="text-danger fs-6">*</span></label>
                                                <p class="left_side_p mb-1">Upload image which is relevant to your gig.
                                                </p>
                                                <p class="left_side_p">Only in jpg, jpeg, png, webp format (max. 4MB).
                                                </p>

                                            </div>
                                            <div class="col-md-8">
                                                <!-- <input type="file" id="gig_image" class="form-control" name="file" placeholder="Upload image..."> -->
                                                <div class="addFileBtn round-add-btn" id="addFileBtn">
                                                    <i class="fa-solid fa-arrow-up-from-bracket"
                                                        style="color: #0d6efd;"></i>
                                                    <input type="file" id="imageInput1" style="display: none;"
                                                        name="file">
                                                    <img id="imagePreview" src="#" alt="Selected Image"
                                                        style="display: none; max-width: 100%;">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class=" row form-group mt-3 col-md-12 col-sm-12">
                                                <div class="col-md-4">
                                                    <label for="input_gig_category">Gig Type <span
                                                            class="text-danger fs-6">*</span></label>
                                                    <p class="left_side_p mb-1">Choose your gig type, whether service or
                                                        product.</p>


                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-12 mb-3">
                                                            <!-- <label for="gig_main_category">Category</label> -->
                                                            <select name="gig_type" id="gig_type" class="form-control"
                                                                required>
                                                                <option value="1" selected>Service</option>
                                                                <option value="2">Product</option>
                                                            </select>
                                                            <p class="left_side_p mb-0">Service : Custom software
                                                                development or ongoing support you provide to clients.
                                                            </p>
                                                            <p class="left_side_p mb-0">Product : Packaged software
                                                                application that you develop and sell.</p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class=" row form-group mt-3 col-md-12 col-sm-12 " id="gig_type_content">
                                            <div class="col-md-4">
                                                <label for="gig_file">Gig file upload <span
                                                        class="text-danger fs-6">*</span></label>
                                                <p class="left_side_p mb-1">Upload your gig file.</p>
                                                <p class="left_side_p">Upload only zip file (max. 20MB).</p>

                                            </div>
                                            <div class="col-md-8 d-flex ">
                                                <div class="addGigFileBtn round-add-btn me-3">
                                                    <i class="fa-solid fa-arrow-up-from-bracket"
                                                        style="color: #0d6efd;"></i>
                                                    <input type="file" id="gigFileInput1" style="display: none;"
                                                        name="gig_file">
                                                    <img id="gigFilePreview1" src="#" alt="Selected Image"
                                                        style="display: none; max-width: 100%;">
                                                    <i id="zipFileIcon" class="fa-solid fa-file-archive"
                                                        style="display: none; color: #0d6efd;font-size: xx-large;"></i>
                                                </div>

                                                <!-- <div class="addFileBtn round-add-btn me-3" >
                                                    <i class="fa-solid fa-arrow-up-from-bracket" style="color: #0d6efd;"></i>
                                                    <input type="file" id="gigFileInput2" style="display: none;" name="gig_file2">
                                                    <img id="gigFilePreview2" src="#" alt="Selected Image" style="display: none; max-width: 100%;">
                                                </div>

                                                <div class="addFileBtn round-add-btn me-3" >
                                                    <i class="fa-solid fa-arrow-up-from-bracket" style="color: #0d6efd;"></i>
                                                    <input type="file" id="gigFileInput3" style="display: none;"   name="gig_file3">
                                                    <img id="gigFilePreview3" src="#" alt="Selected Image" style="display: none; max-width: 100%;">
                                                </div> -->
                                            </div>
                                        </div>

                                        <div class=" row form-group mt-3 col-md-12 col-sm-12">
                                            <div class="col-md-4">


                                            </div>
                                            <div class=" form-check col-md-8">
                                                <input type="checkbox" id="declaration" class="form-check-input"
                                                    name="gig_declaration" style="    border: 1px solid grey;" required>
                                                <label class="form-check-label" for="declaration">I declare that I have
                                                    obtained all necessary licenses to offer this service under
                                                    applicable laws. I understand that providing licensed services
                                                    without the required license goes against Sooprs' Community
                                                    Standards and may result in permanent suspension of my
                                                    account.</label>
                                            </div>
                                        </div>


                                        <!-- <div class="form-group mt-3 col-md-12 col-sm-12">
                                        <label for="input_gig_category">Select gig category</label>
                                        <select name="gig_category" id="input_gig_category" class="form-control">
                                            <option value="">Web Development</option>
                                        </select>
                                    </div> -->

                                        <div class="row">
                                            <div class="form-group mt-3 text-center col-md-12 col-sm-12">
                                                <button type="submit" id="update-profile-btn" name="update-profile-btn"
                                                    class="btn  btn-primary btn-sm  col-2 mx-auto rounded-0" style="">
                                                    <span>Create you gig</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </form>
                        <div id="success_msg_gif" style="display:none;text-align: -webkit-center;">
                            <img style="width:6rem;" src="<?php echo $SITE_URL ?>/assets/img/sprs_verified.gif"
                                alt="success">
                            <p class="text-success fs-3">Your gig created successfully</p> <br>
                            <a style="text-decoration: underline;" class="text-success"
                                href="<?php echo $SITE_URL ?>/my-gigs">Click here to see all your gigs</a>
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

<div class="loader-container" id="loader">
    <div class="loader">
        <img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1705386434/sooprs-svg_bseaya.svg' style='    position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 110px;'>

    </div>
</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>


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
    document.addEventListener('DOMContentLoaded', function () {
        var firstElement = document.getElementById('gig_search_tags');
        var choices1 = new Choices(firstElement, {
            delimiter: ',',
            editItems: true,
            maxItemCount: 5,
            removeItemButton: true
        });

        // tinymce.init({
        //     selector: 'textarea#input_gig_description',
        //     license_key: 'gpl'
        // });
    });
</script>



<script>
    $(document).ready(function () {



        showLoader();
        $.ajax({
            url: site_url + "/api2/public/index.php/sr_services_new_main_category", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: "",                  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {

                var new_data = JSON.parse(data);
                if (new_data.status == 200) {
                    console.log(new_data.msg);
                    $.each(new_data.msg, function (index, service) {
                        // Creating options in main category dropdoen
                        var btnBody = '';
                        btnBody += '<option  value="' + service.id + '">' + service.service_name + '</option>';
                        $("#gig_main_category").append(btnBody);
                    });
                    hideLoader();

                } else {

                }

            }
        });


        // sub category  based on parent category change event
        // Event handler for main category change
        $('#gig_main_category').change(function () {
            showLoader();
            var form = new FormData();
            form.append('main_cat_id', this.value);
            console.log(this.value);

            $.ajax({
                url: site_url + "/api2/public/index.php/sr_services_new_sub_category",
                type: "POST",  // Change to POST if your server expects a POST request
                data: form,  // Send the main category ID as a query parameter
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,        // To send DOMDocument or non processed data file it is set to false
                success: function (data) {
                    var new_data = JSON.parse(data);
                    if (new_data.status == 200) {
                        console.log(new_data.msg);
                        // Clear existing subcategory options
                        $("#gig_sub_category").empty();
                        $("#gig_sub_category").append('<option value="" disabled selected>Select category</option>');

                        // Append new subcategory options
                        $.each(new_data.msg, function (index, service) {
                            var option = '<option class="subcategory" value="' + service.id + '">' + service.service_name + '</option>';
                            $("#gig_sub_category").append(option);
                        });
                        hideLoader();
                    } else {
                        // Handle error case
                        console.error('Error: ' + new_data.msg);
                    }
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    // Handle AJAX error
                    console.error('AJAX error: ' + textStatus + ', ' + errorThrown);
                    hideLoader();
                }
            });
        });

        const technologySelect = document.getElementById('input_gig_technologies');
        const choices = new Choices(technologySelect, {
            removeItemButton: true,
            placeholder: true,
            placeholderValue: 'Select technologies'
        });

        $.ajax({
            url: site_url + "/api2/public/index.php/sp_skills_all", // URL to which the request is sent
            type: "POST", // Type of request to be sent
            contentType: false, // The content type used when sending data to the server
            cache: false, // Disable caching of the AJAX response
            processData: false, // To send DOMDocument or non-processed data file it is set to false
            success: function (data) { // A function to be called if the request succeeds
                var new_data = JSON.parse(data);
                if (new_data.status == 200) {
                    console.log(new_data.msg);
                    var options = new_data.msg.map(function (service) {
                        return { value: service.skill_id, label: service.skill_name };
                    });

                    choices.setChoices(options, 'value', 'label', true);
                    hideLoader();
                } else {
                    console.error('Error fetching data');
                }
            },
            error: function (xhr, status, error) {
                console.error('AJAX error: ' + status + ', ' + error);
            }
        });
    });



    function validateFiles() {
        var fileInput = document.getElementById('imageInput1');
        var input_gig_technologies = document.getElementById('input_gig_technologies');

        var gigFileInput = document.getElementById('gigFileInput1');
        var maxImageFileSize = 4 * 1024 * 1024; // 4 MB in bytes
        var maxGigFileSize = 20 * 1024 * 1024; // 20 MB in bytes


        if (fileInput.files.length < 0) {
            alert('Gig image is required');
            return false;
        }

        if (fileInput.files.length > 0 && fileInput.files[0].size > maxImageFileSize) {
            alert('Image file size too large. Max. file size is 4 MB');
            return false;
        }

        if (gigFileInput.files.length > 0 && gigFileInput.files[0].size > maxGigFileSize) {
            alert('Gig file size too large. Max. file size is 20 MB');
            return false;
        }

        return true;
    }






    function updateCharacterCount(event) {
        const textInput = document.getElementById("input_gig_title");
        const characterCount = textInput.value.length;
        const characterLimit = 100; // Adjust as needed

        // Update the character count display
        document.getElementById('characterCount').textContent = characterCount;

        // Check if the character limit is exceeded
        const messageElement = document.getElementById('characterLimitMessage');
        if (characterCount > characterLimit) {
            // Show the limit message
            messageElement.textContent = "You have reached the character limit of 200 characters.";
            // Prevent default action (further input)
            if (event.preventDefault) {
                event.preventDefault(); // Standard browsers
            } else {
                event.returnValue = false; // IE
            }
        } else {
            // Clear the limit message if under the limit
            messageElement.textContent = "";
        }
    }

    document.getElementById('input_gig_title').addEventListener('input', updateCharacterCount);


</script>

<script>

    function openFileInput() {
        const fileInput = document.getElementById('imageInput1');
        fileInput.click();
    }

    document.querySelector('.addFileBtn').addEventListener('click', openFileInput);

    document.getElementById('imageInput1').addEventListener('change', function () {
        const fileInput = this;
        const imagePreview = document.getElementById('imagePreview');
        const iTag = addFileBtn.querySelector('i');

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                const imagePreview = document.createElement('img');
                imagePreview.src = e.target.result;
                imagePreview.alt = 'Selected Image';
                imagePreview.style.maxWidth = '100%';

                // Empty the addFileBtn div
                if (iTag) {
                    addFileBtn.removeChild(iTag);
                }

                addFileBtn.appendChild(imagePreview); // Append the image element
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    });




    // file uplaod 
    function FileInput() {
        const gigfileInput = document.getElementById('gigFileInput1');
        gigfileInput.click();
    }

    document.querySelector('.addGigFileBtn').addEventListener('click', FileInput);

    document.getElementById('gigFileInput1').addEventListener('change', function () {
        const gigfileInput = this;
        const addGigFileBtn = document.querySelector('.addGigFileBtn');
        const zipFileIcon = document.getElementById('zipFileIcon');

        // const filePreview = document.getElementById('gigFilePreview1');
        const gigiTag = addGigFileBtn.querySelector('i');

        if (gigfileInput.files && gigfileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                // const filePreview = document.createElement('img');
                // filePreview.src = e.target.result;
                // filePreview.alt = 'Selected Image';
                // filePreview.style.maxWidth = '100%';

                // Empty the addGigFileBtn div
                if (gigiTag) {
                    addGigFileBtn.removeChild(gigiTag);

                    zipFileIcon.style.display = 'block';
                }

                // addGigFileBtn.appendChild(filePreview); // Append the image element
            };

            reader.readAsDataURL(gigfileInput.files[0]);
        }
    });

    document.addEventListener('DOMContentLoaded', function () {

        const gig_type = document.getElementById("gig_type");

        gig_type.addEventListener('change', function () {
            const gig_type_value = this.value;

            if (gig_type_value == 2) {

                $('#gigFileInput1').prop('required', true);
                document.getElementById("gig_type_content").style.display = 'flex';



            } else {
                $('#gigFileInput1').prop('required', false);

                document.getElementById("gig_type_content").style.display = 'none';

            }
        });

    });



    document.getElementById('professional_gig_create').addEventListener('submit', function (e) {
        showLoader();
        if (!validateFiles()) {
            e.preventDefault();
            hideLoader();

            return;
        }
        e.preventDefault();

        console.log("professional_gig_create");

        // Perform manual validation
        var gigTechnologies = document.getElementById('input_gig_technologies');
        if (!gigTechnologies || gigTechnologies.selectedOptions.length === 0) {
            // Show an error if no technologies are selected
            // alert('Please select at least one technology.');
            toastr.error('Please select at least one technology.', 'error');
            gigTechnologies.focus();
            return;
        }

        const gigFormData = new FormData(this);

        const gigXhr = new XMLHttpRequest();

        gigXhr.open('POST', site_url + '/api2/public/index.php/gig_create');

        gigXhr.onload = function () {
            const responseGigXhr = JSON.parse(gigXhr.responseText);
            console.log("gigXhr.responseText ", gigXhr.responseText);

            if (gigXhr.status === 200) {
                hideLoader();
                var dataGigXhr = responseGigXhr.msg;
                console.log("professional_gig_create success");
                toastr.success(dataGigXhr, 'success');
                document.getElementById('professional_gig_create').remove();
                document.getElementById('create_gig_heading').remove();
                document.getElementById('success_msg_gif').style.display = 'block';
                // Scroll to the top of the page
                window.scrollTo({ top: 0, behavior: 'smooth' });

                // location.reload();
            } else {
                hideLoader();
                const responseGigXhrError = JSON.parse(gigXhr.responseText);
                console.log(responseGigXhrError);
                dataGigXhrError = responseGigXhrError.msg;
                toastr.error(dataGigXhrError, 'Error');

            }
        };

        gigXhr.send(gigFormData);

    });


</script>


<?php include "./footer.php" ?>