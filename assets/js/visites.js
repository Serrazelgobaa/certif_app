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

document.getElementById('btn_float').addEventListener('click', ouvrirFiltre);
document.getElementById('croix2').addEventListener('click', fermerFiltre);