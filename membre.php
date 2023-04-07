<?php
require_once("../inc/init.php");
if(!internauteEstConnecteEtEstAdmin())
{
	header("location:../connexion.php");
	exit();
}

if($_GET['msg'] && $_GET['msg']=="supok"){
	executeRequete("delete from membre where id_membre=$_GET[id_membre]");
	header("location:membre.php");
}
//----------------------------Affichage---------------------------------//
require_once("inc/haut.php");
echo'<h1>Voici les membres inscrits aux sites</h1>';
$resultat=executeRequete("SELECT*FROM membre");
echo'Nombre de membre(s):'.$resultat;
echo"<table style='border-color:red' borfer=10> <tr>";
while($colonne=$resultat){
	echo'<th>'.$colonne->name.'</th>';
}
echo'<th> Supprimer </th>';
echo'</tr>';
while($membre=$resultat){
	echo'<tr>';
	foreach($membre as $information){
		echo'<td>' .$information.'</td>';
	}
	echo"<td><a href='membre.php?msg=supok&&id_membre=" .$membre['id_membre']."'onclick='return(confirm(\"etes vous sur de vouloir supprimer ce membre?\"));'>X</a></td>";
	echo'</tr>';
}
echo'</table>';
?>