<!DOCTYPE html>
<html xml:lang="fr" lang="fr">
<head>
	<meta charset="utf-8" />
	<meta name="author" content="Mathieu MANGEOT" />
	<meta name="keywords" content="mmi2 sysInfo1 requete DB" />
	<meta name="description" content="Cours de Syst&eacute;mes d'information 1, 
		exemple de script PHP, mise à jour dans une BD" />
	<title>Suppression dans une BD</title>
	<link rel="stylesheet" href="<?php echo RACINE_WEB; ?>style/site.css" type="text/css" />
</head>
<body>
	<header>
	<h1>Suppression dans une BD</h1>
	<hr />
	</header>
	<section id="formulaire">
	<form action="?">
	<div>
		<h4>Suppression d'une personne</h4>
		<label>Prénom : <input type="text" name="Prenom" value=""/></label><br/>
		<label>Nom : <input type="text" name="Nom" value=""/></label><br/>
		<input type="submit" name="Rechercher" value="Rechercher"/>
	</div>
	</form>
	<hr />
	</section>
	<section id="resultat">
<?php
	require_once('connexion.php');
		
	// Rechercher
	if (!empty($_REQUEST['Rechercher'])) {
		$nom = empty($_REQUEST['Nom']) ? '' : $_REQUEST['Nom'];
		$prenom = empty($_REQUEST['Prenom']) ? '' : $_REQUEST['Prenom'];
		// Ajout du paramètre % pour recherche sur préfixe
		$nom .= '%';
		$prenom .= '%';
		$requete = mysqli_prepare($CONNEXION, 'SELECT numero, nom, prenom FROM etudiants WHERE nom LIKE ? AND prenom LIKE ?');
		if (!$requete) {
			echo "Erreur dans la préparation de la requête, message de MySQL : ", mysqli_error($CONNEXION);
			exit();
		}
		mysqli_stmt_bind_param($requete, 'ss', $nom, $prenom);
		mysqli_stmt_execute($requete);
		if (mysqli_stmt_errno($requete)) {
			echo "Erreur dans l'exécution de la requête, message de MySQL : ", mysqli_stmt_error($requete);
			exit();
		}
		echo '<form action="?">
			<div>
			<h4>Liste des étudiants de mmi2 à supprimer</h4>';
		mysqli_stmt_bind_result($requete, $numero, $nom, $prenom);
		while (mysqli_stmt_fetch($requete)) {
			echo "<input type='checkbox' name='Ids[]' value='$numero'/>",
				"$prenom $nom <br/>\n";
		}
		echo '<input type="submit" name="Supprimer" value="Supprimer"/>';
		echo '</div></form>';
	}
			
	// Supprimer : Étape 2 : supprimer la personne en question
	if (!empty($_REQUEST['Supprimer']) && !empty($_REQUEST['Ids'])) {
		$requete = mysqli_prepare($CONNEXION, 'DELETE FROM etudiants WHERE numero = ?');
		if (!$requete) {
			echo "Erreur dans la préparation de la requête, message de MySQL : ", mysqli_error($CONNEXION);
			exit();
		}
		foreach ($_REQUEST['Ids'] as $id) {
			mysqli_stmt_bind_param($requete, 'i', $id);
			mysqli_stmt_execute($requete);
			if (mysqli_stmt_errno($requete)) {
				echo "Erreur dans l'exécution de la requête, message de MySQL : ", mysqli_stmt_error($requete);
				exit();
			}
			echo "<p>Suppression de l'étudiant effectuée (numéro : $id)</p>\n";	
		}
	}
		
	// fermeture de la connexion
	mysqli_close($CONNEXION);
?>
	</section>
</body>
</html>