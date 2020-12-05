var modalEdit = document.getElementById('modal-edit');

function editBook(id) {
	modalEdit.style.display = "block";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == modalEdit) {
		modalEdit.style.display = "none";
	}
}