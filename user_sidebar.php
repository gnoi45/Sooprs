<?php
$currentUrl = $_SERVER['REQUEST_URI'];
$lastPart = basename($currentUrl);

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

<div class="card flex-fill">

    <div class="h-100" style="background: white;padding: 20px 30px;">
        <div class="text-center mb-3">
            <p class="fs-5 fw-bold">
                <?php echo $username['name'] ?>
            </p>

        </div>
        <div class="d-flex justify-content-center align-items-center">

            <?php
            if ($username['image'] == "") {
                ?>
                <div class="default-user-pic" id="user-picture">
                    <i class="fa-sharp fa-solid fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                </div>
                <?php
            } else {
                ?>
                <div class="user-picture" id="user-picture">
                    <i class="fa-sharp fa-solid fa-pen-to-square" data-bs-toggle="modal" data-bs-target="#exampleModal"></i>
                </div>

                <?php
            }
            ?>


        </div>
        <!-- <button class="btn btn-sm btn-primary mt-3" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Upload New Photo</button> -->



        <p class="text-secondary mt-3" style="font-size: 10px;">
            Maximum upload size is <strong> 2 Mb <i class="fa fa-solid fa-circle-info"
                    title="For better view angle, upload square shaped picture."></i>
            </strong></p>

        <p style="font-size:18px text-align:center; font-weight:bold;" id="sidebar_credits">Credits:
            <?php echo $username['wallet']; ?></p>

        <?php if ($username['is_buyer'] == 0) { ?>


            <a href="<?php echo $SITE_URL ?>/professional/<?php echo $username['slug']; ?>" target="_blank"
                style="font-size:12px;color:blue;">View Profile</a>

        <?php } ?>
        <div class="all-settings-headings">


            <div class="settings-heading">
                <h5><i class="fa-solid fa-user pe-2"></i>Profile Settings</h5>
                <div class="sub-settings">
                    <ul class="ps-0">
                        <li><a class="<?php echo $lastPart == 'professional-settings' ? 'active-setting' : '' ?>"
                                href="professional-settings">Manage Details</a></li>

                        <li><a class="<?php echo $lastPart == 'professional-password-setting' ? 'active-setting' : '' ?>"
                                href="professional-password-setting">Manage Password</a></li>

                    </ul>
                </div>


            </div>

            <div class="settings-heading">
                <h5><i class="fa-solid fa-wallet pe-2"></i>Wallet</h5>
                <div class="sub-settings">
                    <ul class="ps-0">
                        <li>


                            <a class="<?php echo $lastPart == 'user-wallet' ? 'active-setting' : '' ?>"
                                href="user-wallet">Add Credits</a>
                        </li>


                    </ul>
                </div>


            </div>

            <div class="settings-heading">
                <h5><i class="fa-solid fa-wallet pe-2"></i>Bank Details</h5>
                <div class="sub-settings">
                    <ul class="ps-0">
                        <li>
                            <a class="<?php echo $lastPart == 'bank-details' ? 'active-setting' : '' ?>"
                                href="bank-details">Add Bank Details</a>
                        </li>
                    </ul>
                </div>
            </div>



            <?php if ($username['is_buyer'] == 0) { ?>

                <div class="settings-heading">
                    <h5><i class="fa-sharp fa-solid fa-briefcase pe-2"></i>Portfolio</h5>
                    <div class="sub-settings">
                        <ul class="ps-0">
                            <li><a class="<?php echo $lastPart == 'manage-portfolio' ? 'active-setting' : '' ?>"
                                    href="manage-portfolio">Manage Portfolio</a></li>
                            <li><a class="<?php echo $lastPart == 'user-skills' ? 'active-setting' : '' ?>"
                                    href="user-skills">Skills</a></li>
                            <li><a class="<?php echo $lastPart == 'user-exp' ? 'active-setting' : '' ?>"
                                    href="user-exp">Experience</a></li>


                        </ul>
                    </div>


                </div>
                <div class="settings-heading">
                    <h5><i class="fa-solid fa-sliders pe-2"></i>Lead Settings</h5>
                    <div class="sub-settings">
                        <ul class="ps-0">
                            <li><a class="<?php echo $lastPart == 'professional-lead-services' ? 'active-setting' : '' ?>"
                                    href="professional-lead-services">Manage Services</a> </li>
                            <!-- <li><a href="#">Manage Locations</a> </li> -->
                        </ul>
                    </div>

                </div>
                <!-- <div class="settings-heading">
                            <h5><i class="fa-solid fa-coins pe-2"></i>Wallet & Payment</h5>
                            <div class="sub-settings">
                                <ul class="ps-0">
                                    <li>Super Coins</li>
                                    <li>Payments</li>
                                </ul>
                            </div>

                        </div> -->

                <div class="settings-heading">
                    <h5><i class="fa-solid fa-file pe-2"></i>Resume</h5>
                    <div class="sub-settings">
                        <ul class="ps-0">
                            <li><a class="<?php echo $lastPart == 'user-resume' ? 'active-setting' : '' ?>"
                                    href="user-resume">Resume</a></li>

                            <li><a class="<?php echo $lastPart == 'user-academics' ? 'active-setting' : '' ?>"
                                    href="user-academics">Academics</a></li>



                        </ul>
                    </div>


                </div>

            <?php } ?>
            <!-- <div class="settings-heading">
                            <h5><i class="fa-solid fa-user pe-2"></i>Switch Account</h5>
                            <div class="sub-settings">
                            <ul class="ps-0">
                                <li>
                                     
                                    
                                    <a class= "<?php echo $lastPart == 'user-wallet' ? 'active-setting' : '' ?>" href="user-wallet" style="color:blue;" data-bs-toggle="modal" data-bs-target="#staticBackdropIs_buyer"><i class="fa-solid fa-toggle-on" style="font-size:20px;"></i></a></li>


                                </ul>
                            </div>


                        </div> -->
        </div>
    </div>

</div>

<!-- switch account modal  -->
<div class="modal fade" id="staticBackdropIs_buyer" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header p-2">
                <p class="" style="font-size:25px;"><i
                        class="fa-solid fa-circle-exclamation me-2  text-danger"></i>Alert</p>
                <button type="button" class="btn-close modal_close_btn" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body p-5">

                <!-- <p class=" text-center" style="font-size:20px;"><b>You are not a professional.</b> </p> -->
                <p class=" text-secondary text-center"> Want to switch your account?</p>

                <div class="text-center mt-3"><a href="#" class="sooprs-btn" id="switch_acc_btn">Switch Now</a></div>
            </div>

        </div>
    </div>
</div>