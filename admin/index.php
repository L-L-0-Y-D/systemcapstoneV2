<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');


?>
<body id="page-top">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content ">
                <div class="container-fluid p-1">
                    <h3 class="text-dark mb-0 mx-3">Admin's Dashboard</h3>
                    <div class="row m-0">
                        <div class="col">
                            <div>
                                <ul class="nav nav-tabs nav-justified" role="tablist" id="myTab">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" role="tab" data-bs-toggle="tab" id="totaluser" href="#totalusertab">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col col-md-7">
                                                                <h6>Total <br>Users</h6>
                                                            </div>
                                                            <div class="col-auto col-md-5">
                                                                <span class="float-end"><i class="fas fa-users fa-2x float-end me-3"></i></span>
                                                            </div>
                                                            <div class="text-dark fw-bold h5 pb-0 mb-0">
                                                            <span id="users">
                                                        <?php
                                                            //$businessuser = $_SESSION['auth_user']['businessid'];
                                                            $query = "SELECT userid FROM users WHERE role_as = 0 ORDER BY userid";
                                                            $query_run = mysqli_query($con, $query);
                                                            $row = mysqli_num_rows($query_run);
                                                            echo $row;
                                                        ?>
                                                            <!-- <script type="text/javascript">
                                                                function loadDoc() {
                                                                var xhttp = new XMLHttpRequest();
                                                                xhttp.onreadystatechange = function() {
                                                                    if (this.readyState == 4 && this.status == 200) {
                                                                    document.getElementById("users").innerHTML = this.responseText;
                                                                    }
                                                                };
                                                                xhttp.open("GET", "fetch.php", true);
                                                                xhttp.send();
                                                                }
                                                                loadDoc();
                                                            </script> -->
                                                        </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link about" role="tab" data-bs-toggle="tab" id="totalbusiness" href="#totalbusinesstab">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col col-md-7">
                                                            <h6>Business<br> Partners</h6>
                                                        </div>
                                                        <div class="col col-md-5">
                                                            <span class="float-end"><i class="fas fa-handshake fa-2x float-end me-3"></i></span>
                                                        </div>
                                                        <div class="text-dark fw-bold h5 pb-0 mb-0">
                                                        <span id="all_business">
                                                        <?php
                                                            //$businessuser = $_SESSION['auth_user']['businessid'];
                                                            $query_business = "SELECT businessid FROM business WHERE status = 1 ORDER BY businessid";
                                                            $query_business_run = mysqli_query($con, $query_business);
                                                            $row_business = mysqli_num_rows($query_business_run);
                                                            echo $row_business;
                                                        ?>
                                                        </span>
                                                        <!-- <script type="text/javascript">
                                                                function loadDoc() {
                                                                var xhttp = new XMLHttpRequest();
                                                                xhttp.onreadystatechange = function() {
                                                                    if (this.readyState == 4 && this.status == 200) {
                                                                    document.getElementById("all_business").innerHTML = this.responseText;
                                                                    }
                                                                };
                                                                xhttp.open("GET", "fetch.php", true);
                                                                xhttp.send();
                                                                }
                                                                loadDoc();
                                                            </script> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" role="tab" data-bs-toggle="tab" id="busiconfirm" href="#busiconfirmtab">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col col-md-7">
                                                            <h6>Business <br>Confirm</h6>
                                                        </div>
                                                        <div class="col-auto col-md-5">
                                                            <span class="float-end"><i class="fas fa-store fa-2x float-end me-3"></i></span>
                                                        </div>
                                                        <div class="text-dark fw-bold h5 mb-0 pb-0">
                                                        <?php
                                                            //$businessuser = $_SESSION['auth_user']['businessid'];
                                                            $query_business = "SELECT businessid FROM business WHERE status = 0 ORDER BY businessid";
                                                            $query_business_run = mysqli_query($con, $query_business);
                                                            $row_business = mysqli_num_rows($query_business_run);
                                                            echo '<span>'.$row_business.'</span>'
                                                        ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" role="tab" data-bs-toggle="tab" id="totalcuisines" href="#totalcuisinetab">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col col-md-7">
                                                            <h6>Total <br>Cuisines</h6>
                                                        </div>
                                                        <div class="col-auto col-md-5">
                                                            <span class="float-end"><i class="fas fa-clipboard-list fa-2x float-end me-3"></i></span>
                                                        </div>
                                                        <div class="text-dark fw-bold h5 pb-0 mb-0">
                                                        <?php
                                                            //$businessuser = $_SESSION['auth_user']['businessid'];
                                                            $query_cuisine = "SELECT categoryid FROM mealcategory ORDER BY categoryid";
                                                            $query_cuisine_run = mysqli_query($con, $query_cuisine);
                                                            $row_cuisine = mysqli_num_rows($query_cuisine_run);
                                                            echo '<span>'.$row_cuisine.'</span>'
                                                        ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" role="tabpanel" id="totalusertab">
                                        <!--FOR TOTAL USERS-->    
                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="text-primary fw-bold mb-3"><br><strong>TOTAL USERS</strong><br></h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                                            <table class="table my-0" id="dataTable" style="text-align:center">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Username</th>
                                                                        <th>Address</th>
                                                                        <th>Phone Number</th>
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
                                                                                        <td><?= $item['email']; ?></td>
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" role="tabpanel" id="totalbusinesstab">
                                        <!--FOR TOTAL BUSINESS-->
                                        <div class="col-md-12 mb-4">
                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="text-primary fw-bold mb-3"><br><strong>TOTAL BUSINESS</strong><br></h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
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
                                    </div>
                                    <div class="tab-pane fade" role="tabpanel" id="busiconfirmtab">
                                        <!--FOR PENDING BUSINESS CONFIRM-->
                                        <div class="row">
                                            <div class="col">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="text-primary fw-bold mb-3"><br><strong>PENDING BUSINESS CONFIRM</strong><br></h6>
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">  
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
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" role="tabpanel" id="totalcuisinetab">
                                        FOR CUISINES
                                        <div class="row">
                                            <div class="col">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="text-primary fw-bold mb-3"><br><strong>TOTAL CUISINES</strong><br></h6>
                                                    </div>
                                                    <div class="card-body">
                                                    <table class="table my-0" id="dataTable" style="text-align:center">
                                                            <thead>
                                                                <tr>
                                                                    <th>Cuisine Name</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                            
                                                            <tbody style="text-align:center">
                                                            <?php
                                                                    $mealcategory = getAll("mealcategory");
                                                                    // $query_business = "SELECT * FROM business WHERE status = '0' ORDER BY businessid DESC";
                                                                    // $query_business_run = mysqli_query($con, $query_business);
                                                                    
                                                                    if(mysqli_num_rows($mealcategory) > 0)
                                                                    {
                                                                        foreach($mealcategory as $item)
                                                                        {
                                                                            ?>
                                                                                <tr>
                                                                                    <td><?= $item['categoryname']; ?></td>
                                                                                    <td><?= $item['status']== '0'? "Denied":"Confirmed"; ?></td>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php');?>