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
                </div><hr>
                    <div class="row">
                                    <?php
                                        if($row!= 0)
                                            {
                                                foreach($results as $item)
                                                {
                                                    ?>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card border-5">
                                            <a href="businessview.php?id=<?=$item['businessid'];?>">
                                                <img class="card-img-top scale-on-hover" src="uploads/<?= $item['image']; ?>" alt="Card Image"></a>
                                                <div class="card-body" style="padding-top: 10px;">
                                                    <p class="text-center" style="font-family: Acme, sans-serif;font-weight: bold;font-size: 20px;"><?= $item['business_name']; ?></p>
                                                    <p class="text-muted card-text" style="margin-bottom: 0px;text-align: left;">Located at <?= $item['business_address']; ?></p>
                                                    <p class="text-muted card-text" style="margin-bottom: 0px;text-align: left;">Opening: <?= date("g:i a", strtotime($item['opening'])); ?>- Closing: <?= date("g:i a", strtotime($item['closing'])); ?></p>
                                                    <p class="text-muted card-text" style="text-align: left;"><?= $item['cuisinename']; ?> Cuisine</p>
                                                    <button onclick="location='reservation.php?id=<?= $item['businessid']; ?>'" class="btn btn-primary text-center" type="button" style="height: 29px;padding-top: 3px;background: RGB(255,128,64);border: 1px solid var(--bs-orange);border-radius: 20px;margin-left: 0px;font-size: 14px;width: 152.328px;margin-bottom: 13px;">Make Reservation</button>
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
                                            <br><a class="text-center text-black fw-bold" href="index.php">Go Back</a>
                                            <?php
                                        }
                                        ?>
                </div>
            </div>
        </section>
    <?php
    }
    else
    {
        echo "<p class='text-center'>Something Went Wrong</p>";
        ?>
        <br><a class="text-center text-black fw-bold" href="index.php">Go Back</a>
        <?php
    }

include('includes/footer.php');?>