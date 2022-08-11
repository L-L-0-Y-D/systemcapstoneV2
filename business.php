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
<body>
    <main class="page projects-page">
        <section class="portfolio-block projects-cards" style="padding-top: 40px;">
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
                    ?>
                    <div class="col-md-6 col-lg-4">
                        <div class="card border-5"><a href="businessview.php?id=<?=$item['businessid'];?>">
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
                            echo "No Business Found";
                        ?>
                        <br><a href="index.php">Go Back</a>
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
