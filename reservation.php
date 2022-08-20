<?php

include('middleware/userMiddleware.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no"> 
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Inter.css">
    <link rel="stylesheet" href="reg.css">
    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css">
    <title>Reservation | I-Eat</title>

    <!-- Favicon -->
    <link rel="icon" href="uploads/favicon.ico"/>
</head>
<body>
    <?php 
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $business = getByID("business",$id,"businessid");

            if(mysqli_num_rows($business) > 0)
            {
                $data = mysqli_fetch_array($business);
                $opening = $data['opening'];
                $closing = $data['closing'];
                
            
            ?>

 <body>
    <header class="bg-primary-gradient py-4 mt-5">
        <div class="container ">
            <div class="row ">
                <div class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-end mb-4">
                    <div class="card" style="border-radius: 30px;border: 4px solid rgb(255,128,64); background-color:rgb(255,128,64) ;">
                        <div class="card-body text-center d-flex flex-column align-items-center">
                            <form method="POST" action="functions/codereservation.php" style="font-family: Acme, sans-serif;">
                                <div class="row" style="margin-bottom: 5px;">
                                    <div class="col">
                                        <p class="mb-1 mt-2 fw-bold " for="numberofguest" style="text-align: left;font-size: 14px;">Number of Guest:</p>
                                        <input type="number" id="numberofguest" name='numberofguest' class="form-control" required>
                                    </div>
                                </div>
                                <div class="row" style="margin-bottom: 5px;">
                                    <div class="col">
                                        <input type="hidden" name="businessid" value="<?= $data['businessid'] ?>">
                                        <input type="hidden" name="userid" value="<?= $_SESSION['auth_user']['userid'];?>">
                                        <p class="mb-1 mt-2 fw-bold" for="namereserveunder" style="text-align: left;font-size: 14px;">Name Reserved Under:</p>
                                        <input type="text" id="namereserveunder" name='namereserveunder'value="<?= $_SESSION['auth_user']['name'];?>" class="form-control" required>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <p class="mb-1 mt-2 fw-bold" for="reservation_email" style="text-align: left;font-size: 14px;">Email Address</p>
                                    <input class="form-control" type="email" id="reservation_email" name="reservation_email" value="<?= $_SESSION['auth_user']['email'];?>" required>
                                </div>
                                <div class="mb-2">
                                    <p class="mb-1 mt-2 fw-bold" for="reservation_phonenumber" style="text-align: left;font-size: 14px;">Phone Number</p>
                                    <input class="form-control" type="text " id="reservation_phonenumber" name="reservation_phonenumber" required>
                                </div>
                                <div class="mb-2">
                                    <p class="mb-1 mt-2 fw-bold" for="reservation_date" style="text-align: left;font-size: 14px;">Reservation Date</p>
                                    <input class="form-control" type="date" id="reservation_date" name="reservation_date" min="<?php echo date("Y-m-d"); ?>" required>
                                </div>
                                <div class="mb-2">
                                    <p class="mb-1 mt-2 fw-bold" for="reservation_time" style="text-align: left;font-size: 14px;">Reservation Time</p>
                                    <input class="form-control" type="time" id="reservation_time" name="reservation_time" min="<?= $data['opening']; ?>" max="<?= $data['closing']; ?>" required>
                                </div>
                                <small>Reservation hours are <?=  date("g:i a", strtotime($opening));?> to <?= date("g:i a", strtotime($closing)); ?></small>
                                <div class="col-mb-3">
                                    <input type="hidden" name="status" value = '0' >
                                </div>
                                <div class="mt-2 mb-3" style="text-align: left;">
                                    <button class="btn btn-dark shadow d-block w-100" type="submit" name="reserve_btn" style="border-style: none;">Reserve</button>
                                </div>
                                    <a href="index.php" style="color:black;text-decoration:underline;">Back to Home</a>
                                <?php
                                        }
                                        else
                                        {
                                            echo "Users not Found";
                                        }
                                    }
                                    else
                                    {
                                    echo"ID missing from url";
                                    }
                                        ?>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 align-self-center mb-3">
                    <div class="d-lg-flex justify-content-lg-start p-4 mx-lg-5" style="background: transparent;">
                        <div class="text" style="color: var(--bs-dark);">
                            <h2 style="font-size: 50px;text-align: left;font-weight: bold;font-family: 'Kaushan Script', serif;">MAKE YOUR RESERVATION</h2>
                            <p class="text-start" style="font-family: Acme, sans-serif;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
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