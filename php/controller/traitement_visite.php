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
            $stringPresta = "";
            $tabPrestas = lirePrestasDansVisites($id);

            foreach($tabPrestas as $presta) {
                $prestaNom = $presta["nom_presta"];
                $stringPresta .= " ".$prestaNom." |";
            }

            $listePrestas+= [$id => $stringPresta];
        }
    }
?>