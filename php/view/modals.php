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
	<img src="./assets/images/croix.png" id="croix4" width="35px" height="35px">
	<form action="./visites.php?create=true" method="post">
		<h2>Nouvelle visite</h2>
		<label for="nv_visite_date" name="nv_visite_date">Date  </label><br>
		<input type="datetime" name="nv_visite_date" id="nv_visite_date"><br>
		<label for ="nv_visite_heure" name="nv_visite_heure">et heure :</label><br>
		<input type="time" name="nv_visite_heure" id="nv_visite_heure"><br>
		<label for="nv_visite_prix_total" name="nv_visite_prix_total">Prix Total :</label><br>
		<input type="text" name="nv_visite_prix_total" id="nv_visite_prix_total"><br><br>

		
		<select name="quel_clients" id="quel_clients">
			<option value="">Sélectionner un client :</option>
			<option value="">Mme Truc</option>
            <option value="">Mme Truc</option>
            <option value="">Mme Truc</option>
            <option value="">Mme Truc</option>
		</select><br>

		
		<input type="submit" value="Ajouter la visite" class="submit_modal">

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
			<label for="nv_presta_desc" name="nv_presta_desc"><h3>Description : </h3></label>
			<textarea name="nv_presta_desc" id="nv_presta_desc" class="champ"></textarea>

			<label for="nv_presta_prix" name="nv_presta_prix"><h3>Tarif : </h3></label>
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