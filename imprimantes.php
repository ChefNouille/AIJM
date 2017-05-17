<?php
require_once'fonctions.php';
require 'authentification_verification.php'; // Page authentifiee

/******************************************************
Créer le tableau des imprimantes
******************************************************/
echo '<button><span><a href="accueil.php?page=creation_imprimante">Ajouter une nouvelle imprimante</a></span></button>';
echo '<h1> Lister les imprimantes </h1>';

$response = $sql->query('SELECT * from imprimantes');


echo '<table class="w3-table w3-centered">';
echo "<tr><th>Marque</th>
<th>Modele</th>
<th>Nombre d'imprimantes</th>
<th>Type</th>
<th>Noir</th>
<th>Trois-couleurs</th>
<th>Magenta</th>
<th>Jaune</th>
<th>Cyan</th>
<th></th></tr>";
while ($donnees = $response->fetch())
{
	echo '<tr>';
	echo '<td>'.$donnees['Marque'].'</td>';
	echo '<td>'.$donnees['Modele'].'</td>';
	echo '<td>'.$donnees['Nombre'].'</td>';
	echo '<td>'.$donnees['Type'].'</td>';
	echo '<td>'.$donnees['Stocknoir'].'</td>';
	echo '<td>'.$donnees['Stocktroiscouleurs'].'</td>';
	echo '<td>'.$donnees['Stockmagenta'].'</td>';
	echo '<td>'.$donnees['Stockjaune'].'</td>';
	echo '<td>'.$donnees['Stockcyan'].'</td>';
	echo '<td><a href="acceuil.php?page=details_imprimante&amp;id='.$donnees['IDPrinter'].'">Détails / Modifications</a></td></tr>';
}
echo '</table><br><br>';