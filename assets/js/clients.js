const glisserDroite = () => {
	document.getElementById('clients_slider').style.transform = 'translateX(0%)';
	document.getElementById('clients_slider').style.transition = 'transform 0.4s ease';
};

const glisserGauche = () => {
	document.getElementById('clients_slider').style.transform = 'translateX(-50%)';
	document.getElementById('clients_slider').style.transition = 'transform 0.4s ease';
};

document.getElementById('croix').addEventListener('click', glisserDroite);