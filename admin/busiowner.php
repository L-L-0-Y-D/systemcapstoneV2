<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>
    <div class="container-fluid">
    <h4 class="text-dark">BUSINESS PARTNERS</h4>         
        <div class="card shadow">
            <div class="card-body" id="business_table">
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
                        <div class="text-md-end dataTables_filter" id="dataTable_filter">
                            <label class="form-label">
                                <input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search">
                            </label>
                        </div>
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
                                    <th>Edit</th>
                                    <!--<th>Delete</th>-->
                                </tr>
                            </thead>
                            
                            <tbody style="text-align:center">
                                <?php
                                    $business = businessGetAll();

                                    if(mysqli_num_rows($business) > 0)
                                    {
                                        foreach($business as $item)
                                        {
                                            if($_SESSION['role_as'] != 0)
                                            {
                                                ?>
                                                    <tr>
                                                        <td><img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['image']; ?>"></td>
                                                            <td class="col-md-6 col-lg-4 item">
                                                                <!-- Button to Open the Modal for Business Cert-->
                                                                <button type="button" class="btn btn-sm" data-toggle="modal" data-target="#myModal">
                                                                    <img src="../certificate/<?= $item['image_cert']; ?>" width="30px" height="50px" alt="<?= $item['image_cert']; ?>">
                                                                </button>
                                                                <!-- The Modal -->
                                                                <div class="modal fade" id="myModal">
                                                                    <div class="modal-dialog modal-sm">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <img src="../certficate/<?= $item['image_cert']; ?>" width="100%" height="100%" alt="<?= $item['image_cert']; ?>">
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
                                                            <a href="edit-business.php?id=<?= $item['businessid']; ?>" class="btn btn-sm edit-btn"><i class="fas fa-pencil-alt"></i></a>
                                                            </td>
                                                        <td>
                                                            <!--<button type="button" class="btn btn-sm btn-danger delete_business_btn" value="<?= $item['businessid']; ?>" >Delete</button>-->
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script> 

<?php 

//include('../middleware/adminMiddleware.php');
include('includes/footer.php');


?>