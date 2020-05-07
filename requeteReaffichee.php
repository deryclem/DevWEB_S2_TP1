<!DOCTYPE html>
<html xml:lang="fr" lang="fr">
<head>
	<meta charset="utf-8" />
	<meta name="author" content="Mathieu MANGEOT" />
	<meta name="keywords" content="mmi2 sysInfo1 requete DB" />
	<meta name="description" content="Cours de Syst&eacute;mes d'information 1, 
		exemple de script PHP, requête dans une BD" />
	<title>Requ&ecirc;te réaffichée dans le formulaire</title>
	<link rel="stylesheet" href="<?php echo RACINE_WEB;?>style/site.css" type="text/css" />
</head>
<body>
	<header>
	<h1>Requ&ecirc;te réaffichée dans le formulaire</h1>
<?php
    // on récupère les paramètres AVANT d'afficher le formulaire !
	$nomCherche = empty($_REQUEST['Nom'])?'':$_REQUEST['Nom'];
	$prenomCherche = empty($_REQUEST['Prenom'])?'':$_REQUEST['Prenom'];
?>
	<h2>Recherche d'un étudiant</h2>
	<hr />
	</header>
	<section id="formulaire">
	<form action="?" method="get">
	<div>
		<!-- on affiche les paramètres dans les value du formulaire -->
		<label>Prénom : <input type="text" name="Prenom" value="<?php echo $prenomCherche;?>"/></label><br/>
		<label>Nom : <input type="text" name="Nom"  value="<?php echo $nomCherche;?>"/></label><br/>
		<input type="submit" value="Envoyer"/>
	</div>
	</form>
	<hr />
	</section>
<section id="resultat">
<?php
	require_once('connexion.php');
	
	if (!empty($nomCherche) || !empty($prenomCherche)) {
		$nomCherche .= '%';
		$prenomCherche .= '%';
		$requete = mysqli_prepare($CONNEXION,'SELECT nom, prenom FROM etudiants WHERE nom LIKE ? AND prenom LIKE ?');
		if (!$requete) {
			echo "Erreur dans la préparation de la requête, message de MySQL : ", mysqli_error($CONNEXION);
			exit();
		}
		mysqli_stmt_bind_param($requete, 'ss', $nomCherche, $prenomCherche);
		mysqli_stmt_execute($requete);
		mysqli_stmt_bind_result($requete, $nomTrouve, $prenomTrouve);
		if (mysqli_stmt_errno($requete)) {
			echo "Erreur dans l'exécution de la requête, message de MySQL : ", mysqli_stmt_error($requete);
			exit();
		}
		echo '<h4>Liste des étudiants de mmi2 répondant à la requête</h4>';
		while (mysqli_stmt_fetch($requete)) {
			echo "Prénom : $prenomTrouve Nom : $nomTrouve  <br/>\n";
		}
	}
	
	// fermeture de la connexion
	mysqli_close($CONNEXION);
?>
</section>
</body>
</html>
