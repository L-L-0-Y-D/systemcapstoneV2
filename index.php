<?php

    include('functions/userfunctions.php');
    include('includes/header.php');
?>
<head>
    <link rel="stylesheet" href="assets/css/Alfa%20Slab%20One.css">
    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css">
    <link rel="stylesheet" href="assets/css/Vujahday%20Script.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/untitled-1.css">
    <link rel="stylesheet" href="assets/css/untitled-2.css">
    <link rel="stylesheet" href="assets/css/untitled-3.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>
<section class="bg-light" id="portfolio" style="padding-top: 50px;padding-bottom: 50px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase text-start section-heading fw-bold">EXPLORE BATAAN !</h2>
                    <h3 class="text-muted section-subheading" style="text-align: left;margin-bottom: 35px;">Locate where your favorite spot is&nbsp;</h3>
                </div>
            </div>
            <div class="row">
            <?php
                    $municipality = getAllActive("municipality");

                    if(mysqli_num_rows($municipality) > 0)
                    {
                        foreach($municipality as $item)
                        {
                            ?>
                <div class="col-sm-6 col-md-4 portfolio-item" data-bss-hover-animate="pulse" >
                    <a class="portfolio-link" href="business.php?id=<?= $item['municipalityid']; ?>">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <h4 style="font-family: 'Vujahday Script', serif;font-size: 45px;" style="margin-left: 15px;padding-bottom: 5px;"><?= $item['municipality_name']; ?></h4>
                            </div>
                        </div>
                        <img class="img-fluid" src="uploads/<?= $item['image']; ?>" alt="Municipality Image"style="height:300px; width:360px;" >
                    </a>
                </div>
                <?php
                        }
                    }
                    else
                    {
                        echo "No Category Availables";
                    }
                ?>
            </div>
        </div>
    </section>
<?php include('includes/footer.php');?>
