<?php
require_once 'fonctions.php';
//session_start();
if(!isset($_SESSION['login'])) 
{
	// pas de session initialisée, retour à la page authentification
	sleep(2);
	$url = 'accueil.php?page=login';
	$url = html_entity_decode($url);
	header('Location: '.$url);
	exit();
}
?>