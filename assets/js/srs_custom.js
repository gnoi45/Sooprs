let enq_array = [];
let site_url = "https://sooprs.com";
// showLoader();

function showLoader() {
    let showloaderElement = document.getElementById('loader');
    if(showloaderElement){
        showloaderElement.style.display = 'flex';
    }
}

function showJobsLoader() {
    let showloaderElement = document.getElementById('jobsLoader');
    if(showloaderElement){
        showloaderElement.style.display = 'flex';
    }
}

function hideJobsLoader() {
    let showloaderElement = document.getElementById('jobsLoader');
    if(showloaderElement){
        showloaderElement.style.display = 'none';
    }
}

function hideLoader() {
    let hideloaderElement = document.getElementById('loader');
    if(hideloaderElement){
        hideloaderElement.style.display = 'none';
    }
}

function reloadPage() {
    location.reload();
}


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

// for calender input field 
document.addEventListener("DOMContentLoaded", function() {
    // Get today's date
    var today = new Date();
    // Format the date to YYYY-MM-DD
    var formattedDate = today.toISOString().slice(0, 10);
    // Set the minimum date for the input element to today's date
    if(document.getElementById("date")){

        document.getElementById("date").min = formattedDate;
    }
});


// toggler button class change 
// function toggleClass(toggleButton, class1, class2) {
//     var element = document.getElementById(toggleButton);
//     element.classList.toggle(class1);
//     element.classList.toggle(class2);
// }


// password show hide EYE 
$(".toggle-password").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var input = $($(this).attr("toggle"));
    if (input.attr("type") == "password") {
      input.attr("type", "text");
    } else {
      input.attr("type", "password");
    }
  });


// When question answer modal is closed 

$("#exampleModalCenter").on('hidden.bs.modal', function () {

    // console.log("question answer modal closed");

    // let next_ques_val = $("#next_ques").attr('data-ques');

    // if( next_ques_val !== ''){

    //     $("#question_div").empty();

    // }else{



    // }



    $("#question_div").empty();



});






function updateSelectDropdown(data) {
    var select = $('#select_services'); // Select element
    // Iterate through the response data and create option elements
    data.forEach(function(item) {
        // console.log(item);

        var option = $('<option>', {
            value: item.id,
            text: item.service_name
        });

        select.append(option);
    });
}


// Show all services list on site load
$(window).on('load', function () {
    $("#myText2").focus();

    $.ajax({
        url: site_url+"/api2/public/index.php/sr_services_all", // Url to which the request is send
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
                $("#sprs_error").css('display', 'none');
                $.each(new_data.msg, function (k, v) {
                    $("ul#search_category").append('<li data="' + v.id + '">' + v.service_name + '</li>');
                });

                updateSelectDropdown(new_data.msg);
                // To remove duplicate li
                uniqueLi = {};
                $("#search_category li").each(function () {
                    var thisVal = $(this).text();
                    if (!(thisVal in uniqueLi)) {
                        uniqueLi[thisVal] = "";
                    } else {
                        $(this).remove();
                    }
                })
                $('.search_div').css('display', 'block');
            } else {
                $("#sprs_error").css('display', '-webkit-inline-box');
                // alert("This service is not available right now! We are working on it!");
                return false;
            }
            $("#srs_spinner").hide();
        }
    });
});



// all services in select dropdown 
$(window).on('load', function () {    

    $.ajax({
        url: site_url+"/api2/public/index.php/sr_services_all", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: "",                  // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: false,        // To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {

            var new_data = JSON.parse(data);
            if (new_data.status == 200) {
                let selectedService = localStorage.getItem('service_search');
                $.each(new_data.msg, function (k, v) {

                    let option = $('<option>', {
                        value: v.id,
                        text: v.service_name
                    });
                
                    if (v.service_name === selectedService) {
                        option.attr('selected', 'selected');
                    }
                
                    $("#services_category").append(option);
                });

                updateSelectDropdown(new_data.msg);
                // To remove duplicate li
                uniqueLi = {};
                $("#services_category option").each(function () {
                    var thisVal = $(this).text();
                    if (!(thisVal in uniqueLi)) {
                        uniqueLi[thisVal] = "";
                    } else {
                        $(this).remove();
                    }
                })
               
            } else {
                $("#sprs_error").css('display', '-webkit-inline-box');
                // alert("This service is not available right now! We are working on it!");
                return false;
            }
           
        }
    });
});












// Services search input
$("#myText2").keydown(function () {
    $("#srs_spinner").show();
    $(".search_div").show();
    $("ul#search_category").html('');

    var input_var = $("#myText2").val();
    if (input_var.length > 1) {
        var form = new FormData();
        form.append('term', input_var);
        $.ajax({
            url: site_url+"/api2/public/index.php/sr_services", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: form, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                var new_data = JSON.parse(data);
                // console.log(new_data);
                if (new_data.status == 200) {
                    $("#sprs_error").css('display', 'none');
                    $.each(new_data.msg, function (k, v) {
                        $("ul#search_category").append('<li data="' + v.id + '">' + v.service_name + '</li>');
                    });
                    // To remove duplicate li 
                    uniqueLi = {};
                    $("#search_category li").each(function () {
                        var thisVal = $(this).text();
                        if (!(thisVal in uniqueLi)) {
                            uniqueLi[thisVal] = "";
                        } else {
                            $(this).remove();
                        }
                    })
                }
                else {
                    $("#sprs_error").css('display', '-webkit-inline-box');
                    // alert("This service is not available right now! We are working on it!");
                    return false;
                }
                $("#srs_spinner").hide();
            }
        });
    }

});




// click on the searched service
$("ul#search_category").on('click', 'li', function () {

    //e.preventDefault();

    var get_val = $(this).text();

    var get_id = $(this).attr('data');

    $("#myText2").val(get_val);

    $("#myText2").attr('data', get_id);



    $(".search_div").hide();

});




// Three popular services below input fields
$(".popular-btns").on('click', function () {

    //e.preventDefault();

    var get_val = $(this).text();

    var get_id = $(this).attr('data');

    $("#myText2").val(get_val);

    $("#myText2").attr('data', get_id);



    $("#sprs_error").css('display', 'none');





    // $(".search_div").hide();

});










// Select pincode searched
$("ul#search_pincode").on('click', 'li', function () {

    //e.preventDefault();

    var get_val = $(this).text();

    $("#myText1").val(get_val);

    $(".search_div1").hide();

});





//load pincode on typing 

$("#myText1").keyup(function () {



    $("#srs_spinner1").show();

    $(".search_div1").show();

    $("ul#search_pincode").html('');

    var input_var1 = $("#myText1").val();

    if (input_var1.length > 5) {



        $.ajax({



            url: "https://api.worldpostallocations.com/pincode?postalcode=" + input_var1 + "&countrycode=IN", // Url to which the request is send



            type: "POST",             // Type of request to be send, called as method



            data: '', // Data sent to server, a set of key/value pairs (i.e. form fields and values)



            contentType: false,       // The content type used when sending data to the server.



            cache: false,             // To unable request pages to be cached



            processData: false,        // To send DOMDocument or non processed data file it is set to false



            success: function (data)   // A function to be called if request succeeds



            {









                // console.log(data.result);





                if (data.status === true) {

                    $.each(data.result, function (k, v) {

                        $("ul#search_pincode").append('<li>' + v.postalCode + ', ' + v.postalLocation + '</li>');

                    });









                }



                else {

                    $("ul#search_pincode").append('<li>Pincode not found.Try again</li>');

                    // $(".themeButton").addClass('no-click');

                }







                $("#srs_spinner1").hide();





            }



        });

    }

});











//trigger popup when clicked on search button

$(".themeButton").click(function (e) {
    e.preventDefault();
    

    let serviceSearch = document.getElementById("myText2").value;
    localStorage.setItem('service_search', serviceSearch);
    
    window.location.href = site_url+'/post-a-project';

    // var search_box = $("#myText2").val();

    // // var pin_box = $("#myText1").val();

    // if (search_box == '' ) {
    //     return false;
    // }
    // else {
    //     // $('#exampleModalCenter').modal('show');
    //     var service = $("#myText2").attr('data');
    //     // var pincode = $("#myText1").val();

    //     var form = new FormData();
    //     form.append('service', service);       
    //      // form.append('pincode', pincode);
    //     $.ajax({
    //         url: site_url+"/api2/public/index.php/sr_servicesFirst", // Url to which the request is send
    //         type: "POST",             // Type of request to be send, called as method
    //         data: form, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
    //         contentType: false,       // The content type used when sending data to the server.
    //         cache: false,             // To unable request pages to be cached
    //         processData: false,        // To send DOMDocument or non processed data file it is set to false
    //         success: function (data)   // A function to be called if request succeeds
    //         {

    //             var new_data = JSON.parse(data);
    //             // Showing question and related answers in modal
    //             if (new_data.status == 200) {
    //                 var x = 1;
    //                 //$("#answer_div").html('');

    //                 //$("#sprs_question").text(new_data.msg.question_text);

    //                 // $("#sprs_question").attr('data',new_data.msg.ques_id);

    //                 $("#question_div").append('<div class="ques_section active" data-sec-ques="' + new_data.msg.ques_id + '" id="ques_no_' + new_data.msg.ques_id + '"> <div> <h5 class="modal-title" id="sprs_question" data="' + new_data.msg.ques_id + '">' + new_data.msg.question_text + '</h5> </div><button type="button" class="close_button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> <div class="container"> <div class="row"> <div class="col-12" id="answer_div_' + new_data.msg.ques_id + '"> </div></div></div><div style="100%;height:50px;margin-top:10px;"> <button type="button" class="btn btn-secondary ques_no_' + new_data.msg.ques_id + '" style="float:right;" id="next_ques" data-current-ques="ques_no_' + new_data.msg.ques_id + '" data-answer="" data-ques="">Continue</button> </div></div>');



    //                 $.each(new_data.msg.answers, function (k, v) {

    //                     // console.log(new_data.msg.answers);

    //                     //$("#section_div").append();

    //                     $("#answer_div_" + new_data.msg.ques_id).append(' <div style="position: relative;"> <input type="radio" class="radio-circle" name="box" id="one_' + v.answer_id + '" data-answer="' + v.answer_id + '" data-current-ques="' + new_data.msg.ques_id + '" data-ques="' + v.connected_ques_id + '"> <label for="one_' + v.answer_id + '" class="box first label-boxx"> <div class="course" > <span class="circle" id="one_' + v.answer_id + '"></span> <span class="subject">' + v.answer_text + '</span> </div></label> </div>');

    //                     x++;
    //                 });
    //                 $('#exampleModalCenter').modal('show');
    //             }
    //             else {
    //                 alert("This service is not available right now! We are working on it!");
    //                 return false;
    //             }
    //             $("#srs_spinner").hide();
    //         }
    //     });
    //     // $('#exampleModalCenter').modal('show');
    // }
});


function enquiryHereFunction(){
    var category_id = $("#category_id").data('id');
    // console.log(category_id);
    var form = new FormData();
    form.append('service', category_id);       

      

    $.ajax({
        url: site_url+"/api2/public/index.php/sr_servicesFirst", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: form, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: false,        // To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {

            var new_data = JSON.parse(data);
            // Showing question and related answers in modal
            if (new_data.status == 200) {
                var x = 1;
                //$("#answer_div").html('');

                //$("#sprs_question").text(new_data.msg.question_text);

                // $("#sprs_question").attr('data',new_data.msg.ques_id);

                $("#question_div").append('<div class="ques_section active" data-sec-ques="' + new_data.msg.ques_id + '" id="ques_no_' + new_data.msg.ques_id + '"> <div> <h5 class="modal-title" id="sprs_question" data="' + new_data.msg.ques_id + '">' + new_data.msg.question_text + '</h5> </div><button type="button" class="close_button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> <div class="container"> <div class="row"> <div class="col-12" id="answer_div_' + new_data.msg.ques_id + '"> </div></div></div><div style="100%;height:50px;margin-top:10px;"> <button type="button" class="btn btn-secondary ques_no_' + new_data.msg.ques_id + '" style="float:right;" id="next_ques" data-current-ques="ques_no_' + new_data.msg.ques_id + '" data-answer="" data-ques="">Continue</button> </div></div>');



                $.each(new_data.msg.answers, function (k, v) {

                    // console.log(new_data.msg.answers);

                    //$("#section_div").append();

                    $("#answer_div_" + new_data.msg.ques_id).append(' <div style="position: relative;"> <input type="radio" class="radio-circle" name="box" id="one_' + v.answer_id + '" data-answer="' + v.answer_id + '" data-current-ques="' + new_data.msg.ques_id + '" data-ques="' + v.connected_ques_id + '"> <label for="one_' + v.answer_id + '" class="box first label-boxx"> <div class="course" > <span class="circle" id="one_' + v.answer_id + '"></span> <span class="subject">' + v.answer_text + '</span> </div></label> </div>');

                    x++;
                });
                $('#exampleModalCenter').modal('show');
            }
            else {
                alert("This service is not available right now! We are working on it!");
                return false;
            }
            $("#srs_spinner").hide();
        }
    });

};

//trigger popup when clicked on search button
const buttons = document.querySelectorAll('.enquireHere');
buttons.forEach(button => {

    button.addEventListener('click', enquiryHereFunction);

   
       

});








    $(document).ready(function() {
        // Attach an event listener to the button's click event using jQuery
        $('#sr_services_search').on('click', function() {
            var category_id = $('#services_category').val();     
            // console.log(category_id);
            var form = new FormData();
            form.append('service', category_id);   

            $.ajax({
                url: site_url+"/api2/public/index.php/sr_servicesFirst", // Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: form, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData: false,        // To send DOMDocument or non processed data file it is set to false
                success: function (data)   // A function to be called if request succeeds
                {        
                    var new_data = JSON.parse(data);
                    // Showing question and related answers in modal
                    if (new_data.status == 200) {
                        var x = 1;
                        //$("#answer_div").html('');        
                        //$("#sprs_question").text(new_data.msg.question_text);        
                        // $("#sprs_question").attr('data',new_data.msg.ques_id);     
                        
                        $('#staticBackdrop').modal('hide');
                        $("#question_div").append('<div class="ques_section active" data-sec-ques="' + new_data.msg.ques_id + '" id="ques_no_' + new_data.msg.ques_id + '"> <div> <h5 class="modal-title" id="sprs_question" data="' + new_data.msg.ques_id + '">' + new_data.msg.question_text + '</h5> </div><button type="button" class="close_button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> <div class="container"> <div class="row"> <div class="col-12" id="answer_div_' + new_data.msg.ques_id + '"> </div></div></div><div style="100%;height:50px;margin-top:10px;"> <button type="button" class="btn btn-secondary ques_no_' + new_data.msg.ques_id + '" style="float:right;" id="next_ques" data-current-ques="ques_no_' + new_data.msg.ques_id + '" data-answer="" data-ques="">Continue</button> </div></div>');
        
                        $.each(new_data.msg.answers, function (k, v) {        
                            // console.log(new_data.msg.answers);        
                            //$("#section_div").append();        
                            $("#answer_div_" + new_data.msg.ques_id).append(' <div style="position: relative;"> <input type="radio" class="radio-circle" name="box" id="one_' + v.answer_id + '" data-answer="' + v.answer_id + '" data-current-ques="' + new_data.msg.ques_id + '" data-ques="' + v.connected_ques_id + '"> <label for="one_' + v.answer_id + '" class="box first label-boxx"> <div class="course" > <span class="circle" id="one_' + v.answer_id + '"></span> <span class="subject">' + v.answer_text + '</span> </div></label> </div>');
        
                            x++;
                        });
                        $('#exampleModalCenter').modal('show');
                    }
                    else {
                        alert("This service is not available right now! We are working on it!");
                        return false;
                    }
                    $("#srs_spinner").hide();
                }
            });
        });
    });
    
 
    
       

      


       

    







/* new api for load other question*/

$("body").on('click', '#next_ques', function () {

    var ques_id = $(this).attr('data-ques');
    var back_btn_ques = $(this).attr('data-current-ques');
    if (ques_id == null || ques_id == 'null') {
        //show contact us form
        $('#exampleModalCenter').modal('hide');

        // checking if session is set or not
        var isSessionSet = checkSession();
        if (isSessionSet) {
            submit_contact_details_loggedin();
        } else {
            $('#email_modal').modal('show');
        }

        
        // console.log(enq_array);
    }
    else {
        var form = new FormData();
        form.append('question', ques_id);
        $.ajax({
            url: site_url+"/api2/public/index.php/sr_questions", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: form, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                var new_data = JSON.parse(data);
                // console.log(new_data);
                if (new_data.status == 200) {
                    var x = 1;
                    $("#answer_div").html('');
                    $("#sprs_question").text(new_data.msg.question_text);
                    $("#sprs_question").attr('data', new_data.msg.ques_id);
                    // enq_value['question'].push(new_data.msg.ques_id);
                    //hide all questions
                    $(".ques_section").removeClass('active');
                    //active current question
                    $(".ques_section#ques_no_" + new_data.msg.ques_id).addClass('active');
                    $("#question_div").append('<div class="ques_section active" data-sec-ques="' + new_data.msg.ques_id + '" id="ques_no_' + new_data.msg.ques_id + '"> <div> <h5 class="modal-title" id="sprs_question" data="' + new_data.msg.ques_id + '">' + new_data.msg.question_text + '</h5> </div><button type="button" class="close_button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true" class="close_span">&times;</span> </button> <div class="container"> <div class="row"> <div class="col-12" id="answer_div_' + new_data.msg.ques_id + '"> </div></div></div><div style="100%;height:50px;margin-top:10px;"> <button type="button" class="btn btn-success" style="right: 24rem;float:left" id="back_button" data-back-ques="' + back_btn_ques + '">Back</button> <button type="button" class="btn btn-secondary ques_no_' + new_data.msg.ques_id + '" style="float:right;" id="next_ques" data-answer="" data-current-ques="ques_no_' + new_data.msg.ques_id + '" data-ques="">Continue</button> </div></div>');



                    $.each(new_data.msg.answers, function (k, v) {
                        // console.log(new_data.msg.answers);
                        //$("#section_div").append();
                        $("#answer_div_" + new_data.msg.ques_id).append(' <div style="position: relative;"> <input type="radio" class="radio-circle" name="box" id="one_' + v.answer_id + '" data-current-ques="' + new_data.msg.ques_id + '" data-answer="' + v.answer_id + '" data-ques="' + v.connected_ques_id + '"> <label for="one_' + v.answer_id + '" class="box first label-boxx"> <div class="course" > <span class="circle" id="one_' + v.answer_id + '"></span> <span class="subject">' + v.answer_text + '</span> </div></label> </div>');

                        x++;
                    });
                }
                else {
                    alert("PLease select one option!");
                    return false;
                }
                $("#srs_spinner").hide();
            }
        });
    }
    $('#exampleModalCenter').modal('show');
})









//back question

// $("body").on('click', '#back_button', function () {



//     var ques_id = $(this).attr('data-back-ques');

//     //active only this question id section

//     $(".ques_section").removeClass('active');

//     //active current question

//     $(".ques_section#ques_no_" + ques_id).addClass('active');



//     // 			   if(ques_id === null || ques_id === 'null'){

//     // 			      //show contact us form

//     // 			      $('#exampleModalCenter').modal('hide');

//     // 			      $('#contact_modal').modal('show'); 

//     // 			   }

//     // 			   else {



//     // 			     	var form = new FormData();

//     // 	 		form.append('question', ques_id);



//     // 	 		$.ajax({



//     // url: "https://sooprs.com/api2/public/index.php/sr_questions", // Url to which the request is send



//     // type: "POST",             // Type of request to be send, called as method



//     // data: form, // Data sent to server, a set of key/value pairs (i.e. form fields and values)



//     // contentType: false,       // The content type used when sending data to the server.



//     // cache: false,             // To unable request pages to be cached



//     // processData:false,        // To send DOMDocument or non processed data file it is set to false



//     // success: function(data)   // A function to be called if request succeeds



//     // {







//     //     var new_data = JSON.parse(data);

//     //     console.log(new_data);





//     //         if(new_data.status == 200){

//     //             var x = 1;

//     //             $("#answer_div").html('');

//     //           $("#sprs_question").text(new_data.msg.question_text); 

//     //           $("#sprs_question").attr('data',new_data.msg.ques_id);

//     //           // enq_value['question'].push(new_data.msg.ques_id);

//     //       //hide all questions

//     //           $(".ques_section").removeClass('active');

//     //           //active current question

//     //           $(".ques_section#ques_no_"+new_data.msg.ques_id).addClass('active');

//     //           $("#question_div").append('<div class="ques_section active" data-sec-ques="'+new_data.msg.ques_id+'" id="ques_no_'+new_data.msg.ques_id+'"> <div> <h5 class="modal-title" id="sprs_question" data="'+new_data.msg.ques_id+'">'+new_data.msg.question_text+'</h5> </div><button type="button" class="close_button" data-bs-dismiss="modal" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> <div class="container"> <div class="row"> <div class="col-12" id="answer_div_'+new_data.msg.ques_id+'"> </div></div></div><div style="100%;height:50px;margin-top:10px;"> <button type="button" class="btn btn-success" style="right: 24rem;float:left" id="back_button" data-answer="" data-back-ques="'+back_btn_ques+'">Back</button> <button type="button" class="btn btn-secondary" style="float:right;" id="next_ques" data-answer="" data-current-ques="ques_no_'+new_data.msg.ques_id+'" data-ques="">Continue</button> </div></div>');



//     //     $.each(new_data.msg.answers, function (k, v){

//     //         console.log(new_data.msg.answers);

//     //         //$("#section_div").append();

//     //       $("#answer_div_"+new_data.msg.ques_id).append(' <div > <input type="radio" class="" name="box" id="one_'+x+'" data-answer="'+v.answer_id+'" data-ques="'+v.connected_ques_id+'"> <label for="one_'+x+'" class="box first"> <div class="course"> <span class="circle" id="one_'+x+'"></span> <span class="subject">'+v.answer_text+'</span> </div></label> </div>');

//     //       x++; 

//     //     });



//     //         }



//     //         else {

//     //       alert("This service is not available right now! We are working on it!");

//     //       return false;



//     //         }







//     // $("#srs_spinner").hide();





//     // }



//     // });

//     // }

//     $('#exampleModalCenter').modal('show');

// });





//back question

$("body").on('click', '#back_button', function () {



    let currentElement = $(".ques_section.active");

    let prevElement = $(".ques_section.active").prev();

    currentElement.removeClass('active');

    currentElement.remove();

    prevElement.addClass('active');



});









//submit the contact details

$("#submit_contact_details").click(function () {

    if ($("#email_modal > input").hasClass('input_error')) {
        $("#email_modal > input").removeClass('input_error');
    }

    var name = $("#your_name").val();
    var email = $("#email_address").val();
    var mobile_no = $("#mobile_no").val();
    
    var city_name = $("#city_name").val();
    var native_lang = $("#native_lang").val();
    var enquiry_ques = enq_array;
    
    var category = $("#myText2").attr('data');    
    if(category === '' || category == undefined){
        var category = $("#category_id").data('id');
        if(category === '' || category == undefined){
            var category = $('#select_services').val();

        }
    }
        
   
    // console.log(category); 

    if (name !== "") {
        $("#last-form-name-error").css('display', 'none');
    } else {
        $("#last-form-name-error").css('display', 'block');
    }

    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let max_len = 100;
    if (email.length > max_len) {
        $("#last-form-email-len-error").css('display', 'block');
    } else {
        $("#last-form-email-len-error").css('display', 'none');
    }


    if (email !== "" && emailRegex.test(email)) {
        $("#last-form-email-error").css('display', 'none');
    } else {
        $("#last-form-email-error").css('display', 'block');
    }

    let mobile_regex = /^([+]\d{2})?\d{10}$/;
    let max_mob_len = 10;
    let min_mob_len = 10;


    if (mobile_no !== "" && mobile_regex.test(mobile_no) && mobile_no.length == max_mob_len) {
        $("#last-form-mobile-error").css('display', 'none');
        $("#last-form-mobile-len-short-error").css('display', 'none');
        $("#last-form-mobile-len-big-error").css('display', 'none');

    } else {
        if (mobile_no.length < min_mob_len) {
            $("#last-form-mobile-len-short-error").css('display', 'block');
            $("#last-form-mobile-len-big-error").css('display', 'none');
        } else if (mobile_no.length > max_mob_len) {
            $("#last-form-mobile-len-short-error").css('display', 'none');
            $("#last-form-mobile-len-big-error").css('display', 'block');
        } else {
            $("#last-form-mobile-len-short-error").css('display', 'none');
            $("#last-form-mobile-len-big-error").css('display', 'none');
        }

    }

    if (name == '' || mobile_no == '' || city_name == '') {
        // $("#email_modal_body input").addClass('input_error');
        $("#last-form-error").css('display', 'block');
    }
    else {

        //save the enquiry

        var form = new FormData();

        form.append('name', name);

        form.append('email', email);

        form.append('mobile', mobile_no);        

        form.append('category', category);

        form.append('client_remark', native_lang);

        form.append('client_enquiry', enquiry_ques);

        form.append('city', city_name);

        // console.log();

        $("#srs_spinner").show();


        $.ajax({

            url: site_url+"/api2/public/index.php/save_enquiry", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: form, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
                var new_data = JSON.parse(data);
                // console.log(new_data);

                if (new_data.status == 200) {
                    $("#email_modal_body").hide();
                    $("#success_div").show();
                    $("#question_div").empty();
                    $("#srs_spinner").hide();

                    

                    $.ajax({

                        url: site_url+"/api2/public/index.php/sendSooprsMail", // Url to which the request is send
                        type: "POST",             // Type of request to be send, called as method
                        data: form, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                        contentType: false,       // The content type used when sending data to the server.
                        cache: false,             // To unable request pages to be cached
                        processData: false,        // To send DOMDocument or non processed data file it is set to false
                        success: function (data2)   // A function to be called if request succeeds
                        {
                           // console.log(data2);
                        }

                    });

                    enq_array = [];
                    setTimeout(function () {
                        window.location.reload();
                    }, 4000);

                }

                else {
                    // alert("Some problem occurred! Please try again!");
                    return false;
                }
            }
        });

    }

});


//submit the post a project details

$("#submit_project_details").click(function () {  


    var email = $("#email_address").val();
    var mobile_no = $("#mobile_no").val();
    var countryCode = $("#countryCode").val();
    var country = $("#country").val();


    var category = $("#services_category").val();
    var project_title = $("#title").val();    
    var max_budget_amount = parseFloat($("#max_budget_amount").val());
    var min_budget_amount = parseFloat($("#min_budget_amount").val());
    var description = $("#description").val();
    
    // let mobile_no = mobile__no.replace(/\D/g, '');
    
    if(email == ""){
        $("#last-form-email-empty-error").css('display', 'block');        
    }else{
        $("#last-form-email-empty-error").css('display', 'none');
    }

    if(mobile_no == ""){
        $("#last-form-mobile-error").css('display', 'block');        
    }else{
        $("#last-form-mobile-error").css('display', 'none');
    }

    if(project_title == ""){
        $("#last-form-title-empty-error").css('display', 'block');        
    }else{
        $("#last-form-title-empty-error").css('display', 'none');
    }

    
    if(max_budget_amount == ""){
        $("#last-form-max-empty-error").css('display', 'block');        
    }else{
        $("#last-form-max-empty-error").css('display', 'none');
    }

    
    if(min_budget_amount == ""){
        $("#last-form-min-empty-error").css('display', 'block');        
    }else{
        $("#last-form-min-empty-error").css('display', 'none');
    }
   
    
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    let max_len = 100;
    if (email !== "" && email.length > max_len) {
        $("#last-form-email-len-error").css('display', 'block');
    } else {
        $("#last-form-email-len-error").css('display', 'none');
    }


    if (email !== "" && emailRegex.test(email)) {
        $("#last-form-email-error").css('display', 'none');
    } else {
        $("#last-form-email-error").css('display', 'block');
    }

    let mobile_regex = /^([+]\d{2})?\d{10}$/;
    let max_mob_len = 10;
    let min_mob_len = 10;

    // mobile_no !== "" && mobile_regex.test(mobile_no) && mobile_no.length == max_mob_len
    // if (mobile_no !== "" && mobile_regex.test(mobile_no) && mobile_no.length == max_mob_len) {
    //     $("#last-form-mobile-error").css('display', 'none');
    //     $("#last-form-mobile-len-short-error").css('display', 'none');
    //     $("#last-form-mobile-len-big-error").css('display', 'none');

    // } else {
    //     if (mobile_no !== "" &&mobile_no.length < min_mob_len) {
    //         $("#last-form-mobile-len-short-error").css('display', 'block');
    //         $("#last-form-mobile-len-big-error").css('display', 'none');
    //     } else if (mobile_no.length > max_mob_len) {
    //         $("#last-form-mobile-len-short-error").css('display', 'none');
    //         $("#last-form-mobile-len-big-error").css('display', 'block');
    //     } else {
    //         $("#last-form-mobile-len-short-error").css('display', 'none');
    //         $("#last-form-mobile-len-big-error").css('display', 'none');
    //     }

    // }

    if (category == '' || mobile_no == '' || email == '' || max_budget_amount == '' || project_title == '' || min_budget_amount == '') {
        
        $("#last-form-error").css('display', 'block');
    }

    else if(min_budget_amount > max_budget_amount){
        // console.log("min: "+min_budget_amount);
        // console.log("max: "+max_budget_amount);
        $("#last-form-min-greater-error").css('display', 'block');        

    }
    else {
        document.getElementById('loader').style.display = 'flex';

        //save the enquiry

        var form = new FormData();      

        form.append('email', email);

        form.append('mobile', mobile_no);  
        form.append('countryCode', countryCode);        
        form.append('country', country);        



        form.append('category', category);

        form.append('project_title', project_title);

        form.append('description', description);

        form.append('max_budget_amount', max_budget_amount);

        form.append('min_budget_amount', min_budget_amount);


        

       
        $.ajax({

            url: site_url+"/api2/public/index.php/save_post_project", // Url to which the request is send
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

                    if(new_data.status_code == 3){
                        localStorage.setItem('user_email', new_data.msg);
                        window.location.href = 'verify_otp';
                    }
                    else if(new_data.status_code == 6){
                        //already logged in
                        window.location.href = 'my-queries';
                    }
                    
                    $('#error_message').text('Project details submitted successfully!');
                    $('.toast').toast('show');                    
                    $('#postProjectForm').trigger('reset');
                    
                }

                else {
                    
                    return false;
                }
            }
        });

    }

});



//submit the contact details  if already logged in

function submit_contact_details_loggedin () {  

    $("#loading").css('display','inline-block');

    var name = $("#customer-data-name").data('variable');
    var email = $("#customer-data-email").data('variable');
    var mobile_no = $("#customer-data-mobile").data('variable');
    var city_name = $("#customer-data-city").data('variable');
    var native_lang = $("#customer-data-client_remarks").data('variable');
    var enquiry_ques = enq_array;
    
    var category = $("#myText2").attr('data');    
    if(category === '' || category == undefined){
        var category = $("#category_id").data('id');
        if(category === '' || category == undefined){
            var category = $('#services_category').val();

        }
    }          
    //save the enquiry

    var form = new FormData();
    form.append('name', name);
    form.append('email', email);
    form.append('mobile', mobile_no);
    form.append('category', category);
    form.append('client_remark', native_lang);
    form.append('client_enquiry', enquiry_ques);
    form.append('city', city_name);
    // console.log();
    $.ajax({

        url: site_url+"/api2/public/index.php/save_enquiry", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: form, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: false,        // To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            var new_data = JSON.parse(data);
            // console.log(new_data);

            if (new_data.status == 200) {
                
                $("#success_div_2").show();
                $("#loading").css('display','none');
                $("#question_div").empty();

                enq_array = [];
                // setTimeout(function () {
                //     window.location.reload();
                // }, 4000);

                $.ajax({

                    url: site_url+"/api2/public/index.php/sendSooprsMail", // Url to which the request is send
                    type: "POST",             // Type of request to be send, called as method
                    data: form, // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                    contentType: false,       // The content type used when sending data to the server.
                    cache: false,             // To unable request pages to be cached
                    processData: false,        // To send DOMDocument or non processed data file it is set to false
                    success: function (data2)   // A function to be called if request succeeds
                    {
                       // console.log(data2);
                    }

                });

                $('#error_message').text(new_data.msg);

                $('.toast').toast('show');

            }

            else {
                // alert("Some problem occurred! Please try again!");
                return false;
            }
        }
    });


};





//select answer 

$("body").on('click', '.label-boxx', function () {



    // var get_id = $(this).attr('id');
    var get_id = $(this).find('span.circle').attr('id');



    var current_ques = $("input#" + get_id).attr('data-current-ques');





    $("span.circle").removeClass('selected');

    $("span.circle#" + get_id).addClass('selected');



    var ans_id = $("input#" + get_id).attr('data-answer');

    var ques_id = $("input#" + get_id).attr('data-ques');



    //  alert("answer id id"+ans_id+" question id "+ques_id);

    $("button.ques_no_" + current_ques).attr('data-answer', ans_id);

    $("button.ques_no_" + current_ques).attr('data-ques', ques_id);







    //  $("#back_button").attr('data-back-ques', real_ques);

    //  $("#back_button").attr('data-answer', get_id);



    $("#back_button").show();



    enq_array[current_ques] = ans_id;



    // console.log(enq_array);

    // console.log(JSON.stringify(enq_array));



})











//cookie function

function setCookie(name, value, days) {

    var expires = "";

    if (days) {

        var date = new Date();

        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));

        expires = "; expires=" + date.toUTCString();

    }

    document.cookie = name + "=" + (value || "") + expires + "; path=/";

}

function getCookie(name) {

    var nameEQ = name + "=";

    var ca = document.cookie.split(';');

    for (var i = 0; i < ca.length; i++) {

        var c = ca[i];

        while (c.charAt(0) == ' ') c = c.substring(1, c.length);

        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);

    }

    return null;

}






// Laod all professionals through load-more button
let offset = 0;
let limit = 10;

// function pagination_scroll(offset, limit) {
//     $.ajax({
//         url: site_url+'/api2/public/index.php/get_professionals_ajax',
//         method: "POST",
//         cache: false,
//         data: { offset: offset, limit: limit },
//         success: function (data) {
//             let decode_data = JSON.parse(data, true);
//             console.log(decode_data);
//             var element = document.getElementById("pills-professionals");
//             var element2 = document.getElementById("pills-professionals-grid-col");

//             var htmlContent = "";
//             var htmlContent2 = "";

//             if (decode_data['status'] == 200) {
//                 for (var i = 0; i < decode_data['msg'].length; i++) {
//                     var item = decode_data['msg'][i];
//                    var skills = item[3];                  
                  
//                     let user__name = item[0]['name'];
//                    let firstLetter = user__name[0].toUpperCase();
                   
//                    const colorNameMap = {
//                         A: 'aquamarine',
//                         B: 'blue',
//                         C: 'cadetblue',
//                         D: 'darkgoldenrod',
//                         E: 'bisque',
//                         F: 'firebrick',
//                         G: 'gold',
//                         H: 'hotpink',
//                         I: 'indianred',
//                         J: 'navajowhite',
//                         K: 'khaki',
//                         L: 'lavender',
//                         M: 'magenta',
//                         N: '#0000895e',
//                         O: 'orange',
//                         P: 'palegreen',
//                         Q: 'olivedrab',
//                         R: 'red',
//                         S: 'salmon',
//                         T: 'tan',
//                         U: 'deepskyblue',
//                         V: 'blueviolet',
//                         W: 'rosybrown',                        
//                         Y: 'bisque',
                        

//                     };

//                     let colorName = colorNameMap[firstLetter] || '#006aff';
//                     let image__url = item[0]['image'];
//                    let image_or_letter = image__url ? "<img src='"+ item[0]['image'] + "' alt='' style=''>" : "<p class='d-flex justify-content-center align-items-center' style='font-size: 4rem;background-color:"+colorName+";width: -webkit-fill-available;height: -webkit-fill-available;border-radius: 50%;'>" + firstLetter + " </p>";
                  

//                    var skillsParagraph = document.createElement('p');
//                     // skillsParagraph.style = 'color: grey;';
//                     skillsParagraph.className = 'skills__spans';

//                     // Iterate over skills and create a <span> for each skill
//                     skills.forEach(function(skill) {
//                         var span = document.createElement('span');                        
//                         span.textContent = skill;
//                         skillsParagraph.appendChild(span);
//                     });

//                     // Assuming the item is a string, you can customize this part based on your response structure
//                     htmlContent += "<div class='row justify-content-center mt-4'>\
//                                         <div class='col-md-3 col-sm-12'>\
//                                             <div class='img-box-white' style=''>\
//                                                 <div class='image-round-bg' style=''>\
//                                                     "+image_or_letter+"\
//                                                 </div>\
//                                             </div>\
//                                         </div>\
//                                         <div class='col-md-9 col-sm-12' style='background: white; padding: 27px;    border-radius: 10px;    box-shadow: 0px 0px 6px -3px black;'>\
//                                             <div class='list-right-box'>\
//                                                 <div class='row'>\
//                                                     <div class='col-lg-10 col-md-10 col-sm-12'>\
//                                                         <p class='text-capitalize' style=' font-size: 25px;font-weight: 700; margin-bottom: 0; color: #343C6A;'> "+ item[0]['name'] + " </p>\
//                                                         <div>" +skillsParagraph.outerHTML + " </div>\
//                                                     </div>\
//                                                     <div class='col-lg-2 col-md-2 col-sm-12' style=' text-align: end;'>\
//                                                         <p style='color: #237fff;font-size: 14px;'><i class='fad fa fa-check-circle me-2' style='--fa-primary-color: #00b303; --fa-secondary-color: #000000; --fa-secondary-opacity: 0.8;  '></i>Verified</p>\
//                                                     </div>\
//                                                 </div>\
//                                                 <p class='mt-2' style='    font-size: 14px;color: grey;'> " + item[2] + " </p>\
//                                                 <div class='row mt-3 align-items-center'>\
//                                                     <div class='col-md-12 col-sm-12 d-flex justify-content-between'  style=' align-items: baseline;'>\
//                                                         <div class='d-flex align-items-center'>\
//                                                             <i class='fa-solid fa-star'></i>\
//                                                             <i class='fa-solid fa-star'></i>\
//                                                             <i class='fa-solid fa-star'></i>\
//                                                             <i class='fa-solid fa-star'></i>\
//                                                             <i class='fa-solid fa-star'></i>\
//                                                         </div>\
//                                                         <div class='col-md-6 col-sm-6' style=' text-align: end;'>\
//                                                             <a href='professional/"+ item[0]['slug'] + "'><button class='mt-2 view-prof-btn'>View <i class='fa-solid fa-arrow-right' style='color: #ffffff;'></i></button></a>\
//                                                         </div>\
//                                                     </div>\
//                                                 </div>\
//                                             </div>\
//                                         </div>\
//                                         </div>";

//                     htmlContent2 += "<div class='col-md-4 col-sm-12 mt-3  '>\
//                                         <div class='text-center  bg-light' style=' padding: 15px;    border-radius: 10px; position:relative;   height: 100%;box-shadow: 0px 0px 7px -3px black;'>\
//                                             <div class='profile-image ' style='display: flex;flex-direction: column;align-items: center;'>\
//                                                 <div class='image-round-box' style='background-color: "+colorName+";'>\
//                                                 "+image_or_letter+"\
//                                                 </div>\
//                                                 <div class='grid-box-text text-capitalize'>\
//                                                     <p> "+ item[0]['name'] + "</p>\
//                                                     <p> " + item[2] + "</p>\
//                                                     <p>Verified</p>\
//                                                     <p> <i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i> </p>\
//                                                 </div>\
//                                             </div>\
//                                             <p style=' font-size: 12px; text-align: initial; color: grey;'></p>\
//                                             <a href='professional/"+ item[0]['slug'] + "' style='position: absolute; right: 10px;bottom: 10px;'>\
//                                             <button class='mt-2 view-prof-btn'>View</button>\
//                                             </a>\
//                                         </div>\
//                                     </div>";
//                 }
//                 element.innerHTML += htmlContent;
//                 element2.innerHTML += htmlContent2;
//             } else {
//                 $("#data-message").html("no  more professionals");
//                 $("#load-more").hide();
//             }

//         }
//     });
// }

// pagination_scroll(offset, limit);
// $('#load-more').on('click', function () {    
//     offset = offset + limit;
//     pagination_scroll(offset, limit);
// });
// Laod all professionals through load-more button








var responseLength  = 0;

// Laod all leads  on scroll 21-05-23
function pagination_scroll_leads(offset, limit) {



    $.ajax({
        url: site_url+'/api2/public/index.php/get_all_leads',
        method: "POST",
        cache: false,
        data: { offset: offset, limit: limit },
       
        success: function (data) {
            hideJobsLoader();
            let decode_data = JSON.parse(data, true);

            var element = document.getElementById("leads-data");
            var htmlContent = "";

            if (decode_data['status'] == 200) {
                responseLength  += decode_data['msg'].length;
                // console.log(responseLength);

                let jobsCounters = document.querySelectorAll('.jobsCounter');
                jobsCounters.forEach(function(jobCounter){
                    jobCounter.innerHTML = responseLength;
                });

                for (var i = 0; i < decode_data['msg'].length; i++) {
                    var item = decode_data['msg'][i];


                    // let mobile = item.mobile;
                    // let email = item.email;
                    // let hiddenMobile = mobile.substr(0, 2) + '********';

                    // let parts = email.split('@');
                    // let hiddenEmail = parts[0].charAt(0) + '***' + parts[0].charAt(parts[0].length - 1) + '@' + parts[1];


                    htmlContent += "<div class='row justify-content-center mb-3'>\
                                    <div class='col-md-12 col-sm-12 project-box' >\
                                        <div class='list-right-box'>\
                                            <div class=''>\
                                                <div class=' d-flex justify-content-between'>\
                                                    <h5 style='width: 80%;'><b class='text-capitalize sooprs-pt'>" + item['project_title'] + "</b></h5>\
                                                    <p class='text-capitalize sooprs-bids'>" + item['num_leads'] +" "+ (item['num_leads'] <= 1 ? ' Bid' : ' Bids') + "</p>\
                                                </div>\
                                                <p style='font-size: 14px;color: lightslategrey;'>" + item['createdDate']+"</p>\
                                            </div>\
                                             <div class='skill-set'>\
                                                <p> " + item['service_name'] + "</p>\
                                            </div>\
                                             <div class='row'>\
                                                <div class='col-lg-12 col-md-12 col-sm-12'>\
                                                    <p class='sooprs-desc'>" + item['description'] + ""+ (item['descCut'] == true ? '...' : '') + "</p>\
                                                </div>\
                                                \
                                            </div>\
                                            \
                                            <div class='row'>\
                                                <div class='col-lg-12 col-md-12 col-sm-12 d-flex justify-content-between'>\
                                                    <b class='sooprs-budget'>Budget: $" + item['min_budget'] + "-"+ item['max_budget_amount'] +" USD</b>\
                                                    <div>\
                                                        <form  method='post' action='' style='float:right'>\
                                                            <input type='hidden' name='lead_id' value='"+item['id']+"'>\
                                                            <button type='submit' class='mt-2 view-prof-btn' name='view_lead_btn' onClick = showLoader();><i class='fa-solid fa-arrow-right'></i></button>\
                                                        </form>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>";
                }

                if(element){

                    element.innerHTML += htmlContent;
                }

            } else {
                // element.innerHTML = "<div class='d-flex justify-content-center align-items-center'><img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1703768248/not-found_sao2fh.webp' style='width:300px;' ></div>";
                $("#data-message").html("<p style='font-size: 13px;color: darkgrey;'>no  more leads</p>");
                $("#load-more-leads").hide();
            }


        }
    });
}
pagination_scroll_leads(offset, limit);

$('#load-more-leads').on('click', function () {
    showJobsLoader();
    offset = offset + limit;
    pagination_scroll_leads(offset, limit);
});
// Laod all leads on scroll 21-05-23


// count all leads     
$(document).ready( function() {
    $.ajax({
        url: site_url+"/api2/public/index.php/get_leads_count", // Change this to the URL of your PHP script
        method: 'POST',
        data: '', // Send data to the PHP script
        success: function(response) {
            let decode_data = JSON.parse(response, true);
            console.log("all lead count = "+decode_data.msg);
            const allCounts = $("#all_counts");
            if(allCounts){
                allCounts.text(decode_data.msg);
            }
            // window.location.href = 'next_page.php?result=' + response;
        }
    });
});

// count all leads     
$(document).ready( function() {
    $.ajax({
        url: site_url+"/api2/public/index.php/get_professionals_count", // Change this to the URL of your PHP script
        method: 'POST',
        data: '', // Send data to the PHP script
        success: function(response) {
            let decode_data = JSON.parse(response, true);
            console.log("all pro count = "+decode_data.msg);
            const allCounts = $("#all_professionals_counts");
            if(allCounts){
                allCounts.text(decode_data.msg);
            }
            // window.location.href = 'next_page.php?result=' + response;
        }
    });
});





// before view the lead 
$(document).on('click', '.view-prof-btn', function() {
    var lead = $(this).data('id'); 
    var pro = $(this).data('pid'); 

    
    $.ajax({
        url: site_url+"/api2/public/index.php/before_view_lead", // Change this to the URL of your PHP script
        method: 'POST',
        data: { 
            lead: lead ,
            pro: pro
        }, // Send data to the PHP script
        success: function(response) {
           
            // window.location.href = 'next_page.php?result=' + response;
        }
    });
});




// Customer enquiries
// function pagination_scroll_queries(variable, offset, limit) {
//     $.ajax({
//         url: site_url+'/api2/public/index.php/get_enquiries_ajax',
//         method: "POST",
//         cache: false,
//         data: { variable: variable, offset: offset, limit: limit },
//         success: function (data) {
//             let decode_data = JSON.parse(data, true);
//             // console.log(decode_data['msg']);
//             var element = document.getElementById("enquiry-data");
//             var htmlContent = "";
//             if (decode_data['status'] == 200) {
//                 if(decode_data['msg'].length == 0){
//                     htmlContent += "<img class='enquiry-box' src='https://img.freepik.com/free-vector/no-data-concept-illustration_114360-616.jpg?w=740&t=st=1697721514~exp=1697722114~hmac=1c686beab542a2ba73188f309dd1107f755b514facbd67909dee49d0070511cb' style='width:100%; max-width:400px; height:auto; margin: auto; ' />";
//                 }else{
//                     for (var i = 0; i < decode_data['msg'].length; i++) {
//                         var item = decode_data['msg'][i];
//                         var faqdiv = "";
//                         for (let f = 0; f < item["faq"].length; f++) {
//                             var faqitem = item["faq"][f];
//                             faqdiv += "<div class='list-right-box'>\
//                                             <hr>\
//                                             <p class='fs-6 text-secondary'> "+ faqitem["question"] + "</p>\
//                                             <p class='fs-6 text-secondary'> "+ faqitem["answer"] + "</p>\
//                                             <p class='my-3' style='color: #006aff;'></p>\
//                                         </div>";
//                         }
//                         htmlContent += "<div class='col-md-4 col-sm-12 mt-3' >\
//                                             <div class='enquiry-box' style='padding: 15px;    border-radius: 10px; position:relative;   height: 100%;box-shadow: 0px 0px 7px -3px black;'>\
//                                                 <p class='text-end text-secondary' style='font-size:12px'> "+ item["formatCreatedAt"] + " </p>\
//                                                     <h6 class='fw-bold'>"+ item['project_title'] + "</h6>\
//                                                     <div  class='skill-set'>\
//                                                     <p class=''>"+ item['service-name'] + "</p>\
//                                                     </div>\
//                                                 <p class=' text-secondary p-3' style='font-size:13px'><i class='fa-solid fa-circle-check' style='color: #478bff;'></i> "+ item['bids'] + " Professionals showed interest</p>\
//                                                 <div class='col-md-12 col-sm-6 pt-3 ' style='text-align: center;'>\
//                                                     <a href='enquiry-detail/"+ item['id'] + "' style='font-size:12px' id='show-enquiry-btn' class='btn btn-sm btn-primary'>Show Details</a>\
//                                                 </div>\
//                                             </div>\
//                                         </div >";


//                                         // <p class='text-end text-secondary' style='font-size:12px'> "+ item["days"]['days'] + " Days ago</p>\
    
                        
//                     }

//                     htmlContent += "<div class='col-md-4 col-sm-12 mt-3'>\
//                     <div class='enquiry-box' style='padding: 15px; border-radius: 10px; position:relative; height: 100%; box-shadow: 0px 0px 7px -3px black; display:flex; justify-content:center; align-items:center;'>\
//                         <a href="+site_url+"/post-a-project><i class='fa fa-plus-circle' style='font-size:60px; color:blue;'></i></a>\
//                     </div>\
//                 </div>"
//                 }
                
//                 element.innerHTML += htmlContent;
//             } else {
//                 element.innerHTML = "<img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1692700995/sooprs/no_result_found_ll5f4b.png' style='max-width:400px; height:auto; margin: auto;'>\
//                 <p>No Enquiry Found</p>";
//             }


//         }
//     });
// }






// $('#load-more-queries').on('click', function () {
//     var myDiv = document.getElementById("cutomer-data-id");
//     var variable = myDiv.getAttribute("data-variable"); // Get the value of the data-variable attribute
//     offset = offset + limit;
//     pagination_scroll_queries(variable, offset, limit);
// });


// document.addEventListener("DOMContentLoaded", function () {
//     var myDiv = document.getElementById("customer-data-id");
    
//     var variable = myDiv.getAttribute("data-variable"); // Get the value of the data-variable attribute
    
//     pagination_scroll_queries(variable, offset, limit); // Call the JavaScript function and pass the variable
// });
// Customer enquiries









// "All" button pre clicked
// window.addEventListener('load', function () {
//     var all_button = document.getElementById('service-all');
//     all_button.click();
//     all_button.classList.add('clicked');
// });
window.addEventListener('load', function () {
    (function () {
        var all_button = document.getElementById('service-all');
        if(all_button){

            all_button.classList.add('clicked');
        }
    })();
});
// "All" button pre clicked


// Filter professionals acc. to services
// $('.cat-heading-professionals .service').click(function (event) {

//     var elementToRemoveClass = document.querySelector('.clicked');
//     elementToRemoveClass.classList.remove('clicked');
//     event.target.classList.add('clicked');
//     var dataValue = $(this).data('value');
//     $("#data-message").html("");

//     $.ajax({
//         url: site_url+"/api2/public/index.php/filter_service_ajax",
//         method: "POST",
//         data: { dataValue: dataValue },
//         success: function (data) {
//             $("#load-more").hide();
//             let decode_data = JSON.parse(data, true);
            
//             var element = document.getElementById("pills-professionals");
//             var htmlContent = "";
//             var element2 = document.getElementById("pills-professionals-grid-col");
//             var htmlContent2 = "";

//             element.innerHTML = "";
//             element2.innerHTML = "";

//             if (decode_data['status'] == 200) {
//                 for (var i = 0; i < decode_data['msg'].length; i++) {
//                     var item = decode_data['msg'][i];

//                     var skills2 = item[3];                  
                  
//                     let user__name = item[0]['name'];
//                     let firstLetter = user__name[0].toUpperCase();
                    
//                     const colorNameMap = {
//                          A: 'aquamarine',
//                          B: 'blue',
//                          C: 'cadetblue',
//                          D: 'darkgoldenrod',
//                          E: 'bisque',
//                          F: 'firebrick',
//                          S: 'salmon'                        
//                      };
//                      let colorName = colorNameMap[firstLetter] || 'gray';
//                      let image__url = item[0]['image'];
//                     let image_or_letter = image__url ? "<img src='"+ item[0]['image'] + "' alt='' style=''>" : "<p style='font-size: 4rem;' class=''>" + firstLetter + " </p>";
                  
//                     var skillsParagraph2 = document.createElement('p');
//                     // skillsParagraph.style = 'color: grey;';
//                     skillsParagraph2.className = 'skills__spans';

//                     skills2.forEach(function(skill2) {
//                         var span = document.createElement('span');                        
//                         span.textContent = skill2;
//                         skillsParagraph2.appendChild(span);
//                     });

//                     htmlContent += "<div class='row justify-content-center mt-2'>\
//                     <div class='col-md-3 col-sm-12'>\
//                         <div class='img-box-white' style=''>\
//                             <div class='image-round-bg' style='background-color: "+colorName+";'>\
//                                 "+image_or_letter+"\
//                             </div>\
//                         </div>\
//                     </div>\
//                     <div class='col-md-9 col-sm-12' style='background: white; padding: 27px;    border-radius: 10px;    box-shadow: 0px 0px 6px -3px black;'>\
//                         <div class='list-right-box'>\
//                             <div class='row'>\
//                                 <div class='col-lg-10 col-md-10 col-sm-12'>\
//                                     <p class='text-capitalize' style=' font-size: 25px;font-weight: 700; margin-bottom: 0; color: #343C6A;'> "+ item[0]['name'] + " </p>\
//                                     <div>" +skillsParagraph2.outerHTML + " </div>\
//                                 </div>\
//                                 <div class='col-lg-2 col-md-2 col-sm-12' style=' text-align: end;'>\
//                                     <strong style='color: #006aff;'><i class='fad fa fa-check-circle me-2' style='--fa-primary-color: #00b303; --fa-secondary-color: #000000; --fa-secondary-opacity: 0.8;  '></i>Verified</strong>\
//                                 </div>\
//                             </div>\
//                             <p class='mt-2' style='    font-size: 14px;color: grey;'> " + item[2] + " </p>\
//                             <div class='row mt-3 align-items-center'>\
//                                 <div class='col-md-12 col-sm-12 d-flex justify-content-between'  style=' align-items: baseline;'>\
//                                     <div class='d-flex align-items-center'>\
//                                         <p style='  font-weight: 400;     padding: 3px 10px; font-size: 14px; color: #343C6A;'> Rating </p>\
//                                         <i class='fa-solid fa-star'></i>\
//                                         <i class='fa-solid fa-star'></i>\
//                                         <i class='fa-solid fa-star'></i>\
//                                         <i class='fa-solid fa-star'></i>\
//                                         <i class='fa-solid fa-star'></i>\
//                                     </div>\
//                                     <div class='col-md-6 col-sm-6' style=' text-align: end;'>\
//                                         <a href='professional/"+ item[0]['slug'] + "'><button class='mt-2 view-prof-btn'>View <i class='fa-solid fa-arrow-right' style='color: #ffffff;'></i></button></a>\
//                                     </div>\
//                                 </div>\
//                             </div>\
//                         </div>\
//                     </div>\
//                     </div>";



//                     htmlContent2 += "<div class='col-md-4 col-sm-12 mt-3  '>\
//                                         <div class='text-center  bg-light' style=' padding: 15px;    border-radius: 10px; position:relative;   height: 100%;box-shadow: 0px 0px 7px -3px black;'>\
//                                             <div class='profile-image' style='display: flex;flex-direction: column;align-items: center;'>\
//                                                 <div class='image-round-box' style='background-color: "+colorName+";'>\
//                                                 "+image_or_letter+"\
//                                                 </div>\
//                                                 <div class='grid-box-text text-capitalize'>\
//                                                     <p> "+ item[0]['name'] + "</p>\
//                                                     <p> " + item[2] + "</p>\
//                                                     <p>Verified</p>\
//                                                     <p> <i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i> </p>\
//                                                 </div>\
//                                             </div>\
//                                             <p style=' font-size: 12px; text-align: initial; color: grey;'></p>\
//                                             <a href='professional/"+ item[0]['slug'] + "' style='position: absolute; right: 10;bottom: 10;'>\
//                                             <button class='mt-2 view-prof-btn'>View <i class='fa-solid fa-arrow-right' style='color: #ffffff;'></i></button>\
//                                             </a>\
//                                         </div>\
//                                     </div>";
//                 }
//                 element.innerHTML += htmlContent;
//                 element2.innerHTML += htmlContent2;
//             } else {
//                 $("#data-message").html("no  more professionals");
//                 $("#load-more").hide();
//             }
//         }
//     });
// });
// Filter professionals acc. to services 



// Filter leads acc. to services


// Filter leads acc. to services 









// Search using ajax
$("#searchButton").on("click", function () {
    var query = $("#searchInput").val();
    $.ajax({
        url: "search.php",
        method: "POST",
        data: { query: query },
        success: function (data) {
            $("#searchResults").html(data);
        }
    });
});






// change pasword customer profile 
function validatePassword() {
    var currentPassword, newPassword, confirmPassword, output = true;

    currentPassword = document.frmChange.currentPassword;
    newPassword = document.frmChange.newPassword;
    confirmPassword = document.frmChange.confirmPassword;

    if (!currentPassword.value) {
        currentPassword.focus();
        document.getElementById("currentPassword").innerHTML = "required";
        output = false;
    }
    else if (!newPassword.value) {
        newPassword.focus();
        document.getElementById("newPassword").innerHTML = "required";
        output = false;
    }
    else if (!confirmPassword.value) {
        confirmPassword.focus();
        document.getElementById("confirmPassword").innerHTML = "required";
        output = false;
    }
    if (newPassword.value != confirmPassword.value) {
        newPassword.value = "";
        confirmPassword.value = "";
        newPassword.focus();
        document.getElementById("confirmPassword").innerHTML = "not same";
        output = false;
    }
    return output;
}

/* =============OTP verify for new customer at post a project ============= */
// $("#otp_verify_email_project").on('click', function(){    
//     $('#mail-sent-loader').css('display', 'inline-block');
//     let email = $("#otp").val();
//     let password = $("#inputpass").val();    
//     console.log(email);
//     $.ajax({
//         url: site_url+"/api2/public/index.php/verifyOtp",
//         type: "POST",
//         data: JSON.stringify({
//             email: email  ,
//             password: password
//         }),
//         contentType: "application/json",
//         cache: false,
//         processData: false,
//         success: function (data)
//         {            
//             let result = JSON.parse(data);
//             const loginStatusValue = result.loginStatus;
//             const loginmsg = result.msg;

//             console.log(loginStatusValue); 
          
                
//                 if(loginStatusValue === 200) {
//                     window.location.href="leads.php";
//                 } else {
//                     $('#msg').html(loginmsg);
//                     $('#professional-login').find('input').val('')
//                 }
           
//         }
//     });
// });
/* ============= OTP verify for new customer at post a project  ============= */




// Laod all professionals through load-more button


// function topRatedProfessional(offset, limit) {
//     $.ajax({
//         url: site_url+'/api2/public/index.php/get_top_rated_professionals_ajax',
//         method: "POST",
//         cache: false,
//         data: { offset: offset, limit: limit },
//         success: function (data) {
//             let decode_data = JSON.parse(data, true);
//             // console.log(decode_data['msg']);
//             var element = document.getElementById("pills-professionals");
//             var element2 = document.getElementById("pills-professionals-grid-col");

//             var htmlContent = "";
//             var htmlContent2 = "";

//             if (decode_data['status'] == 200) {
//                 for (var i = 0; i < decode_data['msg'].length; i++) {
//                     var item = decode_data['msg'][i];


//                     // Assuming the item is a string, you can customize this part based on your response structure
//                     htmlContent += "<div class='row justify-content-center mt-2'>\
//                                         <div class='col-md-4 col-sm-12'>\
//                                             <div class='img-box-white' style=''>\
//                                                 <div class='image-round-bg' style=''>\
//                                                     <img src='"+ site_url + "/assets/files/"+ item[0]['image'] + "' alt='' style=''>\
//                                                 </div>\
//                                             </div>\
//                                         </div>\
//                                         <div class='col-md-8 col-sm-12' style='background: white; padding: 27px;    border-radius: 10px;    box-shadow: 0px 0px 6px -3px black;'>\
//                                             <div class='list-right-box'>\
//                                                 <div class='row'>\
//                                                     <div class='col-lg-6 col-md-6 col-sm-12'>\
//                                                         <p class='text-capitalize' style=' font-size: 25px;font-weight: 700; margin-bottom: 0; color: #343C6A;'> "+ item[0]['name'] + " </p>\
//                                                         <p style='color: grey;'>" + item[3] + " </p>\
//                                                     </div>\
//                                                     <div class='col-lg-6 col-md-6 col-sm-12' style=' text-align: end;'>\
//                                                         <strong style='color: #006aff;'><i class='fad fa fa-check-circle me-2' style='--fa-primary-color: #00b303; --fa-secondary-color: #000000; --fa-secondary-opacity: 0.8;  '></i>Verified</strong>\
//                                                     </div>\
//                                                 </div>\
//                                                 <p class='mt-2' style='    font-size: 14px;color: grey;'> " + item[2] + " </p>\
//                                                 <div class='row mt-3 align-items-center'>\
//                                                     <div class='col-md-12 col-sm-12 d-flex justify-content-between'  style=' align-items: baseline;'>\
//                                                         <div class='d-flex align-items-center'>\
//                                                             <p style='  font-weight: 400;     padding: 3px 10px; font-size: 14px; color: #343C6A;'> Rating </p>\
//                                                             <i class='fa-solid fa-star'></i>\
//                                                             <i class='fa-solid fa-star'></i>\
//                                                             <i class='fa-solid fa-star'></i>\
//                                                             <i class='fa-solid fa-star'></i>\
//                                                             <i class='fa-solid fa-star'></i>\
//                                                         </div>\
//                                                         <div class='col-md-6 col-sm-6' style=' text-align: end;'>\
//                                                             <a href='professional/"+ item[0]['slug'] + "><button class='mt-2 view-prof-btn'>View</button></a>\
//                                                         </div>\
//                                                     </div>\
//                                                 </div>\
//                                             </div>\
//                                         </div>\
//                                         </div>";

//                     htmlContent2 += "<div class='col-md-4 col-sm-12 mt-3  '>\
//                                         <div class='text-center  bg-light' style=' padding: 15px;    border-radius: 10px;    height: 100%;box-shadow: 0px 0px 7px -3px black;'>\
//                                             <div class='profile-image d-flex justify-content-between align-items-center'>\
//                                                 <div class='image-round-box'>\
//                                                     <img src='"+ site_url + "/assets/files/"+ item[0]['image'] + "' alt=''>\
//                                                 </div>\
//                                                 <div class='grid-box-text text-capitalize'>\
//                                                     <p> "+ item[0]['name'] + "</p>\
//                                                     <p> " + item[2] + "</p>\
//                                                     <p>Verified</p>\
//                                                     <p> <i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i><i class='fa-solid fa-star'></i> </p>\
//                                                 </div>\
//                                             </div>\
//                                             <p style=' font-size: 12px; text-align: initial; color: grey;'></p>\
//                                             <a href='professional/"+ item[0]['slug'] + "'>\
//                                             <button class='mt-2 view-prof-btn'>View</button>\
//                                             </a>\
//                                         </div>\
//                                     </div>";
//                 }
//                 element.innerHTML += htmlContent;
//                 element2.innerHTML += htmlContent2;
//             } else {
//                 $("#data-message").html("no  more professionals");
//                 $("#load-more").hide();
//             }

//         }
//     });
// }

// topRatedProfessional(offset, limit);
// $('#load-more').on('click', function () {
//     offset = offset + limit;
//     topRatedProfessional(offset, limit);
// });
// Laod all professionals through load-more button



/* =============forgot pasword ============= */
$("#forgot-btn").on('click', function(){
    // event.preventDefault();
    // $('#mail-sent-loader').css('display', 'inline-block');
    showLoader();

    let email = $("#email").val();
    let type = $("#login-type").val();

    // var form = new FormData();
    // form.append('email', email);
    // console.log(email);
    $.ajax({
        url: site_url+"/api2/public/index.php/forgetpassword",
        type: "POST",
        data: JSON.stringify({
            email: email  ,
            type: type
        }),
        contentType: "application/json",
        cache: false,
        processData: false,
        success: function (data)
        {
            // console.log(data);
            var new_data = JSON.parse(data);

            hideLoader();

            $('#target').hide(500);
            $('.Show').show(0);
            $('.Hide').hide(0);

            // $('#mail-sent-loader').css('display', 'none');
            // $('#loginForm').toggle('slow'); 
            toastr.success(new_data.msg, 'Success');

            // $('#successPopup').fadeIn().delay(5000).fadeOut();
        }
    });
});
/* =============forgot pasword ============= */



// Professional setting add services 


// Professional setting add skills 

// $('#addSkillForm').submit(function(e) {
//     e.preventDefault(); // Prevent the form from submitting in the traditional way
//     var formData = {
//         skill: $('#addSkillForm #skills_list').val(),
//         profid: $('#profid').val()
//     };

//     $.ajax({
//         type: 'POST',
//         url: site_url+'/api2/public/index.php/addSkillForm', // Replace with your PHP file path
//         data: formData,
//         success: function(response) {
//             console.log(response);
//             $("#addSkillModal").modal("hide");
//             var jsonResponse = JSON.parse(response);
//             var message = jsonResponse.msg; 
//             var status = jsonResponse.status;            

//             if(status == 200){
//                 $('#result').html("<p class='text-success mt-4' style=''>"+ message +"</p>"); 
//             }
//             if(status == 400){
//                 $('#result').html("<p class='text-danger mt-4' style=''>"+ message +"</p>"); 
//             }
//             setTimeout(function(){
//                 location.reload();
//             }, 1000);           
//         }
//     });
// });


 


// Remove professional services from lead settings page


// Remove professional skills from lead settings page
// var circleXmarksSkill = document.querySelectorAll(".remove-skill");

// function removeSkill(event) {    

//     var clickedButton = event.target;
//     var dataSkillValue = clickedButton.dataset.skillid;
//     var dataPrfValue = clickedButton.dataset.prfid;
//     console.log(dataSkillValue,dataPrfValue);

//     $.ajax({
//         url: site_url+"/api2/public/index.php/remove_professional_skill",
//         method: "POST",
//         data: {
//             dataSkillValue: dataSkillValue,
//             dataPrfValue: dataPrfValue
//         },
//         success: function (response) {
//             var jsonResponse = JSON.parse(response);
//             var message = jsonResponse.msg; 
//             var status = jsonResponse.status;      

//             var parentSpan = clickedButton.parentElement;
//             parentSpan.remove(); // Remove the whole <span> element
            
//             if(status == 200){
//                 $('#result').html("<p class='text-success mt-4' style=''>"+ message +"</p>"); 
//             }
//             if(status == 400){
//                 $('#result').html("<p class='text-danger mt-4' style=''>"+ message +"</p>"); 
//             }
//         },
//         error: function (xhr, status, error) {
//             // Handle error
//             // console.log("Error:", error);
//         }

//     });
// }

// circleXmarksSkill.forEach(function (button) {
//     button.addEventListener("click", removeSkill);
// });





// upload settings pic (working)
$('#upload-pic').on('click', function() {
    // Create a new FormData object to capture the form data, including the file
    var formData = new FormData($('#upload-form')[0]);
    var id = $("#id").val();
    var table = $("#table").val();

    formData.append('id', id);
    formData.append('table', table);


    // Send the AJAX request
    $.ajax({
        url: site_url+"/api2/public/index.php/upload_picture", // Replace with the URL of your server-side PHP script that handles the file upload
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

            $('#user-pic-round').css({
                
                'background': 'url(' + imageUrl + ')',
                'background-size': 'cover',
                'background-position': 'center',
                'width': '30px',
                'height': '30px',
                'border-radius': '50%'
            });

            $('#exampleModal').modal('hide');

            $('#error_message').text('Profile picture updated successfully!');

            $('.toast').toast('show');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            // Handle the error, if any
            // console.log('Error:', textStatus, errorThrown);
        }
    });
});





// Show all pages on site load on index-page (first 2 sections of services)
$(window).on('load', function () {
   
    $.ajax({
        url: site_url+"/api2/public/index.php/sr_pages_all_firstTwo", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: "", // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: false,        // To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            var new_data = JSON.parse(data);
            // console.log(new_data.msg);

            if(new_data.status == 200){
                var pageContent = document.getElementById("pageContent");

                if(pageContent){

                    new_data.msg.forEach(function(category) {
                        var section = document.createElement("section");
                        section.className = "section-two mt-4";
                        
                        var div = document.createElement("div");
                        div.style.paddingLeft = "2rem";
                        div.style.paddingRight = "2rem";
                        div.style.maxWidth = "2000px";
                        div.style.margin = "0 auto";
                        
                        var h2 = document.createElement("h2");
                        h2.className = "mb-4";
                        h2.textContent = category.category;
                        
                        var owlCarousel = document.createElement("div");
                        owlCarousel.className = "owl-carousel index-carousel owl-theme";
                        
                        category.pages.forEach(function(page) {
                            var item = document.createElement("div");
                            item.className = "item";
                            
                            var col = document.createElement("div");
                            col.className = "col position-relative";
                            
                            var img = document.createElement("img");
                            img.className = "profile-img";
                            img.src = page.thumb_image;
                            img.alt = page.slug;
                            img.loading = "lazy";
                            
                            var a = document.createElement("a");
                            // a.href = "service/" + page.slug;
                            // if(page.service_id !== null){
                            //     a.href = "all-professionals/"+page.service_id;
                            // }else{
                                //a.href = "all-professionals";
                                a.href = "professionals/"+page.slug;

                            // }
                            // a.setAttribute("data-serviceid", page.service_id);


                            
                            var profileImgText = document.createElement("div");
                            profileImgText.className = "profile-img-text";
                            
                            var p = document.createElement("p");
                            p.textContent = page.page_title;
                            
                            var overlay = document.createElement("div");
                            overlay.className = "overlay";
                            
                            a.appendChild(profileImgText);
                            profileImgText.appendChild(p);
                            a.appendChild(overlay);
                            
                            col.appendChild(img);
                            col.appendChild(a);
                            
                            item.appendChild(col);
                            
                            owlCarousel.appendChild(item);
                        });
                        
                        div.appendChild(h2);
                        div.appendChild(owlCarousel);

                        
                        
                        section.appendChild(div);
                        
                        pageContent.appendChild(section);

                        $('.index-carousel').owlCarousel({
                            loop:true,
                            margin:10,
                            nav:true,
                            navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                            dots:false,
                            responsive:{
                                0:{
                                    items:2
                                },
                                600:{
                                    items:3
                                },
                                1000:{
                                    items:5
                                }
                            }
                        });

                        // $(document).ready(function () {
                        //     // Initialize the Owl Carousel with your options
                        //     $(".index-carousel").owlCarousel(owlOptions);
                        // });
                    });
                }

            }else{

            }
            

        }



    });

    // development services 
    $.ajax({
        url: site_url+"/api2/public/index.php/development_services", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: "", // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: false,        // To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            var new_data = JSON.parse(data);
            // console.log(new_data.msg);
            // console.log(new_data.parent);
            // console.log(new_data.status);



            if(new_data.status == 200){
                var pageContent = document.getElementById("developmentPageContent");

                if(pageContent){
                    var section = document.createElement("section");
                    section.className = "section-two mt-4";
                    
                    var div = document.createElement("div");
                    div.style.paddingLeft = "2rem";
                    div.style.paddingRight = "2rem";
                    div.style.maxWidth = "2000px";
                    div.style.margin = "0 auto";                    
                    var h2 = document.createElement("h2");
                    h2.className = "mb-4";
                    h2.textContent = new_data.parent;


                    var owlCarousel = document.createElement("div");
                    owlCarousel.className = "owl-carousel index-carousel owl-theme";

                    new_data.msg.forEach(function(category) {                        
                        
                        // category.pages.forEach(function(page) {
                            var item = document.createElement("div");
                            item.className = "item";                            
                            var col = document.createElement("div");
                            col.className = "col position-relative";                            
                            var img = document.createElement("img");
                            img.className = "profile-img";
                            img.src = category.service_bg_img;
                            img.alt = "service-image";
                            img.loading = "lazy";
                            
                            var a = document.createElement("a");
                            // a.href = "service/" + page.slug;
                            a.href = "https://sooprs.com//professionals/"+category.service_slug;
                            
                            var profileImgText = document.createElement("div");
                            profileImgText.className = "profile-img-text";                            
                            var p = document.createElement("p");
                            p.textContent = category.service_name;
                            
                            var overlay = document.createElement("div");
                            overlay.className = "overlay";
                            
                            a.appendChild(profileImgText);
                            profileImgText.appendChild(p);
                            a.appendChild(overlay);
                            
                            col.appendChild(img);
                            col.appendChild(a);
                            
                            item.appendChild(col);
                            
                            owlCarousel.appendChild(item);
                        // });
                        
                        

                        

                        // $(document).ready(function () {
                        //     // Initialize the Owl Carousel with your options
                        //     $(".index-carousel").owlCarousel(owlOptions);
                        // });
                    });
                        div.appendChild(h2);
                        div.appendChild(owlCarousel);

                        
                        
                        section.appendChild(div);
                        
                        pageContent.appendChild(section);

                        $('.index-carousel').owlCarousel({
                            loop:true,
                            margin:10,
                            nav:true,
                            navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                            dots:false,
                            responsive:{
                                0:{
                                    items:2
                                },
                                600:{
                                    items:3
                                },
                                1000:{
                                    items:5
                                }
                            }
                        });
                }

            }else{

            }
            

        }



    });

    // designing services 
    $.ajax({
        url: site_url+"/api2/public/index.php/designing_services", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: "", // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: false,        // To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            var new_data = JSON.parse(data);
            // console.log(new_data.msg);
            // console.log(new_data.parent);
            // console.log(new_data.status);



            if(new_data.status == 200){
                var pageContent = document.getElementById("designing_section");

                if(pageContent){
                    var section = document.createElement("section");
                    section.className = "section-two mt-4";
                    
                    var div = document.createElement("div");
                    div.style.paddingLeft = "2rem";
                    div.style.paddingRight = "2rem";
                    div.style.maxWidth = "2000px";
                    div.style.margin = "0 auto";                    
                    var h2 = document.createElement("h2");
                    h2.className = "mb-4";
                    h2.textContent = new_data.parent;


                    var owlCarousel = document.createElement("div");
                    owlCarousel.className = "owl-carousel index-carousel owl-theme";

                    new_data.msg.forEach(function(category) {                        
                        
                        // category.pages.forEach(function(page) {
                            var item = document.createElement("div");
                            item.className = "item";                            
                            var col = document.createElement("div");
                            col.className = "col position-relative";                            
                            var img = document.createElement("img");
                            img.className = "profile-img";
                            img.src = category.service_bg_img;
                            img.alt = "service-image";
                            img.loading = "lazy";
                            
                            var a = document.createElement("a");
                            // a.href = "service/" + page.slug;
                            a.href = "https://sooprs.com//professionals/"+category.service_slug;
                            
                            var profileImgText = document.createElement("div");
                            profileImgText.className = "profile-img-text";                            
                            var p = document.createElement("p");
                            p.textContent = category.service_name;
                            
                            var overlay = document.createElement("div");
                            overlay.className = "overlay";
                            
                            a.appendChild(profileImgText);
                            profileImgText.appendChild(p);
                            a.appendChild(overlay);
                            
                            col.appendChild(img);
                            col.appendChild(a);
                            
                            item.appendChild(col);
                            
                            owlCarousel.appendChild(item);
                        // });
                        
                        

                        

                        // $(document).ready(function () {
                        //     // Initialize the Owl Carousel with your options
                        //     $(".index-carousel").owlCarousel(owlOptions);
                        // });
                    });
                        div.appendChild(h2);
                        div.appendChild(owlCarousel);

                        
                        
                        section.appendChild(div);
                        
                        pageContent.appendChild(section);

                        $('.index-carousel').owlCarousel({
                            loop:true,
                            margin:10,
                            nav:true,
                            navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                            dots:false,
                            responsive:{
                                0:{
                                    items:2
                                },
                                600:{
                                    items:3
                                },
                                1000:{
                                    items:5
                                }
                            }
                        });
                }

            }else{

            }
            

        }



    });

    // latest tech services 
    $.ajax({
        url: site_url+"/api2/public/index.php/latest_tech_section", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: "", // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: false,        // To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            var new_data = JSON.parse(data);
            // console.log(new_data.msg);
            // console.log(new_data.parent);
            // console.log(new_data.status);



            if(new_data.status == 200){
                var pageContent = document.getElementById("latest_tech_section");

                if(pageContent){
                    var section = document.createElement("section");
                    section.className = "section-two mt-4";
                    
                    var div = document.createElement("div");
                    div.style.paddingLeft = "2rem";
                    div.style.paddingRight = "2rem";
                    div.style.maxWidth = "2000px";
                    div.style.margin = "0 auto";                    
                    var h2 = document.createElement("h2");
                    h2.className = "mb-4";
                    h2.textContent = new_data.parent;


                    var owlCarousel = document.createElement("div");
                    owlCarousel.className = "owl-carousel index-carousel owl-theme";

                    new_data.msg.forEach(function(category) {                        
                        
                        // category.pages.forEach(function(page) {
                            var item = document.createElement("div");
                            item.className = "item";                            
                            var col = document.createElement("div");
                            col.className = "col position-relative";                            
                            var img = document.createElement("img");
                            img.className = "profile-img";
                            img.src = category.service_bg_img;
                            img.alt = "service-image";
                            img.loading = "lazy";
                            
                            var a = document.createElement("a");
                            // a.href = "service/" + page.slug;
                            a.href = "https://sooprs.com//professionals/"+category.service_slug;
                            
                            var profileImgText = document.createElement("div");
                            profileImgText.className = "profile-img-text";                            
                            var p = document.createElement("p");
                            p.textContent = category.service_name;
                            
                            var overlay = document.createElement("div");
                            overlay.className = "overlay";
                            
                            a.appendChild(profileImgText);
                            profileImgText.appendChild(p);
                            a.appendChild(overlay);
                            
                            col.appendChild(img);
                            col.appendChild(a);
                            
                            item.appendChild(col);
                            
                            owlCarousel.appendChild(item);
                        // });
                        
                        

                        

                        // $(document).ready(function () {
                        //     // Initialize the Owl Carousel with your options
                        //     $(".index-carousel").owlCarousel(owlOptions);
                        // });
                    });
                        div.appendChild(h2);
                        div.appendChild(owlCarousel);

                        
                        
                        section.appendChild(div);
                        
                        pageContent.appendChild(section);

                        $('.index-carousel').owlCarousel({
                            loop:true,
                            margin:10,
                            nav:true,
                            navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                            dots:false,
                            responsive:{
                                0:{
                                    items:2
                                },
                                600:{
                                    items:3
                                },
                                1000:{
                                    items:5
                                }
                            }
                        });
                }

            }else{

            }
            

        }



    });

    // marketing services 
    $.ajax({
        url: site_url+"/api2/public/index.php/marketing_section", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: "", // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: false,        // To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            var new_data = JSON.parse(data);
            // console.log(new_data.msg);
            // console.log(new_data.parent);
            // console.log(new_data.status);



            if(new_data.status == 200){
                var pageContent = document.getElementById("marketing_section");

                if(pageContent){
                    var section = document.createElement("section");
                    section.className = "section-two mt-4";
                    
                    var div = document.createElement("div");
                    div.style.paddingLeft = "2rem";
                    div.style.paddingRight = "2rem";
                    div.style.maxWidth = "2000px";
                    div.style.margin = "0 auto";                    
                    var h2 = document.createElement("h2");
                    h2.className = "mb-4";
                    h2.textContent = new_data.parent;


                    var owlCarousel = document.createElement("div");
                    owlCarousel.className = "owl-carousel index-carousel owl-theme";

                    new_data.msg.forEach(function(category) {                        
                        
                        // category.pages.forEach(function(page) {
                            var item = document.createElement("div");
                            item.className = "item";                            
                            var col = document.createElement("div");
                            col.className = "col position-relative";                            
                            var img = document.createElement("img");
                            img.className = "profile-img";
                            img.src = category.service_bg_img;
                            img.alt = "service-image";
                            img.loading = "lazy";
                            
                            var a = document.createElement("a");
                            // a.href = "service/" + page.slug;
                            a.href = "https://sooprs.com//professionals/"+category.service_slug;
                            
                            var profileImgText = document.createElement("div");
                            profileImgText.className = "profile-img-text";                            
                            var p = document.createElement("p");
                            p.textContent = category.service_name;
                            
                            var overlay = document.createElement("div");
                            overlay.className = "overlay";
                            
                            a.appendChild(profileImgText);
                            profileImgText.appendChild(p);
                            a.appendChild(overlay);
                            
                            col.appendChild(img);
                            col.appendChild(a);
                            
                            item.appendChild(col);
                            
                            owlCarousel.appendChild(item);
                        // });
                        
                        

                        

                        // $(document).ready(function () {
                        //     // Initialize the Owl Carousel with your options
                        //     $(".index-carousel").owlCarousel(owlOptions);
                        // });
                    });
                        div.appendChild(h2);
                        div.appendChild(owlCarousel);

                        
                        
                        section.appendChild(div);
                        
                        pageContent.appendChild(section);

                        $('.index-carousel').owlCarousel({
                            loop:true,
                            margin:10,
                            nav:true,
                            navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                            dots:false,
                            responsive:{
                                0:{
                                    items:2
                                },
                                600:{
                                    items:3
                                },
                                1000:{
                                    items:5
                                }
                            }
                        });
                }

            }else{

            }
            

        }



    });
});


// Show all pages on site load on index-page (last 2 sections of services)
$(window).on('load', function () {
   
    $.ajax({
        url: site_url+"/api2/public/index.php/sr_pages_all_last_two", // Url to which the request is send
        type: "POST",             // Type of request to be send, called as method
        data: "", // Data sent to server, a set of key/value pairs (i.e. form fields and values)
        contentType: false,       // The content type used when sending data to the server.
        cache: false,             // To unable request pages to be cached
        processData: false,        // To send DOMDocument or non processed data file it is set to false
        success: function (data)   // A function to be called if request succeeds
        {
            var new_data = JSON.parse(data);
            // console.log(new_data.msg);

            if(new_data.status == 200){
                var pageContent2 = document.getElementById("pageContent2");

                if(pageContent2){

                    new_data.msg.forEach(function(category) {
                        var section = document.createElement("section");
                        section.className = "section-two mt-4";
                        
                        var div = document.createElement("div");
                        div.style.paddingLeft = "2rem";
                        div.style.paddingRight = "2rem";
                        div.style.maxWidth = "2000px";
                        div.style.margin = "0 auto";
                        
                        var h2 = document.createElement("h2");
                        h2.className = "mb-4";
                        h2.textContent = category.category;
                        
                        var owlCarousel = document.createElement("div");
                        owlCarousel.className = "owl-carousel index-carousel owl-theme";
                        
                        category.pages.forEach(function(page) {
                            var item = document.createElement("div");
                            item.className = "item";
                            
                            var col = document.createElement("div");
                            col.className = "col position-relative";
                            
                            var img = document.createElement("img");
                            img.className = "profile-img";
                            img.src = page.thumb_image;
                            img.alt = page.slug;
                            img.loading = "lazy";
                            
                            var a = document.createElement("a");
                            // a.href = "service/" + page.slug;
                           // a.href = "all-professionals";
                            a.href = "professionals/"+page.slug;
                            // a.setAttribute("data-serviceid", page.service_id);


                            
                            var profileImgText = document.createElement("div");
                            profileImgText.className = "profile-img-text";
                            
                            var p = document.createElement("p");
                            p.textContent = page.page_title;
                            
                            var overlay = document.createElement("div");
                            overlay.className = "overlay";
                            
                            a.appendChild(profileImgText);
                            profileImgText.appendChild(p);
                            a.appendChild(overlay);
                            
                            col.appendChild(img);
                            col.appendChild(a);
                            
                            item.appendChild(col);
                            
                            owlCarousel.appendChild(item);
                        });
                        
                        div.appendChild(h2);
                        div.appendChild(owlCarousel);                    
                        section.appendChild(div);
                        
                        pageContent2.appendChild(section);

                        $('.index-carousel').owlCarousel({
                            loop:true,
                            margin:10,
                            nav:true,
                            navText : ['<i class="fa fa-angle-left" aria-hidden="true"></i>','<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                            dots:false,
                            responsive:{
                                0:{
                                    items:2
                                },
                                600:{
                                    items:3
                                },
                                1000:{
                                    items:5
                                }
                            }
                        });

                        // $(document).ready(function () {
                        //     // Initialize the Owl Carousel with your options
                        //     $(".index-carousel").owlCarousel(owlOptions);
                        // });
                    });
                }

            }else{

            }
            

        }



    });

});










// Laod all my leads  on scroll 21-05-23

// var my_get_id = $('#professional-data-id').data("variable");

// pagination_my_leads(offset, limit,my_get_id);

// function pagination_my_leads(offset, limit,my_get_id) {    

//     $.ajax({
//         url: site_url+"/api2/public/index.php/get_my_leads",
//         method: "POST",
//         cache: false,
//         data: { 
//             offset: offset, 
//             limit: limit,
            
//             my_get_id:my_get_id
//          },
//         success: function (data) {

//             let decode_data = JSON.parse(data, true);

//             var element = document.getElementById("my-leads-data");
//             var htmlContent = "";

//             if (decode_data['status'] == 200) {

//                 if(decode_data['msg'].length == 0){
//                     htmlContent += "<div class=' col-sm-12 mt-3' style='text-align:center;'>\
//                     <img class='enquiry-box'  src='https://img.freepik.com/free-vector/no-data-concept-illustration_114360-616.jpg?w=740&t=st=1697721514~exp=1697722114~hmac=1c686beab542a2ba73188f309dd1107f755b514facbd67909dee49d0070511cb' style='max-width:400px; width:100%; height:auto; '  />\
//                     </div>";
//                 }else{
//                     for (var i = 0; i < decode_data['msg'].length; i++) {
//                         var item = decode_data['msg'][i];
                        
//                         let mobile = item.mobile;
//                         let email = item.email;
//                         let hiddenMobile = mobile.substr(0, 2) + '********';
    
//                         let parts = email.split('@');
//                         let hiddenEmail = parts[0].charAt(0) + '***' + parts[0].charAt(parts[0].length - 1) + '@' + parts[1];

                        
                    
//                     htmlContent += "<div class='row justify-content-center mb-3'>\
//                                     <div class='col-md-12 col-sm-12' style='background: white; padding: 1em;    border-radius: 10px;    box-shadow: 0px 0px 6px -3px black;'>\
//                                         <div class='list-right-box'>\
//                                             <div class='row'>\
//                                                 <div class='col-lg-12 col-md-12 col-sm-12'>\
//                                                     <h5><b class='text-capitalize sooprs-pt'>" + item['project_title'] + "</b></h5>\
//                                                 </div>\
//                                             </div>\
//                                              <div class='skill-set'>\
//                                                 <p> " + item['service_name'] + "</p>\
//                                             </div>\
//                                              <div class='row'>\
//                                                 <div class='col-lg-12 col-md-12 col-sm-12'>\
//                                                     <p class='sooprs-desc'>" + item['description'] + "</p>\
//                                                 </div>\
//                                                 \
//                                             </div>\
//                                             \
//                                             <div class='row'>\
//                                                 <div class='col-lg-6 col-md-6 col-sm-6'>\
//                                                     <p class='sooprs-budget'>Budget: $" + item['min_budget'] + "-"+ item['max_budget_amount'] +" USD</p>\
//                                                 </div>\
//                                                 <div class='col-lg-6 col-md-6 col-sm-6'>\
//                                                     <form  method='post' action='' style='width:100px;float:right'>\
//                                                         <input type='hidden' name='lead_id' value='"+item['id']+"'>\
//                                                         <button type='submit' class='mt-2 view-prof-btn' name='view_lead_btn'>View</button>\
//                                                     </form>\
//                                                 </div>\
//                                             </div>\
//                                         </div>\
//                                     </div>\
//                                 </div>";
//                     }
//                 }
                

//                 element.innerHTML += htmlContent;

//             } else {

//                 $("#data-message").html("<p style='font-size: 13px;color: darkgrey;'>no  more leads</p>");
//                 $("#load-more-leads").hide();
//             }


//         }
//     });
// }

// $('#load-more-leads').on('click', function () {
//     offset = offset + limit;
//     pagination_my_leads(offset, limit,my_get_id);
// });
// Laod all leads on scroll 21-05-23






/* =============Review link send ============= */
$("#review_link_btn").on('click', function(){
    // event.preventDefault();
    $('#mail-sent-loader').css('display', 'inline-block');

    let p_id = $(this).data("variable");
    let c_id = $(this).data("cid");
    let c_mail = $(this).data("mail");
    let lead = $(this).data("lead");



    
    $.ajax({
        url: site_url+"/api2/public/index.php/send_review_link",
        type: "POST",
        data: JSON.stringify({
            p_id: p_id ,
            c_id: c_id,
            c_mail: c_mail,
            lead: lead


        }),
        contentType: "application/json",
        cache: false,
        processData: false,
        success: function (data)
        {
            // console.log(data);
            $('#mail-sent-loader').css('display', 'none');
            // $('#loginForm').toggle('slow'); 

           
        }
    });
});
/* =============Review link send ============= */



function is_seen(notiId,user_type,notification_type,lead_id,bid_id) {
    // Your existing is_seen function code here
    $.ajax({
        url: site_url+"/api2/public/index.php/updateIsseen",
        type: "POST",
        data: JSON.stringify({
            notiId: notiId ,
        }),
        contentType: "application/json",
        cache: false,
        processData: false,
        success: function (data)
        {
            let decode_data = JSON.parse(data, true);
            if(decode_data['status'] == 200){                
                if(notification_type == 3){
                    // window.location.href = site_url+'/project-detail/'+lead_id+'/'+bid_id;
                    if(user_type == 0){
                        window.location.href = site_url+'/my-leads';
                    }else{
                        window.location.href = site_url+'/my-queries';
                    }
                }else {
                    if(user_type == 0){
                        window.location.href = site_url+'/my-leads';
                    }else{
                        window.location.href = site_url+'/my-queries';
                    }
                }
                // console.log("went wrong");              
            }else{
                location.reload();


            }
            // $('#loginForm').toggle('slow'); 

           
        }
    });

    // Additional code if needed
}




function handleIsseenClick(event,notiId,notification_type,user_type,lead_id=null,bid_id=null) {
    // Prevent the default behavior of the anchor link
    event.preventDefault();

    // Call the is_seen function
    is_seen(notiId,user_type,notification_type,lead_id,bid_id);

}

// auto update year in footer 
 var currentYear = new Date().getFullYear();
 document.getElementById("footerYear").innerText = currentYear;



// var accpt_button = document.getElementById("lead-id");
// accpt_button.addEventListener("click", accept_lead);


// multiple images upload for portfolio 


function eraseCookie(name) {
    document.cookie = name + '=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;';

}
function comma_to_array(string){
    if (string.indexOf(',') > -1) { return string.split(',') }
    }