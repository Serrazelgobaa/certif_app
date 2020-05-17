const ouvrirModale = (nomModale) => {
	document.getElementById(nomModale).classList.remove('hidden');
	document.getElementById('noir_modal').classList.remove('hidden');
};

const fermerModale = (nomModale) => {
	if (nomModale == "all") {
		fenetres = document.querySelectorAll('.fenetre_modale');

		fenetres.forEach((fenetre) => {
			fenetre.classList.add('hidden');
		});
	}

	else {
		document.getElementById(nomModale).classList.add('hidden');
	}

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

const reinitChampsCaches = () => {
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
			ouvrirModale('modal_confirm_suppr');
		});
	});

};


const button = document.getElementById('create_button');

if (button.classList.contains('create_client')) {
	button.addEventListener('click', (event) => {
		ouvrirModale('modal_creation_client');
	});
	document.getElementById('croix3').addEventListener('click',(event) => {
		fermerModale('modal_creation_client');
	});
}

else if (button.classList.contains('create_visite')){
	button.addEventListener('click', (event) => {
		ouvrirModale('modal_creation_visite');
	});
	document.getElementById('create_button2').addEventListener('click',(event) => {
		ouvrirModale('modal_creation_visite');
	});
	document.getElementById('croix4').addEventListener('click', (event) => {
		fermerModale('modal_creation_visite');
	});
}

else if (button.classList.contains('create_presta')){
	button.addEventListener('click', (event) => {
		ouvrirModale('modal_creation_presta');
	});
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
		afficherConfirmation();
		fermerModale('all');
	});
});

document.getElementById('croix_confirm').addEventListener('click',masquerConfirmation);

document.getElementById('suppr_cancel').addEventListener('click', (event) => {
	event.preventDefault();
	fermerModale('modal_confirm_suppr');
	reinitChampsCaches();
});


document.getElementById('noir_modal').addEventListener('click',(event) => {
	fermerModale('all');
});