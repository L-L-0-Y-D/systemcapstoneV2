<?php

/* This is the code for registering a user. */
if(isset($_POST['register_btn']))
{
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $firstname = mysqli_real_escape_string($con,$_POST['firstname']);
    $lastname = mysqli_real_escape_string($con,$_POST['lastname']);
    $dateofbirth = date('Y-m-d',strtotime($_POST['dateofbirth']));
    $phonenumber = mysqli_real_escape_string($con,$_POST['phonenumber']);
    // $address = mysqli_real_escape_string($con,$_POST['address']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $confirmpassword = mysqli_real_escape_string($con,$_POST['confirmpassword']);
    $role_as = mysqli_real_escape_string($con,$_POST['role_as']);
    $verify_token = md5(rand());

    $user_data = 'name='.$name.'&email='.$email.'&firstname='.$firstname.'&dateofbirth='.$dateofbirth.'&lastname='.$lastname.'&phonenumber='.$phonenumber;

    $today = date("Y-m-d");
    $difference = date_diff(date_create($dateofbirth), date_create($today));
    $age = $difference->format('%y');

//     $image = $_FILES['image']['name'];

//     $path = "../uploads";

//     $image_ext = pathinfo($image, PATHINFO_EXTENSION);
//     $filename = time().'.'.$image_ext;

//     // Get Image Dimension
//     $fileinfo = @getimagesize($_FILES["image"]["tmp_name"]);

//     $allowed_image_extension = array(
//         "png",
//         "jpg",
//         "jpeg"
//     );
    
//     // Get image file extension
//     $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    
//     // Validate file input to check if is not empty
//    if (! file_exists($_FILES["image"]["tmp_name"])) {
       
//         redirect("../register.php?error=Choose image file to upload&$user_data", "Choose image file to upload.", "warning");
    
//    }  // Validate file input to check if is with valid extension
//    else if (! in_array($file_extension, $allowed_image_extension)) {

//        redirect("../register.php?error=Upload valid images. Only PNG and JPEG are allowed in business image&$user_data", "Upload valid images. Only PNG and JPEG are allowed in image.", "warning");
//    }// Validate image file size that is greater
//    else if (($_FILES["image"]["size"] > 5000000)) {

//        redirect("../register.php?error=Image size exceeds 5MB&$user_data", "Image size exceeds 5MB", "warning");
//    }
   
    // Check if email already registered
    $check_email_query = "SELECT * FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    $check_name_query = "SELECT * FROM users WHERE name='$name'";
    $check_name_query_run = mysqli_query($con, $check_name_query);
    
    /* This is checking if the email is already registered. If it is, it will redirect the user to the
    register page with a message. If it is not, it will check if the password matches the confirm
    password. If it does, it will insert the user data into the database. If it does not, it will
    redirect the user to the register page with a message. */
    if(mysqli_num_rows($check_email_query_run)>0)
    {
        redirect("../register.php?error=Email Already Exist&$user_data", "Email Already Exist.", "warning");
    }
    elseif(mysqli_num_rows($check_name_query_run)>0)
    {
        redirect("../register.php?error=Username Already Exist&$user_data", "Username Already Exist.", "warning");
    }
    else
    {
        // Check if password Match
        if($password == $confirmpassword)
        {
            if($age >= 18)
            {
                if(preg_match("/^[0-9]\d{10}$/",$_POST['phonenumber']))
                {
                    if(strlen($_POST['password']) >= 8 )
                    {
                        // Insert User Data
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                        $insert_query = "INSERT INTO users (name, email, firstname, lastname, dateofbirth, age, phonenumber, password, role_as, verify_token) 
                        VALUES ('$name','$email','$firstname','$lastname', '$dateofbirth' , $age, '$phonenumber', '$hash', $role_as, '$verify_token')";
                        //mysqli_query($con,$insert_query) or die("bad query: $insert_query");
                        $users_query_run = mysqli_query($con, $insert_query);

                            if($users_query_run){
                                // move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
                                sendemail_verify("$name","$email","$verify_token");
                                redirect("../login.php", "Registration Success Please verify Email Address to login", "success");
                            }
                            else
                            {
                                redirect("../register.php?error=Something went wrong&$user_data", "Something went wrong", "error");
                            }
                    }
                    else
                    {
                        redirect("../register.php?error=Your password must be at least 8 characters&$user_data", "Your password must be at least 8 characters", "warning"); 
                    }
                }
                else
                {
                    redirect("../register.php?error=Phone Number must be 11 digits&$user_data", "Phone Number must be 11 digits", "warning");
                }
            }
            else
            {
                redirect("../register.php?error=User is Under Age&$user_data", "User is Under Age.", "warning");
            }

        }
        else
        {
            redirect("../register.php?error=Passwords do not match&$user_data", "Passwords do not match", "warning");
        }
    }
    
}
else
{
    redirect("../index.php", "Something went wrong", "warning");
}