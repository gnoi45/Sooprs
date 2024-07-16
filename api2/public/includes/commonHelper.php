<?php
include_once './env.php';

// use PHPMailer\PHPMailer\PHPMailer;

// use PHPMailer\PHPMailer\Exception;



// require 'PHPMailer/PHPMailer/src/Exception.php';

// require 'PHPMailer/PHPMailer/src/PHPMailer.php';

// require 'PHPMailer/PHPMailer/src/SMTP.php';
/**
 * recharge helper class
 * author: 
 * NY 
 */
$siteurl = 'https://sooprs.com/send-review';
$siteurl2 = 'https://sooprs.com/';


class commonHelper
{

  /********************db connection**************************/
  //Database connection link
  private $con;
  public $url = 'https://sooprs.com/';

  protected static $connection;








  public function __construct()
  {
    //empty
  }

  // Try and connect to the database
  public static function db_connect()
  {



    if (!isset(self::$connection)) {
      // Load configuration as an array. Use the actual location of your configuration file
      //$config = parse_ini_file('config/config.ini');
      //require_once('/db_connection.php');


      // self::$connection = new mysqli('localhost', 'shopndto_sooprs_secure', 'x1.@EX)2BQ!7', 'shopndto_sooprs1808');
      // self::$connection = new mysqli('localhost', 'root', 'Sandy@3105', 'sooprs');
      self::$connection = new mysqli('localhost', 'shopndto_sooprs_secure', 'x1.@EX)2BQ!7', 'shopndto_sooprsdev');


    }

    // If connection was not successful, handle the error
    if (self::$connection === false) {
      // Handle error - notify administrator, log to a file, show an error screen, etc. 
      return false;
    }
    return self::$connection;
  }

  //db query function
  public function query($query)
  {
    // Connect to the database
    $connection = $this->db_connect();

    // Query the database
    $result = $connection->query($query);

    return $result;
  }


  // check email format 
  function isValidEmail($email) {
    
      return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
  }


  // admin login

  public function login($email, $pass)
  {
    if ($email != '' || $pass != '') {

      $get_query = $this->query("SELECT * from admin where (user_email = '" . $email . "' || user_mobile = '" . $email . "') and password = '" . $pass . "'");

      if ($get_query->num_rows > 0) {
        $get_row = $get_query->fetch_assoc();
        return $get_row;
      } else {
        return 2;
      }
    } else {
      return 3;
    }
  }




  //get lgin
  public function internlogin($email, $pass)
  {
    if ($email != '' || $pass != '') {

      $get_query = $this->query("SELECT * from join_professionals where email = '" . $email . "'");

      if ($get_query->num_rows > 0) {
        $get_row = $get_query->fetch_assoc();
        $fetch_pass = $get_row['password'];
        if (password_verify($pass, $fetch_pass)) {
          return $get_row;
        } else {
          return 4;
        }

      } else {
        return 2; //no intern found
      }
    } else {
      return 3;
    }
  }

  //search user customer login
  //get lgin
  public function customerlogin($email, $pass)
  {
    if ($email != '' || $pass != '') {

      $get_query = $this->query("SELECT * from users where users_email = '" . $email . "' || users_mobile = '" . $email . "'");

      if ($get_query->num_rows > 0) {
        $get_row = $get_query->fetch_assoc();
        $fetch_pass = $get_row['users_pass'];
        if (password_verify($pass, $fetch_pass)) {
          return $get_row;
        } else {
          return 4; //wrong pass
        }

      } else {
        return 2; //no customer found
      }
    } else {
      return 3; //email or pass is blank
    }
  }

  //customer profile

  public function customerProfile($id)
  {
    if ($id != '') {

      $get_query = $this->query("SELECT * from users where id = '" . $id . "'");
      //$getquerys = $this->query("SELECT * from students_details where `user_id` = '".$id."'");

      if ($get_query->num_rows > 0) {
        $get_row = $get_query->fetch_assoc();
        //$get_row2 = $getquerys->fetch_assoc();
        $results[] = $get_row;
        //$results[] = $get_row2;

        return $results;
      } else {
        return 2; //no record
      }
    } else {
      return 3; //blank
    }
  }


   //auth check

  //  public function auth_check()
  //  {
  //    if (!isset($_SESSION['id'])) {
      
  //      return 1;
  //    } else {
  //      return 2; //blank
  //    }
  //  }

  //customer profile intern
  public function customerProfileIntern($id)
  {
    if ($id != '') {

      $get_query = $this->query("SELECT * from students_masterdata where id = '" . $id . "'");

      if ($get_query->num_rows > 0) {
        $get_row = $get_query->fetch_assoc();

        return $get_row;
      } else {
        return 2; //no record
      }
    } else {
      return 3; //blank
    }
  }

  //search document

  public function search_document($q)
  {
    if ($q != '') {

      $get_query = $this->query("SELECT `documents`.*, `category`.`parent_id` as parent_catid, `category`.`cat_name` FROM `documents` join `category` on `documents`.`cat_id` = `category`.`id` where `documents`.`document_title` LIKE '" . $q . "%' ");

      if ($get_query->num_rows > 0) {
        while ($get_row = $get_query->fetch_assoc()) {
          $results[] = $get_row;
        }

        return $results;


      } else {
        return 2; //no record
      }
    } else {
      return 3; //blank
    }
  }

  //auto suggest
  public function autosuggest($q, $type)
  {

    if ($q != '') {
      if ($type == 'cl') {
        $get_query = $this->query("SELECT * FROM `case_laws` where citation_name LIKE '" . $q . "%' or universal_citation LIKE '" . $q . "%' or first_party LIKE '" . $q . "%' or second_party LIKE '" . $q . "%'");
      } else if ($type == 'ba') {
        $get_query = $this->query("SELECT * FROM `bare_acts_sections` where section_desc LIKE '%" . $q . "%' or section_name LIKE '%" . $q . "%'");
      } else if ($type == 'lr') {
        $get_query = $this->query("SELECT * FROM `legal_resources` where lr_doc_title LIKE '%" . $q . "%' or short_desc LIKE '%" . $q . "%' ");
      } else {
        $get_query = $this->query("SELECT * FROM `bare_acts_names` where bare_act_name LIKE '%" . $q . "%'");
      }

      if ($get_query->num_rows > 0) {
        while ($get_row = $get_query->fetch_assoc()) {
          $results[] = $get_row;
        }

        return $results;


      } else {
        return 2; //no record
      }
    } else {
      return 3; //blank
    }
  }

  //search results
  public function search_results($query, $type, $cats, $citation, $uni_citation, $relevance, $sort)
  {

    if ($type == 'cl') {

      $get_query = $this->query("SELECT * FROM `case_laws` where citation_name LIKE '" . $q . "%'");
    } else if ($type == 'ba') {
      $get_query = $this->query("SELECT * FROM `bare_acts_sections` where section_desc LIKE '%" . $q . "%'");
    } else if ($type == 'ba') {
      $get_query = $this->query("SELECT * FROM `bare_acts_sections` where section_desc LIKE '%" . $q . "%'");
    } else {
      $get_query = $this->query("SELECT * FROM `bare_acts_names` where bare_act_name LIKE '%" . $q . "%'");
    }
    if ($get_query->num_rows > 0) {
      while ($get_row = $get_query->fetch_assoc()) {
        $results[] = $get_row;
      }

      return $results;


    } else {
      return 2; //no record
    }

  }

  //get results with proper data
  //search results
  public function get_results($q, $type)
  {

    if ($type == 'cl') {

      $get_query = $this->query("SELECT case_laws.*, cl_category.cl_cat_name FROM `case_laws` JOIN `cl_category` on `case_laws`.`cl_cat_id` = `cl_category`.`cl_cat_id` WHERE case_laws.citation_name LIKE '%" . $q . "%' or case_laws.universal_citation LIKE '%" . $q . "%' or case_laws.first_party LIKE '%" . $q . "%' or case_laws.second_party LIKE '%" . $q . "%'");
    } else if ($type == 'ba') {
      $get_query = $this->query("SELECT `bare_acts_names`.*, `bare_acts_sections`.`ba_sec_id`, `bare_acts_sections`.`ba_chap_id`, `bare_acts_sections`.`section_name`, `bare_acts_sections`.`section_desc`, `bare_acts_sections`.`sec_comments`, `bare_acts_sections`.`created_at`  FROM  `bare_acts_names` JOIN `bare_acts_sections` ON `bare_acts_names`.`ba_id` = `bare_acts_sections`.`ba_id` WHERE `bare_acts_sections`.section_name LIKE '%" . $q . "%' or `bare_acts_sections`.section_desc LIKE '%" . $q . "%' or `bare_acts_names`.`bare_act_name` LIKE '%" . $q . "%' OR `bare_acts_names`.`act_desc` LIKE '%" . $q . "%'");
    } else if ($type == 'lr') {
      $get_query = $this->query("SELECT `legal_resources`.*, `lr_category`.`lr_cat_name` FROM `legal_resources` JOIN `lr_category` ON `legal_resources`.`lr_cat_id` = `lr_category`.`lr_cat_id`  WHERE `legal_resources`.lr_doc_title LIKE '%" . $q . "%' or `legal_resources`.short_desc LIKE '%" . $q . "%' or `legal_resources`.long_desc LIKE '%" . $q . "%'");
    } else {
      $get_query = $this->query("SELECT * FROM `bare_acts_names` where bare_act_name LIKE '%" . $q . "%'");
    }
    if ($get_query->num_rows > 0) {
      while ($get_row = $get_query->fetch_assoc()) {
        $results[] = $get_row;
      }


      return $results;

    } else {
      return 2; //no record
    }

  }


  // password in email 
  function generateRandomPassword($length = 8) {
    $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $lowercase = 'abcdefghijklmnopqrstuvwxyz';
    $numbers = '0123456789';
    $specialChars = '@#$%&()_';

    // Combine all character sets
    $allChars = $uppercase . $lowercase . $numbers . $specialChars;

    // Shuffle the characters
    $shuffledChars = str_shuffle($allChars);

    // Select the first $length characters
    $randomPassword = substr($shuffledChars, 0, $length);

    return $randomPassword;
}


  // customer registration

  public function customerRegis($name, $email, $mobile, $password, $is_buyer, $country)
  {
    if (strlen($name) >= 100) {
      return 1;
    }

    $pattern = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
 
    if (preg_match($pattern, $email) == false) {
      return 2;
    } 
  

    // $mobile_patter = "/^[6-9][0-9]{9}$/";
    // if (preg_match($mobile_patter, $mobile) == false) {
    //   return 3;
    // }
    $mobile_pattern = "/^\+?[1-9]\d{1,14}$/";
if (preg_match($mobile_pattern, $mobile) == false) {
    return 3;
}


    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);

    if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
      return 4;
    }

    $get_query = $this->query("select * from join_professionals where email='" . $email . "' OR mobile='" . $mobile . "'");
    if ($get_query->num_rows > 0) {
      return 5;
    } else {
      

      
      
      $email_otp = mt_rand(1000, 9999);
      $new_pass = password_hash($password, PASSWORD_DEFAULT);
      $slug = $this->generateUniqueSlug($name, $this);
      $get_results = $this->query("INSERT INTO `join_professionals`(`name`, `email`, `mobile`, `password`, `is_buyer`,`country`, `status`, `slug`, `created_at`) VALUES ('$name','$email','$mobile','$new_pass','$is_buyer','$country', '1', '$slug', now())");
      $this->query("INSERT INTO `email_otps`(`email`, `otp`, `created_at`) VALUES ('" . $email . "','" . $email_otp. "', now())");
      // $trans = $this->insertTransaction($id, 1, $amount, $currentDateTime = date('F j, Y H:i:s'), 'TRANS-'.time(), 'credited '.$amount, $payment_id, $wallet);

      if ($get_results) {

        if ($this->send_signup_email_users($email, $email_otp,'')) {
          return 6; //success  
        } else {
          return 6; //success    
        }

      } else {
        return 7; // error 
      }
    }
  }


  function generateUniqueSlug($name, $db) {
      $slug = $this->slugify($name); // Assuming you have a function to create slugs

      $i = 1;
      while ($this->slugExists($slug, $db)) {
        $slug = $slug . '-' . $i;
        $i++;
      }

      return $slug;
  }

  function slugExists($slug, $db) {
      $result = $db->query("SELECT COUNT(*) as count FROM join_professionals WHERE slug='$slug'");
      $row = $result->fetch_assoc();
      return $row['count'] > 0;
  }

  function slugify($text) {
      // Implement your slugification logic here
      // For example, you can replace spaces with dashes and make it lowercase
      $text = strtolower($text);
      $text = preg_replace('/[^a-z0-9-]/', '-', $text);
      $text = preg_replace('/-+/', '-', $text);
      return trim($text, '-');
  }





  function generateUniqueGigSlug($name, $db) {
    $slug = $this->slugify($name); // Assuming you have a function to create slugs

    $i = 1;
    while ($this->gigSlugExists($slug, $db)) {
      $slug = $slug . '-' . $i;
      $i++;
    }

    return $slug;
}

function gigSlugExists($slug, $db) {
    $result = $db->query("SELECT COUNT(*) as count FROM professional_gigs WHERE gig_slug='$slug'");
    $row = $result->fetch_assoc();
    return $row['count'] > 0;
}


  // customer registration
  public function verifyOtp($email, $otp)
  {
    
   
    $get_query = $this->query("SELECT * FROM email_otps WHERE email='" . $email . "' AND otp='" . $otp . "' ORDER BY id DESC LIMIT 1");
    
    if ($get_query->num_rows > 0) {
      // SQL query to update the isVerified field
      $sql = "UPDATE join_professionals SET is_verified = 1 WHERE email = '".$email."'";

      if ($this->query($sql) === TRUE) {
        // $get_query = $this->query("select * from join_professionals where email='" . $email . "' OR mobile='" . $mobile . "'");
        // if ($get_query->num_rows > 0) {
        //   return 4;
        // }

        return 6;

      }else{
        return 7;
      }
      
    
    }else {

       
      return 5;
      
      
    
    }
  }


  // customer registration
  public function resendOtp($email)
  {
      $email_otp = mt_rand(1000, 9999);
      $get = $this->query("INSERT INTO `email_otps`(`email`, `otp`, `created_at`) VALUES ('" . $email . "','" . $email_otp. "', now())");

      if ($get === TRUE) {
        $this->send_signup_email_users($email, $email_otp,'');
        return 6;
      } else {
        return 7;
      }  

      
      
    
    
  }

  //Intern registration

  public function internRegis($name, $email, $mobile, $password)
  {
    if (strlen($name) >= 100) {
      return 1;
    }


    $pattern = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    if (preg_match($pattern, $email) == false) {
      return 2;
    }

    $mobile_patter = "/^[6-9][0-9]{9}$/";
    if (preg_match($mobile_patter, $mobile) == false) {
      return 3;
    }

    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);

    if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
      return 4;
    }

    $get_query = $this->query("select * from students_masterdata where email='" . $email . "' OR phone='" . $mobile . "'");
    if ($get_query->num_rows > 0) {
      return 5;
    } else {
      $otp = mt_rand(1000, 9999);
      $email_otp = mt_rand(1000, 9999);
      $new_pass = password_hash($password, PASSWORD_DEFAULT);
      $get_results = $this->query("INSERT INTO `students_masterdata`(`student_name`, `password`, `email`, `phone`,`email_activation_code`,`created_at`) VALUES ('" . $name . "','" . $new_pass . "','" . $email . "','" . $mobile . "','" . $email_otp . "',now())");

      if ($get_results) {
        //call email 
        if ($this->send_signup_email($email, $email_otp)) {
          return 6; //success  
        } else {
          return 6; //success    
        }

      } else {
        return 7; // error 
      }
    }
  }


  // reset password


  public function changepassword($newpassword, $confpassword, $userid)
  {

    if ($newpassword != $confpassword) {
      return 1;
    }

    $uppercase = preg_match('@[A-Z]@', $confpassword);
    $lowercase = preg_match('@[a-z]@', $confpassword);
    $number = preg_match('@[0-9]@', $confpassword);

    if (!$uppercase || !$lowercase || !$number || strlen($confpassword) < 8) {
      return 2;
    }

    $getquery = $this->query("update admin set password='" . $confpassword . "' where id='" . $userid . "'");
    if ($getquery) {
      return 3;
    } else {
      return 4;
    }


  }

  //forgot trainer password
  public function forgotPwd($email,$type)
  {

   
    $length = 10;
    $str = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
    $new_pass = substr(str_shuffle($str), 0, $length);

    $hash_pass = password_hash($new_pass, PASSWORD_DEFAULT);
    error_log("new password: " . $hash_pass);

    if ($type == '1') {
      $check = $this->query("Select * from `join_professionals` where email = '" . $email . "'");
      if ($check->num_rows > 0) {

        $getquery = $this->query("UPDATE `join_professionals` SET `password`='" . $hash_pass . "' where `email`='" . $email . "'");
        if($this->send_resetpwd_email($email,$new_pass)){
          return 4; // email sent successfully
        }else{
          return 5;  // email not sent
        }
      } 
      else {
        return 3; //not found
      }
    } 
    else if ($type == '0') {
      $check1 = $this->query("Select * from `customer` where `email` = '" . $email . "'");
      if ($check1->num_rows > 0) {
        $getquery = $this->query("UPDATE `customer` set `password`='" . $hash_pass . "' where `email`='" . $email . "'");
      } else {
        return 3; //not found
      }
    } 
    else {
      return 2; //wrong user type
    }



    if ($getquery) {

      return $new_pass;
    } else {
      return 1;
    }




  }

  //change password admin
  public function changepassword_admin($newpassword, $confpassword, $userid)
  {

    if ($newpassword != $confpassword) {
      return 1;
    }

    $uppercase = preg_match('@[A-Z]@', $confpassword);
    $lowercase = preg_match('@[a-z]@', $confpassword);
    $number = preg_match('@[0-9]@', $confpassword);

    if (!$uppercase || !$lowercase || !$number || strlen($confpassword) < 8) {
      return 2;
    }
    $new_pass = password_hash($confpassword, PASSWORD_DEFAULT);
    $getquery = $this->query("update admin set password='" . $new_pass . "' where id='" . $userid . "'");
    if ($getquery) {
      return 3;
    } else {
      return 4;
    }


  }

  // create document

  public function add_document($title, $cat_id, $slug, $short_desc, $long_desc, $status)
  {

    if ($title == '' || $cat_id == '' || $status == '') {
      return 1;
    } else {
      $getquery = $this->query("select * from legal_resources where lr_doc_title='" . $title . "' and lr_cat_id = '" . $cat_id . "'");
      if ($getquery->num_rows > 0) {
        return 2;
      } else {
        $getquery = $this->query("INSERT INTO `legal_resources`(`lr_doc_title`, `slug`,`lr_cat_id`,`short_desc`,`long_desc`, `status`, `created_at`) VALUES ('" . $title . "','" . $slug . "','" . $cat_id . "','" . $short_desc . "','" . $long_desc . "','" . $status . "',now())");
        if ($getquery) {
          return 3;
        } else {
          return 4;
        }
      }
    }


  }

  //create bare act
  public function add_bare_act($title, $cat_id, $slug, $short_desc, $status, $act_citation_name, $act_citation_year, $act_date, $unique_txt)
  {

    if ($title == '' || $cat_id == '' || $status == '' || $act_citation_name == '' || $act_citation_year == '') {
      return 1;
    } else {


      $newDate = date("Y-m-d", strtotime($act_date));

      $getquery = $this->query("select * from bare_acts_names where bare_act_name='" . $title . "' and cat_id = '" . $cat_id . "'");
      if ($getquery->num_rows > 0) {
        return 2;
      } else {
        $getquery = $this->query("INSERT INTO `bare_acts_names`(`ba_auto_id`,`bare_act_name`, `slug`,`bareact_no`,`bact_year`,`act_date`,`ba_cat_id`,`act_desc`, `status`, `created_at`) VALUES ('" . $unique_txt . "','" . $title . "','" . $slug . "','" . $act_citation_name . "','" . $act_citation_year . "','" . $newDate . "','" . $cat_id . "','" . $short_desc . "','" . $status . "',now())");
        if ($getquery) {
          return 3;
        } else {
          return 4;
        }
      }
    }


  }

  //edit bare act name
  public function edit_bareact($title, $act_id, $cat_id, $slug, $short_desc, $status, $act_citation, $bact_year, $act_date, $unique_txt)
  {

    if ($title == '' || $cat_id == '' || $status == '' || $act_citation == '') {
      return 1;
    } else {
      $newDate = date("Y-m-d", strtotime($act_date));
      $getquery = $this->query("select * from bare_acts_names where ba_id = '" . $act_id . "'");
      if ($getquery->num_rows > 0) {
        $getquery = $this->query("UPDATE `bare_acts_names` SET `bare_act_name` = '" . $title . "',`ba_auto_id` = '" . $unique_txt . "', `slug` = '" . $slug . "',`bareact_no` = '" . $act_citation . "',`bact_year` = '" . $bact_year . "',`act_date` = '" . $newDate . "',`ba_cat_id` = '" . $cat_id . "' ,`act_desc` = '" . $short_desc . "', `status` = '" . $status . "' WHERE ba_id = '" . $act_id . "'");
        if ($getquery) {
          return 3;
        } else {
          return 4;
        }
      } else {
        return 2;
      }
    }


  }

  //create bare acts chapter
  public function add_act_chapter($title, $act_id, $cat_id, $slug, $long_desc, $status)
  {

    if ($title == '' || $cat_id == '' || $status == '') {
      return 1;
    } else {
      $getquery = $this->query("select * from bare_acts_chapters where chapter_title='" . $title . "' and ba_cat_id = '" . $cat_id . "' and ba_id='" . $act_id . "'");
      if ($getquery->num_rows > 0) {
        return 2;
      } else {
        $getquery = $this->query("INSERT INTO `bare_acts_chapters`(`ba_id`,`ba_cat_id`,`chapter_title`, `chapter_desc`, `slug`, `status`, `created_at`) VALUES ('" . $act_id . "','" . $cat_id . "','" . $title . "','" . $long_desc . "','" . $slug . "','" . $status . "',now())");
        if ($getquery) {
          return 3;
        } else {
          return 4;
        }
      }
    }


  }

  //add bare act sections
  public function add_act_section($title, $act_id, $chapter_id, $long_desc, $sec_comments)
  {

    if ($title == '' || $act_id == '' || $long_desc == '') {
      return 1;
    } else {
      $getquery = $this->query("select * from bare_acts_sections where section_name='" . $title . "' and ba_id = '" . $act_id . "' and ba_chap_id='" . $chapter_id . "'");
      if ($getquery->num_rows > 0) {
        return 2; //already exist
      } else {
        $getquery = $this->query("INSERT INTO `bare_acts_sections`(`ba_id`,`ba_chap_id`,`section_name`, `section_desc`,`sec_comments`, `created_at`) VALUES ('" . $act_id . "','" . $chapter_id . "','" . $title . "','" . $long_desc . "','" . $sec_comments . "',now())");
        if ($getquery) {
          return 3; //success
        } else {
          return 4; //error
        }
      }
    }


  }

  //edit acts chapter
  public function edit_act_chapter($title, $chapter_id, $slug, $short_desc, $status)
  {

    if ($title == '' || $status == '') {
      return 1;
    } else {
      $getquery = $this->query("select * from bare_acts_chapters where ba_chap_id='" . $chapter_id . "'");
      if ($getquery->num_rows > 0) {
        $getquery = $this->query("UPDATE `bare_acts_chapters` Set `chapter_title` = '" . $title . "', `chapter_desc` = '" . $short_desc . "', `slug` = '" . $slug . "', `status` = '" . $status . "' WHERE ba_chap_id = '" . $chapter_id . "'");
        if ($getquery) {
          return 3;
        } else {
          return 4;
        }
      } else {
        return 2;

      }
    }


  }

  //edit act sections
  public function update_act_section($section_id, $title, $act_id, $chapter_id, $long_desc, $sec_comments)
  {

    if ($title == '' || $long_desc == '') {
      return 1;
    } else {
      $getquery = $this->query("select * from bare_acts_sections where ba_sec_id='" . $section_id . "'");
      if ($getquery->num_rows > 0) {
        $getquery = $this->query("UPDATE `bare_acts_sections` Set `section_name` = '" . $title . "', `section_desc` = '" . $long_desc . "',`sec_comments` = '" . $sec_comments . "' WHERE ba_sec_id = '" . $section_id . "'");
        if ($getquery) {
          return 3;
        } else {
          return 4;
        }
      } else {
        return 2;

      }
    }


  }

  //create case law
  public function add_case_law($citation, $uni_citation, $cat_id, $slug, $short_desc, $status, $first_party_type, $first_party_name, $second_party_name, $second_party_type, $bench, $date, $long_desc, $unique_txt)
  {

    if ($cat_id == '' || $status == '') {
      return 1;
    } else {
      $getquery = $this->query("select * from case_laws where universal_citation='" . $uni_citation . "' and cl_cat_id = '" . $cat_id . "'");
      if ($getquery->num_rows > 0) {
        return 2;
      } else {
        $newDate = date("Y-m-d", strtotime($date));
        $title_date = date("d M, Y", strtotime($date));
        $case_law_title = $first_party_name . ' vs ' . $second_party_name . ' on ' . $title_date;
        $getquery = $this->query("INSERT INTO `case_laws`(`cl_auto_id`,`case_law_title`,`citation_name`,`universal_citation`, `slug`,`keyword`,`first_party`,`first_party_type`,`second_party`,`second_party_type`,`cl_decision_date`,`cl_bench`, `cl_cat_id`,`cl_sdesc`,`cl_ldesc`, `case_analysis`, `status`, `created_at`) VALUES ('','" . $case_law_title . "','" . $citation . "','" . $uni_citation . "','" . $slug . "','','" . $first_party_name . "','" . $first_party_type . "','" . $second_party_name . "','" . $second_party_type . "','" . $newDate . "','" . $bench . "','" . $cat_id . "','" . $short_desc . "','" . $long_desc . "','','" . $status . "',now())");
        if ($getquery) {
          return 3;
        } else {
          // return self::$connection -> error;
          return 4;
        }
      }
    }


  }

  //edit case laws
  public function edit_case_law($case_id, $citation, $uni_citation, $cat_id, $slug, $short_desc, $status, $first_party, $petitioner, $respondent, $second_party, $bench, $date, $long_desc, $unique_txt)
  {

    if ($cat_id == '' || $status == '') {
      return 1;
    } else {
      $getquery = $this->query("select * from case_laws where cl_id = '" . $case_id . "'");
      if ($getquery->num_rows > 0) {
        $newDate = date("Y-m-d", strtotime($date));
        $title_date = date("d M, Y", strtotime($date));
        $case_law_title = $petitioner . ' vs ' . $respondent . ' on ' . $title_date;
        $getquery = $this->query("UPDATE `case_laws` SET `case_law_title` = '" . $case_law_title . "',`citation_name` = '" . $citation . "',`universal_citation` = '" . $uni_citation . "',`cl_auto_id` = '', `slug` = '" . $slug . "' ,`first_party` = '" . $petitioner . "',`first_party_type` = '" . $first_party . "',`second_party` = '" . $respondent . "',`second_party_type` = '" . $second_party . "',`cl_cat_id` = '" . $cat_id . "',`cl_sdesc` = '" . $short_desc . "',`cl_decision_date` ='" . $newDate . "',`cl_bench` = '" . $bench . "',`cl_ldesc` = '" . $long_desc . "', `status`= '" . $status . "' where cl_id = '" . $case_id . "'");
        if ($getquery) {
          return 3; //success
        } else {
          return 4; //could not update
        }
      } else {
        return 2; //does not exist
      }
    }


  }

  //get sub category
  public function get_sub_category($category, $law_type)
  {
    $getquery = $this->query("select * from category where parent_id = '" . $category . "' and law_type = '" . $law_type . "'");
    if ($getquery->num_rows > 0) {
      while ($results = $getquery->fetch_assoc()) {
        $new_results[] = $results;
      }
      return $new_results;
    } else {
      return false;
    }
  }

  //get mentor topics categories

  public function mentor_topic_cats()
  {
    $getquery = $this->query("select * from topic_category where status = 1");
    if ($getquery->num_rows > 0) {
      while ($results = $getquery->fetch_assoc()) {
        $new_results[] = $results;
      }
      return $new_results;
    } else {
      return false;
    }
  }

  //get mentor topics

  public function mentor_topics($cat_id)
  {
    $getquery = $this->query("select * from bnw_topics where topic_cat_id = '" . $cat_id . "' and status = 1");
    if ($getquery->num_rows > 0) {
      while ($results = $getquery->fetch_assoc()) {
        $new_results[] = $results;
      }
      return $new_results;
    } else {
      return false;
    }
  }


  ////alloted mentor topics to student
  public function mentor_topics_alloted($cat_id, $student_id)
  {
    $getquery = $this->query("SELECT `student_topics`.topic_id, `bnw_topics`.topic_name FROM `student_topics` join bnw_topics on student_topics.topic_id = bnw_topics.id where student_topics.student_id = '" . $student_id . "' and bnw_topics.topic_cat_id = '" . $cat_id . "'");
    if ($getquery->num_rows > 0) {
      while ($results = $getquery->fetch_assoc()) {
        $new_results[] = $results;
      }
      return $new_results;
    } else {
      return false;
    }
  }

  //update document 

  public function update_document($id, $title, $cat_id, $slug, $short_desc, $long_des, $status)
  {

    if ($title == '' || $cat_id == '' || $status == '') {
      return 1;
    } else {
      $getquery = $this->query("select * from legal_resources where lr_id = '" . $id . "'");
      if (!$getquery->num_rows > 0) {
        return 2; //wrong document id
      } else {
        $getquery = $this->query("UPDATE `legal_resources` set `lr_doc_title` = '" . $title . "', `slug` = '" . $slug . "',`lr_cat_id` = '" . $cat_id . "',`short_desc` = '" . $short_desc . "',`long_desc` = '" . $long_desc . "', `status`= '" . $status . "', `created_at`= now() where lr_id = '" . $id . "'");
        if ($getquery) {
          return 3; //success
        } else {
          return 4; //error
        }
      }
    }


  }


  // create category

  public function addCategory($cat_title, $parent_id, $type, $status)
  {

    if ($cat_title == '' || $parent_id == '' || $status == '') {
      return 1;
    } else {
      $getquery = $this->query("select * from category where cat_name='" . $cat_title . "'");
      if ($getquery->num_rows > 0) {
        return 2;
      } else {
        $getquery = $this->query("INSERT INTO `category`(`parent_id`,`law_type`, `cat_name`, `status`, `created_at`) VALUES ('" . $parent_id . "','" . $type . "','" . $cat_title . "','" . $status . "',now())");
        if ($getquery) {
          return 3;
        } else {
          return 4;
        }
      }
    }


  }

  //add LR category
  public function add_lr_category($cat_title, $status, $lr_parent_id)
  {

    if ($cat_title == '' || $status == '') {
      return 1;
    } else {
      $getquery = $this->query("select * from lr_category where lr_cat_name='" . $cat_title . "'");
      if ($getquery->num_rows > 0) {
        return 2;
      } else {
        $getquery = $this->query("INSERT INTO `lr_category`(`lr_parent_id`, `lr_cat_name`, `status`) VALUES ('" . $lr_parent_id . "','" . $cat_title . "','" . $status . "')");
        if ($getquery) {
          return 3;
        } else {
          return 4;
        }
      }
    }


  }

  //add ba category
  public function add_ba_category($cat_title, $status, $ba_parent_id)
  {

    if ($cat_title == '' || $status == '') {
      return 1;
    } else {
      $getquery = $this->query("select * from ba_category where ba_cat_name='" . $cat_title . "'");
      if ($getquery->num_rows > 0) {
        return 2;
      } else {
        $getquery = $this->query("INSERT INTO `ba_category`(`ba_parent_id` ,`ba_cat_name`, `status`) VALUES ('" . $ba_parent_id . "','" . $cat_title . "','" . $status . "')");
        if ($getquery) {
          return 3;
        } else {
          return 4;
        }
      }
    }


  }

  // add cl category
  public function add_cl_category($cat_parent, $cat_title, $cl_abr, $status)
  {

    if ($cat_title == '' || $status == '' || $cl_abr == '') {
      return 1;
    } else {
      $getquery = $this->query("select * from cl_category where cl_cat_name='" . $cat_title . "'");
      if ($getquery->num_rows > 0) {
        return 2;
      } else {
        $getquery = $this->query("INSERT INTO `cl_category`( `cl_parent_id`,`cl_cat_name`,`cl_abr`, `status`) VALUES ('" . $cat_parent . "','" . $cat_title . "','" . $cl_abr . "','" . $status . "')");
        if ($getquery) {
          return 3;
        } else {

          return 4;
        }
      }
    }


  }

  //create topic category for mentor section
  //research intern art category

  public function add_topic_category($cat_title, $status)
  {

    if ($cat_title == '' || $status == '') {
      return 1;
    } else {
      $getquery = $this->query("select * from re_int_art_category where cat_name='" . $cat_title . "'");
      if ($getquery->num_rows > 0) {
        return 2; // exist
      } else {
        $getquery = $this->query("INSERT INTO `re_int_art_category`(`cat_name`, `status`) VALUES ('" . $cat_title . "','" . $status . "')");
        if ($getquery) {
          return 3; //success
        } else {
          return 4;
        }
      }
    }


  }

  //create role
  public function add_role($cat_title, $menu_item, $status)
  {

    if ($cat_title == '' || $menu_item == '' || $status == '') {
      return 1;
    } else {
      $getquery = $this->query("select * from access_roles where role_name='" . $cat_title . "'");
      if ($getquery->num_rows > 0) {
        return 2;
      } else {
        $getquery = $this->query("INSERT INTO `access_roles`(`role_name`, `access_menu_ids`, `status`, `created_at`) VALUES ('" . $cat_title . "','" . $menu_item . "','" . $status . "',now())");
        if ($getquery) {
          return 3;
        } else {
          return 4;
        }
      }
    }


  }

  //edit role
  public function edit_role($id, $title, $menu_item, $status)
  {

    if ($title == '' || $menu_item == '' || $status == '') {
      return 1;
    } else {
      $getquery = $this->query("select * from access_roles where id='" . $id . "'");
      if (!$getquery->num_rows > 0) {
        return 2;
      } else {
        $getquery = $this->query("Update `access_roles` set `role_name` ='" . $title . "', `access_menu_ids` = '" . $menu_item . "', `status` = '" . $status . "', `created_at` = now() where id = '" . $id . "' ");
        if ($getquery) {
          return 3;
        } else {
          return 4;
        }
      }
    }


  }

  //add subadmin
  public function add_subadmin($title, $admin_email, $admin_pass, $role, $status)
  {

    $new_pass = password_hash($admin_pass, PASSWORD_DEFAULT);

    if ($title == '' || $role == '' || $status == '') {
      return 1;
    } else {
      $getquery = $this->query("select * from admin where user_name='" . $title . "' or user_email = '" . $admin_email . "'");
      if ($getquery->num_rows > 0) {
        return 2;
      } else {
        $getquery = $this->query("INSERT INTO `admin`(`user_name`, `user_email`,`user_mobile`,`password`,`user_role`, `created_at`) VALUES ('" . $title . "','" . $admin_email . "','','" . $new_pass . "','" . $role . "',now())");
        if ($getquery) {
          return 3;
        } else {
          return 4;
        }
      }
    }


  }

  //update subadmin
  public function update_subadmin($title, $subadmin_id, $admin_email, $admin_pass, $role, $status)
  {
    if ($admin_pass == '') {
      $new_pass = '';
    } else {
      $new_pass = password_hash($admin_pass, PASSWORD_DEFAULT);
    }


    if ($title == '' || $role == '' || $status == '') {
      return 1;
    } else {
      $getquery = $this->query("select * from admin where id = '" . $subadmin_id . "'");
      if (!$getquery->num_rows > 0) {
        return 2;
      } else {
        if ($new_pass == '') {
          $getquery = $this->query("UPDATE `admin` SET `user_name` = '" . $title . "', `user_email` = '" . $admin_email . "',`user_mobile` = '',`user_role` = '" . $role . "', status = '" . $status . "' where id = '" . $subadmin_id . "'");
        } else {
          $getquery = $this->query("UPDATE `admin` SET `user_name` = '" . $title . "', `user_email` = '" . $admin_email . "',`user_mobile` = '',`password` = '" . $new_pass . "',`user_role` = '" . $role . "', status = '" . $status . "' where id = '" . $subadmin_id . "'");
        }

        if ($getquery) {
          return 3;
        } else {
          return 4;
        }
      }
    }


  }

  //get documents


  public function getdocument()
  {
    $getquery = $this->query("select * from documents order by id desc");
    if ($getquery->num_rows > 0) {
      while ($results = $getquery->fetch_assoc()) {
        $new_results[] = $results;
      }
      return $new_results;
    }

  }


  // get category


  public function getcategory()
  {
    $getquery = $this->query("select * from category order by id desc");
    if ($getquery->num_rows > 0) {
      while ($results = $getquery->fetch_assoc()) {
        $new_results[] = $results;
      }
      return $new_results;
    }

  }

  // category delete 

  public function catdelete($catid)
  {
    $getquery = $this->query("DELETE FROM `category` WHERE id='" . $catid . "'");
    if ($getquery) {
      return 2;
    } else {
      return 1;
    }

  }

  public function addTopics($name, $topic_cat, $status, $cat_name, $gen_num)
  {

    if ($name == '' || $status == '') {
      return 1;
    } else {
      $getquery = $this->query("select * from bnw_topics where topic_name='" . $name . "' and topic_cat_id = '" . $topic_cat . "'");
      if ($getquery->num_rows > 0) {
        return 2; // exist
      } else {

        $uid = $cat_name . $gen_num;

        $getquery = $this->query("INSERT INTO `bnw_topics`(`topic_uid`,`topic_name`,`topic_cat_id`, `status`,  `created_at`) VALUES ('" . $uid . "','" . $name . "','" . $topic_cat . "','" . $status . "',now())");
        if ($getquery) {

          return 3;
        } else {
          return 4;
        }
      }
    }




  }

  public function last_topic_id()
  {
    $getquery = $this->query("select MAX(id) as max_id from bnw_topics");
    if ($getquery->num_rows > 0) {
      $result = $getquery->fetch_assoc();
      return $result['max_id'] + 1;
    } else {
      return 0;
    }
  }

  public function get_topic_cat($cat_id)
  {
    $getquery = $this->query("select cat_name from topic_category where id = '" . $cat_id . "'");
    if ($getquery->num_rows > 0) {
      $result = $getquery->fetch_assoc();
      return substr($result['cat_name'], 0, 3);
    } else {
      return 0;
    }
  }

  public function get_topic_cat_count($cat_id)
  {
    $getquery = $this->query("select * from bnw_topics where topic_cat_id = '" . $cat_id . "'");
    if ($getquery->num_rows > 0) {
      $count = $getquery->num_rows + 1;
      $new_count = sprintf('%03d', $count);
      return $new_count;
    } else {
      return 1;
    }
  }


  public function editTopics($id, $name, $status)
  {



    $getquery = $this->query("update `bnw_topics` set `topic_name`='" . $name . "', `status`='" . $status . "'  where `id`='" . $id . "'");
    if ($getquery) {
      return 3;
    } else {
      return 4;
    }

  }



  public function getTopics()
  {



    $getquery = $this->query("select * from bnw_topics");
    if ($getquery->num_rows > 0) {
      while ($results = $getquery->fetch_assoc()) {
        $new_results[] = $results;
      }
      return $new_results;
    } else {
      return false;
    }

  }

  public function addUsers($users_name, $users_email, $users_mobile, $users_pass, $status)
  {



    $otp = mt_rand(100, 9999);
    $getquery = $this->query("insert into users( `users_name`, `users_email`, `users_mobile`, `users_pass`, `otp`, `status`, `created_at` ) values( '" . $users_name . "', '" . $users_email . "', '" . $users_mobile . "', '" . $users_pass . "', '" . $otp . "', '" . $status . "', now() )  ");
    if ($getquery) {
      return true;
    } else {
      return false;
    }



  }
  public function editUsers($id, $users_name, $users_email, $users_mobile, $status)
  {

    $getquery = $this->query("update users set users_name='" . $users_name . "', users_email='" . $users_email . "', users_mobile='" . $users_mobile . "', status='" . $status . "'  where id='" . $id . "'  ");
    if ($getquery) {
      return true;
    } else {
      return false;
    }



  }


  public function getAllUser()
  {


    $getquery = $this->query(" select * from users  ");
    if ($getquery->num_rows > 0) {
      while ($results = $getquery->fetch_assoc()) {
        $new_results[] = $results;
      }
      return $new_results;
    } else {
      return false;
    }

  }




  public function addRolesById($role, $id)
  {


    $getquery = $this->query(" update users set `user_role` = '" . $role . "' where `id` = '" . $id . "'  ");
    if ($getquery) {
      return true;
    } else {
      return false;
    }

  }



  public function addStudents($user_id, $profile_pic, $course, $college_name, $college_city, $state, $email, $phone, $acdemic_year)
  {





    $getquery = $this->query(" INSERT into students_details( `user_id`,`profile_pic`,`course`, `college_name`, `college_city`, `state`, `email`, `phone`,`acdemic_year`,`created_at`) values ( '" . $user_id . "', '" . $profile_pic . "','" . $course . "', '" . $college_name . "','" . $college_city . "', '" . $state . "','" . $email . "','" . $phone . "', '" . $acdemic_year . "',now())  ");

    if ($getquery) {
      return true;
    } else {
      return false;
    }

  }




  public function articleSubmission($assigned_id, $article_name, $updatedPath, $userid)
  {


    $addStudentTopic = $this->query("INSERT into student_topics (`student_id`,`topic_id`) values ('" . $userid . "','" . $assigned_id . "') ");

    $getStudentPrimaryId = $this->query("SELECT id from student_topics where student_id = '" . $userid . "' and topic_id = '" . $assigned_id . "' ");

    $getResult = $getStudentPrimaryId->fetch_assoc();

    $getId = $getResult["id"];

    $getquery = $this->query("INSERT into student_submissions (`assigned_id`,`article_name`,`article_file`) values ('" . $getId . "','" . $article_name . "','" . $updatedPath . "' ) ");

    if ($getquery) {
      return true;
    } else {
      return false;
    }
  }

  //article submission new
  public function articleSubmission_new($stu_id, $work_sess_id, $topic_id, $topic_name, $updatedPath, $task_id)
  {

    $getStudentPrimaryId = $this->query("SELECT * FROM `active_stu_work_session` where work_sess_id = '" . $work_sess_id . "' and stu_uid = '" . $stu_id . "' and end_date IS NULL ");

    if ($getStudentPrimaryId->num_rows > 0) {
      //check topic id
      $check_topic = $this->query("select * from re_int_art_topics_masterdata where id = '" . $topic_id . "'");
      if ($check_topic->num_rows > 0) {
        //now insert submission
        $check_sub = $this->query("select * from re_int_submissions where work_sess_id = '" . $work_sess_id . "' and topic_id = '" . $topic_id . "' and stu_uid = '" . $stu_id . "'");
        $count_subs = $check_sub->num_rows;

        if ($count_subs >= 3) {
          //already all 3 submission done
          return 1;
        } else {

          $insert_query = $this->query("INSERT into re_int_submissions (`work_sess_id`,`topic_id`,`topic_name`, `stu_uid`, `article_file`, `sub_date`, `status`) values ('" . $work_sess_id . "','" . $topic_id . "','" . $topic_name . "','" . $stu_id . "','" . $updatedPath . "', now(), '1') ");
          if ($insert_query) {
            //update tasks table

            $latest_subid = self::$connection->insert_id;

            if ($this->updateTasktable($count_subs, $task_id, $latest_subid)) {
              return 2;
            } else {
              return 3;
            }
          } else {
            return 3; //error in submissions
          }
        }
      } else {
        return 4; //topic id not found
      }
    } else {
      return 5; //no active session found
    }

  }

  //legal task submission api
  public function legaltask_submission($stu_id, $updatedPath, $task_id)
  {

    //now insert submission
    $check_sub = $this->query("select * from leg_int_tasks_masterdata where id = '" . $task_id . "' and stu_uid = '" . $stu_id . "'");

    if ($check_sub->num_rows > 0) {

      $insert_query = $this->query("UPDATE leg_int_tasks_masterdata SET task_submission_file = '" . $updatedPath . "', submission_date = now() where id = '" . $task_id . "'");
      if ($insert_query) {

        return 2; //success

      } else {
        return 3; //error in submissions
      }
    } else {
      return 1;
    }



  }

  public function add_new_task($user_id, $topic_cat_id, $topic_id, $task_name)
  {


    $addStudentTopic = $this->query("Select * from student_topics where student_id = '" . $user_id . "' and topic_id = '" . $topic_id . "'");
    if ($addStudentTopic->num_rows > 0) {
      $results = $addStudentTopic->fetch_assoc();
      $assigned_id = $results['id'];

      $getquery = $this->query("INSERT into student_submissions (`assigned_id`,`article_name`,`article_file`) values ('" . $assigned_id . "','" . $task_name . "','' ) ");

      if ($getquery) {
        return true;
      } else {
        return false;
      }
    }
  }

  //update task table after student submission 
  public function updateTasktable($count_subs, $task_id, $submission_id)
  {
    if ($count_subs == 0) {
      $sub_id = $submission_id;
      $update = $this->query("UPDATE re_int_tasks SET topic_status = 1, sub1_id = '" . $sub_id . "' where id = '" . $task_id . "'");
    } else if ($count_subs == 1) {
      $sub_id = $submission_id;
      $update = $this->query("UPDATE re_int_tasks SET topic_status = 3, sub2_id = '" . $sub_id . "' where id = '" . $task_id . "'");
    } else {
      $sub_id = $submission_id;
      $update = $this->query("UPDATE re_int_tasks SET topic_status = 5, sub3_id = '" . $sub_id . "' where id = '" . $task_id . "'");
    }

    if ($update) {
      return true;
    } else {
      return false;
    }
  }

  //allot topic to students
  public function allot_topic($user_id, $topic_id, $mentor_id)
  {


    $addStudentTopic = $this->query("Select * from student_topics where student_id = '" . $user_id . "' and topic_id = '" . $topic_id . "'");
    if ($addStudentTopic->num_rows > 0) {
      return 1; //already exist
    } else {

      $getquery = $this->query("INSERT into student_topics (`student_id`,`topic_id`,`assigned_by`, `created_at`) values ('" . $user_id . "','" . $topic_id . "','" . $mentor_id . "', now() ) ");

      if ($getquery) {
        return 2; //success
      } else {
        return 3; //error
      }
    }
  }




  public function searchAct($search_term, $search_in, $search_by)
  {

    $search_in = strtolower($search_in);
    $search_by = strtolower($search_by);

    if ($search_in == 'act' && $search_by == 'word') {
      $getquery = $this->query("select * from bare_acts_names where bare_act_name  like '%$search_term%'  ");
      if ($getquery->num_rows > 0) {
        while ($results = $getquery->fetch_assoc()) {

          $new_results[] = $results;
        }
        return $new_results;
      } else {
        return false;
      }


    } else if ($search_in == 'caselaw' && $search_by == 'citation') {


      $getquery = $this->query("select * from case_laws where citation_name like '%$search_term%' ");
      if ($getquery->num_rows > 0) {
        while ($results = $getquery->fetch_assoc()) {
          $new_results[] = $results;
        }
        return $new_results;
      } else {
        return false;
      }
    } else if ($search_in == 'caselaw' && $search_by == 'word') {


      $getquery = $this->query("select * from case_laws where like '%$search_term%' ");
      if ($getquery->num_rows > 0) {
        while ($results = $getquery->fetch_assoc()) {
          $new_results[] = $results;
        }
        return $new_results;
      } else {
        return false;
      }
    } else {
      return false;
    }

  }


  public function searchChapterByActId($act_id)
  {

    $getquery = $this->query("select * from bare_acts_chapters where bare_act_id  = '" . $act_id . "' ");
    if ($getquery->num_rows > 0) {
      while ($results = $getquery->fetch_assoc()) {
        $new_results[] = $results;
      }
      return $new_results;
    } else {
      return false;
    }


  }



  public function getArticlesByStatus($userid, $status)
  {

    $getquery = $this->query(" select id,topic_id from student_topics where student_id = '" . $userid . "'  ");
    if ($getquery->num_rows > 0) {
      $topicName = [];
      $new_results = [];
      while ($results = $getquery->fetch_assoc()) {

        $new_results[] = $results;

      }

      $resultSize = sizeof($new_results);

      for ($i = 0; $i < $resultSize; $i++) {
        $topicId = $new_results[$i]["id"];

        $getbnwarticles = $this->query(" select * from student_submissions where assigned_id = '" . $topicId . "'  ");

        $bnwArticle = $getbnwarticles->fetch_assoc();

        if ($bnwArticle != '') {
          $new_articles[] = $bnwArticle;
        }



      }

      $resultSize = sizeof($new_articles);


      for ($i = 0; $i < $resultSize; $i++) {

        $feedbackId = $new_articles[$i]["id"];
        $getfeedbacks = $this->query(" select * from submission_feedback where submission_id = '" . $feedbackId . "'  ");

        $allFeedback = $getfeedbacks->fetch_assoc();



        if ($allFeedback != '') {
          // $new_feed[] = $allFeedback;
          $new_articles[$i]["feedbacks"] = $allFeedback;
        }



      }

      for ($i = 0; $i < $resultSize; $i++) {

        $categoryId = $new_articles[$i]["assigned_id"];

        $getcategory = $this->query(" select * from bnw_topics where id = '" . $categoryId . "'  ");
        $allCategory = $getcategory->fetch_assoc();

        if ($allCategory != '') {
          // $new_feed[] = $allFeedback;
          $new_articles[$i]["category"] = $allCategory["topic_name"];
        }

      }






      return $new_articles;


    } else {
      return false;
    }



  }

  public function getAllArticles()
  {

    $getquery = $this->query("select topic_id,article_name,status from bnw_articles");

    if ($getquery->num_rows > 0) {
      $i = 0;
      $finalResult = '';
      while ($results = $getquery->fetch_assoc()) {
        $resultsArr[] = $results;

      }

      $len = count($resultsArr);
      $finalRes = array();

      for ($i = 0; $i < $len; $i++) {
        $topicid = $resultsArr[$i]["topic_id"];
        $get_query = $this->query("select topic_name,status from bnw_topics where `id` = '" . $topicid . "'");
        $results2 = $get_query->fetch_assoc();
        $resultsArr2[] = $results2;

        $finalRes["topic_id"] = $resultsArr[$i]["topic_id"];
        $finalRes["article_name"] = $resultsArr[$i]["article_name"];
        $finalRes["status"] = $resultsArr[$i]["status"];
        $finalRes["topic_name"] = $resultsArr2[$i]["topic_name"];
        $finalRes["topic_status"] = $resultsArr2[$i]["status"];

      }


      return $finalRes;
    } else {
      return false;
    }

  }



  public function addArticles($topic_id, $article_name, $status)
  {


    $getquery = $this->query("INSERT into bnw_articles (`topic_id`,`article_name`,`status`) values ('" . $topic_id . "','" . $article_name . "','" . $status . "' ) ");

    if ($getquery) {
      return true;
    } else {
      return false;
    }

  }




  public function createTopics($student_id, $topic_id, $assigned_by, $start_date, $end_date)
  {


    $getquery = $this->query("INSERT into student_topics (`student_id`,`topic_id`,`assigned_by`,`start_date`,`end_date`) values ('" . $student_id . "','" . $topic_id . "','" . $assigned_by . "','" . $start_date . "','" . $end_date . "' ) ");

    if ($getquery) {
      return true;
    } else {
      return false;
    }

  }


  public function getAllTopics()
  {


    $getquery = $this->query("select * from student_topics");

    if ($getquery->num_rows > 0) {

      while ($results = $getquery->fetch_assoc()) {
        $new_results[] = $results;
      }
      return $new_results;
    } else {
      return false;
    }

  }



  public function updateCandidateStatus($id, $status)
  {


    $getquery = $this->query("update users set status = '" . $status . "' where id = '" . $id . "' ");

    if ($getquery) {
      return true;
    } else {
      return false;
    }

  }



  public function registerStudents($name, $email, $mobile, $password)
  {
    if (strlen($name) >= 15) {
      return 1;
    }


    $pattern = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    if (preg_match($pattern, $email) == false) {
      return 2;
    }

    $mobile_patter = "/^[6-9][0-9]{9}$/";
    if (preg_match($mobile_patter, $mobile) == false) {
      return 3;
    }

    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);

    if (!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
      return 4;
    }

    $get_query = $this->query("select * from users where users_email='" . $email . "' OR users_mobile='" . $mobile . "'");
    if ($get_query->num_rows > 0) {
      return 5;
    } else {
      $otp = mt_rand(100, 9999);
      $get_results = $this->query("INSERT INTO `users`(`users_name`, `users_email`, `users_mobile`, `users_pass`, `otp`, `status`,`user_role`, `created_at`) VALUES ('" . $name . "','" . $email . "','" . $mobile . "','" . $password . "','" . $otp . "','1','2',now())");
      $this->query(" INSERT into `students_details`(`email`, `phone`,`created_at`) values ( '" . $email . "','" . $mobile . "',now())  ");


      if ($get_results) {
        return 6;
      } else {
        return 7;
      }
    }
  }


  //register intern
  public function register_interns($name, $email, $mobile, $college_name, $college_year)
  {
    if (strlen($name) >= 15) {
      return 1;
    }


    $pattern = "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix";
    if (preg_match($pattern, $email) == false) {
      return 2;
    }

    $mobile_patter = "/^[6-9][0-9]{9}$/";
    if (preg_match($mobile_patter, $mobile) == false) {
      return 3;
    }

    $password = rand(99999999, 100000000);

    $get_query = $this->query("select * from mentor_students where email='" . $email . "' OR mobile='" . $mobile . "'");
    if ($get_query->num_rows > 0) {
      return 5; // already exist
    } else {
      $get_results = $this->query("INSERT INTO `mentor_students`(`full_name`, `email`, `mobile`, `password`,`profile_pic`,`college_name`,`college_year`,`credits`,`subscription_status`, `profile_status`, `created_at`) VALUES ('" . $name . "','" . $email . "','" . $mobile . "','" . $password . "','','" . $college_name . "','" . $college_year . "','0','1','1',now())");
      if ($get_results) {
        return 6; //success
      } else {
        return 7; //error
      }
    }
  }

  //update intern
  public function update_interns($id, $name, $email, $mobile, $college_name, $college_year, $status)
  {


    $get_query = $this->query("select * from students_masterdata where id='" . $id . "'");
    if ($get_query->num_rows > 0) {
      $get_results = $this->query("UPDATE `students_masterdata` SET `student_name` = '" . $name . "', `email` = '" . $email . "', `phone` = '" . $mobile . "',`college_name` = '" . $college_name . "',`academic_year` = '" . $college_year . "', status = '" . $status . "' WHERE id = '" . $id . "'");
      if ($get_results) {
        return 1; //success
      } else {
        return 3; //error
      }
    } else {
      return 2;
    }
  }


  public function updateArticleStatus($id, $status)
  {


    $getquery = $this->query("update bnw_articles set status = '" . $status . "' where id = '" . $id . "' ");

    if ($getquery) {
      return true;
    } else {
      return false;
    }

  }




  public function updateCredits($id, $credits, $tnx_type, $tnx_by, $tnx_status)
  {




    $updateTxn = $this->query("INSERT into credit_transaction (`customer_id`, `cr_amount`, `tnx_type`, `tnx_by`, `tnx_status`, `created_at`) VALUES('" . $id . "','" . $credits . "','" . $tnx_type . "','" . $tnx_by . "','" . $tnx_status . "',now())");


    $getTnx = $this->query("select * from credit_transaction where customer_id = '" . $id . "'");
    $totalCredits = 0;
    if ($getTnx->num_rows > 0) {

      while ($results = $getTnx->fetch_assoc()) {
        $new_results[] = $results;
      }


      $sizeOfRes = sizeof($new_results);


      for ($i = 0; $i < $sizeOfRes; $i++) {
        if ($new_results[$i]["tnx_type"] == 1 && $new_results[$i]["tnx_status"] == 3) {
          $totalCredits += $new_results[$i]["cr_amount"];
        }
      }

    }



    $getquery = $this->query("update users set credits = '" . $totalCredits . "' where id = '" . $id . "' ");



    if ($getquery) {
      if ($updateTxn) {
        return 2;
      }
      return 3;
    } else {
      return 3;
    }

  }





  public function editArticles($id, $topic_id, $article_name, $status)
  {



    $getquery = $this->query("update `bnw_articles` set `topic_id`='" . $topic_id . "', `article_name`='" . $article_name . "', `status`='" . $status . "'  where `id`='" . $id . "'");
    if ($getquery) {
      return 3;
    } else {
      return 4;
    }

  }


  public function deleteArticle($id)
  {



    $getquery = $this->query("delete from bnw_articles where `id`='" . $id . "'");
    if ($getquery) {
      return 3;
    } else {
      return 4;
    }

  }


  public function addSubmissionFeedback($submission_id, $feedback_mentor_id, $punctual_level, $original_level, $presentation, $citation, $subjective, $mentor_remarks)
  {

    $query = $this->query("select * from submission_assessment where sub_id = '" . $submission_id . "'");
    if ($query->num_rows >= 3) {
      return 1; // no submission exist
    } else {
      $work_sess_id = $this->getWorkSessId($submission_id, 'work');
      $stu_uid = $this->getWorkSessId($submission_id, 'stu');

      $getquery = $this->query("INSERT into submission_assessment(`work_sess_id`,`sub_id`,`stu_uid`, `mentor_uid`,`punctual_level`,`originality_level`, `presentation_level`, `citations_knowledge_level`, `subjective_knowledge_level`, `marks_obtained`, `created_at`) values ('" . $work_sess_id . "', '" . $submission_id . "','" . $stu_uid . "', '" . $feedback_mentor_id . "','" . $punctual_level . "', '" . $original_level . "','" . $presentation . "', '" . $citation . "','" . $subjective . "','" . $mentor_remarks . "', now())  ");
      if ($getquery) {
        //update feedback id into submission table
        $last_id = self::$connection->insert_id;
        $this->query("UPDATE re_int_submissions SET men_feedback = '" . $last_id . "' where sub_id = '" . $submission_id . "'");
        return 2;
      } else {
        return 3;
      }

    }
  }

  public function getCredits($id)
  {


    $getquery = $this->query("select credits,created_at from users where id = '" . $id . "'");

    if ($getquery->num_rows > 0) {

      $results = $getquery->fetch_assoc();
      $new_results[] = $results;

      return $new_results;
    } else {
      return false;
    }

  }

  //get work sess id
  public function getWorkSessId($subId, $type)
  {
    $select = $this->query("select * from re_int_submissions where sub_id = '" . $subId . "'");
    if ($select->num_rows > 0) {
      $results = $select->fetch_assoc();
      if ($type == 'work') {
        return $results['work_sess_id'];
      }
      if ($type == 'stu') {
        return $results['stu_uid'];
      }

    } else {
      return 'NA';
    }
  }



  public function addTestimonials($customer_name, $customer_pic, $feedback_text, $status)
  {


    $getquery = $this->query("insert into testimonial (`customer_name`,`customer_pic`,`feedback_txt`,`status`,`created_at`) values('" . $customer_name . "','" . $customer_pic . "','" . $feedback_text . "','" . $status . "',now()) ");

    if ($getquery) {

      return true;
    } else {
      return false;
    }

  }



  public function editTestimonials($id, $customer_name, $customer_pic, $feedback_text, $status)
  {


    $getquery = $this->query(" update testimonial set  `customer_name`='" . $customer_name . "', `customer_pic`='" . $customer_pic . "', `feedback_txt`='" . $feedback_text . "', status = '" . $stataus . "'  where  `id`='" . $id . "'    ");

    if ($getquery) {

      return true;
    } else {
      return false;
    }

  }




  public function getTopicsById($student_id)
  {


    $getquery = $this->query("select * from student_topics where student_id = '" . $student_id . "'");

    if ($getquery->num_rows > 0) {

      while ($results = $getquery->fetch_assoc()) {
        $new_results[] = $results;
      }
      return $new_results;
    } else {
      return false;
    }

  }


  public function creditHistory($id)
  {


    $getquery = $this->query("select * from credit_transaction where customer_id = '" . $id . "'");

    if ($getquery->num_rows > 0) {

      while ($results = $getquery->fetch_assoc()) {
        $new_results[] = $results;
      }
      return $new_results;
    } else {
      return false;
    }

  }




  public function allCreditHistory()
  {


    $getquery = $this->query("select * from credit_transaction ");

    if ($getquery->num_rows > 0) {

      while ($results = $getquery->fetch_assoc()) {
        $new_results[] = $results;
      }
      return $new_results;
    } else {
      return false;
    }

  }




  public function getAllTaskDetails($id)
  {

    $task = [];

    $getquery = $this->query("select * from student_topics where student_id = '" . $id . "' ");

    if ($getquery->num_rows > 0) {


      $results = $getquery->fetch_assoc();



      $topicId = $results["topic_id"];

      $getArticlesDetails = $this->query("select article_name from bnw_articles where topic_id = '" . $topicId . "' ");



      if ($getArticlesDetails->num_rows > 0) {

        $fetch_article_details = $getArticlesDetails->fetch_assoc();

        $task["article_details"] = $fetch_article_details;

      } else {
        $task["article_details"] = '';

      }









      $get_topic_details = $this->query("select topic_name from bnw_topics where id = '" . $topicId . "' ");

      if ($get_topic_details->num_rows > 0) {

        $fetch_topic_details = $get_topic_details->fetch_assoc();

        $task["topic_details"] = $fetch_topic_details;

      } else {
        $task["topic_details"] = '';

      }

      $assigned_id = $results["id"];

      $get_student_submission = $this->query("select * from student_submissions where assigned_id = '" . $assigned_id . "' ");

      if ($get_student_submission->num_rows > 0) {

        while ($get_submission = $get_student_submission->fetch_assoc()) {
          $new_results[] = $get_submission;
        }
        $task["students_submission"] = $new_results;
      }

      $get_student_role = $this->query("select user_role from users where id = '" . $id . "' ");


      if ($get_student_role->num_rows > 0) {
        $get_role = $get_student_role->fetch_assoc();


        $task["user_role"] = $get_role;
      } else {
        $task["user_role"] = '';
      }



      return $task;
    } else {
      return false;
    }

  }


  public function getTaskDetails($id)
  {

    $task = [];

    $getquery = $this->query("select * from student_topics where student_id = '" . $id . "' ");

    if ($getquery->num_rows > 0) {


      $results = $getquery->fetch_assoc();



      $topicId = $results["topic_id"];

      $getArticlesDetails = $this->query("select article_name from bnw_articles where topic_id = '" . $topicId . "' ");



      if ($getArticlesDetails->num_rows > 0) {

        $fetch_article_details = $getArticlesDetails->fetch_assoc();

        $task["article_details"] = $fetch_article_details;

      } else {
        $task["article_details"] = '';

      }









      $get_topic_details = $this->query("select topic_name from bnw_topics where id = '" . $topicId . "' ");

      if ($get_topic_details->num_rows > 0) {

        $fetch_topic_details = $get_topic_details->fetch_assoc();

        $task["topic_details"] = $fetch_topic_details;

      } else {
        $task["topic_details"] = '';

      }

      $assigned_id = $results["id"];

      $get_student_submission = $this->query("select * from student_submissions where assigned_id = '" . $assigned_id . "' ");

      if ($get_student_submission->num_rows > 0) {

        while ($get_submission = $get_student_submission->fetch_assoc()) {
          $new_results[] = $get_submission;
        }

      }

      $get_student_role = $this->query("select user_role from users where id = '" . $id . "' ");


      if ($get_student_role->num_rows > 0) {
        $get_role = $get_student_role->fetch_assoc();


        $task["user_role"] = $get_role;
      } else {
        $task["user_role"] = '';
      }



      return $task;
    } else {
      return false;
    }

  }



  public function editStudentsDetails($user_id, $profile_pic, $course, $college_name, $college_city, $state, $acdemic_year, $name, $email, $phone)
  {


    $getquery = $this->query(" select * from students_details where user_id = '" . $user_id . "'  ");


    if ($getquery->num_rows > 0) {
      if ($profile_pic != '') {
        $getquerys = $this->query(" update students_details set `profile_pic` = '" . $profile_pic . "',`course` = '" . $course . "',`college_name` = '" . $college_name . "',`college_city` = '" . $college_city . "',`state` = '" . $state . "',`acdemic_year` = '" . $acdemic_year . "'  where `user_id` = '" . $user_id . "'        ");

      } else {
        $getquerys = $this->query(" update students_details set `course` = '" . $course . "',`college_name` = '" . $college_name . "',`college_city` = '" . $college_city . "',`state` = '" . $state . "',`acdemic_year` = '" . $acdemic_year . "'  where `user_id` = '" . $user_id . "'        ");

      }

      $get_querys = $this->query(" update users set `users_name` = '" . $name . "',`users_email` = '" . $email . "',`users_mobile` = '" . $phone . "'  where `id` = '" . $user_id . "'        ");



      if ($getquerys) {
        return true;
      } else {
        return false;
      }
    } else {
      if ($profile_pic != '') {
        $getqueryss = $this->query(" INSERT into students_details( `user_id`,`profile_pic`,`course`, `college_name`, `college_city`, `state`,`acdemic_year`,`created_at`) values ( '" . $user_id . "', '" . $profile_pic . "','" . $course . "', '" . $college_name . "','" . $college_city . "', '" . $state . "', '" . $acdemic_year . "',now())  ");

      } else {
        $getqueryss = $this->query(" INSERT into students_details( `user_id`,`course`, `college_name`, `college_city`, `state`,`acdemic_year`,`created_at`) values ( '" . $user_id . "', '" . $course . "', '" . $college_name . "','" . $college_city . "', '" . $state . "', '" . $acdemic_year . "',now())  ");

      }
      $get_querys = $this->query(" update users set `users_name` = '" . $name . "',`users_email` = '" . $email . "',`users_mobile` = '" . $phone . "'  where `id` = '" . $user_id . "'        ");

      if ($getqueryss) {
        return true;
      } else {
        return false;
      }
    }


  }

  //edit normal users
  public function editUsersDetails($user_id, $profile_pic, $name, $email, $phone)
  {


    $getquery = $this->query(" select * from students_details where user_id = '" . $user_id . "'  ");


    if ($getquery->num_rows > 0) {
      if ($profile_pic != '') {
        $getquerys = $this->query(" update students_details set `profile_pic` = '" . $profile_pic . "',`course` = '" . $course . "',`college_name` = '" . $college_name . "',`college_city` = '" . $college_city . "',`state` = '" . $state . "',`acdemic_year` = '" . $acdemic_year . "'  where `user_id` = '" . $user_id . "'        ");

      } else {
        $getquerys = $this->query(" update students_details set `course` = '" . $course . "',`college_name` = '" . $college_name . "',`college_city` = '" . $college_city . "',`state` = '" . $state . "',`acdemic_year` = '" . $acdemic_year . "'  where `user_id` = '" . $user_id . "'        ");

      }

      $get_querys = $this->query(" update users set `users_name` = '" . $name . "',`users_email` = '" . $email . "',`users_mobile` = '" . $phone . "'  where `id` = '" . $user_id . "'        ");



      if ($getquerys) {
        return true;
      } else {
        return false;
      }
    } else {
      if ($profile_pic != '') {
        $getqueryss = $this->query(" INSERT into students_details( `user_id`,`profile_pic`,`course`, `college_name`, `college_city`, `state`,`acdemic_year`,`created_at`) values ( '" . $user_id . "', '" . $profile_pic . "','" . $course . "', '" . $college_name . "','" . $college_city . "', '" . $state . "', '" . $acdemic_year . "',now())  ");

      } else {
        $getqueryss = $this->query(" INSERT into students_details( `user_id`,`course`, `college_name`, `college_city`, `state`,`acdemic_year`,`created_at`) values ( '" . $user_id . "', '" . $course . "', '" . $college_name . "','" . $college_city . "', '" . $state . "', '" . $acdemic_year . "',now())  ");

      }
      $get_querys = $this->query(" update users set `users_name` = '" . $name . "',`users_email` = '" . $email . "',`users_mobile` = '" . $phone . "'  where `id` = '" . $user_id . "'        ");

      if ($getqueryss) {
        return true;
      } else {
        return false;
      }
    }


  }


  public function updateUsersPassword($id, $pass)
  {
    $hash_pass = password_hash($pass, PASSWORD_DEFAULT);

    $getquery = $this->query(" update users set `users_pass`='" . $hash_pass . "'  where  `id`='" . $id . "'");

    if ($getquery) {

      return true;
    } else {
      return false;
    }

  }

  public function updateUsersPassword_intern($id, $pass)
  {

    $pass = password_hash($pass, PASSWORD_DEFAULT);

    $getquery = $this->query("update students_masterdata set `password`='" . $pass . "'  where  `id`='" . $id . "'");

    if ($getquery) {

      return true;
    } else {
      return false;
    }

  }





  public function editCategory($id, $parent_id, $cat_name, $law_type, $status)
  {


    $getquery = $this->query(" update category set `parent_id`='" . $parent_id . "' , `cat_name`='" . $cat_name . "' , `law_type`='" . $law_type . "' , `status`='" . $status . "'   where  `id`='" . $id . "'    ");

    if ($getquery) {

      return true;
    } else {
      return false;
    }

  }

  //edit lr category
  public function edit_lr_category($id, $cat_name, $status)
  {


    $getquery = $this->query(" update lr_category set  `lr_cat_name`='" . $cat_name . "', `status`='" . $status . "'   where  `lr_cat_id`='" . $id . "'    ");

    if ($getquery) {

      return true;
    } else {
      return false;
    }

  }

  //edit ba category
  public function edit_ba_category($id, $cat_name, $status)
  {


    $getquery = $this->query(" update ba_category set  `ba_cat_name`='" . $cat_name . "', `status`='" . $status . "'   where  `ba_cat_id`='" . $id . "'    ");

    if ($getquery) {

      return true;
    } else {
      return false;
    }

  }

  //edit cl category
  public function edit_cl_category($id, $cat_name, $cl_abr, $status)
  {


    $getquery = $this->query(" update cl_category set  `cl_cat_name`='" . $cat_name . "',`cl_abr` = '" . $cl_abr . "', `status`='" . $status . "'   where  `cl_cat_id`='" . $id . "'    ");

    if ($getquery) {

      return true;
    } else {
      return false;
    }

  }

  //get case law by citation
  public function cl_by_citation($citation)
  {

    $getquery = $this->query("SELECT * FROM `case_laws` where citation_name = '" . $citation . "'");

    if ($getquery->num_rows > 0) {
      $results = $getquery->fetch_assoc();
      return $results;

    } else {
      return false;
    }
  }

  //get act sections
  public function get_act_sections($bare_act)
  {

    $getquery = $this->query("SELECT `bare_acts_names`.`ba_id`, `bare_acts_sections`.`ba_sec_id`,`bare_acts_sections`.`section_name` FROM `bare_acts_names` JOIN `bare_acts_sections` ON `bare_acts_names`.`ba_id` = `bare_acts_sections`.`ba_id` WHERE `bare_acts_names`.`bare_act_name` = '" . $bare_act . "'");

    if ($getquery->num_rows > 0) {
      while ($results = $getquery->fetch_assoc()) {
        $new_results[] = $results;
      }
      return $new_results;

    } else {
      return false;
    }
  }

  //add case brief
  public function add_case_brief($cl_id, $slug, $citation, $cb_title, $first_party_type, $first_party_name, $second_party_type, $second_party_name, $datefilter, $cl_cat_id, $bench, $act_section, $para_no, $op_judgement, $interpretation, $status)
  {

    $getquery = $this->query("select * from case_briefs where cb_title = '" . $cb_title . "'");

    if ($getquery->num_rows > 0) {

      return 1; // already exist

    } else {

      $newdate = date("Y-m-d", strtotime($datefilter));
      $query = $this->query("INSERT INTO case_briefs (`cl_id`, `cb_title`, `case_citations`, `slug`, `first_party`, `first_party_type`, `second_party`, `second_party_type`, `cl_decision_date`, `cl_cat_id`, `ba_sec_id`, `para_no`,`op_judgement`,`interpretation`,`status`,`created_at`) values ('" . $cl_id . "', '" . $cb_title . "', '" . $citation . "', '" . $slug . "', '" . $first_party_name . "', '" . $first_party . "', '" . $second_party_name . "', '" . $second_party_type . "','" . $newdate . "', '" . $cl_cat_id . "', '" . $act_section . "', '" . $para_no . "', '" . $op_judgement . "', '" . $interpretation . "', '" . $status . "', now())");
      if ($query) {
        return 2; //success
      } else {
        return self::$connection->error; //error in insertion
      }
    }
  }

  //update case brief
  public function update_case_brief($cb_id, $cl_id, $slug, $citation, $cb_title, $first_party_type, $first_party_name, $second_party_type, $second_party_name, $datefilter, $cl_cat_id, $bench, $act_section, $para_no, $op_judgement, $interpretation, $status)
  {

    $getquery = $this->query("select * from case_briefs where cb_id = '" . $cb_id . "'");

    if ($getquery->num_rows > 0) {

      $newdate = date("Y-m-d", strtotime($datefilter));
      $query = $this->query("UPDATE case_briefs set `cb_title` = '" . $cb_title . "', `case_citations` = '" . $citation . "', `slug` = '" . $slug . "', `first_party` = '" . $first_party_name . "', `first_party_type` = '" . $first_party_type . "', `second_party` = '" . $second_party_name . "', `second_party_type` = '" . $second_party_type . "', `cl_decision_date` = '" . $newdate . "', `cl_cat_id` = '" . $cl_cat_id . "', `ba_sec_id` = '" . $ba_sec_id . "', `para_no` = '" . $para_no . "',`op_judgement` = '" . $op_judgement . "',`interpretation` = '" . $interpretation . "',`status` = '" . $status . "' WHERE cb_id = '" . $cb_id . "'");
      if ($query) {
        return 2; //success
      } else {
        return self::$connection->error; //error in insertion
      }

    } else {

      return 1; // this does not exist

    }
  }

  //check uni txt
  public function check_uni_txt($txt)
  {

    $ba_act = '';
    $cl = '';
    $data = false; //available

    //   $getquery = $this->query("select * from bare_acts_names where ba_auto_id = '".$txt."'");

    //   if($getquery->num_rows > 0){

    //     $ba_act = 2;
//     $data = true;

    //   }
//   else {
//       $ba_act = 1; //available
//   }

    $getquery1 = $this->query("select * from case_laws where citation_name = '" . $txt . "'");

    if ($getquery1->num_rows > 0) {

      $cl = 2;
      $data = true;

    } else {
      $cl = 1; //available
    }

    if ($data === true) {
      return false; // not available

    } else {
      return true; //available
    }


  }




  //create case law first party name
  public function add_f_party($party)
  {

    $getquery = $this->query("select * from cl_first_party where cl_party_name = '" . $party . "'");

    if ($getquery->num_rows > 0) {

      return 1; // already exist

    } else {

      $query = $this->query("INSERT INTO cl_first_party (`cl_party_name`, `created_at`) values ('" . $party . "',  now())");
      if ($query) {
        return 2; //success
      } else {
        return self::$connection->error; //error in insertion
      }
    }
  }

  //create case law second party name
  public function add_sec_party($party)
  {

    $getquery = $this->query("select * from cl_sec_party where cl_party_name = '" . $party . "'");

    if ($getquery->num_rows > 0) {

      return 1; // already exist

    } else {

      $query = $this->query("INSERT INTO cl_sec_party (`cl_party_name`, `created_at`) values ('" . $party . "',  now())");
      if ($query) {
        return 2; //success
      } else {
        return self::$connection->error; //error in insertion
      }
    }
  }

  //update case law first party name
  public function update_f_party($party_id, $party_name)
  {

    $getquery = $this->query("select * from cl_first_party where cl_party_id = '" . $party_id . "'");

    if ($getquery->num_rows > 0) {

      $query = $this->query("Update cl_first_party set `cl_party_name` = '" . $party_name . "' where `cl_party_id` = '" . $party_id . "'");
      if ($query) {
        return 2; //success
      } else {
        return self::$connection->error; //error in insertion
      }

    } else {
      return 1; // party does not exist

    }
  }

  //update case law second party name
  public function update_sec_party($party_id, $party_name)
  {

    $getquery = $this->query("select * from cl_sec_party where cl_party_id = '" . $party_id . "'");

    if ($getquery->num_rows > 0) {

      $query = $this->query("Update cl_sec_party set `cl_party_name` = '" . $party_name . "' where `cl_party_id` = '" . $party_id . "'");
      if ($query) {
        return 2; //success
      } else {
        return self::$connection->error; //error in insertion
      }

    } else {
      return 1; // party does not exist

    }
  }

  //update publishing status
  public function update_approval($type, $id)
  {
    if ($type == 'ba') {
      $query = $this->query("UPDATE  bare_acts_names set `publish_status` = 1 where `ba_id` = '" . $id . "'");
    }
    if ($type == 'cl') {
      $query = $this->query("UPDATE  case_laws set `publish_status` = 1 where `cl_id` = '" . $id . "'");
    }
    if ($type == 'cb') {
      $query = $this->query("UPDATE case_briefs set `publish_status` = 1 where `cb_id` = '" . $id . "'");
    }

    if ($type == 'ba_chap') {
      $query = $this->query("UPDATE bare_acts_chapters set `publish_status` = 1 where `ba_chap_id` = '" . $id . "'");
    }
    if ($type == 'ba_section') {
      $query = $this->query("UPDATE bare_acts_sections set `publish_status` = 1 where `ba_sec_id` = '" . $id . "'");
    }

    if ($query) {
      return 2; //success
    } else {
      return 1; //not updated
    }


  }

  //update disapproval
  public function update_disapproval($type, $id)
  {
    if ($type == 'ba') {
      $query = $this->query("UPDATE  bare_acts_names set `publish_status` = 2 where `ba_id` = '" . $id . "'");
    }
    if ($type == 'cl') {
      $query = $this->query("UPDATE  case_laws set `publish_status` = 2 where `cl_id` = '" . $id . "'");
    }
    if ($type == 'cb') {
      $query = $this->query("UPDATE case_briefs set `publish_status` = 2 where `cb_id` = '" . $id . "'");
    }

    if ($type == 'ba_chap') {
      $query = $this->query("UPDATE bare_acts_chapters set `publish_status` = 2 where `ba_chap_id` = '" . $id . "'");
    }
    if ($type == 'ba_section') {
      $query = $this->query("UPDATE bare_acts_sections set `publish_status` = 2 where `ba_sec_id` = '" . $id . "'");
    }

    if ($query) {
      return 2; //success
    } else {
      return 1; //not updated
    }


  }


  //delete case law and bare act
  public function delete_clba($type, $id)
  {
    if ($type == 'ba') {
      $query = $this->query("DELETE FROM  bare_acts_names where `ba_id` = '" . $id . "'");
    }
    if ($type == 'cl') {
      $query = $this->query("DELETE FROM case_laws where `cl_id` = '" . $id . "'");
    }
    if ($type == 'cb') {
      $query = $this->query("DELETE FROM case_briefs where `cb_id` = '" . $id . "'");
    }

    if ($type == 'ba_chap') {
      $query = $this->query("DELETE FROM bare_acts_chapters where `ba_chap_id` = '" . $id . "'");
    }
    if ($type == 'ba_section') {
      $query = $this->query("DELETE FROM bare_acts_sections where `ba_sec_id` = '" . $id . "'");
    }

    if ($query) {
      return 2; //success
    } else {
      return 1; //not updated
    }


  }

  //get citation unique number from category and year
  public function get_citation_no($category, $year)
  {

    $getquery = $this->query("SELECT DISTINCT cl_decision_date FROM case_laws WHERE YEAR(cl_decision_date) = '" . $year . "' and cl_cat_id = '" . $category . "'");

    if ($getquery->num_rows > 0) {
      $get_no = $getquery->num_rows;
      return $get_no + 1;

    } else {
      return 1; // party does not exist

    }
  }

  //send invite update
  public function send_invite_update($email)
  {

    $getquery = $this->query("UPDATE invited_students SET invite_status = 1 where student_email = '" . $email . "'");
    if ($getquery) {
      return true;
    } else {
      return false; // error exist

    }
  }

  //send signup email with code
  public function send_signup_email($email, $code)
  {
    //email code below
    $to = $email;
    $bcc = '';

    $from = 'contact@sooprs.com';
    $subject = 'Please verify your BNWJournal account email!';
    $title = 'Verify your email sent by BNWjournal';
    $body = '<h3>Thanks for successful registraion on BNWjournal internship programme.<h3><br><p>Please verify your email</p><br><p>Code: ' . $code . '</p>';
    require_once('../../send_email.php');
    $send_pass_email = send_email($to, $body, $from, $subject,$bcc);
    if ($send_pass_email == true) {
      return true;
    } else {
      return false;
    }
  }

  public function send_signup_email_users($email, $otp,$pass_in_mail)
  {
    $template_path = '../../email-templates/welcome-email.html';
    $template = file_get_contents($template_path);
    
    $template = str_replace('{otp}', $otp, $template);
    $template = str_replace('{password}', $pass_in_mail, $template);

    $to = $email;
    $bcc = '';
    $from = 'contact@sooprs.com';
    $subject = 'Please verify your sooprs account email!';
    $title = 'Verify your email ';
    // $body = '<h3>Thanks for successful registraion on Sooprs Account.<h3><br><p>Please verify your email</p><br><p>Code: ' . $otp . '</p><br><p> After verifying from the above OTP, you can login to Sooprs from below password: <br> ' . $pass_in_mail . '</p>';
    $body = $template;
    require_once('../../send_email.php');
    $send_pass_email = send_email($to, $body, $from, $subject,$bcc);
    if ($send_pass_email == true) {
      return true;
    } else {
      return false;
    }
  }

  public function send_milestones_email($email,$project_t)
  {
    $template_path = '../../email-templates/welcome-email.html';
    $template = file_get_contents($template_path);    
    $template = str_replace('{otp}', $project_t, $template);
    $template = str_replace('{password}', "", $template); 

    $to = $email;
    $bcc = '';
    $from = 'contact@sooprs.com';
    $subject = 'Milestones generated on your project';
    $title = 'Milestones generated ';
    // $body = '<h3>Thanks for successful registraion on Sooprs Account.<h3><br><p>Please verify your email</p><br><p>Code: ' . $otp . '</p><br><p> After verifying from the above OTP, you can login to Sooprs from below password: <br> ' . $pass_in_mail . '</p>';
    $body = $template;
    require_once('../../send_email.php');
    $send_milestones_email = send_email($to, $body, $from, $subject,$bcc);
    if ($send_milestones_email == true) {
      return true;
    } else {
      return false;
    }
  }


  public function send_assigned_project_email($email)
  {
    $template_path = '../../email-templates/client-assigned-the-project.html';
    $template = file_get_contents($template_path);
    
    // $template = str_replace('{otp}', $otp, $template);

    $to = $email;
    $bcc = '';
    $from = 'contact@sooprs.com';
    $subject = 'New project assigned ';
    $title = 'A new project assigned to you';
    // $body = '<h3>Thanks for successful registraion on Sooprs Account.<h3><br><p>Please verify your email</p><br><p>Code: ' . $otp . '</p><br><p> After verifying from the above OTP, you can login to Sooprs from below password: <br> ' . $pass_in_mail . '</p>';
    $body = $template;
    require_once('../../send_email.php');
    $send_pass_email = send_email($to, $body, $from, $subject,$bcc);
    if ($send_pass_email == true) {
      return true;
    } else {
      return false;
    }
  }


  public function send_transaction_email($email,$wallet)
  {
    $template_path = '../../email-templates/successful-transaction.html';
    $template = file_get_contents($template_path);
    
    $template = str_replace('{wallet}', $wallet, $template);

    $to = $email;
    $bcc = '';
    $from = 'contact@sooprs.com';
    $subject = 'Sooprs transactions';
    $title = 'Transactions made on Sooprs';
    // $body = '<h3>Thanks for successful registraion on Sooprs Account.<h3><br><p>Please verify your email</p><br><p>Code: ' . $otp . '</p><br><p> After verifying from the above OTP, you can login to Sooprs from below password: <br> ' . $pass_in_mail . '</p>';
    $body = $template;
    require_once('../../send_email.php');
    $send_pass_email = send_email($to, $body, $from, $subject,$bcc);
    if ($send_pass_email == true) {
      return true;
    } else {
      return false;
    }
  }

  // password reset mail 
  public function send_resetpwd_email($email,$new_pas)
  {
    $template_path = '../../email-templates/reset-password.html';
    $template = file_get_contents($template_path);
    
    $template = str_replace('{new_pass}', $new_pas, $template);
    $template = str_replace('{email}', $email, $template);


    $to = $email;
    $bcc = '';
    $from = 'contact@sooprs.com';
    $subject = 'Password reset email';
    $title = 'Password reset email ';
    // $body = '<h3>Thanks for successful registraion on Sooprs Account.<h3><br><p>Please verify your email</p><br><p>Code: ' . $otp . '</p><br><p> After verifying from the above OTP, you can login to Sooprs from below password: <br> ' . $pass_in_mail . '</p>';
    $body = $template;
    require_once('../../send_email.php');
    $send_pass_email = send_email($to, $body, $from, $subject,$bcc);
    if ($send_pass_email == true) {
      return true;
    } else {
      return false;
    }
  }

  public function send_bid_email($email,$project)
  {
    $template_path = '../../email-templates/someone-bid-on-your-project.html';
    $template = file_get_contents($template_path);
    
    $template = str_replace('{project}', $project, $template);
    $template = str_replace('{email}', $email, $template);


    $to = $email;
    $bcc = '';
    $from = 'contact@sooprs.com';
    $subject = 'Your enquiry got a new bid';
    $title = 'New bid on Enquiry ';
    // $body = '<h3>Thanks for successful registraion on Sooprs Account.<h3><br><p>Please verify your email</p><br><p>Code: ' . $otp . '</p><br><p> After verifying from the above OTP, you can login to Sooprs from below password: <br> ' . $pass_in_mail . '</p>';
    $body = $template;
    require_once('../../send_email.php');
    $send_pass_email = send_email($to, $body, $from, $subject,$bcc);
    if ($send_pass_email == true) {
      return true;
    } else {
      return false;
    }
  }
  
  //send email code to verify email
  public function send_email_code($email)
  {
    $get = $this->query("Select * from students_masterdata where email = '" . $email . "'");
    if ($get->num_rows > 0) {
      $results = $get->fetch_assoc();
      $code = $results['email_activation_code'];

      $to = $email;
      $bcc = '';
      $from = 'contact@sooprs.com';
      $subject = 'Please verify your BNWJournal email!';
      $title = 'Verify your email sent by BNWJournal';
      $body = '<h3>Thanks for successful registraion on BNWJournal internship programme.<h3><br><p>Please verify your email</p><br><p>Code: ' . $code . '</p>';
      require_once('../../send_email.php');
      $send_pass_email = send_email($to, $body, $from, $subject,$bcc);
      if ($send_pass_email == true) {
        return 1;
      } else {
        return 2;
      }
    } else {
      return 3; //email wrong
    }
  }

  //send email code to verify email for normal users
  public function send_email_code_users($email)
  {
    $get = $this->query("Select * from users where users_email = '" . $email . "'");
    if ($get->num_rows > 0) {
      $results = $get->fetch_assoc();
      $code = $results['email_activation_code'];

      $to = $email;
      $bcc = '';
      $from = 'contact@sooprs.com';
      $subject = 'Please verify your BNWJournal email!';
      $title = 'Verify your email sent by BNWJournal';
      $body = '<h3>Thanks for successful registraion on BNWJournal Account.<h3><br><p>Please verify your email</p><br><p>Code: ' . $code . '</p>';
      require_once('../../send_email.php');
      $send_pass_email = send_email($to, $body, $from, $subject,$bcc);
      if ($send_pass_email == true) {
        return 1;
      } else {
        return 2;
      }
    } else {
      return 3; //email wrong
    }
  }

  //apply intern
  public function apply_intern($stu_id)
  {
    $getquery = $this->query("UPDATE students_masterdata SET is_applied_intern = 1 where id = '" . $stu_id . "'");
    if ($getquery) {
      return 1;
    } else {
      return 2; // error exist

    }
  }


  //list topic category by student id
  public function list_topic_cat($stu_id)
  {

    $get_query = $this->query("Select * from students_masterdata where id = '" . $stu_id . "'");
    $fetch_stu = $get_query->fetch_assoc();

    if ($fetch_stu['intern_type'] == 0) {
      $getquery = $this->query("Select * from re_int_art_category");
    } else if ($fetch_stu['intern_type'] == 1) {
      $getquery = $this->query("Select * from topic_category");
    }
    if ($getquery->num_rows > 0) {
      while ($fetch = $getquery->fetch_assoc()) {
        $results['topic_cat_id'] = $fetch['id'];
        $results['category_name'] = $fetch['cat_name'];
        $new_results[] = $results;
      }
      return $new_results;
    } else {
      return 1; // error exist

    }
  }

  //topic list by category and intern_type
  public function topic_list_by_cat($stu_id, $intern_type, $topic_cat_id)
  {
    if ($intern_type == 0) {
      //reserch intern
      $getquery = $this->query("Select * from re_int_art_topics_masterdata where cat_id = '" . $topic_cat_id . "'");
    } else if ($intern_type == 1) {
      //legal intern
      $getquery = $this->query("Select * from bnw_topics where cat_id = '" . $topic_cat_id . "'");
    }
    if ($getquery->num_rows > 0) {
      while ($fetch = $getquery->fetch_assoc()) {

        $new_results[] = $fetch;
      }
      return $new_results;
    } else {
      return 1; // error exist

    }
  }

  //save topic selection by student id
  public function save_topic_by_stuid($stu_id, $intern_type, $topic_id, $cat_id)
  {
    if ($intern_type == 0) {
      //reserch intern
      $getquery = $this->query("Select * from re_int_tasks where topic_id = '" . $topic_id . "' and stu_uid = '" . $stu_id . "' and task_status = '1'");

      if ($getquery->num_rows > 0) {
        return 1; //alredy exist

      } else {
        $update = $this->query("INSERT INTO re_int_tasks SET stu_uid = '" . $stu_id . "', topic_id = '" . $topic_id . "',task_status = 0, created_at = now()");
        if ($update) {
          return 2; //inserted
        } else {
          return 3; //error in creating topic record
        }
      }

    } else {
      return 4; //not research intern
    }
  }

  //get assigned tasks by student id
  public function get_assigned_tasks_stuid($stu_id, $intern_type)
  {
    if ($intern_type == 0) {
      //reserch intern
      $getquery = $this->query("Select * from re_int_tasks where stu_uid ='" . $stu_id . "'");

      if ($getquery->num_rows > 0) {
        while ($results = $getquery->fetch_assoc()) {
          $new_results[] = $results;
        }

        return $new_results;

      } else {
        return 1; //no tasks assigned 
      }

    }

  }

  //save intern type by mentor 
  public function save_intern_type($stu_id, $intern_type)
  {

    $getquery = $this->query("Select * from students_masterdata where id ='" . $stu_id . "' and intern_type = '" . $intern_type . "'");

    if ($getquery->num_rows > 0) {
      return 1; //intern role already exist

    } else {
      $update = $this->query("UPDATE students_masterdata SET intern_type = '" . $intern_type . "' where id ='" . $stu_id . "'");
      if ($update) {
        return 2;
      } else {
        return 3; //error in assignment
      }
    }

  }

  //allot research intern task by mentor 
  public function allot_research_int_task($stu_id, $start_date, $end_date, $task_details, $mentor_id, $topid_id, $topic_name)
  {
    $newstart_date = date("Y-m-d", strtotime($start_date));
    $newend_date = date("Y-m-d", strtotime($end_date));
    $query = $this->query("SELECT * FROM re_int_tasks WHERE stu_uid = '" . $stu_id . "' and task_status = 1");
    if ($query->num_rows > 0) {
      return 1; //Tasks session id already exist
    } else {
      $getquery = $this->query("INSERT INTO active_stu_work_session SET stu_uid = '" . $stu_id . "', mentor_uid = '" . $mentor_id . "', ws_type = 0, starting_date = '" . $newstart_date . "', end_date = '" . $newend_date . "', extension = '', status = 1, ins_certificate = ''");

      if ($getquery) {
        $last_id = self::$connection->insert_id;

        $query = $this->query("SELECT * FROM re_int_tasks WHERE work_sess_id = '" . $last_id . "'");
        if ($query->num_rows > 0) {
          return 1; //Tasks session id already exist
        } else {
          $insert = $this->query("INSERT INTO re_int_tasks SET work_sess_id = '" . $last_id . "', stu_uid = '" . $stu_id . "', topic_id = '" . $topic_id . "', topic_name = '" . $topic_name . "', mentor_uid = '" . $mentor_id . "', topic_status = '1', task_status = 1,  assigned_on = now(), due_date = '" . $newend_date . "', task_remark = '" . $task_details . "'");
          if ($insert) {
            return 2; //task assigned
          } else {
            return 3; //error in assignment
          }
        }

      } else {
        return 4; //work session could not created
      }
    }

  }

  //allot legal intern task by mentor 
  public function allot_legal_int_task($stu_id, $start_date, $end_date, $task_details, $task_name, $updatePath)
  {
    $newstart_date = date("Y-m-d", strtotime($start_date));
    $newend_date = date("Y-m-d", strtotime($end_date));
    $query = $this->query("SELECT * FROM leg_int_tasks_masterdata WHERE stu_uid = '" . $stu_id . "' and task_name = '" . $task_name . "'");
    if ($query->num_rows > 0) {
      return 1; //Tasks session id already exist
    } else {
      $getquery = $this->query("INSERT INTO active_stu_work_session SET stu_uid = '" . $stu_id . "', mentor_uid = '', ws_type = 1, starting_date = '" . $newstart_date . "', end_date = '" . $newend_date . "', extension = '', status = 1, ins_certificate = ''");

      if ($getquery) {
        $last_id = self::$connection->insert_id;

        $query = $this->query("SELECT * FROM leg_int_tasks_masterdata WHERE work_sess_id = '" . $last_id . "'");
        if ($query->num_rows > 0) {
          return 1; //Tasks session id already exist
        } else {
          $insert = $this->query("INSERT INTO leg_int_tasks_masterdata SET work_sess_id = '" . $last_id . "',task_name = '" . $task_name . "', task_desc = '" . $task_details . "',assigned_on = '" . $newstart_date . "', deadline = '" . $newend_date . "', stu_uid = '" . $stu_id . "', mentor_uid = '', status = 1, task_file = '" . $updatePath . "'");
          if ($insert) {
            return 2; //task assigned
          } else {
            return 3; //error in assignment
          }
        }

      } else {
        return 4; //work session could not created
      }
    }

  }

  //send message by students
  public function send_msg_by_student($stu_id, $related_topic, $msg_text)
  {
    $filter_msg = strip_tags(trim($msg_text));
    $urn = strtotime(date("Y-m-d h:m:s"));

    $getquery = $this->query("Select * from students_masterdata where id ='" . $stu_id . "'");

    if ($getquery->num_rows > 0) {
      //can send msg
      $insert = $this->query("INSERT INTO `mentor_messages` SET uni_msg_no = '" . $urn . "', student_id = '" . $stu_id . "', related_topic_id = '" . $related_topic . "', message = '" . $filter_msg . "', message_date = now()");
      if ($insert) {
        return 2; //success
      } else {
        return 3; //error
      }

    } else {
      return 1; //stuid wrong
    }

  }
  //end send messages by students

  //reply message by mentor
  public function send_reply($mentor_id, $msg_id, $reply_msg)
  {
    $filter_msg = addslashes(strip_tags(trim($reply_msg)));

    $getquery = $this->query("Select * from mentor_messages where id ='" . $msg_id . "'");

    if ($getquery->num_rows > 0) {
      //can send msg
      $insert = $this->query("UPDATE `mentor_messages` SET mentor_id = '" . $mentor_id . "', reply_msg = '" . $filter_msg . "', reply_date = now() where id = '" . $msg_id . "'");
      if ($insert) {
        return 2; //success
      } else {
        return 3; //error
      }

    } else {
      return 1; //wrong msg id
    }

  }
  //end of reply msg by mentor

  //get feedback for feedback id
  public function getFeedback($feedback_id)
  {
    $select = $this->query("SELECT * FROM submission_assessment WHERE id='" . $feedback_id . "'");
    if ($select->num_rows > 0) {
      $fetch_row = $select->fetch_assoc();
      return $fetch_row;
    } else {
      return 1;
    }
  }

  //get work sess id
  public function get_work_sess_id($stu_uid)
  {
    $select = $this->query("SELECT work_sess_id FROM re_int_tasks WHERE stu_uid='" . $stu_uid . "' and task_status = 1");
    if ($select->num_rows > 0) {
      $fetch_row = $select->fetch_assoc();
      return $fetch_row['work_sess_id'];
    } else {
      return 'NA';
    }
  }

  //get msg by stu id
  public function get_msg_stuid($stu_uid)
  {
    $select = $this->query("SELECT * FROM mentor_messages WHERE student_id='" . $stu_uid . "'");
    if ($select->num_rows > 0) {
      while ($fetch_results = $select->fetch_assoc()) {
        $results[] = $fetch_results;
      }
      return $results;

    } else {
      return 'NA';
    }
  }

  //return list of notices
  public function mentor_notices()
  {
    $select = $this->query("SELECT * FROM mentor_notices");
    if ($select->num_rows > 0) {
      while ($fetch_results = $select->fetch_assoc()) {
        $fetch_results['notice_description'] = stripslashes($fetch_results['notice_description']);
        $results[] = $fetch_results;
      }
      return $results;

    } else {
      return 'NA';
    }
  }

  //create notice
  public function create_notice($notice_text, $notice_description)
  {
    $notice_desc = addslashes($notice_description);
    $select = $this->query("INSERT INTO mentor_notices (notice_text, notice_description, created_at) values ('" . $notice_text . "', '" . $notice_desc . "', now())");
    if ($select) {
      return 1;
    } else {
      return 2;
    }
  }

  //create notice
  public function get_legal_task_stuid($stu_uid)
  {
    $notice_desc = addslashes($notice_description);
    $select = $this->query("Select * from leg_int_tasks_masterdata where stu_uid = '" . $stu_uid . "' and status = 1");
    if ($select->num_rows > 0) {
      while ($results = $select->fetch_assoc()) {
        $new_results[] = $results;
      }
      return $new_results;
    } else {
      return 1;
    }
  }

  //get all courts
  public function get_all_courts($type, $cat_id)
  {
    if ($type == 'ba') {
      $select = $this->query("Select * from ba_category where ba_parent_id = '" . $cat_id . "'");
    } else if ($type == 'cl') {
      $select = $this->query("Select * from cl_category where cl_parent_id = '" . $cat_id . "'");
    } else if ($type == 'lr') {
      $select = $this->query("Select * from lr_category where lr_parent_id = '" . $cat_id . "'");
    }

    if ($select->num_rows > 0) {
      while ($results = $select->fetch_assoc()) {
        $new_results[] = $results;
      }
      return $new_results;
    } else {
      return 1;
    }
  }

  //filter search results
  public function filter_search_results($q, $type, $cat_ids)
  {

    if ($type == 'cl') {

      $get_query = $this->query("SELECT * FROM `case_laws` WHERE citation_name LIKE '%" . $q . "%' or universal_citation LIKE '%" . $q . "%' or first_party LIKE '%" . $q . "%' or second_party LIKE '%" . $q . "%' and `cl_cat_id` in ($cat_ids) ");
    } else if ($type == 'ba') {
      $get_query = $this->query("SELECT `bare_acts_names`.*, `bare_acts_sections`.`ba_sec_id`, `bare_acts_sections`.`ba_chap_id`, `bare_acts_sections`.`section_name`, `bare_acts_sections`.`section_desc`, `bare_acts_sections`.`sec_comments`, `bare_acts_sections`.`created_at`  FROM  `bare_acts_names` JOIN `bare_acts_sections` ON `bare_acts_names`.`ba_id` = `bare_acts_sections`.`ba_id` WHERE (`bare_acts_sections`.section_name LIKE '%" . $q . "%' or `bare_acts_sections`.section_desc LIKE '%" . $q . "%' or `bare_acts_names`.`bare_act_name` LIKE '%" . $q . "%' OR `bare_acts_names`.`act_desc` LIKE '%" . $q . "%') and `bare_acts_names`.`ba_cat_id` IN ($cat_ids)");
    } else if ($type == 'lr') {
      $get_query = $this->query("SELECT * FROM `legal_resources` WHERE lr_doc_title LIKE '%" . $q . "%' or short_desc LIKE '%" . $q . "%' or long_desc LIKE '%" . $q . "%' and `lr_cat_id` in ($cat_ids)");
    } else {
      $get_query = $this->query("SELECT * FROM `bare_acts_names` where bare_act_name LIKE '%" . $q . "%'");
    }
    if ($get_query->num_rows > 0) {
      while ($get_row = $get_query->fetch_assoc()) {
        $results[] = $get_row;
      }

      return $results;


    } else {
      return 2; //no record
    }

  }

  //save topic and task 
  public function save_re_int_task_status($id, $topic_status, $task_status)
  {
    $get = $this->query("Select * from re_int_tasks where id = '" . $id . "'");
    if ($get->num_rows > 0) {
      //update the task update
      $update = $this->query("UPDATE re_int_tasks SET topic_status = '" . $topic_status . "', task_status = '" . $task_status . "' where id = '" . $id . "'");
      if ($update) {
        return 1;
      } else {
        return 2;
      }
    }
  }

  //task history details
  public function task_history_intern($stu_id, $stu_type)
  {
    if ($stu_type == 2) {
      //research intern
      $get = $this->query("Select * from re_int_tasks where stu_uid = '" . $stu_id . "' and task_status = 2");
    } else {
      //legal intern
      $get = $this->query("Select * from leg_int_tasks_masterdata where stu_uid = '" . $stu_id . "' and task_status = 2");
    }

    if ($get->num_rows > 0) {
      if ($results = $get->fetch_assoc()) {
        $new_results[] = $results;
      }
      return $new_results;
    } else {
      return 1;
    }
  }

  //credit history intern
  public function credit_history_intern($stu_id)
  {
    $get = $this->query("select * from transactions where stu_uid = '" . $stu_id . "'");
    if ($get->num_rows > 0) {
      if ($results = $get->fetch_assoc()) {
        $new_results[] = $results;
      }
    } else {
      return 1; //no result
    }
  }

  public function get_single_details($id, $type)
  {
    if ($type == '1') {
      $get = $this->query("SELECT `bare_acts_names`.*, `bare_acts_sections`.`ba_sec_id`, `bare_acts_sections`.`ba_chap_id`, `bare_acts_sections`.`section_name`, `bare_acts_sections`.`section_desc`, `bare_acts_sections`.`sec_comments`, `bare_acts_sections`.`created_at`  FROM  `bare_acts_names` JOIN `bare_acts_sections` ON `bare_acts_names`.`ba_id` = `bare_acts_sections`.`ba_id` WHERE `bare_acts_sections`.section_name LIKE '%" . $q . "%' or `bare_acts_sections`.section_desc LIKE '%" . $q . "%' or `bare_acts_names`.`bare_act_name` LIKE '%" . $q . "%' OR `bare_acts_names`.`act_desc` LIKE '%" . $q . "%'");
    } else if ($type == 2) {
      $get = $this->query("SELECT case_laws.*, cl_category.cl_cat_name FROM `case_laws` JOIN `cl_category` on `case_laws`.`cl_cat_id` = `cl_category`.`cl_cat_id` WHERE cl_id = '" . $id . "'");
    } else if ($type == 3) {
      $get = $this->query("SELECT `legal_resources`.*, `lr_category`.`lr_cat_name` FROM `legal_resources` JOIN `lr_category` ON `legal_resources`.`lr_cat_id` = `lr_category`.`lr_cat_id`  WHERE `legal_resources`.lr_doc_title LIKE '%" . $q . "%' or `legal_resources`.short_desc LIKE '%" . $q . "%' or `legal_resources`.long_desc LIKE '%" . $q . "%'");
    } else {

    }
    if ($get->num_rows > 0) {
      $results = $get->fetch_assoc();
      return $results;
    } else {
      return 1;
    }
  }

  //edit profile student
  public function edit_save_profile_intern($id, $prefix, $full_name, $parent_prefix, $parent_name, $parent_type, $student_email, $gender, $student_mobile, $student_type, $course_name, $college_name, $college_city, $college_state, $academic_year, $updatedPath_profile, $updatedPath_cover, $updatedPath_cv)
  {
    if ($updatedPath_profile == '' && $updatedPath_cover == '' && $updatedPath_cv == '') {
      $update = $this->query("UPDATE students_masterdata set stu_prefix = '" . $prefix . "', student_name  = '" . $full_name . "', parent_prefix = '" . $parent_prefix . "', parent_name = '" . $parent_name . "', parent_type = '" . $parent_type . "', gender = '" . $gender . "', course = '" . $course_name . "', college_name = '" . $college_name . "', college_city = '" . $college_city . "', state = '" . $college_state . "', email = '" . $student_email . "', phone = '" . $student_mobile . "', academic_year = '" . $academic_year . "', student_type = '" . $student_type . "' where id = '" . $id . "'");
    } else if ($updatedPath_profile != '' && $updatedPath_cover == '' && $updatedPath_cv == '') {
      $update = $this->query("UPDATE students_masterdata set stu_prefix = '" . $prefix . "', student_name  = '" . $full_name . "', parent_prefix = '" . $parent_prefix . "', parent_name = '" . $parent_name . "', parent_type = '" . $parent_type . "', gender = '" . $gender . "', course = '" . $course_name . "', college_name = '" . $college_name . "', college_city = '" . $college_city . "', state = '" . $college_state . "', email = '" . $student_email . "', phone = '" . $student_mobile . "', academic_year = '" . $academic_year . "', student_type = '" . $student_type . "', profile_pic = '" . $updatedPath_profile . "' where id = '" . $id . "'");
    } else if ($updatedPath_profile == '' && $updatedPath_cover != '' && $updatedPath_cv == '') {
      $update = $this->query("UPDATE students_masterdata set stu_prefix = '" . $prefix . "', student_name  = '" . $full_name . "', parent_prefix = '" . $parent_prefix . "', parent_name = '" . $parent_name . "', parent_type = '" . $parent_type . "', gender = '" . $gender . "', course = '" . $course_name . "', college_name = '" . $college_name . "', college_city = '" . $college_city . "', state = '" . $college_state . "', email = '" . $student_email . "', phone = '" . $student_mobile . "', academic_year = '" . $academic_year . "', student_type = '" . $student_type . "', cover_letter = '" . $updatedPath_cover . "' where id = '" . $id . "'");
    } else if ($updatedPath_profile == '' && $updatedPath_cover == '' && $updatedPath_cv != '') {
      $update = $this->query("UPDATE students_masterdata set stu_prefix = '" . $prefix . "', student_name  = '" . $full_name . "', parent_prefix = '" . $parent_prefix . "', parent_name = '" . $parent_name . "', parent_type = '" . $parent_type . "', gender = '" . $gender . "', course = '" . $course_name . "', college_name = '" . $college_name . "', college_city = '" . $college_city . "', state = '" . $college_state . "', email = '" . $student_email . "', phone = '" . $student_mobile . "', academic_year = '" . $academic_year . "', student_type = '" . $student_type . "', cv = '" . $updatedPath_cv . "' where id = '" . $id . "'");
    } else if ($updatedPath_profile != '' && $updatedPath_cover != '' && $updatedPath_cv == '') {
      $update = $this->query("UPDATE students_masterdata set stu_prefix = '" . $prefix . "', student_name  = '" . $full_name . "', parent_prefix = '" . $parent_prefix . "', parent_name = '" . $parent_name . "', parent_type = '" . $parent_type . "', gender = '" . $gender . "', course = '" . $course_name . "', college_name = '" . $college_name . "', college_city = '" . $college_city . "', state = '" . $college_state . "', email = '" . $student_email . "', phone = '" . $student_mobile . "', academic_year = '" . $academic_year . "', student_type = '" . $student_type . "',profile_pic = '" . $updatedPath_profile . "', cover_letter = '" . $updatedPath_cover . "' where id = '" . $id . "'");
    } else if ($updatedPath_profile == '' && $updatedPath_cover != '' && $updatedPath_cv != '') {
      $update = $this->query("UPDATE students_masterdata set stu_prefix = '" . $prefix . "', student_name  = '" . $full_name . "', parent_prefix = '" . $parent_prefix . "', parent_name = '" . $parent_name . "', parent_type = '" . $parent_type . "', gender = '" . $gender . "', course = '" . $course_name . "', college_name = '" . $college_name . "', college_city = '" . $college_city . "', state = '" . $college_state . "', email = '" . $student_email . "', phone = '" . $student_mobile . "', academic_year = '" . $academic_year . "', student_type = '" . $student_type . "', cover_letter = '" . $updatedPath_cover . "', cv = '" . $updatedPath_cv . "' where id = '" . $id . "'");
    } else if ($updatedPath_profile != '' && $updatedPath_cover == '' && $updatedPath_cv != '') {
      $update = $this->query("UPDATE students_masterdata set stu_prefix = '" . $prefix . "', student_name  = '" . $full_name . "', parent_prefix = '" . $parent_prefix . "', parent_name = '" . $parent_name . "', parent_type = '" . $parent_type . "', gender = '" . $gender . "', course = '" . $course_name . "', college_name = '" . $college_name . "', college_city = '" . $college_city . "', state = '" . $college_state . "', email = '" . $student_email . "', phone = '" . $student_mobile . "', academic_year = '" . $academic_year . "', student_type = '" . $student_type . "', profile_pic = '" . $updatedPath_profile . "', cv = '" . $updatedPath_cv . "' where id = '" . $id . "'");
    } else if ($updatedPath_profile != '' && $updatedPath_cover != '' && $updatedPath_cv != '') {
      $update = $this->query("UPDATE students_masterdata set stu_prefix = '" . $prefix . "', student_name  = '" . $full_name . "', parent_prefix = '" . $parent_prefix . "', parent_name = '" . $parent_name . "', parent_type = '" . $parent_type . "', gender = '" . $gender . "', course = '" . $course_name . "', college_name = '" . $college_name . "', college_city = '" . $college_city . "', state = '" . $college_state . "', email = '" . $student_email . "', phone = '" . $student_mobile . "', academic_year = '" . $academic_year . "', student_type = '" . $student_type . "', profile_pic = '" . $updatedPath_profile . "',cover_letter = '" . $updatedPath_cover . "', cv = '" . $updatedPath_cv . "' where id = '" . $id . "'");
    } else {
      $update = $this->query("UPDATE students_masterdata set stu_prefix = '" . $prefix . "', student_name  = '" . $full_name . "', parent_prefix = '" . $parent_prefix . "', parent_name = '" . $parent_name . "', parent_type = '" . $parent_type . "', gender = '" . $gender . "', course = '" . $course_name . "', college_name = '" . $college_name . "', college_city = '" . $college_city . "', state = '" . $college_state . "', email = '" . $student_email . "', phone = '" . $student_mobile . "', academic_year = '" . $academic_year . "', student_type = '" . $student_type . "' where id = '" . $id . "'");
    }
    if ($update) {
      return 1;
    } else {
      echo self::$connection->error;
      return 2;
    }


  }

  //get details of act 
  public function get_act_details($id, $type)
  {
    if ($type == 'ba') {
      $get = $this->query("Select * from bare_acts_names where ba_id = '" . $id . "'");
      if ($get->num_rows > 0) {
        $result = $get->fetch_assoc();
        $result['act_chapters'] = $this->get_chapter_sections($id);
        return $result;
      } else {
        return 1;
      }


    } elseif ($type == 'cl') {
      $get1 = $this->query("SELECT case_laws.*, cl_category.cl_cat_name FROM `case_laws` JOIN `cl_category` on `case_laws`.`cl_cat_id` = `cl_category`.`cl_cat_id` WHERE case_laws.cl_id = '" . $id . "'");
      if ($get1->num_rows > 0) {
        $result = $get1->fetch_assoc();
        return $result;
      } else {
        return 1;
      }
    }

  }

  public function get_chapter_sections($ba_id)
  {
    $get = $this->query("Select * from bare_acts_chapters where ba_id = '" . $ba_id . "'");
    if ($get->num_rows > 0) {
      while ($result = $get->fetch_assoc()) {
        $result['chapter_title'] = $result['chapter_title'];
        $result['chapter_desc'] = $result['chapter_desc'];
        $result['sections'] = $this->get_all_sections($result['ba_chap_id']);
        $new_result[] = $result;
      }
      return $new_result;

    }
  }

  public function get_all_sections($ba_chap_id)
  {
    $get = $this->query("Select * from bare_acts_sections where ba_chap_id = '" . $ba_chap_id . "'");
    if ($get->num_rows > 0) {
      while ($result = $get->fetch_assoc()) {
        $new_result['section_name'] = $result['section_name'];
        $new_result['section_desc'] = $result['section_desc'];
        $new_result['section_comments'] = $result['sec_comments'];
        $new_results[] = $new_result;
      }
      return $new_results;

    }
  }

  //delete item
  public function delete_admin($id)
  {
    $get = $this->query("Select * from admin where id = '" . $id . "'");
    if ($get->num_rows > 0) {
      $result = $get->fetch_assoc();
      if ($result['user_role' == 1]) {
        return 1; //can not delete super admin
      } else {
        //delete 
        $delete = $this->query("DELETE FROM admin where id = '" . $id . "'");
        if ($delete) {
          return 2; //deleted
        } else {
          return 3; //not deleted
        }
      }


    }
  }

   //delete item
   public function project_file_delete($id)
   {
     $get = $this->query("Select project_id from project_requirements where project_id = '" . $id . "'");
     if ($get->num_rows > 0) {
       $result = $get->fetch_assoc();       
         //delete 
        //  $delete = $this->query("DELETE FROM project_requirements where project_id = '" . $id . "'");
         $delete = $this->query("UPDATE project_requirements SET file = null where project_id = '" . $id . "'");

         if ($delete) {
           return 2; //deleted
         } else {
           return 3; //not deleted
         }
     }
     return 1;
   }

  //get credit 
  public function get_credit_intern($id)
  {
    $get = $this->query("Select credit_wallet from students_masterdata where id = '" . $id . "'");
    if ($get->num_rows > 0) {
      $result = $get->fetch_assoc();
      return $result['credit_wallet'];

    } else {
      return 1;
    }
  }

  //topic request 
  public function add_topic_request($stu_id, $requested_topic)
  {
    $get = $this->query("Select * from topic_request where requested_topic = '" . $requested_topic . "' and stu_id = '" . $stu_id . "'");
    if ($get->num_rows > 0) {
      return 1; //already existed

    } else {
      $insert = $this->query("Insert into topic_request set stu_id = '" . $stu_id . "',requested_topic = '" . $requested_topic . "', created_at = now()");
      if ($insert) {
        return 2; //success
      } else {
        return 3; //error
      }
    }
  }

  //topic request 
  public function topic_request_history($stu_id)
  {
    $get = $this->query("Select * from topic_request where stu_id = '" . $stu_id . "'");
    if ($get->num_rows > 0) {
      while ($result = $get->fetch_assoc()) {
        $new_result[] = $result;
      }
      return $new_result;

    } else {
      return 1;
    }

  }

  //verify email
  //topic request 
  public function verify_email_code($email, $code)
  {
    $get = $this->query("Select * from students_masterdata where email = '" . $email . "'");
    if ($get->num_rows > 0) {
      $results = $get->fetch_assoc();
      if ($code == $results['email_activation_code']) {
        $update = $this->query("update students_masterdata set is_email_verified = 1 where email = '" . $email . "'");
        if ($update) {
          return 1; //success
        } else {
          return 2;
        }
      } else {
        return 4;
      }

    } else {
      return 3; //student not found
    }

  }

  //verify email for normal users
  public function verify_email_code_users($email, $code)
  {
    $get = $this->query("Select * from users where users_email = '" . $email . "'");
    if ($get->num_rows > 0) {
      $results = $get->fetch_assoc();
      if ($code == $results['email_activation_code']) {
        $update = $this->query("update users set is_email_verified = 1 where users_email = '" . $email . "'");
        if ($update) {
          return 1; //success
        } else {
          return 2;
        }
      } else {
        return 4;
      }

    } else {
      return 3; //user not found
    }

  }

  //change student role
  public function change_student_role($stu_id, $new_role)
  {


    $get_query = $this->query("select * from students_masterdata where id='" . $stu_id . "'");
    if ($get_query->num_rows > 0) {
      $get_results = $this->query("UPDATE `students_masterdata` SET `intern_type` = '" . $new_role . "' WHERE id = '" . $stu_id . "'");
      if ($get_results) {
        return 1; //success
      } else {
        return 3; //error
      }
    } else {
      return 2; //no student found
    }
  }

  //send sms function
  public function bnw_sms_sender($msg, $mob)
  {
    $resp = array();
    $sender = 'HROGYA';
    $auth = 'D!~1817Etx6EEBccy';
    $curl = curl_init();

    curl_setopt_array(
      $curl,
      array(
        CURLOPT_URL => 'https://api.datagenit.com/sms?auth=' . $auth . '&msisdn=' . $mob . '&senderid=' . $sender . '&message=' . $msg,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
      )
    );

    $response = curl_exec($curl);
    curl_close($curl);

    $resp = json_decode($response);
    return $resp->status;
  }

  //update transaction
  public function update_credit_transaction($stu_id, $type, $amount, $credit_count, $tnx_status)
  {

    $get = $this->query("select * from students_masterdata where id = '" . $stu_id . "'");
    if ($get->num_rows > 0) {
      $fetch = $get->fetch_assoc();
      $wallet = $fetch['credit_wallet'];


      $select = $this->query("INSERT INTO credit_transaction SET customer_id = '" . $stu_id . "', cr_amount = '" . $amount . "', credit_count = '" . $credit_count . "', tnx_type = '" . $type . "', tnx_by = '1', tnx_status = '" . $tnx_status . "', created_at = now()");
      if ($select) {
        if ($type == '1') {
          //credit type

          $new_wallet = $wallet + $credit_count;


        } else {
          //debit type
          $new_wallet = $wallet - $credit_count;
        }


        if ($tnx_status == 2) {
          return 5;
        } else {
          //update wallet 

          $update = $this->query("UPDATE students_masterdata SET credit_wallet = '" . $new_wallet . "' where id = '" . $stu_id . "'");
          if ($update) {
            return 1; //success 
          } else {
            return 2; //error 
          }
        }
      } else {
        return 4; //credit transaction not updated
      }


    } else {
      //student does not exist.  
      return 3; //student does not exist
    }





  }

  //set student mentor
  public function set_student_mentor($stu_id, $mentor_id)
  {
    $get_query = $this->query("select * from students_masterdata where id='" . $stu_id . "'");
    if ($get_query->num_rows > 0) {
      $get_results = $this->query("UPDATE `students_masterdata` SET `mentor_id` = '" . $mentor_id . "' WHERE id = '" . $stu_id . "'");
      if ($get_results) {
        return 1; //success
      } else {
        return 3; //error
      }
    } else {
      return 2; //no student found
    }
  }

  //search filters 
  public function search_by_filters($terms)
  {
    $get_query = $this->query("select * from students_masterdata where id='" . $stu_id . "'");
    if ($get_query->num_rows > 0) {
      $get_results = $this->query("UPDATE `students_masterdata` SET `mentor_id` = '" . $mentor_id . "' WHERE id = '" . $stu_id . "'");
      if ($get_results) {
        return 1; //success
      } else {
        return 3; //error
      }
    } else {
      return 2; //no student found
    }
  }

  //sooprs code from here
  public function get_sooprs_services($term)
  {
    if ($term != '') {
      $get_query = $this->query("Select * from sr_services_new where service_name LIKE '%" . $term . "%' and status = 1 ");
    } else {
      $get_query = $this->query("Select * from sr_services_new where status = 1");
    }
    if ($get_query->num_rows > 0) {
      while ($get_row = $get_query->fetch_assoc()) {
        $results[] = $get_row;
      }

      return $results;


    } else {
      return 2; //no record
    }

  }

  public function sr_services_new_cat()
  {
    $sr_main_cats = $this->query("select id,service_name,service_slug,cat_id,status from sr_services_new where cat_id=0 and status=1");
    if($sr_main_cats->num_rows > 0){
      $results = [];
      while($sr_main_cats_assoc = $sr_main_cats->fetch_assoc()){
        $childArray = [];

        $sr_child_servs = $this->query("select id,service_name,service_slug,cat_id,status from sr_services_new where cat_id='".$sr_main_cats_assoc['id']."' and status=1");
        if($sr_child_servs->num_rows > 0){
            while($sr_child_servs_assoc = $sr_child_servs->fetch_assoc()){
              $childArray[] = $sr_child_servs_assoc;
            }
        }
        $sr_main_cats_assoc['child_services'] = $childArray;
        $results[] = $sr_main_cats_assoc;
      }      
      return $results;
    }else{
      return 2;
    }
  }


  public function sr_services_new_main_category()
  {
    $sr_main_cats = $this->query("select id,service_name,service_slug,cat_id,status from sr_services_new where cat_id=0 and status=1");
    if($sr_main_cats->num_rows > 0){
      $results = [];
      while($sr_main_cats_assoc = $sr_main_cats->fetch_assoc()){
        // $childArray = [];

        // $sr_child_servs = $this->query("select id,service_name,service_slug,cat_id,status from sr_services_new where cat_id='".$sr_main_cats_assoc['id']."' and status=1");
        // if($sr_child_servs->num_rows > 0){
        //     while($sr_child_servs_assoc = $sr_child_servs->fetch_assoc()){
        //       $childArray[] = $sr_child_servs_assoc;
        //     }
        // }
        // $sr_main_cats_assoc['child_services'] = $childArray;
        $results[] = $sr_main_cats_assoc;
      }      
      return $results;
    }else{
      return 2;
    }
  }

  public function sr_services_new_sub_category($main_cat_id)
  {   
      $results = [];
      $sr_child_servs = $this->query("select id,service_name,service_slug,cat_id,status from sr_services_new where cat_id=$main_cat_id and status=1");
      if($sr_child_servs->num_rows > 0){
          while($sr_child_servs_assoc = $sr_child_servs->fetch_assoc()){
            $results[] = $sr_child_servs_assoc;
          }
      }
      
      return $results;
   
  }

  //sr questions
  public function sr_questions($question, $service)
  {
    $get_query = $this->query("Select * from sr_questions where service_id = '" . $service . "' and question = '" . $question . "' ");

    if ($get_query->num_rows > 0) {
      while ($get_row = $get_query->fetch_assoc()) {
        $results[] = $get_row;
      }

      return $results;


    } else {
      return 2; //no record
    }
  }

  //load other questions
  public function sr_other_questions($question)
  {
    $get_query = $this->query("Select * from sr_questions where ques_id = '" . $question . "' ");

    if ($get_query->num_rows > 0) {
      $get_row = $get_query->fetch_assoc();
      $get_rows['question_text'] = $get_row['question_title'];
      $get_rows['ques_id'] = $get_row['ques_id'];
      $get_rows['answers'] = $this->load_answers($question);


      return $get_rows;


    } else {
      return 2; //no record
    }
  }


  // Get all services from db
  public function sr_services_all()
  {
    $get_query = $this->query("Select * from sr_services_new where status = 1");

    if ($get_query->num_rows > 0) {
      while ($get_row = $get_query->fetch_assoc()) {
        $results[] = $get_row;
      }

      return $results;


    } else {
      return 2; //no record
    }
  }

  // skill sfrom here 
  public function sp_skills_all()
  {
    $get_query = $this->query("Select * from sp_skills");

    if ($get_query->num_rows > 0) {
      while ($get_row = $get_query->fetch_assoc()) {
        $results[] = $get_row;
      }

      return $results;


    } else {
      return 2; //no record
    }
  }




  //get first pqge
  public function sr_servicesFirst($service)
  {
    $get_query = $this->query("Select * from sr_questions where service_id = '" . $service . "' and is_first_question = '1' ");

    if ($get_query->num_rows > 0) {
      $get_row = $get_query->fetch_assoc();
      $get_rows['question_text'] = $get_row['question_title'];
      $get_rows['ques_id'] = $get_row['ques_id'];
      $get_rows['answers'] = $this->load_answers($get_row['ques_id']);


      return $get_rows;


    } else {
      return 2; //no record
    }
  }

  // get service name for email 
  public function get__service_name($category){
    $get_query = $this->query("select * from sr_services_new where id = '".$category."'");
    if($get_query->num_rows > 0){
      $get_row = $get_query->fetch_assoc();
      return $get_row;
    }else{
      return 1;
    }
  }

  //load answers of the question id
  public function load_answers($question)
  {
    $get_query = $this->query("Select * from sr_answers where ques_id = '" . $question . "'");

    if ($get_query->num_rows > 0) {
      while ($get_row = $get_query->fetch_assoc()) {
        $results[] = $get_row;
      }

      return $results;


    } else {
      return 2; //no record
    }
  }




  public function newMail($name, $email, $mobile)
  {
    $mail = new PHPMailer();



    //smtp settings

    $mail->isSMTP();

    $mail->Host = "smtp.gmail.com";

    $mail->SMTPAuth = true;

    $mail->Username = "smsunnythefunny@gmail.com";

    $mail->Password = 'uwtshdogkishgcvv';

    $mail->Port = 465;

    $mail->SMTPSecure = "ssl";



    //email settings

    $mail->isHTML(true);

    $mail->setFrom("noreply@gmail.com", "No reply");

    $mail->addAddress($email, $name);

    $mail->Subject = ("Sooprs query");

    $mail->msgHTML("Hello, I am interested in your services.<br> My name: " . $name . ".<br> My email: " . $email . " .<br> ");



  }




  //save enquiery
  public function save_enquiry($name, $email, $mobile,$city,$category, $client_remark,  $enq_array)
  {
    

    if ($name !== '' || $email !== '' || $mobile !== '') {
      $get_cust_id = $this->getCustomer($name, $email, $mobile, $city);

      //insert the rows
      $get_results = $this->query("INSERT INTO `lead` SET `customer_id` = '" . $get_cust_id . "', `name` = '" . $name . "', `email` = '" . $email . "', `mobile` ='" . $mobile . "', city = '" . $city . "', deadline = '', max_budget_amount = '', category = '" . $category . "', client_remarks = '" . $client_remark . "', created_at = now()");
      if ($get_results) {
        //save questions


        $new_lead = self::$connection->insert_id;

        //save the question and answer
        $save_questions = $this->customer_enquiry($get_cust_id, $category, $enq_array, $new_lead);

        if ($save_questions) {
          return 3;
        } else {
          return 1;
        }
      } else {
        return 2;
      }

    }

  }


  public function generate_random_string_with_datetime($length = 5) {
      // Define characters to use
      $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
      // Get the total length of characters
      $characters_length = strlen($characters);
      // Initialize the random string
      $random_string = '';
      // Generate random characters
      for ($i = 0; $i < $length; $i++) {
          // Get a random index from characters string
          $random_index = mt_rand(0, $characters_length - 1);
          // Append the character at the random index to the random string
          $random_string .= $characters[$random_index];
      }
      // Add current date and time in between the random string
      $random_string = substr_replace($random_string, date('His'), mt_rand(0, $length - 3), 0);

      if($this->leadUUIDxists($random_string)){
        return $this->generate_random_string_with_datetime($length);
      }
      return $random_string;
  }

  public function leadUUIDxists($random_string) {
      $result = $this->query("SELECT COUNT(*) as count FROM lead WHERE lead_uuid='$random_string'");
      $row = $result->fetch_assoc();
      return $row['count'] > 0;
  }

  public function gig_uuid($length = 5) {
    // Define characters to use
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
    // Get the total length of characters
    $characters_length = strlen($characters);
    // Initialize the random string
    $random_string = '';
    // Generate random characters
    for ($i = 0; $i < $length; $i++) {
        // Get a random index from characters string
        $random_index = mt_rand(0, $characters_length - 1);
        // Append the character at the random index to the random string
        $random_string .= $characters[$random_index];
    }
    // Add current date and time in between the random string
    $random_string = substr_replace($random_string, date('His'), mt_rand(0, $length - 3), 0);

    if($this->gig_uuid_exists($random_string)){
      return $this->gig_uuid($length);
    }
    return $random_string;
}

public function gig_uuid_exists($random_string) {
    $result = $this->query("SELECT COUNT(*) as count FROM professional_gigs WHERE gig_unique_id='$random_string'");
    $row = $result->fetch_assoc();
    return $row['count'] > 0;
}
  
  //save project
  public function save_project($email, $mobile,$subject,$description,$min_budget_amount, $max_budget_amount,$category,$country)
  {
    

    if ($category !== '' || $email !== '' || $mobile !== '' || $min_budget_amount !=='' || $subject !== '') {

      if($min_budget_amount > $max_budget_amount){
        return 3;
      }
      $get_cust = $this->getCustomerForProject( $email, $mobile);
      // return $get_cust;
      $desc = addslashes($description);
      $paragraphWithHiddenInfo = $this->hideSensitiveInfo($desc);
      $subjectWithHiddenInfo = $this->hideSensitiveInfo($subject);


      $lead_uuid = $this->generate_random_string_with_datetime();
      // return($lead_uuid);



      if($get_cust[0] == 'old'){
          $get_cust_id = $get_cust[1];
        //insert the rows
        $get_results = $this->query("INSERT INTO `lead` SET `customer_id` = '" .$get_cust_id. "', `email` = '".$email. "', `mobile` ='" .$mobile. "', `description` ='" . $paragraphWithHiddenInfo. "', city = '', `deadline` = '', `category` = '" . $category . "', `project_title` = '".$subjectWithHiddenInfo."',`lead_uuid` = '".$lead_uuid."', `min_budget` = '".$min_budget_amount."', `max_budget_amount` = '" . $max_budget_amount . "', `created_at` = now()");
        if ($get_results) {

          //save questions
          $new_lead = self::$connection->insert_id;
          //save the question and answer
          // $save_questions = $this->customer_enquiry($get_cust_id, $category,$new_lead);
          // return "inserted into lead table";
          // $relatedProfessionals = $this->query("SELECT * FROM `join_professionals` WHERE `services` LIKE '%,'".$category."',%' OR `services` LIKE ''".$category."',%' OR `services` LIKE '%,'".$category."'';");
          

          if ($new_lead) {
            $professionals = array();
            $sqlProf = $this->query("SELECT email FROM `join_professionals` WHERE FIND_IN_SET('".$category."', `services`) > 0");
            while($profRow = $sqlProf->fetch_assoc()){
              $professionals[] = $profRow['email'];
            }

            $template_path = '../../email-templates/list-of-matching-projects.html';
            $template = file_get_contents($template_path);

            $title = $subjectWithHiddenInfo;
            $description = $paragraphWithHiddenInfo;
            if((strlen($paragraphWithHiddenInfo > 250))){
              $cutDesc = substr($paragraphWithHiddenInfo,0,250);
              $description = $cutDesc; 
            }
            $minBudget = $min_budget_amount;
            $maxBudget = $max_budget_amount;
            $link = "https://sooprs.com//browse-job";
            $body = '';
            $body .= "<tr>";
            $body .= "<td width=\"16\"></td>";
            $body .= "<td align=\"left\" height=\"86\" style=\"padding:16px 0\" valign=\"top\" width=\"440\">";
            $body .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tbody>";
            $body .= "<tr><td><a href=\"$link\"><span style=\"color:#007fed;font-weight:bold\">$title</span></a></td></tr>";
            $body .= "<tr><td height=\"4\"> </td></tr>";
            $body .= "<tr><td><span style=\"color:#000000;font-family:Helvetica,Arial,sans-serif;font-size:12px;font-weight:normal;line-height:1.5\">$description</span></td></tr>";
            $body .= "<tr><td height=\"4\"></td></tr>";
            $body .= "</tbody></table></td>";
            $body .= "<td width=\"16\"></td>";
            $body .= "<td align=\"left\" style=\"padding:16px 0\" valign=\"top\" width=\"130\">";
            $body .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><tbody>";
            $body .= "<tr><td><span style=\"color:#000000;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:bold;line-height:1.5\"> $ $minBudget - $maxBudget </span></td></tr>";
            $body .= "<tr><td height=\"4\"></td></tr>";
            $body .= "<tr><td align=\"left\" style=\"white-space:nowrap\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><tbody>";
            $body .= "<tr><td align=\"center\" bgcolor=\"#006AFF\"><a href=\"$link\" style=\"border:1px solid #006AFF;display:inline-block;padding:5px 10px;text-decoration:none\"><span style=\"color:#ffffff;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:1.5\">Bid now</span></a></td></tr>";
            $body .= "</tbody></table></td></tr></tbody></table></td>";
            $body .= "<td width=\"16\"></td></tr><tr><td bgcolor=\"#cccccc\" colspan=\"5\" height=\"1\" style=\"margin:0;padding:0;font-size:0;line-height:0\"></td></tr>";
            
            $template = str_replace('{projectRecords}', $body, $template);
            $professionalEmails = $professionals;
            $bcc = $professionalEmails;
            $from = 'contact@sooprs.com';
            $subject = 'A new project just listed on Sooprs';
            $title = 'Matching Project';
            $body = $template;
            require_once('../../send_email.php');
            $send_pass_email = send_email($to, $body, $from, $subject,$bcc);
            return 6; // with login
          } else {
            return 1;
          }
        } else {
          return 2;
        }
      }
      if($get_cust[0] == 'new'){
        
        $get_cust_id = $get_cust[1];          
        //insert the rows
        // $get_results = $this->query("INSERT INTO lead SET customer_id = '" . $get_cust_id . "', email = '', mobile ='', description ='" . $description . "', city = '', deadline = '', category = '" . $category . "',project_title = '".$subject."', min_budget = '".$min_budget_amount."', max_budget_amount = '" . $max_budget_amount . "', created_at = now()");
        $get_results = $this->query("INSERT INTO `lead`( `customer_id`,`email`, `mobile`, `description`, `city`,`deadline`,`category`,`project_title`,`lead_uuid`,`min_budget`,`max_budget_amount`,`created_at`) VALUES ( '$get_cust_id','','', '$paragraphWithHiddenInfo','','', '$category','$subjectWithHiddenInfo','$lead_uuid' ,'$min_budget_amount', '$max_budget_amount',now())");
       
        if ($get_results) {
          //save questions
          $new_lead = self::$connection->insert_id;
          //save the question and answer
          // $save_questions = $this->customer_enquiry($get_cust_id, $category,$new_lead);
          // return "inserted into lead table";

          if ($new_lead) {
              // $otp = mt_rand(1000,9999);
              //send email for new customer 
              // $this->query("INSERT INTO `email_otps`(`email`, `otp`, `created_at`) VALUES ('" . $email . "','" . $otp. "', now())");
              $professionals = array();
              $sqlProf = $this->query("SELECT email FROM `join_professionals` WHERE FIND_IN_SET('".$category."', `services`) > 0");
              while($profRow = $sqlProf->fetch_assoc()){
                $professionals[] = $profRow;
              }

              $template_path = '../../email-templates/list-of-matching-projects.html';
              $template = file_get_contents($template_path);

              $title = $subjectWithHiddenInfo;
              $description = $paragraphWithHiddenInfo;
              if((strlen($paragraphWithHiddenInfo > 250))){
                $cutDesc = substr($paragraphWithHiddenInfo,0,250);
                $description = $cutDesc; 
              }
              $minBudget = $min_budget_amount;
              $maxBudget = $max_budget_amount;
              $link = "https://sooprs.com//browse-job";
              $body = '';
              $body .= "<tr>";
              $body .= "<td width=\"16\"></td>";
              $body .= "<td align=\"left\" height=\"86\" style=\"padding:16px 0\" valign=\"top\" width=\"440\">";
              $body .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tbody>";
              $body .= "<tr><td><a href=\"$link\"><span style=\"color:#007fed;font-weight:bold\">$title</span></a></td></tr>";
              $body .= "<tr><td height=\"4\"> </td></tr>";
              $body .= "<tr><td><span style=\"color:#000000;font-family:Helvetica,Arial,sans-serif;font-size:12px;font-weight:normal;line-height:1.5\">$description</span></td></tr>";
              $body .= "<tr><td height=\"4\"></td></tr>";
              $body .= "</tbody></table></td>";
              $body .= "<td width=\"16\"></td>";
              $body .= "<td align=\"left\" style=\"padding:16px 0\" valign=\"top\" width=\"130\">";
              $body .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><tbody>";
              $body .= "<tr><td><span style=\"color:#000000;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:bold;line-height:1.5\"> $ $minBudget - $maxBudget </span></td></tr>";
              $body .= "<tr><td height=\"4\"></td></tr>";
              $body .= "<tr><td align=\"left\" style=\"white-space:nowrap\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><tbody>";
              $body .= "<tr><td align=\"center\" bgcolor=\"#006AFF\"><a href=\"$link\" style=\"border:1px solid #006AFF;display:inline-block;padding:5px 10px;text-decoration:none\"><span style=\"color:#ffffff;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:1.5\">Bid now</span></a></td></tr>";
              $body .= "</tbody></table></td></tr></tbody></table></td>";
              $body .= "<td width=\"16\"></td></tr><tr><td bgcolor=\"#cccccc\" colspan=\"5\" height=\"1\" style=\"margin:0;padding:0;font-size:0;line-height:0\"></td></tr>";
              
              $template = str_replace('{projectRecords}', $body, $template);
              $professionalEmails = $professionals;
              $bcc = $professionalEmails;
              $from = 'contact@sooprs.com';
              $subject = 'A new project just listed on Sooprs';
              $title = 'Matching Project';
              $body = $template;
              require_once('../../send_email.php');
              $send_pass_email = send_email($to, $body, $from, $subject,$bcc);
              
            if($this->send_signup_email_users($email, $get_cust[2],$get_cust[3])){
              
                return $email; //save project with email sent
            }else {
                return 5;//saved project without email sent
            }
          } else {
            return 1;
          }
        } else {
          return 2;
        }
      }
      

    }else{
      return 8;
    }

  }

  public function hideSensitiveInfo($paragraph) {
    // Hide 10-digit phone numbers
    $paragraph = preg_replace('/\b(\d{8,})\b/', '**********', $paragraph);

    // Hide email addresses
    $paragraph = preg_replace('/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Z|a-z]{2,}\b/', '********', $paragraph);

    return $paragraph;
}



  // public function send_sooprs_mail(){

  // }

  //get customers
  public function getCustomer($name, $email, $mobile, $city)
  {
    $get_query = $this->query("Select * from join_professionals where email = '" . $email . "' or mobile = '" . $mobile . "'");
    if ($get_query->num_rows > 0) {
      $get_row = $get_query->fetch_assoc();
      return $get_row['id'];
    } else {
      //insert customer
      if($name == '' || $name == null){
        $name = "Customer".date("Ymdhis");
      }
      $set_query = $this->query("INSERT INTO customer set name = '" . $name . "', email = '" . $email . "', mobile = '" . $mobile . "', city = '" . $city . "'");
      if ($set_query) {
        $last_insert = self::$connection->insert_id;
        return $last_insert;
      }
    }

  }

  // get customer for post a project 
  public function getCustomerForProject($email, $mobile)
  {
      $resp[0] = 'old';
      // return $email;
    $get_query = $this->query("Select * from join_professionals where is_buyer = 1 and email = '" . $email . "' or mobile = '" . $mobile . "'");
    if ($get_query->num_rows > 0) {
      $get_row = $get_query->fetch_assoc();
      // print_r( $get_row['id']);
      $resp[1] = $get_row['id'];
      return $resp;
    } else {
      //insert customer
      $email_otp = mt_rand(1000, 9999);
      $this->query("INSERT INTO `email_otps`(`email`, `otp`, `created_at`) VALUES ('" . $email . "','" . $email_otp. "', now())");
      $pass_in_mail = $this->generateRandomPassword();

      $new_passhash_mail = password_hash($pass_in_mail, PASSWORD_DEFAULT);
      $trialName = "Cust".date("YmdHis");
      $slug = $this->generateUniqueSlug($trialName, $this);
      $set_query = $this->query("INSERT INTO join_professionals set name = '".$trialName."',is_buyer = 1, email = '" . $email . "', password = '" . $new_passhash_mail . "', mobile = '" . $mobile . "'");
      if ($set_query) {
        $last_insert = self::$connection->insert_id;
        $resp[0] = 'new';
        $resp[1] = $last_insert;
        $resp[2] = $email_otp;
        $resp[3] = $pass_in_mail;


        // return $last_insert;
        //send email send_signup_email_users($email, $otp);
        return $resp;
      }
    }

  }

  //customer enquiry
  public function customer_enquiry($cust_id, $service_id, $client_enquiry, $lead_id)
  {
    if (is_array($client_enquiry)) {
      // print_r($client_enquiry);
      foreach ($client_enquiry as $key => $enquiry) {
        if (!empty($enquiry)) {
          $ques_txt = $this->get_question($key);
          $answer_txt = $this->get_answer($enquiry);
          $this->query("INSERT INTO customer_query set lead_id = '" . $lead_id . "', customer_id = '" . $cust_id . "', service_id = '" . $service_id . "', question = '" . $ques_txt . "', answer = '" . $answer_txt . "'");

        }
      }
      return true;
    } else {
      return 1;
    }
  }


    // customer enquiry questions for mail 
    public function customer_enquiry_questions($enq_array)
  {
    if (is_array($enq_array)) {
      // print_r($client_enquiry);
      $enq__q__ans = array();
      foreach ($enq_array as $key => $enquiry) {
        if (!empty($enquiry)) {
          $ques_txt = $this->get_question($key);
          $answer_txt = $this->get_answer($enquiry);          
          $enq__q__ans['question'] = $ques_txt;
          $enq__q__ans['answer'] = $answer_txt;
        }
      }
      return $enq__q__ans;

    } else {
      return 1;
    }
  }



  //get answer
  public function get_question($ques_id)
  {
    if (!empty($ques_id)) {
      $get_query = $this->query("Select * from sr_questions where ques_id = '" . $ques_id . "'");
      if ($get_query->num_rows > 0) {
        $get_row = $get_query->fetch_assoc();
        return $get_row['question_title'];
      }
    } else {
      return 0;
    }
  }

  //get answer text
  public function get_answer($ans_id)
  {
    if (!empty($ans_id)) {
      $get_query = $this->query("Select * from sr_answers where answer_id = '" . $ans_id . "'");
      if ($get_query->num_rows > 0) {
        $get_row = $get_query->fetch_assoc();
        return $get_row['answer_text'];
      }
    } else {
      return 0;
    }
  }


  // all professionals from here//

  public function get_professionals($offset, $limit)
  {
    if (!empty($offset) || !empty($limit)) {
      // $get_query = $this->query("SELECT * FROM `join_professionals` WHERE `is_buyer` = 0 AND `is_verified` = 1 ORDER BY RAND() LIMIT ".$offset.",".$limit);
      $get_query = $this->query("SELECT id,name,slug,services,skills,listing_about,image FROM `join_professionals` WHERE `is_buyer` = 0 AND `is_verified` = 1 LIMIT ".$offset.",".$limit);

      if ($get_query->num_rows > 0) {
        $results = [];
        while ($get_row = $get_query->fetch_assoc()) {
          // $string = null;
          // $string_cut = null;
          // Listing about 
          // if($get_row["listing_about"] != null){
          //   $string = strip_tags($get_row["listing_about"]);
          //   $length = strlen($string);
          //   $string_cut = substr($string, 0, 100);
          // }
          // Listing about 
          
          $services_name_array = $this->getServicesData($get_row["services"]);
          $skills_name_array = $this->getSkillsData($get_row["skills"]);
          $avgrating = $this->getAverageRating($get_row['id']);
          
          // services 
          // $servicesString = $get_row["services"];
          // $services_name_array = [];
          // if($servicesString != null){
          //   $servicesArray = explode(',', $servicesString);
          //   // $servicesArray = count($servicesArray) > 1 ? $servicesArray : [$servicesString];
          //   foreach($servicesArray as $oneService){
          //     $get_service = $this->query("SELECT * FROM `sr_services`  where `id` =".$oneService);
          //     if ($get_service->num_rows > 0) {
          //       $get_service_row = $get_service->fetch_assoc();
          //       $services_name_array[] = $get_service_row['service_name'];
          //     } else {
          //       $services_name_array[] = "No service";
          //     }
          //   }
          // }
          // services 
          // =========== skills ==========
          // $skillsString = $get_row["skills"];
          // if($skillsString){
          //   $skillsArray = explode(',', $skillsString);        
          //   $skills_name_array = array();
          //   foreach($skillsArray as $oneSkill){
          //     $get_skill = $this->query("SELECT * FROM sp_skills  where skill_id =" . $oneSkill . "");
          //     if ($get_skill->num_rows > 0) {
          //       $get_skill_row = $get_skill->fetch_assoc();
          //       $skills_name_array[] = $get_skill_row['skill_name'];
          //     } else {
          //       $skills_name_array[] = "No skill";
          //     }
          //   }
          // }
          // =========== skills ==========
          // $get_row['skills']  = $skills_name_array;

          // Ratings 
          // $result2 =$this->query("SELECT professional_reviews.*,join_professionals.image FROM professional_reviews JOIN join_professionals ON professional_reviews.professional_id = join_professionals.id  WHERE professional_reviews.professional_id = '".$get_row['id']."'");
          // if($result2){
          //     // $row2 = mysqli_fetch_assoc($result2);  
          //     if ($result2->num_rows > 0) {

          //         $reviewdata = [];
          //         $ratingCounts = array(
          //             5 => 0,
          //             4 => 0,
          //             3 => 0,
          //             2 => 0,
          //             1 => 0,
          //         );
          //         $totalRatings = 0;
          //         while ($row2 = mysqli_fetch_assoc($result2)) {
          //             $starsRating = $row2['rating'];
          //             $ratingCounts[$starsRating]++;
          //             $totalRatings += $starsRating;

          //             $reviewdata[] = $row2;        

          //         }


          //         $avgrating = number_format(round(($totalRatings/mysqli_num_rows($result2)),1),1);
          //     } 
          // }



          $results[] = [
            'data' => $get_row,
            'length' => strlen(strip_tags($get_row["listing_about"])),
            'string_cut' => substr(strip_tags($get_row["listing_about"]), 0, 150),
            'services' => $services_name_array,
            'skills' => $skills_name_array,
            'avgrating' => $avgrating,
          ];

          // $results[] = [$get_row, $length, $string_cut, $services_name_array,$avgrating];
        }
        return $results;
      } else {
        return 2; //no record
      }
    } else {
      return 0;
    }
  }

//get service id from page id
public function get_service_id($page_slug){
    //  $get_query = $this->query("SELECT service_id FROM `sr_pages` WHERE slug = '".$page_slug."'");
    //  if($get_query->num_rows > 0){
    //      $get_results = $get_query->fetch_assoc();
    //      return $get_results['service_id'];
    //  }
    //  else {
    //      return false;
    //  }

     $get_query = $this->query("SELECT id FROM `sr_services_new` WHERE service_slug = '".$page_slug."'");
     if($get_query->num_rows > 0){
         $get_results = $get_query->fetch_assoc();
         return $get_results['id'];
     }
     else {
         return false;
     }
     
}

//get professionals by ajax part 2 api by vinay

  public function get_professionals2($offset, $limit,$cat)
  {
    if (!empty($offset) || !empty($limit)) {
        $get_service_id = $this->get_service_id($cat);
       
       
        if($get_service_id == false){
            return 3;
        }
        else {
          
           
      $get_query = $this->query("SELECT id,name,slug,services,skills,listing_about,image FROM `join_professionals` WHERE `is_buyer` = 0 AND `is_verified` = 1 and `services` LIKE '%".$get_service_id."%' LIMIT ".$offset.",".$limit);

      if ($get_query->num_rows > 0) {
        $results = [];
        while ($get_row = $get_query->fetch_assoc()) {
          
          
          $services_name_array = $this->getServicesData($get_row["services"]);
          $skills_name_array = $this->getSkillsData($get_row["skills"]);
          $avgrating = $this->getAverageRating($get_row['id']);
         
          $results[] = [
            'data' => $get_row,
            'length' => strlen(strip_tags($get_row["listing_about"])),
            'string_cut' => substr(strip_tags($get_row["listing_about"]), 0, 150),
            'services' => $services_name_array,
            'skills' => $skills_name_array,
            'avgrating' => $avgrating,
          ];

          // $results[] = [$get_row, $length, $string_cut, $services_name_array,$avgrating];
        }
        return $results;
      } else {
        return 2; //no record
      }
    }
    } else {
      return 0;
    }
  }
  // Professional services 
  private function getServicesData($servicesString)
{
    $services_name_array = [];

    if ($servicesString != null) {
        $servicesArray = explode(',', $servicesString);

        foreach ($servicesArray as $oneService) {
            $serviceData = $this->getServiceDataById($oneService);
            $services_name_array[] = $serviceData ? $serviceData['service_name'] : "No service";
        }
    }

    return $services_name_array;
}

private function getSkillsData($skillsString)
{
    $skills_name_array = [];

    if ($skillsString) {
        $skillsArray = explode(',', $skillsString);

        foreach ($skillsArray as $oneSkill) {
            $skillData = $this->getSkillDataById($oneSkill);
            $skills_name_array[] = $skillData ? $skillData['skill_name'] : "No skill";
        }
    }

    return $skills_name_array;
}

private function getAverageRating($professionalId)
{
    $result = $this->query("SELECT rating FROM professional_reviews WHERE professional_id = '" . $professionalId . "'");

    if ($result && $result->num_rows > 0) {
        $totalRatings = 0;

        while ($row = $result->fetch_assoc()) {
            $totalRatings += $row['rating'];
        }

        return number_format(round(($totalRatings / $result->num_rows), 1), 1);
    }

    return 0;
}

private function getServiceDataById($serviceId)
{
    $result = $this->query("SELECT * FROM `sr_services_new` WHERE `id` =" . $serviceId);
    return $result && $result->num_rows > 0 ? $result->fetch_assoc() : null;
}

private function getSkillDataById($skillId)
{
    $result = $this->query("SELECT * FROM `sp_skills` WHERE `skill_id` =" . $skillId);
    return $result && $result->num_rows > 0 ? $result->fetch_assoc() : null;
}

































  public function get_rating($id)
  {
    $get_query = $this->query("SELECT * FROM professional_reviews WHERE professional_id =  " . $id . "");
    if ($get_query->num_rows > 0) {
      while ($get_row = $get_query->fetch_assoc()) {


        $results[] = $get_row['rating'];
      }
      return $results;
    } else {
      return 2; //no record
    }
  }

  // all top rated professionals 

  public function get_top_rated_professionals($offset, $limit)
  {
    if (!empty($offset) || !empty($limit)) {
      $get_query = $this->query("SELECT * FROM join_professionals LIMIT " . $offset . "," . $limit . "");
      if ($get_query->num_rows > 0) {
        while ($get_row = $get_query->fetch_assoc()) {
          
          $pr_rating = $this->get_rating($get_row['id']);
          $get_row['pr_rating'] = $pr_rating;

          if (is_array($get_row['pr_rating'])) {
            $count = count($get_row['pr_rating']);

            // Convert string values to integers
            for ($i = 0; $i < $count; $i++) {
              $get_row['pr_rating'][$i] = (int) $get_row['pr_rating'][$i];
            }

            $sum = array_sum($get_row['pr_rating']);
            $average = $sum / $count;
            $get_row['average_rating'] = $average;
          } else {
            $get_row['average_rating'] = 0;
          }

          $results[] = $get_row;
        }
        return $results;
      } else {
        return 2; //no record
      }
    } else {
      return 0;
    }
  }


  // all leads from here//

  public function get_leads()
  {
    
    // if (!empty($offset) || !empty($limit)) {
      
        $get_query = $this->query("SELECT customer_id, name, email, mobile, city, max_budget_amount, sr_services_new.service_name, sr_services_new.id, description FROM lead JOIN sr_services_new ON lead.category = sr_services_new.id ORDER BY id DESC");
        if ($get_query->num_rows > 0) {
            while ($get_row = $get_query->fetch_assoc()) {
                // $get_service = $this->query("SELECT lead.category, sr_services.service_name 
                //     FROM lead 
                //     JOIN sr_services ON lead.category = sr_services.id 
                //     WHERE lead.category = {$get_row['category']} 
                //     ORDER BY lead.id DESC LIMIT 1"); // Added LIMIT 1 here

                // if ($get_service->num_rows > 0) {
                //     $get_service_row = $get_service->fetch_assoc();
                //     $service_name = $get_service_row['service_name'];
                // } else {
                //     $service_name = "No service";
                // }

                // $que_ans = $this->get_que_ans($get_row['id']);
                // $get_row['que_ans'] = $que_ans;

                $results[] = $get_row;
            }

            return $results;
        } else {
            return 2; //no record
        }

    // } else {
    //   return 0;
    // }
  }



  public function get_all_leads($offset, $limit)
  {    
      
        $get_query = $this->query("SELECT lead.id, customer_id, name, city,project_title,lead_uuid, min_budget, max_budget_amount, sr_services_new.service_name,  sr_services_new.id as service_id, description,lead.created_at FROM lead JOIN sr_services_new ON lead.category = sr_services_new.id ORDER BY id DESC LIMIT ".$offset.",".$limit);
        if ($get_query->num_rows > 0) {
          $resultsCount = 0;
            while ($get_row = $get_query->fetch_assoc()) {

              $resultsCount += 1;

              // $check_lead_customer = $this->query("SELECT id FROM join_professionals WHERE id = ".$get_row['customer_id']);
              // if ($check_lead_customer->num_rows > 0) {

                $get_num_my_leads = $this->query("SELECT * FROM my_leads WHERE lead_id = ".$get_row['id']);
                $number_of_bids = $get_num_my_leads->fetch_all(MYSQLI_ASSOC);
                $num_rows = count($number_of_bids);
                // Add the count to the $get_row array
                $get_row['num_leads'] = $num_rows;
  
                $date1 = new DateTime($get_row['created_at']);            
                $current_date = new DateTime();           
                $date_diff = $current_date->diff($date1);
                $get_row['days'] = $date_diff; 

                $enwdate = new DateTime($get_row['created_at']);
                $formatDate = $enwdate->format("d M Y");
                $get_row['createdDate'] = $formatDate; 
  
                if((strlen($get_row['description'] > 250))){
                  $cutDesc = substr($get_row['description'],0,250);
                  $get_row['description'] = $cutDesc;          
                  $get_row['descCut'] = true;          
  
                }
  
                $results[] = $get_row;

              // }
              
            }

            return $results;
        } else {
            return 2; //no record
        }

    
  }


  public function get_leads_count()
  {
  
        

        $get_query = $this->query("SELECT * FROM lead");
        if ($get_query->num_rows > 0) {
          $results = 0;
          
            while ($get_row = $get_query->fetch_assoc()) {
              // $get_num_my_leads = $this->query("SELECT * FROM my_leads WHERE lead_id = ".$get_row['lead_id']);
              // $number_of_bids = $get_num_my_leads->fetch_all(MYSQLI_ASSOC);
              // $num_rows = count($number_of_bids);
              // $get_row['num_leads'] = $num_rows;
              $results += 1;
            }

            return $results;
        } else {
            return 2; //no record
        }
     
    
  }


  public function get_professionals_count()
  {
  
        

        $get_query = $this->query("SELECT * FROM join_professionals WHERE is_buyer = 0 AND is_verified = 1");
        if ($get_query->num_rows > 0) {
          $results = 0;
          
            while ($get_row = $get_query->fetch_assoc()) {
              // $get_num_my_leads = $this->query("SELECT * FROM my_leads WHERE lead_id = ".$get_row['lead_id']);
              // $number_of_bids = $get_num_my_leads->fetch_all(MYSQLI_ASSOC);
              // $num_rows = count($number_of_bids);
              // $get_row['num_leads'] = $num_rows;
              $results += 1;
            }

            return $results;
        } else {
            return 2; //no record
        }
     
    
  }

  // get bell jobs 
  public function get_bell_jobs()
  {
    
    // if(isset($_SESSION['id'])){
      // return $_SESSION['id'];
      if($_SESSION['type'] == 'customer'){
        

        $get_query = $this->query("SELECT * FROM lead WHERE customer_id = 387");
        if ($get_query->num_rows > 0) {
          $results = [];
          $get_row = $get_query->fetch_assoc();
            while ($get_row) {
              // $get_num_my_leads = $this->query("SELECT * FROM my_leads WHERE lead_id = ".$get_row['lead_id']);
              // $number_of_bids = $get_num_my_leads->fetch_all(MYSQLI_ASSOC);
              // $num_rows = count($number_of_bids);
              // $get_row['num_leads'] = $num_rows;
              $results[] = $get_row;
            }

            return $results;
        } else {
            return 2; //no record
        }
      }
    // }
      
        

    
  }

  public function get_my_leads($offset, $limit, $my_get_id)
  {

    // $get_query = $this->query("SELECT lead.id, customer_id, name, email, mobile, city, max_budget_amount, sr_services.service_name,  sr_services.id as service_id, description FROM lead JOIN sr_services ON lead.category = sr_services.id WHERE professional_id = '".$my_get_id."' ORDER BY id DESC");
    // if ($get_query->num_rows > 0) {
    //     while ($get_row = $get_query->fetch_assoc()) {
            
    //       $results[] = $get_row;
    //     }

    //     return $results;
    // } else {
    //     return 2; //no record
    // }
    if (!empty($offset) || !empty($limit)) {  

      $get_my_leads_query = $this->query("SELECT * FROM `my_leads` WHERE `professional_id` = ".$my_get_id." ORDER BY `id` DESC LIMIT ".$limit." OFFSET ".$offset);
      
        $results = []; 

        while ($get_lead_row = $get_my_leads_query->fetch_assoc()) {           

           
          $get_lead_query = $this->query("SELECT lead.id, customer_id, name, email, mobile, city,project_title, min_budget, max_budget_amount, sr_services_new.service_name,  sr_services_new.id as service_id, description FROM lead JOIN sr_services_new ON lead.category = sr_services_new.id WHERE lead.id = '".$get_lead_row['lead_id']."' ORDER BY id DESC");
          
          while ($get_lead_row1 = $get_lead_query->fetch_assoc()) {                      
            
            $get_lead_row1['bid_id'] = $get_lead_row['id'];

            $results[] = $get_lead_row1;
          }
              
        }

        return $results; // Return the array of results
    } else {
        return 0;
    }
  }

  
  public function filter_myleads_ajax($my_get_id,$dataValue)
  {

    if (!empty($my_get_id)) {  

      $get_my_leads_query = $this->query("SELECT * FROM `my_leads` WHERE `professional_id` = ".$my_get_id." ORDER BY `id` DESC");
      
        $results = []; 

        while ($get_lead_row = $get_my_leads_query->fetch_assoc()) {           

          
          $get_lead_query = $this->query("SELECT lead.id, customer_id, name, email, mobile, city,project_title, min_budget, max_budget_amount, sr_services_new.service_name,  sr_services_new.id as service_id, description FROM lead JOIN sr_services_new ON lead.category = sr_services_new.id WHERE lead.id = '".$get_lead_row['lead_id']."' AND lead.category = '".$dataValue."' ORDER BY id DESC");
          
          while ($get_lead_row1 = $get_lead_query->fetch_assoc()) {                      
            
            $get_lead_row1['bid_id'] = $get_lead_row['id'];

            $results[] = $get_lead_row1;
          }
              
        }

        return $results; // Return the array of results
    } else {
        return 0;
    }
  }


  public function get_que_ans($lead_id)
  {


    $get_query = $this->query("SELECT * FROM customer_query WHERE lead_id = " . $lead_id . "");

    if ($get_query->num_rows > 0) {
      while ($get_row = $get_query->fetch_assoc()) {

        $results[] = $get_row;
      }
      return $results;
    } else {
      return 2; //no record
    }

  }



  // all enquiries from here//

  public function get_faq($lead_id)
  {
    $get_query = $this->query("SELECT * FROM customer_query WHERE lead_id = " . $lead_id . "");
    if ($get_query->num_rows > 0) {
      while ($get_row = $get_query->fetch_assoc()) {
        $results[] = $get_row;
      }
      return $results;
    } else {
      return 2; //no record
    }
  }




  public function get_enquiries($cust_id)
  {
    if (!empty($cust_id)) {
      // $get_query = $this->query("SELECT * FROM customer_query WHERE customer_id = " . $cust_id . " LIMIT " . $offset . "," . $limit . "");
      $get_query = $this->query("SELECT * FROM `lead` WHERE customer_id = " . $cust_id . " ORDER BY id DESC");
      //  return $get_query->num_rows;
      
      if ($get_query->num_rows > 0) {

        $results = [];
        while ($get_row = $get_query->fetch_assoc()) {

          $faqs = $this->get_faq($get_row['id']);
          $get_row['faq'] = $faqs;

          $bids = $this->query("SELECT * FROM my_leads where lead_id = " . $get_row['id'] . " and status = 0 ");

        
          $bid_count = mysqli_num_rows($bids);
         
          

          $get_row['bids'] = $bid_count;

          $get_service = $this->query("SELECT sr_services_new.service_name FROM lead join sr_services_new on lead.category = sr_services_new.id where lead.category = " . $get_row['category'] . "");

          
          if ($get_service->num_rows > 0) {
            $get_service_row = $get_service->fetch_assoc();
            $get_row['service-name'] = $get_service_row['service_name'];
          } else {
            $get_row['service-name'] = "No service";
          }

          $date1 = new DateTime($get_row['created_at']);

          $get_row['formatCreatedAt'] = (new DateTime($get_row['created_at']))->format('d F, Y ');
          $current_date = new DateTime();

          $date_diff = $current_date->diff($date1);
          $get_row['days'] = $date_diff;

          $check = $this->query("SELECT * FROM my_leads where lead_id = " . $get_row['id'] . " and status = 1 ");
          $check_count = mysqli_num_rows($check);

          $get_row['cutDesc'] = '';
          if ((strlen($get_row['description'] > 200))) {
            $cutDesc = substr($get_row['description'], 0, 150);
            $get_row['cutDesc'] = $cutDesc;
          }else{
            $get_row['cutDesc'] = $get_row['description'];
          }

          //if project is rewarded then  don't show in enquiry
          if($check_count == 0){
            $results[] = $get_row;
          }
          
        }
        return $results;
      } else {
        return 2; //no record
      }
    } else {
      return 0;
    }
  }

  public function reward_project($lead_id)
  {
      $check_query = $this->query("SELECT * FROM my_leads where id = ".$lead_id." and status = 1 ");
      
      if ($check_query->num_rows > 0) {
          return 4;
      }else{

        // $get_query = $this->query("SELECT * FROM customer_query WHERE customer_id = " . $cust_id . " LIMIT " . $offset . "," . $limit . "");
        $get_query = $this->query("SELECT * FROM my_leads where id = ".$lead_id." and status = 0 ");
        //  return $get_query->num_rows;
        
        if ($get_query->num_rows > 0) {
          $get_query_bid = mysqli_fetch_assoc($get_query);
  
          $getuser = $this->query("select id,name,email from join_professionals where id = '" . $get_query_bid['professional_id'] . "'  ");
  
          $lGetQueryPrfAss = mysqli_fetch_assoc($getuser);
  
          $order_id = "ORD".mt_rand(11,99).date("Ymd").mt_rand(55,99).$lead_id.date("his");
        
          $query = $this->query("UPDATE `my_leads` SET `status` = 1,`order_id` = '.$order_id.' WHERE `id` = $lead_id");
  
          if($query){
  
            $lquery = $this->query("UPDATE `lead` SET `project_status` = 1 WHERE `id` = ".$get_query_bid['lead_id']."");
              if($lquery){
                $get_query_lead = $this->query("SELECT * FROM lead where id = ".$get_query_bid['lead_id']."");
                $get_query_lead_assc = mysqli_fetch_assoc($get_query_lead);
                $this->log_notification($lGetQueryPrfAss['id'],2,"New Project assigned to you");
                $this->send_assigned_project_email($lGetQueryPrfAss['email']);
                return 2;
              }
              return 3;
          }
          return 3;
        } else {
          return 1; //no record
        }
      }
    
  }

  public function get_professional_id($professional_id) {
    // Assuming you're using MySQLi for database operations
    $result = $this->query("SELECT slug FROM join_professionals WHERE id = " . $professional_id);
    $row = mysqli_fetch_assoc($result);

    return $row['slug'];
  }




  public function query_detail($lead_id)
  {
    
    $get_query = $this->query("SELECT * FROM `my_leads` WHERE `lead_id` = '". $lead_id . "'");
    
    if ($get_query->num_rows > 0) {
      $results = [];
      while ($get_row = $get_query->fetch_assoc()) {
        $professional_id = $this->get_professional_id($get_row['professional_id']);
        // return $professional_id;
        if($professional_id == null || $professional_id == ''){
          return 2;
        }
        $professional_name = $this->query("SELECT `name` FROM `join_professionals` WHERE `slug` = '". $professional_id . "'");
        $get_row_name = $professional_name->fetch_assoc();        
        $get_row['professional_name'] = $get_row_name['name'];
        $get_row['is_cutDesc'] = false;          

        if((strlen($get_row['description']) > 70)){
          $cutDesc = substr($get_row['description'],0,60);
          $cutDesc2 = substr($get_row['description'], 60);
          $get_row['cutDesc'] = $cutDesc; 
          $get_row['cutDesc2'] = $cutDesc2;  
          $get_row['is_cutDesc'] = true;
        }else{
          $get_row['cutDesc'] = $get_row['description'];   

        }
        $enwdate = new DateTime($get_row['created_at']);
        $formatDate = $enwdate->format("d M Y");
        $get_row['createdDate'] = $formatDate; 

       
        $lead_cust_id = $this->query("SELECT `customer_id` FROM `lead` WHERE `id` = '". $lead_id . "'");
        $get_cust_id = $lead_cust_id->fetch_assoc(); 
        $get_row['lead_cust_id'] = $get_cust_id['customer_id'];

        $get_row['professional_id'] = $professional_id;
        $results[] = $get_row;
      }
      return $results;
    } else {
      return 1; //no record
    }
    
  }



  public function get_projects($cust_id)
  {
    if (!empty($cust_id)) {
      // $get_query = $this->query("SELECT * FROM customer_query WHERE customer_id = " . $cust_id . " LIMIT " . $offset . "," . $limit . "");
      $get_query = $this->query("SELECT * FROM `lead` WHERE customer_id = " . $cust_id . " ORDER BY id DESC");
      //  return $get_query->num_rows;
      
      if ($get_query->num_rows > 0) {
        while ($get_row = $get_query->fetch_assoc()) {

          $faqs = $this->get_faq($get_row['id']);
          $get_row['faq'] = $faqs;

          // $bids = $this->query("SELECT * FROM my_leads where lead_id = " . $get_row['id'] . " and status = 0");
          
          
          $get_service = $this->query("SELECT sr_services_new.service_name FROM lead join sr_services_new on lead.category = sr_services_new.id where lead.category = " . $get_row['category'] . "");

        
          if ($get_service->num_rows > 0) {
            $get_service_row = $get_service->fetch_assoc();
            $get_row['service-name'] = $get_service_row['service_name'];
          } else {
            $get_row['service-name'] = "No service";
          }

          $date1 = new DateTime($get_row['created_at']);
          $current_date = new DateTime();

          $date_diff = $current_date->diff($date1);
          $get_row['days'] = $date_diff;

          $check = $this->query("SELECT * FROM my_leads where lead_id = " . $get_row['id'] . " and status = 1 ");
          $check_count = mysqli_num_rows($check);
          
          if($check_count >= 1){
            $check_row = $check->fetch_assoc();
            $get_row['professional_id'] = $check_row['professional_id'];
            $get_row['myLeadId'] = $check_row['id'];

            $results[] = $get_row;
          }
          
        }
        return $results;
      } else {
        return 2; //no record
      }
    } else {
      return 0;
    }
  }


  public function get_professional_projects($cust_id)
  {
    if (!empty($cust_id)) {

      $check = $this->query("SELECT * FROM my_leads where professional_id = " . $cust_id . " and status = 1 ORDER BY id DESC");      
      if ($check->num_rows > 0) {       
        while($get_lead_id = $check->fetch_assoc()){         
          $get_query = $this->query("SELECT * FROM `lead` WHERE id = " . $get_lead_id['lead_id'] . " ORDER BY id DESC");          
          if ($get_query->num_rows > 0) {
            $get_row = $get_query->fetch_assoc();           
            // $bids = $this->query("SELECT * FROM my_leads where lead_id = " . $get_row['id'] . " and status = 0");              
            $get_service = $this->query("SELECT sr_services_new.service_name FROM lead join sr_services_new on lead.category = sr_services_new.id where lead.category = " . $get_row['category'] . "");
            if ($get_service->num_rows > 0) {
              $get_service_row = $get_service->fetch_assoc();          
              $get_row['service-name'] = $get_service_row['service_name'];
            } else {
              $get_row['service-name'] = "No service";
            }
            
            $date1 = new DateTime($get_row['created_at']);            
            $current_date = new DateTime();           
            $date_diff = $current_date->diff($date1);
            $get_row['days'] = $date_diff;  

            
            
            $get_row['myLeadId'] = $get_lead_id['id'];
            
            $results[] = $get_row;            
            
          } 
        }
        return $results;
      }else{
        return 1;
      }
      
    } else {
      return 0;
    }
  }


  // insert professional service 
  public function addProfService($service,$profid)
  {

    if ($service == '' || $profid==  '') {
      return 1;
    } else {

      $get_service = $this->query("select `services` from `join_professionals` where `id` = " . $profid . " ");

      if ($get_service->num_rows > 0) {

        $getRow = $get_service->fetch_assoc();       
        // $services = str_replace(' ', '', $getRow['services']);
        $services = $getRow['services'];
        if($services == null || $services ==''){
          $ser_string = $service;
          
        }else{

          $input = str_replace(' ', '', $services);
          $ser_arr = explode(',',$input);
          if(in_array($service,$ser_arr)){
            return 5;
          } else{
            $ser_arr[] = $service ;
            $ser_string = implode(',',$ser_arr);

          }

        }     
        $getquery = $this->query("UPDATE `join_professionals` SET `services` = '" . $ser_string . "' WHERE `id` = " . $profid);         
       
        if ($getquery) {
          return 3;
        } else {
          return 4;
        }
        
      }else{
        return 2;
      }
       
      
    }


  }


   // insert professional service 
   public function addProfSkill($skill,$profid)
   {

    if ($skill == '' || $profid==  '') {
      return 1;
    } else {

      $get_service = $this->query("select `skills` from `join_professionals` where `id` = " . $profid . " ");

      if ($get_service->num_rows > 0) {

        $getRow = $get_service->fetch_assoc();       
        // $services = str_replace(' ', '', $getRow['services']);
        $skills = $getRow['skills'];
        if($skills == null || $skills ==''){
          $ser_string = $skill;
          
        }else{

          $input = str_replace(' ', '', $skills);
          $ser_arr = explode(',',$input);
          if(in_array($skill,$ser_arr)){
            return 5;
          } else{
            $ser_arr[] = $skill ;
            $ser_string = implode(',',$ser_arr);

          }

        }     
        $getquery = $this->query("UPDATE `join_professionals` SET `skills` = '" . $ser_string . "' WHERE `id` = " . $profid);         
       
        if ($getquery) {
          return 3;
        } else {
          return 4;
        }
        
      }else{
        return 2;
      }
       
      
    }


  }




  // Remove professional service
  public function remove_service($servid, $profid)
  {
   
    $query = $this->query("SELECT * FROM `join_professionals` WHERE `id` =  " . $profid . "");

    if ($query->num_rows > 0) {
      
        $row = $query->fetch_assoc();
        $serv_json = $row['services']; // "2,1,5"

        $serv_arr = explode(',',$serv_json);        
        
        if(in_array($servid,$serv_arr)){         
          $index = array_search($servid,$serv_arr);          

          if (isset($serv_arr[$index])) {
            unset($serv_arr[$index]);
          }

          $final_arr = array_values($serv_arr);
          $final_str = implode(',',$final_arr);          
          
          // return $removed_json;
          $update_query = $this->query("UPDATE join_professionals SET services = '" . $final_str . "' WHERE id = " . $profid);



          if($update_query){
            return 1;
           
          }else{
            return 10;
          }
        }else{
          return 100;
        }
       
     

    } else {
      return 2; //no record
    }

  }



 // Remove professional skill
 public function remove_skill($skillid, $profid)
 {
  
   $query = $this->query("SELECT * FROM `join_professionals` WHERE `id` =  " . $profid . "");

   if ($query->num_rows > 0) {
     
       $row = $query->fetch_assoc();
       $serv_json = $row['skills']; // "2,1,5"

       $serv_arr = explode(',',$serv_json);        
       
       if(in_array($skillid,$serv_arr)){         
         $index = array_search($skillid,$serv_arr);          

         if (isset($serv_arr[$index])) {
           unset($serv_arr[$index]);
         }

         $final_arr = array_values($serv_arr);
         $final_str = implode(',',$final_arr);          
         
         // return $removed_json;
         $update_query = $this->query("UPDATE join_professionals SET skills = '" . $final_str . "' WHERE id = " . $profid);



         if($update_query){
           return 1;
          
         }else{
           return 10;
         }
       }else{
         return 100;
       }
      
    

   } else {
     return 2; //no record
   }

 }



  // filter service Ajax
  public function filter_service($dataValue)
  {
    // if-empty starts
    if (!empty($dataValue)) {

      $get_query = $this->query("SELECT id,name,slug,services,skills,listing_about,image FROM join_professionals WHERE is_buyer = 0 AND is_verified = 1 AND FIND_IN_SET('$dataValue', services) > 0");
      // return "filter";
      // if-num-rows starts
      if ($get_query->num_rows > 0) {
        $results = [];
        while ($get_row = $get_query->fetch_assoc()) {
          // $string = null;
          // $string_cut = null;
          // Listing about 
          // if($get_row["listing_about"] != null){
          //   $string = strip_tags($get_row["listing_about"]);
          //   $length = strlen($string);
          //   $string_cut = substr($string, 0, 100);
          // }
          // Listing about 
          
          $services_name_array = $this->getServicesData($get_row["services"]);
          $skills_name_array = $this->getSkillsData($get_row["skills"]);
          $avgrating = $this->getAverageRating($get_row['id']);
          
          // services 
          // $servicesString = $get_row["services"];
          // $services_name_array = [];
          // if($servicesString != null){
          //   $servicesArray = explode(',', $servicesString);
          //   // $servicesArray = count($servicesArray) > 1 ? $servicesArray : [$servicesString];
          //   foreach($servicesArray as $oneService){
          //     $get_service = $this->query("SELECT * FROM `sr_services`  where `id` =".$oneService);
          //     if ($get_service->num_rows > 0) {
          //       $get_service_row = $get_service->fetch_assoc();
          //       $services_name_array[] = $get_service_row['service_name'];
          //     } else {
          //       $services_name_array[] = "No service";
          //     }
          //   }
          // }
          // services 
          // =========== skills ==========
          // $skillsString = $get_row["skills"];
          // if($skillsString){
          //   $skillsArray = explode(',', $skillsString);        
          //   $skills_name_array = array();
          //   foreach($skillsArray as $oneSkill){
          //     $get_skill = $this->query("SELECT * FROM sp_skills  where skill_id =" . $oneSkill . "");
          //     if ($get_skill->num_rows > 0) {
          //       $get_skill_row = $get_skill->fetch_assoc();
          //       $skills_name_array[] = $get_skill_row['skill_name'];
          //     } else {
          //       $skills_name_array[] = "No skill";
          //     }
          //   }
          // }
          // =========== skills ==========
          // $get_row['skills']  = $skills_name_array;
  
          // Ratings 
          // $result2 =$this->query("SELECT professional_reviews.*,join_professionals.image FROM professional_reviews JOIN join_professionals ON professional_reviews.professional_id = join_professionals.id  WHERE professional_reviews.professional_id = '".$get_row['id']."'");
          // if($result2){
          //     // $row2 = mysqli_fetch_assoc($result2);  
          //     if ($result2->num_rows > 0) {
  
          //         $reviewdata = [];
          //         $ratingCounts = array(
          //             5 => 0,
          //             4 => 0,
          //             3 => 0,
          //             2 => 0,
          //             1 => 0,
          //         );
          //         $totalRatings = 0;
          //         while ($row2 = mysqli_fetch_assoc($result2)) {
          //             $starsRating = $row2['rating'];
          //             $ratingCounts[$starsRating]++;
          //             $totalRatings += $starsRating;
  
          //             $reviewdata[] = $row2;        
  
          //         }
  
  
          //         $avgrating = number_format(round(($totalRatings/mysqli_num_rows($result2)),1),1);
          //     } 
          // }
  
  
  
          $results[] = [
            'data' => $get_row,
            'length' => strlen(strip_tags($get_row["listing_about"])),
            'string_cut' => substr(strip_tags($get_row["listing_about"]), 0, 100),
            'services' => $services_name_array,
            'skills' => $skills_name_array,
            'avgrating' => $avgrating,
          ];
  
          // $results[] = [$get_row, $length, $string_cut, $services_name_array,$avgrating];
        }
        return $results;
      } else {
        return 2; //no record
      }
      // if-num-rows ends
    } else {
      return 0;
    }
    // if-empty ends

  }




  // filter service Ajax
  // public function filter_leads($dataValue)
  // {
    
  //   if (!empty($dataValue)) {
  //     $get_query = $this->query("select * from `lead` where `category` = '" . $dataValue . "'");
      

      
  //     if ($get_query->num_rows > 0) {
  //       while ($get_row = $get_query->fetch_assoc()) {
      

  //         $get_service = $this->query("SELECT `lead`.`category`, `sr_services`.`service_name` FROM `lead` join `sr_services` on `lead`.`category` = `sr_services`.`id` where `lead`.`category` =" . $get_row['category'] . "");         
  //         if ($get_service->num_rows > 0) {
  //           $get_service_row = $get_service->fetch_assoc();
  //           $service_name = $get_service_row['service_name'];
  //           $answers = $get_service_row['service_name'];
  //         } else {
  //           $service_name = "No service";
  //         }
  //         $que_ans = $this->get_que_ans($get_row['id']);
  //         $get_row['que_ans'] = $que_ans;

  //         $results[] = [$get_row, $service_name];
  //       }
  //       return $results;
  //     } else {
  //       return 2; 
  //     }
     
  //   } else {
  //     return 0;
  //   }
    

  // }

  public function filter_leads($dataValue)
  {
    
    if (!empty($dataValue)) {
      $get_query = $this->query("SELECT lead.id, customer_id, name, email, mobile, city,project_title, min_budget, max_budget_amount, sr_services_new.service_name,  sr_services_new.id as service_id, description FROM lead JOIN sr_services_new ON lead.category = sr_services_new.id WHERE category = " . $dataValue . " ORDER BY id DESC");
           
      if ($get_query->num_rows > 0) {
        while ($get_row = $get_query->fetch_assoc()) {
          $get_num_my_leads = $this->query("SELECT * FROM my_leads WHERE lead_id = ".$get_row['id']);
          $number_of_bids = $get_num_my_leads->fetch_all(MYSQLI_ASSOC);
          $num_rows = count($number_of_bids);
          // Add the count to the $get_row array
          $get_row['num_leads'] = $num_rows;

          $date1 = new DateTime($get_row['created_at']);            
          $current_date = new DateTime();           
          $date_diff = $current_date->diff($date1);
          $get_row['days'] = $date_diff;  

          $results[] = $get_row;
        }

        return $results;
    } else {
        return 2; 
      }
     
    } else {
      return 0;
    }
    

  }


  public function filter_leads_ajax_mainservice($dataValue)
  {
    if (!empty($dataValue)) {

        $get_childs = $this->query("SELECT * FROM sr_services_new WHERE cat_id = ".$dataValue);
        
        if ($get_childs->num_rows > 0) {
          $results = [];
          while ($assoc_data = $get_childs->fetch_assoc()) {
            $get_query = $this->query("SELECT lead.id, customer_id, name, email, mobile, city,project_title, min_budget, max_budget_amount, sr_services_new.service_name,  sr_services_new.id as service_id, description FROM lead JOIN sr_services_new ON lead.category = sr_services_new.id WHERE category = ".$assoc_data['id']." ORDER BY id DESC");
            
            if ($get_query->num_rows > 0) {
              while ($get_row = $get_query->fetch_assoc()) {                
                
                $get_num_my_leads = $this->query("SELECT * FROM my_leads WHERE lead_id = ".$get_row['id']);
                $number_of_bids = $get_num_my_leads->fetch_all(MYSQLI_ASSOC);
                $num_rows = count($number_of_bids);
                $get_row['num_leads'] = $num_rows;    
                $date1 = new DateTime($get_row['created_at']);            
                $current_date = new DateTime();           
                $date_diff = $current_date->diff($date1);
                $get_row['days'] = $date_diff;  
    
                $results[] = $get_row;
                
              }              
            } 
            // else 
            // {
            //     return 2; 
            // }            
          }
          
          return $results;
          
         
        }else{
          $get_query = $this->query("SELECT lead.id, customer_id, name, email, mobile, city,project_title, min_budget, max_budget_amount, sr_services_new.service_name,  sr_services_new.id as service_id, description FROM lead JOIN sr_services_new ON lead.category = sr_services_new.id WHERE category = ".$dataValue." ORDER BY id DESC");
          $results = [];
            
            if ($get_query->num_rows > 0) {
              while ($get_row = $get_query->fetch_assoc()) {                
                
                $get_num_my_leads = $this->query("SELECT * FROM my_leads WHERE lead_id = ".$get_row['id']);
                $number_of_bids = $get_num_my_leads->fetch_all(MYSQLI_ASSOC);
                $num_rows = count($number_of_bids);
                $get_row['num_leads'] = $num_rows;    
                $date1 = new DateTime($get_row['created_at']);            
                $current_date = new DateTime();           
                $date_diff = $current_date->diff($date1);
                $get_row['days'] = $date_diff;  
    
                $results[] = $get_row;
                
              }      
              return $results;        
            } else{
              return 2;
            }
        }

    } else 
    {
        return 0;
    }
    

  }


  public function search_professionals($query)
  {
    $query = trim($query);

    $columns = array("name", "email", "listing_about","bio");
    $whereClause = "LOWER(CONCAT(" . implode(", ' ',", $columns) . ")) LIKE '%" . strtolower($query) . "%' AND `is_buyer` = 0 AND `is_verified` = 1";
    $sql = "SELECT * FROM `join_professionals` WHERE ".$whereClause;

    // $columns = array("name", "email", "listing_about", "bio");
    // $words = explode(" ", $query); // Split the keyword into individual words
    // $conditions = [];
    // foreach ($words as $word) {
    //     $subConditions = [];
    //     foreach ($columns as $column) {
    //         $subConditions[] = "LOWER($column) LIKE '%" . strtolower($word) . "%'";
    //     }
    //     $conditions[] = "(" . implode(" OR ", $subConditions) . ")";
    // }
    // $whereClause = "(" . implode(" AND ", $conditions) . ") AND `is_buyer` = 0 AND `is_verified` = 1";
    // $sql = "SELECT * FROM `join_professionals` WHERE $whereClause";


    $get_query = $this->query($sql);

    if ($get_query->num_rows > 0) {
      $results = [];
      while ($get_row = $get_query->fetch_assoc()) {
        // $string = null;
        // $string_cut = null;
        // Listing about 
        // if($get_row["listing_about"] != null){
        //   $string = strip_tags($get_row["listing_about"]);
        //   $length = strlen($string);
        //   $string_cut = substr($string, 0, 100);
        // }
        // Listing about 
        
        $services_name_array = $this->getServicesData($get_row["services"]);
        $skills_name_array = $this->getSkillsData($get_row["skills"]);
        $avgrating = $this->getAverageRating($get_row['id']);
        
        // services 
        // $servicesString = $get_row["services"];
        // $services_name_array = [];
        // if($servicesString != null){
        //   $servicesArray = explode(',', $servicesString);
        //   // $servicesArray = count($servicesArray) > 1 ? $servicesArray : [$servicesString];
        //   foreach($servicesArray as $oneService){
        //     $get_service = $this->query("SELECT * FROM `sr_services`  where `id` =".$oneService);
        //     if ($get_service->num_rows > 0) {
        //       $get_service_row = $get_service->fetch_assoc();
        //       $services_name_array[] = $get_service_row['service_name'];
        //     } else {
        //       $services_name_array[] = "No service";
        //     }
        //   }
        // }
        // services 
        // =========== skills ==========
        // $skillsString = $get_row["skills"];
        // if($skillsString){
        //   $skillsArray = explode(',', $skillsString);        
        //   $skills_name_array = array();
        //   foreach($skillsArray as $oneSkill){
        //     $get_skill = $this->query("SELECT * FROM sp_skills  where skill_id =" . $oneSkill . "");
        //     if ($get_skill->num_rows > 0) {
        //       $get_skill_row = $get_skill->fetch_assoc();
        //       $skills_name_array[] = $get_skill_row['skill_name'];
        //     } else {
        //       $skills_name_array[] = "No skill";
        //     }
        //   }
        // }
        // =========== skills ==========
        // $get_row['skills']  = $skills_name_array;

        // Ratings 
        // $result2 =$this->query("SELECT professional_reviews.*,join_professionals.image FROM professional_reviews JOIN join_professionals ON professional_reviews.professional_id = join_professionals.id  WHERE professional_reviews.professional_id = '".$get_row['id']."'");
        // if($result2){
        //     // $row2 = mysqli_fetch_assoc($result2);  
        //     if ($result2->num_rows > 0) {

        //         $reviewdata = [];
        //         $ratingCounts = array(
        //             5 => 0,
        //             4 => 0,
        //             3 => 0,
        //             2 => 0,
        //             1 => 0,
        //         );
        //         $totalRatings = 0;
        //         while ($row2 = mysqli_fetch_assoc($result2)) {
        //             $starsRating = $row2['rating'];
        //             $ratingCounts[$starsRating]++;
        //             $totalRatings += $starsRating;

        //             $reviewdata[] = $row2;        

        //         }


        //         $avgrating = number_format(round(($totalRatings/mysqli_num_rows($result2)),1),1);
        //     } 
        // }



        $results[] = [
          'data' => $get_row,
          'length' => strlen(strip_tags($get_row["listing_about"])),
          'string_cut' => substr(strip_tags($get_row["listing_about"]), 0, 100),
          'services' => $services_name_array,
          'skills' => $skills_name_array,
          'avgrating' => $avgrating,
        ];

        // $results[] = [$get_row, $length, $string_cut, $services_name_array,$avgrating];
      }
      return $results;
    } else {
      return 2; //no record
    }
  }



  //  update customer profile details (working)
  public function update_profile_details($id,$name,$email,$mobile)
  {
    
    if ($id == '' || $name == '' || $email == '' || $mobile == '') {
      return 1;
    } else {
      
      $getquery = $this->query("SELECT * from customer where id = '" . $id . "'");
      
      if ($getquery->num_rows > 0) {
        $getquery = $this->query("UPDATE `customer` SET `name` = '" . $name . "', `email` = '" . $email . "', `mobile` = '" . $mobile . "' WHERE `id` = '" . $id . "'");
        if ($getquery) {
          $get_user = $this->query("select id,name, email, mobile from customer where id = $id");
          $get_row = $get_user->fetch_assoc();
          return $get_row;
        } else {
          return 4;
        }
      } else {
        return 2;

      }
    }


  }

   //  update customer password details (working)
   public function update_password_details($id,$table_name,$currentpass,$newpass,$confirmnewpass)
   {
     
    if ($newpass != $confirmnewpass) {
      return 1;
    } 
   

    $uppercase = preg_match('@[A-Z]@', $newpass);
    $lowercase = preg_match('@[a-z]@', $newpass);
    $number = preg_match('@[0-9]@', $newpass);

    if (!$uppercase || !$lowercase || !$number || strlen($newpass) < 8) {
      return 5;
    }

    $getquery = $this->query("select password from $table_name where id='" . $id . "'");
    $get_row = $getquery->fetch_assoc();

    if (!empty($get_row)) {
        $hashedPassword = $get_row["password"];
       
        if (password_verify($currentpass, $hashedPassword)) {

          $password = PASSWORD_HASH($newpass, PASSWORD_DEFAULT);

          $get__query = $this->query("update $table_name set password='" . $password . "' where id='" . $id . "'");
          if ($get__query) {
            return 3;
          } else {
            return 4;
          }               
            
        } 
            
        return 2;

    }
 
 
   }


  // professional profile update 
  public function update_professional_profile_details($id,$name,$email,$city,$mobile,$organisation,$bio,$about)
  {

    $pattern = '/^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';
 
    
    
    if ($id == '' || $name == '' || $email == '' || $mobile == '' || $city == '') {
      return 1;
    
    }else if (preg_match($pattern, $email) == false) {
      return 5;
    } 
    
    else {
      
      $getquery = $this->query("SELECT * from join_professionals where id = '" . $id . "'");

      $biotext = addslashes($bio);
      $abouttext = addslashes($about);
      $organisationText = addslashes($organisation);



      if ($getquery->num_rows > 0) {
        $getquery = $this->query("UPDATE `join_professionals` SET `name` = '" . $name . "', `email` = '" . $email . "',`city` = '" . $city . "', `mobile` = '" . $mobile . "' , `organisation` = '" . $organisationText . "', `bio` = '" . $biotext . "', `listing_about` = '" . $abouttext . "' WHERE `id` = '" . $id . "'");
        if ($getquery) {
          $get_user = $this->query("select id,name, email,city, mobile, organisation, bio, listing_about from join_professionals where id = $id");
          $get_row = $get_user->fetch_assoc();
          return $get_row;
        } else {
          return 4;
        }
      } else {
        return 2;

      }
    }


  }

// Upload profile pic (working)
  public function upload_profile_picture($id, $profile_pic,$table)
  {

    $getquery = $this->query(" select * from $table where id = '" . $id . "'  ");


    if ($getquery->num_rows > 0) {
      if ($profile_pic != '') {
        $getquerys = $this->query(" update $table set `image` = '" . $profile_pic . "'  where `id` = '" . $id . "'  ");

      } else {
        $getquerys = $this->query(" update $table set `image` = 'default.png'  where `id` = '" . $id . "'     ");

      }

      if ($getquerys) {
        $get_user = $this->query("select id,image from $table where id = $id");
        $get_row = $get_user->fetch_assoc();
        return $get_row;
        
      } else {
        return false;
      }
    }else{
      return 1;
    }


  }


  // / Upload profile pic (working)
  public function upload_resume($id, $profile_pic)
  {
    
   
    $getquery = $this->query(" select * from join_professionals where id = '" . $id . "'  ");


    if ($getquery->num_rows > 0) {
      
        $getquerys = $this->query("update join_professionals set `resume` = '" . $profile_pic . "'  where `id` = '" . $id . "'  ");
        if($getquerys){
          return $profile_pic;
        }else {

          return false;

        }

      
    }else{
      return 1;
    }


  }

  public function add_skills($id, $skills)
  {
     
   
    $json = json_encode($skills);
    $getquery = $this->query(" select * from join_professionals where id = '" . $id . "'  ");


    if ($getquery->num_rows > 0) {
      
        $getquerys = $this->query("update join_professionals set `skills` = '" . $json . "'  where `id` = '" . $id . "'  ");
        if($getquerys){
          return 2;
        }else {

          return false;

        }

      
    }else{
      return 1;
    }


  }


  public function add_exp($id, $organization, $from, $to, $designation)
  {
     
   
   
    $getquery = $this->query("insert into user_exps (user_id,organization,from_date, to_date, designation) values ('" . $id . "','" . $organization . "','" . $from . "','" . $to . "','" . $designation . "')");


    if ($getquery == true) {
      
        return 2;

      
    }else{
      return 1;
    }


  }



  public function get_exp($id)
  {
      $getquery = $this->query("SELECT * FROM user_exps WHERE user_id = '" . $id . "'");

      if ($getquery && $getquery->num_rows > 0) {
          // Fetch and return records as an array
          $expArray = array();
          while ($row = $getquery->fetch_assoc()) {
              $expArray[] = $row;
          }
          return $expArray;
      } else {
          return 1;
      }
  }


  public function delete_exp($id)
  {
      $getquery = $this->query("SELECT * FROM user_exps WHERE id = '" . $id . "'");

      if ($getquery && $getquery->num_rows > 0) {
        $get = $this->query("DELETE FROM user_exps WHERE id = '" .$id. "'");
        if($get){
          return 2;
        }
        return 3;
      } else {
          return 1;
      }
  }



  public function get_academics($id)
  {
    $getquery = $this->query("SELECT * FROM user_academics WHERE user_id = '" . $id . "'");

    if ($getquery && $getquery->num_rows > 0) {
        // Fetch and return records as an array
        $expArray = array();
        while ($row = $getquery->fetch_assoc()) {
          $expArray[] = $row;
        }
        return $expArray;
    } else {
        return 1;
    }
  }

  public function get__details($slug)
  {
    $getquery = $this->query("SELECT bio,city,country,created_at,id,image,is_buyer,is_verified,listing_about,name,organisation,resume,services,skills,slug,status FROM join_professionals WHERE slug = '" . $slug . "'");

    if ($getquery && $getquery->num_rows > 0) {
        // Fetch and return records as an array
        // $expArray = array();
        // while ($row = $getquery->fetch_assoc()) {
        //   $expArray[] = $row;
        // }
        $get_row = $getquery->fetch_assoc();

        // =========== services ==========
        $servicesString = $get_row["services"];
        if(isset($servicesString)  && $servicesString !== null){
          $servicesArray = explode(',', $servicesString);
          // $servicesArray = count($servicesArray) > 1 ? $servicesArray : [$servicesString];
          $services_name_array = array();
          foreach($servicesArray as $oneService){
            $get_service = $this->query("SELECT * FROM sr_services_new  where id =" . $oneService . "");
            if ($get_service->num_rows > 0) {
              $get_service_row = $get_service->fetch_assoc();
              $services_name_array[] = $get_service_row['service_name'];
            } else {
              $services_name_array[] = "No service";
            }
          }
        }
        // =========== services ==========
        // =========== skills ==========
        $skillsString = $get_row["skills"];
        if(isset($skillsString) && $skillsString !== null){
          $skillsArray = explode(',', $skillsString);        
          $skills_name_array = array();
          foreach($skillsArray as $oneSkill){
            $get_skill = $this->query("SELECT * FROM sp_skills  where skill_id =" . $oneSkill . "");
            if ($get_skill->num_rows > 0) {
              $get_skill_row = $get_skill->fetch_assoc();
              $skills_name_array[] = $get_skill_row['skill_name'];
            } else {
              $skills_name_array[] = "No skill";
            }
          }
        }
        // =========== skills ==========

        // =========== portfolios ==========
        $getportfolios = $this->query("SELECT * FROM professional_portfolios WHERE professional_slug = '" . $slug . "'");
        if ($getportfolios && $getportfolios->num_rows > 0) {
          $portfolios__arr = [];
          while ($getportfolios_row = $getportfolios->fetch_assoc()) {
            $pfiles = $getportfolios_row['files'];
            if($pfiles){
              $pimages = array();
              $fileArray = explode(',', $pfiles);
              foreach($fileArray as $file){
                $pimages[] = $url."/assets/portfolio-images/".$file;
              }
              $getportfolios_row['images'] = $pimages;
            }
            $portfolios__arr[] = $getportfolios_row;
          }
        }
        // =========== portfolios ==========


        $get_row['skills']  = $skills_name_array;
        $get_row['portfolios']  = $portfolios__arr;



        return [$get_row,$services_name_array];
    } else {
        return 1;
    }
  }


  public function add_academics($id, $course, $institute, $university, $year, $percentage)
  {
     
   
   
    $getquery = $this->query("insert into user_academics (user_id,course, institute,university, years, percentage) values ('" . $id . "','" . $course . "','" . $institute . "','" . $university . "','" . $year . "','" . $percentage . "')");


    if ($getquery == true) {
      
      return 2;

      
    }else{
      return 1;
    }


  }


  public function delete_academics($id)
  {
      $getquery = $this->query("SELECT * FROM user_academics WHERE id = '" . $id . "'");

      if ($getquery && $getquery->num_rows > 0) {
        $get = $this->query("DELETE FROM user_academics WHERE id = '" .$id. "'");
        if($get){
          return 2;
        }
        return 3;
      } else {
          return 1;
      }
  }

  public function update_wallet($id, $amount, $payment_id)
  {


    $getquery = $this->query(" select * from join_professionals where id = '" . $id . "'  ");

    if ($getquery->num_rows > 0) {
      $row = $getquery->fetch_assoc();
      $wallet = $row['wallet'] + ($amount*5);
     
      $getquerys = $this->query("update join_professionals set `wallet` = '" . $wallet . "'  where `id` = '" . $id . "'  ");
      if($getquerys){
        $trans = $this->insertTransaction($id, 1, ($amount/10), $currentDateTime = date('F j, Y H:i:s'), 'TRANS-'.time(), 'added '.($amount/10).'credits to wallet', $payment_id, $wallet);
        $this->send_transaction_email($row['email'],$wallet);
        return $wallet;
      }else {

        return 3;

      } 

    }else{
      return 1;
    }
  }


  public function gig_order($id,$gig_id, $amount, $payment_id)
  {


    $getquery = $this->query(" select email from join_professionals where email = '" . $id . "'  ");

    if ($getquery->num_rows > 0) {
      $row = $getquery->fetch_assoc();
     
      $trans = $this->insertGigOrderTransaction($id,$gig_id, $amount, $currentDateTime = date('F j, Y H:i:s'), $payment_id);
      // $this->send_transaction_email($row['email'],$wallet);
      return 2;

    }else{
      return 1;
    }
  }


  public function update_wallet_milestone_payment($id,$mid, $amount, $payment_id)
  {

    $getquery = $this->query(" select * from join_professionals where id = '" . $id . "'  ");    

    if ($getquery->num_rows > 0) {
      $row = $getquery->fetch_assoc();

      // if($row['wallet'] < $amount*10){
      //   return 2;
      // }
      // $wallet = $row['wallet'] - ($amount/10);
     
      // $getquerys = $this->query("update join_professionals set `wallet` = '" . $wallet . "'  where `id` = '" . $id . "'  ");
      // if($getquerys){
        $getqueryMile = $this->query("UPDATE `milestones` Set `payment_status` = 1 WHERE id='" . $mid . "'");
          if ($getqueryMile) {
            $trans = $this->insertTransaction($id, 1, ($amount/10), $currentDateTime = date('F j, Y H:i:s'), 'TRANS-'.time(), 'Debited '.($amount/10).'credits from wallet', $payment_id, $wallet);
            $this->send_transaction_email($row['email'],$wallet);
            // return $wallet;
            return 5;
          } else {
            return 4; // not saved
          }
        
      // }else {

      //   return 3;

      // } 

    }else{
      return 1;
    }
  }

  // Function to get transactions by user_id
  public function getTransactionsByUserId($user_id, $data_value) {
    
    if($data_value == 2){
      $sql = "SELECT * FROM transaction_history WHERE user_id = '$user_id' order by id desc";
    }else{

      $sql = "SELECT * FROM transaction_history WHERE user_id = '$user_id' AND transaction_type='$data_value' order by id desc";
    }



    $result = $this->query($sql);

    if ($result->num_rows > 0) {
      $transactions = array();
      while($row = $result->fetch_assoc()) {
        $transactions[] = $row;
      }
      return $transactions;
    } else {
      return 1;
    }
  }


    // Function to get transactions by user_id
    public function getTransactionsByUserIdAndDays($user_id, $select_value) {
  
      $sql = "SELECT * FROM `transaction_history` WHERE `user_id`='".$user_id."' ORDER BY `id` DESC LIMIT $select_value";
     
  
      $result = $this->query($sql);
  
      if ($result->num_rows > 0) {
        $transactions = array();
        while($row = $result->fetch_assoc()) {
          $transactions[] = $row;
        }
        return $transactions;
      } else {
        return 1;
      }
    }

  public function get_milestones($lead_id,$user_mile_id) {
    
    $sql = "SELECT * FROM user_milestones WHERE user_id = '$user_mile_id' AND project_id = '$lead_id'";
    $result = $this->query($sql);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $milestones_sql = "SELECT * FROM milestones WHERE milestone_id = '".$row['milestone_id']."'";
        $milestones_sql_result = $this->query($milestones_sql);
        // if ($milestones_sql_result->num_rows > 0) {
          $mile_stones = [];
          while($milestone_row = $milestones_sql_result->fetch_assoc()) {
            $mile_stones[] = $milestone_row;
          }
          $row['milestones']  = $mile_stones;
          return $row;
        // }else{
        //   return 2;
        // }
      }
      
    } else {
      return 2;
    }
  }

  // milestone payment status 
  public function milestone_payment_status($lead_id) {
      // Get current date
      $currentDate = time();

      // Select the milestones satisfying the conditions
      $sql = "SELECT * FROM milestones WHERE project_id = '$lead_id' ORDER BY id";
      $result = $this->query($sql);

      // Check if there are any milestones
      if ($result->num_rows > 0) {
        // Loop through each milestone
        while ($row = $result->fetch_assoc()) {
          // Convert deadline string to timestamp
          $deadlineTimestamp = strtotime($row['milestone_deadline']);
          // Check if the deadline has passed
          if ($deadlineTimestamp > $currentDate) {
            // Check next record's payment_status
            if ($row['payment_status'] == 0) {
                return $row; // Return the milestone if payment_status is 0
            }else{
              return "Phase in progress";
            }
          }else {
              // If the deadline is in the future, move to the next milestone
              continue;
          }
        }
      }
      return 3; // No matching milestones found
  }




   // milestone payment status 
   public function milestoneCompleteButton($lead_id,$milStonId) {
    
    // $sql = "SELECT * FROM user_milestones WHERE milestone_id = '$milStonId' AND project_id = '$lead_id'";
    // $result = $this->query($sql);
    // if ($result->num_rows > 0) {
    //   while ($row = $result->fetch_assoc()) {
          $currentDate = date("Y-m-d");
          $milestones_sql = "SELECT * FROM milestones WHERE milestone_id = '".$milStonId."' AND payment_status=1 AND status=0 AND milestone_deadline='".$currentDate."' LIMIT 1";
          $milestones_sql_result = $this->query($milestones_sql);
          
          if ($milestones_sql_result->num_rows > 0) {
              $milestones_sql_row = $milestones_sql_result->fetch_assoc();              
              return $milestones_sql_row; // Found milestone with status 0 and payment_status 0
          }
    //   }
      
    //   return 3; // No milestone with status 0 and payment_status 0 found
    // } else {
       return 2;
    // }
  }

// final milestones 
  public function get_final_milestones($lead_id) {
    
    // $sql = "SELECT * FROM user_milestones WHERE project_id = '$lead_id'  AND status = 1";
    // $result = $this->query($sql);
    // if ($result->num_rows > 0) {
      // while($row = $result->fetch_assoc()) {
        $milestones_sql = "SELECT * FROM milestones WHERE project_id = '".$lead_id."'";
        $milestones_sql_result = $this->query($milestones_sql);
        // if ($milestones_sql_result->num_rows > 0) {
          $mile_stones = [];
          while($milestone_row = $milestones_sql_result->fetch_assoc()) {
            $date = DateTime::createFromFormat('Y-m-d', $milestone_row['milestone_deadline']);
            $formattedDate = $date->format('jS F, Y');
            $milestone_row['milestone_deadline_formatted'] = $formattedDate;
            
            $mile_stones[] = $milestone_row;
          }
          $row['milestones']  = $mile_stones;
          return $row;
        // }else{
        //   return 2;
        // }
      // }
      
    // } else {
    //   return 2;
    // }
  }

  public function auth_user_milestones($lead_id,$cust_id) {
    
    $sql = "SELECT * FROM user_milestones WHERE user_id = '$cust_id' AND project_id = '$lead_id'";
    $result = $this->query($sql);
    if ($result->num_rows > 0) {
      // while($row = $result->fetch_assoc()) {
        // $milestones_sql = "SELECT * FROM milestones WHERE milestone_id = '".$row['milestone_id']."'";
        // $milestones_sql_result = $this->query($milestones_sql);
        // if ($milestones_sql_result->num_rows > 0) {
        //   $mile_stones = [];
        //   while($milestone_row = $milestones_sql_result->fetch_assoc()) {
        //     $mile_stones[] = $milestone_row;
        //   }
        //   $row['milestones']  = $mile_stones;
        //   return $row;
        // }else{
        //   return 2;
        // }
        return 5;
      // }
      
    } else {
      return 2;
    }
  }


  public function acceptMilestones($project_id)
  {

    $getquery = $this->query("SELECT * FROM milestones WHERE project_id='" . $project_id . "'");

    if ($getquery->num_rows > 0) {
        $updateQuery = $this->query("UPDATE `milestones` SET `status` = '1' WHERE project_id = '" . $project_id . "'");
        
        if ($updateQuery) {
            return 3; // Saved
        } else {
            return 4; // Not saved
        }
    } else {
        return 2; // Milestones not found
    }
    
  }

  // update milestone status 
  public function update_milestones_status($milestone_id,$milestone_status)
  {

      $getquery = $this->query("select * from user_milestones where milestone_id='" . $milestone_id . "'");
      if ($getquery->num_rows > 0) {
        if($milestone_status == 1){
          $getquery = $this->query("UPDATE `user_milestones` Set `status` = '" . $milestone_status . "' WHERE milestone_id = '" . $milestone_id . "'");
          if ($getquery) {
            return 3; // saved
          } else {
            return 4; // not saved
          }
        }elseif($milestone_status == 0){
          $delete = $this->query("DELETE FROM user_milestones where milestone_id = '" . $milestone_id . "'");
          if ($delete) {
            return 5; //deleted
          } else {
            return 6; //not deleted
          }
        }
       
      } else {
        return 2;  // milestone not found

      }
  }


  public function remove_accept_reject_button($leadId)
  {

      $getquery = $this->query("select * from milestones where project_id='" . $leadId . "' AND status = 1");
      if ($getquery->num_rows > 0) {        
          
            return 3; // saved
          
      
      }
       else {
        return 2;  // milestone not found

      }
  }



  public function markItCompleted($leadId,$m_id)
  {

      // $getquery = $this->query("select * from user_milestones where milestone_id='" . $milestone_id . "'");
      // if ($getquery->num_rows > 0) {
      //   if($milestone_status == 1){
          $getquery = $this->query("UPDATE `milestones` SET `is_completed` = 1 WHERE `project_id` = '".$leadId."' AND  `id` = '".$m_id."'");
          if ($getquery) {
            $getNextquery = $this->query("select * from milestones where `project_id` = '".$leadId."' AND  `payment_status` = 0");
            if ($getNextquery->num_rows > 0) {
              return 1; // updated and have more milestones with payment pending
            }
            return 3;   // saved
          } else {
            return 4;   // not saved
          }
        // }
        // elseif($milestone_status == 0){
        //   $delete = $this->query("DELETE FROM user_milestones where milestone_id = '" . $milestone_id . "'");
        //   if ($delete) {
        //     return 5; //deleted
        //   } else {
        //     return 6; //not deleted
        //   }
        // }
       
      // } else {
      //   return 2;  // milestone not found

      // }
  }

  public function milestones_payment($milestoneidLong,$mid)
  {

      // $getquery = $this->query("select * from user_milestones where milestone_id='" . $milestone_id . "'");
      // if ($getquery->num_rows > 0) {
        // if($milestone_status == 1){
          $getquery = $this->query("UPDATE `milestones` Set `payment_status` = 1 WHERE project_id = '" . $milestoneidLong . "' AND id='" . $mid . "'");
          if ($getquery) {
            return 3; // saved
          } else {
            return 4; // not saved
          }
        // }elseif($milestone_status == 0){
        //   $delete = $this->query("DELETE FROM user_milestones where milestone_id = '" . $milestone_id . "'");
        //   if ($delete) {
        //     return 5; //deleted
        //   } else {
        //     return 6; //not deleted
        //   }
        // }
       
      // } else {
      //   return 2;  // milestone not found

      // }
    


  }


    // Function to insert a transaction
  public function insertTransaction($user_id, $transaction_type, $amount, $transaction_date, $transaction_id, $remark, $payment_id, $wallet) {


    $sql = "INSERT INTO transaction_history (user_id, transaction_type, amount, transaction_date, transaction_id, remark, payment_id, closing)
            VALUES ('$user_id', '$transaction_type', '$amount', '$transaction_date', '$transaction_id', '$remark', '$payment_id', '$wallet')";

    if ($this->query($sql) === TRUE) {
        return true;
    } else {
        return false;
    }
  }

      // Function to insert a transaction
      public function insertGigOrderTransaction($user_id,$gig_id, $amount, $transaction_date, $payment_id) {


        $sql = "INSERT INTO gig_orders (customer_email,gig_id, final_amt, order_date, payment_id)
                VALUES ('$user_id','$gig_id', '$amount', '$transaction_date', '$payment_id')";
    
        if ($this->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
      }



  public function add_bid($id, $amount, $lead_id, $description)
  {
    if($amount < 0){
      return 9;
    }

    $getquery = $this->query("select * from lead where id = '" . $lead_id . "'  ");
    
    if ($getquery->num_rows > 0) {
      $lGetQueryLeadAss = mysqli_fetch_assoc($getquery);
      
      $getuser = $this->query("select id,name,email from join_professionals where id = '" . $lGetQueryLeadAss['customer_id'] . "'  ");

      $lGetQueryPrfAss = mysqli_fetch_assoc($getuser);

      $getuser = $this->query("select * from join_professionals where id = '" . $id . "'  ");
      if ($getuser->num_rows <= 0) {
        return 4;
      }

      $row = $getuser->fetch_assoc();
      $creditToCut = 5;
      // Checking max budget of project
      if($lGetQueryLeadAss['max_budget_amount'] <= 500){
        if($row['wallet'] < 5){
          return 5;
        }
        $creditToCut = 5;
      }elseif($lGetQueryLeadAss['max_budget_amount'] > 500 && $lGetQueryLeadAss['max_budget_amount'] <= 1000 ){
        if($row['wallet'] < 10){
          return 5;
        }
        $creditToCut = 10;
      }elseif($lGetQueryLeadAss['max_budget_amount'] > 1000 && $lGetQueryLeadAss['max_budget_amount'] <= 1500 ){
        if($row['wallet'] < 15){
          return 5;
        }
        $creditToCut = 15;
      }elseif($lGetQueryLeadAss['max_budget_amount'] > 1500 && $lGetQueryLeadAss['max_budget_amount'] <= 2000 ){
        if($row['wallet'] < 20){
          return 5;
        }
        $creditToCut = 20;
      }elseif($lGetQueryLeadAss['max_budget_amount'] > 2000 && $lGetQueryLeadAss['max_budget_amount'] <= 5000 ){
        if($row['wallet'] < 30){
          return 5;
        }
        $creditToCut = 30;
      }elseif($lGetQueryLeadAss['max_budget_amount'] > 5000 && $lGetQueryLeadAss['max_budget_amount'] <= 10000 ){
        if($row['wallet'] < 40){
          return 5;
        }
        $creditToCut = 40;
      }elseif($lGetQueryLeadAss['max_budget_amount'] > 10000 ){
        if($row['wallet'] < 50){
          return 5;
        }
        $creditToCut = 50;
      }

      // return $creditToCut;
      // if($row['wallet'] < 10){
      //   return 5;
      // }

      $desc = addslashes($description);
      $paragraphWithHiddenInfo = $this->hideSensitiveInfo($desc);

      $myLead = $this->query("insert into my_leads (professional_id,lead_id, description, amount) values ('" . $id . "','" . $lead_id . "','" . $paragraphWithHiddenInfo . "','" . $amount . "')");

      if($myLead){
        $inserted_record = mysqli_insert_id(self::$connection);

        
        
        $wallet = $row['wallet'] - $creditToCut;


        $getquerys = $this->query("update join_professionals set `wallet` = '" . $wallet . "'  where `id` = '" . $id . "'  ");
        if($getquerys){
          $trans = $this->insertTransaction($id, 0,$creditToCut, $currentDateTime = date('F j, Y H:i:s'), 'TRANS-'.time(), 'Debited '.$creditToCut.' credits for bidding', $payment_id, $wallet);


          // $notify = $this->query("insert into notifications (user_id,lead_id) values ('" . $id . "','" . $lead_id . "')");
          $this->log_notification($lGetQueryPrfAss['id'],1,"Got a new bid on ".$lGetQueryLeadAss['project_title']."",$lead_id,$inserted_record);
          // updating bid count in lead table 
          $lGetQuery = $this->query("SELECT id,bid_count FROM lead where id = ".$lead_id."");
          if($lGetQuery->num_rows > 0){
            $lGetQueryass = mysqli_fetch_assoc($lGetQuery);
            $lGetQueryBidCountIncr = $lGetQueryass['bid_count'] + 1;
            // $lquery = $this->query("UPDATE `lead` SET `project_status` = 1, `bid_count`= ".$lGetQueryBidCountIncr."  WHERE `id` = ".$lead_id."");
            // if($lquery){
              $this->send_bid_email($lGetQueryPrfAss['email'],$lGetQueryLeadAss['project_title']);
              return 2;
            // }
            // return 7;
          }
          // updating bid count in lead table 


          return 8;
        }else {

          return 3;

        }
      }
      else{
        return 6;
      }
     
       

    }else{
      return 1;
    }
  }

  public function savePortfolioImages($id,$title,$description,$image_names_string, $link)
  {

    $getquery = $this->query(" select * from join_professionals where id = '" . $id . "'  ");
    if ($getquery->num_rows > 0) {
      if ($image_names_string !== '' && $title !== null) {
        // return "working";
        $get_row = $getquery->fetch_assoc();

        $desc = addslashes($description);
        $tit = addslashes($title);

        $paragraphWithHiddenInfo = $this->hideSensitiveInfo($desc);
        $subjectWithHiddenInfo = $this->hideSensitiveInfo($tit);

        $getquerys = $this->query("insert into professional_portfolios (professional_id,professional_slug,title, description, files, link) values ('" . $id . "','" . $get_row['slug'] . "','" . $subjectWithHiddenInfo . "','" . $paragraphWithHiddenInfo . "','" . $image_names_string . "','" . $link . "')");
        if ($getquerys) {       

          // $get_user = $this->query("select id,portfolio_images from join_professionals where id = $id");
          // $get_row = $get_user->fetch_assoc();
          return 2;
          
        } else {
          return false;
        }
      }
       else {
        return 3;

      }

      
    }else{
      return 1;
    }


  }


  public function sr_pages_all_first_two()
  {
    $resultsByCategory = []; // Initialize an array to hold results by category
        
        // Categories 
        $catSql = $this->query("SELECT * FROM page_categories LIMIT 2");
        
        if ($catSql) { // Check if query was successful
            while ($catRow = mysqli_fetch_assoc($catSql)) {
                

                $categoryId = $catRow['id']; // Extract the category ID
                
                // Pages 
                $sql = $this->query("SELECT * FROM sr_pages WHERE service_category = $categoryId AND status = 1");
                
    
                if ($sql) { // Check if query was successful
                    $pages = []; // Initialize an array for pages in the current category
                    
                    while ($row = mysqli_fetch_assoc($sql)) {
                        $pages[] = $row;
                    }
                    
                    $catRow['pages'] = $pages; // Append pages to the current category
                    $resultsByCategory[] = $catRow; // Append the category to the results array
                } else {
                    return false; // Return false if page query fails
                }
            }
            
            mysqli_free_result($catSql); // Free the category result set
            
            if (!empty($resultsByCategory)) {
                return $resultsByCategory;
            } else {
                return false; // Return false if no pages were found
            }
        } else {
            return false; // Return false if category query fails
        }
  }

  public function development_services()
  {
    // $resultsByCategory = []; 
        
    //     $catSql = $this->query("SELECT * FROM page_categories LIMIT 2");        
    //     if ($catSql) { 
    //         while ($catRow = mysqli_fetch_assoc($catSql)) {
    //             $categoryId = $catRow['id'];               
    //             $sql = $this->query("SELECT * FROM sr_pages WHERE service_category = $categoryId AND status = 1");               
    
    //             if ($sql) { // Check if query was successful
    //                 $pages = []; // Initialize an array for pages in the current category                    
    //                 while ($row = mysqli_fetch_assoc($sql)) {
    //                     $pages[] = $row;
    //                 }                    
    //                 $catRow['pages'] = $pages; // Append pages to the current category
    //                 $resultsByCategory[] = $catRow; // Append the category to the results array
    //             } else {
    //                 return false; // Return false if page query fails
    //             }
    //         }            
    //         mysqli_free_result($catSql); // Free the category result set            
    //         if (!empty($resultsByCategory)) {
    //             return $resultsByCategory;
    //         } else {
    //             return false; // Return false if no pages were found
    //         }
    //     } else {
    //         return false; // Return false if category query fails
    //     }


        // new code 
        $sql = $this->query("Select * from sr_services_new where cat_id=34 and service_bg_img is not null");
        $results = [];
        if($sql){
          while ($catRow = mysqli_fetch_assoc($sql)) {
            $results[] = $catRow;
          }          
          // $sqlCat = $this->query("Select * from sr_services_new where id=34");
          //   if($sqlCat){
          //     while ($catRowParent = mysqli_fetch_assoc($sqlCat)) {
          //       $results['parent'] = $catRowParent['service_name'];
          //     }
          //   }
          return $results;
        }else{
          return false;
        }

  }

  public function designing_services()
  {
    
        // new code 
        $sql = $this->query("Select * from sr_services_new where cat_id=36");
        

        $results = [];

        if($sql){
          while ($catRow = mysqli_fetch_assoc($sql)) {
            $results[] = $catRow;
          }
          
          // $sqlCat = $this->query("Select * from sr_services_new where id=34");
          //   if($sqlCat){
          //     while ($catRowParent = mysqli_fetch_assoc($sqlCat)) {
          //       $results['parent'] = $catRowParent['service_name'];
          //     }
          //   }
          return $results;
        }else{
          return false;
        }

  }

  public function latest_tech_section()
  {
    
        // new code 
        $sql = $this->query("Select * from sr_services_new where cat_id=41 and service_bg_img is not null");
        

        $results = [];

        if($sql){
          while ($catRow = mysqli_fetch_assoc($sql)) {
            $results[] = $catRow;
          }
          
          // $sqlCat = $this->query("Select * from sr_services_new where id=34");
          //   if($sqlCat){
          //     while ($catRowParent = mysqli_fetch_assoc($sqlCat)) {
          //       $results['parent'] = $catRowParent['service_name'];
          //     }
          //   }
          return $results;
        }else{
          return false;
        }

  }

  public function marketing_section()
  {
    
        // new code 
        $sql = $this->query("Select * from sr_services_new where cat_id=40 and service_bg_img is not null");
        

        $results = [];

        if($sql){
          while ($catRow = mysqli_fetch_assoc($sql)) {
            $results[] = $catRow;
          }
          
          // $sqlCat = $this->query("Select * from sr_services_new where id=34");
          //   if($sqlCat){
          //     while ($catRowParent = mysqli_fetch_assoc($sqlCat)) {
          //       $results['parent'] = $catRowParent['service_name'];
          //     }
          //   }
          return $results;
        }else{
          return false;
        }

  }

  public function sr_pages_all_last_two()
  {
    $resultsByCategory = []; // Initialize an array to hold results by category
        
        // Categories 
        $catSql = $this->query("SELECT * FROM page_categories WHERE id NOT IN (1,2,3,6,7,8)");
        
        if ($catSql) { // Check if query was successful
            while ($catRow = mysqli_fetch_assoc($catSql)) {
                

                $categoryId = $catRow['id']; // Extract the category ID
                
                // Pages 
                $sql = $this->query("SELECT * FROM sr_pages WHERE service_category = $categoryId AND status = 1");
                
    
                if ($sql) { // Check if query was successful
                    $pages = []; // Initialize an array for pages in the current category
                    
                    while ($row = mysqli_fetch_assoc($sql)) {
                        $pages[] = $row;
                    }
                    
                    $catRow['pages'] = $pages; // Append pages to the current category
                    $resultsByCategory[] = $catRow; // Append the category to the results array
                } else {
                    return false; // Return false if page query fails
                }
            }
            
            mysqli_free_result($catSql); // Free the category result set
            
            if (!empty($resultsByCategory)) {
                return $resultsByCategory;
            } else {
                return false; // Return false if no pages were found
            }
        } else {
            return false; // Return false if category query fails
        }
  }

  public function sr_pages_all_data()
  {
    $resultsByCategory = []; // Initialize an array to hold results by category
        
        // Categories 
        $catSql = $this->query("SELECT * FROM page_categories");
        
        if ($catSql) { // Check if query was successful
            while ($catRow = mysqli_fetch_assoc($catSql)) {
                

                $categoryId = $catRow['id']; // Extract the category ID
                
                // Pages 
                $sql = $this->query("SELECT * FROM sr_pages WHERE service_category = $categoryId AND status = 1");
                
    
                if ($sql) { // Check if query was successful
                    $pages = []; // Initialize an array for pages in the current category
                    
                    while ($row = mysqli_fetch_assoc($sql)) {
                        $pages[] = $row;
                    }
                    
                    $catRow['pages'] = $pages; // Append pages to the current category
                    $resultsByCategory[] = $catRow; // Append the category to the results array
                } else {
                    return false; // Return false if page query fails
                }
            }
            
            mysqli_free_result($catSql); // Free the category result set
            
            if (!empty($resultsByCategory)) {
                return $resultsByCategory;
            } else {
                return false; // Return false if no pages were found
            }
        } else {
            return false; // Return false if category query fails
        }
  }

  public function updateIsseen($notiId)
  {  
      $get_query = $this->query("SELECT * FROM notifications where id = ".$notiId."");
      if ($get_query->num_rows > 0) {       
      
        $query = $this->query("UPDATE `notifications` SET `seen` = 1 WHERE `id` = $notiId");
        if($query){          
            
            return 2; // updated
        }
        return 3; // not updated
      } else {
        return 1; //no record
      }    
  }
  //send review link
  public function send_review_link($p_id, $c_id,$c_mail,$lead)
  {   
      $link =  'https://sooprs.com//send-review?slug='.$p_id.'&c='.$c_id.'&l='.$lead;
     
      $email = 'sandeep.meh28@gmail.com';
      $bcc = '';
      $from = 'smsunnythefunny@gmail.com';
      $subject = 'Please write a review!';
      $title = 'Write a review';
      $body = '<!DOCTYPE html>

      <html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">
      
      <head>
        <title></title>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <!--[if mso]><xml><o:OfficeDocumentSettings><o:PixelsPerInch>96</o:PixelsPerInch><o:AllowPNG/></o:OfficeDocumentSettings></xml><![endif]-->
        <style>
          * {
            box-sizing: border-box;
          }
      
          body {
            margin: 0;
            padding: 0;
          }
      
          a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: inherit !important;
          }
      
          #MessageViewBody a {
            color: inherit;
            text-decoration: none;
          }
      
          p {
            line-height: inherit
          }
      
          .desktop_hide,
          .desktop_hide table {
            mso-hide: all;
            display: none;
            max-height: 0px;
            overflow: hidden;
          }
      
          .image_block img+div {
            display: none;
          }
      
          @media (max-width:620px) {
      
            .desktop_hide table.icons-inner,
            .social_block.desktop_hide .social-table {
              display: inline-block !important;
            }
      
            .icons-inner {
              text-align: center;
            }
      
            .icons-inner td {
              margin: 0 auto;
            }
      
            .image_block img.fullWidth {
              max-width: 100% !important;
            }
      
            .mobile_hide {
              display: none;
            }
      
            .row-content {
              width: 100% !important;
            }
      
            .stack .column {
              width: 100%;
              display: block;
            }
      
            .mobile_hide {
              min-height: 0;
              max-height: 0;
              max-width: 0;
              overflow: hidden;
              font-size: 0px;
            }
      
            .desktop_hide,
            .desktop_hide table {
              display: table !important;
              max-height: none !important;
            }
          }
        </style>
      </head>
      
      <body style="background-color: #f9f9f9; margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
        <table border="0" cellpadding="0" cellspacing="0" class="nl-container" role="presentation"
          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #f9f9f9; background-image:url("images/Header_image_Back_to_School_2.png"); background-position: top center; background-size: auto; background-repeat: no-repeat;"
          width="100%">
          <tbody>
            <tr>
              <td>
                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-1"
                  role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                  <tbody>
                    <tr>
                      <td>
                        <table align="center" border="0" cellpadding="0" cellspacing="0"
                          class="row-content stack" role="presentation"
                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-radius: 0; color: #000; width: 600px; margin: 0 auto;"
                          width="600">
                          <tbody>
                            <tr>
                              <td class="column column-1"
                                style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 30px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                width="100%">
                                <table border="0" cellpadding="0" cellspacing="0"
                                  class="image_block block-1" role="presentation"
                                  style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                  width="100%">
                                  <tr>
                                    <td class="pad" style="padding-bottom:20px;width:100%;">
                                      <div align="center" class="alignment"
                                        style="line-height:10px"><img alt="Bee School logo"
                                          src="https://res.cloudinary.com/dr4iluda9/image/upload/v1691132151/sooprs/sooprs_logo_blue_side2_flxyxx.png"
                                          style="display: block; height: auto; border: 0; max-width: 314px; width: 100%;"
                                          title="Bee School logo" width="314" /></div>
                                    </td>
                                  </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0"
                                  class="divider_block block-2" role="presentation"
                                  style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                  width="100%">
                                  <tr>
                                    <td class="pad"
                                      style="padding-bottom:35px;padding-left:10px;padding-right:10px;padding-top:10px;">
                                      <div align="center" class="alignment">
                                        <table border="0" cellpadding="0" cellspacing="0"
                                          role="presentation"
                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                          width="85%">
                                          <tr>
                                            <td class="divider_inner"
                                              style="font-size: 1px; line-height: 1px; border-top: 2px solid #F2C9E3;">
                                              <span></span></td>
                                          </tr>
                                        </table>
                                      </div>
                                    </td>
                                  </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0"
                                  class="image_block block-3" role="presentation"
                                  style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                  width="100%">
                                  <tr>
                                    <td class="pad"
                                      style="padding-bottom:30px;width:100%;padding-right:0px;padding-left:0px;">
                                      <div align="center" class="alignment"
                                        style="line-height:10px"><img
                                          alt="Child with backpack" class="fullWidth"
                                          src="https://res.cloudinary.com/dr4iluda9/image/upload/v1681113271/sooprs/banner-2_muq6wi.webp"
                                          style="display: block; height: auto; border: 0; max-width: 480px; width: 100%;"
                                          title="Child with backpack" width="480" /></div>
                                    </td>
                                  </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0"
                                  class="heading_block block-4" role="presentation"
                                  style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                  width="100%">
                                  <tr>
                                    <td class="pad" style="text-align:center;width:100%;">
                                      <h1
                                        style="margin: 0; color: #2449a8; direction: ltr; font-family: "Bitter", Georgia, Times, "Times New Roman", serif; font-size: 40px; font-weight: 700; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;">
                                        <span class="tinyMce-placeholder">Write a
                                          review</span></h1>
                                    </td>
                                  </tr>
                                </table>
                                <table border="0" cellpadding="0" cellspacing="0"
                                  class="paragraph_block block-5" role="presentation"
                                  style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                  width="100%">
                                  <tr>
                                    <td class="pad"
                                      style="padding-left:10px;padding-right:15px;padding-top:15px;">
                                      <div
                                        style="color:#12275a;direction:ltr;font-family:"Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:18px;font-weight:400;letter-spacing:0px;line-height:120%;text-align:center;mso-line-height-alt:21.599999999999998px;">
                                        <p style="margin: 0;">Please write a short review to
                                          appreciate my hard work and our relation during
                                          the project time.<br />Click on below link to
                                          write something amazing:</p>
                                          '.$link.'
                                      </div>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-2"
                  role="presentation"
                  style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-position: center top;"
                  width="100%">
                  <tbody>
                    <tr>
                      <td>
                        <table align="center" border="0" cellpadding="0" cellspacing="0"
                          class="row-content stack" role="presentation"
                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #fff7fb; color: #000; width: 600px; margin: 0 auto;"
                          width="600">
                          <tbody>
                            <tr>
                              <td class="column column-1"
                                style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; background-color: #fcfcfc; padding-bottom: 25px; padding-left: 25px; padding-right: 25px; padding-top: 45px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                width="100%">
                                <table border="0" cellpadding="10" cellspacing="0"
                                  class="social_block block-1" role="presentation"
                                  style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                  width="100%">
                                  <tr>
                                    <td class="pad">
                                      <div align="center" class="alignment">
                                        <table border="0" cellpadding="0" cellspacing="0"
                                          class="social-table" role="presentation"
                                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block;"
                                          width="184px">
                                          <tr>
                                            <td style="padding:0 7px 0 7px;"><a
                                                href="https://www.facebook.com"
                                                target="_blank"><img alt="Facebook"
                                                  height="32"
                                                  src="images/facebook2x.png"
                                                  style="display: block; height: auto; border: 0;"
                                                  title="facebook"
                                                  width="32" /></a></td>
                                            <td style="padding:0 7px 0 7px;"><a
                                                href="https://www.twitter.com"
                                                target="_blank"><img alt="Twitter"
                                                  height="32"
                                                  src="images/twitter2x.png"
                                                  style="display: block; height: auto; border: 0;"
                                                  title="twitter"
                                                  width="32" /></a></td>
                                            <td style="padding:0 7px 0 7px;"><a
                                                href="https://www.linkedin.com"
                                                target="_blank"><img alt="Linkedin"
                                                  height="32"
                                                  src="images/linkedin2x.png"
                                                  style="display: block; height: auto; border: 0;"
                                                  title="linkedin"
                                                  width="32" /></a></td>
                                            <td style="padding:0 7px 0 7px;"><a
                                                href="https://www.instagram.com"
                                                target="_blank"><img alt="Instagram"
                                                  height="32"
                                                  src="images/instagram2x.png"
                                                  style="display: block; height: auto; border: 0;"
                                                  title="instagram"
                                                  width="32" /></a></td>
                                          </tr>
                                        </table>
                                      </div>
                                    </td>
                                  </tr>
                                </table>
                                <table border="0" cellpadding="10" cellspacing="0"
                                  class="paragraph_block block-2" role="presentation"
                                  style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                  width="100%">
                                  <tr>
                                    <td class="pad">
                                      <div
                                        style="color:#66787f;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:14px;line-height:120%;text-align:center;mso-line-height-alt:16.8px;">
                                        <p style="margin: 0; word-break: break-word;">Lorem
                                          ipsum dolor sit amet, consectetur adipiscing
                                          elit, sed do eiusmod tempor incididunt ut labore
                                          et dolore magna aliqua.</p>
                                      </div>
                                    </td>
                                  </tr>
                                </table>
                                <table border="0" cellpadding="10" cellspacing="0"
                                  class="paragraph_block block-3" role="presentation"
                                  style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; word-break: break-word;"
                                  width="100%">
                                  <tr>
                                    <td class="pad">
                                      <div
                                        style="color:#66787f;font-family:Arial, Helvetica Neue, Helvetica, sans-serif;font-size:14px;line-height:120%;text-align:center;mso-line-height-alt:16.8px;">
                                        <p style="margin: 0; word-break: break-word;"><a
                                            href=" http://www.example.com"
                                            rel="noopener"
                                            style="text-decoration: underline; color: #0068a5;"
                                            target="_blank">Contact Us</a> | <a
                                            href=" http://www.example.com"
                                            rel="noopener"
                                            style="text-decoration: underline; color: #0068a5;"
                                            target="_blank">Unsubscribe</a></p>
                                      </div>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <table align="center" border="0" cellpadding="0" cellspacing="0" class="row row-3"
                  role="presentation" style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%">
                  <tbody>
                    <tr>
                      <td>
                        <table align="center" border="0" cellpadding="0" cellspacing="0"
                          class="row-content stack" role="presentation"
                          style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; color: #000; width: 600px; margin: 0 auto;"
                          width="600">
                          <tbody>
                            <tr>
                              <td class="column column-1"
                                style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; font-weight: 400; text-align: left; padding-bottom: 5px; padding-top: 5px; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                width="100%">
                                <table border="0" cellpadding="0" cellspacing="0"
                                  class="icons_block block-1" role="presentation"
                                  style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                  width="100%">
                                  <tr>
                                    <td class="pad"
                                      style="vertical-align: middle; color: #9d9d9d; font-family: inherit; font-size: 15px; padding-bottom: 5px; padding-top: 5px; text-align: center;">
                                      <table cellpadding="0" cellspacing="0"
                                        role="presentation"
                                        style="mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                        width="100%">
                                        <tr>
                                          <td class="alignment"
                                            style="vertical-align: middle; text-align: center;">
                                            <!--[if vml]><table align="left" cellpadding="0" cellspacing="0" role="presentation" style="display:inline-block;padding-left:0px;padding-right:0px;mso-table-lspace: 0pt;mso-table-rspace: 0pt;"><![endif]-->
                                            <!--[if !vml]><!-->
                                            <table cellpadding="0" cellspacing="0"
                                              class="icons-inner" role="presentation"
                                              style="mso-table-lspace: 0pt; mso-table-rspace: 0pt; display: inline-block; margin-right: -4px; padding-left: 0px; padding-right: 0px;">
                                              <!--<![endif]-->
                                              <tr>
                                                <td
                                                  style="vertical-align: middle; text-align: center; padding-top: 5px; padding-bottom: 5px; padding-left: 5px; padding-right: 6px;">
                                                  <a href="https://www.designedwithbee.com/"
                                                    style="text-decoration: none;"
                                                    target="_blank"><img
                                                      align="center"
                                                      alt="Designed with BEE"
                                                      class="icon" height="32"
                                                      src="images/bee.png"
                                                      style="display: block; height: auto; margin: 0 auto; border: 0;"
                                                      width="34" /></a></td>
                                                <td
                                                  style="font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 15px; color: #9d9d9d; vertical-align: middle; letter-spacing: undefined; text-align: center;">
                                                  <a href="https://www.designedwithbee.com/"
                                                    style="color: #9d9d9d; text-decoration: none;"
                                                    target="_blank">Designed
                                                    with BEE</a></td>
                                              </tr>
                                            </table>
                                          </td>
                                        </tr>
                                      </table>
                                    </td>
                                  </tr>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </td>
            </tr>
          </tbody>
        </table><!-- End -->
      </body>
      
      </html>';
      require_once('../../send_email.php');
      $send_pass_email = send_email($email, $body, $from, $subject,$bcc);
      if ($send_pass_email == true) {
        return 1;
      } else {
        return 2;
      }
    
  }

  // submit review
  public function submit_review($rating_data,$user_name,$user_review, $customer_id, $professional_id,$lead_id)
  {

    $getquery = $this->query("select * from professional_reviews where professional_id='" . $professional_id . "' and customer_id = '" . $customer_id . "' and lead_id = '" . $lead_id . "' ");
      if ($getquery->num_rows > 0) {
          return 2;
      }
      else{

        if ($user_name == '' || $user_review == '') {
          return 1;
        } else {
          
            $getquery = $this->query("INSERT INTO `professional_reviews`(`professional_id`, `customer_id`,`review`,`rating`,`name`,`lead_id`) VALUES ('" . $professional_id . "','" . $customer_id . "','" . $user_review . "','" . $rating_data . "','" . $user_name . "','" . $lead_id . "')");
            if ($getquery) {

              // setting professional rating 
              $sql2 = $this->query("SELECT professional_reviews.professional_id,professional_reviews.customer_id,professional_reviews.name,professional_reviews.review,professional_reviews.rating,professional_reviews.created_at,professional_reviews.updated_at,professional_reviews.lead_id,professional_reviews.image FROM professional_reviews JOIN join_professionals ON professional_reviews.professional_id = join_professionals.id  WHERE professional_reviews.professional_id = '".$professional_id."'");
              
                $ratingCounts = array(
                    5 => 0,
                    4 => 0,
                    3 => 0,
                    2 => 0,
                    1 => 0,
                );
                $totalRatings = 0;
                while ($row2 = mysqli_fetch_assoc($sql2)) {
                    $starsRating = $row2['rating'];
                    $ratingCounts[$starsRating]++;
                    $totalRatings += $starsRating;
                }

                $avgrating = number_format(round(($totalRatings/$sql2->num_rows),1),1);
                $update = $this->query("UPDATE join_professionals SET rating =".$avgrating." WHERE id = '".$professional_id."'");



                return 3;
            } else {
              return 4;
            }
          
        }
    }


  }

  // rating of professional 
  public function professional_rating($id){
    $sql = $this->query("SELECT id FROM join_professionals WHERE slug = '".$id."' ");
    // $result = mysqli_query($this->dbh, $sql);
    
    if($sql->num_rows > 0){

      while($row = fetch_assoc($sql)){
      
          $sql2 = $this->query("SELECT professional_reviews.professional_id,professional_reviews.customer_id,professional_reviews.name,professional_reviews.review,professional_reviews.rating,professional_reviews.created_at,professional_reviews.updated_at,professional_reviews.lead_id,professional_reviews.image FROM professional_reviews JOIN join_professionals ON professional_reviews.professional_id = join_professionals.id  WHERE professional_reviews.professional_id = '".$row['id']."'");
          
          if($sql2->num_rows > 0){
              // $row2 = mysqli_fetch_assoc($result2);        
              // if (mysqli_num_rows($result2) > 0) {
                  $reviewdata = [];
                  $ratingCounts = array(
                      5 => 0,
                      4 => 0,
                      3 => 0,
                      2 => 0,
                      1 => 0,
                  );
                  $totalRatings = 0;
                  while ($row2 = mysqli_fetch_assoc($result2)) {
                      $starsRating = $row2['rating'];
                      $ratingCounts[$starsRating]++;
                      $totalRatings += $starsRating;                        

                      $reviewdata[] = $row2;        

                  }

                  $avgrating = number_format(round(($totalRatings/mysqli_num_rows($result2)),1),1);
                  return ['reviewdata'=>$reviewdata,'ratingCounts'=>$ratingCounts,'avgrating'=>$avgrating];        
              // } else {
              //     return false;
              // }
          }else{
            return 2;
          }
      }

    }else{
      return 1;
    }

  }

// Switch now button 
  public function switch_account($switchAccEmail)
  {
    
      
      $getquery = $this->query("Select * from join_professionals where email = '" . $switchAccEmail . "'");

      if ($getquery->num_rows > 0) {
          $row = $getquery->fetch_assoc();          

          if($row['is_buyer'] == 0){
            $update = $this->query("UPDATE join_professionals SET is_buyer = 1 WHERE email = '".$switchAccEmail."'");
          }else if($row['is_buyer'] == 1){         
            $update = $this->query("UPDATE join_professionals SET is_buyer = 0 WHERE email = '".$switchAccEmail."'");
          }
          if ($update) {
            // return "succes here";
            return 2; // account switched successfully
          } else {
            return 3; //error in creating topic record
          }
      } else {
        return 1; // professional not found
      }

    
  }



  public function before_view_lead($id,$pid)
  {
    $getquery = $this->query("select * from my_leads where professional_id='" . $pid . "'  and lead_id = '" . $id . "' ");
    
      if ($getquery->num_rows > 0) {
          return 2;
      }
      else{        
        $addquery = $this->query("insert into my_leads (professional_id,lead_id) values ('" . $pid . "','" . $id . "')");
        return "excited";
        if ($addquery) {
          return 3;
        } else {
          return 4;
        }        
    }
  }


  // delete portfolio 
  public function delete_portfolio($id)
  {
    $get = $this->query("Select * from professional_portfolios where id = '" . $id . "'");
    if ($get->num_rows > 0) {     
        //delete 
        $delete = $this->query("DELETE FROM professional_portfolios where id = '" . $id . "'");
        if ($delete) {
          return 2; //deleted
        } else {
          return 3; //not deleted
        }
    }else{
      return 1;
    }
  }



  public function customerProfChat($cust_id,$bid_id,$lead_id,$message,$prof_id, $file)
  {
    
    if($file){      
     
        $msgSlashes = addslashes($message);
        $message = $this->hideSensitiveInfo($msgSlashes);
          $get_query = $this->query("select * from join_professionals where id='" . $cust_id . "'");
          
          if ($get_query->num_rows == 1) {          
            $get_results = $this->query("INSERT INTO `cust_prof_chats`(`lead_id`, `cust_id`, `prof_id`,`bid_id`, `message`, `file`,`extension`, `reply`, `created_at`) VALUES ('$lead_id','$cust_id','$prof_id','$bid_id','$message','$file','$fileExtension','', now())");
            
            if ($get_results) {
              $msgTo = $this->query("select id,professional_id from my_leads where id='" . $bid_id . "'");
              $msgToAssoc = mysqli_fetch_assoc($msgTo);

              $msgToProf = $this->query("select id,name,slug from join_professionals where id='" . $msgToAssoc['professional_id'] . "'");
              $msgToAssocProf = mysqli_fetch_assoc($msgToProf);

              $leadMsgOn = $this->query("select id,project_title from lead where id='" . $lead_id . "'");
              $msgOnLeadAssoc = mysqli_fetch_assoc($leadMsgOn);

              $chatMsgNotiTo = $this->query("select * from cust_prof_chats where lead_id='" . $lead_id . "' AND prof_id='" . $prof_id . "' AND bid_id='" . $bid_id . "' AND status = 0");
              $chatMsgNotiToAssoc = mysqli_fetch_assoc($chatMsgNotiTo);

              $this->log_notification($chatMsgNotiToAssoc['prof_id'],3,"You got a new message on ".$msgOnLeadAssoc['project_title'],$msgOnLeadAssoc['id'],$bid_id);
              $lastInsertedId = mysqli_insert_id(self::$connection);
              $prevChat = $this->query("select max(id) from cust_prof_chats where id < '".$lastInsertedId."'");

              $prevRowResult = '';
              while($prevRowAssoc = $prevChat->fetch_assoc()){
                $prevRowResult = $prevRowAssoc['max(id)'];
              }


              $sql = $this->query("update cust_prof_chats SET status = 1 where id = '".$prevRowResult."'");

              $get_chat = $this->query("select * from cust_prof_chats where lead_id ='" . $lead_id . "'and bid_id ='" . $bid_id . "' and cust_id ='" . $cust_id . "'");
              if($get_chat){

                $row = $get_chat->fetch_assoc(); 
                return $row; //success    
              }else{
                return 4;
              }
              

            } else {
              return 7; // error 
            }
          } else {            
            return 5;
          }
      
        
    }else{
      $msgSlashes = addslashes($message);
      $message = $this->hideSensitiveInfo($msgSlashes);

      $get_query = $this->query("select * from join_professionals where id='" . $cust_id . "'");
      
      if ($get_query->num_rows == 1) {          
        $get_results = $this->query("INSERT INTO `cust_prof_chats`(`lead_id`, `cust_id`, `prof_id`,`bid_id`, `message`,`extension`, `reply`, `created_at`) VALUES ('$lead_id','$cust_id','$prof_id','$bid_id','$message','$fileExtension','', now())");
        
        if ($get_results) {
          $msgTo = $this->query("select id,professional_id from my_leads where id='" . $bid_id . "'");
          $msgToAssoc = mysqli_fetch_assoc($msgTo);

          $msgToProf = $this->query("select id,name,slug from join_professionals where id='" . $msgToAssoc['professional_id'] . "'");
          $msgToAssocProf = mysqli_fetch_assoc($msgToProf);

          $leadMsgOn = $this->query("select id,project_title from lead where id='" . $lead_id . "'");
          $msgOnLeadAssoc = mysqli_fetch_assoc($leadMsgOn);

          $chatMsgNotiTo = $this->query("select * from cust_prof_chats where lead_id='" . $lead_id . "' AND prof_id='" . $prof_id . "' AND bid_id='" . $bid_id . "' AND status = 0");
          $chatMsgNotiToAssoc = mysqli_fetch_assoc($chatMsgNotiTo);

          $this->log_notification($chatMsgNotiToAssoc['prof_id'],3,"You got a new message on ".$msgOnLeadAssoc['project_title'],$msgOnLeadAssoc['id'],$bid_id);
          $lastInsertedId = mysqli_insert_id(self::$connection);
          $prevChat = $this->query("select max(id) from cust_prof_chats where id < '".$lastInsertedId."'");

          $prevRowResult = '';
          while($prevRowAssoc = $prevChat->fetch_assoc()){
            $prevRowResult = $prevRowAssoc['max(id)'];
          }


          $sql = $this->query("update cust_prof_chats SET status = 1 where id = '".$prevRowResult."'");

          $get_chat = $this->query("select * from cust_prof_chats where lead_id ='" . $lead_id . "'and bid_id ='" . $bid_id . "' and cust_id ='" . $cust_id . "'");
          if($get_chat){

            $row = $get_chat->fetch_assoc(); 
            return $row; //success    
          }else{
            return 4;
          }
          

        } else {
          return 7; // error 
        }
      } else {
        
        return 5;
      }
    }
    
        
      
    
  }



  public function log_notification($user_id,$notification_type,$msg, $lead_id = null, $bid_id = null){
    
    $get = $this->query("INSERT INTO `notifications`(`user_id`, `notification_type`,`msg`,`lead_id`,`bid_id`, `created_at`) VALUES ('".$user_id."','".$notification_type."','".$msg."','".$lead_id."','".$bid_id."', now())");

    if ($get) {
      
      return 6;
    } else {
      return 7;
    }  

  }


  public function contactUsQuery($name,$email,$phone,$message){

    if($name == "" || $email == "" || $phone == ""){
        return 5;
    }
    
    $get = $this->query("INSERT INTO `contact_us_queries`(`name`, `email`,`phone`,`message`, `created_at`) VALUES ('".$name."','".$email."','".$phone."','".$message."', now())");

    if ($get) {
      
      return 6;
    } else {
      return 7;
    }  

  }

    public function book_business_demo($name,$email,$phone,$message){

    if($name == "" || $email == "" || $phone == ""){
        return 5;
    }
    
    $get = $this->query("INSERT INTO `business_demos`(`name`, `email`,`phone`,`message`, `created_at`) VALUES ('".$name."','".$email."','".$phone."','".$message."', now())");

    if ($get) {
      
      return 6;
    } else {
      return 7;
    }  

  }

  function createMailBody($rows){
    $body = ''; // Initialize an empty string for the email body

    foreach ($rows as $project) {
        $title = $project['project_title'];
        $description = $project['description'];
        if((strlen($project['description'] > 250))){
          $cutDesc = substr($project['description'],0,250);
          $description = $cutDesc; 
        }
        $minBudget = $project['min_budget'];
        $maxBudget = $project['max_budget_amount'];
        $link = "https://sooprs.com/browse-job"; 
        

        // Build the HTML for each project
        $body .= "<tr>";
        $body .= "<td width=\"16\"></td>";
        $body .= "<td align=\"left\" height=\"86\" style=\"padding:16px 0\" valign=\"top\" width=\"440\">";
        $body .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tbody>";
        $body .= "<tr><td><a href=\"$link\"><span style=\"color:#007fed;font-weight:bold\">$title</span></a></td></tr>";
        $body .= "<tr><td height=\"4\"> </td></tr>";
        $body .= "<tr><td><span style=\"color:#000000;font-family:Helvetica,Arial,sans-serif;font-size:12px;font-weight:normal;line-height:1.5\">$description</span></td></tr>";
        $body .= "<tr><td height=\"4\"></td></tr>";
        $body .= "</tbody></table></td>";
        $body .= "<td width=\"16\"></td>";
        $body .= "<td align=\"left\" style=\"padding:16px 0\" valign=\"top\" width=\"130\">";
        $body .= "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><tbody>";
        $body .= "<tr><td><span style=\"color:#000000;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:bold;line-height:1.5\"> $ $minBudget - $maxBudget </span></td></tr>";
        $body .= "<tr><td height=\"4\"></td></tr>";
        $body .= "<tr><td align=\"left\" style=\"white-space:nowrap\"><table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\"><tbody>";
        $body .= "<tr><td align=\"center\" bgcolor=\"#006AFF\"><a href=\"$link\" style=\"border:1px solid #006AFF;display:inline-block;padding:5px 10px;text-decoration:none\"><span style=\"color:#ffffff;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:bold;line-height:1.5\">Bid now</span></a></td></tr>";
        $body .= "</tbody></table></td></tr></tbody></table></td>";
        $body .= "<td width=\"16\"></td></tr><tr><td bgcolor=\"#cccccc\" colspan=\"5\" height=\"1\" style=\"margin:0;padding:0;font-size:0;line-height:0\"></td></tr>";
    }

    return $body;
 }


// sending mail to related professionals on new project arrival 
  public function mailToProfessionals()
  {
    $template_path = '../../email-templates/list-of-matching-projects.html';
    $template = file_get_contents($template_path);
    
    
    $twentyFourHoursAgo = date('Y-m-d H:i:s', strtotime('-1 hour'));   
    // fetching Leads  
    $sql = $this->query("SELECT `project_title`, `description`, `min_budget`, `max_budget_amount`, `category`, `id` FROM `lead` WHERE `created_at` >= '".$twentyFourHoursAgo."' AND `is_sent_to_professionals` = 0");

    $rows = array(); 

    if($sql){
      while ($row = $sql->fetch_assoc()) {
          $professionals = array();
          $sqlProf = $this->query("SELECT email FROM `join_professionals` WHERE FIND_IN_SET('" . $row['category'] . "', `services`) > 0");
          while($profRow = $sqlProf->fetch_assoc()){
            $professionals[] = $profRow['email'];
          }         


          $row['professionals'] = $professionals;
          $rows[] = $row; 

      }
    }

   if(count($rows) !== 0){
     // attaching leads to mail body 
     $mailBody = $this->createMailBody($rows);
     // Replace placeholders in the email template with the mail body
     $template = str_replace('{projectRecords}', $mailBody, $template);
 
 
     // sending mail here           
     // $template = str_replace('{password}', $pass_in_mail, $template);
     $professionalEmails = $professionals;
     $bcc = $professionalEmails;
     $from = 'contact@sooprs.com';
     $subject = 'Here are the matching projects with your skills';
     $title = 'Matching Projects';
     $body = $template;
     require_once('../../send_email.php');
     $send_pass_email = send_email($to, $body, $from, $subject,$bcc);
     if ($send_pass_email == true) {
 
       foreach ($rows as $one) {
         // Example of updating a column named 'email_sent' to 1
         // Modify this as per your database structure
         $this->query("UPDATE `lead` SET `is_sent_to_professionals` = 1 WHERE `id` = '".$one['id']."'");
       }       
       
       return 1;
     } 
     else {
       return 2;
     }
 
   }
   else{
      return 3;
   }

    

   
  }

  // sending mail to related professionals on new project arrival 
  public function mailToProfessionalsTopTen()
  {
    error_log("Entered in Top Ten projects function");
    $template_path = '../../email-templates/list-of-matching-projects.html';
    $template = file_get_contents($template_path);
    
    
    // $twentyFourHoursAgo = date('Y-m-d H:i:s', strtotime('-1 hour'));   
    // fetching Leads  
    $sql = $this->query("SELECT `project_title`, `description`, `min_budget`, `max_budget_amount`, `category`, `id` FROM `lead` ORDER BY `id` DESC LIMIT 10");

    $rows = array(); 
    $professionals = array();

    if($sql){
      while ($row = $sql->fetch_assoc()) {
          $sqlProf = $this->query("SELECT email FROM `join_professionals`");
          while($profRow = $sqlProf->fetch_assoc()){
            if ($this->isValidEmail($profRow['email'])) {
                
                $professionals[] = $profRow['email'];
            }
          }         


          $row['professionals'] = $professionals;
          $rows[] = $row; 

      }
    }

   if(count($rows) !== 0){
     // attaching leads to mail body 
     $mailBody = $this->createMailBody($rows);
     // Replace placeholders in the email template with the mail body
     $template = str_replace('{projectRecords}', $mailBody, $template);

 
     // sending mail here           
     // $template = str_replace('{password}', $pass_in_mail, $template);
     $professionalEmails = $professionals;
      //  $professionalEmails = ['smsunnythefunny@gmail.com','sandeep.meh28@gmail.com'];

     $bcc = $professionalEmails;
     $from = 'contact@sooprs.com';
     $subject = 'Here are the matching projects with your skills';
     $title = 'Matching Projects';
     $body = $template;
     require_once('../../send_email.php');
     $send_pass_email = send_email($to, $body, $from, $subject,$bcc);
     if ($send_pass_email == true) {
        error_log("Top Ten projects mail sent");
      
       foreach ($rows as $one) {
         // Example of updating a column named 'email_sent' to 1
         // Modify this as per your database structure
         $this->query("UPDATE `lead` SET `is_sent_to_professionals` = 1 WHERE `id` = '".$one['id']."'");
       }       
       
       return 1;
     } 
     else {
        error_log("Top Ten projects mail not sent");

       return 2;
     }
 
   }
   else{
      error_log("No top ten projects found");

      return 3;
   }

    

   
  }

  public function add_milestone($milestones,$user_id,$leadId)
  {
        $check_user_milestone_query = $this->query("Select * from user_milestones where user_id = '" . $user_id . "'");   
        if ($check_user_milestone_query->num_rows > 0) {
          return 5;
        } 

   

        $currentDateTime = date("Ymd_His");
        $randomString = "milestone_" . substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 5) . "_" . $currentDateTime;

        $get_user_query = $this->query("Select id,email from join_professionals where id = '" . $user_id . "'");
        $user_email = '';
        if ($get_user_query->num_rows > 0) {
          $get_professional_row = $get_user_query->fetch_assoc();
          $user_email =  $get_professional_row['email'];
        } 

        $get_project_query = $this->query("Select id,project_title from lead where id = '" . $leadId . "'");
        $project_t = '';
        if ($get_project_query->num_rows > 0) {
          $get_project_row = $get_project_query->fetch_assoc();
          $project_t =  $get_project_row['project_title'];
        } 


        // $addMilestonequery = $this->query("insert into user_milestones (milestone_id,user_id,project_id,created_at) values ('" . $randomString . "','" . $user_id . "','" . $leadId . "',now())");


        // if ($addMilestonequery) {
          $successFlag = true; // Flag to track the success of insertion process
          foreach ($milestones as $milestone) {
            $amount = $milestone['amount'];
            $milestone_name = $milestone['milestone_name'];
            $milestone_id = $randomString;
            $deadline = $milestone['deadline'];             
            $remark = $milestone['remark'];             

           
            $addquery = $this->query("insert into milestones (milestone_id,user_id,project_id,milestone_name,milestone_deadline,remark,milestone_amount,created_at) values ('" . $milestone_id . "','" . $user_id . "','" . $leadId . "','" . $milestone_name . "','" . $deadline . "','" . $remark . "','" . $amount . "',now())");
            if(!$addquery){
              $successFlag = false;
              break;
            }
          }

          $this->send_milestones_email($user_email,$project_t);          
          return 3;
        // } else {
        //   return 4;
        // }      

        
     
  }


  public function edit_milestone($milestones,$user_id,$leadId)
  {
        $check_user_milestone_query = $this->query("Select * from milestones where project_id = '" . $leadId . "'");   
        if ($check_user_milestone_query->num_rows > 0) {
          $deletequery = $this->query("DELETE FROM `milestones` WHERE project_id='" . $leadId . "'");
          if ($deletequery) {

            $currentDateTime = date("Ymd_His");
            $randomString = "milestone_" . substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 5) . "_" . $currentDateTime;

            $get_user_query = $this->query("Select id,email from join_professionals where id = '" . $user_id . "'");
            $user_email = '';
            if ($get_user_query->num_rows > 0) {
              $get_professional_row = $get_user_query->fetch_assoc();
              $user_email =  $get_professional_row['email'];
            } 

            $get_project_query = $this->query("Select id,project_title from lead where id = '" . $leadId . "'");
            $project_t = '';
            if ($get_project_query->num_rows > 0) {
              $get_project_row = $get_project_query->fetch_assoc();
              $project_t =  $get_project_row['project_title'];
            } 

            foreach ($milestones as $milestone) {
              $amount = $milestone['amount'];
              $milestone_name = $milestone['milestone_name'];
              $milestone_id = $randomString;
              $deadline = $milestone['deadline'];             
              $remark = $milestone['remark'];             

            
              $addquery = $this->query("insert into milestones (milestone_id,user_id,project_id,milestone_name,milestone_deadline,remark,milestone_amount,created_at) values ('" . $milestone_id . "','" . $user_id . "','" . $leadId . "','" . $milestone_name . "','" . $deadline . "','" . $remark . "','" . $amount . "',now())");
              if(!$addquery){
                return 2;
              }
            }

            $this->send_milestones_email($user_email,$project_t);          
            return 3;
          
            } else {
              return 1;
            }
            
          } 
     
  }

  public function add_requirements($project_id,$description,$profile_pic)
  {
        $desc = addslashes($description);
        $paragraphWithHiddenInfo = $this->hideSensitiveInfo($desc);
        if($profile_pic){          
          
          $checkQuery = $this->query("select * from project_requirements where project_id = '" . $project_id . "'");
          if($checkQuery->num_rows > 0){
            
            $updateRequirements = $this->query("UPDATE project_requirements SET description = '" . $paragraphWithHiddenInfo . "', file = '" . $profile_pic . "' WHERE project_id = '".$project_id."'");
            if($updateRequirements){
              return 1;
            }else{
              return 2;
            }
          }else{
            $addquery = $this->query("insert into project_requirements (project_id,description,file,created_at) values ('" . $project_id . "','" . $paragraphWithHiddenInfo . "','" . $profile_pic . "',now())");
          
            if ($addquery) {  
              // $getTnx = $this->query("select * from credit_transaction where customer_id = '" . $id . "'");
              // $totalCredits = 0;
              // if ($getTnx->num_rows > 0) {  
              //   while ($results = $getTnx->fetch_assoc()) {
              //     $new_results[] = $results;
              //   }   
              //   $sizeOfRes = sizeof($new_results);   
              //   for ($i = 0; $i < $sizeOfRes; $i++) {
              //     if ($new_results[$i]["tnx_type"] == 1 && $new_results[$i]["tnx_status"] == 3) {
              //       $totalCredits += $new_results[$i]["cr_amount"];
              //     }
              //   }  
              // }  
              return 3;
            } else {
              return 4;
            }       
          }             
          
        }else{
          $checkQuery = $this->query("select * from project_requirements where project_id = '" . $project_id . "'");
          if($checkQuery->num_rows > 0){
            
            $updateRequirements = $this->query("UPDATE project_requirements SET description = '" . $paragraphWithHiddenInfo . "' WHERE project_id = '".$project_id."'");
            if($updateRequirements){
              return 1;
            }else{
              return 2;
            }
          }else{
            $addquery = $this->query("insert into project_requirements (project_id,description,created_at) values ('" . $project_id . "','" . $paragraphWithHiddenInfo . "',now())");
          
            if ($addquery) {  
              // $getTnx = $this->query("select * from credit_transaction where customer_id = '" . $id . "'");
              // $totalCredits = 0;
              // if ($getTnx->num_rows > 0) {  
              //   while ($results = $getTnx->fetch_assoc()) {
              //     $new_results[] = $results;
              //   }   
              //   $sizeOfRes = sizeof($new_results);   
              //   for ($i = 0; $i < $sizeOfRes; $i++) {
              //     if ($new_results[$i]["tnx_type"] == 1 && $new_results[$i]["tnx_status"] == 3) {
              //       $totalCredits += $new_results[$i]["cr_amount"];
              //     }
              //   }  
              // }  
              return 3;
            } else {
              return 4;
            }       
          }  
        }

        
     
  }



  public function reviewButtonEnable($lead_id){
    $getMilestones = $this->query("SELECT id FROM `milestones` WHERE `project_id`='".$lead_id."'");
    if($getMilestones->num_rows > 0){
      $getIncompMilestones = $this->query("SELECT id FROM `milestones` WHERE `project_id`='".$lead_id."' AND `is_completed`=0");
      if($getIncompMilestones->num_rows > 0){
        return 2; // in-complete milestones are present
      }else{
        return 1; // all milestones completed
      }
    }else{
      return 0; // no milestones with this project_id
    }
  }
  public function checkProjectStatus($lead_id){
    $getMilestones = $this->query("SELECT id,project_status FROM `lead` WHERE `id`='" . $lead_id . "'");
    if($getMilestones->num_rows > 0){
      while($row = $getMilestones->fetch_assoc()){
        return $row;
      }
    }else{
      return 0;
    }
  }


  public function project_reviewed($lead_id){
    $updateLeadStatus = $this->query("UPDATE lead SET project_status = 3 WHERE id = '".$lead_id."'");
    if($updateLeadStatus){
      return 1;
    }else{
      return 0;
    }
  }


   // customer registration
   public function gig_create($professional_id,$gig_title, $gig_main_category, $gig_sub_category,$gig_technologies, $gig_price, $gig_desc, $gig_tags, $gig_declaration, $file,$gig_file,$gig_type)
   {       
      if($gig_title == ''|| $gig_main_category == ''|| $gig_sub_category == '' || $gig_technologies == '' || $gig_price == '' || $gig_desc == '' || $gig_declaration == ''){
        return 5;
      } 
      if($gig_type == 2){

        if( $gig_file == ''){
          return 5;
        } 
      }

      $slug = $this->generateUniqueGigSlug($gig_title, $this);
      $technologies_string = implode(',',$gig_technologies);
      $gig_tags_string = implode(',',$gig_tags);
      $filter_title = addslashes(strip_tags(trim($gig_title)));
      $filter_description = addslashes(strip_tags(trim($gig_desc)));


      $gig_uuid = $this->gig_uuid();

      if($gig_type == 2){
       $insertQuery = $this->query("INSERT INTO `professional_gigs` (`gig_unique_id`,`professional_id`,`gig_title`,`gig_slug`, `gig_main_category`, `gig_sub_category`, `gig_technologies`, `gig_price`, `gig_desc`, `gig_tags`, `gig_declaration`,`gig_img`,`gig_file`,`gig_type`, `created_at`) VALUES ('" . $gig_uuid . "','" . $professional_id . "','" . $filter_title . "','" . $slug . "','" . $gig_main_category. "','" . $gig_sub_category . "','" . $technologies_string . "','" . $gig_price. "','" . $filter_description . "','" . $gig_tags_string. "','" . $gig_declaration . "','" . $file . "','" . $gig_file . "','" . $gig_type . "', now())");

      }else{

        $insertQuery = $this->query("INSERT INTO `professional_gigs` (`gig_unique_id`,`professional_id`,`gig_title`,`gig_slug`, `gig_main_category`, `gig_sub_category`, `gig_technologies`, `gig_price`, `gig_desc`, `gig_tags`, `gig_declaration`,`gig_img`, `created_at`) VALUES ('" . $gig_uuid . "','" . $professional_id . "','" . $filter_title . "','" . $slug . "','" . $gig_main_category. "','" . $gig_sub_category . "','" . $technologies_string . "','" . $gig_price. "','" . $filter_description . "','" . $gig_tags_string. "','" . $gig_declaration . "','" . $file . "', now())");
      }
 
       if ($insertQuery) {
        //  $this->send_signup_email_users($email, $email_otp,'');
         return 6;
       } else {
         return 7;
       }
   }


   // get_my_gigs from db
  public function get_my_gigs($professional_slug)
  {
    $get_query = $this->query("Select * from professional_gigs where gig_status = 1 AND professional_id='".$professional_slug."'");

    if ($get_query->num_rows > 0) {
      while ($get_row = $get_query->fetch_assoc()) {
        $results[] = $get_row;
      }

      return $results;


    } else {
      return 2; //no record
    }
  }


  public function delete_gig($gig_id)
  {
    $checkquery = $this->query("Select `gig_id` FROM `professional_gigs` WHERE gig_unique_id='" . $gig_id . "'");
    if($checkquery->num_rows < 0){
        return 3;
    }

    $getquery = $this->query("DELETE FROM `professional_gigs` WHERE gig_unique_id='" . $gig_id . "'");
    if ($getquery) {
      return 2;
    } else {
      return 1;
    }

  }


   // get_all_gigs from db
   public function get_all_gigs($offset,$limit)
   {
     $get_query = $this->query("SELECT * FROM `professional_gigs` WHERE `gig_status` = 1 LIMIT ".$offset.",".$limit);
 
     if ($get_query->num_rows > 0) {
        $results = [];
        while ($get_row = $get_query->fetch_assoc()) {

          $get_professional = $this->query("Select * from join_professionals where status = 1 AND slug='".$get_row['professional_id']."'");
          if($get_professional->num_rows > 0){
              while($get_professional_assoc = $get_professional->fetch_assoc()){
                $get_row['professional'] = $get_professional_assoc;
              }
              // return $results;
          }    
          
          $main_cat_name = $this->getServiceDataById($get_row["gig_main_category"]);
          $get_row['main_category'] = $main_cat_name['service_name'];
          
          $results[] = $get_row;
        }
        // checking if more records are present
        // Query to get the total number of records
        $total_query = $this->query("SELECT COUNT(*) AS total FROM `professional_gigs` WHERE `gig_status` = 1");
        $total_row = $total_query->fetch_assoc();
        $total_records = $total_row['total']; 
        $has_more = ($offset + $limit) < $total_records;

        $total_gigs = $this->query("SELECT count(*) AS totalGigs FROM `professional_gigs` WHERE `gig_status` = 1");
        $total_row_gigs = $total_gigs->fetch_assoc();
        $total_gigs_in_table = $total_row_gigs['totalGigs'];

        $results['count'] = count($results);
        $results['all_total_gigs'] = (int)$total_gigs_in_table;

        $results['has_more'] = $has_more;
        return $results;
  
     } else {
       return 2; //no record
     }
   }



   // get_all_gigs from db
   public function get_gig_details($gigId)
   {
     $get_query = $this->query("Select * from professional_gigs where gig_status = 1 AND gig_unique_id='".$gigId."'");
 
     if ($get_query->num_rows > 0) {
        
        while ($get_row = $get_query->fetch_assoc()) {

          $skills_name_array = $this->getSkillsData($get_row["gig_technologies"]);
          $get_row['technologies'] = $skills_name_array;

          
          $main_cat_name = $this->getServiceDataById($get_row["gig_main_category"]);
          $get_row['main_category'] = $main_cat_name['service_name'];

          $sub_cat_name = $this->getServiceDataById($get_row["gig_sub_category"]);
          $get_row['sub_category'] = $sub_cat_name['service_name'];

          if($get_row["gig_tags"] !== ""){

            $get_row['tags_array'] = explode(',',$get_row["gig_tags"]);
          }else{
            $get_row['tags_array']  = null;
          }

          $get_prof = $this->query("Select * from join_professionals where slug='".$get_row['professional_id']."'");
          if($get_prof->num_rows > 0){
            while ($get_prof_row = $get_prof->fetch_assoc()) {
              $get_row['professional'] = $get_prof_row;
            }
          }

          $results = $get_row;
        }
        return $results;
  
     } else {
       return 2; //no record
     }
   }



   public function search_gig($keyword)
   {
    $get_query = $this->query("Select * from professional_gigs where gig_status = 1 AND gig_tags LIKE '%" . $keyword . "%' OR gig_title LIKE '%" . $keyword . "%' OR gig_desc LIKE '%" . $keyword . "%'");
 
     if ($get_query->num_rows > 0) {
        $results = [];
        while ($get_row = $get_query->fetch_assoc()) {

          $get_professional = $this->query("Select * from join_professionals where status = 1 AND slug='".$get_row['professional_id']."'");
          if($get_professional->num_rows > 0){
              while($get_professional_assoc = $get_professional->fetch_assoc()){
                $get_row['professional'] = $get_professional_assoc;
              }
              // return $results;
          }      
          $results[] = $get_row;
        }
        $results['count'] = count($results);
        return $results;
  
     } else {
       return 2; //no record
     }
   }



   public function live_search_gig($keyword)
   {
    $get_query = $this->query("Select gig_title from professional_gigs where gig_status = 1 AND gig_tags LIKE '%" . $keyword . "%' OR gig_title LIKE '%" . $keyword . "%' OR gig_desc LIKE '%" . $keyword . "%'");
 
     if ($get_query->num_rows > 0) {
        $results = [];
        while ($get_row = $get_query->fetch_assoc()) {

          $get_professional = $this->query("Select * from join_professionals where status = 1 AND slug='".$get_row['professional_id']."'");
          if($get_professional->num_rows > 0){
              while($get_professional_assoc = $get_professional->fetch_assoc()){
                $get_row['professional'] = $get_professional_assoc;
              }
              // return $results;
          }      
          $results[] = $get_row;
        }

        

        $results['count'] = count($results);
        $html = '<ul class="live_li">';
        foreach ($results as $result) {
            $html .= '<li>' . htmlspecialchars($result['gig_title']) . ' by ' . htmlspecialchars($result['professional']['name']) . '</li>';
        }
        $html .= '</ul>';
        $results['html'] = $html;

        return $results;
  
     } else {
       return 2; //no record
     }
   }

   public function filter_gig_main_cat($id)
   {
    // $get_query = $this->query("SELECT id,name,slug,services,skills,listing_about,image FROM join_professionals WHERE is_buyer = 0 AND is_verified = 1 AND FIND_IN_SET('$id', services) > 0");

    $get_query = $this->query("Select * from professional_gigs where gig_status = 1 AND gig_main_category ='".$id."'");
 
     if ($get_query->num_rows > 0) {
        $results = [];
        while ($get_row = $get_query->fetch_assoc()) {

          $get_professional = $this->query("Select * from join_professionals where status = 1 AND slug='".$get_row['professional_id']."'");
          if($get_professional->num_rows > 0){
              while($get_professional_assoc = $get_professional->fetch_assoc()){
                $get_row['professional'] = $get_professional_assoc;
              }
              // return $results;
          }      
          $results[] = $get_row;
        }
        $results['count'] = count($results);
        return $results;
  
     } else {
       return 2; //no record
     }
   }


   public function filter_gig_sub_cat($id)
   {
    // $get_query = $this->query("SELECT id,name,slug,services,skills,listing_about,image FROM join_professionals WHERE is_buyer = 0 AND is_verified = 1 AND FIND_IN_SET('$id', services) > 0");

    $get_query = $this->query("Select * from professional_gigs where gig_status = 1 AND gig_sub_category ='".$id."'");
 
     if ($get_query->num_rows > 0) {
        $results = [];
        while ($get_row = $get_query->fetch_assoc()) {

          $get_professional = $this->query("Select * from join_professionals where status = 1 AND slug='".$get_row['professional_id']."'");
          if($get_professional->num_rows > 0){
              while($get_professional_assoc = $get_professional->fetch_assoc()){
                $get_row['professional'] = $get_professional_assoc;
              }
              // return $results;
          }      
          $results[] = $get_row;
        }
        $results['count'] = count($results);
        return $results;
  
     } else {
       return 2; //no record
     }
   }



    // bank details add
  public function add_bank_details($id, $user, $bank_name, $account_no, $ifsc)
  {

    if ($user == '' || $bank_name == '' || $account_no == '' || $ifsc == '') {
      return 1;
    }

    // checking if details already exists 
    $check = $this->query("SELECT `user` FROM `user_bank_details` WHERE `user` = '$user'");


    if ($check->num_rows > 0) {      
      $save = $this->query("UPDATE `user_bank_details` SET `user` = '" . $user . "',`bank_name` = '" . $bank_name . "',`account_no` = '" . $account_no . "',`ifsc` = '" . $ifsc . "' WHERE user = '" . $user . "'");
      if ($save === TRUE) {        
        return 6;
      } else {
        return 7;
      }

    } else {
      //  $email_otp = mt_rand(1000, 9999);
      $save = $this->query("INSERT INTO `user_bank_details`(`user`, `bank_name`,`account_no`,`ifsc`, `created_at`) VALUES ('" . $user . "','" . $bank_name . "','" . $account_no . "','" . $ifsc . "', now())");

      if ($save === TRUE) {
        //  $this->send_signup_email_users($email, $email_otp, '');
        return 6;
      } else {
        return 7;
      }
    }



  }


  public function get_bank_details($user){
    if($user == ''){
      return 1;
    }

    $get = $this->query("SELECT user,bank_name,account_no, ifsc FROM `user_bank_details` WHERE `user` = '" . $user ."'");
    if($get->num_rows > 0) {
      $get_row = $get->fetch_assoc();
      return $get_row;
    }else{
      return 2;
    }
  }


  public function wallet_balance($auth_user_slug)
  {
    if ($auth_user_slug == '' || $auth_user_slug == null) {
      return 0;
    } else {
      $sql = "SELECT slug, wallet FROM join_professionals WHERE slug = '$auth_user_slug'";
    }

    $result = $this->query($sql);

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      return $row;
    } else {
      return 1;
    }
  }







}