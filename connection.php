<?php

$sql = '';
$username = "";
$email = "";
$firstname = "";
$lastname = "";
$age = "";
$phonenumber = "";
$address = "";
$user_type = "";
$business_name = "";
$business_address = "";
$cuisine_type = "";
$business_firstname = "";
$business_lastname = "";
$business_phonenumber = "";
$business_owneraddress = "";
$business_email = "";
$business_password = "";
$errors = array();

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'thesis');
 

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if (!$conn) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// user register
if(isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $user_type = $_POST['user_type'];
    
    // ensure that form fields are filled properly
    
    if($password != $confirmpassword) {
        array_push($errors, "<script>alert('The two passwords do not match')</script>");
        
    }

    // if there are no errors, save user to database
    if (count($errors) == 0){
        $password = md5($password);
        $sql = "INSERT INTO users (username, email, firstname, lastname, age, phonenumber, address, password, user_type) Values ('$username','$email', '$firstname', '$lastname','$age' , '$phonenumber', '$address', '$password', '$user_type')";
        mysqli_query($conn,$sql);
        //$_SESSION['email'] = $email;
        //$_SESSION['success'] = "You are now logged in";
        array_push($errors, "<script>alert('User Created')</script>");
        header('location:login.php'); // redirect to home page

    }
  }

  //Business register
if(isset($_POST['businessregister'])) {
    $business_name = $_POST['business_name'];
    $business_address = $_POST['business_address'];
    $cuisine_type = $_POST['cuisine_type'];
    $business_firstname = $_POST['business_firstname'];
    $business_lastname = $_POST['business_lastname'];
    $business_phonenumber = $_POST['business_phonenumber'];
    $business_owneraddress = $_POST['business_owneraddress'];
    $business_email = $_POST['business_email'];
    $business_password = $_POST['business_password'];
    $business_confirmpassword = $_POST['business_confirmpassword'];
    $user_type = $_POST['user_type'];
    
    // ensure that form fields are filled properly

    
    if($business_password != $business_confirmpassword) {
        array_push($errors, "<script>alert('The two passwords do not match')</script>");
    }

    // if there are no errors, save user to database
    if (count($errors) == 0){
        $business_password = md5($business_password);
        $sql = "INSERT INTO business (business_name, business_address, cuisine_type, business_firstname, business_lastname, business_phonenumber, business_owneraddress, business_email, business_password, user_type) Values ('$business_name','$business_address', '$cuisine_type','$business_firstname' , '$business_lastname', '$business_phonenumber', '$business_owneraddress','$business_email','$business_password', '$user_type')";
        mysqli_query($conn,$sql);
        //$_SESSION['business_email'] = $business_email;
        //$_SESSION['success'] = "You are now logged in";
        array_push($errors, "<script>alert('Owner Created')</script>");
        header('location:business/ownerlogin.php'); // redirect to home page

    }
  }


  
  // log user in from login page
  if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // ensure that form fields are filled properly
    if(empty($email)) {
        array_push($errors, "<script>alert('Email is required')</script>");
        
    }
    if(empty($password)) {
        array_push($errors, "<script>alert('Password is required')</script>");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) >= 1) {
            //log user in
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are now logged in";
        header('location:home.php'); // redirect to home page
        }else{
            array_push($errors, "<script>alert('Wrong Email & Password')</script>");
        }
    }
  }

    // log user in from login page
    if (isset($_POST['business_login'])) {
        $business_email = $_POST['business_email'];
        $business_password = $_POST['business_password'];
        
        // ensure that form fields are filled properly
        if(empty($business_email)) {
            array_push($errors, "<script>alert('Email is required')</script>");
            
        }
        if(empty($business_password)) {
            array_push($errors, "<script>alert('Password is required')</script>");
        }
    
        if (count($errors) == 0) {
            $business_password = md5($business_password);
            $query = "SELECT * FROM business WHERE business_email='$business_email' AND business_password='$business_password'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) >= 1) {
                //log user in
            $_SESSION['business_email'] = $business_email;
            $_SESSION['success'] = "You are now logged in";
            header('location:admin.php'); // redirect to home page
            }else{
                array_push($errors, "<script>alert('Wrong Email & Password')</script>");
            }
        }
      }

  //logout
  if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['username']);
      header('location: login.php');
  }

?> 