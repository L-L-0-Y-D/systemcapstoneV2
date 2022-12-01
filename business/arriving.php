<?php 
include('../middleware/businessMiddleware.php');
include('includes/header.php');
include('../config/dbcon.php');


?>
 <?php 
        if(isset($_GET['id']))
        {
            $businessuserid = $_SESSION['auth_user']['businessid'];
?>
<div class="container-fluid">
        <h4 class="text-dark">Arriving Reservations </h4>
        <span class="fw-bold text-dark float-end me-3"><?php echo "Today is " . date("m/d/Y") . "";?></span><br>
        <div class="card shadow">
            <div class="card-body" id="reservation_table">
                <div class="row">
                    <div class="col-md-6 text-nowrap">
                        <!-- <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                            <option value="10" selected="">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            </select>&nbsp;</label>
                        </div> -->
                    </div>
                    <div class="col-md-6">
                        <!-- <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div> -->
                        </div>
                    </div>
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable" style="text-align:center">
                            <thead>
                                <tr>
                                    <!-- <th>Account Name</th> -->
                                    <!-- <th>Reservation No.</th> -->
                                    <th>Reserved By</th>
                                    <th>Table No.</th>
                                    <th>No. of Guest</th>
                                    <th>Phone Number</th>
                                    <!-- <th>Email</th> -->
                                    <!-- <th>Reservation Date</th> -->
                                    <th>Reservation Time</th>
                                    <!-- <th>Status</th> -->
                                    <th>Arrived</th>
                                    <!-- <th>Delete</th> -->
                                </tr>
                            </thead>
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                            <tbody style="text-align:center">
                            <input type="hidden" name="businessid" value="<?= $businessuserid ?>" >
                                <?php
                                    // $reservations = getAll("reservations");
                                    //$reservations = getAll("reservations");
                                    $query_reservation = "SELECT reservations.reservationid,reservations.arrived,reservations.namereserveunder,reservations.reservation_date,reservations.reservation_time,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,reservations.tableid,managetable.tableid,managetable.table_number,managetable.chair,reservations.userid,reservations.status,users.userid,users.name
                                    FROM reservations
                                    JOIN managetable 
                                    ON reservations.tableid=managetable.tableid
                                    JOIN users
                                    ON reservations.userid=users.userid
                                    WHERE reservations.businessid = $businessuserid
                                    AND reservations.arrived = 0
                                    AND DATE(reservation_date) = DATE(NOW())
                                    ORDER BY reservation_time ASC";
                                    $query_reservation_run = mysqli_query($con, $query_reservation);
                                    $reservations = $query_reservation_run;     
                                    if(mysqli_num_rows($reservations) > 0)
                                    {
                                        foreach($reservations as $item)
                                        {
                                            if($item['businessid'] == $_SESSION['auth_user']['businessid'])
                                                {
                                                    // if(date("h:i:s")>$item['reservation_time'])
                                                    // {
                                                ?>
                                                    <tr>
                                                        <!-- <td><?= $item['name']; ?></td> -->
                                                        <!-- <td ><input type="" name="reservationid" value=<?= $item['reservationid']; ?>></td> -->
                                                        <td name="namereserveunder"><?= $item['namereserveunder']; ?></td>
                                                        <td name="table_number"><?= $item['table_number']; ?></td>
                                                        <td name="chair"><?= $item['chair']; ?></td>
                                                        <td name="reservation_phonenumber"><?= $item['reservation_phonenumber']; ?></td>
                                                        <!-- <td><?= $item['reservation_email']; ?></td> -->
                                                        <!-- <td><?= $item['reservation_date']; ?></td> -->
                                                        <td name="reservation_time"><?=$item['reservation_time']; ?></td>
                                                        <!-- <td><?php 
                                                                if($item['status'] == 0)
                                                                    { echo 'Waiting'; } 
                                                                elseif($item['status'] == 1)
                                                                    { echo 'Approved';}
                                                                elseif($item['status'] == 2)
                                                                    {echo 'Declined';}  
                                                        ?></td> -->
                                                        <td>
                                                            <button type="submit" class="btn btn-lg btn-success" value = "<?= $item['reservationid']; ?>" name="update_arrived_btn">✓</button>
                                                            <button type="submit" class="btn btn-l btn-danger" value = "<?= $item['reservationid']; ?>"  name="update_not_arrived_btn">X</button>
                                                            
                                                        </td>
                                                        <!-- <td>
                                                            <button type="button" class="btn btn-sm btn-danger delete_reservation_btn" value="<?=$item['reservationid'];?>">Delete</button>
                                                        </td> -->
                                                    </tr>
                                                <?php
                                                    // }
                                                }
                                        }
                                    
                                ?>
                            </tbody>
                            <?php
                                }
                                else
                                {
                                    echo "No records Found";
                                }
                            ?> 
                        </form>
                    </table>
                        
                    </div>
                    <div class="row">
                        <!-- <div class="col-md-6 align-self-center">
                            <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                        </div> -->
                        <div class="col-md-6">
                            <!-- <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                    <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                                </ul>
                            </nav> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

        }
        else
        {
            echo"ID missing from url";
        }
?>
<?php include('includes/footer.php');?>