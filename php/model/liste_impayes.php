<?php
    require_once "php/functions.php";

    $tabLigne = lireImpayes();

    foreach($tabLigne as $visite) {

        $client_nom = $visite["client_nom"];
        $client_prenom = $visite["client_prenom"];
        $jour = $visite["jour"];
        $mois = $visite["mois"];
        $annee = $visite["annee"];
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
                    <p class="impaye">$prix_total €</p>
                    <h3>
        CODEHTML;

        require "php/model/liste_prestas_visites.php";

        echo
        <<<CODEHTML
                    </h3>
                    <p>Client : $client_prenom $client_nom</p>
                </div>
                <div class="carte_footer">
                    <p>Visite effectuée le $jour/$mois/$annee</p>
                </div>
            </div>
        CODEHTML;
    }

?>