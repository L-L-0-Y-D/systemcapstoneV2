<?php
$key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
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
    $query = "SELECT reservations.reservationid,reservations.tableid,reservations.reservation_date,reservations.namereserveunder,reservations.reservation_time,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,business.business_name,business.opening,business.closing,business.image,reservations.userid,reservations.status,managetable.tableid,managetable.table_number,managetable.chair,reservations.review,reservations.arrived
    FROM reservations
    JOIN business 
    ON reservations.businessid=business.businessid
    JOIN managetable
    ON reservations.tableid=managetable.tableid
    WHERE reservations.userid = $id
    ORDER BY reservations.reservationid DESC";
    return $query_run = mysqli_query($con, $query);
}
function reservationGetByIDreservation($id)
{
    global $con;
    $query = "SELECT reservations.reservationid,reservations.tableid,reservations.reservation_date,reservations.namereserveunder,reservations.reservation_time,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,business.business_name,business.opening,business.closing,business.image,reservations.userid,reservations.status,managetable.tableid,managetable.table_number,managetable.chair,reservations.review,reservations.arrived
    FROM reservations
    JOIN business 
    ON reservations.businessid=business.businessid
    JOIN managetable
    ON reservations.tableid=managetable.tableid
    WHERE reservations.reservationid = $id
    ORDER BY reservations.reservationid DESC";
    return $query_run = mysqli_query($con, $query);
}

function getReservationByUser($id)
{
    global $con;
    $query = "SELECT reservations.reservationid,reservations.tableid,managetable.tableid,managetable.table_number,reservations.namereserveunder,managetable.chair,reservations.reservation_date,reservations.reservation_time,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,business.business_name,business.opening,business.closing,business.image,reservations.userid,reservations.status,reservations.review,reservations.arrived
    FROM reservations
    JOIN business 
    ON reservations.businessid=business.businessid
    JOIN managetable
    ON reservations.tableid=managetable.tableid
    WHERE reservations.userid = '$id'
    ORDER BY reservations.reservationid DESC";
    return $query_run = mysqli_query($con, $query);
}

function reservationGetByIDWaiting($id)
{
    global $con;
    $query = "SELECT reservations.reservationid,reservations.reservation_date,managetable.tableid,managetable.table_number,managetable.chair,reservations.reservation_time,reservations.namereserveunder,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,business.business_name,business.opening,business.closing,business.image,reservations.userid,reservations.status,reservations.review,reservations.arrived
    FROM reservations
    JOIN business 
    ON reservations.businessid=business.businessid
    JOIN managetable
    ON reservations.tableid=managetable.tableid
    WHERE reservations.userid = $id 
    AND reservations.status = 0
    ORDER BY reservations.reservationid DESC";
    return $query_run = mysqli_query($con, $query);
}

function reservationGetByIDApproved($id)
{
    global $con;
    $query = "SELECT reservations.reservationid,reservations.tableid,managetable.tableid,managetable.table_number,reservations.namereserveunder,managetable.chair,reservations.reservation_date,reservations.reservation_time,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,business.business_name,business.opening,business.closing,business.image,reservations.review,reservations.userid,reservations.status,reservations.review,reservations.arrived
    FROM reservations
    JOIN business 
    ON reservations.businessid=business.businessid
    JOIN managetable
    ON reservations.tableid=managetable.tableid
    WHERE reservations.userid = $id 
    AND reservations.status = 1
    AND NOT reservations.arrived = 1
    ORDER BY reservations.reservationid DESC";
    return $query_run = mysqli_query($con, $query);
}

function reservationGetByIDDeclined($id)
{
    global $con;
    $query = "SELECT reservations.reservationid,reservations.reservation_date,reservations.reservation_time,reservations.namereserveunder,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,business.business_name,business.opening,business.closing,business.image,reservations.userid,reservations.status,reservations.review,reservations.arrived
    FROM reservations
    JOIN business 
    ON reservations.businessid=business.businessid
    WHERE reservations.userid = $id 
    AND reservations.status = 2
    ORDER BY reservations.reservationid DESC";
    return $query_run = mysqli_query($con, $query);
}
function reservationGetByIDCancelled($id)
{
    global $con;
    $query = "SELECT reservations.reservationid,reservations.reservation_date,reservations.reservation_time,reservations.namereserveunder,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,business.business_name,business.opening,business.closing,business.image,reservations.userid,reservations.status,reservations.review,reservations.arrived
    FROM reservations
    JOIN business 
    ON reservations.businessid=business.businessid
    WHERE reservations.userid = $id 
    AND reservations.status = 3
    ORDER BY reservations.reservationid DESC";
    return $query_run = mysqli_query($con, $query);
}

function reservationGetByIDReview($id)
{
    global $con;
    $query = "SELECT reservations.reservationid,reservations.arrived,reservations.tableid,managetable.tableid,managetable.table_number,reservations.namereserveunder,managetable.chair,reservations.reservation_date,reservations.reservation_time,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,business.business_name,business.opening,business.closing,business.image,reservations.review,reservations.userid,reservations.status,reservations.review,reservations.arrived
    FROM reservations
    JOIN business 
    ON reservations.businessid=business.businessid
    JOIN managetable
    ON reservations.tableid=managetable.tableid
    WHERE reservations.userid = $id 
    AND reservations.arrived = 1
    ORDER BY reservations.reservationid DESC";
    return $query_run = mysqli_query($con, $query);
}

function reservationIDGetByIDReview($id)
{
    global $con;
    $query = "SELECT reservations.reservationid,reservations.arrived,reservations.tableid,managetable.tableid,managetable.table_number,reservations.namereserveunder,managetable.chair,reservations.reservation_date,reservations.reservation_time,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,business.business_name,business.opening,business.closing,business.image,reservations.review,reservations.userid,reservations.status,reservations.review,reservations.arrived
    FROM reservations
    JOIN business 
    ON reservations.businessid=business.businessid
    JOIN managetable
    ON reservations.tableid=managetable.tableid
    WHERE reservations.reservationid = $id 
    AND reservations.arrived = 1
    ORDER BY reservations.reservationid DESC";
    return $query_run = mysqli_query($con, $query);
}

function reservationGettable($id)
{
    global $con;
    $query = "SELECT * FROM managetable JOIN reservations ON managetable.tableid=reservations.tableid WHERE reservations.tableid = $id";
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
    $query = "SELECT * FROM $table WHERE status= '1'";
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
    $query = "SELECT * FROM $table WHERE $tabledata='$id' AND status='1' ";
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

function getBusiByMunicipalityandReview($municipality_id)
{
    global $con;
    $query = "SELECT ROUND(AVG(review_table.user_rating),1) AS averagerating,business.businessid,business.business_name,business.business_address,business.latitude,business.longitude,business.municipalityid,business.cuisinename,business.image_cert,business.opening,business.closing,business.business_firstname,business.business_lastname,business.business_phonenumber,business.business_owneraddress,business.business_email,business.business_password,business.image,business.role_as,business.status,business.created_at,review_table.review_id FROM business JOIN review_table ON business.businessid = review_table.businessid WHERE business.municipalityid='$municipality_id' AND business.status='1' group by business.businessid order by averagerating DESC";
    return $query_run = mysqli_query($con, $query);
}

function redirect($url, $message, $alert)
{
    $_SESSION['message'] = $message;
    $_SESSION['alert'] = $alert;
    header('Location: '.$url);
    exit();
}

function encryptthis($data, $key) {

    $encryption_key = base64_decode($key);
    
    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
    
    $encrypted = openssl_encrypt($data, 'aes-256-cbc', $encryption_key, 0, $iv);
    
    return base64_encode($encrypted . '::' . $iv);
    
    }

function decryptthis($data, $key) {

    $encryption_key = base64_decode($key);
        
    list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
        
    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
        
    }

?>