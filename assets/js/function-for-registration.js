const DOMstrings = {
  stepsBtnClass: 'multisteps-form__progress-btn',
  stepsBtns: document.querySelectorAll(`.multisteps-form__progress-btn`),
  stepsBar: document.querySelector('.multisteps-form__progress'),
  stepsForm: document.querySelector('.multisteps-form__form'),
  stepsFormTextareas: document.querySelectorAll('.multisteps-form__textarea'),
  stepFormPanelClass: 'multisteps-form__panel',
  stepFormPanels: document.querySelectorAll('.multisteps-form__panel'),
  stepPrevBtnClass: 'js-btn-prev',
  stepNextBtnClass: 'js-btn-next' };


const removeClasses = (elemSet, className) => {

  elemSet.forEach(elem => {

    elem.classList.remove(className);

  });

};

const findParent = (elem, parentClass) => {

  let currentNode = elem;

  while (!currentNode.classList.contains(parentClass)) {
    currentNode = currentNode.parentNode;
  }

  return currentNode;

};

const getActiveStep = elem => {
  return Array.from(DOMstrings.stepsBtns).indexOf(elem);
};

const setActiveStep = activeStepNum => {

  removeClasses(DOMstrings.stepsBtns, 'js-active');

  DOMstrings.stepsBtns.forEach((elem, index) => {

    if (index <= activeStepNum) {
      elem.classList.add('js-active');
    }

  });
};

const getActivePanel = () => {

  let activePanel;

  DOMstrings.stepFormPanels.forEach(elem => {

    if (elem.classList.contains('js-active')) {

      activePanel = elem;

    }

  });

  return activePanel;

};

const setActivePanel = activePanelNum => {

  removeClasses(DOMstrings.stepFormPanels, 'js-active');

  DOMstrings.stepFormPanels.forEach((elem, index) => {
    if (index === activePanelNum) {

      elem.classList.add('js-active');

      setFormHeight(elem);

    }
  });

};

const formHeight = activePanel => {

  const activePanelHeight = activePanel.offsetHeight;

  DOMstrings.stepsForm.style.height = `${activePanelHeight}px`;

};

const setFormHeight = () => {
  const activePanel = getActivePanel();

  formHeight(activePanel);
};

DOMstrings.stepsBar.addEventListener('click', e => {

  const eventTarget = e.target;

  if (!eventTarget.classList.contains(`${DOMstrings.stepsBtnClass}`)) {
    return;
  }

  const activeStep = getActiveStep(eventTarget);

  setActiveStep(activeStep);

  setActivePanel(activeStep);
});

DOMstrings.stepsForm.addEventListener('click', e => {

  const eventTarget = e.target;

  if (!(eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`) || eventTarget.classList.contains(`${DOMstrings.stepNextBtnClass}`)))
  {
    return;
  }

  const activePanel = findParent(eventTarget, `${DOMstrings.stepFormPanelClass}`);

  let activePanelNum = Array.from(DOMstrings.stepFormPanels).indexOf(activePanel);

  if (eventTarget.classList.contains(`${DOMstrings.stepPrevBtnClass}`)) {
    activePanelNum--;

  } else {

    activePanelNum++;

  }

  setActiveStep(activePanelNum);
  setActivePanel(activePanelNum);

});

window.addEventListener('load', setFormHeight, false);

window.addEventListener('resize', setFormHeight, false);



           
const businessname = document.getElementById('businessname');
const businessaddress = document.getElementById('businessaddress');
const opening = document.getElementById('opening');


function checkBusiName() {
	// trim to remove the whitespaces
	const businessnameValue = businessname.value.trim();

	if(businessnameValue === '') {
		setErrorFor(businessname, 'Business Name cannot be blank');
	} else {
		setSuccessFor(businessname);
	}	
}

function checkBusiAddress() {
	// trim to remove the whitespaces
	const businessaddressValue = businessaddress.value.trim();

	if(businessaddressValue === '') {
		setErrorFor(businessaddress, 'Business Address cannot be blank');
	} else {
		setSuccessFor(businessaddress);
	}	
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

function checkOpening() {
	// trim to remove the whitespaces
	const openingValue = opening.value.trim();

	if(openingValue === '') {
		setErrorFor(opening, 'Opening time cannot be blank');
	} else {
		setSuccessFor(opening);
	}	
}
function checkClosing() {
	// trim to remove the whitespaces
	const closingValue = closing.value.trim();

	if(closingValue === '') {
		setErrorFor(closing, 'Closing time cannot be blank');
	} else {
		setSuccessFor(closing);
	}	
}
  const form = document.getElementById('form');
  
  form.addEventListener('submit', e => {
      e.preventDefault();
  
      checkInputs();
  });
  
  function checkInputs() {
      // trim to remove the whitespaces
      const cuisineValue = cuisinename.value.trim();
  
      if(cuisineValue === '') {
          setErrorFor(cuisinename, 'Choose what cuisine type is your business');
      } else {
          setSuccessFor(cuisinename);
      }
  
  }
  
  function fileValidation() {
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

  function certValidation() {
    var certInput =
        document.getElementById('imagecert');
     
    var certPath = certInput.value;
 
    // Allowing file type
    var allowedExtensions =
            /(\.jpg|\.jpeg|\.png|\.gif)$/i;
     
    if (!allowedExtensions.exec(certPath)) {
        setErrorFor(imagecert, "Business Permit must be .jpg .jpeg or .png type.");
        certInput.value = '';
        return false;
    }
    else
    {
      setSuccessFor(imagecert);
      return true;
    }
  }

  function scertValidation() {
    var scertInput =
        document.getElementById('imagescert');
     
    var scertPath = scertInput.value;
 
    // Allowing file type
    var allowedExtensions =
            /(\.jpg|\.jpeg|\.png|\.gif)$/i;
     
    if (!allowedExtensions.exec(scertPath)) {
        setErrorFor(imagescert, "Sanitary Permit must be .jpg .jpeg or .png type.");
        scertInput.value = '';
        return false;
    }
    else
    {
      setSuccessFor(imagescert);
      return true;
    }
  }
  
  function fscertValidation() {
    var fscertInput =
        document.getElementById('imagefscert');
     
    var fscertPath = fscertInput.value;
 
    // Allowing file type
    var allowedExtensions =
            /(\.jpg|\.jpeg|\.png|\.gif)$/i;
     
    if (!allowedExtensions.exec(fscertPath)) {
        setErrorFor(imagefscert, "Fire Safety Permit must be .jpg .jpeg or .png type.");
        fscertInput.value = '';
        return false;
    }
    else
    {
      setSuccessFor(imagefscert);
      return true;
    }
  }
  function bccertValidation() {
    var bccertInput =
        document.getElementById('imagebccert');
     
    var bccertPath = bccertInput.value;
 
    // Allowing file type
    var allowedExtensions =
            /(\.jpg|\.jpeg|\.png|\.gif)$/i;
     
    if (!allowedExtensions.exec(bccertPath)) {
        setErrorFor(imagebccert, "Barangay Clearance must be .jpg .jpeg or .png type.");
        bccertInput.value = '';
        return false;
    }
    else
    {
      setSuccessFor(imagebccert);
      return true;
    }
  }

function checkbusiFname() {
	// trim to remove the whitespaces
	const busiFnameValue = businessfirstname.value.trim();

	if(busiFnameValue === '') {
		setErrorFor(businessfirstname, 'Firstname cannot be blank');
	} else {
		setSuccessFor(businessfirstname);
	}	
}

function checkbusiLname() {
	// trim to remove the whitespaces
	const busiLnameValue = businesslastname.value.trim();

	if(busiLnameValue === '') {
		setErrorFor(businesslastname, 'Lastname cannot be blank');
	} else {
		setSuccessFor(businesslastname);
	}	
}

function checkDuration() {
  // trim to remove the whitespaces
  const durationValue = duration.value.trim();

  if(durationValue === '') {
    setErrorFor(duration, 'Duration cannot be blank');
  } else {
    setSuccessFor(duration);
  }	
}   
 
function checkbusiPhone() {
	// trim to remove the whitespaces
	const busiPhoneValue = businessnumber.value.trim();
	var Validation=/^09[0-9]\d{8}$/;
	if(Validation.test(busiPhoneValue)) {
		setSuccessFor(businessnumber);
	} else {
		setErrorFor(businessnumber, 'Invalid Phone Number');
	}	
}

function checkbusiNum() {
	// trim to remove the whitespaces
	const busiNumValue = businessphonenumber.value.trim();
	var Validation=/^09[0-9]\d{8}$/;
	if(Validation.test(busiNumValue)) {
		setSuccessFor(businessphonenumber);
	} else {
		setErrorFor(businessphonenumber, 'Invalid Phone Number');
	}	
}

function checkbusiEmail() {
	// trim to remove the whitespaces
	const busiEmailValue = businessemail.value.trim();
	if(busiEmailValue === '') {
		setErrorFor(businessemail, 'Email Address cannot be blank');
	} else if (!isEmail(busiEmailValue)) {
		setErrorFor(businessemail, 'Not a valid email');
	} else {
		setSuccessFor(businessemail);
	}
}
	
function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}
function checkownerAdd() {
	// trim to remove the whitespaces
	const ownerAddValue = businessowneraddress.value.trim();

	if(ownerAddValue === '') {
		setErrorFor(businessowneraddress, 'Address cannot be blank');
	} else {
		setSuccessFor(businessowneraddress);
	}	
}

//FOR PASSWORD VALIDATION
var bpassValidation = document.getElementById('bpassValidation');
var myInput = document.getElementById("businesspassword");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");


// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
document.getElementById("bpassValidation").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
document.getElementById("bpassValidation").style.display = "none";
}
function checkBusiPassword() {
    const busipasswordValue = businesspassword.value.trim();
	// If password not entered
	if (busipasswordValue == '')
	setErrorFor(businesspassword); 
	else{  
		
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
	setSuccessFor(businesspassword); 
		return true;
	}	
		// If same return True.
		
	}

  function checkCOwnerPword() {
    const busipasswordValue = businesspassword.value.trim();
	const cbusipasswordValue = businessconfirmpassword.value.trim();
    // If password not entered
    if (busipasswordValue == '')
		setErrorFor(businessconfirmpassword, 'Please enter your password first.'); 

    // If confirm password not entered
    else if (cbusipasswordValue == '')
		setErrorFor(businessconfirmpassword, 'Confirm your password.'); 

    // If Not same return False.    
    else if (busipasswordValue != cbusipasswordValue) {
		setErrorFor(businessconfirmpassword, 'Password did not match.'); 
        return false;              
    }
    // If same return True.
    else{  
        setSuccessFor(businessconfirmpassword, 'Password Match!'); 
        return true;
    }
}
