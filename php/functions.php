<?php

    //Fonction pour se connecter à la base de données

    function creerConnexionBDD() {
        // Définition des paramètres de connexion
        $dbInfo = 'mysql:dbname=stage_app;host=localhost;charset=utf8mb4';
        $user = 'root';
        $pwd = '';

        $connexion = new PDO($dbInfo, $user, $pwd);

        return $connexion;
    }

    //Fonction pour envoyer une requête SQL

    function envoyerRequeteSQL($requete, $arrayValeurs) {
        $connexion = creerConnexionBDD();

        $resultat = $connexion->prepare($requete);

        $resultat->execute($arrayValeurs);

        return $resultat;
    }

    //Fonction pour traiter une requête SQL de lecture classique en plaçant les données de la table dans une array

    function lireTable($nomTable) {
        $requete = 
        <<<CODESQL
            SELECT * FROM $nomTable ORDER BY id
        CODESQL;

        $resultat = envoyerRequeteSQL($requete, []);

        $tabLigne = $resultat->fetchAll(PDO::FETCH_ASSOC);

        return $tabLigne;
    }

    /*La fonction lireTable est trop basique pour permettre des nuances telles que des jointures, je crée donc des fonctions
    spécifiques pour les cas particuliers*/
    
    function lireTableVisites($limite) {
        if($limite == true) {
            $requete =
            <<<CODESQL
                SELECT visites.*, clients.nom AS client_nom, clients.prenom AS client_prenom FROM visites INNER JOIN clients ON visites.clients_id=clients.id LIMIT 4
            CODESQL;
        }

        else {
            $requete =
            <<<CODESQL
                SELECT visites.*, clients.nom AS client_nom, clients.prenom AS client_prenom FROM visites INNER JOIN clients ON visites.clients_id=clients.id
            CODESQL;
        }

        $resultat = envoyerRequeteSQL($requete, []);

        $tabLigne = $resultat->fetchAll(PDO::FETCH_ASSOC);

        return $tabLigne;
    }

    function lirePrestasDansVisites($visite_id) {
        $requete = 
        <<<CODESQL
            SELECT visites_prestations.*, prestations.nom AS nom_presta FROM visites_prestations INNER JOIN prestations ON visites_prestations.prestations_id=prestations.id WHERE visites_id=$visite_id
        CODESQL;

        $resultat = envoyerRequeteSQL($requete, []);

        $tabLigne = $resultat->fetchAll(PDO::FETCH_ASSOC);

        return $tabLigne;
    }

    function lireImpayes() {
        $requete =
        <<<CODESQL
        SELECT visites.*, clients.nom AS client_nom, clients.prenom AS client_prenom FROM visites INNER JOIN clients ON visites.clients_id=clients.id WHERE payee=0 LIMIT 4
        CODESQL;

        $resultat = envoyerRequeteSQL($requete, []);

        $tabLigne = $resultat->fetchAll(PDO::FETCH_ASSOC);

        return $tabLigne;
    }

    function afficherProfilClient($id_client) {
        $requete =
        <<<CODESQL
            SELECT * FROM clients WHERE id=$id_client
        CODESQL;

        $resultat = envoyerRequeteSQL($requete, []);

        $tabLigne = $resultat->fetchAll(PDO::FETCH_ASSOC);

        return $tabLigne;
    }

    function insererLignePresta($tabAssoPrestas) {
        $requete =
        <<<CODESQL
            INSERT INTO prestations (nom,description,prix) VALUES (:nom,:description,:prix)
        CODESQL;

        $resultat = envoyerRequeteSQL($requete,$tabAssoPrestas);
    }

?>

