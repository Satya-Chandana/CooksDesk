const form = document.getElementById('form');
const dest = document.getElementById('dest');
const nump = document.getElementById('nump');
const datear = document.getElementById('datear');
const datel = document.getElementById('datel');

let today = new Date();
/*form.addEventListener('submit', e => {
	e.preventDefault();
	
    if (checkInputs) {
        alert("Form submitted succesfully");
    }

	checkInputs();
    
});*/

function checkInputs() {
	// trim to remove the whitespaces
    const destValue = dest.value.trim();
	const numpValue = nump.value.trim();
	const datearValue = datear.value.trim();
    const datelValue =datel.value.trim();
	
    
	
    if( numpValue === '') {
		setErrorFor(nump, 'Fill the number of people');
		return false;
	}else {
		setSuccessFor(nump);
	}

	
	
	

	alert("Form submitted succesfully");
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


	

