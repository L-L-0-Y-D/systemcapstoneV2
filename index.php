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
                    <?php
                        $query_search = "SELECT business_name
                        FROM business 
                        ORDER BY business_name ASC";
                        $result = $con->query($query_search);
                        $data = array();
                        foreach($result as $row)
                        {
                            $data[] = array(
                                'label' => $row['business_name'],
                                'value' => $row['business_name'],
                            ); 
                           
                            
                        }
                    ?>
                    <form action="search.php" method="POST">
                        <input class="form-control-lg " type="text" name="search" id="search" autocomplete="off" style="width:30%;font-size:13px;border-radius: 20px;border: 1px solid;  font-family:Monsterrat;" placeholder="Search Restaurants, Locations, Cuisines...">
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
                <div class="col-md-3 portfolio-item" data-bss-hover-animate="pulse" >
                    <a class="portfolio-link" href="business.php?id=<?= $item['municipalityid']; ?>">
                        <div class="portfolio-hover" style="border-radius:10px;">
                            <div class="portfolio-hover-content">
                                <h4 style="font-family: 'Vujahday Script', serif;font-size: 50px;" style="margin-left: 15px;padding-bottom: 5px;"><?= $item['municipality_name']; ?></h4>
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
                        <iframe allowfullscreen="" frameborder="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247030.31807589118!2d120.27798958693245!3d14.664525219136474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339614e301987889%3A0x6ae0cb8f5ee13d48!2sBataan!5e0!3m2!1sen!2sph!4v1668336755052!5m2!1sen!2sph" width="100%" height="100%"></iframe>
                        </div>
                    <div class="d-none d-md-block position-absolute top-0 start-0 w-100 h-100">
                        <iframe allowfullscreen="" frameborder="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d247030.31807589118!2d120.27798958693245!3d14.664525219136474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x339614e301987889%3A0x6ae0cb8f5ee13d48!2sBataan!5e0!3m2!1sen!2sph!4v1668336755052!5m2!1sen!2sph" width="100%" height="100%"></iframe>
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
 
<?php include('includes/footer.php');?>
