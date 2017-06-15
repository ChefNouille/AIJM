<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
		<title>Gestion Informatique Jean Monnet</title>
	</head>	
	<body>
		<header>
			
			<h1> Maintenance Informatique Lycée Jean Monnet </h1>
			<img src="images/logo2.png" alt="Smiley face" height="90" width="143">
		</header>
		
		<nav>
		<?php 
		require'fonctions.php';
		if($jesuisun=="ADMINISTRATEUR")
		{
		?>
			<ul>
				<li><a href="acceuil.php">Accueil</a></li>
				<li><a href="acceuil.php?page=tickets">Tickets</a></li>
				<li><a href="acceuil.php?page=imprimantes">Imprimantes</a></li>
			</ul>
		<?php
		}
		elseif($jesuisun=="PROFESSEUR")
		{
		?>
			<ul>
				<li><a href="acceuil.php">Accueil</a></li>
				<li><a href="acceuil.php?page=tickets">Tickets</a></li>
			</ul>
		<?php
		}
		elseif($jesuisun=="GESTIONNAIRE")
		{
		?>
		
			<ul>
				<li><a href="acceuil.php">Accueil</a></li>
				<li><a href="acceuil.php?page=imprimantes">Imprimantes</a></li>
			</ul>
		<?php
		}
		?>		
		</nav>
		<div>
		<?php 
		if (!isset($_GET['page']))
		{
			include('tickets.php');
			include('imprimantes.php');
		}
		
		if (isset($_GET['page']))
		{
			include($_GET['page'].'.php');
		}
		
		?>
		</div>
		
	</body>
</html>	
