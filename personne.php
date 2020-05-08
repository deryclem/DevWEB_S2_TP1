<?php
// Utiliser variables: prenom, nom,
// Créer variables: lieu_de_naissance, pays_de_naissance, age_personne, date_deces, age_deces
//echo $_GET['id']; // Pour la récupération de l'ID dans l'URL

require_once('connexion.php');

$id = intval($_GET['id']);
$requete = "SELECT *, DATE_FORMAT(date_naissance, '%d %M %Y') as date_naissance_fr FROM personnes WHERE ID = ".$id;
$resultat = mysqli_query($CONNEXION,$requete);
if (!$resultat) {
echo "Erreur dans l'exécution de la requête, message de MySQL : ", mysqli_error($CONNEXION);
exit();
}

function filmsRealises($CONNEXION, $id)
{
  $requete = "SELECT date_sortie, titre FROM films INNER JOIN staff ON personnes.id = staff.id_personne AND staff.id_film = $id_film";
  $resultat = mysqli_query($CONNEXION,$requete);
  if (!$resultat) {
    echo "Erreur dans l'exécution de la requête, message de MySQL : ",
    mysqli_error($CONNEXION);
    exit();
  }
  $retour = "";
  while ($infos = mysqli_fetch_assoc ($resultat)) {
    $retour .= $infos['id_personne']." ";
  }
  return $retour;
}


while ($infos = mysqli_fetch_assoc ($resultat)) {

  $aujourdhui = date("Y-m-d");
  $diff = date_diff(date_create($infos['date_naissance']), date_create($aujourdhui));




    echo "
          <h1>",$infos['prenom']," ",$infos['nom']," </h1>
          <table>
            <tr>
              <td style='color:grey'>Né le : </td>
              <td>",$infos['date_naissance_fr'],"</td>
            </tr>
            <tr>
              <td style='color:grey'>Age Actuel : </td>
              <td>",$diff->format('%y')," ans </td>
            </tr>
          </table>
          <h2>Réalisateur</h2>
          <table>
            <tr>
              <th>Année</td>
              <th>Titre</td>
            </tr>
            <tr>
              <td></td>
              <td></td>
            </tr>
          </table>





    ";
}
?>

<style>
html {
	font-family: sans-serif;
}
table, thead, td {
		border: 1px solid black;
		vertical-align: top;
		text-align: left;
}
</style>
