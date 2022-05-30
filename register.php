<?php

session_start();
include 'connection.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reg.css"> 
    <title>Register an Account</title>
</head>
<body>
    <header>
        <img src="uploads/I-EatLogo.png" alt="LOGO" usemap="#workmap" width="200" height="200">
    <map name="workmap">
        <area shape="circle" coords="100,100,400,400" alt="logo" href="index.php">
    </map>
    </header>
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php 
                    if(isset($_SESSION['message'])) 
                    {
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Hey!</strong> <?= $_SESSION['message']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        unset($_SESSION['message']);
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
<main>
    <div class="container">
        <p>REGISTER</p>
        <form method="post" action="functions/authcode.php">
         <!-- Input Username -->
        <div class="column">
            <input type="text" name='username' required placeholder="Username" class="input"/>    
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