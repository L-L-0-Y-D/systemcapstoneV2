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
                                                        $query_rating = "SELECT AVG(user_rating) AS averagerating FROM review_table WHERE businessid = $businessuser ORDER BY review_id";
                                                        $query_rating_run = mysqli_query($con, $query_rating);
                                                        $row_rating = mysqli_fetch_assoc($query_rating_run);

                                                        if(!$row_rating['averagerating'])
                                                        {
                                                            echo '<span> No Rating </span>';
                                                        }
                                                        else if($row_rating['averagerating'] == '1')
                                                        {
                                                            ?>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <?php
                                                        }
                                                        else if($row_rating['averagerating'] > '1')
                                                        {
                                                            ?>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star-half-full"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star "></span>
                                                            <span class="fa fa-star"></span>
                                                            <?php
                                                        }
                                                        else if($row_rating['averagerating'] == '2')
                                                        {
                                                            ?>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <?php
                                                        }
                                                        else if($row_rating['averagerating'] > '2')
                                                        {
                                                            ?>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star-half-full"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <?php
                                                        }
                                                        else if($row_rating['averagerating'] == '3')
                                                        {
                                                            ?>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            <span class="fa fa-star"></span>
                                                            <?php
                                                        }
                                                        else if($row_rating['averagerating'] > '3')
                                                        {
                                                            ?>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star-half-full"></span>
                                                            <span class="fa fa-star"></span>
                                                            <?php
                                                        }
                                                        else if($row_rating['averagerating'] == '4')
                                                        {
                                                            ?>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star"></span>
                                                            <?php
                                                        }
                                                        else if($row_rating['averagerating'] > '4')
                                                        {
                                                            ?>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star-half-full"></span>
                                                            <?php
                                                        }
                                                        else if($row_rating['averagerating'] == '5')
                                                        {
                                                            ?>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <span class="fa fa-star checked"></span>
                                                            <?php
                                                        }
                                                        else
                                                        {
                                                            //echo '<span>'.$row_rating['averagerating'].'</span>';
                                                        }
                                                        $query_rating_count = "SELECT review_id FROM review_table WHERE businessid = $businessuser ORDER BY review_id";
                                                        $query_rating_count_run = mysqli_query($con, $query_rating_count);
                                                        $row_rating_count = mysqli_num_rows($query_rating_count_run);
                                                        echo '<span>('.$row_rating_count.')</span>'

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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--FOR OVERALL RESERVATION-->    
                        <div class="row">
                            <div class="col-lg-6 mb-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="text-primary fw-bold m-0"><br><strong>OVERALL RESERVATION</strong><br></h6>
                                    </div>
                                    <div class="card-body">
                                    <table class="table my-0" id="dataTable" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>No. of Guest</th>
                                                    <th>Reservation Date</th>
                                                    <th>Reservation Time</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody style="text-align:center">
                                                <?php
                                                    //$reservations = getAll("reservations");
                                                    $query_reservation = "SELECT * FROM reservations ORDER BY reservationid DESC ";
                                                    $query_reservation_run = mysqli_query($con, $query_reservation);

                                                    if(mysqli_num_rows($query_reservation_run) > 0)
                                                    {
                                                        foreach($query_reservation_run as $item)
                                                        {
                                                            if($item['businessid'] == $_SESSION['auth_user']['businessid'])
                                                                {
                                                                ?>
                                                                    <tr>
                                                                        <td><?= $item['namereserveunder']; ?></td>
                                                                        <td><?= $item['numberofguest']; ?></td>
                                                                        <td><?= $item['reservation_date']; ?></td>
                                                                        <td><?= $item['reservation_time']; ?></td>
                                                                    </tr>
                                                                <?php
                                                                }
                                                        }
                                                    }
                                                    else
                                                    {
                                                        
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!--FOR PENDING RESERVATION-->
                            <div class="col-lg-6 mb-4">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="text-primary fw-bold m-0"><br><strong>PENDING RESERVATION</strong><br></h6>
                                    </div>
                                    <div class="card-body">
                                        <table class="table my-0" id="dataTable" style="text-align:center">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>No. of Guest</th>
                                                    <th>Reservation Date</th>
                                                    <th>Reservation Time</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody style="text-align:center">
                                                <?php
                                                    //$reservations = getAll("reservations");
                                                    $query_reservation = "SELECT * FROM reservations WHERE status = '0' ORDER BY reservationid DESC";
                                                    $query_reservation_run = mysqli_query($con, $query_reservation);

                                                    if(mysqli_num_rows($query_reservation_run) > 0)
                                                    {
                                                        foreach($query_reservation_run as $item)
                                                        {
                                                            if($item['businessid'] == $_SESSION['auth_user']['businessid'])
                                                                {
                                                                ?>
                                                                    <tr>
                                                                        <td><?= $item['namereserveunder']; ?></td>
                                                                        <td><?= $item['numberofguest']; ?></td>
                                                                        <td><?= $item['reservation_date']; ?></td>
                                                                        <td><?= $item['reservation_time']; ?></td>
                                                                        <td><?= $item['status']== '0'? "Waiting":"Activated"; ?></td>
                                                                    </tr>
                                                                <?php
                                                                }
                                                        }
                                                    }
                                                    else
                                                    {
                                                        
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--FOR RATING-->
                        <div class="row">
                            <div class="col">
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="text-primary fw-bold m-0"><br><strong>FEEDBACK AND REVIEW</strong><br></h6>
                                    </div>
                                    <div class="card-body">
                                    <table class="table my-0" id="dataTable">
                                        <thead style="text-align:center">
                                            <tr>
                                                <th>Name</th>
                                                <th>Rating</th>
                                                <th>Review</th>
                                            </tr>
                                            </thead>
                                    
                                        <tbody style="text-align:center">
                                            <?php
                                                $review = getAll("review_table");

                                                if(mysqli_num_rows($review) > 0)
                                                {
                                                    foreach($review as $item)
                                                    {
                                                        if($item['businessid'] == $_SESSION['auth_user']['businessid'])
                                                            {
                                                        ?>
                                                        <tr>
                                                                <td><?= $item['user_name']; ?></td>
                                                                <td><?= $item['user_rating']; ?></td>
                                                                <td><?= $item['user_review'];?></td>
                                                        </tr>
                                                        <?php
                                                            }
                                                    }
                                                }
                                                    else
                                                    {
                                                        
                                                    }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

<?php include('includes/footer.php');?>