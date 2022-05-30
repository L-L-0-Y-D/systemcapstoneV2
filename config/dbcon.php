<?php

/* This is the code that connects to the database. */
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "thesis";

    // Creating database connection
    $con = mysqli_connect($host,$username,$password,$database);

    //Check database connection
    if(!$con){
        die("Connetion Failed: ". mysqli_connect_error());
    }

?>