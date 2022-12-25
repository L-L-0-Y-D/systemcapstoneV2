<?php
$key = "qkwjdiw239&&jdafweihbrhnan&^%&ggdnawhd4njshjwuuO";
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

    
function sendphonenumber_confirmreservation($namereserve,$username,$phonenumber,$date,$time,$numguest,$tableno,$businame,$businessid)
{

    $ch = curl_init();
    $parameters = array(
        'apikey' => 'bd676e421ee447473d5e7f249a3bf795', //Your API KEY
        'number' => $phonenumber,
        'message' => 'Hello '.$username.'!,
Thank you for making your reservation with I-Eat. Your reservation has been confirmed.

Here is your reservation details;
When:  '.$date.' '.$time.'
Who:'.$namereserve.'
What:Table'.$tableno.' for '.$numguest.'
Where:'.$businame.'
                    
Until your next reservation!',
                
        'sendername' => 'IEAT'
    );
    curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
    curl_setopt( $ch, CURLOPT_POST, 1 );

    //Send the parameters set above with the request
    curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

    // Receive response from server
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    $output = curl_exec( $ch );
    curl_close ($ch);

    //Show the server response
    if($output)
    {
        redirect("../business/reservation.php?id=$businessid", "Reservation Approved Message will be sent", "success");
    }
    else
    {
        redirect("../business/reservation.php?id=$businessid", "Message not sent", "error");
    }
    
}

function sendphonenumber_declinedreservation($name,$phonenumber,$date,$time,$numguest,$tableno,$businame,$businessid)
{

    $ch = curl_init();
    $parameters = array(
        'apikey' => 'bd676e421ee447473d5e7f249a3bf795', //Your API KEY
        'number' => $phonenumber,
        'message' => 'Hello '.$name.'!,
For some reason '.$businame.' can not accept reservations as of now, but you can try with a different restaurant!

looking forward to hearing from you again soon!',
        'sendername' => 'IEAT'
    );
    curl_setopt( $ch, CURLOPT_URL,'https://semaphore.co/api/v4/messages' );
    curl_setopt( $ch, CURLOPT_POST, 1 );

    //Send the parameters set above with the request
    curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query( $parameters ) );

    // Receive response from server
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
    $output = curl_exec( $ch );
    curl_close ($ch);

    //Show the server response
    if($output)
    {
        redirect("../business/reservation.php?id=$businessid", "Reservation Declined Message will be sent", "success");
    }
    else
    {
        redirect("../business/reservation.php?id=$businessid", "Message not sent", "error");
    }
    
}

function sendemail_confirmreservation($email,$namereserve,$username,$phonenumber,$date,$time,$numguest,$tableno,$businame,$businessid)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        //$mail->SMTPDebug = 2; 
        $mail->isSMTP();
        $mail->SMTPAuth   = true; 

        $mail->Host       = "smtp.hostinger.com";
        $mail->Username   = "reservationconfirmed@ieat.store";
        $mail->Password   = "*Password5*";

        // $mail->SMTPOptions = array(
        //     'ssl' => array(
        //     'verify_peer' => false,
        //     'verify_peer_name' => false,
        //     'allow_self_signed' => true
        //     )
        //     );
        $mail->SMTPSecure = "ssl";
        $mail->Port       = 465;
        
        $mail->setFrom("reservationconfirmed@ieat.store", "I-EAT Reservation Confirmed");
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Reservation Approved'; 

        $email_template = "
        <h1>Hello $username!</h1>
        <h2>Thank you for making your reservation with I-Eat. Your reservation has been confirmed.</h2>
        <p>Here is your reservation details;<br>
        When:$date $time<br>
        Who:$namereserve<br>
        What:Table $tableno for $numguest<br>
        Where:$businame<br>
        <br>                    
        Until your next reservation!'</p>
        ";

        $mail->Body    = $email_template;
        $mail->send();
    // echo 'Message has been sent';
    
    
    }

    function sendemail_declinedreservation($email,$name,$businame)
    {
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        //$mail->SMTPDebug = 2; 
        $mail->isSMTP();
        $mail->SMTPAuth   = true; 

        $mail->Host       = "smtp.hostinger.com";
        $mail->Username   = "reservationdeclined@ieat.store";
        $mail->Password   = "*Password6*";

        // $mail->SMTPOptions = array(
        //     'ssl' => array(
        //     'verify_peer' => false,
        //     'verify_peer_name' => false,
        //     'allow_self_signed' => true
        //     )
        //     );
        $mail->SMTPSecure = "ssl";
        $mail->Port       = 465;
        
        $mail->setFrom("reservationdeclined@ieat.store", "I-EAT Reservation Declined");
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Reservation Declined'; 

        $email_template = "
        <b>Hello $name!</b>
        <h2>For some reason '.$businame.' can not accept reservations as of now, but you can try with a different restaurant!</h2>
        <br>
        <p>looking forward to hearing from you again soon!'.</p>
        ";

        $mail->Body    = $email_template;
        $mail->send();
    // echo 'Message has been sent';
    
    
    }


function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}

function getAllNotArchive($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE NOT status = '2'";
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
    $query = "SELECT business.businessid,business.business_name,business.business_address,business.latitude,business.longitude,business.municipalityid,business.cuisinename,business.image_cert,business.business_firstname,business.business_lastname,business.business_phonenumber,business.business_owneraddress,business.business_email,business.business_password,business.image,business.role_as,business.status,business.created_at
    FROM business";
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
    $query = "SELECT business.businessid,business.business_name,business.business_address,business.latitude,business.longitude,business.municipalityid,business.cuisinename,business.image_cert,business.business_firstname,business.business_lastname,business.business_phonenumber,business.business_owneraddress,business.business_email,business.business_password,business.image,business.role_as,business.status,business.created_at
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