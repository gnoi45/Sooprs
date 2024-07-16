
// pagination_scroll_leads(offset, limit);


// function pagination_scroll_leads(offset, limit) {
//     $.ajax({
//         url: site_url+'/api2/public/index.php/get_all_leads',
//         method: "POST",
//         cache: false,
//         data: { offset: offset, limit: limit },
//         success: function (data) {

//             let decode_data = JSON.parse(data, true);

//             var element = document.getElementById("leads-data");
//             var htmlContent = "";

//             if (decode_data['status'] == 200) {

//                 for (var i = 0; i < decode_data['msg'].length; i++) {
//                     var item = decode_data['msg'][i];


//                     let mobile = item.mobile;
//                         let email = item.email;
//                         let hiddenMobile = mobile.substr(0, 2) + '********';
    
//                         let parts = email.split('@');
//                         let hiddenEmail = parts[0].charAt(0) + '***' + parts[0].charAt(parts[0].length - 1) + '@' + parts[1];

//                     htmlContent += "<div class='row justify-content-center mb-3'>\
//                                     <div class='col-md-12 col-sm-12' style='background: white; padding: 1em;    border-radius: 10px;    box-shadow: 0px 0px 6px -3px black;'>\
//                                         <div class='list-right-box'>\
//                                             <div class='row'>\
//                                                 <div class='col-lg-10 col-md-10 col-sm-12'>\
//                                                     <h5><b class='text-capitalize sooprs-pt'>" + item['project_title'] + "</b></h5>\
//                                                 </div>\
//                                                 <div class='col-lg-2 col-md-2 col-sm-12'>\
//                                                     <p class='text-capitalize sooprs-bids'>" + item['num_leads'] +" "+ (item['num_leads'] <= 1 ? ' Bid' : ' Bids') + "</p>\
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
//                 }

//                 element.innerHTML += htmlContent;

//             } else {

//                 $("#data-message").html("no  more leads");
//                 $("#load-more-leads").hide();
//             }


//         }
//     });
// }




// $('#load-more-leads').on('click', function () {
//     offset = offset + limit;
//     pagination_scroll_leads(offset, limit);
// });