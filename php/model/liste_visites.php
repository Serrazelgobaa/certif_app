<?php
    require_once "php/functions.php";

    $tabLigne = lireTableVisites(false);

    foreach($tabLigne as $visite) {

        $client_nom = $visite["client_nom"];
        $client_prenom = $visite["client_prenom"];
        $date = $visite["date"];
        $heure = $visite["heure"];
        $prix_total = $visite["prix_total"];
        $payee = $visite["payee"];
        $effectuee = $visite["effectuee"];
        $id = $visite["id"];

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
                <p><span class="bold">Prestations : 
            CODEHTML;

            require "php/model/liste_prestas_visites.php";

            echo
            <<<CODEHTML
            </span></p>
            <h3>Prix total: $prix_total €</h3>
            </div>
            </div>
            CODEHTML;
    }
?>