<?php 
include('../middleware/businessMiddleware.php');
include('includes/header.php');
include('../config/dbcon.php');

?>
 <?php 
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
?>
    <div class="container-fluid">
        <h4 class="text-dark">Menu List
        <a class="btn btn-primary float-end" role="button" href="add-menu.php?id=<?= $_SESSION['auth_user']['businessid'];?>" id="addbtn">Add Menu</a></h4>
        <div class="card shadow">
            <div class="card-body" id="products_table">
                <div class="row"> 
                    <!--SORTING-->  
                    <div class="col-md-6 text-nowrap" id="filters">
                        <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                            <label class="form-label">Sorted by:&nbsp;
                                <select  id="mySelect" onchange="myFunction()" class="d-inline-block form-select form-select-sm">
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
                    <div class="col-md-6">
                        <div class="text-md-end dataTables_filter" id="dataTable_filter"><label class="form-label"><input type="search" class="form-control form-control-sm" aria-controls="dataTable" placeholder="Search"></label></div>
                        </div>
                    </div>
                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                        <table class="table my-0" id="dataTable" style="text-align:center">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Course Menu</th>
                                    <th>Cuisine Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    <th>Archive</th>
                                    <!--<th>Delete</th>-->
                                </tr>
                            </thead>
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                            <tbody style="text-align:center">
                                <?php
                                    $products = getAllNotArchive("products");

                                    if(mysqli_num_rows($products) > 0)
                                    {
                                        foreach($products as $item)
                                        {
                                              if($item['businessid'] == $_SESSION['auth_user']['businessid'])
                                                {
                                                ?>
                                                    <tr>
                                                        <td><img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['image']; ?>"></td>
                                                        <td><?= $item['name']; ?></td>
                                                        <td><?= $item['price']; ?></td>
                                                        <td><?= $item['description']; ?></td>
                                                        <td><?= $item['food_type']; ?></td>
                                                        <td><?= $item['cuisinename']; ?></td>
                                                        <td><?= $item['status']== '0'? "Sold Out":"Available"  ?></td>
                                                        <td>
                                                            <a href="edit-menu.php?id=<?= $item['productid']; ?>" class="btn edit-btn"><i class="fas fa-pencil-alt"></i></a>
                                                        </td>
                                                        <!--<td>
                                                            <button type="button" class="btn btn-sm btn-danger" value="<?= $item['productid']; ?>" >Delete</button>
                                                        </td>-->
                                                        <td><button type="submit" class="btn btn-sm btn-danger" value = "<?= $item['productid']; ?>"  name="archive_menu_btn"><i class="fas fa-archive"></i></button></td>
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
                    </div>
                    <!--SCRIPT FOR SORTING-->
                    <script type="text/javascript">
                            $(document).ready(function(){
                                $("#mySelect").on('change',function(){
                                    var value = $(this).val();
                                    //alert(value);

                                    $.ajax({
                                        url:"fetch.php?id=<?= $id; ?>",
                                        type:"POST",
                                        data:'request=' + value,
                                        beforeSend:function(){
                                            $(".container").html("<span>Working...</span>");
                                        },
                                        success:function(data){
                                            $(".container").html(data);
                                        }
                                    });
                                });
                            });
                        // function myFunction() {
                        // var x = document.getElementById("mySelect").value;
                        // document.getElementById("dataContent").innerHTML = x;
                        // }
                    </script>
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

        }
        else
        {
            echo"ID missing from url";
        }
?>
<?php include('includes/footer.php');?>