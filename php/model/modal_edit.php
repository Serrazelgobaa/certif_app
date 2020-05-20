<?php

    if($edit == "visites") {
        $reponse = lireLigneVisite($idToGet);

        require "php/model/listes_deroulantes.php";

        $listePrestas = [];

        foreach($reponse as $visite) {
            $id = $visite["id"];
            $tableauPresta = [];

            $tabPrestas = lirePrestasDansVisites($id);

            foreach($tabPrestas as $presta) {
                $prestaNom = $presta["nom_presta"];
                $prestaId = $presta["id_presta"];
                $prestaPrix = $presta["prix_presta"];
                $tableauPresta = [
                    "id" => $prestaId, 
                    "nom" => $prestaNom,
                    "prix" => $prestaPrix,
                ];
                $listePrestas[] = $tableauPresta;
            }


        }
    }

    else {
        $reponse = lireLigne($edit,$idToGet);
    }

?>