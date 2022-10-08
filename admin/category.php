<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>
    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-4">Cuisine List</h3>
            <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="add-category.php" style="background: rgb(255,128,64);border-style: none;"  id="addbtn">&nbsp;Add Cuisine Type</a>
        </div>
        <div class="card shadow">
            <div class="card-body" id = "category_table">
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
                            <table class="table my-0" id="dataTable">
                                <thead style="text-align:center">
                                    <tr>
                                        <th>Cuisine</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                        <!-- <th>Delete</th> -->
                                    </tr>
                                </thead>
                                
                                <tbody style="text-align:center">
                                    <?php
                                        $cuisine = getAll("mealcategory","categoryid"); 
                                        if(mysqli_num_rows($cuisine ) > 0)
                                        {
                                            foreach($cuisine  as $item)
                                            {
                                                if($_SESSION['role_as'] != 0)
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?= $item['categoryname']; ?></td>
                                                        <td><?= $item['status']== '0'? "Active":"Hidden"  ?></td>
                                                        <td>
                                                            <a href="edit-category.php?id=<?= $item['categoryid']; ?>" class="btn btn-sm btn-primary">View</a>
                                                        </td>
                                                        <!-- <td>
                                                            <button type="button" class="btn btn-sm btn-danger delete_category_btn" value="<?= $item['categoryid']; ?>" >Delete</button>
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
                        <div class="row">
            
                            <div>
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
    </div>
<?php 

//include('../middleware/adminMiddleware.php');
include('includes/footer.php');


?>