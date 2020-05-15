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

const afficherConfirmation = () => {
	document.getElementById('espace_confirmation').classList.remove('hidden');
};

const masquerConfirmation = () => {
	document.getElementById('espace_confirmation').classList.add('hidden');
};

const afficherSupprModal = () => {

	document.getElementById('noir_modal').classList.remove('hidden');
	document.getElementById('modal_confirm_suppr').classList.remove('hidden');
};

const masquerSupprModal = () => {
	document.getElementById('noir_modal').classList.add('hidden');
	document.getElementById('modal_confirm_suppr').classList.add('hidden');

	deleteWhat.value = "";
	idToDelete.value = "";
}

const verifierIcones = () => {

	let iconesSuppr = document.querySelectorAll('.delete');
	console.log("vérification faite !");

	iconesSuppr.forEach((icone) => {

		icone.addEventListener('click', () => {
			if(icone.classList.contains('prestation')){
				deleteWhat.value="prestations";
			}
		
			else if(icone.classList.contains('visite')) {
				deleteWhat.value="visite";
			}
		
			else if(icone.classList.contains('client')) {
				deleteWhat.value="client";
			}
			iconeId = icone.getAttribute('data-id');
			idToDelete.value = iconeId;
			afficherSupprModal();
		});
	});
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

const deleteWhat = document.getElementById('deleteWhat');
const idToDelete = document.getElementById('idToDelete');

document.addEventListener('DOMContentLoaded', () =>{
	deleteWhat.value = "";
	idToDelete.value = "";

	verifierIcones();
});

listeFormAjax.forEach((balise) => {
	balise.addEventListener('submit', () => {
		fermerCreerPresta();
		masquerSupprModal();
		afficherConfirmation();
	});
});

document.getElementById('croix_confirm').addEventListener('click',masquerConfirmation);

document.getElementById('croix_modal_suppr').addEventListener('click',masquerSupprModal);
document.getElementById('suppr_cancel').addEventListener('click', (event) => {
	event.preventDefault();
	masquerSupprModal();
});
document.getElementById('noir_modal').addEventListener('click',masquerSupprModal);