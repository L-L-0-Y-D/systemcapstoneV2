<?php
include('middleware/userMiddleware.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
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
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css">
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Kannada&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=21f14b60305aa9b0449170550a54b7e5">
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
        <nav class="navbar navbar-expand-md fixed-top navbar-shrink py-3" id="mainNav" style="background-color:rgb(255,128,64); box-shadow: 0px 0px 18px var(--bs-gray); height: 80px;">
            <div class="container ml-2">
                <a class="navbar-brand" href="index.php" style="color: white;font-size: 28px;">My Reservations</a>
                <nav class="navbar navbar-expand">
                    <div class="container-fluid">
                        <span class="bs-icon-md d-flex justify-content-center align-items-center me-2 bs-icon" style="background: transparent;">
                        <a href="index.php"><i class="fa fa-home" style="float:right; color:white;"></i></a>
                        </span></div>
                </nav>
            </div>
        </nav>
        <main class="page product-page">
        <section class="clean-block clean-product dark">
            <div class="container">
                <div class="text-center block-content" style="padding-top: 40px;height: auto;">
                    <div class="product-info">
                        <div>
                            <ul class="nav nav-pills nav-fill text-center" role="tablist" id="myTab" style="border-bottom-width: 1px;border-bottom-style: solid;border-left-width: 1px;border-left-style: none;">
                                <li class="nav-item" role="presentation"><a class="nav-link" role="tab" data-bs-toggle="pill" id="description-tab" href="#waiting" style="border-right-style: solid;">WAITING</a></li>
                                <li class="nav-item" role="presentation" style="border-left-width: 1px;border-left-style: solid;"><a class="nav-link" role="tab" data-bs-toggle="pill" id="specifications-tabs" href="#reserved" style="border-right-style: solid;border-left-style: solid;">RESERVED</a></li>
                                <li class="nav-item" role="presentation" style="border-left-width: 1px;border-left-style: solid;"><a class="nav-link active" role="tab" data-bs-toggle="pill" id="reviews-tab" href="#cancelled">CANCELLED</a></li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <?php 
                                    foreach($reservations as $data)
                                    {
                                ?>
                                <div class="tab-pane fade description" role="tabpanel" id="waiting" style="padding-top: 20px;">
                                    <p style="font-size: 30px;font-family: Acme, sans-serif;font-weight: bold;text-align: left;margin-bottom: 30px;">Waiting</p>
                                    <div class="row" style="border-radius: 15px;border-width: 2px;border-style: solid;">
                                        <div class="col-md-5" style="border-right-width: 2px;border-right-style: solid;">
                                            <img class="img-fluid" src="uploads/<?= $data['image']; ?>" style="height: 90%;padding-top: 20px;">
                                        </div>
                                        <div class="col-md-7" style="text-align:left;">
                                            <h3 style="font-family: Amaranth, sans-serif;margin-bottom: 3px;margin-top: 15px;font-size: 24px;"><?= $data['business_name']; ?></h3>
                                            <div class="info">
                                                <span class="text-muted" style="font-weight: bold;font-family: Aldrich, sans-serif;">Table Number</span>
                                            </div>
                                                <p style="color:red; margin-bottom: 10px;"for="quantity"><strong>STATUS :&nbsp;<?= $data['status']== '0'? "Waiting":"Confirmed"  ?></strong></p>
                                                <p style="margin-bottom: 0px;">RESERVATION DATE:<span class="value" style="font-weight:bold; padding-left: 5px;"><?= $data['reservation_date']; ?></span></p>
                                                <p style="margin-bottom: 0px;">RESERVATION TIME:<span class="value" style="font-weight:bold; padding-left: 5px;"><?= $data['reservation_time']; ?></span></p>
                                                <p style="margin-bottom: 0px;">NUMBER OF GUEST:<span class="value" style="font-weight:bold; padding-left: 6px;"><?= $data['numberofguest'];?>&nbsp;persons</span></p>
                                                <p style="margin-bottom: 0px;">CUSTOMER NAME:<span style="font-weight:bold; padding-left: 17px;"><?= $data['namereserveunder']; ?></span></p>
                                                <p style="margin-bottom: 0px;">EMAIL ADDRESS:<span class="value" style="font-weight:bold; padding-left: 30px;"><?= $data['reservation_email']; ?></span></p>
                                                <p style="margin-bottom: 0px;">CONTACT NUMBER:&nbsp;<span class="value" style="font-weight:bold; padding-left: 4px;"><?= $data['reservation_phonenumber']; ?></span></p>
                                            </div>
                                    </div>
                                </div>
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
                                <div class="tab-pane fade description" role="tabpanel" id="reserved" style="padding-top: 20px;">
                                    <p style="font-size: 30px;font-family: Acme, sans-serif;font-weight: bold;text-align: left;margin-bottom: 30px;">Reserved</p>
                                    <div class="row" style="border-radius: 15px;border-width: 2px;border-style: solid;">
                                        <div class="col-md-5" style="border-right-width: 2px;border-right-style: solid;"><img class="img-fluid" src="assets/img/1655662612.jpg" style="height: 90%;padding-top: 20px;"></div>
                                        <div class="col-md-7">
                                            <h4 style="text-align: left;">BUSINESS NAME</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show active description" role="tabpanel" id="cancelled" style="padding-top: 20px;">
                                    <p style="font-size: 30px;font-family: Acme, sans-serif;font-weight: bold;text-align: left;margin-bottom: 30px;">Cancelled</p>
                                    <div class="row" style="border-radius: 15px;border-width: 2px;border-style: solid;">
                                        <div class="col-md-5" style="border-right-width: 2px;border-right-style: solid;"><img class="img-fluid" src="assets/img/1655662612.jpg" style="height: 90%;padding-top: 20px;"></div>
                                        <div class="col-md-7">
                                            <h4 style="text-align: left;">BUSINESS NAME</h4>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                        </div>
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