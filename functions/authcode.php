<?php
session_start();
include('myfunctions.php');

/* This is the code for registering a user. */
if(isset($_POST['register_btn']))
{
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
        redirect("../register.php", "Email Already Use");
    }
    else
    {
        // Check if password Match
        if($password == $confirmpassword)
        {
            if($age >= '18')
            {
                if(preg_match("/^[0-9]\d{10}$/",$_POST['phonenumber']))
                {
                    if(strlen($_POST['password']) >= 8 )
                    {
                        // Insert User Data
                        $hash = password_hash($password, PASSWORD_DEFAULT);
                        $insert_query = "INSERT INTO users (name, email, firstname, lastname, age, phonenumber, address, password, role_as, image, status) 
                        VALUES ('$name','$email','$firstname','$lastname', $age, '$phonenumber', '$address', '$hash', $role_as,'$filename', '$status')";
                        //mysqli_query($con,$insert_query) or die("bad query: $insert_query");
                        $users_query_run = mysqli_query($con, $insert_query);

                            if($users_query_run){
                                move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$filename);
                                redirect("../login.php", "Register Successfully");
                            }
                            else
                            {
                                redirect("../register.php", "Something went wrong");
                            }
                    }
                    else
                    {
                        redirect("../register.php", "Your password must be at least 8 characters"); 
                    }
                }
                else
                {
                    redirect("../register.php", "Phone number error detected");
                }
            }
            else
            {
                redirect("../register.php", "Underage Detected");
            }

        }
        else
        {
            redirect("../register.php", "Passwords do not match");
        }
    }
    
}

if(isset($_POST['update_profile_btn']))
{
    $userid = $_POST['userid'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $phonenumber = $_POST['phonenumber'];
    $address = $_POST['address'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    $role_as = $_POST['role_as'];
    $status = isset($_POST['status']) ? "0":"1";

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        //$update_filename = $new_image;
        $image_ext = pathinfo($new_image, PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
    }
    else
    {
        $update_filename = $old_image;
    }
    $path = "../uploads";
    
    if(mysqli_num_rows($check_email_query_run)>0)
    {
        redirect("../profile.php", "Email Already Use");
    }
    else
    {
        if($password == $confirmpassword)
            {
                if($age >= '18')
                {
                    if(preg_match("/^[0-9]\d{10}$/",$_POST['phonenumber']))
                    {
                        if(strlen($_POST['password']) >= 8 )
                        {
                            $hash = password_hash($password, PASSWORD_DEFAULT);
                            $update_query = "UPDATE users SET name='$name',email='$email',firstname='$firstname',lastname='$lastname',age=$age,phonenumber='$phonenumber',address='$address',password='$hash',role_as='$role_as', image='$update_filename', status='$status' WHERE userid='$userid'";
                            mysqli_query($con,$update_query) or die("bad query: $update_query");
                        }
                        else
                        {
                            redirect("../profile.php?id=$userid", "Your password must be at least 8 characters"); 
                        }
                    }
                    else
                    {
                        redirect("../profile.php?id=$userid", "Phone number error detected");
                    }
                }
                else
                {
                    redirect("../profile.php?id=$userid", "Underage Detected");
                }
    
            }
            else
            {
                redirect("../profile.php?id=$userid", "Passwords do not match");
            }
        }

    $update_query_run = mysqli_query($con, $update_query);

    if($update_query_run)
    {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/".$old_image);
            }
        }
        redirect("../index.php", "Category Updated Successfully");
    }
    else
    {
        redirect("profile.php?id=$userid", "Something Went Wrong"); 
    }

}

/* This is the code for logging in a user. */
else if(isset($_POST['login_btn'])){ // LogIn
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
                        redirect("../admin/index.php", "Welcome to dashboard");
                    }
                    else
                    {
                        redirect("../index.php", "Logged In Successfully");
                    }
                }
                else
                {  
                        redirect("../login.php", "Wrong Email or Password");
                }
            }
            else
            {
                redirect("../login.php", "Wrong Email or Password");
            }

        }
        
    }
    else
    {  
        redirect("../login.php", "No Email Exist");
    }
}

?>