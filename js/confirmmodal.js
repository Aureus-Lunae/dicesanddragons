const modal = document.getElementById(`addToClass`);
const modalButton = document.getElementsByClassName(`price`);
console.log(modal);
console.log(modalButton);

modalButton.onclick = function() {
	console.log(`script started`);
	modal.style.display = `block`;
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = `none`;
	}
}