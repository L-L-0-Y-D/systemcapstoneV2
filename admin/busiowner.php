<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>
<head>
    <link rel="stylesheet" href="assets/css/for-permit.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
</head>

<?php
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
    $result_count = mysqli_query($con, "SELECT COUNT(*) as total_records FROM business WHERE archive = '0'") or die(mysqli_error($con));
    //total records
    $records = mysqli_fetch_array($result_count);
    //store total_records to a variable
    $total_records = $records['total_records'];
    //get total pages
    $total_no_of_pages = ceil($total_records / $total_records_per_page);

    //query string
    $table_query = "SELECT business.businessid,business.archive,business.image_scert,business.image_fcert,business.image_bcert,business.business_number,business.duration,business.business_name,business.business_address,business.latitude,business.longitude,business.municipalityid,business.opening,business.closing,municipality.municipality_name,business.cuisinename,business.image_cert,business.business_firstname,business.business_lastname,business.business_phonenumber,business.business_owneraddress,business.business_email,business.business_password,business.image,business.role_as,business.status,business.created_at
    FROM business
    JOIN municipality
    ON business.municipalityid=municipality.municipalityid
    WHERE business.archive = '0' ORDER BY businessid DESC LIMIT $offset, $total_records_per_page";
    // result
    $result = mysqli_query($con,$table_query) or die(mysqli_error($con));
?>
    <div class="container-fluid">
        <h3 class="text-dark mb-2 mx-3">Business Partners</h3> 
        <div class="card shadow">
            <div class="card-body" id="business_table">
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
                        <div class="text-md-end dataTables_filter" id="dataTable_filter"><a class="btn btn-dark float-end mt-2 btn-sm" role="button" href="archivebusinessowner.php">Archives&nbsp; <i class="fas fa-archive"></i></a></div>
                    </div>
                </div>
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable" style="text-align:center">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Business Permit</th>
                                    <th>Map Location</th>
                                    <th>Business Name</th>
                                    <th>Cuisine Type</th>
                                    <th>Municipality</th>
                                    <th>Opening Time</th>
                                    <th>Closing Time</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Archive</th>
                                    <!--<th>Delete</th>-->
                                </tr>
                            </thead>
                            
                            <tbody style="text-align:center">
                                <?php
                                    // $business = businessGetAll();

                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        foreach($result as $item)
                                        {
                                            if($_SESSION['role_as'] != 0)
                                            {
                                                ?>
                                                    <tr>
                                                        <td><img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['image']; ?>"></td>
                                                            <td class="col-md-6 col-lg-4 item">
                                                                <!-- Button to Open the Modal for Business Cert-->
                                                                <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#myModal<?= $item['businessid'] ?>">
                                                                    <img src="../certificate/<?= $item['image_cert']; ?>" width="30px" height="50px" alt="<?= $item['image_cert']; ?>">
                                                                </button>
                                                                <!-- The Modal -->
                                                                <div class="modal fade" id="myModal<?= $item['businessid'] ?>">
                                                                    <div class="modal-dialog modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                            <body class="slide-permit">
                                                                                <div class="slide-container swiper">
                                                                                    <div class="slide-content">
                                                                                        <div class="card-wrapper swiper-wrapper">
                                                                                            <div class="card swiper-slide">
                                                                                                <div class="image-content">
                                                                                                <img src="../certificate/<?= $item['image_cert']; ?>" width="100%" height="100%" alt="<?= $item['image_cert']; ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-wrapper swiper-wrapper">
                                                                                            <div class="card swiper-slide">
                                                                                                <div class="image-content">
                                                                                                <img src="../certificate/<?= $item['image_scert']; ?>" width="100%" height="100%" alt="<?= $item['image_scert']; ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-wrapper swiper-wrapper">
                                                                                            <div class="card swiper-slide">
                                                                                                <div class="image-content">
                                                                                                <img src="../certificate/<?= $item['image_fscert']; ?>" width="100%" height="100%" alt="<?= $item['image_fscert']; ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="card-wrapper swiper-wrapper">
                                                                                            <div class="card swiper-slide">
                                                                                                <div class="image-content">
                                                                                                <img src="../certificate/<?= $item['image_bcert']; ?>" width="100%" height="100%" alt="<?= $item['image_bcert']; ?>">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="swiper-button-next swiper-navBtn"></div>
                                                                                    <div class="swiper-button-prev swiper-navBtn"></div>
                                                                                    <div class="swiper-pagination"></div>
                                                                                </div>  
                                                                            </body>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div><!-- The Close Modal -->
                                                            </td>
                                                            <td><a href="https://google.com/maps?q=<?= $item['latitude'] ?>,<?= $item['longitude'] ?>" style="width: 100px; height: 100px;">View Location</a></td>
                                                            <td><?= $item['business_name']; ?></td>
                                                            <td><?= $item['cuisinename']; ?></td>
                                                            <td><?= $item['municipality_name']; ?></td>
                                                            <td><?= date('h:i A', strtotime($item['opening'])); ?></td>
                                                            <td><?= date('h:i A', strtotime($item['closing']));?></td>
                                                            <td><?= $item['business_firstname']; ?></td>
                                                            <td><?= $item['business_lastname']; ?></td>
                                                            <td><?php 
                                                                if($item['status'] == 0)
                                                                    { echo 'Waiting'; } 
                                                                elseif($item['status'] == 1)
                                                                    { echo 'Approved';}
                                                                else
                                                                    {echo 'Declined';}  
                                                                ?></td>
                                                            <td>
                                                            <a href="edit-business.php?id=<?= $item['businessid']; ?>" class="btn btn-sm edit-btn btn-outline-dark"><i class="fas fa-pencil-alt"></i></a>
                                                            </td>
                                                            
                                                            <!-- <td>
                                                                <button type="button" class="btn btn-sm btn-danger delete_business_btn" value="<?= $item['businessid']; ?>" >Delete</button>
                                                            </td> -->
                                                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" name="businessid" value="<?= $item['businessid']; ?>">
                                                            <td><button type="submit" class="btn btn-sm btn-danger"  name="archive_business_btn"><i class="fas fa-archive"></i></button></td>
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
    
    <!-- Swiper JS -->
    <script src="assets/js/swiper-bundle.min.js"></script>
    <!-- JavaScript -->
    <script src="assets/js/for-permit.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 

<?php 

//include('../middleware/adminMiddleware.php');
include('includes/footer.php');


?>