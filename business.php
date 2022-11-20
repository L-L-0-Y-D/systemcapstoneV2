<?php

    include('functions/userfunctions.php');
    include('includes/header.php'); 
    include('includes/navbar.php'); 

    if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $municipality = getByIDActive("municipality",$id,"municipalityid");

                if(mysqli_num_rows($municipality) > 0)
                    {
                        $data = mysqli_fetch_array($municipality);
                        $mid = $data['municipalityid'];
                        $business = getBusiByMunicipality($mid);
                        $businessreview = getBusiByMunicipalityandReview($id);
                        $items = mysqli_fetch_array($businessreview);  

    
?>
<body>
    <main class="page projects-page">
        <section class="business">
            <div class="container">
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable" style="text-align:center">
                        <thead>
                            <tr>
                                <th><div class="row">
                                    <?php
                                        if(mysqli_num_rows($business) > 0)
                                        {
                                        foreach($business as $item)
                                        {
                                            $businessid = $item['businessid'];
                                    ?>
                                    <div class="col-md-3 mb-5">
                                        <div class="project-card-no-image">
                                            <a href="businessview.php?id=<?=$item['businessid'];?>">
                                                <img class="img-fluid" src="uploads/<?= $item['image']; ?>" alt="Card Image"></a>
                                                    <h3><?= $item['business_name']; ?></h3>
                                                    <?php
                                                    $query_rating = "SELECT ROUND(AVG(user_rating),1) AS averagerating FROM review_table WHERE businessid = $businessid ORDER BY review_id";
                                                    $query_rating_run = mysqli_query($con, $query_rating);
                                                    $row_rating = mysqli_fetch_assoc($query_rating_run);
                                                    if(!$row_rating['averagerating'])
                                                    {
                                                        echo '<span> No Rating </span>';
                                                    }
                                                    else if($row_rating['averagerating'] == 5.0)
                                                    {
                                                        echo '<i class ="fas fa-star "></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="fas fa-star"></i>';
                                                    }
                                                    else if($row_rating['averagerating'] >= 4.1)
                                                    {
                                                        echo '<span style="color:orange;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i></span>';
                                                    }
                                                    else if($row_rating['averagerating'] == 4.0)
                                                    {
                                                        echo '<span style="color:orange;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="far fa-star"></i></span>';
                                                    }
                                                    else if($row_rating['averagerating'] >= 3.1)
                                                    {
                                                        echo '<span style="color:orange;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i><i class="far fa-star"></i></span>';
                                                    }
                                                    else if($row_rating['averagerating'] == 3.0)
                                                    {
                                                        echo '<span style="color:orange;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></i></span>';
                                                    }
                                                    else if($row_rating['averagerating'] >= 2.1)
                                                    {
                                                        echo '<span style="color:orange;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i></span>';
                                                    }
                                                    else if($row_rating['averagerating'] == 2.0)
                                                    {
                                                        echo '<span style="color:orange;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></i></span>';
                                                    }
                                                    else if($row_rating['averagerating'] >= 1.1)
                                                    {
                                                        echo '<span style="color:orange;"<i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></span>';
                                                    }
                                                    else if($row_rating['averagerating'] == 1.0)
                                                    {
                                                        echo '<span style="color:orange;"<i class ="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></i></span>';
                                                    }
                                                    else
                                                    {
                                                        echo 'something went wrong';
                                                    }
                                                    $query_rating_count = "SELECT review_id FROM review_table WHERE businessid = $businessid ORDER BY review_id";
                                                    $query_rating_count_run = mysqli_query($con, $query_rating_count);
                                                    $row_rating_count = mysqli_num_rows($query_rating_count_run);
                                                    echo '<span> ('.$row_rating_count.')</span>'
                                                    
                                                    ?><br>
                                                <p class="text-muted">Opening: <?= date("g:i a", strtotime($item['opening'])); ?> - Closing: <?= date("g:i a", strtotime($item['closing'])); ?></p>
                                            <button class="btn btn-outline-primary btn-sm view" type="button"onclick="location='businessview.php?id=<?= $item['businessid']; ?>'" >View Details</button>   
                                        </div>
                                    </div>
                                    <?php
                                    }
                                        }
                                        else
                                        {
                                            echo "<p class='text-center'>No Business Found</p>";
                                        ?>
                                        <br><a class="text-center text-black fw-bold " style="margin-bottom:76px;" href="index.php">Go Back</a>
                                        <?php
                                        }
                                    ?>
                                </div>   
                            </div>
                        </div>
                    </th>                     
                </tr>
            </thead>              
        </table>
    </div>
                <!--<h2>Top Restaurants in <?= $data['municipality_name']; ?></h2>
                        <div class="carousel slide" data-bs-ride="false" id="carousel-1">
                            <div class="carousel-inner carousel-bottom">
                                <div class="carousel-item active">
                                    <div class="row sliderow">
                                    <?php
                                        if(mysqli_num_rows($businessreview) > 0)
                                        {
                                            for ($x = 0; $x <= 3; $x++ ) 
                                            {
                                                $items = mysqli_fetch_array($businessreview);    
                                                $businessids = $items['businessid'];
                                                if(!$items['averagerating'])
                                                {
                                                    echo "<p class='text-center'>No Business With Rating Found</p>";
                                                    ?>
                                                    <br><a class="text-center text-black fw-bold " style="margin-bottom:76px;" href="index.php">Go Back</a>
                                                    <?php
                                                }else
                                                {
                                    ?>
                                        <div class="col-md-3">
                                            <div class="project-card-no-image"  style="background: white;height: 50%;"><img class="rounded img-fluid" href="businessview.php?id=<?= $items ['businessid']?>" src="uploads/<?= $items ['image']?>">
                                                <h3 style="font-family: Acme, sans-serif;font-weight: bold;" href="businessview.php?id=<?= $items ['businessid']?>"><?= $items ['business_name']?></h3>
                                                <span>
                                                    <?php
                                                    if(!$items ['averagerating'])
                                                    {
                                                        echo '<span> No Rating </span>';
                                                    }
                                                    else if($items ['averagerating'] == 5.0)
                                                    {
                                                        echo '<i class ="fas fa-star "></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="fas fa-star"></i>';
                                                    }
                                                    else if($items ['averagerating'] >= 4.1)
                                                    {
                                                        echo '<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i>';
                                                    }
                                                    else if($items ['averagerating'] == 4.0)
                                                    {
                                                        echo '<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="far fa-star"></i>';
                                                    }
                                                    else if($items ['averagerating'] >= 3.1)
                                                    {
                                                        echo '<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i><i class="far fa-star"></i>';
                                                    }
                                                    else if($items ['averagerating'] == 3.0)
                                                    {
                                                        echo '<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></i>';
                                                    }
                                                    else if($items ['averagerating'] >= 2.1)
                                                    {
                                                        echo '<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
                                                    }
                                                    else if($items ['averagerating'] == 2.0)
                                                    {
                                                        echo '<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></i>';
                                                    }
                                                    else if($items ['averagerating'] >= 1.1)
                                                    {
                                                        echo '<i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
                                                    }
                                                    else if($items ['averagerating'] == 1.0)
                                                    {
                                                        echo '<i class ="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></i>';
                                                    }
                                                    else
                                                    {
                                                        echo 'something went wrong';
                                                    }
                                                    $query_rating_count = "SELECT review_id FROM review_table WHERE businessid = $businessids ORDER BY review_id";
                                                    $query_rating_count_run = mysqli_query($con, $query_rating_count);
                                                    $row_rating_count = mysqli_num_rows($query_rating_count_run);
                                                    echo '<span> ('.$row_rating_count.')</span>'
                                                    ?>
                                            </span>
                                            <p class="text-muted">Opening: <?= date("g:i a", strtotime($items ['opening'])); ?> - Closing: <?= date("g:i a", strtotime($items ['closing'])); ?></p>
                                            </div>
                                        </div>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                                    for ($x = 0; $x <= 3; $x++ ) 
                                        {
                                            if(!$items['averagerating'])
                                            {
                                                echo "<p class='text-center'>No Business With Rating Found</p>";
                                                ?>
                                                <br><a class="text-center text-black fw-bold " style="margin-bottom:76px;" href="index.php">Go Back</a>
                                                <?php
                                            }else
                                            {
                                        ?>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="project-card-no-image" style="background: white;height: 50%;"><img class="rounded img-fluid" src="uploads/<?= $items['image']?>">
                                                <h3 style="font-family: Acme, sans-serif;font-weight: bold;"><?= $items ['business_name']?></h3>
                                                <span>
                                                    <?php
                                                    if(!$items ['averagerating'])
                                                    {
                                                        echo '<span> No Rating </span>';
                                                    }
                                                    else if($items ['averagerating'] == 5.0)
                                                    {
                                                        echo '<i class ="fas fa-star "></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="fas fa-star"></i>';
                                                    }
                                                    else if($items ['averagerating'] >= 4.1)
                                                    {
                                                        echo '<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i>';
                                                    }
                                                    else if($items ['averagerating'] == 4.0)
                                                    {
                                                        echo '<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="far fa-star"></i>';
                                                    }
                                                    else if($items ['averagerating'] >= 3.1)
                                                    {
                                                        echo '<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i><i class="far fa-star"></i>';
                                                    }
                                                    else if($items ['averagerating'] == 3.0)
                                                    {
                                                        echo '<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></i>';
                                                    }
                                                    else if($items ['averagerating'] >= 2.1)
                                                    {
                                                        echo '<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
                                                    }
                                                    else if($items ['averagerating'] == 2.0)
                                                    {
                                                        echo '<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></i>';
                                                    }
                                                    else if($items ['averagerating'] >= 1.1)
                                                    {
                                                        echo '<i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>';
                                                    }
                                                    else if($items ['averagerating'] == 1.0)
                                                    {
                                                        echo '<i class ="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></i>';
                                                    }
                                                    else
                                                    {
                                                        echo 'something went wrong';
                                                    }
                                                    $query_rating_count = "SELECT review_id FROM review_table WHERE businessid = $businessids ORDER BY review_id";
                                                    $query_rating_count_run = mysqli_query($con, $query_rating_count);
                                                    $row_rating_count = mysqli_num_rows($query_rating_count_run);
                                                    echo '<span> ('.$row_rating_count.')</span>'
                                                    ?>
                                            </span>
                                            <p class="text-muted">Opening: <?= date("g:i a", strtotime($items ['opening'])); ?> - Closing: <?= date("g:i a", strtotime($items ['closing'])); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <?php                      
                                            }
                                        }
                                ?>
                                <?php
                                    for ($x = 0; $x <= 3; $x++ ) 
                                        {
                                            if(!$items['averagerating'])
                                            {
                                                echo "<p class='text-center'>No Business With Rating Found</p>";
                                                ?>
                                                <br><a class="text-center text-black fw-bold " style="margin-bottom:76px;" href="index.php">Go Back</a>
                                                <?php
                                            }else
                                            {
                                        ?>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="project-card-no-image" style="background: white;height: 50%;"><img class="rounded img-fluid" src="assets/img/1654525834.png">
                                                <h3 style="font-family: Acme, sans-serif;font-weight: bold;">Ichiraku</h3><span><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star-half text-warning"></i>(5)</span>
                                                <p class="text-muted">pasta, buffalo wings, salad</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="project-card-no-image" style="background: white;height: 50%;"><img class="rounded img-fluid" src="assets/img/1655660851.jpg">
                                                <h3 style="font-family: Acme, sans-serif;font-weight: bold;">The Food Project</h3><span><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star-half text-warning"></i>(5)</span>
                                                <p class="text-muted">pasta, buffalo wings, salad</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="project-card-no-image" style="background: white;height: 50%;"><img class="rounded img-fluid" src="assets/img/1655663226.jpg">
                                                <h3 style="font-family: Acme, sans-serif;font-weight: bold;">The WingHub</h3><span><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star-half text-warning"></i>(5)</span>
                                                <p class="text-muted">pasta, buffalo wings, salad</p>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="project-card-no-image" style="background: white;height: 50%;"><img class="rounded img-fluid" src="assets/img/1661483025.jpg">
                                                <h3 style="font-family: Acme, sans-serif;font-weight: bold;">Hapchan</h3><span><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star text-warning"></i><i class="fas fa-star-half text-warning"></i>(5)</span>
                                                <p class="text-muted">pasta, buffalo wings, salad</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php                      
                                            }
                                        }
                                ?>
                                <?php
                                            
                                    }
                                    else
                                    {
                                        echo "<p class='text-center'>No Business With rating found</p>";
                                    ?>
                                    <br><a class="text-center text-black fw-bold " style="margin-bottom:76px;" href="index.php">Go Back</a>
                                    <?php
                                    }
                                ?>
                            </div>
                            <div>
                                <!-- Start: Previous --><a class="carousel-control-prev" href="#carousel-1" role="button" data-bs-slide="prev"><span class="carousel-control-prev-icon text-bg-dark"></span><span class="visually-hidden">Previous</span></a><!-- End: Previous -->
                                <!-- Start: Next --><a class="carousel-control-next" href="#carousel-1" role="button" data-bs-slide="next"><span class="carousel-control-next-icon text-bg-dark"></span><span class="visually-hidden">Next</span></a><!-- End: Next -->
                            </div>
                            <ol class="carousel-indicators">
                                <li data-bs-target="#carousel-1" data-bs-slide-to="0" class="active"></li>
                                <li data-bs-target="#carousel-1" data-bs-slide-to="1"></li>
                                <li data-bs-target="#carousel-1" data-bs-slide-to="2"></li>
                            </ol>
                        </div>-->
                        <div class="heading mt-5">
                            <h2 class='text-center'>All Restaurants in <?= $data['municipality_name']; ?></h2>
                        </div>
                        <div class="container justify-content-center d-flex">
                    <div class="row">
                        <?php
                            if(mysqli_num_rows($business) > 0)
                            {
                            foreach($business as $item)
                            {
                                $businessid = $item['businessid'];
                        ?>
                        <div class="col-md-3 mb-5">
                            <div class="project-card-no-image">
                                <a href="businessview.php?id=<?=$item['businessid'];?>">
                                    <img class="img-fluid" src="uploads/<?= $item['image']; ?>" alt="Card Image"></a>
                                        <h3><?= $item['business_name']; ?></h3>
                                        <?php
                                        $query_rating = "SELECT ROUND(AVG(user_rating),1) AS averagerating FROM review_table WHERE businessid = $businessid ORDER BY review_id";
                                        $query_rating_run = mysqli_query($con, $query_rating);
                                        $row_rating = mysqli_fetch_assoc($query_rating_run);
                                        if(!$row_rating['averagerating'])
                                        {
                                            echo '<span> No Rating </span>';
                                        }
                                        else if($row_rating['averagerating'] == 5.0)
                                        {
                                            echo '<i class ="fas fa-star "></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="fas fa-star"></i>';
                                        }
                                        else if($row_rating['averagerating'] >= 4.1)
                                        {
                                            echo '<span style="color:orange;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i></span>';
                                        }
                                        else if($row_rating['averagerating'] == 4.0)
                                        {
                                            echo '<span style="color:orange;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="far fa-star"></i></span>';
                                        }
                                        else if($row_rating['averagerating'] >= 3.1)
                                        {
                                            echo '<span style="color:orange;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i><i class="far fa-star"></i></span>';
                                        }
                                        else if($row_rating['averagerating'] == 3.0)
                                        {
                                            echo '<span style="color:orange;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></i></span>';
                                        }
                                        else if($row_rating['averagerating'] >= 2.1)
                                        {
                                            echo '<span style="color:orange;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i></span>';
                                        }
                                        else if($row_rating['averagerating'] == 2.0)
                                        {
                                            echo '<span style="color:orange;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></i></span>';
                                        }
                                        else if($row_rating['averagerating'] >= 1.1)
                                        {
                                            echo '<span style="color:orange;"<i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></span>';
                                        }
                                        else if($row_rating['averagerating'] == 1.0)
                                        {
                                            echo '<span style="color:orange;"<i class ="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></i></span>';
                                        }
                                        else
                                        {
                                            echo 'something went wrong';
                                        }
                                        $query_rating_count = "SELECT review_id FROM review_table WHERE businessid = $businessid ORDER BY review_id";
                                        $query_rating_count_run = mysqli_query($con, $query_rating_count);
                                        $row_rating_count = mysqli_num_rows($query_rating_count_run);
                                        echo '<span> ('.$row_rating_count.')</span>'
                                        
                                        ?><br>
                                    <p class="text-muted">Opening: <?= date("g:i a", strtotime($item['opening'])); ?> - Closing: <?= date("g:i a", strtotime($item['closing'])); ?></p>
                                <button class="btn btn-outline-primary btn-sm view" type="button"onclick="location='businessview.php?id=<?= $item['businessid']; ?>'" >View Details</button>   
                            </div>
                        </div>
                        <?php
                        }
                            }
                            else
                            {
                                echo "<p class='text-center'>No Business Found</p>";
                            ?>
                            <br><a class="text-center text-black fw-bold " style="margin-bottom:76px;" href="index.php">Go Back</a>
                            <?php
                            }
                        ?>
                    </div>   
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
    <script src="assets/js/theme.js"></script>
</body>
    <?php
        } 
        else
        {
            echo "Something Went Wrong";
            ?>
            <br><a href="Index.php" style="margin-bottom:76px;">Go Back</a>
            <?php
        }
    }
    else
    {
        echo "Something Went Wrong";
        ?>
        <br><a href="Index.php"style="margin-bottom:76px;">Go Back</a>
        <?php
    }

include('includes/footer.php');?>
