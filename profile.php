<?php

    include('middleware/userMiddleware.php');

?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/Kaushan%20Script.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel="stylesheet" href="assets/css/style-for-userprofile.css">
    <title>Profile| I-Eat</title> 

    <!-- Favicon -->
    <link rel="icon" href="uploads/favicon.ico"/>
</head>
<body class="profile">
    <nav class="navbar navbar-expand-md fixed-top navbar-shrink py-3 " id="mainNav" style="background-color:rgb(255,128,64); box-shadow: 0px 0px 18px var(--bs-gray); height: 80px;">
        <div class="container">
            <a class="navbar-brand" href="index.php" style="color: white;font-size: 28px;">
                <span><img src="uploads/logoT.png" usemap=#workmap style="width: 50px;">&nbsp;</span>
                <map name="workmap">
                    <area shape="circle" coords="100,100,300,300" alt="logo" href="index.php">
                </map>I - Eat
            </a>
        </div>
    </nav>
<div class="container ">
  <div class="row d-flex justify-content-center ">
    <div class="col-md-9 mt-4">
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
                <div class="card-body d-flex ">
                    <form action="functions/authcode.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 ">
                                <h4 class="m-3 fw-bold ">Your Profile<span> 
                                    <button class="btn btn-primary btn-sm float-end" type="submit"onclick="location.href='index.php'">Back</button>
                                </h4>   <hr>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card mb-3">
                                        <div class="card-body text-center shadow">
                                            <img class="rounded-circle mb-2" src="uploads/<?= $data['image'] ?>"  width="140" height="140">
                                            <input type="hidden" name="old_image" value="<?= $data['image'] ?>">
                                            <div class="mb-2 form-content">
                                                <label for="">Upload Image</label>
                                                <input type="file" name="image" class="form-control" id="image" onchange="return profUpload();">
                                                <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 fw-bold">User Settings</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3 form-content">
                                                        <label class="form-label" for="username"><strong>Username</strong></label>
                                                        <input type="hidden" name="userid" value="<?= $data['userid'] ?>">
                                                        <input name="name" value="<?= $data['name'] ?>" type="text" id="username" oninput="checkUname();" required >
                                                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3 form-content">
                                                        <label class="form-label" for="email"><strong>Email Address</strong></label>
                                                        <input name="email" value="<?= $data['email'] ?>" type="email" id="email" oninput="checkEmail();" required >
                                                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3 form-content">
                                                        <label class="form-label" for="first_name"><strong>First Name</strong></label>
                                                        <input name="firstname" value="<?= $data['firstname'] ?>" required type="text" id="firstname" oninput="checkFname();">
                                                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3 form-content">
                                                        <label class="form-label" for="last_name"><strong>Last Name</strong></label>
                                                        <input name="lastname" value="<?= $data['lastname'] ?>" required type="text" id="lastname" oninput="checkLname();">
                                                        <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="card shadow">
                                    <div class="card-header py-3">
                                        <p class="text-primary m-0 fw-bold">More Information</p>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3 form-content">
                                                    <label class="form-label" for="first_name"><strong>Date of Birth</strong></label>
                                                    <input name='dateofbirth' value="<?= $data['dateofbirth'] ?>" required type="date" oninput="checkBirthDate();" id="date">
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="mb-3 form-content">
                                                    <label class="form-label" for="phonenum"><strong>Phone Number</strong></label>
                                                    <input name="phonenumber" value="<?= $data['phonenumber'] ?>" required type="text" id="phonenumber" oninput="checkPhoneNum();">
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 form-content">
                                            <label class="form-label" for="address"><strong>Address</strong></label>
                                            <input name="address" value="<?= $data['address'] ?>" placeholder="Enter Address" type="text" id="address" oninput="checkAddress();">
                                            <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                            <!-- oninput="checkPassword();" -->
                                                <div class="mb-3 form-content">
                                                    <label class="form-label" for="city"><strong>Password</strong></label>
                                                    <input name="password" required placeholder="Enter Password" type="password" id="password"  title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
                                                    <i class="fas fa-check-circle"></i><i class="fas fa-exclamation-circle"></i><small>Error message</small>
                                                    <div id="pwordValidation">
                                                        <h3>Password must contain the following:</h3>
                                                        <p id="letter" class="invalid">A lowercase letter</p>
                                                        <p id="capital" class="invalid">An Uppercase letter</p>
                                                        <p id="number" class="invalid">A number</p>
                                                        <p id="length" class="invalid">Must be atleast 8 characters</b></p>
                                                    </div>
                                                </div>
                                                <div class="col-mb-3">
                                                    <input type = "hidden" name='role_as' value = '0'>
                                                </div>
                                                <div class="col-mb-3">
                                                    <input type="hidden" name="status" <?= $data['status'] == '1'? 'checked':'' ?>>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button name="update_profile_btn" class="btn btn-primary btn-sm" type="submit">Save&nbsp;Settings</button>
                                        </div>
                                    </div>
                                </div>  
                            </div>                      
                        </div>
                    </form>
                </div>
            </div>
            <?php
            }
            else
            {
                echo "Users not Found";
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
    function profUpload() {
    var profInput =
        document.getElementById('image');
     
    var imagePath = profInput.value;
 
    // Allowing file type
    var allowedExtensions =
            /(\.jpg|\.jpeg|\.png|\.gif)$/i;
     
    if (!allowedExtensions.exec(imagePath)) {
        setErrorFor(image, "Must be .jpg .jpeg or .png type.");
        profInput.value = '';
        return false;
    }
    else
    {
      setSuccessFor(image);
      return true;
    }
  }
    function checkPhoneNum() {
	// trim to remove the whitespaces
	const phonenumberValue = phonenumber.value.trim();
	var Validation=/^09[0-9]\d{8}$/;
	if(Validation.test(phonenumberValue)) {
		setSuccessFor(phonenumber);
	} else {
		setErrorFor(phonenumber, 'Invalid Phone Number');
	}	
    }
    function checkBirthDate() {
	// trim to remove the whitespaces
	const dateValue = date.value.trim();
	let currentdate = new Date();
	const dateValues = new Date(dateValue);
	var diff = currentdate.getFullYear() - dateValues.getFullYear(); 
	if(dateValue === '') {
		setErrorFor(date, 'This field is required.');
	} else if (diff <= 18) {
		setErrorFor(date, 'Under Age');
	} else {
		setSuccessFor(date);
	}
    }
    function checkAddress() {
	// trim to remove the whitespaces
	const addressValue = address.value.trim();

	
		setSuccessFor(address);
	
    }
    function checkFname() {
	// trim to remove the whitespaces
	const firstnameValue = firstname.value.trim();

	if(firstnameValue === '') {
		setErrorFor(firstname, 'This field is required.');
	} else {
		setSuccessFor(firstname);
	}	
    }
    function checkLname() {
        // trim to remove the whitespaces
        const lastnameValue = lastname.value.trim();

        if(lastnameValue === '') {
            setErrorFor(lastname, 'This field is required.');
        } else {
            setSuccessFor(lastname);
        }	
    }
    function checkEmail() {
	// trim to remove the whitespaces
	const emailValue = email.value.trim();
	if(emailValue === '') {
		setErrorFor(email, 'This field is required.');
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Not a valid email');
	} else {
		setSuccessFor(email);
	}
    }   	
    function isEmail(email) {
        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
    }
    function checkUname() {
	// trim to remove the whitespaces
	const unameValue = username.value.trim();

	if(unameValue === '') {
		setErrorFor(username, 'This field is required.');
	} else {
		setSuccessFor(username);
	}	
} 
//FOR PASSWORD VALIDATION
var pwordValidation = document.getElementById('pwordValidation');
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
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
function checkPassword() {
    const passwordValue = password.value.trim();
	var PasswordValidation=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
	// If password not entered
	if (passwordValue == ''){
	setErrorFor(password, 'Please Enter A Password');
	}else if (!PasswordValidation.test(passwordValue)){
		// When the user starts to type something inside the password field
	myInput.onkeyup = function()
	{
		// Validate Special Characters
		var lowerCaseLetters = /[a-z]/g;
		  if(myInput.value.match(lowerCaseLetters)) {
		letter.classList.remove("invalid");
		letter.classList.add("valid");
		  } else {
		letter.classList.remove("valid");
		letter.classList.add("invalid");
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

		setErrorFor(password, '');  
	}else{  
		
	setSuccessFor(password); 
		return true;
	}	
		// If same return True.
		
	} 
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
