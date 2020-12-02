function checkPassword() {
	const password = document.getElementById('password').value;
	const confirmation = document.getElementById('password-confirm').value;
	const confirmationForm = document.getElementById('password-confirm');
	const btnSignUp = document.getElementById('btn-sign-up');

	if (password === confirmation) {
		btnSignUp.disabled = false;
		confirmationForm.style.color = 'green';
	} else {
		btnSignUp.disabled = true;
		confirmationForm.style.color = 'red';
	}
}