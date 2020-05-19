<?php
    require_once "php/functions.php";

    $tabLigne = lireTable("clients");
    $listeOptions = "";

    foreach($tabLigne as $client) {
        $prenom = $client["prenom"];
        $nom = $client["nom"];
        $id = $client["id"];
        
        $listeOptions .= '<option value="'.$id.'">'.$prenom.' '.$nom.'</option>';
    }

    $tabMenuPrestas = lireTable("prestations");
    $selectPrestas = "";

    foreach($tabMenuPrestas as $presta) {
        $id = $presta["id"];
        $nom = $presta["nom"];
        $prix = $presta["prix"];

        $selectPrestas .= '<option value="'.$id.'" data-prix="'.$prix.'">'.$nom.'</option>';
    }
?>