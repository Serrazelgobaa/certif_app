<?php

$tabLignePresta = lirePrestasDansVisites($id);

    foreach($tabLignePresta as $visitePresta) {

        $nom_presta = $visitePresta["nom_presta"];
        echo
        <<<CODEHTML
            $nom_presta | 
        CODEHTML;
    }
?>