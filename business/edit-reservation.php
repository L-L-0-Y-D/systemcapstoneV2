
<?php 

include('../config/dbcon.php');
include('../middleware/businessMiddleware.php');
include('includes/header.php');


?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-9">
        <?php 
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];

                $reservations = getByID("reservations", $id,"reservationid");
                $query_reservation = "SELECT reservations.reservationid,reservations.namereserveunder,reservations.reservation_date,reservations.reservation_time,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,reservations.tableid,managetable.tableid,managetable.table_number,managetable.chair,reservations.userid,reservations.status,users.userid,users.name,business.businessid,business.business_name
                FROM reservations
                JOIN business
                ON reservations.businessid=business.businessid
                JOIN managetable 
                ON reservations.tableid=managetable.tableid
                JOIN users
                ON reservations.userid=users.userid
                WHERE reservationid = '$id'";
                $query_reservation_run = mysqli_query($con, $query_reservation);

                if(mysqli_num_rows($query_reservation_run) > 0)
                {
                    $data = mysqli_fetch_array($query_reservation_run);
                    ?>
                    <div class="card">
                        <div class="card-header">
                        <h4>Approval of Reservation
                        <a href="reservation.php?id=<?= $_SESSION['auth_user']['businessid'];?>" class="back btn-close float-end"></a>
                        </h4>
                            
                        </div>
                        <div class="card-body">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Table No.</label>
                                <input type="text" name="table_number" value="<?= $data['table_number'] ?>" placeholder="Enter Table Number of Guest" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Number of Guest</label>
                                <input type="text" name="chair" value="<?= $data['chair'] ?>" placeholder="Enter Number of Guest" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <!--Needed-->
                                <input type="hidden" name="business_name" value="<?= $data['business_name'] ?>">
                                <input type="hidden" name="reservationid" value="<?= $data['reservationid'] ?>">
                                <input type="hidden" name="businessid" value="<?= $data['businessid'] ?>">
                                <input type="hidden" name="userid" value="<?= $data['userid'] ?>">
                                <label for="namereserveunder">Name Reserved Under:</label>
                                <input type="text" name="namereserveunder" value="<?= $data['namereserveunder'] ?>" placeholder="Enter Name Reserveunder" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="namereserveunder">Account Name:</label>
                                <input type="text" name="namereserveunder" value="<?= $data['name'] ?>" placeholder="Enter Name Reserveunder" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                
                                <label for="">Email Address</label>
                                <input type="email" name="reservation_email" value="<?= $data['reservation_email'] ?>" placeholder="Enter Reservation Email" class="form-control" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="">Phone Number</label>
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
                                <select name='status' required class="form-select mb-2">
                                    <?php
                                    if($data['status'] == 0)
                                    { echo '<option value="0" selected hidden>Waiting</option>
                                            <option value="1">Approve</option>
                                            <option value="2">Declined</option>'; } 
                                    elseif($data['status'] == 1)
                                    { echo '<option value="0" hidden>Waiting</option>
                                            <option value="1" selected>Approve</option>
                                            <option value="2">Declined</option>';}
                                    elseif($data['status'] == 2)
                                    {echo  '<option value="0" hidden>Waiting</option>
                                            <option value="1" >Approve</option>
                                            <option value="2" selected>Declined</option>';} 
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn save-btn" name="update_reservation_btn">Save</button>
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