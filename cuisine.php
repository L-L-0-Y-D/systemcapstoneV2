<?php

    include('functions/userfunctions.php');
    include('includes/header.php'); 
    if(isset($_GET['name']))
        {
             $conn = new PDO("mysql:host=localhost;dbname=thesis",'root','');
             $conn->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $name = $_GET['name'];
             $query = $conn->prepare("SELECT * FROM business WHERE cuisinename LIKE :keyword AND status= '1'");
             $query->bindValue(':keyword' ,'%'.$name.'%', PDO::PARAM_STR);
             $query->execute();
             $results = $query->fetchAll();
             $row = $query->rowCount();

    
?>
 <section class="portfolio-block projects-cards" style="padding-top: 40px;">
    <div class="container">
                <div class="heading">
                    <h2 style="margin-bottom: 20px;font-size: 50px;font-weight: bold;font-family: Acme, sans-serif;text-align: center;">Search Result</h2>
                </div>
                    <div class="row">
                                <div class="row g-0 " style="padding-bottom: 50px;margin-left: 0px; border:none;">
                                    <?php
                                        if($row!= 0)
                                            {
                                                foreach($results as $item)
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
        echo "Something Went Wrong 1";
        ?>
        <br><a href="Index.php">Go Back</a>
        <?php
    }

include('includes/footer.php');?>