<?php
require_once'fonctions.php';
require 'authentification_verification.php'; // Page authentifiee

/******************************************************
Créer le tableau des imprimantes
******************************************************/
?>
<form method="post" action="accueil.php?page=creation_imprimante">
<button class="w3-button w3-lef-align color-blue">Ajouter un nouveau modèle</button>
</form>
<?php

echo '<h1> Lister les imprimantes </h1>';

$response = $sql->query('SELECT * from imprimante');


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
	echo '<td>'.$donnees['QuantNoir'].'</td>';
	echo '<td>'.$donnees['QuantTroiscouleurs'].'</td>';
	echo '<td>'.$donnees['QuantMagenta'].'</td>';
	echo '<td>'.$donnees['QuantJaune'].'</td>';
	echo '<td>'.$donnees['QuantCyan'].'</td>';
	echo '<td><a href="accueil.php?page=details_imprimante&amp;id='.$donnees['idImprimante'].'">Détails / Modifications</a></td></tr>';
}
echo '</table><br><br>';