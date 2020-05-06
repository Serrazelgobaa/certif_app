/*afficher cacher menu burger*/

const ouvrirMenu = () => {
	document.getElementById('menu_hamburger').classList.remove('hidden');
	document.getElementById('noir').classList.remove('hidden');
	console.log('ouvert');
};

const fermerMenu = () => {
	document.getElementById('menu_hamburger').classList.add('hidden');
	document.getElementById('noir').classList.add('hidden');
	console.log('fermé');
};

document.getElementById('btn_burger').addEventListener('click', ouvrirMenu);
document.getElementById('noir').addEventListener('click', fermerMenu);