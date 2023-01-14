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



         

//FOR LIVE VALIDATION
const businessname = document.getElementById('businessname');
const businessaddress = document.getElementById('businessaddress');
const opening = document.getElementById('opening');


function checkBusiName() {
	// trim to remove the whitespaces
	const businessnameValue = businessname.value.trim();

	if(businessnameValue === '') {
		setErrorFor(businessname, 'This field is required.');
	} else {
		setSuccessFor(businessname);
	}	
}

function checkBusiAddress() {
	// trim to remove the whitespaces
	const businessaddressValue = businessaddress.value.trim();

	if(businessaddressValue === '') {
		setErrorFor(businessaddress, 'This field is required.');
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
		setErrorFor(opening, 'This field is required.');
	} else {
		setSuccessFor(opening);
	}	
}
function checkClosing() {
	// trim to remove the whitespaces
	const closingValue = closing.value.trim();

	if(closingValue === '') {
		setErrorFor(closing, 'This field is required.');
	} else {
		setSuccessFor(closing);
	}	
}
  //const form = document.getElementById('form');
  
 // form.addEventListener('submit', e => {
 //     e.preventDefault();
  
 //     checkInputs();
 // });
  
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
		setErrorFor(businessfirstname, 'This field is required.');
	} else {
		setSuccessFor(businessfirstname);
	}	
}

function checkbusiLname() {
	// trim to remove the whitespaces
	const busiLnameValue = businesslastname.value.trim();

	if(busiLnameValue === '') {
		setErrorFor(businesslastname, 'This field is required.');
	} else {
		setSuccessFor(businesslastname);
	}	
}
function onlyNumberKey(evt) {
              
  // Only ASCII character in that range allowed
  var ASCIICode = (evt.which) ? evt.which : evt.keyCode
  if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
      return false;
  setSuccessFor(duration);
  return true;
}

//function checkDuration() {
  // trim to remove the whitespaces
  //const durationValue = duration.value.trim();

 // if(durationValue === '') {
  //  setErrorFor(duration, 'This field is required.');
 // } else {
 //   setSuccessFor(duration);
 // }	
// }   
 
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
		setErrorFor(businessemail, 'This field is required.');
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
		setErrorFor(businessowneraddress, 'This field is required.');
	} else {
		setSuccessFor(businessowneraddress);
	}	
}

function checkCOwnerPword() {
const businesspasswordValue = businesspassword.value.trim();
const busiconpwordValue = businessconfirmpassword.value.trim();
  // If password not entered
  if (businesspasswordValue == '')
  setErrorFor(businessconfirmpassword, 'Please enter your password first.'); 

  // If confirm password not entered
  else if (busiconpwordValue == '')
  setErrorFor(businessconfirmpassword, 'Confirm your password.'); 

  // If Not same return False.    
  else if (businesspasswordValue != busiconpwordValue) {
  setErrorFor(businessconfirmpassword, 'Password did not match.'); 
      return false;              
  }
  // If same return True.
  else{  
      setSuccessFor(businessconfirmpassword, 'Password Match!'); 
      return true;
  }
}