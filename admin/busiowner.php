<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-4">Business List</h3>
            <!--<a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="add-business.php" style="background: rgb(255,128,64);border-style: none;"  id="addbtn">&nbsp;Add business</a>-->       
        </div>
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
                        <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                        </div>
                    </div>
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable" style="text-align:center">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Business Permit</th>
                                    <th>Business Name</th>
                                    <th>Cuisine Type</th>
                                    <th>Municipality</th>
                                    <th>Opening Time</th>
                                    <th>Closing Time</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
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
                                                            <a href="../certificate/<?= $item['image_cert']; ?>" width="50px" height="50px" alt="<?= $item['image_cert']; ?>">
                                                            <img class="img-thumbnail img-fluid image" src="../certificate/<?= $item['image_cert']; ?>" width="50px" height="50px" alt="<?= $item['image_cert']; ?>"> </td>
                                                            <td><?= $item['business_name']; ?></td>
                                                            <td><?= $item['cuisinename']; ?></td>
                                                            <td><?= $item['municipality_name']; ?></td>
                                                            <td><?= date('h:i A', strtotime($item['opening'])); ?></td>
                                                            <td><?= date('h:i A', strtotime($item['closing']));?></td>
                                                            <td><?= $item['business_firstname']; ?></td>
                                                            <td><?= $item['business_lastname']; ?></td>
                                                            <td><?= $item['status']== '0'? "Waiting":"Activated"  ?></td>
                                                            <td>
                                                            <a href="edit-business.php?id=<?= $item['businessid']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                                            </td>
                                                        <td>
                                                            <button type="button" class="btn btn-sm btn-danger delete_business_btn" value="<?= $item['businessid']; ?>" >Delete</button>
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
<?php 

//include('../middleware/adminMiddleware.php');
include('includes/footer.php');


?>