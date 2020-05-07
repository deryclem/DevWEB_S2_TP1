<?php
			require_once('connexion.php');
			$requete = "SELECT affiche, id, titre, date_sortie, duree, note_presse, note_public FROM films";
			$resultat = mysqli_query($CONNEXION,$requete);
			if (!$resultat) {
			echo "Erreur dans l'exécution de la requête, message de MySQL : ", mysqli_error($CONNEXION);
			exit();
			}
			$nombreLignes = mysqli_num_rows($resultat);
			echo "Il y a ", $nombreLignes, " lignes de résultat pour cette requête :<br/>\n";
			// les résultats sous forme de tableau associatif
			while ($ligne = mysqli_fetch_assoc ($resultat)) {
			echo $ligne['affiche']," id : ",$ligne['id']," titre : ",$ligne['titre']," id : ",$ligne['id']," id : ",$ligne['id'],"<br/>\n";
			}

			// fermeture de la connexion
			mysqli_close($CONNEXION);
?>
