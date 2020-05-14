<?php
    $nom = $_POST["nv_presta_nom"] ?? "";
    $description = $_POST["nv_presta_desc"] ?? "";
    $prix = $_POST["nv_presta_prix"] ?? "";

    insererLignePresta([
        "nom" => $nom,
        "prix" => $prix,
        "description" => $description,
    ]);

    $confirmation = "Votre nouvelle prestation a été ajoutée !";

    $tabLigne = lireTable("prestations");
?>