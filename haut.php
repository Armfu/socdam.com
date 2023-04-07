<!Doctype html>
<html>
    <head>
        <title>socdam.com</title>
        <link rel="stylesheet" href="<?php echo RACINE_SITE; ?>inc/css/style.css" />
    </head>
    <body>    
        <header>
			<div class="conteneur">                      
				<span>
					<a href="" title="socdam.com">socdam.com</a>
                </span>
				<nav>
					<?php
					if(internauteEstConnecteEtEstAdmin()) // admin
					{ // BackOffice
						echo '<a href="'.RACINE_SITE.'admin/membre.php">Gestion des membres</a>';
						echo '<a href="'.RACINE_SITE.'admin/gestion_commNM.php">Gestion des commandes</a>';
						echo '<a href="'.RACINE_SITE.'admin/boutique_gest.php">Gestion de la boutique</a>';
					}
					if(internauteEstConnecte()) // membre et admin
					{
						echo '<a href="'.RACINE_SITE.'profil.php">Voir votre profil</a><br />';
						echo '<a href="'.RACINE_SITE.'boutique.php">Accès à la boutique</a><br />';
						echo '<a href="'.RACINE_SITE.'panier.php">Voir votre panier</a><br />';
						echo '<a href="'.RACINE_SITE.'connexion.php?action=deconnexion">Se déconnecter</a>';
					}
					else // visiteur
					{
						echo '<ul class="large">';
						echo '<a href="'.RACINE_SITE.'inscription.php">Inscription</a><br />';
						echo '<a href="'.RACINE_SITE.'connexion.php">Connexion</a><br />';
						echo '<a href="'.RACINE_SITE.'boutique.php">Accès à la boutique</a><br />';
						echo '<a href="'.RACINE_SITE.'panier.php">Voir votre panier</a><br />';
					}
					// visiteur= liens - membre=4 liens - admin=7 liens
					?>
				</nav>
			</div>
        </header>
        <section>
			<div class="conteneur">       