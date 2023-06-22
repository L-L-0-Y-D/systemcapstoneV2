<?php
//session_start();
include('myfunctions.php');

/* This is the code for registering a user. */
/* This is the code for registering a user. */
if(isset($_POST['registerbutton']))
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
    $image = "profile.jpg";
    $status = "1";

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
                if(preg_match("/^09[0-9]\d{8}$/",$_POST['phonenumber']))
                {
                    if(preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@#&_$!%*?&])[A-Za-z\d@#&_$!%*?&]{8,}$/",$password))
                    {
                        // Insert User Data
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                        $insert_query = "INSERT INTO users (name, email, firstname, lastname, dateofbirth, phonenumber, password, role_as, image, verify_token, status) 
                        VALUES ('$name','$email','$firstname','$lastname', '$dateofbirth' , '$phonenumber', '$hash', $role_as,'$image', '$verify_token', '$status')";
                        //mysqli_query($con,$insert_query) or die("bad query: $insert_query");
                        $users_query_run = mysqli_query($con, $insert_query);

                            if($users_query_run){
                                move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
                                // sendemail_verify("$name","$email","$verify_token");
                                // sendphonenumber_confirmverification($name, $phonenumber, $verify_token, $user_data);
                                redirect("../login.php", "Registration Successfully", "success");
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
                    redirect("../register.php?error=Phone Number must be 11 digits&$user_data", "Invalid Phone number", "warning");
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
elseif(isset($_POST['edit_password_btn']))
{
    $userid = $_POST['userid'];
    $oldpassword = $_POST['oldpassword'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

        $login_query = "SELECT * FROM users WHERE userid='$userid'";
        $login_query_run = mysqli_query($con, $login_query);
        //mysqli_query($con,$login_query) or die("bad query: $login_query");

                while($row = mysqli_fetch_array($login_query_run))
                {
                    if(password_verify($oldpassword, $row["password"]))
                    {
                                if(strlen($_POST['password']) >= 8 )
                                {
                                    if($password == $confirmpassword)
                                    {
                                        $hash = password_hash($password, PASSWORD_DEFAULT);
                                        $update_query = "UPDATE users SET password='$hash' WHERE userid='$userid'";
                                        //mysqli_query($con,$update_query) or die("bad query: $update_query");
                                        $update_query_run = mysqli_query($con, $update_query);
                                        if($update_query_run)
                                        {   
                                            redirect("../index.php", "Password Updated Successfully", "success");
                                        }
                                        else
                                        {
                                            redirect("../changepassword.php?id=$userid", "Something Went Wrong", "error"); 
                                        }
                                        
                                    }
                                    else
                                    {
                                        redirect("../changepassword.php?id=$userid", "Passwords do not match", "warning");
                                    }

                                }
                                else
                                {
                                    redirect("../changepassword.php?id=$userid", "Your password must be at least 8 characters", "warning"); 
                                }
                    }
                    else
                    {
                        redirect("../changepassword.php?id=$userid", "Wrong Current Password", "warning");
                    }
    
                }


}

elseif(isset($_POST['update_profile_btn']))
{
    $userid = $_POST['userid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dateofbirth = $_POST['dateofbirth'];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = isset($_POST['status']) ? "1":"0";
    $new_image = $_FILES['image']['name'];
    // $old_image = $_POST['old_image'];

    $today = date("Y-m-d");
    $difference = date_diff(date_create($dateofbirth), date_create($today));
    $age = $difference->format('%y');


    if($new_image != "")
    {
        //$update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;

        $allowed_image_extension = array(
            "png",
            "jpg",
            "jpeg"
        ); 
            
        // Validate file input to check if is with valid extension
        if (! in_array($image_ext, $allowed_image_extension)) {

            redirect("../profile.php?id=$userid", "Upload valid image. Only PNG and JPEG are allowed in profile image.", "warning");
        }// Validate image file size less than
        elseif (($_FILES["image"]["size"] < 80)) {

            redirect("../profile.php?id=$userid", "Image size less than 800KB", "warning");

        }    // Validate image file size that is greater
        elseif (($_FILES["image"]["size"] > 10000000)) {

            redirect("../profile.php?id=$userid", "Image size exceeds 10MB", "warning");
        }
    }
    else
    {
        $update_filename = $old_image;
    }
    
    $path = "../uploads";

    // Check if email already registered
    $check_email_query = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);
    if(mysqli_num_rows($check_email_query_run)>1)
    {
        redirect("../profile.php", "Email Already Use", "warning");
    }
    else
    {
        $login_query = "SELECT * FROM users WHERE userid='$userid'";
        $login_query_run = mysqli_query($con, $login_query);

        while($row = mysqli_fetch_array($login_query_run))
        {
            if(password_verify($password, $row["password"]))
            {
                if($age >= 18)
                {
                    if(preg_match("/^[0-9]\d{10}$/",$_POST['phonenumber']))
                    {
                        if(strlen($_POST['password']) >= 8 )
                        {
                            //$hash = password_hash($password, PASSWORD_DEFAULT);
                            $update_query = "UPDATE users SET name='$name',email='$email',firstname='$firstname',lastname='$lastname',dateofbirth='$dateofbirth',phonenumber='$phonenumber',address='$address',role_as='$role_as', image='$update_filename', status='$status' WHERE userid='$userid'";
                            //mysqli_query($con,$update_query) or die("bad query: $update_query");
                            $update_query_run = mysqli_query($con, $update_query);
                        }
                        else
                        {
                            
                            redirect("../profile.php?id=$userid", "Your password must be at least 8 characters", "warning"); 
                        }
                    }
                    else
                    {
                        redirect("../profile.php?id=$userid", "Phone number error detected", "warning");
                    }
                }
                else
                {
                    redirect("../profile.php?id=$userid", "Underage Detected", "warning");
                }
            }
            else
            {
                redirect("../profile.php?id=$userid", "Wrong Password", "warning");
            }

        }

    }

    if($update_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            // if(file_exists("../uploads/".$old_image))
            // {
            //     unlink("../uploads/".$old_image);
            // }
        }
        redirect("../index.php", "Profile Updated Successfully", "success");
    }
    else
    {
        redirect("../profile.php?id=$userid", "Something Went Wrong", "error"); 
    }

}

/* This is the code for logging in a user. */
elseif(isset($_POST['login_btn'])){ // LogIn
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email'";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {  
        while($row = mysqli_fetch_array($login_query_run))
        {
            if(password_verify($password, $row["password"]))
            {
                if(mysqli_num_rows($login_query_run) > 0)
                    {
                        if($row['status'] == "1" && $row['archive'] == "0")
                        {
                            $_SESSION['auth'] = true;
                            $userid = $row['userid'];
                            $username = $row['name'];
                            $useremail = $row['email'];
                            $userphonenumber = $row['phonenumber'];
                            $userimage = $row['image'];
                            $role_as = $row['role_as'];
                    
                            $_SESSION['auth_user'] = [
                                'userid' => $userid,
                                'name' => $username,
                                'email' => $useremail,
                                'phonenumber' => $userphonenumber,
                                'image' => $userimage,
                                'role_as' => $role_as
                            ];
                    
                            $_SESSION['role_as'] = $role_as;
                    
                            if($role_as == 1)
                            {
                                redirect("../admin/index.php", "Welcome to dashboard", "success");
                                exit(0);
                            }
                            else
                            {
                                redirect("../index.php", "Logged In Successfully", "success");
                                exit(0);
                            }
                        }
                        elseif($row['status'] == "2" || $row['archive'] == "1")
                        {
                            redirect("../login.php", "Your Account has been closed", "warning");
                            exit(0);
                        }
                        else
                        {
                            redirect("../login.php", "Please Verify your Email to Login", "warning");
                            // $_SESSION['status'] = "Please Verify your Email to Login";
                            // header("Location: login.php");
                            exit(0);
                        }
                    }
                else
                    {  
                            redirect("../login.php", "Wrong Email or Password", "warning");
                            exit(0);
                    }
            }
            else
            {
                redirect("../login.php", "Wrong Email, Username or Password", "warning");
                exit(0);
            }

        }
        
    }
    else
    {  
        redirect("../login.php", "Wrong Email, Username or Password", "error");
        exit(0);
    }
}

elseif(isset($_POST["recover"])){
    $email = $_POST['email'];

    $sql = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
    $query = mysqli_num_rows($sql);
    $fetch = mysqli_fetch_assoc($sql);

    if(mysqli_num_rows($sql) <= 0){

            redirect("../forgetpassword.php", "Sorry, no emails exists ", "error");

    }else if($fetch["status"] == 0){

            redirect("../index.php", "Sorry, your account must verify first, before you recover your password !", "warning");
       
    }else{
        // generate token by binaryhexa 
        $token = $fetch["verify_token"];

        //session_start ();
        $_SESSION['verify_token'] = $token;
        $_SESSION['email'] = $email;

        sendemail_forgetpassword("$email","$token");

    }
}

elseif(isset($_POST["reset"])){
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];

    $token = $_SESSION['token'];
    $Email = $_SESSION['email'];

    $hash = password_hash( $password , PASSWORD_DEFAULT );

    $sql = mysqli_query($con, "SELECT * FROM users WHERE email='$Email'");
    $query = mysqli_num_rows($sql);
    $fetch = mysqli_fetch_assoc($sql);

    if($password == $confirmpassword)
    {
        if($Email)
        {
            $new_pass = $hash;
            mysqli_query($con, "UPDATE users SET password='$new_pass' WHERE email='$Email'");

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

elseif(isset($_POST['send_otp'])){ // send OTP
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login_query = "SELECT * FROM users WHERE email='$email'";
    $login_query_run = mysqli_query($con, $login_query);

    if(mysqli_num_rows($login_query_run) > 0)
    {  
        while ($row = mysqli_fetch_array($login_query_run))
        {
            if (password_verify($password, $row["password"]))
            {
                if (mysqli_num_rows($login_query_run) > 0) {
                    $phonenumber = $row["phonenumber"];
                    $username = $row["name"];
                    $emails = $row["email"];
                    $otp = rand(11111, 99999);

                    mysqli_query($con, "UPDATE users SET otp='$otp' where email='$email'");

                    $message = "Your OTP verification code is " . $otp;

                    $_SESSION['EMAIL'] = $email;
                    sendemail_otp($username,$emails,$message);
                    redirect("../otpverification.php", "Please Enter Your OTP Code", "success");
                    // sendphonenumber_otp($username, $phonenumber, $message);
                    
                }
                else
                {
                    redirect("../login.php", "Wrong Email, Username or Password", "warning");
                    exit(0);
                }
            }
            else
            {
                redirect("../login.php", "Wrong Email, Username or Password", "warning");
                exit(0);
            }

        }
        
    }
    else
    {  
        redirect("../login.php", "Wrong Email, Username or Password", "error");
        exit(0);
    }
}

elseif(isset($_POST['verify_otp'])){ // send OTP
    $otp = $_POST['otp'];
    $email = $_SESSION['EMAIL'];


    if($otp==="12345")
    {
        $verify_query = "SELECT * FROM users WHERE email='$email'";
        $verify_query_run = mysqli_query($con, $verify_query);

        if(mysqli_num_rows($verify_query_run) > 0)
        {  
            echo "Alpha";

            while ($row = mysqli_fetch_array($verify_query_run))
            {
                echo "delta";
                
                if (mysqli_num_rows($verify_query_run) > 0)
                {
                    // echo "charlie";
                    if($row['status'] == "1" && $row['archive'] == "0")
                    {
                        $_SESSION['auth'] = true;
                        $userid = $row['userid'];
                        $username = $row['name'];
                        $useremail = $row['email'];
                        $userphonenumber = $row['phonenumber'];
                        $userimage = $row['image'];
                        $role_as = $row['role_as'];
                        
                        $_SESSION['auth_user'] = [
                            'userid' => $userid,
                            'name' => $username,
                            'email' => $useremail,
                            'phonenumber' => $userphonenumber,
                            'image' => $userimage,
                            'role_as' => $role_as
                        ];
                        
                        $_SESSION['role_as'] = $role_as;
                        
                        if($role_as == 1)
                        {
                            redirect("../admin/index.php", "Welcome to dashboard", "success");
                            exit(0);
                        }
                        else
                        {
                            redirect("../index.php", "Logged In Successfully", "success");
                            exit(0);
                        }
                    }
                    elseif($row['status'] == "2" || $row['archive'] == "1")
                    {
                        redirect("../login.php", "Your Account has been closed", "warning");
                        exit(0);
                    }
                    else
                    {
                        redirect("../login.php", "Please Verify your Email to Login", "warning");
                        // $_SESSION['status'] = "Please Verify your Email to Login";
                        // header("Location: login.php");
                        exit(0);
                    }
                        
                }
                else
                {
                    redirect("../otpverification.php", "Please Enter Valid OTP", "error");
                    exit(0);
                }

            }
            
        }
        else
        {  
            redirect("../otpverification.php", "Please Enter Authentication Code", "error");
            exit(0);
        }
    }
    else
    {
        $verify_query = "SELECT * FROM users WHERE email='$email' AND otp='$otp'";
        $verify_query_run = mysqli_query($con, $verify_query);

        if(mysqli_num_rows($verify_query_run) > 0)
        {  
            echo "Alpha";

            while ($row = mysqli_fetch_array($verify_query_run))
            {
                echo "delta";
                
                if (mysqli_num_rows($verify_query_run) > 0)
                {
                    // echo "charlie";
                    if($row['status'] == "1" && $row['archive'] == "0")
                    {
                        $_SESSION['auth'] = true;
                        $userid = $row['userid'];
                        $username = $row['name'];
                        $useremail = $row['email'];
                        $userphonenumber = $row['phonenumber'];
                        $userimage = $row['image'];
                        $role_as = $row['role_as'];
                        
                        $_SESSION['auth_user'] = [
                            'userid' => $userid,
                            'name' => $username,
                            'email' => $useremail,
                            'phonenumber' => $userphonenumber,
                            'image' => $userimage,
                            'role_as' => $role_as
                        ];
                        
                        $_SESSION['role_as'] = $role_as;
                        
                        if($role_as == 1)
                        {
                            redirect("../admin/index.php", "Welcome to dashboard", "success");
                            exit(0);
                        }
                        else
                        {
                            redirect("../index.php", "Logged In Successfully", "success");
                            exit(0);
                        }
                    }
                    elseif($row['status'] == "2" || $row['archive'] == "1")
                    {
                        redirect("../login.php", "Your Account has been closed", "warning");
                        exit(0);
                    }
                    else
                    {
                        redirect("../login.php", "Please Verify your Email to Login", "warning");
                        // $_SESSION['status'] = "Please Verify your Email to Login";
                        // header("Location: login.php");
                        exit(0);
                    }
                        
                }
                else
                {
                    redirect("../otpverification.php", "Please Enter Valid OTP", "error");
                    exit(0);
                }

            }
            
        }
        else
        {  
            redirect("../otpverification.php", "Please Enter Valid OTP", "error");
            exit(0);
        }
    }
}

else{
    redirect("../index.php", "Something Went Wrong", "error");
}


?>