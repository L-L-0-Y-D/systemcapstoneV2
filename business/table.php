<?php 
include('../middleware/businessMiddleware.php');
include('includes/header.php');
include('../config/dbcon.php');

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

            // $request = $_POST['request'];
            $id = $_GET['id'];
            //total rows or records to display
            $total_records_per_page = 10;
            //get the page offset for the LIMIT query
            $offset = ($page_no - 1) * $total_records_per_page;
            //get previous page
            $previous_page = $page_no - 1;
            //get the next page
            $next_page = $page_no + 1;
            //get the total count of records
            $result_count = mysqli_query($con, "SELECT COUNT(*) as total_records FROM managetable WHERE NOT status = 2 AND businessid = '$id'") or die(mysqli_error($con));
            //total records
            $records = mysqli_fetch_array($result_count);
            //store total_records to a variable
            $total_records = $records['total_records'];
            //get total pages
            $total_no_of_pages = ceil($total_records / $total_records_per_page);

            //query string
            $table_query = "SELECT * FROM managetable WHERE NOT status = 2 AND businessid = '$id' ORDER BY tableid DESC LIMIT $offset, $total_records_per_page";
            // result
            $result = mysqli_query($con,$table_query) or die(mysqli_error($con));


            
?>
    <div class="container-fluid pt-3">
    <a class="btn btn-primary float-end mt-2 btn-sm" role="button" href="add-table.php?id=<?= $_SESSION['auth_user']['businessid'];?>" id="addbtn">Add Table</a>
        <h4 class="text-dark"><?= $_SESSION['auth_user']['business_name'];?>'s Table List</h4>

        
        <div class="card shadow">
            <div class="card-body" id="tablemanage">
                <div class="row">
                    <div class="col-md-6 text-nowrap">
                        <!-- <h4 class="text-dark"></h4> -->
                        <!-- <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"><label class="form-label">Show&nbsp;<select class="d-inline-block form-select form-select-sm">
                            <option value="10" selected="">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                            </select>&nbsp;</label>
                        </div> -->
                </div>
                    <div class="col-md-6">
                        <div class="float-right">
                                <a class="btn btn-dark float-end mb-3 mx-2 btn-sm" role="button" href="archivetable.php?id=<?= $_SESSION['auth_user']['businessid'];?>">
                                    <span class="label">Archives&nbsp;</span>
                                    <i class="fas fa-archive"></i> 
                                </a>
                                <a href="javascript:void(0);" class="btn btn-success float-end mb-3 mx-2 btn-sm" onclick="formToggle('importFrm');">
                                    <span class="label">Import&nbsp;</span>
                                    <i class="fas fa-upload plus"></i> 
                                </a>
                                <a href="exportTableData.php?id=<?= $_SESSION['auth_user']['businessid'];?>" class="btn btn-primary float-end mb-3 mx-3 btn-sm">
                                    <span class="label">Export All&nbsp;</span>
                                    <i class="fas fa-download exp"></i> 
                                </a>
                            </div>
                            <!-- CSV file upload form -->
                        <div class="col-md-6 " id="importFrm" style="display: none;">
                            <form action="importTableData.php?id=<?= $_SESSION['auth_user']['businessid'];?>" method="post" enctype="multipart/form-data">
                                <input class="float-end mb-3 mx-3 btn-sm" type="file" name="file" accept=".csv" required/>
                                <input class="btn btn-success float-end mb-3 mx-3 btn-sm" type="submit" class="btn btn-primary" name="importSubmit" value="IMPORT">
                            </form>
                        </div>
                    </div>
                </div>
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable" style="text-align:center">
                            <thead>
                                <tr>
                                    <th>Table No.</th>
                                    <th>No. of Chairs</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <!-- <th>Delete</th> -->
                                    <th>Archive</th>
                                    <th>Export</th>
                                </tr>
                            </thead>
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                            <tbody style="text-align:center">
                                <?php
                                    // $table = getAllNotArchive("managetable");

                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        foreach($result as $item)
                                        {
                                              if($item['businessid'] == $_SESSION['auth_user']['businessid'])
                                                {
                                                ?>
                                                    <tr>
                                                        
                                                        <td>Table <?= $item['table_number']; ?></td>
                                                        <td><?= $item['chair']; ?></td>
                                                        <td><?= $item['status']== '0'? "Not Available":"Available"  ?></td>
                                                        <td>
                                                            <a href="edit-table.php?id=<?= $item['tableid']; ?>" class="btn edit-btn btn-outline-dark"><i class="fas fa-pencil-alt"></i></a>
                                                        </td>
                                                        <!-- <td>
                                                            <button type="button" class="btn btn-sm btn-danger delete_product_btn" value="<?= $item['productid']; ?>" >Delete</button>
                                                        </td> -->
                                                        <input type="hidden" name="businessid" value="<?= $item['businessid']; ?>">
                                                        <td><button type="submit" class="btn btn-sm btn-danger" value = "<?= $item['tableid']; ?>"  name="archive_table_btn"><i class="fas fa-archive"></i></button></td>
                                                        <td><a href="exportItemTableData.php?id=<?= $_SESSION['auth_user']['businessid'];?>&tableid=<?= $item['tableid']; ?>" class="btn btn-primary btn-outline-dark"><i class="fas fa-download exp"></i></a></td>
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
                    <!-- Show/hide CSV upload form -->
                    <script>

                        function formToggle(ID){
                            var element = document.getElementById(ID);
                            if(element.style.display === "none"){
                                element.style.display = "block";
                            }else{
                                element.style.display = "none";
                            }
                        }
                    </script>
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
    </div>

<?php

        }
        else
        {
            echo"ID missing from url";
        }
?>
<?php include('includes/footer.php');?>