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
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="reg.css">
    <title>Register | I-Eat</title>

    <!-- Favicon -->
    <link rel="icon" href="uploads/favicon.ico"/>

</head>
<body>
    <main class="page registration-page">
        <section class="clean-block clean-form dark" style="height: auto;background: transparent;">
            <img class="img-fluid d-flex d-lg-flex align-items-center m-auto" loading="eager" src="uploads/I-EatLogo.png" width="200px" height="200px" alt="logo" usemap="#workmap">
                <map name="workmap">
                    <area shape="circle" coords="100,100,300,300" alt="logo" href="index.php">
                </map>
                <form method="post" action="functions/authcode.php" enctype="multipart/form-data" style="background: rgb(255, 128, 64);border:none;border-radius: 20px;">
                    <div class="container">
                        <h2 class="d-flex justify-content-center" style="font-weight:bold;">REGISTER</h2>
                        <!-- Input Image -->
                        <div class="column mb-3">
                            <label class="form-label" for="" style="font-weight: bold;">Upload Image</label>
                            <input class="form-control" type="file" name="image" style="margin-bottom: 5px;height: 40px;" required >
                        </div>
                        <!-- Input Username -->
                        <div class="column mb-3">
                            <label class="form-label" for="" style="font-weight: bold;">Username</label>
                            <input type="text" name='name' class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>    
                        </div>
                        <!-- Input Email Address -->
                        <div class="column mb-3">
                            <label class="form-label" for="" style="font-weight: bold;">Email Address</label>
                            <input type="email" name='email' class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>    
                        </div>
                        <!-- Input Firstname -->
                        <div class="column mb-3">
                            <label class="form-label" for="" style="font-weight: bold;">Firstname</label>
                            <input type="text" name='firstname' class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
                        </div>
                        <!-- Input Lastname -->
                        <div class="column mb-3">
                            <label class="form-label" for="" style="font-weight: bold;">Lastname</label>
                            <input type="text" name='lastname' class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
                        </div>
                        <!-- Input Date of birth -->
                        <div class="column mb-3">
                            <label class="form-label" for="" style="font-weight: bold;">Date of birth</label>
                            <input type="date" name='dateofbirth' class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
                        </div>
                        <!-- Input Phone Number -->
                        <div class="column mb-3">
                            <label class="form-label" for="" style="font-weight: bold;">Phone Number</label>
                            <input type="text" name='phonenumber' class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
                        </div>
                        <!-- Input Address -->
                        <div class="column mb-3">
                            <label class="form-label" for="" style="font-weight: bold;">Address</label>
                            <input type="text" name='address' class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
                        </div>
                        <!-- Input Password -->
                        <div class="column mb-3">
                            <label class="form-label" for="" style="font-weight: bold;">Password</label>
                            <input type="password" name='password' class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
                        </div>
                        <!-- Input Confirm Password -->
                        <div class="column mb-3">
                            <label class="form-label" for="" style="font-weight: bold;">Confirm Password</label>
                            <input type="password" name='confirmpassword' class="form-control form-control-sm item" style="font-size: 14px;height: 40px;" required>
                            <input type = "hidden" name='role_as' value = '0'>
                        </div>
                        <!--Register Button -->
                        <button class="btn btn-primary d-flex d-xl-flex align-items-center m-auto" type="submit" name="register_btn" style="background: black;color: white;border-style: none;padding-right: 15px;padding-left: 15px;font-size: 18px;padding-bottom: 7px;">REGISTER</button> <br>
                        <!--link to connect with log in php-->
                        <a class="d-flex justify-content-center" style="color: black;" href="login.php">Login an account</a>
        </form>
    </div>
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