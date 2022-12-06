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
            $result_count = mysqli_query($con, "SELECT COUNT(*) as total_records FROM products WHERE NOT status = 2 AND businessid = '$id'") or die(mysqli_error($con));
            //total records
            $records = mysqli_fetch_array($result_count);
            //store total_records to a variable
            $total_records = $records['total_records'];
            //get total pages
            $total_no_of_pages = ceil($total_records / $total_records_per_page);

            //query string
            $table_query = "SELECT * FROM products WHERE NOT status = 2 AND businessid = '$id' ORDER BY productid DESC LIMIT $offset, $total_records_per_page";
            // result
            $result = mysqli_query($con,$table_query) or die(mysqli_error($con));
?>
    <div class="container-fluid bg-white mt-0 pt-3">
        <a class="btn btn-primary float-end mt-2 btn-sm" role="button" href="add-menu.php?id=<?= $_SESSION['auth_user']['businessid'];?>" id="addbtn">Add Menu</a>  
        <h4 class="text-dark"><?= $_SESSION['auth_user']['business_name'];?>'s Menu List</h4>
       
                        <!--SORTING-->
                        <div class="col-md-6 text-nowrap" id="filters">
                            <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                                <label class="form-label">Sorted by:&nbsp;
                                    <select  id="mySelect" onchange="myFunction()" class="d-inline-block form-select form-select-sm w-75">
                                        <option value="All" selected="">All Menu</option>
                                        <option value="Main">Main Course</option>
                                        <option value="Appetizer">Appetizer</option>
                                        <option value="Soup">Soup</option>
                                        <option value="Fishdish">Fish Dish</option>
                                        <option value="Meatdish">Meat Dish</option>
                                        <option value="Salad">Salad</option>
                                        <option value="Dessert">Dessert</option>
                                        <option value="Drinks">Drinks</option>
                                    </select>
                                </label>
                            </div>
                        </div>  
                        <div class="container" id="container">
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <?php
                                    // $products = getAllNotArchive("products");

                                    if(mysqli_num_rows($result) > 0)
                                    {
                                        foreach($result as $item)
                                        {
                                              if($item['businessid'] == $_SESSION['auth_user']['businessid'])
                                                {
                                                ?>
                                                    <div class="row mx-auto shadow-sm justify-content-center mb-2">
                                                        <div class="col col-md-2">
                                                            <div><img class="p-3" src="../uploads/<?= $item['image']; ?>" height="170px" width="150px"></div>
                                                        </div>
                                                        <div class="col p-4 col-md-5 info">
                                                            <h6 class="fw-bold p-0 m-1"><?= $item['name']; ?></h6>
                                                            <p class="p-0 m-1">₱<?= $item['price']; ?>.00</p>
                                                            <p class="p-0 m-1">Course Menu:&nbsp;<?= $item['food_type']; ?></p>
                                                            <p class="p-0 m-1">Cuisine Type:&nbsp;<?= $item['cuisinename']; ?></p>
                                                            <p class="p-0 m-1">Product Description:&nbsp;<?= $item['description']; ?></p>
                                                            <p class="p-0 m-1 fw-bold">Status:&nbsp;<?= $item['status']== '0'? "Sold Out":"Available"  ?></p>
                                                        </div>
                                                        <div class="col p-3 col-md-4 ">
                                                            <div class="btn-group m-3" role="group">
                                                                <input type="hidden" name="businessid" value="<?= $item['businessid']; ?>">
                                                                <a href="edit-menu.php?id=<?= $item['productid']; ?>" class="btn edit-btn btn-sm" type="button">Edit&nbsp;&nbsp;<i class="fas fa-pencil-alt"></i></a>
                                                              
                                                                <button class="btn btn-danger btn-sm" type="submit" value = "<?= $item['productid']; ?>" name="archive_menu_btn">Archive&nbsp;&nbsp;<i class="fas fa-archive"></i> </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                                }
                                        }
                                    }
                                    else
                                    {
                                        echo "No records Found";
                                    }
                                ?>
                
                        </form>
       
                    <!--SCRIPT FOR SORTING-->
                    <script type="text/javascript">
                            $(document).ready(function(){
                                $("#mySelect").on('change',function(){
                                    var value = $(this).val();
                                    //alert(value);
                                    var all= $('#all').val();

                                    $.ajax({
                                        url:"fetch.php?id=<?= $id; ?>",
                                        type:"POST",
                                        data:'request=' + value,
                                        beforeSend:function(){
                                            $("#container").html("<span>Working...</span>");
                                        },
                                        success:function(data){
                                            $("#container").html(data);
                                        
                                        }
                                    });
                                });
                            });
                  
                    </script>
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

<?php

        }
        else
        {
            echo"ID missing from url";
        }
?>
<?php include('includes/footer.php');?>