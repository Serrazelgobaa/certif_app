<div id="noir_modal" class="hidden">
</div>

<!------------- AJOUTER UN NOUVEAU CLIENT ---------------->


<div id="modal_creation_client" class="fenetre_modale hidden">
	<form action="api_json.php" method="post" class="ajax">
		<div class="modal_grid">
			<div class="modal_header">
				<h2>Nouveau client</h2>

				<div class="row">
					<div class="column">
						<label for="nv_client_nom" name="nv_client_nom"><h3>Nom : </h3></label>
						<input type="text" name="nv_client_nom" id="nv_client_nom">
					</div>
					
					<div class="column">
						<label for="nv_client_prenom" name="nv_client_prenom"><h3>Prénom : </h3></label>
						<input type="text" name="nv_client_prenom" id="nv_client_prenom">
					</div>
				</div>
			</div>

			<div class="modal_body body_clients">
			
				<label for="nv_client_adresse" name="nv_client_adresse"><h4>Adresse : </h3></label>
				<input type="text" name="nv_client_adresse" id="nv_client_adresse" class="champ_adresse">

				<div class="row">
					<div class="column">
						<label for="nv_client_cp" name="nv_client_cp"><h4>Code postal : </h3></label>
						<input type="text" name="nv_client_cp" id="nv_client_cp">
					</div>
					<div class="column">
						<label for="nv_client_ville" name="nv_client_ville"><h4>Ville : </h3></label>
						<input type="text" name="nv_client_ville" id="nv_client_ville">
					</div>
				</div>

				<label for="nv_client_tel" name="nv_client_tel"><h4>Numéro de téléphone : </h3></label>
				<input type="text" name="nv_client_tel" id="nv_client_tel">

				<label for="nv_client_mail" name="nv_client_mail"><h4>Adresse email : </h3></label>
				<input type="text" name="nv_client_mail" id="nv_client_mail" class="champ_mail">
				
				<input type="hidden" name="typeElement" value="client">
				<input type="hidden" name="typeAction" value="create">

			</div>

			<div class="modal_footer">
				<input type="submit" value="Ajouter le client" class="submit_modal">
			</div>
		</div>

	</form>
</div>

<!------------- AJOUTER UNE NOUVELLE VISITE ---------------->

<div id="modal_creation_visite" class="fenetre_modale hidden">
	<form action="api_json.php" method="post" class="ajax">
		<div class="modal_header">
			<h2>Nouvelle visite</h2>
		</div>
		<div class="modal_body">
			<h3>Client</h3>
			<select name="quel_client" id="quel_client">
				<option value="">Sélectionner un client :</option>
				<?php
					require "php/model/listes_deroulantes.php";

					echo $listeOptions;
				?>
			</select>
			<div class="row row_visites">
				<div class="column">
					<label>
						<h4>Date</h4> 
						<input type="date" name="nv_visite_date" id="nv_visite_date">
					</label>
				</div>
				<div class="column">
					<label>
						<h4>Heure</h4>
						<input type="time" name="nv_visite_heure" id="nv_visite_heure">
					</label>
				</div>
			</div>

			<input type="hidden" name="typeElement" value="visite">
			<input type="hidden" name="typeAction" value="create">

		</div>
		<div class="modal_footer">
			<input type="submit" value="Ajouter la visite" class="submit_modal">
		</div>

	</form>
</div>

<!------------- AJOUTER UNE NOUVELLE PRESTATION ---------------->

<div id="modal_creation_presta" class="fenetre_modale hidden">
	<form action="api_json.php" method="post" class="ajax">
		<div class="modal_header">
			<h2>Nouvelle prestation</h2>
			<label for="nv_presta_nom" name="nv_presta_nom"><h3>Nom : </h3></label>
			<input type="text" name="nv_presta_nom" id="nv_presta_nom" class="champ">
		</div>
		<div class="modal_body">
			<label for="nv_presta_desc" name="nv_presta_desc"><h4>Description : </h4></label>
			<textarea name="nv_presta_desc" id="nv_presta_desc" class="champ"></textarea>

			<label for="nv_presta_prix" name="nv_presta_prix"><h4>Tarif : </h4></label>
			<input type="text" name="nv_presta_prix" id="nv_presta_prix" class="presta_prix champ"> €
		
			<input type="hidden" name="typeElement" value="prestation">
			<input type="hidden" name="typeAction" value="create">
		</div>

		<div class="modal_footer">
			<input type="submit" value="Ajouter la prestation" class="submit_modal" name="submit">
		</div>

	</form>
</div>

<!------------ MODIFIER UN CLIENT EXISTANT --------------------->

<div id="modal_modif_client" class="fenetre_modale hidden">
	<form action="api_json.php" method="post" class="ajax" id="ajax_edit_clients">

	</form>
</div>

<!------------- MODIFIER UNE PRESTATION EXISTANTE --------------->

<div id="modal_modif_presta" class="fenetre_modale hidden">
	<form action="api_json.php" method="post" class="ajax" id="ajax_edit_presta">
		
	</form>
</div>

<!------------- MODIFIER UNE VISITE EXISTANTE -------------->

<div id="modal_modif_visite" class="fenetre_modale hidden">
	<form action="api_json.php" method="post" class="ajax" id="ajax_edit_visite">
		
	</form>
</div>

<!------------- CONFIRMER LA SUPPRESSION D'UN ELEMENT ----------->

<div id="modal_confirm_suppr" class="fenetre_modale hidden">
		<form action="api_json.php" method="post" class="ajax">
			<div id="modal_suppr_body">
				<p>Êtes-vous sûr de vouloir supprimer cet élément ?</p>
				
				<input type="hidden" name="typeElement" value="" id="deleteWhat">
				<input type="hidden" name="typeAction" value="delete">
				<input type="hidden" name="idToDelete" value="" id="idToDelete">
			</div>
			<div id="modal_suppr_footer">
				<input type="submit" value="Confirmer" name="submit" id="suppr_submit">
				<button id="suppr_cancel">Annuler</button>
			</div>
		</form>
</div>