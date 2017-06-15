<?php
require_once'fonctions.php';
require 'authentification_verification.php'; // Page authentifiee

/******************************************************
Créer le tableau des tickets
******************************************************/
?>
<form method="post" action="accueil.php?page=creation_ticket">
<button class="w3-button w3-lef-align color-blue">Effectuer un signalement</button>
</form>
<h1> Lister les tickets </h1>
<?php
$response = $sql->query('SELECT * from ticket ORDER BY Statut DESC, DateCreation DESC');

if ($_SESSION['type']=="ADMINISTRATEUR")
{
	echo '<table class="w3-table w3-centered">';
	echo '<tr><th>Ouverture</th>
	<th>Nom</th>
	<th>Salle</th>
	<th>Priorité</th>
	<th>Type</th>
	<th>Description</th>
	<th>Commentaire</th>
	<th>Statut</th>
	<th>Fermeture</th>
	<th></th></tr>';
	while ($donnees = $response->fetch())
	{
		if ($donnees['Statut']=="Nouveau")
		{
			$classe="color-new";
		}
		else if ($donnees['Statut']=="En cours")
		{
			$classe="color-working";
		}
		else if ($donnees['Statut']=="Clos")
		{
			$classe="w3-light-grey";
		}
		
		echo '<tr class="'.$classe.'">';
		echo '<td>'.affDate($donnees['DateCreation']).'</td>';
		echo '<td>'.$donnees['Nom'].'</td>';
		echo '<td>'.$donnees['Salle'].'</td>';
		echo '<td>'.$donnees['Priorite'].'</td>';
		echo '<td>'.$donnees['Type'].'</td>';
		echo '<td>'.$donnees['Description'].'</td>';
		echo '<td>'.$donnees['Commentaire'].'</td>';
		echo '<td>'.$donnees['Statut'].'</td>';
		echo '<td>'.affDate($donnees['DateFermeture']).'</td>';
		echo '<td><a href="accueil.php?page=editer_ticket&amp;id='.$donnees['idTicket'].'">Modifier</a></td></tr>';
	}
	echo '</table><br><br>';
}
else
{
	echo '<table class="w3-table w3-centered">';
	echo '<tr>
	<th>Ouverture</th>
	<th>Nom</th>
	<th>Salle</th>
	<th>Priorité</th>
	<th>Type</th>
	<th>Description</th>
	<th>Commentaire</th>
	<th>Statut</th>
	<th>Fermeture</th></tr>';
	while ($donnees = $response->fetch())
	{
		if ($donnees['Statut']=="Nouveau")
		{
			$classe="color-new";
		}
		else if ($donnees['Statut']=="En cours")
		{
			$classe="color-working";
		}
		else if ($donnees['Statut']=="Clos")
		{
			$classe="w3-light-grey";
		}
		echo '<tr class="'.$classe.'">';
		echo '<td>'.affDate($donnees['DateCreation']).'</td>';
		echo '<td>'.$donnees['Nom'].'</td>';
		echo '<td>'.$donnees['Salle'].'</td>';
		echo '<td>'.$donnees['Priorite'].'</td>';
		echo '<td>'.$donnees['Type'].'</td>';
		echo '<td>'.$donnees['Description'].'</td>';
		echo '<td>'.$donnees['Commentaire'].'</td>';
		echo '<td>'.$donnees['Statut'].'</td>';
		echo '<td>'.affDate($donnees['DateFermeture']).'</td></tr>';
	}
	echo '</table><br><br>';
}

if (isset($_SESSION['nom']))
{
	?>
	<h1> Vos tickets </h1>
	<?php
	$response = $sql->query('SELECT * from ticket WHERE Nom= \''.$_SESSION['nom'].'\'ORDER BY Statut DESC, DateCreation DESC');
	if ($response)
	{
		
		echo '<table class="w3-table w3-centered">';
		echo '<tr>
		<th>Ouverture</th>
		<th>Nom</th>
		<th>Salle</th>
		<th>Priorité</th>
		<th>Type</th>
		<th>Description</th>
		<th>Commentaire</th>
		<th>Statut</th>
		<th>Fermeture</th></tr>';
		while ($donnees = $response->fetch())
		{
			if ($donnees['Statut']=="Nouveau")
			{
				$classe="color-new";
			}
			else if ($donnees['Statut']=="En cours")
			{
				$classe="color-working";
			}
			else if ($donnees['Statut']=="Clos")
			{
				$classe="w3-light-grey";
			}
			echo '<tr class="'.$classe.'">';
			echo '<td>'.affDate($donnees['DateCreation']).'</td>';
			echo '<td>'.$donnees['Nom'].'</td>';
			echo '<td>'.$donnees['Salle'].'</td>';
			echo '<td>'.$donnees['Priorite'].'</td>';
			echo '<td>'.$donnees['Type'].'</td>';
			echo '<td>'.$donnees['Description'].'</td>';
			echo '<td>'.$donnees['Commentaire'].'</td>';
			echo '<td>'.$donnees['Statut'].'</td>';
			echo '<td>'.affDate($donnees['DateFermeture']).'</td></tr>';
		}
		echo '</table><br><br>';
	}
	else
	{
		?>
		<p> vous n'avez pas de tickets affectés</p>
		<?php
	}
}
?>