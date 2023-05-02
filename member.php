<?php
require_once("init.php");
if(!internauteEstConnecte())
{
	header("location:connexion.php");
	exit();
}
if($_POST)
{
	if(!empty($_POST['mdp']))
	{
		executeRequete("update membre SET mdp='$_POST[mdp]', nom='$_POST[nom]', prenom='$_POST[prenom]', email='$_POST[email]', sexe='$_POST[sexe]', ville='$_POST[ville]', adresse='$_POST[adresse]' where id_membre='".$_SESSION['internaute']['id_membre']."'");
		unset($_SESSION['internaute']);		
		foreach($membre as $indice => $element)
		{
			if($indice != 'mdp')
			{
				$_SESSION['internaute'][$indice] = $element;
			}
			else
			{
				$_SESSION['internaute'][$indice] = $_POST['mdp'];
			}
		}
		header("Location:member.php?action=modif");
	}
	else
	{
		$msg .= "le nouveau mot de passe doit être renseigné !";
	}
}
if(isset($_GET['action']) && $_GET['action'] == 'modif')
{
	$msg .= "la modification à bien été prise en compte";
}

require_once("haut.php");
echo $msg;
?>
		<h2> Modification de vos informations </h2>
		<?php
			print "vous êtes connecté sous le pseudo: " . $_SESSION['internaute']['pseudo'];
		?><br /><br />
		<form method="post" enctype="multipart/form-data" action="member.php">
		<input type="hidden" id="id_membre" name="id_membre" value="<?php if(isset($_SESSION['internaute'])) print $_SESSION['internaute']['id_membre']; ?>" />
			<label for="pseudo">Pseudo</label>
				<input disabled type="text" id="pseudo" name="pseudo" value="<?php if(isset($_SESSION['internaute'])) print $_SESSION['internaute']['pseudo']; ?>"/><br />
				<input type="hidden" id="pseudo" name="pseudo" value="<?php if(isset($_SESSION['internaute'])) print $_SESSION['internaute']['pseudo']; ?>"/>
			
			<label for="mdp">Nouv. Mot de passe</label>
				<input type="text" id="mdp" name="mdp" value="<?php if(isset($mdp)) print $mdp; ?>"/><br /><br />
			
			<label for="nom">Nom</label>
				<input type="text" id="nom" name="nom" value="<?php if(isset($_SESSION['internaute'])) print $_SESSION['internaute']['nom']; ?>"/><br />
			
			<label for="prenom">Prénom</label>
				<input type="text" id="prenom" name="prenom" value="<?php if(isset($_SESSION['internaute'])) print $_SESSION['internaute']['prenom']; ?>"/><br />

			<label for="email">Email</label>
				<input type="text" id="email" name="email" value="<?php if(isset($_SESSION['internaute'])) print $_SESSION['internaute']['email']; ?>"/><br />
			
			<label for="sexe">Sexe</label>
					<select id="sexe" name="sexe">
						<option value="m" <?php if(isset($_SESSION['internaute']['sexe']) && $_SESSION['internaute']['sexe'] == "m") print "selected"; ?>>Homme</option>
						<option value="f" <?php if(isset($_SESSION['internaute']['sexe']) && $_SESSION['internaute']['sexe'] == "f") print "selected"; ?>>Femme</option>
					</select><br />
					
			<label for="ville">Ville</label>
				<input type="text" id="ville" name="ville" value="<?php if(isset($_SESSION['internaute'])) print $_SESSION['internaute']['ville']; ?>"/><br />
			
		<label for="adresse">Adresse</label>
					<textarea id="adresse" name="adresse"><?php if(isset($_SESSION['internaute'])) print $_SESSION['internaute']['adresse']; ?></textarea>
					<input type="hidden" name="statut" value="<?php if(isset($_SESSION['internaute'])) print $_SESSION['internaute']['statut']; ?>"/><br />
			<br /><br />
			<input type="submit" class="submit" name="modification" value="modification"/>
	</form><br />
</div>