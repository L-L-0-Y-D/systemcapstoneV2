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
                                    
                                        /* This is the code that is responsible for the search
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
                                    <div class="col-12 col-md-6 mb-3 ml-2 col-lg-4" style="border:1px solid black; width: 260px;">
                                        <div class="clean-product-item">
                                        <a href="businessview.php?id=<?=$item['businessid'];?>">
                                            <div class="image"><img class="img-fluid d-block mx-auto " src="uploads/<?= $item['image']; ?>" style="height:180px; width: 200px;"></div>
                                            <div class="product-name" style="margin-bottom: 0px;"><a class="d-flex" href="#"><strong><?= $item['business_name']; ?></strong></a></div><small>Located at <?= $item['business_address']; ?></small>
                                            <div class="about">
                                                <div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>
                                                <div class="price"></div>
                                            </div>
                                        </a>
                                            <button href="" onclick="location='reservation.php?id=<?= $item['businessid']; ?>'" class="btn btn-primary text-center float-end" type="button" style="height: 29px;padding-top: 3px;background: var(--bs-orange);border: 1px solid var(--bs-orange);border-radius: 10px;margin-left: 0px;font-size: 14px;width: 152.328px;text-align: left;margin-bottom: 13px;">Make Reservation</button>
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



include('includes/footer.php'); ?>
