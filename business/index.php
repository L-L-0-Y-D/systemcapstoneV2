<?php 
include('../config/dbcon.php');
include('../middleware/businessMiddleware.php');
include('includes/header.php');

$businessuserid = $_SESSION['auth_user']['businessid'];
?>

<body id="page-top">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid p-1">
                <h3 class="text-dark mb-0 mx-3">Business Dashboard</h3>
                <span class="text-dark float-end me-4"><?php echo "Today is " . date("m/d/Y") . "<br>";?></span><br>
                    <div class="row m-0"> 
                        <div class="col">
                            <div>
                                <ul class="nav nav-tabs nav-justified" role="tablist" id="myTab">
                                        <li class="nav-item" role="presentation" >
                                            <a class="nav-link active" role="tab" data-bs-toggle="tab" id="totalreservation" href="#totalreservationtab">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col col-md-7">
                                                                <h6>Total <br>Reservation</h6>
                                                            </div>
                                                            <div class="col-auto col-md-5">
                                                                <span class="float-end"><i class="fas fa-users fa-2x float-end me-3"></i></span>
                                                            </div>
                                                            <div class="text-dark fw-bold h5 pb-0 mb-0">
                                                            <?php
                                                                $businessuser = $_SESSION['auth_user']['businessid'];
                                                                $query = "SELECT reservationid FROM reservations WHERE businessid = $businessuser ORDER BY reservationid";
                                                                $query_run = mysqli_query($con, $query);
                                                                $row = mysqli_num_rows($query_run);
                                                                echo '<span>'.$row.'</span>'
                                                            ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                        <a class="nav-link about" role="tab" data-bs-toggle="tab" id="pendingreservation" href="#pendingreservationtab">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col col-md-7">
                                                            <h6>Total <br>Table</h6>
                                                        </div>
                                                        <div class="col col-md-5 ">
                                                            <span class="float-end"><i class="fas fa-clipboard-list fa-2x float-end me-3"></i></span>
                                                        </div>
                                                        <div class="text-dark fw-bold h5 mb-0">
                                                        <?php
                                                            //$businessuser = $_SESSION['auth_user']['businessid'];
                                                            $query_table = "SELECT tableid FROM managetable WHERE businessid = $businessuser AND status = 1 ORDER BY tableid";
                                                            $query_table_run = mysqli_query($con, $query_table);
                                                            $row_table = mysqli_num_rows($query_table_run);
                                                            echo '<span>'.$row_table.'</span>'
                                                        ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" role="tab" data-bs-toggle="tab" id="totalmenu" href="#totalmenutab">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col col-md-7">
                                                            <h6>Total <br>Menu(s)</h6>
                                                        </div>
                                                        <div class="col-auto col-md-5 ">
                                                            <span class="float-end"><i class="fas fa-utensils fa-2x float-end me-3"></i></span>
                                                        </div>
                                                        <div class="text-dark fw-bold h5  mb-0 pb-0">
                                                        <?php
                                                            //$businessuser = $_SESSION['auth_user']['businessid'];
                                                            $query_menu = "SELECT productid FROM products WHERE businessid = $businessuser ORDER BY productid";
                                                            $query_menu_run = mysqli_query($con, $query_menu);
                                                            $row_menu = mysqli_num_rows($query_menu_run);
                                                            echo '<span>'.$row_menu.'</span>'
                                                        ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" role="tab" data-bs-toggle="tab" id="rating" href="#ratingtab">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col col-md-7">
                                                            <h6>Business <br>Rating</h6>
                                                        </div>
                                                        <div class="col-auto col-md-5">
                                                            <span class="float-end"><i class="fas fa-star fa-2x float-end me-3"></i></span>
                                                        </div>
                                                        <div class="text-dark fw-bold h5 mb-0">
                                                        <?php
                                                            //$businessuser = $_SESSION['auth_user']['businessid'];
                                                            $query_rating = "SELECT ROUND(AVG(user_rating),1) AS averagerating FROM review_table WHERE businessid = $businessuser ORDER BY review_id";
                                                            $query_rating_run = mysqli_query($con, $query_rating);
                                                            $row_rating = mysqli_fetch_assoc($query_rating_run);

                                                            if(!$row_rating['averagerating'])
                                                            {
                                                                echo '<span> No Rating </span>';
                                                            }
                                                            else
                                                            {
                                                                echo '<span style="color:orange; <i class="fas fa-star"></i>&nbsp'.$row_rating['averagerating'].'/5</span>';
                                                            }
                                                            $query_rating_count = "SELECT review_id FROM review_table WHERE businessid = $businessuser ORDER BY review_id";
                                                            $query_rating_count_run = mysqli_query($con, $query_rating_count);
                                                            $row_rating_count = mysqli_num_rows($query_rating_count_run);
                                                            echo '<span> ('.$row_rating_count.' reviews)</span>'
                                                        ?> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" role="tabpanel" id="totalreservationtab">
                                        <!--FOR OVERALL RESERVATION-->    
                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="text-primary fw-bold"><br><strong>OVERALL RESERVATION</strong><br></h6>
                                                    </div>
                                                    <div class="card-body">
                                                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                                        <table class="table my-0" id="dataTable" style="text-align:center">
                                                            <thead>
                                                                <tr>
                                                                    <th>Account Name</th>
                                                                    <th>Table Reserved By</th>
                                                                    <th>Table No.</th>
                                                                    <th>No. of Guest</th>
                                                                    <th>Reservation Date</th>
                                                                    <th>Reservation Time</th>
                                                                </tr>
                                                            </thead>
                                                            
                                                            <tbody style="text-align:center">
                                                                <?php
                                                                    //$reservations = getAll("reservations");
                                                                    $query_reservation = "SELECT reservations.reservationid,reservations.namereserveunder,reservations.reservation_date,reservations.reservation_time,reservations.reservation_phonenumber,reservations.reservation_email,reservations.businessid,reservations.tableid,managetable.tableid,managetable.table_number,managetable.chair,reservations.userid,reservations.status,users.userid,users.name
                                                                    FROM reservations
                                                                    JOIN managetable 
                                                                    ON reservations.tableid=managetable.tableid
                                                                    JOIN users
                                                                    ON reservations.userid=users.userid
                                                                    WHERE reservations.businessid = $businessuserid
                                                                    ORDER BY reservationid DESC"; 
                                                                    $query_reservation_run = mysqli_query($con, $query_reservation);

                                                                    if(mysqli_num_rows($query_reservation_run) > 0)
                                                                    {
                                                                        foreach($query_reservation_run as $item)
                                                                        {
                                                                            if($item['businessid'] == $_SESSION['auth_user']['businessid'])
                                                                                {
                                                                                ?>
                                                                                    <tr>
                                                                                        <td><?= $item['name']; ?></td>
                                                                                        <td><?= $item['namereserveunder']; ?></td>
                                                                                        <td><?= $item['table_number']; ?></td>
                                                                                        <td><?= $item['chair']; ?></td>
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
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" role="tabpanel" id="pendingreservationtab">
                                        <!--FOR PENDING RESERVATION-->
                                        <div class="col-md-12 mb-4">
                                            <div class="card shadow mb-4">
                                                <div class="card-header py-3">
                                                    <h6 class="text-primary fw-bold"><br><strong>Total Table Management</strong><br></h6>
                                                </div>
                                                <div class="card-body">
                                                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                                        <table class="table my-0" id="dataTable" style="text-align:center">
                                                            <thead>
                                                                <tr>
                                                                    <th>Table No.</th>
                                                                    <th>No. of Chairs</th>
                                                                    <th>Status</th>
                                                                </tr>
                                                            </thead>
                                                        
                                                            <tbody style="text-align:center">
                                                                <?php
                                                                    //$reservations = getAll("reservations");
                                                                    $query_table = "SELECT * FROM managetable WHERE businessid = $businessuserid AND status = 1";
                                                                    $query_table_run = mysqli_query($con, $query_table);

                                                                    if(mysqli_num_rows($query_table_run) > 0)
                                                                    {
                                                                        foreach($query_table_run as $item)
                                                                        {
                                                                            if($item['businessid'] == $_SESSION['auth_user']['businessid'])
                                                                                {
                                                                                ?>
                                                                                    <tr>
                                                                                        <td>Table <?= $item['table_number']; ?></td>
                                                                                        <td><?= $item['chair']; ?></td>
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
                                    </div>
                                    <div class="tab-pane fade" role="tabpanel" id="ratingtab">
                                        <!--FOR RATING-->
                                        <div class="row">
                                            <div class="col">
                                                <div class="card shadow mb-4">
                                                    <div class="card-header py-3">
                                                        <h6 class="text-primary fw-bold"><br><strong>FEEDBACK AND REVIEW</strong><br></h6>
                                                    </div>
                                                    <div class="card-body">
                                                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
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
                                        </div>
                                    </div>

<?php include('includes/footer.php');?>