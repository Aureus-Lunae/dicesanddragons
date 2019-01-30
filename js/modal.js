const modal = document.getElementById(`modal_ToS`);
const modalButton = document.getElementById(`modal_button`);
const close = document.getElementsByClassName(`close`);
console.log(modal);
console.log(modalButton);
console.log(close);

modalButton.onclick = function() {
	console.log(`script started`);
	modal.style.display = `block`;
}

// When the user clicks on <span> (x), close the modal
close.onclick = function() {
	modal.style.display = `none`;
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = `none`;
	}
}