<?php

    include('functions/userfunctions.php');
    include('includes/header.php'); 
    if(isset($_GET['name']))
        {
            $name = $_GET['name'];
            $municipality = getByIDActive("business",$name,"cuisinename");

                if(mysqli_num_rows($municipality) > 0)
                    {
                        $data = mysqli_fetch_array($municipality);
                        $mid = $data['cuisinename'];
                        $business = getNameActive("business", $mid, "cuisinename");
    
?>
    <div class="container" >   
        <h1 style="text-align: center;width: auto;font-size: 30px; padding-top:20px;"><strong>Restaurants in <?= $data['cuisinename']; ?></strong></h1>    
        <hr>
    </div>
    <main class="page catalog-page">
        <section class="portfolio-block project-with-sidebar">
            <div class="container ">
                <div class=" content">
                    <div class="row" >
                        <div class="col-md-9 d-flex " style="width: 100%;">
                            <div class="products">
                                <div class="row g-0 " style="padding-bottom: 50px;margin-left: 0px; border:none;">
                                    <?php
                                        if(mysqli_num_rows($query_run ) > 0)
                                            {
                                                foreach($query_run  as $item)
                                                {
                                                    ?>
                                    <div class="col-12 col-md-6 mb-2 ml-2 col-lg-4" style="border:1px solid black; width: 250px;">
                                        <div class="clean-product-item">
                                        <a href="businessview.php?id=<?=$item['businessid'];?>">
                                            <div class="image"><img class="img-fluid d-block mx-auto " src="uploads/<?= $item['image']; ?>" style="height:140px; width: 200px;"></div>
                                            <div class="product-name mb-0">
                                                <a class="d-flex" href="#"><strong><?= $item['business_name']; ?></strong></a></div>
                                                <div class="product-details m-0"><small style="font-size:12px;">Located at <?= $item['business_address']; ?></small></div>
                                                <div class="product-details m-0"><small style="font-size:12px;"><?= $item['cuisinename']; ?></small></div>
                                                <div class="product-details m-0"><small style="font-size:12px;">Opening: <?= date("g:i a", strtotime($item['opening'])); ?>- Closing: <?= date("g:i a", strtotime($item['closing'])); ?></small></div>
                                            <div class="about">
                                                <!--<div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>-->
                                               
                                            </div>
                                        </a>
                                            <button href="" onclick="location='reservation.php?id=<?= $item['businessid']; ?>'" class="btn btn-primary text-center float-end" type="button" style="height: 29px;padding-top: 3px;background: RGB(255,128,64);border: 1px solid var(--bs-orange);border-radius: 20px;margin-left: 0px;font-size: 14px;width: 152.328px;text-align: left;margin-bottom: 13px;">Make Reservation</button>
                                        </div>
                                    </div>
                                    <?php
                                                }
                                            }
                                        else
                                        {
                                            echo "No Business Found";
                                            ?>
                                            <br><a href="index.php">Go Back</a>
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
    <?php
        } 
        else
        {
            echo "Something Went Wrong";
            ?>
            <br><a href="Index.php">Go Back</a>
            <?php
        }
    }
    else
    {
        echo "Something Went Wrong 1";
        ?>
        <br><a href="Index.php">Go Back</a>
        <?php
    }

include('includes/footer.php');?>