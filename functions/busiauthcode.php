<?php
session_start();
include('../config/dbcon.php');
include('businessfunctions.php');

if(isset($_POST['business_register_btn']))
{
    $business_name = mysqli_real_escape_string($con,$_POST['business_name']);
    $business_address = mysqli_real_escape_string($con,$_POST['business_address']);
    $municipalityid = mysqli_real_escape_string($con,$_POST['municipalityid']);
    $business_number = mysqli_real_escape_string($con,$_POST['business_number']);
    $duration = $_POST['duration'];
    $latitude = $_POST["latitude"];
    $longitude = $_POST["longitude"];
    $cuisinename = $_POST['cuisinename'];
    $opening = $_POST['opening'];
    $closing = $_POST['closing'];
    $business_firstname = mysqli_real_escape_string($con,$_POST['business_firstname']);
    $business_lastname = mysqli_real_escape_string($con,$_POST['business_lastname']);
    $business_email = mysqli_real_escape_string($con,$_POST['business_email']);
    $business_phonenumber = mysqli_real_escape_string($con,$_POST['business_phonenumber']);
    $business_owneraddress = mysqli_real_escape_string($con,$_POST['business_owneraddress']);
    $business_password = mysqli_real_escape_string($con,$_POST['business_password']);
    $business_confirmpassword = mysqli_real_escape_string($con,$_POST['business_confirmpassword']);
    $status = isset($_POST['status']) ? "0":"1";
    $verify_token = md5(rand());

    $business_data = 'business_name='.$business_name.'&business_address='.$business_address.'&municipalityid='.$municipalityid.'$latitude='.$latitude.'$longitude='.$longitude.'&cuisinename='.$cuisinename .'&opening='.$opening.'&closing='.$closing.'&business_firstname='.$business_firstname.'&business_lastname='.$business_lastname.'&business_phonenumber='.$business_phonenumber.'&business_owneraddress='.$business_owneraddress.'&business_email='.$business_email.'&duration='.$duration.'&business_number='.$business_number;
     // Get Image Dimension
     $fileinfo = @getimagesize($_FILES["image"]["tmp_name"]);
     $fileinfo = @getimagesize($_FILES["image_cert"]["tmp_name"]);
     $fileinfo = @getimagesize($_FILES["image_scert"]["tmp_name"]);
     $fileinfo = @getimagesize($_FILES["image_fcert"]["tmp_name"]);
     $fileinfo = @getimagesize($_FILES["image_bcert"]["tmp_name"]);

     $allowed_image_extension = array(
         "png",
         "jpg",
         "jpeg"
     );
     
     // Get image file extension
     $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
     $file_cert_extension = pathinfo($_FILES["image_cert"]["name"], PATHINFO_EXTENSION);
     $file_scert_extension = pathinfo($_FILES["image_scert"]["name"], PATHINFO_EXTENSION);
     $file_fcert_extension = pathinfo($_FILES["image_fcert"]["name"], PATHINFO_EXTENSION);
     $file_bcert_extension = pathinfo($_FILES["image_bcert"]["name"], PATHINFO_EXTENSION);
     
     // Validate file input to check if is not empty
    if (! file_exists($_FILES["image"]["tmp_name"])) {
        
         redirect("../businessreg.php?error=Choose image file to upload&$business_data", "Choose image file to upload.", "warning");
     
    }// Validate file input to check if is not empty
    else if (! file_exists($_FILES["image_cert"]["tmp_name"])) {
        
        redirect("../businessreg.php?error=Choose image certificate file to upload&$business_data", "Choose image certificate file to upload.", "warning");
            
    }
    /* Checking if the file is not empty. */
    else if (! file_exists($_FILES["image_scert"]["tmp_name"])) {
        
        redirect("../businessreg.php?error=Choose image certificate file to upload&$business_data", "Choose image Sanitary Permit file to upload.", "warning");
            
    } 
    /* Checking if the file is not empty. */
    else if (! file_exists($_FILES["image_fcert"]["tmp_name"])) {
        
        redirect("../businessreg.php?error=Choose image certificate file to upload&$business_data", "Choose image Fire Safety Permit file to upload.", "warning");
            
    }
    /* Checking if the file is not empty. */
    else if (! file_exists($_FILES["image_bcert"]["tmp_name"])) {
        
        redirect("../businessreg.php?error=Choose image certificate file to upload&$business_data", "Choose image Brgy. Clearance Permit file to upload.", "warning");
            
    }   // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
 
        redirect("../businessreg.php?error=Upload valid images. Only PNG and JPEG are allowed in business image&$business_data", "Upload valid images. Only PNG and JPEG are allowed in business image.", "warning");
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_cert_extension, $allowed_image_extension)) {
    
        redirect("../businessreg.php?error=Upload valid images. Only PNG and JPEG are allowed in business certificate&$business_data", "Upload valid images. Only PNG and JPEG are allowed in business certificate.", "warning");
       
    }
    else if (! in_array($file_scert_extension, $allowed_image_extension)) {
    
        redirect("../businessreg.php?error=Upload valid images. Only PNG and JPEG are allowed in business certificate&$business_data", "Upload valid images. Only PNG and JPEG are allowed in business certificate.", "warning");
       
    }
    else if (! in_array($file_fcert_extension, $allowed_image_extension)) {
    
        redirect("../businessreg.php?error=Upload valid images. Only PNG and JPEG are allowed in business certificate&$business_data", "Upload valid images. Only PNG and JPEG are allowed in business certificate.", "warning");
       
    }
    else if (! in_array($file_bcert_extension, $allowed_image_extension)) {
    
        redirect("../businessreg.php?error=Upload valid images. Only PNG and JPEG are allowed in business certificate&$business_data", "Upload valid images. Only PNG and JPEG are allowed in business certificate.", "warning");
       
    }     // Validate image file size less than
    else if (($_FILES["image"]["size"] < 0)) {
 
        redirect("../businessreg.php?error=Image size less than 800KB&$business_data", "Image size less than 800KB", "warning");

    }    // Validate image file size less than
    else if (($_FILES["image_cert"]["size"] < 0)) {
 
        redirect("../businessreg.php?error=Image size less than 2MB&$business_data", "Image size less than 2MB", "warning");

    }
    else if (($_FILES["image_scert"]["size"] < 0)) {
 
        redirect("../businessreg.php?error=Image size less than 2MB&$business_data", "Image size less than 2MB", "warning");

    }
    else if (($_FILES["image_fcert"]["size"] < 0)) {
 
        redirect("../businessreg.php?error=Image size less than 2MB&$business_data", "Image size less than 2MB", "warning");

    }
    else if (($_FILES["image_bcert"]["size"] < 0)) {
 
        redirect("../businessreg.php?error=Image size less than 2MB&$business_data", "Image size less than 2MB", "warning");

    }    // Validate image file size that is greater
    else if (($_FILES["image"]["size"] > 5000000)) {
 
        redirect("../businessreg.php?error=Image size exceeds 800KB&$business_data", "Image size exceeds 800KB", "warning");
    }    // Validate image file size
    else if (($_FILES["image_cert"]["size"] > 5000000)) {
 
        redirect("../businessreg.php?error=Image size exceeds 5MB&$business_data", "Image size exceeds 5MB", "warning");

    }
    else if (($_FILES["image_scert"]["size"] > 5000000)) {
 
        redirect("../businessreg.php?error=Image size exceeds 5MB&$business_data", "Image size exceeds 5MB", "warning");

    }
    else if (($_FILES["image_fcert"]["size"] > 5000000)) {
 
        redirect("../businessreg.php?error=Image size exceeds 5MB&$business_data", "Image size exceeds 5MB", "warning");

    }
    else if (($_FILES["image_bcert"]["size"] > 5000000)) {
 
        redirect("../businessreg.php?error=Image size exceeds 5MB&$business_data", "Image size exceeds 5MB", "warning");

    }

    $image = $_FILES['image']['name'];
    $image_cert = $_FILES['image_cert']['name'];
    $image_scert = $_FILES['image_scert']['name'];
    $image_fcert = $_FILES['image_fcert']['name'];
    $image_bcert = $_FILES['image_bcert']['name'];

    $path = "../uploads";

    $cert_path = "../certificate";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $image_cert_ext = pathinfo($image_cert, PATHINFO_EXTENSION);
    $image_scert_ext = pathinfo($image_scert, PATHINFO_EXTENSION);
    $image_fcert_ext = pathinfo($image_fcert, PATHINFO_EXTENSION);
    $image_bcert_ext = pathinfo($image_bcert, PATHINFO_EXTENSION);


    $filename = time().'.'.$image_ext;
    $certname = 'cert'.time().'.'.$image_cert_ext;
    $scertname = 'scert'.time().'.'.$image_scert_ext;
    $fcertname = 'fcert'.time().'.'.$image_fcert_ext;
    $bcertname = 'bcert'.time().'.'.$image_bcert_ext;
    
    // Check if email already registered
    $check_email_query = "SELECT business_email FROM business WHERE business_email='$business_email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    
    /* This is checking if the email is already registered. If it is, it will redirect the user to the
    register page with a message. If it is not, it will check if the password matches the confirm
    password. If it does, it will insert the user data into the database. If it does not, it will
    redirect the user to the register page with a message. */
    if(mysqli_num_rows($check_email_query_run)>0)
    {
        redirect("../businessreg.php", "Email Already Use", "warning");
    }
    else
    {
        // Check if password Match
        if($business_password == $business_confirmpassword)
        {
            if(preg_match("/^[0-9]\d{10}$/",$_POST['business_phonenumber']))
                {
                    if(strlen($_POST['business_password']) >= 8 )
                        {
                            // Insert User Data
                            $hash = password_hash($business_password, PASSWORD_DEFAULT);
                            $item = implode(" ",$cuisinename);
                            $insert_query = "INSERT INTO business (business_number, duration, business_name, business_address, municipalityid,  cuisinename, latitude, longitude, opening, closing, business_firstname, business_lastname, business_phonenumber, business_owneraddress, business_email, business_password, image,image_cert,image_scert,image_fcert,image_bcert,verify_token, status) 
                            VALUES ('$business_number','$duration','$business_name','$business_address', $municipalityid, '$item', '$latitude', '$longitude', '$opening', '$closing', '$business_firstname', '$business_lastname', '$business_phonenumber', '$business_owneraddress', '$business_email','$hash','$filename','$certname','$scertname','$fcertname','$bcertname','$verify_token', '$status')";
                            //mysqli_query($con,$insert_query) or die("bad query: $insert_query");
                            $users_query_run = mysqli_query($con, $insert_query);

                            //notification
                            $insert_notification = "INSERT INTO notifications (comment_subject,comment_text,usertype) 
                            VALUES ('NEW BUSINESS FOR VERIFICATION', 'You have new Business named $business_name', '1')";
                            $insert_notification_run = mysqli_query($con, $insert_notification);
                            
                            //Reservation Hours
                            // //Monday
                            // $insert_data_query1 = "INSERT INTO reservationhours (businessid,daysoftheweek,status,opening,closing,status_number)
                            // SELECT businessid,'Monday','Open', opening, closing, '1'
                            // FROM business
                            // ORDER BY business.businessid DESC LIMIT 1
                            // ";
                            // $insert_data_query_run1 = mysqli_query($con, $insert_data_query1) or die("bad query: $insert_data_query1");
                            // //Tuesday
                            // $insert_data_query2 = "INSERT INTO reservationhours (businessid,daysoftheweek,status,opening,closing,status_number)
                            // SELECT businessid,'Tuesday','Open', opening, closing, '1'
                            // FROM business
                            // ORDER BY business.businessid DESC LIMIT 1
                            // ";
                            // $insert_data_query_run2 = mysqli_query($con, $insert_data_query2) or die("bad query: $insert_data_query2");
                            // //Wednesday    
                            // $insert_data_query3 = "INSERT INTO reservationhours (businessid,daysoftheweek,status,opening,closing,status_number)
                            // SELECT businessid,'Wednesday','Open', opening, closing, '1'
                            // FROM business
                            // ORDER BY business.businessid DESC LIMIT 1
                            // ";
                            // $insert_data_query_run3 = mysqli_query($con, $insert_data_query3) or die("bad query: $insert_data_query3");
                            // //Thursday    
                            // $insert_data_query4 = "INSERT INTO reservationhours (businessid,daysoftheweek,status,opening,closing,status_number)
                            // SELECT businessid,'Thursday','Open', opening, closing, '1'
                            // FROM business
                            // ORDER BY business.businessid DESC LIMIT 1
                            // ";
                            // $insert_data_query_run4 = mysqli_query($con, $insert_data_query3) or die("bad query: $insert_data_query4");
                            // //Friday    
                            // $insert_data_query5 = "INSERT INTO reservationhours (businessid,daysoftheweek,status,opening,closing,status_number)
                            // SELECT businessid,'Friday','Open', opening, closing, '1'
                            // FROM business
                            // ORDER BY business.businessid DESC LIMIT 1
                            // ";
                            // $insert_data_query_run5 = mysqli_query($con, $insert_data_query5) or die("bad query: $insert_data_query5");
                            // //Saturday   
                            // $insert_data_query6 = "INSERT INTO reservationhours (businessid,daysoftheweek,status,opening,closing,status_number)
                            // SELECT businessid,'Saturday','Open', opening, closing, '1'
                            // FROM business
                            // ORDER BY business.businessid DESC LIMIT 1
                            // ";
                            // $insert_data_query_run6 = mysqli_query($con, $insert_data_query6) or die("bad query: $insert_data_query6");
                            // //Sunday    
                            // $insert_data_query7 = "INSERT INTO reservationhours (businessid,daysoftheweek,status,opening,closing,status_number)
                            // SELECT businessid,'Sunday','Open', opening, closing, '1'
                            // FROM business
                            // ORDER BY business.businessid DESC LIMIT 1
                            // ";                                                                                                   
                            // $insert_data_query_run7 = mysqli_query($con, $insert_data_query7) or die("bad query: $insert_data_query7");
                            /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                            if($users_query_run){
                                move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
                                move_uploaded_file($_FILES['image_cert']['tmp_name'], $cert_path.'/'.$certname);
                                move_uploaded_file($_FILES['image_scert']['tmp_name'], $cert_path.'/'.$scertname);
                                move_uploaded_file($_FILES['image_fcert']['tmp_name'], $cert_path.'/'.$fcertname);
                                move_uploaded_file($_FILES['image_bcert']['tmp_name'], $cert_path.'/'.$bcertname);
                                sendemail_business($business_name, $business_email);
                                sendsms_business($business_name, $business_number, $business_data);
                                // redirect("../ownerlogin.php", "Register Successfully!! Please Wait for the Admin to Process your Business Account to Login", "success");
                            }
                            else{
                                redirect("../businessreg.php?error=Something went wrong&$business_data", "Something went wrong", "error");
                            }
                        }
                    else
                        {
                            redirect("../businessreg.php?error=Your password must be at least 8 characters&$business_data", "Your password must be at least 8 characters", "warning"); 
                        }
                }
            else
                {
                    redirect("../businessreg.php?error=Phone number error detected&$business_data", "Phone number error detected", "error");
                }

        }
        else
        {
            redirect("../businessreg.php?error=Passwords do not match&$business_data", "Passwords do not match", "warning");
        }
    }
}

/* This is the code for logging in a user. */
else if(isset($_POST['business_login']))
{ // LogIn
    $business_email = mysqli_real_escape_string($con,$_POST['business_email']);
    $business_password = mysqli_real_escape_string($con,$_POST['business_password']);

    $login_query = "SELECT * FROM business WHERE business_email='$business_email'";
    $login_query_run = mysqli_query($con, $login_query);
    //mysqli_query($con,$login_query) or die("bad query: $login_query");

    if(mysqli_num_rows($login_query_run) > 0)
    {  
            while($row = mysqli_fetch_array($login_query_run))
            {
                if(password_verify($business_password, $row["business_password"]))
                {
                        $status = $row['status']; 
                        $archive = $row['archive']; 
                        if(mysqli_num_rows($login_query_run) > 0)
                        {      
                            $_SESSION['status'] = $status;
                            if($status == '1' && $archive == '0')  
                            { 
                                $_SESSION['auth'] = true;

                                $businessid = $row['businessid'];
                                $businessnames = $row['business_name'];
                                $businessemail = $row['business_email'];
                                $role_as = $row['role_as'];
                                $image = $row['image'];
                                $latitude = $row['latitude'];
                                $longitude = $row['longitude'];
                                

                                $_SESSION['auth_user'] = [
                                    'businessid' => $businessid,
                                    'business_name' => $businessnames,
                                    'business_email' => $businessemail,
                                    'image' => $image,
                                    'latitude' => $latitude,
                                    'longitude' => $longitude,
                                    'role_as' => $role_as,
                                    'status' => $status
                                ];
                                $_SESSION['role_as'] = $role_as;
                                
                                redirect("../business/index.php?id=$businessid", "Welcome to dashboard", "success");
                            }
                            elseif($status == '2' || $archive == '0')
                            {
                                redirect("../ownerlogin.php", "Account Closed", "warning");
                            }
                            elseif($archive == '1')
                            {
                                redirect("../ownerlogin.php", "Your Account is Closed and Now Archived", "warning");
                            }
                            else
                            {
                                redirect("../ownerlogin.php", "You are not Verify Yet", "warning");
                            }
                            
                        }
                        else
                        {
                            redirect("../ownerlogin.php", "Invalid Credentials", "error");
                        }

                }
                else
                {
                    redirect("../ownerlogin.php", "Wrong Email or Password", "warning");
                }

            }
    }
    else
    {  
        redirect("../ownerlogin.php", "No Email Exist", "warning");
    }
}

if(isset($_POST["recover"])){
    $business_email = $_POST['business_email'];

    $sql = mysqli_query($con, "SELECT * FROM business WHERE business_email='$business_email'");
    $query = mysqli_num_rows($sql);
    $fetch = mysqli_fetch_assoc($sql);

    if(mysqli_num_rows($sql) <= 0){

            redirect("../forgetbusinesspassword.php", "Sorry, no emails exists ", "warning");

    }else if($fetch["status"] == 0){

            redirect("../index.php", "Sorry, your account must verify first, before you recover your password !", "warning");
       
    }else{
        // generate token by binaryhexa 
        $token = $fetch["verify_token"];

        //session_start ();
        $_SESSION['verify_token'] = $token;
        $_SESSION['business_email'] = $business_email;

        sendemail_forgetpassword("$business_email","$token");
        redirect("../login.php", "Password Reset Link Send Successfully Please Check Your Email", "success");
    }
}

if(isset($_POST["reset"])){
    $business_password = $_POST["business_password"];
    $confirmpassword = $_POST["business_confirmpassword"];

    $token = $_SESSION['verify_token'];
    $business_email = $_SESSION['business_email'];

    $hash = password_hash( $business_password  , PASSWORD_DEFAULT );

    $sql = mysqli_query($con, "SELECT * FROM business WHERE business_email='$business_email'");
    $query = mysqli_num_rows($sql);
    $fetch = mysqli_fetch_assoc($sql);

    if(strlen($_POST['business_password']) >= 8 )
    {
        if($business_password  == $confirmpassword)
        {
            if($business_email)
            {
                $new_pass = $hash;
                mysqli_query($con, "UPDATE business SET business_password='$new_pass' WHERE business_email='$business_email'");

                    redirect("../index.php", "Your Password has been succesful reset", "success");
            }
            else
            {
                    redirect("../resetpassword.php", "Please try again", "error");
            }
        }
        else
        {
            redirect("../resetpassword.php", "Passwords do not match", "warning");
        }
    }
    else
    {  
        redirect("../businessreg.php", "Your password must be at least 8 characters", "warning"); 
    }
}

if(isset($_POST['add_category_btn']))
{
    $categoryname = $_POST['categoryname'];
    $status = isset($_POST['status']) ? "0":"1";

    $cate_query = "INSERT INTO mealcategory (categoryname, status) 
    VALUES ('$categoryname', '$status')";
    //mysqli_query($con,$cate_query) or die("bad query: $cate_query");

    $cate_query_run = mysqli_query($con, $cate_query);

    if($cate_query_run){
        redirect("../businessreg.php", "Cuisine Added Successfully", "success");
    }else{

        redirect("../businessreg.php", "Something Went Wrong", "error");

    }
}


?>