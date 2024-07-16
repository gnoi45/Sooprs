var my_get_id = $('#professional-data-id').data("variable");
// var get_val = 109;
// var get_id = 2;
let offsetm = 0;
let limitm = 10;

// Laod all my leads  on scroll 21-05-23
pagination_my_leads(offsetm, limitm,my_get_id);

function pagination_my_leads(offsetm, limitm,my_get_id) {    

    $.ajax({
        url: site_url+"/api2/public/index.php/get_my_leads",
        method: "POST",
        cache: false,
        data: { 
            offset: offsetm, 
            limit: limitm,
            
            my_get_id:my_get_id
         },
        success: function (data) {

            let decode_data = JSON.parse(data, true);

            var element = document.getElementById("my-leads-data");
            var htmlContent = "";

            if (decode_data['status'] == 200) {

                if(decode_data['msg'].length == 0){
                    htmlContent += "<div class=' col-sm-12 mt-3' style='text-align:center;'>\
                    <img class='enquiry-box'  src='https://img.freepik.com/free-vector/no-data-concept-illustration_114360-616.jpg?w=740&t=st=1697721514~exp=1697722114~hmac=1c686beab542a2ba73188f309dd1107f755b514facbd67909dee49d0070511cb' style='max-width:400px; width:100%; height:auto; '  />\
                    </div>";
                }else{
                    for (var i = 0; i < decode_data['msg'].length; i++) {
                        var item = decode_data['msg'][i];
                        
                        let mobile = item.mobile;
                        let email = item.email;
                        let hiddenMobile = mobile.substr(0, 2) + '********';
    
                        let parts = email.split('@');
                        let hiddenEmail = parts[0].charAt(0) + '***' + parts[0].charAt(parts[0].length - 1) + '@' + parts[1];

                        
                    
                    htmlContent += "<div class='row justify-content-center mb-3'>\
                                    <div class='col-md-12 col-sm-12' style='background: white; padding: 1em;    border-radius: 10px;    box-shadow: 0px 0px 6px -3px black;'>\
                                        <div class='list-right-box'>\
                                            <div class='row'>\
                                                <div class='col-lg-12 col-md-12 col-sm-12 d-flex justify-content-between'>\
                                                    <h5><b class='text-capitalize sooprs-pt'>" + item['project_title'] + "</b></h5>\
                                                    <a href='" + site_url + "/project-detail/" + item['id'] + "/" + item['bid_id'] + "' target='_blank'><span>&nbsp;<i class='fa-regular fa-message text-primary' title='chat a little'></i></span></a>\
                                                </div>\
                                            </div>\
                                             <div class='skill-set'>\
                                                <p> " + item['service_name'] + "</p>\
                                            </div>\
                                             <div class='row'>\
                                                <div class='col-lg-12 col-md-12 col-sm-12'>\
                                                    <p class='sooprs-desc'>" + item['description'] + "</p>\
                                                </div>\
                                                \
                                            </div>\
                                            \
                                            <div class='row'>\
                                                <div class='col-lg-12 col-md-12 col-sm-12 d-flex justify-content-between align-items-center'>\
                                                    <b class='sooprs-budget'>Budget: $" + item['min_budget'] + "-"+ item['max_budget_amount'] +" USD</b>\
                                                    <div >\
                                                        <form  method='post' action='' style='float:right'>\
                                                            <input type='hidden' name='lead_id' value='"+item['id']+"'>\
                                                            <button type='submit' class=' view-prof-btn' name='view_lead_btn'><i class='fa-solid fa-arrow-right'></i></button>\
                                                        </form>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>";
                    }
                }
                

                element.innerHTML += htmlContent;

            } else {

                $("#data-message").html("<p style='font-size: 13px;color: darkgrey;'>no  more leads</p>");
                $("#load-more-leads").hide();
            }


        }
    });
}

$('#load-more-leads').on('click', function () {
    offsetm = offsetm + limitm;
    pagination_my_leads(offsetm, limitm,my_get_id);
});


$('.cat-heading-myleads .service').click(function (event) {

    var elementToRemoveClass = document.querySelector('.clicked');
    elementToRemoveClass.classList.remove('clicked');
    event.target.classList.add('clicked');
    var dataValue = $(this).data('value');
    $("#data-message").html("");

    if(dataValue == 0){
        location.reload();
    }

    $.ajax({
        url: site_url+"/api2/public/index.php/filter_myleads_ajax",
        method: "POST",
        data: { 
            dataValue: dataValue ,
            my_get_id: my_get_id 

        },
        success: function (data) {

            let decode_data = JSON.parse(data, true);

            var element = document.getElementById("my-leads-data");
            var htmlContent = "";
            element.innerHTML = "";

            if (decode_data['status'] == 200) {

                if(decode_data['msg'].length == 0){
                    htmlContent += "<div class=' col-sm-12 mt-3' style='text-align:center;'>\
                    <img class='enquiry-box'  src='https://img.freepik.com/free-vector/no-data-concept-illustration_114360-616.jpg?w=740&t=st=1697721514~exp=1697722114~hmac=1c686beab542a2ba73188f309dd1107f755b514facbd67909dee49d0070511cb' style='max-width:400px; width:100%; height:auto; '  />\
                    </div>";
                }else{
                    for (var i = 0; i < decode_data['msg'].length; i++) {
                        var item = decode_data['msg'][i];
                        
                        let mobile = item.mobile;
                        let email = item.email;
                        let hiddenMobile = mobile.substr(0, 2) + '********';
    
                        let parts = email.split('@');
                        let hiddenEmail = parts[0].charAt(0) + '***' + parts[0].charAt(parts[0].length - 1) + '@' + parts[1];

                        
                    
                    htmlContent += "<div class='row justify-content-center mb-3'>\
                                    <div class='col-md-12 col-sm-12' style='background: white; padding: 1em;    border-radius: 10px;    box-shadow: 0px 0px 6px -3px black;'>\
                                        <div class='list-right-box'>\
                                            <div class='row'>\
                                                <div class='col-lg-12 col-md-12 col-sm-12 d-flex justify-content-between'>\
                                                    <h5><b class='text-capitalize sooprs-pt'>" + item['project_title'] + "</b></h5>\
                                                    <a href='" + site_url + "/project-detail/" + item['id'] + "/" + item['bid_id'] + "' target='_blank'><span>&nbsp;<i class='fa-regular fa-message text-primary' title='chat a little'></i></span></a>\
                                                </div>\
                                            </div>\
                                             <div class='skill-set'>\
                                                <p> " + item['service_name'] + "</p>\
                                            </div>\
                                             <div class='row'>\
                                                <div class='col-lg-12 col-md-12 col-sm-12'>\
                                                    <p class='sooprs-desc'>" + item['description'] + "</p>\
                                                </div>\
                                                \
                                            </div>\
                                            \
                                            <div class='row'>\
                                                <div class='col-lg-12 col-md-12 col-sm-12 d-flex justify-content-between align-items-center'>\
                                                    <b class='sooprs-budget'>Budget: $" + item['min_budget'] + "-"+ item['max_budget_amount'] +" USD</b>\
                                                    <div >\
                                                        <form  method='post' action='' style='float:right'>\
                                                            <input type='hidden' name='lead_id' value='"+item['id']+"'>\
                                                            <button type='submit' class=' view-prof-btn' name='view_lead_btn'><i class='fa-solid fa-arrow-right'></i></button>\
                                                        </form>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>";
                    }
                }
                

                element.innerHTML += htmlContent;

            } else {

                $("#data-message").html("<p style='font-size: 13px;color: darkgrey;'>no  more leads</p>");
                $("#load-more-leads").hide();
            }


        }
    });



    
});



    // document.getElementById("service-all").addEventListener("click", function() {
    //     location.reload(); // Reload the page
    // });

    // document.getElementById("service-all-mob").addEventListener("click", function() {
    // location.reload(); // Reload the page
    // });