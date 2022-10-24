<?php

/* This is the code that connects to the database. */
    $host = "ieat.store";
    $username = "u217632220_ieat";
    $password = "Hj1@8QuF3C";
    $database = "u217632220_ieatwebsite";

    // Creating database connection
    $con = mysqli_connect($host,$username,$password,$database);

    //Check database connection
    if(!$con){
        die("Connetion Failed: ". mysqli_connect_error());
    }

?>