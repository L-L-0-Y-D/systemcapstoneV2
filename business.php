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
    
?>
<body>
    <main class="page projects-page">
        <section class="business">
            <div class="container">
                <div class="heading">
                    <h1>Restaurants in <?= $data['municipality_name']; ?></h1>
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
                                            echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i></span>';
                                        }
                                        else if($row_rating['averagerating'] == 4.0)
                                        {
                                            echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="far fa-star"></i></span>';
                                        }
                                        else if($row_rating['averagerating'] >= 3.1)
                                        {
                                            echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i><i class="far fa-star"></i></span>';
                                        }
                                        else if($row_rating['averagerating'] == 3.0)
                                        {
                                            echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></i></span>';
                                        }
                                        else if($row_rating['averagerating'] >= 2.1)
                                        {
                                            echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i></span>';
                                        }
                                        else if($row_rating['averagerating'] == 2.0)
                                        {
                                            echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></i></span>';
                                        }
                                        else if($row_rating['averagerating'] >= 1.1)
                                        {
                                            echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></span>';
                                        }
                                        else if($row_rating['averagerating'] == 1.0)
                                        {
                                            echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></i></span>';
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
