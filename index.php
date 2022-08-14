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
                                <h4 style="font-family: 'Vujahday Script', serif;font-size: 70px;" style="margin-left: 15px;padding-bottom: 5px;"><?= $item['municipality_name']; ?></h4>
                            </div>
                        </div>
                        <img class="img-fluid" src="uploads/<?= $item['image']; ?>" alt="Municipality Image"style="height:300px; width:400px;" >
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
    <hr >
    <section id="about" style="padding-top: 0px;">
        <section class="py-4 py-xl-5" style="background: url(uploads/bg.png)left;height: 300px;">
            <div class="container">
                <div class="text-center p-4 p-lg-5">
                    <h1 class="text-uppercase section-heading fw-bold mb-4" style="font-size:50px;margin-top: 40px;">ABOUT&nbsp; &nbsp;|&nbsp; &nbsp; I - EAT</h1>
                </div>
            </div>
        </section><hr>
        <p style="margin-left:100px;margin-right:100px;text-indent:50px;font-size: 18px;">I-Eat: established in 2022, an online international cuisine management system. I-Eat aims to improve the management of the growing community of food industry within Bataan. The system is designed intending to manage customer information, to provide an efficient, contactless, and a more accurate business process. It is capable of locating specialty restaurants and displaying various menus from specialty restaurants.</p>
    </section>
    <section id="contact" class="py-5 mt-0" style="background: var(--bs-gray-300);">
        <div class="container py-5">
            <div class="row g-0 row-cols-1 row-cols-md-2 row-cols-xl-3 d-flex align-items-md-center align-items-xl-center">
                <div class="col offset-xl-2 mb-4">
                    <div class="card bg-light border-light">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p style="margin-bottom:0px;font-family: Montserrat, sans-serif;font-weight: bold;">Want to be part of I - Eat ?</p>
                                    <h3 class="fw-bold mb-0" style="font-size: 50px;font-family: 'Kaushan Script', serif;text-align: left;">CONTACT US</h3>
                                </div>
                            </div>
                            <div>
                                <ul class="list-unstyled">
                                    <li class="d-flex mb-2" style="margin-top: 11px;">
                                        <span style="font-family: Montserrat, sans-serif;">Do you want your business listed on&nbsp; I -Eat ? You can register your business for listing and we will contact you.<br><br></span>
                                    </li>
                                </ul>
                            </div>
                            <button class="btn btn-primary d-block w-100" name="businessregbtn" onclick="location.href='businessreg.php'" type="button" style="background: rgb(255,128,64);border-style: none;border-right-style: none;">REGISTER NOW !</button>
                        </div>
                    </div>
                </div>
                <div class="col mb-4" style="background: transparent;"><img src="uploads/bg.png" style="height: 500px;width: 370px;border-radius: 10px;"></div>
            </div>
        </div>
    </section>
<?php include('includes/footer.php');?>
