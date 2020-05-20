const ouvrirFiltre = () => {
	document.querySelector('aside').classList.remove('hidden');
	document.getElementById('croix2').classList.remove('hidden');
	document.getElementById('btn_float').style.display = 'none';
};

const fermerFiltre = () => {
	document.querySelector('aside').classList.add('hidden');
	document.getElementById('croix2').classList.add('hidden');
	document.getElementById('btn_float').style.display = 'flex';
};

const listerFormPrestas = (listePrestas) => {

	const optionsPresta = document.querySelectorAll('#select_prestas option');
	const prestasAjoutees = document.getElementById('liste_prestas_ajoutees');
	const champPrix = document.getElementById('champPrix');
	const textePrix = document.getElementById('prix_total');

	let prix_total = 0;

	optionsPresta.forEach((option) => {
		let dataPrix = option.getAttribute("data-prix");
		let texte = `
		<div class="ajout_presta hidden"  data-id="${option.value}">
			<div class="ajt_presta_titre">${option.textContent}</div>
			<div>${dataPrix}&nbsp;€</div>
			<img src="assets/images/croix.png" class="retirer_presta" width="20px" height="20px" data-id="${option.value}" data-prix="${dataPrix}">
		</div>
		<input type="hidden" class="ajoutee" data-id="${option.value}" name="infoPresta[${option.value}]" value="false">`;
		prestasAjoutees.insertAdjacentHTML('beforeend', texte);
	});

	const etiquettes = document.querySelectorAll(".ajout_presta");

	etiquettes.forEach((etiquette) => {

		let idEtiquette = etiquette.getAttribute('data-id');
		listePrestas.forEach((presta) => {
			if(idEtiquette == presta["id"]) {
				etiquette.classList.remove('hidden');
			}
		});
	});

	const champsCaches = document.querySelectorAll('input.ajoutee');

	champsCaches.forEach((champ) => {
		let idChamp = champ.getAttribute('data-id');
		listePrestas.forEach((presta) => {
			if(idChamp == presta["id"]) {
				champ.value = "true";

				let prix = parseInt(presta["prix"],10);
				
				prix_total += prix;
			}
		});
	});

	afficherPrixTotal(prix_total);

	const croixPrestas = document.querySelectorAll(".retirer_presta");

	croixPrestas.forEach((croix) => {
		let idCroix = croix.getAttribute("data-id");
		let prixCroix = parseInt(croix.getAttribute("data-prix"),10);

		croix.addEventListener('click', (event) => {
			retirerPresta(idCroix, prixCroix);
		});
	});

};

const ajouterPresta = () => {

	const optionsPresta = document.querySelectorAll('#select_prestas option');
	
	optionsPresta.forEach((option) => {
		if(option.selected) {

			let prestaAAjouter = document.querySelector(".ajout_presta[data-id='"+option.value+"']");
			let champCache = document.querySelector("input.ajoutee[data-id='"+option.value+"']");
			let prixInitial = parseInt(document.getElementById("champPrix").value,10);
			let prix = parseInt(option.getAttribute('data-prix'), 10);

			if(champCache.value == "false") {
				let prixTotal = prixInitial + prix;

				afficherPrixTotal(prixTotal);
			}

			prestaAAjouter.classList.remove('hidden');
			champCache.value = "true";

		}
	});

};

const retirerPresta = (id,prix) => {
	let prestaARetirer = document.querySelector(".ajout_presta[data-id='"+id+"']");
	let champCache = document.querySelector("input.ajoutee[data-id='"+id+"']");
	let prixInitial = parseInt(document.getElementById("champPrix").value,10);

	prestaARetirer.classList.add('hidden');
	champCache.value = "false";

	let prixTotal = prixInitial - prix;

	afficherPrixTotal(prixTotal);
};

const afficherPrixTotal = (prix) => {
	const champPrix = document.getElementById('champPrix');
	const textePrix = document.getElementById('prix_total');

	textePrix.innerHTML = prix;
	champPrix.value = prix;
};

const ouvrirOngletModifier = () => {
	let ongletOuvert = document.getElementById('onglet_modifier');
	let ongletFerme = document.getElementById('onglet_prestas');

	let boutonOuvert = document.getElementById('onglet_modifier_bouton');
	let boutonFerme = document.getElementById('onglet_prestas_bouton');

	ongletOuvert.classList.remove('hidden');
	ongletFerme.classList.add('hidden');

	boutonOuvert.classList.add('actif');
	boutonFerme.classList.remove('actif');
};

const ouvrirOngletPrestas = () => {
	let ongletOuvert = document.getElementById('onglet_prestas');
	let ongletFerme = document.getElementById('onglet_modifier');

	let boutonOuvert = document.getElementById('onglet_prestas_bouton');
	let boutonFerme = document.getElementById('onglet_modifier_bouton');

	ongletOuvert.classList.remove('hidden');
	ongletFerme.classList.add('hidden');

	boutonOuvert.classList.add('actif');
	boutonFerme.classList.remove('actif');
};

document.getElementById('btn_float').addEventListener('click', ouvrirFiltre);
document.getElementById('croix2').addEventListener('click', fermerFiltre);