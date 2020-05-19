<?php
    require_once "php/functions.php";

    $tabLigne = lireTable("clients");

    foreach($tabLigne as $client) {
        $prenom = $client["prenom"];
        $nom = $client["nom"];
        $id = $client["id"];
    
        echo
        <<<CODEHTML
        <option value="$id">$prenom $nom</option>
        CODEHTML;
    }
?>