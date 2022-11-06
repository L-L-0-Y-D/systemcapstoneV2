<?php

session_start();
include('config/dbcon.php');

//for getting all the data in the table
function getByID($table, $id, $tabledata)
{
    global $con;
    $query = "SELECT * FROM $table WHERE $tabledata='$id'";
    return $query_run = mysqli_query($con, $query);
}

function reservationGetByID($id)
{
    global $con;
    $query = "SELECT reservations.reservationid,reservations.tableid,reservations.reservation_date,reservations.namereserveunder,reservations.reservation_time,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,business.business_name,business.opening,business.closing,business.image,reservations.userid,reservations.status,managetable.tableid,managetable.table_number,managetable.chair
    FROM reservations
    JOIN business 
    ON reservations.businessid=business.businessid
    JOIN managetable
    ON reservations.tableid=managetable.tableid
    WHERE reservations.userid = $id";
    return $query_run = mysqli_query($con, $query);
}

function getReservationByUser($id)
{
    global $con;
    $query = "SELECT reservations.reservationid,reservations.tableid,managetable.tableid,managetable.table_number,reservations.namereserveunder,managetable.chair,reservations.reservation_date,reservations.reservation_time,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,business.business_name,business.opening,business.closing,business.image,reservations.userid,reservations.status
    FROM reservations
    JOIN business 
    ON reservations.businessid=business.businessid
    JOIN managetable
    ON reservations.tableid=managetable.tableid
    WHERE reservations.userid = '$id'";
    return $query_run = mysqli_query($con, $query);
}

function reservationGetByIDWaiting($id)
{
    global $con;
    $query = "SELECT reservations.reservationid,reservations.reservation_date,reservations.reservation_time,reservations.namereserveunder,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,business.business_name,business.opening,business.closing,business.image,reservations.userid,reservations.status
    FROM reservations
    JOIN business 
    ON reservations.businessid=business.businessid
    WHERE reservations.userid = $id 
    AND reservations.status = 0";
    return $query_run = mysqli_query($con, $query);
}

function reservationGetByIDApproved($id)
{
    global $con;
    $query = "SELECT reservations.reservationid,reservations.tableid,managetable.tableid,managetable.table_number,reservations.namereserveunder,managetable.chair,reservations.reservation_date,reservations.reservation_time,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,business.business_name,business.opening,business.closing,business.image,reservations.review,reservations.userid,reservations.status
    FROM reservations
    JOIN business 
    ON reservations.businessid=business.businessid
    JOIN managetable
    ON reservations.tableid=managetable.tableid
    WHERE reservations.userid = $id 
    AND reservations.status = 1";
    return $query_run = mysqli_query($con, $query);
}

function reservationGetByIDDeclined($id)
{
    global $con;
    $query = "SELECT reservations.reservationid,reservations.reservation_date,reservations.reservation_time,reservations.namereserveunder,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,business.business_name,business.opening,business.closing,business.image,reservations.userid,reservations.status
    FROM reservations
    JOIN business 
    ON reservations.businessid=business.businessid
    WHERE reservations.userid = $id 
    AND reservations.status = 2";
    return $query_run = mysqli_query($con, $query);
}

function reservationGetByIDReview($id)
{
    global $con;
    $query = "SELECT reservations.reservationid,reservations.arrived,reservations.tableid,managetable.tableid,managetable.table_number,reservations.namereserveunder,managetable.chair,reservations.reservation_date,reservations.reservation_time,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,business.business_name,business.opening,business.closing,business.image,reservations.review,reservations.userid,reservations.status
    FROM reservations
    JOIN business 
    ON reservations.businessid=business.businessid
    JOIN managetable
    ON reservations.tableid=managetable.tableid
    WHERE reservations.userid = $id 
    AND reservations.arrived = 1";
    return $query_run = mysqli_query($con, $query);
}


function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}



function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status= '0'";
    return $query_run = mysqli_query($con, $query);
}
function getNameActive($table, $name, $tabledata)
{
    global $con;
    $query = "SELECT * FROM $table WHERE $tabledata='$name' AND status= '1' LIMIT 1";
    return $query_run = mysqli_query($con, $query);
}
function getBusiByMunicipality($municipality_id)
{
    global $con;
    $query = "SELECT * FROM business WHERE municipalityid='$municipality_id' AND status= '1'";
    return $query_run = mysqli_query($con, $query);
}
function getProductByBusiness($businessid)
{
    global $con;
    $query = "SELECT * FROM products WHERE businessid='$businessid' AND status= '1'";
    return $query_run = mysqli_query($con, $query);
}
function getIDActive($table, $id, $tabledata)
{
    global $con;
    $query = "SELECT * FROM $table WHERE $tabledata='$id' AND status= '0'";
    return $query_run = mysqli_query($con, $query);
}
//getBySlugActive before
function getByNameActive($table, $name, $tabledata)
{
    global $con;
    $query = "SELECT * FROM $table WHERE $tabledata='$name' AND LIMIT 1 ";
    return $query_run = mysqli_query($con, $query);
}

function getBusinessByMunicipality($municipalityid)
{
    global $con;
    $query = "SELECT * FROM business WHERE municipalityid='$municipalityid' AND status='1'";
    return $query_run = mysqli_query($con, $query);
}

function getByIDActive($table, $id, $tabledata)
{
    global $con;
    $query = "SELECT * FROM $table WHERE $tabledata='$id' AND status='0' ";
    return $query_run = mysqli_query($con, $query);
}
function getByIDActives($table, $id, $tabledata)
{
    global $con;
    $query = "SELECT * FROM $table WHERE $tabledata='$id' AND status='1' ";
    return $query_run = mysqli_query($con, $query);
}

function businessGetByIDActives($id)
{
    global $con;
    $query = "SELECT business.businessid,business.business_name,business.business_address,business.latitude,business.longitude,business.municipalityid,business.cuisinename,business.image_cert,business.opening,business.closing,business.business_firstname,business.business_lastname,business.business_phonenumber,business.business_owneraddress,business.business_email,business.business_password,business.image,business.role_as,business.status,business.created_at
    FROM business
    WHERE business.businessid='$id' 
    AND business.status='1' ";
    //echo $query;
    return $query_run = mysqli_query($con, $query);
}


function redirect($url, $message, $alert)
{
    $_SESSION['message'] = $message;
    $_SESSION['alert'] = $alert;
    header('Location: '.$url);
    exit();
}




?>