<?php
require_once'fonctions.php';
require 'authentification_verification.php'; // Page authentifiee



if (isset($_POST['type'])=="NOIR")
	{
		$stocknoir=$_POST['stocknoir'];
		$id=$_POST['id'];
		$req = $sql->prepare('UPDATE imprimantes SET Stocknoir = :stocknoir WHERE IDPrinter = :id');
		$req->execute(array(
			'stocknoir' => $stocknoir,
			'id' => $id
			));
	}

if (isset($_POST['type'])=="TROISCOULEURS")
	{
		$stocknoir=$_POST['stocknoir'];
		$stocktroiscouleurs=$_POST['stocktroiscouleurs'];
		$id=$_POST['id'];
		$req = $sql->prepare('UPDATE imprimantes SET Stocknoir = :stocknoir, Stocktroiscouleurs = :stocktrois WHERE IDPrinter = :id');
		$req->execute(array(
			'stocknoir' => $stocknoir,
			'stocktrois' => $stocktroiscouleurs,
			'id' => $id
			));
	}
if (isset($_POST['type'])=="COULEURS")
	{
		$stocknoir=$_POST['stocknoir'];
		$stockmagenta=$_POST['stockmagenta'];
		$stockjaune=$_POST['stockjaune'];
		$stockcyan=$_POST['stockcyan'];
		$id=$_POST['id'];
		$req = $sql->prepare('UPDATE imprimantes SET Stocknoir = :stocknoir, Stockmagenta = :stockmagenta, Stockjaune = :stockjaune, Stockcyan = :stockcyan WHERE IDPrinter = :id');
		$req->execute(array(
			'stocknoir' => $stocknoir,
			'stockmagenta' => $stockmagenta,
			'stockjaune' => $stockjaune,
			'stockcyan' => $stockcyan,
			'id' => $id
			));
	}	
	

	
	
$url = 'acceuil.php?page=imprimantes';
$url = html_entity_decode($url);
header('Location: '.$url);
exit();
?>