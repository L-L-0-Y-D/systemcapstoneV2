<?php
session_start(); //start session
//session_destroy(); // destroy all the current sessions

/* Checking if the session is set, if it is, it will unset the session and then redirect the user to
the index page. */
if(isset($_SESSION['auth'])){
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    unset($_SESSION['EMAIL']);
    //unset($_SESSION['business_name']);
    $_SESSION['message'] = "Logged Out Successfully";
    $_SESSION['status'] = "success";

    unset($_SESSION['message']);
    unset($_SESSION['status']);
    unset($_SESSION['EMAIL']);

    
}


header('Location: index.php');

?>