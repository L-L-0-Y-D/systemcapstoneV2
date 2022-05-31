<?php

session_start();
if(isset($_SESSION['auth'])){
    $_SESSION['message'] = "You are Already Login";
    header('Location: index.php');
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reg.css"> 

    <title>Login Customer Account</title>

</head>
<body>
    <header>
        <img src="uploads/I-EatLogo.png" alt="LOGO" usemap="#workmap" width="200" height="200">
    <map name="workmap">
        <area shape="circle" coords="100,100,400,400" alt="logo" href="index.php">
    </map>
    </header>

<main>
    <div class="container">
        <p>REGISTER</p>
        <form method="post" action="functions/authcode.php">
        <!-- Input Image -->
        <div class="column">
            <div class="input">
                <label for="">Upload Image</label><br>
                <input type="file" name="image" required class="form-control">
            </div>
        </div>
         <!-- Input Username -->
        <div class="column">
            <input type="text" name='name' required placeholder="Username" class="input"/>    
        </div>
        <!-- Input Email Address -->
        <div class="column">
            <input type="text" name='email' required placeholder="Email Address" class="input"/>    
        </div>
        <!-- Input Firstname -->
        <div class="column">
            <input type="text" name='firstname' required placeholder="Firstname" class="input"/>
        </div>
        <!-- Input Lastname -->
        <div class="column">
            <input type="text" name='lastname' required placeholder="Lastname" class="input"/>
        </div>
         <!-- Input Age -->
         <div class="column">
            <input type="number" name='age' required placeholder="Age" class="input"/>
        </div>
        <!-- Input Phone Number -->
        <div class="column">
            <input type="text" name='phonenumber' required placeholder="Phone Number" class="input"/>
        </div>
        <!-- Input Address -->
        <div class="column">
            <input type="text" name='address' required placeholder="Address" class="input"/>
        </div>
        <!-- Input Password -->
        <div class="column">
            <input type="password" name='password' required placeholder="Password" class="input"/>
        </div>
        <!-- Input Confirm Password -->
        <div class="column">
            <input type="password" name='confirmpassword' required placeholder="Confirm Password" class="input"/>
        </div>
        <input type = "hidden" name='role_as' value = '0'>
            <!--Register Button -->
            <button type="submit" name="register_btn" class="reg-btn" >REGISTER</button> <br> <br>
            <!--link to connect with log in php-->
            <a href="login.php">Login an account</a>
        </form>
    </div>
</main>
    
</body>
</html>