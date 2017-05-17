<?php
/*******INCLUDES*******/
// include version du 23-10-2015


/** Authentification des utilisateurs **/ 
// require '/homepages/29/d354276535/htdocs/_comptes_informatiques/includes/autoadmin.php';//Identification automatique en admin + mode debug
// require '/homepages/29/d354276535/htdocs/_comptes_informatiques/includes/authentification_verification.php'; // Page authentifiee
//** appel des fonctions **/
require_once 'fonctions.php'; // fonctions personnalisées.
/** Acces a la base de donnees **/
/*******INCLUDES*******/
?>
<?php
// Definition des constantes et variables
$MessageErreur = '';
// Test de l'envoi du formulaire
if(!empty($_POST)) 
{
	// Les identifiants login et mdp sont transmis ?
    if(!empty($_POST['login']) && !empty($_POST['mdp'])) 
    {
		// traitement injection SQL
		$LoginSaisi=VerifChamps($_POST['login']);
		//calcul du MD5 du mot de passe saisi
		$Md5MdpSaisi=$_POST['mdp'];
		// Verifions qu'il existe un couple d'identifiants (Login/Mdp) correspondant en BDD
	  	$req = $sql->prepare('SELECT * FROM users WHERE Login = ? AND Password = ?'); 	// preparation
		$req->execute(array($LoginSaisi,$Md5MdpSaisi));											//on execute la requete pour le couple login/mdp
		$lignes = $req->fetchAll(); 															//$lignes contient les resultats sous forme d'un tableau.
		$nb_ligne = count($lignes); 															//$nb_ligne contient le nombres de lignes résultats  (0 = pas de resultat 1= un compte trouvé 2 = !!!!!)
		if ($nb_ligne!=1)
		{
		$MessageErreur = 'identifiants incorrects!';
		} else {
			// On ouvre la session
			session_start();
			// On enregistre les variables de session 
			foreach($lignes as $ligne)
			{
				$_SESSION['nom']=$ligne['Nom'];
				$_SESSION['prenom']=$ligne['Prenom'];
				$_SESSION['email']=$ligne['Mail'];
				$_SESSION['type']=$ligne['Type'];
				$_SESSION['login']=$ligne['Login'];
			}
			// On redirige vers l'interface "utilisateurs".
			redirection('accueil.php');
		}
		
		
	}
} else {
      $MessageErreur = '';
    }
?>
<!DOCTYPE>
<html>
  <head>
    <title>Formulaire d'authentification</title>
  </head>
  <body>
	<h4>Bienvenur sur l'application de maintenance du parc informatique du lycée Jean-Monnet</h4><br>
	<h6>Veuillez vous authentififer pour accéder aux fonctionnalités</h6>
    <form action="accueil.php?page=login" method="post">
        <?php
          // Rencontre-t-on une erreur ?
          if(!empty($MessageErreur)) 
          {
            echo '<p class="w3-red">', htmlspecialchars($MessageErreur) ,'</p>';
          }
        ?>
          <label for="login">Utilisateur :</label><br>
          <input type="text" name="login" id="login" value="" size="30" maxlength="30"/>
		  <br>
          <label for="mdp">mdp :</label> <br>
          <input type="password" name="mdp" id="mdp" value="" size="30" maxlength="30"/> 
          <br><br>
		  <input type="submit" name="submit" value="Se connecter" />
     
    </form><br>
	<form method="post" action="accueil.php?page=inscription">
<button class="w3-button w3-block color-blue">Inscription</button>
</form>
  </body>
</html>