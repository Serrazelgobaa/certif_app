<?php
    require_once "php/functions.php";

    $edit = $_GET['edit'];
    $idToEdit = $_GET['id'];

    if($edit != "") {
 
            require "php/model/modal_edit.php";

            $tabJsonEdit = [
                "reponse" => $reponse,
            ];
        }

        $texteJSON = json_encode($tabJsonEdit, JSON_PRETTY_PRINT);

        echo $texteJSON;
?>

