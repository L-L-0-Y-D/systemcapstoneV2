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
</head>
<body>
    <?php 
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $reservations = getByID("reservations",$id,"userid");

            if(mysqli_num_rows($reservations) > 0)
            {
                $data = mysqli_fetch_array($reservations);
               
            ?>
    <nav class="navbar navbar-light navbar-expand-md" style="background: var(--bs-orange);">
        <div class="container-fluid"><a class="navbar-brand" href="#" style="padding-left: 0px;margin-left: 2%;"><strong>Hi Username <?= $_SESSION['auth_user']['name'];?>!</strong></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse justify-content-end" id="navcol-1" style="padding-right: 30px;">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="index.php"><i class="fas fa-home"></i>&nbsp;Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i>&nbsp;Log out</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <?php 
        foreach($reservations as $data)
            {
                ?>
                        
    <div class="container" style="box-shadow: 0px 0px 5px;width: auto;margin-right: 15%;margin-left: 15%;height: auto;">
        <h1 style="margin-top: 10%;font-size: 24.88px;"><strong>Reservation Details</strong></h1>
        <div class="row align-items-center" style="padding-top: 10px;margin-top: 10px;padding-bottom: 10px;padding-left: 10px;padding-right: 10px;height: auto;border-top: 1px solid var(--bs-gray-600);">
            <div class="col-md-3" style="border: 1px solid var(--bs-gray-400);height: 180px;">
                <div class="product-image" style="height: 180px;"><img class="img-fluid d-block mx-auto image" src="assets/img/1654500540.png" style="width: 160px;height: 160px;margin-top: 10px;margin-bottom: 10px;"></div>
            </div>
            <div class="col-md-5 text-start product-info"><span style="font-size: 18px;"><strong>Table No.</strong></span>
                <div class="product-specs">
                    <div><span>Reservation Date:&nbsp;</span><span class="value" style="padding-left: 5px;"><?= $data['reservation_date']; ?></span></div>
                    <div><span>Reservation Time:</span><span class="value" style="padding-left: 5px;"><?= $data['reservation_time']; ?></span></div>
                    <div><span>No. of Guest :&nbsp;</span><span class="value"><?= $data['numberofguest'];?>persons</span></div>
                </div>
            </div>
            <div class="col-6 col-md-2 quantity"><label class="col-form-label d-none d-md-block" for="quantity">Status :<?= $data['status']== '0'? "Waiting":"Confirmed"  ?></label></div>
        </div>
    </div>
    <div class="container" style="margin-right: 15%;margin-left: 15%;width: auto;box-shadow: 0px 0px 5px;margin-top: 20px;height: auto;">
        <h1 style="font-size: 24.88px;"><strong>Customer Details</strong></h1>
        <div class="row" style="margin-top: 0px;padding: 10px;border-top-width: 1px;border-top-style: solid;">
            <div class="col"><span style="font-size: 18px;"><strong>Reservation Id</strong></span>
                <div class="product-specs">
                    <div><span>Customer Name :</span><span>&nbsp; <?= $data['namereserveunder']; ?></span></div>
                    <div><span>Email Address :</span><span class="value" style="padding-left: 5px;"><?= $data['reservation_email']; ?></span></div>
                    <div><span>Contact Number :</span><span class="value" style="padding-left: 5px;"><?= $data['reservation_phonenumber']; ?></span></div>
                </div>
            </div>
        </div>
    </div>

    <?php
                        }
            }
            else
            {
                echo "Reservation not Found";
            }
        }
        else
        {
           echo"ID missing from url";
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