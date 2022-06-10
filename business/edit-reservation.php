
<?php 

include('../config/dbcon.php');
include('../middleware/businessMiddleware.php');
include('includes/header.php');


?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
        <?php 
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];

                $reservations = getByID("reservations", $id,"reservationid");

                if(mysqli_num_rows($reservations) > 0)
                {
                    $data = mysqli_fetch_array($reservations);
                    ?>
                    <div class="card">
                        <div class="card-header">
                        <h4>Approval of Reservation
                        <a href="menu.php?id=<?= $_SESSION['auth_user']['businessid'];?>" class="btn btn-primary float-end">Back</a>
                        </h4>
                            
                        </div>
                        <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Number of Guest</label>
                                <input type="number" name="numberofguest" value="<?= $data['numberofguest'] ?>" placeholder="Enter Number of Guest" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <!--Needed-->
                                <input type="hidden" name="reservationid" value="<?= $data['reservationid'] ?>">
                                <input type="hidden" name="businessid" value="<?= $data['businessid'] ?>">
                                <input type="hidden" name="userid" value="<?= $data['userid'] ?>">
                                <label for="namereserveunder">Name Reserved Under:</label>
                                <input type="text" name="namereserveunder" value="<?= $data['namereserveunder'] ?>" placeholder="Enter Name Reserveunder" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Email</label>
                                <input type="email" name="reservation_email" value="<?= $data['reservation_email'] ?>" placeholder="Enter Reservation Email" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Phonenumber</label>
                                <input type="text" name="reservation_phonenumber" value="<?= $data['reservation_phonenumber'] ?>" placeholder="Enter Phonenumber" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Reservation Date</label>
                                <input type="date" name="reservation_date" value="<?= $data['reservation_date'] ?>" placeholder="Enter Reservation Date" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Reservation Time</label>
                                <input type="time" name="reservation_time" value="<?= $data['reservation_time'] ?>" placeholder="Enter Reservation Time" class="form-control" readonly>
                            </div>
                            <div class="col-md-12">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" <?= $data['status'] == '0'? '':'checked' ?>>
                            </div> <br>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary" name="update_reservation_btn">Save</button>
                            </div>
                        </div>
                    </form>
                        </div>
                    </div>
        
        <?php 
                }
                else
                {
                    echo "Reservation Not Found for given id";
                }
            }
            else
            {
                echo "ID missing from url";
            }
        ?>
    </div>
  </div>  
</div>


<?php include('includes/footer.php');?>