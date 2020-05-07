<!DOCTYPE html>
<html xml:lang="fr" lang="fr">
<head>
	<meta charset="utf-8" />
	<meta name="author" content="Mathieu MANGEOT" />
	<meta name="keywords" content="mmi2 sysInfo1 requete DB" />
	<meta name="description" content="Cours de Syst&eacute;mes d'information 1, 
		exemple de script PHP, requête dans une BD" />
	<title>Requ&ecirc;te dans une base de donn&eacute;es</title>
	<link rel="stylesheet" href="<?php echo RACINE_WEB;?>style/site.css" type="text/css" />
</head>
<body>
	<header>
		<h1>Requ&ecirc;te dans une base de donn&eacute;es</h1>
		<h2>Liste de tous les enregistrements de la table étudiants</h2>
		<hr />
	</header>
<section>
<?php
	require_once('connexion.php');
	$requete = 'SELECT nom, prenom FROM etudiants';
	// pour debug : 
	echo 'Requete SQL: ',$requete,"<br/>\n";
	$resultat = mysqli_query($CONNEXION,$requete);
	if (!$resultat) {
		echo "Erreur dans l'exécution de la requête, message de MySQL : ", mysqli_error($CONNEXION);
		exit();
	}
	$nombreEtudiants = mysqli_num_rows($resultat);
	echo '<p>Il y a ', $nombreEtudiants, ' étudiants dans cette promo :</p>';
	// objet
	while ($etudiant = mysqli_fetch_assoc ($resultat)) {
		echo 'Nom : ',$etudiant['nom'],' prénom : ',$etudiant['prenom']," <br/>\n";
	} 

	// fermeture de la connexion
	mysqli_close($CONNEXION);
?>
</section>
</body>
</html>
