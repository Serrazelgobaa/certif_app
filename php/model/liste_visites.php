<?php
    require_once "php/functions.php";

    $tabLigne = lireTableVisites(false);

    foreach($tabLigne as $visite) {

        $client_nom = $visite["client_nom"];
        $client_prenom = $visite["client_prenom"];
        $jour = $visite["jour"];
        $mois = $visite["mois"];
        $annee = $visite["annee"];
        $heure = $visite["heure"];
        $minute = $visite["minute"];
        $prix_total = $visite["prix_total"];
        $payee = $visite["payee"];
        $effectuee = $visite["effectuee"];
        $id = $visite["id"];

        if($mois <= 9) {
            $mois = "0".$mois;
        }

        if($minute <= 9) {
            $minute = "0".$minute;
        }

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
                    <img src="./assets/images/edit.png" id="" class="icon_edit visites" data-id="$id">
                    <img src="./assets/images/delete.png" class="delete visite" data-id="$id">
            </div>
            </div>
            <div class="carte_body card_body">
                <h2>Chez $client_prenom $client_nom</h2>
                <p>Le $jour/$mois/$annee à $heure h $minute</p>
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