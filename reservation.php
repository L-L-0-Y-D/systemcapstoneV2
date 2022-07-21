<?php

include('middleware/userMiddleware.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="reg.css">
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
                $data = mysqli_fetch_array($business)
                
            
            ?>
   <main class="page registration-page">
        <section class="clean-block clean-form dark" style="height: auto;background: transparent;">
            <img class="img-fluid d-flex d-lg-flex align-items-center m-auto" loading="eager" src="uploads/I-EatLogo.png" width="200px" height="200px" alt="logo" usemap="#workmap">
                <map name="workmap">
                    <area shape="circle" coords="100,100,400,400" alt="logo" href="index.php">
                </map>
            <form method="POST" action="functions/codereservation.php" style="background: rgb(255, 128, 64);border:none;border-radius: 20px;">
            <div class="container">
                        <h2 class="d-flex justify-content-center" style="font-weight:bold;">RESERVATION</h2>
            <div class="column mb-3">
                <label class="form-label" for="numberofguest" style="font-weight: bold;">Number of Guest:</label>
                <input type="number" id="numberofguest" name='numberofguest' class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
            </div>
            <div class="column mb-3">
                <input type="hidden" name="businessid" value="<?= $data['businessid'] ?>">
                <input type="hidden" name="userid" value="<?= $_SESSION['auth_user']['userid'];?>">
                <label class="form-label" for="namereserveunder" style="font-weight: bold;">Name Reserved Under:</label>
                <input type="text" id="namereserveunder" name='namereserveunder'value="<?= $_SESSION['auth_user']['name'];?>" class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
            </div>
            <div class="column mb-3">
                <label class="form-label" for="reservation_email" style="font-weight: bold;">Email:</label>
                <input type="email" id="reservation_email" name="reservation_email" value="<?= $_SESSION['auth_user']['email'];?>" class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
            </div>
            <div class="column mb-3">
                <label class="form-label" for="reservation_phonenumber" style="font-weight: bold;">Phonenumber:</label>
                <input type="text" id="reservation_phonenumber" name="reservation_phonenumber" class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
            </div>
            <div class="column mb-3">
                <label class="form-label" for="reservation_date" style="font-weight: bold;">Reservation Date:</label>
                <input type="date" id="reservation_date" name="reservation_date" min="<?php echo date("Y-m-d"); ?>" class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
            </div>
            <div class="column mb-3">
                <label class="form-label" for="reservation_time" style="font-weight: bold;">Reservation time:</label>
                <input type="time" id="reservation_time" name="reservation_time" class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
            </div>
            <div class="col-md-12">
                <input type="hidden" name="status" value = '0' >
            </div>
                
            <button class="btn btn-primary d-flex d-xl-flex align-items-center m-auto" type="submit" name="reserve_btn" style="background: black;color: white;border-style: none;padding-right: 15px;padding-left: 15px;font-size: 18px;padding-bottom: 7px;" >Reserve</button> 
            <br><a class="d-flex justify-content-center" style="color: black;" href="index.php">Back to Home</a>
            </div>
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
    </section>
</main>
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