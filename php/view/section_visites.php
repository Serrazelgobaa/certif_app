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

        <?php
            require "php/functions.php";

            $tabLigne = lireTableVisites();

            foreach($tabLigne as $visite) {

                $client_nom = $visite["client_nom"];
                $client_prenom = $visite["client_prenom"];
                $date = $visite["date"];
                $heure = $visite["heure"];
                $prix_total = $visite["prix_total"];
                $payee = $visite["payee"];
                $effectuee = $visite["effectuee"];

                echo
                <<<CODEHTML
                    <div class=carte_visite>
                        <div class="card_header">
                            <div class="check_icons">
                 CODEHTML;

                 if($effectuee == 1) {
                    echo
                    <<<CODEHTML
                        <img src="./assets/images/check.png" width="30px" height="30px"><p>Terminée</p>
                    CODEHTML;
                 }

                 else {
                    echo
                    <<<CODEHTML
                        <img src="./assets/images/uncheck.png" width="30px" height="30px"><p>En cours</p>
                    CODEHTML;
                 }

                 if($payee == 1) {
                    echo
                    <<<CODEHTML
                        <img src="./assets/images/paid.png" width="30px" height="30px"><p>Payée</p>
                    CODEHTML;
                 }

                 else {
                    echo
                    <<<CODEHTML
                        <img src="./assets/images/unpaid.png" width="30px" height="30px"><p>Non-payée</p>
                    CODEHTML;
                 }

                 echo
                 <<<CODEHTML
                    </div>
                        <div class="icon_card">
                            <img src="./assets/images/edit.png" id="" class="icon_edit">
                            <a href="#"><img src="./assets/images/delete.png"></a>
                    </div>
                    </div>
                    <div class="carte_body card_body">
                        <h2>Chez $client_prenom $client_nom</h2>
                        <p>Le $date à $heure</p>
                        <p><span class="bold">Prestations : Prestation 1 | Prestation 2</span></p>
                        <h3>Prix total: $prix_total €</h3>
                    </div>
                    </div>
                 CODEHTML;
            }
        ?>