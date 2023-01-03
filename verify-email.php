<?php
session_start();
include('config/dbcon.php');
include('functions/myfunctions.php');
if(isset($_GET['token']))
{
    $token = $_GET['token'];
    $verify_query = "SELECT verify_token,status,name FROM users WHERE verify_token='$token' ";
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

            $insert_notification = "INSERT INTO notifications (comment_subject,comment_text,usertype) 
            VALUES ('NEW USER', 'You have new user named {$row['name']} ', '1')";
            $insert_notification_run = mysqli_query($con, $insert_notification);

            if($update_query_run)
            {
                //redirect("login.php", "Your Account has been verified Successfully");
                 $_SESSION['message'] = "Your Account has been verified Successfully";
                 $_SESSION['status'] = "success";
                 header("Location: login.php");
                exit(0);
            }
            else
            {
                //redirect("login.php", "Verification Failed");
                 $_SESSION['message'] = "Verification Failed";
                 $_SESSION['status'] = "error";
                 header("Location: login.php");
                exit(0);
            }

        }
        else
        {
            //redirect("login.php", "Email Already Verify");
             $_SESSION['message'] = "Email Already Verify";
             $_SESSION['status'] = "warning";
             header("Location: login.php");
            exit(0);
        }

    }
    else
    {
        //redirect("login.php", "This Token does not Exists");
         $_SESSION['message'] = "This Token does not Exists";
         $_SESSION['status'] = "error";
         header("Location: login.php");
    }
}
else
{
    //redirect("login.php", "Not Allowed");
     $_SESSION['message'] = "Not Allowed";
     $_SESSION['status'] = "error";
     header("location: login.php");
}

?>
