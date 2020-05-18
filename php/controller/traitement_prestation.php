<?php
    if($typeAction != "") {

        if($typeAction == "create") {

            /* AJOUT D'UNE NOUVELLE PRESTATION */

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

        }

        if($typeAction == "update") {

            /* MODIFICATION D'UNE PRESTATION EXISTANTE */

            $idToEdit = $_POST["idToEdit"] ?? "";

            if($idToEdit != "") {

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

        }

        if($typeAction == "delete") {

            /* SUPPRESSION D'UNE PRESTATION */

            $idToDelete = $_POST['idToDelete'] ?? "";

            if($idToDelete != "") {
                supprimerLigne("prestations", $idToDelete);

                $confirmation = "Element supprimé avec succès.";

                $tabLigne = lireTable("prestations");
            }

        }
    }
?>