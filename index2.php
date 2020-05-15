<?php
			require_once('connexion.php');
			$requete = "SELECT DATE_FORMAT(date_sortie, '%d %M %Y') as date_sortie_fr, affiche, id, titre, date_sortie, duree, note_presse, note_public FROM films";
			$resultat = mysqli_query($CONNEXION, $requete);
			if (!$resultat) {
			echo "Erreur dans l'exécution de la requête, message de MySQL : ", mysqli_error($CONNEXION);
			exit();
			}
			$nombreLignes = mysqli_num_rows($resultat);
			echo "Il y a ", $nombreLignes, " lignes de résultat pour cette requête :<br/>\n";
			// les résultats sous forme de tableau associatif
			while ($ligne = mysqli_fetch_assoc ($resultat)) {

	  $heures=intval($ligne['duree'] / 60);
	  $minutes=intval(($ligne['duree'] % 60));
			echo "<br>";

			echo "
			<table>
			<thead>
			  <tr>
			    <th rowspan='5'><img src='",$ligne['affiche'],"'></th>
			    <th colspan='2'><b>",$ligne["titre"],"</b></th>
			  </tr>
			  <tr>
			    <td style='color:grey'>Date de sortie</td>
			    <td>", $ligne['date_sortie_fr']," (",$heures,"h",$minutes,"min",")</td>
			  </tr>
				<tr>
			    <td style='color:grey'>Réalisateur</td>
			    <td>",$ligne['note_public'],"</td>
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
table, thead, td {
		border: 1px solid black;
		vertical-align: top;
		text-align: left;
}
</style>
