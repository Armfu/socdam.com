<?php
require_once("init.php");
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if(!internauteEstConnecte()) 
{
	header("location:connexion.php");
}
$contenu .= '<p class="centre">Bonjour <strong>' . $_SESSION['membre']['pseudo'] . '</strong></p>'; // exercice: tenter d'afficher le pseudo de l'internaute pour lui dire Bonjour.
$contenu .= '<div class="cadre"><h2> Voici vos informations de profil </h2>';
$contenu .= '<p> votre email est: ' . $_SESSION['membre']['email'] . '<br>';
$contenu .= 'votre ville est: ' . $_SESSION['membre']['ville'] . '<br>';
$contenu .= 'votre adresse est: ' . $_SESSION['membre']['adresse'] . '</p></div><br /><br />';
	
//--------------------------------- AFFICHAGE HTML ---------------------------------//
require_once("inc/haut.php");
echo $contenu;
require_once("bas.inc.php");