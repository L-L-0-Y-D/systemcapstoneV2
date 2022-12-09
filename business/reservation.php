<?php 
include('../middleware/businessMiddleware.php');
include('includes/header.php');
include('../config/dbcon.php');


?>
 <?php 
        if(isset($_GET['id']))
        {
            $businessuserid = $_SESSION['auth_user']['businessid'];
            $query_reservation = "SELECT reservations.reservationid,reservations.arrived,reservations.namereserveunder,reservations.reservation_date,reservations.reservation_time,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,reservations.tableid,managetable.tableid,managetable.table_number,managetable.chair,reservations.userid,reservations.status,users.userid,users.name
            FROM reservations
            JOIN managetable 
            ON reservations.tableid=managetable.tableid
            JOIN users
            ON reservations.userid=users.userid
            WHERE reservations.businessid = $businessuserid
            ORDER BY reservationid DESC";
            $query_reservation_run = mysqli_query($con, $query_reservation);
            $reservations = $query_reservation_run;
            $data = mysqli_fetch_array($reservations);
            
            $id = $_GET['id'];
            if(isset($_GET['page_no']) && $_GET['page_no']) {
                $page_no = $_GET['page_no'];
            } else {
                $page_no = 1;
            }
            
            // $request = $_POST['request'];
            $id = $_GET['id'];
            //total rows or records to display
            $total_records_per_page = 10;
            //get the page offset for the LIMIT query
            $offset = ($page_no - 1) * $total_records_per_page;
            //get previous page
            $previous_page = $page_no - 1;
            //get the next page
            $next_page = $page_no + 1;
            //get the total count of records
            $result_count = mysqli_query($con, "SELECT COUNT(*) as total_records FROM reservations JOIN managetable ON reservations.tableid=managetable.tableid JOIN users ON reservations.userid=users.userid WHERE reservations.businessid = $businessuserid AND reservations.archive=0") or die(mysqli_error($con));
            //total records
            $records = mysqli_fetch_array($result_count);
            //store total_records to a variable
            $total_records = $records['total_records'];
            //get total pages
            $total_no_of_pages = ceil($total_records / $total_records_per_page);

            //query string
            $table_query = "SELECT reservations.reservationid,reservations.arrived,reservations.namereserveunder,reservations.reservation_date,reservations.reservation_time,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,reservations.tableid,managetable.tableid,managetable.table_number,managetable.chair,reservations.userid,reservations.status,users.userid,users.name,reservations.archive FROM reservations JOIN managetable ON reservations.tableid=managetable.tableid JOIN users ON reservations.userid=users.userid WHERE reservations.businessid = $businessuserid  AND reservations.businessid = $businessuserid AND reservations.archive = '0' ORDER BY reservationid DESC LIMIT $offset, $total_records_per_page";
            // result
            $result = mysqli_query($con,$table_query) or die(mysqli_error($con));
?>
    <div class="container-fluid pt-3">
    <h4 class="text-dark"><?= $_SESSION['auth_user']['business_name'];?>'s Reservation List</h4>
        <div class="card shadow">
            <div class="card-body" id="reservation_table">
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable" style="text-align:center">
                            <thead>
                                <tr>
                                    <th>Account Name</th>
                                    <th>Reserved By</th>
                                    <th>Table No.</th>
                                    <th>No. of Guest</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Reservation Date</th>
                                    <th>Reservation Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <!-- <th>Delete</th> -->
                                </tr>
                            </thead>
                            
                            <tbody style="text-align:center">
                                <?php
                                    // $reservations = getAll("reservations");
                                    //$reservations = getAll("reservations");
                                    $query_reservation_waiting = "SELECT reservations.reservationid,reservations.arrived,reservations.namereserveunder,reservations.reservation_date,reservations.reservation_time,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,reservations.tableid,managetable.tableid,managetable.table_number,managetable.chair,reservations.userid,reservations.status,users.userid,users.name
                                    FROM reservations
                                    JOIN managetable 
                                    ON reservations.tableid=managetable.tableid
                                    JOIN users
                                    ON reservations.userid=users.userid
                                    WHERE reservations.businessid = $businessuserid
                                    AND reservations.status = '0'
                                    ORDER BY reservationid DESC";
                                    $query_reservation_waiting_run = mysqli_query($con, $query_reservation_waiting);
                                     
                                    if(mysqli_num_rows($query_reservation_waiting_run) > 0)
                                    {
                                        foreach($query_reservation_waiting_run as $item)
                                        {
                                            if($item['businessid'] == $_SESSION['auth_user']['businessid'])
                                                {
                                                ?>

                                                        <!-- <td><?= $item['reservationid']; ?></td> -->
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
                                                                elseif($item['status'] == 2)
                                                                    {echo 'Declined';}
                                                                elseif($item['status'] == 3)
                                                                    {echo 'Cancelled';}  
                                                        ?></td>                                                                                                         
                                                        <td>
                                                            <?php
                                                            if($item['status'] == 3)
                                                            {
                                                            ?>
                                                                <a href="#" class="btn edit-btn"><i class="fas fa-pencil-alt"></i></a>
                                                            <?php
                                                            }else{
                                                            ?>
                                                                <a href="edit-reservation.php?id=<?= $item['reservationid']; ?>" class="btn edit-btn"><i class="fas fa-pencil-alt"></i></a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <!-- <td>
                                                            <button type="button" class="btn btn-sm btn-danger delete_reservation_btn" value="<?=$item['reservationid'];?>">Delete</button>
                                                        </td> -->
                                                    </tr>
                                                <?php
                                                }
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
                </div>
            </div>
        <div class="card shadow">
            <div class="card-body" id="reservation_table">
                <div class="row">
                    <div class="col-md-6 text-nowrap">
                        <h4 class="text-dark">Reservation History</h4>
                        <!-- <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                            <option value="10" selected="">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            </select>&nbsp;</label>
                        </div> -->
                    </div>
                    <div class="col-md-6">
                        <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><a class="btn btn-danger float-end mt-2 btn-sm" role="button" href="archivereservation.php?id=<?= $_SESSION['auth_user']['businessid'];?>">Archives</a></div>
                    </div>
                </div>
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable" style="text-align:center">
                            <thead>
                                <tr>
                                    <th>Account Name</th>
                                    <th>Reserved By</th>
                                    <th>Table No.</th>
                                    <th>No. of Guest</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Reservation Date</th>
                                    <th>Reservation Time</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Archive</th>
                                </tr>
                            </thead>
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                            <tbody style="text-align:center">
                                <?php
                                    // $reservations = getAll("reservations");
                                    //$reservations = getAll("reservations");
                                     
                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        foreach($result as $item)
                                        {
                                            if($item['businessid'] == $_SESSION['auth_user']['businessid'])
                                                {
                                                ?>

                                                        <!-- <td><?= $item['reservationid']; ?></td> -->
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
                                                                elseif($item['status'] == 2)
                                                                    {echo 'Declined';}
                                                                elseif($item['status'] == 3)
                                                                    {echo 'Cancelled';}  
                                                        ?></td>                                                                                                         
                                                        <td>
                                                            <?php
                                                            if($item['status'] == 3)
                                                            {
                                                            ?>
                                                                <a href="#" class="btn disabled edit-btn" disabled><i class="fas fa-pencil-alt"></i></a>
                                                            <?php
                                                            }else{
                                                            ?>
                                                                <a href="edit-reservation.php?id=<?= $item['reservationid']; ?>" class="btn edit-btn"><i class="fas fa-pencil-alt"></i></a>
                                                            <?php
                                                            }
                                                            ?>
                                                        </td>
                                                        <!-- <td>
                                                            <button type="button" class="btn btn-sm btn-danger delete_reservation_btn" value="<?=$item['reservationid'];?>">Delete</button>
                                                        </td> -->

                                                        <td>
                                                            <button class="btn btn-danger btn-sm" type="submit" value = "<?= $item['reservationid']; ?>" name="archive_reservation_btn"><i class="fas fa-archive"></i> </button>
                                                        </td>
                                                        
                                                    </tr>
                                                <?php
                                                }
                                        }
                                    }
                                    else
                                    {
                                        echo "No records Found";
                                    }
                                ?>
                            </tbody>
                            </form>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Page <?= $page_no; ?> of <?= $total_no_of_pages; ?></p>
                        </div>
                        <div class="col-md-6">
                            <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                    <li class="page-item"><a aria-label="Previous" class="page-link <?= ($page_no <= 1)? 'disabled' : '';?>" <?= ($page_no > 1)? 'href=?id='.$id.'&page_no='.$previous_page : '';?>><span aria-hidden="true">«</span></a></li>

                                    <?php for($counter = 1; $counter <= $total_no_of_pages; $counter++){?>

                                        <?php if($page_no != $counter){?>
                                            <li class="page-item"><a class="page-link" href="?id=<?= $id;?>&page_no=<?= $counter;?>"><?= $counter; ?></a></li>
                                        <?php }else{?>
                                            <li class="page-item"><a class="page-link active"><?= $counter; ?></a></li>
                                        <?php }?>
                                    <?php } ?>

                                    <li class="page-item"><a aria-label="Next"  class="page-link <?= ($page_no >= $total_no_of_pages)? 'disabled' : '';?>" <?= ($page_no < $total_no_of_pages) ? 'href=?id='.$id.'&page_no='.$next_page : ''; ?>><span aria-hidden="true">»</span></a></li>
                                </ul>
                            </nav>
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