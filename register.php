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

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>

    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style-for-userregistration.css">
    <title>Register | I-Eat</title>

    <!-- Favicon -->
    <link rel="icon" href="uploads/favicon.ico"/>
    <style>
        body {
        background-image: url(uploads/layout1.jpg)!important;
        background-attachment:fixed;
        background-position:center;
        background-repeat: no-repeat;
        background-size: cover;
        }
    </style>
</head>
<body><nav class="navbar navbar-expand-md fixed-top navbar-shrink py-3" id="mainNav" style="background-color:rgb(255,128,64); box-shadow: 0px 0px 18px var(--bs-gray); height: 80px;">
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
                        </span>
                    </div>
                </nav>
        </div>
    </nav>
<section class="reg">   
<div class="container">
	<div class="header">
		<h2>Create Account</h2>
	</div>
    <form method="post" action="functions/authcode.php" enctype="multipart/form-data" name="registrationForm" id="form" class="form">
	<!--<label class="form-label mt-0">Upload your profile (max 2mbs)</label>
        <input class="form-control" type="file" name="image" required> -->
        <div class="form-control">
			<label for="username">Username</label>
            <!-- /* A php code that is used to check if the name is set or not. If
            it is set then it will display the name in the input field. */ -->
            <?php if (isset($_GET['name'])){?>
                <input type="text" name="name" id="username" value="<?= $_GET['name']?>" oninput="checkUsername();" required >
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small >Error message</small>
            <?php }else{?>
                <input type="text" name="name" id="username" oninput="checkUsername();" required >
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small >Error message</small>
            <?php }?>
		</div>
		<div class="form-control">
			<label for="email">Email Address</label>
            <!-- /* Checking if the email is set or not. If it is set then it will
            display the email in the input field. */ -->
            <?php if (isset($_GET['email'])){?>
                <input type="email" name="email" id="email" oninput="checkEmail();" value="<?= $_GET['email']?>" required>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            <?php }else{?>
                <input type="email" name="email" id="email" oninput="checkEmail();" required>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            <?php }?>
		</div>
        <div class="form-control">
            <label for="fname">Firstname</label>
            <!-- /* Checking if the firstname is set or not. If it is set then it
            will display the firstname in the input field. */ -->
            <?php if (isset($_GET['firstname'])){?>
                <input name="firstname" type="text" id="firstname" value="<?= $_GET['firstname']?>" oninput="checkFname();" required>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            <?php }else{?>
                <input name="firstname" type="text" id="firstname" oninput="checkFname();" required>
                <i id="check" class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            <?php }?>
        </div>
        <div class="form-control">
            <label for="lname">Lastname</label>
            <!-- /* Checking if the lastname is set, if it is then it will display
            the value of the lastname. If it is not set then it will display
            the placeholder. */ -->
            <?php if (isset($_GET['lastname'])){?>
                <input name="lastname" type="text" id="lastname" value="<?= $_GET['lastname']?>" oninput="checkLname();"  required>
                <i id="check" class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            <?php }else{?>
                <input name="lastname" type="text" id="lastname" oninput="checkLname();" required>
                <i id="check" class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            <?php }?>
        </div>
        <div class="form-control">
            <label for="dob">Date of Birth</label>
            <?php if (isset($_GET['dateofbirth'])){?>
                <input name='dateofbirth' type="date" id="date" value="<?= $_GET['dateofbirth'] ?>" oninput="checkBirthDate();"  required>
                <i id="check" class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            <?php }else{?>
                <input name='dateofbirth' type="date" id="date" oninput="checkBirthDate();" required>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error Message</small>
            <?php }?> 
        </div>
        <div class="form-control">
            <label for="number">Contact Number</label>
            <!-- /* Checking if the variable phonenumber is set. If it is, it will
            display the value of the variable. If it is not set, it will
            display nothing. */ -->
            <?php if (isset($_GET['phonenumber'])){?>
                <input name="phonenumber" type="text" id="phonenumber" value="<?= $_GET['phonenumber']?>" oninput="checkPhoneNum();" required >
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small >Error Message</small>
            <?php }else{?>
                <input name="phonenumber" type="text" id="phonenumber" oninput="checkPhoneNum();" required >
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small >Error Message</small>
            <?php }?> 
        </div>
    <!--<div class="form-control">
            <label for="">Address</label>
            /* Checking if the address is set, if it is then it will display
            the address in the input field. If it is not set then it will
            display the input field without the address. */
            <?php if (isset($_GET['address'])){?>
                <input name="address" type="text" value="<?= $_GET['address']?>" required >
            <?php }else{?>
                <input name="address" type="text" required>
            <?php }?>
        </div>-->
		<div class="form-control">
            <label for="password">Password</label>
            <input class="form-control" type="password" name="password" id="password" oninput="checkPassword();" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
            <i id="check" class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
           
            <div id="pwordValidation">
                    <h3>Password must contain the following:</h3>
                    <p id="letter" class="invalid">A lowercase letter</p>
                    <p id="capital" class="invalid">An Uppercase letter</p>
                    <p id="number" class="invalid">A number</p>
                    <p id="length" class="invalid">Must be atleast 8 characters</b></p>
                </div>
		</div>
		<div class="form-control">
			<label for="cpassword">Confirm Password</label>
            <input class="form-control" type="password" name="confirmpassword" id="password2" oninput="checkPassword2();" required>
            <input type = "hidden" name='role_as' value = '0'>
            <i class="fas fa-check-circle"></i>
            <i class="fas fa-exclamation-circle"></i>
            <small>Error message</small>
		</div>
        <button class="btn btn-primary" type="submit" name="registerbutton">Register</button>
        <p>Already have an account?&nbsp &nbsp<a href="login.php">Login</a></p>
	</form>
</div>

    <script src="assets/js/register-js.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script>
    <?php if(isset($_SESSION['message'])) 
    { ?>
        swal({
            title: "<?= $_SESSION['message']; ?>",
            icon: "<?= $_SESSION['alert']; ?>",
            button: "Okay",
            timer: 10500,
            });
        <?php 
        unset($_SESSION['message']);
        unset($_SESSION['alert']);
    }
    
    ?>
    </script>  
</section>   
</body>
</html>