<?php
include('middleware/userMiddleware.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Akaya%20Kanadaka.css">
    <link rel="stylesheet" href="assets/css/Alata.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="assets/css/Acme.css">
    <link rel="stylesheet" href="assets/css/Aldrich.css">
    <link rel="stylesheet" href="assets/css/Amaranth.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/assets/css/Montserrat.css">
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
    <title>I-Eat | Reservation Table </title> 

    <!-- Favicon -->
    <link rel="icon" href="uploads/favicon.ico"/>
</head>
<body>
    <?php 
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $reservations = reservationGetByID($id);
            

            if(mysqli_num_rows($reservations) > 0)
            {
                $data = mysqli_fetch_array($reservations);
               
            ?>
     <nav class="navbar navbar-light navbar-expand-lg fixed-top clean-navbar" style="background-color: rgb(255,128,64);">
        <div class="container">
            <a class="navbar-brand logo" href="#" style=" color:white;font-family: Amaranth, sans-serif;font-weight: bold;font-size: 26px;">
            <strong>Hi <?= $_SESSION['auth_user']['name'];?>!</strong></a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1">
            <span class="visually-hidden" style="color: var(--bs-dark);">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active text-white" href="index.php"><i class="fas fa-home"></i>&nbsp;Home</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="logout.php"><i class="fas fa-arrow-right"></i>&nbsp;Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="page blog-post-list" >
    <section class="mb-0 text-center bg-light p-2">
            <p style="font-family: Acme, sans-serif;font-size: 40px;font-weight: bold; color:black;">RESERVATION DETAILS</p>
        </section>
        <?php 
            foreach($reservations as $data)
            {
        ?>
        <section class="clean-block clean-blog-list dark">
            <div class="container">
                <div class="block-content" style="padding-right: 80px;padding-left: 80px;padding-top: 50px;padding-bottom: 0px;">
                    <div class="clean-blog-post">
                        <div class="row">
                            <div class="col-lg-5">
                                <img class="rounded img-fluid " style="height:250px; width:300px;" src="uploads/<?= $data['image']; ?>">
                            </div>
                            <div class="col-lg-7"style="border-left:solid 2px;" >
                                <h3 style="font-family: Amaranth, sans-serif;margin-bottom: 3px;margin-top: 5px;font-size: 24px;">RESTAURANT NAME</h3>
                                <div class="info">
                                    <span class="text-muted" style="font-weight: bold;font-family: Aldrich, sans-serif;">Table Number</span>
                                </div>
                                <p style="color: red;"for="quantity"><strong>STATUS :&nbsp;<?= $data['status']== '0'? "Waiting":"Confirmed"  ?></strong></p>
                                <p style="margin-bottom: 0px;">RESERVATION DATE:<span class="value" style="font-weight:bold; padding-left: 5px;"><?= $data['reservation_date']; ?></span></p>
                                <p style="margin-bottom: 0px;">RESERVATION TIME:<span class="value" style="font-weight:bold; padding-left: 5px;"><?= $data['reservation_time']; ?></span></p>
                                <p style="margin-bottom: 0px;">NUMBER OF GUEST:<span class="value" style="font-weight:bold; padding-left: 6px;"><?= $data['numberofguest'];?>&nbsp;persons</span></p>
                                <p style="margin-bottom: 0px;">CUSTOMER NAME:<span style="font-weight:bold; padding-left: 17px;"><?= $data['namereserveunder']; ?></span></p>
                                <p style="margin-bottom: 0px;">EMAIL ADDRESS:<span class="value" style="font-weight:bold; padding-left: 30px;"><?= $data['reservation_email']; ?></span></p>
                                <p style="margin-bottom: 0px;">CONTACT NUMBER:&nbsp;<span class="value" style="font-weight:bold; padding-left: 4px;"><?= $data['reservation_phonenumber']; ?></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <?php
                        }
            }
            else
            {
                redirect("index.php", "No Reservation Found");
            }
        }
        else
        {
            redirect("index.php", "ID Missing from the URL");
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        <?php if(isset($_SESSION['message'])) 
    { ?>
        alertify.set('notifier','position', 'top-center');
        var msg = alertify.message('Default message');
        msg.delay(3).setContent('<?= $_SESSION['message']; ?>');
        <?php 
        unset($_SESSION['message']);
    }
    ?> 
    </script>     
</body>
</html>