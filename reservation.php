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
    <title>Reservation</title>
</head>
<body>
    <header>
         <img src="uploads/I-EatLogo.png" alt="LOGO" usemap="#workmap" width="200" height="200">
    <map name="workmap">
        <area shape="circle" coords="100,100,400,400" alt="logo" href="index.php">
    </map>
    </header>
    <form method="POST" action="functions/reservation.php">
    <h3>Reservation</h3>
            <div class="column">
                <label for="numberofguest">Number of Guest:</label>
                <input type="number" id="numberofguest" name='numberofguest' required placeholder="Number of guest" class="input"/>
            </div>
            <div class="column">
                <label for="namereserveunder">Name Reserved Under:</label>
                <input type="text" id="namereserveunder" name='namereserveunder' required placeholder="Name Reserve under" class="under" required class="input"/>
            </div>
            <div class="column">
                <label for="reservation_email">Email:</label>
                <input type="email" id="reservation_email" name="reservation_email" required placeholder="Email" class="email" required class="input">
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
                <input type="time" id="reservation_time" name="reservation_time" class="time">
            </div>
                
            <button type="submit" name="register_btn" class="reg" >REGISTER</button> 
            <a href="index.php">Back to Home</a>
    </div>
</form>    
</body>
</html>