const schermo = document.getElementById('schermo');
const form = document.getElementById('calculator');
let numero1 = '';
let operatore = '';
let numero2 = '';

document.querySelectorAll('button').forEach((pulsante) => {
	pulsante.addEventListener('click', () => {
		const valore = pulsante.textContent;

		if (valore === 'C') {
			numero1 = '';
			operatore = '';
			numero2 = '';
			schermo.value = '';
			return;
		}

		if ('0123456789'.includes(valore)) {
			if (operatore === '') {
				numero1 += valore;
			} else {
				numero2 += valore;
			}
		} else if (valore === ',') {
			if (operatore === '' && !numero1.includes('.')) {
				numero1 += '.';
			} else if (operatore !== '' && !numero2.includes('.')) {
				numero2 += '.';
			}
		} else if ('+-x/'.includes(valore) && numero1 !== '') {
			operatore = valore === 'x' ? '*' : valore;
		}

		schermo.value = numero1 + operatore.replace('*', 'x') + numero2;
	});
});

form.addEventListener('submit', (evento) => {
	if (numero1 === '' || operatore === '' || numero2 === '') {
		evento.preventDefault();
		return;
	}

	document.getElementById('numero1').value = numero1;
	document.getElementById('operatore').value = operatore;
	document.getElementById('numero2').value = numero2;
});
