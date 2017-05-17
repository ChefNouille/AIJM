<?php
require_once'fonctions.php';
require 'authentification_verification.php'; // Page authentifiee
/******************************************************
Forumulaire
******************************************************/
echo '<button><a href="acceuil.php?page=tickets">Retour</a></button>';
if (!isset($_POST['description']))
{
	echo '<h1> Créer un Ticket </h1>';
	echo '<form method="post" action="acceuil.php?page=creation_ticket">
	<label for="priorite">Priorité:</label><br><select name="priorite">
		<option value="Urgent">Urgent</option>
		<option value="Normal">Normal</option>
		<option value="Bloquant">Bloquant</option>
	</select><br>
	<label for="type">Type:</label><br>
	<select name="type">
		<option value="Materiel">Materiel</option>
		<option value="Logiciel">Logiciel</option>
		<option value="Reseau">Reseau</option>
	</select><br>
	<label for="salle">Salle:</label><br><input type="text" name="salle"/><br>
	<label for="description">Description:</label><br>
	<textarea name="description" placeholder="décrivez le problème..."></textarea><br>
	<input type="submit" value="Signaler"/>
	</form><br><br>';
}

/******************************************************
Enregistrement dans la base de données
******************************************************/
if (isset($_POST['description']))
{
	
	$insert=$sql->prepare('INSERT INTO tickets( Nom, Datecrea, Type, Priorite, Salle, Description, Commentaire, Statut) VALUES (:IDUser, :Datecrea, :Type, :Priorite, :Salle, :Description, :Commentaire, :Statut)');
	$insert->execute(array(
		'IDUser' => '2',
		'Datecrea' => date('Y-m-d'),
		'Type' => $_POST['type'],
		'Priorite' => $_POST['priorite'],
		'Salle'=> $_POST['salle'],
		'Description' => $_POST['description'],
		'Commentaire'=>'',
		'Statut' => 'Nouveau'
		));
		
	echo 'Votre signalement a bien était effectué';
}
?>