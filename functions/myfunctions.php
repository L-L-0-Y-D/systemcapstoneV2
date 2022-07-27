<?php

session_start();
include('../config/dbcon.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    require '../vendor/autoload.php';

function sendemail_verify($name,$email,$verify_token)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    //$mail->SMTPDebug = 2; 
    $mail->isSMTP();
    $mail->SMTPAuth   = true; 

    $mail->Host       = "smtp.gmail.com";
    $mail->Username   = "ieatwebsite@gmail.com";
    $mail->Password   = "ydckqbbwsloabncq";

    $mail->SMTPSecure = "tls";
    $mail->Port       = 587;
    
    $mail->setFrom("ieatwebsite@gmail.com", "I-EAT");
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Email Verification'; 

    $email_template = "
        <h1>Hello $name!! </h1>
        <h2>You have Register with I-EAT</h2>
        <h3>Verify your email <a href='http://localhost/systemcapstoneV2/verify-email.php?token=$verify_token'>Here.<a></h3>
        
    ";

    $mail->Body    = $email_template;
    $mail->send();
   // echo 'Message has been sent';


}

//for getting all the data in the table
function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}

function businessGetAll()
{
    global $con;
    $query = "SELECT business.businessid,business.business_name,business.business_address,business.municipalityid,business.opening,business.closing,municipality.municipality_name,business.categoryid,mealcategory.categoryname,business.image_cert,business.business_firstname,business.business_lastname,business.business_phonenumber,business.business_owneraddress,business.business_email,business.business_password,business.image,business.role_as,business.status,business.created_at
    FROM business
    JOIN mealcategory 
    ON business.categoryid=mealcategory.categoryid
    JOIN municipality
    ON business.municipalityid=municipality.municipalityid";
    return $query_run = mysqli_query($con, $query);
}

function menuGetAll()
{
    global $con;
    $query = "SELECT products.productid,products.name,business.business_name,products.description,products.food_type,products.price,products.image,products.status,products.created_at
    FROM products
    JOIN business 
    ON products.businessid=business.businessid";
    return $query_run = mysqli_query($con, $query);
}

function reservationGetAll()
{
    global $con;
    $query = "SELECT reservations.reservationid,reservations.namereserveunder,reservations.numberofguest,reservations.reservation_date,reservations.reservation_time,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,business.business_name,business.opening,business.closing,reservations.userid,reservations.status
    FROM reservations
    JOIN business 
    ON reservations.businessid=business.businessid";
    return $query_run = mysqli_query($con, $query);
}


function getAllStatus($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status= '0'";
    return $query_run = mysqli_query($con, $query);
}

//for getting all the data in the table
function getByID($table, $id, $tabledata)
{
    global $con;
    $query = "SELECT * FROM $table WHERE $tabledata='$id'";
    return $query_run = mysqli_query($con, $query);
}


//for the Notification Message
function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}



?>