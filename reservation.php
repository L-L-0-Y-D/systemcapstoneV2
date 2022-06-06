<?php

    include('functions/userfunctions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
</head>
<body>
    <h3>Reservation</h3>
    <form method="POST" action="functions/reservation.php">
            <div class="column">
                <label for="numberofguest">Number of Guest</label>
                <input type="number" id="numberofguest" name='numberofguest' required placeholder="Number of guest" class="input"/>
            </div>
            <div class="column">
                <label for="namereserveunder">Name Reserved Under</label>
                <input type="text" id="namereserveunder" name='namereserveunder' required placeholder="Name Reserve under" class="input"/>
            </div>
            <div class="column">
                <label for="reservation_email">Email:</label>
                <input type="email" id="reservation_email" name="reservation_email" required placeholder="Email" class="input">
            </div>
            <div class="column">
                <label for="reservation_phonenumber">Phonenumber:</label>
                <input type="text" id="reservation_phonenumber" name="reservation_phonenumber" required placeholder="Phonenumber" class="input">
            </div>
            <div class="column">
                <label for="reservation_date">Reservation Date:</label>
                <input type="date" id="reservation_date" name="reservation_date">
            </div>
            <div class="column">
                <label for="reservation_time">Reservation time:</label>
                <input type="time" id="reservation_time" name="reservation_time">
            </div>
                
            <button type="submit" name="register_btn" class="busi_reg-btn" >REGISTER</button> <br> <br>
            <a href="index.php">Back to Home</a>
    </div>
</form>
    
    
</body>
</html>