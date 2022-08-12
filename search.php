<?php

    include('functions/userfunctions.php');
    include('includes/header.php'); 

    
?>
<section class="portfolio-block projects-cards" style="padding-top: 40px;">
    <div class="container">
                <div class="heading">
                    <h2 style="margin-bottom: 20px;font-size: 50px;font-weight: bold;font-family: Acme, sans-serif;text-align: center;">Search Result</h2>
                </div><hr>
                    <div class="row">
                                    <?php
                                        /* A PDO connection to the database. */
                                        $con = new PDO("mysql:host=localhost;dbname=thesis",'root','');
                                        $con->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    
                                        /* This is the code that is responsible for the search for business
                                        function. */
                                        if (isset($_POST["submit"]))
                                        {
                                            $key = $_POST["search"];
                                            $query = $con->prepare("SELECT * FROM business WHERE business_name LIKE :keyword AND status= '1' ORDER BY business_name ");
                                            $query->bindValue(':keyword' ,'%'.$key.'%', PDO::PARAM_STR);
                                            $query->execute();
                                            $results = $query->fetchAll();
                                            $row = $query->rowCount();

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
                                            
                                            ?>
                                            
                                            <?php
                                        }
                                        ?>
                                    <?php
                                    /* This is the code that is responsible for the search for mealcategory
                                        function. */
                                        if (isset($_POST["submit"]))
                                        {
                                            $key = $_POST["search"];
                                            $query = $con->prepare("SELECT * FROM business WHERE cuisinename LIKE :keyword AND status= '1' ORDER BY cuisinename ");
                                            $query->bindValue(':keyword' ,'%'.$key.'%', PDO::PARAM_STR);
                                            $query->execute();
                                            $results = $query->fetchAll();
                                            $row = $query->rowCount();

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
                                            
                                            ?>
                                            
                                            <?php
                                        }
                                    ?>
                                    <?php
                                    /* This is the code that is responsible for the search fo municipality
                                        function. */
                                        if (isset($_POST["submit"]))
                                        {
                                            $key = $_POST["search"];
                                            $query = $con->prepare("SELECT business.businessid,business.business_name,business.business_address,business.opening,business.closing,business.municipalityid,municipality.municipality_name,business.cuisinename,business.image_cert,business.business_firstname,business.business_lastname,business.business_phonenumber,business.business_owneraddress,business.business_email,business.business_password,business.image,business.role_as,business.status,business.created_at FROM business JOIN municipality ON business.municipalityid=municipality.municipalityid AND business.status = '1' WHERE municipality_name LIKE :keyword ORDER BY municipality_name");
                                            $query->bindValue(':keyword' ,'%'.$key.'%', PDO::PARAM_STR);
                                            $query->execute();
                                            $results = $query->fetchAll();
                                            $row = $query->rowCount();

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
                                            
                                            ?>
                                            
                                            <?php
                                        }
                                    }
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
include('includes/footer.php'); 
?>
