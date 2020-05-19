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

// FONCTIONS DE LECTURE

    function lireTable($nomTable) {
        $requete = 
        <<<CODESQL
            SELECT * FROM $nomTable ORDER BY id
        CODESQL;

        $resultat = envoyerRequeteSQL($requete, []);

        $tabLigne = $resultat->fetchAll(PDO::FETCH_ASSOC);

        return $tabLigne;
    }

    function lireLigne($table,$id) {
        $requete =
        <<<CODESQL
            SELECT * FROM $table WHERE id=$id
        CODESQL;

        $resultat = envoyerRequeteSQL($requete, []);

        $tabLigne = $resultat->fetchAll(PDO::FETCH_ASSOC);

        return $tabLigne;
    }

    function lireLigneVisite($id) {
        $requete = 
        <<<CODESQL
            SELECT visites.*, clients.nom AS client_nom, clients.prenom AS client_prenom FROM visites INNER JOIN clients ON visites.clients_id=clients.id AND visites.id=$id
        CODESQL;

        $resultat = envoyerRequeteSQL($requete, []);

        $tabLigne = $resultat->fetchAll(PDO::FETCH_ASSOC);

        return $tabLigne;
    }
    
    function lireTableVisites($limite) {
        if($limite == true) {
            $requete =
            <<<CODESQL
                SELECT visites.*, DAY(date) as jour, MONTH(date) as mois, YEAR(date) as annee, HOUR(heure) as heure, MINUTE(heure) as minute, clients.nom AS client_nom, clients.prenom AS client_prenom FROM visites INNER JOIN clients ON visites.clients_id=clients.id LIMIT 4
            CODESQL;
        }

        else {
            $requete =
            <<<CODESQL
                SELECT visites.*, DAY(date) as jour, MONTH(date) as mois, YEAR(date) as annee, HOUR(heure) as heure, MINUTE(heure) as minute, clients.nom AS client_nom, clients.prenom AS client_prenom FROM visites INNER JOIN clients ON visites.clients_id=clients.id ORDER BY id DESC
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
        SELECT visites.*, DAY(date) as jour, MONTH(date) as mois, YEAR(date) as annee, HOUR(heure) as heure, MINUTE(heure) as minute, clients.nom AS client_nom, clients.prenom AS client_prenom FROM visites INNER JOIN clients ON visites.clients_id=clients.id WHERE payee=0 LIMIT 4
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

// FONCTIONS D'ECRITURE

    function insererLignePresta($tabAssoPrestas) {
        $requete =
        <<<CODESQL
            INSERT INTO prestations (nom,description,prix) VALUES (:nom,:description,:prix)
        CODESQL;

        $resultat = envoyerRequeteSQL($requete,$tabAssoPrestas);
    }

    function insererLigneClient($tabAssoClients) {
        $requete =
        <<<CODESQL
            INSERT INTO clients (nom,prenom,adresse,telephone,code_postal,ville,mail) VALUES (:nom,:prenom,:adresse,:telephone,:code_postal,:ville,:mail)
        CODESQL;

        $resultat = envoyerRequeteSQL($requete,$tabAssoClients);
    }

    function insererLigneVisite($tabAssoVisite) {
        $requete =
        <<<CODESQL
            INSERT INTO visites (date,heure,clients_id,prix_total,payee,effectuee) VALUES (:date,:heure,:clients_id,:prix_total,:payee,:effectuee)
        CODESQL;

        $resultat = envoyerRequeteSQL($requete,$tabAssoVisite);
    }

// FONCTIONS DE SUPPRESSION

    function supprimerLigne($table,$id) {
        $requete =
        <<<CODESQL
            DELETE FROM $table WHERE id=$id
        CODESQL;

        $resultat = envoyerRequeteSQL($requete,[]);
    }

// FONCTIONS DE MODIFICATION

    function modifierLignePresta($id, $tabAssoPrestas) {
        $requete =
        <<<CODESQL
            UPDATE prestations SET nom = :nom, description = :description, prix = :prix WHERE id=$id
        CODESQL;

        $resultat = envoyerRequeteSQL($requete,$tabAssoPrestas);
    }

    function modifierLigneClient($id, $tabAssoClients) {
        $requete =
        <<<CODESQL
            UPDATE clients SET nom = :nom, prenom = :prenom, adresse = :adresse, code_postal = :code_postal, ville = :ville, telephone = :telephone, mail = :mail WHERE id=$id
        CODESQL;

        $resultat = envoyerRequeteSQL($requete,$tabAssoClients);
    }

    function modifierLigneVisite($id, $tabAssoVisites) {
        $requete =
        <<<CODESQL
            UPDATE visites SET payee = :payee, effectuee = :effectuee, date = :date, clients_id = :clients_id, heure = :heure WHERE id=$id
        CODESQL;

        $resultat = envoyerRequeteSQL($requete, $tabAssoVisites);
    }

?>

