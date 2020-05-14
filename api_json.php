<?php
    require_once "php/functions.php";

    $idFormulaire = $_POST["idFormulaire"] ?? "";

    if($idFormulaire != "") {
        if($idFormulaire == "nv_presta") {
            require "php/controller/traitement_nv_presta.php";
        }
    }
    

    $tabAssoJson = [
        "confirmation" => $confirmation ?? "",
        "tabPresta" => $tabLigne ?? [],
    ];

    $texteJSON = json_encode($tabAssoJson, JSON_PRETTY_PRINT);

    echo $texteJSON;
?>