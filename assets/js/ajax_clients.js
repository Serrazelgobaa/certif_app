const glisserGauche = () => {
	document.getElementById('clients_slider').style.transform = 'translateX(-50%)';
	document.getElementById('clients_slider').style.transition = 'transform 0.4s ease';
};

$(document).ready(function() {

	$(".client_titre").each(function() {
		$(this).click(function() {

			const idClient= $(this).attr("id");

			$("#profil_client").load("php/model/profil_client.php?id="+idClient+"");

			glisserGauche();
		});

    });
		
	});

	//?id="+ idClient +"

	//load("profil_client.php");