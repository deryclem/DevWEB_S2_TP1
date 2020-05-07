<?php
			require_once('connexion.php');
			$requete = "SELECT DATE_FORMAT(date_sortie, '%d %M %Y') as date_sortie_fr,  affiche, id, titre, date_sortie, duree, note_presse, note_public FROM films";
			$resultat = mysqli_query($CONNEXION,$requete);
			if (!$resultat) {
			echo "Erreur dans l'exécution de la requête, message de MySQL : ", mysqli_error($CONNEXION);
			exit();
			}

			//Retourne dans une chaine de caractères
			//l'identifiant du ou des réalisateurs du film $id_film
			function realisateurs_id($CONNEXION, $id_film){
				$requete = "SELECT id_personne FROM staff where id_film=$id_film AND id_fonction=1";
				$resultat = mysqli_query($CONNEXION,$requete);
				if (!$resultat) {
					echo "Erreur dans l'exécution de la requête, message de MySQL : ",
					mysqli_error($CONNEXION);
					exit();
				}
				$retour = "";
				while ($ligne = mysqli_fetch_assoc ($resultat)) {
					$retour .= $ligne['id_personne']." ";
				}
				return $retour;
			}


			function realisateurs_prenom_nom($CONNEXION, $id_film)
			{
				$requete = "SELECT prenom, nom FROM personnes INNER JOIN staff ON personnes.id = staff.id_personne AND staff.id_film = $id_film";
				$resultat = mysqli_query($CONNEXION,$requete);
				if (!$resultat) {
					echo "Erreur dans l'exécution de la requête, message de MySQL : ",
					mysqli_error($CONNEXION);
					exit();
				}
				$retour = "";
				while ($ligne = mysqli_fetch_assoc ($resultat)) {
					$retour .= $ligne['prenom']." ".$ligne['nom'];
				}
				return $retour;
			}

			function genres($CONNEXION, $id_film)
			{
				$requete = "SELECT nom FROM genres INNER JOIN genres_films ON genres.id = genres_films.id_genre AND genres_films.id_film = $id_film";
				$resultat = mysqli_query($CONNEXION,$requete);
				if (!$resultat) {
					echo "Erreur dans l'exécution de la requête, message de MySQL : ",
					mysqli_error($CONNEXION);
					exit();
				}
				$retour = "";
				while ($ligne = mysqli_fetch_assoc ($resultat)) {
					$retour .= $ligne['nom'].", ";
				}
				return $retour;
			}

			function acteurs_prenom_nom($CONNEXION, $id_film)
			{
				$requete = "SELECT prenom, nom FROM personnes INNER JOIN acteurs ON personnes.id = acteurs.id_personne AND acteurs.id_film = $id_film";
				$resultat = mysqli_query($CONNEXION,$requete);
				if (!$resultat) {
					echo "Erreur dans l'exécution de la requête, message de MySQL : ",
					mysqli_error($CONNEXION);
					exit();
				}
				$retour = "";
				while ($ligne = mysqli_fetch_assoc ($resultat)) {
					$retour .= $ligne['prenom']." ".$ligne['nom'].", ";
				}
				return $retour;
			}


			$nombreLignes = mysqli_num_rows($resultat);
			echo "Il y a ", $nombreLignes, " lignes de résultat pour cette requête :<br/>\n";
			// les résultats sous forme de tableau associatif
			while ($ligne = mysqli_fetch_assoc ($resultat)) {

				$heures=intval($ligne['duree'] / 60);
	      $minutes=intval(($ligne['duree'] % 60));
				echo "
				<br>
				<table>
				<thead>
				  <tr>
				    <th rowspan='7'><img src='",$ligne['affiche'],"'></th>
				    <th colspan='2'><b>",$ligne["titre"],"</b></th>
				  </tr>
				  <tr>
				    <td style='color:grey'>Date de sortie</td>
				    <td>", $ligne['date_sortie_fr']," (",$heures,"h",$minutes,"min",")</td>
				  </tr>
					<tr>
				    <td style='color:grey'>Réalisateur</td>
				    <td>",realisateurs_prenom_nom($CONNEXION, $ligne['id']),"</td>
				  </tr>
					<tr>
				    <td style='color:grey'>Avec</td>
				    <td>",acteurs_prenom_nom($CONNEXION, $ligne['id']),"</td>
				  </tr>
					<tr>
				    <td style='color:grey'>Genres</td>
				    <td>",genres($CONNEXION, $ligne['id']),"</td>
				  </tr>
				  <tr>
				    <td style='color:grey'>Presse</td>
				    <td>",$ligne['note_presse'],"</td>
				  </tr>
				  <tr>
				    <td style='color:grey'>Public</td>
				    <td>",$ligne['note_public'],"</td>
				  </tr>
				</thead>
				</table>
				";

			}

			// fermeture de la connexion
			mysqli_close($CONNEXION);
?>

<style>
html {
	font-family: sans-serif;
}
table, thead, td {
		/* border: 1px solid black; */
		vertical-align: top;
		text-align: left;
}
</style>
