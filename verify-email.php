<?php
session_start();
include('config/dbcon.php');

if(isset($_GET['token']))
{
    $token = $_GET['token'];
    $verify_query = "SELECT verify_token,status FROM users WHERE verify_token='$token' ";
    $verify_query_run = mysqli_query($con,$verify_query);

    if(mysqli_num_rows($verify_query_run) > 0)
    {
        $row = mysqli_fetch_array($verify_query_run);
        //echo $row['verify_token'];
        if($row['status'] == "0")
        {
            $clicked_token = $row['verify_token'];
            $update_query = "UPDATE users SET status='1' WHERE verify_token='$clicked_token' ";
            $update_query_run = mysqli_query($con, $update_query);

            if($update_query_run)
            {
                //redirect("login.php", "Your Account has been verified Successfully");
                 $_SESSION['message'] = "Your Account has been verified Successfully";
                 header("Location: login.php");
                exit(0);
            }
            else
            {
                //redirect("login.php", "Verification Failed");
                 $_SESSION['message'] = "Verification Failed";
                 header("Location: login.php");
                exit(0);
            }

        }
        else
        {
            //redirect("login.php", "Email Already Verify");
             $_SESSION['message'] = "Email Already Verify";
             header("Location: login.php");
            exit(0);
        }

    }
    else
    {
        redirect("login.php", "This Token does not Exists");
        // $_SESSION['status'] = "This Token does not Exists";
        // header("Location: login.php");
    }
}
else
{
    redirect("login.php", "Not Allowed");
    // $_SESSION['status'] = "Not Allowed";
    // header("location: login.php");
}

?>