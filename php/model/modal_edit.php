<?php

    if($edit == "visites") {
        $reponse = lireLigneVisite($idToGet);

        require "php/model/listes_deroulantes.php";
    }

    else {
        $reponse = lireLigne($edit,$idToGet);
    }

?>