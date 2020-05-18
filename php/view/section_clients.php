<div id="create">
		<a href="#" id="create_button" class="create_client"><img src="./assets/images/add_circle.png">Nouveau client</a>
	</div>

	<div id="container_modal"></div>

	<main id="clients_slider" class="marge-top">
		

		<div class="container_clients">
			<h2 class="titre_client">Clients</h2>
			<div class="liste_clients">
            	<?php
            		require "php/model/liste_clients.php";
				?>
            </div>
		</div>
		<!--fin de la liste des clients-->


		<div class="container_clients">
			<img src="./assets/images/croix.png" width="40px" height="40px" id="croix">
			<div  id="profil_client">
				
			</div>
		</div>