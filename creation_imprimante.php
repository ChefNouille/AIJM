<?php
require_once'fonctions.php';
require 'authentification_verification.php'; // Page authentifiee

echo"<h1>Ajout d'une nouvelle imprimante</h1>";


/******************************************************
Etape 1:
Définir la marque, le modèle, le type et le nombre
******************************************************/
if (!isset($_POST['etape']))
{
	echo 'Etape 1:
	<form method="post" action="accueil.php?page=creation_imprimante">
	<label for="marque">Marque:</label><br>
	<input class="w3-input w3-border" type="text" name="marque"><br>
	<label for="modele">Modele:</label><br>
	<input class="w3-input w3-border" type="text" name="modele"><br>
	<label for="type">Type:</label><br>
	<select class="w3-input w3-border" name="type">
		<option value="NOIR">Noir</option>
		<option value="TROISCOULEURS">Noir+Couleurs( 1 cartouche)</option>
		<option value="COULEURS">Noir+Couleurs (3 cartouches)</option>
	</select><br>
	<label for="nombre">Nombre:</label><br>
	<input class="w3-input w3-border" type="number" name="nombre"><br>
	<input type="hidden" name="etape" value="2">
	<input type="submit" value="Etape 2">';
}
/******************************************************
Etape 2:
Référencement des consommables (ref+stock)
******************************************************/
if (isset($_POST['etape']) && $_POST['etape']=="2")
{	
	//$nom=str_replace(' ','&sp;',$_POST['nom']);
	if ($_POST['type']=="NOIR")
	{
		
		echo 'Etape 2:
		<form method="post" action="accueil.php?page=creation_imprimante">
		<label for="ref">Reference noir:</label><br>
		<input type="text" name="refnoir"><br>
		<label for="stock">Stocks noir:</label><br>
		<input type="number" name="stocknoir"><br>
		<input type="hidden" name="etape" value="3">
		<input type="hidden" name="type" value="NOIR">
		<input type="hidden" name="modele" value='.$_POST['modele'].'>
		<input type="hidden" name="nombre" value='.$_POST['nombre'].'>
		<input type="hidden" name="marque" value='.$_POST['marque'].'>
		<input type="submit" value="Créer">';
	}
	if ($_POST['type']=="TROISCOULEURS")
	{
		echo 'Etape 2:
		<form method="post" action="accueil.php?page=creation_imprimante">
		<label for="ref">Reference noir:</label><br>
		<input type="text" name="refnoir"><br>
		<label for="stock">Stocks noir:</label><br>
		<input type="number" name="stocknoir"><br>
		<label for="ref">Reference trois couleurs:</label><br>
		<input type="text" name="reftrois"><br>
		<label for="stock">Stocks trois couleurs:</label><br>
		<input type="number" name="stocktrois"><br>
		<input type="hidden" name="etape" value="3">
		<input type="hidden" name="type" value="TROISCOULEURS">
		<input type="hidden" name="modele" value='.$_POST['modele'].'>
		<input type="hidden" name="nombre" value='.$_POST['nombre'].'>
		<input type="hidden" name="marque" value='.$_POST['marque'].'>
		<input type="submit" value="Créer">';
	}
	if ($_POST['type']=="COULEURS")
	{
		echo 'Etape 2:
		<form method="post" action="accueil.php?page=creation_imprimante">
		<label for="ref">Reference noir:</label><br>
		<input type="text" name="refnoir"><br>
		<label for="stock">Stocks noir:</label><br>
		<input type="number" name="stocknoir"><br>
		<label for="ref">Reference magenta:</label><br>
		<input type="text" name="refmagenta"><br>
		<label for="stock">Stocks magenta:</label><br>
		<input type="number" name="stockmagenta"><br>
		<label for="ref">Reference jaune:</label><br>
		<input type="text" name="refjaune"><br>
		<label for="stock">Stocks jaune:</label><br>
		<input type="number" name="stockjaune"><br>
		<label for="ref">Reference cyan:</label><br>
		<input type="text" name="refcyan"><br>
		<label for="stock">Stocks cyan:</label><br>
		<input type="number" name="stockcyan"><br>
		<input type="hidden" name="etape" value="3">
		<input type="hidden" name="type" value="COULEURS">
		<input type="hidden" name="modele" value='.$_POST['modele'].'>
		<input type="hidden" name="nombre" value='.$_POST['nombre'].'>
		<input type="hidden" name="marque" value='.$_POST['marque'].'>
		<input type="submit" value="Créer">';
	}
}

/******************************************************
Etape 3:
Inscription du nouveau modèle dans la table imprimantes
+ Renseignement Nom et salle pour la table imp_salles
******************************************************/
if (isset($_POST['etape']) && $_POST['etape']=="3")
{
	
	//$nom=str_replace('&sp;',' ',$_POST['nom']);
	if ($_POST['type']=="COULEURS")
	{
		$insert=$sql->prepare('INSERT INTO imprimante( Marque, Modele, Type, Nombre, RefNoir, RefMagenta, RefJaune, RefCyan, QuantNoir, QuantMagenta, QuantJaune, QuantCyan) 
		VALUES (:marque, :modele, :type, :nombre, :refnoir, :refmagenta, :refjaune, :refcyan, :stocknoir, :stockmagenta, :stockjaune, :stockcyan)');
		$insert->execute(array(
			'marque' => $_POST['marque'],
			'modele' => $_POST['modele'],
			'type' => $_POST['type'],
			'nombre' => $_POST['nombre'],
			'refnoir' => $_POST['refnoir'],
			'refmagenta'=>$_POST['refmagenta'],
			'refjaune' => $_POST['refjaune'],
			'refcyan' => $_POST['refcyan'],
			'stocknoir' => $_POST['stocknoir'],
			'stockmagenta' => $_POST['stockmagenta'],
			'stockjaune' => $_POST['stockjaune'],
			'stockcyan' => $_POST['stockcyan']
		));
	}
	
	if ($_POST['type']=="NOIR")
	{
		
		$insert=$sql->prepare('INSERT INTO imprimante( Marque, Modele, Type, Nombre, RefNoir, QuantNoir) 
		VALUES (:marque, :modele, :type, :nombre, :refnoir, :stocknoir)');
		$insert->execute(array(
			'marque' => $_POST['marque'],
			'modele' => $_POST['modele'],
			'type' => $_POST['type'],
			'nombre' => $_POST['nombre'],
			'refnoir' => $_POST['refnoir'],
			'stocknoir' => $_POST['stocknoir']
		));
	}
	
	if ($_POST['type']=="TROISCOULEURS")
	{
		$insert=$sql->prepare('INSERT INTO imprimante( Marque, Modele, Type, Nombre, RefNoir, RefTroiscouleurs, QuantNoir, QuantTroiscouleurs) 
		VALUES (:marque, :modele, :type, :nombre, :refnoir, :reftrois, :stocknoir, :stocktrois)');
		$insert->execute(array(
			'marque' => $_POST['marque'],
			'modele' => $_POST['modele'],
			'type' => $_POST['type'],
			'nombre' => $_POST['nombre'],
			'refnoir' => $_POST['refnoir'],
			'reftrois'=>$_POST['reftrois'],
			'stocknoir' => $_POST['stocknoir'],
			'stocktrois' => $_POST['stocktrois']
		));
	}
	
	$nombre=$_POST['nombre'];
	echo 'Etape 3:<br>
	Veuillez renseigner le nom et la salle de chacune des '.$nombre.' imprimantes<br><br>';
	echo'<form method="post" action="accueil.php?page=creation_imprimante">';
	for ($i=1;$i<=$nombre;$i++)
	{
		echo 'Imprimante n°'.$i.'<br>';
		echo '<label for="nom'.$i.'">Nom:</label><br>
		<input type="text" name="nom'.$i.'"><br>
		<label for="salle'.$i.'">Salle:</label><br>
		<input type="text" name="salle'.$i.'"><br><br>';
	}
	echo '<input type="hidden" name="nombre" value='.$nombre.'>
	<input type="hidden" name="modele" value="'.$_POST['modele'].'">
	<input type="hidden" name="etape" value="4">
	<input type="submit" value="Créer">';	
}

if (isset($_POST['etape']) && $_POST['etape']=="4")
{
	$nombre=$_POST['nombre'];
	$response = $sql->query('SELECT IDPrinter from imprimantes WHERE Modele=\''.$_POST['modele'].'\'');
	while ($donnees = $response->fetch())
	{
		$id=$donnees['IDPrinter'];
	}
	for ($i=1;$i<=$nombre;$i++)
	{
		
		$insert=$sql->prepare('INSERT INTO imprimante_emplacement( imprimante_idimprimante, ImpNom, Salle) 
		VALUES (:idprinter, :nom, :salle)');
		$insert->execute(array(
			'idprinter' => $id,
			'nom' => $_POST['nom'.$i],
			'salle' => $_POST['salle'.$i]
		));
	}
}
?>