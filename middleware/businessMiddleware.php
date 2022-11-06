<?php
include('../functions/businessfunctions.php');

/* This is checking if the user is logged in and if the user is an admin. If the user is not logged in,
they are redirected to the login page. If the user is logged in but not an admin, they are
redirected to the index page. */
if(isset($_SESSION['auth'])){

    if($_SESSION['role_as'] != 2){

    redirect("../index.php", "You are not authorized to access this page", "warning");

    }

}else{

    redirect("../businessreg.php", "Login to Continue", "warning");

}

?>