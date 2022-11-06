<?php

    include('functions/userfunctions.php');
    if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $business = businessGetByIDActives($id);

                if(mysqli_num_rows($business) > 0)
                    {
                        $data = mysqli_fetch_array($business);
                        $bid = $data['businessid'];
                        $product = getProductByBusiness($bid);
                        $location = str_replace(' ', '+', $data['business_address']);
                        $latitude = $data['latitude'];
                        $longitude = $data['longitude'];
                        $opening = $data['opening'];
                        $closing = $data['closing'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/assets/css/vanilla-zoom.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Kannada&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=21f14b60305aa9b0449170550a54b7e5">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic.css?h=561e53509f5bc926993a2226fdbdf2f4">
    <link rel="stylesheet" href="assets/css/styles.css?h=d41d8cd98f00b204e9800998ecf8427e">
    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css">
    <link rel="stylesheet" href="assets/css/Acme.css">
    <link rel="stylesheet" href="assets/css/untitled-1.css">
    <link rel="stylesheet" href="assets/css/untitled-2.css">
    <link rel="stylesheet" href="assets/css/untitled-3.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
    <link rel="stylesheet" href="assets/css/Vujahday%20Script.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">    
    <title>I-Eat | Business View </title> 
    <!-- Favicon -->
    <link rel="icon" href="uploads/favicon.ico"/>
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54">
<!--START OF LOGIN-->
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top" id="mainNav" style="background: rgb(255,128,64);">
        <div class="container">

                <?php if(empty($_SESSION["auth"]))
                {// if user is not login
                ?>
                <a class="navbar-brand" href="#page-top" style="color: white;font-size: 28px;">
                    <span><img src="uploads/logoT.png" usemap=#workmap style="width: 50px;">&nbsp;</span>
                        <map name="workmap">
                            <area shape="circle" coords="100,100,300,300" alt="logo" href="index.php">
                        </map>I - Eat</a>
                    <button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav d-lg-flex ms-auto align-items-lg-center text-uppercase">
                        <li class="nav-item"><a class="nav-link" href="login.php">LOGIN</a></li>
                        <li class="nav-item"><a class="nav-link" href="register.php">SIGNUP</a></li>
                <?php 
                }
                 elseif(isset($_SESSION['auth']))
                {
                    if($_SESSION['auth_user']['role_as'] == "0")
                    {
                    ?>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle text-white fs-4" aria-expanded="false" data-bs-toggle="dropdown">
                        <img class="border rounded-circle img-profile" style="width:40px;height:40px;" src="uploads/<?= $_SESSION['auth_user']['image'];?>"></a>
                        <div class="dropdown-menu ">
                            <a class="dropdown-item" href="profile.php?id=<?= $_SESSION['auth_user']['userid'];?>"style="font-size:16px; text-align:left;"><i class="fas fa-user"></i>&nbsp;Profile</a>
                            <a class="dropdown-item" href="your_reservation.php?id=<?= $_SESSION['auth_user']['userid'];?>" style="font-size:16px;text-align:left;"><i class="far fa-calendar alt"></i>&nbsp;Reservations</a>
                            <a class="dropdown-item" href="changepassword.php?id=<?= $_SESSION['auth_user']['userid'];?>" style="font-size:16px;text-align:left;"><i class="fas fa-key"></i>&nbsp;Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php"style="font-size:16px;text-align:left;"><i class="fa fa-sign-out alt"></i>&nbsp;Logout</a>
                        </div>
                    </div>
                        <a class="navbar-brand" href="#page-top" style="color: white;font-size: 20px;">
                        &nbspWelcome <strong><?= $_SESSION['auth_user']['name'];?></strong>!</a>
                    <button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav d-lg-flex ms-auto align-items-lg-center text-uppercase">
                            <li class="nav-item"><a class="nav-link" href="index.php#page-top" active>HOME</a></li>
                            <li class="nav-item"><a class="nav-link" href="#aboutrestaurant">ABOUT</a></li>
                            <li class="nav-item"><a class="nav-link" href="#menu">MENU</a></li>
                            <li class="nav-item"><a class="nav-link" href="#review">REVIEWS</a></li>
                            <li class="nav-item"><a class="nav-link" href="#locations">LOCATION</a></li>
                            <button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" onclick="location='reservation.php?id=<?= $data['businessid']; ?>'">Make Reservation</button>                
                <?php
                }
                else if($_SESSION['auth_user']['role_as'] == "2")
                {
                    ?>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle text-white fs-4" aria-expanded="false" data-bs-toggle="dropdown">
                        <img class="border rounded-circle img-profile" style="width:40px;height:40px;" src="uploads/<?= $_SESSION['auth_user']['image'];?>"></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="business/index.php?id=<?= $_SESSION['auth_user']['businessid'];?>"style="font-size:16px; text-align:left;"><i class="fa fa-align-justify"></i>&nbsp;Dashboard</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php"style="font-size:16px;text-align:left;"><i class="far fa-sign-out alt"></i>&nbsp;Logout</a>
                        </div>
                    </div>
                        <a class="navbar-brand" href="#page-top" style="color: white;font-size: 20px;">
                        &nbspWelcome <strong><?= $_SESSION['auth_user']['business_name'];?></strong>!</a>
                    <button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav d-lg-flex ms-auto align-items-lg-center text-uppercase">
                            <li class="nav-item"><a class="nav-link" href="index.php#page-top" active>HOME</a></li>
                            <li class="nav-item"><a class="nav-link" href="#aboutrestaurant">ABOUT</a></li>
                            <li class="nav-item"><a class="nav-link" href="#menu">MENU</a></li>
                            <li class="nav-item"><a class="nav-link" href="#review">REVIEWS</a></li>
                            <li class="nav-item"><a class="nav-link" href="#locations">LOCATION</a></li>
                            <button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" onclick="location='reservation.php?id=<?= $data['businessid']; ?>'">Make Reservation</button>                 
                <?php
                }
                else
                {
                    ?>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle text-white fs-4" aria-expanded="false" data-bs-toggle="dropdown">
                        <img class="border rounded-circle img-profile" style="width:40px;height:40px;" src="uploads/<?= $_SESSION['auth_user']['image'];?>"></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="admin/index.php"style="font-size:16px; text-align:left;"><i class="fa fa-align-justify"></i>&nbsp;Dashboard</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php"style="font-size:16px;text-align:left;"><i class="far fa-sign-out alt"></i>&nbsp;Logout</a>
                        </div>
                    </div>
                        <a class="navbar-brand" href="#page-top" style="color: white;font-size: 20px;">
                        &nbspWelcome <strong><?= $_SESSION['auth_user']['name'];?></strong>!</a>
                    <button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav d-lg-flex ms-auto align-items-lg-center text-uppercase">
                            <li class="nav-item"><a class="nav-link" href="index.php#page-top" active>HOME</a></li>
                            <li class="nav-item"><a class="nav-link" href="#aboutrestaurant">ABOUT</a></li>
                            <li class="nav-item"><a class="nav-link" href="#menu">MENU</a></li>
                            <li class="nav-item"><a class="nav-link" href="#review">REVIEWS</a></li>
                            <li class="nav-item"><a class="nav-link" href="#locations">LOCATION</a></li>
                            <button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" onclick="location='reservation.php?id=<?= $data['businessid']; ?>'">Make Reservation</button>                
                <?php 
                }  
                    ?> 
                <?php 
                }
                elseif(isset($_SESSION['busi'])) 
                {
                    ?>
                    <!--if user is login-->
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle text-white fs-4" aria-expanded="false" data-bs-toggle="dropdown">
                        <img class="border rounded-circle img-profile" style="width:40px;height:40px;" src="uploads/<?= $_SESSION['auth_user']['image'];?>"></a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="business/admin.php"style="font-size:16px; text-align:left;"><i class="fa fa-align-justify"></i>&nbsp;Dashboard</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php"style="font-size:16px;text-align:left;"><i class="far fa-sign-out alt"></i>&nbsp;Logout</a>
                        </div>
                    </div>
                        <a class="navbar-brand" href="#page-top" style="color: white;font-size: 20px;">
                        &nbspWelcome <strong><?php echo $_SESSION['auth_user']['business_name']; ?></strong>!</a>
                    <button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav d-lg-flex ms-auto align-items-lg-center text-uppercase">
                            <li class="nav-item"><a class="nav-link" href="index.php#page-top" active>HOME</a></li>
                            <li class="nav-item"><a class="nav-link" href="#aboutrestaurant">ABOUT</a></li>
                            <li class="nav-item"><a class="nav-link" href="#menu">MENU</a></li>
                            <li class="nav-item"><a class="nav-link" href="#review">REVIEWS</a></li>
                            <li class="nav-item"><a class="nav-link" href="#locations">LOCATION</a></li>
                            <button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" onclick="location='reservation.php?id=<?= $data['businessid']; ?>'">Make Reservation</button>                    
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav> 
<!--END OF LOGIN-->

<!-- START OF ABOUT SECTION-->
    <div class="container" id="aboutrestaurant" style="margin-top: 130px;padding-top: 30px;padding-bottom: 0px;">
        <div class="row">
            <div class="col-md-8" style="padding-right: 0px;padding-left: 0px;">
                <div><a class="portfolio-link" href="#portfolioModal1" data-bs-toggle="modal">
                        <div class="portfolio-hover"></div>
                        <img class="img-fluid" data-bss-hover-animate="pulse" src="uploads/<?= $data['image']; ?>" style="height: 500px;width: 100%; box-shadow: 0px 0px 5px var(--bs-dark);border-radius: 10px;">
                    </a>
                </div>
            </div>
            <div class="col-md-4" style="padding-top: 90px;padding-bottom: 90px;background: var(--bs-gray-800);color: var(--bs-dark);box-shadow: 0px 0px 2px var(--bs-dark);border-style: none;">
                <h1 class="text-start" style="font-size: 60px;font-family: 'Kaushan Script', serif;color: RGB(255,128,64);padding-left: 15px;padding-right: 15px;font-weight: bold;margin-top: 8px;"><?= $data['business_name']; ?></h1>
                <p class="text-white" style="font-family: Acme, sans-serif;margin-left: 15px;margin-bottom: 0px;"><?= $data['business_address']; ?></p>
                <p class="text-white" style="font-family: Acme, sans-serif;margin-left: 15px;margin-bottom: 0px;"><?= $data['cuisinename']; ?></p>
                <p class="text-white" style="font-family: Acme, sans-serif;margin-left: 15px;margin-bottom: 0px;"><?= $data['business_phonenumber']; ?></p>
                <p class="text-white" style="font-family: Acme, sans-serif;margin-left: 15px;margin-bottom: 0px;">Open:<?=  date("g:i a", strtotime($opening));?> - Close: <?= date("g:i a", strtotime($closing)); ?></p>
                <?php
                    //$businessuser = $_SESSION['auth_user']['businessid'];
                    $businessid = $data['businessid'];
                    $query_rating = "SELECT ROUND(AVG(user_rating),1) AS averagerating FROM review_table WHERE businessid = $businessid ORDER BY review_id";
                    $query_rating_run = mysqli_query($con, $query_rating);
                    $row_rating = mysqli_fetch_assoc($query_rating_run);

                    if(!$row_rating['averagerating'])
                    {
                        echo '<span> No Rating </span>';
                    }
                    else
                    {
                        echo '<span style="color:orange; margin-left: 15px; margin-bottom: 0px;" <i class="fas fa-star"></i><p class="text-white">'.$row_rating['averagerating'].'/5</p></span>';
                    }
                    $query_rating_count = "SELECT review_id FROM review_table WHERE businessid = $businessid ORDER BY review_id";
                    $query_rating_count_run = mysqli_query($con, $query_rating_count);
                    $row_rating_count = mysqli_num_rows($query_rating_count_run);
                    echo '<span style="color:white"> ('.$row_rating_count.' Rating)</span><br>';
                ?>
                <!-- <button class="btn btn-primary" type="submit" name="add_review" id="add_review" style="margin-top: 10px;background: rgb(255,128,64);font-family: Acme, sans-serif;color: white;border-style: none;margin-left: 15px;">ADD REVIEW</button> -->
            </div>
        </div>
    </div>
<!--END OF ABOUT SECTION-->

<!-- START OF MENU SECTION-->
<section id="menu">
        <div class="container">
            <h1 style="font-family: 'Kaushan Script', serif;font-weight: bold;text-align: center;font-size: 40px;margin-bottom: 10px;">MENU</h1>
            <div>
                <ul class="nav nav-tabs d-lg-flex justify-content-lg-center" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" role="tab" data-bs-toggle="tab" href="#allmenu">
                            <span style="color: rgba(0, 0, 0, 0.9);">ALL</span><br></a></li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" role="tab" data-bs-toggle="tab" href="#maincourse">
                            <span style="color: rgba(0, 0, 0, 0.7);">MAIN COURSE</span><br></a></li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" role="tab" data-bs-toggle="tab" href="#soup">
                            <span style="color: rgba(0, 0, 0, 0.7);">SOUP</span></a></li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" role="tab" data-bs-toggle="tab" href="#appetizer">
                            <span style="color: rgba(0, 0, 0, 0.7);">APPETIZER</span></a></li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" role="tab" data-bs-toggle="tab" href="#fishdish">
                            <span style="color: rgba(0, 0, 0, 0.7);">FISH DISH</span></a></li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" role="tab" data-bs-toggle="tab" href="#meatdish">
                            <span style="color: rgba(0, 0, 0, 0.7);">MEAT DISH</span></a></li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" role="tab" data-bs-toggle="tab" href="#dessert">
                            <span style="color: rgba(0, 0, 0, 0.7);">DESSERT</span></a></li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" role="tab" data-bs-toggle="tab" href="#salad" style="color: var(--bs-dark);">
                            <span style="color: rgba(0, 0, 0, 0.7);">SALAD</span></a></li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" role="tab" data-bs-toggle="tab" href="#drinks">
                            <span style="color: rgba(0, 0, 0, 0.7);">DRINKS</span></a></li>
                </ul>
            <div class="tab-content">
                <!--All-->
                <div class="tab-pane active" role="tabpanel" id="allmenu">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h1 class="text-start" style="font-family: Acme, sans-serif;font-size: 30px;margin-bottom: 0px;margin-top: 15px;margin-left: 35px;">ALL</h1>
                                <p class="text-muted" style="margin-left: 35px;font-family: Acme, sans-serif;margin-bottom: 0px;">Paragraph</p>
                                <div class="container">
                                    <div class="row">   
                                        <?php
                                            if(mysqli_num_rows($product) > 0)
                                            {                           
                                            $sql = "SELECT * FROM `products` WHERE businessid = $bid";
                                            $result = $con->query($sql);
                                            foreach($result as $item)
                                            {
                                                if( $item['status'] == '1')
                                                {
                                        ?>                                      
						                <div class="col-md-4">
                                            <section class="py-4 py-xl-3">
                                                <div class="container" style="padding-right: 0px;padding-left: 0px;">
                                                    <div class=" border rounded border-0 border-dark overflow-hidden" style="height:250px;box-shadow: 0px 0px 10px;">
                                                    <a href="businessview.php?id=<?=$item['businessid'];?>" style="color:black; text-decoration:none;">
                                                        <div class="row g-0" style="border: 1px none rgb(255,128,64);box-shadow: 0px 0px 0px;">
                                                            <div class="col-md-6" style="font-family: Acme, sans-serif;">
                                                                <div class="text-black p-4 p-md-5" style="background: url(uploads/formenu3.png)center; background-size:cover;height: 100%;">
                                                                    <h2 class="fw-bold  mb-2" style="font-size: 20px;"><?= $item['name']; ?></h2>
                                                                    <p class="mb-1" style="font-size: 12px;"><?= $item['description']; ?></p>
                                                                    <p class="mb-1" style="font-size: 12px;"><?= $item['cuisinename']; ?> Cuisine</p>
                                                                    <p class="mb-1" style="font-weight: bold;font-size: 18px;">₱<?= $item['price']; ?></p>
                                                                    <div class="my-3"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 order-first order-md-last" style="min-height: 250px;">
                                                                <img class="img-fluid w-100" src="uploads/<?= $item['image']; ?>" style="object-position:contain; height:250px;">
                                                            </div>
                                                        </div>
                                                    </div></a>   
                                                </div>
                                            </section>
                                        </div>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                            <div class="col-md-4">
                                            <section class="py-4 py-xl-3">
                                                <div class="container" style="padding-right: 0px;padding-left: 0px;">
                                                    <div class=" border rounded border-0 border-dark overflow-hidden" style="height:250px;box-shadow: 0px 0px 10px;">
                                                    <a href="businessview.php?id=<?=$item['businessid'];?>" style="color:black; text-decoration:none;">
                                                        <div class="row g-0" style="border: 1px none rgb(255,128,64);box-shadow: 0px 0px 0px;">
                                                            <div class="col-md-6" style="font-family: Acme, sans-serif;">
                                                                <div class="text-black p-4 p-md-5" style="background: url(uploads/formenu3.png)center; background-size:cover;height: 100%;">
                                                                    <h2 class="fw-bold  mb-2" style="font-size: 20px;"><?= $item['name']; ?></h2>
                                                                    <p class="mb-1" style="font-size: 12px;"><?= $item['description']; ?></p>
                                                                    <p class="mb-1" style="font-size: 12px;"><?= $item['cuisinename']; ?> Cuisine</p>
                                                                    <p class="mb-1" style="font-weight: bold;font-size: 18px;">₱<?= $item['price']; ?></p>
                                                                    <p class="mb-1 text-danger" style="font-weight: bold;font-size: 18px;">SOLD OUT</p>
                                                                    <div class="my-3"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 order-first order-md-last" style="min-height: 250px;">
                                                                <img class="img-fluid w-100" src="uploads/<?= $item['image']; ?>" style="object-position:contain; height:250px;">
                                                            </div>
                                                        </div>
                                                    </div></a>   
                                                </div>
                                            </section>
                                            </div>
                                        <?php  
                                            }
                                            }
                                        }
                                            else
                                            {
                                                echo "";
                                            ?>
                                        <?php
                                        }
                                        ?> 
                                    </div>        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                     
                <!--APPETIZER-->
                <div class="tab-pane" role="tabpanel" id="appetizer">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h1 class="text-start" style="font-family: Acme, sans-serif;font-size: 30px;margin-bottom: 0px;margin-top: 15px;margin-left: 35px;">APPETIZER</h1>
                                <p class="text-muted" style="margin-left: 35px;font-family: Acme, sans-serif;margin-bottom: 0px;">Paragraph</p>
                                <div class="container">
                                    <div class="row">  
                                        <?php
                                            if(mysqli_num_rows($product) > 0)
                                            {                           
                                            $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Appetizer';";
                                            $result = $con->query($sql);
                                            foreach($result as $item)
                                            {
                                                if( $item['status'] == '1')
                                                {
                                        ?>                                      
						                <div class="col-md-4">
                                            <section class="py-4 py-xl-3">
                                                <div class="container" style="padding-right: 0px;padding-left: 0px;">
                                                    <div class=" border rounded border-0 border-dark overflow-hidden" style="height:250px;box-shadow: 0px 0px 10px;">
                                                    <a href="businessview.php?id=<?=$item['businessid'];?>" style="color:black; text-decoration:none;">
                                                        <div class="row g-0" style="border: 1px none rgb(255,128,64);box-shadow: 0px 0px 0px;">
                                                            <div class="col-md-6" style="font-family: Acme, sans-serif;">
                                                                <div class="text-black p-4 p-md-5" style="background: url(uploads/formenu3.png)center; background-size:cover;height: 100%;">
                                                                    <h2 class="fw-bold  mb-2" style="font-size: 20px;"><?= $item['name']; ?></h2>
                                                                    <p class="mb-1" style="font-size: 12px;"><?= $item['description']; ?></p>
                                                                    <p class="mb-1" style="font-size: 12px;"><?= $item['cuisinename']; ?> Cuisine</p>
                                                                    <p class="mb-1" style="font-weight: bold;font-size: 18px;">₱<?= $item['price']; ?></p>
                                                                    <div class="my-3"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 order-first order-md-last" style="min-height: 250px;">
                                                                <img class="img-fluid w-100" src="uploads/<?= $item['image']; ?>" style="object-position:contain; height:250px;">
                                                            </div>
                                                        </div>
                                                    </div></a>   
                                                </div>
                                            </section>
                                        </div>
                                        <?php
                                                }
                                                else
                                                {
                                            ?>
                                                <div class="col-md-4">
                                                <section class="py-4 py-xl-3">
                                                    <div class="container" style="padding-right: 0px;padding-left: 0px;">
                                                        <div class=" border rounded border-0 border-dark overflow-hidden" style="height:250px;box-shadow: 0px 0px 10px;">
                                                        <a href="businessview.php?id=<?=$item['businessid'];?>" style="color:black; text-decoration:none;">
                                                            <div class="row g-0" style="border: 1px none rgb(255,128,64);box-shadow: 0px 0px 0px;">
                                                                <div class="col-md-6" style="font-family: Acme, sans-serif;">
                                                                    <div class="text-black p-4 p-md-5" style="background: url(uploads/formenu3.png)center; background-size:cover;height: 100%;">
                                                                        <h2 class="fw-bold  mb-2" style="font-size: 20px;"><?= $item['name']; ?></h2>
                                                                        <p class="mb-1" style="font-size: 12px;"><?= $item['description']; ?></p>
                                                                        <p class="mb-1" style="font-size: 12px;"><?= $item['cuisinename']; ?> Cuisine</p>
                                                                        <p class="mb-1" style="font-weight: bold;font-size: 18px;">₱<?= $item['price']; ?></p>
                                                                        <p class="mb-1 text-danger" style="font-weight: bold;font-size: 18px;">SOLD OUT</p>
                                                                        <div class="my-3"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 order-first order-md-last" style="min-height: 250px;">
                                                                    <img class="img-fluid w-100" src="uploads/<?= $item['image']; ?>" style="object-position:contain; height:250px;">
                                                                </div>
                                                            </div>
                                                        </div></a>   
                                                    </div>
                                                </section>
                                                </div>
                                            <?php  
                                                }
                                            }
                                        }
                                            else
                                            {
                                                echo "";
                                            ?>
                                        <?php
                                        }
                                        ?>                                             
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             
                <!--SOUP-->
                <div class="tab-pane" role="tabpanel" id="soup">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h1 class="text-start" style="font-family: Acme, sans-serif;font-size: 30px;margin-bottom: 0px;margin-top: 15px;margin-left: 35px;">SOUP</h1>
                                <p class="text-muted" style="margin-left: 35px;font-family: Acme, sans-serif;margin-bottom: 0px;">Paragraph</p>
                                <div class="container">
                                    <div class="row">    
                                        <?php
                                            if(mysqli_num_rows($product) > 0)
                                            {                                       
                                            $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Soup';";
                                            $result = $con->query($sql);
                                            foreach($result as $item)
                                            {
                                                if( $item['status'] == '1')
                                                {
                                        ?>                                      
						                <div class="col-md-4">
                                            <section class="py-4 py-xl-3">
                                                <div class="container" style="padding-right: 0px;padding-left: 0px;">
                                                    <div class=" border rounded border-0 border-dark overflow-hidden" style="height:250px;box-shadow: 0px 0px 10px;">
                                                    <a href="businessview.php?id=<?=$item['businessid'];?>" style="color:black; text-decoration:none;">
                                                        <div class="row g-0" style="border: 1px none rgb(255,128,64);box-shadow: 0px 0px 0px;">
                                                            <div class="col-md-6" style="font-family: Acme, sans-serif;">
                                                                <div class="text-black p-4 p-md-5" style="background: url(uploads/formenu3.png)center; background-size:cover;height: 100%;">
                                                                    <h2 class="fw-bold  mb-2" style="font-size: 20px;"><?= $item['name']; ?></h2>
                                                                    <p class="mb-1" style="font-size: 12px;"><?= $item['description']; ?></p>
                                                                    <p class="mb-1" style="font-size: 12px;"><?= $item['cuisinename']; ?> Cuisine</p>
                                                                    <p class="mb-1" style="font-weight: bold;font-size: 18px;">₱<?= $item['price']; ?></p>
                                                                    <div class="my-3"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 order-first order-md-last" style="min-height: 250px;">
                                                                <img class="img-fluid w-100" src="uploads/<?= $item['image']; ?>" style="object-position:contain; height:250px;">
                                                            </div>
                                                        </div>
                                                    </div></a>   
                                                </div>
                                            </section>
                                        </div>
                                        <?php
                                                }
                                                else
                                                {
                                            ?>
                                                <div class="col-md-4">
                                                <section class="py-4 py-xl-3">
                                                    <div class="container" style="padding-right: 0px;padding-left: 0px;">
                                                        <div class=" border rounded border-0 border-dark overflow-hidden" style="height:250px;box-shadow: 0px 0px 10px;">
                                                        <a href="businessview.php?id=<?=$item['businessid'];?>" style="color:black; text-decoration:none;">
                                                            <div class="row g-0" style="border: 1px none rgb(255,128,64);box-shadow: 0px 0px 0px;">
                                                                <div class="col-md-6" style="font-family: Acme, sans-serif;">
                                                                    <div class="text-black p-4 p-md-5" style="background: url(uploads/formenu3.png)center; background-size:cover;height: 100%;">
                                                                        <h2 class="fw-bold  mb-2" style="font-size: 20px;"><?= $item['name']; ?></h2>
                                                                        <p class="mb-1" style="font-size: 12px;"><?= $item['description']; ?></p>
                                                                        <p class="mb-1" style="font-size: 12px;"><?= $item['cuisinename']; ?> Cuisine</p>
                                                                        <p class="mb-1" style="font-weight: bold;font-size: 18px;">₱<?= $item['price']; ?></p>
                                                                        <p class="mb-1 text-danger" style="font-weight: bold;font-size: 18px;">SOLD OUT</p>
                                                                        <div class="my-3"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 order-first order-md-last" style="min-height: 250px;">
                                                                    <img class="img-fluid w-100" src="uploads/<?= $item['image']; ?>" style="object-position:contain; height:250px;">
                                                                </div>
                                                            </div>
                                                        </div></a>   
                                                    </div>
                                                </section>
                                                </div>
                                            <?php  
                                                }
                                            }
                                        }
                                            else
                                            {
                                                echo "";
                                            ?>
                                        <?php
                                        }
                                        ?>                                               
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
                <!--DRINKS-->
                <div class="tab-pane" role="tabpanel" id="drinks">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h1 class="text-start" style="font-family: Acme, sans-serif;font-size: 30px;margin-bottom: 0px;margin-top: 15px;margin-left: 35px;">DRINKS</h1>
                                <p class="text-muted" style="margin-left: 35px;font-family: Acme, sans-serif;margin-bottom: 0px;">Paragraph</p>
                                <div class="container">
                                    <div class="row"> 
                                        <?php
                                            if(mysqli_num_rows($product) > 0)
                                            {                                        
                                            $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Drinks';";
                                            $result = $con->query($sql);
                                            foreach($result as $item)
                                            {
                                                if( $item['status'] == '1')
                                                {
                                        ?>                                      
						                <div class="col-md-4">
                                            <section class="py-4 py-xl-3">
                                                <div class="container" style="padding-right: 0px;padding-left: 0px;">
                                                    <div class=" border rounded border-0 border-dark overflow-hidden" style="height:250px;box-shadow: 0px 0px 10px;">
                                                    <a href="businessview.php?id=<?=$item['businessid'];?>" style="color:black; text-decoration:none;">
                                                        <div class="row g-0" style="border: 1px none rgb(255,128,64);box-shadow: 0px 0px 0px;">
                                                            <div class="col-md-6" style="font-family: Acme, sans-serif;">
                                                                <div class="text-black p-4 p-md-5" style="background: url(uploads/formenu3.png)center; background-size:cover;height: 100%;">
                                                                    <h2 class="fw-bold  mb-2" style="font-size: 20px;"><?= $item['name']; ?></h2>
                                                                    <p class="mb-1" style="font-size: 12px;"><?= $item['description']; ?></p>
                                                                    <p class="mb-1" style="font-size: 12px;"><?= $item['cuisinename']; ?> Cuisine</p>
                                                                    <p class="mb-1" style="font-weight: bold;font-size: 18px;">₱<?= $item['price']; ?></p>
                                                                    <div class="my-3"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 order-first order-md-last" style="min-height: 250px;">
                                                                <img class="img-fluid w-100" src="uploads/<?= $item['image']; ?>" style="object-position:contain; height:250px;">
                                                            </div>
                                                        </div>
                                                    </div></a>   
                                                </div>
                                            </section>
                                        </div>
                                        <?php
                                                }
                                                else
                                                {
                                            ?>
                                                <div class="col-md-4">
                                                <section class="py-4 py-xl-3">
                                                    <div class="container" style="padding-right: 0px;padding-left: 0px;">
                                                        <div class=" border rounded border-0 border-dark overflow-hidden" style="height:250px;box-shadow: 0px 0px 10px;">
                                                        <a href="businessview.php?id=<?=$item['businessid'];?>" style="color:black; text-decoration:none;">
                                                            <div class="row g-0" style="border: 1px none rgb(255,128,64);box-shadow: 0px 0px 0px;">
                                                                <div class="col-md-6" style="font-family: Acme, sans-serif;">
                                                                    <div class="text-black p-4 p-md-5" style="background: url(uploads/formenu3.png)center; background-size:cover;height: 100%;">
                                                                        <h2 class="fw-bold  mb-2" style="font-size: 20px;"><?= $item['name']; ?></h2>
                                                                        <p class="mb-1" style="font-size: 12px;"><?= $item['description']; ?></p>
                                                                        <p class="mb-1" style="font-size: 12px;"><?= $item['cuisinename']; ?> Cuisine</p>
                                                                        <p class="mb-1" style="font-weight: bold;font-size: 18px;">₱<?= $item['price']; ?></p>
                                                                        <p class="mb-1 text-danger" style="font-weight: bold;font-size: 18px;">SOLD OUT</p>
                                                                        <div class="my-3"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 order-first order-md-last" style="min-height: 250px;">
                                                                    <img class="img-fluid w-100" src="uploads/<?= $item['image']; ?>" style="object-position:contain; height:250px;">
                                                                </div>
                                                            </div>
                                                        </div></a>   
                                                    </div>
                                                </section>
                                                </div>
                                            <?php  
                                                }
                                            }
                                        }
                                            else
                                            {
                                                echo "";
                                            ?>
                                        <?php
                                        }
                                        ?>                                              
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--MEAT DISH-->
                <div class="tab-pane" role="tabpanel" id="meatdish">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h1 class="text-start" style="font-family: Acme, sans-serif;font-size: 30px;margin-bottom: 0px;margin-top: 15px;margin-left: 35px;">MEAT DISH</h1>
                                <p class="text-muted" style="margin-left: 35px;font-family: Acme, sans-serif;margin-bottom: 0px;">Paragraph</p>
                                <div class="container">
                                    <div class="row">   
                                        <?php
                                            if(mysqli_num_rows($product) > 0)
                                            {                  
                                            $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'MeatDish';";
                                            $result = $con->query($sql);
                                            foreach($result as $item)
                                            {
                                                if( $item['status'] == '1')
                                                {
                                        ?>                                      
						                <div class="col-md-4">
                                            <section class="py-4 py-xl-3">
                                                <div class="container" style="padding-right: 0px;padding-left: 0px;">
                                                    <div class=" border rounded border-0 border-dark overflow-hidden" style="height:250px;box-shadow: 0px 0px 10px;">
                                                    <a href="businessview.php?id=<?=$item['businessid'];?>" style="color:black; text-decoration:none;">
                                                        <div class="row g-0" style="border: 1px none rgb(255,128,64);box-shadow: 0px 0px 0px;">
                                                            <div class="col-md-6" style="font-family: Acme, sans-serif;">
                                                                <div class="text-black p-4 p-md-5" style="background: url(uploads/formenu3.png)center; background-size:cover;height: 100%;">
                                                                    <h2 class="fw-bold  mb-2" style="font-size: 20px;"><?= $item['name']; ?></h2>
                                                                    <p class="mb-1" style="font-size: 12px;"><?= $item['description']; ?></p>
                                                                    <p class="mb-1" style="font-size: 12px;"><?= $item['cuisinename']; ?> Cuisine</p>
                                                                    <p class="mb-1 " style="font-weight: bold;font-size: 18px;">₱<?= $item['price']; ?></p>
                                                                    <div class="my-3"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 order-first order-md-last" style="min-height: 250px;">
                                                                <img class="img-fluid w-100" src="uploads/<?= $item['image']; ?>" style="object-position:contain; height:250px;">
                                                            </div>
                                                        </div>
                                                    </div></a>   
                                                </div>
                                            </section>
                                        </div>
                                        <?php
                                                }
                                                else
                                                {
                                            ?>
                                                <div class="col-md-4">
                                                <section class="py-4 py-xl-3">
                                                    <div class="container" style="padding-right: 0px;padding-left: 0px;">
                                                        <div class=" border rounded border-0 border-dark overflow-hidden" style="height:250px;box-shadow: 0px 0px 10px;">
                                                        <a href="businessview.php?id=<?=$item['businessid'];?>" style="color:black; text-decoration:none;">
                                                            <div class="row g-0" style="border: 1px none rgb(255,128,64);box-shadow: 0px 0px 0px;">
                                                                <div class="col-md-6" style="font-family: Acme, sans-serif;">
                                                                    <div class="text-black p-4 p-md-5" style="background: url(uploads/formenu3.png)center; background-size:cover;height: 100%;">
                                                                        <h2 class="fw-bold  mb-2" style="font-size: 20px;"><?= $item['name']; ?></h2>
                                                                        <p class="mb-1" style="font-size: 12px;"><?= $item['description']; ?></p>
                                                                        <p class="mb-1" style="font-size: 12px;"><?= $item['cuisinename']; ?> Cuisine</p>
                                                                        <p class="mb-1 " style="font-weight: bold;font-size: 18px;">₱<?= $item['price']; ?></p>
                                                                        <p class="mb-1 text-danger" style="font-weight: bold;font-size: 18px;">SOLD OUT</p>
                                                                        <div class="my-3"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 order-first order-md-last" style="min-height: 250px;">
                                                                    <img class="img-fluid w-100" src="uploads/<?= $item['image']; ?>" style="object-position:contain; height:250px;">
                                                                </div>
                                                            </div>
                                                        </div></a>   
                                                    </div>
                                                </section>
                                                </div>
                                            <?php  
                                                }
                                            }
                                        }
                                            else
                                            {
                                                echo "";
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </div>        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--MAIN COURSE-->
                <div class="tab-pane" role="tabpanel" id="maincourse">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h1 class="text-start" style="font-family: Acme, sans-serif;font-size: 30px;margin-bottom: 0px;margin-top: 15px;margin-left: 35px;">MAIN COURSE</h1>
                                <p class="text-muted" style="margin-left: 35px;font-family: Acme, sans-serif;margin-bottom: 0px;">Paragraph</p>
                                <div class="container">
                                    <div class="row">   
                                        <?php
                                            if(mysqli_num_rows($product) > 0)
                                            {                                     
                                            $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Main';";
                                            $result = $con->query($sql);
                                            foreach($result as $item)
                                            {
                                                if( $item['status'] == '1')
                                                {
                                        ?>                                      
						                <div class="col-md-4">
                                            <section class="py-4 py-xl-3">
                                                <div class="container" style="padding-right: 0px;padding-left: 0px;">
                                                    <div class=" border rounded border-0 border-dark overflow-hidden" style="height:250px;box-shadow: 0px 0px 10px;">
                                                    <a href="businessview.php?id=<?=$item['businessid'];?>" style="color:black; text-decoration:none;">
                                                        <div class="row g-0" style="border: 1px none rgb(255,128,64);box-shadow: 0px 0px 0px;">
                                                            <div class="col-md-6" style="font-family: Acme, sans-serif;">
                                                                <div class="text-black p-4 p-md-5" style="background: url(uploads/formenu3.png)center; background-size:cover;height: 100%;">
                                                                    <h2 class="fw-bold  mb-2" style="font-size: 20px;"><?= $item['name']; ?></h2>
                                                                    <p class="mb-1" style="font-size: 12px;"><?= $item['description']; ?></p>
                                                                    <p class="mb-1" style="font-size: 12px;"><?= $item['cuisinename']; ?> Cuisine</p>
                                                                    <p class="mb-1" style="font-weight: bold;font-size: 18px;">₱<?= $item['price']; ?></p>
                                                                    <div class="my-3"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 order-first order-md-last" style="min-height: 250px;">
                                                                <img class="img-fluid w-100" src="uploads/<?= $item['image']; ?>" style="object-position:contain; height:250px;">
                                                            </div>
                                                        </div>
                                                    </div></a>   
                                                </div>
                                            </section>
                                        </div>
                                        <?php
                                                }
                                                else
                                                {
                                        ?>
                                                <div class="col-md-4">
                                                <section class="py-4 py-xl-3">
                                                    <div class="container" style="padding-right: 0px;padding-left: 0px;">
                                                        <div class=" border rounded border-0 border-dark overflow-hidden" style="height:250px;box-shadow: 0px 0px 10px;">
                                                        <a href="businessview.php?id=<?=$item['businessid'];?>" style="color:black; text-decoration:none;">
                                                            <div class="row g-0" style="border: 1px none rgb(255,128,64);box-shadow: 0px 0px 0px;">
                                                                <div class="col-md-6" style="font-family: Acme, sans-serif;">
                                                                    <div class="text-black p-4 p-md-5" style="background: url(uploads/formenu3.png)center; background-size:cover;height: 100%;">
                                                                        <h2 class="fw-bold  mb-2" style="font-size: 20px;"><?= $item['name']; ?></h2>
                                                                        <p class="mb-1" style="font-size: 12px;"><?= $item['description']; ?></p>
                                                                        <p class="mb-1" style="font-size: 12px;"><?= $item['cuisinename']; ?> Cuisine</p>
                                                                        <p class="mb-1 " style="font-weight: bold;font-size: 18px;">₱<?= $item['price']; ?></p>
                                                                        <p class="mb-1 text-danger" style="font-weight: bold;font-size: 18px;">SOLD OUT</p>
                                                                        <div class="my-3"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 order-first order-md-last" style="min-height: 250px;">
                                                                    <img class="img-fluid w-100" src="uploads/<?= $item['image']; ?>" style="object-position:contain; height:250px;">
                                                                </div>
                                                            </div>
                                                        </div></a>   
                                                    </div>
                                                </section>
                                                </div>
                                            <?php  
                                                }
                                            }
                                        }
                                            else
                                            {
                                                echo "";
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </div>          
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--SALAD-->
                <div class="tab-pane" role="tabpanel" id="salad">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h1 class="text-start" style="font-family: Acme, sans-serif;font-size: 30px;margin-bottom: 0px;margin-top: 15px;margin-left: 35px;">SALAD</h1>
                                <p class="text-muted" style="margin-left: 35px;font-family: Acme, sans-serif;margin-bottom: 0px;">Paragraph</p>
                                <div class="container">
                                    <div class="row">  
                                        <?php
                                            if(mysqli_num_rows($product) > 0)
                                            {                  
                                            $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Salad';";
                                            $result = $con->query($sql);
                                            foreach($result as $item)
                                            {
                                                if( $item['status'] == '1')
                                                {
                                        ?>                                      
						                <div class="col-md-4">
                                            <section class="py-4 py-xl-3">
                                                <div class="container" style="padding-right: 0px;padding-left: 0px;">
                                                    <div class=" border rounded border-0 border-dark overflow-hidden" style="height:250px;box-shadow: 0px 0px 10px;">
                                                    <a href="businessview.php?id=<?=$item['businessid'];?>" style="color:black; text-decoration:none;">
                                                        <div class="row g-0" style="border: 1px none rgb(255,128,64);box-shadow: 0px 0px 0px;">
                                                            <div class="col-md-6" style="font-family: Acme, sans-serif;">
                                                                <div class="text-black p-4 p-md-5" style="background: url(uploads/formenu3.png)center; background-size:cover;height: 100%;">
                                                                    <h2 class="fw-bold  mb-2" style="font-size: 20px;"><?= $item['name']; ?></h2>
                                                                    <p class="mb-1" style="font-size: 12px;"><?= $item['description']; ?></p>
                                                                    <p class="mb-1" style="font-size: 12px;"><?= $item['cuisinename']; ?> Cuisine</p>
                                                                    <p class="mb-1 " style="font-weight: bold;font-size: 18px;">₱<?= $item['price']; ?></p>
                                                                    <div class="my-3"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 order-first order-md-last" style="min-height: 250px;">
                                                                <img class="img-fluid w-100" src="uploads/<?= $item['image']; ?>" style="object-position:contain; height:250px;">
                                                            </div>
                                                        </div>
                                                    </div></a>   
                                                </div>
                                            </section>
                                        </div>
                                        <?php
                                                }
                                                else
                                                {
                                            ?>
                                                <div class="col-md-4">
                                                <section class="py-4 py-xl-3">
                                                    <div class="container" style="padding-right: 0px;padding-left: 0px;">
                                                        <div class=" border rounded border-0 border-dark overflow-hidden" style="height:250px;box-shadow: 0px 0px 10px;">
                                                        <a href="businessview.php?id=<?=$item['businessid'];?>" style="color:black; text-decoration:none;">
                                                            <div class="row g-0" style="border: 1px none rgb(255,128,64);box-shadow: 0px 0px 0px;">
                                                                <div class="col-md-6" style="font-family: Acme, sans-serif;">
                                                                    <div class="text-black p-4 p-md-5" style="background: url(uploads/formenu3.png)center; background-size:cover;height: 100%;">
                                                                        <h2 class="fw-bold  mb-2" style="font-size: 20px;"><?= $item['name']; ?></h2>
                                                                        <p class="mb-1" style="font-size: 12px;"><?= $item['description']; ?></p>
                                                                        <p class="mb-1" style="font-size: 12px;"><?= $item['cuisinename']; ?> Cuisine</p>
                                                                        <p class="mb-1 " style="font-weight: bold;font-size: 18px;">₱<?= $item['price']; ?></p>
                                                                        <p class="mb-1 text-danger" style="font-weight: bold;font-size: 18px;">SOLD OUT</p>
                                                                        <div class="my-3"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 order-first order-md-last" style="min-height: 250px;">
                                                                    <img class="img-fluid w-100" src="uploads/<?= $item['image']; ?>" style="object-position:contain; height:250px;">
                                                                </div>
                                                            </div>
                                                        </div></a>   
                                                    </div>
                                                </section>
                                                </div>
                                            <?php  
                                                }
                                            }
                                        }
                                            else
                                            {
                                                echo "";
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </div>        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--DESSERT-->
                <div class="tab-pane" role="tabpanel" id="dessert">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h1 class="text-start" style="font-family: Acme, sans-serif;font-size: 30px;margin-bottom: 0px;margin-top: 15px;margin-left: 35px;">DESSERT</h1>
                                <p class="text-muted" style="margin-left: 35px;font-family: Acme, sans-serif;margin-bottom: 0px;">Paragraph</p>
                                <div class="container">
                                    <div class="row">
                                        <?php
                                            if(mysqli_num_rows($product) > 0)
                                            {                                     
                                            $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Dessert';";
                                            $result = $con->query($sql);
                                            foreach($result as $item)
                                            {
                                                if( $item['status'] == '1')
                                                {
                                        ?>                                      
						                <div class="col-md-4">
                                            <section class="py-4 py-xl-3">
                                                <div class="container" style="padding-right: 0px;padding-left: 0px;">
                                                    <div class=" border rounded border-0 border-dark overflow-hidden" style="height:250px;box-shadow: 0px 0px 10px;">
                                                    <a href="businessview.php?id=<?=$item['businessid'];?>" style="color:black; text-decoration:none;">
                                                        <div class="row g-0" style="border: 1px none rgb(255,128,64);box-shadow: 0px 0px 0px;">
                                                            <div class="col-md-6" style="font-family: Acme, sans-serif;">
                                                                <div class="text-black p-4 p-md-5" style="background: url(uploads/formenu3.png)center; background-size:cover;height: 100%;">
                                                                    <h2 class="fw-bold  mb-2" style="font-size: 20px;"><?= $item['name']; ?></h2>
                                                                    <p class="mb-1" style="font-size: 12px;"><?= $item['description']; ?></p>
                                                                    <p class="mb-1" style="font-size: 12px;"><?= $item['cuisinename']; ?> Cuisine</p>
                                                                    <p class="mb-1" style="font-weight: bold;font-size: 18px;">₱<?= $item['price']; ?></p>
                                                                    <div class="my-3"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 order-first order-md-last" style="min-height: 250px;">
                                                                <img class="img-fluid w-100" src="uploads/<?= $item['image']; ?>" style="object-position:contain; height:250px;">
                                                            </div>
                                                        </div>
                                                    </div></a>   
                                                </div>
                                            </section>
                                        </div>
                                        <?php
                                                }
                                                else
                                                {
                                            ?>
                                                <div class="col-md-4">
                                                <section class="py-4 py-xl-3">
                                                    <div class="container" style="padding-right: 0px;padding-left: 0px;">
                                                        <div class=" border rounded border-0 border-dark overflow-hidden" style="height:250px;box-shadow: 0px 0px 10px;">
                                                        <a href="businessview.php?id=<?=$item['businessid'];?>" style="color:black; text-decoration:none;">
                                                            <div class="row g-0" style="border: 1px none rgb(255,128,64);box-shadow: 0px 0px 0px;">
                                                                <div class="col-md-6" style="font-family: Acme, sans-serif;">
                                                                    <div class="text-black p-4 p-md-5" style="background: url(uploads/formenu3.png)center; background-size:cover;height: 100%;">
                                                                        <h2 class="fw-bold  mb-2" style="font-size: 20px;"><?= $item['name']; ?></h2>
                                                                        <p class="mb-1" style="font-size: 12px;"><?= $item['description']; ?></p>
                                                                        <p class="mb-1" style="font-size: 12px;"><?= $item['cuisinename']; ?> Cuisine</p>
                                                                        <p class="mb-1 " style="font-weight: bold;font-size: 18px;">₱<?= $item['price']; ?></p>
                                                                        <p class="mb-1 text-danger" style="font-weight: bold;font-size: 18px;">SOLD OUT</p>
                                                                        <div class="my-3"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 order-first order-md-last" style="min-height: 250px;">
                                                                    <img class="img-fluid w-100" src="uploads/<?= $item['image']; ?>" style="object-position:contain; height:250px;">
                                                                </div>
                                                            </div>
                                                        </div></a>   
                                                    </div>
                                                </section>
                                                </div>
                                            <?php  
                                                }
                                            }
                                        }
                                            else
                                            {
                                                echo "";
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </div>         
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--FISH DISH-->
                <div class="tab-pane" role="tabpanel" id="fishdish">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h1 class="text-start" style="font-family: Acme, sans-serif;font-size: 30px;margin-bottom: 0px;margin-top: 15px;margin-left: 35px;">FISH DISH</h1>
                                <p class="text-muted" style="margin-left: 35px;font-family: Acme, sans-serif;margin-bottom: 0px;">Paragraph</p>
                                <div class="container">
                                    <div class="row"> 
                                        <?php
                                            if(mysqli_num_rows($product) > 0)
                                            {     
                                            $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'FishDish';";
                                            $result = $con->query($sql);
                                            foreach($result as $item)
                                            {
                                                if( $item['status'] == '1')
                                                {
                                        ?>                                      
						                <div class="col-md-4">
                                            <section class="py-4 py-xl-3">
                                                <div class="container" style="padding-right: 0px;padding-left: 0px;">
                                                    <div class=" border rounded border-0 border-dark overflow-hidden" style="height:250px;box-shadow: 0px 0px 10px;">
                                                    <a href="businessview.php?id=<?=$item['businessid'];?>" style="color:black; text-decoration:none;">
                                                        <div class="row g-0" style="border: 1px none rgb(255,128,64);box-shadow: 0px 0px 0px;">
                                                            <div class="col-md-6" style="font-family: Acme, sans-serif;">
                                                                <div class="text-black p-4 p-md-5" style="background: url(uploads/formenu3.png)center; background-size:cover;height: 100%;">
                                                                    <h2 class="fw-bold  mb-2" style="font-size: 20px;"><?= $item['name']; ?></h2>
                                                                    <p class="mb-1" style="font-size: 12px;"><?= $item['description']; ?></p>
                                                                    <p class="mb-1" style="font-size: 12px;"><?= $item['cuisinename']; ?> Cuisine</p>
                                                                    <p class="mb-1" style="font-weight: bold;font-size: 18px;">₱<?= $item['price']; ?></p>
                                                                    <div class="my-3"></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 order-first order-md-last" style="min-height: 250px;">
                                                                <img class="img-fluid w-100" src="uploads/<?= $item['image']; ?>" style="object-position:contain; height:250px;">
                                                            </div>
                                                        </div>
                                                    </div></a>   
                                                </div>
                                            </section>
                                        </div>
                                        <?php
                                                }
                                                else
                                                {
                                            ?>
                                                <div class="col-md-4">
                                                <section class="py-4 py-xl-3">
                                                    <div class="container" style="padding-right: 0px;padding-left: 0px;">
                                                        <div class=" border rounded border-0 border-dark overflow-hidden" style="height:250px;box-shadow: 0px 0px 10px;">
                                                        <a href="businessview.php?id=<?=$item['businessid'];?>" style="color:black; text-decoration:none;">
                                                            <div class="row g-0" style="border: 1px none rgb(255,128,64);box-shadow: 0px 0px 0px;">
                                                                <div class="col-md-6" style="font-family: Acme, sans-serif;">
                                                                    <div class="text-black p-4 p-md-5" style="background: url(uploads/formenu3.png)center; background-size:cover;height: 100%;">
                                                                        <h2 class="fw-bold  mb-2" style="font-size: 20px;"><?= $item['name']; ?></h2>
                                                                        <p class="mb-1" style="font-size: 12px;"><?= $item['description']; ?></p>
                                                                        <p class="mb-1" style="font-size: 12px;"><?= $item['cuisinename']; ?> Cuisine</p>
                                                                        <p class="mb-1 " style="font-weight: bold;font-size: 18px;">₱<?= $item['price']; ?></p>
                                                                        <p class="mb-1 text-danger" style="font-weight: bold;font-size: 18px;">SOLD OUT</p>
                                                                        <div class="my-3"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 order-first order-md-last" style="min-height: 250px;">
                                                                    <img class="img-fluid w-100" src="uploads/<?= $item['image']; ?>" style="object-position:contain; height:250px;">
                                                                </div>
                                                            </div>
                                                        </div></a>   
                                                    </div>
                                                </section>
                                                </div>
                                            <?php  
                                                }
                                            }
                                        }
                                            else
                                            {
                                                echo "";
                                            ?>
                                        <?php
                                        }
                                        ?>
                                    </div>       
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</section>
<!-- END OF MENU SECTION-->

<!-- START OF REVIEW SECTION-->
    <section id="review"  class="bg-dark">
        <div class="container col d-flex justify-content-center" >
            <div class="card col d-flex justify-content-center">
                <div class="card-header"> <h1 style="font-family: 'Kaushan Script', serif;font-weight: bold;text-align: center;font-size: 40px;margin-bottom: 10px;">REVIEWS AND FEEDBACKS</h1></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 text-center">
                            <h1 class="text-warning mt-4 mb-4 col d-flex justify-content-center">
                                <i class="fas fa-star fa-sm star-light mr-1 main_star"></i><b><span id="average_rating">0</span> / 5</b>
                            </h1>
                            <!-- <?php
                                // $query_rating = "SELECT ROUND(AVG(user_rating),1) AS averagerating FROM review_table WHERE businessid = $businessid ORDER BY review_id";
                                // $query_rating_run = mysqli_query($con, $query_rating);
                                // $row_rating = mysqli_fetch_assoc($query_rating_run);
                                // if(!$row_rating['averagerating'])
                                // {
                                //     echo'<i class="fas fa-star fa-2x star-light mr-1 main_star"></i>
                                //         <i class="fas fa-star fa-2x star-light mr-1 main_star"></i>
                                //         <i class="fas fa-star fa-2x star-light mr-1 main_star"></i>
                                //         <i class="fas fa-star fa-2x star-light mr-1 main_star"></i>
                                //         <i class="fas fa-star fa-2x star-light mr-1 main_star"></i>';
                                // }
                                // else if($row_rating['averagerating'] == 5.0)
                                // {
                                //     echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star fa-2x"></i><i class ="fas fa-star fa-2x"></i><i class ="fas fa-star fa-2x"></i><i class ="fas fa-star fa-2x"></i><i class="fas fa-star fa-2x"></i></span>';
                                // }
                                // else if($row_rating['averagerating'] >= 4.1)
                                // {
                                //     echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star fa-2x"></i><i class ="fas fa-star fa-2x"></i><i class ="fas fa-star fa-2x"></i><i class ="fas fa-star fa-2x"></i><i class ="fas fa-star-half-alt fa-2x"></i></span>';
                                // }
                                // else if($row_rating['averagerating'] == 4.0)
                                // {
                                //     echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star fa-2x"></i><i class ="fas fa-star fa-2x"></i><i class ="fas fa-star fa-2x"></i><i class ="fas fa-star fa-2x"></i><i class="far fa-star fa-2x"></i></span>';
                                // }
                                // else if($row_rating['averagerating'] >= 3.1)
                                // {
                                //     echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star fa-2x"></i><i class ="fas fa-star fa-2x"></i><i class ="fas fa-star fa-2x"></i><i class ="fas fa-star-half-alt fa-2x"></i><i class="far fa-star fa-2x"></i></span>';
                                // }
                                // else if($row_rating['averagerating'] == 3.0)
                                // {
                                //     echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star fa-2x"></i><i class ="fas fa-star fa-2x"></i><i class ="fas fa-star fa-2x"></i><i class="far fa-star fa-2x"></i><i class="far fa-star fa-2x"></i></i></span>';
                                // }
                                // else if($row_rating['averagerating'] >= 2.1)
                                // {
                                //     echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star fa-2x"></i><i class ="fas fa-star fa-2x"></i><i class ="fas fa-star-half-alt fa-2x"></i><i class="far fa-star fa-2x"></i><i class="far fa-star fa-2x"></i></span>';
                                // }
                                // else if($row_rating['averagerating'] == 2.0)
                                // {
                                //     echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star fa-2x"></i><i class ="fas fa-star fa-2x"></i><i class="far fa-star fa-2x"></i><i class="far fa-star fa-2x"></i><i class="far fa-star fa-2x"></i></i></span>';
                                // }
                                // else if($row_rating['averagerating'] >= 1.1)
                                // {
                                //     echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star fa-2x""></i><i class ="fas fa-star-half-alt fa-2x"></i><i class="far fa-star fa-2x"></i><i class="far fa-star fa-2x"></i><i class="far fa-star fa-2x"></i></span>';
                                // }
                                // else if($row_rating['averagerating'] == 1.0)
                                // {
                                //     echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star fa-2x"></i><i class="far fa-star fa-2x"></i><i class="far fa-star fa-2x"></i><i class="far fa-star fa-2x"></i><i class="far fa-star fa-2x"></i></i></span>';
                                // }
                                // else
                                // {
                                //     echo 'something went wrong';
                                // }
                                // $query_rating_count = "SELECT review_id FROM review_table WHERE businessid = $businessid ORDER BY review_id";
                                // $query_rating_count_run = mysqli_query($con, $query_rating_count);
                                // $row_rating_count = mysqli_num_rows($query_rating_count_run);
                                // echo '<span> ('.$row_rating_count.')</span>'
                                
                                ?> -->
                            <!-- <div class="mb-3">
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                            </div> -->
                            <h3 class="col d-flex justify-content-center"><span id="total_review">0</span> Review/s</h3>
                        </div>
                        <div class="col-sm-5">
                            <p>
                                <div class="progress-label-left"><b>5</b> <i class="fas fa-star text-warning"></i></div>
                                <div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                                </div>
                            </p>
                            <p>
                                <div class="progress-label-left"><b>4</b> <i class="fas fa-star text-warning"></i></div>  
                                <div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                                </div>               
                            </p>
                            <p>
                                <div class="progress-label-left"><b>3</b> <i class="fas fa-star text-warning"></i></div> 
                                <div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                                </div>               
                            </p>
                            <p>
                                <div class="progress-label-left"><b>2</b> <i class="fas fa-star text-warning"></i></div>  
                                <div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                                </div>               
                            </p>
                            <p>
                                <div class="progress-label-left"><b>1</b> <i class="fas fa-star text-warning"></i></div>
                                <div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>
                                <div class="progress">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                                </div>               
                            </p>
                        </div>
                        <div class="mt-5" id="review_content"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- END OF REVIEW SECTION-->

<!-- START OF LOCATION SECTION-->
    <section id="locations">
        <hr>
    <h1 style="font-family: 'Kaushan Script', serif;font-weight: bold;text-align: center;font-size: 40px;margin-bottom: 10px;">LOCATION</h1>
        <div class="mapouter">
            <div class="gmap_canvas"><iframe src="https://maps.google.com/maps?q=<?=$latitude?>,<?=$longitude?>&output=embed" style="width: 1020px; height: 600px;"></iframe>
                <br><style>.mapouter{position:relative;text-align:center;height:100%;width:100%;}</style>
                <style>.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style>
            </div>
        </div>
    </section>
</body>
<!-- END OF LOCATION SECTION-->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
    <?php
        } 
        else
        {
            echo "No Data Found";
            ?>
            <br><a href="index.php">Go Back</a>
            <?php
        }
    }
    else
    {
        echo "Something Went Wrong";
        ?>
        <br><a href="index.php">Go Back</a>
        <?php
    }

include('includes/footer.php');?>
