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
    <div class="container"><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <h1 style="text-align: center;width: auto;font-size: 36px;"><strong>Restaurants in <?= $data['municipality_name']; ?></strong></h1>
        <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav ms-auto"></ul>
        </div>
    </div>
    <main class="page catalog-page">
        <section class="clean-block clean-catalog dark">
            <div class="container align-content-center justify-content-xl-center">
                <div class="justify-content-center content">
                    <div class="row d-flex justify-content-center align-items-lg-center" >
                        <div class="col-md-9 d-flex justify-content-center" style="width: 100%;">
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
                                    <!--<div class="filter-item">
                                        <h3>Brands</h3>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-5">Samsung</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" for="formCheck-6">Apple</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-7"><label class="form-check-label" for="formCheck-7">HTC</label></div>
                                    </div>
                                    <div class="filter-item">
                                        <h3>OS</h3>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-8"><label class="form-check-label" for="formCheck-8">Android</label></div>
                                        <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-9"><label class="form-check-label" for="formCheck-9">iOS</label></div>
                                    </div> -->
                                </div>
                            </div>
                            <div class="d-md-none "><a class="btn btn-link d-md-none filter-collapse" data-bs-toggle="collapse" aria-expanded="false" aria-controls="filters" href="#filters" role="button">Filters<i class="icon-arrow-down filter-caret"></i></a>
                                <div class="collapse" id="filters">
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
                                       <!-- <div class="filter-item">
                                            <h3>Brands</h3>
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-5"><label class="form-check-label" for="formCheck-5">Samsung</label></div>
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-6"><label class="form-check-label" for="formCheck-6">Apple</label></div>
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-7"><label class="form-check-label" for="formCheck-7">HTC</label></div>
                                        </div>
                                       < <div class="filter-item">
                                            <h3>OS</h3>
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-8"><label class="form-check-label" for="formCheck-8">Android</label></div>
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-9"><label class="form-check-label" for="formCheck-9">iOS</label></div>
                                        </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="products">
                                <div class="row g-0" style="padding: 0px;margin-left: 10px; border:none;">
                                    <?php
                                        if(mysqli_num_rows($business) > 0)
                                            {
                                                foreach($business as $item)
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
