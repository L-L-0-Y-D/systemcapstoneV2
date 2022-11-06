<?php

    include('functions/userfunctions.php');
    include('includes/header.php');
?>
 <header class="masthead "  style="padding-top:180px;background-image:url(uploads/layout3.jpeg); background-position:top center;background-attachment:fixed; background-size:cover;">
        <div class="container">
            <div class="intro-text" style="color: var(--bs-dark);padding-top: 40px;">
                <div class="intro-lead-in">
                    <span><img src="uploads/logoT.png" style="width: 140px;"></span>
                </div>
                <div class="intro-heading text-uppercase ">
                    <span style="font-family: 'Kaushan Script', serif; font-size:55px; ">First we eat,&nbsp; i - eat.</span></div>
                    <form action="search.php" method="POST">
                        <input class="form-control-lg" type="text" name="search" style="font-size:15px;border-radius: 20px;border: 1px solid;  font-family:monospace;" placeholder="Search Restaurants,Locations,Cuisines...">
                        <button class="btn btn-primary btn-lg" type="submit" name="submit" style="background: rgb(255,128,64);border-style: none;border-radius: 50px;padding-top: 3px;padding-bottom: 3px;padding-left: 30px;padding-right: 30px;">
                        <i class="far fa-search"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </header>
<section class="bg-light" id="portfolio" style="margin-top:0px;padding-top: 50px;padding-bottom: 50px;">
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
                        <div class="portfolio-hover" style="border-radius:10px;">
                            <div class="portfolio-hover-content">
                                <h4 style="font-family: 'Vujahday Script', serif;font-size: 70px;" style="margin-left: 15px;padding-bottom: 5px;"><?= $item['municipality_name']; ?></h4>
                            </div>
                        </div>
                        <img class="img-fluid" src="uploads/<?= $item['image']; ?>" alt="Municipality Image"style="border-radius:10px;height:300px; width:400px;" >
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
    <section id="contact" >
        <div class="container">
            <div>
                <section class="position-relative py-5">
                    <div class="d-md-none">
                        <iframe allowfullscreen="" frameborder="0" src="https://cdn.bootstrapstudio.io/placeholders/map.html" width="100%" height="100%"></iframe>
                        </div>
                    <div class="d-none d-md-block position-absolute top-0 start-0 w-100 h-100">
                        <iframe allowfullscreen="" frameborder="0" src="https://cdn.bootstrapstudio.io/placeholders/map.html" width="100%" height="100%"></iframe>
                        </div>
                    <div class="position-relative mx-2 my-5 m-md-5">
                        <div class="container position-relative">
                            <div class="row">
                                <div class="col-md-6 col-xl-5 col-xxl-4 offset-md-6 offset-xl-7 offset-xxl-8">
                                    <div>
                                        <form class="border rounded shadow p-3 p-md-4 p-lg-5" method="post" style="background: var(--bs-body-bg);">
                                            <p class="fw-bold">Want to be part of I - Eat ?</p>
                                            <h2>SERVE WITH US</h2>
                                            <p>Do you want your business listed on&nbsp I -Eat ? You can register your business for listing.<br></p>
                                            <!--<div class="row socials mb-2">
                                                <div class="col-xxl-12">
                                                    <div class="bs-icon-md bs-icon-circle bs-icon-primary-light d-inline-flex flex-shrink-0 justify-content-center align-items-center order-last ms-4 d-inline-block bs-icon xl"><i class="fab fa-google"></i></div>
                                                    <p class="float-end socialmed"><a href="mailto:ieatwebsite@gmail.com">ieatwebsite@gmail.com</a><br></p>
                                                </div>
                                            </div>
                                            <div class="row socials mb-2">
                                                <div class="col-xxl-12">
                                                    <div class="bs-icon-md bs-icon-circle bs-icon-primary-light d-inline-flex flex-shrink-0 justify-content-center align-items-center order-last ms-4 d-inline-block bs-icon xl"><i class="fas fa-phone-alt"></i></div>
                                                    <p class="float-end socialmed">+63-912-3456-789<br></p>
                                                </div>
                                            </div>
                                            <p class="or">or</p>-->
                                            <div class="mb-2"><button class="btn btn-primary d-block register" name="businessregbtn" onclick="location.href='businessreg.php'" type="button">REGISTER NOW !</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
    <section id="about" style="margin-top:100px;padding-top: 0px;">
        <section class="py-4 py-xl-5" style="background: url(uploads/forabout2.png)center;height:300px; background-size:contain;">
            <div class="container">
                <div class="text-center p-lg-5">
                    <h1 class="text-uppercase section-heading fw-bold mb-0" style="font-size:60px;margin-top: 20px;">ABOUT&nbsp; &nbsp;| &nbsp; &nbsp; I - EAT</h1>
                </div>
            </div>
        </section>  
        <p class="fs-5 mt-2" style="font-family:Acme;margin-left:100px;margin-right:100px;">I-Eat: established in 2022, an online international cuisine management system. I-Eat aims to improve the management of the growing community of food industry within Bataan. The system is designed intending to manage customer information, to provide an efficient, contactless, and a more accurate business process. It is capable of locating specialty restaurants and displaying various menus from specialty restaurants.</p>      
    </section>
    <section class="bg-light" id="team">
        <!-- Start: 1 Row 4 Columns -->
        <div class="container w-80">
            <div class="col-lg-12 text-center pt-0">
                <h2 class="text-uppercase section-heading">TEAM</h2>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="team-member"><img class="rounded-circle img-fluid mx-auto" src="uploads/lloyd.jpg">
                        <h4 style="font-family: 'Kaushan Script', serif;color: white;font-size: 30px;">John Lloyd Agorita</h4>
                        <p class="text-muted">Back-End Developer</p>
                        <ul class="list-inline social-buttons">
                            <li class="list-inline-item"><a href="https://www.instagram.com/l_l_o_y_d_y_y/"><i class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.facebook.com/johnlloydyulipagorita"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="mailto:johnlloyd.professional@gmail.com"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="team-member"><img class="rounded-circle img-fluid mx-auto" src="uploads/melodee.jpg">
                        <h4 style="font-family: 'Kaushan Script', serif;color: white;font-size: 30px;">Melodee Bantog</h4>
                        <p class="text-muted">Front-End Developer</p>
                        <ul class="list-inline social-buttons">
                            <li class="list-inline-item"><a href="https://www.instagram.com/mldbntg"><i class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.facebook.com/MelodeeNunez"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="mailto:bantogmelodee02212000@gmail.com"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="team-member"><img class="rounded-circle img-fluid mx-auto" src="uploads/kimberly.jpg">
                        <h4 style="font-family: 'Kaushan Script', serif;color: white;font-size: 30px;">Kimberly Escober</h4>
                        <p class="text-muted">Documenter</p>
                        <ul class="list-inline social-buttons">
                            <li class="list-inline-item"><a href="https://www.instagram.com/yesno.elle"><i class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.facebook.com/elyescober"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="mailto:escoberkimberly@gmail.com"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="team-member"><img class="rounded-circle img-fluid mx-auto" src="uploads/karen.jpg">
                        <h4 style="font-family: 'Kaushan Script', serif;color: white;font-size: 30px;">Karen Guinto</h4>
                        <p class="text-muted">Documenter</p>
                        <ul class="list-inline social-buttons">
                            <li class="list-inline-item"><a href="https://www.instagram.com/_krnaqn/"><i class="fa fa-instagram"></i></a></li>
                            <li class="list-inline-item"><a href="https://www.facebook.com/KRNAQN"><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href="mailto:karenguinto9@gmail.com"><i class="fa fa-envelope"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- End: 1 Row 4 Columns -->
    </section>
<?php include('includes/footer.php');?>
