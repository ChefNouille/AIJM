<?php
/*******************************************************
Connection à la base de données
*******************************************************/
try
{
	$sql= new PDO('mysql:host=localhost;dbname=aijm;charset=utf8','root','');
}
catch (Exception $e)
{
	die ('Erreur: ' .$e->getMessage());
}

//$jesuisun='PROFESSEUR';
$jesuisun="ADMINISTRATEUR";
//$jesuisun="GESTIONNAIRE";

/**
 * présentation en gros
 *
 * Présentation plus
 *  en détail...
 *
 * @param xpos integer position horizontale
 * @param ypos integer etc.
 * @return float distance
 */
 // cf. PHPDoc (ou JavaDoc)

function chaine_aleatoire($nb_car)
{
    $chaine = 'aAzZeErRtTyYuUoOpPqQsSdDfFgGhHjJkKmMwWxXcCvVbBnN0123456789';
	$nb_lettres = strlen($chaine) - 1;
    $generation = '';
    for($i=0; $i < $nb_car; $i++)
    {
        $pos = mt_rand(0, $nb_lettres);
        $car = $chaine[$pos];
        $generation .= $car;
    }
    return $generation;
}



/***********************************
Protection injection SQL et XSS
************************************/
function VerifChamps($valeur)
{
	$verif = (get_magic_quotes_gpc()) ? htmlentities($valeur, ENT_QUOTES) :
	addslashes($valeur);
	return $verif;
}

/******************************
Fonction : redirection($url)
*******************************/
function redirection($url){
	$url = html_entity_decode($url);
    header('Location:'.$url);
	exit();
}

function affDate($date){
    $year = substr($date, 0, 4);
    $month = substr($date, 5, 2);
    $day = substr($date, 8, 2);
     
    $str = $day." ";
    if($month == 1) $str .= "Janvier";
    if($month == 2) $str .= "F&eacute;vrier";
    if($month == 3) $str .= "Mars";
    if($month == 4) $str .= "Avril";
    if($month == 5) $str .= "Mai";
    if($month == 6) $str .= "Juin";
    if($month == 7) $str .= "Juillet";
    if($month == 8) $str .= "Ao&ucirc;t";
    if($month == 9) $str .= "Septembre";
    if($month == 10) $str .= "Octobre";
    if($month == 11) $str .= "Novembre";
    if($month == 12) $str .= "D&eacute;cembre";
    $str .= " ".$year;
     
    return $str;
}


?>