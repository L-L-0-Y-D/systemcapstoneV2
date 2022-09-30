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
        <section class="portfolio-block projects-cards" style="padding-top: 140px;">
            <div class="container">
                <div class="heading">
                    <h2 style="margin-bottom: 20px;font-size: 60px;font-weight: bold;font-family: Acme, sans-serif;text-align: center;">Restaurants in <?= $data['municipality_name']; ?></h2>
                </div>
                <div class="row">
                    <?php
                        if(mysqli_num_rows($business) > 0)
                        {
                        foreach($business as $item)
                        {
                            $businessid = $item['businessid'];
                    ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card" style="border-style:none;box-shadow: 0px 0px 5px var(--bs-dark);border-radius: 30px;">
                        <a href="businessview.php?id=<?=$item['businessid'];?>">
                            <img class="card-img-top scale-on-hover" height="200px;" src="uploads/<?= $item['image']; ?>" alt="Card Image" style="border-radius: 30px;"></a>
                            <div class="card-body" style=" height: 250px;padding-top: 10px;">
                                <p class="text-center" style="font-family: Acme, sans-serif;font-weight: bold;font-size: 20px;"><?= $item['business_name']; ?></p>
                                <p class="text-muted card-text" style="margin-bottom: 0px;text-align: left;">Located at <?= $item['business_address']; ?></p>
                                <p class="text-muted card-text" style="margin-bottom: 0px;text-align: left;">Opening: <?= date("g:i a", strtotime($item['opening'])); ?> - Closing: <?= date("g:i a", strtotime($item['closing'])); ?></p>
                                <p class="text-muted card-text" style="text-align: left; margin-bottom:0px;"><?= $item['cuisinename']; ?> Cuisine</p>
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
                                    echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="fas fa-star"></i></span>';
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
                                
                                ?>
                                <button onclick="location='reservation.php?id=<?= $item['businessid']; ?>'" class="btn btn-primary text-center justify-content-end" type="button" style=" position: absolute; bottom: 0; height: 29px;background: RGB(255,128,64);border: none;border-radius: 20px;font-size: 14px;width: 152.328px; margin-bottom:20px;">Make Reservation</button>
                            </div>
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
