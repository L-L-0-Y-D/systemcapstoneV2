<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>
<?php
    $userid = $_SESSION['auth_user']['userid'];
    // $id = $_GET['id'];
    if(isset($_GET['page_no']) && $_GET['page_no']) {
        $page_no = $_GET['page_no'];
    } else {
        $page_no = 1;
    }

    // $request = $_POST['request'];
    // $id = $_GET['id'];
    //total rows or records to display
    $total_records_per_page = 10;
    //get the page offset for the LIMIT query
    $offset = ($page_no - 1) * $total_records_per_page;
    //get previous page
    $previous_page = $page_no - 1;
    //get the next page
    $next_page = $page_no + 1;
    //get the total count of records
    $result_count = mysqli_query($con, "SELECT COUNT(*) as total_records FROM users WHERE archive='0' AND role_as = '0'") or die(mysqli_error($con));
    //total records
    $records = mysqli_fetch_array($result_count);
    //store total_records to a variable
    $total_records = $records['total_records'];
    //get total pages
    $total_no_of_pages = ceil($total_records / $total_records_per_page);

    //query string
    $table_query = "SELECT * FROM users WHERE archive='0' AND role_as = 0 ORDER BY userid DESC LIMIT $offset, $total_records_per_page";
    // result
    $result = mysqli_query($con,$table_query) or die(mysqli_error($con));
?>
    <div class="container-fluid">
            <h4 class="text-dark">CUSTOMER'S LIST</h4>
        <div class="card shadow" >
            <div class="card-body" id="customer_table" >
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
                        <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><a class="btn btn-danger float-end mt-2 btn-sm" role="button" href="archivecustomer.php">Archives</a></div>
                        </div>
                    </div>
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable">
                            <thead style="text-align:center">
                                <tr>
                                    <th>Image</th>
                                    <th>Username</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Address</th>
                                    <th>Age</th>
                                    <th>Status</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                    <th>Archive</th>
                                    <!--<th>Delete</th>-->
                                    </tr>
                                </thead>
                            
                                <tbody style="text-align:center">
                                    <?php
                                        // $query_users = "SELECT * FROM users WHERE NOT status='3' ORDER BY userid DESC";
                                        // $query_users_run = mysqli_query($con, $query_users);

                                        if(mysqli_num_rows($result) > 0)
                                        {
                                            foreach($result  as $item)
                                            {
                                            if($item['role_as'] == 0)
                                            {
                                                ?>
                                                    <tr>
                                                        <td><img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['image']; ?>"></td>
                                                        <td><?= $item['name']; ?></td>
                                                        <td><?= $item['firstname']; ?></td>
                                                        <td><?= $item['lastname']; ?></td>
                                                        <td><?= $item['address']; ?></td>
                                                        <td><?= $item['age']; ?></td>
                                                        <td><?php 
                                                                if($item['status'] == 0)
                                                                    { echo 'Waiting'; } 
                                                                elseif($item['status'] == 1)
                                                                    { echo 'Approved';}
                                                                elseif($item['status'] == 2)
                                                                    {echo 'Declined';}  
                                                                ?>
                                                        </td>
                                                        <td><?= $item['role_as']== '0'? "User":"Admin"  ?></td>
                                                        <td>
                                                            <a href="edit-customer.php?id=<?= $item['userid']; ?>" class="btn btn-sm edit-btn"><i class="fas fa-pencil-alt"></i></a>
                                                        </td>
                                                        
                                                        <form action="code.php" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" name="userid" value="<?= $item['userid']; ?>">
                                                            <td><button type="submit" class="btn btn-sm btn-danger"  name="archive_user_btn"><i class="fas fa-archive"></i></button></td>
                                                        </form>
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
                    <div class="row">
                        <div class="col-md-6 align-self-center">
                            <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Page <?= $page_no; ?> of <?= $total_no_of_pages; ?></p>
                        </div>
                        <div class="col-md-6">
                            <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                                <ul class="pagination">
                                    <li class="page-item"><a aria-label="Previous" class="page-link <?= ($page_no <= 1)? 'disabled' : '';?>" <?= ($page_no > 1)? 'href=?page_no='.$previous_page : '';?>><span aria-hidden="true">«</span></a></li>

                                    <?php for($counter = 1; $counter <= $total_no_of_pages; $counter++){?>

                                        <?php if($page_no != $counter){?>
                                            <li class="page-item"><a class="page-link" href="?page_no=<?= $counter;?>"><?= $counter; ?></a></li>
                                        <?php }else{?>
                                            <li class="page-item"><a class="page-link active"><?= $counter; ?></a></li>
                                        <?php }?>
                                    <?php } ?>

                                    <li class="page-item"><a aria-label="Next"  class="page-link <?= ($page_no >= $total_no_of_pages)? 'disabled' : '';?>" <?= ($page_no < $total_no_of_pages) ? 'href=?page_no='.$next_page : ''; ?>><span aria-hidden="true">»</span></a></li>
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