<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"> 
	<meta name="viewport" content="width=device-width, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
	<title><?php echo $page_title ?></title>
</head>
<body>

	<header>
        <nav>
			<div id="align-left">
				<img id="btn_burger" src="./assets/images/menu_hamburger.png" height="36px" width="36px">
				<a href="#"><img src="./assets/images/logo-blanc.png" height="30px" width="45px"></a>

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
		<h1>PapyNum</h1>
		<p>Cette application permet de gérer des visites à domicile de clients en demande d’apprentissage numérique.</p>
    </header>

    <?php 
        require "menu_burger.php";
    ?>

	<div id="bande_icones">
		<a href="./prestations.php"><div class="icon_container">
			<img src="./assets/images/build.png" height="52px" width="52px">
			<p>Gérer les prestations</p>
		</div></a>
		<a href="./clients.php"><div class="icon_container">
			<img src="./assets/images/people.png" height="52px" width="76px">
			<p>Gérer les clients</p>
		</div></a>
	</div>
    <main>