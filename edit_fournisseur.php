<?php
require_once'fonctions.php';
require 'authentification_verification.php'; // Page authentifiee

if (!isset($_POST['nom']))
{
	$response = $sql->query('SELECT FournisseurNom, FournisseurTel, FournisseurMail, FournisseurUrl from imprimantes WHERE IDPRinter=\''.$_GET['id'].'\'');
	while ($donnees = $response->fetch())
	{
		
		$Fnom=$donnees['FournisseurNom'];
		$Ftel=$donnees['FournisseurTel'];
		$Fmail=$donnees['FournisseurMail'];
		$Furl=$donnees['FournisseurUrl'];
	
	}

	echo '<h2>Fournisseur:</h2>';
	echo '<form method="post" action="acceuil.php?page=edit_fournisseur"> 
	<label for="ref">Nom:</label><br>
	<input type="text" name="nom" value="'.$Fnom.'"><br>
	<label for="ref">Téléphone:</label><br>
	<input type="tel" name="tel" value="'.$Ftel.'"><br>
	<label for="ref">E-mail:</label><br>
	<input type="email" name="mail" value="'.$Fmail.'"><br>
	<label for="ref">Site web:</label><br>
	<input type="url" name="url" value="'.$Furl.'"><br> 
	<input type="hidden" name="id" value="'.$_GET['id'].'"/>
	<input type="submit" value="Mettre à jour"/>
	</form>';

	
}


if (isset($_POST['nom']))
{
	
	$req = $sql->prepare('UPDATE imprimantes SET FournisseurNom = :fnom, FournisseurTel = :ftel, FournisseurMail = :fmail, FournisseurUrl = :furl WHERE IDPrinter = :id');
	$req->execute(array(
	'fnom'=> $_POST['nom'],
	'ftel'=> $_POST['tel'],
	'fmail'=> $_POST['mail'],
	'furl'=> $_POST['url'],
	'id' => $_POST['id']
	));
	$url = 'acceuil.php?page=details_imprimante&amp;id='.$_POST['id'];
	$url = html_entity_decode($url);
	header('Location: '.$url);
	exit();
}	
?>

