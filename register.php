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
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="assets/css/vanilla-zoom.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style-for-userregistration.css">
    <title>Register | I-Eat</title>

    <!-- Favicon -->
    <link rel="icon" href="uploads/favicon.ico"/>

</head>
<body >
    <div class="container">
        <div class="header"><h2>Create an Account</h2></div>
        <form method="post" action="functions/authcode.php" enctype="multipart/form-data" name="registrationForm" class="registration">
            <!-- <label class="form-label mt-0">Upload your profile (max 2mbs)</label>
                <input class="form-control" type="file" name="image" required> -->
            <div class="form-control ">
                <label for="">Username</label>
                <!-- /* A php code that is used to check if the name is set or not. If
                it is set then it will display the name in the input field. */ -->
                <?php if (isset($_GET['name'])){?>
                    <input type="text" name="name" id="name" value="<?= $_GET['name']?>" required >
                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small ></small>
                <?php }else{?>
                    <input type="text" name="name" id="name" required >
                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small ></small>
            <?php }?>
            </div>
            <div class="form-control success">
                <label for="">Email Address</label>
                <!-- /* Checking if the email is set or not. If it is set then it will
                display the email in the input field. */ -->
                <?php if (isset($_GET['email'])){?>
                    <input type="email" name="email" id="email" value="<?= $_GET['email']?>" required>
                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error Message</small>
                <?php }else{?>
                    <input type="email" name="email" id="email" required>
                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error Message</small>
                <?php }?>
            </div>
            <div class="form-control">
                <label for="">Firstname</label>
                <!-- /* Checking if the firstname is set or not. If it is set then it
                will display the firstname in the input field. */ -->
                <?php if (isset($_GET['firstname'])){?>
                    <input name="firstname" type="text" id="firstname"  value="<?= $_GET['firstname']?>" required>
                <?php }else{?>
                    <input name="firstname" type="text" id="firstname" required>
                <?php }?>
            </div>
            <div class="form-control">
                <label for="">Lastname</label>
                <!-- /* Checking if the lastname is set, if it is then it will display
                the value of the lastname. If it is not set then it will display
                the placeholder. */ -->
                <?php if (isset($_GET['lastname'])){?>
                    <input name="lastname" type="text" id="lastname" value="<?= $_GET['lastname']?>"  required>
                <?php }else{?>
                    <input name="lastname" type="text" id="lastname" required>
                <?php }?>
            </div>
            <div class="form-control">
                <label for="">Date of Birth</label>
                <?php if (isset($_GET['dateofbirth'])){?>
                    <input name='dateofbirth' type="date" id="date" value="<?= $_GET['dateofbirth'] ?>"  required>
                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error Message</small>
                <?php }else{?>
                    <input name='dateofbirth' type="date" id="date" required>
                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error Message</small>
                <?php }?> 
            </div>
            <div class="form-control">
                <label for="">Contact Number</label>
                <!-- /* Checking if the variable phonenumber is set. If it is, it will
                display the value of the variable. If it is not set, it will
                display nothing. */ -->
                <?php if (isset($_GET['phonenumber'])){?>
                    <input name="phonenumber" type="text" id="phonenumber" value="<?= $_GET['phonenumber']?>" required >
                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error Message</small>
                <?php }else{?>
                    <input name="phonenumber" type="text" id="phonenumber" required >
                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error Message</small>
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
            <div class="form-control password">
                <label for="">Password</label>
                <input class="form-control" type="password" name="password" id="password" pattern=" ([^A-Za-z0-9])(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters." required>
                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i>
                <div id="pwordValidation">
                    <h3>Password must contain the following:</h3>
                    <p id="special" class="invalid">A Special Character</p>
                    <p id="capital" class="invalid">An Uppercase letter</p>
                    <p id="number" class="invalid">A number</p>
                    <p id="length" class="invalid">Must be atleast 8 characters</b></p>
                </div>
            </div>
            <div class="form-control">
                <label for="">Confirm Password</label>
                <input class="form-control" type="password" name="confirmpassword" id="confirmpassword" required>
                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error Message</small>
                <input type = "hidden" name='role_as' value = '0'>
            </div>
            <button class="btn btn-primary" type="submit" name="registerbutton">Register</button>
            <p>Already have an account?&nbsp &nbsp<a href="login.php">Login</a></p>
        </form>
    </div>
<script>
    var pwordValidation = document.getElementById('pwordValidation');
    var myInput = document.getElementById("password");
    var special = document.getElementById("special");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("pwordValidation").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("pwordValidation").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate Special Characters
  var specialCharacters = /[^A-Za-z0-9]/g;
  if(myInput.value.match(specialCharacters)) {  
    special.classList.remove("invalid");
    special.classList.add("valid");
  } else {
    special.classList.remove("valid");
    special.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>



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
</body>
</html>