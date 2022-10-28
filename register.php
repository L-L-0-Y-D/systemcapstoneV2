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
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/assets/css/vanilla-zoom.min.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tiro+Kannada&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css?h=21f14b60305aa9b0449170550a54b7e5">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Basic.css?h=561e53509f5bc926993a2226fdbdf2f4">
    <link rel="stylesheet" href="assets/css/styles.css?h=d41d8cd98f00b204e9800998ecf8427e">
    <link rel="stylesheet" href="reg.css">
    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
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
        <div class="container ">
        <!-- <div class="row mx-auto bg-white" style="width: 60%;margin-top: 7vw;">
            <div class="col d-flex flex-column align-items-center" style="border-radius: 15px;border-style: solid;border-color: rgb(255,128,64);text-align: center;">
                <div style="text-align: center; ">
                    <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4" style="height:110px; width:110px; border-style: solid;border-color: rgb(255, 128, 64);background: transparent;">
                        <img src="uploads/I-EatLogo.png" style="width: 150px;height: 150px;" usemap=#workmap>
                        <map name="workmap">
                            <area shape="circle" coords="100,100,300,300" alt="logo" href="index.php">
                        </map>
                    </div>
                <div>
                    <h1 style="text-align: center;font-size: 20px;font-weight: bold;">Create an Account</h1>
                </div>
                <div>
                    <p style="margin-bottom: 0px;text-align: left;">&nbsp;Upload your Profile</p>
                    <input type="file" class="form-control" style="margin-top: 2px;margin-bottom: 5px;">
                    <input type="text" class="form-control" style="margin-bottom: 5px;" placeholder="Username">
                    <input type="text" class="form-control" style="margin-bottom: 5px;" placeholder="Email Address">
                </div>
                <div class="row">
                    <div class="col"><input type="text" class="form-control" style="margin-bottom: 5px;" placeholder="First Name"></div>
                    <div class="col"><input type="text" class="form-control" style="margin-bottom: 5px;" placeholder="Last Name"></div>
                </div>
                <p style="margin-bottom: 0px;text-align: left;">&nbspBirthdate</p><input class="form-control" type="date" style="margin-bottom: 5px;"><input type="text" class="form-control" style="margin-bottom: 5px;" placeholder="Phone Number"><input type="text" class="form-control" style="margin-bottom: 5px;" placeholder="Address">
                <div class="row" style="margin-bottom: 5px;">
                    <div class="col"><input type="password" class="form-control" placeholder="Password"></div>
                    <div class="col"><input type="password" class="form-control" placeholder="Confirm Password"></div>
                </div><button class="btn btn-primary" type="submit" style="background: rgb(255,128,64);border-style: none;border-radius: 5px;font-weight: bold;margin-bottom: 5px;">REGISTER</button>
                <p style="margin-bottom: 0px;text-align: center;">Already have an account?&nbsp;<a href="#">LOGIN</a></p>
            </div>
        </div>
    </div> -->
    <section class="position-relative py-4 py-xl-5 " style="width:100;">
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
                                    <!-- /* A php code that is used to check if the name is set or not. If
                                    it is set then it will display the name in the input field. */ -->
                                    <?php if (isset($_GET['name'])){?>
                                        <div class="col">
                                            <input class="form-control" type="text" name="name" placeholder="Username" value="<?= $_GET['name']?>" required style="margin-bottom: 10px;"></div>
                                    <?php }else{?>
                                        <div class="col">
                                            <input class="form-control" type="text" name="name" placeholder="Username" required style="margin-bottom: 10px;"></div>
                                    <?php }?>

                                    <!-- /* Checking if the email is set or not. If it is set then it will
                                    display the email in the input field. */ -->
                                    <?php if (isset($_GET['email'])){?>
                                        <div class="col">
                                            <input class="form-control" type="email" name="email" placeholder="Email Address" value="<?= $_GET['email']?>" required></div>
                                    <?php }else{?>
                                        <div class="col">
                                            <input class="form-control" type="email" name="email" placeholder="Email Address"  required></div>
                                    <?php }?>

                                    <div class="w-100"></div>

                                </div>
                                <div class="row" style="margin-bottom: 10px;">
                                    <!-- /* Checking if the firstname is set or not. If it is set then it
                                    will display the firstname in the input field. */ -->
                                    <?php if (isset($_GET['firstname'])){?>
                                        <div class="col">
                                            <input class="form-control" name="firstname" type="text" placeholder="Firstname" value="<?= $_GET['firstname']?>"  required></div>
                                    <?php }else{?>
                                        <div class="col">
                                            <input class="form-control" name="firstname" type="text" placeholder="Firstname"  required></div>
                                    <?php }?>
                                    
                                    <!-- /* Checking if the lastname is set, if it is then it will display
                                    the value of the lastname. If it is not set then it will display
                                    the placeholder. */ -->
                                    <?php if (isset($_GET['lastname'])){?>
                                        <div class="col">
                                            <input class="form-control" name="lastname" type="text" placeholder="Lastname" value="<?= $_GET['lastname']?>"  required></div>
                                    <?php }else{?>
                                        <div class="col">
                                            <input class="form-control" name="lastname" type="text" placeholder="Lastname"  required></div>
                                    <?php }?> 

                                </div>
                                <div class="mb-3">
                                    <p class="fw-normal text-start" style="margin-bottom: 1px;padding-left: 10px;">Birthdate</p>
                                    <?php if (isset($_GET['dateofbirth'])){?>
                                        <div class="col">
                                        <input class="form-control" name='dateofbirth' type="date" placeholder="Birthdate" value="<?= $_GET['dateofbirth'] ?>"  required></div>
                                    <?php }else{?>
                                        <div class="col">
                                            <input class="form-control" name='dateofbirth' type="date" placeholder="Birthdate" required></div>
                                    <?php }?> 
                                </div>
                                    
                                <div class="row" style="margin-bottom: 10px;"> 
                                    <!-- /* Checking if the variable phonenumber is set. If it is, it will
                                    display the value of the variable. If it is not set, it will
                                    display nothing. */ -->
                                    <?php if (isset($_GET['phonenumber'])){?>
                                        <div class="col-mb-3">
                                            <input class="form-control mb-2" name="phonenumber" type="text" placeholder="Phone Number" value="<?= $_GET['phonenumber']?>"  required ></div>
                                    <?php }else{?>
                                        <div class="col-mb-3">
                                            <input class="form-control mb-2" name="phonenumber" type="text" placeholder="Phone Number" required ></div>
                                    <?php }?> 

                                    <!-- /* Checking if the address is set, if it is then it will display
                                    the address in the input field. If it is not set then it will
                                    display the input field without the address. */ -->
                                    <?php if (isset($_GET['address'])){?>
                                        <div class="col">
                                            <input class="form-control" name="address" type="text"  placeholder="Address" value="<?= $_GET['address']?>"  required ></div>
                                    <?php }else{?>
                                        <div class="col">
                                            <input class="form-control" name="address" type="text"  placeholder="Address" required></div>
                                    <?php }?>
                                </div> 

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