<?php 

include('../config/dbcon.php');
include('../middleware/businessMiddleware.php');
include('includes/header.php');


?>
 <?php 
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            if(isset($_GET['page_no']) && $_GET['page_no']) {
                $page_no = $_GET['page_no'];
            } else {
                $page_no = 1;
            }
            $id = $_GET['id'];
            //total rows or records to display
            $total_records_per_page = 8;
            //get the page offset for the LIMIT query
            $offset = ($page_no - 1) * $total_records_per_page;
            //get previous page
            $previous_page = $page_no - 1;
            //get the next page
            $next_page = $page_no + 1;
            //get the total count of records
            $result_count = mysqli_query($con, "SELECT COUNT(*) as total_records FROM reservations JOIN managetable ON reservations.tableid=managetable.tableid JOIN users ON reservations.userid=users.userid WHERE reservations.businessid = $id AND reservations.archive=1") or die(mysqli_error($con));
            //total records
            $records = mysqli_fetch_array($result_count);
            //store total_records to a variable
            $total_records = $records['total_records'];
            //get total pages
            $total_no_of_pages = ceil($total_records / $total_records_per_page);

            //query string
            $table_query = "SELECT reservations.reservationid,reservations.arrived,reservations.namereserveunder,reservations.reservation_date,reservations.reservation_time,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,reservations.tableid,managetable.tableid,managetable.table_number,managetable.chair,reservations.userid,reservations.status,users.userid,users.name,reservations.archive FROM reservations JOIN managetable ON reservations.tableid=managetable.tableid JOIN users ON reservations.userid=users.userid WHERE reservations.businessid = $id  AND reservations.businessid = $id AND reservations.archive = '1' ORDER BY reservationid DESC LIMIT $offset, $total_records_per_page";
            // result
            $result = mysqli_query($con,$table_query) or die(mysqli_error($con));
?>
    <div class="container-fluid pt-3">
            <h4 class="text-dark"><?= $_SESSION['auth_user']['business_name'];?>'s Reservation Archive</h4>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead style="text-align:center">
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
                            <th>Restore</th>
                        </tr>
                        </thead>
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                        <tbody style="text-align:center">
                            <?php
                                // $review = getAll("review_table");

                               if(mysqli_num_rows($result) > 0)
                               {
                                   foreach($result as $item)
                                   {
                                    if($item['businessid'] == $_SESSION['auth_user']['businessid'])
                                        {
                                       ?>
                                       <tr>
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
                                                if($item['archive'] == 0)
                                                    { echo 'Not Archive'; } 
                                                elseif($item['archive'] == 1)
                                                    { echo 'Archive';} 
                                                ?></td>                                                                                                         
                                                <!-- <td>
                                                    <button type="button" class="btn btn-sm btn-danger delete_reservation_btn" value="<?=$item['reservationid'];?>">Delete</button>
                                                </td> -->
                                            <td>
                                                <input type="hidden" name="businessid" value="<?= $item['businessid']; ?>"> 
                                                <button class="btn btn-success btn-sm" type="submit" value = "<?= $item['reservationid']; ?>" name="restore_reservation_btn"><i class="fas fa-archive"></i> </button>
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
<?php

        }
        else
        {
            echo"ID missing from url";
        }
?>
<?php 

//include('../middleware/adminMiddleware.php');
include('includes/footer.php');


?>