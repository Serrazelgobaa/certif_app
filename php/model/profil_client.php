<?php
    require_once "php/functions.php";

    $reponse = afficherProfilClient($idProfil);

    /*foreach($tabLigne as $client) {

        $nom = $client["nom"];
        $prenom = $client["prenom"];
        $telephone = $client["telephone"];
        $mail = $client["mail"];
        $adresse = $client["adresse"];
        $code_postal = $client["code_postal"];
        $ville = $client["ville"];

        echo
        <<<CODEHTML
            <h2>$prenom $nom</h2>
            <div class="info_client" >
                <img src ="./assets/images/phone.png" width="40px" height="40px">
                <p>$telephone</p>
            </div>
            <div class="info_client">
                <img src ="./assets/images/mail.png" width="40px" height="40px">
                <p>$mail</p>
            </div>
            <div class="info_client">
                <img src ="./assets/images/home.png" width="40px" height="40px">
                <p>$adresse
                <br>$code_postal $ville</p>
            </div>
        CODEHTML;
    }*/
?>