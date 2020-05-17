/* MODALE DE CREATION DE CLIENT */

	/* OUVRIR */

const ouvrirCreerClient = () => {
	document.getElementById('noir_modal').classList.remove('hidden');
	document.getElementById('modal_creation_client').classList.remove('hidden');
};

	/* FERMER */

const fermerCreerClient = () => {
	document.getElementById('noir_modal').classList.add('hidden');
	document.getElementById('modal_creation_client').classList.add('hidden');
};

/* MODALE DE CREATION DE VISITE */

	/* OUVRIR */

const ouvrirCreerVisite = () => {
	document.getElementById('noir_modal').classList.remove('hidden');
	document.getElementById('modal_creation_visite').classList.remove('hidden');
};

	/* FERMER */

const fermerCreerVisite = () => {
	document.getElementById('noir_modal').classList.add('hidden');
	document.getElementById('modal_creation_visite').classList.add('hidden');
};

/* MODALE DE CREATION DE PRESTATION */

	/* OUVRIR */

const ouvrirCreerPresta = () => {
	document.getElementById('noir_modal').classList.remove('hidden');
	document.getElementById('modal_creation_presta').classList.remove('hidden');
};

	/* FERMER */

const fermerCreerPresta = () => {
	document.getElementById('noir_modal').classList.add('hidden');
	document.getElementById('modal_creation_presta').classList.add('hidden');
};

/* MODALE DE MODIFICATION DE CLIENT */

	/* OUVRIR */

	/* FERMER */

/* MODALE DE MODIFICATION DE VISITE */

	/* OUVRIR */

	/* FERMER */

/* MODALE DE MODIFICATION DE PRESTATION */

	/* OUVRIR */

const afficherModalEdit = () => {
	document.getElementById('modal_modif_presta').classList.remove('hidden');
	document.getElementById('noir_modal').classList.remove('hidden');
};

	/* FERMER */

const fermerModalEdit = () => {
	document.getElementById('modal_modif_presta').classList.add('hidden');
	document.getElementById('noir_modal').classList.add('hidden');
};

/* MESSAGE DE CONFIRMATION D'ACTION */

	/* OUVRIR */

const afficherConfirmation = () => {
	document.getElementById('espace_confirmation').classList.remove('hidden');
};

	/* FERMER */

const masquerConfirmation = () => {
	document.getElementById('espace_confirmation').classList.add('hidden');
};

/* MODALE DE SUPPRESSION D'ELEMENT */

	/* OUVRIR */

const afficherSupprModal = () => {

	document.getElementById('noir_modal').classList.remove('hidden');
	document.getElementById('modal_confirm_suppr').classList.remove('hidden');
};

	/* FERMER */

const masquerSupprModal = () => {
	document.getElementById('noir_modal').classList.add('hidden');
	document.getElementById('modal_confirm_suppr').classList.add('hidden');

	deleteWhat.value = "";
	idToDelete.value = "";
}

const verifierIcones = () => {

	let iconesSuppr = document.querySelectorAll('.delete');
	let iconesEdit = document.querySelectorAll('.icon_edit');

	console.log("vérification faite !");

/* REACTION AU CLIC SUR CHAQUE ICONE DE SUPPRESSION */

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
		fermerModalEdit();
	});
});

document.getElementById('croix_confirm').addEventListener('click',masquerConfirmation);

document.getElementById('croix_modal_suppr').addEventListener('click',masquerSupprModal);
document.getElementById('suppr_cancel').addEventListener('click', (event) => {
	event.preventDefault();
	masquerSupprModal();
});

document.getElementById('noir_modal').addEventListener('click',masquerSupprModal);

document.getElementById('croix6').addEventListener('click', fermerModalEdit);
document.getElementById('noir_modal').addEventListener('click',fermerModalEdit);