var modalEdit = document.getElementById('modal-edit');

function editBook(id) {
	modalEdit.style.display = "block";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	var modals = document.getElementsByClassName('modal');
	for (var i = 0; i < modals.length; i++) {
		if (event.target == modals[i]) {
			modals[i].style.display = "none";	
		}
	}
}