<?php

    include('functions/userfunctions.php');
    include('includes/header.php');
?>
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
    <hr>
    <section id="about" style="padding-top: 0px;">
        <!-- Start: Banner-->
        <section class="py-4 py-xl-5" style="background: url(uploads/bg.png)left;height: 300px;">
            <div class="container">
                <div class="text-center p-4 p-lg-5">
                    <h1 class="fw-bold mb-4" style="font-family: 'Alfa Slab One', serif;font-size: 38.88px;margin-top: 50px;">ABOUT&nbsp; &nbsp;|&nbsp; &nbsp; I - EAT</h1>
                </div>
            </div>
        </section><!-- End: Banner --><hr>
        <p style="margin-left:100px;margin-right:100px;text-indent:50px;font-size: 18px;">I-Eat: established in 2022, an online international cuisine management system. I-Eat aims to improve the management of the growing community of food industry within Bataan. The system is designed intending to manage customer information, to provide an efficient, contactless, and a more accurate business process. It is capable of locating specialty restaurants and displaying various menus from specialty restaurants.</p>
    </section>
<?php include('includes/footer.php');?>
