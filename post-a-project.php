<?php
session_start();
include_once "function.php";
include_once 'env.php';

$userCredentials = new DB_con();
$username = '';
// $username = null;
if (isset($_SESSION['id'])) {
    $username = $userCredentials->getUser($_SESSION['id'], 'join_professionals');
    setcookie('user_logged_in', true, 0, "/");
} else {
    // Delete the cookie if session id is not set
    setcookie('user_logged_in', false, time() - 3600, "/");
}

// Country code and country name 
// Get the user's IP address
$userIP = $_SERVER['REMOTE_ADDR'];
// Output the user's IP address
// $ip = '52.25.109.230';
// echo "User's IP Address: " . $ip;
// Use JSON encoded string and converts 
// it into a PHP variable 
$ipdat = @json_decode(
    file_get_contents(
        "http://www.geoplugin.net/json.gp?ip=" . $ip
    )
);

$userCountryCode = $ipdat->geoplugin_countryCode;
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













$title = 'Customer Login ';
$description = "Description";
$keywords = "key,words";
?>

<?php include "./header2.php" ?>

<style>
    #signUpForm {
        width: -webkit-fill-available;
        background-color: #ffffff;
        margin: 40px auto;
        padding: 20px;
        /* box-shadow: 0px 6px 18px rgb(0 0 0 / 9%); */
        border-radius: 12px;
        /* display: none; */
    }

    #signUpForm .form-header {
        gap: 5px;
        text-align: center;
        font-size: .9em;
    }

    #signUpForm .form-header .stepIndicator {
        position: relative;
        flex: 1;
        padding-bottom: 30px;
    }

    #signUpForm .form-header .stepIndicator.active {
        font-weight: 600;
    }

    #signUpForm .form-header .stepIndicator.finish {
        font-weight: 600;
        color: #0068ff;
    }

    #signUpForm .form-header .stepIndicator::before {
        content: "";
        position: absolute;
        left: 50%;
        bottom: 0;
        transform: translateX(-50%);
        z-index: 9;
        width: 20px;
        height: 20px;
        background-color: #cad2e7;
        border-radius: 50%;
        border: 3px solid #ecf5f4;
    }

    #signUpForm .form-header .stepIndicator.active::before {
        background-color: #0068ffad;
        border: 3px solid #d5f9f6;
    }

    #signUpForm .form-header .stepIndicator.finish::before {
        background-color: #0068ff;
        border: 3px solid #b7e1dd;
    }

    #signUpForm .form-header .stepIndicator::after {
        content: "";
        position: absolute;
        left: 54%;
        bottom: 8px;
        width: 100%;
        height: 3px;
        background-color: #f3f3f3;
    }

    #signUpForm .form-header .stepIndicator.active::after {
        background-color: #0068ffad;
    }

    #signUpForm .form-header .stepIndicator.finish::after {
        background-color: #0068ff;
    }

    #signUpForm .form-header .stepIndicator:last-child:after {
        display: none;
    }

    #signUpForm .form-check-input {
        /* padding: 15px 20px;
    width: 100%;
    font-size: 1em;
    border: 1px solid #e3e3e3;
    border-radius: 5px; */

        font-size: 1.2em;
        border: 1px solid #8f8f8f;
        margin-right: 16px;
        width: 20px;
        height: 18px;
    }

    #signUpForm input:focus {
        border: 1px solid #0068ff;
        outline: 0;
    }

    #signUpForm input.invalid {
        border: 1px solid #ffaba5;
    }

    #signUpForm .step {
        /* display: none; */
        padding: 8px;
        height: auto;
    }


    #signUpForm .step p {
        /* padding-left: 14px; */
    }

    #signUpForm .form-footer {
        overflow: auto;
        gap: 20px;

    }

    #signUpForm .form-footer button {
        background-color: #0068ff;
        border: 1px solid #0068ff !important;
        color: #ffffff;
        border: none;
        padding: 10px 30px;
        font-size: 1em;
        cursor: pointer;
        border-radius: 5px;
        flex: 1;
        margin-top: 5px;
    }

    #signUpForm .form-footer button:hover {
        opacity: 0.8;
    }

    #signUpForm .form-footer #prevBtn {
        background-color: #fff;
        color: #0068ff;
        float: left;

    }

    #signUpForm .form-footer #nextBtn {
        background-color: #0068ff;
        color: #ffffff;
        float: right;
    }


    .step1-heading {
        font-size: 3rem;
        font-weight: 700;
    }

    .post-project-ul li {
        list-style-type: none;
        padding: 10px 0;
        font-size: 17px;
    }

    .post-project-ul li i {
        color: #0068ff;
        margin-right: 10px;
    }

    label {
        color: #000000 !important;
        /* color: #0d6efd; */
        font-size: 14px;
        font-weight: 400 !important;
    }


    .options-box .col-md-4 {
        /* border: 1px solid #e0e0e0; */
        padding: 15px;
        display: flex;
        border-radius: 5px;
        width: 240px;
        margin-bottom: 5px;
    }

    .options-box-inactive {
        border: 1px solid #e0e0e0;

    }

    .options-box .col-md-4 label {
        display: inline-block;
        width: -webkit-fill-available;
        margin-left: 10px;
    }


    .active_radio {
        border: 1px solid #0068ff;
        background: #0068ff14;
    }


    .main-container {
        padding: 40px;
    }



    /* Define keyframes for fade-in and fade-out animations */
    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeOut {
        from {
            opacity: 1;
        }

        to {
            opacity: 0;
        }
    }

    /* Apply fade-in animation */
    .fade-in {
        animation: fadeIn 0.5s forwards;
    }

    /* Apply fade-out animation */
    .fade-out {
        animation: fadeOut 0.5s forwards;
    }





    /* skeleton loading  */
    /* Skeleton Loading Styles */
    .skeleton-wrapper {
        display: flex;
        flex-direction: column;
        padding: 16px;
        background: #f0f0f0;
        border-radius: 8px;
        margin: 15px 0;
        height: 150px;
        justify-content: center;
    }

    .skeleton-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }

    .skeleton-step-indicator {
        width: 35%;
        height: 20px;
        background: #e0e0e0;
        border-radius: 4px;
        position: relative;
        overflow: hidden;
    }

    .skeleton-content {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .skeleton-text-line {
        height: 20px;
        background: #e0e0e0;
        border-radius: 4px;
        position: relative;
        overflow: hidden;
    }

    .skeleton-text-line.short {
        width: 60%;
    }

    .skeleton-radio-group {
        display: flex;
        justify-content: space-evenly;
    }

    .skeleton-radio {
        width: 20%;
        height: 40px;
        background: #e0e0e0;
        border-radius: 4px;
        position: relative;
        overflow: hidden;
    }

    /* Shimmer Effect */
    .skeleton-step-indicator::before,
    .skeleton-text-line::before,
    .skeleton-radio::before {
        content: "";
        display: block;
        position: absolute;
        top: 0;
        left: -100%;
        height: 100%;
        width: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.6), transparent);
        animation: shimmer 1.5s infinite;
    }

    @keyframes shimmer {
        0% {
            left: -100%;
        }

        50% {
            left: 100%;
        }

        100% {
            left: 100%;
        }
    }



    /* media query  */
    .image-container {
        position: relative;

    }

    @media (max-width: 768px) {
        .image-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* opacity: 0.5;  */

        }

        .main-container {
            background-color: white;
            margin-top: 15vh;
            border-radius: 20px 20px 0 0;
            padding: 10px;
        }

        .step1-heading {
            font-size: 2rem;
        }

        #mobileStepIndicator {
            display: block;
            padding: 15px;
            float: right;
        }
    }


    #customInput {
        display: none;
        margin-top: 10px;
    }

    #skeletonLoading {
        display: none;

    }

    #skeletonLoading2 {
        display: none;

    }

    #skeletonLoading3 {
        display: none;

    }

    #step_one {
        display: none;

    }

    #step_two {
        display: none;

    }

    #step_three {
        display: none;

    }

    #first_step_empty {
        display: none;

    }

    #step_three label {
        margin-bottom: 10px;
    }

    #step_three input {
        margin-bottom: 20px;
    }

    #reset-button {
        cursor: pointer;
    }

    #loader2 {
        display: none;
    }

    .select2-container {
        width: 300px !important;
    }
</style>

<div class="container-fluid">

    <div class="row">
        <div class="col-md-8">
            <!-- MultiStep Form -->
            <!-- <div class="row"> -->
            <div class="h-100 d-flex justify-content-center align-items-center">
                <div style="width: -webkit-fill-available;">
                    <div class=" main-container">
                        <h1 class="step1-heading">Let us know what<span class="text-primary"> <br> you need</span></h1>
                        <p class="font-lg color-text-paragraph-2 wow animate__ animate__fadeInUp animated">Let's create
                            the perfect brief together. The more details you include, the better</p>
                        <!-- Skeleton Loading Elements -->
                        <div id="skeletonLoading" class="skeleton-wrapper">
                            <div class="skeleton-header">
                                <div class="skeleton-step-indicator"></div>
                                <!-- <div class="skeleton-step-indicator"></div>
                                <div class="skeleton-step-indicator"></div>
                                <div class="skeleton-step-indicator"></div>
                                <div class="skeleton-step-indicator"></div> -->
                            </div>
                            <!-- <div class="skeleton-content">
                                <div class="skeleton-text-line"></div>
                               
                                <div class="skeleton-radio-group">
                                    <div class="skeleton-radio"></div>
                                    <div class="skeleton-radio"></div>
                                    <div class="skeleton-radio"></div>
                                </div>
                            </div> -->
                        </div>

                        <div id="mobileStepIndicator" class="d-md-none text-center "></div>
                        <form id="project_title_form">

                            <!-- step one project title -->
                            <div class="step" id="step_one">
                                <p class="mb-4 fw-medium text-end">1 of 3</p>
                                <div class="first_box mb-3">
                                    <div class="mb-3 row">
                                        <div class="col-md-3" style="align-self: center;">
                                            <p for="services_category" class="fw-bold mb-0"> Select category</p>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-select js-select2-multi " name="category"
                                                id="services_category" required>
                                                <!-- Dynamic services from api  -->
                                            </select>
                                        </div>
                                    </div>

                                    <textarea class="form-control" name="project_title" id="first_box" rows="4"
                                        placeholder="Write your requirement here. Eg. I need a food delivery Mobile App  ..."></textarea>
                                    <p id="first_step_empty" class="text-danger" style="font-size:13px;">This field is
                                        required.</p>
                                </div>
                                <button class="btn btn-primary btn-sm ps-3 pe-3" id="step1-btn">Next</button>
                                <!-- <p class="text-danger fw-bold mt-4 mb-4 reset-button" id="reset-button">Reset</p> -->

                            </div>


                            <!-- Skeleton Loading Elements -->
                            <div id="skeletonLoading2" class="skeleton-wrapper">
                                <div class="skeleton-header">
                                    <div class="skeleton-step-indicator"></div>
                                    <div class="skeleton-step-indicator"></div>
                                    <div class="skeleton-step-indicator"></div>
                                    <div class="skeleton-step-indicator"></div>
                                    <div class="skeleton-step-indicator"></div>
                                </div>
                                <div class="skeleton-content">
                                    <div class="skeleton-text-line"></div>
                                    <!-- <div class="skeleton-text-line short"></div> -->
                                    <div class="skeleton-radio-group">
                                        <div class="skeleton-radio"></div>
                                        <div class="skeleton-radio"></div>
                                        <div class="skeleton-radio"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- step two budget -->
                            <div class="step" id="step_two">
                                <p class="mb-4 fw-medium text-end">2 of 3</p>
                                <p class="fw-bold mb-4">What is your approx. budget ( in US Dollars)?</p>
                                <div class="options-box mb-3 g-2 p-3 row justify-content-start align-items-center">
                                    <div class=" col-md-4 me-3 radio-btn-box options-box-inactive">
                                        <input class="form-check-input" type="radio" name="budget" id="budget1"
                                            value="1">
                                        <label class="form-check-label" for="budget1">0 - 500</label>
                                    </div>
                                    <div class=" col-md-4 me-3 radio-btn-box options-box-inactive">
                                        <input class="form-check-input" type="radio" name="budget" id="budget2"
                                            value="2">
                                        <label class="form-check-label" for="budget2">500 - 1000</label>
                                    </div>
                                    <div class=" col-md-4 me-3 radio-btn-box options-box-inactive">
                                        <input class="form-check-input" type="radio" name="budget" id="budget3"
                                            value="3">
                                        <label class="form-check-label" for="budget3">1000 - 2000</label>
                                    </div>
                                    <div class=" col-md-4 me-3 radio-btn-box options-box-inactive">
                                        <input class="form-check-input" type="radio" name="budget" id="budget4"
                                            value="4">
                                        <label class="form-check-label" for="budget4">2000 - 3000</label>
                                    </div>
                                    <div class=" col-md-4 me-3 radio-btn-box options-box-inactive"
                                        id="customBudgetOption">
                                        <input class="form-check-input" type="radio" name="budget" value="customBudget"
                                            id="customBudgetOptionradio">
                                        <label class="form-check-label" for="customBudgetOption">Other</label>
                                    </div>

                                    <div class=" col-md-5 me-3 " id="customBudgetInput">
                                        <label for="min_budget_amount">Min. budget</label>
                                        <div class="position-relative">
                                            <input class="form-control ps-4" type="number" id="min_budget_amount"
                                                name="customBudgetValue" value="" required>
                                            <span class="position-absolute" style="top: 5px; left: 7px;    ">$</span>
                                        </div>
                                    </div>
                                    <div class=" col-md-5 me-3  " id="customBudgetInput2">
                                        <label for="max_budget_amount">Max. budget</label>
                                        <div class="position-relative">
                                            <input class="form-control ps-4" type="number" id="max_budget_amount"
                                                name="customBudgetValue2" value="" required>
                                            <span class="position-absolute" style="top: 5px; left: 7px;  ">$</span>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary btn-sm ps-3 pe-3" id="step2-btn">Next</button>
                            </div>

                            <!-- Skeleton Loading Elements -->
                            <div id="skeletonLoading3" class="skeleton-wrapper">
                                <div class="skeleton-header">
                                    <div class="skeleton-step-indicator"></div>
                                    <div class="skeleton-step-indicator"></div>
                                    <div class="skeleton-step-indicator"></div>
                                    <div class="skeleton-step-indicator"></div>
                                    <div class="skeleton-step-indicator"></div>
                                </div>
                                <div class="skeleton-content">
                                    <div class="skeleton-text-line"></div>
                                    <!-- <div class="skeleton-text-line short"></div> -->
                                    <div class="skeleton-radio-group">
                                        <div class="skeleton-radio"></div>
                                        <div class="skeleton-radio"></div>
                                        <div class="skeleton-radio"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- step three description -->
                            <div class="step" id="step_three">
                                <p class="mb-4 fw-medium text-end">3 of 3</p>
                                <p class="mb-4 fw-bold ">Project description</p>

                                <!-- <div id="summary" class="mb-4"></div> -->
                                <div class="mb-3">

                                    <input type="hidden" class="form-control mt-2 mb-4"
                                        placeholder="Enter your email..." id="email" name="email"
                                        value="<?php echo $username == null ? '' : $username['email']; ?>" required
                                        <?php echo $username == null ? '' : 'disabled' ?>>

                                    <label for="summary">Project title</label>
                                    <input type="text" id="final_project_title" class="form-control text-capitalize"
                                        name="final_project_title" placeholder="Enter your project title..." required>

                                    <label for="summary">Project description</label>
                                    <p class="text-success" style="font-size:13px;">Feel free to enhance the description
                                        according to your preferences.</p>
                                    <textarea class="form-control " name="description" rows="15"
                                        id="summary"></textarea>
                                </div>
                                <button class="btn btn-primary btn-sm ps-3 pe-3" id="step3-btn">Submit</button>
                            </div>

                        </form>

                        <p class="text-danger fw-bold mt-4 mb-4 reset-button" id="reset-button">Reset</p>

                        <ul class=" mt-5 post-project-ul d-none d-md-block">
                            <li><i class="fa-solid fa-circle-check"></i> Post projects up to $10 million</li>
                            <li><i class="fa-solid fa-circle-check"></i> Contact skilled freelancers within minutes</li>
                            <li><i class="fa-solid fa-circle-check"></i> Pay only when you are 100% satisfied</li>
                        </ul>


                    </div>
                </div>
            </div>
            <!-- </div> -->
            <!-- /.MultiStep Form -->
        </div>
        <div class="col-md-12 col-lg-4 image-container radio-btn-box">
            <img src="<?php echo $SITE_URL ?>/assets/images/fourhand.png" class="w-100" alt="post-a-project"
                style="    position: sticky; top: 0; height: 100vh;" />
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
    <strong
        style="     color: #0068ff;   position: absolute; top: 65%;    left: 50%;  transform: translate(-50%, -50%);    font-size: 20px;">Please
        wait a moment while we craft your project description....</strong>
</div>
<div class="loader-container" id="loader2">
    <div class="loader">
        <img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1705386434/sooprs-svg_bseaya.svg' style='    position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 110px;'>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<script src="post-project.js"></script>

<script>
    // document.addEventListener('DOMContentLoaded', function () {

    // });

    $(document).ready(function () {

        var customMin = 0;
        var customMax = 0;
        // var budget = 0;
        var projectTitle = '';


        $('#services_category').select2();


        if ($.cookie('project_already_created')) {
            console.log("project_already_created ", $.cookie('project_already_created'));

             customMin = $.cookie('min_budget');
             customMax = $.cookie('max_budget');
            if ($.cookie('title')) {
                $('#final_project_title').val($.cookie('title'));
            }
            if ($.cookie('description')) {
                $('#summary').val($.cookie('description'));
            }

            $('#step_one').css('display', 'none');
            $('#step_three').show();


        } else {
            // first step 
            $('#skeletonLoading').show();
            setTimeout(function () {
                $('#skeletonLoading').hide();
                $('#step_one').show();
            }, 1000);
        }

        // $.cookie('title', '');
        // $.cookie('min_budget','');
        // $.cookie('max_budget','');
        // $.cookie('description','');
        // $.cookie('redirectAfterLoginOnPostSteps2', '');




        // reset button 
        $('.reset-button').click(function () {
            $.cookie('project_already_created', '');
            $.cookie('title', '');
            $.cookie('user_title', '');
            $.cookie('services_category', '');
            $.cookie('category', '');
            $.cookie('min_budget', '');
            $.cookie('max_budget', '');
            $.cookie('description', '');
            $.cookie('redirectAfterLoginOnPostSteps2', '');

            var redirect_url = site_url + "/post-a-project";
            window.location.href = redirect_url;
        });

        // custom budget options 
        $('#customBudgetOption').click(function () {
            // Check the radio button inside the clicked box
            // const radio = this.querySelector('input[type="radio"]');
            // if (radio) {
            // radio.checked = true;
            // }        
            const radio = $(this).find('input[type="radio"]');
            if (radio.length) {
                radio.prop('checked', true)
            }

            $('#customBudgetInput').toggle();
            $('#customBudgetInput2').toggle();

        });

        // second step 
        $('#step1-btn').click(function (event) {

            event.preventDefault();
            $.cookie('user_title', $('#first_box').val());
            if ($('#first_box').val() == '') {
                $('#first_step_empty').show();
            } else {
                $('#first_step_empty').hide();
                $('#skeletonLoading2').show();
                setTimeout(function () {
                    $('#skeletonLoading2').hide();
                    $('#step_two').show();
                }, 2000);
            }
        });



        // Hide custom budget inputs initially
        $('#customBudgetInput, #customBudgetInput2').hide();

        // Show custom budget inputs if "Others" is selected
        $('input[name="budget"]').change(function () {
            if ($(this).val() === 'customBudget') {
                $('#customBudgetInput, #customBudgetInput2').show();
            } else {
                $('#customBudgetInput, #customBudgetInput2').hide();
            }
        });

        

        // proejct title form 
        $('#step2-btn').click(function (event) {

            event.preventDefault();
            showLoader();
            $('#skeletonLoading3').show();


            // budget = $('input[name="budget"]:checked').val();
            if ($('input[name="budget"]:checked').val() === 'customBudget') {
                customMin = parseInt($('#min_budget_amount').val(), 10);
                customMax = parseInt($('#max_budget_amount').val(), 10);
            } else {
                // console.log('budget step 2 btn pressed in else', budget);
                if ($('input[name="budget"]:checked').val() == 1) {
                    customMin = 0;
                    customMax = 500;
                } else if ($('input[name="budget"]:checked').val() == 2) {
                    customMin = 500;
                    customMax = 1000;
                } else if ($('input[name="budget"]:checked').val() == 3) {
                    customMin = 1000;
                    customMax = 2000;
                } else if ($('input[name="budget"]:checked').val() == 4) {
                    customMin = 2000;
                    customMax = 3000;
                }
            }
            // Get the value of the textarea
            projectTitle = $('#first_box').val();
            console.log("budget tep 2 btn pressed after else", customMin, customMax);
            var min_budget_amount = customMin;
            var max_budget_amount = customMax;

            // localStorage.setItem('project_title', projectTitle);
            // var title_formdata = new FormData();
            // title_formdata.append('project_title', projectTitle);
            // title_formdata.append('budget', budget);
            // title_formdata.append('min_budget_amount', customMin);
            // title_formdata.append('max_budget_amount', customMax);
            // AJAX request
            $.ajax({
                url: site_url + "/post-project-description.php", // Replace with your server URL
                type: 'POST',
                // processData: false, // important to prevent jQuery from transforming data into a query string
                // contentType: false, // important for letting jQuery not to set contentType
                data: {
                    'keywords': projectTitle,
                    'min_budget_amount': min_budget_amount,
                    'max_budget_amount': max_budget_amount,

                },
                success: function (response) {
                    // var parsedResponse = JSON.parse(response);
                    // Handle success
                    // console.log('Success:', response);
                    // $('#final_project_title').html(response);
                    $('#summary').html(response);
                    $('#skeletonLoading3').hide();
                    $('#step_three').show();
                    $("#final_project_title").val($.cookie('user_title'));
                    hideLoader();
                    // Here you can add code to proceed to the next step or handle the response
                },
                error: function (error) {
                    // Handle error
                    console.log('Error:', error);
                }
            });
        });



        // save the project 

        $('#step3-btn').click(function (event) {

            console.log("budget in step 3 ",customMax  +"-"+  customMin );

            // when visited the page again after login, customMin and customMax resets to 0 **********************
            event.preventDefault();

            $('#loader2').show();
            var user_logged_in_cookie = $.cookie('user_logged_in');

            if($.cookie('project_already_created') != 1){

                $.cookie('min_budget', customMin);
                $.cookie('max_budget', customMax);
            }

            if (user_logged_in_cookie == 1) {
                console.log("logged in");
                console.log("budget in logged in ",customMax  +"-"+  customMin );

                var form = new FormData();
                form.append('email', $('#email').val());
                form.append('category', $('#services_category').val());
                form.append('project_title', $('#final_project_title').val());
                form.append('description', $('#summary').val());
                form.append('max_budget_amount', customMax);
                form.append('min_budget_amount', customMin);

                $.ajax({

                    url: site_url + "/api2/public/index.php/save_post_project", // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: form, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData: false,        // To send DOMDocument or non processed data file it is set to false
                    success: function (data)   // A function to be called if request succeeds
                    {
                        var new_data = JSON.parse(data);
                        // console.log(data);

                        if (new_data.status == 200) {

                            // if (new_data.status_code == 3) {
                            //     localStorage.setItem('user_email', new_data.msg);
                            //     window.location.href = 'verify_otp';
                            // }
                            // else if (new_data.status_code == 6) {
                            //already logged in
                            window.location.href = 'my-queries';
                            // }

                            // $('#error_message').text('Project details submitted successfully!');
                            // $('.toast').toast('show');
                            // $('#postProjectForm').trigger('reset');

                        }

                        else {

                            return false;
                        }
                    }
                });



            } else {
                console.log("not logged in");
                console.log("budget in not logged in ",customMax  +"-"+  customMin );
                $.cookie('project_already_created', 1);
                $.cookie('title', $('#final_project_title').val());
                $.cookie('category', $('#services_category').val());
                // $.cookie('min_budget', customMin);
                // $.cookie('max_budget', customMax,);
                $.cookie('description', $('#summary').val());

                $.cookie('redirectAfterLoginOnPostSteps2', site_url + "/post-a-project");
                var login_url = site_url + "/login-professional";
                window.location.href = login_url;
            }
            // $('#skeletonLoading3').show();

            // var customMin = 0;
            // var customMax = 0;
            // var budget = $('input[name="budget"]:checked').val();
            // if (budget === 'customBudget') {
            //     customMin = $('#min_budget_amount').val();
            //     customMax = $('#max_budget_amount').val();
            // } else {
            //     console.log('budget ', budget);
            //     if (budget == 1) {
            //         customMin = 0;
            //         customMax = 500;
            //     } else if (budget == 2) {
            //         customMin = 500;
            //         customMax = 1000;
            //     } else if (budget == 3) {
            //         customMin = 1000;
            //         customMax = 2000;
            //     } else if (budget == 4) {
            //         customMin = 2000;
            //         customMax = 3000;
            //     }
            // }
            // // Get the value of the textarea
            // var projectTitle = $('#first_box').val();
            // console.log("budget ", customMin, customMax);
            // var min_budget_amount = customMin;
            // var max_budget_amount = customMax;


            // $.ajax({
            //     url: site_url + "/post-project-description.php", // Replace with your server URL
            //     type: 'POST',
            //     // processData: false, // important to prevent jQuery from transforming data into a query string
            //     // contentType: false, // important for letting jQuery not to set contentType
            //     data: {
            //         'keywords': projectTitle,
            //         'min_budget_amount': min_budget_amount,
            //         'max_budget_amount': max_budget_amount,

            //     },
            //     success: function (response) {
            //         // var parsedResponse = JSON.parse(response);
            //         // Handle success
            //         console.log('Success:', response);
            //         // $('#final_project_title').html(response);
            //         $('#summary').html(response);
            //         $('#skeletonLoading3').hide();
            //         $('#step_three').show();
            //         // Here you can add code to proceed to the next step or handle the response
            //     },
            //     error: function (error) {
            //         // Handle error
            //         console.log('Error:', error);
            //     }
            // });
        });

    });





</script>


<?php include "./footer.php" ?>