<?php
require_once'fonctions.php';


if (!isset($_POST['nom']))
{
	$token=chaine_aleatoire(25);
	?>
	<form method="post" action="accueil.php?page=inscription">
	<label for="type">Type de compte:</label><br>
	<select class="w3-input w3-border" name="type">
		<option value="PROFESSEUR">Professeur</option>
		<option value="GESTIONNAIRE">Gestionnaire</option>
		<option value="ADMINISTRATEUR">Administrateur</option>
	</select><br>
	<label for="nom">Nom:</label><br>
	<input type="text" name="nom" required><br><br>
	<label for="prenom">Prénom:</label><br>
	<input type="text" name="prenom" required><br><br>
	<label for="mail">E-mail:</label><br>
	<input type="email" name="mail" required><br><br>
	<label for="login">Login:</label><br>
	<input type="text" name="login" required><br><br>
	<label for="mdp">Mot de passe:</label><br>
	<input type="password" name="mdp" oncopy="return false;" oncut="return false;" required><br><br>
	<label for="vmdp">Vérification Mot de passe:</label><br>
	<input type="password" name="vmdp" onpaste="return false;" required><br><br>
	<input type="hidden" name="token" value="<?php echo $token; ?>">
	<input type="submit" value="S'inscrire"/>
	</form><br><br>
	
	<?php
}

if (isset($_POST['nom']))
{
	if ($_POST['mdp']!=$_POST['vmdp'])
	{
		echo 'les mot de passe saisis ne correspondent pas,';
		
		
	}	
	
	else 
	{
		$type='PROFESSEUR';
		$insert=$sql->prepare('INSERT INTO users( Nom, Prenom, Mail, Type, Login, Password, Verifmail)
		VALUES (:nom, :prenom, :mail, :type, :login, :mdp, :token)');
		$insert->execute(array(
			'nom' => $_POST['nom'],
			'prenom' => $_POST['prenom'],
			'mail' => $_POST['mail'],
			'type' => $_POST['type'],
			'login' => $_POST['login'],
			'mdp'=>$_POST['mdp'],
			'token' => $_POST['token']
		));
		
		
		
		
	}
}
?>

