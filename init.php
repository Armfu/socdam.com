<?php
//---------BDD
$mysqli= new mysqli("localhost","root","","registre");
if ($mysqli->connect_error) die('Un problème est survenu lors de la tentative de connexion à la BDD : ' . $mysqli->connect_error);
	//------$mysqli set_charset("utf-8");

//------SESSION
session_start();

//------chemin
define("RACINE_SITE","/SitePh/");

//-------VARIABLE
$contenu= '';
//------AUTRES INCLUSION
require_once("fonction.php");
?>