<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Hello World PHP HTML</title>
		<link id="linkstyle" href="style/site.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<h1>Hello World d'un CGI générique en PHP</h1>
		<?php
			error_reporting(E_ALL);
			echo $toto;
			$submit = $_REQUEST["Envoyer"];
			$recherche = $_REQUEST["Recherche"];
			include("fichierNonExistant.php");
			// Faire une recherche 
			if (isset($submit) && isset($recherche)) {
				echo "<p>J'ai fait une recherche ", $prenom, " ", $nom, "</p>\n";	
			}
			echo '
			<form action="rechercheIntegree.php" method="get">
			<div>
			<label>Recherche : <input type="text" name="Recherche" value="', $recherche, '"/></label><br/>
			<input type="submit" name="Envoyer" value="Envoyer"/>
			</div>
			</form>
			';		
		?>
	</body>
</html>
