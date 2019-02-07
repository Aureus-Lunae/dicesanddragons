const modal = document.getElementById(`addToClass`);
console.log(modal);

const addToCart = (id, name, price, img, url, output) => {
	let compiledUrl =
		`${url}?id=${id}&name=${name}&price=${price}&img=${img}&qnt=1&add=1`;
	updateCart(compiledUrl, output);
	modal.style.display = `flex`;
}

const removeFromCart = (id, url, output) => {
	let compiledUrl =
		`${url}?id=${id}&name=Aureus&price=Lunae&img=Dice&qnt=1&add=-1`;
	updateCart(compiledUrl, output);
	modal.style.display = `flex`;
}

const deleteFromCart = (id, url) => {
	let compiledUrl =
		`${url}?id=${id}&name=456456&price=456456&img=465464&qnt=1&add=-2`;
	updateCart(compiledUrl, updateShoppingCart);
}

const updateCart = (url, output) => {
	console.log('update start');
	console.log(url);
	let xmlRequest = new XMLHttpRequest();
	xmlRequest.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			console.log(this);
			output(this);
		}
	};
	xmlRequest.open(`GET`, url, true);
	xmlRequest.send();
}

const showCart = (data) => {
	let cartQnt = document.getElementById(`cartqnt`);
	cartQnt.innerHTML = data[`response`];
}

const updateShoppingCart = (data) => {
	let cartQnt = document.getElementById(`cartqnt`);
	cartQnt.innerHTML = data[`response`];
	updateCartList();
}

const updateCartList = () => {
	let url = `/diceandragons/php/shoppingcartoutput.php`;
	console.log('update start');
	console.log(url);
	let xmlRequest = new XMLHttpRequest();
	xmlRequest.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			console.log(this);
			updateCartProducts(this);
		}
	};
	xmlRequest.open(`GET`, url, true);
	xmlRequest.send();
}

const updateCartProducts = (data) => {
	let cartItems = document.getElementById(`items`);
	console.log(cartItems);
	cartItems.innerHTML = data[`response`];
}

window.onclick = function(event) {
	if (event.target == modal) {
		modal.style.display = `none`;
	}
}