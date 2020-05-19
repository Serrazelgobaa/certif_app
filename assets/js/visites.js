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

const listerFormPrestas = () => {

	const optionsPresta = document.querySelectorAll('#select_prestas option');
	const prestasAjoutees = document.getElementById('liste_prestas_ajoutees');

	optionsPresta.forEach((option) => {
		let texte = `<p class="ajout_presta hidden" data-id="${option.value}">${option.textContent}
		<img src="assets/images/croix.png" class="retirer_presta" width="15px" height="15px" data-id="${option.value}"></p>`;
		prestasAjoutees.insertAdjacentHTML('beforeend', texte);
	});

	const croixPrestas = document.querySelectorAll(".retirer_presta");

	croixPrestas.forEach((croix) => {
		let idCroix = croix.getAttribute("data-id");

		croix.addEventListener('click', (event) => {
			console.log(idCroix);
			retirerPresta(idCroix);
		});
	});
};

const ajouterPresta = () => {

	const optionsPresta = document.querySelectorAll('#select_prestas option');
	
	optionsPresta.forEach((option) => {
		if(option.selected) {
			let prestaAAjouter = document.querySelector(".ajout_presta[data-id='"+option.value+"']");

			prestaAAjouter.classList.remove('hidden');
		}
	});

};

const retirerPresta = (id) => {
	let prestaARetirer = document.querySelector(".ajout_presta[data-id='"+id+"']");

	prestaARetirer.classList.add('hidden');
};

document.getElementById('btn_float').addEventListener('click', ouvrirFiltre);
document.getElementById('croix2').addEventListener('click', fermerFiltre);