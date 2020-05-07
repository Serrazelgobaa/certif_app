const ouvrirCreerClient = () => {
	document.getElementById('noir_modal').classList.remove('hidden');
	document.getElementById('modal_creation_client').classList.remove('hidden');
};

const fermerCreerClient = () => {
	document.getElementById('noir_modal').classList.add('hidden');
	document.getElementById('modal_creation_client').classList.add('hidden');
};

const ouvrirCreerVisite = () => {
	document.getElementById('noir_modal').classList.remove('hidden');
	document.getElementById('modal_creation_visite').classList.remove('hidden');
};

const fermerCreerVisite = () => {
	document.getElementById('noir_modal').classList.add('hidden');
	document.getElementById('modal_creation_visite').classList.add('hidden');
};

const ouvrirCreerPresta = () => {
	document.getElementById('noir_modal').classList.remove('hidden');
	document.getElementById('modal_creation_presta').classList.remove('hidden');
};

const fermerCreerPresta = () => {
	document.getElementById('noir_modal').classList.add('hidden');
	document.getElementById('modal_creation_presta').classList.add('hidden');
};


const button = document.getElementById('create_button');

if (button.classList.contains('create_client')) {
	button.addEventListener('click', ouvrirCreerClient);
	document.getElementById('croix3').addEventListener('click',fermerCreerClient);
	document.getElementById('noir_modal').addEventListener('click',fermerCreerClient);
}

else if (button.classList.contains('create_visite')){
	button.addEventListener('click', ouvrirCreerVisite);
	document.getElementById('create_button2').addEventListener('click',ouvrirCreerVisite);
	document.getElementById('croix4').addEventListener('click',fermerCreerVisite);
	document.getElementById('noir_modal').addEventListener('click',fermerCreerVisite);
}

else if (button.classList.contains('create_presta')){
	button.addEventListener('click', ouvrirCreerPresta);
	document.getElementById('croix5').addEventListener('click',fermerCreerPresta);
	document.getElementById('noir_modal').addEventListener('click',fermerCreerPresta);
}