// result holder for is prime form
const isPres = document.querySelector('#isprime-result');

// result holder for Sum & Check form
const snCres = document.querySelector('#sumchec-result');


// select the isPrime form
document.querySelector('#isPrime').addEventListener('submit', function(e) {
	e.preventDefault();

	// assign the form inputs to formData
	let formData = new FormData(this);
	let number = formData.get('number');

	// use fetch to send the ajax request, sending number.
	fetch('api/?Action=checkprime&number=' + number).then(response => {
		return response.json();
	}).then(data => {
		if ( data.isPrime === true ) {
			isPres.innerText = 'Tämä luku on alkuluku';
		} else {
			isPres.innerText = 'Tämä luku ei ole alkuluku';
		}
	});
});

// select the Sum & prime form
document.querySelector('#SumAndPrime').addEventListener('submit', function(e) {
	e.preventDefault();
	let formData = new FormData(this);
	let numbers = formData.get('numbers');

	fetch('api/?Action=sumandcheck&numbers=' + numbers).then(response => {
		return response.json();
	}).then(data => {
		snCres.innerText = `Summa on: ${data.result}
		` + (data.isPrime === false ? `Summa ei ole alkuluku` : `Summa on alkuluku`);
	});
});