<?php
include('middleware/userMiddleware.php');
$mysqli = new mysqli('localhost', 'u217632220_ieat', 'Hj1@8QuF3C', 'u217632220_ieatwebsite');

if(isset($_GET['date']))
{
    $resourceid = $_GET['tableid'];
    $businessid = $_GET['id'];
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


    $date = $_GET['date'];

    //part 5
    $stmt = $mysqli->prepare("SELECT * FROM reservations WHERE reservation_date = ? AND tableid=? AND businessid=?");
    $stmt -> bind_param('sii', $date, $resourceid, $businessid);
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
    $date = $_GET['date'];
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
            
                redirect("businessview.php?id=$businessid", "Reservation for Approval", "success");
            }
            else
            {
                redirect("book.php?date=$date&tableid=$resourceid&id=$businessid", "Phone Number must be 11 digits", "warning");
            }
            
        }
    }



}

$id = $_GET['id'];
$tableid = $_GET['tableid'];
$business = businessGetByIDActives($id);
$data = mysqli_fetch_array($business);

$duration = 60;
$cleanup = 10;
$start = $data['opening'];
$end = $data['closing'];

function timeslots($duration, $cleanup, $start, $end)
{
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



?>
<!doctype html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no"> 
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Inter.css">
    <link rel="stylesheet" href="reg.css">
    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css">
    <title>Reservation | I-Eat</title>
    <link rel="icon" href="uploads/favicon.ico"/>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>I EAT | Booking</title>
  </head>
  <body>
    <div class="container">
        <h1 class="text-center">Booking for Table <?php echo $resourcename; ?> - <?php echo $resourcetable; ?> Date:<?= date('m/d/Y', strtotime($date)); ?></h1><hr>
        <div class="row">
            <div class="col-md-12">
                <?php echo isset($msg)?$msg:""; ?>
            </div>
            <!-- /* Creating a button for each time slot. */ -->
            <?php $timeslots = timeslots($duration, $cleanup, $start, $end);
            // echo count($timeslots); 
            foreach ($timeslots as $ts)
            {
            ?>
            <div class="col-md-2">
                <div class="form-group mb-2">
                    <?php if(in_array($ts, $bookings)){ ?>

                        <button class="btn btn-danger"><?php echo $ts; ?></button>

                    <?php } else { ?>
                        
                        <button class="btn btn-success book" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>

                    <?php } ?>
                </div>
            </div>
            <?php
            }          
            ?>
        </div>
    </div>
    <!-- part 4  -->
    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Booking: <span id="slot"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="">Timeslots</label>
                                <input required type="text" readonly name="timeslot" id="timeslot" class="form-control">
                            </div>
                            <div class="form-group">
                                <input required type="hidden" value="<?= $id;?>" name="businessid" class="form-control">
                            </div>
                            <div class="form-group">
                                <input required type="hidden" value="<?= $_SESSION['auth_user']['userid'];?>" name="userid" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input required type="text" value="<?= $_SESSION['auth_user']['name'];?>" name="namereserveunder" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Email</label>
                                <input required type="email"  value="<?= $_SESSION['auth_user']['email'];?>" name="reservation_email" class="form-control">
                            </div>
                            <div class="form-group mb-2">
                                <label for="">Phonenumber</label>
                                <input required type="text"  value="<?= $_SESSION['auth_user']['phonenumber'];?>" name="reservation_phonenumber" class="form-control">
                            </div>
                            <div class="form-group  pull-right">
                                <button class="btn btn-primary" type="submit" name="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            </div>

        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        $(".book").click(function(){
            var timeslot = $(this).attr('data-timeslot');
            $("#slot").html(timeslot);
            $("#timeslot").val(timeslot);
            $("#myModal").modal("show");
        })

    </script>
    <script>
        <?php if(isset($_SESSION['message'])) 
    { ?>
         alertify.set('notifier','position', 'top-center');
         var msg = alertify.message('Default message');
         msg.delay(3).setContent('<?= $_SESSION['message']; ?>');

        swal({
            title: "<?= $_SESSION['message']; ?>",
            icon: "<?= $_SESSION['alert']; ?>",
            button: "Okay",
            timer: 1500,
            });

        <?php 
        unset($_SESSION['message']);
        unset($_SESSION['alert']);
    }
    ?> 
    </script> 
    
  </body>
</html>