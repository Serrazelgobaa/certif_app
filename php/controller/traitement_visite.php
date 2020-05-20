<?php
    if($typeAction != "") {

        if($typeAction == "create") {

            /* AJOUT D'UNE NOUVELLE VISITE */

            $client = $_POST["quel_client"] ?? "";
            $date = $_POST["nv_visite_date"] ?? "";
            $heure = $_POST["nv_visite_heure"] ?? "";

            insererLigneVisite([
                "clients_id" => $client,
                "date" => $date,
                "heure" => $heure,
                "prix_total" => 0,
                "payee" => 0,
                "effectuee" => 0,
            ]);

            $confirmation = "Votre nouvelle visite a été ajoutée ! Modifiez-la pour y ajouter des prestations";

            $tabLigne = lireTableVisites(false);

            $listePrestas = [];

        }

        if($typeAction == "update") {

            /* MODIFICATION D'UNE VISITE EXISTANTE */

            $idToEdit = $_POST["idToEdit"] ?? "";

            if($idToEdit != "") {
                $effectuee = $_POST['effectuee'] ?? "";
                $payee = $_POST['payee'] ?? "";
                $infoPrestas = $_POST['infoPresta'] ?? [];
                $prix_total = $_POST['prix_total'] ?? "0";

                if($effectuee != "") {
                    $effectuee = 1;
                }

                else {
                    $effectuee = 0;
                }

                if($payee != "") {
                    $payee = 1;
                }

                else {
                    $payee = 0;
                }

                $date = $_POST['edit_visite_date'] ?? "";
                $heure = $_POST['edit_visite_heure'] ?? "";
                $client_id = $_POST['quel_client'] ?? "";

                modifierLigneVisite($idToEdit, [
                    "payee" => $payee,
                    "effectuee" => $effectuee,
                    "date" => $date,
                    "heure" => $heure,
                    "clients_id" => $client_id,
                    "prix_total" => $prix_total,
                ]);

                supprimerLigneLiaison($idToEdit);

                foreach($infoPrestas as $key => $info) {
                    if($info == "true") {
                        insererLigneLiaison([
                            "prestations_id" => $key,
                            "visites_id" => $idToEdit,
                        ]);
                    }
                }

                $confirmation = "Visite modifiée !";

                $tabLigne = lireTableVisites(false);

                $listePrestas = [];

            }

        }

        if($typeAction == "delete") {

            /* SUPPRESSION D'UNE VISITE */

            $idToDelete = $_POST['idToDelete'] ?? "";

            if($idToDelete != "") {
                supprimerLigne("visites", $idToDelete);

                $confirmation = "Element supprimé avec succès.";

                $tabLigne = lireTableVisites(false);

                $listePrestas = [];

            }
        }

        foreach($tabLigne as $visite) {
            $id = $visite['id'];
            $tableauPresta = [];
            $tabPrestas = lirePrestasDansVisites($id);

            foreach($tabPrestas as $presta) {
                $prestaNom = $presta["nom_presta"];
                $prestaPrix = $presta["prix_presta"];
                $tableauPresta[] = $prestaNom;
            }

            $listePrestas+= [$id => $tableauPresta];
        }
    }
?>