<?php

$mysqli = new mysqli('localhost', 'u217632220_ieat', 'Hj1@8QuF3C', 'u217632220_ieatwebsite');    
      

function timeslots($duration, $cleanup, $start, $end)
{
    // $id = $_GET['id'];
    // $business = businessGetByIDActives($id);
    // $data = mysqli_fetch_array($business);
    // $duration = 60;
    // $cleanup = 10;
    // $start = $data['opening'];
    // $end = $data['closing']; 

    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();

    for($intStart = $start; $intStart < $end; $intStart -> add($interval) -> add($cleanupInterval))
    {
        $endPeriod = clone $intStart;
        $endPeriod -> add($interval);
        if($endPeriod > $end)
        {
            break;
        }

        $slots[] = $intStart -> format("H:iA")."-".$endPeriod -> format("H:iA");
        // count($slots);
    }

    return $slots;

}

function build_calendar($month,$year,$resourceid){
    $mysqli = new mysqli('localhost', 'u217632220_ieat', 'Hj1@8QuF3C', 'u217632220_ieatwebsite');

    //slots data
    $id = $_GET['id'];
    $business = "SELECT business.businessid,business.business_name,business.duration,business.business_address,business.latitude,business.longitude,business.municipalityid,business.cuisinename,business.image_cert,business.opening,business.closing,business.business_firstname,business.business_lastname,business.business_phonenumber,business.business_owneraddress,business.business_email,business.business_password,business.image,business.role_as,business.status,business.created_at
    FROM business
    WHERE business.businessid='$id' 
    AND business.status='1' ";
    $query_reservation_run = mysqli_query($mysqli, $business);
    $business = $query_reservation_run;
    $data = mysqli_fetch_array($business);
    $duration = $data['duration'];
    $cleanup = 0;
    $start = $data['opening'];
    $end = $data['closing'];  
    date_default_timezone_set("Asia/Singapore");

    //test additional features
    //  $datetime = $_POST['date'];
    //  $query_reservation_hours = "SELECT * FROM reservationhours WHERE businessid = $id AND daysoftheweek_int = DAYOFWEEK('$datetime')";
    //  $query_reservation_hours_run = mysqli_query($mysqli, $query_reservation_hours);
    //  $reservation_hours = mysqli_fetch_array($query_reservation_hours_run);


    // $duration = $data['duration'];
    // $cleanup = 0;

    // $start = date("H:i");
    // $start = date("H:i:s", strtotime($data['opening']));
    // $end = date("H:i:s", strtotime($data['closing']));

    /* Getting the opening and closing time of the business. */
    //  $start = $reservation_hours['opening'];
    //  $end = $reservation_hours['closing'];
    //END


    // Part 2
    
    // $stmt = $mysqli->prepare("SELECT * FROM bookings WHERE MONTH(date) = ? AND YEAR(date) = ?");
    // $stmt -> bind_param('ss', $month, $year);
    // $bookings = array();

    // if($stmt -> execute())
    // {
    //     $result = $stmt -> get_result();
    //     if($result -> num_rows > 0)
    //     {
    //         while($row = $result -> fetch_assoc())
    //         {
    //             $bookings[] = $row['date'];
    //         }

    //         $stmt -> close();
    //     }
    // }

    $id = $_GET['id'];

    /* Creating an array of the days of the week. */
    $daysOfWeek = array('Sun','Mon','Tues','Wed','Thurs','Fri','Sat');

    /* Creating a timestamp for the first day of the month. */
    $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

    /* The above code is getting the number of days in the month. */
    $numberDays = date('t',$firstDayOfMonth);

    /* The above code is getting the date of the first day of the month. */
    $dateComponents = getdate($firstDayOfMonth);

    /* Assigning the month name to the variable . */
    $monthName = $dateComponents['month'];

    /* The above code is assigning the value of the day of the week to the variable . */
    $dayOfWeek = $dateComponents['wday'];

    /* Setting the variable  to the current date. */
    $dateToday = date('Y-m-d');
    
    $calendar = "<table class='table table-bordered table-responsive p-0 m-0'>";
    $calendar .= "<h4><i class='fa fa-calendar-alt'></i>&nbsp;$monthName $year  ";
    $calendar .= "<button class='changemonth btn btn-sm float-end m-1' data-month='".date('m', mktime(0, 0, 0, $month+1, 1, $year))."' data-year='".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>Next <i class='fa fa-arrow-right'></i></button>";
    $calendar .= "<button class='changemonth btn btn-sm float-end m-1' id='current_month' data-month='".date('m')."' data-year='".date('Y')."'>Current Month</button> ";
    $calendar .= "<button class='changemonth btn btn-sm float-end m-1' data-month='".date('m', mktime(0, 0, 0, $month-1, 1, $year))."' data-year='".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'><i class='fa fa-arrow-left'></i>Previous</button><br></h4><hr> ";
    //Adding table
    //Add
   
    
    $stmt = $mysqli->prepare("SELECT * FROM managetable WHERE businessid = ? AND status = '1'");
    $stmt -> bind_param('i', $id);
    if($stmt -> execute())
    {
        $result = $stmt -> get_result();
        if($result -> num_rows > 0)
        {
            $calendar.="<label class='float-start pt-1'>Choose table you'll accomodate :&nbsp; &nbsp;</label><select id='resource_select' class='form-select-sm border-1 mb-3' required>";
            $calendar.="<option value='' disabled selected hidden>Please Select Table</option>";

            while($row = $result -> fetch_assoc())
            {
                
                $selected = $resourceid==$row['tableid'] ? 'selected':'';
                $calendar.= "<option $selected value='{$row['tableid']}'> Table {$row['table_number']} - for {$row['chair']}</option>";
            }
        }
    }
    //Add
    $calendar.="</select><br>";


    $calendar .= "<tr>";

    /* Looping through the days of the week and assigning them to the variable . */
    foreach($daysOfWeek as $day){
        $calendar .="<th class='header'>$day</th>";
    }

    $calendar .= "</tr><tr>";

    /* Checking if the day of the week is greater than 0. If it is, it will loop through the days of
    the week and add a table data tag for each day. */
    if($dayOfWeek > 0){
        for($k=0; $k<$dayOfWeek; $k++){
            $calendar.="<td></td>";
        }
    }

    /* Setting the variable  to 1. */
    $currentDay = 1;

    $month = str_pad($month, 2, "0", STR_PAD_LEFT);

    /* Creating a table with the days of the month. */
    while($currentDay <= $numberDays){

        /* This is checking if the day of the week is equal to 7. If it is, it will set the day of the
        week to 0 and add a table row tag to the variable . */
        if($dayOfWeek == 7){
            $dayOfWeek = 0;
            $calendar.="</tr><tr>";
        }

        $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
        $date = "$year-$month-$currentDayRel";

        $dayname = strtolower(date('l', strtotime($date)));
        $eventNum = 0;
        

        $query_blockdates = "SELECT * FROM blockdate WHERE businessid = $id AND status = 1";
        $query_blockdates_run = mysqli_query($mysqli, $query_blockdates);
        $blockdates = mysqli_fetch_array($query_blockdates_run);
        $reasons="";
        $blocks = "";
        // $stmtblock = $mysqli->prepare("SELECT * FROM blockdate WHERE businessid = ? AND status = 1");
        // $stmtblock -> bind_param('i', $id);
        // $stmtblock -> execute();
        // $resultblock = $stmtblock -> get_result();
        // $resultblock -> fetch_assoc();

        // $data = $blockdates;
        // $users = array($data['blockdates']);  
        $query_sameday_reservation = "SELECT * FROM business WHERE businessid = $id AND status = 1";
        $query_sameday_reservation_run = mysqli_query($mysqli, $query_sameday_reservation);
        $samedayreserve = mysqli_fetch_array($query_sameday_reservation_run);

        $sameday = $samedayreserve['sameday_reservation'];

        if($sameday == '1')
        {
            $today = $date == date('Y-m-d')?"today":"";
        }
        else
        {
            $today = $date == date('Y-m-d')?"":"";
        }

        
        // // $users = ['john', 'dave', 'tim'];

        // function print_item($item, $key)
        // {
        //     echo "$item test <br>";
        // }

        // $data = array_walk($users, 'print_item');
        
        //test additional features
        // $query_reservation_hours = "SELECT * FROM reservationhours WHERE businessid = $id AND status = 'Closed'";
        // $query_reservation_hours_run = mysqli_query($mysqli, $query_reservation_hours);
        // $reservation_hours = mysqli_fetch_array($query_reservation_hours_run);
        // $reservationhours = "";

        // foreach ($query_reservation_hours_run as $value) {
        //     $reservationhours .=  $dayname == "{$value['daysoftheweek']}";
        //     // $reasons .= "{$value['reason']}";

            
        // }
        //END
        


        //part 6 specific date
        foreach ($query_blockdates_run as $value) {
            $blocks .=  $date == "{$value['blockdates']}";
            // $reasons .= "{$value['reason']}";

            
        }




        

        if($blocks)
        {
            // foreach ($query_blockdates_run as $value) {
                $calendar .= "<td><button class='text-muted disabled'>$currentDay</button><p><i>Restaurant is Closed for this Day Reservation</i></p>";
            // }
            //part 6   
        }
        /* Checking if the date is equal to 2022-11-02. If it is, it will display the date and a
        message saying "Holiday". <p><i>{$value['reason']}</i></p>"*/
        // if($date=="2022-11-02")
        // {
        //     $calendar .= "<td><button class='text-muted disabled'>$currentDay</button><p><i>Holiday</i></p>";
        //     //part 6
            
        // }
        //  }
        //different days
        // elseif($reservationhours)
        // {   // specific day
        //     $calendar .= "<td><button class='text-muted disabled'>$currentDay</button><p><i>No Work</i></p>";
        //     //end part 6
        // }
        // elseif($dayname=='saturday')
        // {   // specific day
        //     $calendar .= "<td><button class='text-muted disabled'>$currentDay</button><p><i>No Work</i></p>";
        //     //end part 6
        // }
        elseif($date<date('Y-m-d'))
        {
            $calendar .= "<td><button class='text-muted disabled'>$currentDay</button>";
        }
        // elseif(in_array($date, $bookings))
        // {
        //     $calendar .= "<td><button class='text-muted disabled'>$currentDay</button><p><i>Already Booked</i></p>";
        // }
        elseif($date<$today)
        {
            $calendar .= "<td class='$today'><button class='currentDay'>$currentDay</button> ";
        }
        else
        {   $timeslots = timeslots($duration, $cleanup, $start, $end);
            $totalbookings = checkSlots($mysqli, $date, $resourceid);

            // $slots = timeslots($duration, $cleanup, $start, $end);

            if($totalbookings == count($timeslots))
            {
                $calendar .= "<td class='$today'><button class='text-muted disabled'>$currentDay</button><p><i>All Booked</i></p>";
            }
            else
            {
                $availableslots = count($timeslots) - $totalbookings;
                $calendar .= "<td class='$today'><button value='reserveBtn' date=".$date." tableid=".$resourceid." id=".$id." class='reserveBtn rounded-circle'>$currentDay</button><p><i>$availableslots slots available</i></p>";

            }
            
        }
    


        /* This is checking if the current day is equal to the current date. If it is, it will add a
        class of today to the table data tag. If it is not, it will add a table data tag without the
        class of today. */
        // if($dateToday == $date){

        //     $calendar .= "<td class='today'><button class='currentDay'>$currentDay</button>";
        
        // }else{

        //     $calendar .= "<td><button class='currentDay'>$currentDay</button>";

        // }


        


        $calendar .= "</td>";

        $currentDay++;
        $dayOfWeek++;
    }

    /* This is checking if the day of the week is not equal to 7. If it is not, it will subtract the
    day of the week from 7 and assign the value to the variable . It will then loop through the
    remaining days and add a table data tag for each day. */
    if($dayOfWeek != 7){
        $remainingDays = 7-$dayOfWeek;
        for($i=0; $i<$remainingDays; $i++){
            $calendar.="<td></td>";
        }
    }

    $calendar .= "</tr>";
    $calendar .= "</table>";

    echo $calendar;

}

function checkSlots($mysqli, $date, $resourceid){
    $statusDeclined = "2";
    $statusCancelled = "3";
    $archive= "0";
    $stmt = $mysqli->prepare("SELECT * FROM reservations WHERE reservation_date = ? AND tableid=? AND archive=? AND NOT status=? AND NOT status=?");
    $stmt -> bind_param('sssss', $date, $resourceid,$archive,$statusDeclined,$statusCancelled);
    $totalbookings = 0;

    if($stmt -> execute())
    {
        $result = $stmt -> get_result();
        if($result -> num_rows > 0)
        {
            while($row = $result -> fetch_assoc())
            {
                $totalbookings++;
            }

            $stmt -> close();
        }
    }

    return $totalbookings;
}

$dateComponents = getdate();
if(isset($_POST['month']) && isset($_POST['year']))
{
    $month = $_POST['month'];
    $year = $_POST['year'];
    $resource_id = $_POST['resource_id'];

}else{

    $month = $dateComponents['mon'];
    $year = $dateComponents['year'];
    // $resource_id = 1;

}

function redirect($url, $message, $status)
{
    $_SESSION['message'] = $message;
    $_SESSION['status'] = $status;
    header('Location: '.$url);
    exit();
}






// $mysqli = new mysqli('localhost', 'u217632220_ieat', 'Hj1@8QuF3C', 'u217632220_ieatwebsite');
// $id = $_GET['id'];
// $stmt = $mysqli->prepare("SELECT * FROM managetable WHERE businessid=? AND status='1' ");
// $stmt -> bind_param('i', $id);

// if($stmt -> execute())
//     {
//         $result = $stmt -> get_result();
//         if($result -> num_rows > 0)
//         {
            echo build_calendar($month, $year, $resource_id);
    //     }else
    //     {
    //         header('Location: '."index.php");
    //         exit();
    //     }
    // }


// if(isset($_GET['date']))
// {
//     $resourceid = $_GET['tableid'];
//     $businessid = $_GET['id'];
//     $stmt = $mysqli->prepare("SELECT * FROM managetable WHERE tableid = ?");
//     $stmt -> bind_param('i', $resourceid);
//     $stmt -> execute();
//     $result = $stmt -> get_result();
//     if($result -> num_rows > 0)
//     {
//         $row = $result -> fetch_assoc();
//         $resourcename = $row['table_number'];
//         $resourcetable = $row['chair'];
//     }


//     $date = $_GET['date'];

//     //part 5
//     $stmt = $mysqli->prepare("SELECT * FROM reservations WHERE reservation_date = ? AND tableid=? AND businessid=?");
//     $stmt -> bind_param('sii', $date, $resourceid, $businessid);
//     $bookings = array();

//     if($stmt -> execute())
//     {
//         $result = $stmt -> get_result();
//         if($result -> num_rows > 0)
//         {
//             while($row = $result -> fetch_assoc())
//             {
//                 $bookings[] = $row['reservation_time'];
//             }
//         }
//     }
// }
// if(isset($_POST['submit']))
// {

//     $namereserveunder = $_POST['namereserveunder'];
//     $reservation_email = $_POST['reservation_email'];
//     $reservation_phonenumber = $_POST['reservation_phonenumber'];
//     $userid = $_POST['userid'];
//     $businessid = $_POST['businessid'];
//     $reservation_time = $_POST['timeslot'];
//     $date = $_GET['date'];
//     //part 5
//     $stmt = $mysqli->prepare("SELECT * FROM reservations WHERE reservation_date = ? AND reservation_time = ? AND tableid=?");
//     $stmt -> bind_param('ssi', $date, $reservation_time, $resourceid);
    
//     $bookings = array();

//     if($stmt -> execute())
//     {
//         $result = $stmt -> get_result();
//         if($result -> num_rows > 0)
//         {
//             // while($row = $result -> fetch_assoc())
//             // {
//             //     $bookings[] = $row['timeslot'];
//             // }

//             // $stmt -> close();

//             $msg = "<div class='alert alert-danger'>Already Booked</div>";
//             redirect("book.php?date=$date&tableid=$resourceid&id=$businessid", "Time Already Booked", "warning");

//         }else{
//             if(preg_match("/^[0-9]\d{10}$/",$_POST['reservation_phonenumber']))
//             {

//                 $stmt = $mysqli->prepare("INSERT INTO reservations (namereserveunder, reservation_time,reservation_phonenumber, reservation_email, reservation_date, tableid, businessid, userid) VALUES (?,?,?,?,?,?,?,?)");
//                 $stmt -> bind_param('sssssiii',$namereserveunder,$reservation_time,$reservation_phonenumber,$reservation_email,$date,$resourceid,$businessid,$userid);
//                 $stmt -> execute();
//                 $msg = "<div class='alert alert-sucess'>Booking Successfull</div>";
            
//                 //part 5
//                 $bookings[] = $reservation_time;
//                 // endpart5
            
//                 $stmt -> close();
//                 $mysqli -> close();
            
//                 redirect("businessview.php?id=$businessid", "Reservation for Approval", "success");
//             }
//             else
//             {
//                 redirect("book.php?date=$date&tableid=$resourceid&id=$businessid", "Phone Number must be 11 digits", "warning");
//             }
            
//         }
//     }



// }



// // function timeslots($duration, $cleanup, $start, $end)
// // {
// //     $start = new DateTime($start);
// //     $end = new DateTime($end);
// //     $interval = new DateInterval("PT".$duration."M");
// //     $cleanupInterval = new DateInterval("PT".$cleanup."M");
// //     $slots = array();

// //     for($intStart = $start; $intStart < $end; $intStart -> add($interval) -> add($cleanupInterval))
// //     {
// //         $endPeriod = clone $intStart;
// //         $endPeriod -> add($interval);
// //         if($endPeriod > $end)
// //         {
// //             break;
// //         }

// //         $slots[] = $intStart -> format("H:iA")."-".$endPeriod -> format("H:iA");
// //         // count($slots);
// //     }

// //     return $slots;

// // }

// if(isset($_POST['value']))
// {
//     redirect("index.php", "test", "success");
// }
// ?>
