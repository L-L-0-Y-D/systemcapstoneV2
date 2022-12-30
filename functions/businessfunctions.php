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

function sendemail_business($name,$email)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    //$mail->SMTPDebug = 2; 
    $mail->isSMTP();
    $mail->SMTPAuth   = true; 

    $mail->Host       = "smtp.hostinger.com";
    $mail->Username   = "business@ieat.store";
    $mail->Password   = "*Password7*";

    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    $mail->SMTPSecure = "ssl";
    $mail->Port       = 465;
    
    $mail->setFrom('business@ieat.store', 'I-EAT ADMIN to Business');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Business Waiting for Approval'; 

    $email_template = "
    <!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge' />
    <style type='text/css'>
        @media screen {
            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 400;
                src: local('Lato Regular'), local('Lato-Regular'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: normal;
                font-weight: 700;
                src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 400;
                src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
            }

            @font-face {
                font-family: 'Lato';
                font-style: italic;
                font-weight: 700;
                src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
            }
        }

        /* CLIENT-SPECIFIC STYLES */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        /* RESET STYLES */
        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* iOS BLUE LINKS */
        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* MOBILE STYLES */
        @media screen and (max-width:600px) {
            h1 {
                font-size: 32px !important;
                line-height: 32px !important;
            }
        }

        /* ANDROID CENTER FIX */
        div[style*='margin: 16px 0;'] {
            margin: 0 !important;
        }
    </style>
</head>

<body style='background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;'>
    <!-- HIDDEN PREHEADER TEXT -->
    <div style='display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: 'Lato', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;'> We're thrilled to have you here! Get ready to dive into your new account.
    </div>
    <table border='0' cellpadding='0' cellspacing='0' width='100%'>
        <!-- LOGO -->
        <tr>
            <td bgcolor='#FFA73B' align='center'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td align='center' valign='top' style='padding: 40px 10px 40px 10px;'> </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor='#FFA73B' align='center' style='padding: 0px 10px 0px 10px;'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td bgcolor='#ffffff' align='center' valign='top' style='padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;'>
                            <h1 style='font-size: 48px; font-weight: 400; margin: 2;'>Welcome!</h1> <img src='https://ieat.store/uploads/logoT.png' width='125' height='120' style='display: block; border: 0px;' />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    <tr>
                        <td bgcolor='#ffffff' align='left' style='padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>Hi! $name,</p><br>
                            <p style='margin: 0;'>Thank you for registering on I-Eat</p><br>
                            <p style='margin: 0;'>We have received your registration details and will be reviewing them. We're excited to work with you, and we will immediately notify you once we've activated your account.</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor='#ffffff' align='left'>
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                    <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'>
                                        <table border='0' cellspacing='0' cellpadding='0'>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>Cheers,<br>I-EAT</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor='#f4f4f4' align='center' style='padding: 30px 10px 0px 10px;'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td bgcolor='#f4f4f4' align='center' style='padding: 0px 10px 0px 10px;'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%' style='max-width: 600px;'>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
    ";

    $mail->Body    = $email_template;
    $mail->send();
   // echo 'Message has been sent';


}




?>