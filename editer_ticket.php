<?php
require_once'fonctions.php';
require 'authentification_verification.php'; // Page authentifiee
if (!isset($_POST['commentaire']))
{
	echo '<h1> Modifier le Ticket n°'.$_GET['id'].' </h1>';
	echo'<br><br>';

/******************************************************
Rappel du ticket traité
******************************************************/
	echo '<h2> Récapitulatif </h2>';
	$response = $sql->query('SELECT * from ticket WHERE idTicket='.$_GET['id'].'');
	
	echo '<table>';
	echo '<tr><th>n°</th>
	<th>Ouverture</th>
	<th>Nom</th>
	<th>Salle</th>
	<th>Priorité</th>
	<th>Type</th>
	<th>Description</th>
	<th>Commentaire</th>
	<th>Statut</th>
	<th>Fermeture</th>
	<th>Note Administrateur</th></tr>';

	while ($donnees = $response->fetch())
	{
		echo '<tr>';
		echo '<td>'.$donnees['idTicket'].'</td>';
		echo '<td>'.$donnees['DateCreation'].'</td>';
		echo '<td>'.$donnees['Nom'].'</td>';
		echo '<td>'.$donnees['Salle'].'</td>';
		echo '<td>'.$donnees['Priorite'].'</td>';
		echo '<td>'.$donnees['Type'].'</td>';
		echo '<td>'.$donnees['Description'].'</td>';
		echo '<td>'.$donnees['Commentaire'].'</td>';
		echo '<td>'.$donnees['Statut'].'</td>';
		echo '<td>'.$donnees['DateFermeture'].'</td>';
		$commentaire=$donnees['Commentaire'];
		$note=$donnees['Note'];
		echo '<td>'.$note.'</td></tr>';
	}
	echo '</table><br><br>';

/******************************************************
Forumulaire
******************************************************/

	echo '<h2> Modifications </h2>';
	echo '<form method="post" action="accueil.php?page=editer_ticket">	
	<label for="commentaire">Commentaire:</label><br>
	<textarea name="commentaire" row="12" cols="45">
	'.$commentaire.'
	</textarea><br>
	<label for="note">Note Administrateur:</label><br>
	<textarea name="note" row="12" cols="45">
	'.$note.'
	</textarea><br>
	<label for="statut">Cochez pour cloturer le ticket.</label><input type="checkbox" name="statut" id="statut"/><br><br>
	<input type="hidden" name="id" value="'.$_GET['id'].'"/>
	<input type="submit" value="Mettre à jour"/>
	</form><br><br>';
}



/******************************************************
Mise à jour du ticket
******************************************************/

if (isset($_POST['commentaire']))
{
	$commentaire=$_POST['commentaire'];
	$note=$_POST['note'];
	$id=$_POST['id'];
	if (isset($_POST['statut'])=="on")
	{
		$statut='Clos';
		$req = $sql->prepare('UPDATE ticket SET Commentaire = :commentaire, Statut = :statut, DateFermeture = :dateend, Note = :note WHERE idTicket = :id');
		$req->execute(array(
			'commentaire' => $commentaire,
			'statut' => $statut,
			'dateend' => date('Y-m-d'),
			'note' => $note,
			'id' => $id
			));
	}
	else
	{
		$statut='En cours';
		$req = $sql->prepare('UPDATE ticket SET Commentaire = :commentaire, Statut = :statut, Note = :note WHERE idTicket = :id');
		$req->execute(array(
			'commentaire' => $commentaire,
			'statut' => $statut,
			'note' => $note,
			'id' => $id
			));
	}
	

	

}
?>

