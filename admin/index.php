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

<?php include('includes/footer.php');?>