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
    //part 5
    $stmt = $mysqli->prepare("SELECT * FROM reservations WHERE reservation_date = ? AND reservation_time = ? AND tableid=?");
    $stmt -> bind_param('ssi', $date, $reservation_time, $resourceid);
    
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
            redirect("book.php?date=$date&tableid=$resourceid&id=$businessid", "Time Already Booked", "warning");

        }else{
            if(preg_match("/^[0-9]\d{10}$/",$_POST['reservation_phonenumber']))
            {

                $stmt = $mysqli->prepare("INSERT INTO reservations (namereserveunder, reservation_time,reservation_phonenumber, reservation_email, reservation_date, tableid, businessid, userid) VALUES (?,?,?,?,?,?,?,?)");
                $stmt -> bind_param('sssssiii',$namereserveunder,$reservation_time,$reservation_phonenumber,$reservation_email,$date,$resourceid,$businessid,$userid);
                $stmt -> execute();
                $msg = "<div class='alert alert-sucess'>Booking Successfull</div>";
            
                //part 5
                $bookings[] = $reservation_time;
                // endpart5
            
                $stmt -> close();
                $mysqli -> close();
            
                redirect("../businessview.php?id=$businessid", "Reservation for Approval", "success");
            }
            else
            {
                redirect("../book.php?date=$date&tableid=$resourceid&id=$businessid", "Phone Number must be 11 digits", "warning");
            }
            
        }
    }
}
else
{
    echo"reservation not complete";
}