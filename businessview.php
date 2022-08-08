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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="home.css"> 
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Akaya%20Kanadaka.css">
    <link rel="stylesheet" href="assets/css/Alata.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/assets/css/vanilla-zoom.min.css">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Kannada&display=swap" rel="stylesheet">
    <title>I-Eat | Home </title> 

    <!-- Favicon -->
    <link rel="icon" href="uploads/favicon.ico"/>
</head>
<header style="height:100px;">
            <div class="logo" style="float:left; margin:0px; padding-top:10px; padding-left:30px;">
                <img src="uploads/I-EatLogo.png" alt="LOGO" usemap="#workmap" width="80" height="80">
            <map name="workmap">
                <area shape="circle" coords="100,100,400,400" alt="logo" href="index.php">
            </map>
            </div>
            <div class="nav-menu" style="padding-top:30px;">
           
                <?php if(empty($_SESSION["auth"])&&empty($_SESSION["business_email"]))
                {// if user is not login
                    ?>
                    <button class="loginbtn" onclick="location.href='login.php'">Login</button>  
                    <button class="loginbtn" onclick="location.href='register.php'">Sign Up</button>  
                               
                <?php 
                }
                elseif(isset($_SESSION['auth']))
                {
                        if($_SESSION['auth_user']['role_as'] == "0")
                        {
                        ?>
                                            
                            <h2> Welcome <strong><?= $_SESSION['auth_user']['name'];?></strong>!</h2>
                                <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                                            <img class="border rounded-circle img-profile" style="width:40px;height:40px;" src="uploads/<?= $_SESSION['auth_user']['image'];?>"></a>
                                    <div class="dropdown-menu position-fixed">
                                        <a class="dropdown-item" href="your_reservation.php?id=<?= $_SESSION['auth_user']['userid'];?>" style="font-size:16px;text-align:left;"><i class="far fa-calendar alt"></i>&nbsp;Reservations</a>
                                        <a class="dropdown-item" href="changepassword.php?id=<?= $_SESSION['auth_user']['userid'];?>" style="font-size:16px;text-align:left;"><i class="far fa-key"></i>&nbsp;Change Password</a>
                                        <a class="dropdown-item" href="profile.php?id=<?= $_SESSION['auth_user']['userid'];?>"style="font-size:16px; text-align:left;"><i class="far fa-user"></i>&nbsp;Profile</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="logout.php"style="font-size:16px;text-align:left;"><i class="far fa-sign-out alt"></i>&nbsp;Logout</a>
                                    </div>
                                </div>

                        <?php
                        }
                        else if($_SESSION['auth_user']['role_as'] == "2")
                        {
                            ?>
                            <h2> Welcome <strong><?= $_SESSION['auth_user']['business_name'];?></strong> !</h2>
                            <button class="loginbtn" onclick="location.href='business/index.php?id=<?= $_SESSION['auth_user']['businessid'];?>'">Dashboard</button>  
                            <button class="loginbtn" onclick="location.href='logout.php'">Logout</button>

                         <?php
                        }
                        else
                        {
                            ?>
                            <h2> Welcome <strong><?= $_SESSION['auth_user']['name'];?></strong> !</h2>
                            <button class="loginbtn" onclick="location.href='admin/index.php'">Dashboard</button>  
                            <button class="loginbtn" onclick="location.href='logout.php'">Logout</button>
                            <?php 
                        }
                    
                    ?> 
                    <?php 
                }
                elseif(isset($_SESSION['business_email'])) 
                {
                ?>
                    <!--if user is login-->
                    <h2> Welcome <strong><?php echo $_SESSION['business_name']; ?></strong> !</h2>
                    <button class="loginbtn" onclick="location.href='business/admin.php'">Dashboard</button>  
                    <button class="loginbtn" onclick="location.href='logout.php'">Logout</button>
                 
                <?php } ?>
            </div>
    </header>
<main class="page product-page">
        <section class="clean-block clean-product">
            <div class="container mt-3" style="width: auto; height:auto;">
            <div class="block-content" style="width: auto;padding-top: 0px; ">
                <div class="block-heading" style="padding-top: 30px;margin-bottom: 9px;">
                    <div class="col-md-12 d-xxl-flex justify-content-xxl-center" style="padding:50px;height: 600px; background-color:rgb(255,128,64);"><img class="img-fluid d-flex align-self-center justify-content-xl-start justify-content-xxl-center" style="width: 1100px;height: 500px;margin-top: 0px;box-shadow: 0px 0px 10px var(--bs-gray);border-radius: 5px;margin-bottom: 0px;" src="uploads/<?= $data['image']; ?>" width="200px" height="200px" loading="auto"></div>
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
                                <div class="btn-group" role="group" style="width: 319.094px;font-size: 16px;"><button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" onclick="location='reservation.php?id=<?= $data['businessid']; ?>'" style="margin-right: 24px;font-size: 16px;font-family: Alata, sans-serif;background:rgb(255,128,64);border-radius: 20px;height: 45px;border-style: none;border-bottom-style: none;text-align: center;">Make Reservation</button><button type="button" name="add_review" id="add_review" style="margin-right: 24px;font-size: 16px;font-family: Alata, sans-serif;background: var(--bs-white);color: var(--bs-dark);border-radius: 20px;height: 45px;border: 2px solid var(--bs-gray-900);border-bottom-color: var(--bs-dark);text-align: center;">Add Review</button></div><br>
                            </h1>
                        </div>
                    </div>
                    <div class="product-info">
                        <div style="margin-top: 27px;">
                            <ul class="nav nav-tabs" role="tablist" id="myTab">
                                <li class="nav-item" role="presentation"><a class="nav-link active" role="tab" data-bs-toggle="tab" id="description-tab" href="#description">Menu</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" id="specifications-tabs" href="#reviews">Reviews</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="tab" id="reviews-tab" href="#specifications">Location</a></li>
                            </ul>
                            <div class="tab-content " id="myTabContent">
                                <div class="tab-pane fade show active  description" role="tabpanel" id="description" style="margin-right: 40px;margin-left: 40px;padding-top: 40px;">
                                <div class="row" >
                                    <div class="col-md-9 d-flex " style="width: 100%;">
                                    <div class="products">
                                <div class="row g-0 " style="margin-left: 0px; border:none;">
                                <!--Appetizer-->
                                <?php
                                if(mysqli_num_rows($product) > 0)
                                    {
                                        
                                        $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Appetizer';";
                                        $result = $con->query($sql);
                                        foreach($result as $item)
                                        {
                                ?>
                                    <h1> Appetizer </h1>
                                    <div class="col-12 col-md-6 mb-2 ml-2 col-lg-4" style="border:1px solid black; width: 250px; height:360px;">
                                        <div class="clean-product-item">
                                        <a href="businessview.php?id=<?=$item['businessid'];?>">
                                            <div class="image"><img class="img-fluid d-block mx-auto " src="uploads/<?= $item['image']; ?>" style="height:140px; width: 200px;"></div>
                                            <div class="product-name mb-0">
                                                <a class="d-flex" href="#"><strong><?= $item['name']; ?></strong></a></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Description:<?= $item['description']; ?></small></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Food Type:<?= $item['food_type']; ?></small></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Cuisine Type:<?= $item['cuisinename']; ?></small></div>
                                            <div class="about">
                                                <!--<div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>-->
                                               
                                            </div>
                                        </a>
                                        <strong class="fw-bold text-end float-end d-xxl-flex justify-content-xxl-end" style="font-size: 20px;margin-bottom: 5px; float:right;">₱<?= $item['price']; ?></strong>
                                        </div>
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
                                    <h1> Soup </h1>
                                    <div class="col-12 col-md-6 mb-2 ml-2 col-lg-4" style="border:1px solid black; width: 250px; height:360px;">
                                        <div class="clean-product-item">
                                        <a href="businessview.php?id=<?=$item['businessid'];?>">
                                            <div class="image"><img class="img-fluid d-block mx-auto " src="uploads/<?= $item['image']; ?>" style="height:140px; width: 200px;"></div>
                                            <div class="product-name mb-0">
                                                <a class="d-flex" href="#"><strong><?= $item['name']; ?></strong></a></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Description:<?= $item['description']; ?></small></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Food Type:<?= $item['food_type']; ?></small></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Cuisine Type:<?= $item['cuisinename']; ?></small></div>
                                            <div class="about">
                                                <!--<div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>-->
                                               
                                            </div>
                                        </a>
                                        <strong class="fw-bold text-end float-end d-xxl-flex justify-content-xxl-end" style="font-size: 20px;margin-bottom: 5px; float:right;">₱<?= $item['price']; ?></strong>
                                        </div>
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
                                    <h1> FishDish </h1>
                                    <div class="col-12 col-md-6 mb-2 ml-2 col-lg-4" style="border:1px solid black; width: 250px; height:360px;">
                                        <div class="clean-product-item">
                                        <a href="businessview.php?id=<?=$item['businessid'];?>">
                                            <div class="image"><img class="img-fluid d-block mx-auto " src="uploads/<?= $item['image']; ?>" style="height:140px; width: 200px;"></div>
                                            <div class="product-name mb-0">
                                                <a class="d-flex" href="#"><strong><?= $item['name']; ?></strong></a></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Description:<?= $item['description']; ?></small></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Food Type:<?= $item['food_type']; ?></small></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Cuisine Type:<?= $item['cuisinename']; ?></small></div>
                                            <div class="about">
                                                <!--<div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>-->
                                               
                                            </div>
                                        </a>
                                        <strong class="fw-bold text-end float-end d-xxl-flex justify-content-xxl-end" style="font-size: 20px;margin-bottom: 5px; float:right;">₱<?= $item['price']; ?></strong>
                                        </div>
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
                                    <h1> MeatDish </h1>
                                    <div class="col-12 col-md-6 mb-2 ml-2 col-lg-4" style="border:1px solid black; width: 250px; height:360px;">
                                        <div class="clean-product-item">
                                        <a href="businessview.php?id=<?=$item['businessid'];?>">
                                            <div class="image"><img class="img-fluid d-block mx-auto " src="uploads/<?= $item['image']; ?>" style="height:140px; width: 200px;"></div>
                                            <div class="product-name mb-0">
                                                <a class="d-flex" href="#"><strong><?= $item['name']; ?></strong></a></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Description:<?= $item['description']; ?></small></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Food Type:<?= $item['food_type']; ?></small></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Cuisine Type:<?= $item['cuisinename']; ?></small></div>
                                            <div class="about">
                                                <!--<div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>-->
                                               
                                            </div>
                                        </a>
                                        <strong class="fw-bold text-end float-end d-xxl-flex justify-content-xxl-end" style="font-size: 20px;margin-bottom: 5px; float:right;">₱<?= $item['price']; ?></strong>
                                        </div>
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
                                <!--Main-->
                                <?php
                                if(mysqli_num_rows($product) > 0)
                                {
                                        
                                    $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Main';";
                                    $result = $con->query($sql);
                                    foreach($result as $item)
                                    {
                                ?>
                                    <h1> Main Course </h1>
                                    <div class="col-12 col-md-6 mb-2 ml-2 col-lg-4" style="border:1px solid black; width: 250px; height:360px;">
                                        <div class="clean-product-item">
                                        <a href="businessview.php?id=<?=$item['businessid'];?>">
                                            <div class="image"><img class="img-fluid d-block mx-auto " src="uploads/<?= $item['image']; ?>" style="height:140px; width: 200px;"></div>
                                            <div class="product-name mb-0">
                                                <a class="d-flex" href="#"><strong><?= $item['name']; ?></strong></a></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Description:<?= $item['description']; ?></small></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Food Type:<?= $item['food_type']; ?></small></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Cuisine Type:<?= $item['cuisinename']; ?></small></div>
                                            <div class="about">
                                                <!--<div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>-->
                                               
                                            </div>
                                        </a>
                                        <strong class="fw-bold text-end float-end d-xxl-flex justify-content-xxl-end" style="font-size: 20px;margin-bottom: 5px; float:right;">₱<?= $item['price']; ?></strong>
                                        </div>
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
                                    <h1> Salad </h1>
                                    <div class="col-12 col-md-6 mb-2 ml-2 col-lg-4" style="border:1px solid black; width: 250px; height:360px;">
                                        <div class="clean-product-item">
                                        <a href="businessview.php?id=<?=$item['businessid'];?>">
                                            <div class="image"><img class="img-fluid d-block mx-auto " src="uploads/<?= $item['image']; ?>" style="height:140px; width: 200px;"></div>
                                            <div class="product-name mb-0">
                                                <a class="d-flex" href="#"><strong><?= $item['name']; ?></strong></a></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Description:<?= $item['description']; ?></small></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Food Type:<?= $item['food_type']; ?></small></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Cuisine Type:<?= $item['cuisinename']; ?></small></div>
                                            <div class="about">
                                                <!--<div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>-->
                                               
                                            </div>
                                        </a>
                                        <strong class="fw-bold text-end float-end d-xxl-flex justify-content-xxl-end" style="font-size: 20px;margin-bottom: 5px; float:right;">₱<?= $item['price']; ?></strong>
                                        </div>
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
                                    <h1> Dessert </h1>
                                    <div class="col-12 col-md-6 mb-2 ml-2 col-lg-4" style="border:1px solid black; width: 250px; height:360px;">
                                        <div class="clean-product-item">
                                        <a href="businessview.php?id=<?=$item['businessid'];?>">
                                            <div class="image"><img class="img-fluid d-block mx-auto " src="uploads/<?= $item['image']; ?>" style="height:140px; width: 200px;"></div>
                                            <div class="product-name mb-0">
                                                <a class="d-flex" href="#"><strong><?= $item['name']; ?></strong></a></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Description:<?= $item['description']; ?></small></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Food Type:<?= $item['food_type']; ?></small></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Cuisine Type:<?= $item['cuisinename']; ?></small></div>
                                            <div class="about">
                                                <!--<div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>-->
                                               
                                            </div>
                                        </a>
                                        <strong class="fw-bold text-end float-end d-xxl-flex justify-content-xxl-end" style="font-size: 20px;margin-bottom: 5px; float:right;">₱<?= $item['price']; ?></strong>
                                        </div>
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
                                    <h1> Drinks </h1>
                                    <div class="col-12 col-md-6 mb-2 ml-2 col-lg-4" style="border:1px solid black; width: 250px; height:360px;">
                                        <div class="clean-product-item">
                                        <a href="businessview.php?id=<?=$item['businessid'];?>">
                                            <div class="image"><img class="img-fluid d-block mx-auto " src="uploads/<?= $item['image']; ?>" style="height:140px; width: 200px;"></div>
                                            <div class="product-name mb-0">
                                                <a class="d-flex" href="#"><strong><?= $item['name']; ?></strong></a></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Description:<?= $item['description']; ?></small></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Food Type:<?= $item['food_type']; ?></small></div>
                                                <div class="product-details m-0" ><small style="font-size:12px;">Cuisine Type:<?= $item['cuisinename']; ?></small></div>
                                            <div class="about">
                                                <!--<div class="rating"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star.svg"><img src="assets/img/star-half-empty.svg"><img src="assets/img/star-empty.svg"></div>-->
                                               
                                            </div>
                                        </a>
                                        <strong class="fw-bold text-end float-end d-xxl-flex justify-content-xxl-end" style="font-size: 20px;margin-bottom: 5px; float:right;">₱<?= $item['price']; ?></strong>
                                        </div>
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
                            </div>
                                    </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade specifications" role="tabpanel" id="specifications"><div class="mapouter"><div class="gmap_canvas"><iframe src="https://maps.google.com/maps?q=<?=$latitude?>,<?=$longitude?>&output=embed" style="width: 1020px; height: 800px;"></iframe><br><style>.mapouter{position:relative;text-align:center;height:100%;width:100%;}</style><style>.gmap_canvas {overflow:hidden;background:none!important;height:100%;width:100%;}</style></div></div></div>
                                <div class="tab-pane fade" role="tabpanel" id="reviews">
                                  
                                    <div class="container mt-3">
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
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-5" id="review_content"></div>
                                    </div>
                                    

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
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
