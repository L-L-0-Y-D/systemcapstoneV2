<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>
                <div class="container-fluid">
                <div class="d-sm-flex justify-content-between align-items-center mb-4">
                    <h3 class="text-dark mb-4">Customer's List</h3><a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#" style="background: rgb(255,128,64);border-style: none;"  id="addbtn" onclick="openForm()">&nbsp;Add Customer</a>
                    <div class="form-popup" id="myForm">
                            <form name="form" class="form-container">
                                <h3>Register Cuisine</h3>
                 <!-- Input Username -->
        <div class="column">
            <input type="text" name='username' required placeholder="Input Category" class="input"/>    
        </div>
                <button type="submit" name="submit" class="busi_reg-btn" >SUBMIT</button> <br> <br>
                                <div><button type="button" class="btn cancel" onclick="closeForm()">Close</button></div>
                            </form>
            </form>
        </div>
                        </div>
                        <script>
                        function openForm() {
                            document.getElementById("myForm").style.display = "block";
                        }
                        function closeForm() {
                            document.getElementById("myForm").style.display = "none";
                        }
                        </script>
                </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold" style="color: rgb(255,128,64);">Customers Info</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                                                <option value="10" selected="">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select>&nbsp;</label></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Cuisine</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
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
                                            <td><?= $item['categoryid']; ?></td>
                                            <td><?= $item['categoryname']; ?></td>
                                            <td>
                                                <a href="edit-product.php?id=<?= $item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-sm btn-danger delete_product_btn" value="<?= $item['id']; ?>" >Delete</button>
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