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
                        // $query_search = "SELECT business_name
                        // FROM business 
                        // ORDER BY business_name ASC";
                        // $result = $con->query($query_search);
                        // $data = array();
                        // if (mysqli_num_rows($result) > 0) 
                        // {
                        //     foreach ($result as $row) {
                        //         $data[] = array(
                        //             'label' => $row['business_name'],
                        //             'value' => $row['business_name'],
                        //         );


                        //     }
                        // }
                        // else
                        // {
                        //     $data = "No business found";
                        // }
                    ?>
                    <style>
                        /* ul
                        {
                            background-color:#eee;
                            cursor:pointer;
                        } 
                        li
                        {
                            padding:12px;
                        }*/
                    </style>
                    <form action="search.php" method="POST">
                        <input class="form-control-lg " type="text" name="search" id="search" autocomplete="off" style="width:30%;font-size:13px;border-radius: 20px;border: 1px solid;  font-family:Monsterrat;" placeholder="Search Restaurants, Locations, Cuisines...">
                        <button class="btn btn-primary btn-lg" type="submit" name="submit" style="background: rgb(255,128,64);border-style: none;border-radius: 50px;padding-top: 3px;padding-bottom: 3px;padding-left: 30px;padding-right: 30px;">
                        <i class="far fa-search"></i></button>
                        <div class="form-control-lg col-md-11 " id="searchlist"></div>
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
            <!--<div class="row g-2">
                <div class="col mx-auto">
                    <?php
                    $query = "SELECT * FROM mealcategory";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $item)
                        {
                    ?>

                        <a class="text-dark btn-outline-dark" href="cuisine.php?name=<?= $item['categoryname']; ?>"><?= $item['categoryname']; ?></a>

                    <?php
                        }
                    }
                    else
                    {
                        echo "No Cuisine Available";
                    }?>
                </div>
            </div>-->
            <div class="row">
            <?php
                    // $municipality = getAllActive("municipality");
                    $query_municipality = "SELECT * FROM municipality WHERE status= '1'";
                    $query_municipality_run = mysqli_query($con, $query_municipality);

                    if(mysqli_num_rows($query_municipality_run) > 0)
                    {
                        foreach($query_municipality_run as $item)
                        {
                            $municipalityid = $item['municipalityid'];
                            ?>
                <div class="col-md-3 portfolio-item position-relative" data-bss-hover-animate="pulse"  >
                    <a class="portfolio-link" href="business.php?id=<?= $item['municipalityid']; ?>">
                        <div class="portfolio-hover" style="border-radius:10px;">
                            <div class="portfolio-hover-content">
                                <h4 style="font-family: 'Vujahday Script', serif;font-size: 50px;" style="margin-left: 15px;padding-bottom: 5px;"><?= $item['municipality_name']; ?></h4>
                            </div>
                        </div>
                        <img class="img-fluid" src="uploads/<?= $item['image']; ?>" alt="Municipality Image"style="border-radius:10px;height:300px; width:400px;" >
                        <span class="description">
                            <span class="description-heading fs-2 mb-2"><?= $item['municipality_name']; ?>
                                <i class="fas fa-chevron-circle-right fs-4"></i>
                            </span>
                                <?php
                                    $query_business = "SELECT COUNT(*) as total_restaurant FROM business WHERE municipalityid= $municipalityid";
                                    $query_business_run = mysqli_query($con, $query_business);
                                    $business_count = mysqli_fetch_array($query_business_run);
                                    $total_records = $business_count['total_restaurant'];
                                ?>
                            <span class="description-body"><?= $total_records; ?> Restaurants</span>
                        </span>
                    </a>
                </div>
                <?php
                        }
                    }
                    else
                    {
                        echo "No Municipality Availables";
                    }
                ?>
            </div>
        </div>
    </section> 
    <section id="contact" >
        <div class="container">
            <div>
                <section class="position-relative py-5">
                    <div class="d-none d-md-block position-absolute top-0 start-0 w-100 h-100">
                        <div id="map" style=" height: 550px;"></div>
                        <script type="text/javascript" src="mapalllocations.js"></script>
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
