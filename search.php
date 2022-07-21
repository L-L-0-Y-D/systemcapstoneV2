<?php

    include('functions/userfunctions.php');
    include('includes/header.php'); 

    
?>
    <div class="container" >   
        <h1 style="text-align: center;width: auto;font-size: 30px; padding-top:10px;"><strong>Search Result</strong></h1>
        
    </div>
    <main class="page catalog-page">
        <section class="clean-block clean-catalog dark">
            <div class="container align-content-start justify-content-xl-start">
                <div class="justify-content-start content">
                    <div class="row d-flex justify-content-start align-items-lg-start" >
                        <div class="col-md-9 d-flex justify-content-start" style="width: 100%;">
                            <div class="products">
                                <div class="row g-0" style="padding: 0px;margin-left: 10px; border:none;">
                                    <?php
                                        /* A PDO connection to the database. */
                                        $con = new PDO("mysql:host=localhost;dbname=thesis",'root','');
                                        $con->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                                    
                                        /* This is the code that is responsible for the search for business
                                        function. */
                                        if (isset($_POST["submit"]))
                                        {
                                            $key = $_POST["search"];
                                            $query = $con->prepare('SELECT * FROM business WHERE business_name LIKE :keyword ORDER BY business_name');
                                            $query->bindValue(':keyword' ,'%'.$key.'%', PDO::PARAM_STR);
                                            $query->execute();
                                            $results = $query->fetchAll();
                                            $row = $query->rowCount();

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
                                                <div class="product-details m-0" style="height:75px;"><small >Located at <?= $item['business_address']; ?></small></div>
                                            <div class="about">
                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                <div class="price" ></div>
                                            </div>
                                        </a>
                                            <button href="" onclick="location='reservation.php?id=<?= $item['businessid']; ?>'" class="btn btn-primary text-center float-end" type="button" style="height: 29px;padding-top: 3px;background: var(--bs-orange);border: 1px solid var(--bs-orange);border-radius: 20px;margin-left: 0px;font-size: 14px;width: 152.328px;text-align: left;margin-bottom: 13px;">Make Reservation</button>
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
                                            $query = $con->prepare('SELECT business.businessid,business.business_name,business.business_address,business.municipalityid,business.categoryid,mealcategory.categoryname,business.image_cert,business.business_firstname,business.business_lastname,business.business_phonenumber,business.business_owneraddress,business.business_email,business.business_password,business.image,business.role_as,business.status,business.created_at FROM business JOIN mealcategory ON business.categoryid=mealcategory.categoryid WHERE categoryname LIKE :keyword ORDER BY categoryname');
                                            $query->bindValue(':keyword' ,'%'.$key.'%', PDO::PARAM_STR);
                                            $query->execute();
                                            $results = $query->fetchAll();
                                            $row = $query->rowCount();

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
                                                <div class="product-details m-0" style="height:75px;"><small >Located at <?= $item['business_address']; ?></small></div>
                                            <div class="about">
                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                <div class="price" ></div>
                                            </div>
                                        </a>
                                            <button href="" onclick="location='reservation.php?id=<?= $item['businessid']; ?>'" class="btn btn-primary text-center float-end" type="button" style="height: 29px;padding-top: 3px;background: var(--bs-orange);border: 1px solid var(--bs-orange);border-radius: 20px;margin-left: 0px;font-size: 14px;width: 152.328px;text-align: left;margin-bottom: 13px;">Make Reservation</button>
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
                                            $query = $con->prepare('SELECT business.businessid,business.business_name,business.business_address,business.municipalityid,municipality.municipality_name,business.categoryid,business.image_cert,business.business_firstname,business.business_lastname,business.business_phonenumber,business.business_owneraddress,business.business_email,business.business_password,business.image,business.role_as,business.status,business.created_at FROM business JOIN municipality ON business.municipalityid=municipality.municipalityid WHERE municipality_name LIKE :keyword ORDER BY municipality_name');
                                            $query->bindValue(':keyword' ,'%'.$key.'%', PDO::PARAM_STR);
                                            $query->execute();
                                            $results = $query->fetchAll();
                                            $row = $query->rowCount();

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
                                                <div class="product-details m-0" style="height:75px;"><small >Located at <?= $item['business_address']; ?></small></div>
                                            <div class="about">
                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                <div class="price" ></div>
                                            </div>
                                        </a>
                                            <button href="" onclick="location='reservation.php?id=<?= $item['businessid']; ?>'" class="btn btn-primary text-center float-end" type="button" style="height: 29px;padding-top: 3px;background: var(--bs-orange);border: 1px solid var(--bs-orange);border-radius: 20px;margin-left: 0px;font-size: 14px;width: 152.328px;text-align: left;margin-bottom: 13px;">Make Reservation</button>
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
include('includes/footer.php'); 
?>
