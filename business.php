<?php

    include('functions/userfunctions.php');
    include('includes/header.php'); 
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
    <div class="container" >   
        <h1 style="text-align: center;width: auto;font-size: 30px; padding-top:20px;"><strong>Restaurants in <?= $data['municipality_name']; ?></strong></h1>   
        <hr>
    </div>
    <main class="page catalog-page">
        <section class="portfolio-block project-with-sidebar">
            <div class="container ">
                <div class=" content">
                    <div class="row" >
                        <div class="col-md-9 d-flex " style="width: 100%;">
                        <div class="col-md-3 ">
                            <div class="d-none d-md-block ">
                                <div class="filters">
                                    <div class="filter-item">
                                    <h3>Cuisines</h3>
                                            <?php
                                            $cuisine = getAll("mealcategory");
                                            if(mysqli_num_rows($cuisine) > 0)
                                            {
                                                foreach ($cuisine as $item)
                                                {
                                                    ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" id="formCheck-1" name="cuisine[]" value="<?= $item['categoryid']?>">
                                                        <?= $item['categoryname']; ?>
                                                    </div>

                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "No Cuisine Available";
                                            }?>

                                        </div>
                                </div>
                            </div>
                            <div class="d-md-none "><a class="btn btn-link d-md-none filter-collapse m-0 text-black fw-bold fs-6" data-bs-toggle="collapse" aria-expanded="false" aria-controls="filters" href="#filters" role="button">Filters<i class="icon-arrow-down filter-caret"></i></a>
                                <div class="collapse m-0" id="filters">
                                    <div class="filters">
                                        <div class="filter-item" >
                                            <h5 style="padding:0px;">Cuisines</h5>
                                            <?php
                                            $cuisine = getAll("mealcategory");
                                            if(mysqli_num_rows($cuisine) > 0)
                                            {
                                                foreach ($cuisine as $item)
                                                {
                                                    ?>
                                                    <div class="form-check" style="padding:0px;">
                                                        <input class="form-check-input" type="checkbox" id="formCheck-1" name="cuisine[]" value="<?= $item['categoryid']?>">
                                                        <?= $item['categoryname']; ?>
                                                    </div>

                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "No Cuisine Available";
                                            }?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="products">
                                <div class="row g-0 " style="padding-bottom: 50px;margin-left: 0px; border:none;">
                                    <?php
                                        if(mysqli_num_rows($business) > 0)
                                            {
                                                foreach($business as $item)
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
        echo "Something Went Wrong";
        ?>
        <br><a href="Index.php">Go Back</a>
        <?php
    }

include('includes/footer.php');?>
