<?php
    require "php/functions.php";

    $tabLigne = lireTable("prestations");

    foreach($tabLigne as $prestation) {
        $nom = $prestation["nom"];
        $description = $prestation["description"];
        $prix = $prestation["prix"];
        $id = $prestation["id"];

        echo
    <<<CODEHTML
        <div class="art_card">
            <div class="card_header">
                <h2 class="titre_client">$nom</h2>
                <div class="icon_card">
                    <img src="./assets/images/edit.png" id="" class="icon_edit">
                    <img src="./assets/images/delete.png" class="delete prestation" data-id="$id">
                </div>
            </div>
            <div class="body_card">
                <p>$description</p>
                <h3>Tarif : $prix €</h3>
            </div>
        </div>
    CODEHTML;
    }
?>