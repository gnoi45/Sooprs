var custId = document.getElementById("cust_id").value;
var bidId = document.getElementById("bid_id").value;
var leadId = document.getElementById("lead_id").value;

function getChats() {



    $.ajax({
        url: site_url+'/api2/public/index.php/getChats',
        method: "POST",
        cache: false,
        data: { variable: variable, offset: offsetq, limit: limitq },
        success: function (data) {
            let decode_data = JSON.parse(data, true);
            // console.log(decode_data['msg']);
            var element = document.getElementById("enquiry-data");
            var htmlContent = "";
            if (decode_data['status'] == 200) {
                
            } else {
                
            }


        }
    });
}



getChats();