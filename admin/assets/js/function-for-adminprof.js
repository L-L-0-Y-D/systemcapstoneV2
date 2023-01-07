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

function profValidation() {
    var fileInput =
        document.getElementById('file');
     
    var filePath = fileInput.value;
 
    // Allowing file type
    var allowedExtensions =
            /(\.jpg|\.jpeg|\.png|\.gif)$/i;
     
    if (!allowedExtensions.exec(filePath)) {
        setErrorFor(file, "Logo must be .jpg .jpeg or .png type.");
        fileInput.value = '';
        return false;
    }
    else
    {
      setSuccessFor(file);
      return true;
    }
  }
  function checkAdminEmail() {
    // trim to remove the whitespaces
    const adminEmailValue = adminemail.value.trim();
    if(adminEmailValue === '') {
        setErrorFor(adminemail, 'This field is required.');
    } else if (!isEmail(adminEmailValue)) {
        setErrorFor(adminemail, 'Not a valid email');
    } else {
        setSuccessFor(adminemail);
    }
}
    
function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}
function checkAdminName() {
    // trim to remove the whitespaces
    const adminUsernameValue = adminname.value.trim();

    if(adminUsernameValue === '') {
        setErrorFor(adminname, 'This field is required.');
    } else {
        setSuccessFor(adminname);
    }	
}
function checkAdminFname() {
    // trim to remove the whitespaces
    const adminFnameValue = adminfirstname.value.trim();

    if(adminFnameValue === '') {
        setErrorFor(adminfirstname, 'This field is required.');
    } else {
        setSuccessFor(adminfirstname);
    }	
}

function checkAdminLname() {
    // trim to remove the whitespaces
    const adminLnameValue = adminlastname.value.trim();

    if(adminLnameValue === '') {
        setErrorFor(adminlastname, 'This field is required.');
    } else {
        setSuccessFor(adminlastname);
    }	
}
function checkAdminBirthDate() {
	// trim to remove the whitespaces
	const admindateValue = admindate.value.trim();
	let currentdate = new Date();
	const dateValues = new Date(admindateValue);
	var diff = currentdate.getFullYear() - dateValues.getFullYear(); 
	if(admindateValue === '') {
		setErrorFor(admindate, 'This field is required.');
	} else if (diff <= 18) {
		setErrorFor(admindate, 'Under Age');
	} else {
		setSuccessFor(admindate);
	}
}
function checkAge() {
    // trim to remove the whitespaces
    const ageValue = age.value.trim();

    if(ageValue === '') {
        setErrorFor(age, 'This field is required.');
    } else if (ageValue <= 18) {
		setErrorFor(age, 'Under Age');
	} else {
        setSuccessFor(age);
    }	
}
function checkAdminContact() {
	// trim to remove the whitespaces
	const adminContactValue = adminphonenumber.value.trim();
	var Validation=/^09[0-9]\d{8}$/;
	if(Validation.test(adminContactValue)) {
		setSuccessFor(adminphonenumber);
	} else if (adminContactValue === '') {
		setErrorFor(adminphonenumber, 'This field is required.');
	} else {
		setErrorFor(adminphonenumber, 'Invalid Phone Number');
	}	
}
function checkAdminAddress() {
    // trim to remove the whitespaces
    const adminaddressValue = adminaddress.value.trim();

    if(adminaddressValue === '') {
        setErrorFor(adminaddress, 'This field is required.');
    } else {
        setSuccessFor(adminaddress);
    }	
}
function checkConAdminPword() {
    const adminpasswordValue = adminpassword.value.trim();
    const adminconpwordValue = adminconfirmpassword.value.trim();
      // If password not entered
      if (adminpasswordValue == '')
      setErrorFor(adminconfirmpassword, 'Please enter your password first.'); 
    
      // If confirm password not entered
      else if (adminconpwordValue == '')
      setErrorFor(adminconfirmpassword, 'Confirm your password.'); 
    
      // If Not same return False.    
      else if (adminpasswordValue != adminconpwordValue) {
      setErrorFor(adminconfirmpassword, 'Password did not match.'); 
          return false;              
      }
      // If same return True.
      else{  
          setSuccessFor(adminconfirmpassword, 'Password Match!'); 
          return true;
      }
    }
    //FOR PASSWORD VALIDATION
var apassValidation = document.getElementById('apassValidation');
var myInput = document.getElementById("adminpassword");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");


// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
document.getElementById("apassValidation").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
document.getElementById("apassValidation").style.display = "none";
}
function checkAdminPassword() {
    const apasswordValue = adminpassword.value.trim();
	var PasswordValidation=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;
	// If password not entered
	if (apasswordValue == ''){
	setErrorFor(password, 'Please Enter A Password');
	}else if (!PasswordValidation.test(apasswordValue)){
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

		setErrorFor(adminpassword, '');  
	}else{  
		
	setSuccessFor(adminpassword); 
		return true;
	}	
		// If same return True.
		
	}

