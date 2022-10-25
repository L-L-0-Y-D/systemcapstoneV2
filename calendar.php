<?php


function build_calendar($month,$year,$resourceid){
    // Part 2
    $mysqli = new mysqli('localhost', 'u217632220_ieat', 'Hj1@8QuF3C', 'u217632220_ieatwebsite');
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
    $daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');

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

    $calendar = "<table class='table table-bordered'>";
    $calendar .= "<center><h2>$monthName $year</h2>";
    $calendar .= "<button class='changemonth btn btn-xs btn-primary' data-month='".date('m', mktime(0, 0, 0, $month-1, 1, $year))."' data-year='".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'>Previous Month</button> ";
    $calendar .= "<button class='changemonth btn btn-xs btn-primary' id='current_month' data-month='".date('m')."' data-year='".date('Y')."'>Current Month</button> ";
    $calendar .= "<button class='changemonth btn btn-xs btn-primary' data-month='".date('m', mktime(0, 0, 0, $month+1, 1, $year))."' data-year='".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'>Next Month</button></center><br>";

    //Adding table
    //Add
    $calendar.="<labe>Select Table</label><select id='resource_select' class='form-control'>";
    
    $stmt = $mysqli->prepare("SELECT * FROM managetable WHERE businessid = '$id'");

    if($stmt -> execute())
    {
        $result = $stmt -> get_result();
        if($result -> num_rows > 0)
        {
            while($row = $result -> fetch_assoc())
            {
                $selected = $resourceid==$row['tableid'] ? 'selected':'';
                $calendar.= "<option $selected value='{$row['tableid']}'>{$row['table_number']} - {$row['chair']}</option>";
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
        $today = $date == date('Y-m-d')?"today":"";

        //part 6 specific date
        if($date=="2022-11-01")
        {
            $calendar .= "<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>Holiday</button>";
            //part 6
        }
        elseif($dayname=='sunday')
        {   // specific day
            $calendar .= "<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>No Work</button>";
            //end part 6
        }
        elseif($dayname=='saturday')
        {   // specific day
            $calendar .= "<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>No Work</button>";
            //end part 6
        }
        elseif($date<date('Y-m-d'))
        {
            $calendar .= "<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>N/A</button>";
        }
        // elseif(in_array($date, $bookings))
        // {
        //     $calendar .= "<td><h4>$currentDay</h4> <button class='btn btn-danger btn-xs'>Already Booked</button>";
        // }
        elseif($date<$today)
        {
            $calendar .= "<td class='$today'><h4>$currentDay</h4> ";
        }
        else
        {
            $totalbookings = checkSlots($mysqli, $date, $resourceid);
            // $slots = timeslots($duration, $cleanup, $start, $end);

            if($totalbookings == 7)
            {
                $calendar .= "<td class='$today'><h4>$currentDay</h4> <a href='' class='btn btn-danger btn-xs'>All Booked</a>";
            }
            else
            {
                $availableslots = 7 - $totalbookings;
                $calendar .= "<td class='$today'><h4>$currentDay</h4> <a href='book.php?date=".$date."&tableid=".$resourceid."&id=".$id."' class='btn btn-success btn-xs'>Book</a> <small><i>$availableslots slots available</i></small>";
            }
        }

        /* This is checking if the current day is equal to the current date. If it is, it will add a
        class of today to the table data tag. If it is not, it will add a table data tag without the
        class of today. */
        // if($dateToday == $date){

        //     $calendar .= "<td class='today'><h4>$currentDay</h4>";
        
        // }else{

        //     $calendar .= "<td><h4>$currentDay</h4>";

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
    $stmt = $mysqli->prepare("SELECT * FROM reservations WHERE reservation_date = ? AND tableid=?");
    $stmt -> bind_param('ss', $date, $resourceid);
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
    $resource_id = 1;

}

echo build_calendar($month, $year, $resource_id);

?>