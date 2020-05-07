<!DOCTYPE html>
<html xml:lang="fr" lang="fr">
<head>
	<meta charset="utf-8" />
	<meta name="author" content="Mathieu MANGEOT" />
	<meta name="keywords" content="mmi2 sysInfo1 requete DB" />
	<meta name="description" content="Cours de Syst&eacute;mes d'information 1, 
		exemple de script PHP, requête dans une BD" />
	<title>Requ&ecirc;te paramétrée dans une BD</title>
	<link rel="stylesheet" href="<?php echo RACINE_WEB;?>style/site.css" type="text/css" />
</head>
<body>
	<header>
		<h1>Requ&ecirc;te paramétrée dans une BD</h1>
		<h2>Recherche d'un étudiant</h2>
		<hr />
	</header>
	<section id="formulaire">
	<!-- formulaire -->
	<form action="?" method="get">
	<div>
		<label>Prénom : <input type="text" name="Prenom" /></label><br/>
		<label>Nom : <input type="text" name="Nom" /></label><br/>
		<input type="submit" value="Envoyer"/>
	</div>
	</form>
	<hr />
	</section>
<section id="reponse">
	<!-- CGI -->
<?php
	require_once('connexion.php');
	
	if (!empty($_REQUEST['Nom']) || !empty($_REQUEST['Prenom'])) {
		$nomCherche = empty($_REQUEST['Nom'])?'':$_REQUEST['Nom'];
		$prenomCherche = empty($_REQUEST['Prenom'])?'':$_REQUEST['Prenom'];
		// Ajout du paramètre % pour recherche sur préfixe
		$nomCherche .='%';
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
		echo '<h4>Liste des étudiants de mmi2 correspondant à la requête</h4>';
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
