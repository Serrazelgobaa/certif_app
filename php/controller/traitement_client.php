<?php
    if($typeAction != "") {

        if($typeAction == "create") {

            /* AJOUT D'UN NOUVEAU CLIENT */

            $nom = $_POST["nv_client_nom"] ?? "";
            $prenom = $_POST["nv_client_prenom"] ?? "";
            $adresse = $_POST["nv_client_adresse"] ?? "";
            $code_postal = $_POST["nv_client_cp"] ?? "";
            $ville = $_POST["nv_client_ville"] ?? "";
            $telephone = $_POST["nv_client_tel"] ?? "";
            $mail = $_POST["nv_client_mail"] ?? "";

            insererLigneClient([
                "nom" => $nom,
                "prenom" => $prenom,
                "adresse" => $adresse,
                "code_postal" => $code_postal,
                "ville" => $ville,
                "telephone" => $telephone,
                "mail" => $mail,
            ]);

            $confirmation = "Votre nouveau client a été ajouté !";

            $tabLigne = lireTable("clients");

        }

        if($typeAction == "update") {

            /* MODIFICATION D'UN CLIENT EXISTANT */

            $idToEdit = $_POST["idToEdit"] ?? "";

            if($idToEdit != "") {

                $nom = $_POST["nv_client_nom"] ?? "";
                $prenom = $_POST["nv_client_prenom"] ?? "";
                $adresse = $_POST["nv_client_adresse"] ?? "";
                $code_postal = $_POST["nv_client_cp"] ?? "";
                $ville = $_POST["nv_client_ville"] ?? "";
                $telephone = $_POST["nv_client_tel"] ?? "";
                $mail = $_POST["nv_client_mail"] ?? "";

                modifierLigneClient($idToEdit, [
                    "nom" => $nom,
                    "prenom" => $prenom,
                    "adresse" => $adresse,
                    "code_postal" => $code_postal,
                    "ville" => $ville,
                    "telephone" => $telephone,
                    "mail" => $mail,
                ]);

                $confirmation = "Informations client modifiées !";

                $tabLigne = lireTable("clients");
            }      

        }

        if($typeAction == "delete") {

            /* SUPPRESSION D'UN CLIENT */

            $idToDelete = $_POST['idToDelete'] ?? "";

            if($idToDelete != "") {
                supprimerLigne("clients", $idToDelete);

                $confirmation = "Element supprimé avec succès.";

                $tabLigne = lireTable("clients");
            }

        }
    }
?>