// Show all pages on site load on all-services page
$(window).on('load', function () {
   
    $.ajax({
        url: site_url+"/api2/public/index.php/sr_pages_all_data", // Url to which the request is send
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
                var pageContent = document.getElementById("all-services-row");

                new_data.msg.forEach(function(service) {
                    // console.log(service);
                    var serviceBox = document.createElement("div");
                    serviceBox.className = "col-lg-3 col-md-3 col-sm-12";
                    
                    var serviceBoxContent = `
                        <div class="service-box position-relative" style="background:url('service.backgroundImage');
                            background-position: center;
                            background-size: cover;
                            width: 250px;
                            height: 250px;">
                            <a href="service/">
                                <div class="profile-img-text ">
                                    <p style="font-size:22px;font-weight:500">${service.title}</p>
                                </div>
                                <div class="overlay"></div>
                            </a>
                        </div>
                    `;
                    
                    serviceBox.innerHTML = serviceBoxContent;
                    
                    pageContent.appendChild(serviceBox);
                });
            }else{

            }
            

        }



    });

});