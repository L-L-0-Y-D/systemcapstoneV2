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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Inter.css">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links.css">
    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css">
    <link rel="stylesheet" href="reg.css">
    <title>Register | I-Eat</title>

    <!-- Favicon -->
    <link rel="icon" href="uploads/favicon.ico"/>

</head>
<body >
    <nav class="navbar navbar-expand-md fixed-top navbar-shrink py-3" id="mainNav" style="background-color:rgb(255,128,64); box-shadow: 0px 0px 18px var(--bs-gray); height: 80px;">
            <div class="container ml-2">
                <a class="navbar-brand" href="index.php" style="color: white;font-size: 28px;">
                    <span><img src="uploads/logoT.png" usemap=#workmap style="width: 50px;">&nbsp;</span>
                        <map name="workmap">
                            <area shape="circle" coords="100,100,300,300" alt="logo" href="index.php">
                        </map>I - Eat</a>
                <nav class="navbar navbar-expand">
                    <div class="container-fluid">
                        <span class="bs-icon-md d-flex justify-content-center align-items-center me-2 bs-icon" style="background: transparent;">
                        <a href="index.php"><i class="fa fa-home" style="float:right; color:white;"></i></a>
                        </span></div>
                </nav>
            </div>
        </nav>
    <section class="position-relative py-4 py-xl-5">
        <div class="container" style="margin-top:50px;">
            <div class="row d-flex justify-content-center align-items-md-end">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5" style="border-style: none;">
                        <div class="card-body d-flex flex-column align-items-center" style="border-radius: 10px;border-style: solid;border-color: rgb(255, 128, 64);box-shadow: 0px 0px 18px var(--bs-gray);">
                           
            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4" style="height:110px; width:110px; border-style: solid;border-color: rgb(255, 128, 64);background: transparent;">
                <picture><img src="uploads/I-EatLogo.png" style="width: 150px;height: 150px;" usemap=#workmap></picture>
                    <map name="workmap">
                        <area shape="circle" coords="100,100,300,300" alt="logo" href="index.php">
                    </map>
            </div>
                <form method="post" action="functions/authcode.php" enctype="multipart/form-data">
                <p class="fw-bold text-center " style="margin-bottom: 5px; font-size:20px;">Create an Account</p>
                <input class="form-control" name="image" type="file" style="margin-bottom: 10px;" required>
                                <div class="row row-cols-1" style="margin-bottom: 10px;">
                                    <div class="col"><input class="form-control" type="text" name="name" placeholder="Username" required style="margin-bottom: 10px;"></div>
                                    <div class="col"><input class="form-control" type="email" name="email" placeholder="Email Address" required></div>
                                    <div class="w-100"></div>
                                </div>
                                <div class="row" style="margin-bottom: 10px;">
                                    <div class="col"><input class="form-control" name="firstname" type="text" placeholder="Firstname" required></div>
                                    <div class="col"><input class="form-control" name="lastname" type="text" placeholder="Lastname" required></div>
                                </div>
                                <div class="mb-3">
                                    <p class="fw-normal text-start" style="margin-bottom: 1px;padding-left: 10px;">Birthdate</p>
                                    <input class="form-control" name='dateofbirth' type="date" required>
                                </div>
                                <div class="mb-3"><input class="form-control" name="phonenumber" type="text" placeholder="Phone Number"required ></div>
                                <div class="mb-3"><input class="form-control" name="address" type="text" placeholder="Address" required></div>
                                <div class="row" style="margin-bottom: 10px;">
                                    <div class="col"><input class="form-control" name="password" type="password" placeholder="Password" required></div>
                                    <div class="col"><input class="form-control" name="confirmpassword" type="password" placeholder="Confirm Password" required>
                                    <input type = "hidden" name='role_as' value = '0'></div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary d-block w-100" type="submit" name="register_btn" style="background: rgb(255, 128, 64);border-style: none;">Register</button>
                                </div>
                                <p style="padding-left:30px;">Already have an account?&nbsp;<a href="login.php" style="color: var(--bs-dark);font-weight: bold;">Sign In</a>&nbsp;</p>
        </form>
</div>
</div>
</div>
</div>
</div>
</section>
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