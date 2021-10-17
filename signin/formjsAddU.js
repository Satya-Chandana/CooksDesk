const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');

const name = document.getElementById('name');
const gender = document.getElementById('gender');

/*form.addEventListener('submit', e => {
	e.preventDefault();
	
    if (checkInputs) {
        alert("Form submitted succesfully");
    }

	checkInputs();
    
});*/

function checkInputs() {
	// trim to remove the whitespaces
    const nameValue = fullname.value.trim();
	const usernameValue = username.value.trim();
	const emailValue = email.value.trim();
    const genderValue = gender.value.trim();
    
	
	
    
	
    if(nameValue === '') {
		setErrorFor(name, 'Name cannot be blank');
		return false;
	} else {
		setSuccessFor(name);
	}

	if(usernameValue === '') {
		setErrorFor(username, 'Username cannot be blank');
		return false;
	} else {
		setSuccessFor(username);
	}
	
	if(emailValue === '') {
		setErrorFor(email, 'Email cannot be blank');
		return false;
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, 'Not a valid email');
		return false;
	} else {
		setSuccessFor(email);
	}

    if(genderValue === '') {
		setErrorFor(gender, 'Gender cannot be blank');
		return false;
	}
	else {
		setSuccessFor(email);
	}



	

	alert("User added");
    return true;
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
	
function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

function isnum(num) {
	return /^(([0-9]{5}-[0-9]{5}))$/.test(num);
}


