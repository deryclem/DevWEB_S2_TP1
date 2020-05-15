<!DOCTYPE html>
<html xml:lang="fr" lang="fr">
<head>
	<meta charset="utf-8" />
	<meta name="author" content="Mathieu MANGEOT" />
	<meta name="keywords" content="mmi2 sysInfo1 requete DB" />
	<meta name="description" content="Cours de Syst&eacute;mes d'information 1, 
		exemple de script PHP, mise à jour dans une BD" />
	<title>Ajout dans une BD</title>
	<link rel="stylesheet" href="<?php echo RACINE_WEB; ?>style/site.css" type="text/css" />
</head>
<body>
	<header>
	<h1>Ajout dans une BD</h1>
	<hr />
	</header>
	<section id="formulaire">
	<form action="?">
	<div>
		<h4>Ajout d'une personne</h4>
		<label>Prénom : <input type="text" name="Prenom" value=""/></label><br/>
		<label>Nom : <input type="text" name="Nom" value=""/></label><br/>
		<input type="submit" name="Ajouter" value="Ajouter"/>
	</div>
</form>
<hr />
</section>
<section id="resultat">
<?php
	require_once('connexion.php');

	// Ajouter
	if (!empty($_REQUEST['Ajouter']) && 
		!empty($_REQUEST['Nom']) && 
		!empty($_REQUEST['Prenom'])) {
		
		$requete = mysqli_prepare($CONNEXION, 'INSERT INTO etudiants (nom, prenom) VALUES (? , ?)');
		if (!$requete) {
			echo "Erreur dans la préparation de la requête, message de MySQL : ", mysqli_error($CONNEXION);
			exit();
		}
		mysqli_stmt_bind_param($requete, 'ss', $_REQUEST['Nom'], $_REQUEST['Prenom']);
		mysqli_stmt_execute($requete);
		if (mysqli_stmt_errno($requete)) {
			echo "Erreur dans l'exécution de la requête, message de MySQL : ", mysqli_stmt_error($requete);
			exit();
		}
		echo '<p>Ajout de nom : ', $_REQUEST["Nom"], ' prénom ', $_REQUEST['Prenom'], '</p>';
	}

	// fermeture de la connexion
	mysqli_close($CONNEXION);
?>
</section>
</body>
</html>
