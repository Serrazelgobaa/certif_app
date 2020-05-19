<?php
    require_once "php/functions.php";

    /* TRAITEMENT DES FORMULAIRES */

    $typeElement = $_POST['typeElement'] ?? "";
    $typeAction = $_POST['typeAction'] ?? "";

    $edit = $_GET['edit'] ?? "";
    $profilClient = $_GET['profilclient'] ?? "";

    if($typeElement != "") {
        if($typeElement == "prestation") {
            require "php/controller/traitement_prestation.php";

            $tabAssoJson = [
                "confirmation" => $confirmation ?? "",
                "tabLigne" => $tabLigne ?? [],
                "typeElement" => $typeElement,
            ];
        }

        if($typeElement == "client") {
            require "php/controller/traitement_client.php";

            $tabAssoJson = [
                "confirmation" => $confirmation ?? "",
                "tabLigne" => $tabLigne ?? [],
                "typeElement" => $typeElement,
            ];
        }

        if($typeElement == "visite") {
            require "php/controller/traitement_visite.php";

            $tabAssoJson = [
                "confirmation" => $confirmation ?? "",
                "tabLigne" => $tabLigne ?? [],
                "typeElement" => $typeElement,
                "listePrestas" => $listePrestas,
            ];
        }

    }

    /* REMPLIR LES FORMULAIRES DE MODALES DE MODIFICATION */

    if($edit != "") {
        $idToGet = $_GET['id'];

        require "php/model/modal_edit.php";

        $tabAssoJson = [
            "reponse" => $reponse,
        ];
    }

    /* AFFICHER LES PROFILS CLIENTS */

    if($profilClient != "") {
        $idProfil = $_GET['id'];

        require "php/model/profil_client.php";

        $tabAssoJson = [
            "reponse" => $reponse,
        ];
    }


    


    $texteJSON = json_encode($tabAssoJson, JSON_PRETTY_PRINT);

    echo $texteJSON;
?>