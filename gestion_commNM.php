<?php
$infos_sur_les_commandes=executeRequete("SELECT C.*,u.Nom,u.Prenom,u.Email FROM users C left join users u on u.Id_users=C.Id_users");
echo"Infos sur les commande(s):" .$infos_sur_les_commandes->num_rows;
echo"<table style='border-color:red' border=10><tr>";
while($colonne=$infos_sur_les_commandes->fetch_field()){
	echo'<th>'.$colonne->name.'</th>';
}
echo'<tr>'
$chiffre_affaire=0;
while($commande=$infos_sur_les_commandes->fetch_assoc()){
	$chiffre_affaire +=$commande['montant'];
	echo'<div>';
	echo'<tr>';
	echo'<td><a href="gestion_commande.php?suivi='.$commande['Id_commande']'">voir commande'.$commande['Id_commande'].'</a><td>';
	echo'<td>'.$commande['id_membre'].'</td>';
	echo'<td>'.$commande['montant'].'</td>';
	echo'<td>'.$commande['date'].'</td>';
	echo'<td>'.$commande['etat'].'</td>';
	echo'<td>'.$commande['adresse'].'</td>';
	echo'<td>'.$commande['ville'].'</td>';
	echo'</td>';
	echo'<div>';
}
echo'<table></br>';
echo'calcul du montant total des revenus:</br> ';
print"Le chiffre d'affaire de la société est de: $chiffre_affaire F";
echo'</br>'
if(isset($_GET['suivi']))
{
echo'<h1> voici les details pour une commande</h1>';
echo'<table border="1">';
echo'<tr>';	
$infos_sur_une_commande=executeRequete("select*from detail_commande WHERE Id_commande=$_GET['suivi']");
$nbcol=$infos_sur_une_commande->field_count;
echo"<table style='border-color;red' border=10><tr>";
for($i=0;$i<$nbcol;$i++){
	$colonne=$infos_sur_une_commande->fetch_field();
	echo'<th>'.$colonne->name.'</th>';
}
echo'</tr>';

while($detail_commande=$infos_sur_une_commande->fetch_assoc()){
	echo'<tr>';
	echo'<td>'.$detail_commande['Id_detail_commande'].'</td>';
	echo'<td>'.$detail_commande['Id_commande'].'</td>';
	echo'<td>'.$detail_commande['Id_article'].'</td>';
	echo'<td>'.$detail_commande['quantite'].'</td>';
	echo'<td>'.$detail_commande['prix'].'</td>';
	echo'</tr>';
}
echo'</table>';
}
?>