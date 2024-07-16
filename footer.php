<?php include 'env.php'; 

?>
<footer class="bg-primary py-2">
    <div class="container">
        <div class="row pt-5 align-items-center justify-content-center ">
            <div class="col-md-3 mt-5 ">
                <a href="<?php echo $SITE_URL ?>">
                    <img src="https://sooprs.com/assets/images/sooprs_white_logo.webp"
                        width="100" alt="logo"></a>
                <h6 class="text-white  fw-normal"></h6>
                <!-- <p>
                    WeWork , Vi-John Tower 393, Phase III, Udyog Vihar, Gurugram, Haryana 122016
                </p> -->
                <br />
                <!--<li><i class="fa-solid fa-phone p-1 pb-3"></i>&nbsp; (+91) 95-23-55-84-83</li>-->
                <li><i class="fa-solid fa-envelope p-1"></i>&nbsp; <a class="text-white " href="mailto:contact@sooprs.com">contact@sooprs.com</a> </li>
                <a href="https://www.instagram.com/sooprsofficial/" target="_blank"><span
                        class="dot m-2 mt-3 pb-3 mb-3"><i class="fa-brands fa-instagram mt-1"></i></span></a>
                                <a href="https://www.facebook.com/sooprs" target="_blank"><span class="dot m-2 mt-3 pb-3 mb-3"><i
                            class="fa fa-brands fa-facebook mt-1"></i></span></a>
                <a href="https://www.youtube.com/channel/UCIRnMCgDcVLHW2n3Chd_INw" target="_blank"><span
                        class="dot m-2 mt-3 pb-3 mb-3"><i class="fa-brands fa-youtube mt-1"></i></span></a>
            </div>



            <div class="col-md-3 mt-4">
                <h2 class="footer-heading">Useful Links</h2>
                <ul class="list-unstyled">
                    <li><a href="<?php echo $SITE_URL ?>/about-us" class="d-block">About Us</a></li>
                    <li><a href="<?php echo $SITE_URL ?>/contact-us" class="d-block">Contact Us</a></li>

                    <!-- <li><a href="#" class="d-block">Investors</a></li>
                    <li><a href="#" class="d-block">StartUp</a></li> -->
                    <li><a href="<?php echo $SITE_URL ?>/blog" class="d-block">Blogs</a></li>
                    <li><a href="<?php echo $SITE_URL ?>/privacy-policy" class="d-block">Privacy Policy</a></li>
                    <li><a href="<?php echo $SITE_URL ?>/terms-and-conditions" class="d-block">Terms of Service</a></li>
                </ul>
            </div>




            <div class="col-md-3 mt-4">
                <h2 class="footer-heading">Latest Tech</h2>
                <ul class="list-unstyled">
                    <li><a href="<?php echo $SITE_URL ?>/professionals/internet-of-things" class="d-block">Internet of Things</a></li>
                    <li><a href="<?php echo $SITE_URL ?>/professionals/artificial-intelligence" class="d-block">Artificial Intelligence</a></li>
                    <li><a href="<?php echo $SITE_URL ?>/professionals/virtual-reality" class="d-block">Virtual Reality</a></li>
                    <li><a href="<?php echo $SITE_URL ?>/professionals/augmented-reality" class="d-block">Augmented Reality</a></li>
                    <li><a href="<?php echo $SITE_URL ?>/professionals/machine-learning" class="d-block">Machine Learning</a></li>
                    <!-- <li><a href="service/chat-bots" class="d-block">Chat BOTS</a></li> -->
                    <!-- <li><a href="#" class="d-block">Hire Professionals</a></li> -->
                </ul>
            </div>



            <div class="col-md-3 mt-4">
                <h2 class="footer-heading">Tech Stack</h2>
                <ul class="list-unstyled">
                    <li><a href="<?php echo $SITE_URL ?>/professionals/web-development" class="d-block">Web development</a></li>
                    <li><a href="<?php echo $SITE_URL ?>/professionals/mobile-app-development" class="d-block">Mobile App development</a></li>
                    <li><a href="<?php echo $SITE_URL ?>/professionals/digital-marketing" class="d-block">Digital Marketing</a></li>
                    <li><a href="<?php echo $SITE_URL ?>/professionals/graphics-designing" class="d-block">Graphics Designing</a></li>
                    <!-- <li><a href="service/game-development" class="d-block">Game Development</a></li> -->
                    <!-- <li><a href="service/uiux-designing" class="d-block">UI/UX Designing</a></li> -->
                    <li><a href="<?php echo $SITE_URL ?>/professionals/application-designing" class="d-block">Application Designing</a></li>

                </ul>
            </div>

        </div>


        <div class="row mt-5  align-items-center justify-content-right ">
            <hr>
            <div class="col-md-4 col-xs-12  col-sm-12  mb-md-0 mb-2 text-center">

                <p class="copyright mb-0 text-white">
                <p class="copyright mb-0 text-white">Made With <i class="fa fa-heart"
                        style="color:#e00015!important"></i>&nbsp;
                    in India for World</p>

            </div>
            <div class="col-md-4 col-xs-12 col-sm-12   p-0 g-0 d-flex align-items-center py-3  justify-content-center ">
                <img src="https://sooprs.com/assets/images/dcmimage.png" alt="dcm-protected"
                    class="img-fluid" height="80px" width="80px">
            </div>
            <div
                class="col-md-4 col-xs-12 col-sm-12   p-0 g-0 d-flex align-items-center py-3   justify-content-center ">
                <p class="copyright mb-0 text-white"> Sooprs.com. © <span id="footerYear"></span>. All Rights Reserved </p>

            </div>
        </div>
    </div>


</footer>
<!-- JavaScript Bundle with Popper -->

<?php

$_SESSION['display'] = "";

if (isset($_SESSION['join_message'])) {

    $_SESSION['display'] = "block";
    // treat the succes case ex:
    echo '<div id="myModal" class="join-modal" style="display:' . $_SESSION['display'] . '">
            <span class="join-close">&times;</span>
            <div class="join-modal-content" >
            <img src="assets/img/sprs_verified.gif" style="    max-width: 100px;" alt="success-gif">
                <p>' . $_SESSION["join_message"] . '</p>
            </div>
          </div>';

    session_destroy();
    echo '<script>
            
            setTimeout(function() {
                var modal = document.getElementById("myModal");
                modal.style.display = "none";
            }, 2000);
          </script>';
}
?>



<div id="loading"></div>





<!-- second model -->

<div class="modal fade" id="email_modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">

            <div class="modal-body pl-5 mt-3" id="email_modal_body">
                <div>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h5 class="modal-title "
                    style="color:#212529;font-size:1.6rem;margin-bottom:20px;line-height: 1.7rem;padding-top: 1em;text-align: center;font-weight: 600;font-family: Poppins,sans-serif;">
                    Please fill your contact details</h5>
                <p id="last-form-error" class="error-p-tag text-danger" style="display:none">Please fill all details</p>

                <p id="last-form-name-error" class="error-p-tag text-danger" style="display:none">Please fill your name
                </p>

                <p id="last-form-email-error" class="error-p-tag text-danger" style="display:none">Please fill valid
                    email</p>
                <p id="last-form-email-len-error" class="error-p-tag text-danger" style="display:none">Email too large
                </p>

                <p id="last-form-mobile-error" class="error-p-tag text-danger" style="display:none">Enter mobile number
                </p>

                <p id="last-form-mobile-len-short-error" class="error-p-tag text-danger" style="display:none">Mobile
                    number too short</p>
                <p id="last-form-mobile-len-big-error" class="error-p-tag text-danger" style="display:none">Mobile
                    number too long</p>





                <div class="row">
                    <div class="col">
                        <div class="card-body">
                            <div class="form-group">
                                <input class="form-control input_text" id="your_name" type="text"
                                    placeholder="Your Name *" required>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input class="form-control input_text" id="email_address" type="text"
                                    placeholder="Email address (optional)">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input class="form-control input_text" id="mobile_no" type="number"
                                    placeholder="Mobile No. *" pattern="\d{10}" required>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input class="form-control input_text" id="city_name" type="text" placeholder="City *"
                                    onkeydown="return /[a-z]/i.test(event.key)"
                                    onblur="if (this.value == '') {this.value = 'Type Letters Only';}"
                                    onfocus="if (this.value == 'Type Letters Only') {this.value = '';}">
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <input class="form-control input_text" id="native_lang" type="text"
                                    placeholder="Your native language (optional)">
                            </div>
                        </div>
                        <!-- <div class="card-body">
                            <div class="form-group">
                                <select class="form-control js-example-basic-single" id="native_lang" name="state" multiple="multiple">
                                    <option value="AL">Alabama</option>

                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                        </div> -->
                    </div>

                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-lg bg-white text-grey" id="back_contact_button" data-wow-delay="0.7s"><small>Back</small></button> -->
                        <button type="button" class="btn btn-sm bg-primary  text-white default text-info"
                            id="submit_contact_details" style="padding: .5rem 1.3rem;" data-wow-delay="0.7s"><small>Post
                                Your
                                Query</small></button>
                    </div>
                </div>
            </div>
            <!--success section-->
            <div class="modal-body pl-5 mt-3" id="success_div" style="display:none">
                <div class="row" style="text-align: center;">
                    <div class="col-md-12">
                        <img src="<?php echo $SITE_URL ?>/assets/img/sprs_verified.gif" alt="success-gif" style="width:150px">
                    </div>
                    <div class="col-md-12">
                        <p style="font-size: 22px;font-weight: 500;">Thanks for your query. Sooprs Expert will
                            respond you shortly!</p>
                    </div>
                </div>
            </div>
            <!--success section end-->

        </div>
    </div>
</div>


<div class="" id="success_div_2" style="display:none">
    <div class="row" style="text-align: center;">
        <div class="col-md-12">
            <img src="<?php echo $SITE_URL ?>/assets/img/sprs_verified.gif" alt="success-gif" style="width:150px">
        </div>
        <div class="col-md-12">
            <p style="font-size: 22px;font-weight: 500;">Thanks for your query. Sooprs Expert will
                respond you shortly!</p>
        </div>
    </div>
</div>



<!-- Question modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">


            <div class="modal-body" id="question_div">

            </div>
            <!--<div class="modal-footer">-->

            <!--</div>-->
        </div>
    </div>
</div>


<!-- toastr alrt  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
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
            "hideMethod": "fadeOut",
            "toastClass": "toast",
            "iconClasses": {
                "success": "toast-success",
                "info": "toast-info",
                "warning": "toast-warning",
                "error": "toast-error"
            }
        }
    </script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="<?php echo $SITE_URL ?>/assets/js/srs_custom.js"></script>
<script src="https://kit.fontawesome.com/5f579897f0.js" crossorigin="anonymous"></script>


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<!-- Index page carousel script -->


    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js" integrity="sha512-9KkIqdfN7ipEW6B6k+Aq20PV31bjODg4AA52W+tYtAE0jE0kMx49bjJ3FgvS56wzmyfMUHbQ4Km2b7l9+Y/+Eg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!--<a href="https://api.whatsapp.com/send?phone=+91-9523558483&amp;text=Hey%20I'm%20interested%20in%20Sooprs%20Services."-->
<!--        class="whatsapp-icon d-flex align-items-center justify-content-center" rel="nofollow" target="_blank"><i-->
<!--            class="fa-brands fa-whatsapp mt-1"-->
<!--            style="color: #ffffff;    font-size: 37px;  margin-left: 2px;margin-right: 0px; margin-bottom: 2px;"></i>-->
<!--        <span></span></a>-->
<!-- AOS animation  -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>

<script>
    $('ul.nav li.dropdown').hover(function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
    }, function () {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
    });
</script>





<script>
   
</script>

<script>
    $(".about-carousel").owlCarousel({
        loop: true,
        margin: 10,
        // nav:true,
        // center: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 2,
            },
        },
    });
</script>

<script>
    $(".contact-carousel").owlCarousel({
        loop: true,
        margin: 10,
        // nav:true,
        // center: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 2,
            },
        },
    });
</script>

<script>
    $(".startup-carousel").owlCarousel({
        loop: true,
        margin: 10,
        // nav:true,
        // center: true,
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 2,
            },
        },
    });
</script>

<script>
    $('#services').on('change', function () {
        var selectedoption = $('#services').val();

        if (selectedoption == 'other') {

            addOtherField =
                '<div class="col-md-12 col-sm-12 mt-3 " id="addOtherField">' +
                '<input class="form-control" type="text" id="other"  name="services" placeholder="Enter Your Service">' +
                '</div>';

            $('#appliedselectdiv').after(addOtherField);
            $('#services').attr('name', '');
        } else {

            $('#addOtherField').remove();
            $('#services').attr('name', 'services');

        }

    });


    $('.testimonial-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
        dots:false,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
</script>

<script>



    // Get the modal
    var jmodal = document.getElementById("myModal")
    // Get the <span> element that closes the modal
    var jspan = document.getElementsByClassName("join-close")[0];

    // When the user clicks on the button, open the modal
    // btn.onclick = function () {
    //     modal.style.display = "block";
    // }

    // When the user clicks on <span> (x), close the modal
    // jspan.onclick = function () {
    //     jmodal.style.display = "none";
    // }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == jmodal) {
            jmodal.style.display = "none";
        }
    }
</script>


<script>
    // select the element to hide
    const $elementToHide = $('.search_div1');

    // add event listener to the document
    $(document).click(function (event) {
        // if the clicked element is not the element to hide or one of its descendants
        if (!$elementToHide.is(event.target) && $elementToHide.has(event.target).length === 0) {
            // hide the element
            $elementToHide.hide();
        }
    });


    // select the element to hide
    const $elementToHide2 = $('.search_div');

    // add event listener to the document
    $(document).click(function (event) {
        // if the clicked element is not the element to hide or one of its descendants
        if (!$elementToHide2.is(event.target) && $elementToHide2.has(event.target).length === 0) {
            // hide the element
            $elementToHide2.hide();
        }
    });





</script>

<script>
    // In your Javascript (external .js resource or <script> tag)
    $(document).ready(function () {

        $('.js-example-basic-single').select2();






    });
</script>
<script>
  (function (w, d, s, o, f, js, fjs) {
    w["botsonic_widget"] = o;
    w[o] =
      w[o] ||
      function () {
        (w[o].q = w[o].q || []).push(arguments);
      };
    (js = d.createElement(s)), (fjs = d.getElementsByTagName(s)[0]);
    js.id = o;
    js.src = f;
    js.async = 1;
    fjs.parentNode.insertBefore(js, fjs);
  })(window, document, "script", "Botsonic", "https://widget.writesonic.com/CDN/botsonic.min.js");
  Botsonic("init", {
    serviceBaseUrl: "https://api.botsonic.ai",
    token: "f5013031-cf8a-4c25-ad9d-1984bb60b588",
  });
</script>
<!--Start of Tawk.to Script-->
<!-- // <script type="text/javascript">
// var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
// (function(){
// var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
// s1.async=true;
// s1.src='https://embed.tawk.to/6655822c981b6c56477573f2/1huv0904d';
// s1.charset='UTF-8';
// s1.setAttribute('crossorigin','*');
// s0.parentNode.insertBefore(s1,s0);
// })();
// </script> -->
<!--End of Tawk.to Script-->


<script>
        (function () {
            "use strict";

            var carousels = function () {
                $(".owl-carousel1").owlCarousel({
                    loop: true,
                    center: true,
                    margin: 0,
                    responsiveClass: true,
                    nav: false,
                    responsive: {
                        0: {
                            items: 1,
                            nav: false
                        },
                        680: {
                            items: 2,
                            nav: false,
                            loop: false
                        },
                        1000: {
                            items: 3,
                            nav: true
                        }
                    }
                });
            };

            (function ($) {
                carousels();
            })(jQuery);
        })();



    </script>


</body>

</html>