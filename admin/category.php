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
    $result_count = mysqli_query($con, "SELECT COUNT(*) as total_records FROM mealcategory") or die(mysqli_error($con));
    //total records
    $records = mysqli_fetch_array($result_count);
    //store total_records to a variable
    $total_records = $records['total_records'];
    //get total pages
    $total_no_of_pages = ceil($total_records / $total_records_per_page);

    //query string
    $table_query = "SELECT * FROM mealcategory ORDER BY categoryid DESC LIMIT $offset, $total_records_per_page";
    // result
    $result = mysqli_query($con,$table_query) or die(mysqli_error($con));
?>
    <div class="container-fluid">
            <h4 class="text-dark mb-4">Cuisines List
            <a class="btn btn-primary btn-sm float-end" role="button" href="add-category.php" id="addbtn">Add Cuisine Type</a>
            </h4><div>&nbsp;</div>
        <div class="card shadow">
            <div class="card-body" id = "category_table">
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