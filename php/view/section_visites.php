<div id="create" class="create_hidden">
    <a href="#" id="create_button" class="create_visite"><img src="./assets/images/add_circle.png">Nouvelle visite</a>
</div>
    
<aside class="hidden">
    <img src="./assets/images/croix.png" id="croix2" width="40px" height="40px" class="hidden">

    <a href="#" id="create_button2"><img src="./assets/images/add_circle.png">Nouvelle visite</a>
    <h3>Filtres</h3>
    <form action="gestion_visites.php?filters=true" method="post">

    		<label for="date" name="date"><h4>A partir d'une date :</h4></label>
    		<input type="date" name="date" id="date">
    		<h4>Payée</h4>
    		<p><input type="radio" name="payee" id="payee_yes" value="payee_yes"><label for="payee_yes" name="payee_yes">Oui</label>
    		<input type="radio" name="payee" id="payee_no" value="payee_no"><label for="payee_no" name="payee_no">Non</label>
    		<input type="radio" name="payee" id="payee_ind" value="payee_ind"><label for="payee_ind" name="payee_ind">Indifférent</label></p>

    		<h4>Effectuée</h4>
    		<p><input type="radio" name="faite" id="faite_yes" value="faite_yes"><label for="faite_yes" name="faite_yes">Oui</label>
    		<input type="radio" name="faite" id="faite_no" value="faite_no"><label for="faite_no" name="faite_no">Non</label>
    		<input type="radio" name="faite" id="faite_ind" value="faite_ind"><label for="faite_ind" name="faite_ind">Indifférent</label></p>

    		<h4>Par prestation</h4>

        <select name="choix_presta" id="choix_presta">
            <option value="">Choisissez la prestation</option>
            <option value="">Prestation 1</option>
            <option value="">Prestation 1</option>
            <option value="">Prestation 1</option>
            <option value="">Prestation 1</option>

    		</select>

    		<h4>Par nom du client :</h4>
    		<select name="nom_client" id="nom_client">
            <option value="">Nom du Client</option>
            <option value="">Mme Truc</option>
            <option value="">Mme Truc</option>
            <option value="">Mme Truc</option>
            <option value="">Mme Truc</option>
        </select>

    		<input type="submit" value="Valider" id="create_button" class="valider">

    	</form>
   	</aside>

   	<div id="btn_float">
   		<img src="./assets/images/tune.png" width="50px" height="50px">
   	</div>

   	<main id="visites_aside">

	   <div class="liste_visites">

        <?php
            require "php/model/liste_visites.php";
        ?>

		</div>