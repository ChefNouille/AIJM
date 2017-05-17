<?php
/*******INCLUDES*******/
// include version du 23-10-2015
//** Initiatilisation des constantes **/
//require '/homepages/29/d354276535/htdocs/_comptes_informatiques/includes/init.php';//Initialisation des variables
/** Authentification des utilisateurs **/ 
// require '/homepages/29/d354276535/htdocs/_comptes_informatiques/includes/autoadmin.php';//Identification automatique en admin + mode debug
// require '/homepages/29/d354276535/htdocs/_comptes_informatiques/includes/authentification_verification.php'; // Page authentifiee
//** appel des fonctions **/
require_once 'fonctions.php'; // fonctions personnalisées.
/** Acces a la base de donnees **/
//require '/homepages/29/d354276535/htdocs/_comptes_informatiques/includes/connexionPDO.php'; // Initialisation instance d'une classe PDO (base de données)
/*******INCLUDES*******/
?>
<?php
// Démarrage ou restauration de la session
session_start();
// On vide intégralement le tableau de session
$_SESSION = array();
// Destruction de la session
session_destroy();
// Destruction du tableau de session
unset($_SESSION);
// redirection vers la page d'authentification
redirection ("accueil.php?page=login");
die();
?>
	
