<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-4">Reservation</h3>   
        </div>
        <div class="card shadow">
            <div class="card-body" id="products_table">
                <div class="row">
                    <div class="col-md-6 text-nowrap">
                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                            <option value="10" selected="">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            </select>&nbsp;</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                        </div>
                    </div>
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable" style="text-align:center">
                            <thead>
                                <tr>
                                    <th>Business Name</th>
                                    <th>Username</th>
                                    <th>Name Reserveunder</th>
                                    <th>Table Number</th>
                                    <th>No. of Guest</th>
                                    <th>Phonenumber</th>
                                    <th>Email</th>
                                    <th>Reservation Date</th>
                                    <th>Reservation Time</th>
                                    <th>Status</th>
                                    <!-- <th>Edit</th> -->
                                </tr>
                            </thead>
                            
                            <tbody style="text-align:center">
                                <?php
                                    $query_reservation = "SELECT reservations.reservationid,reservations.arrived,reservations.namereserveunder,reservations.reservation_date,reservations.reservation_time,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,reservations.tableid,managetable.tableid,managetable.table_number,managetable.chair,reservations.userid,reservations.status,users.userid,users.name,business.businessid,business.business_name
                                    FROM reservations
                                    JOIN managetable 
                                    ON reservations.tableid=managetable.tableid
                                    JOIN users
                                    ON reservations.userid=users.userid
                                    JOIN business
                                    ON reservations.businessid=business.businessid
                                    ORDER BY business_name DESC";
                                    $query_reservation_run = mysqli_query($con, $query_reservation);
                                    $reservations = $query_reservation_run;

                                    if(mysqli_num_rows($reservations) > 0)
                                    {
                                        foreach($reservations as $item)
                                        {
                                        
                                                ?>
                                                    <tr>
                                                        <td><?= $item['business_name']; ?></td>
                                                        <td><?= $item['name']; ?></td>
                                                        <td><?= $item['namereserveunder']; ?></td>
                                                        <td><?= $item['table_number']; ?></td>
                                                        <td><?= $item['chair']; ?></td>
                                                        <td><?= $item['reservation_phonenumber']; ?></td>
                                                        <td><?= $item['reservation_email']; ?></td>
                                                        <td><?= $item['reservation_date']; ?></td>
                                                        <td><?= $item['reservation_time']; ?></td>
                                                        <td><?php 
                                                                if($item['status'] == 0)
                                                                    { echo 'Waiting'; } 
                                                                elseif($item['status'] == 1)
                                                                    { echo 'Approved';}
                                                                else
                                                                    {echo 'Declined';}  
                                                                ?></td>
                                                        <!-- <td>
                                                            <a href="edit-reservation.php?id=<?= $item['reservationid']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                                        </td> -->
                                                    </tr>
                                                <?php
                                            
                                        }
                                    }
                                    else
                                    {
                                        echo "No records Found";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
                        </div>
                        <div class="col-md-6">
                            <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                    <li class="page-item disabled"><a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a></li>
                                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 

//include('../middleware/adminMiddleware.php');
include('includes/footer.php');


?>