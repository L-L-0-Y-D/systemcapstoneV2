<?php
session_start();
include('../config/dbcon.php');
include('myfunctions.php');


/* This is the code for registering a user. */
if(isset($_POST['register_btn'])){ // Registering
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $phone = mysqli_real_escape_string($con,$_POST['phone']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $confirmpassword = mysqli_real_escape_string($con,$_POST['confirmpassword']);
    
    // Check if email already registered
    $check_email_query = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    
    if(mysqli_num_rows($check_email_query_run)>0)
    {
        redirect("../register.php", "Email Already Registered");
    }
    else
    {
        // Check if password Match
        if($password == $confirmpassword)
        {
            // Insert User Data
            $password = md5($password);
            $insert_query = "INSERT INTO users (name, email, phone, password) VALUES ('$name','$email',$phone,'$password' )";
            $insert_query_run = mysqli_query($con, $insert_query);

            if($insert_query_run){
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
        $username = $userdata['name'];
        $useremail = $userdata['email'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] = [
            'name' => $username,
            'email' => $useremail
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