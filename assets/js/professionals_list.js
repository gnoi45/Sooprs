// let site_url = "https://shopninja.in/sooprs";

// Laod all professionals through ajax
let offsett = 0;
let limitt = 10;

// const queryString = window.location.search;
// const urlParams = new URLSearchParams(queryString);
// const slug = urlParams.get('slug');
// let cat_slug = slug;
// console.log(cat_slug);
//var cat_slug = getQueryParam('slug');
//console.log(cat_slug);
// console.log(slug);

showLoader();

pagination_scroll(offsett, limitt);

function getQueryParam(name) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
}

function pagination_scroll(offsett, limitt) {
    $.ajax({
        url: site_url+'/api2/public/index.php/get_professionals_ajax2',
        method: "POST",
        cache: false,
        data: { offset: offsett, limit: limitt, cat_id:slug },
        success: function (data) {
            hideLoader();
            let decode_data = JSON.parse(data, true);
            var element = document.getElementById("pills-professionals");
            var element2 = document.getElementById("pills-professionals-grid-col");

            var htmlContent = "";
            var htmlContent2 = "";

            if (decode_data['status'] == 200) {
                for (var i = 0; i < decode_data['msg'].length; i++) {
                    var item = decode_data['msg'][i];
                   var skills = item['services'];    
                   var description = '';  
                   if(item[2] == null){
                       description = '';            
                   }else{
                    description = item[2];
                   }

                //    var avgRating = '';  
                   let avgRating = item['avgrating'] ? "<i class='fa-solid fa-star'></i>"+item['avgrating']+"/5.0 Rating" : "";

                   
                  
                    let user__name = item['data']['name'];
                   let firstLetter = user__name[0].toUpperCase();
                   
                   const colorNameMap = {
                        A: 'aquamarine',
                        B: 'blue',
                        C: 'cadetblue',
                        D: 'darkgoldenrod',
                        E: 'bisque',
                        F: 'firebrick',
                        G: 'gold',
                        H: 'hotpink',
                        I: 'indianred',
                        J: 'navajowhite',
                        K: 'khaki',
                        L: 'lavender',
                        M: 'magenta',
                        N: '#0000895e',
                        O: 'orange',
                        P: 'palegreen',
                        Q: 'olivedrab',
                        R: 'red',
                        S: 'salmon',
                        T: 'tan',
                        U: 'deepskyblue',
                        V: 'blueviolet',
                        W: 'rosybrown',                        
                        Y: 'bisque',
                        

                    };

                    let colorName = colorNameMap[firstLetter] || '#006aff';
                    let image__url = item['data']['image'];
                   let image_or_letter = image__url ? "<img src='"+ item['data']['image'] + "' alt='professional-image' style='height:inherit;width:inherit;'>" : "<p class='d-flex justify-content-center align-items-center' style='font-size: 4rem;background-color:"+colorName+";width: -webkit-fill-available;height:inherit;border-radius: 50%;'>" + firstLetter + " </p>";
                  

                   var skillsParagraph = document.createElement('p');
                    // skillsParagraph.style = 'color: grey;';
                    skillsParagraph.className = 'skills__spans';

                    // Iterate over skills and create a <span> for each skill
                    if(skills != null){
                        skills.forEach(function(skill) {
                        var span = document.createElement('span');                        
                        span.textContent = skill;
                        skillsParagraph.appendChild(span);
                    });
                    }

                    // Assuming the item is a string, you can customize this part based on your response structure
                    htmlContent += "<div class='row justify-content-center mb-4 '>\
                                        <div class='col-md-3 col-sm-12'>\
                                            <div class='img-box-white' style=''>\
                                                <div class='image-round-bg' style=''>\
                                                    "+image_or_letter+"\
                                                </div>\
                                            </div>\
                                        </div>\
                                        <div class='col-md-9 col-sm-12' style='background: white; padding: 27px;    border-radius: 10px;    box-shadow: 0px 0px 6px -3px black;'>\
                                            <div class='list-right-box'>\
                                                <div class='row'>\
                                                    <div class='col-lg-10 col-md-10 col-sm-12'>\
                                                        <p class='text-capitalize' style=' font-size: 25px;font-weight: 700; margin-bottom: 0; color: #343C6A;'> "+ item['data']['name'] + " </p>\
                                                        <div>" +skillsParagraph.outerHTML + " </div>\
                                                    </div>\
                                                    <div class='col-lg-2 col-md-2 col-sm-12' style=' text-align: end;'>\
                                                        <p style='color: #237fff;font-size: 14px;'><i class='fad fa fa-check-circle me-2' style='--fa-primary-color: #00b303; --fa-secondary-color: #000000; --fa-secondary-opacity: 0.8;  '></i>Verified</p>\
                                                    </div>\
                                                </div>\
                                                <p class='mt-2' style='    font-size: 14px;color: grey;'> " + item['string_cut'] + "...</p>\
                                                <div class='row mt-3 align-items-center'>\
                                                    <div class='col-md-12 col-sm-12 d-flex justify-content-between'  style=' align-items: baseline;'>\
                                                        <div class='d-flex align-items-center' style='font-size: 13px;'>\
                                                            "+avgRating+"\
                                                        </div>\
                                                        <div class='col-md-6 col-sm-6' style=' text-align: end;'>\
                                                            <a href='"+site_url+"/professional/"+ item['data']['slug'] + "'><button class='mt-2 view-prof-btn'><i class='fa-solid fa-arrow-right text-primary'></i></button></a>\
                                                        </div>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                        </div>";

                    htmlContent2 += "<div class='col-md-4 col-sm-12 mt-3  '>\
                                        <div class='text-center  bg-light' style=' padding: 15px;    border-radius: 10px; position:relative;   height: 100%;box-shadow: 0px 0px 7px -3px black;'>\
                                            <div class='profile-image ' style='display: flex;flex-direction: column;align-items: center;'>\
                                                <div class='image-round-box' >\
                                                "+image_or_letter+"\
                                                </div>\
                                                <div class='grid-box-text text-capitalize'>\
                                                    <p> "+ item['data']['name'] + "</p>\
                                                    <p> " + item['string_cut'] + "...</p>\
                                                    <p>Verified</p>\
                                                    <p>"+avgRating+"</p>\
                                                </div>\
                                            </div>\
                                            <p style=' font-size: 12px; text-align: initial; color: grey;'></p>\
                                            <a href='"+site_url+"/professional/"+ item['data']['slug'] + "' style='position: absolute; right: 10px;bottom: 10px;'>\
                                            <button class='mt-2 view-prof-btn'>View</button>\
                                            </a>\
                                        </div>\
                                    </div>";
                }
                element.innerHTML += htmlContent;
                element2.innerHTML += htmlContent2;
                
            } else {
                $("#data-message").html("no  more professionals");
                // element.innerHTML = "<div class='d-flex justify-content-center align-items-center'><img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1703768248/not-found_sao2fh.webp' style='width:300px;' ></div>";
                // element2.innerHTML = "<div class='d-flex justify-content-center align-items-center'><img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1703768248/not-found_sao2fh.webp' style='width:300px;' ></div>";
                $("#load-more").hide();
            }

        }
    });
}


$('#load-more').on('click', function () {    
    offsett = offsett + limitt;
    pagination_scroll(offsett, limitt);
});
// Laod all professionals through ajax


$("#submit").click(function () {
    var query = $("#live_search").val();
    if (query != "") {
        $.ajax({
            url: site_url+"/api2/public/index.php/ajax-live-search",
            method: 'POST',
            data: {
                query: query
            },
            success: function (data) {
                let decode_data = JSON.parse(data, true);
                var element = document.getElementById("pills-professionals");
                var element2 = document.getElementById("pills-professionals-grid-col");

                var htmlContent = "";
                var htmlContent2 = "";

                if (decode_data['status'] == 200) {
                    element.innerHTML = "";
                    element2.innerHTML = "";

                    for (var i = 0; i < decode_data['msg'].length; i++) {
                        var item = decode_data['msg'][i];

                        var skills = item['services'];         
                        
                        var description = '';  
                            if(item[2] == null){

                                description = '';            
                            }else{
                                description = item[2];            

                            }
              
                   let avgRating = item['avgrating'] ? "<i class='fa-solid fa-star'></i>"+item['avgrating']+"/5.0 Rating" : "";


                            let user__name = item['data']['name'];
                        let firstLetter = user__name[0].toUpperCase();
                        
                        const colorNameMap = {
                                A: 'aquamarine',
                                B: 'blue',
                                C: 'cadetblue',
                                D: 'darkgoldenrod',
                                E: 'bisque',
                                F: 'firebrick',
                                G: 'gold',
                                H: 'hotpink',
                                I: 'indianred',
                                J: 'navajowhite',
                                K: 'khaki',
                                L: 'lavender',
                                M: 'magenta',
                                N: '#0000895e',
                                O: 'orange',
                                P: 'palegreen',
                                Q: 'olivedrab',
                                R: 'red',
                                S: 'salmon',
                                T: 'tan',
                                U: 'deepskyblue',
                                V: 'blueviolet',
                                W: 'rosybrown',                        
                                Y: 'bisque',
                                

                            };

                            let colorName = colorNameMap[firstLetter] || '#006aff';
                            let image__url = item['data']['image'];
                        let image_or_letter = image__url ? "<img src='"+ item['data']['image'] + "' alt='professional-image' style='height:inherit;width:inherit;'>" : "<p style='font-size: 4rem;background-color:"+colorName+";width: -webkit-fill-available;height:inherit;border-radius: 50%;' class='d-flex justify-content-center align-items-center'>" + firstLetter + " </p>";
                        

                        var skillsParagraph = document.createElement('p');
                            // skillsParagraph.style = 'color: grey;';
                            skillsParagraph.className = 'skills__spans';

                            // Iterate over skills and create a <span> for each skill
                            skills.forEach(function(skill) {
                                var span = document.createElement('span');                        
                                span.textContent = skill;
                                skillsParagraph.appendChild(span);
                            });

                        // Assuming the item is a string, you can customize this part based on your response structure
                        htmlContent += "<div class='row justify-content-center mb-4'>\
                                            <div class='col-md-3 col-sm-12'>\
                                                <div class='img-box-white' style=''>\
                                                    <div class='image-round-bg' style=''>\
                                                        "+image_or_letter+"\
                                                    </div>\
                                                </div>\
                                            </div>\
                                            <div class='col-md-9 col-sm-12' style='background: white; padding: 27px;    border-radius: 10px;    box-shadow: 0px 0px 6px -3px black;'>\
                                                <div class='list-right-box'>\
                                                    <div class='row'>\
                                                        <div class='col-lg-10 col-md-10 col-sm-12'>\
                                                            <p class='text-capitalize' style=' font-size: 25px;font-weight: 700; margin-bottom: 0; color: #343C6A;'> "+ item['data']['name'] + " </p>\
                                                            <div>" +skillsParagraph.outerHTML + " </div>\
                                                        </div>\
                                                        <div class='col-lg-2 col-md-2 col-sm-12' style=' text-align: end;'>\
                                                            <p style='color: #237fff;font-size: 14px;'><i class='fad fa fa-check-circle me-2' style='--fa-primary-color: #00b303; --fa-secondary-color: #000000; --fa-secondary-opacity: 0.8;  '></i>Verified</p>\
                                                        </div>\
                                                    </div>\
                                                    <p class='mt-2' style='    font-size: 14px;color: grey;'> " + item['string_cut'] + "... </p>\
                                                    <div class='row mt-3 align-items-center'>\
                                                        <div class='col-md-12 col-sm-12 d-flex justify-content-between'  style=' align-items: baseline;'>\
                                                            <div class='d-flex align-items-center' style='font-size: 13px;'>\
                                                            "+avgRating+"\
                                                            </div>\
                                                            <div class='col-md-6 col-sm-6' style=' text-align: end;'>\
                                                                <a href='"+site_url+"/professional/"+ item['data']['slug'] + "'><button class='mt-2 view-prof-btn'> <i class='fa-solid fa-arrow-right text-primary' ></i></button></a>\
                                                            </div>\
                                                        </div>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                            </div>";

                        htmlContent2 += "<div class='col-md-4 col-sm-12 mt-3  '>\
                                        <div class='text-center  bg-light' style=' padding: 15px;    border-radius: 10px; position:relative;   height: 100%;box-shadow: 0px 0px 7px -3px black;'>\
                                            <div class='profile-image ' style='display: flex;flex-direction: column;align-items: center;'>\
                                                <div class='image-round-box' >\
                                                "+image_or_letter+"\
                                                </div>\
                                                <div class='grid-box-text text-capitalize'>\
                                                    <p> "+ item['data']['name'] + "</p>\
                                                    <p> " + item['string_cut'] + "...</p>\
                                                    <p>Verified</p>\
                                                    <p>"+avgRating+"</p>\
                                                </div>\
                                            </div>\
                                            <p style=' font-size: 12px; text-align: initial; color: grey;'></p>\
                                            <a href='"+site_url+"/professional/"+ item['data']['slug'] + "' style='position: absolute; right: 10px;bottom: 10px;'>\
                                            <button class='mt-2 view-prof-btn'>View</button>\
                                            </a>\
                                        </div>\
                                    </div>";
                    }
                    element.innerHTML += htmlContent;
                    element2.innerHTML += htmlContent2;
                } else {

                   
                    element.innerHTML = "<div class='d-flex justify-content-center align-items-center'><img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1703768248/not-found_sao2fh.webp' style='width:300px;' ></div>";
                    element2.innerHTML = "<div class='d-flex justify-content-center align-items-center'><img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1703768248/not-found_sao2fh.webp' style='width:300px;' ></div>";
                    // $("#data-message").html("no  more professionals");
                    $("#load-more").hide();
                }

            }
        });
    } else {
        $('#search_result').css('display', 'none');
    }
});

$("#submit-mob").click(function () {
    var query = $("#search-mob").val();
    if (query != "") {
        $.ajax({
            url: site_url+"/api2/public/index.php/ajax-live-search",
            method: 'POST',
            data: {
                query: query
            },
            success: function (data) {
                let decode_data = JSON.parse(data, true);
                var element = document.getElementById("pills-professionals");
                var element2 = document.getElementById("pills-professionals-grid-col");

                var htmlContent = "";
                var htmlContent2 = "";

                if (decode_data['status'] == 200) {
                    element.innerHTML = "";
                    element2.innerHTML = "";

                    for (var i = 0; i < decode_data['msg'].length; i++) {
                        var item = decode_data['msg'][i];
                        var skills = item['services'];    
                        
                        var description = '';  
                        if(item[2] == null){

                            description = '';            
                        }else{
                            description = item[2];            

                        }

                   let avgRating = item['avgrating'] ? "<i class='fa-solid fa-star'></i>"+item['avgrating']+"/5.0 Rating" : "";

                  
                        let user__name = item['data']['name'];
                       let firstLetter = user__name[0].toUpperCase();
                       
                       const colorNameMap = {
                            A: 'aquamarine',
                            B: 'blue',
                            C: 'cadetblue',
                            D: 'darkgoldenrod',
                            E: 'bisque',
                            F: 'firebrick',
                            G: 'gold',
                            H: 'hotpink',
                            I: 'indianred',
                            J: 'navajowhite',
                            K: 'khaki',
                            L: 'lavender',
                            M: 'magenta',
                            N: '#0000895e',
                            O: 'orange',
                            P: 'palegreen',
                            Q: 'olivedrab',
                            R: 'red',
                            S: 'salmon',
                            T: 'tan',
                            U: 'deepskyblue',
                            V: 'blueviolet',
                            W: 'rosybrown',                        
                            Y: 'bisque',
                            
    
                        };
    
                        let colorName = colorNameMap[firstLetter] || '#006aff';
                        let image__url = item['data']['image'];
                       let image_or_letter = image__url ? "<img src='"+ item['data']['image'] + "' alt='professional-image' style='height:inherit;width:inherit;'>" : "<p class='d-flex justify-content-center align-items-center' style='font-size: 4rem;background-color:"+colorName+";width: -webkit-fill-available;height:inherit;border-radius: 50%;'>" + firstLetter + " </p>";
                      
    
                       var skillsParagraph = document.createElement('p');
                        // skillsParagraph.style = 'color: grey;';
                        skillsParagraph.className = 'skills__spans';
    
                        // Iterate over skills and create a <span> for each skill
                        skills.forEach(function(skill) {
                            var span = document.createElement('span');                        
                            span.textContent = skill;
                            skillsParagraph.appendChild(span);
                        });
                        // Assuming the item is a string, you can customize this part based on your response structure
                        htmlContent += "<div class='row justify-content-center mb-4'>\
                                            <div class='col-md-4 col-sm-12'>\
                                                <div class='img-box-white' style=''>\
                                                    <div class='image-round-bg' style=''>\
                                                    "+image_or_letter+"\
                                                    </div>\
                                                </div>\
                                            </div>\
                                            <div class='col-md-8 col-sm-12' style='background: white; padding: 27px;    border-radius: 10px;    box-shadow: 0px 0px 6px -3px black;'>\
                                                <div class='list-right-box'>\
                                                    <div class='row'>\
                                                        <div class='col-lg-10 col-md-10 col-sm-12'>\
                                                            <p class='text-capitalize' style=' font-size: 25px;font-weight: 700; margin-bottom: 0; color: #343C6A;'> "+ item['data']['name'] + " </p>\
                                                            <div>" +skillsParagraph.outerHTML + " </div>\
                                                        </div>\
                                                        <div class='col-lg-2 col-md-2 col-sm-12' style=' text-align: end;'>\
                                                            <p style='color: #237fff;font-size: 14px;'><i class='fad fa fa-check-circle me-2' style='--fa-primary-color: #00b303; --fa-secondary-color: #000000; --fa-secondary-opacity: 0.8;  '></i>Verified</p>\
                                                        </div>\
                                                    </div>\
                                                    <p class='mt-2' style='    font-size: 14px;color: grey;'> " + item['string_cut'] + "... </p>\
                                                    <div class='row mt-3 align-items-center'>\
                                                        <div class='col-md-12 col-sm-12 d-flex justify-content-between'  style=' align-items: baseline;'>\
                                                            <div class='d-flex align-items-center' style='font-size: 13px;'>\
                                                            "+avgRating+"\
                                                            </div>\
                                                            <div class='col-md-6 col-sm-6' style=' text-align: end;'>\
                                                                <a href='"+site_url+"/professional/"+ item['data']['slug'] + "'><button class='mt-2 view-prof-btn'><i class='fa-solid fa-arrow-right text-primary' style='color: #ffffff;'></i></button></a>\
                                                            </div>\
                                                        </div>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                            </div>";

                        htmlContent2 += "<div class='col-md-4 col-sm-12 mt-3  '>\
                                            <div class='text-center  bg-light' style=' padding: 15px;    border-radius: 10px; position:relative;   height: 100%;box-shadow: 0px 0px 7px -3px black;'>\
                                                <div class='profile-image d-flex justify-content-center align-items-center'>\
                                                    <div class='image-round-box' >\
                                                    "+image_or_letter+"\
                                                    </div>\
                                                    <div class='grid-box-text text-capitalize'>\
                                                        <p> "+ item['data']['name'] + "</p>\
                                                        <p> " + item['string_cut'] + "...</p>\
                                                        <p>Verified</p>\
                                                        <p>"+avgRating+"\</p>\
                                                    </div>\
                                                </div>\
                                                <p style=' font-size: 12px; text-align: initial; color: grey;'></p>\
                                                <a href='"+site_url+"/professional/"+ item['data']['slug'] + "' style='position: absolute; right: 10px;bottom: 10px;'>\
                                                <button class='mt-2 view-prof-btn'>View</button>\
                                                </a>\
                                            </div>\
                                        </div>";
                    }
                    element.innerHTML += htmlContent;
                    element2.innerHTML += htmlContent2;
                } else {
                    element.innerHTML = "<div class='d-flex justify-content-center align-items-center'><img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1703768248/not-found_sao2fh.webp' style='width:300px;' ></div>";
                    element2.innerHTML = "<div class='d-flex justify-content-center align-items-center'><img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1703768248/not-found_sao2fh.webp' style='width:300px;' ></div>";
                    $("#load-more").hide();
                }

            }
        });
    } else {
        $('#search_result').css('display', 'none');
    }
});


function showLoader() {
    document.getElementById('loader').style.display = 'flex';
}

function hideLoader() {
    document.getElementById('loader').style.display = 'none';
}



// "All" button pre clicked
window.addEventListener('load', function () {
    (function () {

        var all_button = document.getElementById('service-all');
        all_button.classList.add('clicked');
    })();
});
// "All" button pre clicked


// Filter professionals acc. to services
$('.cat-heading-professionals .service').click(function (event) {

    var elementToRemoveClass = document.querySelector('.clicked');
    elementToRemoveClass.classList.remove('clicked');
    event.target.classList.add('clicked');
    var dataValue = $(this).data('value');
    $("#data-message").html("");

    $.ajax({
        url: site_url+"/api2/public/index.php/filter_service_ajax",
        method: "POST",
        data: { dataValue: dataValue },
        success: function (data) {
            $("#load-more").hide();
            let decode_data = JSON.parse(data, true);
            
            var element = document.getElementById("pills-professionals");
            var htmlContent = "";
            var element2 = document.getElementById("pills-professionals-grid-col");
            var htmlContent2 = "";

            element.innerHTML = "";
            element2.innerHTML = "";

            if (decode_data['status'] == 200) {
                for (var i = 0; i < decode_data['msg'].length; i++) {
                    var item = decode_data['msg'][i];
                   var skills = item['services'];     
                   
                   var description = '';  
                   if(item[2] == null){

                       description = '';            
                   }else{
                    description = item[2];            

                   }

                   let avgRating = item['avgrating'] ? "<i class='fa-solid fa-star'></i>"+item['avgrating']+"/5.0 Rating" : "";

                  
                    let user__name = item['data']['name'];
                   let firstLetter = user__name[0].toUpperCase();
                   
                   const colorNameMap = {
                        A: 'aquamarine',
                        B: 'blue',
                        C: 'cadetblue',
                        D: 'darkgoldenrod',
                        E: 'bisque',
                        F: 'firebrick',
                        G: 'gold',
                        H: 'hotpink',
                        I: 'indianred',
                        J: 'navajowhite',
                        K: 'khaki',
                        L: 'lavender',
                        M: 'magenta',
                        N: '#0000895e',
                        O: 'orange',
                        P: 'palegreen',
                        Q: 'olivedrab',
                        R: 'red',
                        S: 'salmon',
                        T: 'tan',
                        U: 'deepskyblue',
                        V: 'blueviolet',
                        W: 'rosybrown',                        
                        Y: 'bisque',
                        

                    };

                    let colorName = colorNameMap[firstLetter] || '#006aff';
                    let image__url = item['data']['image'];
                   let image_or_letter = image__url ? "<img src='"+ item['data']['image'] + "' alt='' style='height:inherit;width:inherit;'>" : "<p class='d-flex justify-content-center align-items-center' style='font-size: 4rem;background-color:"+colorName+";width: -webkit-fill-available;height: inherit;border-radius: 50%;'>" + firstLetter + " </p>";
                  

                   var skillsParagraph = document.createElement('p');
                    // skillsParagraph.style = 'color: grey;';
                    skillsParagraph.className = 'skills__spans';

                    // Iterate over skills and create a <span> for each skill
                    skills.forEach(function(skill) {
                        var span = document.createElement('span');                        
                        span.textContent = skill;
                        skillsParagraph.appendChild(span);
                    });

                    // Assuming the item is a string, you can customize this part based on your response structure
                    htmlContent += "<div class='row justify-content-center mb-4'>\
                                        <div class='col-md-3 col-sm-12'>\
                                            <div class='img-box-white' style=''>\
                                                <div class='image-round-bg' style=''>\
                                                    "+image_or_letter+"\
                                                </div>\
                                            </div>\
                                        </div>\
                                        <div class='col-md-9 col-sm-12' style='background: white; padding: 27px;    border-radius: 10px;    box-shadow: 0px 0px 6px -3px black;'>\
                                            <div class='list-right-box'>\
                                                <div class='row'>\
                                                    <div class='col-lg-10 col-md-10 col-sm-12'>\
                                                        <p class='text-capitalize' style=' font-size: 25px;font-weight: 700; margin-bottom: 0; color: #343C6A;'> "+ item['data']['name'] + " </p>\
                                                        <div>" +skillsParagraph.outerHTML + " </div>\
                                                    </div>\
                                                    <div class='col-lg-2 col-md-2 col-sm-12' style=' text-align: end;'>\
                                                        <p style='color: #237fff;font-size: 14px;'><i class='fad fa fa-check-circle me-2' style='--fa-primary-color: #00b303; --fa-secondary-color: #000000; --fa-secondary-opacity: 0.8;  '></i>Verified</p>\
                                                    </div>\
                                                </div>\
                                                <p class='mt-2' style='    font-size: 14px;color: grey;'> " + item['string_cut'] + "... </p>\
                                                <div class='row mt-3 align-items-center'>\
                                                    <div class='col-md-12 col-sm-12 d-flex justify-content-between'  style=' align-items: baseline;'>\
                                                        <div class='d-flex align-items-center' style='font-size: 13px;'>\
                                                        "+avgRating+"\
                                                        </div>\
                                                        <div class='col-md-6 col-sm-6' style=' text-align: end;'>\
                                                            <a href='"+site_url+"/professional/"+ item['data']['slug'] + "'><button class='mt-2 view-prof-btn'><i class='fa-solid fa-arrow-right text-primary' style='color: #ffffff;'></i></button></a>\
                                                        </div>\
                                                    </div>\
                                                </div>\
                                            </div>\
                                        </div>\
                                        </div>";

                    htmlContent2 += "<div class='col-md-4 col-sm-12 mt-3  '>\
                                        <div class='text-center  bg-light' style=' padding: 15px;    border-radius: 10px; position:relative;   height: 100%;box-shadow: 0px 0px 7px -3px black;'>\
                                            <div class='profile-image ' style='display: flex;flex-direction: column;align-items: center;'>\
                                                <div class='image-round-box' >\
                                                "+image_or_letter+"\
                                                </div>\
                                                <div class='grid-box-text text-capitalize'>\
                                                    <p> "+ item['data']['name'] + "</p>\
                                                    <p> " + item['string_cut'] + "...</p>\
                                                    <p>Verified</p>\
                                                    <p>"+avgRating+"\</p>\
                                                </div>\
                                            </div>\
                                            <p style=' font-size: 12px; text-align: initial; color: grey;'></p>\
                                            <a href='"+site_url+"/professional/"+ item['data']['slug'] + "' style='position: absolute; right: 10px;bottom: 10px;'>\
                                            <button class='mt-2 view-prof-btn'>View</button>\
                                            </a>\
                                        </div>\
                                    </div>";
                }
                element.innerHTML += htmlContent;
                element2.innerHTML += htmlContent2;
                $('html, body').animate({scrollTop: 0}, 'slow');
            } else {
                element.innerHTML = "<div class='d-flex justify-content-center align-items-center'><img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1703768248/not-found_sao2fh.webp' style='width:300px;' ></div>";
                element2.innerHTML = "<div class='d-flex justify-content-center align-items-center'><img src='https://res.cloudinary.com/dr4iluda9/image/upload/v1703768248/not-found_sao2fh.webp' style='width:300px;' ></div>";
                $("#load-more").hide();
                $('html, body').animate({scrollTop: 0}, 'slow');
            }
        }
    });
});
// Filter professionals acc. to services 


const screenWidth = $(window).width();

if (screenWidth < 768) {
// Remove 'active' class from the first tab
$('#pills-professionals-tab').removeClass('active');

// Add 'active' class to the second tab
$('#pills-professionals-grid-tab').addClass('active');


// Remove 'active' class from the first content
$('#pills-professionals').removeClass('active');
$('#pills-professionals').removeClass('show');

// Add 'active' class to the second content
$('#pills-professionals-grid').addClass('active');
$('#pills-professionals-grid').addClass('show');

} 