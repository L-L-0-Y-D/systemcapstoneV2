<?php

session_start();
if(isset($_SESSION['auth'])){
    $_SESSION['message'] = "You are Already Login";
    $_SESSION['alert'] = "warning";
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
    <link rel="stylesheet" href="assets/css/styles.css">
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

    <form method="post" action="functions/authcode.php" enctype="multipart/form-data" class="registration">
        <div class="containe">
            <h5 class="pt-4">Create a User Account</h5>
            <hr>
                <label class="form-label mt-0">Upload your profile (max 2mb)</label>
                <input class="form-control" type="file" name="image" required>
            <div class="row">
                <div class="col">
                    <label class="form-label">Username</label>
                    <!-- /* A php code that is used to check if the name is set or not. If
                    it is set then it will display the name in the input field. */ -->
                        <?php if (isset($_GET['name'])){?>
                            <div class="col">
                                <input class="form-control" type="text" name="name" value="<?= $_GET['name']?>" required ></div>
                        <?php }else{?>
                            <div class="col">
                                <input class="form-control" type="text" name="name" required ></div>
                        <?php }?>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email Address</label>
                    <!-- /* Checking if the email is set or not. If it is set then it will
                    display the email in the input field. */ -->
                        <?php if (isset($_GET['email'])){?>
                            <div class="col">
                                <input class="form-control" type="email" name="email" value="<?= $_GET['email']?>" required></div>
                        <?php }else{?>
                            <div class="col">
                                <input class="form-control" type="email" name="email"  required></div>
                        <?php }?>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Firstname</label>
                    <!-- /* Checking if the firstname is set or not. If it is set then it
                    will display the firstname in the input field. */ -->
                        <?php if (isset($_GET['firstname'])){?>
                            <div class="col">
                                <input class="form-control" name="firstname" type="text"  value="<?= $_GET['firstname']?>" required></div>
                        <?php }else{?>
                            <div class="col">
                                <input class="form-control" name="firstname" type="text" required></div>
                        <?php }?>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Lastname</label>
                    <!-- /* Checking if the lastname is set, if it is then it will display
                    the value of the lastname. If it is not set then it will display
                    the placeholder. */ -->
                        <?php if (isset($_GET['lastname'])){?>
                            <div class="col">
                                <input class="form-control" name="lastname" type="text" value="<?= $_GET['lastname']?>"  required></div>
                        <?php }else{?>
                            <div class="col">
                                <input class="form-control" name="lastname" type="text" required></div>
                        <?php }?>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Date of Birth</label>
                        <?php if (isset($_GET['dateofbirth'])){?>
                            <div class="col">
                                <input class="form-control" name='dateofbirth' type="date" value="<?= $_GET['dateofbirth'] ?>"  required></div>
                        <?php }else{?>
                            <div class="col">
                                <input class="form-control" name='dateofbirth' type="date" required></div>
                        <?php }?> 
                </div>
                <div class="col-md-6">
                    <label class="form-label">Contact Number</label>
                    <!-- /* Checking if the variable phonenumber is set. If it is, it will
                    display the value of the variable. If it is not set, it will
                    display nothing. */ -->
                        <?php if (isset($_GET['phonenumber'])){?>
                            <div class="col">
                                <input class="form-control mb-2" name="phonenumber" type="text" value="<?= $_GET['phonenumber']?>" required ></div>
                        <?php }else{?>
                            <div class="col">
                                <input class="form-control mb-2" name="phonenumber" type="text" required ></div>
                        <?php }?> 
                </div>
                <div class="col-mb-3">
                    <label class="form-label">Address</label>
                    <!-- /* Checking if the address is set, if it is then it will display
                    the address in the input field. If it is not set then it will
                    display the input field without the address. */ -->
                        <?php if (isset($_GET['address'])){?>
                            <div class="col">
                                <input class="form-control" name="address" type="text" value="<?= $_GET['address']?>" required ></div>
                        <?php }else{?>
                            <div class="col">
                                <input class="form-control" name="address" type="text" required></div>
                        <?php }?>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Password</label>
                    <input class="form-control" type="password" name="password" required>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Confirm Password</label>
                    <input class="form-control" type="password" name="confirmpassword" required>
                    <input type = "hidden" name='role_as' value = '0'>
                </div>
            </div>
            <button class="btn btn-primary" type="submit" name="register_btn">Register</button>
            <p>Already have an account?&nbsp &nbsp<a href="login.php">Login</a></p>
        </div>
    </form>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        <?php if(isset($_SESSION['message'])) 
    { ?>
        swal({
            title: "<?= $_SESSION['message']; ?>",
            icon: "<?= $_SESSION['alert']; ?>",
            button: "Okay",
            timer: 1500,
            });

        <?php 
        unset($_SESSION['message']);
        unset($_SESSION['alert']);
    }
    ?> 
    </script>     
</body>
</html>