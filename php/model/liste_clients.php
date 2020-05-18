<?php
    require "php/functions.php";

    $tabLigne = lireTable("clients");

    foreach($tabLigne as $client) {
        $prenom = $client["prenom"];
        $nom = $client["nom"];
        $id = $client["id"];

        echo
        <<<CODEHTML
            <div class="client">
                <h4 class="client_titre" data-id="$id">$prenom $nom</h4>
                    <div class="client_icons">
                    <img src="./assets/images/edit.png" class="icon_edit clients" data-id="$id">
                    <img src="./assets/images/delete.png" height="30px" width="30px" class="delete clients"  data-id="$id">
                    </div> 
                </div>
                <hr class="client_separateur">
        CODEHTML;
    }
			
?>