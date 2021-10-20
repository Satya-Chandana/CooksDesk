const form = document.getElementById('form');
const username = document.getElementById('title');
const email = document.getElementById('List');
const password = document.getElementById('steps');


/*form.addEventListener('submit', e => {
	e.preventDefault();
	
    if (checkInputs) {
        alert("Form submitted succesfully");
    }

	checkInputs();
    
});*/

function checkInputs() {
	// trim to remove the whitespaces
    const titleValue = fullname.value.trim();
	const ListValue = username.value.trim();
	const stepsValue = email.value.trim();
    
	
    
	
    if(titleValue === '') {
		setErrorFor(title, 'Title cant be blank');
		return false;
	} else {
		setSuccessFor(title);
	}

    



	

	alert("Recipe added");
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
	












