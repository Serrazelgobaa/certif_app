<?php
    $editWhat = $_POST["editWhat"] ?? "";
    $idToEdit = $_POST["idToEdit"] ?? "";

    if($editWhat == "prestations") {
        $nom = $_POST["edit_presta_nom"] ?? "";
        $prix = $_POST["edit_presta_prix"] ?? "";
        $description = $_POST["edit_presta_desc"] ?? "";

        modifierLignePresta($idToEdit, [
            "nom" => $nom,
            "prix" => $prix,
            "description" => $description,
        ]);

        $confirmation = "Prestation modifiée !";

        $tabLigne = lireTable("prestations");
    }
?>

