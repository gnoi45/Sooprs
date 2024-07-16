<?php

require_once 'includes/slim.inc.php';
error_reporting(0);
 
require_once 'includes/commonHelper.php';
include '../../env.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET,PUT,POST,DELETE,PATCH,OPTIONS');

// path to files folder
$files_path = $SITE_URL.'/assets/files/';
// vendor login // professional login
$app->post('/internlogin', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $email = $allGetVars['email'];
    $password = $allGetVars['password'];

 
    $helper = new commonHelper();
    $user = $helper->internlogin($email, $password);
    if($user == 2){
        $results['loginStatus'] = 400;
        $results['msg'] = 'No user found!';

    }
    else if ($user == 3) {
        $results['loginStatus'] = 400;
        $results['msg'] = 'Email and password are empty!';
    }
    else if ($user == 4) {
        $results['loginStatus'] = 400;
        $results['msg'] = 'Password does not match!';
    }
    else {
        $results['loginStatus'] = 200;
        $results['msg'] = $user;
    }

    return echoResponse($results);

    
});


//customer login
$app->post('/customerlogin', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $email = $allGetVars['email'];
    $password = $allGetVars['password'];

 
    $helper = new commonHelper();
    $user = $helper->customerlogin($email, $password);
    if($user == 2){
        $results['status'] = 400;
        $results['msg'] = 'No user found!';

    }
    else if ($user == 3) {
        $results['status'] = 400;
        $results['msg'] = 'Email and password are empty!';
    }
    else if ($user == 4) {
        $results['status'] = 400;
        $results['msg'] = 'Password is wrong!';
    }
    else {
        $results['status'] = 200;
        $results['msg'] = $user;
    }

    return echoResponse($results);

    
});

// vendor registration
$app->post('/customerRegistration', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $name = $allGetVars['name'];
    $email = $allGetVars['email'];
    $country = $allGetVars['country'];
    $mobile = $allGetVars['countryCode'].$allGetVars['mobile'];
    $password = $allGetVars['password'];
    $is_buyer = $allGetVars['is_buyer'];
    // $role = $allGetVars['role'];
    // return echoResponse([$name,$email,$country,$mobile,$password,$is_buyer]);

 
    $helper = new commonHelper();
    $user = $helper->customerRegis($name,$email,$mobile,$password, $is_buyer, $country);
   
    if($user == 1){
        $results['status'] = 400;
        $results['msg'] = 'name is too large';

    }
    else if ($user == 2) {
        $results['status'] = 400;
        $results['msg'] = 'Email does not match the proper format';
    }
    else if($user == 3){
        $results['status'] = 400;
        $results['msg'] = 'invalid mobile no';
    }else if($user == 4){
      $results['status'] = 400;
        $results['msg'] = 'Password must contain Uppercasse,Lowercase and Number'; 
    }else if($user == 5){
        $results['status'] = 400;
        $results['msg'] = 'This Customer Already Exist.Try with other email/mobile'; 
    }else if($user == 7){
        $results['status'] = 400;
        $results['msg'] = 'error'; 
    }else{
        $results['status'] = 200;
        $results['msg'] = 'ok';  
        
    }

    return echoResponse($results);

    
});

// vendor registration
$app->post('/verifyOtp', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    
    $email = $allGetVars['email'];
    $otp = $allGetVars['otp'];
    
 
    $helper = new commonHelper();
    $user = $helper->verifyOtp($email,$otp);
    if($user == 5){
        $results['status'] = 400;
        $results['msg'] = 'You entered wrong OTP'; 
    }else if($user == 7){
        $results['status'] = 400;
        $results['msg'] = 'error'; 
    }else{
        $results['status'] = 200;
        $results['msg'] = 'OTP verified';  
        
    }

    return echoResponse($results);

    
});


$app->post('/resendOtp', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    
    $email = $allGetVars['email'];

    $helper = new commonHelper();
    $user = $helper->resendOtp($email);
    if($user == 7){
        $results['status'] = 400;
        $results['msg'] = 'error'; 
    }else{
        $results['status'] = 200;
        $results['msg'] = 'Resent OTP successfully';  
        
    }

    return echoResponse($results);

    
});

//Intern registration
$app->post('/internRegistration', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $name = $allGetVars['name'];
    $email = $allGetVars['email'];
    $mobile = $allGetVars['mobile'];
     $password = $allGetVars['password'];
    // $role = $allGetVars['role'];
 
    $helper = new commonHelper();
    $user = $helper->internRegis($name,$email,$mobile,$password);
    if($user == 1){
        $results['status'] = 400;
        $results['msg'] = 'name is too large';

    }
    else if ($user == 2) {
        $results['status'] = 400;
        $results['msg'] = 'invalid email';
    }
    else if($user == 3){
        $results['status'] = 400;
        $results['msg'] = 'invalid mobile no';
    }else if($user == 4){
      $results['status'] = 400;
        $results['msg'] = 'password must contain uppercasse,lowercase,number'; 
    }else if($user == 5){
        $results['status'] = 400;
        $results['msg'] = 'vendor exists'; 
    }else if($user == 7){
        $results['status'] = 400;
        $results['msg'] = 'error'; 
    }else{
      $results['status'] = 200;
        $results['msg'] = 'ok';  
    }

    return echoResponse($results);

    
});

// // admin change password 

$app->post('/resetpassword',function($request,$response,$args){
  $allGetVars = $request->getParsedBody();
    $newpassword = $allGetVars['newpassword'];
    $confpassword = $allGetVars['confpassword'];
    $userid = $allGetVars['userid'];

 
    $helper = new commonHelper();
    $user = $helper->changepassword($newpassword, $confpassword,$userid);
    if($user == 1){
        $results['status'] = 400;
        $results['msg'] = 'confirm password and new password should be same';

    }
    else if ($user == 2) {
        $results['status'] = 400;
        $results['msg'] = 'password must contain uppercase,lowercase and number';
    }
    else if($user == 3) {
        $results['status'] = 200;
        $results['msg'] = 'password updated successfull';
    }else{
        $results['status'] = 400;
        $results['msg'] = 'something went wrong';
    }

    return echoResponse($results);
});

//forget password
$app->post('/forgetpassword',function($request,$response,$args){
  $allGetVars = $request->getParsedBody();
    $email = $allGetVars['email'];
    $type = $allGetVars['type'];
    
    $helper = new commonHelper();
    $user = $helper->forgotPwd($email,$type);
    
    if($user == 1){
      $results['status'] = 400;
      $results['msg'] = 'Password could not be changed!Try again.';
    }
    else if($user == 2){
        $results['status'] = 400;
        $results['msg'] = 'Wrong Profile.';
    }
    else if($user == 3){
        $results['status'] = 400;
        $results['msg'] = 'Customer email is wrong.';
    }else if($user == 4){
        $results['status'] = 200;
        $results['msg'] = 'email sent successfully.';
    }else if($user == 5){
        $results['status'] = 400;
        $results['msg'] = 'email not sent.';
    }
//   else{
   
//       $subject = 'Reset Password Email from Sooprs';
//       $from = 'contact@sooprs.com';
//       $title = 'Reset Password Email from Sooprs!';
//       $body = "<html>
//       <head>
//           <title>Password Reset</title>
//       </head>
//       <body>
//           <p>Dear User,</p>
//           <p>Your password has been successfully reset. Here is your new password:</p>
//           <p><strong>New Password:</strong> " . $user . "</p>
//           <p>Please ensure to keep your password secure and consider changing it after logging in.</p>
//           <p>If you did not initiate this password reset, please contact our support team immediately.</p>
//           <br>
//           <p>Best regards,</p>
//           <p>The Sooprs Team</p>
//       </body>
//       </html>";
//       require_once('../../send_email.php');
//       $send_pass_email = send_email($email, $body, $from, $subject);
//     if($send_pass_email){
//     $results['status'] = 200;
//     $results['msg'] = 'New password sent to registered email address';
//     }
//      else {
//          $results['status'] = 400;
//     $results['msg'] = 'Email could not sent!Try again';
//      }
//   }

    return echoResponse($results);
});

//change password for subadmin

$app->post('/change_password_admin',function($request,$response,$args){
  $allGetVars = $request->getParsedBody();
    $current_pass = $allGetVars['current_pass'];
    $newpassword = $allGetVars['new_pass'];
    $confpassword = $allGetVars['confirm_pass'];
    $userid = $allGetVars['userid'];
 
    $helper = new commonHelper();
    $user = $helper->changepassword_admin($current_pass, $newpassword, $confpassword,$userid);
    if($user == 1){
        $results['status'] = 400;
        $results['msg'] = 'confirm password and new password should be same';

    }
    else if ($user == 2) {
        $results['status'] = 400;
        $results['msg'] = 'password must contain uppercase,lowercase and number';
    }
    else if($user == 3) {
        $results['status'] = 200;
        $results['msg'] = 'password updated successfull';
    }else{
        $results['status'] = 400;
        $results['msg'] = 'something went wrong';
    }

    return echoResponse($results);
});


// // create document

$app->post('/add_document',function($request,$response,$args){
  $allGetVars = $request->getParsedBody();
    $title = $allGetVars['document_name'];
    $cat_id = $allGetVars['cat_id'];
    $slug = $allGetVars['slug'];
    $short_desc = $allGetVars['short_desc'];
    $long_desc = $allGetVars['long_desc'];
    $status = $allGetVars['status'];

 
    $helper = new commonHelper();
    $user = $helper->add_document($title, $cat_id, $slug, $short_desc, $long_des,$status);
    if($user == 1){
        $results['status'] = 400;
        $results['msg'] = 'error';

    }
    else if ($user == 2) {
        $results['status'] = 400;
        $results['msg'] = 'document already exist';
    }
    else if($user == 3) {
        $results['status'] = 200;
        $results['msg'] = 'okk';
    }else{
        $results['status'] = 400;
        $results['msg'] = 'eerror in insertion';
    }

    return echoResponse($results);
});

// //update document 

$app->post('/update_document',function($request,$response,$args){
  $allGetVars = $request->getParsedBody();
    $id = $allGetVars['lr_id'];
    $title = $allGetVars['document_name'];
    $cat_id = $allGetVars['cat_id'];
    $slug = $allGetVars['slug'];
    $short_desc = $allGetVars['short_desc'];
    $long_desc = $allGetVars['long_desc'];
    $status = $allGetVars['status'];

 
    $helper = new commonHelper();
    $user = $helper->update_document($id,$title, $cat_id, $slug, $short_desc, $long_des,$status);
    if($user == 1){
        $results['status'] = 400;
        $results['msg'] = 'Please fill all fields';

    }
    else if ($user == 2) {
        $results['status'] = 400;
        $results['msg'] = 'document not exist';
    }
    else if($user == 3) {
        $results['status'] = 200;
        $results['msg'] = 'success';
    }else{
        $results['status'] = 400;
        $results['msg'] = 'error';
    }

    return echoResponse($results);
});

// // create category 




$app->post('/editStudentsDetails',function($request,$response,$args){
    $allGetVars = $request->getParsedBody();

    $profile_pic = '';


    $target_dir = __dir__."/uploads/";      
    $imageFileType = strtolower(pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION));
    if($imageFileType!=''){
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if($check === false){
          $results['status'] = 400;
            $results['msg'] = 'image is not actuall';
        }
    
          if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"){
            $results['status'] = 400;
            $results['msg'] = 'only png,jpg,jpeg images are allowed'; 
          }
    
           $filename   = uniqid() . "-" . time(); 
           $basename   = $filename . "." . $imageFileType;
           $source       = $_FILES["file"]["tmp_name"];
           $destination = $target_dir.basename($basename);
           if(move_uploaded_file($source, $destination)){
              $updatedPath = 'https://shopninja.in/bnw2/api2/public/uploads/'.$basename;
    
           }
    
           $profile_pic = $updatedPath;
    
    }
    

    $user_id = $allGetVars['user_id'];
    $course = $allGetVars['course'];
    $college_name = $allGetVars['college_name'];
    $college_city = $allGetVars['college_city'];
    $state = $allGetVars['state'];
    $acdemic_year = $allGetVars['acdemic_year'];
    $name = $allGetVars['name'];
    $email = $allGetVars['email'];
    $phone = $allGetVars['phone'];


      $helper = new commonHelper();
      $user = $helper->editStudentsDetails($user_id,$profile_pic,$course,$college_name,$college_city,$state,$acdemic_year,$name,$email,$phone);
        if($user == false) {
            $results['status'] = 400;
            $results['msg'] = 'error';
        }else{
            
            $results['status'] = 200;
            $results['msg'] = 'ok';
        }
  
      return echoResponse($results);
  });

//edit Normal users 
$app->post('/editUsersDetails',function($request,$response,$args){
    $allGetVars = $request->getParsedBody();

    $profile_pic = '';


    $target_dir = __dir__."/uploads/";      
    $imageFileType = strtolower(pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION));
    if($imageFileType!=''){
        $check = getimagesize($_FILES["file"]["tmp_name"]);
        if($check === false){
          $results['status'] = 400;
            $results['msg'] = 'image is not actuall';
        }
    
          if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"){
            $results['status'] = 400;
            $results['msg'] = 'only png,jpg,jpeg images are allowed'; 
          }
    
           $filename   = uniqid() . "-" . time(); 
           $basename   = $filename . "." . $imageFileType;
           $source       = $_FILES["file"]["tmp_name"];
           $destination = $target_dir.basename($basename);
           if(move_uploaded_file($source, $destination)){
              $updatedPath = 'https://shopninja.in/bnw2/api2/public/uploads/'.$basename;
    
           }
    
           $profile_pic = $updatedPath;
    
    }
    

    $user_id = $allGetVars['user_id'];
    $name = $allGetVars['name'];
    $email = $allGetVars['email'];
    $phone = $allGetVars['phone'];


      $helper = new commonHelper();
      $user = $helper->editUsersDetails($user_id,$profile_pic,$name,$email,$phone);
        if($user == false) {
            $results['status'] = 400;
            $results['msg'] = 'error';
        }else{
            
            $results['status'] = 200;
            $results['msg'] = 'ok';
        }
  
      return echoResponse($results);
  });


$app->post('/updateUsersPassword', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $id = $allGetVars['id']; 
    $pass = $allGetVars['pass']; 
    $helper = new commonHelper();
    $user = $helper->updateUsersPassword($id,$pass);
    if($user == false){
        $results['status'] = 400;
        $results['msg'] = 'something went wrong';

    } else{
         $results['status'] = 200;
        $results['msg'] = 'Password Successfully Changed!';
    }
    

    return echoResponse($results);
 
});

//UPDATE PASSWORD INTERN
$app->post('/updateUsersPassword_intern', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $id = $allGetVars['id']; 
    $pass = $allGetVars['pass']; 
    $helper = new commonHelper();
    $user = $helper->updateUsersPassword_intern($id,$pass);
    if($user == false){
        $results['status'] = 400;
        $results['msg'] = 'something went wrong';

    } else{
         $results['status'] = 200;
        $results['msg'] = 'Password Successfully Changed';
    }
    

    return echoResponse($results);
 
});


//get_sub_category
$app->post('/get_sub_category',function($request,$response,$args){
  $allGetVars = $request->getParsedBody();
    $category = $allGetVars['category'];
    $law_type = $allGetVars['law_type'];

    $helper = new commonHelper();
    $user = $helper->get_sub_category($category, $law_type);
    if($user != false){
        $results['status'] = 200;
        $results['msg'] = $user;
    }
    else{
        $results['status'] = 400;
        $results['msg'] = 'eerror in insertion';
    }

    return echoResponse($results);
});

//get mentor topic categories
$app->post('/mentor_topic_cats',function($request,$response,$args){
  $allGetVars = $request->getParsedBody();

    $helper = new commonHelper();
    $user = $helper->mentor_topic_cats();
    if($user != false){
        $results['status'] = 200;
        $results['msg'] = $user;
    }
    else{
        $results['status'] = 400;
        $results['msg'] = 'eerror in insertion';
    }

    return echoResponse($results);
});

//get mentor topics categorywise
$app->post('/mentor_topics',function($request,$response,$args){
  $allGetVars = $request->getParsedBody();
  $category = $allGetVars['cat_id'];

    $helper = new commonHelper();
    $user = $helper->mentor_topics($category);
    if($user != false){
        $results['status'] = 200;
        $results['msg'] = $user;
    }
    else{
        $results['status'] = 400;
        $results['msg'] = 'eerror';
    }

    return echoResponse($results);
});

//alloted mentor topics to student
$app->post('/mentor_topics_alloted',function($request,$response,$args){
  $allGetVars = $request->getParsedBody();
  $category = $allGetVars['cat_id'];
  $student_id = $allGetVars['student_id'];

    $helper = new commonHelper();
    $user = $helper->mentor_topics_alloted($category, $student_id);
    if($user != false){
        $results['status'] = 200;
        $results['msg'] = $user;
    }
    else{
        $results['status'] = 400;
        $results['msg'] = 'No Topic Found';
    }

    return echoResponse($results);
});



$app->post('/editCategory', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $id = $allGetVars['id']; 
    $parent_id = $allGetVars['parent_id'];
    $cat_name = $allGetVars['cat_name']; 
    $law_type = $allGetVars['law_type'];
    $status = $allGetVars['status'];
    
    $helper = new commonHelper();
    $user = $helper->editCategory($id,$parent_id,$cat_name,$law_type,$status);
    if($user == false){
        $results['status'] = 400;
        $results['msg'] = 'something went wrong';

    } else{
         $results['status'] = 200;
        $results['msg'] = 'ok';
    }
    

    return echoResponse($results);
 
});

//edit LR category
$app->post('/edit_lr_category', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $id = $allGetVars['id']; 
    $cat_name = $allGetVars['cat_name']; 
    $status = $allGetVars['status'];
    
    $helper = new commonHelper();
    $user = $helper->edit_lr_category($id,$cat_name,$status);
    if($user == false){
        $results['status'] = 400;
        $results['msg'] = 'something went wrong';

    } else{
         $results['status'] = 200;
        $results['msg'] = 'ok';
    }
    

    return echoResponse($results);
 
});

//edit ba category
$app->post('/edit_ba_category', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $id = $allGetVars['id']; 
    $cat_name = $allGetVars['cat_name']; 
    $status = $allGetVars['status'];
    
    $helper = new commonHelper();
    $user = $helper->edit_ba_category($id,$cat_name,$status);
    if($user == false){
        $results['status'] = 400;
        $results['msg'] = 'something went wrong';

    } else{
         $results['status'] = 200;
        $results['msg'] = 'ok';
    }
    

    return echoResponse($results);
 
});

//edit cl category
$app->post('/edit_cl_category', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $id = $allGetVars['id']; 
    $cat_name = $allGetVars['cat_name'];
    $cl_abr = $allGetVars['abr_name'];
    $status = $allGetVars['status'];
    
    $helper = new commonHelper();
    $user = $helper->edit_cl_category($id,$cat_name,$cl_abr,$status);
    if($user == false){
        $results['status'] = 400;
        $results['msg'] = 'something went wrong';

    } else{
         $results['status'] = 200;
        $results['msg'] = 'ok';
    }
    

    return echoResponse($results);
 
});

//get auto generated topic number
$app->post('/get_topicNumber', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $id = $allGetVars['cat_id']; 
    $helper = new commonHelper();
    $user = $helper->get_topic_cat_count($id);
    if($user == false){
        $results['status'] = 400;
        $results['msg'] = 'something went wrong';

    } else{
         $results['status'] = 200;
        $results['msg'] = $user;
    }
    

    return echoResponse($results);
 
});


//edit cl category
$app->post('/cl_by_citation', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $citation = $allGetVars['citation']; 
    $helper = new commonHelper();
    $user = $helper->cl_by_citation($citation);
    if($user == false){
        $results['status'] = 400;
        $results['msg'] = 'something went wrong';

    } else{
         $results['status'] = 200;
        $results['msg'] = $user;
    }
    

    return echoResponse($results);
 
});


//get act sections
$app->post('/get_act_sections', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $bare_act = $allGetVars['bare_act']; 
    $helper = new commonHelper();
    $user = $helper->get_act_sections($bare_act);
    if($user == false){
        $results['status'] = 400;
        $results['msg'] = 'something went wrong';

    } else{
         $results['status'] = 200;
        $results['msg'] = $user;
    }
    

    return echoResponse($results);
 
});

//add case brief
$app->post('/add_case_brief', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $cl_id = $allGetVars['cl_id'];
    $cl_cat_id = $allGetVars['cl_cat_id'];
    
    $slug = $allGetVars['slug'];
    $citation = $allGetVars['citation'];
    $cb_title = $allGetVars['cb_title'];
    $first_party_type = $allGetVars['first_party_type'];
    $first_party_name = $allGetVars['first_party_name'];
    $second_party_type = $allGetVars['second_party_type'];
    $second_party_name = $allGetVars['second_party_name'];
    $datefilter = $allGetVars['datefilter'];
    $bench = $allGetVars['bench'];
    $act_section = $allGetVars['act_section'];
    $para_no = $allGetVars['para_no'];
    $op_judgement = $allGetVars['op_judgement'];
    $interpretation = $allGetVars['interpretation'];
    $status = $allGetVars['status'];
    $helper = new commonHelper();
    $user = $helper->add_case_brief($cl_id,$slug,$citation,$cb_title,$first_party_type, $first_party_name,$second_party_type, $second_party_name,$datefilter,$cl_cat_id, $bench,$act_section, $para_no, $op_judgement, $interpretation, $status);
    if($user == 1){
        $results['status'] = 400;
        $results['msg'] = 'Case brief name already exist';

    } else if($user == 2){
         $results['status'] = 200;
        $results['msg'] = 'Case Brief created';
    }
    else {
        $results['status'] = 400;
        $results['msg'] = $user;
    }
    

    return echoResponse($results);
 
});


//update case brief
$app->post('/update_case_brief', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $cl_id = $allGetVars['cl_id'];
    $cb_id = $allGetVars['cb_id'];
    $cl_cat_id = $allGetVars['cl_cat_id'];
    
    $slug = $allGetVars['slug'];
    $citation = $allGetVars['citation'];
    $cb_title = $allGetVars['cb_title'];
    $first_party_type = $allGetVars['first_party_type'];
    $first_party_name = $allGetVars['first_party_name'];
    $second_party_type = $allGetVars['second_party_type'];
    $second_party_name = $allGetVars['second_party_name'];
    $datefilter = $allGetVars['datefilter'];
    $bench = $allGetVars['bench'];
    $act_section = $allGetVars['act_section'];
    $para_no = $allGetVars['para_no'];
    $op_judgement = $allGetVars['op_judgement'];
    $interpretation = $allGetVars['interpretation'];
    $status = $allGetVars['status'];
    $helper = new commonHelper();
    $user = $helper->update_case_brief($cb_id,$cl_id,$slug,$citation,$cb_title,$first_party_type, $first_party_name,$second_party_type, $second_party_name,$datefilter,$cl_cat_id, $bench,$act_section, $para_no, $op_judgement, $interpretation, $status);
    if($user == 1){
        $results['status'] = 400;
        $results['msg'] = 'Case brief name does not exist';

    } else if($user == 2){
         $results['status'] = 200;
        $results['msg'] = 'Case Brief created';
    }
    else {
        $results['status'] = 400;
        $results['msg'] = $user;
    }
    

    return echoResponse($results);
 
});

//check unique text name
$app->post('/check_uni_txt', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $uni_txt = $allGetVars['uni_txt']; 
    $helper = new commonHelper();
    $user = $helper->check_uni_txt($uni_txt);
    if($user === false){
        $results['status'] = 400;
        $results['msg'] = 'already taken';

    } else{
         $results['status'] = 200;
        $results['msg'] = 'Available';
    }
    

    return echoResponse($results);
 
});

//create first case law party name
$app->post('/add_f_party', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $party_name = $allGetVars['f_party_name']; 
    $helper = new commonHelper();
    $user = $helper->add_f_party($party_name);
    if($user === 1){
        $results['status'] = 400;
        $results['msg'] = 'already taken';

    } elseif($user == 2){
         $results['status'] = 200;
        $results['msg'] = 'Created';
    }
    else {
       $results['status'] = 400;
        $results['msg'] = $user; 
    }
    

    return echoResponse($results);
 
});

//update first case law party name
$app->post('/update_f_party', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $party_name = $allGetVars['f_party_name'];
    $party_id = $allGetVars['party_id'];
    $helper = new commonHelper();
    $user = $helper->update_f_party($party_id,$party_name);
    if($user === 1){
        $results['status'] = 400;
        $results['msg'] = 'already taken';

    } elseif($user == 2){
         $results['status'] = 200;
        $results['msg'] = 'Created';
    }
    else {
       $results['status'] = 400;
        $results['msg'] = $user; 
    }
    

    return echoResponse($results);
 
});

////create first case law party name
$app->post('/add_sec_party', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $party_name = $allGetVars['sec_party_name']; 
    $helper = new commonHelper();
    $user = $helper->add_sec_party($party_name);
     if($user === 1){
        $results['status'] = 400;
        $results['msg'] = 'already taken';

    } elseif($user == 2){
         $results['status'] = 200;
        $results['msg'] = 'Created';
    }
    else {
       $results['status'] = 400;
        $results['msg'] = $user; 
    }
    

    return echoResponse($results);
 
});

//update case law second party 
$app->post('/update_sec_party', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $party_name = $allGetVars['sec_party_name'];
    $party_id = $allGetVars['party_id'];
    $helper = new commonHelper();
    $user = $helper->update_sec_party($party_id,$party_name);
    if($user === 1){
        $results['status'] = 400;
        $results['msg'] = 'already taken';

    } elseif($user == 2){
         $results['status'] = 200;
        $results['msg'] = 'Created';
    }
    else {
       $results['status'] = 400;
        $results['msg'] = $user; 
    }
    

    return echoResponse($results);
 
});

//update approval for admin
$app->post('/update_approval', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $type = $allGetVars['type'];
    $id = $allGetVars['id'];
    $helper = new commonHelper();
    $user = $helper->update_approval($type,$id);
    if($user === 1){
        $results['status'] = 400;
        $results['msg'] = 'already taken';

    } elseif($user == 2){
         $results['status'] = 200;
        $results['msg'] = 'Created';
    }
    else {
       $results['status'] = 400;
        $results['msg'] = $user; 
    }
    

    return echoResponse($results);
 
});

//update disapproval
$app->post('/update_disapproval', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $type = $allGetVars['type'];
    $id = $allGetVars['id'];
    $helper = new commonHelper();
    $user = $helper->update_disapproval($type,$id);
    if($user === 1){
        $results['status'] = 400;
        $results['msg'] = 'already taken';

    } elseif($user == 2){
         $results['status'] = 200;
        $results['msg'] = 'Created';
    }
    else {
       $results['status'] = 400;
        $results['msg'] = $user; 
    }
    

    return echoResponse($results);
 
});

//multiple case law and bare act delete
$app->post('/delete_clba', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $type = $allGetVars['type'];
    $id = $allGetVars['id'];
    $helper = new commonHelper();
    $user = $helper->delete_clba($type,$id);
    if($user === 1){
        $results['status'] = 400;
        $results['msg'] = 'already taken';

    } elseif($user === 2){
         $results['status'] = 200;
        $results['msg'] = 'Deleted';
    }
    else {
       $results['status'] = 400;
        $results['msg'] = $user; 
    }
    

    return echoResponse($results);
 
});

//create new citation number
$app->post('/get_citation_no', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $category = $allGetVars['category'];
    $year = $allGetVars['year'];
    $helper = new commonHelper();
    $user = $helper->get_citation_no($category,$year);
    
        $results['status'] = 200;
        $results['msg'] = $user;
    

    return echoResponse($results);
 
});

//send email api
//create new citation number
$app->post('/send_invite', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $to = $allGetVars['to_email'];
    $from = 'care@shopninja.in';
    $subject = 'Invitation to join Internship Programme from BNWJournal!';
    $title = 'Invitation Email from BNWJournal';
    $body = '<h2>Please check this test message<h2>';
    require_once('../../send_email.php');
      $send_pass_email = send_email($to, $body, $to, $subject);
   // $send_email = email_sender($subject, $to, $from, $title, $body);
    if($send_pass_email == true){
      $helper = new commonHelper();
    $user = $helper->send_invite_update($to);  
    if($user){
      $results['status'] = 200;
        $results['msg'] = 'Email sent!';   
    }
    else {
        $results['status'] = 400;
        $results['msg'] = 'Invite Status could not update but email sent.'; 
    }
    }
    else {
       
        $results['status'] = 400;
        $results['msg'] = 'Email could not sent!'; 
    }
    
    
    

    return echoResponse($results);
 
});

//common email function
function email_sender($subject, $to, $from, $title, $body){

require_once('../../PHPMailer/class.phpmailer.php');
$mail                = new PHPMailer();
$body                = '';
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host          = "smtp.zoho.in";
$mail->SMTPAuth      = true;                  // enable SMTP authentication
//$mail->Host          = "mail.yourdomain.com"; // sets the SMTP server
$mail->Port          = 587;                    // set the SMTP port for the GMAIL server
$mail->Username      = "admin@earnezy.in"; // SMTP account username
$mail->Password      = "G0t@@1004";        // SMTP account password
$mail->SMTPSecure = 'tls';
$mail->SetFrom($from, $subject);
$mail->AddReplyTo($from, $subject);

$mail->Subject       = $title;
$mail->AddAddress($to, $subject);


  $mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
 // $mail->IsHTML(true);
  $mail->Body=$body;
 // $mail->MsgHTML($body);

  if(!$mail->Send()) {
      error_log("email not sent".$mail->ErrorInfo);
    return 2; //error
  } else {
      error_log("email sent");
    return 1; //success
  }
}

//apply to internship
$app->post('/apply_intern', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $stu_id = $allGetVars['stu_id'];
    $helper = new commonHelper();
    $user = $helper->apply_intern($stu_id);
    if($user == 1){
        $results['status'] = 200;
        $results['msg'] = 'Internship Applied. You will given a role as per your selection soon';
    }
    else {
      $results['status'] = 400;
        $results['msg'] = 'Failed to Apply';  
    }

    return echoResponse($results);
 
});

//choose topic category
$app->post('/topic_list_by_cat', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $stu_id = $allGetVars['stu_id'];
    $intern_type = $allGetVars['intern_type'];
    $topic_cat_id = $allGetVars['topic_cat_id'];
    $helper = new commonHelper();
    $user = $helper->topic_list_by_cat($stu_id,$intern_type,$topic_cat_id);
    if($user == 1){
        $results['status'] = 400;
        $results['msg'] = 'No data found';
    }
    else {
      $results['status'] = 200;
        $results['msg'] = $user;  
    }

    return echoResponse($results);
 
});

//list all topic categories
$app->post('/list_topic_cat', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $stu_id = $allGetVars['stu_id'];
    $helper = new commonHelper();
    $user = $helper->list_topic_cat($stu_id);
    if($user == 1){
        $results['status'] = 400;
        $results['msg'] = 'No Topic Category found';
    }
    else {
      $results['status'] = 200;
        $results['msg'] = $user;  
    }

    return echoResponse($results);
 
});

//save topic selection with student id
$app->post('/save_topic_by_stuid', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $stu_id = $allGetVars['stu_id'];
    $intern_type = $allGetVars['intern_type'];
    $topic_id = $allGetVars['topic_id'];
    $cat_id = $allGetVars['cat_id'];
    $helper = new commonHelper();
    $user = $helper->save_topic_by_stuid($stu_id, $intern_type, $topic_id, $cat_id);
    if($user == 1){
        $results['status'] = 400;
        $results['msg'] = 'Already exist';
    }
    else if($user == 2){
        $results['status'] = 200;
        $results['msg'] = 'Success';
    }
    else if($user == 4){
        $results['status'] = 400;
        $results['msg'] = 'Not Research Intern';
    }
    else {
      $results['status'] = 400;
        $results['msg'] = 'Error occured';  
    }

    return echoResponse($results);
 
});


//get assigned task
$app->post('/get_assigned_tasks_stuid', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $stu_id = $allGetVars['stu_id'];
    $intern_type = $allGetVars['intern_type'];
    $helper = new commonHelper();
    $user = $helper->get_assigned_tasks_stuid($stu_id, $intern_type);
    if($user == 1){
        $results['status'] = 400;
        $results['msg'] = 'Tasks not exist';
    }
    
    else {
      $results['status'] = 200;
        $results['msg'] = $user;  
    }

    return echoResponse($results);
 
});


//auth check
// $app->post('/auth_check', function($request, $response, $args){
//     $allGetVars = $request->getParsedBody();
    
//     $helper = new commonHelper();
//     $user = $helper->auth_check();
//     if($user == 1){
//         $results['status'] = 400;
//         $results['msg'] = 'Not logged int';
//     }
    
//     else {
//       $results['status'] = 200;
//         $results['msg'] = "Logged in";  
//     }

//     return echoResponse($results);
 
// });

//save intern type by mentor 
$app->post('/save_intern_type', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $stu_id = $allGetVars['stu_id'];
    $intern_type = $allGetVars['intern_type'];
    $helper = new commonHelper();
    $user = $helper->save_intern_type($stu_id, $intern_type);
    if($user == 1){
        $results['status'] = 400;
        $results['msg'] = 'Intern Role already exist';
    }
    else if($user == 2){
       $results['status'] = 200;
        $results['msg'] = 'Intern Type assigned'; 
    }
    
    else {
      $results['status'] = 400;
        $results['msg'] = 'Intern Type could not assigned';  
    }

    return echoResponse($results);
 
});

//allot tasks to student by mentor
$app->post('/allot_research_int_task', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $stu_id = $allGetVars['stu_id'];
    $start_date = $allGetVars['datefilter_start'];
    $end_date = $allGetVars['datefilter_end'];
    $task_details = $allGetVars['task_details'];
    $mentor_id = $allGetVars['mentor_id'];
    $topic_id = $allGetVars['topic_id'];
    $topic_name = $allGetVars['topic_name'];
    $helper = new commonHelper();
    $user = $helper->allot_research_int_task($stu_id, $start_date, $end_date, $task_details, $mentor_id, $topid_id, $topic_name);
    if($user == 1){
        $results['status'] = 400;
        $results['msg'] = 'work session already exist';
    }
    else if($user == 2){
       $results['status'] = 200;
        $results['msg'] = 'Tasks Alloted'; 
    }
    else if($user == 3){
       $results['status'] = 400;
        $results['msg'] = 'Error in assignment'; 
    }
    else if($user == 4){
       $results['status'] = 400;
        $results['msg'] = 'Work session could not created'; 
    }
    
    else {
      $results['status'] = 400;
        $results['msg'] = 'Intern Type could not assigned';  
    }

    return echoResponse($results);
 
});

//allot legal tasks to student by mentor
$app->post('/allot_legal_int_task', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $stu_id = $allGetVars['stu_id'];
    $start_date = $allGetVars['datefilter_start'];
    $end_date = $allGetVars['datefilter_end'];
    $task_details = $allGetVars['task_desc'];
   // $mentor_id = $allGetVars['mentor_id'];
   // $topic_id = $allGetVars['task_id'];
    $task_name = $allGetVars['task_name'];
    
    //upload file docx, pdf
    $target_dir = __dir__."/legal_tasks/";      
    $imageFileType = strtolower(pathinfo($_FILES["upload_task_file"]["name"],PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["upload_task_file"]["tmp_name"]);
    if($check === false){
      $results['status'] = 400;
        $results['msg'] = 'service image is not actual';
    }

      if($imageFileType != "doc" || $imageFileType != "docx" || $imageFileType != "pdf"){
        $results['status'] = 400;
        $results['msg'] = 'only doc, docx,pdf documents are allowed'; 
      }

       $filename   = uniqid() . "-" . time(); 
       $basename   = $filename . "." . $imageFileType;
       $source       = $_FILES["upload_task_file"]["tmp_name"];
       $destination = $target_dir.basename($basename);
       if(move_uploaded_file($source, $destination)){
          $updatedPath = 'https://shopninja.in/bnw2/api2/public/legal_tasks/'.$basename;
    
       }
          else {
             $updatedPath = '';
          }
          
    //upload logic ends here
    
    $helper = new commonHelper();
    $user = $helper->allot_legal_int_task($stu_id, $start_date, $end_date, $task_details, $task_name, $updatedPath);
    if($user == 1){
        $results['status'] = 400;
        $results['msg'] = 'work session already exist';
    }
    else if($user == 2){
       $results['status'] = 200;
        $results['msg'] = 'Tasks Alloted to Legal Intern'; 
    }
    else if($user == 3){
       $results['status'] = 400;
        $results['msg'] = 'Error in assignment'; 
    }
    else if($user == 4){
       $results['status'] = 400;
        $results['msg'] = 'Work session could not created'; 
    }
    
    else {
      $results['status'] = 400;
        $results['msg'] = 'Intern Type could not assigned';  
    }

    return echoResponse($results);
 
});

//send message to mentor
$app->post('/send_msg_by_student', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $stu_id = $allGetVars['stu_uid'];
    $related_topic = $allGetVars['related_topic_id'];
    $msg_text = $allGetVars['msg_text'];
    $helper = new commonHelper();
    $user = $helper->send_msg_by_student($stu_id, $related_topic, $msg_text);
    if($user == 1){
        $results['status'] = 400;
        $results['msg'] = 'No student found';
    }
    else if($user == 2){
       $results['status'] = 200;
        $results['msg'] = 'Message sent'; 
    }
    else if($user == 3){
       $results['status'] = 400;
        $results['msg'] = 'Error in message sending'; 
    }
    
    else {
      $results['status'] = 400;
        $results['msg'] = 'Something went wrong';  
    }

    return echoResponse($results);
 
});

//reply msg by mentor
$app->post('/send_reply', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $mentor_id = $allGetVars['mentor_id'];
    $msg_id = $allGetVars['msg_id'];
    $reply_msg = $allGetVars['reply_msg'];
    $helper = new commonHelper();
    $user = $helper->send_reply($mentor_id, $msg_id, $reply_msg);
    if($user == 1){
        $results['status'] = 400;
        $results['msg'] = 'No message found';
    }
    else if($user == 2){
       $results['status'] = 200;
        $results['msg'] = 'Reply sent'; 
    }
    else if($user == 3){
       $results['status'] = 400;
        $results['msg'] = 'Error in message sending'; 
    }
    
    else {
      $results['status'] = 400;
        $results['msg'] = 'Something went wrong';  
    }

    return echoResponse($results);
 
});

//get feedback with feedback id
$app->post('/getFeedback', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $feedbk_id = $allGetVars['feedbk_id'];
    $helper = new commonHelper();
    $user = $helper->getFeedback($feedbk_id);
    if($user == 1){
        $results['status'] = 400;
        $results['msg'] = 'No Feedback found';
    }
   else {
      $results['status'] = 200;
        $results['msg'] = $user;  
    }

    return echoResponse($results);
 
});

//get work sess id
$app->post('/get_work_sess_id', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $stu_uid = $allGetVars['stu_uid'];
    $helper = new commonHelper();
    $user = $helper->get_work_sess_id($stu_uid);
    if($user == 'NA'){
        $results['status'] = 400;
        $results['msg'] = 'No Feedback found';
    }
   else {
      $results['status'] = 200;
        $results['msg'] = $user;  
    }

    return echoResponse($results);
 
});

//get messsages by student id
$app->post('/get_msg_stuid', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $stu_uid = $allGetVars['stu_uid'];
    $helper = new commonHelper();
    $user = $helper->get_msg_stuid($stu_uid);
    if($user == 'NA'){
        $results['status'] = 400;
        $results['msg'] = 'No Feedback found';
    }
   else {
      $results['status'] = 200;
        $results['msg'] = $user;  
    }

    return echoResponse($results);
 
});

//create notice
$app->post('/create_notice', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $notice_text = $allGetVars['notice_text'];
    $notice_desc = $allGetVars['notice_desc'];
    $helper = new commonHelper();
    $user = $helper->create_notice($notice_text, $notice_desc);
    if($user == '1'){
        $results['status'] = 200;
        $results['msg'] = 'Notice created';
    }
   else {
      $results['status'] = 400;
        $results['msg'] = 'Notice could not created';  
    }

    return echoResponse($results);
 
});

//get all notices
$app->post('/mentor_notices', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $helper = new commonHelper();
    $user = $helper->mentor_notices();
    if($user == 'NA'){
        $results['status'] = 400;
        $results['msg'] = 'No notice found';
    }
   else {
      $results['status'] = 200;
        $results['msg'] = $user;  
    }

    return echoResponse($results);
 
});

//legal task list with stuid
//get all notices
$app->post('/get_legal_task_stuid', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $stu_uid = $allGetVars['stu_uid'];
    $helper = new commonHelper();
    $user = $helper->get_legal_task_stuid($stu_uid);
    if($user == '1'){
        $results['status'] = 400;
        $results['msg'] = 'No Legal task found';
    }
   else {
      $results['status'] = 200;
        $results['msg'] = $user;  
    }

    return echoResponse($results);
 
});

//submit task for legal intern
$app->post('/submit_legal_task_stuid', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $stu_uid = $allGetVars['stu_uid'];
    $work_sess_id = $allGetVars['work_sess_id'];
    $helper = new commonHelper();
    $user = $helper->get_legal_task_stuid($stu_uid, $work_sess_id);
    if($user == '1'){
        $results['status'] = 400;
        $results['msg'] = 'No Legal task found';
    }
   else {
      $results['status'] = 200;
        $results['msg'] = $user;  
    }

    return echoResponse($results);
 
});

//get all courts name
$app->post('/get_all_courts', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $type = $allGetVars['type'];
    $cat_id = $allGetVars['parent_id'];
    $helper = new commonHelper();
    $user = $helper->get_all_courts($type, $cat_id);
    if($user == '1'){
        $results['status'] = 400;
        $results['msg'] = 'Not found';
    }
   else {
      $results['status'] = 200;
        $results['msg'] = $user;  
    }

    return echoResponse($results);
 
});

//save task id status
$app->post('/save_re_int_task_status', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $id = $allGetVars['id'];
    $topic_status = $allGetVars['topic_status'];
    $task_status = $allGetVars['task_status'];
    $helper = new commonHelper();
    $user = $helper->save_re_int_task_status($id, $topic_status, $task_status);
    if($user == '1'){
        $results['status'] = 200;
        $results['msg'] = 'Saved';
    }
   else {
      $results['status'] = 400;
        $results['msg'] = 'error';  
    }

    return echoResponse($results);
 
});

//save or update profile intern
$app->post('/edit_save_profile_intern', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $id = $allGetVars['id'];
    $prefix = $allGetVars['prefix'];
    $full_name = $allGetVars['full_name'];
    $parent_prefix = $allGetVars['parent_prefix'];
    $parent_name = $allGetVars['parent_name'];
    $parent_type = $allGetVars['parent_type'];
    $student_email = $allGetVars['student_email'];
    $student_mobile = $allGetVars['student_mobile'];
    $gender = $allGetVars['gender'];
    $study_type = $allGetVars['study_type'];
    $course_name = $allGetVars['course_name'];
    $college_name = $allGetVars['college_name'];
    $college_city = $allGetVars['college_city'];
    $college_state = $allGetVars['college_state'];
    $academic_year = $allGetVars['academic_year'];
    
    //upload profile_pic start
    if($_FILES['profile_pic']['size'] != 0){
    $target_dir = __dir__."/student_docs/";      
    $imageFileType = strtolower(pathinfo($_FILES["profile_pic"]["name"],PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
    if($check === false){
      $results['status'] = 400;
      $results['msg'] = 'No actial image';
    }

      if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "gif" || $imageFileType != "jpeg"){
        $results['status'] = 400;
        $results['msg'] = 'only docx,jpg,jpeg images are allowed'; 
      }

       $filename   = uniqid() . "-" . time(); 
       $basename   = $filename . "." . $imageFileType;
       $source       = $_FILES["profile_pic"]["tmp_name"];
       $destination = $target_dir.basename($basename);
       if(move_uploaded_file($source, $destination)){
          $updatedPath_profile = 'https://shopninja.in/bnw2/api2/public/student_docs/'.$basename;
       }
       else {
          $updatedPath_profile = ''; 
       }
    } else {
        $updatedPath_profile = '';
    }
       
    //upload profile pics ends
    
    //upload cover letter starts
    if($_FILES['cover_letter']['size'] != 0){
    $target_dir = __dir__."/student_docs/";      
    $imageFileType1 = strtolower(pathinfo($_FILES["cover_letter"]["name"],PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["cover_letter"]["tmp_name"]);
    if($check === false){
      $results['status'] = 400;
      $results['msg'] = 'No actial image';
    }

      if($imageFileType1 != "jpg" || $imageFileType1 != "png" || $imageFileType1 != "gif" || $imageFileType1 != "jpeg" || $imageFileType1 != "docx" || $imageFileType1 != "pdf" || $imageFileType1 != "doc"){
        $results['status'] = 400;
        $results['msg'] = 'only doc,docx,jpg,jpeg,png,pdf files are allowed'; 
      }

       $filename1   = uniqid() . "-" . time(); 
       $basename1   = $filename1 . "." . $imageFileType1;
       $source1       = $_FILES["cover_letter"]["tmp_name"];
       $destination1 = $target_dir.basename($basename1);
       if(move_uploaded_file($source1, $destination1)){
          $updatedPath_cover = 'https://shopninja.in/bnw2/api2/public/student_docs/'.$basename1;
       }
       else {
          $updatedPath_cover = ''; 
       }
    } else {
        $updatedPath_cover = '';
    }
    //upload cover letter ends 
    
    //upload CV starts
    if($_FILES['cv']['size'] != 0){
    $target_dir = __dir__."/student_docs/";      
    $imageFileType2 = strtolower(pathinfo($_FILES["cv"]["name"],PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["cv"]["tmp_name"]);
    if($check === false){
      $results['status'] = 400;
      $results['msg'] = 'No actial image';
    }

      if($imageFileType2 != "jpg" || $imageFileType2 != "png" || $imageFileType2 != "gif" || $imageFileType2 != "jpeg" || $imageFileType2 != "docx" || $imageFileType2 != "pdf" || $imageFileType2 != "doc"){
        $results['status'] = 400;
        $results['msg'] = 'only doc,docx,jpg,jpeg,png,pdf files are allowed'; 
      }

       $filename2   = uniqid() . "-" . time(); 
       $basename2   = $filename2 . "." . $imageFileType2;
       $source2       = $_FILES["cv"]["tmp_name"];
       $destination2 = $target_dir.basename($basename2);
       if(move_uploaded_file($source2, $destination2)){
          $updatedPath_cv = 'https://shopninja.in/bnw2/api2/public/student_docs/'.$basename2;
       }
       else {
          $updatedPath_cv = ''; 
       }
    } else {
        $updatedPath_cv = '';
    }
    //upload CV ends here
    
    $helper = new commonHelper();
    $user = $helper->edit_save_profile_intern($id, $prefix,$full_name,$parent_prefix,$parent_name,$parent_type,$student_email,$gender, $student_mobile,$study_type,$course_name,$college_name,$college_city,$college_state,$academic_year,$updatedPath_profile,$updatedPath_cover,$updatedPath_cv);
    if($user == '1'){
        $results['status'] = 200;
        $results['msg'] = 'Profile saved successfully!';
    }
   else {
      $results['status'] = 400;
        $results['msg'] = 'error';  
    }

    return echoResponse($results);
 
});

function upload_file_func($filename){
     $target_dir = __dir__."/student_docs/";      
    $imageFileType = strtolower(pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check === false){
      $results['status'] = 400;
        $results['msg'] = 'image is not actuall';
    }

      if($imageFileType != "docx" ){
        $results['status'] = 400;
        $results['msg'] = 'only docx,jpg,jpeg images are allowed'; 
      }

       $filename   = uniqid() . "-" . time(); 
       $basename   = $filename . "." . $imageFileType;
       $source       = $_FILES["file"]["tmp_name"];
       $destination = $target_dir.basename($basename);
       if(move_uploaded_file($source, $destination)){
          $updatedPath = 'https://shopninja.in/bnw2/api2/public/article_docs/'.$basename;
       }

}

//task history details
$app->post('/task_history_intern', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $stu_id = $allGetVars['stu_id'];
    $stu_type = $allGetVars['stu_type'];
    $helper = new commonHelper();
    $user = $helper->task_history_intern($stu_id, $stu_type);
    if($user == '1'){
        $results['status'] = 400;
        $results['msg'] = 'No task found';
    }
   else {
      $results['status'] = 200;
        $results['msg'] = $user;  
    }

    return echoResponse($results);
 
});

//credit history intern
//task history details
$app->post('/credit_history_intern', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $stu_id = $allGetVars['stu_id'];
   // $stu_type = $allGetVars['stu_type'];
    $helper = new commonHelper();
    $user = $helper->credit_history_intern($stu_id);
    if($user == '1'){
        $results['status'] = 400;
        $results['msg'] = 'No Transaction history';
    }
   else {
      $results['status'] = 200;
        $results['msg'] = $user;  
    }

    return echoResponse($results);
 
});


//get single case law
$app->post('/get_single_details', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $id = $allGetVars['id'];
    $type = $allGetVars['type'];
    $helper = new commonHelper();
    $user = $helper->get_single_details($id, $type);
    if($user == '1'){
        $results['status'] = 400;
        $results['msg'] = 'No record found';
    }
   else {
      $results['status'] = 200;
        $results['msg'] = $user;  
    }

    return echoResponse($results);
 
});

//delete admin
$app->post('/delete_admin', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $id = $allGetVars['id'];
    $helper = new commonHelper();
    $user = $helper->delete_admin($id);
    if($user == '1'){
        $results['status'] = 400;
        $results['msg'] = 'This is Super Admin Account. You can not delete it!';
    }
   else if($user == 2) {
      $results['status'] = 200;
        $results['msg'] = 'Selected Account successfully deleted!';  
    }
    
 else if($user == 3){
     $results['status'] = 400;
        $results['msg'] = 'Account could not be deleted. Please logout and login again!'; 
 }
 else {
     $results['status'] = 400;
        $results['msg'] = 'Something error occurred!'; 
 }

    return echoResponse($results);
 
});

//delete admin
$app->post('/project_file_delete', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $id = $allGetVars['lead_id'];
    $helper = new commonHelper();
    $user = $helper->project_file_delete($id);
    if($user == '1'){
        $results['status'] = 400;
        $results['msg'] = 'Project requirement not found';
    }
   else if($user == 2) {
      $results['status'] = 200;
        $results['msg'] = 'Selected file successfully deleted!';  
    }
    
 else if($user == 3){
     $results['status'] = 400;
        $results['msg'] = 'File could not be deleted. Please try again!'; 
 }
 else {
     $results['status'] = 400;
        $results['msg'] = 'Something error occurred!'; 
 }

    return echoResponse($results);
 
});

//get credit for student id
$app->post('/get_credit_intern', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $stu_id = $allGetVars['stu_id'];
    $helper = new commonHelper();
    $user = $helper->get_credit_intern($stu_id);
    if($user == '1'){
        $results['status'] = 400;
        $results['msg'] = 'Student Not found';
    }
  
 else {
     $results['status'] = 200;
        $results['msg'] = $user; 
 }

    return echoResponse($results);
 
});

//update credit wallet transaction
$app->post('/update_credit_transaction', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $stu_id = $allGetVars['stu_id'];
    $type = $allGetVars['credit_type']; //1 = credit, 2 = debit
    $amount = $allGetVars['amount'];
    $credit_count = $allGetVars['credit_count'];
    $tnx_status = $allGetVars['tnx_status']; //2 = failed, 3 = success
    
    $helper = new commonHelper();
    $user = $helper->update_credit_transaction($stu_id, $type, $amount, $credit_count, $tnx_status);
    if($user == '1'){
        $results['status'] = 200;
        $results['msg'] = 'Success';
    }
    else if($user == '2'){
       $results['status'] = 400;
        $results['msg'] = 'Could not update properly'; 
    }
    else if($user == '3'){
       $results['status'] = 400;
        $results['msg'] = 'student does not exist'; 
    }
     else if($user == '4'){
       $results['status'] = 400;
        $results['msg'] = 'credit transaction could not update'; 
    }
     else if($user == '5'){
       $results['status'] = 200;
        $results['msg'] = 'Failed status updated'; 
    }
  
 else {
     $results['status'] = 400;
        $results['msg'] = "error"; 
 }

    return echoResponse($results);
 
});

//topic request 
//update credit wallet transaction
$app->post('/add_topic_request', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $stu_id = $allGetVars['stu_id'];
    $requested_topic = $allGetVars['requested_topic']; //1 = credit, 2 = debit
    
    $helper = new commonHelper();
    $user = $helper->add_topic_request($stu_id, $requested_topic);
    if($user == '1'){
        $results['status'] = 400;
        $results['msg'] = 'already existed';
    }
     else if($user == '2'){
       $results['status'] = 200;
        $results['msg'] = 'Topic Request Raised'; 
    }
     else if($user == '3'){
       $results['status'] = 400;
        $results['msg'] = 'can not create request'; 
    }
  
 else {
     $results['status'] = 400;
        $results['msg'] = "error"; 
 }

    return echoResponse($results);
 
});

//topic request history
$app->post('/topic_request_history', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $stu_id = $allGetVars['stu_id'];
    
    $helper = new commonHelper();
    $user = $helper->topic_request_history($stu_id);
    if($user == '1'){
        $results['status'] = 400;
        $results['msg'] = 'History not found';
    }
  
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }

    return echoResponse($results);
 
});

//verify email
$app->post('/verify_email_code', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $email = $allGetVars['email'];
    $code = $allGetVars['code'];
    $type  =  $allGetVars['user_type']; //1 = normal user, 2 = student
     $helper = new commonHelper();
    if($type == 1){
       $user = $helper->verify_email_code_users($email, $code); 
    }
    else {
        $user = $helper->verify_email_code($email, $code);
    }
    
    
    if($user == '1'){
        $results['status'] = 200;
        $results['msg'] = 'Email verified successfully';
    }
    else if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Error';
    }
    else if($user == '3'){
        $results['status'] = 400;
        $results['msg'] = 'User not found';
    }
    else if($user == '4'){
        $results['status'] = 400;
        $results['msg'] = 'Activation code is wrong';
    }
  
     else {
         $results['status'] = 400;
            $results['msg'] = "Something went wrong"; 
     }

    return echoResponse($results);
 
});

//send email code
$app->post('/send_email_code', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $email = $allGetVars['email'];
    
    $helper = new commonHelper();
    $user = $helper->send_email_code($email);
    if($user == '1'){
        $results['status'] = 200;
        $results['msg'] = 'Verification code sent successfully';
    }
    else if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Error';
    }
    else if($user == '3'){
        $results['status'] = 400;
        $results['msg'] = 'Email is wrong';
    }
  
     else {
         $results['status'] = 400;
            $results['msg'] = 'Something went wrong!'; 
     }

    return echoResponse($results);
 
});

//change student role api
$app->post('/change_student_role', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $stu_id = $allGetVars['stu_id'];
    $new_role = $allGetVars['new_role'];
    
    $helper = new commonHelper();
    $user = $helper->change_student_role($stu_id, $new_role);
    if($user == '1'){
        $results['status'] = 200;
        $results['msg'] = 'Student Role changed successfully!';
    }
    else if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Student not found';
    }
    else if($user == '3'){
        $results['status'] = 400;
        $results['msg'] = 'Some error occured';
    }
  
     else {
         $results['status'] = 400;
            $results['msg'] = 'Error occured'; 
     }

    return echoResponse($results);
 
});

//legal task submission api
$app->post('/legaltask_submission',function($request,$response,$args){
    $allGetVars = $request->getParsedBody();
    $stu_id = $allGetVars['stu_id'];
    $task_id = $allGetVars['legal_task_id'];
    
    $target_dir = __dir__."/legal_task_submission/";      
    $imageFileType = strtolower(pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION));
    //$check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($_FILES["file"]["size"] > 500000) {
        $results['status'] = 400;
        $results['msg'] = 'File size is too large';
    }
   

      if($imageFileType != "docx" || $imageFileType != "pdf" ){
        $results['status'] = 400;
        $results['msg'] = 'only docx, pdfs are allowed'; 
      }

       $filename   = uniqid() . "-" . time(); 
       $basename   = $filename . "." . $imageFileType;
       $source       = $_FILES["file"]["tmp_name"];
       $destination = $target_dir.basename($basename);
       if(move_uploaded_file($source, $destination)){
         $updatedPath = 'https://shopninja.in/bnw2/api2/public/legal_task_submission/'.$basename;
        
        $helper = new commonHelper();
       $user = $helper->legaltask_submission($stu_id,$updatedPath, $task_id);


        if($user == 1) {
            $results['status'] = 400;
            $results['msg'] = 'Wrong task id';
        }
        else if($user == 2){
         $results['status'] = 200;
            $results['msg'] = 'File submitted ';   
        }
         else if($user == 3){
         $results['status'] = 400;
            $results['msg'] = 'error in submission';   
        }
        
        else{
            
            $results['status'] = 400;
            $results['msg'] = 'Something went wrong';
        }
        

            return echoResponse($results);

   }else{
    $results['status'] = 400;
    $results['msg'] = 'file does not uploaded '.$destination; 
   } 

      return echoResponse($results);
  });
  
  //set student mentor
  $app->post('/set_student_mentor', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $stu_id = $allGetVars['stu_id'];
    $mentor_id = $allGetVars['mentor_id'];
    
    if(!empty($mentor_id) || $mentor_id != 0){
    
    $helper = new commonHelper();
    $user = $helper->set_student_mentor($stu_id, $mentor_id);
    if($user == '1'){
        $results['status'] = 200;
        $results['msg'] = 'Mentor Assigned successfully!';
    }
    else if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Student not found';
    }
    else if($user == '3'){
        $results['status'] = 400;
        $results['msg'] = 'Some error occured';
    }
  
     else {
         $results['status'] = 400;
            $results['msg'] = 'Error occured'; 
     }
    }
    else {
        $results['status'] = 400;
        $results['msg'] = 'Provide proper Mentor'; 
    }

    return echoResponse($results);
 
});

//search multiple filter
$app->post('/search_by_filters', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $terms = $allGetVars['terms'];
    
    if(!empty($mentor_id) || $mentor_id != 0){
    
    $helper = new commonHelper();
    $user = $helper->search_by_filters($terms);
    if($user == '1'){
        $results['status'] = 200;
        $results['msg'] = 'Mentor Assigned successfully!';
    }
    else if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Student not found';
    }
    else if($user == '3'){
        $results['status'] = 400;
        $results['msg'] = 'Some error occured';
    }
  
     else {
         $results['status'] = 400;
            $results['msg'] = 'Error occured'; 
     }
    }
    else {
        $results['status'] = 400;
        $results['msg'] = 'Provide proper Mentor'; 
    }

    return echoResponse($results);
 
});



//sooprs apis from here//
$app->post('/sr_services_all', function(){
    $helper = new commonHelper();
    $user = $helper->sr_services_all();
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Service not found!Please try again';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});

//sooprs apis from here//
$app->post('/sr_services_new_cat', function(){
    $helper = new commonHelper();
    $user = $helper->sr_services_new_cat();
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No main category found';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});

// new services main category
$app->post('/sr_services_new_main_category', function(){
    $helper = new commonHelper();
    $user = $helper->sr_services_new_main_category();
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No main category found';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});

// new services sub category
$app->post('/sr_services_new_sub_category', function($request, $response, $args){

    $allGetVars = $request->getParsedBody();
    $main_cat_id = $allGetVars['main_cat_id'];
    
    $helper = new commonHelper();
    $user = $helper->sr_services_new_sub_category($main_cat_id);
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No main category found';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});


//skills list from here//
$app->post('/sp_skills_all', function(){
    
    
    
    $helper = new commonHelper();
    $user = $helper->sp_skills_all();
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Skill not found!Please try again';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});


//sooprs apis from here//
$app->post('/sr_services', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $term = $allGetVars['term'];
    
    
    $helper = new commonHelper();
    $user = $helper->get_sooprs_services($term);
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Service not found!Please try again';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});

//service id question
$app->post('/sr_questions', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $question = $allGetVars['question'];
    
    
    $helper = new commonHelper();
    $user = $helper->sr_other_questions($question);
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Service not found!Please try again';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});

//get first question
$app->post('/sr_servicesFirst', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $service = $allGetVars['service'];
    
    $helper = new commonHelper();
    $user = $helper->sr_servicesFirst($service);
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Service not found!Please try again';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});

//save enquiry
$app->post('/save_enquiry', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $name = $allGetVars['name'];
    $email = $allGetVars['email'];
    $mobile = $allGetVars['mobile'];
    $city = $allGetVars['city'];
    
    $category = $allGetVars['category'];
    $client_remark = $allGetVars['client_remark'];
    $client_enquiry = $allGetVars['client_enquiry'];
    
    $enq_array = explode(",",$client_enquiry);    
    
    $helper = new commonHelper();
    $user = $helper->save_enquiry($name, $email, $mobile, $city,$category, $client_remark, $enq_array);    
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Service not found!Please try again';
    }
    if($user == '3'){
        $results['status'] = 200;
        $results['msg'] = 'success without saving data';
    }    
     else {
         $results['status'] = 200;
            $results['msg'] = 'success'; 
     }  
    return echoResponse($results);
 
});


// send Sooprs customer enquiry mail 
$app->post('/sendSooprsMail', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $name = $allGetVars['name'];
    $email = $allGetVars['email'];
    $mobile = $allGetVars['mobile'];
    $city = $allGetVars['city'];    
    $category = $allGetVars['category'];
    $client_remark = $allGetVars['client_remark'];
    $client_enquiry = $allGetVars['client_enquiry'];    
    $enq_array = explode(",",$client_enquiry);  
    
    $helper = new commonHelper();
    $user = $helper->get__service_name($category); 
    $enqDetail = $helper->customer_enquiry_questions($enq_array); 
    // $results['status'] = 200;
    //         $results['msg'] = $enqDetail; 

    if($user == '1' || $enqDetail == '1'){
        $results['status'] = 400;
        $results['msg'] = 'Service not found!';
    }else{
        
        $results['status'] = 200;
        $results['msg'] = $user;
        $service__name = $user['service_name'];
        
        

    
        
        $subject = 'New Customer Enquiry on Sooprs';
        $from = 'contact@sooprs.com';
        $title = 'New Enquiry on Sooprs!';
        $body = "<html>
        <head>
            <title>Customer Enquiry</title>
        </head>
        <body>
            <p>Dear Sooprs Team,</p>
            <p>A new customer inquiry has been generated with the following details:</p>
            <p><strong>Customer Name:</strong> " . $name . "</p>
            <p><strong>Contact Email:</strong> " . $email . "</p>
            <p><strong>Contact Mobile no. Name:</strong> " . $mobile . "</p>
            <p><strong>Customer location:</strong> " . $city . "</p>
            <p><strong>Customer enquiry:</strong> " . $service__name . "</p>

            <p><strong>Customer budget:</strong> " . $enqDetail['answer'] . "</p>
            <br>
            <p>Please review the inquiry and take appropriate action to assist the customer promptly.</p>
            <p>The Sooprs Team</p>
        </body>
        </html>";
        require_once('../../send-enquiry-email.php');
        $send_pass_email = send_email($email, $body, $from, $subject);
        if($send_pass_email){
        $results['status'] = 200;
        $results['msg'] = 'New Enquiry send to mail';
        }
        else {
            $results['status'] = 400;
        $results['msg'] = 'Email could not sent!Try again';
        }
    }
 
    return echoResponse($results);

});


//save_post_project
$app->post('/save_post_project', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
   
    $email = $allGetVars['email'];
    $country = $allGetVars['country'];
    $mobile = $allGetVars['countryCode'].$allGetVars['mobile'];
    $subject = $allGetVars['project_title'];
    $description = $allGetVars['description'];
    $max_budget_amount = $allGetVars['max_budget_amount'];
    $min_budget_amount = $allGetVars['min_budget_amount'];
    $category = $allGetVars['category'];
    
    $helper = new commonHelper();
    $user = $helper->save_project( $email, $mobile,$subject,$description,$min_budget_amount,$max_budget_amount,$category,$country);    
//    print_r($user) ;
//    die();
    if($user == '1'){
        $results['status'] = 400;
        $results['status_code'] = 1 ;
        $results['msg'] = 'Project could not posted!Try again';
    }
     else if($user == '2'){
        $results['status'] = 400;
        $results['status_code'] = 2 ;
        $results['msg'] = 'Project could not posted!Try again';
    }
    else if($user == '6'){
        //for old customer 
        $results['status'] = 200;
        $results['status_code'] = 6 ;        
        $results['msg'] = 'success without saving data';
    }
    else if($user == '4'){
        //for new customer
        $results['status'] = 200;
        $results['status_code'] = 4 ;
        $results['msg'] = 'Project posted and otp sent';
    }
    else if($user == '5'){
        $results['status'] = 200;
        $results['status_code'] = 5 ;
        $results['msg'] = 'Project posted but email could not sent!';
    }
     else if($user == '3') {
         $results['status'] = 400;
         $results['status_code'] = 3 ;
            $results['msg'] = 'Min. budget should be less than Max. budget'; 
     } 
     else if($user == '8') {
        $results['status'] = 400;
        $results['status_code'] = 8 ;
           $results['msg'] = 'Fill required fields'; 
    }  
    else {
        $results['status'] = 200;
        $results['status_code'] = 3 ;
           $results['msg'] = $user; 
    }  
    return echoResponse($results);
 
});

//get all professionals

$app->post('/get_professionals_ajax', function($request, $response, $args){
  
    
    $allGetVars = $request->getParsedBody();
    $offset = $allGetVars['offset'];
    $limit = $allGetVars['limit'];

    
    $helper = new commonHelper();
    $user = $helper->get_professionals($offset, $limit);
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No professional found! Try again';
    }
    
    else {
        $results['status'] = 200;
        $results['msg'] = $user; 
    }
    

    return echoResponse($results);
 
});

//get professional ajax

$app->post('/get_professionals_ajax2', function($request, $response, $args){
  
    
    $allGetVars = $request->getParsedBody();
    $offset = $allGetVars['offset'];
    $limit = $allGetVars['limit'];
    $cat = $allGetVars['cat_id'];

    
    $helper = new commonHelper();
    $user = $helper->get_professionals2($offset, $limit,$cat);
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No professional found! Try again';
    }
    else if($user == '3'){
        $results['status'] = 400;
        $results['msg'] = 'something wrong with request';
    }
    
    else {
        $results['status'] = 200;
        $results['msg'] = $user; 
    }
    

    return echoResponse($results);
 
});



//get top rated professionals

$app->post('/get_top_rated_professionals_ajax', function($request, $response, $args){
  
    
    $allGetVars = $request->getParsedBody();
    $offset = $allGetVars['offset'];
    $limit = $allGetVars['limit'];

    
    $helper = new commonHelper();
    $user = $helper->get_top_rated_professionals($offset, $limit);
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No professional found! Try again';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});




//get all leads


$app->post('/get_leads_ajax', function($request, $response, $args){
  
    
    $allGetVars = $request->getParsedBody();
    // $offset = $allGetVars['offset'];
    // $limit = $allGetVars['limit'];

    
    $helper = new commonHelper();
    $user = $helper->get_leads();
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No professional found! Try again';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});


$app->post('/get_all_leads', function($request, $response, $args){
  
    
    $allGetVars = $request->getParsedBody();
    $offset = $allGetVars['offset'];
    $limit = $allGetVars['limit'];

    
    $helper = new commonHelper();
    $user = $helper->get_all_leads($offset, $limit);
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No Project Found! Try again';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});

// all leads count 
$app->post('/get_leads_count', function($request, $response, $args){
  
    
    $allGetVars = $request->getParsedBody();
    

    
    $helper = new commonHelper();
    $user = $helper->get_leads_count();
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No Project Found! Try again';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});

// all professionals count 
$app->post('/get_professionals_count', function($request, $response, $args){
  
    
    $allGetVars = $request->getParsedBody();
   

    
    $helper = new commonHelper();
    $user = $helper->get_professionals_count();
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No professionals Found! Try again';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});


// get bell jobs 
$app->post('/get_bell_jobs', function($request, $response, $args){
  
    
    $allGetVars = $request->getParsedBody();
    

    
    $helper = new commonHelper();
    $user = $helper->get_bell_jobs();
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No Project Found! Try again';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});

$app->post('/get_my_leads', function($request, $response, $args){
  
    
    $allGetVars = $request->getParsedBody();
    $offset = $allGetVars['offset'];
    $limit = $allGetVars['limit'];
    // $my_get_val = $allGetVars['my_get_val'];
    $my_get_id = $allGetVars['my_get_id'];

    
    $helper = new commonHelper();
    $user = $helper->get_my_leads($offset, $limit,$my_get_id);
    // return echoResponse($user);

    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No professional found! Try again';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});

// Switch now button 
$app->post('/switch_account', function($request, $response, $args){
  
    
    $allGetVars = $request->getParsedBody();
    $switchAccEmail = $allGetVars['switchAccEmail'];
   

    
    $helper = new commonHelper();
    $user = $helper->switch_account($switchAccEmail);
    

    if($user == '2'){
        $results['status'] = 200;
        $results['msg'] = 'account switched successfully';
    }else if($user == '3'){
        $results['status'] = 400;
        $results['msg'] = 'account can not be switched ';
    }
    else if($user == '1'){
        $results['status'] = 400;
        $results['msg'] = 'User not found ';
    }
    

    return echoResponse($results);
 
});




//filter service ajax

$app->post('/filter_leads_ajax', function($request, $response, $args){  
    
    $allGetVars = $request->getParsedBody();
    $dataValue = $allGetVars['dataValue'];
   

    $helper = new commonHelper();
    $user = $helper->filter_leads($dataValue);
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No lead found! Try again';
    }    
     else {
         $results['status'] = 200;
        $results['msg'] = $user; 
     }    

    return echoResponse($results); 
});


//filter service ajax

$app->post('/filter_leads_ajax_mainservice', function($request, $response, $args){  
    
    $allGetVars = $request->getParsedBody();
    $dataValue = $allGetVars['dataValue'];
   

    $helper = new commonHelper();
    $user = $helper->filter_leads_ajax_mainservice($dataValue);
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No lead found! Try again';
    }    
     else {
         $results['status'] = 200;
        $results['msg'] = $user; 
     }    

    return echoResponse($results); 
});

$app->post('/filter_myleads_ajax', function($request, $response, $args){
  
    
    $allGetVars = $request->getParsedBody();    
    $dataValue = $allGetVars['dataValue'];
    $my_get_id = $allGetVars['my_get_id'];

    
    $helper = new commonHelper();
    $user = $helper->filter_myleads_ajax($my_get_id,$dataValue);
    // return echoResponse($user);

    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No professional found! Try again';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});



//get all customer enquiries

$app->post('/get_enquiries_ajax', function($request, $response, $args){
  
    
    $allGetVars = $request->getParsedBody();
    $cust_id = $allGetVars['variable'];
    // $offset = $allGetVars['offset'];
    // $limit = $allGetVars['limit'];

    
    $helper = new commonHelper();
    $user = $helper->get_enquiries($cust_id);
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No professional found! Try again';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});


//get all customer enquiries

$app->post('/reward_project', function($request, $response, $args){
  
    
    $allGetVars = $request->getParsedBody();
    $lead_id = $allGetVars['lead_id'];
    // $offset = $allGetVars['offset'];
    // $limit = $allGetVars['limit'];

    
    $helper = new commonHelper();
    $user = $helper->reward_project($lead_id);
    

    if($user == 1){
        $results['status'] = 400;
        $results['msg'] = 'No lead found! Try again';
    }elseif($user == 3){
        $results['status'] = 400;
        $results['msg'] = 'something went wrong';
    }elseif($user == 4){
        $results['status'] = 400;
        $results['msg'] = 'Already rewarded';
    }else {
        $results['status'] = 200;
        $results['msg'] = 'successfully rewarded'; 
     }
    

    return echoResponse($results);
 
});



$app->post('/get_projects_ajax', function($request, $response, $args){
  
    
    $allGetVars = $request->getParsedBody();
    $cust_id = $allGetVars['variable'];
    // $offset = $allGetVars['offset'];
    // $limit = $allGetVars['limit'];

    
    $helper = new commonHelper();
    $user = $helper->get_projects($cust_id);
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No professional found! Try again';
    }    
    else {
        $results['status'] = 200;
        $results['msg'] = $user;        
    }   

    return echoResponse($results);
 
});


$app->post('/get_professional_projects', function($request, $response, $args){
  
    
    $allGetVars = $request->getParsedBody();
    $cust_id = $allGetVars['variable'];
    // $offset = $allGetVars['offset'];
    // $limit = $allGetVars['limit'];

    
    $helper = new commonHelper();
    $user = $helper->get_professional_projects($cust_id);
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No professional found! Try again';
    }
    
     else {
        $results['status'] = 200;
        $results['msg'] = $user; 
        
        
     }
    

    return echoResponse($results);
 
});


//get all customer enquiries

$app->post('/query_detail', function($request, $response, $args){
  
    
    $allGetVars = $request->getParsedBody();
    $lead_id = $allGetVars['lead_id'];
    // $offset = $allGetVars['offset'];
    // $limit = $allGetVars['limit'];

    
    $helper = new commonHelper();
    $user = $helper->query_detail($lead_id);
    // return $user;
    if($user == '1'){
        $results['status'] = 400;
        $results['msg'] = 'No interested professional found';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});


// add professional service 
$app->post('/addServForm', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $service = $allGetVars['service'];
    $profid = $allGetVars['profid'];

   
    
    
    $helper = new commonHelper();
    $user = $helper->addProfService($service,$profid);
    
    // return echoResponse($user);
   
    if($user == '1'){
        $results['status'] = 400;
        $results['msg'] = 'Service  not found!Please try again';
    }
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Professional not found!Please try again';
    }
    if($user == '3'){
        $results['status'] = 200;
        $results['msg'] = 'Service added successfully';
    }
    if($user == '4'){
        $results['status'] = 400;
        $results['msg'] = 'Problem adding service';
    }
    if($user == '5'){
        $results['status'] = 400;
        $results['msg'] = 'Service already present';
    }
    
    

    return echoResponse($results);
 
});



// add professional service 
$app->post('/addSkillForm', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $skill = $allGetVars['skill'];
    $profid = $allGetVars['profid'];

    // return $skill;
   
    
    
    $helper = new commonHelper();
    $user = $helper->addProfSkill($skill,$profid);
    
    // return echoResponse($user);
   
    if($user == '1'){
        $results['status'] = 400;
        $results['msg'] = 'skill  not found!Please try again';
    }
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Professional not found!Please try again';
    }
    if($user == '3'){
        $results['status'] = 200;
        $results['msg'] = 'skill added successfully';
    }
    if($user == '4'){
        $results['status'] = 400;
        $results['msg'] = 'Problem adding skill';
    }
    if($user == '5'){
        $results['status'] = 400;
        $results['msg'] = 'skill already present';
    }
    
    

    return echoResponse($results);
 
});


//filter professionals acc. to service ajax

$app->post('/filter_service_ajax', function($request, $response, $args){
  
    
    $allGetVars = $request->getParsedBody();
    $dataValue = $allGetVars['dataValue'];
    

    
    $helper = new commonHelper();
    $user = $helper->filter_service($dataValue);
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No professional found! Try again';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});




//searching professional//
$app->post('/ajax-live-search', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $query = $allGetVars['query'];

    $helper = new commonHelper();
    $user = $helper->search_professionals($query);
    //    print($user);
    //    die();
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No professional found! Try again';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});



//Remove professional service from professional lead services

$app->post('/remove_professional_service', function($request, $response, $args){  
    
    $allGetVars = $request->getParsedBody();
    $dataSerValue = $allGetVars['dataSerValue'];
    $dataPrfValue = $allGetVars['dataPrfValue'];  
    
    $helper = new commonHelper();
    $user = $helper->remove_service($dataSerValue,$dataPrfValue);
    // return echoResponse($user); 
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No professional found! Try again';
    }
    elseif($user == '10') {
        $results['status'] = 400;
           $results['msg'] = 'Some error occured! Try again'; 
    }
    elseif($user == '100') {
        $results['status'] = 400;
           $results['msg'] = 'Service not found! Try again'; 
    }
     elseif($user == '1') {
         $results['status'] = 200;
            $results['msg'] = 'Service removed successfully';  
     }    

    return echoResponse($results); 
});

//Remove professional skill from professional 

$app->post('/remove_professional_skill', function($request, $response, $args){  
    
    $allGetVars = $request->getParsedBody();
    $dataSkillValue = $allGetVars['dataSkillValue'];
    $dataPrfValue = $allGetVars['dataPrfValue'];  
    // return echoResponse($dataSkillValue); 
    
    $helper = new commonHelper();
    $user = $helper->remove_skill($dataSkillValue,$dataPrfValue);
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'No professional found! Try again';
    }
    elseif($user == '10') {
        $results['status'] = 400;
           $results['msg'] = 'Some error occured! Try again'; 
    }
    elseif($user == '100') {
        $results['status'] = 400;
           $results['msg'] = 'Service not found! Try again'; 
    }
     elseif($user == '1') {
         $results['status'] = 200;
            $results['msg'] = 'Service removed successfully';  
     }    

    return echoResponse($results); 
});


// customer profile update 
$app->post('/update_profile', function($request, $response, $args){  
    
    $allGetVars = $request->getParsedBody();
    $id = $allGetVars['id'];
    $name = $allGetVars['name'];  
    $email = $allGetVars['email'];
    $mobile = $allGetVars['mobile'];  
    
    $helper = new commonHelper();
    $user = $helper->update_profile_details($id,$name,$email,$mobile);
   
    if($user == '1'){
        $results['status'] = 400;
        $results['msg'] = 'Fill all fields';
    }
    elseif($user == '2') {
        $results['status'] = 400;
           $results['msg'] = 'Customer not found'; 
    }
    elseif($user == '4') {
        $results['status'] = 400;
           $results['msg'] = 'Some error occured'; 
    }
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }    

    return echoResponse($results); 
});


// customer password update 
$app->post('/update-password', function($request, $response, $args){  
    
    $allGetVars = $request->getParsedBody();
    $id = $allGetVars['id'];
    $table_name = $allGetVars['table_name'];
    $currentpass = $allGetVars['currentpass'];  
    $newpass = $allGetVars['newpass'];
    $confirmnewpass = $allGetVars['confirmnewpass'];  
    
    $helper = new commonHelper();
    $user = $helper->update_password_details($id,$table_name,$currentpass,$newpass,$confirmnewpass);
//    return $user;
    if($user == '1'){
        $results['status'] = 400;
        $results['msg'] = 'Password not matched';
    }
    elseif($user == '2') {
        $results['status'] = 400;
           $results['msg'] = 'current password not matched'; 
    }
    elseif($user == '4') {
        $results['status'] = 400;
           $results['msg'] = 'Some error occured. Please try again'; 
    }else if($user == 5){
        $results['status'] = 400;
          $results['msg'] = 'Password must contain Uppercasse,Lowercase and Number'; 
      }
     else {
         $results['status'] = 200;
            $results['msg'] = 'Password changed successfully'; 
     }    

    return echoResponse($results); 
});


// professional profile update 
$app->post('/update_profile_professional', function($request, $response, $args){  
    
    $allGetVars = $request->getParsedBody();
    $id = $allGetVars['id'];
    $name = $allGetVars['name'];  
    $email = $allGetVars['email'];
    $city = $allGetVars['city'];
    $mobile = $allGetVars['mobile'];  
    $organisation = $allGetVars['organisation'];  
    $bio = $allGetVars['bio'];
    $about = $allGetVars['about']; 
    
    $helper = new commonHelper();
    $user = $helper->update_professional_profile_details($id,$name,$email,$city,$mobile,$organisation,$bio,$about);
   
    if($user == '1'){
        $results['status'] = 400;
        $results['msg'] = 'Fill all fields';
    }
    elseif($user == '2') {
        $results['status'] = 400;
           $results['msg'] = 'Professional not found'; 
    }
    elseif($user == '4') {
        $results['status'] = 400;
           $results['msg'] = 'Some error occured'; 
    }elseif($user == '5') {
        $results['status'] = 400;
           $results['msg'] = 'Email does not match the proper format'; 
    }
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }    

    return echoResponse($results); 
});




// Upload profile pic (working)
$app->post('/upload_picture',function($request,$response,$args){
    global $files_path;
    $allGetVars = $request->getParsedBody();   
    $id = $allGetVars['id'];
    $table = $allGetVars['table'];


    $profile_pic = '';

    $target_dir = dirname(__DIR__).'/../assets/files/';   

    // $target_dir = "C:\\xampp\\htdocs\\sooprs"."\\assets\\files\\";      
    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));
    if($imageFileType!=''){
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check === false){
          $results['status'] = 400;
            $results['msg'] = 'image is not actuall';
        }
    
          if($imageFileType != "jpg" || $imageFileType != "png" || $imageFileType != "jpeg"){
            $results['status'] = 400;
            $results['msg'] = 'only png,jpg,jpeg images are allowed'; 
          }
    
           $filename   = uniqid() . "-" . time(); 
           $basename   = $filename . "." . $imageFileType;
           $source       = $_FILES["image"]["tmp_name"];
           $destination = $target_dir.basename($basename);
           if(move_uploaded_file($source, $destination)){
              $updatedPath = $files_path.$basename;
    
           }
    
           $profile_pic = $updatedPath;
    
    }    


    $helper = new commonHelper();
    $user = $helper->upload_profile_picture($id,$profile_pic,$table);
    if($user == 1) {
        $results['status'] = 400;
        $results['msg'] = 'User not found';
    }elseif($user == false){
        
        $results['status'] = 400;
        $results['msg'] = 'Not uploaded';
    }else{
        $results['status'] = 200;
        $results['msg'] = $user; 
    }

    return echoResponse($results);
});


// Upload profile pic (working)
$app->post('/upload_resume',function($request,$response,$args){


    global $files_path;
    $allGetVars = $request->getParsedBody();   
    $id = $allGetVars['id'];
    
    $profile_pic = '';

    

    $target_dir = dirname(__DIR__).'/../assets/files/';   

    // $target_dir = "C:\\xampp\\htdocs\\sooprs"."\\assets\\files\\";      
  
    $imageFileType = strtolower(pathinfo($_FILES["resume"]["name"], PATHINFO_EXTENSION));
    
    
    if ($imageFileType != '') {
         
        if ($imageFileType != "pdf") {
            $results['status'] = 400;
            $results['msg'] = 'Only PDF files are allowed';
            return echoResponse($results);
        } else {
            // Check file size (5MB maximum)
            if ($_FILES["image"]["size"] > 5 * 1024 * 1024) {
                $results['status'] = 400;
                $results['msg'] = 'File size exceeds 5MB limit';
                return echoResponse($results);
            } else {
                $filename = uniqid() . "-" . time();
                $basename = $filename . "." . $imageFileType;
                $source = $_FILES["resume"]["tmp_name"];
                $destination = $target_dir . basename($basename);
                if (move_uploaded_file($source, $destination)) {
                    $updatedPath = $files_path . $basename;
                    $profile_pic = $updatedPath;
                    
                }else{
                    $results['status'] = 400;
                    $results['msg'] = 'can not upload file';
                    return echoResponse($results);
                }
                
                
                if( $profile_pic == ''){
                    $results['status'] = 400;
                    $results['msg'] = 'some thing went wrong';
                    return echoResponse($results); 
                }
            }
        }
        
    }

    $helper = new commonHelper();
    $user = $helper->upload_resume($id,$profile_pic);
    if($user == 1) {
        $results['status'] = 400;
        $results['msg'] = 'User not found';
    }elseif($user == false){
        
        $results['status'] = 400;
        $results['msg'] = 'Not uploaded';
    }else{
        $results['status'] = 200;
        $results['msg'] = $user; 
    }

    return echoResponse($results);
});


// Upload profile pic (working)
$app->post('/add_skills',function($request,$response,$args){


    
    $allGetVars = $request->getParsedBody();   
    $id = $allGetVars['id'];
    $skills = $allGetVars['skills'];
    
   
    

    $helper = new commonHelper();
    $user = $helper->add_skills($id, $skills);
    if($user == 1) {
        $results['status'] = 400;
        $results['msg'] = 'User not found';
    }elseif($user == false){
        
        $results['status'] = 400;
        $results['msg'] = 'something went wrong';
    }else{
        $results['status'] = 200;
        $results['msg'] = 'Skills added successfully'; 
    }

    return echoResponse($results);
});


// Upload profile pic (working)
$app->post('/add_exp',function($request,$response,$args){


    
    $allGetVars = $request->getParsedBody();   
    $id = $allGetVars['id'];
    $organization = $allGetVars['organization'];
    $from = $allGetVars['from'];
    $to = $allGetVars['to'];
    $designation = $allGetVars['designation'];


    $helper = new commonHelper();
    $user = $helper->add_exp($id, $organization, $from, $to, $designation);
    if($user == 1) {
        $results['status'] = 400;
        $results['msg'] = 'something went wrong';
    }else{
        $results['status'] = 200;
        $results['msg'] = 'successfully added'; 
    }

    return echoResponse($results);
});


// Upload profile pic (working)
$app->post('/get_exp',function($request,$response,$args){


    
    $allGetVars = $request->getParsedBody();   
    $id = $allGetVars['user_id'];
    


    $helper = new commonHelper();
    $user = $helper->get_exp($id);
    if($user == 1) {
        $results['status'] = 400;
        $results['msg'] = 'no record found';
    }else{
        $results['status'] = 200;
        $results['msg'] = $user; 
    }

    return echoResponse($results);
});





// Upload profile pic (working)
$app->post('/delete_exp',function($request,$response,$args){

    $allGetVars = $request->getParsedBody();   
    $id = $allGetVars['exp_id'];
    
    $helper = new commonHelper();
    $user = $helper->delete_exp($id);

    if($user == 1) {
        $results['status'] = 400;
        $results['msg'] = 'no record found';
    }elseif($user == 3) {
        $results['status'] = 400;
        $results['msg'] = 'something weint wrong';
    }else{
        $results['status'] = 200;
        $results['msg'] = 'successfully deleted record'; 
    }

    return echoResponse($results);
});


// Upload profile pic (working)
$app->post('/add_academics',function($request,$response,$args){


    
    $allGetVars = $request->getParsedBody();   
    $id = $allGetVars['id'];
    $course = $allGetVars['course'];
    $institute = $allGetVars['institute'];
    $university = $allGetVars['university'];
    $year = $allGetVars['year'];
    $percentage = $allGetVars['percentage'];


    $helper = new commonHelper();
    $user = $helper->add_academics($id, $course, $institute, $university, $year, $percentage);
    if($user == 1) {
        $results['status'] = 400;
        $results['msg'] = 'something went wrong';
    }else{
        $results['status'] = 200;
        $results['msg'] = 'successfully added'; 
    }

    return echoResponse($results);
});
// Upload profile pic (working)
$app->post('/get_academics',function($request,$response,$args){

    $allGetVars = $request->getParsedBody();   
    $id = $allGetVars['user_id'];
    
    $helper = new commonHelper();
    $user = $helper->get_academics($id);

    if($user == 1) {
        $results['status'] = 400;
        $results['msg'] = 'no record found';
    }else{
        $results['status'] = 200;
        $results['msg'] = $user; 
    }

    return echoResponse($results);
});

// Upload profile pic (working)
$app->post('/delete_academics',function($request,$response,$args){

    $allGetVars = $request->getParsedBody();   
    $id = $allGetVars['exp_id'];
    
    $helper = new commonHelper();
    $user = $helper->delete_academics($id);

    if($user == 1) {
        $results['status'] = 400;
        $results['msg'] = 'no record found';
    }elseif($user == 3) {
        $results['status'] = 400;
        $results['msg'] = 'something weint wrong';
    }else{
        $results['status'] = 200;
        $results['msg'] = 'successfully deleted record'; 
    }

    return echoResponse($results);
});


// update wallet (working)
$app->post('/update_wallet',function($request,$response,$args){

    $allGetVars = $request->getParsedBody();   
    $id = $allGetVars['user_id'];
    $amount = $allGetVars['amount'];
    $payment_id = $allGetVars['payment_id'];
    
    $helper = new commonHelper();
    $user = $helper->update_wallet($id, $amount, $payment_id);

    if($user == 1) {
        $results['status'] = 400;
        $results['msg'] = 'user not found';
    }elseif($user == 3) {
        $results['status'] = 400;
        $results['msg'] = 'something went wrong';
    }else{
        $results['status'] = 200;
        $results['msg'] = $user; 
    }

    return echoResponse($results);
});


// update wallet (working)
$app->post('/gig_order',function($request,$response,$args){

    $allGetVars = $request->getParsedBody();   
    $id = $allGetVars['user_id'];
    $amount = $allGetVars['amount'];
    $payment_id = $allGetVars['payment_id'];
    $gig_id = $allGetVars['gig_id'];

    
    $helper = new commonHelper();
    $user = $helper->gig_order($id,$gig_id, $amount, $payment_id);

    if($user == 1) {
        $results['status'] = 400;
        $results['msg'] = 'user not found';
    }elseif($user == 3) {
        $results['status'] = 400;
        $results['msg'] = 'something went wrong';
    }else{
        $results['status'] = 200;
        $results['msg'] = $user; 
    }

    return echoResponse($results);
});
// update wallet milestone payment (working)
$app->post('/update_wallet_milestone_payment',function($request,$response,$args){

    $allGetVars = $request->getParsedBody();   
    $id = $allGetVars['user_id'];
    $mid = $allGetVars['mid'];
    $amount = $allGetVars['amount'];
    $payment_id = $allGetVars['payment_id'];
    
    
    $helper = new commonHelper();
    $user = $helper->update_wallet_milestone_payment($id,$mid, $amount, $payment_id);

    if($user == 1) {
        $results['status'] = 400;
        $results['msg'] = 'user not found';
    }elseif($user == 3) {
        $results['status'] = 400;
        $results['msg'] = 'something went wrong';
    }elseif($user == 2) {
        $results['status'] = 400;
        $results['msg'] = 'Not enough credits.';
    }elseif($user == 4) {
        $results['status'] = 400;
        $results['msg'] = 'Status not updated. Contact customer support';
    }else{
        $results['status'] = 200;
        $results['msg'] = $user; 
    }

    return echoResponse($results);
});

$app->post('/add_milestone', function ($request, $response, $args) {
    $allPostVars = $request->getParsedBody();
    $milestones = $allPostVars['formData'];    
    $user_id = $allPostVars['user_id'];
    $leadId = $allPostVars['leadId'];


    $helper = new commonHelper();
    $user = $helper->add_milestone($milestones,$user_id,$leadId);

    if ($user == 4) {
        $results['status'] = 400;
        $results['msg'] = 'Some error occured. Try again';
    }elseif($user == 5) {        
        $results['status'] = 400;
        $results['msg'] = 'Milestones already created';
    } else {        
        $results['status'] = 200;
        $results['msg'] = 'Milestones created successfully';
    }   

    return echoResponse($results);
});

$app->post('/edit_milestone', function ($request, $response, $args) {
    $allPostVars = $request->getParsedBody();
    $milestones = $allPostVars['formData'];    
    $user_id = $allPostVars['user_id'];
    $leadId = $allPostVars['leadId'];


    $helper = new commonHelper();
    $user = $helper->edit_milestone($milestones,$user_id,$leadId);

    if ($user == 1) {
        $results['status'] = 400;
        $results['msg'] = 'Some error occured. Try again';
    }elseif($user == 2) {        
        $results['status'] = 400;
        $results['msg'] = 'Error while creating milestones';
    } else {        
        $results['status'] = 200;
        $results['msg'] = 'Milestones created successfully';
    }   

    return echoResponse($results);
});


$app->post('/acceptMilestones', function ($request, $response, $args) {
    $allPostVars = $request->getParsedBody();
    $project_id = $allPostVars['project_id'];

    $helper = new commonHelper();
    $user = $helper->acceptMilestones($project_id);

    if ($user == 4) {
        $results['status'] = 400;
        $results['msg'] = 'Milestone status update failed. Try again';
    } elseif($user == 2) {
        
        $results['status'] = 400;
        $results['msg'] = 'No milestones found';
    }   else {
        
        $results['status'] = 200;
        $results['msg'] = 'Milestones status updated successfully';
    }   

    return echoResponse($results);
});



$app->post('/update_milestones_status', function ($request, $response, $args) {
    $allPostVars = $request->getParsedBody();
    $milestone_id = $allPostVars['milestone_id'];
    $milestone_status = $allPostVars['milestone_status'];

    $helper = new commonHelper();
    $user = $helper->update_milestones_status($milestone_id,$milestone_status);

    if ($user == 4) {
        $results['status'] = 400;
        $results['msg'] = 'Milestone status update failed. Try again';
    } elseif($user == 2) {
        
        $results['status'] = 400;
        $results['msg'] = 'No milestones found';
    }  elseif($user == 5) {
        
        $results['status'] = 200;
        $results['msg'] = 'Milestone rejected';
    }elseif($user == 6) {
        
        $results['status'] = 400;
        $results['msg'] = 'Milestone rejection failed. Try again';
    } else {
        
        $results['status'] = 200;
        $results['msg'] = 'Milestones status updated successfully';
    }   

    return echoResponse($results);
});

$app->post('/markItCompleted', function ($request, $response, $args) {
    $allPostVars = $request->getParsedBody();
    $leadId = $allPostVars['datamilestoneid'];
    $m_id = $allPostVars['mtups'];

    $helper = new commonHelper();
    $user = $helper->markItCompleted($leadId,$m_id);

    if ($user == 4) {
        $results['status'] = 400;
        $results['msg'] = 'Milestone status update failed. Try again';
    } 
    elseif($user == 1) {
        
        $results['status'] = 200;
        $results['type'] = 1;
        $results['msg'] = 'Milestone marked as completed';
    }
      elseif($user == 5) {
        
    //     $results['status'] = 200;
    //     $results['msg'] = 'Milestone rejected';
    }
    // elseif($user == 6) {
        
    //     $results['status'] = 400;
    //     $results['msg'] = 'Milestone rejection failed. Try again';
    // } 
    else {
        
        $results['status'] = 200;
        $results['type'] = 3;
        $results['msg'] = 'All phases completed';
    }   

    return echoResponse($results);
});

$app->post('/remove_accept_reject_button',function($request,$response,$args){

    $allPostVars = $request->getParsedBody();   
    $lead_id = $allPostVars['lead_id'];
    
    
    $helper = new commonHelper();
    $user = $helper->remove_accept_reject_button($lead_id);

    if($user == 2) {
        $results['status'] = 400;
        $results['msg'] = false;
    }else{
        $results['status'] = 200;
        $results['msg'] =true; 
    }

    return echoResponse($results);
});

// get milestones
$app->post('/get_milestones',function($request,$response,$args){

    $allPostVars = $request->getParsedBody();   
    $lead_id = $allPostVars['lead_id'];
    $user_mile_id = $allPostVars['user_mile_id'];   
    
    
    $helper = new commonHelper();
    $user = $helper->get_milestones($lead_id,$user_mile_id);

    if($user == 2) {
        $results['status'] = 400;
        $results['msg'] = 'no milestone found';
    }else{
        $results['status'] = 200;
        $results['msg'] = $user; 
    }

    return echoResponse($results);
});



// get final  milestones
$app->post('/get_final_milestones',function($request,$response,$args){

    $allPostVars = $request->getParsedBody();   
    $lead_id = $allPostVars['lead_id'];

    
    
    $helper = new commonHelper();
    $user = $helper->get_final_milestones($lead_id);

    if($user == 2) {
        $results['status'] = 400;
        $results['msg'] = 'no milestone found';
    }else{
        $results['status'] = 200;
        $results['msg'] = $user; 
    }

    return echoResponse($results);
});

$app->post('/auth_user_milestones',function($request,$response,$args){

    $allPostVars = $request->getParsedBody();   
    $lead_id = $allPostVars['lead_id'];
    $cust_id = $allPostVars['cust_id'];       
    
    $helper = new commonHelper();
    $user = $helper->auth_user_milestones($lead_id,$cust_id);

    if($user == 2) {
        $results['status'] = 400;
        $results['msg'] = false;
    }else{
        $results['status'] = 200;
        $results['msg'] = true; 
    }

    return echoResponse($results);
});


// get milestones payment status
$app->post('/milestone_payment_status',function($request,$response,$args){

    $allPostVars = $request->getParsedBody();   
    $milStonId = $allPostVars['milStonId'];
    $lead_id = $allPostVars['lead_id'];   
    
    
    $helper = new commonHelper();
    $user = $helper->milestone_payment_status($lead_id,$milStonId);
    // print_r($user);
    // die();
    if($user == 2) {
        $results['status'] = 400;
        $results['msg'] = 'no milestone found';
    }elseif($user == 3) {
        $results['status'] = 400;
        $results['msg'] = 'All payment completed';
    }else{
        $results['status'] = 200;
        $results['msg'] = $user; 
    }

    return echoResponse($results);
});

// milestone complete button for customer 
$app->post('/milestoneCompleteButton',function($request,$response,$args){

    $allPostVars = $request->getParsedBody();   
    $milStonId = $allPostVars['milStonId'];
    $lead_id = $allPostVars['lead_id'];
    
    
    $helper = new commonHelper();
    $user = $helper->milestoneCompleteButton($lead_id,$milStonId);
    
    if($user == 2) {
        $results['status'] = 400;
        $results['msg'] = 'no milestone found';
    }elseif($user == 3) {
        $results['status'] = 400;
        $results['msg'] = 'All payment completed';
    }else{
        $results['status'] = 200;
        $results['msg'] = $user; 
    }

    return echoResponse($results);
});


$app->post('/milestones_payment', function ($request, $response, $args) {
    $allPostVars = $request->getParsedBody();
    $milestoneidLong = $allPostVars['project_id'];
    $mid = $allPostVars['mid'];

    $helper = new commonHelper();
    $user = $helper->milestones_payment($milestoneidLong,$mid);

    if ($user == 4) {
        $results['status'] = 400;
        $results['msg'] = 'Milestone payment failed. Try again';
    } 
    // elseif($user == 2) {
        
    //     $results['status'] = 400;
    //     $results['msg'] = 'No milestones found';
    // }  elseif($user == 5) {
        
    //     $results['status'] = 200;
    //     $results['msg'] = 'Milestone rejected';
    // }elseif($user == 6) {
        
    //     $results['status'] = 400;
    //     $results['msg'] = 'Milestone rejection failed. Try again';
    // }
     else {
        
        $results['status'] = 200;
        $results['msg'] = 'Milestones payment done successfully';
    }   

    return echoResponse($results);
});

$app->post('/add_requirements', function ($request, $response, $args) {
    global $files_path;

    $allPostVars = $request->getParsedBody();
    $project_id = $allPostVars['project_id'];
    $description = $allPostVars['description'];

    $profile_pic = '';
    if(isset($_FILES['file']) && $_FILES['file']['size'] > 0){

        $fileExtension = pathinfo($_FILES['file']["name"], PATHINFO_EXTENSION);
        $allowedExtArr = array('doc','docx','pdf','txt');
        if(!in_array($fileExtension, $allowedExtArr)){
            $results['status'] = 400;
            $results['msg'] = 'Invalid file format'; 
            return echoResponse($results);
        }
        if ($_FILES["file"]["size"] > 5000000) {
            $results['status'] = 400;
            $results['msg'] = 'File size too large. Max. file size is 5 MB';
            return echoResponse($results);

        }

        $target_dir = dirname(__DIR__).'/../assets/files/';
        // $target_dir = "C:\\xampp\\htdocs\\sooprs"."\\assets\\files\\";      
        $imageFileType = strtolower(pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION));
        if($imageFileType!=''){
           
            $filename   = uniqid() . "-" . time(); 
            $basename   = $filename . "." . $imageFileType;
            $source       = $_FILES["file"]["tmp_name"];
            $destination = $target_dir.basename($basename);
            if(move_uploaded_file($source, $destination)){
                $updatedPath = $files_path.$basename;
            }
            $profile_pic = $updatedPath;    
        }  

    }

   
    // Process each milestone (update wallet, save to database, etc.)
    $helper = new commonHelper();
    $user = $helper->add_requirements($project_id,$description,$profile_pic);

    if ($user == 4) {
        $results['status'] = 400;
        $results['msg'] = 'some error occured. Try again';
    }elseif ($user == 1) {
        $results['status'] = 200;
        $results['msg'] = 'Requirement updated successfully.';
    }elseif ($user == 2) {
        $results['status'] = 400;
        $results['msg'] = 'Requirement not updated. Try again';
    }
    elseif ($user == 5) {
        $results['status'] = 400;
        $results['msg'] = ' Invalid File format. Only doc, docx, pdf allowed';
    }else{        
        $results['status'] = 200;
        $results['msg'] = 'Requirement added successfully.';
    }
    

    return echoResponse($results);
});


// transactions based on type
$app->post('/get_transactions',function($request,$response,$args){

    $allGetVars = $request->getParsedBody();   
    $id = $allGetVars['user_id'];
    $data_value = $allGetVars['data_value'];
    
    $helper = new commonHelper();
    $user = $helper->getTransactionsByUserId($id, $data_value);

    if($user == 1) {
        $results['status'] = 400;
        $results['msg'] = 'no transaction found';
    }else{
        $results['status'] = 200;
        $results['msg'] = $user; 
    }

    return echoResponse($results);
});


// transactions based on past number of days
$app->post('/getTransactionsByUserIdAndDays',function($request,$response,$args){

    $allGetVars = $request->getParsedBody();   
    $id = $allGetVars['user_id'];
    $select_value = $allGetVars['select_value'];
    
    $helper = new commonHelper();
    $user = $helper->getTransactionsByUserIdAndDays($id, $select_value);

    if($user == 1) {
        $results['status'] = 400;
        $results['msg'] = 'no transaction found';
    }else{
        $results['status'] = 200;
        $results['msg'] = $user; 
    }

    return echoResponse($results);
});

// Upload profile pic (working)
$app->post('/add_bid',function($request,$response,$args){

    $allGetVars = $request->getParsedBody();   
    $id = $allGetVars['id'];
    $amount = $allGetVars['amount'];
    $description = $allGetVars['description'];
    $lead_id = $allGetVars['lead_id'];
    
    $helper = new commonHelper();
    $user = $helper->add_bid($id, $amount, $lead_id, $description);
    // print_r($user);
    // die();
    if($user == 1) {
        $results['status'] = 400;
        $results['msg'] = 'Project not found';
    }elseif($user == 3) {
        $results['status'] = 400;
        $results['msg'] = 'Something went wrong';
    }elseif($user == 4) {
        $results['status'] = 400;
        $results['msg'] = 'User not found';
    }elseif($user == 5) {
        $results['status'] = 400;
        $results['msg'] = 'not enough credits';
    }elseif($user == 6) {
        $results['status'] = 400;
        $results['msg'] = 'can not complete operation, try again later';
    }
    elseif($user == 7) {
        $results['status'] = 400;
        $results['msg'] = 'can not complete operation, try again later';
    }
    elseif($user == 8) {
        $results['status'] = 400;
        $results['msg'] = 'can not complete operation, try again later';
    }
    elseif($user == 9) {
        $results['status'] = 400;
        $results['msg'] = 'Amount can not be negative';
    }
    else{
        $results['status'] = 200;
        $results['msg'] ='Successfully purchased project'; 
    }

    return echoResponse($results);
});





// all pages on index page first two
$app->post('/sr_pages_all_firstTwo', function(){   
    
    
    $helper = new commonHelper();
    $user = $helper->sr_pages_all_first_two();
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Service not found!Please try again';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});

$app->post('/development_services', function(){   
    
    
    $helper = new commonHelper();
    $user = $helper->development_services();
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Service not found!Please try again';
    }
    
     else {
         $results['status'] = 200;
         $results['msg'] = $user; 
         $results['parent'] = "Development"; 

     }
    

    return echoResponse($results);
 
});

$app->post('/designing_services', function(){   
    
    
    $helper = new commonHelper();
    $user = $helper->designing_services();
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Service not found!Please try again';
    }
    
     else {
         $results['status'] = 200;
         $results['msg'] = $user; 
         $results['parent'] = "Designing"; 

     }
    

    return echoResponse($results);
 
});

$app->post('/latest_tech_section', function(){   
    
    
    $helper = new commonHelper();
    $user = $helper->latest_tech_section();
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Service not found!Please try again';
    }
    
     else {
         $results['status'] = 200;
         $results['msg'] = $user; 
         $results['parent'] = "Latest Tech"; 

     }
    

    return echoResponse($results);
 
});

$app->post('/marketing_section', function(){   
    
    
    $helper = new commonHelper();
    $user = $helper->marketing_section();
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Service not found!Please try again';
    }
    
     else {
         $results['status'] = 200;
         $results['msg'] = $user; 
         $results['parent'] = "Marketing"; 

     }
    

    return echoResponse($results);
 
});


// all pages on index page  last two
$app->post('/sr_pages_all_last_two', function(){   
    
    
    $helper = new commonHelper();
    $user = $helper->sr_pages_all_last_two();
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Service not found!Please try again';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});


// all pages on all-services page 
$app->post('/sr_pages_all_data', function(){   
    
    
    $helper = new commonHelper();
    $user = $helper->sr_pages_all_data();
   
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Service not found!Please try again';
    }
    
     else {
         $results['status'] = 200;
            $results['msg'] = $user; 
     }
    

    return echoResponse($results);
 
});


// update isseen 
$app->post('/updateIsseen', function($request, $response, $args){   
    
    $allGetVars = $request->getParsedBody();
    $notiId = $allGetVars['notiId'];

    $helper = new commonHelper();
    $user = $helper->updateIsseen($notiId);
   
    if($user == '2'){
        $results['status'] = 200;
        $results['msg'] = 'notification seen';
    }
    elseif($user == '1') {
        $results['status'] = 400;
           $results['msg'] = 'notification not found'; 
    }
    
     else {
         $results['status'] = 400;
            $results['msg'] =  'something wrong'; 
     }
    

    return echoResponse($results);
 
});



//send review link
$app->post('/send_review_link', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $p_id = $allGetVars['p_id'];
    $c_id = $allGetVars['c_id'];
    $c_mail = $allGetVars['c_mail'];
    $lead = $allGetVars['lead'];


   
    $helper = new commonHelper();
    $user = $helper->send_review_link($p_id, $c_id,$c_mail,$lead);
    

    if($user == '1'){
        $results['status'] = 200;
        $results['msg'] = 'Review link sent successfully';
    }
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Something went wrong!';
    }
    
    return echoResponse($results);

 
});

//send review 
$app->post('/submit_review', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $rating_data = $allGetVars['rating_data'];
    $user_name = $allGetVars['user_name'];
    $user_review = $allGetVars['user_review'];
    $customer_id = $allGetVars['customer_id'];
    $professional_id = $allGetVars['professional_id'];
    $lead_id = $allGetVars['lead_id'];




   
    $helper = new commonHelper();
    $user = $helper->submit_review($rating_data,$user_name,$user_review, $customer_id, $professional_id,$lead_id);
    

    if($user == '3'){
        $results['status'] = 200;
        $results['msg'] = 'Review saved successfully';
    }
    if($user == '4'){
        $results['status'] = 400;
        $results['msg'] = 'Something went wrong!';
    }
    if($user == '1'){
        $results['status'] = 400;
        $results['msg'] = 'No name or review!';
    }
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Already reviewed!';
    }
    

    return echoResponse($results);
 
});

// professional rating
$app->post('/professional_rating', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $id = $allGetVars['id'];
   
    $helper = new commonHelper();
    $user = $helper->professional_rating($id);
    
    return echoResponse($user);

    if($user == '1'){
        $results['status'] = 400;
        $results['msg'] = 'not found';
    }
    elseif($user == '4'){
        $results['status'] = 400;
        $results['msg'] = 'Something went wrong!';
    }
    
    elseif($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'no review found';
    }
    else{
        $results['status'] = 200;
        $results['msg'] = $user;
    }
    

    return echoResponse($results);
 
});



//send review 
$app->post('/before_view_lead', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $id = $allGetVars['lead'];
    $pid = $allGetVars['pro'];
   
    $helper = new commonHelper();
    $user = $helper->before_view_lead($id,$pid);
    
    return echoResponse($user);

    if($user == '3'){
        $results['status'] = 200;
        $results['msg'] = 'lead added successfully';
    }
    if($user == '4'){
        $results['status'] = 400;
        $results['msg'] = 'Something went wrong!';
    }
    // if($user == '1'){
    //     $results['status'] = 400;
    //     $results['msg'] = 'No name or review!';
    // }
    if($user == '2'){
        $results['status'] = 400;
        $results['msg'] = 'Already added!';
    }
    

    return echoResponse($results);
 
});




// portfolio images 
$app->post('/portfolioImages',function($request,$response,$args){
    global $files_path;
    $allGetVars = $request->getParsedBody();   
    $id = $allGetVars['id'];  
    $title = $allGetVars['title'];  
    $description = $allGetVars['description'];  
    $link = $allGetVars['link'];  



    
    $upload_location = dirname(__DIR__).'/../assets/portfolio-images/';   

    // Count total files
    $countfiles = count($_FILES['files']['name']);
    // To store uploaded files path
    $files_arr = array();

    // Loop all files
    for($index = 0;$index < $countfiles;$index++){
        if(isset($_FILES['files']['name'][$index]) && $_FILES['files']['name'][$index] != ''){
            // File name
            $filename = $_FILES['files']['name'][$index];
            // Get extension
            $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            $new_filename = date("Ymd_his").rand(0,9).$filename;
            // Valid image extension
            $valid_ext = array("png","jpeg","jpg","webp");

            // Check extension
            if(in_array($ext, $valid_ext)){
                // File path
                $path = $upload_location.$new_filename;
                // Upload file
                if(move_uploaded_file($_FILES['files']['tmp_name'][$index],$path)){
                        $files_arr[] = $new_filename;
                }
            }
        }
    }
    $image_names_string = implode(',',$files_arr);
    // return $image_names_string;
    
    
    $helper = new commonHelper();
    $user = $helper->savePortfolioImages($id,$title,$description,$image_names_string, $link);
    // return $user;
    
    if($user == 1) {
        $results['status'] = 400;
        $results['msg'] = 'User not found';
    }elseif($user == false){
        
        $results['status'] = 400;
        $results['msg'] = 'Not uploaded';
    }elseif($user == 2){
        $results['status'] = 200;
        $results['msg'] = "Portfolio uploaded"; 
    }elseif($user == 3){
        $results['status'] = 400;
        $results['msg'] = "Fill all required fields"; 
    }
    return echoResponse($results);
});




// portfolio delete 

$app->post('/remove_portfolio', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $id = $allGetVars['id'];
    $helper = new commonHelper();
    $user = $helper->delete_portfolio($id);
    if($user == '1'){
        $results['status'] = 400;
        $results['msg'] = 'No such portfolio found!';
    }
   else if($user == 2) {
      $results['status'] = 200;
        $results['msg'] = 'Selected portfolio successfully removed!';  
    }
    
 else if($user == 3){
     $results['status'] = 400;
        $results['msg'] = 'portfolio could not be deleted. Please try again.!'; 
 }
 

    return echoResponse($results);
 
});


// get professional/customer details ()
$app->post('/get_user_details',function($request,$response,$args){

    $allGetVars = $request->getParsedBody();   
    $slug = $allGetVars['slug'];
    
    $helper = new commonHelper();
    $user = $helper->get__details($slug);
    // return $user;
    if($user == 1) {
        $results['status'] = 400;
        $results['msg'] = 'no record found';
    }else{
        $results['status'] = 200;
        $results['msg'] = $user; 
    }

    return echoResponse($results);
});


$app->post('/customerProfChat', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $cust_id = $allGetVars['cust_id'];
    $bid_id = $allGetVars['bid_id'];
    $lead_id = $allGetVars['lead_id'];
    $message = $allGetVars['message'];
    $prof_id = $allGetVars['prof_id'];
       

    $file = '';
    if(isset($_FILES['file']) && $_FILES['file']['size'] > 0){

        $fileExtension = pathinfo($_FILES['file']["name"], PATHINFO_EXTENSION);
        $allowedExtArr = array('doc','docx','pdf','txt');
        if(!in_array($fileExtension, $allowedExtArr)){
            $results['status'] = 400;
            $results['msg'] = 'Invalid file format'; 
            return echoResponse($results);
        }
        if ($_FILES["file"]["size"] > 5000000) {
            $results['status'] = 400;
            $results['msg'] = 'File size too large. Max. file size is 5 MB';
            return echoResponse($results);

        }

        $target_dir = dirname(__DIR__).'/../assets/files/';
        $imageFileType = strtolower(pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION));
        if($imageFileType !='' ){
        
            $filename   = uniqid() . "-" . time(); 
            $basename   = $filename . "." . $imageFileType;
            $source       = $_FILES["file"]["tmp_name"];
            $destination = $target_dir.basename($basename);
            if(move_uploaded_file($source, $destination)){
                $updatedPath = $files_path.$basename;
            }
            $file = $updatedPath;    
        }  

    }


    
    
 
    $helper = new commonHelper();
    $user = $helper->customerProfChat($cust_id,$bid_id,$lead_id,$message,$prof_id,$file);
    // print_r($user);
    // die();
    if($user == 5){
        $results['status'] = 400;
        $results['msg'] = 'User not found'; 
    }else if($user == 7){
        $results['status'] = 400;
        $results['msg'] = 'some error occured, please try again'; 
    }else if($user == 4){
        $results['status'] = 400;
        $results['msg'] = 'some error occured'; 
    }else if($user == 1){
        $results['status'] = 400;
        $results['msg'] = 'Invalid file format'; 
    }else{
        $results['status'] = 200;
        $results['msg'] = $user; 
    }

    return echoResponse($results);

    
});

// contact us page query start
$app->post('/contactUsQuery', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $name = $allGetVars['name'];
    $email = $allGetVars['email'];
    $phone = $allGetVars['phone'];
    $message = $allGetVars['message'];

    $helper = new commonHelper();
    $user = $helper->contactUsQuery($name,$email,$phone,$message);
    if($user == 7){
        $results['status'] = 400;
        $results['msg'] = 'some error occured, please try again'; 
    }elseif($user == 5){
        $results['status'] = 400;
        $results['msg'] = 'Please provide all details!';  
    }else{
        $results['status'] = 200;
        $results['msg'] = $user; 
    }
    

    return echoResponse($results);

    
});
// contact us page query end 

// business page query start
$app->post('/book_business_demo', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    $name = $allGetVars['name'];
    $email = $allGetVars['email'];
    $phone = $allGetVars['phone'];
    $message = $allGetVars['message'];

    $helper = new commonHelper();
    $user = $helper->book_business_demo($name,$email,$phone,$message);
    if($user == 7){
        $results['status'] = 400;
        $results['msg'] = 'some error occured, please try again'; 
    }elseif($user == 5){
        $results['status'] = 400;
        $results['msg'] = 'Please provide all details!';  
    }else{
        $results['status'] = 200;
        $results['msg'] = $user; 
    }
    

    return echoResponse($results);

    
});
// business page query end 


// sending mail to related professionals on new project arrival 
$app->get('/mailToProfessionals', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    
    $helper = new commonHelper();
    $user = $helper->mailToProfessionals();
    // return $user;
    if($user == 2){
        $results['status'] = 400;
        $results['msg'] = 'some error occured, please try again'; 
    }elseif($user == 3){
        $results['status'] = 200;
        $results['msg'] = 'No new projects'; 
    }
    else{
        $results['status'] = 200;
        $results['msg'] = 'Mails sent successfully'; 
    }
    

    return echoResponse($results);

    
});

// sending mail to professionals on each day, top 10 projects
$app->post('/mailToProfessionalsTopTen', function($request, $response, $args){
    $allGetVars = $request->getParsedBody();
    
    $helper = new commonHelper();
    $user = $helper->mailToProfessionalsTopTen();
    // return $user;
    if($user == 2){
        $results['status'] = 400;
        $results['msg'] = 'some error occured, please try again'; 
    }elseif($user == 3){
        $results['status'] = 200;
        $results['msg'] = 'No new projects'; 
    }
    else{
        $results['status'] = 200;
        $results['msg'] = 'Mails sent successfully'; 
    }
    

    return echoResponse($results);

    
});



$app->post('/reviewButtonEnable', function($request, $response, $args){
    $getAllVars = $request->getParsedBody();
    $lead_id = $getAllVars['lead_id'];

    $helper = new CommonHelper();
    $user = $helper->reviewButtonEnable($lead_id);

    if($user == 1){
        $results['status'] = 200;
        $results['msg'] = $user;

    }elseif($user == 2){
        $results['status'] = 200;
        $results['msg'] = $user;
    }else{
        $results['status'] = 200;
        $results['msg'] = $user;
    }

    return echoResponse($results);
});
$app->post('/checkProjectStatus', function($request, $response, $args){
    $getAllVars = $request->getParsedBody();
    $lead_id = $getAllVars['lead_id'];

    $helper = new CommonHelper();
    $user = $helper->checkProjectStatus($lead_id);

    if($user == 0){
        $results['status'] = 400;
        $results['msg'] = "No such project";

    }else{
        $results['status'] = 200;
        $results['msg'] = $user;
    }

    return echoResponse($results);
});


$app->post('/project_reviewed', function($request, $response, $args){
    $getAllVars = $request->getParsedBody();
    $lead_id = $getAllVars['lead_id'];

    $helper = new CommonHelper();
    $user = $helper->project_reviewed($lead_id);

    if($user == 1){
        $results['status'] = 200;
        $results['msg'] = "Project status updated";

    }else{
        $results['status'] = 400;
        $results['msg'] = "Please try again";
    }

    return echoResponse($results);
});




$app->post('/gig_create', function($request, $response, $args){
    $getAllVars = $request->getParsedBody();

    $professional_id = $getAllVars['professional_id'];
    $gig_title = $getAllVars['gig_title'];
    $gig_main_category = $getAllVars['gig_main_category'];
    $gig_sub_category = $getAllVars['gig_sub_category'];
    // $gig_service_type = $getAllVars['gig_service_type'];
    $gig_technologies = $getAllVars['gig_technologies'];
    $gig_price = $getAllVars['gig_price'];
    $gig_desc = $getAllVars['gig_desc'];
    $gig_type = $getAllVars['gig_type'];

    $gig_tags = $getAllVars['gig_tags'];
    $gig_declaration = $getAllVars['gig_declaration'];


    $file = '';
    $projectfile = '';

    if(isset($_FILES['file']) && $_FILES['file']['size'] > 0){

        $fileExtension = pathinfo($_FILES['file']["name"], PATHINFO_EXTENSION);
        $allowedExtArr = array('jpg','jpeg','png','webp');
        if(!in_array($fileExtension, $allowedExtArr)){
            $results['status'] = 400;
            $results['msg'] = 'Invalid file format'; 
            return echoResponse($results);
        }
        if ($_FILES["file"]["size"] > 4000000) {
            $results['status'] = 400;
            $results['msg'] = 'File size too large. Max. file size is 4 MB';
            return echoResponse($results);

        }

        $target_dir = dirname(__DIR__).'/../assets/files/';
        $imageFileType = strtolower(pathinfo($_FILES["file"]["name"],PATHINFO_EXTENSION));
        if($imageFileType !='' ){
        
            $filename   = uniqid() . "-" . time(); 
            $basename   = $filename . "." . $imageFileType;
            $source       = $_FILES["file"]["tmp_name"];
            $destination = $target_dir.basename($basename);
            if(move_uploaded_file($source, $destination)){
                $updatedPath = $files_path.$basename;
            }
            $file = $updatedPath;    
        }  

    }

    if(isset($_FILES['gig_file']) && $_FILES['gig_file']['size'] > 0){

        $fileExtension = pathinfo($_FILES['gig_file']["name"], PATHINFO_EXTENSION);
        $allowedExtArr = array('zip');
        if(!in_array($fileExtension, $allowedExtArr)){
            $results['status'] = 400;
            $results['msg'] = 'Invalid file format'; 
            return echoResponse($results);
        }
        if ($_FILES["gig_file"]["size"] > 20000000) {
            $results['status'] = 400;
            $results['msg'] = 'File size too large. Max. file size is 20 MB';
            return echoResponse($results);

        }

        $target_dir = dirname(__DIR__).'/../assets/project-files/';
        $imageFileType = strtolower(pathinfo($_FILES["gig_file"]["name"],PATHINFO_EXTENSION));
        if($imageFileType !='' ){
        
            $filename   = uniqid() . "-" . time(); 
            $basename   = $filename . "." . $imageFileType;
            $source       = $_FILES["gig_file"]["tmp_name"];
            $destination = $target_dir.basename($basename);
            if(move_uploaded_file($source, $destination)){
                $updatedPath = $files_path.$basename;
            }
            $gig_file = $updatedPath;    
        }  

    }



    $helper = new CommonHelper();
    $user = $helper->gig_create($professional_id,$gig_title, $gig_main_category, $gig_sub_category, $gig_technologies, $gig_price, $gig_desc, $gig_tags, $gig_declaration, $file,$gig_file,$gig_type);

    if($user == 6){
        $results['status'] = 200;
        $results['msg'] = "Gig created successfully";

    }
    elseif($user == 5){
        $results['status'] = 400;
        $results['msg'] = "Please fill required fields";
    }
    else{
        $results['status'] = 400;
        $results['msg'] = "Please try again";
    }

    return echoResponse($results);
});


$app->post('/get_my_gigs', function($request, $response, $args){
    $getAllVars = $request->getParsedBody();
    $professional_slug = $getAllVars['professional_slug'];

    $helper = new CommonHelper();
    $user = $helper->get_my_gigs($professional_slug);

    if($user == 2){
        $results['status'] = 400;
        $results['msg'] = "No gigs found";

    }else{
        $results['status'] = 200;
        $results['msg'] = $user;
    }

    return echoResponse($results);
});


$app->post('/delete_gig', function($request, $response, $args){
    $getAllVars = $request->getParsedBody();
    $gig_id = $getAllVars['gig_id'];

    $helper = new CommonHelper();
    $user = $helper->delete_gig($gig_id);

    if($user == 2){
        $results['status'] = 200;
        $results['msg'] = "Gig deleted successfully";

    }elseif($user == 3){
        $results['status'] = 400;
        $results['msg'] = "Gig not found";
    }else{
        $results['status'] = 400;
        $results['msg'] = "Please try again!";
    }

    return echoResponse($results);
});


$app->post('/get_all_gigs', function($request, $response, $args){
    $getAllVars = $request->getParsedBody();
    $offset = $getAllVars['offset'];
    $limit = $getAllVars['limit'];


    $helper = new CommonHelper();
    $user = $helper->get_all_gigs($offset,$limit);
   
    if($user == 2){
        $results['status'] = 400;
        $results['msg'] = "No gigs found";

    }else{
        $results['status'] = 200;
        $results['msg'] = $user;
        $results['has_more'] = $user['has_more'];

    }

    return echoResponse($results);
});

$app->post('/get_gig_details', function($request, $response, $args){
    $getAllVars = $request->getParsedBody();
    $gigId = $getAllVars['gigId'];


    $helper = new CommonHelper();
    $user = $helper->get_gig_details($gigId);

    if($user == 2){
        $results['status'] = 400;
        $results['msg'] = "No gig found";

    }else{
        $results['status'] = 200;
        $results['msg'] = $user;
    }

    return echoResponse($results);
});


//search gig from search bar
$app->post('/search_gig', function($request, $response, $args){

    $getAllVars = $request->getParsedBody();
    $keyword = $getAllVars['keyword'];

    $helper = new commonHelper();
    $user = $helper->search_gig($keyword);
   
    if($user == 2){
        $results['status'] = 400;
        $results['msg'] = "No gigs found";

    }else{
        $results['status'] = 200;
        $results['msg'] = $user;
    }
    

    return echoResponse($results);
 
});


// live search gig from search bar
$app->post('/live_search_gig', function($request, $response, $args){

    $getAllVars = $request->getParsedBody();
    $keyword = $getAllVars['keyword'];

    $helper = new commonHelper();
    $user = $helper->live_search_gig($keyword);
   
    if($user == 2){
        $results['status'] = 400;
        $results['msg'] = "No gigs found";

    }else{
        $results['status'] = 200;
        $results['msg'] = $user;
    }
    

    return echoResponse($results);
 
});

//earch gig from category filter
$app->post('/filter_gig_main_cat', function($request, $response, $args){

    $getAllVars = $request->getParsedBody();
    $id = $getAllVars['id'];

    $helper = new commonHelper();
    $user = $helper->filter_gig_main_cat($id);
   
    if($user == 2){
        $results['status'] = 400;
        $results['msg'] = "No gigs found";

    }else{
        $results['status'] = 200;
        $results['msg'] = $user;
    }
    

    return echoResponse($results);
 
});

//earch gig from category filter
$app->post('/filter_gig_sub_cat', function($request, $response, $args){

    $getAllVars = $request->getParsedBody();
    $id = $getAllVars['id'];

    $helper = new commonHelper();
    $user = $helper->filter_gig_sub_cat($id);
   
    if($user == 2){
        $results['status'] = 400;
        $results['msg'] = "No gigs found";

    }else{
        $results['status'] = 200;
        $results['msg'] = $user;
    }
    

    return echoResponse($results);
 
});


// add bank details 
$app->post('/add_bank_details', function ($request, $response, $args) {

    $allGetVars = $request->getParsedBody();
    $id = $allGetVars['id'];
    $bank_name = $allGetVars['bank_name'];
    $account_no = $allGetVars['account_no'];
    $ifsc = $allGetVars['ifsc'];
    $user = $allGetVars['user'];


    $helper = new commonHelper();
    $user = $helper->add_bank_details($id,$user,$bank_name, $account_no, $ifsc);
    //    return $user;
    if ($user == '1') {
        $results['status'] = 400;
        $results['msg'] = 'All fileds are required';
    } elseif ($user == '7') {
        $results['status'] = 400;
        $results['msg'] = 'Details not added. Please try again!';
    }  else {
        $results['status'] = 200;
        $results['msg'] = 'Bank details added successfully';
    }

    return echoResponse($results);
});

$app->post('/get_bank_details', function ($request, $response, $args) {

    $allGetVars = $request->getParsedBody();
    
    $user = $allGetVars['user'];


    $helper = new commonHelper();
    $user = $helper->get_bank_details($user);
    //    return $user;
    if ($user == '1') {
        $results['status'] = 400;
        $results['msg'] = 'User not found. Please try again!';
    } elseif ($user == '2') {
        $results['status'] = 400;
        $results['msg'] = 'Please add your bank details!';
    }  else {
        $results['status'] = 200;
        $results['msg'] = $user;
    }

    return echoResponse($results);
});


// wallet_balance based on type
$app->post('/wallet_balance', function ($request, $response, $args) {

    $allGetVars = $request->getParsedBody();
    $auth_user_slug = $allGetVars['auth_user_slug'];

    $helper = new commonHelper();
    $user = $helper->wallet_balance($auth_user_slug);

    if ($user == 1) {
        $results['status'] = 400;
        $results['msg'] = 'User not found';
    }elseif($user == 0) {
        $results['status'] = 400;
        $results['msg'] = 'User not given';
    } else {
        $results['status'] = 200;
        $results['msg'] = $user;
    }

    return echoResponse($results);
});


function echoResponse($response)
{    
    //displaying the response in json format
    echo json_encode($response);
}












$app->run();


?>