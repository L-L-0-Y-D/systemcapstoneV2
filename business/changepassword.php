<?php 

include('../config/dbcon.php');
include('../middleware/businessMiddleware.php');
include('includes/header.php');


?>
<head>
    <link rel="stylesheet" href="assets/css/style-for-ownerchangepass.css">
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
            $business = getByID("business",$id,"businessid");

            if(mysqli_num_rows($business) > 0)
            {
                $data = mysqli_fetch_array($business)
                
            
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
                                <input type="hidden" name="businessid" value="<?= $data['businessid'] ?>">
                                <input type="password" name="business_oldpassword" required placeholder="Type your current password">
                            </div>
                            <div class="col-12 form-content">
                                <input type="password" name="business_password" id="businesspassword" oninput="checkNewBusiPass();" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required placeholder="Type your new password">
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                <div id="newpassValidation">
                                    <h3>Password must contain the following:</h3>
                                    <p id="letter" class="invalid">A lowercase letter</p>
                                    <p id="capital" class="invalid">An Uppercase letter</p>
                                    <p id="number" class="invalid">A number</p>
                                    <p id="length" class="invalid">Must be atleast 8 characters</b></p>
                                </div>
                            </div>
                            <div class="col-12 form-content"> 
                                <input type="password" name="business_confirmpassword" id="businessconfirmpassword" oninput="checkConNewPass();" required placeholder="Confirm your new password">
                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn update-btn  btn-sm" name="edit_password_btn">Update Password</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <?php
            }
            else
            {
                echo "Business not Found";
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
        function checkConNewPass() {
        const busipassValue = businesspassword.value.trim();
        const connewpassValue = businessconfirmpassword.value.trim();
        // If password not entered
        if (busipassValue == '')
        setErrorFor(businessconfirmpassword, 'Please enter your password first.'); 

        // If confirm password not entered
        else if (connewpassValue == '')
        setErrorFor(businessconfirmpassword, 'Confirm your password.'); 

        // If Not same return False.    
        else if (busipassValue != connewpassValue) {
        setErrorFor(businessconfirmpassword, 'Password did not match.'); 
            return false;              
        }
        // If same return True.
        else{  
            setSuccessFor(businessconfirmpassword, 'Password Match!'); 
            return true;
        }
        }
        //FOR PASSWORD VALIDATION
var newpassValidation = document.getElementById('newpassValidation');
var newBusipassInput = document.getElementById("businesspassword");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");


// When the user clicks on the password field, show the message box
newBusipassInput.onfocus = function() {
document.getElementById("newpassValidation").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
newBusipassInput.onblur = function() {
document.getElementById("newpassValidation").style.display = "none";
}
function checkNewBusiPass() {
    const newBusipassValue = businesspassword.value.trim();
    var PasswordValidation=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
	// If password not entered
    if (newBusipassValue == ''){
	setErrorFor(newpass, 'Please Enter A Password');
	}else if (!PasswordValidation.test(newBusipassValue)){

	// When the user starts to type something inside the password field
	newBusipassInput.onkeyup = function() {
	// Validate Special Characters
	var lowerCaseLetters = /[a-z]/g;
  	if(newBusipassInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  	} else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
	}

	// Validate capital letters
	var upperCaseLetters = /[A-Z]/g;
	if(newBusipassInput.value.match(upperCaseLetters)) {  
	capital.classList.remove("invalid");
	capital.classList.add("valid");
	} else {
	capital.classList.remove("valid");
	capital.classList.add("invalid");
	}

	// Validate numbers
	var numbers = /[0-9]/g;
	if(newBusipassInput.value.match(numbers)) {  
	number.classList.remove("invalid");
	number.classList.add("valid");
	} else {
	number.classList.remove("valid");
	number.classList.add("invalid");
	}

	// Validate length
	if(newBusipassInput.value.length >= 8) {
	length.classList.remove("invalid");
	length.classList.add("valid");
	} else {
	length.classList.remove("valid");
	length.classList.add("invalid");
	}
    }
    
    setErrorFor(businesspassword, '');  
    }else{  

    setSuccessFor(businesspassword); 
    return true;
    }	
    // If same return True.

    }
    </script>
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
    </script>


<?php include('includes/footer.php');?>