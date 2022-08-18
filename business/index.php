<?php 
include('../config/dbcon.php');
include('../middleware/businessMiddleware.php');
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
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Total Reservation</span></div>
                                            <div class="text-dark fw-bold h5 mb-0">
                                             <?php
                                                $businessuser = $_SESSION['auth_user']['businessid'];
                                                $query = "SELECT reservationid FROM reservations WHERE businessid = $businessuser ORDER BY reservationid";
                                                $query_run = mysqli_query($con, $query);
                                                $row = mysqli_num_rows($query_run);
                                                echo '<span>'.$row.'</span>'
                                             ?>
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="fa fa-calendar fa-2x text-gray-300"></i></div>
                                        <a class="fw-bold text-dark" href="#content" style="text-align:right;">More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Pending Reservation</span></div>
                                            <div class="text-dark fw-bold h5 mb-0">
                                            <?php
                                                //$businessuser = $_SESSION['auth_user']['businessid'];
                                                $query_reservation = "SELECT reservationid FROM reservations WHERE businessid = $businessuser AND status = 0 ORDER BY reservationid";
                                                $query_reservation_run = mysqli_query($con, $query_reservation);
                                                $row_reservation = mysqli_num_rows($query_reservation_run);
                                                echo '<span>'.$row_reservation.'</span>'
                                             ?>
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="far fa-check-square fa-2x text-gray-300"></i></div>
                                        <a class="fw-bold text-dark" href="#content" style="text-align:right;">More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-info py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>Total Menu</span></div>
                                            <div class="row g-0 align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-dark fw-bold h5 mb-0 me-3">
                                                    <?php
                                                        //$businessuser = $_SESSION['auth_user']['businessid'];
                                                        $query_menu = "SELECT productid FROM products WHERE businessid = $businessuser ORDER BY productid";
                                                        $query_menu_run = mysqli_query($con, $query_menu);
                                                        $row_menu = mysqli_num_rows($query_menu_run);
                                                        echo '<span>'.$row_menu.'</span>'
                                                    ?>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div>
                                                        <div><span class="visually-hidden"><!----></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                                        <a class="fw-bold text-dark" href="#content" style="text-align:right;">More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-info py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>Rating</span></div>
                                            <div class="row g-0 align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-dark fw-bold h5 mb-0 me-3">
                                                    <?php
                                                        //$businessuser = $_SESSION['auth_user']['businessid'];
                                                        $query_rating = "SELECT AVG(user_rating) AS averagerating FROM review_table WHERE businessid = $businessuser";
                                                        $query_rating_run = mysqli_query($con, $query_rating);
                                                        $row_rating = mysqli_fetch_assoc($query_rating_run);
                                                        echo '<span>'.$row_rating['averagerating'].'</span>'
                                                    ?> 
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div>
                                                        <div><span class="visually-hidden"><!----></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="fa fa-bar-chart fa-2x text-gray-300"></i></div>
                                        <a class="fw-bold text-dark" onclick="location.href='#content'" style="text-align:right;">More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--<container class="mt-4 bg-dark" id="content" name="content">
                        <div class="col-auto"><i class="fa fa-bar-chart fa-2x text-gray-300"></i></div>
                        </container>-->


<?php include('includes/footer.php');?>