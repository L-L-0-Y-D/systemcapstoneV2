<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>
<?php
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
    $result_count = mysqli_query($con, "SELECT COUNT(*) as total_records FROM products WHERE NOT status = 2") or die(mysqli_error($con));
    //total records
    $records = mysqli_fetch_array($result_count);
    //store total_records to a variable
    $total_records = $records['total_records'];
    //get total pages
    $total_no_of_pages = ceil($total_records / $total_records_per_page);

    //query string
    $table_query = "SELECT products.productid,products.name,business.business_name,products.description,products.food_type,products.price,products.image,products.status,products.created_at FROM products JOIN business ON products.businessid=business.businessid WHERE NOT products.status = 2 ORDER BY productid DESC LIMIT $offset, $total_records_per_page";
    // result
    $result = mysqli_query($con,$table_query) or die(mysqli_error($con));
?>
    <div class="container-fluid">
    <h3 class="text-dark mb-2 mx-3">Menu List</h3>
            <!--<a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="add-menu.php?id=<?= $_SESSION['auth_user']['businessid'];?>" style="background: rgb(255,128,64);border-style: none;"  id="addbtn">&nbsp;Add Menu</a>-->       
        <div class="card shadow">
            <div class="card-body" id="products_table">
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
                    </div>-->
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable" style="text-align:center">
                            <thead>
                            <tr>
                                    <th>Image</th>
                                    <th>Business Name</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Course Menu</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            
                            <tbody style="text-align:center">
                                <?php
                                    // $products = menuGetAll();

                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        foreach($result as $item)
                                        {
                                            if($_SESSION['role_as'] != 0)
                                            {
                                                ?>
                                                    <tr>
                                                        <td><img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['image']; ?>"></td>
                                                        <td><?= $item['business_name']; ?></td>
                                                        <td><?= $item['name']; ?></td>
                                                        <td><?= $item['price']; ?></td>
                                                        <td><?= $item['description']; ?></td>
                                                        <td><?= $item['food_type']; ?></td>
                                                        <td><?php 
                                                                if($item['status'] == 0)
                                                                    { echo 'Active'; } 
                                                                elseif($item['status'] == 1)
                                                                    { echo 'Soldout';}
                                                                elseif($item['status'] == 2)
                                                                    {echo 'Archive';}
                                                        ?></td> 
                                                        
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