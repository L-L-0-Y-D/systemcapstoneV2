<?php
session_start();
include('../config/dbcon.php');
include('myfunctions.php');

/* This is the code for registering a user. */
if(isset($_POST['register_btn'])){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $firstname = mysqli_real_escape_string($con,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($con,$_POST['lastname']);
    $age = mysqli_real_escape_string($con,$_POST['age']);
    $phonenumber = mysqli_real_escape_string($con,$_POST['phonenumber']);
    $address = mysqli_real_escape_string($con,$_POST['address']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $confirmpassword = mysqli_real_escape_string($con,$_POST['confirmpassword']);
    $role_as = mysqli_real_escape_string($con,$_POST['role_as']);
    $status = isset($_POST['status']) ? "0":"1";

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    
    // Check if email already registered
    $check_email_query = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    
    /* This is checking if the email is already registered. If it is, it will redirect the user to the
    register page with a message. If it is not, it will check if the password matches the confirm
    password. If it does, it will insert the user data into the database. If it does not, it will
    redirect the user to the register page with a message. */
    if(mysqli_num_rows($check_email_query_run)>0)
    {
        redirect("register.php", "Email Already Use");
    }
    else
    {
        // Check if password Match
        if($password == $confirmpassword)
        {
            // Insert User Data
            $password = md5($password);
            $insert_query = "INSERT INTO users (name, email, firstname, lastname, age, phonenumber, address, password, role_as, image, status) 
            VALUES ('$name','$email','$firstname','$lastname', $age, '$phonenumber', '$address', '$password', $role_as,'$filename', '$status')";
            //mysqli_query($con,$insert_query) or die("bad query: $insert_query");
            $users_query_run = mysqli_query($con, $insert_query);

            if($users_query_run){
                move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
                redirect("../login.php", "Register Successfully");
            }
            else{
                redirect("../register.php", "Something went wrong");;
            }

        }
        else
        {
            redirect("../register.php", "Passwords do not match");
        }
    }
    
}

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
            VALUES ('$business_name','$business_address', $municipalityid,$categoryid, '$business_firstname', '$business_lastname', '$business_email', '$business_phonenumber', '$business_owneraddress','$business_password','$filename', '$status')";
            //mysqli_query($con,$insert_query) or die("bad query: $insert_query");
            $users_query_run = mysqli_query($con, $insert_query);

            if($users_query_run){
                move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
                redirect("busiowner.php", "Register Successfully");
            }
            else{
                redirect("add-business.php", "Something went wrong");;
            }

        }
        else
        {
            redirect("add-business.php", "Passwords do not match");
        }
    }
}

/* This is the code for logging in a user. */
else if(isset($_POST['login_btn'])){ // LogIn
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    $password = md5($password);
    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0){
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['userid'];
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $userimage = $userdata['image'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] = [
            'userid' => $userid,
            'name' => $username,
            'email' => $useremail,
            'image' => $userimage,
            'role_as' => $role_as
        ];

        $_SESSION['role_as'] = $role_as;

        if($role_as == 1){

            redirect("../admin/index.php", "Welcome to dashboard");

        }else{

            redirect("../index.php", "Logged In Successfully");

        }

        
    }else{
        
        redirect("../login.php", "Invalid Credentials");

    }
}

?>