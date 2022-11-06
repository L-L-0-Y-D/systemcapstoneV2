<?php
session_start(); //start session
//session_destroy(); // distroy all the current sessions

/* Checking if the session is set, if it is, it will unset the session and then redirect the user to
the index page. */
if(isset($_SESSION['auth'])){
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);
    //unset($_SESSION['business_name']);
    $_SESSION['message'] = "Logged Out Successfully";
    $_SESSION['status'] = "success";
    
}

header('Location: index.php');

?>