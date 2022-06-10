<?php
include('../config/dbcon.php');
include('../functions/myfunctions.php');

if(isset($_POST['reserve_btn']))
{
    $businessid = $_POST['businessid'];
    $numberofguest = $_POST['numberofguest'];
    $userid = $_POST['userid'];
    $namereserveunder = $_POST['namereserveunder'];
    $reservation_email = $_POST['reservation_email'];
    $reservation_phonenumber = $_POST['reservation_phonenumber'];
    $reservation_date = $_POST['reservation_date'];
    $reservation_time = $_POST['reservation_time'];
    $status = isset($_POST['status']) ? "0":"1";

    $insert_query = "INSERT INTO reservations (namereserveunder, numberofguest, reservation_date, reservation_time, reservation_phonenumber, reservation_email, businessid, userid, status) 
    VALUES ('$namereserveunder','$numberofguest','$reservation_date','$reservation_time', '$reservation_phonenumber', '$reservation_email', '$businessid', '$userid', '$status')";
    //mysqli_query($con,$insert_query) or die("bad query: $insert_query");
    $reserve_query_run = mysqli_query($con, $insert_query);

    if($reserve_query_run){
        redirect("../index.php", "Register Successfully");
    }
    else{
        redirect("../reservation.php", "Something went wrong");;
    }
}
else
{
    echo"reservation not complete";
}