<?php
include('functions/userfunctions.php');
if(isset($_POST['request'])){

    $id = $_GET['id'];
    $request = $_POST['request'];

    if($request == "All")
    {
        $result = getReservationByUser($id);
        $count = mysqli_num_rows($result);
    }
    elseif($request == "Waiting")
    {
        $result = reservationGetByIDWaiting($id);
        $count = mysqli_num_rows($result); 
    }elseif($request == "Approved")
    {
        $result = reservationGetByIDApproved($id);
        $count = mysqli_num_rows($result); 
    }elseif($request == "Declined")
    {
        $result = reservationGetByIDDeclined($id);
        $count = mysqli_num_rows($result); 
    }elseif($request == "Cancelled")
    {
        $result = reservationGetByIDCancelled($id);
        $count = mysqli_num_rows($result); 
    }elseif($request == "Review")
    {
        $result = reservationGetByIDReview($id);
        $count = mysqli_num_rows($result); 
    }

?>

<table class="table">
    <?php
    if($count)
        {
    ?>
    <!-- <thead>
        <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Description</th>
            <th>Course Menu</th>
            <th>Cuisine Type</th>
            <th>Status</th>
            <th>Action</th>
            <th>Archive</th>
            <th>Delete</th>
        </tr> -->
    <?php
        }
    else
        {
            echo "Sorry! no Record Found";
        }
    ?>
    <!-- </thead>
    <tbody style="text-align:center"> -->
        <?php
        while($data = mysqli_fetch_assoc($result))
        {
        ?>
        <div class="product" id="product">
            <div class="row justify-content-center pb">
                <div class="col-md-3">
                    <div class="product-image"><img class="img-fluid d-block mx-auto image" src="uploads/<?= $data['image']; ?>"></div>
                </div>
                <div class="product-info col-md-9">
                    <div class="product-specs">
                        <h5>&nbsp;&nbsp;<?= $data['business_name']; ?>
                        <button class="btn btn-primary btn-sm float-end viewBtn<?= $data['reservationid']; ?>" type="submit" arrived="<?= $data['arrived']; ?>" Review="<?= $data['review']; ?>" value="<?= $data['userid']; ?>" status="<?= $data['status'] ?>" reserveId="<?= $data['reservationid']; ?>" busiid="<?= $data['businessid']; ?>" id="viewBtn<?= $data['reservationid']; ?>" onclick="myFunction()">View</button></h5>
                        <div><span>Reserved By:&nbsp;</span><span class="value"><?= $data['namereserveunder']; ?></span></div>
                        <div><span>Email Address:</span><span class="value"><?= $data['reservation_email']; ?></span></div>
                        <div><span>Contact Number:&nbsp;</span><span class="value"><?= $data['reservation_phonenumber']; ?></span></div>                    
                    </div>
                </div>
                <div class="col p-0"><hr class="mb-0">
                    <p class="float-start m-2 text-muted">Reservation Id : #<?= $data['reservationid']; ?></p>
                    <p class="float-end m-2 text-muted">Status:&nbsp;<strong><?php if($data['status'] == 0){ echo 'Waiting'; } elseif($data['status'] == 1){ echo 'Approved';}elseif($data['status'] == 2){echo 'Declined';}elseif($data['status'] == 3){echo 'Cancelled';}  ?></strong></p>
                 </div><hr class="mt-0">
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".viewBtn<?= $data['reservationid']; ?>").on('click',function(){
                    var value = $(this).val();
                    var busiId = $(this).attr('busiid');
                    var reserveId = $(this).attr('reserveId');
                    var Status = $(this).attr('status');
                    var ID = $(this).attr('id');
                    var Arrived = $(this).attr('arrived');
                    var Review = $(this).attr('Review');
                    // alert(value);
                    // alert(busiId);
                    // alert(reserveId);
                    // alert(Status);
                    // alert(ID);
                    // alert(Arrived);
                    // alert(Review);
                    // var all= $('#all').val();

                    $.ajax({
                        url:"fetch.php",
                        type:"POST",
                        data:{userid: value, businessid: busiId, reservationid: reserveId, status: Status, view_reservation_btn: ID, arrived: Arrived, review: Review},
                        beforeSend:function(){
                            $("#summary").html("<span>Working...</span>");
                        },
                        success:function(data){
                            $("#summary").html(data);
                                                    
                                    }
                                });
                            });
                        });            
        </script>
        <?php
        }
        ?>
    </tbody>
</table>

<?php
}elseif(isset($_POST['view_reservation_btn'])){


    $userid = $_POST['userid'];
    $businessid = $_POST['businessid'];
    $status = $_POST['status'];
    $arrived = $_POST['arrived'];
    $review = $_POST['review'];
    $reservationid = $_POST['reservationid'];


    $reservation_query = "SELECT * FROM reservations JOIN business ON reservations.businessid=business.businessid JOIN managetable ON reservations.tableid=managetable.tableid 
    WHERE reservations.userid = '$userid' 
    AND reservations.status = '$status'
    AND reservations.arrived = '$arrived'
    AND reservations.review = '$review' 
    AND reservations.reservationid = '$reservationid'";
    $result = mysqli_query($con, $reservation_query);
    $count = mysqli_num_rows($result);

    if($status == 0 || $status == 2 || $status == 3)
    {
        while($data = mysqli_fetch_assoc($result))
        {?>
            <div class="shadow" id="summary">
                <h4><span class="text">Reservation ID</span><span class="value"><?= $data['reservationid']; ?></span></h4>
                <h4><span class="text">Table Number</span><span class="value"><?= strtoupper($data['table_number']); ?></span></h4>
                <h4><span class="text">Number of Guest</span><span class="value"><?= $data['chair'];?>&nbsp;</span></h4>
                <h4><span class="text">Reservation Date</span><span class="value"><?= $data['reservation_date']; ?></span></h4>
                <h4><span class="text">Reservation Time</span><span class="value"><?= $data['reservation_time']; ?></span></h4>
                <!-- <h4><span class="text">Status</span><span class="value"><?php if($data['status'] == 0){ echo 'Waiting'; } elseif($data['status'] == 1){ echo 'Approved';}elseif($data['status'] == 2){echo 'Declined';}  ?></span></h4>---->
                <button class="btn btn-primary w-100" type="submit">ADD REVIEW</button> 
            </div>
        <?php
        }
    }
    elseif($status == 1 && $arrived == 0 || $status == 1 && $arrived == 2)
    {
        while($data = mysqli_fetch_assoc($result))
        {?>
        
                <div class="shadow" id="summary">
                    <h4><span class="text">Reservation ID</span><span class="value"><?= $data['reservationid']; ?></span></h4>
                    <h4><span class="text">Table Number</span><span class="value"><?= strtoupper($data['table_number']); ?></span></h4>
                    <h4><span class="text">Number of Guest</span><span class="value"><?= $data['chair'];?>&nbsp;</span></h4>
                    <h4><span class="text">Reservation Date</span><span class="value"><?= $data['reservation_date']; ?></span></h4>
                    <h4><span class="text">Reservation Time</span><span class="value"><?= $data['reservation_time']; ?></span></h4>
                    <!-- <h4><span class="text">Status</span><span class="value"><?php if($data['status'] == 0){ echo 'Waiting'; } elseif($data['status'] == 1){ echo 'Approved';}elseif($data['status'] == 2){echo 'Declined';}  ?></span></h4>---->
                    <button class="btn btn-primary  w-100" type="submit">ADD REVIEW</button>
                </div>
         
        <?php
        }
    }
    elseif($status == 1 && $arrived == 1 && $review == 0)
    {
        while($data = mysqli_fetch_assoc($result))
        {?>
    
                <div class="shadow" id="summary">
                    <h4><span class="text">Reservation ID</span><span class="value"><?= $data['reservationid']; ?></span></h4>
                    <h4><span class="text">Table Number</span><span class="value"><?= strtoupper($data['table_number']); ?></span></h4>
                    <h4><span class="text">Number of Guest</span><span class="value"><?= $data['chair'];?>&nbsp;</span></h4>
                    <h4><span class="text">Reservation Date</span><span class="value"><?= $data['reservation_date']; ?></span></h4>
                    <h4><span class="text">Reservation Time</span><span class="value"><?= $data['reservation_time']; ?></span></h4>
                    <!-- <h4><span class="text">Status</span><span class="value"><?php if($data['status'] == 0){ echo 'Waiting'; } elseif($data['status'] == 1){ echo 'Approved';}elseif($data['status'] == 2){echo 'Declined';}  ?></span></h4>---->
                    <a href="feedback.php?id=<?= $reservationid;?>" class="btn btn-primary w-100" type="submit">ADD REVIEW</a>
                </div>
          
        <?php
        }
    }
    elseif($status == 1 && $arrived == 1 && $review == 1)
    {
        while($data = mysqli_fetch_assoc($result))
        {?>
     
                <div class="shadow" id="summary">
                    <h4><span class="text">Reservation ID</span><span class="value"><?= $data['reservationid']; ?></span></h4>
                    <h4><span class="text">Table Number</span><span class="value"><?= strtoupper($data['table_number']); ?></span></h4>
                    <h4><span class="text">Number of Guest</span><span class="value"><?= $data['chair'];?>&nbsp;</span></h4>
                    <h4><span class="text">Reservation Date</span><span class="value"><?= $data['reservation_date']; ?></span></h4>
                    <h4><span class="text">Reservation Time</span><span class="value"><?= $data['reservation_time']; ?></span></h4>
                    <!-- <h4><span class="text">Status</span><span class="value"><?php if($data['status'] == 0){ echo 'Waiting'; } elseif($data['status'] == 1){ echo 'Approved';}elseif($data['status'] == 2){echo 'Declined';}  ?></span></h4>---->
                    <a href="reservation.php?id=<?= $businessid;?>" class="btn btn-primary w-100" type="submit">RESERVE AGAIN</a>
                </div>
           
        <?php
        }
    }

    
?>


<?php
    
}
?>