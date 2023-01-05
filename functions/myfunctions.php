<?php
$key = "qkwjdiw239&&jdafweihbrhnan&^%&ggdnawhd4njshjwuuO";
session_start();
include('../config/dbcon.php');

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    //Load Composer's autoloader
    require '../vendor/autoload.php';


function sendemail_forgetpassword($email,$verify_token)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    //$mail->SMTPDebug = 2; 
    $mail->isSMTP();
    $mail->SMTPAuth   = true; 

    $mail->Host       = "smtp.hostinger.com";
    $mail->Username   = "recoverpassword@ieat.store";
    $mail->Password   = "*Password1*";

    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    $mail->SMTPSecure = "ssl";
    $mail->Port       = 465;
    
    $mail->setFrom("recoverpassword@ieat.store", "I-EAT Recover Password");
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Recover your Password'; 

    $email_template = "
    <b>Dear User</b>
    <h3>We received a request to reset your password.</h3>
    <p>Kindly click the below link to reset your password</p>
    <a href='https://ieat.store/resetpassword.php?token=$verify_token'>Clicked here<a>
    ";

    $mail->Body    = $email_template;
    $mail->send();
   // echo 'Message has been sent';
   redirect("../login.php", "Password Reset Link Send Successfully Please Check Your Email", "success");

}

function sendemail_businessconfirm($email,$name)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    //$mail->SMTPDebug = 2; 
    $mail->isSMTP();
    $mail->SMTPAuth   = true; 

    $mail->Host       = "smtp.hostinger.com";
    $mail->Username   = "businessapproved@ieat.store";
    $mail->Password   = "*Password2*";

    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    $mail->SMTPSecure = "ssl";
    $mail->Port       = 465;
    
    $mail->setFrom("businessapproved@ieat.store", "I-EAT Business Approved");
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Business Approved'; 

    $email_template = "
    <b>Dear $name</b>
    <h3>Congratulations.</h3>
    <p>We check your business details and all the files you send<p>
    https://ieat.store/ownerlogin.php
    ";

    $mail->Body    = $email_template;
    $mail->send();
   // echo 'Message has been sent';


}

// function sendemail_businessconfirm($email,$name)
// {
//     //Create an instance; passing `true` enables exceptions
//     $mail = new PHPMailer(true);

//     //$mail->SMTPDebug = 2; 
//     $mail->isSMTP();
//     $mail->SMTPAuth   = true; 

//     $mail->Host       = "smtp.gmail.com";
//     $mail->Username   = "ieatwebsite@gmail.com";
//     $mail->Password   = "ydckqbbwsloabncq";

//     $mail->SMTPOptions = array(
//         'ssl' => array(
//         'verify_peer' => false,
//         'verify_peer_name' => false,
//         'allow_self_signed' => true
//         )
//         );
//     $mail->SMTPSecure = "tls";
//     $mail->Port       = 587;
    
//     $mail->setFrom("ieatwebsite@gmail.com", "I-EAT");
//     $mail->addAddress($email);

//     $mail->isHTML(true);
//     $mail->Subject = 'Business Update'; 

//     $email_template = "
//     <b>Dear $name</b>
//     <h3>Congratulations.</h3>
//     <p>We check your business details and all the files you send<p>
//     http://localhost/systemcapstoneV2/index.php
//     ";

//     $mail->Body    = $email_template;
//     $mail->send();
//    // echo 'Message has been sent';


// }

function sendemail_businesdeclined($email,$name,$reason)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    //$mail->SMTPDebug = 2; 
    $mail->isSMTP();
    $mail->SMTPAuth   = true; 

    $mail->Host       = "smtp.hostinger.com";
    $mail->Username   = "businessdeclined@ieat.store";
    $mail->Password   = "*Password3*";

    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    $mail->SMTPSecure = "ssl";
    $mail->Port       = 465;
    
    $mail->setFrom("businessdeclined@ieat.store", "I-EAT Business Declined");
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Business Declined'; 

    $email_template = "
    <b>Dear $name</b>
    <h3>Sorry to Inform you.</h3>
    <p>We check your business details and all the files you send and sorry to inform you that you are been declined for the reason of $reason <p>
    https://ieat.store
    ";

    $mail->Body    = $email_template;
    $mail->send();
   // echo 'Message has been sent';


}

//for getting all the data in the table
function getAll($table)
{
    global $con;
    $query = "SELECT * FROM $table WHERE NOT status='3'";
    return $query_run = mysqli_query($con, $query);
}

function businessGetAll()
{
    global $con;
    $query = "SELECT business.businessid,business.business_name,business.business_address,business.latitude,business.longitude,business.municipalityid,business.opening,business.closing,municipality.municipality_name,business.cuisinename,business.image_cert,business.business_firstname,business.business_lastname,business.business_phonenumber,business.business_owneraddress,business.business_email,business.business_password,business.image,business.role_as,business.status,business.created_at
    FROM business
    JOIN municipality
    ON business.municipalityid=municipality.municipalityid
    WHERE NOT business.status = '3'
    ORDER BY business.businessid DESC";
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

function feedbackGetAll()
{
    global $con;
    $query = "SELECT review_table.review_id,review_table.businessid,review_table.user_name,review_table.user_rating,review_table.user_review,business.business_name,review_table.datetime
    FROM review_table
    JOIN business 
    ON review_table.businessid=business.businessid";
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

function sendemail_verify($name,$email,$verify_token)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    $key = "qkwjdiw239&&jdafweihbrhnan&^%&ggdnawhd4njshjwuuO";
    $token = urlencode(encryptthis($verify_token, $key));

    //$mail->SMTPDebug = 2; 
    $mail->isSMTP();
    $mail->SMTPAuth   = true; 

    $mail->Host       = "smtp.hostinger.com";
    $mail->Username   = "verifyaccount@ieat.store";
    $mail->Password   = "*Password4*";

    $mail->SMTPOptions = array(
        'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        )
        );
    $mail->SMTPSecure = "ssl";
    $mail->Port       = 465;
    
    $mail->setFrom('verifyaccount@ieat.store', 'I-EAT Verify Email');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Email Verification'; 

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
                            <p style='margin: 0;'>Dear $name,</p><br>
                            <p style='margin: 0;'>We're excited to have you get started $name. First, you need to confirm your account. Just press the Confirm Account below.</p>
                        </td>
                    </tr>
                    <tr>
                        <td bgcolor='#ffffff' align='left'>
                            <table width='100%' border='0' cellspacing='0' cellpadding='0'>
                                <tr>
                                    <td bgcolor='#ffffff' align='center' style='padding: 20px 30px 60px 30px;'>
                                        <table border='0' cellspacing='0' cellpadding='0'>
                                            <tr>
                                                <td align='center' style='border-radius: 3px;' bgcolor='#FFA73B'><a href='https://ieat.store/verify-email.php?token=$token' target='_blank' style='font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #060505; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid rgb(255,128,64); display: inline-block;'>Confirm Account</a></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> <!-- COPY -->
                    <tr>
                        <td bgcolor='#ffffff' align='left' style='padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;'>
                            <p style='margin: 0;'>Cheers,<br>I-eat</p>
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

function getlocation()
{
    global $con;
    $query = "SELECT * FROM business WHERE status='1'";
    return $query_run = mysqli_query($con, $query);
}

function sendphonenumber_confirmverification($username,$phonenumber,$verify_token,$user_data)
{
    $key = "qkwjdiw239&&jdafweihbrhnan&^%&ggdnawhd4njshjwuuO";
    $token = urlencode(encryptthis($verify_token, $key));

    $ch = curl_init();
    $parameters = array(
        'apikey' => 'bd676e421ee447473d5e7f249a3bf795', //Your API KEY
        'number' => $phonenumber,
        'message' => 'Hello '.$username.'!,
Were excited to have you get started. First, you need to confirm your account. Just press the Link below..

https://ieat.store/verify-email.php?token='.$token.'
                    
Cheers,
I-EAT',
                
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
        redirect("../login.php", "Registration Success Please verify your account to login", "success");
    }
    else
    {
        redirect("../register.php?error=Something went wrong&$user_data", "Something went wrong", "error");
    }
    
}

function sendphonenumber_otp($username,$phonenumber,$message)
{
    $ch = curl_init();
    $parameters = array(
        'apikey' => 'bd676e421ee447473d5e7f249a3bf795', //Your API KEY
        'number' => $phonenumber,
        'message' => 'Hello '.$username.'!,
'.$message.'',
                
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
        redirect("../otpverification.php", "Login Success", "success");
    }
    else
    {
        redirect("../login.php", "Something Went Wrong", "error");
    }
    
    
}

function sendphone_message($username,$phonenumber,$message,$ifredirect,$elseredirect,$alert)
{
    $ch = curl_init();
    $parameters = array(
        'apikey' => 'bd676e421ee447473d5e7f249a3bf795', //Your API KEY
        'number' => $phonenumber,
        'message' => 'Hello '.$username.'!,
'.$message.'',
                
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
        redirect("$ifredirect", "$alert", "success");
    }
    else
    {
        redirect("$elseredirect", "$alert", "error");
    }
    
    
}



?>