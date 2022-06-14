<?php

include('middleware/userMiddleware.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reservation.css"> 
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <title>Reservation</title>
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
    <header>
         <img src="uploads/I-EatLogo.png" alt="LOGO" usemap="#workmap" width="200" height="200">
    <map name="workmap">
        <area shape="circle" coords="100,100,400,400" alt="logo" href="index.php">
    </map>
    </header>
            <form method="POST" action="functions/codereservation.php">
            <h3>Reservation</h3>
            <div class="column">
                <label for="numberofguest">Number of Guest:</label>
                <input type="number" id="numberofguest" name='numberofguest' required placeholder="Number of guest" class="input"/>
            </div>
            <div class="column">
                <input type="hidden" name="businessid" value="<?= $data['businessid'] ?>">
                <input type="hidden" name="userid" value="<?= $_SESSION['auth_user']['userid'];?>">
                <label for="namereserveunder">Name Reserved Under:</label>
                <input type="text" id="namereserveunder" name='namereserveunder'value="<?= $_SESSION['auth_user']['name'];?>" required placeholder="Name Reserve under" class="under" required class="input"/>
            </div>
            <div class="column">
                <label for="reservation_email">Email:</label>
                <input type="email" id="reservation_email" name="reservation_email" value="<?= $_SESSION['auth_user']['email'];?>" required placeholder="Email" class="email" required class="input">
            </div>
            <div class="column">
                <label for="reservation_phonenumber">Phonenumber:</label>
                <input type="text" id="reservation_phonenumber" name="reservation_phonenumber" required placeholder="Phonenumber" class ="phone" required class="input">
            </div>
            <div class="column">
                <label for="reservation_date">Reservation Date:</label>
                <input type="date" id="reservation_date" name="reservation_date" required class="input">
            </div>
            <div class="column">
                <label for="reservation_time">Reservation time:</label>
                <input type="time" id="reservation_time" name="reservation_time" required  class="time">
            </div>
            <div class="col-md-12">
                <input type="hidden" name="status" value = '0' >
            </div>
                
            <button type="submit" name="reserve_btn" class="reg" >Reserve</button> 
            <a href="index.php">Back to Home</a>
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