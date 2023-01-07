<?php
    include('middleware/userMiddleware.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Montserrat.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.11.1/baguetteBox.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="assets/css/style-for-userchangepass.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <title>Change User Password | I - EAT </title> 
    <style>
        .login {
            background-image: url(uploads/layout1.jpg)!important;
            background-attachment:fixed;
            background-position:center;
            background-repeat: no-repeat;
            background-size: cover;
            height:100%; 
           
            }
    </style>
    <!-- Favicon -->
    <link rel="icon" href="uploads/favicon.ico"/>
</head>
<body>
<section class="login">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-xl-4">
            <?php 
            if(isset($_GET['id']))
            {
                $id = $_GET['id'];
                $user = getByID("users",$id,"userid");

                if(mysqli_num_rows($user) > 0)
                {
                    $data = mysqli_fetch_array($user)
                    
                
                ?>
                <div class="card mb-5">
                    <div class="card-body d-flex flex-column">
                        <form action="functions/authcode.php" method="POST"> 
                            <div class="row d-flex">
                                <div class="mb-2">
                                    <button class="btn btn-close btn-sm float-end" onclick="location.href='index.php'"></button>
                                </div>
                                <div class="col-md-12 form-content">
                                    <input type="hidden" name="userid" value="<?= $data['userid'] ?>">
                                    <label class="form-label" for="currentpassword">Enter Current Password</label>
                                    <input  type="password" name="oldpassword" id="oldpassword" required>
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                </div>
                                <div class="col-md-12 form-content">                      
                                    <label class="form-label" for="newpass">Enter New Password</label>
                                    <input type="password" name="password" id="newpass"  oninput="checkNewPassword();"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  required>
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                    <div id="newpassValidation">
                                        <h3>Password must contain the following:</h3>
                                        <p id="letter" class="invalid">A lowercase letter</p>
                                        <p id="capital" class="invalid">An Uppercase letter</p>
                                        <p id="number" class="invalid">A number</p>
                                        <p id="length" class="invalid">Must be atleast 8 characters</b></p>
                                    </div>
                                </div>
                                <div class="col-md-12 form-content">
                                    <label class="form-label" for="confirmnewpass">Confirm New Password</label>
                                    <input type="password" name="confirmpassword"  id="confirmpassword" oninput="checkconNewPword();" required>
                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                </div>
                                <div class="mb-1">
                                    <button class="btn btn-primary mt-3" type="submit" name="edit_password_btn">Update Password</button>
                                </div>
                                </div>
                        </form>
                    </div>
                </div>
                <?php
                }
                else
                {
                    echo "User not Found";
                }
            }
            else
            {
            echo"ID missing from url";
            }
                ?>
        </div>
    </div>  
    </div>
   <script>
    // function checkOldPass() {
    // oninput="checkOldPass();" 
	// // trim to remove the whitespaces
	// const oldpassValue = oldpassword.value.trim();

	// if(oldpassValue === '') {
	// 	setErrorFor(oldpassword, 'Please type your old password.');
	// } else {
	// 	setSuccessFor(oldpassword);
	// }	
    // }  
   </script>
    <script>
        function checkconNewPword() {
        const newpassValue = newpass.value.trim();
        const connewpassValue = confirmpassword.value.trim();
        // If password not entered
        if (newpassValue == '')
        setErrorFor(confirmpassword, 'Please enter your password first.'); 

        // If confirm password not entered
        else if (connewpassValue == '')
        setErrorFor(confirmpassword, 'Confirm your password.'); 

        // If Not same return False.    
        else if (newpassValue != connewpassValue) {
        setErrorFor(confirmpassword, 'Password did not match.'); 
            return false;              
        }
        // If same return True.
        else{  
            setSuccessFor(confirmpassword, 'Password Match!'); 
            return true;
        }
        }
    </script>
    <script>
        function setErrorFor(input, message) {
            const formContent = input.parentElement;
            const small = formContent.querySelector('small');
            formContent.className = 'form-content error';
            small.innerText = message;
        }

        function setSuccessFor(input) {
            const formContent = input.parentElement;
            formContent.className = 'form-content success';
        }
    </script>
    <script>
    //FOR PASSWORD VALIDATION
var newpassValidation = document.getElementById('newpassValidation');
var newpassInput = document.getElementById("newpass");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");


// When the user clicks on the password field, show the message box
newpassInput.onfocus = function() {
document.getElementById("newpassValidation").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
newpassInput.onblur = function() {
document.getElementById("newpassValidation").style.display = "none";
}
function checkNewPassword() {
    const newpasswordValue = newpass.value.trim();
    var PasswordValidation=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
	// If password not entered
    if (newpasswordValue == ''){
	setErrorFor(newpass, 'Please Enter A Password');
	}else if (!PasswordValidation.test(newpasswordValue)){

	// When the user starts to type something inside the password field
	newpassInput.onkeyup = function() {
	// Validate Special Characters
	var lowerCaseLetters = /[a-z]/g;
  	if(newpassInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  	} else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
	}

	// Validate capital letters
	var upperCaseLetters = /[A-Z]/g;
	if(newpassInput.value.match(upperCaseLetters)) {  
	capital.classList.remove("invalid");
	capital.classList.add("valid");
	} else {
	capital.classList.remove("valid");
	capital.classList.add("invalid");
	}

	// Validate numbers
	var numbers = /[0-9]/g;
	if(newpassInput.value.match(numbers)) {  
	number.classList.remove("invalid");
	number.classList.add("valid");
	} else {
	number.classList.remove("valid");
	number.classList.add("invalid");
	}

	// Validate length
	if(newpassInput.value.length >= 8) {
	length.classList.remove("invalid");
	length.classList.add("valid");
	} else {
	length.classList.remove("valid");
	length.classList.add("invalid");
	}
    }
    
    setErrorFor(newpass, '');  
    }else{  

    setSuccessFor(newpass); 
    return true;
    }	
    // If same return True.

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
            timer: 15000,
            });

        <?php 
        unset($_SESSION['message']);
        unset($_SESSION['alert']);
    }
    ?> 
    </script> 
</body>
</html>
