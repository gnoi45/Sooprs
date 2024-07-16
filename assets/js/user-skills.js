$('#addSkillForm').submit(function(e) {
    e.preventDefault(); // Prevent the form from submitting in the traditional way
    showLoader();
    var formData = {
        skill: $('#addSkillForm #skills_list').val(),
        profid: $('#profid').val()
    };

    $.ajax({
        type: 'POST',
        url: site_url+'/api2/public/index.php/addSkillForm', // Replace with your PHP file path
        data: formData,
        success: function(response) {

            $("#addSkillModal").modal("hide");
            var jsonResponse = JSON.parse(response);
            var message = jsonResponse.msg; 
            var status = jsonResponse.status;            

            if(status == 200){
                hideLoader();                
                $('#error_message').text(message);
                $('.toast').toast('show');
            }
            if(status == 400){
                hideLoader();                
                $('#error_message').text(message);
                $('.toast').toast('show');
            }
            setTimeout(function(){
                location.reload();
            }, 1000);           
        }
    });
});


var circleXmarksSkill = document.querySelectorAll(".remove-skill");

function removeSkill(event) {    
    showLoader();
    var clickedButton = event.target;
    var dataSkillValue = clickedButton.dataset.skillid;
    var dataPrfValue = clickedButton.dataset.prfid;

    $.ajax({
        url: site_url+"/api2/public/index.php/remove_professional_skill",
        method: "POST",
        data: {
            dataSkillValue: dataSkillValue,
            dataPrfValue: dataPrfValue
        },
        success: function (response) {
            var jsonResponse = JSON.parse(response);
            var message = jsonResponse.msg; 
            var status = jsonResponse.status;      

            var parentSpan = clickedButton.parentElement;
            parentSpan.remove(); // Remove the whole <span> element
            
            if(status == 200){
                hideLoader();                
                $('#error_message').text(message);
                $('.toast').toast('show');
            }
            if(status == 400){
                hideLoader();
                $('#error_message').text(message);
                $('.toast').toast('show');
            }
        },
        error: function (xhr, status, error) {
            // Handle error
            console.log("Error:", error);
        }

    });
}

circleXmarksSkill.forEach(function (button) {
    button.addEventListener("click", removeSkill);
});