<?php

include('../functions/myfunctions.php');

if(isset($_POST['reserve_btn']))
{
    $mysqli = new mysqli('localhost', 'u217632220_ieat', 'Hj1@8QuF3C', 'u217632220_ieatwebsite');
    $namereserveunder = $_POST['namereserveunder'];
    $reservation_email = $_POST['reservation_email'];
    $reservation_phonenumber = $_POST['reservation_phonenumber'];
    $userid = $_POST['userid'];
    $businessid = $_POST['businessid'];
    $reservation_time = $_POST['timeslot'];
    $date = $_POST['date'];
    $resourceid = $_POST['tableid'];
    $statusDeclined = "2";
    $statusCancelled = "3";
    $comment_subject = "NEW RESERVATION";
    $comment_text = "You have new reservation from $namereserveunder";
    $usertype = "3";
    //part 5
    $stmt = $mysqli->prepare("SELECT * FROM reservations WHERE reservation_date = ? AND reservation_time = ? AND tableid=? AND NOT status=? AND NOT status=?");
    $stmt -> bind_param('ssiss', $date, $reservation_time, $resourceid,$statusDeclined,$statusCancelled);
    
    $bookings = array();

    if($stmt -> execute())
    {
        $result = $stmt -> get_result();
        if($result -> num_rows > 0)
        {
            // while($row = $result -> fetch_assoc())
            // {
            //     $bookings[] = $row['timeslot'];
            // }

            // $stmt -> close();

            $msg = "<div class='alert alert-danger'>Already Booked</div>";
            redirect("../reservation.php?id=$businessid", "Time Already Booked", "warning");

        }else{
            if(preg_match("/^[0-9]\d{10}$/",$_POST['reservation_phonenumber']))
            {

                $stmt = $mysqli->prepare("INSERT INTO reservations (namereserveunder, reservation_time,reservation_phonenumber, reservation_email, reservation_date, tableid, businessid, userid) VALUES (?,?,?,?,?,?,?,?)");
                $stmt -> bind_param('sssssiii',$namereserveunder,$reservation_time,$reservation_phonenumber,$reservation_email,$date,$resourceid,$businessid,$userid);
                $stmt -> execute();
                $msg = "<div class='alert alert-sucess'>Booking Successfull</div>";

                $stmtnotif = $mysqli->prepare("INSERT INTO notifications (businessid, comment_subject, comment_text, usertype) VALUES (?,?,?,?)");
                $stmtnotif -> bind_param('ssss',$businessid,$comment_subject,$comment_text,$usertype);
                $stmtnotif -> execute();
            
                //part 5
                $bookings[] = $reservation_time;
                // endpart5
            
                $stmt -> close();
                $stmtnotif -> close();
                $mysqli -> close();
            
                redirect("../businessview.php?id=$businessid", "Reservation for Approval", "success");
            }
            else
            {
                redirect("../reservation.php?id=$businessid", "Phone Number must be 11 digits", "warning");
            }
            
        }
    }
}
else
{
    echo"reservation not complete";
}

if(isset($_POST['cancelled_btn']))
{
    $cancelled = 3;
    $reservationid = $_POST['reservationid'];
    $userid = $_POST['userid'];

    $update_cancelled_query = "UPDATE reservations SET status='$cancelled' WHERE reservationid='$reservationid'";
    $update_cancelled_query_run = mysqli_query($con,$update_cancelled_query) or die("bad query: $update_cancelled_query");

    // $update_table_query_run = mysqli_query($con, $update_table_query);

    if($update_cancelled_query_run)
    {
        //redirect("../your_reservation.php?id=$userid", "Reservation Cancelled", "success");
        redirect("../index.php", "Reservation Cancelled", "success");
        
    }
    else
    {
        redirect("../index.php", "Something Went Wrong", "error"); 
    }
}