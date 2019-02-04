const addToCart = (id, name, price, img, url) => {
	let compiledUrl =
		`${url}?id=${id}&name=${name}&price=${price}&img=${img}&qnt=1&add=1`;
	updateCart(compiledUrl);
}

const updateCart = (url) => {
	console.log('update start');
	console.log(url);
	let xmlRequest = new XMLHttpRequest();
	xmlRequest.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			console.log(this);
			showCart(this);
		}
	};
	xmlRequest.open(`GET`, url, true);
	xmlRequest.send();
}

const showCart = (data) => {
	//let filterResults = document.getElementById(`cart`);
	//filterResults.innerHTML = data[`response`];
}