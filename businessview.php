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
    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css">
    <link rel="stylesheet" href="assets/css/Acme.css">
    <link rel="stylesheet" href="assets/css/untitled-1.css">
    <link rel="stylesheet" href="assets/css/untitled-2.css">
    <link rel="stylesheet" href="assets/css/untitled-3.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/Vujahday%20Script.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>    
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
                            <li class="nav-item"><a class="nav-link" href="#location">LOCATION</a></li>
                            <li class="nav-item"><a class="nav-link" href="#menu">MENU</a></li>
                            <li class="nav-item"><a class="nav-link" href="#review">REVIEWS</a></li>
                            <li class="nav-item dropdown no-arrow mx-1">
                        <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle notificationtoggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter count"></span><i class="fas fa-bell fa-fw"></i></a>
                            <div class="dropdown-menu notification dropdown-menu-end dropdown-list animated--grow-in">
                                <h6 class="dropdown-header">Notification/s</h6>
                            </div>
                        </div>
                    </li>
                    <script>
                    $(document).ready(function(){
                    
                    function load_unseen_notification(view = '')
                    {
                    $.ajax({
                    url:"fetchnotification.php?id=<?= $_SESSION['auth_user']['userid'];?>",
                    method:"POST",
                    data:{view:view},
                    dataType:"json",
                    success:function(data)
                    {
                        $('.notification').html(data.notification);
                        if(data.unseen_notification > 0)
                        {
                        $('.count').html(data.unseen_notification);
                        }
                    }
                    });
                    }
                    
                    load_unseen_notification();
                    
                    //  $('#comment_form').on('submit', function(event){
                    //   event.preventDefault();
                    //   if($('#subject').val() != '' && $('#comment').val() != '')
                    //   {
                    //     alert($('#subject').val());
                    //     alert($('#comment').val());
                    //    var form_data = $(this).serialize();
                    //    $.ajax({
                    //     url:"insert.php",
                    //     method:"POST",
                    //     data:form_data,
                    //     success:function(data)
                    //     {
                    //      $('#comment_form')[0].reset();
                    //      load_unseen_notification();
                    //     }
                    //    });
                    //   }
                    //   else
                    //   {
                    //    alert("Both Fields are Required");
                    //   }
                    //  });
                    
                    $(document).on('click', '.notificationtoggle', function(){
                    $('.count').html('');
                    load_unseen_notification('yes');
                    });
                    
                    setInterval(function(){ 
                    load_unseen_notification();; 
                    }, 5000);
                    
                    });
                    </script>
                          
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
                            <a class="dropdown-item" href="logout.php"style="font-size:16px;text-align:left;"><i class="fa fa-sign-out alt"></i>&nbsp;Logout</a>
                        </div>
                    </div>
                        <a class="navbar-brand" href="#page-top" style="color: white;font-size: 20px;">
                        &nbspWelcome <strong><?= $_SESSION['auth_user']['business_name'];?></strong>!</a>
                    <button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav d-lg-flex ms-auto align-items-lg-center text-uppercase">
                            <li class="nav-item"><a class="nav-link" href="index.php#page-top" active>HOME</a></li>
                            <li class="nav-item"><a class="nav-link" href="#aboutrestaurant">ABOUT</a></li>
                            <li class="nav-item"><a class="nav-link" href="#location">LOCATION</a></li>
                            <li class="nav-item"><a class="nav-link" href="#menu">MENU</a></li>
                            <li class="nav-item"><a class="nav-link" href="#review">REVIEWS</a></li>
                           
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
                            <li class="nav-item"><a class="nav-link" href="#location">LOCATION</a></li>
                            <li class="nav-item"><a class="nav-link" href="#menu">MENU</a></li>
                            <li class="nav-item"><a class="nav-link" href="#review">REVIEWS</a></li>
                            
                           
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
                            <a class="dropdown-item" href="logout.php"style="font-size:16px;text-align:left;"><i class="fa fa-sign-out alt"></i>&nbsp;Logout</a>
                        </div>
                    </div>
                        <a class="navbar-brand" href="#page-top" style="color: white;font-size: 20px;">
                        &nbspWelcome <strong><?php echo $_SESSION['auth_user']['business_name']; ?></strong>!</a>
                    <button data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i class="fa fa-bars"></i></button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav d-lg-flex ms-auto align-items-lg-center text-uppercase">
                            <li class="nav-item"><a class="nav-link" href="index.php#page-top" active>HOME</a></li>
                            <li class="nav-item"><a class="nav-link" href="#aboutrestaurant">ABOUT</a></li>
                            <li class="nav-item"><a class="nav-link" href="#location">LOCATION</a></li>
                            <li class="nav-item"><a class="nav-link" href="#menu">MENU</a></li>
                            <li class="nav-item"><a class="nav-link" href="#review">REVIEWS</a></li>
                            
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav> 
<!--END OF LOGIN-->
<main class="page project-page ">
    <section class="portfolio-block project p-0">
        <div class="container w-75 busiContainer">
            <!-- START OF ABOUT SECTION-->
                <div class="container mb-4" id="aboutrestaurant">
                    <div class="row">
                        <div class="col-md-8 p-0"> 
                            <!--image slider start-->
                            <div class="slider">
                                <div class="slides">
                                    <!--radio buttons start-->
                                    <input type="radio" name="radio-btn" id="radio1">
                                    <input type="radio" name="radio-btn" id="radio2">
                                    <input type="radio" name="radio-btn" id="radio3">
                                    <input type="radio" name="radio-btn" id="radio4">
                                    <input type="radio" name="radio-btn" id="radio5">
                                    <!--radio buttons end-->
                                    <!--slide images start-->
                                    <div class="slide first">
                                    <img src="uploads/<?= $data['image']; ?>" alt="Logo">
                                    </div>
                                    <div class="slide">
                                    <img src="certificate/<?= $data['image_cert']; ?>" alt="Business Permit">
                                    </div>
                                    <div class="slide">
                                    <img src="certificate/<?= $data['image_scert']; ?>" alt="Sanitary Permit">
                                    </div>
                                    <div class="slide">
                                    <img src="certificate/<?= $data['image_fcert']; ?>" alt="Fire Safety Permit">
                                    </div>
                                    <div class="slide">
                                    <img src="certificate/<?= $data['image_bcert']; ?>" alt="Barangay Clearance Permit">
                                    </div>
                                    <!--slide images end-->
                                    <!--automatic navigation start-->
                                    <div class="navigation-auto">
                                    <div class="auto-btn1"></div>
                                    <div class="auto-btn2"></div>
                                    <div class="auto-btn3"></div>
                                    <div class="auto-btn4"></div>
                                    <div class="auto-btn5"></div>
                                    </div>
                                    <!--automatic navigation end-->
                                </div>
                                <!--manual navigation start-->
                                <div class="navigation-manual">
                                    <label for="radio1" class="manual-btn"></label>
                                    <label for="radio2" class="manual-btn"></label>
                                    <label for="radio3" class="manual-btn"></label>
                                    <label for="radio4" class="manual-btn"></label>
                                    <label for="radio5" class="manual-btn"></label>
                                </div>
                            <!--manual navigation end-->
                            </div>
                            <!--image slider end-->
                          
                        </div>
                        <div class="col-md-4" >
                            <h1 ><?= $data['business_name']; ?></h1>
                            <p><i class="fas fa-utensils text-black"></i>&nbsp;&nbsp;<?= $data['cuisinename']; ?> Cuisine</p>
                            <p><i class="fas fa-phone-alt text-black"></i>&nbsp;&nbsp;<?= $data['business_number']; ?></p>
                            <p><i class="fas fa-clock text-black"></i>&nbsp;&nbsp;Open : <?=  date("g:i a", strtotime($opening));?> - Close: <?= date("g:i a", strtotime($closing)); ?></p>
                            <!-- Reservation -->
                            <?php
                                //$businessuser = $_SESSION['auth_user']['businessid'];
                                $businessid = $data['businessid'];
                                $query_rating = "SELECT ROUND(AVG(user_rating),1) AS averagerating FROM review_table WHERE businessid = $businessid ORDER BY review_id";
                                $query_rating_run = mysqli_query($con, $query_rating);
                                $row_rating = mysqli_fetch_assoc($query_rating_run);

                                if(!$row_rating['averagerating'])
                                {
                                    echo '<span> No Rating</span>';
                                }
                                else
                                {
                                    echo '<span><i class="fas fa-star text-warning"></i>&nbsp;&nbsp;'.$row_rating['averagerating'].'/5</span>';
                                }
                                $query_rating_count = "SELECT review_id FROM review_table WHERE businessid = $businessid ORDER BY review_id";
                                $query_rating_count_run = mysqli_query($con, $query_rating_count);
                                $row_rating_count = mysqli_num_rows($query_rating_count_run);
                                echo '<span> ('.$row_rating_count.' review/s)</span><br>';
                            ?>
                            <?php
                            if(isset($_SESSION['auth'])){
                                if ($_SESSION['role_as'] == 0) 
                                {
                                    // redirect("index.php", "You are not authorized to access this page", "warning");
                            ?>
                                    <button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" onclick="location='reservation.php?id=<?= $data['businessid']; ?>&uid=<?= $_SESSION['auth_user']['userid']; ?>'">Make Reservation</button>
                            <?php
                                }
                                else
                                {
                                    // redirect("index.php", "You are not authorized to access this page", "warning");
                            ?>
                                    <button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" onclick="location='reservation.php?id=<?= $data['businessid']; ?>'">Make Reservation</button>
                            <?php

                                }   
                            }
                            else
                            {
                            ?>
                            <button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" onclick="location='reservation.php?id=<?= $data['businessid']; ?>'">Make Reservation</button>
                            <?php
                            }
                            ?>
                        <!-- <button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" onclick="location='reservation.php?id=<?= $data['businessid']; ?>'">Make Reservation</button>-->
                            <!-- Feedback -->
                            <?php
                                if(isset($_SESSION['auth'])){

                                    if ($_SESSION['role_as'] == 0) 
                                    {
                                        // redirect("index.php", "You are not authorized to access this page", "warning");
                                        $userid = $_SESSION['auth_user']['userid'];
                                        $query_feedback = "SELECT * FROM reservations WHERE userid = '$userid' AND businessid = '$id' AND status = '1' AND arrived = '1' AND review = '0' ORDER BY reservationid DESC";
                                        $query_feedback_run = mysqli_query($con, $query_feedback );
                                        $feedback = mysqli_fetch_array($query_feedback_run);
                                        

                                        if(mysqli_num_rows($query_feedback_run)>0)
                                        {
                                            ?>
                                            <!-- <p>You Have </p> -->
                                            <button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" onclick="location='feedback.php?id=<?= $feedback['reservationid'];?>'">ADD REVIEW</button>
                                            <!-- <a href="feedback.php?id=<?= $feedback['reservation'];?>" class="btn btnSummary w-100" type="submit">ADD REVIEW</a> -->
                                            
                                            <?php
                                        }
                                ?>
                                        
                                <?php
                                    }
                                    else
                                    {
                                        // redirect("index.php", "You are not authorized to access this page", "warning");
                                ?>
                                        <!-- <button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" onclick="location='reservation.php?id=<? //$data['businessid']; ?>'">Make Reservation</button> -->
                                <?php

                                    }   
                                }
                                else
                                {
                                ?>
                                <!-- <button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" onclick="location='reservation.php?id=<?= $data['businessid']; ?>'">Make Reservation</button> -->
                                <?php
                                }
                                ?>
                                <!-- Alert -->
                                <?php
                                if(isset($_SESSION['auth'])){

                                    if ($_SESSION['role_as'] == 0) 
                                    {
                                        // redirect("index.php", "You are not authorized to access this page", "warning");
                                        // $userid = $_SESSION['auth_user']['userid'];
                                        $query_notice= "SELECT * FROM reservations JOIN managetable ON reservations.tableid=managetable.tableid WHERE reservations.userid = '$userid' AND reservations.businessid = '$id' AND reservations.review = '0' ORDER BY reservationid DESC";
                                        $query_notice_run = mysqli_query($con, $query_notice);
                                        $notice = mysqli_fetch_array($query_notice_run);

                                        if(mysqli_num_rows($query_notice_run)>0)
                                        {
                                            ?>
                                            <p><span><b>You Have Reservation Here<br></b></span></p>
                                            <?php
                                            foreach ($query_notice_run as $item)
                                            {
                                            ?>
                                            <p><b>TableID:</b><?=$item['table_number']?>&nbsp <b>Date:</b><?=$item['reservation_date']?>&nbsp <b>Time:</b><?=$item['reservation_time']?></p>    
                                            <?php
                                            }
                                        }
                                        // if($notice['arrived'] == "1")
                                        // {
                                        //     ?>
                                        <!-- //     <p>Waiting for Your Review<br></p> -->
                                             <?php
                                        //     foreach ($query_notice_run as $item)
                                        //     {
                                        //     ?>
                                        <!-- //     <p>Date:<?=$item['reservation_date']?> Time:<?=$item['reservation_time']?></p>     -->
                                            <?php
                                        //     }
                                        // }
                                ?>
                                        
                                <?php
                                    }
                                    else
                                    {
                                        // redirect("index.php", "You are not authorized to access this page", "warning");
                                ?>
                                        <!-- <button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" onclick="location='reservation.php?id=<? //$data['businessid']; ?>'">Make Reservation</button> -->
                                <?php

                                    }   
                                }
                                else
                                {
                                ?>
                                <!-- <button class="btn btn-primary" data-bss-hover-animate="pulse" type="button" onclick="location='reservation.php?id=<?= $data['businessid']; ?>'">Make Reservation</button> -->
                                <?php
                                }
                                ?>
                        </div>
                    </div><hr class="m-0 w-100">
                </div>
                 <!--END OF ABOUT SECTION-->
                <!-- START OF LOCATION SECTION-->
                <div class="col-md-12 p-2 mb-4" id="location">
                    <h1 class="mx-4 fs-4"><i class="fas fa-map-marked"></i>&nbsp;&nbsp;Located at  &nbsp;<?= $data['business_address']; ?></h1>
                    <div class="mapouter">
                        <?php 
                            $query_business_location = "SELECT * FROM business WHERE businessid = $id";
                            $query_business_location_run = mysqli_query($con, $query_business_location);
                            $data = mysqli_fetch_array($query_business_location_run);
                        ?>
                        <input type="hidden" id="address" name="address">
                            <input type="hidden" id="latitude" name="latitude" value="<?=$data['latitude'];?>">
                            <input type="hidden" id="longitude" name="longitude" value="<?=$data['longitude'];?>">
                            <input type="hidden" id="business_name" name="business_name" value="<?=$data['business_name'];?>">
                            <input type="hidden" id="business_address" name="business_address" value="<?=$data['business_address'];?>">
                            <input type="hidden" id="cuisinename" name="cuisinename" value="<?=$data['cuisinename'];?>">
                            <input type="hidden" id="opening" name="opening" value="<?=$data['opening'];?>">
                            <input type="hidden" id="closing" name="closing" value="<?=$data['closing'];?>">
                        <div id="map" style=" height: 300px;"></div>
                    </div>
                </div>
                <!--END OF LOCATIONa SECTION-->    
                    <!-- START OF MENU SECTION-->
                    <h1 class="mx-4 fs-3"><i class="fas fa-utensils"></i>&nbsp;&nbsp;MENUS</h1>
                    <div class="container mb-4" id="menu">
                        <div>
                            <ul class="nav nav-tabs d-md-flex " role="tablist">
                                <li class="nav-item" style="font-size:12px;" role="presentation">
                                    <a class="nav-link active" role="tab" data-bs-toggle="tab" href="#allmenu">
                                        <span>ALL</span><br></a></li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" role="tab" data-bs-toggle="tab" href="#maincourse">
                                        <span>MAIN COURSE</span><br></a></li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" role="tab" data-bs-toggle="tab" href="#soup">
                                        <span>SOUP</span></a></li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" role="tab" data-bs-toggle="tab" href="#appetizer">
                                        <span>APPETIZER</span></a></li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" role="tab" data-bs-toggle="tab" href="#fishdish">
                                        <span>FISH DISH</span></a></li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" role="tab" data-bs-toggle="tab" href="#meatdish">
                                        <span>MEAT DISH</span></a></li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" role="tab" data-bs-toggle="tab" href="#dessert">
                                        <span>DESSERT</span></a></li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" role="tab" data-bs-toggle="tab" href="#salad" >
                                        <span>SALAD</span></a></li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" role="tab" data-bs-toggle="tab" href="#drinks">
                                        <span>DRINKS</span></a></li>
                            </ul>
                        <div class="tab-content">
                            <!--All-->
                            <div class="tab-pane active" role="tabpanel" id="allmenu">
                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                                <div class="row mt-5">   
                                                    <?php
                                                        if(mysqli_num_rows($product) > 0)
                                                        {                           
                                                        $sql = "SELECT * FROM `products` WHERE businessid = $bid AND NOT status='2' ORDER BY productid DESC";
                                                        $result = $con->query($sql);
                                                        foreach($result as $item)
                                                        {
                                                            if( $item['status'] == '1')
                                                            {
                                                    ?>                                      
                                                    <div class="col-md-3">
                                                        <div class="clean-pricing-item">
                                                            <img class="rounded img-fluid" src="uploads/<?= $item['image']; ?>" style="opacity: 1;">
                                                            <div class="heading">
                                                                <h6 class="mb-0 "><?= $item['name']; ?></h6>
                                                            </div>
                                                            <p><?= $item['cuisinename']; ?> Cuisine</p>
                                                            <div class="price">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p>₱<?= $item['price']; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <button class="btn btn-primary d-block w-100" type="submit" href="#menu_description<?= $item['productid'] ?>" data-bs-target="#menu_description<?= $item['productid'] ?>" data-bs-toggle="modal">View</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--FOR MODAL PER MENU--> 
                                                        <div class="modal fade" role="dialog" tabindex="-1" id="menu_description<?= $item['productid'] ?>">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                                                                    <div class="modal-body">
                                                                        <div class="menu_description p-0"><img class="rounded img-fluid modal_img" src="uploads/<?= $item['image']; ?>">
                                                                            <h4 class="modal-title text-start"><?= $item['name']; ?><p class="float-end">₱<?= $item['price']; ?></p></h4>
                                                                            <p class="text-start p-0"><?= $item['cuisinename']; ?> Cuisine</p>
                                                                            <p><?= $item['description']; ?></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!--CLOSING FOR MODAL PER MENU-->    
                                                    </div>                               
                                                    <?php
                                                        }
                                                        elseif( $item['status'] == '0')
                                                        {
                                                    ?>
                                                    <div class="col-md-3">
                                                        <div class="clean-pricing-item" style="opacity: 0.70;">
                                                            <img class="rounded img-fluid" src="uploads/<?= $item['image']; ?>" style="opacity: 0.30;">
                                                            <div class="ribbon">
                                                                <span>SOLD OUT</span>
                                                            </div>
                                                            <div class="heading">
                                                                <h6 class="mb-0"><?= $item['name']; ?></h6>
                                                            </div>
                                                            <p><?= $item['cuisinename']; ?> Cuisine</p>
                                                            <div class="price">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p class="text-muted">₱<?= $item['price']; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <button class="btn btn-dark d-block w-100" type="submit"href="#menu_description<?= $item['productid'] ?>" data-bs-target="#menu_description<?= $item['productid'] ?>" data-bs-toggle="modal">View</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      
                                                    </div>
                                                    <?php  
                                                        }
                                                        }
                                                    }
                                                        else
                                                        {
                                                            echo "No Menu";
                                                        ?>
                                                    <?php
                                                    }
                                                    ?> 
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
                                            <h1 class="text-start"><i class="fas fa-utensils"></i>&nbsp;APPETIZER</h1>                                        
                                                <div class="row">  
                                                    <?php
                                                        if(mysqli_num_rows($product) > 0)
                                                        {                           
                                                        $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Appetizer' AND NOT status='2' ORDER BY productid DESC;";
                                                        $result = $con->query($sql);
                                                        foreach($result as $item)
                                                        {
                                                            if( $item['status'] == '1')
                                                            {
                                                    ?>                                      
                                                    <div class="col-md-3">
                                                        <div class="clean-pricing-item">
                                                            <img class="rounded img-fluid" src="uploads/<?= $item['image']; ?>" style="opacity: 1;">
                                                            <div class="heading">
                                                                <h6 class="mb-0"><?= $item['name']; ?></h6>
                                                            </div>
                                                            <p><?= $item['cuisinename']; ?> Cuisine</p>
                                                            <div class="price">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p>₱<?= $item['price']; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <button class="btn btn-primary d-block w-100" type="submit" href="#menu_description<?= $item['productid'] ?>" data-bs-target="#menu_description<?= $item['productid'] ?>" data-bs-toggle="modal">View</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         
                                                    </div>                               
                                                    <?php
                                                        }
                                                        elseif( $item['status'] == '0')
                                                        {
                                                    ?>
                                                    <div class="col-md-3">
                                                        <div class="clean-pricing-item" style="opacity: 0.70;">
                                                            <img class="rounded img-fluid" src="uploads/<?= $item['image']; ?>" style="opacity: 0.30;">
                                                            <div class="ribbon">
                                                                <span>SOLD OUT</span>
                                                            </div>
                                                            <div class="heading">
                                                                <h6 class="mb-0"><?= $item['name']; ?></h6>
                                                            </div>
                                                            <p><?= $item['cuisinename']; ?> Cuisine</p>
                                                            <div class="price">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p class="text-muted">₱<?= $item['price']; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <button class="btn btn-dark d-block w-100" type="submit"href="#menu_description<?= $item['productid'] ?>" data-bs-target="#menu_description<?= $item['productid'] ?>" data-bs-toggle="modal">View</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <?php  
                                                            }
                                                        }
                                                    }
                                                    else
                                                    {
                                                        echo "No Menu";
                                                    ?>
                                                    <?php
                                                    }
                                                    ?>                                             
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
                                            <h1 class="text-start"><i class="fas fa-utensils"></i>&nbsp;SOUP</h1>                                          
                                                <div class="row">    
                                                    <?php
                                                        if(mysqli_num_rows($product) > 0)
                                                        {                                       
                                                        $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Soup' AND NOT status='2' ORDER BY productid DESC;";
                                                        $result = $con->query($sql);
                                                        foreach($result as $item)
                                                        {
                                                            if( $item['status'] == '1')
                                                            {
                                                    ?>                                      
                                                    <div class="col-md-3">
                                                        <div class="clean-pricing-item">
                                                            <img class="rounded img-fluid" src="uploads/<?= $item['image']; ?>" style="opacity: 1;">
                                                            <div class="heading">
                                                                <h6 class="mb-0"><?= $item['name']; ?></h6>
                                                            </div>
                                                            <p><?= $item['cuisinename']; ?> Cuisine</p>
                                                            <div class="price">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p>₱<?= $item['price']; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                    <button class="btn btn-primary d-block w-100" type="submit" href="#menu_description<?= $item['productid'] ?>" data-bs-target="#menu_description<?= $item['productid'] ?>" data-bs-toggle="modal">View</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                          
                                                    </div>                               
                                                    <?php
                                                        }
                                                        elseif( $item['status'] == '0')
                                                        {
                                                    ?>
                                                    <div class="col-md-3">
                                                        <div class="clean-pricing-item" style="opacity: 0.70;">
                                                            <img class="rounded img-fluid" src="uploads/<?= $item['image']; ?>" style="opacity: 0.30;">
                                                            <div class="ribbon">
                                                                <span>SOLD OUT</span>
                                                            </div>
                                                            <div class="heading">
                                                                <h6 class="mb-0"><?= $item['name']; ?></h6>
                                                            </div>
                                                            <p><?= $item['cuisinename']; ?> Cuisine</p>
                                                            <div class="price">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p class="text-muted">₱<?= $item['price']; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <button class="btn btn-dark d-block w-100" type="submit"href="#menu_description<?= $item['productid'] ?>" data-bs-target="#menu_description<?= $item['productid'] ?>" data-bs-toggle="modal">View</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <?php  
                                                            }
                                                        }
                                                    }
                                                        else
                                                        {
                                                            echo "No Menu";
                                                        ?>
                                                    <?php
                                                    }
                                                    ?>                                               
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
                                            <h1 class="text-start"><i class="fas fa-utensils"></i>&nbsp;DRINKS</h1>                                      
                                                <div class="row"> 
                                                    <?php
                                                        if(mysqli_num_rows($product) > 0)
                                                        {                                        
                                                        $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Drinks' AND NOT status='2' ORDER BY productid DESC;";
                                                        $result = $con->query($sql);
                                                        foreach($result as $item)
                                                        {
                                                            if( $item['status'] == '1')
                                                            {
                                                    ?>                                      
                                                    <div class="col-md-3">
                                                        <div class="clean-pricing-item">
                                                            <img class="rounded img-fluid" src="uploads/<?= $item['image']; ?>" style="opacity: 1;">
                                                            <div class="heading">
                                                                <h6 class="mb-0"><?= $item['name']; ?></h6>
                                                            </div>
                                                            <p><?= $item['cuisinename']; ?> Cuisine</p>
                                                            <div class="price">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p>₱<?= $item['price']; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <button class="btn btn-primary d-block w-100" type="submit" href="#menu_description<?= $item['productid'] ?>" data-bs-target="#menu_description<?= $item['productid'] ?>" data-bs-toggle="modal">View</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         
                                                    </div>                               
                                                    <?php
                                                        }
                                                        elseif( $item['status'] == '0')
                                                        {
                                                    ?>
                                                    <div class="col-md-3">
                                                        <div class="clean-pricing-item" style="opacity: 0.70;">
                                                            <img class="rounded img-fluid" src="uploads/<?= $item['image']; ?>" style="opacity: 0.30;">
                                                            <div class="ribbon">
                                                                <span>SOLD OUT</span>
                                                            </div>
                                                            <div class="heading">
                                                                <h6 class="mb-0"><?= $item['name']; ?></h6>
                                                            </div>
                                                            <p><?= $item['cuisinename']; ?> Cuisine</p>
                                                            <div class="price">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p class="text-muted">₱<?= $item['price']; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <button class="btn btn-dark d-block w-100" type="submit"href="#menu_description<?= $item['productid'] ?>" data-bs-target="#menu_description<?= $item['productid'] ?>" data-bs-toggle="modal">View</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                          
                                                    </div>
                                                    <?php  
                                                            }
                                                        }
                                                    }
                                                        else
                                                        {
                                                            echo "No Menu";
                                                        ?>
                                                    <?php
                                                    }
                                                    ?>                                              
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
                                            <h1 class="text-start"><i class="fas fa-utensils"></i>&nbsp;MEAT DISH</h1>
                                                <div class="row">   
                                                    <?php
                                                        if(mysqli_num_rows($product) > 0)
                                                        {                  
                                                        $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'MeatDish' AND NOT status='2' ORDER BY productid DESC;";
                                                        $result = $con->query($sql);
                                                        foreach($result as $item)
                                                        {
                                                            if( $item['status'] == '1')
                                                            {
                                                    ?>                                      
                                                    <div class="col-md-3">
                                                        <div class="clean-pricing-item">
                                                            <img class="rounded img-fluid" src="uploads/<?= $item['image']; ?>" style="opacity: 1;">
                                                            <div class="heading">
                                                                <h6 class="mb-0"><?= $item['name']; ?></h6>
                                                            </div>
                                                            <p><?= $item['cuisinename']; ?> Cuisine</p>
                                                            <div class="price">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p>₱<?= $item['price']; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <button class="btn btn-primary d-block w-100" type="submit" href="#menu_description<?= $item['productid'] ?>" data-bs-target="#menu_description<?= $item['productid'] ?>" data-bs-toggle="modal">View</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>                               
                                                    <?php
                                                        }
                                                        elseif( $item['status'] == '0')
                                                        {
                                                    ?>
                                                    <div class="col-md-3">
                                                        <div class="clean-pricing-item" style="opacity: 0.70;">
                                                            <img class="rounded img-fluid" src="uploads/<?= $item['image']; ?>" style="opacity: 0.30;">
                                                            <div class="ribbon">
                                                                <span>SOLD OUT</span>
                                                            </div>
                                                            <div class="heading">
                                                                <h6 class="mb-0"><?= $item['name']; ?></h6>
                                                            </div>
                                                            <p><?= $item['cuisinename']; ?> Cuisine</p>
                                                            <div class="price">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p class="text-muted">₱<?= $item['price']; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <button class="btn btn-dark d-block w-100" type="submit"href="#menu_description<?= $item['productid'] ?>" data-bs-target="#menu_description<?= $item['productid'] ?>" data-bs-toggle="modal">View</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         
                                                    </div>
                                                    <?php  
                                                            }
                                                        }
                                                    }
                                                        else
                                                        {
                                                            echo "No Menu";
                                                        ?>
                                                    <?php
                                                    }
                                                    ?>
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
                                            <h1 class="text-start"><i class="fas fa-utensils"></i>&nbsp;MAIN COURSE</h1>                                         
                                                <div class="row">   
                                                    <?php
                                                        if(mysqli_num_rows($product) > 0)
                                                        {                                     
                                                        $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Main' AND NOT status='2' ORDER BY productid DESC;";
                                                        $result = $con->query($sql);
                                                        foreach($result as $item)
                                                        {
                                                            if( $item['status'] == '1')
                                                            {
                                                    ?>                                      
                                                    <div class="col-md-3">
                                                        <div class="clean-pricing-item">
                                                            <img class="rounded img-fluid" src="uploads/<?= $item['image']; ?>" style="opacity: 1;">
                                                            <div class="heading">
                                                                <h6 class="mb-0"><?= $item['name']; ?></h6>
                                                            </div>
                                                            <p><?= $item['cuisinename']; ?> Cuisine</p>
                                                            <div class="price">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p>₱<?= $item['price']; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <button class="btn btn-primary d-block w-100" type="submit" href="#menu_description<?= $item['productid'] ?>" data-bs-target="#menu_description<?= $item['productid'] ?>" data-bs-toggle="modal">View</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                         
                                                    </div>                               
                                                    <?php
                                                        }
                                                        elseif( $item['status'] == '0')
                                                        {
                                                    ?>
                                                    <div class="col-md-3">
                                                        <div class="clean-pricing-item" style="opacity: 0.70;">
                                                            <img class="rounded img-fluid" src="uploads/<?= $item['image']; ?>" style="opacity: 0.30;">
                                                            <div class="ribbon">
                                                                <span>SOLD OUT</span>
                                                            </div>
                                                            <div class="heading">
                                                                <h6 class="mb-0"><?= $item['name']; ?></h6>
                                                            </div>
                                                            <p><?= $item['cuisinename']; ?> Cuisine</p>
                                                            <div class="price">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p class="text-muted">₱<?= $item['price']; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <button class="btn btn-dark d-block w-100" type="submit"href="#menu_description<?= $item['productid'] ?>" data-bs-target="#menu_description<?= $item['productid'] ?>" data-bs-toggle="modal">View</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       
                                                    </div>
                                                    <?php  
                                                            }
                                                        }
                                                    }
                                                        else
                                                        {
                                                            echo "No Menu";
                                                        ?>
                                                    <?php
                                                    }
                                                    ?>
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
                                            <h1 class="text-start"><i class="fas fa-utensils"></i>&nbsp;SALAD</h1>                                       
                                                <div class="row">  
                                                    <?php
                                                        if(mysqli_num_rows($product) > 0)
                                                        {                  
                                                        $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Salad' AND NOT status='2' ORDER BY productid DESC;";
                                                        $result = $con->query($sql);
                                                        foreach($result as $item)
                                                        {
                                                            if( $item['status'] == '1')
                                                            {
                                                    ?>                                      
                                                    <div class="col-md-3">
                                                        <div class="clean-pricing-item">
                                                            <img class="rounded img-fluid" src="uploads/<?= $item['image']; ?>" style="opacity: 1;">
                                                            <div class="heading">
                                                                <h6 class="mb-0"><?= $item['name']; ?></h6>
                                                            </div>
                                                            <p><?= $item['cuisinename']; ?> Cuisine</p>
                                                            <div class="price">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p>₱<?= $item['price']; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <button class="btn btn-primary d-block w-100" type="submit" href="#menu_description<?= $item['productid'] ?>" data-bs-target="#menu_description<?= $item['productid'] ?>" data-bs-toggle="modal">View</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>                               
                                                    <?php
                                                        }
                                                        elseif( $item['status'] == '0')
                                                        {
                                                    ?>
                                                    <div class="col-md-3">
                                                        <div class="clean-pricing-item" style="opacity: 0.70;">
                                                            <img class="rounded img-fluid" src="uploads/<?= $item['image']; ?>" style="opacity: 0.30;">
                                                            <div class="ribbon">
                                                                <span>SOLD OUT</span>
                                                            </div>
                                                            <div class="heading">
                                                                <h6 class="mb-0"><?= $item['name']; ?></h6>
                                                            </div>
                                                            <p><?= $item['cuisinename']; ?> Cuisine</p>
                                                            <div class="price">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p class="text-muted">₱<?= $item['price']; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <button class="btn btn-dark d-block w-100" type="submit"href="#menu_description<?= $item['productid'] ?>" data-bs-target="#menu_description<?= $item['productid'] ?>" data-bs-toggle="modal">View</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                     
                                                    </div>
                                                    <?php  
                                                            }
                                                        }
                                                    }
                                                        else
                                                        {
                                                            echo "No Menu";
                                                        ?>
                                                    <?php
                                                    }
                                                    ?>
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
                                            <h1 class="text-start"><i class="fas fa-utensils"></i>&nbsp;DESSERT</h1>                                
                                                <div class="row">
                                                    <?php
                                                        if(mysqli_num_rows($product) > 0)
                                                        {                                     
                                                        $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'Dessert' AND NOT status='2' ORDER BY productid DESC;";
                                                        $result = $con->query($sql);
                                                        foreach($result as $item)
                                                        {
                                                            if( $item['status'] == '1')
                                                            {
                                                    ?>                                      
                                                    <div class="col-md-3">
                                                        <div class="clean-pricing-item">
                                                            <img class="rounded img-fluid" src="uploads/<?= $item['image']; ?>" style="opacity: 1;">
                                                            <div class="heading">
                                                                <h6 class="mb-0"><?= $item['name']; ?></h6>
                                                            </div>
                                                            <p><?= $item['cuisinename']; ?> Cuisine</p>
                                                            <div class="price">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p>₱<?= $item['price']; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <button class="btn btn-primary d-block w-100" type="submit" href="#menu_description<?= $item['productid'] ?>" data-bs-target="#menu_description<?= $item['productid'] ?>" data-bs-toggle="modal">View</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      
                                                    </div>                               
                                                    <?php
                                                        }
                                                        elseif( $item['status'] == '0')
                                                        {
                                                    ?>
                                                    <div class="col-md-3">
                                                        <div class="clean-pricing-item" style="opacity: 0.70;">
                                                            <img class="rounded img-fluid" src="uploads/<?= $item['image']; ?>" style="opacity: 0.30;">
                                                            <div class="ribbon">
                                                                <span>SOLD OUT</span>
                                                            </div>
                                                            <div class="heading">
                                                                <h6 class="mb-0"><?= $item['name']; ?></h6>
                                                            </div>
                                                            <p><?= $item['cuisinename']; ?> Cuisine</p>
                                                            <div class="price">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p class="text-muted">₱<?= $item['price']; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <button class="btn btn-dark d-block w-100" type="submit"href="#menu_description<?= $item['productid'] ?>" data-bs-target="#menu_description<?= $item['productid'] ?>" data-bs-toggle="modal">View</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                     
                                                    </div>
                                                    <?php  
                                                            }
                                                        }
                                                    }
                                                        else
                                                        {
                                                            echo "No Menu";
                                                        ?>
                                                    <?php
                                                    }
                                                    ?>
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
                                            <h1 class="text-start"><i class="fas fa-utensils"></i>&nbsp;FISH DISH</h1>                                   
                                                <div class="row"> 
                                                    <?php
                                                        if(mysqli_num_rows($product) > 0)
                                                        {     
                                                        $sql = "SELECT * FROM `products` WHERE businessid = $bid AND food_type = 'FishDish' AND NOT status='2' ORDER BY productid DESC;";
                                                        $result = $con->query($sql);
                                                        foreach($result as $item)
                                                        {
                                                            if( $item['status'] == '1')
                                                            {
                                                    ?>                                      
                                                    <div class="col-md-3">
                                                        <div class="clean-pricing-item">
                                                            <img class="rounded img-fluid" src="uploads/<?= $item['image']; ?>" style="opacity: 1;">
                                                            <div class="heading">
                                                                <h6 class="mb-0"><?= $item['name']; ?></h6>
                                                            </div>
                                                            <p><?= $item['cuisinename']; ?> Cuisine</p>
                                                            <div class="price">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p>₱<?= $item['price']; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                        <button class="btn btn-primary d-block w-100" type="submit" href="#menu_description<?= $item['productid'] ?>" data-bs-target="#menu_description<?= $item['productid'] ?>" data-bs-toggle="modal">View</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                      
                                                    </div>                               
                                                    <?php
                                                        }
                                                        elseif( $item['status'] == '0')
                                                        {
                                                    ?>
                                                    <div class="col-md-3">
                                                        <div class="clean-pricing-item" style="opacity: 0.70;">
                                                            <img class="rounded img-fluid" src="uploads/<?= $item['image']; ?>" style="opacity: 0.30;">
                                                            <div class="ribbon">
                                                                <span>SOLD OUT</span>
                                                            </div>
                                                            <div class="heading">
                                                                <h6 class="mb-0"><?= $item['name']; ?></h6>
                                                            </div>
                                                            <p><?= $item['cuisinename']; ?> Cuisine</p>
                                                            <div class="price">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <p class="text-muted">₱<?= $item['price']; ?></p>
                                                                    </div>
                                                                    <div class="col">
                                                                    <button class="btn btn-dark d-block w-100" type="submit"href="#menu_description<?= $item['productid'] ?>" data-bs-target="#menu_description<?= $item['productid'] ?>" data-bs-toggle="modal">View</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>
                                                    <?php  
                                                            }
                                                        }
                                                    }
                                                        else
                                                        {
                                                            echo "No Menu";
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
                </div><hr>
            <!-- END OF MENU SECTION-->

            <!-- START OF REVIEW SECTION-->
            <h1 class="mx-4 fs-3"><i class="fas fa-edit"></i>&nbsp;&nbsp;REVIEWS AND FEEDBACKS</h1>
                    <div class="container col d-flex justify-content-center" id="review">
                        <div class="card col d-flex justify-content-center border-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6 text-center">
                                        <?php 
                                            $query_rating_count = "SELECT * FROM review_table WHERE businessid = $id";
                                            $query_rating_count_run = mysqli_query($con, $query_rating_count);
                                            $row_rating_count = mysqli_num_rows($query_rating_count_run);
                                            if($row_rating_count > 0)
                                            { 
                                        ?>
                                            <h1 class="text-warning mt-4 mb-4 col d-flex justify-content-center">
                                                <i class="fas fa-star fa-sm"> </i><b><span id="average_rating">0</span> / 5</b>
                                            </h1>
                                        <?php
                                            }else
                                            {
                                        ?>
                                            <h1 class="text-warning mt-4 mb-4 col d-flex justify-content-center">
                                                <i class="fas fa-star fa-sm"> </i><b><span>0</span> / 5</b>
                                            </h1>  
                                        <?php
                                            }
                                        ?>
                                        <!-- <?php
                                            // $query_rating = "SELECT ROUND(AVG(user_rating),1) AS averagerating FROM review_table WHERE businessid = $businessid ORDER BY review_id";
                                            // $query_rating_run = mysqli_query($con, $query_rating);
                                            // $row_rating = mysqli_fetch_assoc($query_rating_run);
                                            // if(!$row_rating['averagerating'])
                                            // {
                                            //     echo'<i class="fas fa-star star-light mr-1 main_star"></i>
                                            //         <i class="fas fa-star star-light mr-1 main_star"></i>
                                            //         <i class="fas fa-star star-light mr-1 main_star"></i>
                                            //         <i class="fas fa-star star-light mr-1 main_star"></i>
                                            //         <i class="fas fa-star star-light mr-1 main_star"></i>';
                                            // }
                                            // else if($row_rating['averagerating'] == 5.0)
                                            // {
                                            //     echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="fas fa-star"></i></span>';
                                            // }
                                            // else if($row_rating['averagerating'] >= 4.1)
                                            // {
                                            //     echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i></span>';
                                            // }
                                            // else if($row_rating['averagerating'] == 4.0)
                                            // {
                                            //     echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="far fa-star"></i></span>';
                                            // }
                                            // else if($row_rating['averagerating'] >= 3.1)
                                            // {
                                            //     echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i><i class="far fa-star"></i></span>';
                                            // }
                                            // else if($row_rating['averagerating'] == 3.0)
                                            // {
                                            //     echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></i></span>';
                                            // }
                                            // else if($row_rating['averagerating'] >= 2.1)
                                            // {
                                            //     echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class ="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i></span>';
                                            // }
                                            // else if($row_rating['averagerating'] == 2.0)
                                            // {
                                            //     echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star"></i><i class ="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></i></span>';
                                            // }
                                            // else if($row_rating['averagerating'] >= 1.1)
                                            // {
                                            //     echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star""></i><i class ="fas fa-star-half-alt"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></span>';
                                            // }
                                            // else if($row_rating['averagerating'] == 1.0)
                                            // {
                                            //     echo '<span style="color:orange; margin-bottom: 30px;"<i class ="fas fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i></i></span>';
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
                                        <div class="mb-3">
                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                            <i class="fas fa-star star-light mr-1 main_star"></i>
                                        </div>
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
                     <!-- END OF REVIEW SECTION-->
            </div>
        </section>
    </main>
    <script>
               var counter = 1;
    setInterval(function(){
      document.getElementById('radio' + counter).checked = true;
      counter++;
      if(counter > 5){
        counter = 1;
      }
    }, 5000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.js"></script>
    <script src="assets/js/vanilla-zoom.js"></script>
    <script src="assets/js/theme.js"></script>
    <script type="text/javascript" src="maplocation.js"></script>
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
