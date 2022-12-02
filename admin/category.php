<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>
    <div class="container-fluid">
            <h4 class="text-dark mb-4">Cuisines List
            <a class="btn btn-primary btn-sm float-end" role="button" href="add-category.php" id="addbtn">Add Cuisine Type</a>
            </h4><div>&nbsp;</div>
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
                        <!--<div class="col-md-6">
                            <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                            </div>
                        </div-->
                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                            <table class="table my-0" id="dataTable">
                                <thead style="text-align:center">
                                    <tr>
                                        <th>Cuisine</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Archive</th>
                                        <!-- <th>Delete</th> -->
                                    </tr>
                                </thead>
                                
                                <tbody style="text-align:center">
                                    <?php
                                        $cuisine = getAll("mealcategory"); 
                                        if(mysqli_num_rows($cuisine ) > 0)
                                        {
                                            foreach($cuisine  as $item)
                                            {
                                                if($_SESSION['role_as'] != 0)
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?= $item['categoryname']; ?></td>
                                                        <td><?= $item['status']== '1'? "Active":"Hidden"  ?></td>
                                                        <td>
                                                            <a href="edit-category.php?id=<?= $item['categoryid']; ?>" class="btn btn-sm edit-btn"><i class="fas fa-pencil-alt"></i></a>
                                                        </td>
                                                        <!-- <td>
                                                            <button type="button" class="btn btn-sm btn-danger delete_category_btn" value="<?= $item['categoryid']; ?>" >Delete</button>
                                                        </td> -->
                                                        <form action="code.php" method="POST" enctype="multipart/form-data">
                                                            <input type="hidden" name="categoryid" value="<?= $item['categoryid']; ?>">
                                                            <td><button type="submit" class="btn btn-sm btn-danger"  name="archive_category_btn"><i class="fas fa-archive"></i></button></td>
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
                        <div class="row justify-content-end">
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