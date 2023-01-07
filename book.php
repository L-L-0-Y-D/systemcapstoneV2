<?php
include('middleware/userMiddleware.php');
$mysqli = new mysqli('localhost', 'u217632220_ieat', 'Hj1@8QuF3C', 'u217632220_ieatwebsite');

$value = $_POST['value'];
$date = $_POST['date'];
$tableid = $_POST['tableid'];
$id = $_POST['id'];

if(isset($date))
{
    $resourceid = $_POST['tableid'];
    $businessid = $_POST['id'];
    $statusDeclined = "2";
    $statusCancelled = "3";
    $archive= "0";
    $stmt = $mysqli->prepare("SELECT * FROM managetable WHERE tableid = ?");
    $stmt -> bind_param('i', $resourceid);
    $stmt -> execute();
    $result = $stmt -> get_result();
    if($result -> num_rows > 0)
    {
        $row = $result -> fetch_assoc();
        $resourcename = $row['table_number'];
        $resourcetable = $row['chair'];
    }


    $date = $_POST['date'];

    //part 5
    $stmt = $mysqli->prepare("SELECT * FROM reservations WHERE reservation_date = ? AND tableid=? AND businessid=? AND archive=? AND NOT status=? AND NOT status=?");
    $stmt -> bind_param('ssisss', $date, $resourceid, $businessid,$archive,$statusDeclined,$statusCancelled);
    $bookings = array();

    if($stmt -> execute())
    {
        $result = $stmt -> get_result();
        if($result -> num_rows > 0)
        {
            while($row = $result -> fetch_assoc())
            {
                $bookings[] = $row['reservation_time'];
            }
        }
    }
}
if(isset($_POST['submit']))
{

    $namereserveunder = $_POST['namereserveunder'];
    $reservation_email = $_POST['reservation_email'];
    $reservation_phonenumber = $_POST['reservation_phonenumber'];
    $userid = $_POST['userid'];
    $businessid = $_POST['businessid'];
    $reservation_time = $_POST['timeslot'];
    $date = $_POST['date'];

    //part 5
    $stmt = $mysqli->prepare("SELECT * FROM reservations WHERE reservation_date = '$date' AND reservation_time = '$reservation_time' AND tableid='$resourceid'");
    $stmt -> bind_param('ssiii', $date, $reservation_time, $resourceid);
    
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
            
                redirect("businessview.php?id=$businessid", "Reservation for Approval", "success");
            }
            else
            {
                redirect("book.php?date=$date&tableid=$resourceid&id=$businessid", "Phone Number must be 11 digits", "warning");
            }
            
        }
    }



}
date_default_timezone_set("Asia/Singapore");
$id = $_GET['id'];
$tableid = $_POST['tableid'];
$business = businessGetByIDActives($id);
$data = mysqli_fetch_array($business);
// $tables=reservationGettable($tableid);
// $row = mysqli_fetch_array($tables);
// $tablenumber = $row['table_number'];
// $tablechair = $row['chair'];

//test additional features
// $datetime = $_POST['date'];
/* This is getting the opening and closing time of the business. */
// $query_reservation_hours = "SELECT * FROM reservationhours WHERE businessid = $id AND daysoftheweek_int = DAYOFWEEK('$date')";
// $query_reservation_hours_run = mysqli_query($mysqli, $query_reservation_hours);
// $reservation_hours = mysqli_fetch_array($query_reservation_hours_run);


$duration = 60;
$cleanup = 0;

// $start = date("H:i");
// $start = date("H:i:s", strtotime($data['opening']));
// $end = date("H:i:s", strtotime($data['closing']));

/* Getting the opening and closing time of the business. */
// $start = $reservation_hours['opening'];
// $end = $reservation_hours['closing'];

/* Getting the opening and closing time of the business. */
$start = $data['opening'];
$end = $data['closing'];

function timeslots($duration, $cleanup, $start, $end)
{
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval('PT'.$duration. 'M');
    $cleanupInterval = new DateInterval('PT'.$cleanup.'M');
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

if(isset($_POST['value'])){
?>
         <hr><h6 class="text-dark">Time Slots for <?= $_POST['date'];?></h6><hr>
    <!-- /* Creating a button for each time slot. */ -->
            <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
            // echo count($timeslots); 
            foreach ($timeslots as $ts)
            {
            ?>
                <?php //if(date("h:i:s") < $start){ ?>
                    <?php if(in_array($ts, $bookings)){ ?>

                        <button class="btn btn-danger w-100" disabled><?php echo $ts; ?> (Pending for reservation)</button>
                        <!-- <div class="shadow"><button class="btn btn-danger btn-lg d-block w-100" data-timeslot="<?php echo $ts; ?>" type="button" style="background: rgb(255,128,64);border-style: none;"><?php echo $ts; ?></button></div> -->

                    <?php } else { ?>

                        <!-- <div class="shadow"><button class="btn btn-primary btn-lg d-block w-100" data-timeslot="<?php echo $ts; ?>" type="button" style="background: rgb(255,128,64);border-style: none;"><?php echo $ts; ?></button></div> -->
                        <button class="btn btn-success book w-100" data-timeslot="<?php echo $ts; ?>"> <?php echo $ts; ?></button>

                    <?php } ?>
                <?php // } ?>

            <?php
            }          
            ?>
            </div>		
			
			<div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div><button type="button" class="btn-close float-end p-2 m-1" id="btn_close"></button></div>
                        <h3 class="pb-0">Booking: 
                            <p class="text-muted fs-6" id="slot"></p>
                        </h3><hr>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form action="functions/codereservation.php" method="post">
                                    <div class="form-group mb-2">
                                        <label for="">Time Slot:</label>
                                        <input required type="text" readonly name="timeslot" id="timeslot" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input required type="hidden" value="<?= $id;?>" name="businessid" class="form-control">
                                        <!-- <input required type="hidden" value="<?= $_POST['date'];?>" name="date" class="form-control"> -->
                                        <input required type="hidden" value="<?= $_POST['tableid'];?>" name="tableid" class="form-control">
                                        <!-- <label for="">Table No:</label>
                                        <input required type="text" readonly value="Table <?php //if($row['tableid'] == $tableid){ echo " $tablenumber for $tablechair";}?>" class="form-control"> -->
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Date of Reservation:</label>
                                        <input required type="text" readonly value="<?= $_POST['date'];?>" name="date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input required type="hidden" value="<?= $_SESSION['auth_user']['userid'];?>" name="userid" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Customer's Name:</label>
                                        <input required type="text" value="<?= $_SESSION['auth_user']['name'];?>" name="namereserveunder" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Email Address:</label>
                                        <input required type="email"  value="<?= $_SESSION['auth_user']['email'];?>" name="reservation_email" class="form-control">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label for="">Phone Number:</label>
                                        <input required type="text"  value="<?= $_SESSION['auth_user']['phonenumber'];?>" name="reservation_phonenumber" class="form-control">
                                    </div>
                                    <div class="form-group  pull-right text-center">
                                        <button class="btn btn-success btn-primary w-50" type="submit" name="reserve_btn">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

		
		
		
		<script>
        $(".book").click(function(){
            var timeslot = $(this).attr('data-timeslot');
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot);
            $("#myModal").modal("show");

            $("#btn_close").click(function(){
                $("#myModal").modal("hide");
                });
        })

		</script>
    </div>
<?php   
}

?>
