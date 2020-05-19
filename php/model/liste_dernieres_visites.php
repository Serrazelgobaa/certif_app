<?php
    require_once "php/functions.php";

    $tabLigne = lireTableVisites(true);

    foreach($tabLigne as $visite) {

        $client_nom = $visite["client_nom"];
        $client_prenom = $visite["client_prenom"];
        $jour = $visite["jour"];
        $mois = $visite["mois"];
        $annee = $visite["annee"];
        $heure = $visite["heure"];
        $prix_total = $visite["prix_total"];
        $payee = $visite["payee"];
        $effectuee = $visite["effectuee"];
        $id = $visite["id"];

        if($mois <= 9) {
            $mois = "0".$mois;
        }

        echo
        <<<CODEHTML
        <div class="carte_visite">
            <div class="carte_body">
                <h3>$client_prenom $client_nom</h3>
                <p>
        CODEHTML;

        require "php/model/liste_prestas_visites.php";

        echo
        <<<CODEHTML
                </p>
            </div>
            <div class="carte_footer">
                <p>$jour/$mois/$annee</p>
            </div>
        </div>
        CODEHTML;
    }
?>