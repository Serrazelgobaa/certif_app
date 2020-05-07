<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"> 
	<meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
	<title><?php echo $page_title ?></title>
</head>
<?php
    if($page == "clients") {
        echo '<body class="grey" id="clients_page">';
    }

    else {
        echo '<body class="grey">';
    }
?>


    <nav id="tiny_bar">
        <div id="align-left">
            <img id="btn_burger" src="./assets/images/menu_hamburger.png" height="36px" width="36px">
            
            <a href="./index.php"><img src="./assets/images/logo-blanc.png" height="30px" width="45px"></a>

            <ul id="menu_nav">
                <a href="./clients.php"><li>Clients</li></a>
                <a href="./visites.php"><li>Visites</li></a>
                <a href="./prestations.php"><li>Prestations</li></a>
            </ul>
        </div>

        <div id="align-right">

            <ul id="login">
                <a href="#"><li>Connexion</li></a>
                <a href="#"><li id="btn_signup">Inscription</li></a>
            </ul>

            <img src="./assets/images/menu_profil.png" height="36px" width="36px" id="menu_profil">
        </div>
    </nav>

    <?php 
        require "menu_burger.php";
        require "modals.php";
    ?>