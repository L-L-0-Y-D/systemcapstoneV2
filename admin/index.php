<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>
   
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Total Users</span></div>
                                            <div class="text-dark fw-bold h5 mb-0">
                                            <?php
                                                //$businessuser = $_SESSION['auth_user']['businessid'];
                                                $query = "SELECT userid FROM users WHERE role_as = 0 ORDER BY userid";
                                                $query_run = mysqli_query($con, $query);
                                                $row = mysqli_num_rows($query_run);
                                                echo '<span>'.$row.'</span>'
                                             ?>
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="fa fa-user fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Total Business</span></div>
                                            <div class="text-dark fw-bold h5 mb-0">
                                            <?php
                                                //$businessuser = $_SESSION['auth_user']['businessid'];
                                                $query_business = "SELECT businessid FROM business WHERE status = 1 ORDER BY businessid";
                                                $query_business_run = mysqli_query($con, $query_business);
                                                $row_business = mysqli_num_rows($query_business_run);
                                                echo '<span>'.$row_business.'</span>'
                                             ?>
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="fa fa-building fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-info py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>Pending Business Confirm</span></div>
                                            <div class="row g-0 align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-dark fw-bold h5 mb-0 me-3">
                                                    <?php
                                                        //$businessuser = $_SESSION['auth_user']['businessid'];
                                                        $query_business = "SELECT businessid FROM business WHERE status = 0 ORDER BY businessid";
                                                        $query_business_run = mysqli_query($con, $query_business);
                                                        $row_business = mysqli_num_rows($query_business_run);
                                                        echo '<span>'.$row_business.'</span>'
                                                    ?>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class>
                                                        <div><!----></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="far fa-check-square fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-info py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>Cuisine</span></div>
                                            <div class="row g-0 align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-dark fw-bold h5 mb-0 me-3">
                                                    <?php
                                                        //$businessuser = $_SESSION['auth_user']['businessid'];
                                                        $query_cuisine = "SELECT categoryid FROM mealcategory ORDER BY categoryid";
                                                        $query_cuisine_run = mysqli_query($con, $query_cuisine);
                                                        $row_cuisine = mysqli_num_rows($query_cuisine_run);
                                                        echo '<span>'.$row_cuisine.'</span>'
                                                    ?>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class>
                                                        <div></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         <!--FOR TOTAL USERS-->    
                         <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="text-primary fw-bold m-0"><br><strong>TOTAL USERS</strong><br></h6>
                                    </div>
                                    <div class="card-body">
                                    <table class="table my-0" id="dataTable" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th>Username</th>
                                                    <th>Address</th>
                                                    <th>Contact Number</th>
                                                    <th>Age</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody style="text-align:center">
                                                <?php
                                                    //$reservations = getAll("reservations");
                                                    $query_user = "SELECT * FROM users WHERE role_as = '0' ORDER BY userid DESC";
                                                    $query_user_run = mysqli_query($con, $query_user);

                                                    if(mysqli_num_rows($query_user_run) > 0)
                                                    {
                                                        foreach($query_user_run as $item)
                                                        {
                                                            ?>
                                                                <tr>
                                                                    <td><?= $item['name']; ?></td>
                                                                    <td><?= $item['address']; ?></td>
                                                                    <td><?= $item['phonenumber']; ?></td>
                                                                    <td><?= $item['age']; ?></td>
                                                                </tr>
                                                            <?php
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
                                </div>
                            </div>
                            <!--FOR TOTAL BUSINESS-->
                            <div class="col-lg-6 mb-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="text-primary fw-bold m-0"><br><strong>TOTAL BUSINESS</strong><br></h6>
                                    </div>
                                    <div class="card-body">
                                    <table class="table my-0" id="dataTable" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Business Name</th>
                                                    <th>Address</th>
                                                    <th>Cuisine Type</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody style="text-align:center">
                                                <?php
                                                    //$reservations = getAll("reservations");
                                                    $query_business = "SELECT * FROM business ORDER BY businessid DESC";
                                                    $query_business_run = mysqli_query($con, $query_business);

                                                    if(mysqli_num_rows($query_business_run) > 0)
                                                    {
                                                        foreach($query_business_run as $item)
                                                        {
                                                            ?>
                                                                <tr>
                                                                    <td><img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['image']; ?>"></td>
                                                                    <td><?= $item['business_name']; ?></td>
                                                                    <td><?= $item['business_address']; ?></td>
                                                                    <td><?= $item['cuisinename']; ?></td>
                                                                    <td><?= $item['status']== '0'? "Waiting":"Confirmed"; ?></td>
                                                                </tr>
                                                            <?php
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
                                </div>
                            </div>
                        </div>
                        <!--FOR PENDING BUSINESS CONFIRM-->
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="text-primary fw-bold m-0"><br><strong>PENDING BUSINESS CONFIRM</strong><br></h6>
                                    </div>
                                    <div class="card-body">
                                    <table class="table my-0" id="dataTable" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Business Name</th>
                                                    <th>Address</th>
                                                    <th>Cuisine Type</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody style="text-align:center">
                                                <?php
                                                    //$reservations = getAll("reservations");
                                                    $query_business = "SELECT * FROM business WHERE status = '0' ORDER BY businessid DESC";
                                                    $query_business_run = mysqli_query($con, $query_business);
                                                    
                                                    if(mysqli_num_rows($query_business_run) > 0)
                                                    {
                                                        foreach($query_business_run as $item)
                                                        {
                                                            ?>
                                                                <tr>
                                                                    <td><img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['image']; ?>"></td>
                                                                    <td><?= $item['business_name']; ?></td>
                                                                    <td><?= $item['business_address']; ?></td>
                                                                    <td><?= $item['cuisinename']; ?></td>
                                                                    <td><?= $item['status']== '0'? "Waiting":"Confirmed"; ?></td>
                                                                </tr>
                                                            <?php
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
                                </div>
                            </div>
                        </div>
                        <!-- FOR CUISINES
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="text-primary fw-bold m-0"><br><strong>TOTAL CUISINES</strong><br></h6>
                                    </div>
                                    <div class="card-body">
                                    <table class="table my-0" id="dataTable" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>Business Name</th>
                                                    <th>Address</th>
                                                    <th>Cuisine Type</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody style="text-align:center">
                                                <?php
                                                    //$reservations = getAll("reservations");
                                                    // $query_business = "SELECT * FROM business WHERE status = '0' ORDER BY businessid DESC";
                                                    // $query_business_run = mysqli_query($con, $query_business);
                                                    
                                                    // if(mysqli_num_rows($query_business_run) > 0)
                                                    // {
                                                    //     foreach($query_business_run as $item)
                                                    //     {
                                                    //         ?>
                                                    //             <tr>
                                                    //                 <td><img src="../uploads/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['image']; ?>"></td>
                                                    //                 <td><?= $item['business_name']; ?></td>
                                                    //                 <td><?= $item['business_address']; ?></td>
                                                    //                 <td><?= $item['cuisinename']; ?></td>
                                                    //                 <td><?= $item['status']== '0'? "Denied":"Confirmed"; ?></td>
                                                    //             </tr>
                                                    //         <?php
                                                    //     }
                                                    // }
                                                    // else
                                                    // {
                                                    //     echo "No records Found";
                                                    // }
                                                    
                                                ?>
                                            </tbody>
                                        </table> 
                                    </div>
                                </div>
                            </div>
                        </div> -->

<?php include('includes/footer.php');?>