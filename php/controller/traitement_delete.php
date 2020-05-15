<?php
    $deleteWhat = $_POST["deleteWhat"];
    $idToDelete = $_POST["idToDelete"];

    supprimerLigne($deleteWhat, $idToDelete);

    $confirmation = "Element supprimé avec succès.";

    $tabLigne = lireTable($deleteWhat);
?>