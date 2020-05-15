<?php
// Utiliser variables: prenom, nom,
// Créer variables: lieu_de_naissance, pays_de_naissance, age_personne, date_deces, age_deces
//echo $_GET['id']; // Pour la récupération de l'ID dans l'URL

require_once('connexion.php');

$id = intval($_GET['id']);
$rowcount = 1;

$requete = "SELECT *, DATE_FORMAT(date_naissance, '%d %M %Y') as date_naissance_fr FROM personnes WHERE ID = ".$id;
$resultat = mysqli_query($CONNEXION, $requete);
if (!$resultat) {
echo "Erreur dans l'exécution de la requête, message de MySQL : ", mysqli_error($CONNEXION);
exit();
}

function filmsRealisesTitre($CONNEXION, $id)
{
  $requete = "SELECT titre FROM films INNER JOIN staff ON staff.id_film = films.id AND staff.id_personne = $id";
  $resultat = mysqli_query($CONNEXION,$requete);
  if (!$resultat) {
	echo "Erreur dans l'exécution de la requête, message de MySQL : ",
	mysqli_error($CONNEXION);
	exit();
  }
  $retour = "";
  while ($infos = mysqli_fetch_assoc ($resultat)) {
	$retour .= $infos['titre'];
  }
  return $retour;
}

function filmsRealisesDate($CONNEXION, $id)
{
  $requete = "SELECT date_sortie FROM films INNER JOIN staff ON staff.id_film = films.id AND staff.id_personne = $id";
  $resultat = mysqli_query($CONNEXION,$requete);
  if (!$resultat) {
	echo "Erreur dans l'exécution de la requête, message de MySQL : ",
	mysqli_error($CONNEXION);
	exit();
  }
  $retour = "";
  while ($infos = mysqli_fetch_assoc ($resultat)) {
	$retour .= $infos['date_sortie'];
  }
  return $retour;
}

function filmsJouesDate($CONNEXION, $id)
{
  $requete = "SELECT date_sortie FROM films INNER JOIN acteurs ON acteurs.id_film = films.id AND acteurs.id_personne = $id";
  $resultat = mysqli_query($CONNEXION,$requete);
  if (!$resultat) {
	echo "Erreur dans l'exécution de la requête, message de MySQL : ",
	mysqli_error($CONNEXION);
	exit();
  }
  $retour = "";
  while ($infos = mysqli_fetch_assoc ($resultat)) {
	$retour .= $infos['date_sortie'];
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
              <td>",$infos['date_naissance_fr']," ( ",$infos['lieu_naissance']," - ",$infos['pays_naissance']," )</td>
            </tr>
            <tr>
              <td style='color:grey'>Age Actuel : </td>
              <td>",$diff->format('%y')," ans </td>
            </tr>
          </table>
          ";

if (!empty(filmsRealisesDate($CONNEXION, $infos['id']))) {
  echo "
  <h2>Réalisateur</h2>
  <table>
    <tr style='background-color:lightgrey'>
      <th>Année</td>
      <th>Titre</td>
    </tr>
    <tr>
      <td>".filmsRealisesDate($CONNEXION, $infos['id'])."</td>
      <td>".filmsRealisesTitre($CONNEXION, $infos['id'])."</td>
    </tr>
  </table>
  ";
}

if (!empty(filmsJouesDate($CONNEXION, $infos['id']))) {
  echo "
  <h2>Acteur</h2>
  <table>
    <tr style='background-color:lightgrey'>
      <th>Année</td>
      <th>Titre</td>
      <th>Role</td>
    </tr>";

	$requete = "SELECT * FROM films INNER JOIN acteurs ON acteurs.id_film = films.id AND acteurs.id_personne = $id";
	$resultat = mysqli_query($CONNEXION,$requete);
	if (!$resultat) {
	echo "Erreur dans l'exécution de la requête, message de MySQL : ", mysqli_error($CONNEXION);
	exit();
	}

while ($ligne = mysqli_fetch_assoc ($resultat)) {
  echo "
    <tr>
      <td>".$ligne['date_sortie']."</td>
      <td>".$ligne['titre']."</td>
      <td>".$ligne['role']."</td>
    </tr>
    ";
}

echo "</table>";
}


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
