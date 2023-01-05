const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const password2 = document.getElementById('password2');

function checkUsername() {
	// trim to remove the whitespaces
	const usernameValue = username.value.trim();

	if(usernameValue === '') {
		setErrorFor(username, 'Username cannot be blank');
	} else {
		setSuccessFor(username);
	}	
}
function checkEmail() {
	// trim to remove the whitespaces
	const emailValue = email.value.trim();
	if(emailValue === '') {
		setErrorFor(email, 'Email Address cannot be blank');
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Not a valid email');
	} else {
		setSuccessFor(email);
	}
}
	
function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function checkFname() {
	// trim to remove the whitespaces
	const firstnameValue = firstname.value.trim();

	if(firstnameValue === '') {
		setErrorFor(firstname, 'Firstname cannot be blank');
	} else {
		setSuccessFor(firstname);
	}	
}
function checkLname() {
	// trim to remove the whitespaces
	const lastnameValue = lastname.value.trim();

	if(lastnameValue === '') {
		setErrorFor(lastname, 'Lastname cannot be blank');
	} else {
		setSuccessFor(lastname);
	}	
}

function checkBirthDate() {
	// trim to remove the whitespaces
	const dateValue = date.value.trim();
	let currentdate = new Date();
	const dateValues = new Date(dateValue);
	var diff = currentdate.getFullYear() - dateValues.getFullYear(); 
	if(dateValue === '') {
		setErrorFor(date, 'Date of Birth cannot be blank');
	} else if (diff <= 18) {
		setErrorFor(date, 'Under Age');
	} else {
		setSuccessFor(date);
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
// Function to check Whether both passwords
// is same or not.
function checkUsername() {
	// trim to remove the whitespaces
	const usernameValue = username.value.trim();

	if(usernameValue === '') {
		setErrorFor(username, 'Username cannot be blank');
	} else {
		setSuccessFor(username);
	}	
}     
function checkPassword2() {
    const passwordValue = password.value.trim();
	const password2Value = password2.value.trim();
	var PasswordValidation=/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8}$/;
    // If password not entered
    if (passwordValue == '')
		setErrorFor(password2, 'Please enter your password first.'); 

    // If confirm password not entered
    else if (password2Value == '')
		setErrorFor(password2, 'Confirm your password.'); 

    // If Not same return False.    
    else if (passwordValue != password2Value) {
		setErrorFor(password2, 'Password did not match.'); 
        return false;              
    }
    // If same return True.
    else{  
        setSuccessFor(password2, 'Password Match!'); 
        return true;
    }
}


function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector('small');
	formControl.className = 'form-control error';
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = 'form-control success';
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
		setErrorFor(password, '');  
	}else{  
		
	// When the user starts to type something inside the password field
	myInput.onkeyup = function() {
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
	setSuccessFor(password); 
		return true;
	}	
		// If same return True.
		
	}












