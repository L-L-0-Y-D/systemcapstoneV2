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
            <h3>Verify your email <a href='http://localhost/systemcapstoneV2/verify-email.php?token=$verify_token'>here.<a></h3>
            
        ";
    
        $mail->Body    = $email_template;
        $mail->send();
       // echo 'Message has been sent';
    
    
    }
    
    function sendemail_forgetpassword($email,$verify_token)
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
        $mail->Subject = 'Recover your Password'; 
    
        $email_template = "
        <b>Dear Business Owner</b>
        <h3>We received a request to reset your password.</h3>
        <p>Kindly click the below link to reset your password</p>
        <a href='http://localhost/systemcapstoneV2/resetbusinesspassword.php?token=$verify_token'>Clicked here<a>
        ";
    
        $mail->Body    = $email_template;
        $mail->send();
       // echo 'Message has been sent';
    
    
    }
    
    function sendemail_businessconfirm($email,$name)
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
        $mail->Subject = 'Business Confirm'; 
    
        $email_template = "
        <b>Dear $name</b>
        <h3>Congratulations.</h3>
        <p>We check your business details and all the files you send<p>
        http://localhost/systemcapstoneV2/index.php
        ";
    
        $mail->Body    = $email_template;
        $mail->send();
       // echo 'Message has been sent';
    
    
    }

    function sendemail_confirmreservation($name,$email,$date,$time,$numguest)
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
        $mail->Subject = 'Business Confirm'; 
    
        $email_template = "
        <b>Dear $name</b>
        <h3>Congratulations.</h3>
        <p>You are now reserve with of $numguest and the time and date are $date and $time
        ";
    
        $mail->Body    = $email_template;
        $mail->send();
       // echo 'Message has been sent';
    
    
    }
    


function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table ORDER BY businessid DESC";
    return $query_run = mysqli_query($con, $query);
}

function getAllActive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE status= '0'";
    return $query_run = mysqli_query($con, $query);
}

function businessGetAll()
{
    global $con;
    $query = "SELECT business.businessid,business.business_name,business.business_address,business.municipalityid,business.categoryid,mealcategory.categoryname,business.image_cert,business.business_firstname,business.business_lastname,business.business_phonenumber,business.business_owneraddress,business.business_email,business.business_password,business.image,business.role_as,business.status,business.created_at
    FROM business
    INNER JOIN mealcategory ON business.categoryid=mealcategory.categoryid;";
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
    $query = "SELECT * FROM products WHERE businessid='$businessid'";
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

function getByID($table, $id, $tabledata)
{
    global $con;
    $query = "SELECT * FROM $table WHERE $tabledata='$id'";
    return $query_run = mysqli_query($con, $query);
}

function businessGetByIDActives($id)
{
    global $con;
    $query = "SELECT business.businessid,business.business_name,business.business_address,business.latitude,business.longitude,business.municipalityid,business.categoryid,mealcategory.categoryname,business.image_cert,business.business_firstname,business.business_lastname,business.business_phonenumber,business.business_owneraddress,business.business_email,business.business_password,business.image,business.role_as,business.status,business.created_at
    FROM business
    JOIN mealcategory 
    ON business.categoryid=mealcategory.categoryid
    WHERE business.businessid='$id' 
    AND business.status='1' ";
    //echo $query;
    return $query_run = mysqli_query($con, $query);
}

function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}




?>