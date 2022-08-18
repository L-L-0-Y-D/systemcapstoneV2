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
                            <li class="nav-item"><a class="nav-link" href="#review">REVIEW</a></li>
                            <li class="nav-item"><a class="nav-link" href="#locations">LOCATIONS</a></li>
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
                            <li class="nav-item"><a class="nav-link" href="#review">REVIEW</a></li>
                            <li class="nav-item"><a class="nav-link" href="#locations">LOCATIONS</a></li>
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
                            <li class="nav-item"><a class="nav-link" href="#review">REVIEW</a></li>
                            <li class="nav-item"><a class="nav-link" href="#locations">LOCATIONS</a></li>
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
                            <li class="nav-item"><a class="nav-link" href="#review">REVIEW</a></li>
                            <li class="nav-item"><a class="nav-link" href="#locations">LOCATIONS</a></li>
                            <button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" onclick="location='reservation.php?id=<?= $data['businessid']; ?>'">Make Reservation</button>                    
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav> 
<!--END OF LOGIN-->

<!-- START OF ABOUT SECTION-->
<main class="page product-page">
    <section class="clean-block clean-product">
        <div class="container mt-3" style="width: auto; height:auto;">
            <div class="block-content" style="width: auto;padding-top: 0px; ">
                <section id="aboutrestaurant" style="padding-top: 0px;">
                    <div class="block-heading" style="padding-top: 30px;margin-bottom: 9px;">
                        <div class="col-md-12 d-xxl-flex justify-content-xxl-center" style="padding:50px;height: 600px; background-color:rgb(255,128,64);">
                            <img class="img-fluid d-flex align-self-center justify-content-xl-start justify-content-xxl-center" style="width: 1100px;height: 500px;margin-top: 0px;box-shadow: 0px 0px 10px var(--bs-gray);border-radius: 5px;margin-bottom: 0px;" src="uploads/<?= $data['image']; ?>" width="200px" height="200px" loading="auto">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px;">
                        <div class="col-md-12" style="width: 1024px;">
                            <h1 class="text-start d-table-row d-xxl-flex justify-content-start align-items-baseline justify-content-lg-start justify-content-xxl-start" style="margin-left: 146px;width: 1000px;height:30px;"><strong><?= $data['business_name']; ?></strong></h1>
                        </div>
                        <div class="col-md-12" style="width: 1024px;font-size: 14px;">
                            <h2 class="text-start d-table-row d-xxl-flex justify-content-start align-items-baseline justify-content-lg-start justify-content-xxl-start" style="margin-left: 146px;font-family: Actor, sans-serif;width: 1000px;font-size: 16px;color: var(--bs-gray);height: 20px;"><strong><?= $data['cuisinename']; ?></strong></h2>
                        </div>
                        <div class="col-md-12" style="width: 1024px;">
                            <h3 class="text-start d-table-row d-xxl-flex justify-content-start align-items-baseline justify-content-lg-start justify-content-xxl-start" style="margin-left: 146px;width: 1000px;font-size: 20px;color: var(--bs-gray);height: 24px;"><strong><?= $data['business_address']; ?></strong></h3>
                        </div>
                        <div class="col-md-12" style="width: 1024px;">
                            <h4 class="text-start d-table-row d-xxl-flex justify-content-start align-items-baseline justify-content-lg-start justify-content-xxl-start" style="margin-left: 146px;width: 1000px;font-size: 16px;color: var(--bs-gray);height: 24px;"><strong><?= $data['business_phonenumber']; ?></strong></h4>
                        </div>
                        <div class="col-md-12" style="width: 1024px;">
                            <h4 class="text-start d-table-row d-xxl-flex justify-content-start align-items-baseline justify-content-lg-start justify-content-xxl-start" style="margin-left: 146px;width: 1000px;font-size: 16px;color: var(--bs-gray);height: 24px;"><strong>Open:<?=  date("g:i a", strtotime($opening));?> - Close: <?= date("g:i a", strtotime($closing)); ?></strong></h4>
                        </div>
                        <div class="col-md-12" style="width: 1024px;margin-top: 10px;">
                            <h1 class="text-start d-table-row d-xxl-flex justify-content-start align-items-baseline justify-content-lg-start justify-content-xxl-start" style="margin-left: 146px;width: 1000px;font-size: 30px;color: var(--bs-gray);margin-top: 21px;">
                                <div class="btn-group" role="group" style="width: 319.094px;font-size: 16px;"><button type="button" name="add_review" id="add_review" style="margin-right: 24px;font-size: 16px;font-family: Alata, sans-serif;background: var(--bs-white);color: var(--bs-dark);border-radius: 20px;height: 45px;border: 2px solid var(--bs-gray-900);border-bottom-color: var(--bs-dark);text-align: center;">Add Review</button></div><br>
                            </h1>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</main>
<!--END OF ABOUT SECTION-->

<!-- START OF MENU SECTION-->
<section id="menu">
    <div class="container">
        <!--Appetizer-->
        <?php
            if(mysqli_num_rows($product) > 0)
            {                           
            $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Appetizer';";
            $result = $con->query($sql);
            foreach($result as $item)
            {
        ?>
        <div class="row ">
            <div class="col-lg-12 text-center">
                <h2 class="text-uppercase section-heading">APPETIZER</h2>
                <h3 class="text-muted section-subheading">PRICE RANGE</h3>
            </div>
        </div>
        <div class="row text-center" style="margin-right: 0px;margin-left: 0px;">
        <a href="businessview.php?id=<?=$item['businessid'];?>" style="text-decoration:none;">
            <div class="col-md-4" style="border-style: solid;border-color: rgb(255,128,64);border-radius: 15px;">
                <img data-bss-hover-animate="pulse" src="uploads/<?= $item['image']; ?>" style="width: 170px;margin-top: 10px;">
                <hr style="height: 2px;">
                <h4 class="section-heading"><?= $item['name']; ?></h4>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">DESCRIPTION:&nbsp<?= $item['description']; ?></p>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">FOOD CATEGORY:&nbsp<?= $item['food_type']; ?></p>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">CUISINE TYPE:&nbsp<?= $item['cuisinename']; ?></p>
                <h4 class="section-heading" style="text-align: right;font-size: 20px;margin-right: 8px;">₱<?= $item['price']; ?></h4>
            </div>
        </a>
        </div>
        <?php
            }
        }
            else
            {
                echo "";
            ?>
        <?php
        }
        ?>
        <!--Soup-->
        <?php
            if(mysqli_num_rows($product) > 0)
            {                                       
            $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Soup';";
            $result = $con->query($sql);
            foreach($result as $item)
            {
        ?>
        <div class="row mt-3">
            <div class="col-lg-12 text-center">
                <h2 class="text-uppercase section-heading">SOUP</h2>
                <h3 class="text-muted section-subheading">PRICE RANGE</h3>
            </div>
        </div>
        <div class="row text-center" style="margin-right: 0px;margin-left: 0px;">
        <a href="businessview.php?id=<?=$item['businessid'];?>" style="text-decoration:none;">
            <div class="col-md-4" style="border-style: solid;border-color: rgb(255,128,64);border-radius: 15px;">
                <img data-bss-hover-animate="pulse" src="uploads/<?= $item['image']; ?>" style="width: 170px;margin-top: 10px;">
                <hr style="height: 2px;">
                <h4 class="section-heading"><?= $item['name']; ?></h4>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">DESCRIPTION:&nbsp<?= $item['description']; ?></p>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">FOOD CATEGORY:&nbsp<?= $item['food_type']; ?></p>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">CUISINE TYPE:&nbsp<?= $item['cuisinename']; ?></p>
                <h4 class="section-heading" style="text-align: right;font-size: 20px;margin-right: 8px;">₱<?= $item['price']; ?></h4>
            </div>
        </a>
        </div>
        <?php
            }
        }
            else
            {
                echo "";
            ?>
        <?php
        }
        ?>
        <!--Fish Dish-->
        <?php
            if(mysqli_num_rows($product) > 0)
            {     
            $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'FishDish';";
            $result = $con->query($sql);
            foreach($result as $item)
            {
        ?>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="text-uppercase section-heading">FISH DISH</h2>
                <h3 class="text-muted section-subheading">PRICE RANGE</h3>
            </div>
        </div>
        <div class="row text-center" style="margin-right: 0px;margin-left: 0px;">
        <a href="businessview.php?id=<?=$item['businessid'];?>" style="text-decoration:none;">
            <div class="col-md-4" style="border-style: solid;border-color: rgb(255,128,64);border-radius: 15px;">
                <img data-bss-hover-animate="pulse" src="uploads/<?= $item['image']; ?>" style="width: 170px;margin-top: 10px;">
                <hr style="height: 2px;">
                <h4 class="section-heading"><?= $item['name']; ?></h4>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">DESCRIPTION:&nbsp<?= $item['description']; ?></p>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">FOOD CATEGORY:&nbsp<?= $item['food_type']; ?></p>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">CUISINE TYPE:&nbsp<?= $item['cuisinename']; ?></p>
                <h4 class="section-heading" style="text-align: right;font-size: 20px;margin-right: 8px;">₱<?= $item['price']; ?></h4>
            </div>
        </a>
        </div>
        <?php
            }
        }
            else
            {
                echo "";
            ?>
        <?php
        }
        ?>
        <!--Meat Dish-->
        <?php
            if(mysqli_num_rows($product) > 0)
            {                  
            $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'MeatDish';";
            $result = $con->query($sql);
            foreach($result as $item)
            {
        ?>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="text-uppercase section-heading">MEAT DISH</h2>
                <h3 class="text-muted section-subheading">PRICE RANGE</h3>
            </div>
        </div>
        <div class="row text-center" style="margin-right: 0px;margin-left: 0px;">
        <a href="businessview.php?id=<?=$item['businessid'];?>" style="text-decoration:none;">
            <div class="col-md-4" style="border-style: solid;border-color: rgb(255,128,64);border-radius: 15px;">
                <img data-bss-hover-animate="pulse" src="uploads/<?= $item['image']; ?>" style="width: 170px;margin-top: 10px;">
                <hr style="height: 2px;">
                <h4 class="section-heading"><?= $item['name']; ?></h4>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">DESCRIPTION:&nbsp<?= $item['description']; ?></p>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">FOOD CATEGORY:&nbsp<?= $item['food_type']; ?></p>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">CUISINE TYPE:&nbsp<?= $item['cuisinename']; ?></p>
                <h4 class="section-heading" style="text-align: right;font-size: 20px;margin-right: 8px;">₱<?= $item['price']; ?></h4>
            </div>
        </a>
        </div>
        <?php
            }
        }
            else
            {
                echo "";
            ?>
        <?php
        }
        ?>        
        <!--Main Course-->
        <?php
            if(mysqli_num_rows($product) > 0)
            {                                     
            $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Main';";
            $result = $con->query($sql);
            foreach($result as $item)
            {
        ?>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="text-uppercase section-heading">MAIN COURSE</h2>
                <h3 class="text-muted section-subheading">PRICE RANGE</h3>
            </div>
        </div>
        <div class="row text-center" style="margin-right: 0px;margin-left: 0px;">
        <a href="businessview.php?id=<?=$item['businessid'];?>" style="text-decoration:none;">
            <div class="col-md-4" style="border-style: solid;border-color: rgb(255,128,64);border-radius: 15px;">
                <img data-bss-hover-animate="pulse" src="uploads/<?= $item['image']; ?>" style="width: 170px;margin-top: 10px;">
                <hr style="height: 2px;">
                <h4 class="section-heading"><?= $item['name']; ?></h4>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">DESCRIPTION:&nbsp<?= $item['description']; ?></p>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">FOOD CATEGORY:&nbsp<?= $item['food_type']; ?></p>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">CUISINE TYPE:&nbsp<?= $item['cuisinename']; ?></p>
                <h4 class="section-heading" style="text-align: right;font-size: 20px;margin-right: 8px;">₱<?= $item['price']; ?></h4>
            </div>
        </a>
        </div>
        <?php
            }
        }
            else
            {
                echo "";
            ?>
        <?php
        }
        ?>    
        <!--Salad-->
        <?php
            if(mysqli_num_rows($product) > 0)
            {                  
            $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Salad';";
            $result = $con->query($sql);
            foreach($result as $item)
            {
        ?>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="text-uppercase section-heading">SALAD</h2>
                <h3 class="text-muted section-subheading">PRICE RANGE</h3>
            </div>
        </div>
        <div class="row text-center" style="margin-right: 0px;margin-left: 0px;">
        <a href="businessview.php?id=<?=$item['businessid'];?>" style="text-decoration:none;">
            <div class="col-md-4" style="border-style: solid;border-color: rgb(255,128,64);border-radius: 15px;">
                <img data-bss-hover-animate="pulse" src="uploads/<?= $item['image']; ?>" style="width: 170px;margin-top: 10px;">
                <hr style="height: 2px;">
                <h4 class="section-heading"><?= $item['name']; ?></h4>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">DESCRIPTION:&nbsp<?= $item['description']; ?></p>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">FOOD CATEGORY:&nbsp<?= $item['food_type']; ?></p>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">CUISINE TYPE:&nbsp<?= $item['cuisinename']; ?></p>
                <h4 class="section-heading" style="text-align: right;font-size: 20px;margin-right: 8px;">₱<?= $item['price']; ?></h4>
            </div>
        </a>
        </div>
        <?php
            }
        }
            else
            {
                echo "";
            ?>
        <?php
        }
        ?>    
        <!--Dessert-->
        <?php
            if(mysqli_num_rows($product) > 0)
            {                                     
            $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Dessert';";
            $result = $con->query($sql);
            foreach($result as $item)
            {
        ?>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="text-uppercase section-heading">DESSERT</h2>
                <h3 class="text-muted section-subheading">PRICE RANGE</h3>
            </div>
        </div>
        <div class="row text-center" style="margin-right: 0px;margin-left: 0px;">
        <a href="businessview.php?id=<?=$item['businessid'];?>" style="text-decoration:none;">
            <div class="col-md-4" style="border-style: solid;border-color: rgb(255,128,64);border-radius: 15px;">
                <img data-bss-hover-animate="pulse" src="uploads/<?= $item['image']; ?>" style="width: 170px;margin-top: 10px;">
                <hr style="height: 2px;">
                <h4 class="section-heading"><?= $item['name']; ?></h4>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">DESCRIPTION:&nbsp<?= $item['description']; ?></p>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">FOOD CATEGORY:&nbsp<?= $item['food_type']; ?></p>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">CUISINE TYPE:&nbsp<?= $item['cuisinename']; ?></p>
                <h4 class="section-heading" style="text-align: right;font-size: 20px;margin-right: 8px;">₱<?= $item['price']; ?></h4>
            </div>
        </a>
        </div>
        <?php
            }
        }
            else
            {
                echo "";
            ?>
        <?php
        }
        ?>    
        <!--Drinks-->
        <?php
            if(mysqli_num_rows($product) > 0)
            {                                        
            $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Drinks';";
            $result = $con->query($sql);
            foreach($result as $item)
            {
        ?>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="text-uppercase section-heading">DRINKS</h2>
                <h3 class="text-muted section-subheading">PRICE RANGE</h3>
            </div>
        </div>
        <div class="row text-center" style="margin-right: 0px;margin-left: 0px;">
        <a href="businessview.php?id=<?=$item['businessid'];?>" style="text-decoration:none;">
            <div class="col-md-4" style="border-style: solid;border-color: rgb(255,128,64);border-radius: 15px;">
                <img data-bss-hover-animate="pulse" src="uploads/<?= $item['image']; ?>" style="width: 170px;margin-top: 10px;">
                <hr style="height: 2px;">
                <h4 class="section-heading"><?= $item['name']; ?></h4>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">DESCRIPTION:&nbsp<?= $item['description']; ?></p>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">FOOD CATEGORY:&nbsp<?= $item['food_type']; ?></p>
                <p class="text-start text-muted mb-0" style="margin-left: 10px;">CUISINE TYPE:&nbsp<?= $item['cuisinename']; ?></p>
                <h4 class="section-heading" style="text-align: right;font-size: 20px;margin-right: 8px;">₱<?= $item['price']; ?></h4>
            </div>
        </a>
        </div>
        <?php
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
    </section>
<!-- END OF MENU SECTION-->

<!-- START OF REVIEW SECTION-->
    <section id="review">
        <div class="container">
            <div class="card">
                <div class="card-header">Restaurant Feedback</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 text-center">
                            <h1 class="text-warning mt-4 mb-4">
                                <b><span id="average_rating">0.0</span> / 5</b>
                            </h1>
                            <div class="mb-3">
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                                <i class="fas fa-star star-light mr-1 main_star"></i>
                            </div>
                            <h3><span id="total_review">0</span> Review/s</h3>
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
        <div class="mapouter">
            <div class="gmap_canvas"><iframe src="https://maps.google.com/maps?q=<?=$latitude?>,<?=$longitude?>&output=embed" style="width: 1020px; height: 800px;"></iframe>
                <br><style>.mapouter{position:relative;text-align:center;height:100%;width:100%;}</style>
                <style>.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style>
            </div>
        </div>
    </section>
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
