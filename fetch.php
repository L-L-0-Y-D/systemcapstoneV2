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
                        <button class="btn btn-primary btn-sm float-end" type="submit">View</button></h5>
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
        <?php
        }
        ?>
    </tbody>
</table>

<?php
}
?>