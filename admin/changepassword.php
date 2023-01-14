<?php 

include('../middleware/adminMiddleware.php');
include('includes/header.php');

?>
<head>
    <link rel="stylesheet" href="assets/css/style-for-adminchangepass.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
</head>
<div class="container pt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
        <?php 
        if(isset($_GET['id']))
        {
            $id = $_GET['id'];
            $user = getByID("users",$id,"userid");

            if(mysqli_num_rows($user) > 0)
            {
                $data = mysqli_fetch_array($user)
                
            
            ?>
            <div class="card">
                <div class="card-header">
                    <a href="index.php" class="back btn-sm btn-close float-end"></a>
                    <h6 class="fw-bold">Change Password</h6>   
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST">
                        <div class="row">
                            <div class="col-12 form-content">
                                <input type="hidden" name="userid" value="<?= $data['userid'] ?>">
                                <input type="password" name="oldpassword"placeholder="Type your current password" required>
                            </div>
                            <div class="col-12 form-content">
                                <input type="password" name="password" id="adminpassword" oninput="checkAdminPass();" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="Type your new password">
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                <div id="adminpassValidation">
                                    <h3>Password must contain the following:</h3>
                                    <p id="letter" class="invalid">A lowercase letter</p>
                                    <p id="capital" class="invalid">An Uppercase letter</p>
                                    <p id="special" class="invalid">A Special Character (example:$@#&_!)</p>
                                    <p id="number" class="invalid">A number</p>
                                    <p id="length" class="invalid">Must be atleast 8 characters</b></p>
                                </div>
                            </div>
                            <div class="col-12 form-content">
                                <input type="password" name="confirmpassword" id="adminbusinessconfirmpassword" oninput="checkConAdminPass();" required placeholder="Confirm your new password">
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn update-btn mt-2" name="edit_password_btn" >Update Password</button>
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
     function setErrorFor(input, message) {
            const formContent = input.parentElement;
            const small = formContent.querySelector('small');
            formContent.className = 'form-content errors';
            small.innerText = message;
        }

        function setSuccessFor(input) {
            const formContent = input.parentElement;
            formContent.className = 'form-content success';
        }

        function checkConAdminPass() {
        const adminpassValue = adminpassword.value.trim();
        const conadminpassValue = adminbusinessconfirmpassword.value.trim();
        // If password not entered
        if (adminpassValue == '')
        setErrorFor(adminbusinessconfirmpassword, 'Please enter your password first.'); 

        // If confirm password not entered
        else if (conadminpassValue == '')
        setErrorFor(adminbusinessconfirmpassword, 'Confirm your password.'); 

        // If Not same return False.    
        else if (adminpassValue != conadminpassValue) {
        setErrorFor(adminbusinessconfirmpassword, 'Password did not match.'); 
            return false;              
        }
        // If same return True.
        else{  
            setSuccessFor(adminbusinessconfirmpassword, 'Password Match!'); 
            return true;
        }
        }
         //FOR PASSWORD VALIDATION
var adminpassValidation = document.getElementById('adminpassValidation');
var adminpassInput = document.getElementById("adminpassword");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var special = document.getElementById("special");
var number = document.getElementById("number");
var length = document.getElementById("length");


// When the user clicks on the password field, show the message box
adminpassInput.onfocus = function() {
document.getElementById("adminpassValidation").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
adminpassInput.onblur = function() {
document.getElementById("adminpassValidation").style.display = "none";
}
function checkAdminPass() {
    const adminpassValue = adminpassword.value.trim();
    var PasswordValidation=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@#&_!])[a-zA-Z\d\$@#&_!]{8,}$/;
	// If password not entered
    if (adminpassValue == ''){
	setErrorFor(adminpassword, 'Please Enter A Password');
	}else if (!PasswordValidation.test(adminpassValue)){

	// When the user starts to type something inside the password field
	adminpassInput.onkeyup = function() {
	// Validate Special Characters
	var lowerCaseLetters = /[a-z]/g;
  	if(adminpassInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  	} else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
	}

	// Validate capital letters
	var upperCaseLetters = /[A-Z]/g;
	if(adminpassInput.value.match(upperCaseLetters)) {  
	capital.classList.remove("invalid");
	capital.classList.add("valid");
	} else {
	capital.classList.remove("valid");
	capital.classList.add("invalid");
	}
    // Validate Special Characters
	var specialCharacter = /[$@#&_!]/g;
	if(adminpassInput.value.match(specialCharacter)) {  
	special.classList.remove("invalid");
	special.classList.add("valid");
	} else {
	special.classList.remove("valid");
	special.classList.add("invalid");
	}

	// Validate numbers
	var numbers = /[0-9]/g;
	if(adminpassInput.value.match(numbers)) {  
	number.classList.remove("invalid");
	number.classList.add("valid");
	} else {
	number.classList.remove("valid");
	number.classList.add("invalid");
	}

	// Validate length
	if(adminpassInput.value.length >= 8) {
	length.classList.remove("invalid");
	length.classList.add("valid");
	} else {
	length.classList.remove("valid");
	length.classList.add("invalid");
	}
    }
    
    setErrorFor(adminpassword, '');  
    }else{  

    setSuccessFor(adminpassword); 
    return true;
    }	
    // If same return True.

    }
</script>
<?php include('includes/footer.php');?>