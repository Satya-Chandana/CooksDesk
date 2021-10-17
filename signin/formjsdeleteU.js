const form = document.getElementById('form');
const username = document.getElementById('username');


/*form.addEventListener('submit', e => {
	e.preventDefault();
	
    if (checkInputs) {
        alert("Form submitted succesfully");
    }

	checkInputs();
    
});*/

function checkInputs() {
	// trim to remove the whitespaces

	const usernameValue = username.value.trim();

	
    
	
  

	if(usernameValue === '') {
		setErrorFor(username, 'Username cannot be blank');
		return false;
	} else {
		setSuccessFor(username);
	}
	

	alert("User Deleted");
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
	
