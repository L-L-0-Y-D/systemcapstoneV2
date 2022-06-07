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
    $business_firstname = mysqli_real_escape_string($con,$_POST['business_firstname']);
    $business_lastname = mysqli_real_escape_string($con,$_POST['business_lastname']);
    $business_email = mysqli_real_escape_string($con,$_POST['business_email']);
    $business_phonenumber = mysqli_real_escape_string($con,$_POST['business_phonenumber']);
    $business_owneraddress = mysqli_real_escape_string($con,$_POST['business_owneraddress']);
    $business_password = mysqli_real_escape_string($con,$_POST['business_password']);
    $business_confirmpassword = mysqli_real_escape_string($con,$_POST['business_confirmpassword']);
    $status = isset($_POST['status']) ? "0":"1";

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    
    // Check if email already registered
    $check_email_query = "SELECT business_email FROM business WHERE business_email='$business_email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    
    /* This is checking if the email is already registered. If it is, it will redirect the user to the
    register page with a message. If it is not, it will check if the password matches the confirm
    password. If it does, it will insert the user data into the database. If it does not, it will
    redirect the user to the register page with a message. */
    if(mysqli_num_rows($check_email_query_run)>0)
    {
        redirect("add-business.php", "Email Already Use");
    }
    else
    {
        // Check if password Match
        if($business_password == $business_confirmpassword)
        {
            // Insert User Data
            $business_password = md5($business_password);
            $insert_query = "INSERT INTO business (business_name, business_address, municipalityid, categoryid, business_firstname, business_lastname, business_phonenumber, business_owneraddress, business_email, business_password, image, status) 
            VALUES ('$business_name','$business_address', $municipalityid,$categoryid, '$business_firstname', '$business_lastname', '$business_phonenumber', '$business_owneraddress', '$business_email','$business_password','$filename', '$status')";
            //mysqli_query($con,$insert_query) or die("bad query: $insert_query");
            $users_query_run = mysqli_query($con, $insert_query);

            if($users_query_run){
                move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
                redirect("../business/ownerlogin.php", "Register Successfully");
            }
            else{
                redirect("businessreg.php", "Something went wrong");;
            }

        }
        else
        {
            redirect("businessreg.php", "Passwords do not match");
        }
    }
}

/* This is the code for logging in a user. */
else if(isset($_POST['business_login'])){ // LogIn
    $business_email = mysqli_real_escape_string($con,$_POST['business_email']);
    $business_password = mysqli_real_escape_string($con,$_POST['business_password']);

    $business_password= md5($business_password);
    $login_query = "SELECT * FROM business WHERE business_email='$business_email' AND business_password='$business_password'";
    $login_query_run = mysqli_query($con, $login_query);
    //mysqli_query($con,$login_query) or die("bad query: $login_query");

    if(mysqli_num_rows($login_query_run) > 0){
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $businessnames = $userdata['business_name'];
        $businessemail = $userdata['email'];
        $role_as = $userdata['role_as'];
        $businessimage = $userdata['image'];

        $_SESSION['auth_user'] = [
            'business_name' => $businessnames,
            'email' => $useremail,
            'image' => $businessimage,
            'role_as' => $role_as
        ];

        $_SESSION['role_as'] = $role_as;

        redirect("../business/index.php", "Welcome to dashboard");
        
    }else{
        
        redirect("../business/ownerlogin.php", "Invalid Credentials");

    }
}

?>