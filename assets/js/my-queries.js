
let offsetq = 0;
let limitq = 10;

// Customer enquiries
function pagination_scroll_queries(variable, offsetq, limitq) {
    $.ajax({
        url: site_url+'/api2/public/index.php/get_enquiries_ajax',
        method: "POST",
        cache: false,
        data: { variable: variable, offset: offsetq, limit: limitq },
        success: function (data) {
            let decode_data = JSON.parse(data, true);
            // console.log(decode_data['msg']);
            var element = document.getElementById("enquiry-data");
            var htmlContent = "";
            if (decode_data['status'] == 200) {
                if(decode_data['msg'].length == 0){
                    htmlContent += "<p class='fs-2 text-secondary'><span class='text-danger'>No project</span> here. <span class='text-primary'>Add new</span> project</p><img class='enquiry-box' src='https://img.freepik.com/free-vector/no-data-concept-illustration_114360-616.jpg?w=740&t=st=1697721514~exp=1697722114~hmac=1c686beab542a2ba73188f309dd1107f755b514facbd67909dee49d0070511cb' style='width:100%; max-width:400px; height:auto; margin: auto; ' />";
                }else{
                    for (var i = 0; i < decode_data['msg'].length; i++) {
                        var item = decode_data['msg'][i];
                        // var faqdiv = "";
                        // for (let f = 0; f < item["faq"].length; f++) {
                        //     var faqitem = item["faq"][f];
                        //     faqdiv += "<div class='list-right-box'>\
                        //                     <hr>\
                        //                     <p class='fs-6 text-secondary'> "+ faqitem["question"] + "</p>\
                        //                     <p class='fs-6 text-secondary'> "+ faqitem["answer"] + "</p>\
                        //                     <p class='my-3' style='color: #006aff;'></p>\
                        //                 </div>";
                        // }
                        htmlContent += "<div class='col-md-4 col-sm-12 mt-3' >\
                                        <a href='enquiry-detail/"+ item['id'] + "' style='font-size:12px' id='show-enquiry-btn' class=''>\
                                            <div class='enquiry-box'>\
                                                <p class='text-end text-secondary mb-2' style='font-size:12px'> <i>Posted on: "+ item["formatCreatedAt"] + " </i></p>\
                                                    <h6 class='fw-bold text-capitalize'>"+ item['project_title'] + "</h6>\
                                                     <p class='text-secondary' style='font-size:0.8rem;    text-align: justify;'>"+ item['cutDesc'] + "...</p>\
                                                    <div  class='skill-set' style='    position: absolute;bottom: 5px;left: 10px;'>\
                                                        <p class=''>"+ item['service-name'] + "</p>\
                                                    </div>\
                                                <p class=' text-secondary p-2' style='font-size:13px;position: absolute;left: 5px;bottom: 35px;'><i class='fa-solid fa-circle-check' style='color: #478bff;'></i> "+ item['bids'] + " Professionals shown interest</p>\
                                                <p class='btn btn-primary btn-sm' style='font-size:0.7rem;position: absolute;bottom: 10px;right: 10px;'>Show details</p>\
                                            </div>\
                                        </a>\
                                        </div >";


                                        // <p class='text-end text-secondary' style='font-size:12px'> "+ item["days"]['days'] + " Days ago</p>\
    
                        
                    }

                    htmlContent += "<div class='col-md-4 col-sm-12 mt-3'>\
                    <div class='enquiry-box' style='padding: 15px; border-radius: 10px; position:relative; height: 100%; box-shadow: 0px 0px 7px -3px black; display:flex; justify-content:center; align-items:center;'>\
                        <a href="+site_url+"/post-a-project><i class='fa fa-plus-circle' style='font-size:60px; color:blue;'></i></a>\
                    </div>\
                </div>"
                }
                
                element.innerHTML += htmlContent;
            } else {
                element.innerHTML = "<img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1692700995/sooprs/no_result_found_ll5f4b.png' style='max-width:400px; height:auto; margin: auto;'>\
                <p>No Enquiry Found</p>";
            }


        }
    });
}




// pagination_scroll_queries(offsetq, limitq);


$('#load-more-queries').on('click', function () {
    var myDiv = document.getElementById("customer-data-id");
    var variable = myDiv.getAttribute("data-variable"); // Get the value of the data-variable attribute
    offsetq = offsetq + limitq;
    pagination_scroll_queries(variable, offsetq, limitq);
});


document.addEventListener("DOMContentLoaded", function () {
    var myDiv = document.getElementById("customer-data-id");
    
    var variable = myDiv.getAttribute("data-variable"); // Get the value of the data-variable attribute
    
    pagination_scroll_queries(variable, offsetq, limitq); // Call the JavaScript function and pass the variable
});
// Customer enquiries