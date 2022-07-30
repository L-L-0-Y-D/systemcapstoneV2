<?php
session_start();
include('../config/dbcon.php');
include('businessfunctions.php');

if(isset($_POST['business_register_btn']))
{
    $business_name = mysqli_real_escape_string($con,$_POST['business_name']);
    $business_address = mysqli_real_escape_string($con,$_POST['business_address']);
    $municipalityid = mysqli_real_escape_string($con,$_POST['municipalityid']);
    $categoryid = mysqli_real_escape_string($con,$_POST['categoryid']);
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

     // Get Image Dimension
     $fileinfo = @getimagesize($_FILES["image"]["tmp_name"]);
     $fileinfo = @getimagesize($_FILES["image_cert"]["tmp_name"]);

     $allowed_image_extension = array(
         "png",
         "jpg",
         "jpeg"
     );
     
     // Get image file extension
     $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
     $file_cert_extension = pathinfo($_FILES["image_cert"]["name"], PATHINFO_EXTENSION);
     
     // Validate file input to check if is not empty
    if (! file_exists($_FILES["image"]["tmp_name"])) {
        
         redirect("../businessreg.php", "Choose image file to upload.");
     
    }// Validate file input to check if is not empty
    else if (! file_exists($_FILES["image_cert"]["tmp_name"])) {
        
        redirect("../businessreg.php", "Choose image certificate file to upload.");
            
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
 
        redirect("../businessreg.php", "Upload valid images. Only PNG and JPEG are allowed in business image.");
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_cert_extension, $allowed_image_extension)) {
    
        redirect("../businessreg.php", "Upload valid images. Only PNG and JPEG are allowed in business certificate.");
       
    }    // Validate image file size less than
    else if (($_FILES["image"]["size"] < 2000000)) {
 
        redirect("../businessreg.php", "Image size less than 2MB");

    }    // Validate image file size less than
    else if (($_FILES["image_cert"]["size"] < 2000000)) {
 
        redirect("../businessreg.php", "Image size less than 2MB");

    }    // Validate image file size that is greater
    else if (($_FILES["image"]["size"] > 5000000)) {
 
        redirect("../businessreg.php", "Image size exceeds 5MB");
    }    // Validate image file size
    else if (($_FILES["image_cert"]["size"] > 5000000)) {
 
        redirect("../businessreg.php", "Image size exceeds 5MB");

    }

    $image = $_FILES['image']['name'];
    $image_cert = $_FILES['image_cert']['name'];

    $path = "../uploads";

    $cert_path = "../certificate";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $image_cert_ext = pathinfo($image_cert, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;
    $certname = time().'.'.$image_cert_ext;
    
    // Check if email already registered
    $check_email_query = "SELECT business_email FROM business WHERE business_email='$business_email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    
    /* This is checking if the email is already registered. If it is, it will redirect the user to the
    register page with a message. If it is not, it will check if the password matches the confirm
    password. If it does, it will insert the user data into the database. If it does not, it will
    redirect the user to the register page with a message. */
    if(mysqli_num_rows($check_email_query_run)>0)
    {
        redirect("../businessreg.php", "Email Already Use");
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
                            $insert_query = "INSERT INTO business (business_name, business_address, municipalityid, categoryid, opening, closing, business_firstname, business_lastname, business_phonenumber, business_owneraddress, business_email, business_password, image,image_cert,verify_token, status) 
                            VALUES ('$business_name','$business_address', $municipalityid, $categoryid, '$opening', '$closing', '$business_firstname', '$business_lastname', '$business_phonenumber', '$business_owneraddress', '$business_email','$hash','$filename','$certname','$verify_token', '$status')";
                            //mysqli_query($con,$insert_query) or die("bad query: $insert_query");
                            $users_query_run = mysqli_query($con, $insert_query);

                            if($users_query_run){
                                move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
                                move_uploaded_file($_FILES['image_cert']['tmp_name'], $cert_path.'/'.$certname);
                                redirect("../ownerlogin.php", "Register Successfully");
                            }
                            else{
                                redirect("../businessreg.php", "Something went wrong");
                            }
                        }
                    else
                        {
                            redirect("../businessreg.php", "Your password must be at least 8 characters"); 
                        }
                }
            else
                {
                    redirect("../businessreg.php", "Phone number error detected");
                }

        }
        else
        {
            redirect("../businessreg.php", "Passwords do not match");
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
                        if(mysqli_num_rows($login_query_run) > 0)
                        {      
                            $_SESSION['status'] = $status;
                            if($status == '1')  
                            { 
                                $_SESSION['auth'] = true;

                                $businessid = $row['businessid'];
                                $businessnames = $row['business_name'];
                                $businessemail = $row['business_email'];
                                $role_as = $row['role_as'];
                                $businessimage = $row['image'];
                                

                                $_SESSION['auth_user'] = [
                                    'businessid' => $businessid,
                                    'business_name' => $businessnames,
                                    'business_email' => $useremail,
                                    'image' => $businessimage,
                                    'role_as' => $role_as,
                                    'status' => $status
                                ];
                                $_SESSION['role_as'] = $role_as;
                                
                                redirect("../business/index.php?id=$businessid", "Welcome to dashboard");
                            }
                            else
                            {
                                redirect("../ownerlogin.php", "You are not verify yet");
                            }
                            
                        }
                        else
                        {
                            redirect("../ownerlogin.php", "Invalid Credentials");
                        }

                }
                else
                {
                    redirect("../ownerlogin.php", "Wrong Email or Password");
                }

            }
    }
    else
    {  
        redirect("../ownerlogin.php", "No Email Exist");
    }
}

if(isset($_POST["recover"])){
    $business_email = $_POST['business_email'];

    $sql = mysqli_query($con, "SELECT * FROM business WHERE business_email='$business_email'");
    $query = mysqli_num_rows($sql);
    $fetch = mysqli_fetch_assoc($sql);

    if(mysqli_num_rows($sql) <= 0){

            redirect("../forgetbusinesspassword.php", "Sorry, no emails exists ");

    }else if($fetch["status"] == 0){

            redirect("../index.php", "Sorry, your account must verify first, before you recover your password !");
       
    }else{
        // generate token by binaryhexa 
        $token = $fetch["verify_token"];

        //session_start ();
        $_SESSION['verify_token'] = $token;
        $_SESSION['business_email'] = $business_email;

        sendemail_forgetpassword("$business_email","$token");
        redirect("../login.php", "Password Reset Link Send Successfully Please Check Your Email");
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

                    redirect("../index.php", "Your Password has been succesful reset");
            }
            else
            {
                    redirect("../resetpassword.php", "Please try again");
            }
        }
        else
        {
            redirect("../resetpassword.php", "Passwords do not match");
        }
    }
    else
    {  
        redirect("../businessreg.php", "Your password must be at least 8 characters"); 
    }
}


?>