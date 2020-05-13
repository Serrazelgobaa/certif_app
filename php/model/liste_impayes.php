<?php
    require_once "php/functions.php";

    $tabLigne = lireImpayes();

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
                    <p>Visite effectuée le $date</p>
                </div>
            </div>
        CODEHTML;
    }

?>